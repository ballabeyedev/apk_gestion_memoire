<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Utilisateur; // Ajoutez cette ligne pour importer le modèle
use Illuminate\Support\Facades\Hash;


class AppController extends Controller
{
    //redirection vers la page admin
    public function admin(){
        return view('admin/admin');
    }

    //redirection vers la page etudiant
    public function etudiant(){
        return view('etudiant/etudiant');
    }

    //redirection vers la page superadmin
    public function superadmin(){
        return view('superadmin/superadmin');
    }

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

    public function changepassword(){
        return view('security/changepassword');
    }

    public function updatePassword(Request $request)
    {
        // Validation des champs
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
        ]);

        // Récupérer l'utilisateur
        $user = Utilisateur::find($request->id);

        // Vérifier si le mot de passe actuel est correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'L’ancien mot de passe est incorrect.']);
        }

        // Mettre à jour avec le nouveau mot de passe (haché)
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Rediriger avec un message de succès
        return back()->with('success', 'Mot de passe mis à jour avec succès !');
    }
}
