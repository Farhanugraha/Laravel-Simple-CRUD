<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;

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

// Route::get('dashboard', function () {
//   return view('dashboard');
// })->name('dashboard');


// controller route authentication
Route::controller(AuthController::class)->group(function () {
  Route::get('register', 'register')->name('register');
  Route::post('register', 'registerSave')->name('register.save');
  Route::get('login', 'login')->name('login');
  Route::post('login', 'loginAction')->name('login.action');
  Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// controller route items
// Route::controller(ItemsController::class)->prefix('items')->group(function () {
//   Route::get('', 'index')->name('items');
//   Route::get('add', 'add')->name('items.add');
//   Route::post('add', 'save')->name('items.add.save');
//   Route::get('edit/{id}', 'edit')->name('items.edit');
//   Route::post('edit/{id}', 'update')->name('items.add.update');
//   Route::get('delete/{id}', 'delete')->name('items.delete');
// });

Route::middleware('auth')->group(function () {

  Route::get('dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::controller(ItemsController::class)->prefix('items')->group(function () {
    Route::get('', 'index')->name('items');
    Route::get('add', 'add')->name('items.add');
    Route::post('add', 'save')->name('items.add.save');
    Route::get('edit/{id}', 'edit')->name('items.edit');
    Route::post('edit/{id}', 'update')->name('items.add.update');
    Route::get('delete/{id}', 'delete')->name('items.delete');
  });

  Route::controller(CategoryController::class)->prefix('category')->group(function(){
    Route::get('','index')->name('category');
    Route::get('add','add')->name('category.add');
    Route::post('add','save')->name('category.add.save');
    Route::get('edit/{id}','edit')->name('category.edit');
    Route::post('edit/{id}','update')->name('category.add.update');
    Route::get('delete/{id}','delete')->name('category.delete');

  });

});

