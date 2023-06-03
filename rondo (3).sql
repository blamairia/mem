-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 03 juin 2023 à 16:05
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
-- Base de données : `rondo`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `password`) VALUES
(2, 'liwaedf', 'liwaedf@gmail.com', '0660316628', 'liwaedf');

-- --------------------------------------------------------

--
-- Structure de la table `caritatif`
--

CREATE TABLE `caritatif` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_profit` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_profit` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `image`, `created_at`, `is_profit`) VALUES
(6, 'camping', 'camp', ' camp seraidi', 0, '1683990193.jpg', '2023-06-03 13:02:06', 1),
(7, 'Collecte des dons pour les trisomiques', 'mongolien', '   Profitez du soleil et dessinez un sourire chez un patient n a pas de prix', 0, '1683999155.jpg', '2023-05-13 19:33:31', 0),
(8, 'kayak', 'kyk', ' kayak', 0, '1684002924.jpg', '2023-05-13 18:46:54', 1),
(9, 'Randonnée', 'rando', '  randonnée', 0, '1684004672.jpg', '2023-05-13 19:19:26', 1),
(10, 'collecte des dons pour les patients atteints du cancer', 'cancer', 'cancer', 0, '1684007397.jpg', '2023-05-13 19:49:57', 0),
(11, 'bénévolat pour les morphelins', 'bnvl', 'bénévolat', 0, '1684009130.jpg', '2023-05-13 20:18:50', 0),
(12, 'bivouac', 'bvc', 'bivouac', 0, '1685540828.jpg', '2023-05-31 13:47:08', 1),
(13, 'bénevolat pour les patients atteints du d hemoglobinopathies', 'bnv', ' d hemoglobinopathies', 0, '1685542563.webp', '2023-05-31 14:16:32', 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Confirmed','Cancelled') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `trip_id`, `user_id`, `name`, `email`, `phone`, `status`, `created_at`) VALUES
(14, 13, 8, 'zaineb ', 'zainebdjellal@gmail.com', '', 'Pending', '2023-05-29 16:49:07'),
(15, 16, 8, 'zaineb ', 'zainebdjellal@gmail.com', '', 'Pending', '2023-05-29 16:49:19'),
(16, 11, 8, 'zaineb ', 'zainebdjellal@gmail.com', '', 'Pending', '2023-05-29 16:49:32'),
(17, 23, 8, 'zaineb ', 'zainebdjellal@gmail.com', '', 'Confirmed', '2023-05-31 14:25:56'),
(18, 23, 6, 'liwae ', 'LIWAE@gmail.com', '', 'Pending', '2023-05-31 14:23:47'),
(19, 13, 6, 'liwae ', 'LIWAE@gmail.com', '', 'Pending', '2023-06-03 13:51:33');

-- --------------------------------------------------------

--
-- Structure de la table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `trip_price` decimal(10,2) NOT NULL,
  `max_participants` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `images` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category_id` int(11) NOT NULL,
  `places` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `trips`
--

INSERT INTO `trips` (`id`, `name`, `slug`, `description`, `start_date`, `end_date`, `trip_price`, `max_participants`, `status`, `images`, `created_at`, `updated_at`, `category_id`, `places`) VALUES
(11, 'plage oued-elGeub ', 'srd', 'Randonnée découverte à la magnifique plage de Oued El-Gueb à Séraidi', '2023-05-13', '2023-05-14', 800.00, 70, 0, '1684003577_0.jpg', '2023-05-13 15:17:27', '2023-05-21 06:03:55', 6, 2),
(13, 'plage SOFIA geurbaz', 'randonnée', 'Profitez du soleil et dessinez un sourire chez un patient n a pas de prix...\r\nAU PROGRAMME :\r\n▪️Randonnée pédestre\r\n▪️Beach volley\r\n▪️Jeux de groupe\r\n▪️Animation musicale\r\n-Distance:8km\r\n-Difficulté:7/10', '2023-05-13', '2023-05-13', 1000.00, 100, 0, '1683999416_0.jpg', '2023-05-13 17:36:56', '2023-05-20 21:08:05', 7, 2),
(14, 'plage REDMA chetaibi', 'kayak', 'Journée plage Redma & kayak les 07 grottes guelguemiz\r\njournée à la plage ( Redma chetaibi) .\r\n- créneau kayak de 01:00 a 01:30 avec tout le matériel fournis ainsi que des gilets de sauvetage.\r\n- Activités : Beach-Volley et jeux de groupe (selon la nature du site)\r\n- Temps libre, Baignade , relaxation .', '2023-06-18', '2023-06-18', 1200.00, 80, 0, '1684004286_0.jpg', '2023-05-13 18:39:21', '2023-05-20 21:21:13', 8, 3),
(15, 'ain barbar Lac Marj ain-zana ', 'brbr', 'Randonnée semi urbaine à ain Barbar à la découverte du Lac Marj Ain Zana \r\n- PARCOURS : 12KM\r\n-DIFFICULTE:7/10\r\nÀ prévoir :\r\n• Chaussure de randonnée\r\n• Une veste imperméable\r\n• vos besoins nutritionnels ( de l’eau et votre déjeuner)', '2023-05-13', '2023-05-13', 1500.00, 50, 0, '1684005828_0.jpg', '2023-05-13 19:23:48', '2023-05-20 21:20:29', 9, 2),
(16, 'cascade 2', 'csd2', 'Randonnée découverte à la cascade 02 et au milieu naturel et sauvage de la forêt de lÉdough\r\n- PARCOURS : 13KM\r\n-Difficulté:9/10\r\nÀ prévoir :\r\n• Chaussure de randonnée\r\n• Une veste imperméable\r\n• vos besoins nutritionnels ( de leau et votre déjeuner)', '2023-06-15', '2023-05-15', 1500.00, 80, 0, '1684007918_0.jpg', '2023-05-13 19:58:38', '2023-05-20 21:12:53', 10, 2),
(23, 'DRAA NAGA ', 'drng', 'Camping au cœur de la forêt de Draa Naga ( ElMridj ) à Constantine\r\nDifficulté:6/10\r\nCe programme comprend :\r\n/Transport/ Un guide/ Equipe dencadrement/Assurance\r\nÀ prévoir :\r\nDes vêtements chauds/Une veste imperméable/vos besoins nutritionnels/Matériel de camping', '2023-06-01', '2023-06-02', 800.00, 20, 0, '1685541534_0.jpg', '2023-05-31 13:58:54', '2023-05-31 13:58:54', 12, 0),
(24, 'SETIF', 'stf', 'Une visite culturelle à l antique cité romaine de Djemila afin de simprégner du côté patrimonial et historique de la ville suivie d une virée vers Parc Mall où shopping et jeux d attraction vous attendront\r\n-DÉPART : à 5h:30 du matin\r\n-ARRIVÉ: à 22:00\r\nPROGRAMME :10h:30 : Visite de l antique cité de Djemila / 13h00 : Visite Park Mall - Sétif / 16h:30 : Retour vers Annaba\r\nCe circuit comprend : Transport par Bus confortable / Equipe d encadrement/ Assurance', '2023-06-03', '2023-06-03', 1000.00, 40, 0, '1685542255_0.jpg', '2023-05-31 14:10:55', '2023-05-31 14:10:55', 11, 0),
(25, 'cascade 5', 'csd5', 'Randonnée découverte à la cascade 05 et au milieu naturel et sauvage de la forêt de lÉdough  \r\nPARCOURS : 14KM ( maximum)\r\n- Durée : de 9h00 jusquà 16h00\r\n- DIFFICULTÉ : Moyenne 7/10\r\nL argent collecté sera utilisé pour l achat des pompes à Desferal au profit des personnes atteintes d hemoglobinopathies congénitales lors des séances de transfusion. ', '2023-05-27', '2023-05-27', 600.00, 20, 0, '1685542849_0.jpg', '2023-05-31 14:20:49', '2023-05-31 14:20:49', 13, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_as` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(6, 'liwae ', 'LIWAE@gmail.com', 660316628, '12345', NULL, '2023-05-20 20:54:43'),
(7, 'liwae df', 'liwaedf@gmail.com', 660316628, '12345', NULL, '2023-05-21 06:02:28'),
(8, 'zaineb ', 'zainebdjellal@gmail.com', 671332456, 'zaineb', NULL, '2023-05-29 14:15:46');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trip_id` (`trip_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
