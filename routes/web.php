<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\photoController;
use App\Http\Controllers\CollectionController;





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
Route::get('/welcome', function () {
    return view('/welcome');
});

// // ...................................admin area.........................
Route::get('/logout', function () {
    Session::forget('admin');
    return redirect('/login');
});
Route::view("/login","login");
Route::view("/register","register");
Route::post("/login",[adminController::class,'login']);
Route::post("register",[adminController::class,'register']);
Route::get('listupdate',[adminController::class,'show']);
Route::get('delete/{id}',[adminController::class,'delete']);
Route::get('profile/{id}',[adminController::class,'showData']);
Route::post('profile',[adminController::class,'update']);
Route::get("/",[ProductController::class,'index']);

Route::view("addnewproducts","addnewproducts");
Route::post("addnewproducts",[ProductController::class,'addnew']);
Route::get("showproducts",[ProductController::class,'create']);

Route::get('showproducts',[ProductController::class,'showpro']);
Route::get('delete/{id}',[ProductController::class,'delete']);
Route::get('editproducts/{id}',[ProductController::class,'editpro']);
Route::post('editproducts',[ProductController::class,'update']);



