<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NasaController;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Route::get('/visor3d', function () {
    return view('visor3d', [
        // PON AQUÍ literal la URL que SÍ te descarga el archivo en el navegador:
        'src' => 'http://localhost/ArmagedonNASA/public/storage/models/modelo.glb',
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/kpi', function () {
    return view('kpi');
});

Route::get('/mode', function () {
    return view('mode');
});

Route::get('/comments', function () {
    return view('comments');
});

Route::get('/settings', function () {
    return view('settings');
});

Route::get('/loadDatos', function () {
    return view('loadDatos');
});

Route::get('/api/nasa', [NasaController::class, 'feed']);



