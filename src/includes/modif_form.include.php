<?php

/**
 * Affichage du formulaire d'inscription / Connexion Utilisateur
 */
function afficherModifForm(string $modifier_supprimer)
{
    // Formulaire de modification, récupéré de celui de création 
    if ($modifier_supprimer == "Modifier") { ?>
        <form class="formInscription" style="gap: 5px; margin-top: 0;" action="profil.php" method="POST">

            <div class="labelAndInput">
                <label>Prénom :</label>
                <input class="" type="text" name="prenom" placeholder="Prenom" />
            </div>

            <div class="labelAndInput">
                <label>Nom :</label>
                <input class="" type="text" name="nom" placeholder="Nom" />
            </div>

            <div class="labelAndInput">
                <label>Email :</label>
                <input type="email" name="email" placeholder="email">
            </div>

            <div class="labelAndInput">
                <label>Mot de passe :</label>
                <input type="password" name="mdp" placeholder="mdp">
            </div>

            <div class="labelAndInput">
                <label>Age :</label>
                <input type="text" name="age" placeholder="age">
            </div>

            <input type="hidden" name="modifier_supprimer" value="<?= $modifier_supprimer ?>" />

            <input class="bouton" style="margin-top: 30px;" type="submit" value="Modifier" />
        </form>

    <?php }

    // Demande de validation de suppression du profil 
    if ($modifier_supprimer == "Supprimer") { ?>
        <p style="text-align: center; margin-top: 3%;">Souhaitez-vous réellement supprimer votre profil de Fan De Pokémon sur PHP ?</p>

        <!--  Redirection vers la page profil.php si l'utilisateur ne confirme pas. -->
        <form class="formInscription" style="gap: 5px; margin-top: 0;" action="parametres.php" method="POST">
            <button class="bouton" type="submit" name="validerSuppression" value="non">Non</button>
            <button class="bouton" type="submit" name="validerSuppression" value="oui">Oui</button>
        </form>
<?php }
}
