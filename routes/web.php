<?php
use App\http\controllers\todoController;
use Illuminate\Support\Facades\Route;

use App\http\controllers\customerController;
use App\http\controllers\ownerController;


// Route::get('/',[customerController::class,'index']);
Route::post('/',[customerController::class,'index']);
// Route::get('/cart',[customerController::class,'shoppingCart']);
Route::post('/cart',[customerController::class,'shoppingCart']);
Route::resource('/product', ownerController::class);

