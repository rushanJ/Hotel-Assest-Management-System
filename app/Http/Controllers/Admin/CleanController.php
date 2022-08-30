<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCleanRequest;
use App\Http\Requests\Admin\UpdateRoomsRequest;
use App\Item;


use App\User;
use App\Clean;

use Illuminate\Support\Facades\Storage;

class CleanController extends Controller
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
            $items = Clean::onlyTrashed()->get();
        } else {
            $items = Clean::all();
        }

        // $user = User::find(4);	
 
        // dd($user->hasToClean[0]->room_number);

        dd($items[0]->cleansBy);
        return view('admin.clean.index', compact('items'));
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
        
        $rooms = Room::get()->pluck('room_number', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $suppliers = Supplier::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
     
        return view('admin.items.create',compact('rooms','suppliers'));
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param  \App\Http\Requests\StoreCleanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCleanRequest $request)
    {
      


        if (! Gate::allows('room_create')) {
            return abort(401);
        }

       
       $item = Clean::create(['user_id'=> $request["user_id"],'room_id'=>$request["room_id"],'date'=>$request["date"],'remarks'=>$request["remarks"]]);
       $user = User::findOrFail($request["user_id"]);
     
       
       try {
        $client = new \GuzzleHttp\Client();
        $client->post(
            'http://critssl.com/email/calander.php/',
            array(
                'form_params' => array(
                    'email' => $user->email,
                    'name' => $user->name,
                    'startTime' => $request["date"],
                    'endTime' => $request["date"],
                    'subject' => 'Clean Room '. $request["room_id"],
                    'description' => $request["remarks"],
                    'room_id' => $request["room_id"]
                )
            )
        );

     
        } 
        catch (Swift_TransportException $e) {
            echo $e->getMessage();
        }


        //   dd(['user_id'=> $request["user_id"],'room_id'=>$request["room_id"],'date'=>$request["date"],'remarks'=>$request["remarks"]]);
       return back();
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


        $item = Item::findOrFail($id);
        $room = Room::findOrFail($item->roomId);
        $supplier = Supplier::findOrFail($item->supplierId);

        return view('admin.items.show', compact('item','room','supplier'));
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
        $room = Clean::findOrFail($id);
        $room->delete();

        return back();
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
     * Delete all selected Room at once.
     *
     * @param Request $request
     */
    public function done($id,Request $request)
    {
        $clean = Clean::findOrFail($id);
        // $room->update($request->all());
        $clean->update( ['status'=>'DONE' ]);
     
        $room = Room::findOrFail($clean->room_id);
        //  dd($room );
        Clean::where('id', $id)
        ->update([
               'status' => 'DONE'
        ]);
        try {
            $client = new \GuzzleHttp\Client();
            $client->post(
                'http://critssl.com/email/',
                array(
                    'form_params' => array(
                        'email' => "mapalagamageethmi@gmail.com",
                        'subject' => 'Cleaning Done',
                        'message' => "Property : " .$room->room_number
                    )
                )
            );
    
         
        } 
        catch (Swift_TransportException $e) {
            echo $e->getMessage();
        }

        return back();
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
