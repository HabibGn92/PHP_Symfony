-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 juin 2022 à 17:31
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
-- Base de données : `databasehk`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `id` int(255) NOT NULL,
  `type_carte` enum('sort','monstre') NOT NULL DEFAULT 'sort',
  `cout_mana` int(255) NOT NULL,
  `nb_pts_dommage` int(255) NOT NULL,
  `nb_pts_vie` int(255) DEFAULT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`id`, `type_carte`, `cout_mana`, `nb_pts_dommage`, `nb_pts_vie`, `image`) VALUES
(1, 'sort', 5, 3, 0, ''),
(2, 'sort', 2, 5, 0, ''),
(3, 'sort', 4, 4, 0, ''),
(4, 'sort', 3, 7, 0, ''),
(5, 'sort', 2, 3, 0, ''),
(6, 'sort', 7, 10, 0, ''),
(7, 'sort', 3, 5, 0, ''),
(9, 'sort', 2, 4, 0, ''),
(10, 'sort', 4, 8, 0, ''),
(11, 'sort', 6, 9, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `main_user1` int(11) NOT NULL,
  `main_user2` int(11) NOT NULL,
  `pts_vie_user1` int(11) NOT NULL,
  `pts_vie_user2` int(11) NOT NULL,
  `pts_mana_user1` int(11) NOT NULL,
  `pts_mana_user2` int(11) NOT NULL,
  `carte_deck_user1` int(11) NOT NULL,
  `carte_deck_user2` int(11) NOT NULL,
  `tour_joueur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carte`
--
ALTER TABLE `carte`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
