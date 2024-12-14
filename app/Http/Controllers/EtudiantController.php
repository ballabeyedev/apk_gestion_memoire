<?php
namespace App\Http\Controllers;
use App\Models\Memoire;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EtudiantController extends Controller
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

    public function listememoire()
    {
        $memoires = Memoire::paginate(10); // Pagination de 2 utilisateurs par page
        return view('etudiant.listememoire', compact('memoires'));
    }

    public function rechercher(Request $request)
    {
        // Logique pour rechercher des mémoires
        return view('etudiant.rechercher');
    }

    public function telecharger($id)
    {
        // Logique pour télécharger une mémoire par son ID
    }

    public function soumettre()
    {
        // Affiche le formulaire de soumission
        return view('etudiant.soumettre');
    }

    public function traiterSoumission(Request $request)
    {
        // Logique pour traiter une soumission
    }

    public function evaluer(Request $request)
    {
        // Logique pour évaluer une mémoire
    }

    public function commentaire(Request $request)
    {
        // Logique pour laisser un commentaire
    }
}
