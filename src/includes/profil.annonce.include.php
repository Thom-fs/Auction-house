<?php
/* new PDO */
require_once __DIR__ . "/db.php";

if (isset($_SESSION["id_utilisateur"])) {

    //
    // Annonces PUBLIÉES par l'utilisateur de la session

    /* Préparation de la requête */
    $query = $dbh->prepare("SELECT * FROM annonces WHERE id_utilisateur = ?;");

    /* Exécution de la requête */
    $query->execute([$_SESSION["id_utilisateur"]]);

    $annoncesPublieesParId_utilisateur = $query->fetchAll(PDO::FETCH_ASSOC);


    // tout ce qui suis est en attente de la fonction update après une enchère

    //
    // Annonces SUIVIES par l'utilisateur de la session

    /* Préparation de la requête */
    $query = $dbh->prepare("SELECT * FROM annonces a LEFT JOIN encheres e ON e.id_annonce = a.id_annonce WHERE e.id_enchere = ?;");

    /* Exécution de la requête */
    $query->execute([$_SESSION["id_utilisateur"]]);

    $annoncesSuiviesParId_utilisateur = $query->fetchAll(PDO::FETCH_ASSOC);

    //
    // Annonces REMPORTÉES par l'utilisateur de la session

    /* Préparation de la requête */
    $query = $dbh->prepare("SELECT * FROM annonces a LEFT JOIN utilisateurs u ON a.id_encherisseur = u.id_utilisateur WHERE u.id_utilisateur = ?;");

    /* Exécution de la requête */
    $query->execute([$_SESSION["id_utilisateur"]]);

    $annoncesRemporteesParId_utilisateur = $query->fetchAll(PDO::FETCH_ASSOC);
}
