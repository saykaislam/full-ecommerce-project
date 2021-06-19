<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Address;
use App\Model\Color;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Product;
use App\Model\ProductStock;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartShow(){
        return view('frontend.pages.product.shopping_cart');
    }
    public function checkout(){
        return view('frontend.pages.product.checkout');
    }

    public function cartRemove($rowId)
    {
        Toastr::error('This Product removed from cart ');
        Cart::remove($rowId);
        return back();
    }
    public function ProductAddCart(Request  $request) {
        $product=Product::find($request->product_id);
        if($request->variant == 0){
            //return 'variant null';
            //$qty= $var[count($var)-1]['value'];
            $data = array();
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = 1;
            $data['price'] = home_discounted_base_price($product->id);
            $data['options']['image'] = $product->thumbnail_img;
            $data['options']['variant_id'] = null;
            $data['options']['variant'] = null;
            $data['options']['cart_type'] = "product";
            Cart::add($data);
            return view('frontend.includes.addToCart', compact('data'));
        }

    }
    public function orderSubmit(Request $request) {
        if ($request->address_id == null) {
            Toastr::error('Please select an address.','Please Select');
            return back();
        }

        $this->validate($request,[
            'pay' => 'required',
        ]);
        if($request->pay == 'cod'){
            $payment_status = 'Due';
        }
        if($request->pay == 'ssl'){
            $payment_status = 'Paid';
        }
        $address = Address::where('user_id',Auth::id())->where('id',$request->address_id)->first();
        $data['name'] = Auth::User()->name;
        $data['email'] = Auth::User()->email;
        $data['address'] = $address->address;
        $data['country'] = $address->country;
        $data['city'] = $address->city;
        $data['postal_code'] = $address->postal_code;
        $data['phone'] = $address->phone;
        $shipping_info = json_encode($data);


        $order = new Order();
        $order->invoice_code = date('Ymd-his');
        $order->user_id = Auth::user()->id;
        $order->shipping_address = $shipping_info;
        $order->payment_type = $request->pay;
        $order->payment_status = $payment_status;
        $order->grand_total = Cart::total();
        $order->delivery_cost = 0;
        $order->delivery_status = "Pending";
        $order->view = 0;
        $order->type = "product";
        $order->save();

        foreach (Cart::content() as $content) {
            $product = Product::find($content->id);
            $orderDetails = new OrderDetails();
            $orderDetails->order_id = $order->id;
            $orderDetails->variation = $content->options->variant;
            $orderDetails->product_id = $content->id;
            $orderDetails->name = $content->name;
            $orderDetails->price = $content->price;
            $orderDetails->quantity = $content->qty;
            $orderDetails->save();

            $product->num_of_sale++;
            $product->save();
        }
        $orderUpdate = Order::find($order->id);
        $orderUpdate->grand_total = $content->price * $content->qty;
        $orderUpdate->save();

        if ($request->pay == 'cod') {

            Toastr::success('Order Successfully done! ');
            Cart::destroy();
            return redirect()->route('index');
        }else {
//
            Toastr::warning('Online Payment Method not yet done. Please try on COD');
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function showQuickViewModal(Request $request)
    {
        $product = Product::find($request->id);
        return view('frontend.products_partials.quickView', compact('product'));
    }

    public function ProductBuy(Request $request)
    {
        //dd($request->all());

        $product = Product::find($request->id);

        $data = array();
        $data['id'] = $product->id;
        $str = '';
        $tax = 0;

        if($request->quantity < $product->min_qty) {
            return Toastr::warning('You have to add minimum '.$min_qty.' products!');
        }

        //check the color enabled or disabled for the product
        if($request->has('color')){
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        if ($product->digital != 1) {
            //Gets all the choice values of customer choice option and generate a string like Black-S-Cotton
            foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
                if($str != null){
                    $str .= '-'.str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
                else{
                    $str .= str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
            }
        }

        $data['variant'] = $str;

        if($str != null && $product->variant_product){
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;
            $quantity = $product_stock->qty;
            //dd($product_stock->variant);
            if($quantity >= $request['quantity']){
                // $variations->$str->qty -= $request['quantity'];
                // $product->variations = json_encode($variations);
                // $product->save();
            }
            else{
                return Toastr::warning('Product Out Of Stock Cart');
            }
        }
        else{
            $price = $product->unit_price;
        }
         //return $price .'and  qty'.$request->quantity;
        $data = array();
        $data['id'] = $product->id;
        $data['name'] = $product->name;
        $data['qty'] = $request->quantity;
        $data['price'] = $price;
        $data['options']['image'] = $product->thumbnail_img;
        $data['options']['variant_id'] = !empty($product_stock) ? $product_stock->id : null;
        $data['options']['variant'] = !empty($product_stock) ? $product_stock->variant : null;
        $data['options']['cart_type'] = "product";
//            if (!empty($flashSale) && $product->flash_sale == 1 && $flDateTime >= $currDateTime){
//                $data['price'] = $product->flash_sale_price;
//            }else {
//                $data['price'] = $product->sale_price;
//            }
        Cart::add($data);
        //$data['countCart'] = Cart::count();
        //dd(Cart::content());
        //return response()->json(['success'=> true, 'response'=>$data]);
        //Toastr::success('Item has been added to cart');
        return view('frontend.includes.addToCart', compact('data'));

    }
    public function globalAddToCart(Request $request)
    {
      return  $this->ProductBuy($request);
    }

}
