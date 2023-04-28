<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
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
Route::get('/', [TodosController::class, "liste"])->name("todo.list");
Route::post('/action/add', [TodosController::class, "saveTodo"])->name('todo.save');
Route::get('/action/done/{id}', [TodosController::class, "markAsDone"])->name('todo.done');
Route::get('/action/delete/{id}', [TodosController::class, "deleteTodo"])->name('todo.delete');
Route::get('/a-propos', [App\Http\Controllers\TodosController::class, 'about'])->name('pages.a-propos');