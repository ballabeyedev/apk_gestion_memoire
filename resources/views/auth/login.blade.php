<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Bibliothèque</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="login-container">
        <h2>Se connecter</h2>
        <form action="{{ route('handlogin') }}" method="POST">
            @csrf

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
                @error('email')
                    <p class="invalid-feedback">{{ $message}}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            @if (Session::get('error_msg'))
                    <div class="alert alert-danger">
                        <b style="font-size:15px; color: red;">{{ Session::get('error_msg') }}</b>
                    </div>
            @endif
            @if (Session::get('debug_info'))
                <div class="alert alert-warning">
                    <b>Debug Info:</b> {{ Session::get('debug_info') }}
                </div>
            @endif

            <button type="submit" class="btn">Se connecter</button>
        </form>
    </div>
</body>
</html>
