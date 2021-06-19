@extends('backend.layouts.master')
@section("title","Order List")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">PenOrder List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">Order List</h3>
                        <div class="float-right">
                            {{--<a href="{{route('admin.p.create')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i>
                                    Add
                                </button>
                            </a>--}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Date</th>
                                <th>Invoice ID</th>
                                <th>Payment Method</th>
                                <th>Grand Total</th>
                                <th title="Delivery Status">D.Status</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                                <tr>
                                    <td>
                                        {{$key + 1}}
                                    </td>
                                    <td>
                                        {{date('j-m-Y',strtotime($order->created_at))}}
                                        @if($order->view == 0)
                                            <span class="right badge badge-danger">New</span>
                                        @endif
                                    </td>
                                    <td>{{$order->invoice_code}}</td>
                                    <td>{{$order->payment_type}}</td>
                                    <td>{{$order->grand_total }}</td>
                                    <td>
                                        <form id="status-form-{{$order->id}}" action="{{route('admin.order-product.status',$order->id)}}">
                                            <select name="delivery_status" id="" onchange="deliveryStatusChange({{$order->id}})">
                                                <option value="Pending" {{$order->delivery_status == 'Pending'? 'selected' : ''}}>Pending</option>
                                                <option value="On review" {{$order->delivery_status == 'On review'? 'selected' : ''}}>On review</option>
                                                <option value="On delivered" {{$order->delivery_status == 'On delivered'? 'selected' : ''}}>On delivered</option>
                                                <option value="Delivered" {{$order->delivery_status == 'Delivered'? 'selected' : ''}}>Delivered</option>
                                                <option value="Completed" {{$order->delivery_status == 'Completed'? 'selected' : ''}}>Completed</option>
                                                <option value="Cancel" {{$order->delivery_status == 'Cancel'? 'selected' : ''}}>Cancel</option>
                                            </select>
                                        </form>

                                    </td>
                                    <td>
                                        <a class="btn btn-info waves-effect" href="{{route('admin.order-details',encrypt($order->id))}}">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#ID</th>
                                <th>Date</th>
                                <th>Invoice ID</th>
                                <th>Payment Method</th>
                                <th>Grand Total</th>
                                <th title="Delivery Status">D.Status</th>
                                <th>Details</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>

@stop
@push('js')
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endpush
