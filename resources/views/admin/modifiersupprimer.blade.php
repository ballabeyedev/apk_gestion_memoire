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
        <h1 class="balisse">ACCEUIL ADMINISTRATEURS / <br> Modifier-Supprimer Etudiant</h1><br>
        <a href="{{ route('admin.corbeille') }}" class="corbeille-link">
            CORBEILLE <i class="fas fa-trash-alt" title="Corbeille"></i>
        </a>

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
                        <a href="{{ route('admin.modifieretudiant', $utilisateur->id) }}">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <form action="{{ route('admin.destroy', $utilisateur->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')" class="supprimer">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Supprimer
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
