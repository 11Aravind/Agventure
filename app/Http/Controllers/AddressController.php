<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(Request $request)
    {


        // dd('hellow');
        $request->validate([
            'name' => 'required|min:2|max:30|alpha',
            'phone' => 'required|digits:10',
            'house_name' => 'required|min:2|max:200',
            'street' => 'required|min:2|max:200',
            'pincode' => 'required|min:6|max:8',
            'district' => 'required|min:2|max:30',
            'state' => 'required|min:2|max:30'
        ]);

        $address = new Address();
        $address->user_id = $request->session()->get('loggedUser');
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->house_name = $request->house_name;
        $address->street = $request->street;
        $address->pincode = $request->pincode;
        $address->city = $request->city;
        $address->district = $request->district;
        $address->state = $request->state;
        $address->save();

        return redirect('/checkout');
    }

    public function change(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'house_name' => 'required',
            'street' => 'required',
            'pincode' => 'required',
            'district' => 'required',
            'state' => 'required'
        ]);

        $address =  Address::findOrFail($request->id);
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->house_name = $request->house_name;
        $address->street = $request->street;
        $address->pincode = $request->pincode;
        $address->city = $request->city;
        $address->district = $request->district;
        $address->state = $request->state;
        $address->save();
        return redirect('/checkout');
    }

    public function destroy($id)
    {

        $address = Address::findOrFail($id);
        $address->delete();
        return redirect('/checkout');
    }
}
