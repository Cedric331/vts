<?php

use App\Http\Controllers\MediaPlanController;
use Illuminate\Support\Facades\Route;

/**
 * Display a listing of the resource.
 * Préfixe de l'URI : /api
 * https://laravel.com/docs/11.x/routing
 */
Route::apiResource('media', MediaPlanController::class)->middleware('auth:sanctum');
