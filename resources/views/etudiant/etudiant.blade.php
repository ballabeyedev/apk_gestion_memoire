@extends('layouts.app')

@section('title', 'Acceuil | ADMINISTRATEURS')

@section('content')
    <div class="password-change">
        <p>Pour des raisons de sécurité, veuillez <a href="../admin/change_password.php">changer votre mot de passe</a> régulièrement.</p>
    </div>
    <div class="container">
        <a href="javascript:history.go(-1)">RETOUR</a><br><br>
        <h1 class="balisse">ACCEUIL ETUDIANTS</h1><br>
        <ul class="nav-links">
            <li><a href="{{route('etudiant.listememoire')}}"><i class="fas fa-book-open"></i> Consulter Mémoires Disponibles</a></li>
            <li><a href="{{route('etudiant.rechercher')}}"><i class="fas fa-search"></i> Rechercher Mémoires par Thème et Domaine</a></li>
            <li><a href=""><i class="fas fa-download"></i> Télécharger Mémoire</a></li>
            <li><a href="{{route('etudiant.soumettre')}}"><i class="fas fa-file-upload"></i> Soumettre une Mémoire</a></li>
            <li><a href="{{route('etudiant.evaluer')}}"><i class="fas fa-star"></i> Évaluer une Mémoire</a></li>
            <li><a href="{{route('etudiant.commentaire')}}"><i class="fas fa-comments"></i> Laisser un Commentaire</a></li>
        </ul>

        <div class="img_admin"><img src="{{asset('img/etudiant.jpg')}}" alt=""></div>
    </div>
@endsection
