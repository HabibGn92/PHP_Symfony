SELECT  UPPER(fiche_personne.`nom`) AS `NOM` ,fiche_personne.`prenom` ,`prix` FROM `membre`
INNER JOIN `abonnement`
ON membre.`id_abo` = abonnement.`id_abo`
INNER JOIN fiche_personne
on membre.`id_fiche_perso` = fiche_personne.`id_perso`
WHERE abonnement.`prix` > 42 ;