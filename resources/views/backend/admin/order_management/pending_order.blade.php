@extends('backend.layouts.master')
@section("title","Pending Order")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pending Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Pending Order</li>
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
                        <h3 class="card-title float-left">Pending Orders</h3>
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
                                <th>#Id</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Payment Method</th>
                                <th>Action</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pending_order as $key => $pending)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{date('j-m-Y',strtotime($pending->created_at))}}</td>
                                    <td>{{$pending->order_details->name}}</td>
                                    <td>{{$pending->payment_type}}</td>
                                    <td>
                                        <form action="{{route('admin.order-product.status',$pending->id)}}">
                                            <select name="delivery_status" id="" onchange="this.form.submit()">
                                                <option value="Pending" {{$pending->delivery_status == 'Pending'? 'selected' : ''}}>Pending</option>
                                                <option value="On review" {{$pending->delivery_status == 'On review'? 'selected' : ''}}>On review</option>
                                                <option value="On delivered" {{$pending->delivery_status == 'On delivered'? 'selected' : ''}}>On delivered</option>
                                                <option value="Delivered" {{$pending->delivery_status == 'Delivered'? 'selected' : ''}}>Delivered</option>
                                                <option value="Completed" {{$pending->delivery_status == 'Completed'? 'selected' : ''}}>Completed</option>
                                                <option value="Cancel" {{$pending->delivery_status == 'Cancel'? 'selected' : ''}}>Cancel</option>
                                            </select>
                                        </form>

                                    </td>
                                    <td>
                                        <a class="btn btn-info waves-effect" href="{{route('admin.order-details',$pending->id)}}">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#Id</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Payment Method</th>
                                <th>Action</th>
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
