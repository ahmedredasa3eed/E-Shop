
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Sale Timer Setting </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if(session()->has('success'))
                            <p>{{session('success')}}</p>
                        @endif
                        <form wire:submit.prevent="updateSaleTimer" class="forms-sample">

                            <div class="form-group">
                                <label for="exampleInputName1">Sale Date Time: </label>
                                <input type="datetime" wire:model="saleDateTime" class="form-control">
                                @error('saleDateTime')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputName1">Status : </label>
                                <select wire:model="status" class="form-control">
                                    <option value="0"> No</option>
                                    <option value="1"> Yes</option>
                                </select>
                                @error('status')
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

@push('scripts')
    <script>

        // Below code sets format to the
        // datetimepicker having id as
        // datetime
        $('#datetime').datetimepicker({
            format: 'hh:mm:ss a'
        });
    </script>
@endpush
