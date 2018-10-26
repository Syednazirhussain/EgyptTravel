<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Package;
use App\Models\Accomodation;
use App\Models\FamousPlaces;
use App\Models\Page;
use App\Models\WebSetting;

class DashboardController extends Controller
{
    public function dashboard()
    {
    	$users = User::take(5)->get();
    	$packages = Package::take(5)->get();
    	$accomodations = Accomodation::take(5)->get();
    	$famousPlaces = FamousPlaces::take(5)->get();


    	$counts = [
    		'users' 		=> User::all()->count(),
    		'packages'		=> Package::all()->count(),
    		'accomodations'	=> Accomodation::all()->count(),
    		'famousPlaces'	=> FamousPlaces::all()->count()
    	];

        $accomodationImage = [];

        foreach ($accomodations as $accomodation) 
        {   
            $imageArr = explode("|", $accomodation->gallery_images);
            if(!empty($imageArr))
            {
                $accomodationImage[$accomodation->id] = $imageArr[0];
            }
        }

    	$data = [
    		'users'				=> $users,
    		'packages'			=> $packages,
    		'accomodations'		=> $accomodations,
            'accomodationImage' => $accomodationImage,
    		'famousPlaces'		=> $famousPlaces,
    		'counts'			=> $counts
    	];

    	return view('dashboard.index',$data);
    }


    public function visitSite()
    {
        $packages = Package::all();
        $famousPlaces = FamousPlaces::take(6)->get();
        $accomodations = Accomodation::all();
        $pages = Page::all();
        $webSetting = WebSetting::all();

        $accomodationImage = [];

        foreach ($accomodations as $accomodation) 
        {   
            $imageArr = explode("|", $accomodation->gallery_images);
            if(!empty($imageArr))
            {
                $accomodationImage[$accomodation->id] = $imageArr[0];
            }
        }

        $data = [
            'packages'          => $packages,
            'famousPlaces'      => $famousPlaces,
            'accomodations'     => $accomodations,
            'accomodationImage' => $accomodationImage,
            'pages'             => $pages,
            'webSetting'        => $webSetting
        ];


        return view('site.home',$data);
    }

    public function about()
    {
        $packages = Package::all();
        $famousPlaces = FamousPlaces::take(6)->get();
        $accomodations = Accomodation::all();
        $pages = Page::all();
        $webSetting = WebSetting::all();

        $accomodationImage = [];

        foreach ($accomodations as $accomodation) 
        {   
            $imageArr = explode("|", $accomodation->gallery_images);
            if(!empty($imageArr))
            {
                $accomodationImage[$accomodation->id] = $imageArr[0];
            }
        }

        $data = [
            'packages'          => $packages,
            'famousPlaces'      => $famousPlaces,
            'accomodations'     => $accomodations,
            'accomodationImage' => $accomodationImage,
            'pages'             => $pages,
            'webSetting'        => $webSetting
        ];

        return view('site.about',$data);
    }

    public function accomodation()
    {
        $packages = Package::all();
        $famousPlaces = FamousPlaces::take(6)->get();
        $accomodations = Accomodation::all();
        $pages = Page::all();
        $webSetting = WebSetting::all();

        $accomodationImage = [];

        foreach ($accomodations as $accomodation) 
        {   
            $imageArr = explode("|", $accomodation->gallery_images);
            if(!empty($imageArr))
            {
                $accomodationImage[$accomodation->id] = $imageArr[0];
            }
        }

        $data = [
            'packages'          => $packages,
            'famousPlaces'      => $famousPlaces,
            'accomodations'     => $accomodations,
            'accomodationImage' => $accomodationImage,
            'pages'             => $pages,
            'webSetting'        => $webSetting
        ];

        return view('site.accomodation',$data);
    }

    public function nile_curises()
    {
        $packages = Package::where('category_code','nile_cruises')->get();
        $famousPlaces = FamousPlaces::take(6)->get();
        $accomodations = Accomodation::all();
        $pages = Page::all();
        $webSetting = WebSetting::all();

        $accomodationImage = [];

        foreach ($accomodations as $accomodation) 
        {   
            $imageArr = explode("|", $accomodation->gallery_images);
            if(!empty($imageArr))
            {
                $accomodationImage[$accomodation->id] = $imageArr[0];
            }
        }

        $data = [
            'packages'          => $packages,
            'famousPlaces'      => $famousPlaces,
            'accomodations'     => $accomodations,
            'accomodationImage' => $accomodationImage,
            'pages'             => $pages,
            'webSetting'        => $webSetting
        ];

        return view('site.nile_cruises',$data);
    }


    public function tour_package()
    {
        $packages = Package::all();
        $famousPlaces = FamousPlaces::take(6)->get();
        $accomodations = Accomodation::all();
        $pages = Page::all();
        $webSetting = WebSetting::all();

        $accomodationImage = [];

        foreach ($accomodations as $accomodation) 
        {   
            $imageArr = explode("|", $accomodation->gallery_images);
            if(!empty($imageArr))
            {
                $accomodationImage[$accomodation->id] = $imageArr[0];
            }
        }

        $data = [
            'packages'          => $packages,
            'famousPlaces'      => $famousPlaces,
            'accomodations'     => $accomodations,
            'accomodationImage' => $accomodationImage,
            'pages'             => $pages,
            'webSetting'        => $webSetting
        ];

        return view('site.tour_packages',$data);
    }


    public function package_show($package_id)
    {
        $package = Package::find($package_id);
        if(!empty($package))
        {
            $data = [
                'status'    => 'success',
                'payload'   => $package
            ];
            return response()->json($data);
        }
        else
        {
            $data = [
                'status'    => 'success',
                'payload'   => $package
            ];
            return response()->json($data);
        }
    }

    public function package_contact(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|max:15|min:11'
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
            $input = $request->all();
            print_r($input);
        }

    }







}
