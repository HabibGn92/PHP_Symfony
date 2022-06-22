CREATE TABLE `ft_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `login` varchar(255) NOT NULL DEFAULT 'toto',
  `type` enum('staff','student','other') DEFAULT 'other',
  `date_de_creation` date NOT NULL
) 