<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\LeadController;

Route::post('register',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'login']);
Route::post('logout',[UserAuthController::class,'logout'])
  ->middleware('auth:sanctum');

  Route::middleware('auth:sanctum')->group(function () {
    Route::post('/leads/data', [LeadController::class,'index']);
    Route::post('/store/leads', [LeadController::class, 'store']);
    Route::put('/leads/{lead}', [LeadController::class, 'update']);
    Route::post('/store/followups', [FollowUpController::class, 'store']);
    Route::put('/followups/{followUp}/status', [FollowUpController::class, 'updateStatus']);
});