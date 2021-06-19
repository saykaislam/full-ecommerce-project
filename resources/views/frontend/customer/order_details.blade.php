@extends('frontend.layouts.master')
@section('title', 'Order Details')
@push('css')
<style>
    body {
        background: #FDFDFD;
        font-family: "Segoe WP","Segoe UI", Helvetica, Arial, sans-serif;
        text-align:center;
    }
    h1, h2 {
        color: #888;
        margin:0;
        font-weight:normal;
    }
    h1{ padding-top: 1.5em; padding-bottom: 2em; }
    h2 {
        clear:both;
        color: #aaa;
        padding: 2em 0 0.3em
    }
    em {
        display: block;
        margin: .5em auto 2em;
        color: #bbb;
    }

    p, p a {
        color: #aaa;
        text-decoration: none;
    }
    p a:hover,
    p a:focus {
        text-decoration: underline;
    }
    p + p { color: #bbb; margin-top: 2em;}
    .detail {position: absolute; text-align: right; right: 5px; bottom: 5px; width: 50%;}

    a[href*="intent"] {
        display:inline-block;
        margin-top: 0.4em;
    }

    /*
     * Rating styles
     */
    .rating {
        width: 226px;
        margin: 0 auto 1em;
        font-size: 45px;
        overflow:hidden;
    }
    .rating input {
        float: right;
        opacity: 0;
        position: absolute;
    }
    .rating a,
    .rating label {
        float:right;
        color: #aaa;
        text-decoration: none;
        -webkit-transition: color .4s;
        -moz-transition: color .4s;
        -o-transition: color .4s;
        transition: color .4s;
    }
    .rating label:hover ~ label,
    .rating input:focus ~ label,
    .rating label:hover,
    .rating a:hover,
    .rating a:hover ~ a,
    .rating a:focus,
    .rating a:focus ~ a		{
        color: orange;
        cursor: pointer;
    }
    .rating2 {
        direction: rtl;
    }
    .rating2 a {
        float:none
    }
</style>
@endpush
@section('content')

    <!-- breadcrumb -->
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                    <h3 class="mb-2 text-secondary">Order Details</h3>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-sm-end align-items-center h-100">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <div class="full-row">
        <div class="container">
            <div class="row">
                @include('frontend.customer.customer_sidebar')
                <div class="col-lg-9">
                    <h4>Order History</h4>
                    <form action="#" id="yith-wcwl-form" class="table-responsive-lg">
                        <table class="shop_table cart wishlist_table wishlist_view traditional table" data-pagination="no" data-per-page="5" data-page="1" data-id="3989" data-token="G5CZRAZPRKEY">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Total (৳)</th>
                                <th>Review</th>
                            </tr>
                            </thead>
                            <tbody class="wishlist-items-wrapper">
                            @foreach($orderDetails as $key=> $orderDetail)
                                <tr id="yith-wcwl-row-103" data-row-id="103">
                                    <td>{{ $key +1 }}</td>
                                    <td>
                                        <img src="{{url($orderDetail->product->thumbnail_img)}}" alt="" width="80" height="80">
                                    </td>
                                    <td>
                                        {{$orderDetail->name}}
                                    </td>
                                    <td>{{$orderDetail->quantity}}</td>
                                    <td><span>{{($orderDetail->price * $orderDetail->quantity) + $orderDetail->vat + $orderDetail->labour_cost}}</span></td>
                                    <td>
                                        @php
                                            $review = \App\Model\Review::where('order_id',$order->id)->where('user_id',$order->user_id)->where('product_id',$orderDetail->product_id)->first();
                                        @endphp
                                        @if($order->delivery_status == 'Completed' && empty($review))
                                            <a class="btn btn-default" data-bs-toggle="modal" onclick="getProductId('{{$orderDetail->product_id}}')" data-bs-target="#staticBackdrop" style="background: yellow;">
                                                <i class="fa fa-star"></i></a>
                                        @elseif(!empty($review))
                                            <i title="Review submitted!" class="fa fa-check-square text-success text-bold"></i>
                                        @else
                                            <p>Order not Delivered yet</p>
                                        @endif
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
    !-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.order.review.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id">
                        <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">
                        <div class="row">
                            <div class="rating">
                                <input name="rating" id="e5" value="5" type="radio"><label for="e5">☆</label>
                                <input name="rating" id="e4" value="4" type="radio"><label for="e4">☆</label>
                                <input name="rating" id="e3" value="3" type="radio"><label for="e3">☆</label>
                                <input name="rating" id="e2" value="3" type="radio"><label for="e2">☆</label>
                                <input name="rating" id="e1" value="1" type="radio"><label for="e1">☆</label>
                            </div>

                            <div class="">
{{--                                <label for="address" style="color: black">Comment <span class="required">*</span></label>--}}
                                <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Write your review here" style="background-color: #f3f3f3"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function getProductId(productId){
            $('#product_id').val(productId);
            console.log(productId)
        }
    </script>
@endpush
