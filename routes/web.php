<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FCMController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/send-using-token', [FCMController::class, 'sendMessageUsingToken']);
Route::post('/send-using-topic', [FCMController::class, 'sendMessageUsingTopic']);
