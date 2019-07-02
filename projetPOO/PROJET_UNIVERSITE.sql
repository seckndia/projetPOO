-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 02 Juillet 2019 à 07:56
-- Version du serveur :  5.7.26-0ubuntu0.16.04.1
-- Version de PHP :  7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `PROJET_UNIVERSITE`
--

-- --------------------------------------------------------

--
-- Structure de la table `BATIMENT`
--

CREATE TABLE `BATIMENT` (
  `id_bat` int(11) NOT NULL,
  `num_bat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `BATIMENT`
--

INSERT INTO `BATIMENT` (`id_bat`, `num_bat`) VALUES
(1, 'B1'),
(2, 'B2');

-- --------------------------------------------------------

--
-- Structure de la table `BOURSIER`
--

CREATE TABLE `BOURSIER` (
  `id_brs` int(11) NOT NULL,
  `id_etu` int(100) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `BOURSIER`
--

INSERT INTO `BOURSIER` (`id_brs`, `id_etu`, `id_type`) VALUES
(1, 5, 1),
(3, 52, 1),
(4, 54, 1),
(5, 56, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `CHAMBRE`
--

CREATE TABLE `CHAMBRE` (
  `id_chambre` int(11) NOT NULL,
  `id_bat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `CHAMBRE`
--

INSERT INTO `CHAMBRE` (`id_chambre`, `id_bat`) VALUES
(1, 1),
(4, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ETUDIANT`
--

CREATE TABLE `ETUDIANT` (
  `id_etu` int(11) NOT NULL,
  `matricule` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` bigint(20) NOT NULL,
  `date_naiss` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ETUDIANT`
--

INSERT INTO `ETUDIANT` (`id_etu`, `matricule`, `nom`, `prenom`, `email`, `tel`, `date_naiss`) VALUES
(1, 'KD1001', 'ndiaye', 'khadija', 'ndiaye@gmail.com', 778963612, '2019-06-02'),
(3, 'YS1003', 'sow', 'yacine', 'sow@gmail.com', 778963214, '2019-06-02'),
(5, 'DM1036', 'diallo', 'mohamed', 'diallo@gmail.com', 778963612, '1996-02-06'),
(11, 'SA1037', 'sall', 'awa', 'diallo@gmail.com', 778963612, '1996-02-06'),
(24, 'IB1301', 'ndao', 'ibou', 'ndao@gmail.com', 778963214, '2019-06-03'),
(26, 'NP1302', 'dieme', 'jule', 'jule@jule', 778963214, '2019-06-19'),
(27, 'TM1302', 'thiam', 'kader', 'th@th', 778963, '2019-06-04'),
(28, 'LY10023', 'ly', 'yaya', 'li@gmail.com', 778963214, '2019-06-12'),
(29, 'DK1023', 'dia', 'lamine', 'lam@lam', 7789631, '2019-06-12'),
(44, 'KP1896', 'Sarr', 'babou', 'sar@gmail.com', 778963214, '2019-06-26'),
(45, 'Mb1205', 'mbacke', 'ami', 'ami@gmail.com', 778961212, '1996-02-13'),
(46, 'DJ1302', 'diene', 'jule', 'jul@gmail.com', 778963214, '2019-06-30'),
(51, 'SM1203', 'diop', 'seck', 'seck@gmail', 778961236, '2019-06-07'),
(52, 'KO1636', 'seck', 'mafal', 'fal@gmail.com', 77896321, '2019-06-23'),
(53, 'FM3696', 'camara', 'babacar', 'cam@gmail.com', 778963214, '1963-02-13'),
(54, 'MQ15963', 'ndiaye', 'dieyna', 'die@gmail.com', 778963214, '1993-02-13'),
(56, 'SL1306', 'sall', 'macky', 'mac@gmail.com', 778961542, '1993-06-13'),
(57, 'PM3692', 'ndiaye', 'dija', 'ndia@gmail.com', 778963214, '2019-06-25'),
(58, 'ML94789', 'ndiaye', 'maman', 'man@gmail.com', 779631247, '1993-06-13');

-- --------------------------------------------------------

--
-- Structure de la table `LOGER`
--

CREATE TABLE `LOGER` (
  `id_loge` int(11) NOT NULL,
  `id_etu` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `LOGER`
--

INSERT INTO `LOGER` (`id_loge`, `id_etu`, `id_chambre`) VALUES
(4, 51, 1),
(5, 52, 2),
(6, 56, 4);

-- --------------------------------------------------------

--
-- Structure de la table `NON_BOURSIER`
--

CREATE TABLE `NON_BOURSIER` (
  `id_etu` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `NON_BOURSIER`
--

INSERT INTO `NON_BOURSIER` (`id_etu`, `adresse`) VALUES
(1, 'camberene extension'),
(26, 'parcelles'),
(27, 'dddd'),
(28, 'fadia'),
(29, 'parcelles camberene'),
(44, 'pad\'oie'),
(46, 'THIAROY'),
(53, 'fass'),
(58, 'hlm');

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_bourse`
--

CREATE TABLE `TYPE_bourse` (
  `id_type` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `TYPE_bourse`
--

INSERT INTO `TYPE_bourse` (`id_type`, `libelle`, `montant`) VALUES
(1, 'entier', 40000),
(2, 'demi', 20000);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `BATIMENT`
--
ALTER TABLE `BATIMENT`
  ADD PRIMARY KEY (`id_bat`);

--
-- Index pour la table `BOURSIER`
--
ALTER TABLE `BOURSIER`
  ADD PRIMARY KEY (`id_brs`,`id_etu`),
  ADD KEY `matricule` (`id_etu`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_etu` (`id_etu`);

--
-- Index pour la table `CHAMBRE`
--
ALTER TABLE `CHAMBRE`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `id_bat` (`id_bat`);

--
-- Index pour la table `ETUDIANT`
--
ALTER TABLE `ETUDIANT`
  ADD PRIMARY KEY (`id_etu`,`matricule`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- Index pour la table `LOGER`
--
ALTER TABLE `LOGER`
  ADD PRIMARY KEY (`id_loge`,`id_etu`),
  ADD KEY `id_chambre` (`id_chambre`),
  ADD KEY `id_etu` (`id_etu`);

--
-- Index pour la table `NON_BOURSIER`
--
ALTER TABLE `NON_BOURSIER`
  ADD PRIMARY KEY (`id_etu`),
  ADD KEY `id_nbs` (`id_etu`);

--
-- Index pour la table `TYPE_bourse`
--
ALTER TABLE `TYPE_bourse`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `BATIMENT`
--
ALTER TABLE `BATIMENT`
  MODIFY `id_bat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `BOURSIER`
--
ALTER TABLE `BOURSIER`
  MODIFY `id_brs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `CHAMBRE`
--
ALTER TABLE `CHAMBRE`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `ETUDIANT`
--
ALTER TABLE `ETUDIANT`
  MODIFY `id_etu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `LOGER`
--
ALTER TABLE `LOGER`
  MODIFY `id_loge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `NON_BOURSIER`
--
ALTER TABLE `NON_BOURSIER`
  MODIFY `id_etu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `TYPE_bourse`
--
ALTER TABLE `TYPE_bourse`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `BOURSIER`
--
ALTER TABLE `BOURSIER`
  ADD CONSTRAINT `BOURSIER_ibfk_1` FOREIGN KEY (`id_etu`) REFERENCES `ETUDIANT` (`id_etu`),
  ADD CONSTRAINT `BOURSIER_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `TYPE_bourse` (`id_type`);

--
-- Contraintes pour la table `CHAMBRE`
--
ALTER TABLE `CHAMBRE`
  ADD CONSTRAINT `CHAMBRE_ibfk_1` FOREIGN KEY (`id_bat`) REFERENCES `BATIMENT` (`id_bat`);

--
-- Contraintes pour la table `LOGER`
--
ALTER TABLE `LOGER`
  ADD CONSTRAINT `LOGER_ibfk_1` FOREIGN KEY (`id_chambre`) REFERENCES `CHAMBRE` (`id_chambre`),
  ADD CONSTRAINT `LOGER_ibfk_2` FOREIGN KEY (`id_etu`) REFERENCES `ETUDIANT` (`id_etu`);

--
-- Contraintes pour la table `NON_BOURSIER`
--
ALTER TABLE `NON_BOURSIER`
  ADD CONSTRAINT `NON_BOURSIER_ibfk_1` FOREIGN KEY (`id_etu`) REFERENCES `ETUDIANT` (`id_etu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
