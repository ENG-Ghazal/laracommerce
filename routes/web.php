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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth','isAdmin'])->group( function (){
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);


    //  start category routes
    Route::name('admin.category.')
    ->controller(App\Http\Controllers\Admin\CategoryController::class)
    ->prefix('category')
    ->group(function () {
            Route::get('','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('create','store')->name('store');
            Route::get('{id}/edit','edit')->name('edit');
            Route::put('{id}/edit','update')->name('update');
        });




     //  end category routes

    //  start product routes
    Route::name('admin.product.')
    ->controller(App\Http\Controllers\Admin\ProductController::class)
    ->prefix('product')
    ->group(function () {

                    Route::get('','index')->name('index');
                    Route::get('create','create')->name('create');
                    Route::post('create','store')->name('store');
                    Route::get('{id}/edit','edit')->name('edit');
                    Route::put('{id}/edit','update')->name('update');
                    Route::get('{id}/delete','destroy')->name('delete');

                    Route::get('product-image/{product_image_id}/delete','destroyProductImage')->name('delete.product-image');
           });


      //  end product routes

    //  start Brands Routes
    Route::get('/brand',App\Http\Livewire\Admin\Brand\Index::class)->name('admin.brand.index');
    // end Brands Routes

     //  start Colors Routes
     Route::name('admin.color.')
     ->controller(App\Http\Controllers\Admin\ColorController::class)
     ->prefix('color')
     ->group(function () {
             Route::get('','index')->name('index');
             Route::get('create','create')->name('create');
             Route::post('create','store')->name('store');
             Route::get('{id}/edit','edit')->name('edit');
             Route::put('{id}/edit','update')->name('update');
             Route::get('{id}/delete','destroy')->name('delete');
     });

     // end colors Routes

});
