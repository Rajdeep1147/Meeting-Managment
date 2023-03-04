<?php

namespace App\Http\Controllers;
use Validation;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\User;
use App\Models\Client;
use App\Models\Payment;



class StripePaymentController extends Controller
{
    private $users;
     
    public function __construct()
    {
        $this->users  = User::all();
    }

    public function onetime()
    {
       
        return view('stripe.index');
    }

    public function submitForm(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       
        $customer = \Stripe\Customer::create([
            'source' => $request->stripeToken,
            'email' => $request->email,
            'name' => 'Jenny Rosen',
            'address' => [
            'line1' => '510 Townsend St',
            'postal_code' => '98140',
            'city' => 'San Francisco',
            'state' => 'CA',
            'country' => 'US',
            ],
        ]);
            // dd($customer->id);
        $charge = Stripe\Charge::create ([
                "amount" => 100 * $request->price,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Making test payment." 
        ]);

        $pasword = random_int(100000, 999999);

        $client = new Client;
        $client->customer_id = $customer->id;
        $client->username = $request->username;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->name = $request->name;
        $client->password = $pasword;
        $client->country = $request->country;
        $client->state = $request->state;
        $client->city = $request->city;
        $client->pincode = $request->pincode;
        $client->save();
        $lastid =  $client->id;

        $payment = new Payment;
        $payment->name_on_card = $charge->id;
        // $payment->user_id = $lastid;
        $payment->charge_id = $charge->id;
        $payment->ammount = $charge->amount/100;
        $payment->ammount_capture = $charge->amount_captured/100;  
        $payment->refund= $charge->refunded/100;   
        $payment->capture = $charge->captured;  
        $payment->currency = $charge->currency; 
        $payment->customer_id = $charge->customer; 
        $payment->payment_method = $charge->payment_method; 
        $payment->customer_id = $charge->customer; 
        $payment->paid =$charge->ammount/100; 
        $payment->status = $charge->status; 
        if($payment->save()){
            dd("Data Save");
        }else{
            dd("Data Not Save");
        }
    }
           
    
    public function stripePay(Request $request)
    {
        // dd("gdgd")
        // dd($request->all());   
        $price = $request->price ;
        
        return view('stripe.stripe',['price'=>$price]);
    }
}
