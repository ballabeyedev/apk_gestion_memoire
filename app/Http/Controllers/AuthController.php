<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;

class AuthController extends Controller
{

    //redirectionnement vers la page de connexion
    public function login()
    {
        return view('auth.login');
    }

    //methode pour se deconnecter
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirection après déconnexion
    }

    //methode pour faire la redirection
    public function handlogin(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('utilisateur')->attempt($credentials)) {
            $user = Auth::guard('utilisateur')->user();

            switch ($user->statut) {
                case 'admin':
                    return redirect()->route('admin');
                case 'etudiant':
                    return redirect()->route('etudiant');
                    case 'superadmin':
                        return redirect()->route('superadmin');
                default:
                    return redirect()->back()->with('error_msg', "Rôle utilisateur non reconnu : {$user->statut}");
            }
        } else {
            return redirect()->back()->with('error_msg', 'Identifiant ou mot de passe incorrect');
        }
    }



}

