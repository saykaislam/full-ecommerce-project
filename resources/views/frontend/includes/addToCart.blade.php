<input type="hidden" class="cartCount" value="{{Cart::count()}}" style="display: none;">
<div class="">
    <ul class="cart_list product_list_widget ">
        @forelse(Cart::content() as $cartData)
            @php
                if($cartData->options->variant != null){
                    $cartVariant = '( '.$cartData->options->variant. ')';
                }else{
                    $cartVariant = '';
                }
            @endphp
            <li class="mini-cart-item">
                <a href="{{route('product.cart.remove',$cartData->rowId)}}" class="remove" title="Remove this item"><i class="fas fa-times"></i></a>
                <a href="#" class="product-image bg-light">
                    <img src="{{url($cartData->options->image)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="Cart product" style="height: 55px; width: 100%;">
                </a>
                <a href="#" class="product-name">{{Str::limit( $cartData->name, 30)}}</a>
                <div class="cart-item-quantity">{{$cartData->qty}} ×
                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">৳</span>{{$cartData->price}} {{$cartVariant}}</bdi>
                                                    </span>
                </div>
            </li>
        @empty
            <img src="{{asset('frontend/assets/img/empty-cart.gif')}}" alt="">
           <div class="text-center mt-1">
               <h5 class="p-0 m-0">Cart Empty!!</h5>
           </div>
        @endforelse
    </ul>
    @if(Cart::count() > 0)
    <div class="total-cart">
        <div class="title">Total: </div>
        <div class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳</span>{{Cart::total()}}</span>
        </div>
    </div>
    <div class="buttons">
        <a href="{{route('shopping-cart')}}" class="btn btn-primary rounded-0 view-cart">View cart</a>
        <a href="{{route('checkout')}}" class="btn btn-secondary rounded-0 checkout">Check out</a>
    </div>
    @endif
</div>
