<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSuppliersRequest;
use App\Http\Requests\Admin\UpdateSuppliersRequest;
use App\Category;
use Illuminate\Support\Facades\Storage;
use App\Mail\TestEmail;
use Mail;

use Illuminate\Support\Facades\Http;


class SupplierController extends Controller
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


        if (request('room_delete') == 1) {
            if (! Gate::allows('room_delete')) {
                return abort(401);
            }
            $rooms = Supplier::onlyTrashed()->get();
        } else {
            $rooms = Supplier::all();
        }

        return view('admin.suppliers.index', compact('rooms'));
    }

    /**
     * Show the form for creating new Room.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        if (! Gate::allows('room_access')) {
            return abort(401);
        }
 
        $categories = Category::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
  
        return view('admin.suppliers.create',compact('categories'));
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param  \App\Http\Requests\StoreSuppliersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuppliersRequest $request)
    {
      
        if (! Gate::allows('room_create')) {
            return abort(401);
        }      
       $supplier = Supplier::create(['name'=> $request["name"],'address'=>$request["address"],'contactNo'=>$request["contactNo"],'email'=>$request["email"]]);
        return redirect()->route('admin.supplier.index');
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
        $supplier = Supplier::findOrFail($id);
        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Update Room in storage.
     *
     * @param  \App\Http\Requests\UpdateSuppliersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuppliersRequest $request, $id)   
    {
        if (! Gate::allows('room_edit')) {
            return abort(401);
        }
        $supplier = Supplier::findOrFail($id);
        // $room->update($request->all());
        $supplier->update(['name'=> $request["name"],'address'=>$request["address"],'contactNo'=>$request["contactNo"],'email'=>$request["email"]]);
        return redirect()->route('admin.supplier.index');
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

        $supplier = Supplier::findOrFail($id);

        return view('admin.suppliers.show', compact('supplier'));
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
        $room = Supplier::findOrFail($id);
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

        return redirect()->route('admin.suppliers.index');
    }


    public function roomLock(Request $request)
    {
        // dd($request->key);
        $room = Room::where('cardId', $request->key)
        ->get();
        return($room);

        // return view('admin.rooms.index', compact('rooms'));
    }


    public function sendServiceRequest(Request $request)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $client->post(
                'http://critssl.com/email/',
                array(
                    'form_params' => array(
                        'email' => 'rushanthasindu10@gmail.com',
                        'subject' => 'Test user',
                        'message' => 'testpassword'
                    )
                )
            );
    
         
        } 
        catch (Swift_TransportException $e) {
            echo $e->getMessage();
        }
    }


    

}
