@extends('layouts.app')

@section('title', 'Acceuil | ADMINISTRATEURS')

@section('content')
    <div class="password-change">
        <p>Pour des raisons de sécurité, veuillez <a href="{{ route('changepassword') }}">changer votre mot de passe</a> régulièrement.</p>
    </div>
    <div class="container1">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h1 class="balisse">ACCEUIL ADMINISTRATEURS / <br> Ajout Etudiant</h1><br>
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="formulaire">
            @csrf
            <label for="titre">Prenom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Prenom de l'etudiant" value="{{ old('prenom') }}">

            <label for="auteur">Nom</label>
            <input type="text" name="nom"  id="nom" placeholder="Nom de l'etudiant" value="{{ old('nom') }}">

            <label for="genre">Email</label>
            <input type="email" name="email" id="email" placeholder="Email de l'etudiant" value="{{ old('email') }}">

            <label for="annee_publication">Mot de Passe</label>
            <input type="password" name="password"  id="password" placeholder="Password Etudiant" value="{{ old('password') }}">

            <label for="logo">Numero Telephone</label>
            <input type="number" name="numero"  id="numero" placeholder="Contact Etudiant" value="{{ old('numero') }}">
            <button type="submit" class="btn btn-primary">AJOUTER UN ETUDIANT</button>
        </form>
    </div>
@endsection
