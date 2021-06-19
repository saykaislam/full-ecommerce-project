@extends('backend.layouts.master')
@section("title","Edit Coupon")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-datepicker/bootstrap-datepicker.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Coupon</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Coupon</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8 offset-2">
                <!-- general form elements -->
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">Edit Coupon</h3>
                        <div class="float-right">
                            <a href="{{route('admin.coupon.index')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-backward"> </i>
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.coupon.update', $coupon->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $coupon->id }}" id="id">
                            <div class="form-group">
                                <label for="coupon_type">Coupon Type</label>
                                <select name="coupon_type" id="coupon_type" class="form-control demo-select2" onchange="coupon_form()" required>
                                    @if ($coupon->type == "product_base"))
                                    <option value="product_base" selected>For Products</option>
                                    @elseif ($coupon->type == "cart_base")
                                        <option value="cart_base">For Total Orders</option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-group" id="coupon_form">

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@stop
@push('js')
    <script src="{{asset('backend/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('backend/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script>

        $('.demo-select2').select2();

    </script>
    <script>
        function coupon_form(){
            var coupon_type = $('#coupon_type').val();
            var id = $('#id').val();
            $.post('{{ route('admin.coupon.get_coupon_form_edit') }}',{_token:'{{ csrf_token() }}', coupon_type:coupon_type, id:id}, function(data){
                $('#coupon_form').html(data);

                $('#demo-dp-range .input-daterange').datepicker({
                    startDate: '-0d',
                    todayBtn: "linked",
                    autoclose: true,
                    todayHighlight: true
                });
            });
        }

        $(document).ready(function(){
            coupon_form();
        });
    </script>
@endpush
