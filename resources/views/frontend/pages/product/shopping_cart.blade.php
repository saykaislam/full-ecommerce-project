@extends('frontend.layouts.master')
@section('title','Cart')
@section('content')
    <div class="full-row" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                    <form class="woocommerce-cart-form" action="#" method="post">
                        <table class="shop_table cart">
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Subtotal</th>
                            </tr>
                            @foreach(Cart::content() as $product)
                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                <td class="product-remove">
                                    <a href="{{route('product.cart.remove',$product->rowId)}}" class="remove"></a>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="#"><img src="{{url($product->options->image)}}" alt="Product image"></a>
                                </td>
                                <td class="product-name">
                                    <a href="#">{{$product->name}}</a>
                                    @if($product->options->variant != null)
                                        <p>Variant: {{$product->options->variant}}</p>
                                    @endif
                                </td>
                                <td class="product-price">
                                        <span><bdi><span>৳</span>{{$product->price}}</bdi>
                                        </span>
                                </td>
                                <td class="product-quantity">
                                    <div class="quantity">
                                        <input type="number" name="quantity" value="{{$product->qty}}" min="1" size="4">
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                        <span><bdi><span>৳</span>{{$product->subtotal()}}</bdi>
                                        </span>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @if(Cart::count()==0)
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img src = "https://cdn.dribbble.com/users/204955/screenshots/4930541/emptycart.png?compress=1&resize=400x300" alt = "">
                                    <h3 class="text-danger">Empty Cart</h3>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                    <div class="cart-collaterals">
                        <div class="cart_totals ">
                            <h2>Cart totals</h2>
                            <table>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>
                                            <span><bdi><span>৳</span>{{Cart::subtotal()}}</bdi>
                                            </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>
                                        <ul>
                                            <li>
                                                <input type="radio" name="shipping_method" class="shipping_method" id="shipping_method_0_free_shipping1" checked="checked">
                                                <label for="shipping_method_0_free_shipping1">Inside Dhaka: 50tk</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="shipping_method" class="shipping_method" id="shipping_method_0_flat_rate2">
                                                <label for="shipping_method_0_flat_rate2">Outside Dhaka: 100tk</label>
                                            </li>
                                        </ul>
                                        <p class="woocommerce-shipping-destination">Shipping options will be updated during checkout. </p>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><strong><span class="woocommerce-Price-amount amount"><bdi><span>৳</span>{{Cart::total()}}</bdi></span></strong> </td>
                                </tr>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a href="{{route('checkout')}}" class="checkout-button">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush
