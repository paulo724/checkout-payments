<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::post('/create-customer', [CheckoutController::class, 'createNewOrder']);

Route::post('/create-order', [CheckoutController::class, 'placeOrder']);


Route::post('/post', function (Request $request) {

    return response()->json([
        'code' => 200,
        'data' => [
            'data' => $request->all(),
            'msg' => 'Ambiente alterado com sucesso'
        ]
    ]);
});

Route::get('/post', function (Request $request) {

    return response()->json([
        'code' => 200,
        'data' => [
            'data' =>     Session::all(),
            'msg' => 'Ambiente alterado com sucesso'
        ]
    ]);
});

Route::prefix('/cart')->group(function () {
    Route::get('/', [CartController::class, 'index']);
    Route::get('/index', [CartController::class, 'index']);
    Route::post('/buy', [CartController::class, 'buy']);
    Route::get('/remove/{id}', [CartController::class, 'remove']);
    Route::post('/update', [CartController::class, 'update']);
    Route::post('/delete', [CartController::class, 'delete']);
});
