<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TransactionController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('sendMony', [TransactionController::class, 'sendMony'])->middleware(['auth:sanctum']);
Route::get('myPastDebitedTransactions', [TransactionController::class, 'myPastDebitedTransactions'])->middleware(['auth:sanctum']);
Route::get('myPastCreditedTransactions', [TransactionController::class, 'myPastCreditedTransactions'])->middleware(['auth:sanctum']);
