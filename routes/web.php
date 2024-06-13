<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/chat', [ChatController::class, 'chat'])->name('chat.create');
Route::post('/chat', [ChatController::class, 'chat'])->name('chat.post');

Route::get('/', function () {
    return view('welcome');
});
