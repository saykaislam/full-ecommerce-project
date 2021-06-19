<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function editProfile() {
        return view('frontend.customer.edit_profile');
    }
    public function updateProfile(Request $request) {
//        dd('saf');
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,phone,'.Auth::id(),
            'email' =>  'required|email|unique:users,email,'.Auth::id(),
        ]);
        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->hasFile('avatar_original')){
            $user->avatar_original = $request->avatar_original->store('uploads/profile');
        }
        $user->update();
        Toastr::success('Profile Updated Successfully');
        return redirect()->back();
    }
    public function editPassword(){
        return view('frontend.customer.edit_password');
    }
    public function updatePassword(Request $request) {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = \App\User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Password Updated Successfully','Success');
                Auth::logout();
                return redirect()->route('login');
            } else {
                Toastr::error('New password cannot be the same as old password.', 'Error');
                return redirect()->back();
            }
        } else {
            Toastr::error('Current password not match.', 'Error');
            return redirect()->back();
        }
    }
}
