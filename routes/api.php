<?php

use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\AuthController;
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

//Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/shopping', [ShoppingController::class, 'index']);
Route::get('/shopping/{$id}', [ShoppingController::class, 'show']);
Route::get('/shopping/search/{name}', [ShoppingController::class, 'search']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/shopping', [ShoppingController::class, 'store']);
    Route::put('/shopping/{$id}', [ShoppingController::class, 'update']);
    Route::delete('/shopping/{$id}', [ShoppingController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::resource('shopping', ShoppingController::class);
