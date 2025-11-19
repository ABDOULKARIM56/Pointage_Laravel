<?php

use App\Http\Controllers\EmployeAuthController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PointageControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/conditions', [SettingController::class, 'conditions'])->name('settings.politique');


Route::get('/parametre', [SettingController::class, 'index'])->name('settings.index');
Route::post('/parametre', [SettingController::class, 'update'])->name('settings.update');



/*
|--------------------------------------------------------------------------
| Routes d'authentification
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('Auth');
})->name('login');

Route::post('/employe/authentification', [EmployeAuthController::class, 'authentification'])
    ->name('connexion');

Route::post('/employe/deconnexion', [EmployeAuthController::class, 'deconnexion'])
    ->name('deconnexion');

/*
|--------------------------------------------------------------------------
| Routes de gestion des employés
|--------------------------------------------------------------------------
*/

// Liste des employés
Route::get('/employe', [EmployeController::class, 'index'])
    ->name('employe.ShowEmploye');

// Créer un employé
Route::get('/employe/create', [EmployeController::class, 'create'])
    ->name('employe.create');

Route::post('/employe/store', [EmployeController::class, 'store'])
    ->name('employe.store');

// Voir les détails d'un employé
Route::get('/employe/{id}', [EmployeController::class, 'show'])
    ->name('employe.show');

// Modifier un employé
Route::get('/employe/{id}/edit', [EmployeController::class, 'edit'])
    ->name('employe.edit');

Route::put('/employe/{id}', [EmployeController::class, 'update'])
    ->name('employe.update');

// Supprimer un employé
Route::delete('/employe/{id}', [EmployeController::class, 'destroy'])
    ->name('employe.destroy');

// Mettre à jour le mot de passe
Route::put('/employe/{id}/password', [EmployeController::class, 'updatePassword'])
    ->name('employe.password.update');
/*
|--------------------------------------------------------------------------
| Routes de gestion des pointages
|--------------------------------------------------------------------------
*/

// Liste des pointages
Route::get('/pointage', [PointageControllers::class, 'index'])
    ->name('pointage.index');

// Pointer arrivée/départ
Route::post('/pointage/arrivee', [PointageControllers::class, 'pointerArrivee'])
    ->name('pointage.arrivee');

Route::post('/pointage/depart', [PointageControllers::class, 'pointerDepart'])
    ->name('pointage.depart');

// Marquer absent
Route::post('/pointage/{id}/absent', [PointageControllers::class, 'marquerAbsent'])
    ->name('pointage.absent');

// Voir les détails
Route::get('/pointage/{id}', [PointageControllers::class, 'show'])
    ->name('pointage.show');

// Modifier un pointage
Route::get('/pointage/{id}/edit', [PointageControllers::class, 'edit'])
    ->name('pointage.edit');

Route::put('/pointage/{id}', [PointageControllers::class, 'update'])
    ->name('pointage.update');

// Rapport
Route::get('/pointage/rapport', [PointageControllers::class, 'rapport'])
    ->name('pointage.rapport');
