<?php
/**
 * Created by PhpStorm.
 * User: Ashiqur Rahman
 * Date: 11/11/2021
 * Time: 3:08 PM
 */
use App\Model\FlashDeal;
use App\Model\FlashDealProduct;
use App\Model\Product;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Brand;
use App\Model\Offer;


    if (!function_exists('productsComponent')) {
        function productsComponent($product) {
            return view('frontend.products_partials.productsComponent', compact('product'));
        }
    }

    if (!function_exists('productsComponentTwo')) {
        function productsComponentTwo($product) {
            return view('frontend.products_partials.productsComponentTwo', compact('product'));
        }
    }
    if (!function_exists('productsComponentThree')) {
        function productsComponentThree($product) {
            return view('frontend.products_partials.productsComponentThree', compact('product'));
        }
    }
    if (!function_exists('productsComponentFour')) {
        function productsComponentFour($product) {
            return view('frontend.products_partials.productsComponentFour', compact('product'));
        }
    }
    if (!function_exists('productsComponentFive')) {
    function productsComponentFive($product) {
        return view('frontend.products_partials.productsComponentFive', compact('product'));
    }
}

    function categories(){
        $categories = Category::latest()->get();
        return $categories;
    }
    function subcategories($id){
        $subcategories = Subcategory::where('category_id',$id)->latest()->get();
        return $subcategories;
    }
    function Sub_subcategories($id){
         $sub_subcategories = \App\Model\SubSubcategory::where('sub_category_id',$id)->latest()->get();
         return $sub_subcategories;
     }
    function brand(){
        $brands = Brand::latest()->get();
        return $brands;
    }
    function home_category(){
        $categories = \App\Model\HomeCategory::where('status',1)->latest()->take(10)->get();
        return $categories;
    }
    function category_product_count($id){
        $products = Product::where('category_id',$id)->where('published',1)->count();
        return $products;
    }
    function offers(){
        $offers = Offer::latest()->take(2)->get();
        return $offers;
    }
    function sliders(){
        $sliders = \App\Model\Slider::latest()->get();
        return $sliders;
    }


//price related function start from here......................................

//Shows Base Price
if (! function_exists('home_base_price')) {
    function home_base_price($id)
    {
        $product = Product::findOrFail($id);
        $price = $product->unit_price;
        if($product->vat_type == 'percent'){
            $price += ($price*$product->vat)/100;
        }
        elseif($product->tax_type == 'amount'){
            $price += $product->vat;
        }
        return $price;
    }
}

//Shows Price on page based on low to high
if (! function_exists('home_price')) {
    function home_price($id)
    {
        $product = Product::findOrFail($id);
        $lowest_price = $product->unit_price;
        $highest_price = $product->unit_price;

        if ($product->variant_product) {
            foreach ($product->stocks as $key => $stock) {
                if($lowest_price > $stock->price){
                    $lowest_price = $stock->price;
                }
                if($highest_price < $stock->price){
                    $highest_price = $stock->price;
                }
            }
        }

        if($product->vat_type == 'percent'){
            $lowest_price += ($lowest_price*$product->vat)/100;
            $highest_price += ($highest_price*$product->vat)/100;
        }
        elseif($product->vat_type == 'amount'){
            $lowest_price += $product->vat;
            $highest_price += $product->vat;
        }

        $lowest_price = $lowest_price;
        $highest_price = $highest_price;

        if($lowest_price == $highest_price){
            return $lowest_price;
        }
        else{
            return $lowest_price.' - '.$highest_price;
        }
    }
}

//Shows Base Price with discount
if (! function_exists('home_discounted_base_price')) {
    function home_discounted_base_price($id)
    {
        $product = Product::findOrFail($id);
        $price = $product->unit_price;

        $flash_deals = FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first() != null) {
                $flash_deal_product = FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first();
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

        return $price;
    }
}


//Shows Price on page based on low to high with discount
if (! function_exists('home_discounted_price')) {
    function home_discounted_price($id)
    {
        $product = Product::findOrFail($id);
        $lowest_price = $product->unit_price;
        $highest_price = $product->unit_price;

        if ($product->variant_product) {
            foreach ($product->stocks as $key => $stock) {
                if($lowest_price > $stock->price){
                    $lowest_price = $stock->price;
                }
                if($highest_price < $stock->price){
                    $highest_price = $stock->price;
                }
            }
        }

        $flash_deals = FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first() != null) {
                $flash_deal_product = FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first();
                if($flash_deal_product->discount_type == 'percent'){
                    $lowest_price -= ($lowest_price*$flash_deal_product->discount)/100;
                    $highest_price -= ($highest_price*$flash_deal_product->discount)/100;
                }
                elseif($flash_deal_product->discount_type == 'amount'){
                    $lowest_price -= $flash_deal_product->discount;
                    $highest_price -= $flash_deal_product->discount;
                }
                $inFlashDeal = true;
                break;
            }
        }

        if (!$inFlashDeal) {
            if($product->discount_type == 'percent'){
                $lowest_price -= ($lowest_price*$product->discount)/100;
                $highest_price -= ($highest_price*$product->discount)/100;
            }
            elseif($product->discount_type == 'amount'){
                $lowest_price -= $product->discount;
                $highest_price -= $product->discount;
            }
        }

        if($product->vat_type == 'percent'){
            $lowest_price += ($lowest_price*$product->vat)/100;
            $highest_price += ($highest_price*$product->vat)/100;
        }
        elseif($product->vat_type == 'amount'){
            $lowest_price += $product->vat;
            $highest_price += $product->vat;
        }

        $lowest_price = $lowest_price;
        $highest_price = $highest_price;

        if($lowest_price == $highest_price){
            return $lowest_price;
        }
        else{
            return $lowest_price.' - '.$highest_price;
        }
    }
}


//price related function End here..............................................

//Ratting dynamic...............
if(! function_exists('renderStarRating')){
    function renderStarRating($rating,$maxRating=5) {
        $fullStar = "<i class = 'fa fa-star active'></i>";
        $halfStar = "<i class = 'fa fa-star half'></i>";
        $emptyStar = "<i class = 'fa fa-star'></i>";
        $rating = $rating <= $maxRating?$rating:$maxRating;

        $fullStarCount = (int)$rating;
        $halfStarCount = ceil($rating)-$fullStarCount;
        $emptyStarCount = $maxRating -$fullStarCount-$halfStarCount;

        $html = str_repeat($fullStar,$fullStarCount);
        $html .= str_repeat($halfStar,$halfStarCount);
        $html .= str_repeat($emptyStar,$emptyStarCount);
        echo $html;
    }

    //filter products published
    if (! function_exists('filter_products')) {
        function filter_products($products) {
                return $products->where('published', '1');
        }
    }
}



