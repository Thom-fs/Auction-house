<?php
// Include du fichier PHP du bandeau de navigation
include __DIR__ . "/includes/bandeau.includes.php";
session_destroy();
include_once __DIR__ . "/includes/request.modif-suppr-profil.include.php";


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Déconnexion</title>
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
    <header>
        <!-- Affichage de la navigation -->

        <?php afficherBandeau(); ?>
    </header>
    <main>
        <h1> Vous avez été déconnecté.</h1>

        <button class="bouton" style="display: block; margin: 0 auto;">
            <a href="accueil.php">Retour à l'accueil de PHP</a>
        </button>


    </main>
    <footer>

    </footer>
</body>

</html>