@extends('frontend.layouts.master')
@section('title','Checkout')
@section('content')
    <!-- breadcrumb -->
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                    <h3 class="mb-2 text-secondary">Checkout</h3>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-sm-end align-items-center h-100">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <div id="main-content" class="full-row site-content">
        <div class="container">
            <div class="row ">
                <div id="primary" class="content-area col-md-12">
                    <article id="post-19" class="post-19 page type-page status-publish hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="woocommerce-notices-wrapper"></div>
                                <div class="woocommerce-form-login-toggle">
                                    <div class="woocommerce-info">
                                        Returning customer? <a href="#" class="showlogin">Click here to login</a> </div>
                                </div>
                                <form class="woocommerce-form woocommerce-form-login login" method="post" style="display:none;">
                                    <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.</p>
                                    <p class="form-row form-row-first">
                                        <label for="username">Username or email&nbsp;<span class="required">*</span></label>
                                        <input type="text" class="input-text" name="username" id="username" autocomplete="username">
                                    </p>
                                    <p class="form-row form-row-last">
                                        <label for="password">Password&nbsp;<span class="required">*</span></label>
                                        <input class="input-text" type="password" name="password" id="password" autocomplete="current-password">
                                    </p>
                                    <div class="clear"></div>
                                    <p class="form-row">
                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                                        </label>
                                        <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="09ee59a7f0"><input type="hidden" name="_wp_http_referer" value="/checkout/"> <input type="hidden" name="redirect" value="https://kapee.presslayouts.com/checkout/">
                                        <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Login">Login</button>
                                    </p>
                                    <p class="lost_password">
                                        <a href="https://kapee.presslayouts.com/my-account/lost-password/">Lost your password?</a>
                                    </p>
                                    <div class="clear"></div>
                                </form>


                                <div class="woocommerce-form-coupon-toggle">
                                    <div class="woocommerce-info">
                                        Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a> </div>
                                </div>


                                <form class="checkout_coupon woocommerce-form-coupon" method="POST" style="display:none">

                                    <p>If you have a coupon code, please apply it below.</p>
                                    <p class="form-row form-row-first">
                                        <input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="">
                                    </p>
                                    <p class="form-row form-row-last">
                                        <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                                    </p>
                                </form>


                                <form name="checkout"  method="post" class="checkout woocommerce-checkout" action="{{route('checkout.order.submit')}}" enctype="multipart/form-data" novalidate="novalidate">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h4>Shipping Address</h4>
                                            @php
                                                $addresses = \App\Model\Address::where('user_id',Auth::user()->id)->latest()->get();
                                            @endphp
                                            <div class="row">
                                                @if(!empty($addresses))
                                                    @foreach($addresses as $address)
                                                        <div class="col-md-6" style="padding-bottom: 15px;">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="ps-radio">
                                                                        <input class="form-check-input" type="radio" name="address_id" id="{{$address->id}}" value="{{$address->id}}" {{$address->set_default == 1 ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="{{$address->id}}" style="background: #f3f3f3; color: #f3f3f3;">
                                                                        </label>
                                                                    </div>
                                                                    <div class="card-text">Address: <strong>{{$address->address}}</strong></div>
                                                                    <div class="card-text">Postal Code: <strong>{{$address->postal_code}}</strong></div>
                                                                    <div class="card-text">City: <strong>{{$address->city}}</strong></div>
                                                                    <div class="card-text">Country: <strong>{{$address->country}}</strong></div>
                                                                    <div class="card-text">Phone: <strong>{{$address->phone}}</strong></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="col-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="text-center">
                                                                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fa fa-plus"></i></a>
                                                                <p>Add new Address</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-5">
                                            <div class="order-review-inner">
                                                <h3 id="order_review_heading">Your order</h3>
                                                <div id="order_review" class="woocommerce-checkout-review-order">
                                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                                        <thead>
                                                        <tr>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-total">Subtotal</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach(Cart::content() as $product)
                                                            <tr class="cart_item">
                                                                <td class="product-name">
                                                                    {{$product->name}} <strong class="product-quantity">×&nbsp;{{$product->qty}}</strong> </td>
                                                                <td class="product-total">
                                                                        <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">৳</span>{{ home_discounted_base_price($product->id) * $product->qty}}</bdi>
                                                                        </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr class="cart-subtotal">
                                                            <th>Subtotal</th>
                                                            <td><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">৳</span>{{Cart::subtotal()}}</bdi>
                                                                        </span>
                                                            </td>
                                                        </tr>
                                                        <tr class="woocommerce-shipping-totals shipping">
                                                            <th>Shipping</th>
                                                            <td data-title="Shipping">
                                                                <ul id="shipping_method" class="woocommerce-shipping-methods">
                                                                    <li>
                                                                        <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping1" value="free_shipping:1" class="shipping_method" checked="checked">
                                                                        <label for="shipping_method_0_free_shipping1">Inside Dhaka. ৳50</label>
                                                                    </li>
                                                                    <li>
                                                                        <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate2" value="flat_rate:2" class="shipping_method">
                                                                        <label for="shipping_method_0_flat_rate2">Outside Dhaka. ৳100</label>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>518.00</bdi></span></strong> </td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                    <div id="payment" class="woocommerce-checkout-payment">
                                                        <ul class="wc_payment_methods payment_methods methods">
                                                            <li class="wc_payment_method payment_method_cheque">
                                                                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" data-order_button_text="">

                                                                <label for="payment_method_cheque">
                                                                    Check payments 	</label>
                                                                <div class="payment_box payment_method_cheque">
                                                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                                </div>
                                                            </li>
                                                            <li class="wc_payment_method payment_method_cod">
                                                                <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" data-order_button_text="">

                                                                <label for="payment_method_cod">
                                                                    Cash on delivery 	</label>
                                                                <div class="payment_box payment_method_cod">
                                                                    <p>Pay with cash upon delivery.</p>
                                                                    <input class="form-check-input" type="radio" name="pay" id="cod" value="cod" checked autocomplete="off" >
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="form-row place-order">
                                                            <noscript>
                                                                Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.			<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals">Update totals</button>
                                                            </noscript>

                                                            <div class="woocommerce-terms-and-conditions-wrapper">
                                                                <div class="woocommerce-privacy-policy-text"></div>
                                                            </div>


                                                            <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Place order</button>

                                                            <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="a44d43c9ca"><input type="hidden" name="_wp_http_referer" value="/wordpress/foden/?wc-ajax=update_order_review">                                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- .entry-content -->
                    </article>
                    <!-- #post-## -->
                </div>
                <!-- .entry-content-wrapper -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.address.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <p class="">
                                <label for="phone">Phone <span class="required">*</span></label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter your phone number " id="phone" style="background-color: #f3f3f3"/>
                            </p>
                            <p class="">
                                <label for="city">City <span class="required">*</span></label>
                                <input type="text" class="form-control" name="city"  id="city" placeholder="Enter your City" style="background-color: #f3f3f3"/>
                            </p>
                            <p class="">
                                <label for="postal_code">Postal code <small >(Optional)</small></label>
                                <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Enter your Postal code" style="background-color: #f3f3f3"/>
                            </p>
                            <div class="">
                                <label for="address">Address <span class="required">*</span></label>
                                <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter Your Address" style="background-color: #f3f3f3"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                {{--                <div class="modal-footer">--}}
                {{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
                {{--                    <button type="button" class="btn btn-primary">Understood</button>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
