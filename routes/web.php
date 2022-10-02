<?php
use App\http\controllers\todoController;
use Illuminate\Support\Facades\Route;

use App\http\controllers\customerController;
use App\http\controllers\ownerController;


Route::resource('/product', ownerController::class);
Route::get('/',[customerController::class,'index']);
// Route::get('/cart',[customerController::class,'shoppingCart']);
Route::post('/cart',[customerController::class,'shoppingCart']);
Route::post('/shipping',[customerController::class,'shipping']);
Route::get('/shipping',[customerController::class,'shipping']);
Route::post('/confirm',[customerController::class,'confirm']);
Route::get('/orders',[ownerController::class,'orders']);
Route::get('/orders/show/{id}',[ownerController::class,'showOrders']);
Route::get('/orders/add/histroy/{id}',[ownerController::class,'makeHistory']);
Route::get('/orders/history',[ownerController::class,'history']);
Route::get('/orders/history/{id}',[ownerController::class,'showHistory']);

