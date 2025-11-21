<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeAuthController extends Controller
{
   public function showLoginForm()
    {
        return view('auth'); // resources/views/auth.blade.php
    }

    // 🔹 Afficher la liste des étudiants avec filtre par nom
    public function authentification(Request $request)
    {
        $employe = new \App\Models\Employe();
        $employe->nom = 'Aziz';
        $employe->prenom = 'Abdoul';
        $employe->matricule = 'TMP002';
        $employe->email = 'aziz@example.com';
        $employe->password = Hash::make('1234567890');
        $employe->service_id = 1;
        $employe->nationnalite = 'Nigerien';
        $employe->genre = 'Masculin';
        $employe->etat_civil = 'Célibataire';
        $employe->numero = '1234567890';
        $employe->adresse = 'Niamey';
        $employe->role = 'Employé';
        $employe->date_naissance = '1997-01-01';
        $employe->save();

        //connexion

    // Traite la connexion
   
 
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Connexion réussie → redirection vers /dashboard
        return redirect()->route('dashboard');
    }

    // Si échec
    return back()->withErrors([
        'email' => 'Identifiants incorrects.',
    ])->withInput();
}



    /*  public function deconnexion(Request $request)
    {
        return view('/employe/authentification', compact('user'));
       // $user = Auth::user();
    if (Auth::attempt(['email'=> $request->email,'password'=> $request->password])) {       
    // deconnexion
    
    Auth::logout();
    }
   
    } */



    // app/Http/Controllers/EmployeAuthController.php

public function deconnexion(Request $request)
{
    // 1. Déconnexion : Démarrage du processus de déconnexion.
    // Auth::guard('employe')->logout(); // Utilisez 'employe' si vous avez une garde dédiée

    // Pour l'exemple, nous utilisons la déconnexion par défaut si la garde n'est pas spécifiée
    Auth::logout(); 

    // 2. Invalide la session actuelle
    $request->session()->invalidate();

    // 3. Regénère le jeton CSRF
    $request->session()->regenerateToken();

    // 4. Redirige vers la page de connexion ou la page d'accueil (avec un message flash si vous voulez)
    return redirect()->route('connexion'); // Remplacez 'login' par le nom de la route qui affiche votre formulaire d'authentification
}


}
