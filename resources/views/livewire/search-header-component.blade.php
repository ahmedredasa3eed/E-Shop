<div class="wrap-search center-section">
    <div class="wrap-search-form">

        <form wire:submit.prevent="search" wire:ignore.self>
            <input type="text" value="{{old('search',$searchText)}}" wire:model.lazy="searchText"  name="search"  placeholder="Search here...">

            <div class="wrap-list-cate">
                <select  wire:model="categoryId" class="form-control" style="border:none;border-radius:0px;">
                    <option value="0" class="level-0">All Categories</option>
                    @isset($categories)
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" class="level-0">{{$category->name}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <button wire:click.prevent="search" form="form-search-top" type="submit" >
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>

        </form>



    </div>
</div>
