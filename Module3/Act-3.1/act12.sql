SELECT `id_fiche_perso` FROM `membre`
INNER JOIN `fiche_personne`
WHERE `id_abo` IN  (SELECT `id_abo`  FROM `abonnement` WHERE `prix` > 42);