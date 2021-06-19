<div class="keyword">
    @if (sizeof($keywords) > 0)
        <div class="title">{{__('Popular Suggestions')}}</div>
        <ul>
            @foreach ($keywords as $key => $keyword)
                <li><a href="">{{ $keyword }}</a></li>
            @endforeach
        </ul>
    @endif
</div>
<div class="category">
    @if (count($subsubcategories) > 0)
        <div class="title">{{__('Category Suggestions')}}</div>
        <ul>
            @foreach ($subsubcategories as $key => $subsubcategory)
                <li><a href="">{{ __($subsubcategory->name) }}</a></li>
            @endforeach
        </ul>
    @endif
</div>
<div class="product">
    @if (count($products) > 0)
        <div class="title">{{__('Products')}}</div>
        <ul>
            @foreach ($products as $key => $product)
                <li>
                    <a href="{{ route('product-details', $product->slug) }}">
                        <div class="d-flex search-product align-items-center">
                            <div class="image" style="background-image:url('{{ url($product->thumbnail_img) }}');">
                            </div>
                            <div class="w-100 overflow--hidden">
                                <div class="product-name text-truncate">
                                    {{ __($product->name) }}
                                </div>
                                <div class="clearfix">
                                    <div class="price-box float-left">
                                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <del class="old-product-price strong-400">{{ home_base_price($product->id) }}</del>
                                        @endif
                                        <span class="product-price strong-600">{{ home_discounted_base_price($product->id) }}</span>
                                    </div>
                                    {{-- <div class="stock-box float-right">
                                        @php
                                            $qty = 0;
                                            foreach (json_decode($product->variations) as $key => $variation) {
                                                $qty += $variation->qty;
                                            }
                                        @endphp
                                        @if(count(json_decode($product->variations, true)) >= 1)
                                            @if ($qty > 0)
                                                <span class="badge badge-pill bg-green">{{translate('In stock')}}</span>
                                            @else
                                                <span class="badge badge badge-pill bg-red">{{translate('Out of stock')}}</span>
                                            @endif
                                        @endif
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>

