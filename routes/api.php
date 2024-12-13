<?php

use App\Http\Controllers\ModLogController;

Route::post('/mod-logs', [ModLogController::class, 'store']);
