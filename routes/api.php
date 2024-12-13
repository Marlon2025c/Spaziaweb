<?php

use App\Http\Controllers\ModLogController;

Route::middleware('auth:sanctum')->post('/mod-logs', [ModLogController::class, 'store']);
