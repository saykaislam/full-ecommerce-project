@extends('frontend.layouts.master')
@section('title', 'Register')

@section('content')
    <!-- breadcrumb -->
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                    <h3 class="mb-2 text-secondary">Register</h3>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-sm-end align-items-center h-100">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item " aria-current="page">Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <div class="full-row" style="margin-top: -50px;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="woocommerce">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-12 mx-auto">
                                <div class="sign-in-form">
                                    <h3>User Registration</h3>
                                    <form class="woocommerce-form-login" action="{{route('user.register')}}" method="POST">
                                        @csrf
                                        <p>
                                            <label for="name">Name&nbsp;<span class="required">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name" required/>
                                        </p>
                                        <p>
                                            <label for="phone">Phone&nbsp;<span class="required">*</span></label>
                                            <input type="text" class="form-control" name="phone" id="phone" required/>
                                        </p>
                                        <p>
                                            <label for="email">Email&nbsp;<span class="required">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email" required/>
                                        </p>
                                        <p>
                                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                                            <input class="form-control" type="password" name="password" id="password" />
                                        </p>

                                        <button type="submit" class="woocommerce-form-login__submit btn btn-primary rounded-0" name="login" value="Log in">Save</button>
                                        <p>
                                            Already have an account? <span><a href="{{route('login')}}">Log In</a></span>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

