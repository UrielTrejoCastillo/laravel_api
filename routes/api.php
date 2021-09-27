<?php

use App\Http\Controller\productos_controller;
use App\Http\Controller\login_controller;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post ('/login', 'App\Http\Controllers\login_controller@login');

Route::post ('/registrar_producto', 'App\Http\Controllers\productos_controller@registrar')->middleware('auth:api');

Route::get('/productos', 'App\Http\Controllers\productos_controller@listar_producto')->middleware('auth:api');