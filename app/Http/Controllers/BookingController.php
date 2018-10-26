<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Repositories\BookingRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Package;
use App\Models\Hotel;
use App\Models\Room;

use Mail;
use Auth;

class BookingController extends Controller
{
    /** @var  BookingRepository */
    private $bookingRepository;

    public function __construct(BookingRepository $bookingRepo)
    {
        $this->bookingRepository = $bookingRepo;
    }

    /**
     * Display a listing of the Booking.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bookingRepository->pushCriteria(new RequestCriteria($request));
        $bookings = $this->bookingRepository->all();

        //public_html/EgyptTravel/public/storage

        return view('bookings.index')->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new Booking.
     *
     * @return Response
     */
    public function create()
    {
        $packages = Package::all();
        $rooms = Room::all();
        $hotels = Hotel::all();

        $data = [
            'packages'   => $packages,
            'rooms'     => $rooms,
            'hotels'    => $hotels
        ];

        return view('bookings.create',$data);
    }

    /**
     * Store a newly created Booking in storage.
     *
     * @param CreateBookingRequest $request
     *
     * @return Response
     */
    public function store(CreateBookingRequest $request)
    {
        $input = $request->all();

        $booking = $this->bookingRepository->create($input);

        if(count($booking) > 0)
        {
            $duration =  "Form ".\Carbon\Carbon::parse($booking->start_date)->format('F d, Y')." ";
            $duration .= "To ".\Carbon\Carbon::parse($booking->end_date)->format('F d, Y');

            $url = route('admin.bookings.show',[$booking->id]);

            $emails = [
                $booking->email,
                Auth::user()->email
            ];

            $data = [
                'name'              => $booking->name,
                'package'           => $booking->package->title,
                'hotel'             => $booking->hotel->name,
                'duration'          => $duration,
                'room_type'         => ucfirst($booking->room_code),
                'additional_info'   => $booking->additional_info,
                'url'               => $url
            ];

            foreach ($emails as $email) 
            {
                if(Auth::user()->email == $email)
                {
                    if(isset($data['email']))
                    {
                        unset($data['email']);
                    }
                    $data['email'] = $email;
                    Mail::send('email.admin_booking' , $data, function($message) use( $data ) {
                         $message->to($data['email'])->subject('Acknowledgement');
                    });
                    if(Mail::failures()) 
                    {
                        $request->session()->flash('msg.error','There is some problem while generating booking');
                        return redirect(route('admin.bookings.index'));
                    }
                }
                else
                {
                    if(isset($data['email']))
                    {
                        unset($data['email']);
                    }
                    $data['email'] = $email;
                    Mail::send('email.user_booking' , $data, function($message) use( $data ) {
                         $message->to($data['email'])->subject('Acknowledgement');
                    });
                    if(Mail::failures()) 
                    {
                        $request->session()->flash('msg.error','There is some problem while generating booking');
                        return redirect(route('admin.bookings.index'));
                    }
                }
            }
            $request->session()->flash('msg.success','Booking has been created successfully');
            return redirect(route('admin.bookings.index'));
        }
        else
        {
            $request->session()->flash('msg.error','There is some problem while generating booking');
            return redirect(route('admin.bookings.index'));
        }
    }

    /**
     * Display the specified Booking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            session()->flash('msg.error','Booking not found');
            return redirect(route('admin.bookings.index'));
        }

        return view('bookings.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified Booking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $packages = Package::all();
        $rooms = Room::all();
        $hotels = Hotel::all();
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) 
        {
            session()->flash('msg.error','Booking not found');
            return redirect(route('admin.bookings.index'));
        }

        $data = [
            'booking'   => $booking,
            'packages'  => $packages,
            'rooms'     => $rooms,
            'hotels'    => $hotels
        ];

        return view('bookings.edit',$data);
    }

    /**
     * Update the specified Booking in storage.
     *
     * @param  int              $id
     * @param UpdateBookingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookingRequest $request)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) 
        {
            session()->flash('msg.error','Booking not found');
            return redirect(route('admin.bookings.index'));
        }

        $booking = $this->bookingRepository->update($request->all(), $id);

        $request->session()->flash('msg.success','Booking has updated successfully');

        return redirect(route('admin.bookings.index'));
    }

    /**
     * Remove the specified Booking from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            session()->flash('msg.error','Booking not found');
            return redirect(route('admin.bookings.index'));
        }

        $this->bookingRepository->delete($id);

        session()->flash('msg.success','Booking has deleted successfully');

        return redirect(route('admin.bookings.index'));
    }
}
