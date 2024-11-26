<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/last12months', [ExpenseController::class, 'last12months'])->name('expenses.last12months');

Route::get('/add', [ExpenseController::class, 'add'])->name('expenses.add');
Route::post('/add', [ExpenseController::class, 'store'])->name('expenses.store');

Route::get('/list', [ExpenseController::class, 'list'])->name('expenses.list');

Route::get('/categories', [ExpenseController::class, 'categories'])->name('expenses.categories');