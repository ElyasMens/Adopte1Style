-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 05 juin 2024 à 19:14
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

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

CREATE TABLE `messaging` (
  `id` int(255) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `message_content` text NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(8, 'DiMaria', 'Mathis', 'ah', '2024-05-25 10:58:19'),
(10, 'Juju', 'Mathis', 'Coucou', '2024-05-26 18:32:06'),
(11, 'Mathis', 'Juju', 'Salut', '2024-05-26 18:45:26'),
(15, 'Admin', 'Julien', '😂😂', '2024-06-05 11:58:47');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `real_name` varchar(50) NOT NULL,
  `email` varchar(320) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `module` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `real_name`, `email`, `username`, `user_password`, `module`) VALUES
(1, 'Ibrahimovic', 'ibraz@gmail.com', 'Zlatan', '$2y$10$.iAt1ktuaPblroX8QbjkbeBGveULM5uaW9eL.J.s4NDjReilA8Z2i', 'user'),
(2, 'Mathis', 'mathis@gmail.com', 'Mathis', '$2y$10$P9o.RmKPtpjDLV6vG98G..qbfau24q/7OYDVzuZht9mqCcDrE8kBG', 'user'),
(3, 'Maria', 'mariadi@cookie.fr', 'DiMaria', '$2y$10$WR45OYnO0Wq7lrBUT0Lu3Og6Onl.HMs8Yq0S7bkDMhFOhwW2d7TBq', 'user'),
(6, 'Juju', 'julietta@gmail.com', 'Juju', '$2y$10$gQuW9De110JoY7RDtt3ODOVgNLgZTdBX6pVzVSmRCgg/vo7OzoO.6', 'user'),
(7, 'Julien', 'samy@gmail.com', 'Julien', '$2y$10$AceWIJDiedouKZQnuE39O.Beasd.UXi7/mXxnAcTcj6hTneCQBP/C', 'user'),
(8, 'Admin', 'admin@gmail.com', 'Admin', '$2y$10$6jHL4ZhgZc/bWtxa4FoxbO22E836oYJjlm83yBD1EEcEqTWzjZ5i.', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users_banned`
--

CREATE TABLE `users_banned` (
  `id` int(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users_banned`
--

INSERT INTO `users_banned` (`id`, `username`, `email`) VALUES
(1, 'ftgftg', 'ftgftg@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `job` varchar(50) NOT NULL,
  `user_location` varchar(100) NOT NULL,
  `relation` varchar(11) NOT NULL,
  `user_size` int(250) NOT NULL,
  `user_weight` int(250) NOT NULL,
  `eye_color` varchar(6) NOT NULL,
  `hair_color` varchar(5) NOT NULL,
  `biography` text NOT NULL,
  `smoking` varchar(3) NOT NULL,
  `user_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users_info`
--

INSERT INTO `users_info` (`id`, `username`, `gender`, `birthdate`, `job`, `user_location`, `relation`, `user_size`, `user_weight`, `eye_color`, `hair_color`, `biography`, `smoking`, `user_photo`) VALUES
(1, 'Zlatan', 'homme', '1981-08-03', 'Footballer', 'Suède', 'marié(e)', 195, 95, 'marron', 'noir', 'J\'aime le psg', 'non', '../Assets/DataBase/Users_Photo/Zlatan_pp.jpg'),
(2, 'Mathis', 'homme', '2004-04-20', 'Charmeur', 'France', 'autre', 190, 80, 'bleu', 'blond', '2 pschiit', 'non', '../Assets/DataBase/Users_Photo/Mathis_pp.png'),
(3, 'DiMaria', 'femme', '2003-05-10', 'Etudiante', 'France', 'marié(e)', 160, 60, 'marron', 'noir', 'Miam les cookies', 'non', '../Assets/DataBase/Users_Photo/DiMaria_pp.jpg'),
(6, 'Juju', 'femme', '2002-01-20', 'Batiment', 'France', 'célibataire', 176, 72, 'bleu', 'blond', 'Je suis Julietta j\'ai 22ans, je travaille dans le secteur du batiment et j\'aime faire connaissance avec des gens qui se sapent avec des baggy de chantier', 'non', '../Assets/DataBase/Users_Photo/Juju_pp.jpg'),
(7, 'Julien', 'homme', '1987-05-01', 'Collaborateur', 'Tel Aviv', 'marié(e)', 175, 58, 'bleu', 'brun', 'Je suis collaborateur et journaliste, je m\'habille principalement en jean et chemise.', 'non', '../Assets/DataBase/Users_Photo/Julien_pp.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users_reported`
--

CREATE TABLE `users_reported` (
  `report_id` int(255) NOT NULL,
  `user_reported` varchar(20) NOT NULL,
  `reported_by` varchar(20) NOT NULL,
  `reason` text NOT NULL,
  `message_id` int(255) NOT NULL,
  `message_content` text NOT NULL,
  `report_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users_reported`
--

INSERT INTO `users_reported` (`report_id`, `user_reported`, `reported_by`, `reason`, `message_id`, `message_content`, `report_date`) VALUES
(1, 'Mathis', 'DiMaria', 'spam', 20, '?? Non', '2024-05-23 13:40:44'),
(2, 'Mathis', 'DiMaria', 'hate_speech', 18, 'Salut', '2024-05-23 13:46:12'),
(3, 'Zlatan', 'DiMaria', 'spam', 3, 'Bonzoir', '2024-05-23 14:32:46'),
(4, 'DiMaria', 'Mathis', 'hate_speech', 30, 'ah', '2024-05-27 12:59:06');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_banned`
--
ALTER TABLE `users_banned`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_reported`
--
ALTER TABLE `users_reported`
  ADD PRIMARY KEY (`report_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users_banned`
--
ALTER TABLE `users_banned`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users_reported`
--
ALTER TABLE `users_reported`
  MODIFY `report_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
