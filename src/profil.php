<?php

// Include du fichier PHP du bandeau de navigation
include __DIR__ . "/includes/bandeau.includes.php";
// Require du fichier PHP relatif au formulaire de connexion
require_once __DIR__ . "/includes/request.connexion.include.php";
// Require du fichier PHP de recupération des annonces dans la bdd filtrées par id_utilisateur
require_once __DIR__ . "/includes/profil.annonce.include.php";
// Require du fichier PHP relatif aux annonces publiées
require_once __DIR__ . "/includes/request.annonce.include.php";




// Traitement de la requête en GET pour la modification / suppresion du profil



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />

    <title>Profil</title>
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
        <!-- Condition d'être connecté -->

        <?php if (isset($_SESSION["id_utilisateur"])) { ?>

            <h1> Bienvenue sur votre espace personnel <?= $_SESSION["prenom"] ?>. <br> Vous êtes le dresseur n° <?= $_SESSION["id_utilisateur"] ?> .</h2>



                <!-- Boutons de filtres des annonces -->

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                    <button class="bouton" type="submit" name="filtre" value="publiees">Publiées</button>
                    <button class="bouton" type="submit" name="filtre" value="suivies">Suivies</button>
                    <button class="bouton" type="submit" name="filtre" value="remportees">Remportées</button>
                    <button class="bouton"><a href="parametres.php">Paramètres</a></button>
                </form>



                <!-- Début fonction du filtre -->

                <?php
                if (!empty($_GET['filtre'])) {
                    $filtre = $_GET['filtre'];
                }
                // choix par défaut
                else {
                    $filtre = "publiees";
                }
                // Fin fonction du filtre 

                // Annonces postées

                if ($filtre == "publiees") { ?>
                    <section>
                        <?php if (isset($annoncesPublieesParId_utilisateur)) {

                            // Affichage par défaut des annonces publiées

                            foreach ($annoncesPublieesParId_utilisateur as $index => $annonce) {
                                afficherAnnonce($annonce);
                            }
                        } ?>
                    </section>
                <?php
                }

                // Annonces suivies

                else if ($filtre == "suivies") { ?>
                    <section>
                        <?php if (isset($annoncesSuiviesParId_utilisateur)) {

                            // Affichage par défaut des annonces publiées

                            foreach ($annoncesSuiviesParId_utilisateur as $index => $annonce) {
                                if (date("Y-m-d H:i:s") <= $annonce["date_de_fin"]) {
                                    afficherAnnonce($annonce);
                                }
                            }
                        } ?>
                    </section>
                <?php
                }

                // Annonces Remportées

                else if ($filtre == "remportees") { ?>
                    <section>
                        <?php if (isset($annoncesRemporteesParId_utilisateur)) {

                            // Affichage par défaut des annonces publiées

                            foreach ($annoncesRemporteesParId_utilisateur as $index => $annonce) {
                                if (date("Y-m-d H:i:s") >= $annonce["date_de_fin"]) {
                                    afficherAnnonce($annonce);
                                }
                            }
                        } ?>
                    </section>
                <?php
                }
            }

            // Sinon demande de connexion 
            else { ?>
                <p>connectez-vous</p>
            <?php } ?>

    </main>

    <footer>
        <img id="sachaEtPika" src="/img/sachaEtPika.png" alt="Sacha et Pikachu">
    </footer>
</body>

</html>