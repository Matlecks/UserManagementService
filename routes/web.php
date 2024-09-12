<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [UserController::class, 'index'])->name('user.index'); //главная страница

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit'); //Страница редактирования пользователя

Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update'); //Отправить изменения пользователя

Route::get('/create', [UserController::class, 'create'])->name('user.create'); //Страница создания пользователя

Route::post('/store', [UserController::class, 'store'])->name('user.store'); // Сохранение пользователя

Route::post('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy'); // Удаление пользователя
