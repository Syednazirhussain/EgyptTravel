<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccomodationRequest;
use App\Http\Requests\UpdateAccomodationRequest;
use App\Repositories\AccomodationRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Accomodation;

class AccomodationController extends Controller
{
    /** @var  AccomodationRepository */
    private $accomodationRepository;

    public function __construct(AccomodationRepository $accomodationRepo)
    {
        $this->accomodationRepository = $accomodationRepo;
    }

    /**
     * Display a listing of the Accomodation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->accomodationRepository->pushCriteria(new RequestCriteria($request));
        $accomodations = $this->accomodationRepository->all();

        return view('accomodations.index')->with('accomodations', $accomodations);
    }

    /**
     * Show the form for creating a new Accomodation.
     *
     * @return Response
     */
    public function create()
    {
        return view('accomodations.create');
    }


    public function recommended($accomodation_id)
    {
        $recommended_accomodation = Accomodation::where('recommended',1)->get()->count();

        if($recommended_accomodation < 4)
        {
            if(Accomodation::find($accomodation_id)->update(['recommended' => 1]))
            {
                return response()->json([
                    'status'    => 'success',
                    'message'   => 'Accomodation was changed to recommended'
                ]);
            }
        }
        else
        {
            return response()->json([
                'status'   => 'fail',
                'message'   => 'There are already 4 recommended hotels please uncheck some one else to mark it as recommended'
            ]);
        }

    }

    public function release_recommended($accomodation_id)
    {
        if(Accomodation::find($accomodation_id)->update(['recommended' => 0]))
        {
            return response()->json([
                'status'    => 'success',
                'message'   => 'Accomodation was changed to unrecommended'
            ]);
        }
        else
        {
            return response()->json([
                'status'    => 'fail',
                'message'   => 'There is some problem to release recommendation'
            ]);
        }
    }

    /**
     * Store a newly created Accomodation in storage.
     *
     * @param CreateAccomodationRequest $request
     *
     * @return Response
     */
    public function store(CreateAccomodationRequest $request)
    {
        $input = $request->all();

        $images = [];
        $accomodation = new Accomodation;
        $accomodation->name = $input['name'];
        $accomodation->address = $input['address'];
        $accomodation->description = $input['description'];
        $accomodation->url_link = $input['url_link'];
        if(isset($input['docFiles']))
        {
            $files = $input['docFiles'];

            if(count($files) > 0)
            {
                $file_names = [];
                $index = 0;
                foreach ($files as  $file) 
                {
                    $path = $file->store('public/accomodations');
                    $pathArr = explode('/', $path);
                    $count = count($pathArr);
                    $path = $pathArr[$count - 1];
                    $images[$index] = $path;
                    $index++;
                }
          
            }
        }
        $accomodation->gallery_images =  implode("|",$images);
        if($accomodation->save())
        {
            $request->session()->flash('msg.success', 'Accomodation has been created successfully');
            $data = [
                'success'=> 1,
                'msg'=>'Accomodation has been created successfully',
                'Accomodation'=> $accomodation
            ];
            return response()->json($data);
        }
        else
        {
            $request->session()->flash('msg.error', "Accomodation doesn't created");
            $data = [
                'success'=> 0,
                'msg'=>"Accomodation doesn't created",
                'Accomodation'=> $accomodation
            ];
            return response()->json($data);
        }
    }

    /**
     * Display the specified Accomodation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accomodation = $this->accomodationRepository->findWithoutFail($id);

        if (empty($accomodation)) {
            Flash::error('Accomodation not found');

            return redirect(route('accomodations.index'));
        }

        return view('accomodations.show')->with('accomodation', $accomodation);
    }

    public function imageRemove(Request $request)
    {
        $input = $request->all();

        $id = $input['id']."\n";

        $removeImage =  $input['image'];

        $accomodation = Accomodation::find($id);

        $images = explode("|", $accomodation->gallery_images);
        $remove_index =  array_search($removeImage, $images);
        unset($images[$remove_index]);


        $accomodation->gallery_images =  implode("|", $images);
        if($accomodation->save())
        {
            $data = [
                'success'=> 1,
                'msg'=>'Image remove successfully',
                'Accomodation'=> $accomodation
            ];
            return response()->json($data);
        }
        else
        {
            $data = [
                'success'=> 0,
                'msg'=>"Image cannot removed",
                'Accomodation'=> $accomodation
            ];
            return response()->json($data);
        }
    }

    /**
     * Show the form for editing the specified Accomodation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accomodation = $this->accomodationRepository->findWithoutFail($id);

        if (empty($accomodation)) 
        {
            session()->flash('msg.error', "Accomodation not found");
            return redirect(route('admin.accomodations.index'));
        }

        $imagesFiles = explode("|", $accomodation->gallery_images);

        if(count($imagesFiles) > 0)
        {
            $images = [];

            $url = asset('storage/accomodations');
            $url2 = public_path()."/storage/accomodations";
            

            $i = 0;
            foreach ($imagesFiles as $file) 
            {
                $images[$i]['name'] = $file;
                $images[$i]['file'] = $url.'/'.$file;
                $images[$i]['size'] = filesize($url2.'/'.$file);
                $images[$i]['type'] = mime_content_type($url2.'/'.$file);
                $i++;
            }
        }

        $data = [
            'accomodation'  => $accomodation,
            'imagesFiles'   => $images
        ];

        return view('accomodations.edit',$data);
    }

    /**
     * Update the specified Accomodation in storage.
     *
     * @param  int              $id
     * @param UpdateAccomodationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccomodationRequest $request)
    {
        $input = $request->all();

        $accomodation =  Accomodation::find($id);
        $accomodation->name = $input['name'];
        $accomodation->address = $input['address'];
        $accomodation->url_link = $input['url_link'];
        $accomodation->description = $input['description'];

        $previous_images = explode("|", $accomodation->gallery_images);
        $new_images = [];
        if(isset($input['docFiles']))
        {
            $files = $input['docFiles'];

            if(count($files) > 0)
            {
                $index = 0;
                foreach ($files as  $file) 
                {
                    $path = $file->store('public/accomodations');
                    $pathArr = explode('/', $path);
                    $count = count($pathArr);
                    $path = $pathArr[$count - 1];
                    $new_images[$index] = $path;
                    $index++;
                }
          
            }
        }

        $images = array_merge($new_images,$previous_images);

        if(count($images) > 0)
        {
            $accomodation->gallery_images = implode("|", $images);
        }

        if($accomodation->save())
        {
            $request->session()->flash('msg.success', 'Accomodation has been updated successfully');
            $data = [
                'success'=> 1,
                'msg'=>'Accomodation has been updated successfully',
                'Accomodation'=> $accomodation
            ];
            return response()->json($data);
        }
        else
        {
            $request->session()->flash('msg.error', "Accomodation doesn't updated");
            $data = [
                'success'=> 0,
                'msg'=>"Accomodation doesn't updated",
                'Accomodation'=> $accomodation
            ];
            return response()->json($data);
        }
    }

    /**
     * Remove the specified Accomodation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accomodation = $this->accomodationRepository->findWithoutFail($id);

        if (empty($accomodation)) 
        {
            session()->flash('msg.error', "Accomodation not found");
            return redirect(route('admin.accomodations.index'));
        }

        $this->accomodationRepository->delete($id);

        session()->flash('msg.success', 'Accomodation has been deleted successfully');

        return redirect(route('admin.accomodations.index'));
    }
}
