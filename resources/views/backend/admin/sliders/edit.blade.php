 <!-- Main content -->
    <section class="content" style="padding-top: 20px;">
        <div class="row">
            <div class="col-8 offset-2">
                <!-- general form elements -->
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">Edit Sliders</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.sliders.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                       value="{{$slider->title}}">
                            </div>
                            <img src="{{asset('uploads/sliders/'.$slider->image)}}" width="80" height="50" alt="">
                            <div class="form-group">
                                <label for="image">Slider Image <small>(size: 1920 * 1170 pixel)</small></label>
                                <input type="file" class="form-control" name="image" id="image" >
                            </div>
                            <div class="form-group">
                                <label for="url">Url</label>
                                <input type="url" class="form-control " name="url" id="url"
                                       value="{{$slider->url}}">
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
