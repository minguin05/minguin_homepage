<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/boards', [App\Http\Controllers\Board\BoardWriteController::class, 'saveBoard']); // 폼에 입력된 데이터 저장

Route::get('/file/{id}', [App\Http\Controllers\Board\BoardDetailController::class, 'getFileDownload']); // 폼에 입력된 데이터 저장