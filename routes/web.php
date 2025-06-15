<?php

use Illuminate\Support\Facades\Route;
// importacion del controlado del cliente

use App\Http\Controllers\ClienteControler;
use App\Http\Controllers\PredioController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes/mapa', [ClienteControler::class, 'mapa']);

//habulitacon delnacceso al controlador
Route::resource('clientes', ClienteControler::class);
Route::resource('predios', PredioController::class);






