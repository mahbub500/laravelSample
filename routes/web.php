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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::All();
    return view('dashboard',compact('users'));
})->name('dashboard');
