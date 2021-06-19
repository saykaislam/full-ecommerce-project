@extends('backend.layouts.master')
@section("title","Home Settings")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#home_categories" data-toggle="tab">Home categories</a></li>
                <li class="nav-item"><a class="nav-link" href="#home_slider" data-toggle="tab">Home slider</a></li>
                <li class="nav-item"><a class="nav-link" href="#home_banner_1" data-toggle="tab">Home banner 1</a></li>
                <li class="nav-item"><a class="nav-link" href="#home_banner_2" data-toggle="tab">Home banner 2</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="home_categories">
                    <div class="row">
                        <div class="col-sm-12">
                            <a onclick="add_home_category()" class="btn btn-rounded btn-info pull-right">Add New Category</a>
                        </div>
                    </div>
                    <br>

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Home Categories</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th width="10%">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Model\HomeCategory::all() as $key => $home_category)
                                    @if ($home_category->category != null)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$home_category->category->name}}</td>
                                            <td><label class="switch">
                                                    <input onchange="update_home_category_status(this)" value="{{ $home_category->id }}" type="checkbox" <?php if($home_category->status == 1) echo "checked";?> >
                                                    <span class="slider round"></span></label></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="bg-info dropdown-item" onclick="edit_home_category({{ $home_category->id }})">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="home_slider">
                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-info card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title float-left">Sliders Lists</h3>
                                        <div class="float-right">
                                            <a onclick="add_slider()">
                                                <button class="btn btn-success">
                                                    <i class="fa fa-plus-circle"></i>
                                                    Add
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>#Id</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(\App\Model\Slider::latest()->get() as $key => $slider)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{ $slider->title }}</td>
                                                    <td>
                                                        <img src="{{asset('uploads/sliders/'.$slider->image)}}" width="50" height="50" alt="">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info waves-effect" onclick="edit_slider({{ $slider->id }})">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-danger waves-effect" type="button"
                                                                onclick="confirm_modal({{$slider->id}})">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <form id="delete-form-{{$slider->id}}" action="{{route('admin.sliders.destroy',$slider->id)}}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#Id</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="home_banner_1">
                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-info card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title float-left">Home Banner 1</h3>
                                        <div class="float-right">
                                            <a onclick="add_banner_1()">
                                                <button class="btn btn-success">
                                                    <i class="fa fa-plus-circle"></i>
                                                    Add
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>#Id</th>
                                                <th>Image</th>
                                                <th>Publish</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(\App\Model\Banner::where('position', 1)->latest()->get() as $key => $banner)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>
                                                        <img src="{{url($banner->photo)}}" width="80" height="80" alt="">
                                                    </td>
                                                    <td>
                                                        <label class="switch">
                                                            <input onchange="update_banner_published(this)" value="{{ $banner->id }}" type="checkbox" <?php if($banner->published == 1) echo "checked";?> >
                                                            <span class="slider round"></span></label>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info waves-effect" onclick="edit_home_banner_1({{$banner->id}})">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-danger waves-effect" type="button"
                                                                onclick="confirm_modal({{$banner->id}})">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <form id="delete-form-{{$banner->id}}" action="{{route('admin.banners.destroy',$banner->id)}}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#Id</th>
                                                <th>Image</th>
                                                <th>Publish</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="home_banner_2">
                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-info card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title float-left">Home Banner 1</h3>
                                        <div class="float-right">
                                            <a onclick="add_banner_2()">
                                                <button class="btn btn-success">
                                                    <i class="fa fa-plus-circle"></i>
                                                    Add
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>#Id</th>
                                                <th>Image</th>
                                                <th>Publish</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(\App\Model\Banner::where('position', 2)->latest()->get() as $key => $banner)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>
                                                        <img src="{{url($banner->photo)}}" width="80" height="80" alt="">
                                                    </td>
                                                    <td>
                                                        <label class="switch">
                                                            <input onchange="update_banner_2_published(this)" value="{{ $banner->id }}" type="checkbox" <?php if($banner->published == 1) echo "checked";?> >
                                                            <span class="slider round"></span></label>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info waves-effect" onclick="edit_home_banner_1({{$banner->id}})">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-danger waves-effect" type="button"
                                                                onclick="confirm_modal({{$banner->id}})">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <form id="delete-form-{{$banner->id}}" action="{{route('admin.banners.destroy',$banner->id)}}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#Id</th>
                                                <th>Image</th>
                                                <th>Publish</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
@endsection
@push('js')
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        function add_home_category(){
            $.get('{{ route('admin.home_categories.create')}}', {}, function(data){
                $('#home_categories').html(data);
                $('.demo-select2-placeholder').select2();
            });
        }

        function edit_home_category(id){
            var url = '{{ route("admin.home_categories.edit", "home_category_id") }}';
            url = url.replace('home_category_id', id);
            $.get(url, {}, function(data){
                $('#home_categories').html(data);
                $('.demo-select2-placeholder').select2();
            });
        }

        function update_home_category_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('admin.home_categories.update_status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    toastr.success('Home Page Category status updated successfully');
                }
                else{
                    toastr.error('Something went wrong');
                }
            });
        }
        function add_slider(){
            $.get('{{ route('admin.sliders.create')}}', {}, function(data){
                $('#home_slider').html(data);
            });
        }
        function edit_slider(id){
            var url = '{{ route("admin.sliders.edit", "home_slider_id") }}';
            url = url.replace('home_slider_id', id);
            $.get(url, {}, function(data){
                $('#home_slider').html(data);
            });
        }
        //sweet alert
        function confirm_modal(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your Data is save :)',
                        'error'
                    )
                }
            })
        }
        function add_banner_1(){
            $.get('{{ route('admin.home_banners.create', 1)}}', {}, function(data){
                $('#home_banner_1').html(data);
            });
        }
        function add_banner_2(){
            $.get('{{ route('admin.home_banners.create', 2)}}', {}, function(data){
                $('#home_banner_2').html(data);
            });
        }
        function edit_home_banner_1(id){
            var url = '{{ route("admin.banners.edit", "home_banner_id") }}';
            url = url.replace('home_banner_id', id);
            $.get(url, {}, function(data){
                $('#home_banner_1').html(data);
            });
        }
        function edit_home_banner_1(id){
            var url = '{{ route("admin.banners.edit", "home_banner_id") }}';
            url = url.replace('home_banner_id', id);
            $.get(url, {}, function(data){
                $('#home_banner_2').html(data);
            });
        }
        function update_banner_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('admin.home_banners.update_status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    toastr.success('Banner status updated successfully');
                }
                else{
                    toastr.error('Maximum 2 banners to be published');
                }
            });
        }
        function update_banner_2_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('admin.home_banners.update_status_2') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    toastr.success('Banner status updated successfully');
                }
                else{
                    toastr.error('Maximum 3 banners to be published');
                }
            });
        }

    </script>
@endpush
