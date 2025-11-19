<?php

use App\Http\Controllers\EmployeAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;


 Route::get('/', function () {
    return view('Auth');
});
 

Route::post('/employe/authentification', [EmployeAuthController::class, 'authentification'])->name('connexion');
Route::post('/employe/deconnexion', [EmployeAuthController::class, 'deconnexion'])->name('deconnexion');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/conditions', [SettingController::class, 'conditions'])->name('settings.politique');


Route::get('/parametre', [SettingController::class, 'index'])->name('settings.index');
Route::post('/parametre', [SettingController::class, 'update'])->name('settings.update');


