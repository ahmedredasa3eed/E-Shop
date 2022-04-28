<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Add New Coupon </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if(session()->has('success'))
                            <p>{{session('success')}}</p>
                        @endif
                        <form wire:submit.prevent="saveCoupon" class="forms-sample">

                            <div class="form-group">
                                <label for="exampleInputName1">Coupon Code: </label>
                                <input type="text" wire:model="code"  class="form-control" placeholder="">
                                @error('code')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Coupon Value: </label>
                                <input type="text" wire:model="value"  class="form-control" placeholder="">
                                @error('value')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Coupon Type : </label>
                                <select  wire:model="type"  class="form-control">
                                    <option value="fixed">Fixed</option>
                                    <option value="percent">Percent</option>
                                </select>
                                @error('type')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Cart Value : </label>
                                <input type="text"  wire:model="cart_value"  class="form-control" placeholder="">
                                @error('cart_value')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Coupon Expiry Date : </label>
                                <input type="date"  wire:model="expiry_date"  class="form-control" placeholder="">
                                @error('expiry_date')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                            <button type="reset" class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>


