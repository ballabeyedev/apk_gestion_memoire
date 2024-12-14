@extends('layouts.app')

@section('title', 'Accueil | SUPERADMINISTRATEURS')

@section('content')
    <div class="password-change">
        <p>Pour des raisons de sécurité, veuillez <a href="{{ route('changepassword') }}">changer votre mot de passe</a> régulièrement.</p>
    </div>
    <div class="container1">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h1 class="balisse">ACCUEIL SUPERADMINISTRATEURS / <br> Ajout Administrateur</h1><br>
        <form action="{{ route('superadmin.store') }}" method="POST" enctype="multipart/form-data" class="formulaire">
            @csrf
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom de l'administrateur" value="{{ old('prenom') }}" required>

            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Nom de l'administrateur" value="{{ old('nom') }}" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email de l'administrateur" value="{{ old('email') }}" required>

            <label for="password">Mot de Passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe de l'administrateur" value="{{ old('password') }}" required>

            <label for="numero">Numéro de Téléphone</label>
            <input type="number" name="numero" id="numero" placeholder="Contact de l'administrateur" value="{{ old('numero') }}" required>

            <button type="submit" class="btn btn-primary">AJOUTER UN ADMINISTRATEUR</button>
        </form>
    </div>
@endsection
