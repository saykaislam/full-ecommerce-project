<?php

namespace App\Http\Controllers\Api;

use App\Helpers\UserInfo;
use App\Http\Controllers\Controller;
use App\Model\BusinessSetting;
use App\Model\Seller;
use App\Model\Shop;
use App\Model\VerificationCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public $successStatus = 200;
    public $failStatus = 401;
    public function login(Request $request)
    {
        //dd($request->all());
        $credentials = [
            'phone' => $request->phone,
            'password' => $request->password,
        ];
        if(Auth::attempt($credentials))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('mudihat')-> accessToken;
            $success['user'] = $user;
            return response()->json(['success'=>true,'response' => $success], $this-> successStatus);
        }else{
            return response()->json(['success'=>false,'response'=>'Unauthorised'], 401);
        }
    }
    public function register(Request $request)
    {
//
//dd("md");
        $userReg = new User();
        $userReg->name = $request->name;
        $userReg->email = $request->email;
        $userReg->phone = $request->phone;
        $userReg->password = Hash::make($request->password);
        $userReg->user_type = 'customer';
        $userReg->save();

        $verification = VerificationCode::where('phone',$userReg->phone)->first();
        if (!empty($verification)){
            $verification->delete();
        }
        $verCode = new VerificationCode();
        $verCode->phone = $userReg->phone;
        $verCode->code = mt_rand(1111,9999);
        $verCode->status = 0;
        $verCode->save();
        $text = "<#> Dear ".$userReg->name.", Your MudiHat OTP is: ".$verCode->code." /bCe8bIGKEiT";
        UserInfo::smsAPI("088".$verCode->phone,$text);

        $success['token'] = $userReg->createToken('mudihat')-> accessToken;
        $success['details'] = $userReg;
        return response()->json(['success'=>true,'response' =>$success], $this-> successStatus);
    }

    public function sellerRegister(Request $request)
    {
//
//dd("md");
        $sellerReg = new User();
        $sellerReg->name = $request->name;
        $sellerReg->email = $request->email;
        $sellerReg->phone = $request->phone;
        $sellerReg->password = Hash::make($request->password);
        $sellerReg->user_type = 'seller';
        $sellerReg->save();
        $defaultCommissionPercent = BusinessSetting::where('type', 'seller_commission')->first();
        $seller = new Seller;
        $seller->user_id = $sellerReg->id;
        $seller->commission = $defaultCommissionPercent->value;
        $seller->save();
        if(Shop::where('user_id', $sellerReg->id)->first() == null){
            $shop = new Shop;
            $shop->user_id = $sellerReg->id;
            $shop->seller_id = $sellerReg->id;
            $shop->name = $request->shop_name;
            $shop->slug = Str::slug($request->shop_name).'-'.$sellerReg->id;
            $shop->address = $request->address;
            $shop->city = $request->city;
            $shop->area = $request->area;
            $shop->latitude = $request->latitude;
            $shop->longitude = $request->longitude;
            if($request->hasFile('logo')){
                $shop->logo = $request->logo->store('uploads/product/logo');
            }
            $shop->save();
        }

        $verification = VerificationCode::where('phone',$sellerReg->phone)->first();
        if (!empty($verification)){
            $verification->delete();
        }
        $verCode = new VerificationCode();
        $verCode->phone = $sellerReg->phone;
        $verCode->code = mt_rand(1111,9999);
        $verCode->status = 0;
        $verCode->save();
        $text = "<#> Dear ".$sellerReg->name.", Your MudiHat OTP is: ".$verCode->code." /bCe8bIGKEiT";
        UserInfo::smsAPI("088".$verCode->phone,$text);

        $success['token'] = $sellerReg->createToken('mudihat')-> accessToken;
        $success['details'] = $sellerReg;
        return response()->json(['success'=>true,'response' =>$success], $this-> successStatus);
    }
}
