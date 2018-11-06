<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFamousPlacesRequest;
use App\Http\Requests\UpdateFamousPlacesRequest;
use App\Repositories\FamousPlacesRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\FamousPlaces;
use App\Models\BlogCategory;

class FamousPlacesController extends Controller
{
    /** @var  FamousPlacesRepository */
    private $famousPlacesRepository;

    public function __construct(FamousPlacesRepository $famousPlacesRepo)
    {
        $this->famousPlacesRepository = $famousPlacesRepo;
    }

    /**
     * Display a listing of the FamousPlaces.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->famousPlacesRepository->pushCriteria(new RequestCriteria($request));
        $famousPlaces = $this->famousPlacesRepository->all();

        return view('famous_places.index')->with('famousPlaces', $famousPlaces);
    }

    /**
     * Show the form for creating a new FamousPlaces.
     *
     * @return Response
     */
    public function create()
    {
        $blogCategory = BlogCategory::all();

        $data = [
            'blogCategorys'  => $blogCategory
        ];

        return view('famous_places.create',$data);
    }

    /**
     * Store a newly created FamousPlaces in storage.
     *
     * @param CreateFamousPlacesRequest $request
     *
     * @return Response
     */
    public function store(CreateFamousPlacesRequest $request)
    {
        $input = $request->all();

        $famousPlaces = new FamousPlaces;
        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('/public/famous_places');
            $path = explode("/", $path);
            $count = count($path)-1;
            $famousPlaces->image = $path[$count];
        }
        else
        {
            $famousPlaces->image = null;
        }
        $famousPlaces->title = $input['title'];
        $famousPlaces->description = $input['description'];
        $famousPlaces->tags = $input['tags'];
        $famousPlaces->famous_place_cat_id = $input['famous_place_cat_id'];

        if($famousPlaces->save())
        {
            $request->session()->flash('msg.success', 'Famous place has been created successfully');
            $data = [
                'success'=> 1,
                'msg'=>'Famous place has been created successfully',
                'FamousPlaces'=> $famousPlaces
            ];
            return response()->json($data);
        }
        else
        {
            $request->session()->flash('msg.error', "Famous place doesn't created");
            $data = [
                'success'=> 0,
                'msg'=>"Famous place doesn't created",
                'FamousPlaces'=> $famousPlaces
            ];
            return response()->json($data);
        }
    }

    /**
     * Display the specified FamousPlaces.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $famousPlace = $this->famousPlacesRepository->findWithoutFail($id);


        if (empty($famousPlace)) 
        {

            session()->flash('msg.success', 'Famous Places not found');
            return redirect(route('admin.famousPlaces.index'));
        }

        $data = [
            'famousPlace'   => $famousPlace
        ];

        return view('famous_places.show',$data);
    }

    /**
     * Show the form for editing the specified FamousPlaces.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $famousPlace = FamousPlaces::find($id);

        $blogCategory = BlogCategory::all();

        if(count($famousPlace) > 0)
        {

            $data = [
                'famousPlace'   => $famousPlace,
                'blogCategorys'  => $blogCategory
            ];

            return view('famous_places.edit',$data);
        }
        else
        {
            $request->session()->flash('msg.error', "Famous place can not found");
            return redirect()->back();
        }
    }

    /**
     * Update the specified FamousPlaces in storage.
     *
     * @param  int              $id
     * @param UpdateFamousPlacesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamousPlacesRequest $request)
    {
        $input = $request->all();

        $famousPlace = FamousPlaces::find($id);

        if(count($famousPlace) > 0)
        {
            $famousPlace->title = $input['title'];
            $famousPlace->description = $input['description'];
            $famousPlace->tags = $input['tags'];
            $famousPlace->famous_place_cat_id = $input['famous_place_cat_id'];

            if(isset($input['image']))
            {
                if($request->hasFile('image'))
                {
                    $path = $request->file('image')->store('public/famous_places');
                    $path = explode("/", $path);
                    $count = count($path)-1;
                    $famousPlace->image = $path[$count];
                }
                else
                {
                    $famousPlace->image = $input['image'];
                }                
            }

            if($famousPlace->save())
            {
                $request->session()->flash('msg.success', 'Famous place has been updated successfully');
                $data = [
                    'success'=> 1,
                    'msg'=>'Famous place has been updated successfully',
                    'FamousPlaces'=> $famousPlace
                ];
                return response()->json($data);
            }
            else
            {
                $request->session()->flash('msg.error', "Famous place doesn't updated");
                $data = [
                    'success'=> 0,
                    'msg'=>"Famous place doesn't updated",
                    'FamousPlaces'=> $famousPlace
                ];
                return response()->json($data);
            }
        }
        else
        {
            $request->session()->flash('msg.error', "Famous place can not found");
            $data = [
                'success'=> 0,
                'msg'=>"Famous place can not found",
                'FamousPlace'=> $famousPlace
            ];
            return response()->json($data);
        }

        // $famousPlaces = $this->famousPlacesRepository->findWithoutFail($id);

        // if (empty($famousPlaces)) {
        //     Flash::error('Famous Places not found');

        //     return redirect(route('famousPlaces.index'));
        // }

        // $famousPlaces = $this->famousPlacesRepository->update($request->all(), $id);

        // Flash::success('Famous Places updated successfully.');

        // return redirect(route('famousPlaces.index'));
    }

    /**
     * Remove the specified FamousPlaces from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $famousPlace = FamousPlaces::find($id);

        if (empty($famousPlace)) 
        {
            session()->flash('msg.error', "Famous Place not found");
            return redirect(route('admin.famousPlaces.index'));
        }

        if($famousPlace->delete())
        {
            session()->flash('msg.success', 'Famous Place has been deleted successfully');
            return redirect(route('admin.famousPlaces.index'));
        }
    }
}
