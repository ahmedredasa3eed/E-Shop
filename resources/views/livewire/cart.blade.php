<div>

    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Home</a></li>
                    <li class="item-link"><span>Shopping Cart</span></li>
                </ul>
            </div>

            @if(\Cart::instance('cart')->content()->count() > 0)

            <div class=" main-content-area">

                <div class="wrap-iten-in-cart">
                    <h3 class="box-title">Products Name</h3>
                    <ul class="products-cart">
                        @foreach(Cart::instance('cart')->content() as $row)
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{asset('assets/images/products/'.$row->model->image)}}" alt=""></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="{{route('frontend.product_details',$row->model->slug)}}">{{$row->model->name}}</a>
                            </div>
                            @if($row->model->sale_price > 0 )
                                <div class="price-field product-price"><p class="price">$ {{$row->model->sale_price}}</p></div>

                            @else
                                <div class="price-field product-price"><p class="price">$ {{$row->model->regular_price}}</p></div>

                            @endif
                            <div class="quantity">
                                <div class="quantity-input">
                                    <input type="text" name="product-quatity" value="{{$row->qty}}" data-max="120" pattern="[0-9]*">
                                    <a class="btn btn-increase" href="#" wire:click.prevent="increaseQty('{{$row->rowId}}')"></a>
                                    <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQty('{{$row->rowId}}')"></a>
                                </div>
                            </div>
                            <div class="price-field sub-total"><p class="price">{{$row->subtotal()}}</p></div>
                            <div class="delete">
                                <a href="#" wire:click.prevent="remove('{{$row->rowId}}')" class="btn btn-delete" title="">
                                    <span>Delete from your cart</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="summary">
                    <div class="order-summary">
                        <h4 class="title-box">Order Summary</h4>
                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">$ {{Cart::subtotal()}}</b></p>

                        @if(session()->has('coupon'))
                        <p class="summary-info"><span class="title">Discount({{session()->get('coupon')['code']}})</span>
                            <a class="btn" wire:click.prevent="forgetCoupon"><i class="fa fa-trash"></i></a>
                            <b class="index">${{number_format($discount,2)}}</b>
                        <p class="summary-info"><span class="title">Tax After Discount({{config('cart.tax')}})</span><b class="index">${{number_format($taxAfterDiscount,2)}}</b></p>
                        <p class="summary-info total-info "><span class="title">SubTotal After Discount</span><b class="index">${{number_format($subTotalAfterDiscount,2)}}</b></p>
                        <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{number_format($totalAfterDiscount,2)}}</b></p>
                        @else
                            <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b>
                            <p class="summary-info"><span class="title">Tax</span><b class="index">$ {{Cart::tax()}}</b></p>
                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">$ {{Cart::total()}}</b></p>
                        @endif
                    </div>
                    <div class="checkout-info">
                        @if(!session()->has('coupon'))

                            @if(session()->has('coupon_error'))
                                <div class="alert alert-danger">{{session('coupon_error')}}</div>
                            @endif

                            <label class="checkbox-field">
                                <input class="frm-input" wire:model="isVisibleCouponArea" name="have-code" id="have-code" value="1" type="checkbox"><span>I have promo code</span>
                            </label>
                            @if($isVisibleCouponArea == 1)
                                <form wire:submit.prevent="applyCouponCode">
                                    <input type="text" wire:model="coupon_code" class="form-control" placeholder="Enter Coupon Code">
                                    <input type="submit" class="btn btn-success" style="margin-top:10px;">
                                </form>
                            @endif
                        @endif
                        <a class="btn btn-checkout" wire:click.prevent="goToCheckoutPage" href="javascript:void(0);">Check out</a>
                        <a class="link-to-shop" href="{{route('frontend.shop')}}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="update-clear">
                        <a class="btn btn-clear" href="#" wire:click.prevent="destroyCart()">Clear Shopping Cart</a>
                        <a class="btn btn-update" href="#">Update Shopping Cart</a>
                    </div>
                </div>
                @else
                    <div class="main-content-area">
                        <p>There is no items in Cart</p>
                    </div>
                @endif

                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Most Viewed Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                             data-loop="false" data-nav="true" data-dots="false"
                             data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets/images/products/digital_04.jpg')}}" width="214"
                                                     height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets/images/products/digital_17.jpg')}}" width="214"
                                                     height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price">
                                        <ins><p class="product-price">$168.00</p></ins>
                                        <del><p class="product-price">$250.00</p></del>
                                    </div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets/images/products/digital_15.jpg')}}" width="214"
                                                     height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price">
                                        <ins><p class="product-price">$168.00</p></ins>
                                        <del><p class="product-price">$250.00</p></del>
                                    </div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets/images/products/digital_01.jpg')}}" width="214"
                                                     height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item bestseller-label">Bestseller</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets/images/products/digital_21.jpg')}}" width="214"
                                                     height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
                                    </a>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets/images/products/digital_03.jpg')}}" width="214"
                                                     height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price">
                                        <ins><p class="product-price">$168.00</p></ins>
                                        <del><p class="product-price">$250.00</p></del>
                                    </div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets/images/products/digital_04.jpg')}}" width="214"
                                                     height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets/images/products/digital_05.jpg')}}" width="214"
                                                     height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item bestseller-label">Bestseller</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div><!--End wrap-products-->
                </div>


        </div><!--end container-->

    </main>


</div>
