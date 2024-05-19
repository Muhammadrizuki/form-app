<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormEntryController;

Route::get('/', [FormController::class, 'create'])->name('form.create');
Route::post('/', [FormController::class, 'store'])->name('form.store');

Route::get('/form-entries', [FormEntryController::class, 'index'])->name('form.entries');



