<?php
// Si la personne valide sa nouvelle annonce
if (isset($_POST["validation"]) && $_POST["validation"] == "valide") {

    // Préparation de la requête pour inserer une nouvelle ligne à la table annonce 
    $query = $dbh->prepare("INSERT INTO annonces (`prix_depart`,`prix_actuel`, `id_encherisseur`, `date_annonce`,`date_de_fin`, `nom_pokemon`,`pv`,`type`,`condition`,`rarete`,`n_serie`,`description`,`id_utilisateur`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);");

    // Execution de a requête
    $query->execute([$_SESSION["annonce_prixDepart"], $_SESSION["annonce_prixActuel"], $_SESSION["id_utilisateur"], $_SESSION["annonce_date"], $_SESSION["annonce_dateFinEncheres"], $_SESSION["annonce_nomPokemon"], $_SESSION["annonce_pvPokemon"], $_SESSION["annonce_typePokemon"], $_SESSION["annonce_conditionCarte"], $_SESSION["annonce_rareteCarte"], $_SESSION["annonce_numeroSerieCarte"], $_SESSION["annonce_descriptionPokemon"], $_SESSION["id_utilisateur"]]);

    // Vidage des variable de session
    $_SESSION["annonce_prixDepart"] = NULL;
    $_SESSION["annonce_prixActuel"] = NULL;
    $_SESSION["annonce_date"] = NULL;
    $_SESSION["annonce_dateFinEncheres"] = NULL;
    $_SESSION["annonce_nomPokemon"]  = NULL;
    $_SESSION["annonce_pvPokemon"] = NULL;
    $_SESSION["annonce_typePokemon"] = NULL;
    $_SESSION["annonce_conditionCarte"] = NULL;
    $_SESSION["annonce_rareteCarte"] = NULL;
    $_SESSION["annonce_numeroSerieCarte"] = NULL;
    $_SESSION["annonce_descriptionPokemon"] = NULL;

    // refresh de la page une fois la redirection faite par le formulaire (pour afficher la nouvelle annonce)
    echo "<meta http-equiv='refresh' content='0';URL=" . $_SERVER['PHP_SELF'] . ".php?refresh=0'>";
}
