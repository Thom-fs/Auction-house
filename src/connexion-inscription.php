<?php
include __DIR__ . "/includes/bandeau.includes.php";
require __DIR__ . "/includes/inscription_form.php";



/* Traitement de la requête */


$category_type = null;
if (isset($_GET["category_type"])) {
    $category_type = $_GET["category_type"];
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription / Connexion</title>
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <header>
        <?php afficherBandeau(); ?>
    </header>
    <main>
        <h1>Inscription / Connexion</h1>

        <?php if ($category_type == null) { ?>
            <!-- Formulaire de choix de type d'utilisateur -->
            <form class="formInscription" action="connexion-inscription.php" method="GET">

                <input class="bouton" type="submit" name="category_type" value="Inscription">
                <input class="bouton" type="submit" name="category_type" value="Connexion">

            </form>

        <?php } ?>

        <!-- Formulaire d'inscription -->
        <?php if ($category_type != null) {
            affichage_form_inscription($category_type);
        } ?>

    </main>

</body>

</html>