<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $_SESSION["id_annonce"] = $_GET["annonce"];
}

/* new PDO */
require_once __DIR__ . "/db.php";

/* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM annonces WHERE id_annonce = ?;");

/* Exécution de la requête */
$query->execute([$_SESSION["id_annonce"]]);

$annonceSelectionne = $query->fetchAll(PDO::FETCH_ASSOC);
