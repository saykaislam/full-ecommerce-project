<section class="content">
    <div class="row">
        <div class="col-8 offset-2">
            <!-- general form elements -->
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title float-left">Edit Banners</h3>
                    <div class="float-right">
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.banners.update',$banner->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
{{--                        <input type="hidden" name="position" value="{{ $position }}">--}}
                        <img src="{{url($banner->photo)}}" width="100" height="80">
                        <div class="form-group">
                            <label for="photo">Banner Image <small>(size: 409 * 220 pixel)</small></label>
                            <input type="file" class="form-control" name="photo" id="photo" >
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" name="url" value="{{$banner->url}}" id="url" placeholder="Enter Banner URL">
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
