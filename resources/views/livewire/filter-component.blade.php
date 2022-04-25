<div>
    <div class="sort-item orderby ">
        <select wire:model="sortType" name="sortType" class="use-chosen">
            <option value="default" selected="selected">Default sorting</option>
            <option value="latest">Sort by newness</option>
            <option value="price_asc">Sort by price: low to high</option>
            <option value="price_desc">Sort by price: high to low</option>
        </select>
    </div>

    <div class="sort-item product-per-page">
        <select wire:model="pageSize" name="pageSize" class="use-chosen">
            <option value="10" selected="selected">10 per page</option>
            <option value="16">16 per page</option>
            <option value="18">18 per page</option>
            <option value="21">21 per page</option>
            <option value="24">24 per page</option>
            <option value="30">30 per page</option>
            <option value="32">32 per page</option>
        </select>
    </div>
</div>
