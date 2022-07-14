-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 juil. 2022 à 18:03
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
-- Base de données : `db_security`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220707111708', '2022-07-07 13:17:33', 201),
('DoctrineMigrations\\Version20220707164107', '2022-07-07 18:41:26', 335),
('DoctrineMigrations\\Version20220708075207', '2022-07-08 09:52:28', 1167),
('DoctrineMigrations\\Version20220708091959', '2022-07-08 11:20:04', 71),
('DoctrineMigrations\\Version20220708132902', '2022-07-08 15:29:13', 129),
('DoctrineMigrations\\Version20220708133908', '2022-07-08 15:39:16', 115),
('DoctrineMigrations\\Version20220708134036', '2022-07-08 15:40:43', 456),
('DoctrineMigrations\\Version20220708134251', '2022-07-08 15:42:59', 944),
('DoctrineMigrations\\Version20220713162255', '2022-07-13 18:23:17', 407);

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

CREATE TABLE `profession` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profession`
--

INSERT INTO `profession` (`id`, `name`) VALUES
(1, 'Etudiant'),
(2, 'Enseignant');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `roles`) VALUES
(1, 'sami', 'test@yahoo.fr', '$argon2id$v=19$m=65536,t=4,p=1$ZFB3N1NCdHZoUFpNeDNUZA$3WVy0J2uCozRY6HyuDvmv1wJyBOe/3VTHdeRU8INFGg', '[\"ROLE_USER\"]'),
(2, 'habib', 'habib.hajjem@talan.com', '$argon2id$v=19$m=65536,t=4,p=1$OUxqN205R0t1aDdodUVaQg$JXGZpRrhSmFtaEQErR4nJNLbsEEEoRgUEB7g98xDbR8', '[\"ROLE_USER\"]'),
(4, 'sami92', 'sami@yahoo.com', '$argon2id$v=19$m=65536,t=4,p=1$NWNISGtMWW1wYmlxbnVYRw$m7pRb8yI4jPdoBcsOdLQTWwRECBp2mebP4mGuiwcPVU', '[\"ROLE_USER\"]'),
(5, 'admin', 'admin@hotmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UEcxZ2tYRjFLVzY0SlphUg$9FL61YiLKTqGQsR3m9GARLadffTUgeZ72YUur95ogFI', '[\"ROLE_USER\",\"ROLE_ADMIN\"]'),
(6, 'ali', 'ali@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$T2NaUlJTZFQwMUZkeWhJbQ$n6EsawNeXnSsjWOqSVcZN9om96np5G1AXTj/39maK64', '[\"ROLE_USER\"]'),
(7, 'nader', 'nader@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Yk5zOWhNd1dtTEl2Z3Mxbw$w+TfqA4EoF/L5rNcuoi+j/uQ4hXE5B+x2B/JE8LfdyA', '[\"ROLE_USER\"]'),
(8, 'maaher', 'maher@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Y0IvUkVOeEtrUFlPUURRWA$egFaEuBD/u1TvQ11PeQveZODFCdQPoxWBcH+tLpf1TA', '[\"ROLE_USER\"]'),
(9, 'momo', 'momo@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$aFRrNkJzVHlwblBESi5vUw$uTmIGd946n/GN4EreLL74PcMTTJZu5y3j5oEIRFJ+eo', '[\"ROLE_USER\"]'),
(10, 'mariem', 'mariem@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$VlhtWEtoWGhPR2V1TGhESg$osnpV+zNdncFCPTiRvPHatdirJPykPhoGJfXjDyQvok', '[\"ROLE_USER\"]'),
(12, 'malek', 'malek@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$eHFPRmhDOHFrVFVxbEtnRA$mymQmf9bHvDaDzW2TR0b4X73jiA/WuYLpJEqtSbBPUM', '[\"ROLE_USER\"]'),
(13, 'mohamed', 'med@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$cktzUU1ZTm42eEUzNzdmZQ$ScloXwXI0JafS8rOxB1ADWSsvEl32nIDqpZRIntZDvQ', '[\"ROLE_USER\"]'),
(14, 'admin2', 'admin2@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$QW9ITVBvQkVhWlczbVFwUg$RUwhzEqc/em2yT2yCBJ+1ym+cJKk7AQDRxd7qeZUpro', '[\"ROLE_ADMIN\"]'),
(15, 'alex', 'alex@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$WFpTNHh1WmVqd1h5ZVV4WQ$p2ADhJk85u9Cc+dBBoJEVM4Hp2UviCoob+71/IYgkA0', '[\"ROLE_USER\"]');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `profession`
--
ALTER TABLE `profession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
