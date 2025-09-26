<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;

// Health check
Route::get('/health', fn() => response()->json(['status'=>'ok']));

// Lead CRUD routes
Route::get('/leads', [LeadController::class, 'index']);       // List all leads
Route::post('/leads', [LeadController::class, 'store']);      // Create new lead
Route::get('/leads/{id}', [LeadController::class, 'show']);   // Get single lead
Route::put('/leads/{id}', [LeadController::class, 'update']); // Update lead
Route::delete('/leads/{id}', [LeadController::class, 'destroy']); // Delete lead
