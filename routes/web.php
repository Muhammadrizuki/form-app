<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', [FormController::class, 'create'])->name('form.create');
Route::post('/', [FormController::class, 'store'])->name('form.store');

