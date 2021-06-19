@extends('frontend.layouts.master')
@section('title', 'Order History')
@push('css')
@endpush
@section('content')

    <!-- breadcrumb -->
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                    <h3 class="mb-2 text-secondary">Order History</h3>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-sm-end align-items-center h-100">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order History</li>
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
                                <th>#Id</th>
                                <th>Invoice</th>
                                <th>Date</th>
                                <th>Discount</th>
                                <th>Grand Total</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Print</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody class="wishlist-items-wrapper">
                            <tr id="yith-wcwl-row-103" data-row-id="103">
                                @foreach($orders as $key=> $order)
                                    <td>{{ $key + 1 }}</td>
                                <td>{{$order->invoice_code}}</td>
                                    <td>{{date('j-m-Y',strtotime($order->created_at))}}</td>
                                    <td>{{ $order->discount }}</td>
                                    <td>{{ $order->grand_total}}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->delivery_status }}</td>
                                    <td>
                                        <a href="{{ route('invoice.print',encrypt($order->id)) }}" target="_blank" class="btn btn-default" style="background: green;"><i class="fa fa-print"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('user.order.details',encrypt($order->id))}}"><i class="fa fa-eye"></i></a>
                                    </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush
