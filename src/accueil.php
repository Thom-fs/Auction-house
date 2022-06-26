<?php
// Include du fichier PHP du bandeau de navigation
include __DIR__ . "/includes/bandeau.includes.php";

// Require du fichier PHP relatif aux annonces publiées
require_once __DIR__ . "/includes/request.annonce.include.php";


?>


<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>PHP : Poké'auction House Page</title>
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
        <h1>Nos annonces</h1>
        <!-- Boutons de filtres des annonces -->

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="filtrerPar">
            <button class="bouton" type="submit" name="filtre" value="toutes">Toutes les annonces</button>
            <button class="bouton" type="submit" name="filtre" value="cours">Annonces en cours</button>
            <button class="bouton" type="submit" name="filtre" value="terminees">Annonces terminées</button>
        </form>

        <!-- Début fonction du filtre -->

        <?php
        if (!empty($_GET['filtre'])) {
            $filtre = $_GET['filtre'];
        }
        // choix par défaut
        else {
            $filtre = "toutes";
        }

        // Fin fonction du filtre 


        // Affichage par défaut de toutes les annonces

        if ($filtre == "toutes") {
        ?>

            <section>
                <?php if (isset($annonces)) {
                    foreach ($annonces as $index => $annonce) {
                        afficherAnnonce($annonce);
                    }
                } ?>
            </section>
        <?php }

        //
        // Affichage des annonces en cours
        //

        else if ($filtre == "cours") { ?>
            <section>
                <?php if (isset($annonces)) {
                    foreach ($annonces as $index => $annonce) {
                        if (date("Y-m-d H:i:s") <= $annonce["date_de_fin"]) {

                            afficherAnnonce($annonce);
                        }
                    }
                } ?>
            </section>
        <?php }

        //
        // Affichage des annonces terminées
        //

        else if ($filtre == "terminees") { ?>
            <section>
                <?php if (isset($annonces)) {
                    foreach ($annonces as $index => $annonce) {
                        if (date("Y-m-d H:i:s") >= $annonce["date_de_fin"]) {
                            afficherAnnonce($annonce);
                        }
                    }
                } ?>
            </section>
        <?php } ?>

        <!-- Fin affichage conditionnel -->

    </main>

    <footer>
        <img id="sachaEtPika" src="/img/sachaEtPika.png" alt="Sacha et Pikachu">
    </footer>

</body>

</html>