<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('subscribers', \App\Http\Controllers\Api\SubscriberController::class);
Route::apiResource('fields', \App\Http\Controllers\Api\FieldController::class);
Route::apiResource('field-types', \App\Http\Controllers\Api\FieldTypeController::class);
Route::apiResource('subscriber-states', \App\Http\Controllers\Api\SubscriberStateController::class);
