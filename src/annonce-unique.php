<?php
include __DIR__ . "/includes/bandeau.includes.php";
include __DIR__ . "/includes/annonce-unique.include.php";
include __DIR__ . "/includes/request.enchere.include.php";
?>


<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>PHP</title>
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <header>
        <?php afficherBandeau(); ?>
    </header>
    <main>
        <h1>Qui sera le prochain dresseur ?</h1>
        <?php if (isset($annonceSelectionne)) {
            foreach ($annonceSelectionne as $index => $annonce) { ?>
                <article id="annonce" class="annonceUnique">
                    <div class="image imageAnnonceUnique">
                        <img src=" /img/cartePoke.jpeg" alt="carte pokemon" style="width: 90%; margin: 0 auto;">
                    </div>
                    <div style="width: 73%; padding: 2% 0% 0% 4%;">
                        <h2><?= $annonce["nom_pokemon"] ?></h2>
                        <div style="display: flex;">
                            <div class="aPropos aProposAnnonceUnique">
                                <p> Type : <?= $annonce["type"] ?> </p>
                                <p> PV : <?= $annonce["pv"] ?> </p>
                                <p> Description du Pokemon : <?= $annonce["description"] ?></p>
                                <br>
                                <p> Rareté de la carte : <?= $annonce["rarete"] ?></p>
                                <p> Numero de série de la carte : <?= $annonce["n_serie"] ?></p>
                                <p> État de la carte : <?= $annonce["condition"] ?></p>
                            </div>
                            <div class="aPropos" style="width: 50%; padding-top: 4%;">
                                <p> Date : <?= $annonce["date_annonce"] ?></p>
                                <p> Date de fin des enchères : <?= $annonce["date_de_fin"] ?></p>
                                <p> ID annonce : <?= $annonce["id_annonce"] ?></p>
                                <p> ID utilisateur : <?= $annonce["id_utilisateur"] ?></p>
                                <br>
                                <p> Prix de départ de enchères : <?= $annonce["prix_depart"] ?></p>
                                <p> Prix actuel : <?= $annonce["prix_actuel"] ?></p>
                                <p> Dernière enchère : X</p>
                            </div>
                        </div>

                    </div>
                    <?php if (date("Y-m-d H:i:s") <= $annonce["date_de_fin"]) { ?>

                        <form id="formEnchere" action="annonce-unique.php" method="post">
                            <input type="text" name="prix_offert" placeholder="€" />
                            <input class="bouton" type="submit" value="Enchérir !">
                        </form>

                    <?php } else { ?>
                        <p>Enchère terminée</p>
                    <?php } ?>
                </article>


        <?php }
        }
        ?>

        <!-- Insert du prix de l'enchere -->
        <?php if (isset($_POST["prix_offert"]) && $annonce["prix_actuel"] < $_POST["prix_offert"]) {
            $query = $dbh->prepare("INSERT INTO encheres (`prix_offert`,`id_utilisateur`, `id_annonce`) VALUES (?,?,?);");

            //Exécution de la requête
            $result = $query->execute([$prix_offert, $id_utilisateur, $id_annonce]);
            $enchere = $query->fetchAll(PDO::FETCH_ASSOC);
        } ?>




        <!-- Affichage de l'enchere sur l'annonce -->
        <?php if (isset($_POST["prix_offert"]) && $annonce["prix_actuel"] < $_POST["prix_offert"]) {

            foreach ($affichageEnchere as $index => $enchere) { ?>

                <p> Prix offert : <?= $enchere["prix_offert"] ?> €</p>
                <p> De <?= $enchere["id_utilisateur"] ?></p>
            <?php }
        } else if (isset($_POST["prix_offert"]) && $annonce["prix_actuel"] > $_POST["prix_offert"]) {
            echo "Votre enchère doit etre supérieur au prix actuel";
            ?> <?php
            } else { ?>
            <p>Saississez un montant supérieur à <?= $annonce["prix_actuel"] ?> </p>
        <?php } ?>



        <!-- Update de l'enchere dans la bdd annonce -->
        <?php if (isset($_POST["prix_offert"]) && $annonce["prix_actuel"] < $_POST["prix_offert"]) {
            $query = $dbh->prepare("UPDATE annonces SET`prix_actuel`= ? WHERE id_annonce=?;");

            //Exécution de la requête
            $result = $query->execute([$prix_offert, $id_annonce]);


            $query = $dbh->prepare("UPDATE annonces SET`id_encherisseur`= ? WHERE id_annonce=?;");

            //Exécution de la requête
            $result = $query->execute([$_SESSION["id_utilisateur"], $id_annonce]);
            $nouveauEncherisseur = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
    </main>
</body>

</html>