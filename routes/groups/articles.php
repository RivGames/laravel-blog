<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Article\ArticleController;

Route::middleware('auth')->group(function () {
    Route::resource('articles', ArticleController::class)->except('index');
});
