<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::post('/form', [FormController::class, 'store'])->name('form.store');


Route::get('/form-livewire', [FormController::class, 'livewire'])->name('form.livewire');


Route::get('/', function () {
    return view('welcome');
});
