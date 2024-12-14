<?php
use App\Http\Controllers\ApiController;

Route::middleware([])->get('/example', [ApiController::class, 'example']);