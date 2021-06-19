<?php

namespace App\Http\Controllers\User;

use App\Model\Address;
use App\Model\Order;
use App\Model\OrderDetails;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('frontend.customer.dashboard');
    }

    public function invoices()
    {
        return view('frontend.user.invoices');
    }

//    public function address()
//    {
//        $addresses = Address::where('user_id',Auth::id())->get();
//        return view('frontend.user.address',compact('addresses'));
//    }
    public function updateAddress(Request $request){
        $this->validate($request, [
           'address' =>'required',
            'city' =>'required',
            'postal_code' => 'required',
            'phone' => 'required',
        ]);
        $address = new Address();
        $address->user_id = Auth::id();
        $address->address = $request->address;
        $address->country = 'Bangladesh';
        $address->city = $request->city;
        $address->postal_code = $request->postal_code;
        $address->phone = $request->phone;
        $address->save();
        Toastr::success('Address Created Successfully');
        return redirect()->back();

    }
}
