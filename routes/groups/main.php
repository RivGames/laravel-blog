<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\MainController;

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/about', [MainController::class, 'about'])->name('about');