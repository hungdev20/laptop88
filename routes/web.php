<?php

use App\Product_cat;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//===================================
//FRONTEND
//===================================
Route::get('account_logout', 'AccountController@logout')->name('account_logout');
Route::get('tai-khoan/dang-ky', 'AccountController@register')->name('account_register');
Route::get('tai-khoan/dang-nhap', 'AccountController@login')->name('account_login');
Route::match(['get', 'post'], 'resetpass/{token?}', 'AccountController@reset')->name('resetpass');
Route::get('forgetpass', 'AccountController@forgetPass')->name('forgetpass');
Route::post('user/store', 'AccountController@store');
Route::post('user/checkLogin', 'AccountController@checkLogin');
Route::middleware('CheckLoginClient')->group(function () {
    Route::get('user/profile', 'AccountController@profile');
    Route::match(['get', 'post'], 'user/changePass', 'AccountController@changePass');
    Route::post('user/profile/update', 'AccountController@update')->name('update.profile');
    Route::get('user/purchase', 'AccountController@purchase');
    Route::post('cancel/order', 'AccountController@cancel_order')->name('cancel.order');
    Route::post('searchBill', 'AccountController@searchBill')->name('ajaxSearchBill');
});
Route::get('/', 'HomeController@index');
// Trang
Route::get('trang/{slug}-{id}', 'PagesController@index')->where('slug', '[a-zA-Z0-9-_]+')->where('id', '[0-9]+')->name('pages');
Route::get('lien-he', 'PagesController@contact')->name('pages_contact');

//BLOG
Route::get('{slug}_cdtin{id}.html', 'PostController@index')->where('slug', '[a-zA-Z0-9-_]+')->where('id', '[0-9]+')->name('posts');
Route::get('cong-nghe/{slug}-{id}', 'PostController@detail')->where('slug', '[a-zA-Z0-9-_]+')->where('id', '[0-9]+')->name('post_detail');
Route::post('pagging_posts', 'PostController@pagging_posts')->name('pagging_posts');
//PRODUCT-CAT 
Route::get('{slug}-{id}/', 'ProductController@index')->where('slug', '[a-zA-Z0-9-_]+')->where('id', '[0-9]+')->name('productCat');
Route::post('pagging_products', 'ProductController@pagging_products')->name('pagging_products');
//PRODUCT
Route::get('chi-tiet-san-pham/{slug}-{id}.html', 'ProductController@detail')->where('slug', '[a-zA-Z0-9-_]+')->where('id', '[0-9]+')->name('productDetail');
Route::post('show_prd', 'ProductController@show_prd')->name('show_prd');
Route::post('product/rate', 'ProductController@rating')->name('ratingProAjax');
Route::post('product/add_rate', 'ProductController@add_rate')->name('addRateAjax');
//CART
Route::match(['get', 'post'], 'cart/add', 'CartController@add')->name('cart.add');
Route::match(['get', 'post'], 'cart/addNormal/{id}', 'CartController@addCartNormal')->name('cart.addNormal');
Route::get('gio-hang', 'CartController@show')->name('cart.show');
Route::get('cart/delete/{rowId}', 'CartController@delete')->name('cart.delete');
Route::get('cart/destroy', 'CartController@deleteAll')->name('cart.destroy');
Route::post('cart/update', 'CartController@updateAjax')->name('updateCartAjax');
//CHECKOUT
Route::get('thanh-toan', 'CheckoutController@checkout')->name('checkout');
Route::post('chooseProvince', 'CheckoutController@chooseProvince')->name('chooseProvince');
Route::post('chooseDistrict', 'CheckoutController@chooseDistrict')->name('chooseDistrict');
Route::post('checkInfo', 'CheckoutController@checkInfo')->name('checkInfo');
//ORDER SUCCESS
Route::get('dat-hang-thanh-cong', 'CheckoutController@orderSuccess')->name('orderSuccess');
//SENDMAIL
Route::get('sendMail', 'SendMailController@sendmail');
Auth::routes();
Route::post('searchAjax', 'HomeController@searchAjax')->name('searchAjax');
Route::get('search', 'HomeController@search')->name('search');
// Route::get('/home', 'HomeController@index')->name('home');
//===================================
//BACKEND
//===================================
Route::middleware('auth')->group(function () {
    Route::get('dashboard', 'DashboardController@show');
    Route::get('admin', 'DashboardController@show');
    Route::get('admin/user/list', 'AdminUserController@list');
    Route::get('admin/user/add', 'AdminUserController@add');
    Route::post('admin/user/store', 'AdminUserController@store');
    Route::get('admin/user/delete/{id}', 'AdminUserController@delete')->name('delete_user');
    Route::get('admin/user/edit/{id}', 'AdminUserController@edit')->name('edit_user');
    Route::post('admin/user/update/{id}', 'AdminUserController@update')->name('update_user');
    //ACCOUNTS
    Route::get('admin/accounts/list', 'AdminAccountsController@list')->name('accounts.list');
    Route::get('admin/accounts/delete/{id}', 'AdminAccountsController@delete')->name('delete.accounts');
    Route::post('admin/accounts/action', 'AdminAccountsController@action')->name('accounts.action');
    Route::get('admin/accounts/edit/{id}', 'AdminAccountsController@edit')->name('edit.accounts');
    Route::post('admin/accounts/update/{id}', 'AdminAccountsController@update')->name('update.accounts');

    //MODULE ROLE
    Route::prefix('roles')->group(function () {
        Route::get('/list', 'RoleController@list')->name('role.index')->middleware('can:list-role');
        Route::get('/add', 'RoleController@add')->name('role.add')->middleware('can:add-role');
        Route::post('/store', 'RoleController@store')->name('role.store')->middleware('can:store-role');
        Route::get('/delete/{id}', 'RoleController@delete')->name('role.delete')->middleware('can:delete-role');
        Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit')->middleware('can:edit-role');
        Route::post('/update/{id}', 'RoleController@update')->name('role.update')->middleware('can:edit-role');
    });
    //MODULE PERMSISSION
    Route::prefix('permissions')->group(function () {
        Route::get('/list', 'PermissionController@listPermission')->name('list_permission')->middleware('can:list-permissioncat');
        Route::post('/store', 'PermissionController@storePermission')->name('store.permission')->middleware('can:add-permissioncat');
        Route::post('/action', 'PermissionController@actionPermission')->name('permission.action')->middleware('can:act-permissioncat');
        Route::get('/delete/{id}', 'PermissionController@deletePermission')->name('delete.permission')->middleware('can:delete-permissioncat');
        Route::get('/edit/{id}', 'PermissionController@editPermission')->name('edit.permission')->middleware('can:edit-permissioncat');
        Route::post('/update/{id}', 'PermissionController@updatePermission')->name('permission.update')->middleware('can:edit-permissioncat');
    });
    //PERMISSION CAT
    Route::get('admin/permission/cat/list', 'PermissionController@permissioncat')->name('list_permissioncat')->middleware('can:list-permissioncat'); // tham số sau can là tên của gate đã dc define
    Route::post('admin/permission/cat/store', 'PermissionController@storepermissioncat')->name('store.permissioncat')->middleware('can:add-permissioncat'); // tham số sau can là tên của gate đã dc define
    Route::post('admin/permission/cat/action', 'PermissionController@actionpermissioncat')->name('permissioncat.action')->middleware('can:act-permissioncat'); // tham số sau can là tên của gate đã dc define
    Route::get('admin/permission/cat/edit/{id}', 'PermissionController@editpermissioncat')->name('edit.permissioncat')->middleware('can:edit-permissioncat');
    Route::get('admin/permission/cat/delete/{id}', 'PermissionController@deletepermissioncat')->name('delete.permissioncat')->middleware('can:delete-permissioncat');
    Route::post('admin/permission/cat/update/{id}', 'PermissionController@updatepermissioncat')->name('update.permissioncat')->middleware('can:edit-permissioncat'); // tham số sau can là tên của gate đã dc define
    //PAGE
    Route::get('admin/page/add', 'AdminPageController@add')->middleware('can:add-page');
    Route::post('admin/page/store', 'AdminPageController@store')->name('page.store');
    Route::get('admin/page/list', 'AdminPageController@list')->name('page.list')->middleware('can:list-page');
    Route::get('admin/page/delete/{id}', 'AdminPageController@delete')->name('delete.page')->middleware('can:delete-page');
    Route::post('admin/page/action', 'AdminPageController@action')->name('page.action');
    Route::get('admin/page/edit/{id}', 'AdminPageController@edit')->name('edit.page')->middleware('can:edit-page');
    Route::post('admin/page/update/{id}', 'AdminPageController@update')->name('update.page');
    Route::get('admin/page/detail/{id}', 'AdminPageController@detail')->name('page.detail');
   
    //PRODUCT
    Route::get('admin/product/add', 'AdminProductController@add')->middleware('can:add-product');
    Route::post('admin/product/store', 'AdminProductController@store')->name('store.product')->middleware('can:add-product');
    Route::get('admin/product/list', 'AdminProductController@list')->middleware('can:list-product');
    Route::get('admin/product/edit/{id}', 'AdminProductController@edit')->name('edit.product')->middleware('can:edit-product');
    Route::post('admin/product/update/{id}', 'AdminProductController@update')->name('update.product')->middleware('can:edit-product');
    Route::get('admin/product/delete/{id}', 'AdminProductController@delete')->name('delete.product')->middleware('can:delete-product');
    Route::post('admin/product/action', 'AdminProductController@action')->name('product.action')->middleware('can:act-product');
    Route::get('admin/product/detail/{id}', 'AdminProductController@detail')->name('product.detail')->middleware('can:detail-product');
    Route::post('admin/product/fetchPara', 'AdminProductController@fetchPara')->name('fetchPara');

    Route::get('admin/product/inventory', 'AdminProductController@inventory')->name("inventory");
    Route::get('admin/product/stockout', 'AdminProductController@stockout')->name("stockout");

    //AJAX UPLOAD
    Route::post('admin/product/ajaxSubCat', 'AdminProductController@ajaxSubCat')->name('ajaxSub');
    Route::post('admin/product/fetchData', 'AdminProductController@fetchData')->name('fetchData');
    Route::post('admin/product/images/delete', 'AdminProductController@delete_images')->name('delete.images');
    Route::post('admin/product/images/edit', 'AdminProductController@edit_images')->name('edit.images');
    Route::post('admin/product/images/update', 'AdminProductController@update_images')->name('update.images');
    Route::post('admin/product/ajaxUpload', 'AdminProductController@ajaxUpload')->name('ajaxUpload');
    // PRODUCT_CAT 
    Route::post('admin/product/cat/store', 'AdminProductCatController@store')->name('store.cat')->middleware('can:add-productcat');
    Route::get('admin/product/cat/add', 'AdminProductCatController@add')->middleware('can:add-productcat');
    Route::get('admin/product/cat/list', 'AdminProductCatController@list')->middleware('can:list-productcat');
    Route::get('admin/product/cat/delete/{id}', 'AdminProductCatController@delete')->name('delete.product_cat')->middleware('can:delete-productcat');
    Route::post('admin/product/cat/action', 'AdminProductCatController@action')->name('cat.action')->middleware('can:act-productcat');
    Route::get('admin/product/cat/edit/{id}', 'AdminProductCatController@edit')->name('edit.product_cat')->middleware('can:edit-productcat');
    Route::post('admin/product/cat/update/{id}', 'AdminProductCatController@update')->name('update.cat')->middleware('can:edit-productcat');
    Route::post('admin/product/cat/fetchParaForProCat', 'AdminProductCatController@fetchParaForProCat')->name('fetchParaForProCat');
    Route::post('admin/product/cat/deleteParaForProCat', 'AdminProductCatController@deleteParaForProCat')->name('deleteParaForProCat');
    // PARAPRO
    Route::get('admin/paraPro/add', 'AdminParaProController@add')->middleware('can:add-parameterpro');
    Route::get('admin/paraPro/list', 'AdminParaProController@list')->middleware('can:list-parameterpro');
    Route::post('admin/paraPro/store', 'AdminParaProController@store')->name('store.paraPro')->middleware('can:add-parameterpro');
    Route::post('admin/paraPro/cat/action', 'AdminParaProController@action')->name('para.action')->middleware('can:act-parameterpro');
    Route::get('admin/paraPro/cat/delete/{id}', 'AdminParaProController@delete')->name('delete.para')->middleware('can:delete-parameterpro');
    Route::get('admin/paraPro/cat/edit/{id}', 'AdminParaProController@edit')->name('edit.para')->middleware('can:edit-parameterpro');
    Route::post('admin/paraPro/cat/update/{id}', 'AdminParaProController@update')->name('update.para')->middleware('can:edit-parameterpro');
     

    //MENU
    Route::get('admin/menu', 'AdminMenuController@menu')->middleware('can:list-menu');
    Route::post('admin/menu/store', 'AdminMenuController@store')->name('store.menu')->middleware('can:add-menu');
    Route::get('admin/menu/delete/{id}', 'AdminMenuController@delete')->name('delete.menu')->middleware('can:delete-menu');
    Route::post('admin/menu/action', 'AdminMenuController@action')->name('menu.action')->middleware('can:act-menu');
    Route::get('admin/menu/edit/{id}', 'AdminMenuController@edit')->name('edit.menu')->middleware('can:edit-menu');
    Route::post('admin/menu/update/{id}', 'AdminMenuController@update')->name('update.menu')->middleware('can:edit-menu');
    //SETTINGS
    Route::get('admin/settings/list', 'AdminSettingController@list')->name("list.settings")->middleware('can:list-settings');
    Route::get('admin/settings/add', 'AdminSettingController@add')->name("add.settings")->middleware('can:add-settings');
    Route::post('admin/settings/store', 'AdminSettingController@store')->name('store.settings')->middleware('can:add-settings');
    Route::get('admin/settings/delete/{id}', 'AdminSettingController@delete')->name('delete.settings')->middleware('can:delete-settings');
    Route::post('admin/settings/action', 'AdminSettingController@action')->name('setting.action')->middleware('can:act-settings');
    Route::get('admin/settings/edit/{id}', 'AdminSettingController@edit')->name('edit.settings')->middleware('can:edit-settings');
    Route::post('admin/settings/update/{id}', 'AdminSettingController@update')->name('update.settings')->middleware('can:edit-settings');
    //ADVANCED OPTION
    Route::get('admin/advancedOption/globalSetting/add', 'AdminAdvancedOptionController@add')->name('globalSetting.add')->middleware('can:add-globalSetting');
    Route::post('admin/advancedOption/globalSetting/store', 'AdminAdvancedOptionController@store')->name('globalSetting.store')->middleware('can:add-globalSetting');
    //ORDER
    Route::get('admin/order/list', 'AdminOrderController@orderList')->middleware('can:list-productorder');
    Route::get('admin/order/delete/{id}', 'AdminOrderController@delete')->name('delete.order')->middleware('can:delete-productorder');
    Route::get('admin/order/edit/{id}', 'AdminOrderController@edit')->name('edit.order')->middleware('can:edit-productorder');
    Route::get('admin/order/print/{id}', 'AdminOrderController@printBill')->name('print.order');
    Route::post('admin/order/action', 'AdminOrderController@action')->name('order.action')->middleware('can:act-productorder');
    Route::post('admin/order/update/{id}', 'AdminOrderController@update')->name('update.order')->middleware('can:edit-productorder');
    Route::post('update/order_qty', 'AdminOrderController@update_order_qty')->name('update.qty');
    //CUSTOMER
    Route::get('admin/customer/list', 'AdminCustomerController@customerList');
    Route::get('admin/customer/delete/{id}', 'AdminCustomerController@delete')->name('delete.customer');
    Route::get('admin/customer/edit/{id}', 'AdminCustomerController@edit')->name('edit.customer');
    Route::post('admin/customer/action', 'AdminCustomerController@action')->name('customer.action');
});
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
