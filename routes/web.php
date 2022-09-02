<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index');



/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('platforms')->name('platforms/')->group(static function() {
            Route::get('/',                                             'PlatformController@index')->name('index');
            Route::get('/create',                                       'PlatformController@create')->name('create');
            Route::post('/',                                            'PlatformController@store')->name('store');
            Route::get('/{platform}/edit',                              'PlatformController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PlatformController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{platform}',                                  'PlatformController@update')->name('update');
            Route::delete('/{platform}',                                'PlatformController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('designs')->name('designs/')->group(static function() {
            Route::get('/',                                             'DesignController@index')->name('index');
            Route::get('/create',                                       'DesignController@create')->name('create');
            Route::post('/',                                            'DesignController@store')->name('store');
            Route::get('/{design}/edit',                                'DesignController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DesignController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{design}',                                    'DesignController@update')->name('update');
            Route::delete('/{design}',                                  'DesignController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('pricings')->name('pricings/')->group(static function() {
            Route::get('/',                                             'PricingController@index')->name('index');
            Route::get('/create',                                       'PricingController@create')->name('create');
            Route::post('/',                                            'PricingController@store')->name('store');
            Route::get('/{pricing}/edit',                               'PricingController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PricingController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pricing}',                                   'PricingController@update')->name('update');
            Route::delete('/{pricing}',                                 'PricingController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('logos')->name('logos/')->group(static function() {
            Route::get('/',                                             'LogoController@index')->name('index');
            Route::get('/create',                                       'LogoController@create')->name('create');
            Route::post('/',                                            'LogoController@store')->name('store');
            Route::get('/{logo}/edit',                                  'LogoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LogoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{logo}',                                      'LogoController@update')->name('update');
            Route::delete('/{logo}',                                    'LogoController@destroy')->name('destroy');
        });
    });
});