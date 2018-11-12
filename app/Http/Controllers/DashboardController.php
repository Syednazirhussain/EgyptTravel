<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Package;
use App\Models\Accomodation;
use App\Models\FamousPlaces;
use App\Models\BlogCategory;
use App\Models\Page;
use App\Models\WebSetting;
use App\Models\Price;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Category;
use App\Repositories\BookingRepository;
use Illuminate\Support\Facades\Input;
use Mail;
use DB;

class DashboardController extends Controller
{

    private $bookingRepository;

    public function __construct(BookingRepository $bookingRepo)
    {
        $this->bookingRepository = $bookingRepo;
    }

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
        $packages = Package::where('popular',1)->get();
        $famousPlaces = FamousPlaces::take(4)->get();
        $accomodations = Accomodation::where('recommended',1)->get();
        $pages = Page::all();
        $webSetting = WebSetting::all();
        $categorys = Category::all();

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
            'categorys'         => $categorys,
            'title'             => 'Home'
        ];


        return view('site.home',$data);
    }

    public function page($page_code)
    {
        $packages = Package::take(5)->get();
        $package_nileCruises = Package::where('category_code','nile_cruises')->take(5)->get();
        $famousPlaces = FamousPlaces::take(6)->get();
        $place_categorys = BlogCategory::with('famousPlaces')->paginate(2);
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
            'packages'              => $packages,
            'famousPlaces'          => $famousPlaces,
            'accomodations'         => $accomodations,
            'accomodationImage'     => $accomodationImage,
            'pages'                 => $pages,
            'webSetting'            => $webSetting,
            'place_categorys'       => $place_categorys,
            'package_nileCruises'  =>  $package_nileCruises
        ];

        if($page_code == 'about')
        {
            $data['title']  = 'About';
            return view('site.about',$data);
        }
        elseif ($page_code == 'privacy-policy') 
        {
            $data['title']  = 'Privacy Policy';
            return view('site.privacy_policy',$data);
        }
        elseif ($page_code == 'travel-planner') 
        {
            $data['title']  = 'Travel Planner';
            return view('site.travel-planner',$data);
        }
        elseif ($page_code == 'travel-tip') 
        {
            $data['title']  = 'Travel Tips';
            return view('site.travel-tips',$data);
        }
        elseif ($page_code == 'thing-to-do') 
        {
            $data['title']  = 'Things to do';
            return view('site.thing-to-do',$data);   
        }
        elseif ($page_code == 'travel-help') 
        {
            $data['title']  = 'Travel Help';
            return view('site.travel-help',$data);
        }
        elseif ($page_code == 'privacy-policy') 
        {
            $data['title']  = 'Privacy Policy';
            return view('site.privacy_policy',$data);
        }
        elseif($page_code == 'term-n-condition')
        {
            $data['title']  = 'Terms & condition';
            return view('site.term_condition',$data);
        }
        elseif ($page_code == 'faq')
        {
            $data['title']  = 'FAQ';
            return view('site.faq',$data);
        }
        elseif ($page_code == 'contact') 
        {
            $data['title']  = 'Contact';
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

        $admin_email = User::where('user_role_code','admin')->first()->email;

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

        unset($payload['email']);

        $payload['email'] = $admin_email;

        Mail::send('email.contact_admin' , $payload, function($message) use( $payload ) {
             $message->to($payload['email'])->subject('Acknowledgement');
        });

        $request->session()->flash('msg.error','Your message has been sent.');


        return redirect()->route('site.page',['contact']);
    }

    public function famous_places($famous_place_id)
    {
        $famous_place = FamousPlaces::find($famous_place_id);
        $place_categorys = BlogCategory::with('famousPlaces:id,title,image')->get();

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

        if(!empty($place_categorys))
        {
            $data['place_categorys']  = $place_categorys;
        }

        $data['title']  = $famous_place->title;

        return view('site.famous_places_detail',$data);
    }

    public function popular_package($package_id)
    {
        $package = Package::find($package_id);

        if(empty($package))
        {
            return redirect()->back();
        }

        $packages = Package::take(5)->get();
        $package_nileCruises = Package::where('category_code','nile_cruises')->take(5)->get();
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

        $rooms = Room::all();
        $hotels = Hotel::all();

        $data = [
            'packages'              => $packages,
            'package_nileCruises'   => $package_nileCruises,
            'rooms'                 => $rooms,
            'hotels'                => $hotels,
            'famousPlaces'          => $famousPlaces,
            'accomodations'         => $accomodations,
            'accomodationImage'     => $accomodationImage,
            'pages'                 => $pages,
            'webSetting'            => $webSetting
        ];

        if(!empty($package))
        {
            $data['packageDetail']  = $package;
        }

        $data['title']  = $package->title;

        return view('site.popular_detail',$data);
    }

    public function package_booking(Request $request)
    {
        $input = $request->all();
        $booking = $this->bookingRepository->create($input);

        if(count($booking) > 0)
        {
            $duration =  "Form ".\Carbon\Carbon::parse($booking->start_date)->format('F d, Y')." ";
            $duration .= "To ".\Carbon\Carbon::parse($booking->end_date)->format('F d, Y');

            $data = [
                'name'              => $booking->name,
                'email'             => $booking->email,
                'package'           => $booking->package->title,
                'hotel'             => $booking->hotel->name,
                'duration'          => $duration,
                'room_type'         => ucfirst($booking->room_code),
                'additional_info'   => $booking->additional_info,
            ];

            Mail::send('email.user_booking' , $data, function($message) use( $data ) {
                 $message->to($data['email'])->subject('Acknowledgement');
            });
            if(Mail::failures()) 
            {
                $request->session()->flash('msg.error','There is some problem while generating booking');
                return redirect()->back();
            }

            unset($data['name']);
            unset($data['email']);

            $data['email'] = User::where('user_role_code','admin')->first()->email;
            $data['name'] = User::where('user_role_code','admin')->first()->name;
            $data['url'] = route('admin.bookings.show',[$booking->id]);

            Mail::send('email.admin_booking' , $data, function($message) use( $data ) {
                 $message->to($data['email'])->subject('Acknowledgement');
            });
            if(Mail::failures()) 
            {
                $request->session()->flash('msg.error','There is some problem while generating booking');
                return redirect()->back();
            }

            $request->session()->flash('msg.success','Your detail has been record!');
            return redirect()->back();
        }
        else
        {
            $request->session()->flash('msg.error','There is some problem while generating booking');
            return redirect()->back();
        }
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
            'email' => 'required|email',
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

    public function main_search(Request $request)
    {
        $input = $request->except(['_token']);


        $current_date = date('Y-m-d');
        $query = "select * from package";

        if(!is_null($input['search']))
        {
            if($input['search'] != "0")
            {
                $keyword = $input['search'];
                $query .= " where title like '%".$keyword."%'";
                // $query .= " and covering_sight like '%".$keyword."%'";
                // $query .= " and description like '%".$keyword."%'";
                // $query .= " and important_notes like '%".$keyword."%'";
            }
        }

        if(!is_null($input['month']))
        {
            if($input['month'] != "0")
            {
                $month = $input['month'];
                $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                
                $current_year = date('Y');
                $search_start_date =    date('Y-m-d H:i:s',strtotime($current_year."-".$month."-01"));
                $search_end_date = date('Y-m-d H:i:s',strtotime($current_year."-".$month."-30"));

                if (strpos($query, 'where') !== false) 
                {
                    $query .= " and traveling_date between '".$search_start_date."' and '".$search_end_date."'";
                }
                else
                {
                    $query .= " where traveling_date between '".$search_start_date."' and '".$search_end_date."'";
                }
            }
        }
        else
        {
            if (strpos($query, 'where') !== false) 
            {
                $query .= " and traveling_date >= ".$current_date;
            }
            else
            {
                $query .= " where traveling_date >= ".$current_date;
            }
        }

        if(!is_null($input['category_id']))
        {
            if($input['category_id'] != "0")
            {
                if (strpos($query, 'where') !== false) 
                {
                    $query .= " and category_id = ".$input['category_id'];
                }
                else
                {
                    $query .= " where category_id = ".$input['category_id'];
                }
            }
        }

        if(!is_null($input['duration']))
        {
            if($input['duration'] != "0")
            {
                $duration = Input::get('duration');
                $seprate = explode("-", $duration);

                if(count($seprate) > 1)
                {
                    $min = $seprate[0];
                    $max = $seprate[1];

                    if($min == 12 && $max == 'above')
                    {
                        if (strpos($query, 'where') !== false) 
                        {
                            $query .= " and night > ".$max;
                        }
                        else
                        {
                            $query .= " where night > ".$max;
                        }
                    }
                    else
                    {
                        if (strpos($query, 'where') !== false) 
                        {
                            $query .= " and night between ".$min." and ".$max;
                        }
                        else
                        {
                            $query .= " where night between ".$min." and ".$max;
                        }
                    }
                }
            }


        }

        if(!is_null($input['price']))
        {
            if($input['price'] != "0")
            {
                $price_range = $input['price'];
                $price_arr = explode("-", $price_range);

                if(count($price_arr) > 1)
                {
                    $min = $price_arr[0];        
                    $max = $price_arr[1];
                    $prices_ids = Price::whereBetween('price', [$min, $max])->get(['id']);
                    $ids = [];

                    foreach ($prices_ids as  $price) 
                    {
                        array_push($ids, $price->id);
                    }

                    if(!empty($ids))
                    {
                        $in = implode(",", $ids);
                        if (strpos($query, 'where') !== false) 
                        {
                            $query .= " and price_id in(".$in.")";
                        }
                        else
                        {
                            $query .= " where price_id in(".$in.")";
                        }
                    }
                }
            }
        }

        // check query here for testing manually

        $packages = DB::select($query);
        $famousPlaces = FamousPlaces::take(4)->get();
        $accomodations = Accomodation::where('recommended',1)->get();
        $pages = Page::all();
        $webSetting = WebSetting::all();
        $categorys = Category::all();

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
            'categorys'         => $categorys,
            'title'             => 'Home',
            'search'            => $input
        ];

        return view('site.home',$data);
    }

    public function accomodation()
    {

        $images = [];

        if (Input::has('search'))
        {
            $keyword = Input::get('search');
            $accomodations = Accomodation::where('name','like','%'.$keyword.'%')
                                ->orWhere('address','like','%'.$keyword.'%')
                                ->orWhere('description','like','%'.$keyword.'%')
                                ->paginate(2);

            if(!empty($accomodations))
            {
                foreach ($accomodations as $accomodation) 
                {
                    $imagesFiles = explode("|", $accomodation->gallery_images);

                    if(count($imagesFiles) > 0)
                    {
                        $url = asset('storage/accomodations');
                        $url2 = public_path()."/storage/accomodations";
                        
                        $i = 0;
                        foreach ($imagesFiles as $file) 
                        {
                            $images[$accomodation->id][$i]['name'] = $file;
                            $images[$accomodation->id][$i]['file'] = $url.'/'.$file;
                            $images[$accomodation->id][$i]['size'] = filesize($url2.'/'.$file);
                            $images[$accomodation->id][$i]['type'] = mime_content_type($url2.'/'.$file);
                            $i++;
                        }
                    }
                }
            }


            $search['search'] = $keyword;
        }
        elseif (Input::has('city')) 
        {
            $keyword = Input::get('city');
            $accomodations = Accomodation::where('address','like','%'.$keyword.'%')
                                ->paginate(2);

            if(!empty($accomodations))
            {
                foreach ($accomodations as $accomodation) 
                {
                    $imagesFiles = explode("|", $accomodation->gallery_images);

                    if(count($imagesFiles) > 0)
                    {
                        $url = asset('storage/accomodations');
                        $url2 = public_path()."/storage/accomodations";
                        
                        $i = 0;
                        foreach ($imagesFiles as $file) 
                        {
                            $images[$accomodation->id][$i]['name'] = $file;
                            $images[$accomodation->id][$i]['file'] = $url.'/'.$file;
                            $images[$accomodation->id][$i]['size'] = filesize($url2.'/'.$file);
                            $images[$accomodation->id][$i]['type'] = mime_content_type($url2.'/'.$file);
                            $i++;
                        }
                    }
                }
            }


            $search['city'] = $keyword;   
        }
        else
        {
            $accomodations = Accomodation::paginate(2);
            if(!empty($accomodations))
            {
                foreach ($accomodations as $accomodation) 
                {
                    $imagesFiles = explode("|", $accomodation->gallery_images);

                    if(count($imagesFiles) > 0)
                    {
                        $url = asset('storage/accomodations');
                        $url2 = public_path()."/storage/accomodations";
                        
                        $i = 0;
                        foreach ($imagesFiles as $file) 
                        {
                            $images[$accomodation->id][$i]['name'] = $file;
                            $images[$accomodation->id][$i]['file'] = $url.'/'.$file;
                            $images[$accomodation->id][$i]['size'] = filesize($url2.'/'.$file);
                            $images[$accomodation->id][$i]['type'] = mime_content_type($url2.'/'.$file);
                            $i++;
                        }
                    }
                }
            }


            $search = [];
        }

        $packages = Package::all();
        $famousPlaces = FamousPlaces::take(6)->get();
        $pages = Page::all();
        $webSetting = WebSetting::all();

        $recommended_hotels = Accomodation::where('recommended',1)->get();


        $accomodationImage = [];
        foreach ($accomodations as $accomodation) 
        {   
            $imageArr = explode("|", $accomodation->gallery_images);
            if(!empty($imageArr))
            {
                $accomodationImage[$accomodation->id] = $imageArr[0];
            }
        }

        $recommendedImages = [];
        foreach ($recommended_hotels as $recommended_hotel) 
        {   
            $imageArr = explode("|", $recommended_hotel->gallery_images);
            if(!empty($imageArr))
            {
                $recommendedImages[$recommended_hotel->id] = $imageArr[0];
            }
        }


        $data = [
            'packages'          => $packages,
            'famousPlaces'      => $famousPlaces,
            'accomodations'     => $accomodations,
            'accomodationImage' => $accomodationImage,
            'recommendedImages'  => $recommendedImages,
            'pages'             => $pages,
            'webSetting'        => $webSetting,
            'recommended_hotels'=> $recommended_hotels,
            'search'            => $search,
            'title'             => 'Accomodation'
        ];

        if(!empty($images))
        {
            $data['images'] = $images;
        }

        return view('site.accomodation',$data);
    }

    public function nile_curises()
    {
        $current_date = date('Y-m-d');
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
        elseif (Input::has('type')) 
        {
            if(Input::get('type') == 'nile_cruises')
            {
                $min = Input::get('from');
                $max = Input::get('to');

                $prices_ids = Price::whereBetween('price', [$min, $max])->get(['id']);
                $ids = [];

                foreach ($prices_ids as  $price) 
                {
                    array_push($ids, $price->id);
                }

                $packages = Package::where('category_code','nile_cruises')
                                    ->where('traveling_date','>=',$current_date)
                                    ->whereIn('price_id', $ids)
                                    ->paginate(2);
                $search = [];
            }
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
            $search['price'] = $price_range;
        }
        elseif (Input::has('price_level')) 
        {
            $price = Input::get('price_level');
            $max =  Price::max('price');

            $price_id = Price::where('price',$price)->first()->id;

            $packages = Package::where('category_code','nile_cruises')
                                ->where('traveling_date','>=',$current_date)
                                ->where('price_id', $price_id)
                                ->paginate(2);

            $search['price_level'] = $price;
            
            if($price == $max)
            {
                $search['price_level_text'] = "Highest price";
            }
            else
            {
                $search['price_level_text'] = "Lowest price";
            }

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
                    $search['month'] = $count;
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
            $search['night'] = $night;
        }
        else
        {

            $packages = Package::where('category_code','nile_cruises')
                                ->where('traveling_date','>=',$current_date)
                                ->paginate(2);
            $search = [];
        }

        $max =  Price::max('price');
        $min =  Price::min('price');

        $priceLevel = [
            'min'   => $min,
            'max'   => $max 
        ];

        $popular_nileCruises = Package::where('category_code','nile_cruises')
                                        ->where('popular',1)
                                        ->get();

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
            'packages'              => $packages,
            'popular_nileCruises'   => $popular_nileCruises,
            'famousPlaces'          => $famousPlaces,
            'accomodations'         => $accomodations,
            'accomodationImage'     => $accomodationImage,
            'pages'                 => $pages,
            'webSetting'            => $webSetting,
            'search'                => $search,
            'priceLevel'            => $priceLevel,
            'title'                 => 'Nile Cruises'
        ];

        return view('site.nile_cruises',$data);
    }

    public function tour_package()
    {

        $current_date = date('Y-m-d');
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
            $search['price'] = $price_range;
        }
        elseif (Input::has('type')) 
        {
            if(Input::get('type') == 'tour_packages')
            {
                $min = Input::get('from');
                $max = Input::get('to');

                $prices_ids = Price::whereBetween('price', [$min, $max])->get(['id']);
                $ids = [];
                
                foreach ($prices_ids as  $price) 
                {
                    array_push($ids, $price->id);
                }

                $packages = Package::where('traveling_date','>=',$current_date)
                                    ->whereIn('price_id', $ids)
                                    ->paginate(2);
                $search = [];
            }
        }
        elseif (Input::has('price_level')) 
        {
            $price = Input::get('price_level');
            $max =  Price::max('price');

            $price_id = Price::where('price',$price)->first()->id;

            $packages = Package::where('traveling_date','>=',$current_date)
                                ->where('price_id', $price_id)
                                ->paginate(2);
            $search['price_level'] = $price;

            
            if($price == $max)
            {
                $search['price_level_text'] = "Highest price";
            }
            else
            {
                $search['price_level_text'] = "Lowest price";
            }

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
                    $search['month'] = $count;
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
            $search['night'] = $night;
        }
        else
        {
            $packages = Package::where('traveling_date','>=',$current_date)->paginate(2);
            $search = [];
        }

        $popular_packages = Package::where('traveling_date','>=',$current_date)
                                    ->where('category_code','!=','nile_cruises')
                                    ->where('popular',1)
                                    ->get();

        $max =  Price::max('price');
        $min =  Price::min('price');

        $priceLevel = [
            'min'   => $min,
            'max'   => $max 
        ];

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
            'popular_packages'  => $popular_packages,
            'famousPlaces'      => $famousPlaces,
            'accomodations'     => $accomodations,
            'accomodationImage' => $accomodationImage,
            'pages'             => $pages,
            'webSetting'        => $webSetting,
            'prices'            => $prices,
            'search'            => $search,
            'priceLevel'        => $priceLevel,
            'title'             => 'Tour Packages'
        ];

        return view('site.tour_packages',$data);
    }

}
