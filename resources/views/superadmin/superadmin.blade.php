@extends('layouts.app')

@section('title', 'Accueil | SUPERADMINISTRATEUR')

@section('content')
    <div class="password-change">
        <p>Pour des raisons de sécurité, veuillez <a href="{{ route('changepassword') }}">changer votre mot de passe</a> régulièrement.</p>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container">
        <a href="javascript:history.go(-1)">RETOUR</a><br><br>
        <h1 class="balisse">ACCUEIL SUPERADMINISTRATEUR</h1><br>
        <ul class="nav-links">
            <li><a href="{{ route('superadmin.ajoutadmin') }}"><i class="fas fa-user-plus"></i> Ajouter un Administrateur</a></li>
            <li><a href="{{ route('superadmin.visualiserinfos') }}"><i class="fas fa-eye"></i> Visualisation des Informations</a></li>
            <li><a href="{{ route('superadmin.envoyernotifications') }}"><i class="fas fa-bell"></i> Envoyer des Notifications</a></li>
            <li><a href="{{ route('superadmin.historiquenotifications') }}"><i class="fas fa-history"></i> Historique des Notifications</a></li>
            <li><a href="{{ route('superadmin.actionsutilisateurs') }}"><i class="fas fa-tasks"></i> Actions effectuées par les utilisateurs (Admin-Etudiant)</a></li>
        </ul>

    </div>
@endsection
