@extends('frontend.layouts.master')
@section('title', 'Shipping Address')
@push('css')
@endpush
@section('content')
    <div class="full-row bg-light py-5">
        <div class="container">
            <div class="row text-secondary">
                <div class="col-sm-6">
                    <h3 class="mb-2 text-secondary">Shipping Address</h3>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-sm-end align-items-center h-100">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shipping Address</li>
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
                    <h4>Shipping Address</h4>
                    <div class="row">
                        @if(!empty($addresses))
                            @foreach($addresses as $address)
                                <div class="col-md-6" style="padding-bottom: 15px;">
                                    <div class="card">
                                        <div class="text-right dropdown" style="margin-left: 365px;">
                                            <button class="btn bg-black " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background: #f1f1f1;">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                @if($address->set_default == 0)
                                                    <li>
                                                        <form action="{{route('user.update.status',$address->id)}}" method="POST">
                                                            @csrf
                                                            <button class="btn btn-lg"> <a class="dropdown-item">Make Default</a></button>
                                                        </form>
                                                    </li>
                                                @endif

                                                <form action="{{route('user.address.destroy',$address->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm"><a class="dropdown-item"> Delete </a></button>
                                                </form>

                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-text">Address: <strong>{{$address->address}}</strong></div>
                                            <div class="card-text">Postal Code: <strong>{{$address->postal_code}}</strong></div>
                                            <div class="card-text">City: <strong>{{$address->city}}</strong></div>
                                            <div class="card-text">Country: <strong>{{$address->country}}</strong></div>
                                            <div class="card-text">Phone: <strong>{{$address->phone}}</strong></div>
                                                @if($address->set_default == 1)
                                                    <a href="#" class="btn btn-primary btn-sm" style="margin-left: 180px;">Default</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-6" style="padding-bottom: 15px;">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fa fa-plus"></i></a>
                                            <p>Add new Address</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.address.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <p class="">
                                <label for="phone">Phone <span class="required">*</span></label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter your phone number " id="phone" style="background-color: #f3f3f3"/>
                            </p>
                            <p class="">
                                <label for="city">City <span class="required">*</span></label>
                                <input type="text" class="form-control" name="city"  id="city" placeholder="Enter your City" style="background-color: #f3f3f3"/>
                            </p>
                            <p class="">
                                <label for="postal_code">Postal code <small >(Optional)</small></label>
                                <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Enter your Postal code" style="background-color: #f3f3f3"/>
                            </p>
                            <div class="">
                                <label for="address">Address <span class="required">*</span></label>
                                <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter Your Address" style="background-color: #f3f3f3"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                {{--                <div class="modal-footer">--}}
                {{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
                {{--                    <button type="button" class="btn btn-primary">Understood</button>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush
