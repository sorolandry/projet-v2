-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 août 2024 à 23:21
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `artisanpro`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheter`
--

CREATE TABLE `acheter` (
  `id_publicite` int(11) NOT NULL,
  `id_profil_artisan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url_imageadmin` text NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` enum('super_admin','admin_artisan','admin_client','admin_publicite') NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `prenom`, `email`, `mot_de_passe`, `role`, `date_creation`) VALUES
(3, 'Doe', 'John', 'admin@example.com', '$2y$10$69Oe6K8hIHgjQfNZFeLXKe7zYsMS.aDs/XyzixJH3KuCpBjzEX6FC', 'super_admin', '2024-08-12 13:28:12');

-- --------------------------------------------------------

--
-- Structure de la table `artisan`
--

CREATE TABLE `artisan` (
  `id_profil_artisan` int(11) NOT NULL,
  `description` text NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `numero_whatsapp` varchar(11) NOT NULL,
  `branche_d_activite` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `metier` varchar(200) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `commune` varchar(20) NOT NULL,
  `quartier` varchar(20) NOT NULL,
  `url_image` text NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  `mot_de_passe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `artisan`
--

INSERT INTO `artisan` (`id_profil_artisan`, `description`, `nom_complet`, `numero`, `numero_whatsapp`, `branche_d_activite`, `specialite`, `metier`, `ville`, `commune`, `quartier`, `url_image`, `latitude`, `longitude`, `mot_de_passe`) VALUES
(11, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Ouma Bassirou', '0700169566', '0700169566', 'hygiene-soins', 'Meuniers', 'Meuniers', 'Ferkessédougou', 'Attécoubé', 'residense', '', 5.35360000, -4.00120000, '$2y$10$KSDrc8FPs.a/1eOPz8K1d.ESZqn0UBlfF1PceEB9Ob8jPjG8aoDH.'),
(12, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Bamba Issouf', '0700169566', '0700169566', 'agro-alimentaire', 'Meuniers', 'Meuniers', 'Odienné', 'Treichville', 'gh', 'File_000 (1).png', 5.35360000, -4.00120000, '$2y$10$yWC32O8EIBoFgVCz44OswuUCHY5f1jTzmG8imwUMjuWhHx3lY/78S'),
(13, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Guy Samuel', '0700169561', '0707070707', 'mines-carrieres', 'Meuniers', 'Meuniers', 'Toumodi', 'Yopougon', '0707070707', 'File_000 (1).png', 5.39446000, -3.89661600, '$2y$10$z/dK5XCK1.NuQedg7LfVLevHEqYJNEw9YbrDKi5XlBL8lrJsAJBIi'),
(14, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Doumbia Moussa', '0707070707', '0707070707', 'mines-carrieres', 'Meuniers', 'menuisier', 'Toumodi', 'Yopougon', '0707070707', 'File_000 (1).png', 5.39446000, -3.89661600, '$2y$10$Q210X3P.g1bBzf6.v892CeLtcMXayGWZf6SOH4fYrDrWVfObcaagy'),
(15, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Bamaba Ibrahim', '0707070701', '0707070701', 'agro-alimentaire', 'coiffure-esthetique', 'menuisier', 'Katiola', 'Adjamé', '0707070701', 'uploads/File_000 (1).png', 5.39446000, -3.89661600, '$2y$10$H.048QdL4Lt8J/AWbCGWMuuDHE/Fa45w93jjpTJiyvk8jIpPhP22e'),
(16, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Bamba Issouf', '01010101012', '0101010101', 'mines-carrieres', 'coiffure-esthetique', 'Menuisier', 'Odienné', 'Marcory', 'Soleil', 'uploads/File_000 (1).png', 5.39453110, -3.89668080, '$2y$10$6uAx4r0F5MKdT.WeP3I1p.opgrgEI9W2Us2EGFlPcRc3oMtoMw.wG'),
(17, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Tanoh Wilfrid', '01020202020', '01020202020', 'mines-carrieres', 'restauration', 'Meuniers', 'Abidjan', 'Bingerville', '0101010101', 'File_000 (1).png', 5.40250000, -3.89480000, '$2y$10$6UuZH.hnZ6NyS1aDvi.FRefgk2atv4CaILGIXTCiLhiSj6oPMPIEq'),
(18, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Kouakou Binjamin', '02020205080', '02020205080', 'bois-assimiles', 'travail-bois', 'Meuniers', 'Abidjan', 'Abobo', 'residence', 'uploads/File_000 (1).png', 5.39202060, -3.89609110, '$2y$10$ryc2I5GQdJgSOB4I130RVuFMYfURcCGfjkDbIlG7kIB7b/ZSzXnve'),
(19, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Kipre Gerad', '0417632982', '0417632982', 'bois-assimiles', 'alimentation', 'Meuniers', 'Ferkessédougou', 'Attécoubé', 'hdgf', 'File_000 (1).png', 5.39202060, -3.89609110, '$2y$10$FPJtjLCvs18C6U2yBqfZHO6dzu1F08V39Pgw8HOMfrPu7PtX9HJ9i'),
(20, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Soro abou', '010101003', '010101003', 'agro-alimentaire', 'constructions-metalliques', 'meuniers', 'Yamoussoukro', 'Adjamé', '010101003', 'File_000 (1).png', 5.39446000, -3.89661600, '$2y$10$.63RtzDYCT9uoWAMJ3oKTu1AgG.GqGVhYOR6ouvD2s1QT6w1oTs2S'),
(21, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Bamba Boukari', '01010101021', '0101010101', 'agro-alimentaire', 'alimentation', 'meuniers', 'Abidjan', 'Bingerville', 'Cite performer', 'profil.png', 5.39202060, -3.89609110, '$2y$10$yMhwALpu./a9BEsvNOqguO72QwoWlmMBsJwIPD8ZcBopEaNDlP2Wi'),
(22, '                Entre l’agriculteur et le boulanger, il est un maillon indispensable pour la qualité du produit final : le meunier et son assemblage pour fabriquer des farines.        ', 'Bamba DAOUDA', '0101010101', '0101010101', 'agro-alimentaire', 'alimentation', 'meuniers', 'Abidjan', 'Bingerville', 'Cite performer', '1.jpg', 5.39202060, -3.89609110, '$2y$10$DVT4ENZyCpXTF3BYOF3VOe9xbS19XHSXQQxGKyDrwkO8Fzh.F83k6'),
(23, 'Je suis artisan meunier, et ma passion est de transformer le grain en farine, un élément essentiel pour créer du pain et d\'autres délices culinaires. Avec une connaissance approfondie des grains et des techniques de mouture, je m\'engage à fournir une farine de la plus haute qualité, pleine de saveur et de fraîcheur.', 'Moussa Bamba', '01010101010', '01010101010', 'agro-alimentaire', 'alimentation', 'meuniers', 'Abidjan', 'Bingerville', 'Cite Performer', 'profil.png', 5.39446000, -3.89661600, '$2y$10$Kwvknxy2R.HBgVeCEafyOeOeUv80vt9l2hNeYN84.aU.GwoyOln6q'),
(24, '', 'Bamba Isouf', '01010101010', '01010101010', 'mines-carrieres', 'alimentation', 'meuniers', 'Abidjan', 'Bingerville', 'Cite Performer', 'profil.png', 5.39446000, -3.89661600, '$2y$10$Qh.bVY64k6MqMaU8Kl3HxuGqngYShkwJHItdeYEsxPaV9DUfGQMDK'),
(25, '', 'Bamba Boukari', '05025255', '01010101', 'agro-alimentaire', 'alimentation', 'meuniers', 'Abidjan', 'Bingerville', 'nfhhf', 'profil.png', 5.39202060, -3.89609110, '$2y$10$eI4xZvB1.728OuLZCiwjQe4wgwq2i.291Qb8l4vmmeuPosBaRYVWe');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `commune` varchar(20) NOT NULL,
  `quartier` varchar(20) NOT NULL,
  `url_image` text NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `mot_de_passe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_complet`, `numero`, `ville`, `commune`, `quartier`, `url_image`, `latitude`, `longitude`, `mot_de_passe`) VALUES
(1, 'MOUSSA', '0700000001', 'Agboville', 'Port-Bouët', 'residence', '', 5.00000000, -4.00000000, '$2y$10$mQr.G3R.rR5sI9CzK3duOODQc1W3UQyFtoYUahvloaP8wZRzVITJS'),
(2, 'issouf', '0700169566', 'Abidjan', 'Bingerville', 'residence', 'uploads/File_000 (1).png', 5.00000000, -4.00000000, '$2y$10$vxaA3B9kD0YxMerpL0mdrOG6Ft.r55jD.Hj8ZNQ5L2Jp.ka44lHQ2'),
(3, 'ssss', '020525', 'Séguéla', 'Adjamé', '0101010101', '', 5.00000000, -4.00000000, '$2y$10$zZ9GMeI042JY.dq9FnnebuyyczLGtvULzIaeCQVpvv9/YyYKak6wS'),
(4, 'Dthe', '0102020202', 'Abidjan', 'Bingerville', '0101010101', 'profil.png', 5.40250000, -3.89480000, '$2y$10$YSKMgZADix1qpLSHB6IYde9NXKVFETWSlK4eyga1U8gQnP//ZeT6W'),
(5, 'Gode Binjamin', '0101010202', 'ABIDJAN', 'Bingerville', '0101010202', '1.jpg', 5.39446000, -3.89661600, '$2y$10$6Du4W9suHe6HlkNJuRn5nuVHIFhh.qVRLKUFYk7k28pTG.kC.I85.');

-- --------------------------------------------------------

--
-- Structure de la table `demander`
--

CREATE TABLE `demander` (
  `id_service` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_artisan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offrir`
--

CREATE TABLE `offrir` (
  `id_service` int(11) NOT NULL,
  `id_profil_artisan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pack_publicitaire`
--

CREATE TABLE `pack_publicitaire` (
  `id_publicite` int(11) NOT NULL,
  `titre` int(200) NOT NULL,
  `pack_publicitaire` varchar(200) NOT NULL,
  `budget` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(11) NOT NULL,
  `Text` text NOT NULL,
  `url_image` varchar(50) NOT NULL,
  `date_publication` date NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_profil_artisan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `metier` varchar(200) NOT NULL,
  `description_Besoin` text NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `radius` int(11) NOT NULL,
  `date_de_demande` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `id_client`, `metier`, `description_Besoin`, `latitude`, `longitude`, `radius`, `date_de_demande`) VALUES
(62, 5, 'meuniers', 'knjhbvgcfdx', 0.00000000, 0.00000000, 1000, '2024-08-18'),
(63, 5, 'meuniers', 'knjhbvgcfdx', 0.00000000, 0.00000000, 1000, '2024-08-18'),
(64, 5, 'meuniers', 'kijuyhtrfd', 0.00000000, 0.00000000, 1000, '2024-08-18'),
(65, 5, 'meuniers', 'x', 0.00000000, 0.00000000, 1000, '2024-08-18'),
(66, 4, 'meuniers', 'h', 0.00000000, 0.00000000, 1000, '2024-08-18'),
(67, 5, 'meuniers', 'oiuytghj', 0.00000000, 0.00000000, 1000, '2024-08-18'),
(68, 5, 'meuniers', 'oiuytghj', 0.00000000, 0.00000000, 1000, '2024-08-18'),
(69, 5, 'meuniers', 'kjuhyghjk;', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(70, 5, 'meuniers', 'kjuhyghjk;qazsertfg', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(71, 5, 'meuniers', 'kjuhyghjk;qazsertfg', 0.00000000, 0.00000000, 1000, '2024-08-18'),
(72, 5, 'meuniers', 'kjuhyghjk;qazsertfg', 0.00000000, 0.00000000, 1000, '2024-08-18'),
(73, 5, 'meuniers', 'KJHGTFG', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(74, 5, 'meuniers', 'loi_uèy-t', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(75, 5, 'meuniers', 'loi_uèy-t', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(76, 5, 'meuniers', 'kado', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(77, 5, 'meuniers', 'kado gdb ', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(78, 5, 'meuniers', 'kado gdb kjhgfd', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(79, 5, 'meuniers', 'kado gdb kjhgfd', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(80, 5, 'meuniers', 'Bonjour', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(81, 5, 'meuniers', 'kuytrdefghj', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(82, 5, 'meuniers', 'kuytrdefghj', 0.00000000, 0.00000000, 1000, '2024-08-18'),
(83, 5, 'meuniers', 'kuytrdefghj', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(84, 5, 'meuniers', 'kuytrdefghj', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(85, 5, 'meuniers', 'kuytrdefghj', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(86, 4, 'meuniers', 'h', 5.39202060, -3.89609110, 1000, '2024-08-18'),
(87, 4, 'meuniers', 'oiuy', 5.39202060, -3.89609110, 1000, '2024-08-18'),
(88, 5, 'meuniers', 'nhbgfdfty', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(89, 4, 'meuniers', 'Quelles sont les missions du meunier ? Quelle formation suivre pour exercer ce métier ? Quels sont ses débouchés et son salaire ? Les réponses vous sont apportées par cette fiche métier de meunier.', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(90, 4, 'meuniers', 'Quelles sont les missions du meunier ? Quelle formation suivre pour exercer ce métier ? Quels sont ses débouchés et son salaire ? Les réponses vous sont apportées par cette fiche métier de meunier. Sommaire. Métier de meunier. « Meunier tu dors, ton moulin, ton moulin va trop vite ».', 5.39446000, -3.89661600, 1000, '2024-08-18'),
(91, 4, 'meuniers', 'Quelles sont les missions du meunier ? Quelle formation suivre pour exercer ce métier ? Quels sont ses débouchés et son salaire ? Les réponses vous sont apportées par cette fiche métier de meunier. Sommaire. Métier de meunier. « Meunier tu dors, ton moulin, ton moulin va trop vite ».', 0.00000000, 0.00000000, 1000, '2024-08-18'),
(92, 5, 'meuniers', 'besoin', 5.39446000, -3.89661600, 1000, '2024-08-19'),
(93, 5, 'meuniers', 'besoin', 5.39446000, -3.89661600, 1000, '2024-08-19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acheter`
--
ALTER TABLE `acheter`
  ADD PRIMARY KEY (`id_publicite`,`id_profil_artisan`),
  ADD KEY `acheter_Artisan0_FK` (`id_profil_artisan`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `artisan`
--
ALTER TABLE `artisan`
  ADD PRIMARY KEY (`id_profil_artisan`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `demander`
--
ALTER TABLE `demander`
  ADD PRIMARY KEY (`id_service`,`id_client`),
  ADD KEY `demander_Client0_FK` (`id_client`),
  ADD KEY `fk_demander_artisan` (`id_artisan`);

--
-- Index pour la table `offrir`
--
ALTER TABLE `offrir`
  ADD PRIMARY KEY (`id_service`,`id_profil_artisan`),
  ADD KEY `Offrir_Artisan0_FK` (`id_profil_artisan`);

--
-- Index pour la table `pack_publicitaire`
--
ALTER TABLE `pack_publicitaire`
  ADD PRIMARY KEY (`id_publicite`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`),
  ADD KEY `Publication_Service_FK` (`id_service`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `artisan`
--
ALTER TABLE `artisan`
  MODIFY `id_profil_artisan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pack_publicitaire`
--
ALTER TABLE `pack_publicitaire`
  MODIFY `id_publicite` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acheter`
--
ALTER TABLE `acheter`
  ADD CONSTRAINT `acheter_Artisan0_FK` FOREIGN KEY (`id_profil_artisan`) REFERENCES `artisan` (`id_profil_artisan`),
  ADD CONSTRAINT `acheter_Pack_publicitaire_FK` FOREIGN KEY (`id_publicite`) REFERENCES `pack_publicitaire` (`id_publicite`);

--
-- Contraintes pour la table `demander`
--
ALTER TABLE `demander`
  ADD CONSTRAINT `demander_Client0_FK` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `demander_Service_FK` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`),
  ADD CONSTRAINT `fk_demander_artisan` FOREIGN KEY (`id_artisan`) REFERENCES `artisan` (`id_profil_artisan`);

--
-- Contraintes pour la table `offrir`
--
ALTER TABLE `offrir`
  ADD CONSTRAINT `Offrir_Artisan0_FK` FOREIGN KEY (`id_profil_artisan`) REFERENCES `artisan` (`id_profil_artisan`),
  ADD CONSTRAINT `Offrir_Service_FK` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `Publication_Service_FK` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
