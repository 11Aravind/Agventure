<?php

namespace App\Http\Controllers;

use App\Models\Soil_test;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Purchase;
use App\Models\User;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Exception;


class SoilTestController extends Controller
{

    
    public function index(){

        $tests = Soil_test::latest()
                                ->get();

        return view('soilTests.index',['title'=>'Soil tests page','tests'=>$tests]);

    }

    public function show($id){

        $test  = Soil_test::findOrFail($id);

        return view('soilTests.show',['title'=>'Soil test page','test'=>$test]);

    }

    public function create(){

        return view('soilTests.create',['title'=>'Create soil test page']);

    }

    

    public function update($id){

        return view('soilTests.update',['title'=>'Update soil test page']);
    }

    public function change(Request $request){

    }

    public function cancel($id){



    }

    public function display(Request $request){

        $id = $request->session()->get('loggedUser');
        
        $tests = Soil_test::where('user_id',$id)
                                ->get();

        return view('soilTests.index',['title'=>'Soil tests page','tests'=>$tests]);

    }

    public function displayOne($id){

        $test  = Soil_test::findOrFail($id);
        
        return view('soilTests.displayOne',['title'=>'Soil test page','test'=>$test]);

    }

    public function store($userId, $addressId, $cardNumber, $amount, $paymentMethod, $status, $orderStatus, $auctionId)
    {

            $purchase = new Purchase();
            $purchase->user_id = $userId;
            $purchase->address_id = $addressId;
            $purchase->card_number = $cardNumber;
            $purchase->amount = $amount;
            $purchase->delivery_charge = 60;
            $purchase->total = $amount + 60;
            $purchase->payment_method = $paymentMethod;
            $purchase->status = $status;
            $purchase->order_status = $orderStatus;

            $purchase->save();
      
    }


    public function makeTransaction(Request $request)
    {


        $id = $request->session()->get('loggedUser');

        $user = User::findOrFail($id);

        //fetch the cart items corresponding to current loggedin user
        $cartItems = Cart::latest()->where('user_id', $id)->get();

        //addressId
        $addressId = $request->selected_address;

        //find the address with the id sent from the view ( selected address )
        $address = Address::findOrFail($addressId);

        $auction_id =   $request->session()->get('auctionId');
        //total amount 
        $totalAmount =  $request->session()->get('totalAmount');

        //card details
        $cardNumber = $request->card_number;

        $expiryMonth = $request->expiry_month;

        $expiryYear = $request->expiry_year;

        $cvv = $request->cvv;

        if ($request->payment_method == "cod") {
            $request->validate([
                'selected_address' => 'required'
            ]);
        } else if ($request->payment_method == "card") {
            $request->validate([

                'card_number' => 'required',
                'expiry_month' => 'required',
                'expiry_year' => 'required',
                'cvv' => 'required',
                'selected_address' => 'required'

            ]);
        }


        //logic for cod transactions
        if ($request->payment_method == "cod") {

            //auction checkout

            if($auction_id){

                $this->store($id, $addressId, 0, $totalAmount, "cod", "pending", "ordered",$auction_id );
                $this->linkItemts($id);
                $this->decreaseQuantity($id);
                $this->resetCart($id);
                $request->session()->forget('totalAmount');
                $request->session()->forget('auctionId');
                return redirect('/checkout/success');

            }
            else
            {
                
            $this->store($id, $addressId, 0, $totalAmount, "cod", "pending", "ordered", 0);
            $this->linkItemts($id);
            $this->decreaseQuantity($id);
            $this->resetCart($id);
            $request->session()->forget('totalAmount');

            return redirect('/checkout/success');
            
            }
        }
        //logic for card transactions
        else if ($request->payment_method == "card") {

            $stripe = Stripe::make(env('STRIPE_SECRET'));

            try {

                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $cardNumber,
                        'exp_month' => $expiryMonth,
                        'exp_year' => $expiryYear,
                        'cvc' => $cvv
                    ]
                ]);

                // dd($token);

                if (!isset($token['id'])) {

                    session()->flash('stripe_error', 'The stripe token was not generated correctly!');
                    return redirect('/checkout');
                }



                $customer = $stripe->customers()->create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'address' => [
                        'line1' => $address->house_name . ' ' . $address->street,
                        'postal_code' => $address->pincode,
                        'city' => $address->city,
                        'state' => $address->state,
                        'country' => 'India'
                    ],
                    'shipping' => [

                        'name' => $address->name,
                        'address' => [
                            'line1' => $address->house_name . ' ' . $address->street,
                            'postal_code' => $address->pincode,
                            'city' => $address->city,
                            'state' => $address->state,
                            'country' => 'India'
                        ],
                    ],
                    'source' => $token['id']
                ]);

                // dd($customer);


                $charge = $stripe->paymentIntents()->create([

                    'customer' => $customer['id'],
                    'currency' => 'inr',
                    'amount' => $totalAmount + 60,
                    'description' => 'Payment for order no : ',
                    'payment_method_types' => [
                        'card'
                    ],
                ]);

                // dd($charge);

                if ($charge['status'] == 'succeeded') {

                    if($auction_id){

                    $this->store($id, $addressId, $cardNumber, $totalAmount, "card", "succesful", "ordered", $auction_id);
                    $this->linkItemts($id);
                    $this->decreaseQuantity($id);
                    $this->resetCart($id);
                    $request->session()->forget('totalAmount');
                    $request->session()->forget('auctionId');

                    return redirect('/checkout/success');
                    }
                    else{
                        $this->store($id, $addressId, $cardNumber, $totalAmount, "card", "succesful", "ordered", 0);
                        $this->linkItemts($id);
                        $this->decreaseQuantity($id);
                        $this->resetCart($id);
                        $request->session()->forget('totalAmount');
                        
    
                        return redirect('/checkout/success');
                    }
                } else {
                    session()->flash('stripe_error', 'Error in transaction!');

                    if($auction_id){
                        
                    $this->store($id, $addressId, $cardNumber, $totalAmount, "card", "failed", "failed", $auction_id);
                    $request->session()->forget('totalAmount');
                    $request->session()->forget('auctionId');

                    return redirect('/checkout/failed');

                    }
                    else{

                        $this->store($id, $addressId, $cardNumber, $totalAmount, "card", "failed", "failed",0);
                        $request->session()->forget('totalAmount');

                        return redirect('/checkout/failed');
                    }
                }
            } catch (Exception $e) {

                session()->flash('stripe_error', $e->getMessage());
                dd($e->getMessage());
                return redirect('/checkout/failed');
            }
        }
    }

}

