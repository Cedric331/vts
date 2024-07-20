<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['message' => 'Error'];
});

require __DIR__.'/auth.php';
