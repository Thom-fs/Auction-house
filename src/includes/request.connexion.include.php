<?php
// Accès au namespace "Utilisateurs"
use Utilisateurs\Utilisateurs;

// Require du formulaire d'inscription / connexion
require_once __DIR__ . "/inscription_form.php";

// Require de la classe "Utilisateurs"
require_once __DIR__ . "/../classes/utilisateurs.classe.php";

// Require du new PDO
require_once __DIR__ . "/db.php";


if (isset($_POST["category_type"])) {
    // Récupération de la valeur "connexion" ou "inscription"
    $category_type = $_POST["category_type"];

    // echo "Valeur de category_type à l'entrée dans request_connexion : " . $category_type;
    // echo "ICI category_type est SET";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // echo "Entrée dans request_connexion";

        // Si "inscription"

        if ($category_type == "Inscription") {
            $prenom = htmlspecialchars($_POST["prenom"]);
            $nom = htmlspecialchars($_POST["nom"]);
            $email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
            $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
            $age = htmlspecialchars($_POST["age"]);
            $passePourConnexion = $_POST["mdp"];


            /* Création de l'utilisateur */
            $utilisateur = new Utilisateurs($prenom, $nom, $email, $mdp, $age);
            $result = $utilisateur->inscriptionUtilisateur();

            /* Connexion de l'utilisateur à la suite de son inscription */
            Utilisateurs::connecterUtilisateur($email, $passePourConnexion);
        }

        // Si "connexion"

        else if ($category_type == "Connexion") {

            $email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
            $mdp = $_POST["mdp"];

            /* Connexion de l'utilisateur */
            $utilisateur = Utilisateurs::connecterUtilisateur($email, $mdp);
        }
    } else {
        return "ERREUR : category_type non défini.";
    }
}
