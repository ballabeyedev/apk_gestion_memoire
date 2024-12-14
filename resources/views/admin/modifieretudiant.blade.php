@extends('layouts.app')

@section('title', 'Accueil | ADMINISTRATEURS')

@section('content')
    <div class="password-change">
        <p>Pour des raisons de sécurité, veuillez <a href="{{ route('changepassword') }}">changer votre mot de passe</a> régulièrement.</p>
    </div>
    <div class="container1">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h1 class="balisse">ACCUEIL ADMINISTRATEURS / <br> Modifier Étudiant</h1><br>
        <form action="{{ route('update.traitement') }}" method="POST" class="formulaire">
            @csrf
            <input type="hidden" name="id" value="{{ $utilisateur->id }}">

            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $utilisateur->prenom }}" required>

            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $utilisateur->nom }}" required>

            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $utilisateur->email }}" required>

            <label for="numero">Numéro:</label>
            <input type="text" class="form-control" id="numero" name="numero" value="{{ $utilisateur->numero }}" required>

            <label for="statut">Statut:</label>
            <input type="text" class="form-control" id="statut" name="statut" value="{{ $utilisateur->statut }}">

            <button type="submit" class="btn btn-primary">Modifier l'étudiant</button>
        </form>
    </div>
@endsection
