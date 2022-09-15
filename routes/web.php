<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\ExpenseController;
use App\Http\Controllers\dashboard\EmployeeController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\MenuController;
use App\Http\Controllers\frontend\HomeController;

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
//----------------------------------------------------------------------//
//---------------------------------Frontend-----------------------------//
//----------------------------------------------------------------------//

Route::get('/', [HomeController::class,'index'])->name('home');

//----------------------------------------------------------------------//
//---------------------------------------Dashboard----------------------//
//----------------------------------------------------------------------//

//-------------Menu-------------//
Route::get('/menus', [MenuController::class,'index'])->name('menu.index');
Route::post('/menus/category/store', [CategoryController::class,'store'])->name('category.store');
Route::post('/menus/store', [MenuController::class,'store'])->name('menu.store');
Route::post('/menus/update/{id}', [MenuController::class,'update'])->name('menu.update');
Route::get('/menus/delete/{id}', [MenuController::class,'delete'])->name('menu.delete');

//-------------Admin-------------//
Route::get('/users', [UserController::class,'index'])->name('user.index');
Route::post('/users/store', [UserController::class,'store'])->name('user.store');

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
