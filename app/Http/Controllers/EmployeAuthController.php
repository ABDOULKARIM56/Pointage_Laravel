<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeAuthController extends Controller
{

    // 🔹 Afficher la liste des étudiants avec filtre par nom
    public function authentification(Request $request)
    {
        // $employe = new \App\Models\Employe();
        // $employe->nom = 'Kader';
        // $employe->prenom = 'Abdoul';
        // $employe->matricule = 'EMP002';
        // $employe->email = 'kader@example.com';
        // $employe->password = Hash::make('12345678');
        // $employe->service_id = 1;
        // $employe->nationnalite = 'Nigerien';
        // $employe->genre = 'Masculin';
        // $employe->etat_civil = 'Célibataire';
        // $employe->numero = '1234567890';
        // $employe->adresse = 'Niamey';
        // $employe->role = 'Employé';
        // $employe->date_naissance = '1997-01-01';
        // $employe->save();

        //connexion
    $user = Auth::user();
        
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return view('Acceuille', compact('user'));
        // return response()->json(['message' => 'Connecté', 'employe' => $user]);
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
