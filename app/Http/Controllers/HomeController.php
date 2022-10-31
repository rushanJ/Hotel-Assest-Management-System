<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Booking;
use App\Item;
use App\Customer;
use App\User;
// use App\Booking;
// use App\Item;
// 
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
        if ($id=Auth::user()->role->id!=1){
            $id=Auth::user()->id;
          
            $cleans_list = \DB::select("SELECT `cleans`.`id`,`rooms`.`room_number`, `cleans`. `date`, `cleans`.`remarks`, `cleans`.`status`, `cleans`.`created_at`, `cleans`.`updated_at` FROM `cleans`,`rooms` WHERE `cleans`.`room_id`=`rooms`.`id` AND `cleans`.`user_id`=$id ORDER BY `status` DESC;");
            //   dd($cleans_list);
            return view('home', compact('cleans_list'));
        }
        else {
            $end =  date('Y-m-d');
            $start = date('Y-m-d',(strtotime ( '-30 day' , strtotime ( $end) ) ));
            
            
            $booking_info = DB::table('bookings')
                 ->select('time_from', DB::raw('count(time_from) as total'))
                 ->groupBy('time_from')
                 ->whereBetween('time_from', [$start, $end])
                 ->get();

            // dd($booking_info);

            $id=Auth::user()->id;
            $cleansBy_list = \DB::select("SELECT `cleans`.`id`,`rooms`.`room_number`, `cleans`. `date`, `cleans`.`remarks`, `cleans`.`status`,`cleans`.`type`, `cleans`.`created_at`, `cleans`.`updated_at`, `users`.`name` FROM `cleans`,`rooms`,`users` WHERE `cleans`.`room_id`=`rooms`.`id` AND `cleans`.`user_id`=`users`.`id` AND `cleans`.`date`='$end' ORDER BY `type`;");
            $items = Item::all();
            $user = User::all();
            $lastMonthBookings = DB::table('bookings')
            ->select('*')
            ->whereBetween('created_at', [$start, $end])
            ->get();

            try {
                $client = new \GuzzleHttp\Client();
                $response  =$client->request('GET', 'https://app.notify.lk/api/v1/status', [
                    'query' => ['user_id' => '23643','api_key' => 'Dq6KcyMvbKVDt104JW26']
                ]);
                $decodedText = html_entity_decode($response->getBody());
                $myArray = json_decode($decodedText, true);
                $availableSmsBaLANCE=$myArray['data']['acc_balance'];
              
                } 
                catch (Swift_TransportException $e) {
                    $availableSmsBaLANCE="UNKNOWN";
                    echo $e->getMessage();
                }

            
           
            $labelBookings = [];
            $dataBooking = [];
            foreach ($booking_info as $booking) array_push($dataBooking,  $booking->total);
            foreach ($booking_info as $booking) array_push($labelBookings,  $booking->time_from);
            $bookings=[];
            $pointer=[];
            for ($i = 0; $i < count($labelBookings); $i++) {
                // echo ;
                $date= date("d", strtotime($labelBookings[$i]));
                $pointer=[$date,$dataBooking[$i]];
                $pointer = '['.implode(",", $pointer).']';
                array_push($bookings,  $pointer);
                
            }

            // dd($bookings);
            $bookings = '['.implode(",", $bookings).']';
            $labelBookings = '['.implode(",", $labelBookings).']';
            // dd($bookings);
            return view('admin/home', compact('dataBooking','labelBookings','items','user','lastMonthBookings','availableSmsBaLANCE','cleansBy_list','bookings','items'));

        }
        // return view('home');
    }
}
