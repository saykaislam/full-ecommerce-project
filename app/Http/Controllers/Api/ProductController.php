<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\FlashDeal;
use App\Model\Product;
use App\Model\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getFeaturedProducts($id) {
        $shop = Shop::where('id',$id)->first();
        $products = Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('featured',1)->get();
//        return response()->json(['success'=>true,'response'=> $products], 200);
        if (!empty($products))
        {
            return response()->json(['success'=>true,'response'=> $products], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function getTodaysDeal($id) {
        $shop = Shop::where('id',$id)->first();
        $todaysDeal = Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('todays_deal',1)->get();
        if (!empty($todaysDeal))
        {
            return response()->json(['success'=>true,'response'=> $todaysDeal], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function getBestSales($id) {
        $shop = Shop::where('id',$id)->first();
        $best_sales_products=Product::where('added_by','seller')->where('user_id',$shop->user_id)->where('published',1)->where('num_of_sale', '>',0)->get();
        if (!empty($best_sales_products))
        {
            return response()->json(['success'=>true,'response'=> $best_sales_products], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function getFlashDeals($id) {
        $shop = Shop::where('id',$id)->first();
        $flashDeal = FlashDeal::where('status',1)->where('user_id',$shop->user_id)->where('user_type','seller')->where('featured',1)->first();
        if (!empty($flashDeal))
        {
            return response()->json(['success'=>true,'response'=> $flashDeal], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function getRelatedProducts($id){
        $product = Product::find($id);
        $RelatedProducts = Product::where('category_id',$product->category_id)->where('published',1)->get();
        if (!empty($RelatedProducts))
        {
            return response()->json(['success'=>true,'response'=> $RelatedProducts], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
    public function search_product(Request $request) {

        $storeId =  $request->get('storeId');
        $name = $request->get('q');
        $shops = Shop::find($storeId);
//        return $name;

        $products = Product::where('name', 'LIKE', '%'. $name. '%')->where('user_id',$shops->user_id)->where('added_by','seller')->get();
        if (!empty($products))
        {
            return response()->json(['success'=>true,'response'=> $products], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }
}
