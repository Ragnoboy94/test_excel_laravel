<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::post('/upload', [\App\Http\Controllers\ExcelUploadController::class, 'upload'])->name('excel.upload');

