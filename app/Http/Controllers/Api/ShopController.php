<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public  function getShop()
    {
        $shops= Shop::all();
        if (!empty($shops))
        {
            return response()->json(['success'=>true,'response'=> $shops], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function getShopByLatLng($lat, $lng)
    {
        $shops=Shop::whereBetween('latitude',[$lat-0.02,$lat+0.02])->whereBetween('longitude',[$lng-0.02,$lng+0.02])->get();
        if (!empty($shops)){
            return response()->json(['success'=> true, 'response'=>$shops],200);
        }else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
