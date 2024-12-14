@extends('layouts.app')

@section('title', 'Accueil | SUPERADMINISTRATEURS')

@section('content')
    <div class="password-change">
        <p>Pour des raisons de sécurité, veuillez <a href="{{ route('changepassword') }}">changer votre mot de passe</a> régulièrement.</p>
    </div>
    <div class="container1">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h1 class="balisse">ACCUEIL SUPERADMINISTRATEURS / <br> Visualisation Utilisateur et Memoire</h1><br>

        <div class="stats">
            <p>Nombre d'étudiants : <strong>{{ $totalEtudiants }}</strong></p>
            <p>Nombre d'administrateurs : <strong>{{ $totalAdmins }}</strong></p>
            <p>Nombre de mémoires validés : <strong>{{ $totalMemoiresValidés }}</strong></p>
        </div>
    </div>
@endsection
