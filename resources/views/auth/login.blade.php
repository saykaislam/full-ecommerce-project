@extends('frontend.layouts.master')
@section('title', 'Login')
@section('content')

    <!-- breadcrumb -->
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                    <h3 class="mb-2 text-secondary">Login</h3>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-sm-end align-items-center h-100">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item " aria-current="page">Login</li>
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
                                    <h3>User Login</h3>
                                    <form class="woocommerce-form-login" action="{{route('login')}}" method="POST">
                                        @csrf
                                        <p>
                                            <label for="username">Phone&nbsp;<span class="required">*</span></label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" id="phone" />
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </p>
                                        <p>
                                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" />
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </p>
                                        <div class="row">
                                            <p class="col-6">
                                                <label class="woocommerce-form__label-for-checkbox">
                                                    <input name="rememberme" type="checkbox" />
                                                    <span>Remember me</span>
                                                </label>

                                            </p>
                                            <p class="col-6">
                                                <span class="text-right"><a href="{{route('reset.password')}}" class="text-secondary">Lost your password?</a></span>
                                            </p>
                                        </div>
                                        <button type="submit" class="woocommerce-form-login__submit btn btn-primary rounded-0" name="login" value="Log in">Log in</button>
                                        <p>
                                            Need an account? <span><a href="{{route('register')}}">Register Now</a></span>
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

