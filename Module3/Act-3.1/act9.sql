SELECT `nom`, `prenom`,DATE_FORMAT(`date_naissance`, "%d-%m-%Y")  
FROM `fiche_personne` 
WHERE DATE_FORMAT(`date_naissance`, "%Y") = 1989
ORDER BY `nom` ASC;