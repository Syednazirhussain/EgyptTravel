<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\User;
use App\Models\Roles;
use App\Models\Status;


class UsersController extends Controller
{
    /** @var  UsersRepository */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usersRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->usersRepository->all();



        return view('users.index')->with('users', $users);
    }

    public function verifyEmail(Request $request)
    {
        $input = $request->all();
        if( count($input) > 0)
        {
            $user = $this->usersRepository->verifyEmailExist($input['email']);
            if( count($user) > 0)
            {
                $success = 0;
                $response = 401;
            }
            else
            {
                $success = 1;
                $response = 200;
            }
        }
        else
        {
            $success = 0;
            $response = 404;
        }
        return response()->json(['success' => $success,'code' => $response]);
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        $user_role =  Roles::all();
        $status = Status::all();

        $data = [
            'user_role'  => $user_role,
            'userStatus' => $status
        ];

        return view('users.create',$data);
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRequest $request)
    {
        $this->validate($request,[
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|max:20|min:3'
        ]);

        $input = $request->all();

        $user = new User;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->mobile = $input['phone'];
        $user->user_role_code = $input['role'];
        $user->status_code = $input['user_status_id'];
        if( isset($input['pic']) )
        {
            if ($request->hasFile('pic')) 
            {
                $path = $request->file('pic')->store('public/users');
                $path = explode("/", $path);
                $count = count($path)-1;
                $user->pic = $path[$count];
            }
            else
            {
                $user->pic = null;   
            }
        }
        else
        {
            $user->pic = null;
        }
        if($user->save())
        {
            $request->session()->flash('msg.success', 'User has been created successfully');
            $data = [
                'success'=> 1,
                'msg'=>'User has been created successfully',
                'company'=> $user
            ];
            return response()->json($data);
        }
        else
        {
            $request->session()->flash('msg.error', "User doesn't created");
            $data = [
                'success'=> 0,
                'msg'=>"user doesn't created",
                'company'=> $user
            ];
            return response()->json($data);
        }
    }

    /**
     * Display the specified Users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if(count($user))
        {
            $user_role =  Roles::all();
            $status = Status::all();

            $data = [
                'user'       => $user,
                'user_role'  => $user_role,
                'userStatus' => $status
            ];

            return view('users.edit',$data);         
        }
        else
        {
            $request->session()->flash('msg.error', "User can not found");
        }
    }

    /**
     * Update the specified Users in storage.
     *
     * @param  int              $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRequest $request)
    {
        $this->validate($request,[
            'name' => 'required|max:20',
            'email' => 'required',
            'phone' => 'required|max:20|min:3'
        ]);

        $input = request()->except(['_token', '_method']);

        $user = User::find($id);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->mobile = $input['phone'];
        if($user->user_role_code  != 'admin'  )
        {
            $user->user_role_code = $input['role'];
            $user->status_code = $input['user_status_id'];            
        }

        if(isset($input['pic']))
        {
            if ($request->hasFile('pic')) 
            {
                $path = $request->file('pic')->store('public/users');
                $path = explode("/", $path);
                $count = count($path)-1;
                $input['pic'] = $path[$count];
                $user->pic = $input['pic'];
            }
        }
        else if(isset($input['profile_image']))
        {
            $input['pic'] = $input['profile_image'];
            unset($input['profile_image']);
            $user->pic = $input['pic'];
        }
        else
        {
            $user->pic = null;
        }

        if($input['updatePassword'] != null)
        {
            $user->password =  bcrypt($request->updatePassword);
        }        

        if($user->save())
        {
            $request->session()->flash('msg.success', 'User has been updated successfully');
            $data = [
                'success'=> 1,
                'msg'=>'User has been updated successfully',
                'company'=> $user
            ];
            return response()->json($data);
        }
        else
        {
            $request->session()->flash('msg.success', "User doesn't updated successfully");
            $data = [
                'success'=> 0,
                'msg'=>"user doesn't updated",
                'company'=> $user
            ];
            return response()->json($data);
        }
    }

    /**
     * Remove the specified Users from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (empty($user)) 
        {
            session()->flash('msg.error', "User not found");
            return redirect(route('admin.users.index'));
        }

        if($user->delete())
        {
            session()->flash('msg.success', 'User has been deleted successfully');
            return redirect(route('admin.users.index'));
        }
    }
}
