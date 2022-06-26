<?php

session_start();


/**
 * BANDEAU SUPERIEUR DU SITE
 */

function afficherBandeau()
{
    // COMMENT VERIFIER QUE L'UTILISATEUR EST BIEN CONNECTE  -> ok grâce à session_start()

?>
    <!-- BANDEAU SUPERIEUR DU SITE -->

    <nav>
        <a href="accueil.php" class="logo">
            <img src="/img/phpokeLogo.png" alt="logo de Poke auction House Page">
        </a>

        <div>

            <button class="bouton"><a href=<?php if (!isset($_SESSION["id_utilisateur"])) echo 'connexion-inscription.php';
                                            else  echo 'creation-annonce.php' ?>> Vendre </a></button>
            <?php if (!isset($_SESSION["id_utilisateur"])) echo '<button class="bouton"><a href="connexion-inscription.php"> Connexion/Inscription </a></button>' ?>
            <?php if (isset($_SESSION["id_utilisateur"])) echo '<button class="bouton"><a href="profil.php"> Mon profil </a></button>' ?>
            <?php if (isset($_SESSION["id_utilisateur"])) echo '<button class="bouton"><a href="deconnexion.php"> Déconnexion </a></button>' ?>

        </div>
    </nav>


<?php
}
