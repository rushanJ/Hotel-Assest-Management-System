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
use App\Service;

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
            
            
            $booking_info = DB::table('cleans')
                 ->select('date','type', DB::raw('count(date) as total'))
                 ->groupBy('date','type')
                 ->whereBetween('date', [$start, $end])
                //  ->where('type', "CLEAN")
                 ->get();

            // dd($booking_info);

            $id=Auth::user()->id;
            $cleansBy_list = \DB::select("SELECT `cleans`.`id`,`rooms`.`room_number`, `cleans`. `date`, `cleans`.`remarks`, `cleans`.`status`,`cleans`.`type`, `cleans`.`created_at`, `cleans`.`updated_at`, `users`.`name` FROM `cleans`,`rooms`,`users` WHERE `cleans`.`room_id`=`rooms`.`id` AND `cleans`.`user_id`=`users`.`id` AND `cleans`.`date`='$end' ORDER BY `type`;");
            $items = Item::all();
            $user = User::all();
            $services = Service::where(['status' => 'PENDING']) ->get();
            // dd($services[0]);
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

            
           
            $labelCleanings = [];
            $dataCleaning = [];
            
            foreach ($booking_info as $data) if ( $data->type=='CLEAN') array_push($dataCleaning,  $data->total);
            foreach ($booking_info as $data) if ( $data->type=='CLEAN') array_push($labelCleanings,  $data->date);
            $clean_chart_list=[];
            $pointer=[];
            for ($i = 0; $i < count($labelCleanings); $i++) {
                // echo ;
                $date= date("d", strtotime($labelCleanings[$i]));
                $pointer=[$date,$dataCleaning[$i]];
                $pointer = '['.implode(",", $pointer).']';
                array_push($clean_chart_list,  $pointer);
                
            }

            // dd($bookings);
            $clean_chart_list = '['.implode(",", $clean_chart_list).']';
            $labelCleanings = '['.implode(",", $labelCleanings).']';



            $labelPlumbings = [];
            $dataPlumbing = [];
            
            foreach ($booking_info as $data) if ( $data->type=='PLUMBING') array_push($dataPlumbing,  $data->total);
            foreach ($booking_info as $data) if ( $data->type=='PLUMBING') array_push($labelPlumbings,  $data->date);
            $plumbing_chart_list=[];
            $pointer=[];
            for ($i = 0; $i < count($labelPlumbings); $i++) {
                // echo ;
                $date= date("d", strtotime($labelPlumbings[$i]));
                $pointer=[$date,$dataPlumbing[$i]];
                $pointer = '['.implode(",", $pointer).']';
                array_push($plumbing_chart_list,  $pointer);
                
            }

            // dd($bookings);
            $plumbing_chart_list = '['.implode(",", $plumbing_chart_list).']';
            $labelPlumbings = '['.implode(",", $labelPlumbings).']';
           

            $labelMechanicals = [];
            $dataMechanical = [];
            
            foreach ($booking_info as $data) if ( $data->type=='MECHANICAL') array_push($dataMechanical,  $data->total);
            foreach ($booking_info as $data) if ( $data->type=='MECHANICAL') array_push($labelMechanicals,  $data->date);
            $mechanical_chart_list=[];
            $pointer=[];
            for ($i = 0; $i < count($labelMechanicals); $i++) {
                // echo ;
                $date= date("d", strtotime($labelMechanicals[$i]));
                $pointer=[$date,$dataMechanical[$i]];
                $pointer = '['.implode(",", $pointer).']';
                array_push($mechanical_chart_list,  $pointer);
                
            }

            // dd($bookings);
            $mechanical_chart_list = '['.implode(",", $mechanical_chart_list).']';
            $labelMechanicals = '['.implode(",", $labelMechanicals).']';
           
            
            $labelElectricals = [];
            $dataElectrical = [];
            
            foreach ($booking_info as $data) if ( $data->type=='ELECTICAL') array_push($dataElectrical,  $data->total);
            foreach ($booking_info as $data) if ( $data->type=='ELECTICAL') array_push($labelElectricals,  $data->date);
            $electrical_chart_list=[];
            $pointer=[];
            for ($i = 0; $i < count($labelElectricals); $i++) {
                // echo ;
                $date= date("d", strtotime($labelElectricals[$i]));
                $pointer=[$date,$dataElectrical[$i]];
                $pointer = '['.implode(",", $pointer).']';
                array_push($electrical_chart_list,  $pointer);
                
            }

            // dd($bookings);
            $electrical_chart_list = '['.implode(",", $electrical_chart_list).']';
            $labelElectricals = '['.implode(",", $labelElectricals).']';
           
            // dd($plumbing_chart_list);
            return view('admin/home', compact('dataCleaning','labelCleanings','labelPlumbings','items','user','lastMonthBookings','availableSmsBaLANCE','cleansBy_list','clean_chart_list','plumbing_chart_list','mechanical_chart_list','electrical_chart_list','items', 'services'));

        }
        // return view('home');
    }
}
