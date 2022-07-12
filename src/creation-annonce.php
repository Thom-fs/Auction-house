<?php
// Include du fichier PHP du bandeau de navigation
include __DIR__ . "/includes/bandeau.includes.php";

// Require du fichier PHP
require_once __DIR__ . "/includes/request.annonce.include.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Créer une annonce</title>
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
        <h1>Formulaire de dépot d'annonce</h1>
        <form class="formNouvelleAnnonce" enctype="multipart/form-data" action="validation-nouvelle-annonce.php" method="post">
            <div class="divFormNouvelleAnnonce">
                <div class="labelAndInput">
                    <label for="nomPokemon">Nom du Pokémon : </label>
                    <input type="text" name="nomPokemon" id="nomPokemon">
                </div>
                <div class="labelAndInput">
                    <label for="typePokemon">Type du Pokémon : </label>
                    <select name="typePokemon" id="typePokemon">
                        <option value="acier">Acier</option>
                        <option value="combat">Combat</option>
                        <option value="dragon">Dragon</option>
                        <option value="eau">Eau</option>
                        <option value="electrik">Electrik</option>
                        <option value="feu">Feu</option>
                        <option value="fee">Fée</option>
                        <option value="glace">Glace</option>
                        <option value="insect">Insect</option>
                        <option value="normal">Normal</option>
                        <option value="plante">Plante</option>
                        <option value="poisson">Poisson</option>
                        <option value="psy">Psy</option>
                        <option value="roche">Roche</option>
                        <option value="sol">Sol</option>
                        <option value="spectre">Spectre</option>
                        <option value="tenebres">Ténèbres</option>
                        <option value="vol">Vol</option>

                    </select>
                </div>
                <div class="labelAndInput">
                    <label for="pvPokemon">PV du Pokémon : </label>
                    <input type="number" name="pvPokemon" id="pvPokemon">
                </div>
                <div class="labelAndInput">
                    <label for="descriptionPokemon">Description du Pokémon : </label>
                    <input type="text" name="descriptionPokemon" id="descriptionPokemon">
                </div>
            </div>
            <div class="divFormNouvelleAnnonce">
                <div class="labelAndInput">
                    <label for="rareteCarte">Rareté de la carte : </label>
                    <select name="rareteCarte" id="rareteCarte">
                        <option value="commune">Commune</option>
                        <option value="peuCommune">Peu commune</option>
                        <option value="rare">Rare</option>
                        <option value="tresRare">Très rare</option>
                    </select>
                </div>
                <div class="labelAndInput">
                    <label for="numeroSerieCarte">Numéro de série de la carte : </label>
                    <input type="text" name="numeroSerieCarte" id="numeroSerieCarte">
                </div>
                <div class="labelAndInput">
                    <label for="conditionCarte">État de la carte : </label>
                    <select name="conditionCarte" id="conditionCarte">
                        <option value="bonEtat">Bon état</option>
                        <option value="tresBonEtat">Très bon état</option>
                        <option value="parfait">Parfait état</option>
                    </select>
                </div>
                <div class="labelAndInput">
                    <label for="prixDepart">Prix de départ des enchères : </label>
                    <input type="number" name="prixDepart" id="prixDepart">
                </div>
                <div class="labelAndInput">
                    <label for="dateFinEncheres">Date de fin des enchères : </label>
                    <input type="text" name="dateFinEncheres" id="dateFinEncheres">
                </div>
                <div class="labelAndInput">
                    <label for="image">Date de fin des enchères : </label>
                    <input type="file" name="image" id="image">
                </div>
            </div>
            <input type="hidden" name="date" value="<?= date('Y-m-d'); ?>">
            <div class="divFormNouvelleAnnonce divSubmitNouvelleAnnonce">
                <input class="boutonFormNouvelleAnnonce bouton" type="submit" value="Poster l'annonce">
            </div>
        </form>

    </main>
    <footer></footer>
</body>

</html>