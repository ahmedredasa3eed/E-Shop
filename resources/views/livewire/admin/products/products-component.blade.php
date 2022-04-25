<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Products List </h3>
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
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Price</th>
                                    <th>Stock Status</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>image</th>
                                </tr>
                                </thead>
                                <tbody>

                                @isset($products)
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->slug}}</td>
                                            <td>{{$product->regular_price}}</td>
                                            <td>{{$product->stock_status}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>
                                                <img src="{{asset('assets/images/products/'.$product->image)}}" width="60">
                                            </td>
                                            <td>
                                                <a href="{{route('admin.edit_product',$product->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="" onclick="confirm('Are you sure') || event.stopImmediatePropagation();return false;" wire:click.prevent="delete('{{$product->id}}')" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="5">No Data Found</td>
                                    @endforelse
                                @endisset

                                </tbody>
                            </table>

                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>

