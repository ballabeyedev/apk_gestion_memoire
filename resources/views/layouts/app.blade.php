<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ajoutetudiant.css') }}">
    <link rel="stylesheet" href="{{ asset('css/changepassword.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modifsupp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/supprimer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visual.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fermer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>@yield('title')</title>
    @stack('styles')
</head>
<body>
    @include('headerfooter/header')

    <div class="content">
        @yield('content')
    </div>
    <br><br><br><br>

    @include('headerfooter/footer')

    @stack('scripts')
</body>
</html>
