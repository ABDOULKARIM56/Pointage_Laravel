<?php

use App\Http\Controllers\EmployeAuthController;
use Illuminate\Support\Facades\Route;

 Route::get('/', function () {
    return view('Auth');
});
 

Route::post('/employe/authentification', [EmployeAuthController::class, 'authentification'])->name('connexion');
Route::post('welcome', [EmployeAuthController::class, 'deconnexion'])->name('deconnexion');