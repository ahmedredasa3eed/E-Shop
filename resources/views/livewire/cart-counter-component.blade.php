<div class="wrap-icon-section minicart">
    <a href="{{route('frontend.cart')}}" class="link-direction">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
        <div class="left-info">
            @if(Cart::instance('cart')->content()->count() > 0)
                <span class="index">{{Cart::instance('cart')->content()->count()}} items</span>
            @else
                <span class="index">0 items</span>
            @endif
            <span class="title">CART</span>
        </div>
    </a>
</div>
