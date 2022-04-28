<div class="main-panel">

    <!----Order Items --->
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Orders Items </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if(session()->has('success'))
                            <p>{{session('success')}}</p>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Image</th>
                                </tr>
                                </thead>
                                <tbody>

                                @isset($order)
                                    @forelse($order->orderItems as $orderItem)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$orderItem->order_id}}</td>
                                            <td>{{$orderItem->product->name}}</td>
                                            <td>{{$orderItem->price}}</td>
                                            <td>{{$orderItem->qty}}</td>
                                            <td>
                                                <img src="{{asset('assets/images/products/'.$orderItem->product->image)}}">
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="5">No Data Found</td>
                                    @endforelse
                                @endisset
                                <tr>
                                    <td>Subtotal</td>
                                    <td>{{$order->subtotal}}</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>{{$order->tax}}</td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td>{{$order->discount}}</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>{{$order->total}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Shipping -->
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Shipping </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if(session()->has('success'))
                            <p>{{session('success')}}</p>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Country</th>
                                </tr>
                                </thead>
                                <tbody>

                                @isset($order)
                                    <tr>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->city}}</td>
                                        <td>{{$order->country}}</td>
                                    </tr>
                                @endisset

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Transactions -->
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Order Transaction </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if(session()->has('success'))
                            <p>{{session('success')}}</p>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Payment Type</th>
                                    <th>Satus</th>
                                </tr>
                                </thead>
                                <tbody>

                                @isset($order->transaction)
                                    <tr>
                                        <td>{{$order->transaction->payment_type}}</td>
                                        <td>{{$order->transaction->payment_status}}</td>
                                    </tr>
                                @endisset

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

