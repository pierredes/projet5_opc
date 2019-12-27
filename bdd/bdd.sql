-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 27 déc. 2019 à 15:08
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet5`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` longtext NOT NULL,
  `date` timestamp NOT NULL,
  `numero_post` int(11) NOT NULL,
  `valider` tinyint(1) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_utilisateur` (`id_utilisateur`),
  KEY `fk_numero_post` (`numero_post`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `contenu`, `date`, `numero_post`, `valider`, `id_utilisateur`) VALUES
(1, 'test1', '2019-12-08 23:00:00', 2, 1, 3),
(2, 'test2', '2019-12-10 23:00:00', 2, 0, 3),
(3, 'test3', '2019-12-08 23:00:00', 3, 0, 3),
(4, 'test4', '2019-12-10 23:00:00', 3, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `numero_post` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `date_maj` timestamp NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`numero_post`),
  KEY `fk_id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`numero_post`, `titre`, `chapo`, `contenu`, `date_maj`, `id_utilisateur`) VALUES
(2, 'post 1', 'loremloremloremloremloremlorem', 'loremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremlorem', '2019-12-01 23:00:00', 3),
(3, 'post 2', 'loremloremloremloremloremlorem', 'loremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremloremlorem', '2019-12-01 23:00:00', 4);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `mdp`, `admin`) VALUES
(3, 'desombre', 'pierre', 'pierre.desombre@wanadoo.fr', 'azerty', 1),
(4, 'desombre', 'paul', 'paul.desombre@wanadoo.fr', 'azerty', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_id_utilisateur_commentaire` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `fk_numero_post` FOREIGN KEY (`numero_post`) REFERENCES `posts` (`numero_post`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_id_utilisateur_posts` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
