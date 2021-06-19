@extends('frontend.layouts.master')
@section('title','Compare')
@section('content')
    <!-- breadcrumb -->
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-8">
                    <h3 class="mb-2 text-secondary">Compare</h3>
                </div>
                <div class="col-sm-4">
                    <div class="text-right">
                       <a href="{{ route('compare.reset') }}"> <button type="button" class="btn btn-danger">Reset Compare List</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <div class="full-row">
        <div class="container">
            <div class="row" style="margin-top: -40px;">
                <div class="col-12">
                    @if(Session::has('compare'))
                        @if(count(Session::get('compare')) > 0)
                            <form action="#" id="yith-wcwl-form" class="table-responsive-lg">
                                <table class="shop_table cart wishlist_table wishlist_view traditional table" data-pagination="no" data-per-page="5" data-page="1" data-id="3989" data-token="G5CZRAZPRKEY">
                                    <thead>
                                    <tr>
                                        <th class="product-name"> <span class="nobr"> Product name </span></th>
                                        <th class="product-thumbnail"> Product Image</th>
                                        <th class="product-price"> <span class="nobr"> Price </span></th>
                                        <th class="product-price"> <span class="nobr"> Brand </span></th>
                                        <th class="product-stock-status"> <span class="nobr"> Category</span></th>
                                        <th class="product-add-to-cart"> <span class="nobr"> </span></th>
                                    </tr>
                                    </thead>
                                    <tbody class="wishlist-items-wrapper">
                                    @foreach (Session::get('compare') as $key => $item)
                                        @php
                                            $product = \App\Model\Product::find($item);
                                        @endphp
                                        <tr id="yith-wcwl-row-103" data-row-id="103">
                                            <td class="product-name"> <a href="{{route('product-details',$product->slug)}}">{{$product->name}}</a></td>
                                            <td class="product-thumbnail">
                                                <a href="#"> <img src="{{url($product->thumbnail_img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""> </a>
                                            </td>

                                            <td class="product-price"> <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">৳</span>{{ home_discounted_base_price($product->id) }}</bdi>
                                            </span>
                                            </td>
                                            <td class="product-price"> <span class="woocommerce-Price-amount amount">{{$product->brand->name}}
                                            </span>
                                            </td>
                                            <td class="product-price"> <span class="woocommerce-Price-amount amount">{{$product->category->name}}
                                            </span>
                                            </td>
                                            <td class="product-add-to-cart">
                                                <!-- Date added -->
                                                <!-- Add to cart button --><a href="#" data-quantity="1" class="button add_to_cart_button ajax_add_to_cart add_to_cart alt" data-product_id="103"
                                                                              data-product_sku="" aria-label="Add “Navy Blue-Silver-White Multifunction Analog Watch” to your cart" rel="nofollow" onclick="addToCart('{{$product->id}}', 0 )">Add to Cart</a>
                                                <!-- Change wishlist -->
                                                <!-- Remove from wishlist -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </form>
                        @endif
                    @else
                        <div class="card-body text-center">
                           <img src="{{asset('frontend/assets/images/no-data.jpg')}}" width="500" height="350">
                            <p>Your comparison list is empty</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
