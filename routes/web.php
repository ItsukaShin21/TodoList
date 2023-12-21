<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('loginPage');
})->name('login');

Route::get('/register', function () {
    return view('registerPage');
})->name('register');

Route::get('/todolist', function() {
    return view('todolistPage');
})->name('todolist');

Route::get('/history', function() {
    return view('historyPage');
})->name('history');

Route::post('/', [LoginController::class, 'login'])->name('login');
Route::post('/register', [AccountController::class, 'addAccount'])->name('register');
Route::post('/todolist/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/history/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/todolist/addTask', [DataController::class, 'addTask'])->name('addTask');
Route::get('/todolist', [DataController::class, 'displayData'])->name('view');
Route::post('/todolist/taskDetails', [DataController::class, 'getTaskDetails'])->name('getTaskDetails');
Route::post('/todolist/updateTask', [DataController::class, 'updateTask'])->name('updateTask');
Route::post('/todolist/delete', [DataController::class, 'deleteTask'])->name('deleteTask');
Route::post('/todolist/taskFinished', [DataController::class, 'finishTask'])->name('finishTask');
Route::get('/history', [HistoryController::class, 'displayhistoryData'])->name('displayHistory');
Route::post('/history/clear', [HistoryController::class, 'clearHistory'])->name('clearHistory');