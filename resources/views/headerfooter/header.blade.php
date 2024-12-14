<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title></title>
</head>
<body>
    <div class="entete">
        <div class="localite">
            <span><i class="fas fa-map-marker-alt"></i> &nbsp; Senegal, Dakar</span>
        </div>
        <div class="contact">
            <span><i class="fas fa-phone"></i> &nbsp; +221 77-000-00-00</span>
        </div>
        <div class="mail">
            <span><i class="fas fa-envelope"></i> &nbsp; ecolesuperieur.formstion@hotmail.sn</span>
        </div>
        <div class="heure">
            <span><i class="fas fa-clock"></i> &nbsp; Lun - Dim: 24H/24</span>
        </div>
    </div>
    <div class="logo">
        <div class="logo1">
            <img src="{{asset('img/logo.png')}}" alt="">
        </div>
        <ul>
            <div class="liens">
                <li><a href="#">Menu</a></li>
                <li><a href="../admin/parametre.php">Paramètres</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Deconnexion</a></li>

            </div>
        </ul>
        <div class="gr">
            <div class="search-bar">
                <input type="text" placeholder="Rechercher...">
            </div>
        </div>
        <div class="profil">
            <a href="#">
                <i class="fas fa-user-circle fa-3x"></i>
            </a>
            <br>
            <style>
                .nom_prenom {
                    color: #2c3e50; /* Couleur sombre pour un look élégant */
                    font-size: 1em; /* Taille de police légèrement plus grande */
                    font-weight: 600; /* Poids de police semi-gras */
                    margin: 0; /* Enlève la marge par défaut */
                    padding: 10px 0; /* Espacement vertical autour du texte */
                    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); /* Ombre douce pour donner du relief */
                    transition: color 0.3s ease; /* Transition pour un changement de couleur fluide */
                }

                .nom_prenom:hover {
                    color: #37bbae; /* Changement de couleur au survol */
                    text-decoration: underline; /* Soulignement au survol */
                }

            </style>
            <div class="user-info">
                @if(Auth::check())
                    <p class="nom_prenom">
                        {{ $userInfo['nom'] }} {{ $userInfo['prenom'] }}
                    </p>
                    <p class="user-role">
                        {{ $userInfo['statut'] }}
                    </p>
                @else
                    <p>Utilisateur non connecté</p>
                @endif
            </div>

            <select id="menu-deroulant" onchange="handleMenuChange(this)">
                <option value=""></option>
                <option value="profils">PROFILS</option>
                <option value="deconnexion">DECONNEXION</option>
            </select>
        </div>
    </div>
    </div>
    <script>
        document.getElementById('menu-deroulant').onchange = function() {
            var selectedValue = this.value;
            if (selectedValue === 'profils') {
                window.location.href = '../profils.php';
            } else if (selectedValue === 'deconnexion') {
                window.location.href = '../../index.php';
            }
        };
    </script>
</body>
</html>
