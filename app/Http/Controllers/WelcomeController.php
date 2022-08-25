<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoomsRequest;
use App\Http\Requests\Admin\UpdateRoomsRequest;
use App\Category;
use App\Customer;
use App\Booking;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreBookingsRequest;


class WelcomeController extends Controller
{
   
        /**
         * Display a listing of Room.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $categories = Category::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
            return view('user.home',compact('categories'));
        }

        public function about()
        {
            return view('user.about');
        }

        public function contact()
        {
            return view('user.contact');
        }

        public function home_rooms(Request $request)
        {
            $time_from = $request->input('startDate');
            $time_to = $request->input('endDate');
            $dataset = Room::with('booking')->whereHas('booking', function ($q) use ($time_from, $time_to) {
                $q->where(function ($q2) use ($time_from, $time_to) {
                    $q2->where('time_from', '>=', $time_to)
                       ->orWhere('time_to', '<=', $time_from);
                });
            })->orWhereDoesntHave('booking')->get();
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');
            $count = $request->input('count');
            $type = $request->input('type');
            return view('user.rooms',compact('dataset','startDate','endDate','count','type'));
        }
    
        public function rooms_single(Request $request)
        {
            $id = $request->input('id');
            $bookings = \App\Booking::where('room_id', $id)->get();

            $room = Room::findOrFail($id);
            // $cat = Category::findOrFail($room['catogory']);

             $cat = Category::where("id", $room['category_id'])->first();
            //  $from = date('Y-m-d H:i a', strtotime($request["startDate"]));
             $startDate = $request->input('startDate');
             $endDate = $request->input('endDate');
             $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');


            // $cat = Category::findOrFail($id);
            //  dd($cat);
            
            return view('user.rooms-single',compact('room','cat','startDate','endDate','countries',));
        }   
 
        public function book(Request $request)
        {
            $customer = Customer::create($request->all());
            $booking = Booking::create(['time_from'=>date('Y-m-d H:i', strtotime($request["startDate"])),'time_to'=> date('Y-m-d H:i', strtotime($request["endDate"])),'additional_information'=>$request["additional_information"],'customer_id'=>$customer["id"],'room_id'=>$request["room_id"]]);
            // dd($booking);
            return view('user.stripe',compact('booking','customer'));
        }
    
    
        /**
         * Show the form for editing Room.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            if (! Gate::allows('room_edit')) {
                return abort(401);
            }
            $room = Room::findOrFail($id);
            $categories = Category::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
            $image=$room['image'];
            return view('admin.rooms.edit', compact('room','categories','image'));
        }
    
        /**
         * Update Room in storage.
         *
         * @param  \App\Http\Requests\UpdateRoomsRequest  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(UpdateRoomsRequest $request, $id)   
        {
            if (! Gate::allows('room_edit')) {
                return abort(401);
            }
            $room = Room::findOrFail($id);
            // $room->update($request->all());
            $room->update( ['room_number'=> $request["room_number"],'cardId'=>$request["cardId"],'price'=>$request["price"],'guestCount'=>$request["guestCount"],'category_id'=>$request["category_id"],'floor'=>$request["floor"],'description'=>$request["description"] ]);
           
    
            return redirect()->route('admin.rooms.index');
        }
    
    
        /**
         * Display Room.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            if (! Gate::allows('room_view')) {
                return abort(401);
            }
            $bookings = \App\Booking::where('room_id', $id)->get();
    
            $room = Room::findOrFail($id);
    
            return view('admin.rooms.show', compact('room', 'bookings'));
        }
    
    
        /**
         * Remove Room from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            if (! Gate::allows('room_delete')) {
                return abort(401);
            }
            $room = Room::findOrFail($id);
            $room->delete();
    
            return redirect()->route('admin.rooms.index');
        }
    
        /**
         * Delete all selected Room at once.
         *
         * @param Request $request
         */
        public function massDestroy(Request $request)
        {
            if (! Gate::allows('room_delete')) {
                return abort(401);
            }
            if ($request->input('ids')) {
                $entries = Room::whereIn('id', $request->input('ids'))->get();
    
                foreach ($entries as $entry) {
                    $entry->delete();
                }
            }
        }
    
    
        /**
         * Restore Room from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function restore($id)
        {
            if (! Gate::allows('room_delete')) {
                return abort(401);
            }
            $room = Room::onlyTrashed()->findOrFail($id);
            $room->restore();
    
            return redirect()->route('admin.rooms.index');
        }
    
        /**
         * Permanently delete Room from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function perma_del($id)
        {
            if (! Gate::allows('room_delete')) {
                return abort(401);
            }
            $room = Room::onlyTrashed()->findOrFail($id);
            $room->forceDelete();
    
            return redirect()->route('admin.rooms.index');
        }
    
    
}

