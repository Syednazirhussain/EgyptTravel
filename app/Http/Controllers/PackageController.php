<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Repositories\PackageRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

use App\Models\Package;
use App\Models\Price;
use App\Models\Category;
use App\Models\Accomodation;


class PackageController extends Controller
{
    /** @var  PackageRepository */
    private $packageRepository;

    public function __construct(PackageRepository $packageRepo)
    {
        $this->packageRepository = $packageRepo;
    }

    /**
     * Display a listing of the Package.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->packageRepository->pushCriteria(new RequestCriteria($request));
        $packages = $this->packageRepository->all();

        return view('packages.index')->with('packages', $packages);
    }

    /**
     * Show the form for creating a new Package.
     *
     * @return Response
     */
    public function create()
    {
        $accommodation = Accomodation::all();
        $category = Category::all();
        $price = Price::all();

        $data = [
            'prices'             => $price,
            'accommodations'     => $accommodation,
            'categorys'          => $category
        ];

        return view('packages.create',$data);
    }


    public function popular($package_id)
    {
        $recommended_package = Package::where('popular',1)->get()->count();
        if($recommended_package < 4)
        {
            if(Package::find($package_id)->update(['popular' => 1]))
            {
                return response()->json([
                    'status'    => 'success',
                    'message'   => 'Package was changed to popular'
                ]);
            }
        }
        else
        {
            return response()->json([
                'status'   => 'fail',
                'message'   => 'There are already 4 popular packages please uncheck some one else to mark it as popular'
            ]);
        }
    }

    public function release_popular($package_id)
    {
        if(Package::find($package_id)->update(['popular' => 0]))
        {
            return response()->json([
                'status'    => 'success',
                'message'   => 'Package was changed to un-popular'
            ]);
        }
        else
        {
            return response()->json([
                'status'    => 'fail',
                'message'   => 'There is some problem to release popular'
            ]);
        }
    }

    /**
     * Store a newly created Package in storage.
     *
     * @param CreatePackageRequest $request
     *
     * @return Response
     */
    public function store(CreatePackageRequest $request)
    {
        $input = $request->all();

        $category_code = Category::find($input['category_id'])->code;

        $package = new Package;
        $package->title = $input['title'];
        $package->category_id = $input['category_id'];
        $package->category_code = $category_code;
        $package->description = $input['description'];
        $package->discount = $input['discount'];
        $package->price_id = $input['price_id'];
        $package->covering_sight = $input['covering_sight'];
        $package->day = $input['days'];
        $package->night = $input['night'];
        $package->accomodation_id = $input['accommodation_id'];
        $package->traveling_date = $input['travelling_date'];
        $package->important_notes = $input['important_notes'];
        if( isset($input['image']) )
        {
            if ($request->hasFile('image')) 
            {
                $path = $request->file('image')->store('public/packages');
                $path = explode("/", $path);
                $count = count($path)-1;
                $package->feature_image = $path[$count];
            }
            else
            {
                $package->feature_image = null;   
            }
        }
        else
        {
            $package->feature_image = null;
        }
        if($package->save())
        {
            $request->session()->flash('msg.success', 'Package has been created successfully');
            $data = [
                'success'=> 1,
                'msg'=>'Package has been created successfully',
                'package'=> $package
            ];
            return response()->json($data);
        }
        else
        {
            $request->session()->flash('msg.error', "Package doesn't created");
            $data = [
                'success'=> 0,
                'msg'=>"Package doesn't created",
                'package'=> $package
            ];
            return response()->json($data);
        }
    }

    /**
     * Display the specified Package.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $package = $this->packageRepository->findWithoutFail($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('packages.index'));
        }

        $data = [
            'package'   => $package
        ];

        return view('packages.show',$data);
    }

    /**
     * Show the form for editing the specified Package.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $package = Package::find($id);

        $accommodation = DB::table('acommodation')->get();
        $category = DB::table('category')->get();
        $price = Price::all();

        if (empty($package)) 
        {
            session()->flash('msg.error', "Package not found");
            return redirect(route('packages.index'));
        }
        
        $data = [
            'package'           => $package,
            'prices'             => $price,
            'accommodations'    => $accommodation,
            'categorys'         => $category
        ];

        return view('packages.edit',$data);

    }

    /**
     * Update the specified Package in storage.
     *
     * @param  int              $id
     * @param UpdatePackageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePackageRequest $request)
    {   
        $input = request()->except(['_token', '_method']);

        $package = Package::find($id);

        if(count($package) > 0)
        {
            $category_code = Category::find($input['category_id'])->code;
            
            $package->title = $input['title'];
            $package->category_id = $input['category_id'];
            $package->category_code = $category_code;
            $package->description = $input['description'];
            $package->discount = $input['discount'];
            $package->price_id = $input['price_id'];
            $package->covering_sight = $input['covering_sight'];
            $package->day = $input['days'];
            $package->night = $input['night'];
            $package->accomodation_id = $input['accommodation_id'];
            $package->traveling_date = $input['travelling_date'];
            $package->important_notes = $input['important_notes'];
            if( isset($input['image']) )
            {
                if ($request->hasFile('image')) 
                {
                    $path = $request->file('image')->store('public/packages');
                    $path = explode("/", $path);
                    $count = count($path)-1;
                    $package->feature_image = $path[$count];
                }
            }
            if($package->save())
            {
                $request->session()->flash('msg.success', 'Package has been updated successfully');
                $data = [
                    'success'=> 1,
                    'msg'=>'Package has been updated successfully',
                    'package'=> $package
                ];
                return response()->json($data);
            }
            else
            {
                $request->session()->flash('msg.error', "Package doesn't created");
                $data = [
                    'success'=> 0,
                    'msg'=>"Package doesn't created",
                    'package'=> $package
                ];
                return response()->json($data);
            }
        }
        else
        {
            $request->session()->flash('msg.error', "Package doesn't exist");
            $data = [
                'success'=> 0,
                'msg'=>"Package doesn't exist",
                'package'=> $package
            ];
            return response()->json($data);
        }
    }

    /**
     * Remove the specified Package from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {

        $package = Package::find($id);

        if (empty($package)) 
        {
            session()->flash('msg.error', "Package not found");
            return redirect(route('packages.index'));
        }

        $package->delete();
        session()->flash('msg.success', 'Package has been deleted successfully');
        return redirect(route('admin.packages.index'));
    }
}
