INSERT INTO `ft_table` (`login`,`date_de_creation`)
SELECT `nom`,`date_naissance` FROM `fiche_personne` 
WHERE  LIKE '%a%' AND length(`nom`) < 9
ORDER BY `nom` ASC 
LIMIT 10;