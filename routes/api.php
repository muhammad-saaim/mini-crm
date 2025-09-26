<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Routes loaded here are intended for API usage.
| CSRF protection is not applied to these routes by default.
|
*/

// Health check
Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

// Lead API routes
Route::get('/leads', [LeadController::class, 'index']);   // List all leads
Route::post('/leads', [LeadController::class, 'store']);  // Create a new lead
