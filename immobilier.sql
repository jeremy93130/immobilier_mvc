-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 fév. 2024 à 16:51
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
  `id_bien` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(300) NOT NULL,
  `nb_pieces` int(11) NOT NULL,
  `surface` float NOT NULL,
  `style` enum('Maison','Appartement','Villa','Garage','Local commercial') NOT NULL,
  `parking` enum('oui','non') NOT NULL,
  `garage` enum('oui','non') NOT NULL,
  `prix_vente` float DEFAULT NULL,
  `loyer_HC` float DEFAULT NULL,
  `loyer_CC` float DEFAULT NULL,
  `consommation` enum('A','B','C','D','E','F','G') NOT NULL,
  `zone` enum('industrielle','urbaine','rurale','pole activite') NOT NULL,
  `ascenseur` enum('oui','non') NOT NULL,
  `etage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bien`
--

INSERT INTO `bien` (`id_bien`, `titre`, `code_postal`, `ville`, `nb_pieces`, `surface`, `style`, `parking`, `garage`, `prix_vente`, `loyer_HC`, `loyer_CC`, `consommation`, `zone`, `ascenseur`, `etage`) VALUES
(1, 'test', 94400, 'Vitry-sur-seine', 2, 45, 'Appartement', 'non', 'non', 0, 0, 850, 'D', 'urbaine', 'non', 0);

-- --------------------------------------------------------

--
-- Structure de la table `personne_additionnelle`
--

CREATE TABLE `personne_additionnelle` (
  `id_personne_additionnelle` int(11) NOT NULL,
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
  `id_postulant` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `genre` enum('M.','MME') NOT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(300) NOT NULL,
  `date_naissance` date NOT NULL,
  `profession` varchar(300) NOT NULL,
  `salaire` float NOT NULL,
  `telephone` int(11) NOT NULL,
  `admin` enum('oui','non') NOT NULL DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postulant`
--

INSERT INTO `postulant` (`id_postulant`, `nom`, `prenom`, `genre`, `email`, `mot_de_passe`, `date_naissance`, `profession`, `salaire`, `telephone`, `admin`) VALUES
(1, 'Dubrulle', 'Jeremy', 'M.', 'jeremy@mail.fr', 'jeremy', '1992-05-11', 'chomeur', 2000, 102030405, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `postulant_bien`
--

CREATE TABLE `postulant_bien` (
  `id_postulant_bien` int(11) NOT NULL,
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
  ADD PRIMARY KEY (`id_bien`);

--
-- Index pour la table `personne_additionnelle`
--
ALTER TABLE `personne_additionnelle`
  ADD PRIMARY KEY (`id_personne_additionnelle`),
  ADD KEY `postulant_id` (`postulant_id`);

--
-- Index pour la table `postulant`
--
ALTER TABLE `postulant`
  ADD PRIMARY KEY (`id_postulant`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `postulant_bien`
--
ALTER TABLE `postulant_bien`
  ADD PRIMARY KEY (`id_postulant_bien`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bien`
--
ALTER TABLE `bien`
  MODIFY `id_bien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `personne_additionnelle`
--
ALTER TABLE `personne_additionnelle`
  MODIFY `id_personne_additionnelle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `postulant`
--
ALTER TABLE `postulant`
  MODIFY `id_postulant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `postulant_bien`
--
ALTER TABLE `postulant_bien`
  MODIFY `id_postulant_bien` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personne_additionnelle`
--
ALTER TABLE `personne_additionnelle`
  ADD CONSTRAINT `personne_additionnelle_ibfk_1` FOREIGN KEY (`postulant_id`) REFERENCES `postulant` (`id_postulant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
