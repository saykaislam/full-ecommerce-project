@extends('frontend.layouts.master')
@section('title', 'Customer Edit Password')
@push('css')
@endpush
@section('content')
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                    <h3 class="mb-2 text-secondary">Edit Password</h3>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-sm-end align-items-center h-100">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="full-row" style="background-color: #ffffff">
        <div class="container">
            <div class="row">
                @include('frontend.customer.customer_sidebar')
                <div class="col-lg-9">
                    <h4>Edit Password</h4>
                    <form class="woocommerce-form-login" action="{{route('user.password-update')}}" method="POST" >
                        @csrf
                        <div class="row">
                            <p class="col-6">
                                <label for="old_password">Old Password <span class="required">*</span></label>
                                <input type="password" class="form-control" name="old_password" placeholder="Enter Old password" style="background-color: #f3f3f3"/>
                            </p>
                            <p class="col-6">
                                <label for="password">New Password <span class="required">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Enter New Password" style="background-color: #f3f3f3"/>
                            </p>
                        </div>
                        <button type="submit" class="woocommerce-form-login__submit btn btn-primary rounded-0" >Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush
