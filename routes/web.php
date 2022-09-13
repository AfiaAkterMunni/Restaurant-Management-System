<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\ExpenseController;
use App\Http\Controllers\dashboard\EmployeeController;

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

//-------------Expense-------------//
Route::get('/expenses', [ExpenseController::class,'index'])->name('expense.index');
Route::post('/expenses/store', [ExpenseController::class,'store'])->name('expense.store');
Route::post('/expenses/update/{id}', [ExpenseController::class,'update'])->name('expense.update');
Route::get('/expenses/delete/{id}', [ExpenseController::class,'delete'])->name('expense.delete');

//-------------Employee-------------//
Route::get('/employees', [EmployeeController::class,'index'])->name('employee.index');
Route::post('/employees/store', [EmployeeController::class,'store'])->name('employee.store');
Route::post('/employees/update/{id}', [EmployeeController::class,'update'])->name('employee.update');
Route::get('/employees/delete/{id}', [EmployeeController::class,'delete'])->name('employee.delete');
