<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RealEstateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/api/post/login', [App\Http\Controllers\AuthController::class, 'login_post'])->name('login.post');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

/*Admin Routes*/
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.login');
Route::get('/property/list', [App\Http\Controllers\AdminController::class, 'property_type_list'])->name('property.type.list');
Route::post('/api/store/property_type', [App\Http\Controllers\AdminController::class, 'store_property_type'])->name('storetype');
Route::post('/api/update/property_type', [App\Http\Controllers\AdminController::class, 'update_property_type'])->name('updatetype');
Route::delete('/api/delete/property_type/{id}', [App\Http\Controllers\AdminController::class, 'delete_property_type'])->name('deleteType');
Route::get('/property', [App\Http\Controllers\AdminController::class, 'property'])->name('property');
Route::get('/add/property', [App\Http\Controllers\AdminController::class, 'add_property'])->name('add.property');
Route::post('/api/store/property', [App\Http\Controllers\AdminController::class, 'store_property'])->name('store_property_form');
Route::get('/edit/property/{id}', [App\Http\Controllers\AdminController::class, 'edit_property'])->name('edit.property');
Route::post('/api/update/property', [App\Http\Controllers\AdminController::class, 'update_property'])->name('updateProperty');
Route::delete('/property/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete_property'])->name('property.delete');
Route::get('/customer/list', [App\Http\Controllers\AdminController::class, 'customer_list'])->name('customer.list');
Route::get('/api/approve/property/{id}', [App\Http\Controllers\AdminController::class, 'approve_property'])->name('property.edit');
Route::delete('/customer/delete/{id}', [App\Http\Controllers\AdminController::class, 'customer_delete'])->name('customer.delete');
Route::get('/payment', [App\Http\Controllers\AdminController::class, 'get_payment_list'])->name('get.payment');
Route::get('/view/payment/{id}', [App\Http\Controllers\AdminController::class, 'view_payment'])->name('view.payment');



/*End Admin Routes*/




/*Landing Routes*/
Route::get('/index', [App\Http\Controllers\LandingController::class, 'index'])->name('index');
Route::get('/for/sale', [App\Http\Controllers\LandingController::class, 'for_sale'])->name('for.sale');
Route::get('/view/properrty/{id}', [App\Http\Controllers\LandingController::class, 'view_property'])->name('property.view');






Route::get('/realestate', [RealEstateController::class, 'index']);
Route::get('/property/view/{id}', [RealEstateController::class, 'property_view'])->name('property.view');
Route::get('/forrent', [RealEstateController::class, 'forrent'])->name('forrent');
Route::get('/forsale', [RealEstateController::class, 'forsale'])->name('forsale');

Route::post('/api/post/customer', [App\Http\Controllers\RealEstateController::class, 'store_customer'])->name('form.submit');




/*End Landing Routes*/
