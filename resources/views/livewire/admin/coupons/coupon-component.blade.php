<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Coupons List </h3>
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
                                    <th>Code</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Cart Value</th>
                                    <th>Expiry Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @isset($coupons)
                                    @forelse($coupons as $coupon)
                                        <tr>
                                            <td>{{$coupon->id}}</td>
                                            <td>{{$coupon->code}}</td>
                                            <td>{{$coupon->value}}</td>
                                            <td>{{$coupon->type}}</td>
                                            <td>{{$coupon->cart_value}}</td>
                                            <td>{{$coupon->expiry_date}}</td>
                                            <td>
                                                <a href="{{route('admin.edit_coupon',$coupon->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="" onclick="confirm('Are you sure ?') || event.stopImmediatePropagation(); return false;" wire:click.prevent="delete('{{$coupon->id}}')" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="5">No Data Found</td>
                                    @endforelse
                                @endisset

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>

