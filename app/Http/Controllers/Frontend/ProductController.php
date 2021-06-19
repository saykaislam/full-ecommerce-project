<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Color;
use App\Model\FlashDeal;
use App\Model\FlashDealProduct;
use App\Model\Product;
use App\Model\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productDetails($slug){
        $detailedProduct = Product::where('slug',$slug)->first();
        $photos=json_decode($detailedProduct->photos);
        $relatedProducts = Product::where('category_id',$detailedProduct->category_id)->where('published',1)->latest()->take(10)->get();
        return view('frontend.pages.product.product_details',compact('detailedProduct','photos','relatedProducts'));
    }
    public function productBySubcategory($slug){
        $subcategory = Subcategory::where('slug',$slug)->first();
        $SubCatProducts = Product::where('subcategory_id',$subcategory->id)->where('published',1)->latest()->paginate(36);
        return view('frontend.pages.product.products_by_subcategory',compact('subcategory','SubCatProducts'));
    }
    public function todaysDealProducts(){
        $products = Product::where('published',1)->where('todays_deal',1)->latest()->get();
        $title = "Today's Deal Products";
        return view('frontend.pages.product.product_list',compact('products','title'));
    }
    public function featuredProduct(){
        $products = Product::where('published',1)->where('featured',1)->latest()->get();
        $title = "Featured Products";
        return view('frontend.pages.product.product_list',compact('products','title'));
    }
    public function allProducts(){
        $products = Product::where('published',1)->latest()->get();
        $title = "All Products";
        return view('frontend.pages.product.product_list',compact('products','title'));
    }
    public function bestSaleProducts(){
        $products = Product::where('published',1)->where('num_of_sale','>',1)->latest()->get();
        $title = "Best Sale Products";
        return view('frontend.pages.product.product_list',compact('products','title'));
    }
    public function flashDealProducts($slug){
       $flashDeal = FlashDeal::where('slug',$slug)->first();
        $flashDealProducts = FlashDealProduct::where('flash_deal_id',$flashDeal->id)->latest()->get();
        return view('frontend.pages.product.all_flash_deal_products',compact('flashDeal','flashDealProducts'));
    }
    public function categoryProduct($slug){
        $category = Category::where('slug',$slug)->first();
        $products = Product::where('published',1)->where('category_id',$category->id)->latest()->get();
        $title = $category->name;
        return view('frontend.pages.product.product_list',compact('products','title'));

    }
    public function allCategories(){
        return view('frontend.pages.product.all_categories');
    }

    public function variant_price(Request $request)
    {
        //return 'okkkkkk';
        $product = Product::find($request->id);
        $str = '';
        $quantity = 0;

        if($request->has('color')){
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        if(json_decode(Product::find($request->id)->choice_options) != null){
            foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
                if($str != null){
                    $str .= '-'.str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
                else{
                    $str .= str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
            }
        }



        if($str != null && $product->variant_product){
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;
            $quantity = $product_stock->qty;
        }
        else{
            $price = $product->unit_price;
            $quantity = $product->current_stock;
        }

        //discount calculation
        $flash_deals = FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $key => $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
                $flash_deal_product = FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                if($flash_deal_product->discount_type == 'percent'){
                    $price -= ($price*$flash_deal_product->discount)/100;
                }
                elseif($flash_deal_product->discount_type == 'amount'){
                    $price -= $flash_deal_product->discount;
                }
                $inFlashDeal = true;
                break;
            }
        }
        if (!$inFlashDeal) {
            if($product->discount_type == 'percent'){
                $price -= ($price*$product->discount)/100;
            }
            elseif($product->discount_type == 'amount'){
                $price -= $product->discount;
            }
        }

        if($product->vat_type == 'percent'){
            $price += ($price*$product->vat)/100;
        }
        elseif($product->vat_type == 'amount'){
            $price += $product->vat;
        }
        return array('price' => $price*$request->quantity, 'quantity' => $quantity, 'digital' => $product->digital);
    }
}
