<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Shop;
use App\Model\ShopCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public  function getCategories() {
        $categories = Category::all();
        if (!empty($categories))
        {
            return response()->json(['success'=>true,'response'=> $categories], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function categoryProducts($id) {
        $shopCategory = ShopCategory::where('id',$id)->first();
        $shop = Shop::where('id',$shopCategory->shop_id)->first();
        $featuredProducts = Product::where('category_id',$shopCategory->id)->where('user_id',$shop->user_id)->where('published',1)->where('featured',1)->get();
        if (!empty($featuredProducts))
        {
            return response()->json(['success'=>true,'response'=> $featuredProducts], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function categoryAllProducts($id) {
        $shopCategory = ShopCategory::where('id',$id)->first();
        $shop = Shop::where('id',$shopCategory->shop_id)->first();
        $allProducts = Product::where('category_id',$shopCategory->id)->where('user_id',$shop->user_id)->where('published',1)->get();
        if (!empty($allProducts))
        {
            return response()->json(['success'=>true,'response'=> $allProducts], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
