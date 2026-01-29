<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;



Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
Route::put('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');

Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
Route::get('/contacts', [GroupController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [GroupController::class, 'create'])->name('contacts.create');
Route::post('/groups', [GroupController::class, 'store'])->name('contacts.store');
