<?php

use Illuminate\Support\Facades\Route;
use AweUx\MoonshineTheme\Http\Controllers\ThemeController;

Route::group(['middleware' => 'web'], function () {
    Route::get('moonshine-theme/update', [ThemeController::class, 'update'])->name('moonshine-theme.update');
});
