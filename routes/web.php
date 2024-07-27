<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ShippingChargeController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController as ProductFront;
use App\Http\Controllers\PaymentController;





// ******************************* Admin Side *******************************//

Route::get('admin', [AuthController::class, 'login_admin']);
Route::post('admin', [AuthController::class, 'auth_login_admin']);
Route::get('admin/logout', [AuthController::class, 'logout_admin'])->name('admin.logout');


Route::group(['middleware' => 'admin'], function () {

    // ********** Admin *************//
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/admin/list', [AdminController::class, 'list'])->name('admin.list');
    Route::get('admin/admin/add', [AdminController::class, 'add'])->name('admin.add');
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    //  ******** Category *********** //
    Route::get('admin/category/list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('admin/category/add', [CategoryController::class, 'add'])->name('category.add');
    Route::post('admin/category/add', [CategoryController::class, 'insert']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);

    //  ******** Sub Category *********** //
    Route::get('admin/sub_category/list', [SubCategoryController::class, 'list'])->name('sub_category.list');
    Route::get('admin/sub_category/add', [SubCategoryController::class, 'add'])->name('sub_category.add');
    Route::post('admin/sub_category/add', [SubCategoryController::class, 'insert']);
    Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit']);
    Route::post('admin/sub_category/edit/{id}', [SubCategoryController::class, 'update']);
    Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete']);
    Route::post('admin/get_sub_category/', [SubCategoryController::class, 'get_sub_category']);

    // ************ Brand ********** //
    Route::get('admin/brand/list', [BrandController::class, 'list'])->name('brand.list');
    Route::get('admin/brand/add', [BrandController::class, 'add'])->name('brand.add');
    Route::post('admin/brand/add', [BrandController::class, 'insert']);
    Route::get('admin/brand/edit/{id}', [BrandController::class, 'edit']);
    Route::post('admin/brand/edit/{id}', [BrandController::class, 'update']);
    Route::get('admin/brand/delete/{id}', [BrandController::class, 'delete']);

    // ************ Color ********** //
    Route::get('admin/color/list', [ColorController::class, 'list'])->name('color.list');
    Route::get('admin/color/add', [ColorController::class, 'add'])->name('color.add');
    Route::post('admin/color/add', [ColorController::class, 'insert']);
    Route::get('admin/color/edit/{id}', [ColorController::class, 'edit']);
    Route::post('admin/color/edit/{id}', [ColorController::class, 'update']);
    Route::get('admin/color/delete/{id}', [ColorController::class, 'delete']);

    // ************ Product ********** //
    Route::get('admin/product/list', [ProductController::class, 'list'])->name('product.list');
    Route::get('admin/product/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('admin/product/add', [ProductController::class, 'insert']);
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('admin/product/edit/{id}', [ProductController::class, 'update']);
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
    Route::get('admin/product/image_delete/{id}', [ProductController::class, 'image_delete']);
    Route::post('admin/product_image_sortable', [ProductController::class, 'product_image_sortable']);

    // ************ Discount Code ********** //
    Route::get('admin/discount_code/list', [DiscountController::class, 'list'])->name('discount_code.list');
    Route::get('admin/discount_code/add', [DiscountController::class, 'add'])->name('discount_code.add');
    Route::post('admin/discount_code/add', [DiscountController::class, 'insert']);
    Route::get('admin/discount_code/edit/{id}', [DiscountController::class, 'edit']);
    Route::post('admin/discount_code/edit/{id}', [DiscountController::class, 'update']);
    Route::get('admin/discount_code/delete/{id}', [DiscountController::class, 'delete']);

    // ************ Discount Code ********** //
    Route::get('admin/shipping_charge/list', [ShippingChargeController::class, 'list'])->name('shipping_charge.list');
    Route::get('admin/shipping_charge/add', [ShippingChargeController::class, 'add'])->name('shipping_charge.add');
    Route::post('admin/shipping_charge/add', [ShippingChargeController::class, 'insert']);
    Route::get('admin/shipping_charge/edit/{id}', [ShippingChargeController::class, 'edit']);
    Route::post('admin/shipping_charge/edit/{id}', [ShippingChargeController::class, 'update']);
    Route::get('admin/shipping_charge/delete/{id}', [ShippingChargeController::class, 'delete']);


});


// ******************************* Front Side ******************************* //

Route::get('/', [HomeController::class, 'home']);
Route::post('auth_register', [AuthController::class, 'auth_register']);
Route::post('auth_login', [AuthController::class, 'auth_login']);
Route::get('forgot_password', [AuthController::class, 'forgot_password']);
Route::post('forgot_password', [AuthController::class, 'auth_forgot_password']);
Route::get('reset/{token}', [AuthController::class, 'forgot_password_reset']);
Route::post('reset/{token}', [AuthController::class, 'forgot_password_reset_confirm']);


Route::get('activate/{id}', [AuthController::class, 'activate_email']);


Route::get('cart', [PaymentController::class, 'cart']);
Route::post('update_cart', [PaymentController::class, 'update_cart']);
Route::get('cart/delete/{rowId}', [PaymentController::class, 'cart_delete']);

Route::get('checkout', [PaymentController::class, 'checkout']);
Route::post('checkout/apply_discount_code', [PaymentController::class, 'apply_discount_code']);
Route::post('checkout/place_order', [PaymentController::class, 'place_order']);
Route::get('checkout/payment', [PaymentController::class, 'checkout_payment']);
Route::get('paypal/success_payment', [PaymentController::class, 'paypal_success_payment']);
Route::get('stripe/payment_success', [PaymentController::class, 'stripe_success_payment']);


Route::post('product/add-to-cart', [PaymentController::class, 'add_to_cart']);

Route::get('search', [ProductFront::class, 'getProductSearch']);

Route::post('get_filter_product_ajax', [ProductFront::class, 'getFilterProductAjax']);
Route::get('{category?}/{subcategpry?}', [ProductFront::class, 'getCategory']);
