<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoomsRequest;
use App\Http\Requests\Admin\UpdateRoomsRequest;
use App\Category;
use App\Item;
use App\User;
use Illuminate\Support\Facades\Storage;

class RoomsController extends Controller
{
    /**
     * Display a listing of Room.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('room_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('room_delete')) {
                return abort(401);
            }
            $rooms = Room::onlyTrashed()->get();
        } else {
            $rooms = Room::all();
        }

        
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating new Room.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('room_create')) {
            return abort(401);
        }
        
        $categories = Category::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.rooms.create',compact('categories'));
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param  \App\Http\Requests\StoreRoomsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomsRequest $request)
    {
      


        if (! Gate::allows('room_create')) {
            return abort(401);
        }
      
        $path = $request->image->store('images','public');      
       $request["image"]=$path;
       $room = Room::create(['room_number'=> $request["room_number"],'cardId'=>$request["cardId"],'price'=>$request["price"],'guestCount'=>$request["guestCount"],'category_id'=>$request["category_id"],'floor'=>$request["floor"],'description'=>$request["description"],'image'=>$path]);
        return redirect()->route('admin.rooms.index');
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

        $room = Room::find($id);
        
     
        $users = User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        // $user = User::find(4);	
        $items = Item::where('roomId', $id) ->get();
        // dd($room->cleansBy[0]->date);

        $cleansBy_list = \DB::select("SELECT `cleans`.`date`,`cleans`.`user_id`,`cleans`.`room_id`,`cleans`.`id`,`cleans`.`remarks`,`cleans`.`created_at`,`users`.`name`,`rooms`.`room_number` FROM `cleans`,`users`,`rooms` WHERE cleans.user_id=users.id AND `cleans`.`room_id`=`rooms`.`id` AND `cleans`.`room_id`=$id;");

        // dd($users    ); // 1


        return view('admin.rooms.show', compact('id','room', 'bookings','cleansBy_list','users','items'));
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


    public function roomLock(Request $request)
    {
        // dd($request->key);
        $room = Room::where('cardId', $request->key)
        ->get();
        return($room);

        // return view('admin.rooms.index', compact('rooms'));
    }
}
