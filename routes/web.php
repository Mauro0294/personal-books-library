<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowersController;

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
    return view('welcome');
});

Route::resource('books', BooksController::class)->name('books.index', 'books');
Route::get('borrowers', [BorrowersController::class, 'index'])->name('borrowers.index');
Route::post('borrowers/create', [BorrowersController::class, 'create'])->name('borrowers.create');
Route::get('books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');
Route::post('books/{id}/update', [BooksController::class, 'update'])->name('books.update');
Route::delete('books/{id}/delete', [BooksController::class, 'destroy'])->name('books.destroy');