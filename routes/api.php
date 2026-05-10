<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiveEntryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('active-entries', ActiveEntryController::class)
    ->middleware(['ip-filter', 'auth:sanctum']);
