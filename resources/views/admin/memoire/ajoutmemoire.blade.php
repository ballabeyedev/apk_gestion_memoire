@extends('layouts.app')

@section('title', 'Accueil | ADMINISTRATEURS')

@section('content')
    <div class="password-change">
        <p>Pour des raisons de sécurité, veuillez <a href="{{ route('changepassword') }}">changer votre mot de passe</a> régulièrement.</p>
    </div>
    <div class="container1">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h1 class="balisse">ACCUEIL ADMINISTRATEURS / <br> Ajout Mémoire</h1><br>
        <form action="{{ route('admin.memoire.store1') }}" method="POST" enctype="multipart/form-data" class="formulaire">
            @csrf
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" placeholder="Titre du mémoire" value="{{ old('titre') }}">

            <label for="auteur">Auteur</label>
            <input type="text" name="auteur" id="auteur" placeholder="Nom de l'auteur" value="{{ old('auteur') }}">

            <label for="date_soutenance">Date de Soutenance</label>
            <input type="date" name="date_soutenance" id="date_soutenance" value="{{ old('date_soutenance') }}">

            <label for="filiere">Filière</label>
            <input type="text" name="filiere" id="filiere" placeholder="Filière du mémoire" value="{{ old('filiere') }}">

            <label for="pdf_path">Fichier PDF</label>
            <input type="file" name="pdf" id="pdf_path" accept=".pdf">
            @error('titre')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">AJOUTER LE MÉMOIRE</button>
        </form>
    </div>
@endsection
