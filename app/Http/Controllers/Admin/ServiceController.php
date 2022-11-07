<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServicesRequest;
use App\Http\Requests\Admin\UpdateSuppliersRequest;
use App\Service;
use App\Room;
use App\Supplier;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
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
            $items = Item::onlyTrashed()->get();
        } else {
            $items = Item::all();
        }
        $service = Service::all();

        dd($service);
        return view('admin.items.index', compact('items'));
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
     * @param  \App\Http\Requests\StoreServicesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServicesRequest $request)
    {
      

        if (! Gate::allows('room_create')) {
            return abort(401);
        }

       $item = Service::create(['item_id'=> $request["item_id"],'type'=>$request["type"],'comment'=>$request["remarks"],'status'=>'PENDING']);

       try {
        $client = new \GuzzleHttp\Client();
        $client->post(
            'http://critssl.com/email/',
            array(
                'form_params' => array(
                    'email' => $request["email"],
                    'subject' => 'Service Item ( '.$request["type"].' )',
                    'message' => $request["remarks"]
                )
            )
        );

     
    } 
    catch (Swift_TransportException $e) {
        echo $e->getMessage();
    }
       return redirect()->back();
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
        
        $cleansBy_list = \DB::select("SELECT `cleans`.`date`,`cleans`.`user_id`,`cleans`.`room_id`,`cleans`.`id`,`cleans`.`remarks`,`cleans`.`created_at`,`users`.`name`,`rooms`.`room_number` FROM `cleans`,`users`,`rooms` WHERE cleans.user_id=users.id AND `cleans`.`room_id`=`rooms`.`id` AND `cleans`.`room_id`=$id;");


        return view('admin.items.show', compact('id','item','room','supplier','cleansBy_list'));
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
