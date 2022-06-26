CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `prenom_utilisateur` varchar(255) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `mdp` varchar(255) NOT NULL, 
  `age` int(3) NOT NULL
);

CREATE TABLE `annonces` (
   `id_annonce` int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY, 
   `prix_depart` float NOT NULL,
   `prix_actuel` float NOT NULL,
   `id_encherisseur` int NOT NULL,
   `date_annonce`date NOT NULL,
   `date_de_fin` datetime NOT NULL,
   `nom_pokemon` varchar(255) NOT NULL, 
   `pv` int(4) NOT NULL,
   `type` varchar(255) NOT NULL,
   `condition`varchar(20) NOT NULL,
   `rarete` varchar(25) NOT NULL,
   `n_serie` varchar(30) UNIQUE NOT NULL,
   `description` TEXT NOT NULL,
   `id_utilisateur` int(11) NOT NULL,
    FOREIGN KEY (id_encherisseur) REFERENCES utilisateurs(id_utilisateur),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur)
);


CREATE TABLE `encheres` (
   `id_enchere` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
   `prix_offert` float NOT NULL, 
   `id_utilisateur` int(11) NOT NULL,
   `id_annonce` int(11) NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur),
    FOREIGN KEY (id_annonce) REFERENCES annonces(id_annonce)
  
)