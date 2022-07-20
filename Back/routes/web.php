<?php

use Illuminate\Support\Facades\Route;
use Src\AEMET\Infrastructure\Controllers\AEMETGetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/municipality/{id}', [AEMETGetController::class, 'getMunicipality']);

Route::get('/municipalities', [AEMETGetController::class, 'getAllMunicipalities']);
