<div>

    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Home</a></li>
                    <li class="item-link"><span>MY Orders</span></li>
                </ul>
            </div>


                <div class=" main-content-area">
                    <div class="wrap-iten-in-cart">
                        <h3 class="box-title"></h3>
                        <table class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Subtotal</th>
                                <th>Tax</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Details</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->subtotal}}</td>
                                    <td>{{$order->tax}}</td>
                                    <td>{{$order->discount}}</td>
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>
                                        <a href="{{route('frontend.order_details',$order->id)}}" class="btn">Order Details</a>
                                    </td>
                                    @if($order->status == 'ordered')
                                    <td>
                                        <a href="" wire:click.prevent="cancelOrder({{$order->id}})" class="btn">Cancel</a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                </div><!--end container-->

    </main>


</div>
