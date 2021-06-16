<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});

Route::get('/status', function () {
    return view('/front');
});




Route::view("/login","login");
Route::view("/register","register");
Route::post("login",[UserController::class,'login']);
Route::post("register",[UserController::class,'register']);
Route::get('listupdate',[UserController::class,'show']);
Route::get('delete/{id}',[UserController::class,'delete']);
Route::get('profile/{id}',[UserController::class,'showData']);
Route::post('profile',[UserController::class,'update']);
Route::get("/",[ProductController::class,'index']);
Route::get("shoes",[ProductController::class,'shoes']);
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::get("search",[ProductController::class,'search']);
Route::post("add_to_cart",[ProductController::class,'addToCart']);
Route::get("cartlist",[ProductController::class,'cartList']);
Route::get("removecart/{id}",[ProductController::class,'removeCart']);
Route::get("ordernow",[ProductController::class,'orderNow']);
Route::post("orderplace",[ProductController::class,'orderPlace']);
Route::get("myorder",[ProductController::class,'myOrder']);
Route::post("/comment",[CommentsController::class,'store']);
Route::post("/toggle-approve",[CommentsController::class,'approval']);
Route::get("/status",[CommentsController::class,'index']);
Route::get("/dash",[CommentsController::class,'dash']);
Route::post("/upload",[photoController::class,'store']);
Route::get("/upload",[UserController::class,'create']);
Route::view("/about","about");
Route::view("/contact","contact");
Route::get("ordernow",[ProductController::class,'cartb']);
Route::post("add_in_cart",[ProductController::class,'addInCart']);


