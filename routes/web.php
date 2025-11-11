<?php

use App\Http\Controllers\EmployeAuthController;
use Illuminate\Support\Facades\Route;

 Route::get('/', function () {
    return view('Auth');
});
 

Route::post('/employe/authentification', [EmployeAuthController::class, 'authentification'])->name('connexion');
Route::post('/employe/deconnexion', [EmployeAuthController::class, 'deconnexion'])->name('deconnexion');
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