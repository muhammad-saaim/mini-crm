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
| Laravel automatically prefixes these routes with `/api`.
|
*/

// Health check
Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

// Lead API routes
Route::get('/leads', [LeadController::class, 'index']);        // List all leads
Route::post('/leads', [LeadController::class, 'store']);       // Create a new lead
Route::get('/leads/{id}', [LeadController::class, 'show']);    // Get single lead
Route::put('/leads/{id}', [LeadController::class, 'update']);  // Update lead
Route::delete('/leads/{id}', [LeadController::class, 'destroy']); // Delete lead
