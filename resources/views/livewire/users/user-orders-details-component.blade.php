<div>

    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Home</a></li>
                    <li class="item-link"><span>Order Details</span></li>
                </ul>
            </div>


                <div class=" main-content-area">

                    <div class="wrap-iten-in-cart">
                        <h3 class="box-title">Products</h3>
                        <ul class="products-cart">
                            @foreach($order->orderItems as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{asset('assets/images/products/'.$item->product->image)}}" alt=""></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{route('frontend.product_details',$item->product->slug)}}">{{$item->product->name}}</a>
                                    </div>


                                    <div class="price-field product-price"><p class="price">$ {{$item->price}}</p></div>


                                    <div class="quantity">
                                        <div class="quantity-input">
                                            <input type="text" disabled name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*">
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">Order Summary</h4>
                            <p class="summary-info"><span class="title">Subtotal</span><b class="index">$ {{$order->subtotal}}</b></p>
                            <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b>
                            <p class="summary-info"><span class="title">Tax</span><b class="index">$ {{$order->tax}}</b></p>
                            <p class="summary-info"><span class="title">Discount</span><b class="index">$ {{$order->discount}}</b></p>
                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">$ {{$order->total}}</b></p>
                        </div>
                    </div>

                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">Order Shipping Address</h4>
                            <p class="summary-info"><span class="title">Name</span><b class="index"> {{$order->name}}</b></p>
                            <p class="summary-info"><span class="title">Email</span><b class="index">{{$order->email}}</b>
                            <p class="summary-info"><span class="title">Phone</span><b class="index"> {{$order->phone}}</b></p>
                            <p class="summary-info"><span class="title">Address</span><b class="index"> {{$order->address}}</b></p>
                            <p class="summary-info"><span class="title">City</span><b class="index"> {{$order->city}}</b></p>
                            <p class="summary-info"><span class="title">Country</span><b class="index"> {{$order->country}}</b></p>
                        </div>
                    </div>

                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">Order Payment Transaction</h4>
                            <p class="summary-info"><span class="title">Payment Type</span><b class="index"> {{$order->transaction->payment_type}}</b></p>
                            <p class="summary-info"><span class="title">Payment Status</span><b class="index">{{$order->transaction->payment_status}}</b>
                        </div>
                    </div>



                </div><!--end container-->

    </main>


</div>
