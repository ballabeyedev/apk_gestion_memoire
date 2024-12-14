@extends('layouts.app')

@section('title', 'Accueil | ADMINISTRATEURS')

@section('content')
    <div class="password-change">
        <p>Pour des raisons de sécurité, veuillez <a href="{{ route('changepassword') }}">changer votre mot de passe</a> régulièrement.</p>
    </div>
    <div class="container1">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h1 class="balisse">ACCUEIL ADMINISTRATEURS / <br> Modifier Memoire</h1><br>
        <form action="{{ route('admin.memoire.traitement1') }}" method="POST" class="formulaire">
            @csrf
            <input type="hidden" name="id" value="{{ $memoires->id }}">

            <label for="titre">Titre:</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $memoires->titre }}" required>

            <label for="auteur">Auteur:</label>
            <input type="text" class="form-control" id="auteur" name="auteur" value="{{ $memoires->auteur }}" required>

            <label for="date_soutenance">Date Soutenance:</label>
            <input type="date" class="form-control" id="date_soutenance" name="date_soutenance" value="{{ $memoires->date_soutenance }}" required>

            <label for="filiere">Filiere:</label>
            <input type="text" class="form-control" id="filiere" name="filiere" value="{{ $memoires->filiere }}" required>

            <button type="submit" class="btn btn-primary">Modifier Memoire</button>
        </form>
    </div>
@endsection
