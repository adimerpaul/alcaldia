<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/login',[\App\Http\Controllers\UserController::class,'login']);
Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::post('/me',[\App\Http\Controllers\UserController::class,'me']);
    Route::post('/logout',[\App\Http\Controllers\UserController::class,'logout']);
    Route::resource('/mercadocne',\App\Http\Controllers\MercadoCNEcontroller::class);
    Route::resource('/mercadocnf',\App\Http\Controllers\MercadoCNFcontroller::class);
    Route::resource('/formmerc',\App\Http\Controllers\FormmercController::class);
    Route::resource('/activida',\App\Http\Controllers\ActividaController::class);
    Route::resource('/form_acti',\App\Http\Controllers\Form_actiController::class);
    Route::resource('/form_pue',\App\Http\Controllers\Form_pueController::class);
    Route::resource('/form_cambios',\App\Http\Controllers\Form_cambiosController::class);

});