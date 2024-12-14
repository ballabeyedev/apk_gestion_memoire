@extends('layouts.app')

@section('title', 'Acceuil | ADMINISTRATEURS')

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
        <h1 class="balisse">ACCEUIL ADMINISTRATEURS</h1><br>
        <ul class="nav-links">
            <li><a href="{{route('admin.ajoutetudiant')}}"><i class="fas fa-user-plus"></i> Ajouter un Étudiant</a></li>
            <li><a href="{{route('admin.modifiersupprimer')}}"><i class="fas fa-user-edit"></i> Modifier/Supprimer un Étudiant</a></li>
            <li><a href="{{route('admin.listeetudiant')}}"><i class="fas fa-users"></i> Voir liste Étudiant (Filtrer-Trier)</a></li>
            <li><a href="{{route('admin.bloquedebloque')}}"><i class="fas fa-user-lock"></i> Bloquer/Débloquer un Étudiant</a></li>
            <li><a href="{{route('admin.memoire.ajoutmemoire')}}"><i class="fas fa-book"></i> Ajouter une Mémoire</a></li>
            <li><a href="{{route('admin.memoire.modifsuppmemoire')}}"><i class="fas fa-edit"></i> Modifier/Supprimer une Mémoire</a></li>
            <li><a href="{{route('admin.memoire.listememoire')}}"><i class="fas fa-users"></i> Voir liste Mmemoire (Filtrer-Trier)</a></li>
            <li><a href=""><i class="fas fa-search"></i> Rechercher une Mémoire</a></li>
        </ul>

        <div class="img_admin"><img src="{{asset('img/admin.jpg')}}" alt=""></div>
    </div>
@endsection
