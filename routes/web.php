<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
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

Auth::routes();
// Auth::routes([
//     'register' => false, // Registration Routes...
//     'reset' => false, // Password Reset Routes...
//     'verify' => false, // Email Verification Routes...
// ]);

Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/students', [Controllers\StudentController::class, 'index'])->name('list-students');
// Route::get('/students', 'StudentController@index')->name('students');
Route::post('/students', [Controllers\StudentController::class, 'import'])->name('import-excel');


Route::get('/show-student/{id}', [Controllers\StudentController::class, 'show'])->name('show-student');

Route::get('/create-student', [Controllers\StudentController::class, 'create'])->name('create-student');
Route::post('/store-student', [Controllers\StudentController::class, 'store'])->name('store-student');

Route::get('/edit-student/{id}', [Controllers\StudentController::class, 'edit'])->name('edit-student');
Route::post('/update-student/{id}', [Controllers\StudentController::class, 'update'])->name('update-student');

Route::get('/delete-student/{id}', [Controllers\StudentController::class, 'delete'])->name('delete-student');

Route::get('/rooms', [Controllers\RoomController::class, 'room'])->name('rooms');
Route::post('/rooms', [Controllers\RoomController::class, 'store'])->name('create-room');
Route::get('/rooms/show-room/{id}', [Controllers\RoomController::class, 'show'])->name('show-room');

Route::get('/years', [Controllers\YearController::class, 'year'])->name('years');
Route::post('/years', [Controllers\YearController::class, 'store'])->name('create-year');
Route::get('/years/show-year/{id}', [Controllers\YearController::class, 'show'])->name('show-year');

Route::get('/finances/{id}', [Controllers\FinanceController::class, 'show'])->name('show-finance');
Route::post('/finances/{id}', [Controllers\FinanceController::class, 'store'])->name('create-amount');
Route::get('/delete-amount/{id}', [Controllers\FinanceController::class, 'delete'])->name('delete-amount');
