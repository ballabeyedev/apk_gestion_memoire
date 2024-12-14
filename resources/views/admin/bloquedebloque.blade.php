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
    <div class="container1">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h1 class="balisse">ACCEUIL ADMINISTRATEURS / <br> Bloquer-Debloquer Etudiant</h1><br>
        <table class="modifsupp">
            <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Numero</th>
                    <th>Statut</th>
                    <th>Etat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->prenom }}</td>
                    <td>{{ $utilisateur->nom }}</td>
                    <td>{{ $utilisateur->email }}</td>
                    <td>{{ $utilisateur->numero }}</td>
                    <td>{{ $utilisateur->statut }}</td>
                    <td>{{ $utilisateur->etat }}</td>
                    <td>
                        <!-- Action Bloquer -->
                        <a href="{{ route('admin.bloque', $utilisateur->id) }}">
                            <i class="fas fa-lock"></i> Bloquer
                        </a> <br>

                        <!-- Action Débloquer -->
                        <a href="{{ route('admin.debloque', $utilisateur->id) }}">
                            <i class="fas fa-unlock"></i> Débloquer
                        </a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
