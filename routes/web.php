<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\LeadController;





Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/leads', [LeadController::class, 'store']);
    Route::post('/followups', [FollowUpController::class, 'store']);
    Route::put('/followups/{followUp}/status', [FollowUpController::class, 'updateStatus']);
});