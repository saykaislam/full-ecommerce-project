@extends('frontend.layouts.master')
@section('title', 'Customer Dashboard')
@push('css')
    <style>
    </style>
@endpush
@section('content')
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                    <h3 class="mb-2 text-secondary">Customer Dashboard</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->


    <div class="full-row" style="margin-top: -50px;">
        <div class="container">
            <div class="row">
                @include('frontend.customer.customer_sidebar')
                <div class="col-lg-9">
                    <h4>Dashboard</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-success ">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h3>0</h3>
                                        <p class="text-white">Total Products</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-danger">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h3>0</h3>
                                        <p class="text-white">Total Orders</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-info">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h3>0</h3>
                                        <p class="text-white">Total Wishlist</p>
                                    </div>
                                </div>
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
