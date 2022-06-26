<?php
// Include du fichier PHP du bandeau de navigation
include __DIR__ . "/includes/bandeau.includes.php";
include_once __DIR__ . "/includes/modif_form.include.php";
include_once __DIR__ . "/includes/request.modif-suppr-profil.include.php";
require_once __DIR__ . "/includes/validation.request.include.php";

// Formulaire de "Modification" / "Suppression" 

$modifier_supprimer = null;
if (isset($_GET["modifier_supprimer"])) {
    $modifier_supprimer = $_GET["modifier_supprimer"];
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />

    <title>Paramètres du compte</title>
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
        <?php if ($modifier_supprimer == null) { ?>
            <button class="bouton"><a href="profil.php">Retour</a></button>
            <!-- Formulaire de choix "Modification" / "Suppression" du profil -->
            <form class="formInscription" action="parametres.php" method="GET" style="text-align: center;">
                <button class="bouton" name="modifier_supprimer" value="Modifier">Modifier mon profil</button>
                <button class="bouton" name="modifier_supprimer" value="Supprimer">Supprimer mon profil</button>
            </form>
        <?php } else { ?>
            <button class="bouton"><a href="<?= $_SERVER['HTTP_REFERER']; ?>">Retour</a></button>
        <?php }
        if ($modifier_supprimer != null) {
            afficherModifForm($modifier_supprimer);
        }
        ?>
    </main>
    <footer></footer>

</body>

</html>