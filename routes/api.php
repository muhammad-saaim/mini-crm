<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::get('/health', function () {
        return response()->json(['status' => 'ok']);
    });
});
