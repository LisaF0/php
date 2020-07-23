-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour cinema_dl8_lf
CREATE DATABASE IF NOT EXISTS `cinema_dl8_lf` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cinema_dl8_lf`;

-- Listage de la structure de la table cinema_dl8_lf. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_acteur` varchar(50) NOT NULL,
  `prenom_acteur` varchar(50) NOT NULL,
  `sexe_acteur` varchar(15) NOT NULL,
  `birthday_acteur` date NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_dl8_lf.acteur : ~6 rows (environ)
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` (`id_acteur`, `nom_acteur`, `prenom_acteur`, `sexe_acteur`, `birthday_acteur`) VALUES
	(1, 'Hamill', 'Mark', 'masculin', '1951-09-25'),
	(2, 'Fisher', 'Carrie', 'féminin', '1956-10-21'),
	(3, 'Ford', 'Harrison', 'masculin', '1942-07-13'),
	(4, 'Craig', 'Daniel', 'masculin', '1970-12-31'),
	(5, 'Brosnan', 'Pierce', 'masculin', '1970-05-19'),
	(6, 'Portman', 'Natalie', 'féminin', '1981-06-09');
/*!40000 ALTER TABLE `acteur` ENABLE KEYS */;

-- Listage de la structure de la table cinema_dl8_lf. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  KEY `casting_acteur0_FK` (`id_acteur`),
  KEY `casting_role1_FK` (`id_role`),
  CONSTRAINT `casting_Film_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_acteur0_FK` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `casting_role1_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_dl8_lf.casting : ~8 rows (environ)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 1),
	(2, 1, 1),
	(6, 1, 1),
	(7, 1, 1),
	(1, 2, 2),
	(1, 3, 3),
	(1, 4, 4),
	(8, 4, 4),
	(10, 4, 4),
	(9, 5, 4),
	(1, 6, 2);
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Listage de la structure de la table cinema_dl8_lf. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) NOT NULL,
  `annee_sortie` year(4) NOT NULL,
  `duree` int(11) NOT NULL DEFAULT '0',
  `synopsis` text,
  `note` int(11) DEFAULT NULL,
  `affiche` varchar(250) DEFAULT NULL,
  `id_realisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `Film_realisateur_FK` (`id_realisateur`),
  CONSTRAINT `Film_realisateur_FK` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_dl8_lf.film : ~9 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre`, `annee_sortie`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'Star Wars IV : Un nouvel espoir', '1977', 121, '', NULL, NULL, 6),
	(2, 'Star Wars V : L\'empire contre attaque', '1980', 124, NULL, NULL, NULL, 1),
	(3, 'Star Wars VI : Le retour du Jedi', '1983', 134, NULL, NULL, NULL, 1),
	(4, 'Le Seigneur des Anneaux : La Communauté de l\'Anneau', '2001', 178, NULL, NULL, NULL, 2),
	(5, 'Le Seigneur des Anneaux : Les Deux Tours', '2002', 179, NULL, NULL, NULL, 2),
	(6, 'Le Seigneur des Anneaux : Le Retour du Roi', '2003', 201, NULL, NULL, NULL, 2),
	(7, 'Jurassic Park', '1993', 127, NULL, NULL, NULL, 3),
	(8, 'Casino Royale', '2006', 145, NULL, NULL, NULL, 5),
	(9, 'Golden Eye', '1995', 145, NULL, NULL, NULL, 5),
	(10, 'Spectre', '2015', 150, NULL, NULL, NULL, 4);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table cinema_dl8_lf. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_dl8_lf.genre : ~4 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `libelle`) VALUES
	(1, 'Science-Fiction'),
	(2, 'Fantastique'),
	(3, 'Aventure'),
	(4, 'Espionnage');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema_dl8_lf. posseder_genre
CREATE TABLE IF NOT EXISTS `posseder_genre` (
  `id_genre` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  PRIMARY KEY (`id_genre`,`id_film`),
  KEY `posseder_Film0_FK` (`id_film`),
  CONSTRAINT `posseder_Film0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `posseder_genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_dl8_lf.posseder_genre : ~13 rows (environ)
/*!40000 ALTER TABLE `posseder_genre` DISABLE KEYS */;
INSERT INTO `posseder_genre` (`id_genre`, `id_film`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(2, 4),
	(3, 4),
	(2, 5),
	(3, 5),
	(2, 6),
	(3, 6),
	(3, 7),
	(4, 8),
	(4, 9),
	(4, 10);
/*!40000 ALTER TABLE `posseder_genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema_dl8_lf. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_realisateur` varchar(50) NOT NULL,
  `prenom_realisateur` varchar(50) NOT NULL,
  `sexe_realisateur` varchar(15) NOT NULL,
  `birthday_realisateur` date NOT NULL,
  PRIMARY KEY (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_dl8_lf.realisateur : ~4 rows (environ)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`id_realisateur`, `nom_realisateur`, `prenom_realisateur`, `sexe_realisateur`, `birthday_realisateur`) VALUES
	(1, 'Lucas', 'Georges', 'masculin', '1944-05-14'),
	(2, 'Jackson', 'Peter', 'masculin', '1961-10-31'),
	(3, 'Spielberg', 'Steven', 'masculin', '1946-12-18'),
	(4, 'Mendes', 'Sam', 'masculin', '1965-08-01'),
	(5, 'Campbell', 'Martin', 'masculin', '1943-10-24'),
	(6, 'Portman', 'Natalie', 'féminin', '1981-06-09');
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Listage de la structure de la table cinema_dl8_lf. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(100) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_dl8_lf.role : ~4 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Luke Skywalker'),
	(2, 'Princess Leia'),
	(3, 'Han solo'),
	(4, 'James Bond');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
