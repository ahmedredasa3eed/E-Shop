<div class="wrap-icon-section wishlist">
    <a href="{{route('frontend.wishlist')}}" class="link-direction">
        <i class="fa fa-heart" aria-hidden="true"></i>
        <div class="left-info">
            @if(Cart::instance('wishlist')->content()->count() > 0)
                <span class="index">{{Cart::instance('wishlist')->content()->count()}} items</span>
            @else
                <span class="index">0 items</span>
            @endif
            <span class="title">Wishlist</span>
        </div>
    </a>
</div>
