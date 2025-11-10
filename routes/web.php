<?php

use App\Http\Controllers\UrlGeneratorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UrlGeneratorController::class, 'index'])->name('urls.index');
Route::post('/urls', [UrlGeneratorController::class, 'store'])->name('urls.store');
Route::delete('/urls/{url}', [UrlGeneratorController::class, 'destroy'])->name('urls.destroy');
Route::get('/{shortCode}', [UrlGeneratorController::class, 'redirect'])->name('url.redirect');
Route::get('/urls/{url}/stats', [UrlGeneratorController::class, 'stats'])->name('url.stats');
