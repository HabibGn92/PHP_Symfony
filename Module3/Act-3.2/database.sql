-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 juin 2022 à 10:07
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
-- Base de données : `database`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date_publication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `auteur`, `date_publication`) VALUES
(23, 'Java', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales urna enim, quis feugiat massa tempus eget. Sed pellentesque mi leo, eu ultricies magna bibendum at. In in elementum enim. Donec id purus leo. Aenean ac sapien nunc. Aliquam nunc est, lobortis quis venenatis volutpat, vulputate eu ligula. Pellentesque semper rhoncus lorem ac suscipit. Maecenas ex augue, vestibulum quis enim et, fringilla posuere lacus. Nam quam lacus, aliquet a eleifend rhoncus, maximus a dolor. Phasellus at tristique eros, aliquam congue orci.', 'Paul', '2022-06-09'),
(31, 'Dotnet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales urna enim, quis feugiat massa tempus eget. Sed pellentesque mi leo, eu ultricies magna bibendum at. In in elementum enim. Donec id purus leo. Aenean ac sapien nunc. Aliquam nunc est, lobortis quis venenatis volutpat, vulputate eu ligula. Pellentesque semper rhoncus lorem ac suscipit. Maecenas ex augue, vestibulum quis enim et, fringilla posuere lacus. Nam quam lacus, aliquet a eleifend rhoncus, maximus a dolor. Phasellus at tristique eros, aliquam congue orci', 'Habib Hajjem', '2022-06-22'),
(32, 'Python', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales urna enim, quis feugiat massa tempus eget. Sed pellentesque mi leo, eu ultricies magna bibendum at. In in elementum enim. Donec id purus leo. Aenean ac sapien nunc. Aliquam nunc est, lobortis quis venenatis volutpat, vulputate eu ligula. Pellentesque semper rhoncus lorem ac suscipit. Maecenas ex augue, vestibulum quis enim et, fringilla posuere lacus. Nam quam lacus, aliquet a eleifend rhoncus, maximus a dolor. Phasellus at tristique eros, aliquam congue orci', 'Mark', '2022-06-20'),
(33, 'React', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales urna enim, quis feugiat massa tempus eget. Sed pellentesque mi leo, eu ultricies magna bibendum at. In in elementum enim. Donec id purus leo. Aenean ac sapien nunc. Aliquam nunc est, lobortis quis venenatis volutpat, vulputate eu ligula. Pellentesque semper rhoncus lorem ac suscipit. Maecenas ex augue, vestibulum quis enim et, fringilla posuere lacus. Nam quam lacus, aliquet a eleifend rhoncus, maximus a dolor. Phasellus at tristique eros, aliquam congue orci', 'Toni', '2022-06-22'),
(34, 'Dotnet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales urna enim, quis feugiat massa tempus eget. Sed pellentesque mi leo, eu ultricies magna bibendum at. In in elementum enim. Donec id purus leo. Aenean ac sapien nunc. Aliquam nunc est, lobortis quis venenatis volutpat, vulputate eu ligula. Pellentesque semper rhoncus lorem ac suscipit. Maecenas ex augue, vestibulum quis enim et, fringilla posuere lacus. Nam quam lacus, aliquet a eleifend rhoncus, maximus a dolor. Phasellus at tristique eros, aliquam congue orci.', 'Habib Hajjem', '2022-06-07'),
(35, 'Symfony', 'test.......', 'Habib Hajjem', '2022-06-23');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date_publication` date NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `texte`, `auteur`, `date_publication`, `article_id`) VALUES
(1, 'Trés bon article.', 'Pascal', '2022-06-07', 10),
(2, 'Pas mal', 'Samuel', '2022-06-07', 3),
(3, 'Bien', 'Mohamed', '2022-06-07', 10),
(4, 'Rania', '7elwa', '2022-06-07', 10),
(5, 'Excellent', 'Habib', '2022-06-07', 6),
(6, 'Excellent article', 'Habib Hajjem', '2022-06-08', 11),
(7, 'nice', 'Habib Hajjem', '2022-06-08', 4),
(8, 'Trés bon article.', 'Habib Hajjem', '2022-06-23', 6),
(9, '', '', '2022-06-23', 21),
(10, 'Trés bon article.', 'Bil Gates', '2022-06-23', 21);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `password`) VALUES
(1, 'habib.hajjem@talan.com', '$2y$10$LSYqz1b5Sa00T3rVwinZjOV7Z9wfk0fcXv9EpeDTe/N67aICgIxqK'),
(2, 'hajjemhabib62@gmail.com', '$2y$10$JJLNJ.N46aX4/31YV2xPVe9OCyCphjX58fm0q0tPeR7GAI/.AAa4u'),
(3, 'habib@yahoo.fr', '$2y$10$Nl3LK4yyquulI473Bkmn4e/UJ9q2jmRHxTNjkcd1XeYyG08ulO0Q2'),
(4, 'mohamed@gmail.com', '$2y$10$TEDhD2Eb46XS4CnJrZxMu.4EkQPuLr8/OiDu7tpTYSEtIqPcFBuOC'),
(7, 'kenza@gmail.com', '$2y$10$aHWHjWAevrugTtIOiXC.5e4RT8v4mAI/eOchhuAVrqEvCWG2NfSey'),
(9, 'test@yahoo.fr', '$2y$10$dO9FRO1AbYPcjG8rcqdnP.X.PcaiJf4/GiCdO68qWpcIXsxxmD9Gm'),
(11, 'aron@gmail.com', '$2y$10$N1ACSuFaWXdwmjNY/BBkU.dZKXU4xpW0DggJdAs7DZSdsPXvv1mtC');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
