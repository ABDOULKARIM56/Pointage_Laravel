<?php

use App\Http\Controllers\CongeControllers;
use App\Http\Controllers\EmployeAuthController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PointageControllers;
use App\Http\Controllers\DepartementControllers;
use App\Http\Controllers\Details;
use App\Http\Controllers\PermissionControllers;
use App\Http\Controllers\ServiceControllers;
use App\Models\Permission;
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
// Page d'accueil ou formulaire de connexion
Route::get('/', [EmployeAuthController::class, 'showLoginForm'])->name('login');

// Connexion (POST)
Route::post('/employe/authentification', [EmployeAuthController::class, 'authentification'])->name('connexion');

// Déconnexion (POST)
Route::post('/employe/deconnexion', [EmployeAuthController::class, 'deconnexion'])->name('deconnexion');

// Tableau de bord (route protégée)
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth'); // protège la page par l'auth


 Route::get('/', function () {
    return view('Auth');
});

//  Route::get('/detail/detail/{detail}', function () {
//     return view('detail.detail');
// });
// detail
Route::get('/detail/detail/{detail}/{model}', action: [Details::class, 'show_depart'])->name('detail');



// departement
Route::get('/departement/showdepartement', [DepartementControllers::class, 'index'])->name('show_departement');
Route::get('/departement/create', [DepartementControllers::class, 'create'])->name('create_depart');
Route::post('/departement/storedepartement', [DepartementControllers::class, 'store'])->name('ajouter_departement');

Route::get('/departement/edit/{id}', [DepartementControllers::class, 'edit'])->name('edit_depart');
Route::post('/departement/updatedepartement/{id}', [DepartementControllers::class, 'update'])->name('modification_depart');
Route::post('/departement/deletedepartement/{id}', [DepartementControllers::class, 'destroy'])->name('suppression_depart');


Route::get('/permission/permission', [DashboardController::class, 'index_permission'])->name('permission');
Route::get('/departement/departement', [DashboardController::class, 'index_departement'])->name('departement');
Route::get('/conge/conge', [DashboardController::class, 'index_conge'])->name('conge');
Route::get('/service/service', [DashboardController::class, 'index_service'])->name('service');

// service
Route::get('/service/showservice', [ServiceControllers::class, 'index'])->name('show_service');
Route::get('/service/create', [ServiceControllers::class, 'create'])->name('create_servi');
Route::post('/service/storeservice', [ServiceControllers::class, 'store'])->name('ajouter_service');

Route::get('/service/edit/{service}', [ServiceControllers::class, 'edit'])->name('edit_servi');
Route::post('/service/updatedepartement/{service}', [ServiceControllers::class, 'update'])->name('modification_servi');
Route::post('/service/deletedepartement/{service}', [ServiceControllers::class, 'destroy'])->name('suppression_servi');

// permission
Route::get('/permission/showpermission', [PermissionControllers::class, 'index'])->name('show_permission');
Route::get('/permission/create', [PermissionControllers::class, 'create'])->name('create_permi');
Route::post('/permission/storepermission', [PermissionControllers::class, 'store'])->name('ajouter_permission');

Route::get('/permission/edit/{id}', [PermissionControllers::class, 'edit'])->name('edit_permi');
Route::post('/permission/updatepermission/{id}', [PermissionControllers::class, 'update'])->name('modification_permi');
Route::post('/permission/deletepermission/{id}', [PermissionControllers::class, 'destroy'])->name('suppression_permi');

// congés
Route::get('/conge/showconge', [CongeControllers::class, 'index'])->name('show_conge');
Route::get('/conge/create', [CongeControllers::class, 'create'])->name('create_cong');
Route::post('/conge/storeconge', [CongeControllers::class, 'store'])->name('ajouter_conge');
Route::get('/conge/edit/{id}', [CongeControllers::class, 'edit'])->name('edit_cong');
Route::post('/conge/updateconge/{id}', [CongeControllers::class, 'update'])->name('modification_cong');
Route::post('/conge/deleteconge/{id}', [CongeControllers::class, 'destroy'])->name('suppression_cong');

//  <a href="{{ route('students.index') }}" class="bg-gray-600 text-white px-3 py-2 rounded mb-4 inline-block">Retour à la liste</a>

//     @if ($errors->any())
//         <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
//             <ul>
//                 @foreach ($errors->all() as $error)
//                     <li>- {{ $error }}</li>
//                 @endforeach
//             </ul>
//         </div>
/*<<<<<<< HEAD
//     @endif
=======
//     @endif


>>>>>>> 54f3c47698fb9e7d3d6121895b2d6822e7fdcbe2
