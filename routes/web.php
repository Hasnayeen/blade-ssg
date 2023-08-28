<?php

use Hasnayeen\BladeSsg\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

if (config('blade-ssg.handle_routes')) {
    Route::get('{slug}', PageController::class)->where('slug', '.*');
}
