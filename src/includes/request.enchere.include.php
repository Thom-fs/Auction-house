<?php

include __DIR__ . "/../classes/enchere.classe.php";
include __DIR__ . "/annonce-unique.include.php";
require __DIR__ . "/db.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $prix_offert = $_POST["prix_offert"];
    $id_utilisateur = $_SESSION["id_utilisateur"];
    $id_annonce = $_SESSION["id_annonce"];
    // $id_prenom = $_SESSION["id_prenom"];

    // $enchere = new Enchere($prix_offert, $id_utilisateur, $id_annonce);
    // $resultatEnchere = $enchere->requeteEnchere();


    // $query = $dbh->prepare("INSERT INTO encheres (`prix_offert`,`id_utilisateur`, `id_annonce`) VALUES (?,?,?);");

    // //Exécution de la requête
    // $result = $query->execute([$prix_offert, $id_utilisateur, $id_annonce]);
    // $enchere = $query->fetchAll(PDO::FETCH_ASSOC);




    // $query = $dbh->prepare("SELECT e.prix_offert ,u.nom,u.prenom
    // FROM encheres e
    // LEFT JOIN utilisateurs u
    // ON u.id=e.id_utilisateur
    // LEFT JOIN annonces a
    // ON a.id = e.id_annonce 
    // WHERE u.id= ? 
    // ORDER by e.prix_offert DESC;");

    // // Exécution de la requête //
    // $query->execute([$_SESSION["id_utilisateur"]]);
    // $affichageEnchere = $query->fetchAll(PDO::FETCH_ASSOC);


    $query = $dbh->prepare("SELECT * FROM encheres WHERE id_annonce=? ORDER BY `encheres`.`prix_offert` DESC;");

    // Exécution de la requête //
    $query->execute([$_SESSION["id_annonce"]]);
    $affichageEnchere = $query->fetchAll(PDO::FETCH_ASSOC);
}
