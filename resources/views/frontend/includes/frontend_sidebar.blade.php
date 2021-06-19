
@php
$categories = \App\Model\Category::where('is_home',1)->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            @foreach($categories as $category)
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{$category->name}}</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        @php
                        $subcategories = \App\Model\Subcategory::where('category_id',$category->id)->get();
                        @endphp
                        <div class="row">
                            @foreach($subcategories as $subcategory)
                                <h5><strong>{{$subcategory->name}}</strong></h5>
                            <div class="col-sm-12 col-md-3">
                                @php
                                $subSubcategories = \App\Model\SubSubcategory::where('sub_category_id', $subcategory->id)->get();
                                @endphp
                                <ul class="links list-unstyled">
                                    @foreach($subSubcategories as $subSubcategory)
                                    <li><a href="{{route('products-by-subcategory',$subcategory->slug)}}">{{$subSubcategory->name}}</a></li>
                                    @endforeach
{{--                                    <li><a href="#">Shoes </a></li>--}}
{{--                                    <li><a href="#">Jackets</a></li>--}}
{{--                                    <li><a href="#">Sunglasses</a></li>--}}
{{--                                    <li><a href="#">Sport Wear</a></li>--}}
{{--                                    <li><a href="#">Blazers</a></li>--}}
{{--                                    <li><a href="#">Shirts</a></li>--}}
{{--                                    <li><a href="#">Shorts</a></li>--}}
                                </ul>
                            </div><!-- /.col -->
                            @endforeach
                        </div><!-- /.row -->
                    </li><!-- /.yamm-content -->
                </ul><!-- /.dropdown-menu -->
            </li><!-- /.menu-item -->
            @endforeach
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div>
