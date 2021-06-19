@extends('backend.layouts.master')
@section('title','Logo Settings')
@section('content')


    <!-- Main content -->
    <section class="content" style="padding-top: 20px;">
        <div class="row">
            <div class="col-8 offset-2">
                <!-- general form elements -->
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">Logo Settings</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.generalsettings.logo.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3" for="logo">Frontend Header logo<small>(max height 40px)</small></label>
                                <div class="col-sm-9">
                                    <input type="file" id="logo" name="logo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3" for="logo">Frontend Footer logo</label>
                                <div class="col-sm-9">
                                    <input type="file" id="logo" name="footer_logo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="admin_logo">Admin logo<small>(60x60)</small></label>
                                <div class="col-sm-9">
                                    <input type="file" id="admin_logo" name="admin_logo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3" for="admin_login_sidebar">Admin login sidebar image <small>(600x500)</small></label>
                                <div class="col-sm-9">
                                    <input type="file" id="admin_login_sidebar" name="admin_login_sidebar" class="form-control">
                                </div>
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
{{--    <div class="col-lg-6 col-lg-offset-3">--}}
{{--        <div class="panel">--}}
{{--            <div class="panel-heading">--}}
{{--                <h3 class="panel-title">Logo Settings</h3>--}}
{{--            </div>--}}

{{--            <!--Horizontal Form-->--}}
{{--            <!--===================================================-->--}}
{{--            <form class="form-horizontal" action="{{ route('admin.generalsettings.logo.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="panel-body">--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-sm-3 control-label" for="logo">Frontend Header logo<small>(max height 40px)</small></label>--}}
{{--                        <div class="col-sm-9">--}}
{{--                            <input type="file" id="logo" name="logo" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-sm-3 control-label" for="logo">Frontend Footer logo</label>--}}
{{--                        <div class="col-sm-9">--}}
{{--                            <input type="file" id="logo" name="footer_logo" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-sm-3 control-label" for="admin_logo">Admin logo<small>(60x60)</small></label>--}}
{{--                        <div class="col-sm-9">--}}
{{--                            <input type="file" id="admin_logo" name="admin_logo" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-sm-3 control-label" for="favicon">Favicon <small>(32x32)</small></label>--}}
{{--                        <div class="col-sm-9">--}}
{{--                            <input type="file" id="favicon" name="favicon" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-sm-3 control-label" for="admin_login_background">Admin login background image <small>(1920x1080)</small></label>--}}
{{--                        <div class="col-sm-9">--}}
{{--                            <input type="file" id="admin_login_background" name="admin_login_background" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-sm-3 control-label" for="admin_login_sidebar">Admin login sidebar image <small>(600x500)</small></label>--}}
{{--                        <div class="col-sm-9">--}}
{{--                            <input type="file" id="admin_login_sidebar" name="admin_login_sidebar" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="panel-footer text-right">--}}
{{--                    <button class="btn btn-info" type="submit">Save</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--            <!--===================================================-->--}}
{{--            <!--End Horizontal Form-->--}}

{{--        </div>--}}
{{--    </div>--}}

@endsection
