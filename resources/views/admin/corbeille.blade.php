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
        <h1 class="balisse">ACCEUIL ADMINISTRATEURS / <br> Restaurer ou Supprimer definitivement etudiant</h1><br>
        <table class="modifsupp">
            <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Numero</th>
                    <th>Statut</th>
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
                    <td>
                        <form action="{{ route('admin.restore', $utilisateur->id) }}" method="POST" class="supprimer">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm" id="parfait">Restaurer</button>
                        </form>
                        <form action="{{ route('admin.forceDelete', $utilisateur->id) }}" method="POST" class="supprimer">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer définitivement</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
