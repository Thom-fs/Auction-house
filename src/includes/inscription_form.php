<?php

/**
 * Affichage du formulaire d'inscription / Connexion Utilisateur
 */
function  affichage_form_inscription(string $category_type)
{ ?>


    <h2>

    </h2>
    <form class="formInscription" action="profil.php" method="post">

        <?php if ($category_type == "Inscription") { ?>

            <div class="labelAndInput">
                <label>Prénom :</label>
                <input class="" type="text" name="prenom" placeholder="Prenom" />
            </div>

            <div class="labelAndInput">
                <label>Nom :</label>
                <input class="" type="text" name="nom" placeholder="nom" />
            </div>

            <div class="labelAndInput">
                <label>Email :</label>
                <input type="email" name="email" placeholder="email">
            </div>

            <div class="labelAndInput">
                <label>Mot de passe:</label>
                <input type="password" name="mdp" placeholder="mdp">
            </div>

            <div class="labelAndInput">
                <label>Age:</label>
                <input type="text" name="age" placeholder="age">
            </div>

            <input class="bouton" type="submit" value="S'inscrire" />

        <?php } ?>

        <?php if ($category_type == "Connexion") { ?>

            <div class="labelAndInput">
                <label>Email :</label>
                <input type="email" name="email" placeholder="email">
            </div>

            <div class="labelAndInput">
                <label>Mot de passe:</label>
                <input type="password" name="mdp" placeholder="mdp">
            </div>

            <input class="bouton" type="submit" value="Se connecter" />

        <?php } ?>

        <input type="hidden" name="category_type" value="<?= $category_type ?>" />


    </form>
<?php }
