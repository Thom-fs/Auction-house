<?php
/* Imports */

use Utilisateurs\Utilisateurs;

require_once __DIR__ . "/modif_form.include.php";
include_once __DIR__ . "/../classes/utilisateurs.classe.php";
require_once __DIR__ . "/db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modifier_supprimer"]) && isset($_POST["validerSuppression"])) {
    // echo "Test de la REQUEST_METHOD == POST passé avec succès pour Modification / Suppression";
    /* Récupération des valeurs  */
    $modifier_supprimer = $_POST["modifier_supprimer"];
    $validerSuppression = $_POST["validerSuppression"];

    /** --------------------------------------------------------------------------
     * Modification du profil
     */
    if (isset($modifier_supprimer) && $modifier_supprimer == "Modifier") {
        $prenom = htmlspecialchars($_POST["prenom"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
        $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        $age = htmlspecialchars($_POST["age"]);
        $passePourConnexion = $_POST["mdp"];


        /* Modification de l'utilisateur */
        $utilisateur = new Utilisateurs($prenom, $nom, $email, $mdp, $age);
        $result = $utilisateur->modifierUtilisateur();
        /* Connexion de l'utilisateur à la suite de son inscription */
        Utilisateurs::connecterUtilisateur($email, $passePourConnexion);

        /** --------------------------------------------------------------------------
         * Suppression du profil
         */
    } else if (isset($validerSuppression) && $validerSuppression == "oui") {

        echo "Entrée dans Fonction de SUPPRESSION de l'utilisateur";
        /* Récupération de l'id */
        $id_utilisateur = filter_var($_SESSION["id_utilisateur"], FILTER_SANITIZE_NUMBER_INT);

        /* Préparation de la requête */
        $query = $dbh->prepare("DELETE FROM utilisateurs WHERE id_utilisateur = ?;");

        /* Exécution de la requête */
        $suppressionReussie = $query->execute([$id_utilisateur]);
    }

    if (isset($suppressionReussie) && $suppressionReussie == 1) {

?>
        <p>Contact supprimé</p>
    <?php } else { ?>
        <p>Une erreur s'est produite, veuillez réessayer.</p>
    <?php } ?>

    <a href="accueil.php">Vers l'accueil de Poké'auction House Page</a>


<?php }
