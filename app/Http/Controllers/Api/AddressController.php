<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Address;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index(){
        $address = Address::where('user_id',Auth::id())->get();
        if (!empty($address))
        {
            return response()->json(['success'=>true,'response'=> $address], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'No Address Added yet!'], 404);
        }
    }
    public function store(Request $request)
    {
        $address = new Address();
        $address->user_id = Auth::id();
        $address->address = $request->address;
        $address->country = 'Bangladesh';
        $address->city = $request->city;
        $address->postal_code = $request->postal_code;
        $address->phone = $request->phone;
        $address->save();
        if (!empty($address))
        {
            return response()->json(['success'=>true,'response'=> $address], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function setDefault($id){
        $addresses = Address::where('set_default',1)->first();
        if (!empty($addresses)) {
            $addresses->set_default = 0;
            $addresses->save();
        }
        $setDefault = Address::find($id);
        $setDefault->set_default = 1;
        $setDefault->save();
        if (!empty($setDefault))
        {
            return response()->json(['success'=>true,'response'=> $setDefault], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function destroy($id) {
        $address = Address::find($id);
        $address->delete();
        if (!empty($address))
        {
            return response()->json(['success'=>true,'response'=> 'Address Deleted Successfully'], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
