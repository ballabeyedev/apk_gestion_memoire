@extends('layouts.app')

@section('title', 'Changer le mots de pasword')

@section('content')
<div class="container">
    <h1 class="texte12">Modifier Mots de passe</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update.password') }}" method="POST">
        @csrf
        <input type="text" name="id" style="display:none;" value="{{ $userInfo['id'] }}">

        <div class="form-group1">
            <label for="current-password">Ancien mot de passe</label>
            <input type="password" class="form-control" id="current-password" name="current_password" placeholder="Entrez votre ancien mot de passe" required>
        </div>

        <div class="form-group2">
            <label for="new-password">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="new-password" name="new_password" placeholder="Entrez un nouveau mot de passe" required>
        </div>

        <button type="submit" class="btn btn-primary1">MODIFIER</button>
    </form>
</div>
@endsection
