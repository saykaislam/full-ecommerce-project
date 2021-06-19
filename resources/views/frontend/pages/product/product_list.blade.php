@extends('frontend.layouts.master')
{{--@section('title',$title)--}}
@push('css')
    <link rel="stylesheet" href="{{asset('frontend/assets/css/filterstyle.css')}}">
    <script src="https://kit.fontawesome.com/624bf423b0.js" crossorigin="anonymous"></script>
    <style>

    </style>
@endpush
@section('content')
    <div class="full-row">
        <div class="container">
            <form class="" id="search-form" action="{{ route('search') }}" method="GET">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div id="sidebar" class="widget-title-bordered-full">
                            <div id="woocommerce_product_categories-4" class="widget woocommerce widget_product_categories widget-toggle">
                                <h2 class="widget-title">Product categories</h2>
                                <ul class="category-filter">
                                    @if(!isset($category_id) && !isset($category_id) && !isset($subcategory_id) && !isset($subsubcategory_id))
                                        @foreach(\App\Model\Category::all() as $category)
                                            <li class=""><a href="{{ route('products.category', $category->slug) }}">{{  __($category->name) }}</a></li>
                                        @endforeach
                                    @endif
                                    @if(isset($category_id))
                                        <li class="active"><a href="{{ route('products') }}">{{ __('All Categories')}}</a></li>
                                        <li class="active"><a href="{{ route('products.category', \App\Model\Category::find($category_id)->slug) }}">{{  __(\App\Model\Category::find($category_id)->name) }}</a></li>
                                        @foreach (\App\Model\Category::find($category_id)->subcategories as $key2 => $subcategory)
                                            <li class="child"><a href="{{ route('products.subcategory', $subcategory->slug) }}">{{  __($subcategory->name) }}</a></li>
                                        @endforeach
                                    @endif
                                    @if(isset($subcategory_id))

                                        <li class="active"><a href="{{ route('products') }}">{{ __('All Categories')}}</a></li>
                                        <li class="active"><a href="{{ route('products.category', \App\Model\SubCategory::find($subcategory_id)->category->slug) }}">{{  __(\App\Model\SubCategory::find($subcategory_id)->category->name) }}</a></li>
                                        <li class="active"><a href="{{ route('products.subcategory', \App\Model\SubCategory::find($subcategory_id)->slug) }}">{{  __(\App\Model\SubCategory::find($subcategory_id)->name) }}</a></li>
                                        @foreach (\App\Model\SubCategory::find($subcategory_id)->subsubcategories as $key3 => $subsubcategory)
                                            <li class="child"><a href="{{ route('products.subsubcategory', $subsubcategory->slug) }}">{{  __($subsubcategory->name) }}</a></li>
                                        @endforeach
                                    @endif
                                    @if(isset($subsubcategory_id))
                                        <li class="active"><a href="{{ route('products') }}">{{ __('All Categories')}}</a></li>
                                        <li class="active"><a href="{{ route('products.category', \App\Model\SubsubCategory::find($subsubcategory_id)->subcategory->category->slug) }}">{{  __(\App\Model\SubSubCategory::find($subsubcategory_id)->subcategory->category->name) }}</a></li>
                                        <li class="active"><a href="{{ route('products.subcategory', \App\Model\SubsubCategory::find($subsubcategory_id)->subcategory->slug) }}">{{  __(\App\Model\SubsubCategory::find($subsubcategory_id)->subcategory->name) }}</a></li>
                                        <li class="current"><a href="{{ route('products.subsubcategory', \App\Model\SubsubCategory::find($subsubcategory_id)->slug) }}">{{  __(\App\Model\SubsubCategory::find($subsubcategory_id)->name) }}</a></li>
                                    @endif

                                </ul>
                            </div>
                            <div class="bg-white sidebar-box mb-3" >
                                <div class="box-title text-center">
                                    {{ __('Price range')}}
                                </div>
                                <div class="box-content">
                                    <div class="range-slider-wrapper mt-3">
                                        <!-- Range slider container -->
                                        <div
                                            id="input-slider-range"
                                            data-range-value-min="@if(count(\App\Model\Product::query()->get()) < 1) 0 @else {{ filter_products(\App\Model\Product::query())->get()->min('unit_price') }} @endif"

                                            data-range-value-max="@if(count(\App\Model\Product::query()->get()) < 1) 0 @else {{ filter_products(\App\Model\Product::query())->get()->max('unit_price') }} @endif"></div>

                                        <!-- Range slider values -->
                                        <div class="row">
                                            <div class="col-6">
                                            <span class="range-slider-value value-low"
                                                  @if (isset($min_price))
                                                  data-range-value-low="{{ $min_price }}"
                                                  @elseif($products->min('unit_price') > 0)
                                                  data-range-value-low="{{ $products->min('unit_price') }}"
                                                  @else
                                                  data-range-value-low="0"
                                                  @endif
                                                  id="input-slider-range-value-low">
                                            </div>

                                            <div class="col-6 text-right">
                                            <span class="range-slider-value value-high"
                                                  @if (isset($max_price))
                                                  data-range-value-high="{{ $max_price }}"
                                                  @elseif($products->max('unit_price') > 0)
                                                  data-range-value-high="{{ $products->max('unit_price') }}"
                                                  @else
                                                  data-range-value-high="0"
                                                  @endif
                                                  id="input-slider-range-value-high">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white sidebar-box mb-3">
                                <div class="box-title text-center">
                                    {{ __('Filter by color')}}
                                </div>
                                <div class="box-content">
                                    <!-- Filter by color -->

                                    <ul class="list-inline checkbox-color checkbox-color-circle mb-0">
                                      @foreach ($all_colors as $key => $color)
                                            <li>
                                                <input type="radio" id="color-{{ $key }}" name="color" value="{{ $color->code }}" @if(isset($selected_color) && $selected_color == $color->code) checked @endif onchange="filter()">
                                                <label style="background: {{ $color->code }};" for="color-{{ $key }}" data-toggle="tooltip" data-original-title="{{ \App\Model\Color::where('code', $color->code)->first()->name }}"></label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            @foreach ($attributes as $key => $attribute)
                                @if (\App\Model\Attribute::find($attribute['id']) != null)
                                    <div class="bg-white sidebar-box mb-3">
                                        <div class="box-title text-center">
                                            Filter by {{ \App\Model\Attribute::find($attribute['id'])->name }}
                                        </div>
                                        <div class="box-content">
                                            <!-- Filter by others -->
                                            <div class="filter-checkbox">
                                                @if(array_key_exists('values', $attribute))
                                                    @foreach ($attribute['values'] as $key => $value)
                                                        @php
                                                            $flag = false;
                                                            if(isset($selected_attributes)){
                                                                foreach ($selected_attributes as $key => $selected_attribute) {
                                                                    if($selected_attribute['id'] == $attribute['id']){
                                                                        if(in_array($value, $selected_attribute['values'])){
                                                                            $flag = true;
                                                                            break;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="attribute_{{ $attribute['id'] }}_value_{{ $value }}" name="attribute_{{ $attribute['id'] }}[]" value="{{ $value }}" @if ($flag) checked @endif onchange="filter()">
                                                            <label for="attribute_{{ $attribute['id'] }}_value_{{ $value }}">{{ $value }}</label>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-9">
                        @isset($category_id)
                            <input type="hidden" name="category" value="{{ \App\Model\Category::find($category_id)->slug }}">
                        @endisset
                        @isset($subcategory_id)
                            <input type="hidden" name="subcategory" value="{{ \App\Model\SubCategory::find($subcategory_id)->slug }}">
                        @endisset
                        @isset($subsubcategory_id)
                            <input type="hidden" name="subsubcategory" value="{{ \App\Model\SubSubCategory::find($subsubcategory_id)->slug }}">
                        @endisset
                        <input type="hidden" name="min_price" value="">
                        <input type="hidden" name="max_price" value="">
                        <div class="sort-by-bar row no-gutters bg-white2 pb-3 px-3 pt-2" style="border: 1px solid #ddd;">
                            <div class="col-xl-4 d-flex d-xl-block justify-content-between align-items-end ">
                                <div class="sort-by-box flex-grow-1">
                                    <div class="form-group">
                                        <label>{{ __('Search')}}</label>
                                        <div class="search-widget">
                                            <input class="form-control input-lg" type="text" name="q" placeholder="{{ __('Search products')}}" @isset($query) value="{{ $query }}" @endisset>
                                            <button type="submit" class="btn-inner">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-xl-none ml-3 form-group orderby">
                                    <button type="button" class="btn p-1 btn-sm" id="side-filter">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-xl-7 offset-xl-1">
                                <div class="row no-gutters">
                                    <div class="col-6">
                                        <div class="sort-by-box px-1">
                                            <div class="form-group">
                                                <label>{{ __('Sort by')}}</label>
                                                <select class="form-control sortSelect" data-minimum-results-for-search="Infinity" name="sort_by" onchange="filter()" style="background: #fff;">
                                                    <option value="1" @isset($sort_by) @if ($sort_by == '1') selected @endif @endisset>{{ __('Newest')}}</option>
                                                    <option value="2" @isset($sort_by) @if ($sort_by == '2') selected @endif @endisset>{{ __('Oldest')}}</option>
                                                    <option value="3" @isset($sort_by) @if ($sort_by == '3') selected @endif @endisset>{{ __('Price low to high')}}</option>
                                                    <option value="4" @isset($sort_by) @if ($sort_by == '4') selected @endif @endisset>{{ __('Price high to low')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="sort-by-box px-1">
                                            <div class="form-group">
                                                <label>{{ __('Brands')}}</label>
                                                <select class="form-control sortSelect" data-placeholder="{{ __('All Brands')}}" name="brand" onchange="filter()" style="background: #fff;">
                                                    <option value="">{{ __('All Brands')}}</option>
                                                    @foreach (\App\Model\Brand::all() as $brand)
                                                        <option value="{{ $brand->slug }}" @isset($brand_id) @if ($brand_id == $brand->id) selected @endif @endisset>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="showing-products pt-30 pb-50 border-2 border-bottom border-light">
                            <div class="row row-cols-xxl-2 row-cols-md-2 row-cols-1 g-3 shop-list product-list e-bg-light e-title-hover-primary e-hover-image-zoom e-btn-set-four cart-slide-left">
                                @forelse($products as $product)
                                    {{productsComponentThree($product)}}
                                @empty
                                    <div class="text-center" style="margin: 0 auto;">
                                        <img src="https://qatar.jazp.com/qa-en/assets/commonfiles/images/nosearch.svg" alt="">
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3">
                            <div class="pagination-style-one">
                                <nav aria-label="Page navigation example">
                                    {{$products->links()}}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('frontend/assets/js/select2.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/nouislider.min.js')}}"></script>
    <script>
        // NoUI Slider
        if ($(".input-slider-container")[0]) {
            $(".input-slider-container").each(function () {
                var slider = $(this).find(".input-slider");
                var sliderId = slider.attr("id");
                var minValue = slider.data("range-value-min");
                var maxValue = slider.data("range-value-max");

                var sliderValue = $(this).find(".range-slider-value");
                var sliderValueId = sliderValue.attr("id");
                var startValue = sliderValue.data("range-value-low");

                var c = document.getElementById(sliderId),
                    d = document.getElementById(sliderValueId);

                noUiSlider.create(c, {
                    start: [parseInt(startValue)],
                    //step: 1000,
                    range: {
                        min: [parseInt(minValue)],
                        max: [parseInt(maxValue)],
                    },
                });

                c.noUiSlider.on("update", function (a, b) {
                    //alert(b)
                    d.textContent = a[b];
                });
            });
        }

        if ($("#input-slider-range")[0]) {
            var c = document.getElementById("input-slider-range"),
                d = document.getElementById("input-slider-range-value-low"),
                e = document.getElementById("input-slider-range-value-high"),
                f = [d, e];

            noUiSlider.create(c, {
                start: [
                    parseInt(d.getAttribute("data-range-value-low")),
                    parseInt(e.getAttribute("data-range-value-high")),
                ],
                connect: !0,
                range: {
                    min: parseInt(c.getAttribute("data-range-value-min")),
                    max: parseInt(c.getAttribute("data-range-value-max")),
                },
            }),
                c.noUiSlider.on("update", function (a, b) {
                    f[b].textContent = a[b];
                }),
                c.noUiSlider.on("change", function (a, b) {
                    rangefilter(a);
                });
        }
        function filter(){
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
      /*  $(".sortSelect").each(function (index, element) {
            $(".sortSelect").select2({
                theme: "default sortSelectCustom",
            });
        });*/
    </script>
@endpush
