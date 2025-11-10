<?php

use App\Http\Controllers\EmployeAuthController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('Employe.CreateEmploye');
});
 */

Route::get('/', [EmployeAuthController::class, 'authentification'])->name('Connextion');