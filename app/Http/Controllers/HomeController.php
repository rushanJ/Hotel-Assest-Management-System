<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Booking;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($id=Auth::user()->role->id);
        if ($id=Auth::user()->role->id==2){
        $id=Auth::user()->id;
        $cleans_list = \DB::select("SELECT `cleans`.`id`,`rooms`.`room_number`, `cleans`. `date`, `cleans`.`remarks`, `cleans`.`status`, `cleans`.`created_at`, `cleans`.`updated_at` FROM `cleans`,`rooms` WHERE `cleans`.`room_id`=`rooms`.`id` AND `cleans`.`user_id`=$id ORDER BY `status`;");

        return view('home', compact('cleans_list'));
        }
        else {
            $end =  date('Y-m-d');
            $start = date('Y-m-d',(strtotime ( '-30 day' , strtotime ( $end) ) ));
            
            
            $booking_info = DB::table('bookings')
                 ->select('created_at', DB::raw('count(*) as total'))
                 ->groupBy('created_at')
                 ->whereBetween('created_at', [$start, $end])
                 ->get();

            $id=Auth::user()->id;
            $cleans_list = \DB::select("SELECT `cleans`.`id`,`rooms`.`room_number`, `cleans`. `date`, `cleans`.`remarks`, `cleans`.`status`, `cleans`.`created_at`, `cleans`.`updated_at` FROM `cleans`,`rooms` WHERE `cleans`.`room_id`=`rooms`.`id` AND `cleans`.`user_id`=$id ORDER BY `status`;");
    
            $labelBookings = [];
            $dataBooking = [];
            foreach ($booking_info as $booking) array_push($dataBooking,  $booking->total);
            foreach ($booking_info as $booking) array_push($labelBookings,  $booking->created_at);
       
            return view('admin/home', compact('dataBooking','labelBookings'));

        }
        // return view('home');
    }
}
