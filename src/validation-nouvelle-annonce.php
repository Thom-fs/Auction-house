<?php
// Include du fichier PHP du bandeau de navigation
include __DIR__ . "/includes/bandeau.includes.php";

require_once __DIR__ . "/includes/request.annonce.include.php";

require_once __DIR__ . "/includes/validation.request.include.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <header>
        <!-- Affichage de la navigation -->

        <?php afficherBandeau(); ?>
    </header>
    <main>
        <h1>Validation de votre annonce</h1>
        <?php $annonceCree->afficherAnnonce(); ?>

        <!--  -->
        <form action="profil.php" method="POST" onClick="window.location.reload()" style="text-align: center;">
            <!-- retour en arrière si la personne veut modifier son annonce -->
            <button class="bouton"><a href="<?= $_SERVER['HTTP_REFERER']; ?>">Modifier</a></button>
            <button class="bouton" type="submit" name="validation" value="valide">Valider l'annonce</button>

        </form>



    </main>
    <footer>

    </footer>
</body>

</html>