<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('transactions.index');
});

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transaction', [TransactionController::class, 'store'])->name('transactions.store');
Route::delete('/transaction/{id}', [TransactionController::class, 'eliminar'])->name('transactions.destroy');
