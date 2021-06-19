@extends('frontend.layouts.master')
@section('title', 'Wishlist')
@push('css')
@endpush
@section('content')
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                    <h3 class="mb-2 text-secondary">Wishlist</h3>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-sm-end align-items-center h-100">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /.breadcrumb -->
    <div class="full-row">
        <div class="container">
            <div class="row">
                @include('frontend.customer.customer_sidebar')
                <div class="col-lg-9">
                    <h4>Wishlist</h4>
                    <form action="#" id="yith-wcwl-form" class="table-responsive-lg">
                        <table class="shop_table cart wishlist_table wishlist_view traditional table" data-pagination="no" data-per-page="5" data-page="1" data-id="3989" data-token="G5CZRAZPRKEY">
                            <thead>
                            <tr>
                                <th class="product-remove"> <span class="nobr"> </span></th>
                                <th class="product-thumbnail"></th>
                                <th class="product-name"> <span class="nobr"> Product name </span></th>
                                <th class="product-price"> <span class="nobr"> Unit price </span></th>
                                <th class="product-stock-status"> <span class="nobr"> Stock status </span></th>
                                <th class="product-add-to-cart"> <span class="nobr"> </span></th>
                            </tr>
                            </thead>
                            <tbody class="wishlist-items-wrapper">
                            @foreach($wishlists as $wishlist)
                            <tr id="yith-wcwl-row-103" data-row-id="103">
                                <td class="product-remove">
                                    <div>
                                        <a href="#" class="remove remove_from_wishlist" title="Remove this product" onclick="removeFromWishlist({{ $wishlist->id }})"></a>
                                    </div>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="#"> <img src="{{url($wishlist->product->thumbnail_img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""> </a>
                                </td>
                                <td class="product-name"> <a href="https://kapee.presslayouts.com/product/navy-blue-silver-white-multifunction-analog-watch/">{{ $wishlist->product->name }}</a></td>
                                <td class="product-price"> <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span>৳{{ home_discounted_base_price($wishlist->product_id) }}</bdi>
                                            </span>
                                </td>
                                <td class="product-stock-status">
                                    @if($wishlist->product->current_stock > 0)
                                    <span class="wishlist-in-stock">In Stock</span>
                                    @else
                                        <span class="wishlist-in-stock">Stock Out</span>
                                    @endif
                                </td>
                                <td class="product-add-to-cart">
                                    <!-- Date added -->
                                    <!-- Add to cart button --><a href="{{route('product-details',$wishlist->product->slug)}}" data-quantity="1" class="button add_to_cart_button ajax_add_to_cart add_to_cart alt" data-product_id="103"
                                                                  data-product_sku="" aria-label="Add “Navy Blue-Silver-White Multifunction Analog Watch” to your cart" rel="nofollow">Add to Cart</a>
                                    <!-- Change wishlist -->
                                    <!-- Remove from wishlist -->
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        function removeFromWishlist(id){
            $.post('{{ route('wishlists.remove') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
                $('#wishlist').html(data);
                $('#wishlist_'+id).hide();
                toastr.success('Item has been removed from wishlist');
            })
        }
    </script>
@endpush
