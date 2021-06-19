<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public  function getSellers()
    {
        $sellers= Seller::all();
        if (!empty($sellers))
        {
            return response()->json(['success'=>true,'response'=> $sellers], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
