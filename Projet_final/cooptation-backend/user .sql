-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 août 2022 à 19:02
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbcooptation`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `roles`, `password`) VALUES
(1, 'admin@talan.com', 'admin', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$Z081YW1uMVVGSi5CWVhMRA$R3Gn8v6H68UY3DFCw6/kEOnUYMBSBkOIDTZXY1vXYUE'),
(2, 'habib@talan.com', 'habib', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$dEJNR0k0Mk00Ukh1dGdXYw$Kq+bD2a0B239IzAkNWcEs2egFqRXMLpQ4g7t/RXlvaY'),
(3, 'samar@talan.com', 'samar', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$bjRyNGxkN3BtMFdiRkR5Ug$mgh/GV6yJIQf/uttrneOul5M1XrDXGo0kJtGwkepP1A'),
(4, 'kenza@talan.com', 'kenza', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$Q2tzOE1IL0VZcG5oSE9VYw$13O5Gp7RmU2mbt3hsgLzfb0JTinSmUc4W6aDs6v8VCY'),
(5, 'rania@talan.com', 'rania', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$VW8vMlE4a29sSC5jQmc3bg$m4pN7FewQ6PpnEpS1eNqEJP2DJaXLRWjPgYepAsxK/U'),


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
