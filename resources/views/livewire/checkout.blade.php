<div>

    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>login</span></li>
                </ul>
            </div>
            <div class=" main-content-area">

                <form wire:submit.prevent="placeOrder">
                    <div class="wrap-address-billing">
                        <h3 class="box-title">Billing Address</h3>

                            <p class="row-in-form">
                                <label for="fname">Full Name<span>*</span></label>
                                <input wire:model="name" type="text" name="fname" value="" placeholder="Your name">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </p>

                            <p class="row-in-form">
                                <label for="email">Email Addreess<span>*</span></label>
                                <input wire:model="email" type="email" name="email" value="" placeholder="Type your email">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </p>

                            <p class="row-in-form">
                                <label for="phone">Phone number<span>*</span></label>
                                <input wire:model="phone" type="number" name="phone" value="" placeholder="10 digits format">
                                @error('phone')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="add">Address<span>*</span></label>
                                <input wire:model="address" type="text" name="add" value="" placeholder="Street at apartment number">
                                @error('address')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </p>

                            <p class="row-in-form">
                                <label for="city">Town / City<span>*</span></label>
                                <input wire:model="city" type="text" name="city" value="" placeholder="City name">
                                @error('city')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </p>

                            <p class="row-in-form">
                                <label for="country">Country<span>*</span></label>
                                <input wire:model="country" type="text" name="country" value="" placeholder="United States">
                                @error('country')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </p>

                    </div>
                    <div class="summary summary-checkout">
                        <div class="summary-item payment-method">
                            <h4 class="title-box">Payment Method</h4>
                            <p class="summary-info"><span class="title">Check / Money order</span></p>
                            <div class="choose-payment-methods">
                                <label class="payment-method">
                                    <input wire:model="payment_type" name="payment-method" id="payment-method-visa" value="cod" type="radio">
                                    <span>Cash On Delivery</span>
                                    <span class="payment-desc">You can pay at your place</span>
                                </label>

                                <label class="payment-method">
                                    <input wire:model="payment_type" name="payment-method" id="payment-method-visa" value="card" type="radio">
                                    <span>Debit/Credit Card</span>
                                    <span class="payment-desc">You can pay with your visa or master card</span>
                                </label>

                                <label class="payment-method">
                                    <input wire:model="payment_type" name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
                                    <span>Paypal</span>
                                    <span class="payment-desc">You can pay with your paypal account</span>
                                </label>
                            </div>

                            @error('payment_type')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                            @if(session()->has('checkout'))
                            <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{session()->get('checkout')['total']}}</span></p>
                            @endif

                            <button type="submit"  class="btn btn-medium">Place order now</button>
                        </div>
                        <div class="summary-item shipping-method">
                            <h4 class="title-box f-title">Shipping method</h4>
                            <p class="summary-info"><span class="title">Flat Rate</span></p>
                            <p class="summary-info"><span class="title">Fixed $50.00</span></p>

                        </div>
                    </div>
                </form>

            </div><!--end main content area-->
        </div><!--end container-->

    </main>


</div>
