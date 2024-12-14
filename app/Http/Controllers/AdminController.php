<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;
use App\Models\Memoire;



use Illuminate\Http\Request;
use Illuminate\Http\Middleware;

class AdminController extends Controller
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

    public function ajoutetudiant(){
        return view('admin/ajoutetudiant');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'prenom' => 'required|max:50',
            'nom' => 'required|max:50',
            'email' => 'required|max:30',
            'password' => 'required',
            'numero' => 'required|min:9',
        ]);

        // Création de l'utilisateur
        Utilisateur::create([
            'prenom' => $validated['prenom'],
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Hashage du mot de passe
            'numero' => $validated['numero'],
        ]);

        // Redirection après la création
        return redirect()->route('admin')->with('success', 'Etudiant ajouté avec succès.');
    }


    public function modifsupp()
    {
        $utilisateurs = Utilisateur::where('statut', 'etudiant')->paginate(10);
        return view('admin.modifiersupprimer', compact('utilisateurs'));
    }

    // Méthode pour afficher la corbeille
    public function corbeille()
    {
        $utilisateurs = Utilisateur::onlyTrashed()->get();
        return view('admin.corbeille', compact('utilisateurs'));
    }

    // Méthode pour restaurer un étudiant
    public function restore($id)
    {
        $utilisateur = Utilisateur::onlyTrashed()->findOrFail($id);
        $utilisateur->restore();
        return redirect()->route('admin.modifiersupprimer')->with('success', 'Étudiant restauré avec succès.');
    }

    // Méthode pour supprimer définitivement un étudiant
    public function forceDelete($id)
    {
        $utilisateur = Utilisateur::onlyTrashed()->findOrFail($id);
        $utilisateur->forceDelete();
        return redirect()->route('admin.modifiersupprimer')->with('success', 'Étudiant supprimé définitivement.');
    }

    // Méthode pour supprimer avec soft delete
    public function destroy($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();
        return redirect()->route('admin.modifiersupprimer')->with('success', 'Étudiant supprimé (corbeille).');
    }


    // public function supprimer($id)
    // {
    //     $utilisateur = Utilisateur::find($id);
    //     if ($utilisateur) {
    //         $utilisateur->delete();
    //         return redirect()->route('admin.modifiersupprimer')->with('success', 'Étudiant supprimé avec succès.');
    //     } else {
    //         return redirect()->route('admin.modifiersupprimer')->with('error', 'Étudiant introuvable.');
    //     }
    // }


    public function modifier($id){
        $utilisateur = Utilisateur::find($id);
        return view('admin.modifieretudiant', compact('utilisateur'));
    }

    public function traitement(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'prenom' => 'required|max:50',
            'nom' => 'required|max:50',
            'email' => 'required|email|max:50',
            'numero' => 'required|min:9',
            'statut' => 'nullable|max:30',  // Assurez-vous que 'statut' est le champ exact de votre base de données
        ]);

        // Trouver l'étudiant à mettre à jour
        $utilisateur = Utilisateur::find($request->id);

        if (!$utilisateur) {
            return redirect()->route('admin.modifiersupprimer')->with('error', 'Utilisateur introuvable.');
        }

        // Mettre à jour les données de l'utilisateur
        $utilisateur->update([
            'prenom' => $validated['prenom'],
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'numero' => $validated['numero'],
            'statut' => $validated['statut'] ?? $utilisateur->statut, // Utiliser la valeur actuelle si 'statut' est absent
        ]);

        // Redirection après la mise à jour
        return redirect()->route('admin.modifiersupprimer')->with('success', 'Étudiant modifié avec succès.');
    }


    public function listeetudiant()
    {
        $utilisateurs = Utilisateur::where('statut', 'etudiant')->paginate(10); // Pagination de 2 utilisateurs par page
        return view('admin.listeetudiant', compact('utilisateurs'));
    }

    public function bloquedebloque()
    {
        $utilisateurs = Utilisateur::where('statut', 'etudiant')->paginate(10); // Pagination de 2 utilisateurs par page
        return view('admin.bloquedebloque', compact('utilisateurs'));
    }

    //methode pour bloquer
    public function bloque($id)
    {
        $utilisateur = Utilisateur::find($id);
        if ($utilisateur) {
            $utilisateur->etat = "bloquer"; // Bloquer l'utilisateur
            $utilisateur->save();
            return redirect()->route('admin.bloquedebloque')->with('success', 'Etudiant bloqué avec succès.');
        } else {
            return redirect()->route('admin.bloquedebloque')->with('error', 'Etudiant introuvable.');
        }
    }

    //methode pour debloquer
    public function debloque($id)
    {
        $utilisateur = Utilisateur::find($id);
        if ($utilisateur) {
            $utilisateur->etat = "debloquer"; // Débloquer l'utilisateur
            $utilisateur->save();
            return redirect()->route('admin.bloquedebloque')->with('success', 'Etudiant débloqué avec succès.');
        } else {
            return redirect()->route('admin.bloquedebloque')->with('error', 'Etudiant introuvable.');
        }
    }



    public function ajoutememoire(){
        return view('admin/memoire/ajoutmemoire');
    }

    public function store1(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'titre' => 'required|max:100',
            'auteur' => 'required|max:100',
            'date_soutenance' => 'required|date',
            'filiere' => 'required|max:100',
        ]);

        // Si un fichier PDF est téléchargé, le valider et le stocker
        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $request->validate([
                'pdf' => 'required|file|mimes:pdf|max:7048',
            ]);
            $pdfPath = $request->file('pdf')->store('fichier_pdf', 'public');
        }

        // Création de l'utilisateur
        Memoire::create([
            'titre' => $validated['titre'],
            'auteur' => $validated['auteur'],
            'date_soutenance' => $validated['date_soutenance'],
            'filiere' => $validated['filiere'],
            'pdf_path' => $pdfPath,
        ]);

        // Redirection après la création
        return redirect()->route('admin')->with('success', 'Mémoire ajouté avec succès.');
    }



    public function modifsuppmemoire()
    {
        $memoires = Memoire::paginate(10); // Pagination de 10 mémoires par page
        return view('admin.memoire.modifiersupprimermemoire', compact('memoires'));
    }



    public function supprimermemoire($id)
    {
        // Trouver le mémoire par son ID
        $memoire = Memoire::find($id);

        // Vérifier si le mémoire existe avant de le supprimer
        if ($memoire) {
            $memoire->delete();
            return redirect()->route('admin.memoire.modifsuppmemoire')->with('success', 'Mémoire supprimé avec succès.');
        } else {
            return redirect()->route('admin.memoire.modifsuppmemoire')->with('error', 'Mémoire non trouvé.');
        }
    }


    public function modifiermemoire($id){
        $memoires = Memoire::find($id);
        return view('admin.memoire.modifiermemoire', compact('memoires'));
    }

    public function traitement1(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'titre' => 'required|max:50',
            'auteur' => 'required|max:50',
            'date_soutenance' => 'required|date',
            'filiere' => 'required|max:30',
        ]);

        // Trouver l'etudiant à mettre à jour
        $memoire = Memoire::find($request->id);

        // Mettre à jour les données du mémoire
        $memoire->update([
            'titre' => $validated['titre'],
            'auteur' => $validated['auteur'],
            'date_soutenance' => $validated['date_soutenance'],
            'filiere' => $validated['filiere'],
        ]);

        // Redirection après la mise à jour
        return redirect()->route('admin.memoire.modifsuppmemoire')->with('success', 'Mémoire modifié avec succès.');
    }


    public function listememoire()
    {
        $memoires = Memoire::paginate(10); // Pagination de 2 utilisateurs par page
        return view('admin.memoire.listememoire', compact('memoires'));
    }

}
