<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/boards', [App\Http\Controllers\Board\BoardListController::class, 'index'])->name('board'); // 게시판 리스트 조회
Route::get('/board-form', [App\Http\Controllers\Board\BoardWriteController::class, 'index'])->name('board'); // 게시판 리스트 조회
Route::get('/boards/{id}', [App\Http\Controllers\Board\BoardDetailController::class, 'getBoardView']); // 폼에 입력된 데이터 저장