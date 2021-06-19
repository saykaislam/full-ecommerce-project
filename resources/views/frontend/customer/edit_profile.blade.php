@extends('frontend.layouts.master')
@section('title', 'Customer Edit Profile')
@push('css')
@endpush
@section('content')
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                    <h3 class="mb-2 text-secondary">Edit Profile</h3>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-sm-end align-items-center h-100">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
                    <h4>Edit Profile</h4>
                    <form class="woocommerce-form-login" action="{{route('user.profile-update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <p class="col-6">
                                <label for="name">Name <span class="required">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{Auth::User()->name}}" id="name" style="background-color: #f3f3f3"/>
                            </p>
                            <p class="col-6">
                                <label for="email"> Email address&nbsp;<span class="required">*</span></label>
                                <input type="text" class="form-control" name="email" value="{{Auth::User()->email}}" id="email" style="background-color: #f3f3f3"/>
                            </p>
                            <p class="col-6">
                                <label for="phone">Phone<span class="required">*</span></label>
                                <input type="text" class="form-control" name="phone" value="{{Auth::User()->phone}}" id="phone" style="background-color: #f3f3f3" readonly/>
                            </p>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Profile Image </label>
                                    <input type="file"  name="avatar_original" class="form-control"  >
                                </div>
                            </div>
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
