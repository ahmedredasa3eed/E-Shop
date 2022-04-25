<div>

    <main id="main" class="main-site left-sidebar">
        <div class="container">

            <!--MAIN SLIDE-->
            <div class="wrap-main-slide">
                <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">

                    @foreach($sliders as $slider)
                    <div class="item-slide">
                        <img src="{{asset('assets/images/sliders/'.$slider->image)}}" alt="" class="img-slide">
                        <div class="slide-info slide-1">
                            <h2 class="f-title"><b>{{$slider->title}}</b></h2>
                            <span class="subtitle">{{$slider->sub_title}}</span>
                            <p class="sale-info">Only price: <span class="price">$ {{$slider->price}}</span></p>
                            <a href="{{$slider->link}}" class="btn-link">Shop Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!--BANNER-->
            <div class="wrap-banner style-twin-default">
                <div class="banner-item">
                    <a href="#" class="link-banner banner-effect-1">
                        <figure><img src="{{asset('assets/images/home-1-banner-1.jpg')}}" alt="" width="580" height="190"></figure>
                    </a>
                </div>
                <div class="banner-item">
                    <a href="#" class="link-banner banner-effect-1">
                        <figure><img src="{{asset('assets/images/home-1-banner-2.jpg')}}" alt="" width="580" height="190"></figure>
                    </a>
                </div>
            </div>

            <!--On Sale-->
            @if($sale_products->count() > 0 && $sale_timer->status == 1 && $sale_timer->sale_time > \Carbon\Carbon::now())
            <div class="wrap-show-advance-info-box style-1 has-countdown">
                <h3 class="title-box">On Sale</h3>
                <div class="wrap-countdown mercado-countdown" data-expire="{{\Carbon\Carbon::parse($sale_timer->sale_time)->format('Y/m/d h:m:s a')}}"></div>
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                    @foreach($sale_products as $sale_product)
                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{route('frontend.product_details',$sale_product->slug)}}">
                                <figure><img src="{{asset('assets/images/products/'.$sale_product->image)}}" width="800" height="800" ></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="{{route('frontend.product_details',$sale_product->slug)}}" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="{{route('frontend.product_details',$sale_product->slug)}}" class="product-name"><span>{{$sale_product->name}}</span></a>
                            <div class="wrap-price">
                                <span class="product-price">$ {{$sale_product->sale_price }} </span>
                                <del><span style="font-size:12px;margin-left:4px;"> $ {{ $sale_product->regular_price}}</span></del>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endif
            <!--Latest Products-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Latest Products</h3>
                <div class="wrap-top-banner">
                    <a href="#" class="link-banner banner-effect-2">
                        <figure><img src="{{asset('assets/images/digital-electronic-banner.jpg')}}" width="1170" height="240" alt=""></figure>
                    </a>
                </div>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                                    @foreach($latest_products as $latest_product)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{route('frontend.product_details',$latest_product->slug)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{asset('assets/images/products/'.$latest_product->image)}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('frontend.product_details',$latest_product->slug)}}" class="product-name"><span>{{$latest_product->name}}</span></a>
                                            <div class="wrap-price"><span class="product-price">$ {{$latest_product->regular_price}}</span></div>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Product Categories-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Product Categories</h3>
                <div class="wrap-top-banner">
                    <a href="#" class="link-banner banner-effect-2">
                        <figure><img src="{{asset('assets/images/fashion-accesories-banner.jpg')}}" width="1170" height="240" alt=""></figure>
                    </a>
                </div>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-control">
                            @foreach($home_categories as $key=>$home_category)
                            <a href="#category_{{$home_category->id}}" class="tab-control-item {{$key == 0 ? 'active' : ''}}">{{$home_category->name}}</a>
                            @endforeach
                        </div>


                        <div class="tab-contents">
                            @foreach($home_categories as $key=>$home_category)
                            <div class="tab-content-item {{$key == 0 ? 'active' : ''}}" id="category_{{$home_category->id}}">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                    @foreach($home_category->products as $h_product)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{route('frontend.product_details',$h_product->slug)}}">
                                                <figure><img src="{{asset('assets/images/products/'.$h_product->image)}}" width="800" height="800"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="{{route('frontend.product_details',$h_product->slug)}}" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('frontend.product_details',$h_product->slug)}}" class="product-name"><span>{{$h_product->name}}</span></a>
                                            <div class="wrap-price"><span class="product-price">$ {{$h_product->regular_price}}</span></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

</div>

@push('scripts')
    <script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
@endpush
