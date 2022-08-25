<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    //
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from dfgfdgfdg.com." 
        ]);
  
        $details = [
            'name' => $request->first_name,
            'additional_information' => $request->additional_information
        ];
        
        \Mail::to( $request->email)->send(new \App\Mail\MyMail($details));

        
        Session::flash('success', 'Payment successful!');
        return view('emails.myMail',compact('details'));
          
    }
}
