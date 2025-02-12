-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 26 fév. 2024 à 14:58
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

CREATE TABLE `bien` (
  `id` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(300) NOT NULL,
  `nb_pieces` int(11) NOT NULL,
  `surface` float NOT NULL,
  `style` enum('Maison','Manoir','Appartement','Villa','Garage','Local commercial') NOT NULL,
  `parking` enum('oui','non') NOT NULL,
  `garage` enum('oui','non') NOT NULL,
  `prix_vente` float DEFAULT NULL,
  `loyer_HC` float DEFAULT NULL,
  `loyer_CC` float DEFAULT NULL,
  `consommation` enum('A','B','C','D','E','F','G') NOT NULL,
  `zone` enum('industrielle','urbaine','rurale','pole activite') NOT NULL,
  `ascenseur` enum('oui','non') NOT NULL,
  `etage` int(11) NOT NULL,
  `achat_location` enum('achat','location') NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bien`
--

INSERT INTO `bien` (`id`, `titre`, `description`, `code_postal`, `ville`, `nb_pieces`, `surface`, `style`, `parking`, `garage`, `prix_vente`, `loyer_HC`, `loyer_CC`, `consommation`, `zone`, `ascenseur`, `etage`, `achat_location`, `image`) VALUES
(2, 'Manoir Halliwell', 'Grand Manoir victorien appartenant aux soeurs Halliwell les meilleures sorcières du monde , attention aux attaques de démons !', 94400, 'Vitry-sur-Seine', 14, 465, 'Manoir', 'non', 'oui', 3000000, 0, 0, 'C', 'urbaine', 'non', 3, 'achat', '1708592121_halliwell.webp'),
(4, 'Manoir de Batman', 'Venez vivre des aventures folles dans ce manoir hanté par le joker et harley queen', 94400, 'Vitry-sur-Seine', 38, 6000, 'Manoir', 'oui', 'oui', 150000000, 0, 0, 'A', 'urbaine', 'non', 4, 'achat', '1708614243_batman.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `postulant_id` int(11) NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT current_timestamp(),
  `telephone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `postulant_id`, `date_message`, `telephone`, `email`) VALUES
(1, 'test', 3, '2024-02-26 08:21:39', '0102030405', 'jeremy@mail.fr'),
(2, 'Bonjour j\'aimerais avoir plus d\'informations sur Batman', 3, '2024-02-26 08:28:34', '0613451200', 'jeremy@mail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `personne_additionnelle`
--

CREATE TABLE `personne_additionnelle` (
  `id` int(11) NOT NULL,
  `genre` enum('M.','MME') NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `date_naissance` date NOT NULL,
  `profession` varchar(300) NOT NULL,
  `salaire` float NOT NULL,
  `postulant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `postulant`
--

CREATE TABLE `postulant` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `genre` enum('M.','MME') NOT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(300) NOT NULL,
  `date_naissance` date NOT NULL,
  `profession` varchar(300) DEFAULT NULL,
  `salaire` float DEFAULT NULL,
  `telephone` int(11) NOT NULL,
  `admin` enum('oui','non') NOT NULL DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postulant`
--

INSERT INTO `postulant` (`id`, `nom`, `prenom`, `genre`, `email`, `mot_de_passe`, `date_naissance`, `profession`, `salaire`, `telephone`, `admin`) VALUES
(2, 'Dubreuil', 'Nathan', 'M.', 'nathan@mail.com', '$2y$10$xbVYG8IhIVGWUCte1ZZQ7eGHInzhAK5GlwQROOxH79X/bPL3Sz2Dm', '1992-03-10', NULL, NULL, 102030405, 'non'),
(3, 'Dubrulle', 'Jeremy', 'M.', 'jeremy@mail.fr', '$2y$10$3uQejex.sWZZtdlB9maoEu2a5ewGoGAnXn1Yhz1qxEuXQocp.OVRi', '1992-05-11', 'Pompier', NULL, 102030405, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `postulant_bien`
--

CREATE TABLE `postulant_bien` (
  `id` int(11) NOT NULL,
  `postulant_id` int(11) NOT NULL,
  `bien_id` int(11) NOT NULL,
  `personne_additionnelle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bien`
--
ALTER TABLE `bien`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postulant_id` (`postulant_id`);

--
-- Index pour la table `personne_additionnelle`
--
ALTER TABLE `personne_additionnelle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postulant_id` (`postulant_id`);

--
-- Index pour la table `postulant`
--
ALTER TABLE `postulant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `postulant_bien`
--
ALTER TABLE `postulant_bien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bien`
--
ALTER TABLE `bien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personne_additionnelle`
--
ALTER TABLE `personne_additionnelle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `postulant`
--
ALTER TABLE `postulant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `postulant_bien`
--
ALTER TABLE `postulant_bien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`postulant_id`) REFERENCES `postulant` (`id`);

--
-- Contraintes pour la table `personne_additionnelle`
--
ALTER TABLE `personne_additionnelle`
  ADD CONSTRAINT `personne_additionnelle_ibfk_1` FOREIGN KEY (`postulant_id`) REFERENCES `postulant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
