<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Add New Product </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if(session()->has('success'))
                            <p>{{session('success')}}</p>
                        @endif
                        <form wire:submit.prevent="saveProduct" class="forms-sample">


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
                                <label for="exampleInputName1">Related Category : </label>
                                <select  wire:model="category_id"  class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Product Name: </label>
                                <input type="text" wire:model="name" wire:keyup="generateSlug"  class="form-control" placeholder="">
                                @error('name')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Product Slug: </label>
                                <input type="text"  wire:model="slug"  class="form-control" placeholder="">
                                @error('slug')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Short Description: </label>
                                <textarea wire:model="short_description" id="short_description" class="form-control"></textarea>
                                @error('short_description')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Description: </label>
                                <textarea wire:model="description" id="description" class="form-control"></textarea>
                                @error('description')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Regular Price : </label>
                                <input type="number"  wire:model="regular_price"  class="form-control" placeholder="">
                                @error('regular_price')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Sale Price : </label>
                                <input type="number"  wire:model="sale_price"  class="form-control" placeholder="">
                                @error('sale_price')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">SKU : </label>
                                <input type="number"  wire:model="SKU"  class="form-control" placeholder="">
                                @error('SKU')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Quantity : </label>
                                <input type="number"  wire:model="quantity"  class="form-control" placeholder="">
                                @error('quantity')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Is Featured : </label>
                                <select  wire:model="featured"  class="form-control">
                                    <option value="0"> No</option>
                                    <option value="1"> Yes</option>
                                </select>
                                @error('featured')
                                <small style="color:red;">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Stock Status : </label>
                                <select  wire:model="stock_status"  class="form-control">
                                    <option value="inStock"> in Stock</option>
                                    <option value="outOfStock"> out Of Stock</option>
                                </select>
                                @error('featured')
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
    <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/4/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#short_description'
        });
        tinymce.init({
            selector: '#description'
        });
    </script>
@endpush
