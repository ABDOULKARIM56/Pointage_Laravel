<?php

/*use App\Http\Controllers\EmployeAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeControlles;

 Route::get('/', function () {
    return view('Auth');
});
 

Route::post('/employe/authentification', [EmployeAuthController::class, 'authentification'])->name('connexion');
Route::post('/employe/deconnexion', [EmployeAuthController::class, 'deconnexion'])->name('deconnexion');

Route::get('/employe', [EmployeControlles::class, 'index'])->name('employe.ShowEmploye');
Route::get('/employe/create', [EmployeControlles::class, 'create'])->name('employe.create');
Route::post('/employe/store', [EmployeControlles::class, 'store'])->name('employe.store');
Route::get('/employe/{id}/edit', [EmployeControlles::class, 'edit'])->name('employe.edit');
Route::put('/employe/{id}', [EmployeControlles::class, 'update'])->name('employe.update');
Route::delete('/employe/{id}', [EmployeControlles::class, 'destroy'])->name('employe.destroy');*/



use App\Http\Controllers\EmployeAuthController;
use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;

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

