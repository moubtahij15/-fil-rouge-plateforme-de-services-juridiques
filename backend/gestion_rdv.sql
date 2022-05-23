-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 avr. 2022 à 13:24
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_rdv_cabinet`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `age`, `date_naissance`, `email`) VALUES
('7c1899015ba933f4d452b9a7406c6de9', 'apaah', 'bansa', 4, '2018-03-03', 'saad.sayeh04@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `id_creneau` int(100) NOT NULL,
  `heure_debut` time(2) NOT NULL,
  `heure_fin` time(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`id_creneau`, `heure_debut`, `heure_fin`) VALUES
(1, '09:00:00.00', '09:30:00.00'),
(2, '10:00:00.00', '10:30:00.00'),
(3, '11:00:00.00', '11:30:00.00'),
(4, '12:00:00.00', '12:30:00.00'),
(5, '14:00:00.00', '14:30:00.00'),
(6, '15:00:00.00', '15:30:00.00'),
(7, '16:00:00.00', '16:30:00.00'),
(8, '17:00:00.00', '17:30:00.00');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id_RDV` int(100) NOT NULL,
  `sjt_RDV` varchar(100) NOT NULL,
  `date_creneau` date NOT NULL,
  `id_client` varchar(100) NOT NULL,
  `id_creneau` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id_RDV`, `sjt_RDV`, `date_creneau`, `id_client`, `id_creneau`) VALUES
(6, 'oppp', '2022-03-29', '7c1899015ba933f4d452b9a7406c6de9', 6),
(7, 'LKKFD', '2022-04-13', '7c1899015ba933f4d452b9a7406c6de9', 3),
(8, 'LKKFD', '2022-04-14', '7c1899015ba933f4d452b9a7406c6de9', 3),
(9, 'LKKFD', '2022-04-15', '7c1899015ba933f4d452b9a7406c6de9', 3),
(10, 'LKKFD', '2022-04-18', '7c1899015ba933f4d452b9a7406c6de9', 3),
(11, 'consultationsmdsp', '2022-03-30', '7c1899015ba933f4d452b9a7406c6de9', 1),
(12, 'ana', '2022-01-01', '7c1899015ba933f4d452b9a7406c6de9', 2),
(13, 'sfd', '2022-12-31', '7c1899015ba933f4d452b9a7406c6de9', 2),
(14, 'fdsfdf', '2019-01-04', '7c1899015ba933f4d452b9a7406c6de9', 7),
(15, 'fdsfdf', '2019-01-05', '7c1899015ba933f4d452b9a7406c6de9', 8),
(16, 'dsqdsq', '2021-02-01', '7c1899015ba933f4d452b9a7406c6de9', 3),
(18, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 4),
(19, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(20, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(21, 'dfdfds', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(22, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(23, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(24, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(25, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(26, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(27, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(28, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(29, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(30, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(31, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 4),
(32, 'dea', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 4),
(33, 'sdffd', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(34, 'sdfd', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(35, 'nk', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 1),
(36, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 1),
(37, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(38, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(39, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 4),
(40, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(41, 'qds', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(42, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 1),
(43, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(44, 'dsqqsd', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(45, 'dsqqsd', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(46, 'qsd', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 1),
(47, 'qsd', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 1),
(48, '', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(49, 'sdsq', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(50, 'dqf', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 1),
(51, 'sfddfsfds', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(52, 'FDFDS', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(53, 'sdqsd', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(54, 'sd', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(55, 'dsf', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(56, 'fdsdsf', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(57, 'sddsfds', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 2),
(58, 'dfsfds', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 3),
(59, 'dfsfds', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 5),
(60, 'dffds', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 1),
(61, 'fdsfds', '2021-03-02', '7c1899015ba933f4d452b9a7406c6de9', 3),
(62, 'sdffds', '0000-00-00', '7c1899015ba933f4d452b9a7406c6de9', 7),
(63, 'gfdgfdgf', '2023-03-02', '7c1899015ba933f4d452b9a7406c6de9', 3),
(64, 'saad.ddfsfdds@gmail.com', '2022-04-23', '7c1899015ba933f4d452b9a7406c6de9', 4),
(65, 'saad123333@gmail.com', '2022-04-11', '7c1899015ba933f4d452b9a7406c6de9', 5),
(66, 'ddfds', '2024-03-03', '7c1899015ba933f4d452b9a7406c6de9', 1),
(67, 'fdsfd', '2022-02-02', '7c1899015ba933f4d452b9a7406c6de9', 1),
(68, 'salam', '2019-02-02', '7c1899015ba933f4d452b9a7406c6de9', 6),
(69, 'qsdqsd', '2022-03-02', '7c1899015ba933f4d452b9a7406c6de9', 4),
(70, 'sqd', '2023-03-04', '7c1899015ba933f4d452b9a7406c6de9', 4),
(71, 'sqdsqd', '2022-02-02', '7c1899015ba933f4d452b9a7406c6de9', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD PRIMARY KEY (`id_creneau`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id_RDV`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_creneau` (`id_creneau`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `creneau`
--
ALTER TABLE `creneau`
  MODIFY `id_creneau` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id_RDV` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `rdv_ibfk_2` FOREIGN KEY (`id_creneau`) REFERENCES `creneau` (`id_creneau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
