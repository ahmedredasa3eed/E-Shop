<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Add New Category </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if(session()->has('success'))
                            <p>{{session('success')}}</p>
                        @endif
                        <form wire:submit.prevent="store" class="forms-sample">

                            <div class="form-group">
                                <label for="exampleInputName1">Category Name: </label>
                                <input type="text" wire:model="name" wire:keyup="generateSlug"  class="form-control" placeholder="">
                                @error('name')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Category Slug: </label>
                                <input type="text"  wire:model="slug"  class="form-control" placeholder="">
                                @error('slug')
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
