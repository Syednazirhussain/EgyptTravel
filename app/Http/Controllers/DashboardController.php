<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Package;
use App\Models\Accomodation;
use App\Models\FamousPlaces;
use App\Models\Page;
use App\Models\WebSetting;
use App\Models\Price;
use Illuminate\Support\Facades\Input;
use Mail;
use DB;

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

    public function page($page_code)
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

        if($page_code == 'about')
        {
            return view('site.about',$data);
        }
        elseif ($page_code == 'privacy-policy') 
        {
            return view('site.privacy_policy',$data);
        }
        elseif ($page_code == 'travel-planner') 
        {
            return view('site.thing-to-do',$data);
        }
        elseif ($page_code == 'travel-tip') 
        {
            return view('site.travel-tips',$data);
        }
        elseif ($page_code == 'travel-help') 
        {
            return view('site.travel-help',$data);
        }
        elseif ($page_code == 'privacy-policy') 
        {
            return view('site.privacy_policy',$data);
        }
        elseif($page_code == 'term-n-condition')
        {
            return view('site.term_condition',$data);
        }
        elseif ($page_code == 'faq')
        {
            return view('site.faq',$data);
        }
        elseif ($page_code == 'contact') 
        {
            return view('site.contact',$data);
        }
        else
        {
            return redirect()->back();
        }
    }

    public function contact(Request $request)
    {
        $this->validate($request,[
            'f_name' => 'required|max:45',
            'l_name' => 'required|max:45',
            'email' => 'required|email',
            'phone' => 'required|max:15|min:11',
            'message' => 'required'
        ]);

        $input = $request->except(['_token']);

        $payload = [
            'f_name'    => $input['f_name'],
            'l_name'    => $input['l_name'],
            'phone'    => $input['phone'],
            'email'     => $input['email'],
            'query'   => $input['message']
        ];


        Mail::send('email.contact' , $payload, function($message) use( $payload ) {
             $message->to($payload['email'])->subject('Acknowledgement');
        });

        $request->session()->flash('msg.error','Your message has been sent.');


        return redirect()->route('site.page',['contact']);

    }


    public function famous_places($famous_place_id)
    {
        $famous_place = FamousPlaces::find($famous_place_id);

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

        if(!empty($famous_place))
        {
            $data['famousPlaceDetail']  = $famous_place;
        }

        return view('site.famous_places_detail',$data);
    }

    public function popular_package($package_id)
    {
        $package = Package::find($package_id);

        if(empty($package))
        {
            return redirect()->back();
        }

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

        if(!empty($package))
        {
            $data['packageDetail']  = $package;
        }

        return view('site.popular_detail',$data);
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
            $package = Package::find($input['package_id']);

            $admin = User::where('user_role_code','admin')->first();

            $emails = [
                $input['email'],
                $admin->email
            ];

            $payload = [
                'package_title'     => $package->title,
                'price_title'       => $package->prices->title,
                'price_label'       => $package->prices->label,
                'price_amount'      => $package->prices->price,
                'description'       => $package->description,
                'category_code'     => $package->category_code,
                'covering_sight'    => $package->covering_sight,
                'discount'          => $package->discount,
                'travelling_dates'  => $package->traveling_date,
                'day'               => $package->day,
                'night'             => $package->night,
                'accomodation_name' => ""
            ];



            foreach ($emails as $email) 
            {
                if($admin->email == $email)
                {
                    $payload['name'] = $admin->name;
                    if(isset($payload['email']))
                    {
                        unset($payload['email']);
                    }
                    $payload['email'] = $email;
                    $payload['phone'] = $input['mobile'];
                    $payload['user_email'] = $input['email'];

                    Mail::send('email.admin_package_contact' , $payload, function($message) use( $payload ) {
                         $message->to($payload['email'])->subject('Acknowledgement');
                    });
                }
                else
                {   
                    if(isset($payload['email']))
                    {
                        unset($payload['email']);
                    }
                    $payload['email'] = $email;

                    Mail::send('email.user_package_contact' ,$payload, function($message) use ($payload){
                         $message->to($payload['email'])->subject('Acknowledgement');
                    });
                }
            }

            $data = [
                'status'    => 'success',
                'payload'   => $input
            ];

            return response()->json($data);

        }
    }

    public function accomodation()
    {
        if (Input::has('search'))
        {
            $keyword = Input::get('search');
            $accomodations = Accomodation::where('name','like','%'.$keyword.'%')
                                ->orWhere('address','like','%'.$keyword.'%')
                                ->paginate(2);
            $search['search'] = $keyword;
        }
        else
        {
            $accomodations = Accomodation::paginate(2);
            $search = [];
        }

        $packages = Package::all();
        $famousPlaces = FamousPlaces::take(6)->get();
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
            'webSetting'        => $webSetting,
            'search'            => $search
        ];

        return view('site.accomodation',$data);
    }

    public function nile_curises()
    {
        if (Input::has('search'))
        {
            $keyword = Input::get('search');

            $packages = Package::where('category_code','nile_cruises')
                                ->where('title','like','%'.$keyword.'%')
                                ->orWhere('category_code','like','%'.$keyword.'%')
                                ->orWhere('covering_sight','like','%'.$keyword.'%')
                                ->paginate(2);

            $search['search'] = $keyword;
        }
        elseif (Input::has('price')) 
        {
            $price_range = Input::get('price');
            $price_arr = explode("-", $price_range);
            $min = $price_arr[0];        
            $max = $price_arr[1];
            $prices_ids = Price::whereBetween('price', [$min, $max])->get(['id']);
            $ids = [];
            foreach ($prices_ids as  $price) 
            {
                array_push($ids, $price->id);
            }
            $packages = Package::whereIn('price_id', $ids)
                        ->where('category_code','nile_cruises')
                        ->paginate(2);
            $search['price'] = "price in ".$price_range;
        }
        elseif (Input::has('month')) 
        {
            $month = Input::get('month');
            $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            $current_year = date('Y');
            $search_start_date = $current_year."-".$month."-01";
            $search_end_date = $current_year."-".$month."-30";
            $packages = Package::whereBetween('traveling_date',[$search_start_date,$search_end_date])
                        ->where('category_code','nile_cruises')
                        ->paginate(2);
            $count = 1;
            foreach ($months as  $value) {
                if($month == $count)
                {
                    $search['month'] = "Month of ".$value;
                }
                $count++;
            }
        }
        elseif (Input::has('night')) 
        {
            $night = Input::get('night');
            $seprate = explode("-", $night);

            $min = $seprate[0];
            $max = $seprate[1];
            if($min == 12 && $max == 'above')
            {
                $packages = Package::where('night','>=',$min)
                                    ->where('category_code','nile_cruises')
                                    ->paginate(2);
            }
            else
            {
                $packages = Package::whereBetween('night',[$min,$max])
                                    ->where('category_code','nile_cruises')
                                    ->paginate(2);
            }
            $search['night'] = "Night in ".$night;
        }
        else
        {
            $current_date = date('Y-m-d');
            $packages = Package::where('category_code','nile_cruises')
                                ->where('traveling_date','>=',$current_date)
                                ->paginate(2);
            $search = [];
        }

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
            'webSetting'        => $webSetting,
            'search'            => $search
        ];

        return view('site.nile_cruises',$data);
    }


    public function tour_package()
    {
        if (Input::has('search'))
        {
            $keyword = Input::get('search');

            $packages = Package::where('title','like','%'.$keyword.'%')
                                ->orWhere('category_code','like','%'.$keyword.'%')
                                ->orWhere('covering_sight','like','%'.$keyword.'%')
                                ->paginate(2);
            $search['search'] = $keyword;
        }
        elseif (Input::has('price')) 
        {
            $price_range = Input::get('price');
            $price_arr = explode("-", $price_range);
            $min = $price_arr[0];        
            $max = $price_arr[1];
            $prices_ids = Price::whereBetween('price', [$min, $max])->get(['id']);
            $ids = [];
            foreach ($prices_ids as  $price) 
            {
                array_push($ids, $price->id);
            }
            $packages = Package::whereIn('price_id', $ids)->paginate(2);
            $search['price'] = "price in ".$price_range;
        }
        elseif (Input::has('month')) 
        {
            $month = Input::get('month');
            $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            $current_year = date('Y');
            $search_start_date = $current_year."-".$month."-01";
            $search_end_date = $current_year."-".$month."-30";
            $packages = Package::whereBetween('traveling_date',[$search_start_date,$search_end_date])->paginate(2);
            $count = 1;
            foreach ($months as  $value) {
                if($month == $count)
                {
                    $search['month'] = "Month of ".$value;
                }
                $count++;
            }
        }
        elseif (Input::has('night')) 
        {
            $night = Input::get('night');
            $seprate = explode("-", $night);

            $min = $seprate[0];
            $max = $seprate[1];
            if($min == 12 && $max == 'above')
            {
                $packages = Package::where('night','>=',$min)->paginate(2);
            }
            else
            {
                $packages = Package::whereBetween('night',[$min,$max])->paginate(2);
            }
            $search['night'] = "Night in ".$night;
        }
        else
        {
            $current_date = date('Y-m-d');
            $packages = Package::where('traveling_date','>=',$current_date)->paginate(2);
            $search = [];
        }

        $prices = Price::all();
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
            'webSetting'        => $webSetting,
            'prices'            => $prices,
            'search'            => $search
        ];
        return view('site.tour_packages',$data);
    }

}
