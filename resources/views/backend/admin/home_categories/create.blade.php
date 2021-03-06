<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Home Categories</h3>
    </div>

    <!--Horizontal Form-->
    <!--===================================================-->
    <form class="form-horizontal" action="{{ route('admin.home_categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="panel-body">
            <div class="form-group" id="category">
                <label class="col-lg-2 control-label">Category</label>
                <div class="col-lg-7">
                    <select class="form-control demo-select2-placeholder" name="category_id" id="category_id" required>
                        @foreach(\App\Model\Category::all() as $category)
                            @if (\App\Model\HomeCategory::where('category_id', $category->id)->first() == null)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="btn btn-info" type="submit">Save</button>
        </div>
    </form>
    <!--===================================================-->
    <!--End Horizontal Form-->

</div>
