<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use app\Models\User;

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

// category controller

Route::get('/category/all',[CategoryController::Class,'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::Class,'AddCar'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::Class,'edit']);
Route::get('softDelete/category/{id}',[CategoryController::Class,'SoftDelete']);
Route::get('category/restore/{id}',[CategoryController::Class,'restore']);
Route::post('category/update/{id}',[CategoryController::Class,'update']);
Route::get('permanet/delete/{id}',[CategoryController::Class,'permanentDelete']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::All();
    return view('dashboard',compact('users'));
})->name('dashboard');
