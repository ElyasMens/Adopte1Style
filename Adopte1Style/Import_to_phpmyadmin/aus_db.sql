-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 06 juin 2024 à 20:11
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aus_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `messaging`
--

DROP TABLE IF EXISTS `messaging`;
CREATE TABLE IF NOT EXISTS `messaging` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `receiver` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `message_content` text COLLATE utf8mb4_general_ci NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messaging`
--

INSERT INTO `messaging` (`id`, `sender`, `receiver`, `message_content`, `sent_at`) VALUES
(1, 'Zlatan', 'DiMaria', 'Bonsoir', '2024-05-21 18:11:08'),
(2, 'DiMaria', 'Zlatan', 'Bonsoir', '2024-05-22 05:32:31'),
(3, 'DiMaria', 'Zlatan', 'ça va', '2024-05-22 05:33:15'),
(4, 'DiMaria', 'Zlatan', 'Réponds', '2024-05-22 05:40:01'),
(5, 'Mathis', 'DiMaria', 'Salut', '2024-05-22 14:45:09'),
(6, 'Mathis', 'DiMaria', '?? Non', '2024-05-22 14:45:56'),
(10, 'Juju', 'Mathis', 'Coucou', '2024-05-26 18:32:06'),
(11, 'Mathis', 'Juju', 'Salut', '2024-05-26 18:45:26'),
(15, 'Admin', 'Julien', '😂😂', '2024-06-05 11:58:47'),
(17, 'Admin', 'Julien', 'abdedzdezdzdadaz', '2024-06-05 20:50:54');

-- --------------------------------------------------------

--
-- Structure de la table `profile_view`
--

DROP TABLE IF EXISTS `profile_view`;
CREATE TABLE IF NOT EXISTS `profile_view` (
  `user_visited` varchar(20) NOT NULL,
  `user_visitor` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `profile_view`
--

INSERT INTO `profile_view` (`user_visited`, `user_visitor`) VALUES
('Julien', 'Admin'),
('Julien', 'DiMaria'),
('DiMaria', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `real_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(320) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `module` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `real_name`, `email`, `username`, `user_password`, `module`) VALUES
(1, 'Ibrahimovic', 'ibraz@gmail.com', 'Zlatan', '$2y$10$.iAt1ktuaPblroX8QbjkbeBGveULM5uaW9eL.J.s4NDjReilA8Z2i', 'subscriber'),
(2, 'Mathis', 'mathis@gmail.com', 'Mathis', '$2y$10$P9o.RmKPtpjDLV6vG98G..qbfau24q/7OYDVzuZht9mqCcDrE8kBG', 'user'),
(3, 'Maria', 'mariadi@cookie.fr', 'DiMaria', '$2y$10$WR45OYnO0Wq7lrBUT0Lu3Og6Onl.HMs8Yq0S7bkDMhFOhwW2d7TBq', 'subscriber'),
(6, 'Juju', 'julietta@gmail.com', 'Juju', '$2y$10$gQuW9De110JoY7RDtt3ODOVgNLgZTdBX6pVzVSmRCgg/vo7OzoO.6', 'user'),
(7, 'Julien', 'samy@gmail.com', 'Julien', '$2y$10$AceWIJDiedouKZQnuE39O.Beasd.UXi7/mXxnAcTcj6hTneCQBP/C', 'user'),
(8, 'Admin', 'admin@gmail.com', 'Admin', '$2y$10$6jHL4ZhgZc/bWtxa4FoxbO22E836oYJjlm83yBD1EEcEqTWzjZ5i.', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users_banned`
--

DROP TABLE IF EXISTS `users_banned`;
CREATE TABLE IF NOT EXISTS `users_banned` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(320) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users_banned`
--

INSERT INTO `users_banned` (`id`, `username`, `email`) VALUES
(5, 'dzadzadza', 'dzadzadza');

-- --------------------------------------------------------

--
-- Structure de la table `users_info`
--

DROP TABLE IF EXISTS `users_info`;
CREATE TABLE IF NOT EXISTS `users_info` (
  `id` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `birthdate` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `job` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_location` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `relation` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `user_size` int NOT NULL,
  `user_weight` int NOT NULL,
  `eye_color` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `hair_color` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `biography` text COLLATE utf8mb4_general_ci NOT NULL,
  `style` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_photo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users_info`
--

INSERT INTO `users_info` (`id`, `username`, `gender`, `birthdate`, `job`, `user_location`, `relation`, `user_size`, `user_weight`, `eye_color`, `hair_color`, `biography`, `style`, `user_photo`) VALUES
(1, 'Zlatan', 'homme', '1981-08-03', 'Footballer', 'Suède', 'marié(e)', 195, 95, 'marron', 'noir', 'J\'aime le psg', 'Classique', '../Assets/DataBase/Users_Photo/Zlatan_pp.jpg'),
(2, 'Mathis', 'homme', '2004-04-20', 'Charmeur', 'France', 'autre', 190, 80, 'bleu', 'blond', '2 pschiit', 'Sapologie', '../Assets/DataBase/Users_Photo/Mathis_pp.png'),
(3, 'DiMaria', 'femme', '2003-05-10', 'Etudiante', 'France', 'marié(e)', 160, 60, 'marron', 'noir', 'Miam les cookies', 'Distingué', '../Assets/DataBase/Users_Photo/DiMaria_pp.jpg'),
(6, 'Juju', 'femme', '2002-01-20', 'Batiment', 'France', 'célibataire', 176, 72, 'bleu', 'blond', 'Je suis Julietta j\'ai 22ans, je travaille dans le secteur du batiment et j\'aime faire connaissance avec des gens qui se sapent avec des baggy de chantier', 'Classique', '../Assets/DataBase/Users_Photo/Juju_pp.jpg'),
(7, 'Julien', 'homme', '1987-05-01', 'Collaborateur', 'Tel Aviv', 'marié(e)', 175, 58, 'bleu', 'brun', 'Je suis collaborateur et journaliste, je m\'habille principalement en jean et chemise.', 'Classique', '../Assets/DataBase/Users_Photo/Julien_pp.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users_reported`
--

DROP TABLE IF EXISTS `users_reported`;
CREATE TABLE IF NOT EXISTS `users_reported` (
  `report_id` int NOT NULL AUTO_INCREMENT,
  `user_reported` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `reported_by` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `reason` text COLLATE utf8mb4_general_ci NOT NULL,
  `message_id` int NOT NULL,
  `message_content` text COLLATE utf8mb4_general_ci NOT NULL,
  `report_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users_reported`
--

INSERT INTO `users_reported` (`report_id`, `user_reported`, `reported_by`, `reason`, `message_id`, `message_content`, `report_date`) VALUES
(19, 'DiMaria', 'Zlatan', 'spam', 45, 'TG', '2024-06-06 17:01:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
