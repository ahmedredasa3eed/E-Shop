<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Add New Slider </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if(session()->has('success'))
                            <p>{{session('success')}}</p>
                        @endif
                        <form wire:submit.prevent="saveSlider" class="forms-sample">


                            <div class="form-group">
                                <label for="exampleInputName1">Image : </label>
                                <input type="file"  wire:model="image"  class="form-control">
                                @if($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="100">
                                @endif
                                @error('image')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Title: </label>
                                <input type="text" wire:model="title"   class="form-control" placeholder="">
                                @error('title')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Sub title: </label>
                                <input type="text"  wire:model="sub_title"  class="form-control" placeholder="">
                                @error('sub_title')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Link: </label>
                                <input type="text" wire:model="link" class="form-control">
                                @error('link')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Price: </label>
                                <input type="text" wire:model="price" class="form-control">
                                @error('price')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputName1">Status : </label>
                                <select  wire:model="status"  class="form-control">
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
