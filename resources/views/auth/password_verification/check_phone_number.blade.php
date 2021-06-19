@extends('frontend.layouts.master')
@section('title','Check Phone Number')
@section('content')
    <div class="full-row" >
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="woocommerce">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-12 mx-auto">
                                <div class="sign-in-form">
                                    <h3>Check Phone Number</h3>
                                    <form action="{{route('phone.check')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Enter your phone number to recover your password.</label>
                                            <input type="number" class="form-control" name="phone" id="phone" minlength="11" aria-describedby="emailHelp">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                        <div style="padding-top: 20px;">
                                            Back To <span><a href="{{route('login')}}">Login</a></span>
                                        </div>
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
