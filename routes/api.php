<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\OperationController;


Route::get('/notices', [NoticeController::class, 'index']);
Route::post('/notices', [NoticeController::class, 'store']);
Route::get('/notices/{id}', [NoticeController::class, 'show']);
Route::patch('/notices/{id}', [NoticeController::class, 'updateStatus']);
Route::put('/notices/{id}', [NoticeController::class, 'update']);
Route::post('/notices/{id}/duplicate', [NoticeController::class, 'duplicate']);
Route::post('/attachments', [NoticeController::class, 'upload']);


Route::get('/user-types', [UserTypeController::class, 'index']);
Route::get('/procedures', [ProcedureController::class, 'index']);
Route::get('/operations', [OperationController::class, 'index']);

Route::post('/procedures/{id}/link', [ProcedureController::class, 'generateLink']);


