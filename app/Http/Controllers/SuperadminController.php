<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Memoire;
use App\Models\Utilisateur;

use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    //affiche information utilisateur
    public function __construct()
    {
        view()->share('userInfo',
        [
            'nom' => Auth::check() ? Auth::user()->nom : '',
            'prenom' => Auth::check() ? Auth::user()->prenom : '',
            'statut' => Auth::check() ? Auth::user()->statut : '',
            'id' => Auth::check() ? Auth::user()->id : '',
            'password' => Auth::check() ? Auth::user()->password : '',
        ]);
    }

    public function ajoutadmin(){
        return view('superadmin/ajoutadmin');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'prenom' => 'required|max:50',
            'nom' => 'required|max:50',
            'email' => 'required|email|max:30|unique:utilisateurs,email',
            'password' => 'required|min:6',
            'numero' => 'required|min:9|max:15',
        ]);

        // Création de l'utilisateur avec le statut 'admin'
        Utilisateur::create([
            'prenom' => $validated['prenom'],
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Hashage du mot de passe
            'numero' => $validated['numero'],
            'statut' => 'admin', // Valeur du statut
        ]);

        // Redirection après la création
        return redirect()->route('superadmin')->with('success', 'Admin ajouté avec succès.');
    }

    //visualisation des utilisateurs
    public function visualiserInfos()
    {
        $totalEtudiants = Utilisateur::where('statut', 'etudiant')->count();
        $totalAdmins = Utilisateur::where('statut', 'admin')->count();
        $totalMemoiresValidés = Memoire::count();

        return view('superadmin.visualisation', [
            'totalEtudiants' => $totalEtudiants,
            'totalAdmins' => $totalAdmins,
            'totalMemoiresValidés' => $totalMemoiresValidés,
        ]);
    }

}
