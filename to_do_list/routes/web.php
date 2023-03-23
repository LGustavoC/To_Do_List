<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoListController;

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

Route::get('/', [ToDoListController::class, 'index'])->name('index');
Route::post('/', [ToDoListController::class, 'store'])->name('store');
Route::delete('/{toDoList:id}', [ToDoListController::class, 'destroy'])->name('destroy');
Route::post('/update-status/{toDoList:id}', [ToDoListController::class, 'updateStatus'])->name('updateStatus');