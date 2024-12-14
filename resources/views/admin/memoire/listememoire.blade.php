@extends('layouts.app')

@section('title', 'Acceuil | ADMINISTRATEURS')

@section('content')
    <div class="password-change">
        <p>Pour des raisons de sécurité, veuillez <a href="{{ route('changepassword') }}">changer votre mot de passe</a> régulièrement.</p>
    </div>
    <div class="container1">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h1 class="balisse">ACCEUIL ADMINISTRATEURS / <br> Liste Memoires</h1><br>
        <table class="modifsupp">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date de Soutenance</th>
                    <th>Filiere</th>
                    <th>Fichier PDF</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memoires as $memoire)
                <tr>
                    <td>{{ $memoire->titre }}</td>
                    <td>{{ $memoire->auteur }}</td>
                    <td>{{ $memoire->date }}</td>
                    <td>{{ $memoire->filiere }}</td>
                    <td>{{ $memoire->pdf_path }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
