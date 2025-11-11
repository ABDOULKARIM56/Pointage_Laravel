<?php

use App\Http\Controllers\EmployeAuthController;
use App\Http\Controllers\DepartementControllers;
use Illuminate\Support\Facades\Route;

 Route::get('/', function () {
    return view('Auth');
});
 
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