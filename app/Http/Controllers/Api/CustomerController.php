<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Wishlist;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function profileUpdate(Request $request){
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->hasFile('avatar_original')){
            $user->avatar_original = $request->avatar_original->store('uploads/profile');
        }
        $user->save();
        if (!empty($user))
        {
            return response()->json(['success'=>true,'response'=> $user], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function passwordUpdate(Request $request) {
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                return response()->json(['success'=>true,'response'=> $user], 200);
            }else{
                return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
            }

        }
//        if (!empty($user))
//        {
//            return response()->json(['success'=>true,'response'=> $user], 200);
//        }
//        else{
//            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
//        }
    }
    public function address(){
        $user = User::find(Auth::id());
        if (!empty($user->address))
        {
            return response()->json(['success'=>true,'response'=> $user->address], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }

    }
    public function addressUpdate(Request $request){
        $user = User::find(Auth::id());
        $user->address = $request->address;
        $user->save();
        if (!empty($user))
        {
            return response()->json(['success'=>true,'response'=> $user], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function wishlist(){
        $wishlists = DB::table('wishlists')
            ->join('products','wishlists.product_id','=','products.id')
            ->where('wishlists.user_id', Auth::user()->id)
            ->select('wishlists.id','wishlists.product_id','products.name','products.current_stock','products.unit_price','products.thumbnail_img')
            ->get();
//        return $wishlists;
            if (!empty($wishlists))
            {
                return response()->json(['success'=>true,'response'=> $wishlists], 200);
            }
            else{
                return response()->json(['success'=>false,'response'=> 'Wishlist is empty!'], 404);
            }
    }
    public function wishlistAdd($id){
//        return Auth::user();
        if (Auth::user()) {
            $check = Wishlist::where('product_id', $id)->where('user_id', Auth::id())->first();
            if (empty($check)) {
                $wishList = new Wishlist();
                $wishList->product_id = $id;
                $wishList->user_id = Auth::id();
                $wishList->save();
                return response()->json(['success' => true, 'response' => $wishList], 200);

            } else {
                return response()->json(['success' => false, 'response' => 'This Product already added to wishlist'], 404);
            }
        }else {
            return response()->json(['success' => false, 'response' => 'Login first to add wishlist'], 404);
        }
    }
    public function wishlistRemove($id){
        $wishlist = Wishlist::find($id);
        if (!empty($wishlist))
        {
            $wishlist->delete();
            return response()->json(['success'=>true,'response'=> 'Wishlist deleted Successfully!!!'], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Wishlist is empty!!!'], 404);
        }
    }
}
