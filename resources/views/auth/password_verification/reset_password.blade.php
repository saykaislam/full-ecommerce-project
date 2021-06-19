@extends('frontend.layouts.master')
@section('title','Reset Password')
@section('content')
    <div class="full-row" >
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="woocommerce">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-12 mx-auto">
                                <div class="sign-in-form">
                                    <h3>Reset Password</h3>
                                    <form action="{{route('reset.password.update',$user->id)}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Enter your Password</label>
                                            <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
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
