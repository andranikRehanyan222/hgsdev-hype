<?php

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


// dd(config('database'));
Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::post('paymenttest', 'PaymenttestController@index');
Route::get('paymenttest/create/{product}', 'PaymenttestController@create')->name('paymenttest.create');
Route::any('paymenttest/return', 'PaymenttestController@getPaymentStatus')->name('paymenttest.return');
Route::any('paymenttest/cancel', 'PaymenttestController@cancel')->name('paymenttest.cancel');

Route::get('stripe/create/{product}', 'StripeController@create')->name('stripe.create');
Route::post('stripe/payment/{order}', 'StripeController@payment')->name('stripe.payment');

// APP Routes Below ->middleware('auth','admin')
Route::group(['middleware' => 'admin'], function () {
    Route::resource('users', 'UsersController', [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
    ]);

    Route::post('search-users', 'UsersController@search')->name('search-users');
    
    Route::get('fuelgram', 'FuelgramController@index');
    Route::get('fuelgram/create_user', 'FuelgramController@create_user');
    Route::get('fuelgram/get_accounts', 'FuelgramController@get_accounts');
    Route::get('fuelgram/get_autoengagementgroups', 'FuelgramController@get_autoengagementgroups');
    Route::get('fuelgram/get_receivers', 'FuelgramController@get_receivers');
    Route::get('fuelgram/get_niches', 'FuelgramController@get_niches');
    Route::get('fuelgram/products_settings', 'FuelgramController@products_settings');
    Route::get('fuelgram/get_account_retrieve', 'FuelgramController@get_account_retrieve');
    Route::get('fuelgram/get_account_check', 'FuelgramController@get_account_check');


    Route::get('powerlikes', 'PowerlikesController@index')->name('powerlikes');
    Route::get('powerlikes/show/{product}', 'PowerlikesController@show')->name('powerlikes.show');
    Route::get('powerlikes/edit/{product}', 'PowerlikesController@edit')->name('powerlikes.edit');
    Route::post('powerlikes/update/{product}', 'PowerlikesController@update')->name('powerlikes.update');
    Route::get('powerlikes/reload', 'PowerlikesController@reload')->name('powerlikes.reload');
    
    Route::get('fuelgroups', 'FuelgroupsController@index')->name('fuelgroups');
    Route::get('fuelgroups/show/{product}', 'FuelgroupsController@show')->name('fuelgroups.show');
    Route::get('fuelgroups/edit/{product}', 'FuelgroupsController@edit')->name('fuelgroups.edit');
    Route::post('fuelgroups/update/{product}', 'FuelgroupsController@update')->name('fuelgroups.update');
    Route::get('fuelgroups/reload', 'FuelgroupsController@reload')->name('fuelgroups.reload');
    
    Route::get('autorounds', 'AutoroundsController@index')->name('autorounds');
    Route::get('autorounds/show/{product}', 'AutoroundsController@show')->name('autorounds.show');
    Route::get('autorounds/edit/{product}', 'AutoroundsController@edit')->name('autorounds.edit');
    Route::post('autorounds/update/{product}', 'AutoroundsController@update')->name('autorounds.update');
    Route::get('autorounds/reload', 'AutoroundsController@reload')->name('autorounds.reload');



    Route::get('order', 'OrdersController@index')->name('order');
    Route::get('order/show/{order}', 'OrdersController@show')->name('order.show');
    Route::any('order/pay/{order}', 'OrdersController@pay')->name('order.pay');
    Route::post('order/create/{product}', 'OrdersController@create')->name('order.create');
    Route::get('order/add/{product}', 'OrdersController@add')->name('order.add');


    Route::get('paypal', 'PaypalController@index')->name('paypal');
    Route::any('paypal/create', 'PaypalController@create')->name('paypal.create');
    Route::get('paypal/success', 'PaypalController@success')->name('paypal.success');
    Route::get('paypal/cancel', 'PaypalController@cancel')->name('paypal.cancel');
    Route::any('paypal/capture', 'PaypalController@capture')->name('paypal.capture');
    Route::get('paypal/getorderdetails', 'PaypalController@getorderdetails')->name('paypal.getorderdetails');

    Route::get('paypaltest', 'PaypaltestController@index');
    Route::get('paypaltest/success', 'PaypaltestController@success');
    Route::get('paypaltest/cancel', 'PaypaltestController@cancel');
    Route::get('paypaltest/createorder', 'PaypaltestController@createorder');
    Route::get('paypaltest/getorderdetails', 'PaypaltestController@getorderdetails');





    Route::get('profile', 'ProfileController@index');
    Route::get('profile/instagram', 'ProfileController@instagram');
    Route::post('profile/instagram', 'ProfileController@instagram_update');

    
    Route::get('accounts', 'AccountsController@index')->name('accounts');
    Route::get('accounts/add', 'AccountsController@add')->name('accounts.add');
    Route::post('accounts/create', 'AccountsController@create')->name('accounts.create');
    Route::get('accounts/edit/{account}', 'AccountsController@edit')->name('accounts.edit');
    Route::post('accounts/update/{account}', 'AccountsController@update')->name('accounts.update');
    Route::get('accounts/show/{account}', 'AccountsController@show')->name('accounts.show');
    Route::get('accounts/delete/{account}', 'AccountsController@delete')->name('accounts.delete');

    Route::get('setting', 'SettingController@index')->name('setting');
    Route::get('setting/paypal', 'SettingController@paypal')->name('setting.paypal');
    Route::post('setting/paypal_post', 'SettingController@paypal_post')->name('setting.paypal_post');
    Route::get('setting/stripe', 'SettingController@stripe')->name('setting.stripe');
    
    Route::post('setting/stripe_post', 'SettingController@stripe_post')->name('setting.stripe_post');
// flaticon-setting-line
    
    //products
    Route::get('products', 'ProductController@index')->name('product');
    Route::get('products/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('products/update/{id}', 'ProductController@update')->name('product.update');
    Route::get('changeProductStatus/{id}', 'ProductController@changeProductStatus')->name('product.changeProductStatus');

    //support request
    Route::get('support/add/{id}', 'SupportController@createSupportRequest')->name('support.createSupportRequest');
    Route::get('support', 'SupportController@index')->name('support');
});



Route::get('/home', 'HomeController@index')->middleware('auth','admin');
