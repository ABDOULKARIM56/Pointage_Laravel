<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EmployeAuthController extends Controller
{

    // 🔹 Afficher la liste des étudiants avec filtre par nom
    public function authentification(Request $request)
    {
        $user = Auth::user();
         //
        //connexion
    $user = Auth::user();
        
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $employe = Auth::user();
        return response()->json(['message' => 'Connecté', 'employe' => $employe]);
    } else {
        return response()->json(['error' => 'Identifiants incorrects'], 401);
    }
    }


     public function deconnexion(Request $request)
    {
        $user = Auth::user();
    if (Auth::attempt(['email'=> $request->email,'password'=> $request->password])) {       
    // deconnexion
    Auth::logout();
    }
   
}}
