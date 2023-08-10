<?php

declare(strict_types=1);

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\TransactionsController;
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

Route::get('health', function () {
    return response()->json(['message' => 'PERFECT-PAY']);
});

Route::post('customers', [CustomersController::class, 'customerProcess']);
Route::post('transactions', [TransactionsController::class, 'transactionProcess']);

Route::any('/{any}', function () {
    return response()->json(['message' => 'Invalid router'], 404);
})->where('any', '.*');
