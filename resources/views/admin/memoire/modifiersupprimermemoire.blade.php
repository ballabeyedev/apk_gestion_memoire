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
        <h1 class="balisse">ACCEUIL ADMINISTRATEURS / <br> Modifier-Supprimer Memoire</h1><br>
        <table class="modifsupp">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date Soutenance</th>
                    <th>Filiere</th>
                    <th>Fichier pdf</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memoires as $memoire)
                <tr>
                    <td>{{ $memoire->titre }}</td>
                    <td>{{ $memoire->auteur }}</td>
                    <td>{{ $memoire->date_soutenance }}</td>
                    <td>{{ $memoire->filiere }}</td>
                    <td>
                        <a href="{{ asset('storage/pdf/'.$memoire->pdf_path) }}" target="_blank">Voir le PDF</a>

                    </td>

                    <td>
                        <a href="{{ route('admin.memoire.modifiermemoire', $memoire->id) }}">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <form action="{{ route('admin.memoire.supprimermemoire', $memoire->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')" class="supprimer">
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
