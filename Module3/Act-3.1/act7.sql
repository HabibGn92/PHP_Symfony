SELECT `titre`, `resum` FROM `film` 
WHERE UPPER(`resum`) LIKE '%VINCENT%' 
ORDER BY `id_film` ASC;