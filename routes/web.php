<?php

use App\Http\Controllers\CongeControllers;
use App\Http\Controllers\EmployeAuthController;
use App\Http\Controllers\DepartementControllers;
use App\Http\Controllers\Details;
use App\Http\Controllers\PermissionControllers;
use App\Http\Controllers\ServiceControllers;
use Illuminate\Support\Facades\Route;

 Route::get('/', function () {
    return view('Auth');
});

//  Route::get('/detail/detail/{detail}', function () {
//     return view('detail.detail');
// });
// detail
Route::get('/detail/detail/{detail}/{model}', action: [Details::class, 'show_depart'])->name('detail');


// authentification
Route::post('/employe/authentification', [EmployeAuthController::class, 'authentification'])->name('connexion');

Route::post('/employe/deconnexion', [EmployeAuthController::class, 'deconnexion'])->name('deconnexion');

// departement
Route::get('/departement/showdepartement', [DepartementControllers::class, 'index'])->name('show_departement');
Route::get('/departement/create', [DepartementControllers::class, 'create'])->name('create_depart');
Route::post('/departement/storedepartement', [DepartementControllers::class, 'store'])->name('ajouter_departement');

Route::get('/departement/edit/{id}', [DepartementControllers::class, 'edit'])->name('edit_depart');
Route::post('/departement/updatedepartement/{id}', [DepartementControllers::class, 'update'])->name('modification_depart');
Route::post('/departement/deletedepartement/{id}', [DepartementControllers::class, 'destroy'])->name('suppression_depart');



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

// permission
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
//     @endif 

