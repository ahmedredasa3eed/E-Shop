<?php

use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\CategoriesComponent;
use App\Http\Livewire\Admin\Coupons\CouponComponent;
use App\Http\Livewire\Admin\Coupons\CreateCouponComponent;
use App\Http\Livewire\Admin\Coupons\EditCouponComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\Admin\General\SaleTimerComponent;
use App\Http\Livewire\Admin\NewCategoryComponent;
use App\Http\Livewire\Admin\Orders\OrdersComponent;
use App\Http\Livewire\Admin\Orders\OrdersItemsComponent;
use App\Http\Livewire\Admin\Products\CreateProductComponent;
use App\Http\Livewire\Admin\Products\EditProductComponent;
use App\Http\Livewire\Admin\Products\ProductsComponent;
use App\Http\Livewire\Admin\Sliders\CreateSliderComponent;
use App\Http\Livewire\Admin\Sliders\EditSlidersComponent;
use App\Http\Livewire\Admin\Sliders\SlidersComponent;
use App\Http\Livewire\Cart;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Home;
use App\Http\Livewire\ProductDetails;
use App\Http\Livewire\SearchResultComponent;
use App\Http\Livewire\Shop;
use App\Http\Livewire\ThankYou\ThankYouComponent;
use App\Http\Livewire\Users\UserDashboard;
use App\Http\Livewire\Users\UserOrdersComponent;
use App\Http\Livewire\Users\UserOrdersDetailsComponent;
use App\Http\Livewire\WishList\WishListComponent;
use Illuminate\Support\Facades\Route;


Route::get('/',Home::class)->name('frontend.home');
Route::get('/shop',Shop::class)->name('frontend.shop');
Route::get('/product/{slug}',ProductDetails::class)->name('frontend.product_details');
Route::get('/cart',Cart::class)->name('frontend.cart');
Route::get('/wishlist',WishListComponent::class)->name('frontend.wishlist');
Route::get('/category-products/{category_slug}',CategoryComponent::class)->name('frontend.category_products');
Route::get('/search/{categoryId}/{searchText}',SearchResultComponent::class)->name('frontend.searchResult');


/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/


### For USER ACCOUNT
Route::group(['prefix'=>'user','middleware'=>['auth:sanctum','verified','checkAuthUser']],function (){
    Route::get('/dashboard',UserDashboard::class)->name('user.dashboard');

    Route::get('/checkout',Checkout::class)->name('frontend.checkout');
    Route::get('/thank-you',ThankYouComponent::class)->name('frontend.thank_you');

    Route::get('/orders',UserOrdersComponent::class)->name('frontend.orders');
    Route::get('/order/{order_id}',UserOrdersDetailsComponent::class)->name('frontend.order_details');

});


### For ADMIN ACCOUNT
Route::group(['prefix'=>'admin','middleware'=>['auth:sanctum','verified','checkAuthAdmin']],function (){
    Route::get('/dashboard',AdminDashboard::class)->name('admin.dashboard');
    Route::get('/categories',CategoriesComponent::class)->name('admin.categories');
    Route::get('/category/create',NewCategoryComponent::class)->name('admin.new_category');
    Route::get('/category/edit/{category_id}',EditCategoryComponent::class)->name('admin.edit_category');

    Route::get('/products',ProductsComponent::class)->name('admin.products');
    Route::get('/products/create',CreateProductComponent::class)->name('admin.new_product');
    Route::get('/products/edit/{product_id}',EditProductComponent::class)->name('admin.edit_product');

    Route::get('/sliders',SlidersComponent::class)->name('admin.sliders');
    Route::get('/sliders/create',CreateSliderComponent::class)->name('admin.new_slider');
    Route::get('/sliders/edit/{slider_id}',EditSlidersComponent::class)->name('admin.edit_slider');

    Route::get('/saleDateTime-setting/',SaleTimerComponent::class)->name('admin.saleDataTimeSetting');

    Route::get('/coupons',CouponComponent::class)->name('admin.coupons');
    Route::get('/coupons/create',CreateCouponComponent::class)->name('admin.new_coupon');
    Route::get('/coupons/edit/{coupon_id}',EditCouponComponent::class)->name('admin.edit_coupon');

    Route::get('/orders',OrdersComponent::class)->name('admin.orders');
    Route::get('/orders/items/{order_id}',OrdersItemsComponent::class)->name('admin.orders_items');


});
