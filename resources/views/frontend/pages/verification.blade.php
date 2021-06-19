@extends('frontend.layouts.master')
@section('title','Phone Verification')
@section('content')
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-sm-end align-items-center h-100">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item " aria-current="page">Phone Verification</li>
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
                                    <h3>Phone Verification</h3>
                                    <form action="{{route('get-verification-code.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="phone" value="{{$verCode->phone}}">
                                        <div class="mb-3">
                                            <label for="code" class="form-label">Enter your code</label>
                                            <input type="number" class="form-control" name="code" id="code" aria-describedby="emailHelp">
{{--                                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
