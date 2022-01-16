<?php

use Koraycicekciogullari\HydroSocial\Controllers\SocialMediaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'api'])->prefix('api/admin')->group(function(){
    Route::apiResource('social-media', SocialMediaController::class)->except('edit', 'create');
});
