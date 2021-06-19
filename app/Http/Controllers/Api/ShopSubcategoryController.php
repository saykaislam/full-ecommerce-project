<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\ShopSubcategory;
use Illuminate\Http\Request;

class ShopSubcategoryController extends Controller
{
    public  function getShopSubcategories() {
        $shopSubcategories = ShopSubcategory::all();
        if (!empty($shopSubcategories))
        {
            return response()->json(['success'=>true,'response'=> $shopSubcategories], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
