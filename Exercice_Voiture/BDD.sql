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


-- Listage de la structure de la base pour auto_dl8
CREATE DATABASE IF NOT EXISTS `auto_dl8` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `auto_dl8`;

-- Listage de la structure de la table auto_dl8. colorer
CREATE TABLE IF NOT EXISTS `colorer` (
  `id_couleur` int(11) NOT NULL,
  `id_voiture` int(11) NOT NULL,
  PRIMARY KEY (`id_couleur`,`id_voiture`),
  KEY `colorer_voitures0_FK` (`id_voiture`),
  CONSTRAINT `colorer_couleur_FK` FOREIGN KEY (`id_couleur`) REFERENCES `couleur` (`id_couleur`),
  CONSTRAINT `colorer_voitures0_FK` FOREIGN KEY (`id_voiture`) REFERENCES `voitures` (`id_voiture`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table auto_dl8.colorer : ~8 rows (environ)
/*!40000 ALTER TABLE `colorer` DISABLE KEYS */;
INSERT INTO `colorer` (`id_couleur`, `id_voiture`) VALUES
	(4, 1),
	(1, 3),
	(2, 4),
	(1, 5),
	(2, 5),
	(1, 6),
	(2, 6),
	(2, 9),
	(3, 10);
/*!40000 ALTER TABLE `colorer` ENABLE KEYS */;

-- Listage de la structure de la table auto_dl8. couleur
CREATE TABLE IF NOT EXISTS `couleur` (
  `id_couleur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_couleur` varchar(50) NOT NULL,
  PRIMARY KEY (`id_couleur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table auto_dl8.couleur : ~4 rows (environ)
/*!40000 ALTER TABLE `couleur` DISABLE KEYS */;
INSERT INTO `couleur` (`id_couleur`, `nom_couleur`) VALUES
	(1, 'Rouge'),
	(2, 'Gris'),
	(3, 'Noir'),
	(4, 'Blanc');
/*!40000 ALTER TABLE `couleur` ENABLE KEYS */;

-- Listage de la structure de la table auto_dl8. marque
CREATE TABLE IF NOT EXISTS `marque` (
  `id_marque` int(11) NOT NULL AUTO_INCREMENT,
  `nom_marque` varchar(50) NOT NULL,
  `id_pays` int(11) NOT NULL,
  PRIMARY KEY (`id_marque`),
  KEY `marque_origine_FK` (`id_pays`),
  CONSTRAINT `marque_origine_FK` FOREIGN KEY (`id_pays`) REFERENCES `origine` (`id_pays`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Listage des données de la table auto_dl8.marque : ~11 rows (environ)
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` (`id_marque`, `nom_marque`, `id_pays`) VALUES
	(1, 'Peugeot', 1),
	(2, 'Renault', 1),
	(3, 'Volkswagen', 2),
	(4, 'Toyota', 3),
	(5, 'Audi', 2),
	(6, 'Tesla', 4),
	(7, 'Dodge', 4),
	(8, 'Buick', 4),
	(9, 'Honda', 3),
	(10, 'Citroen', 1),
	(11, 'Opel', 2);
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;

-- Listage de la structure de la table auto_dl8. modele
CREATE TABLE IF NOT EXISTS `modele` (
  `id_modele` int(11) NOT NULL AUTO_INCREMENT,
  `nom_modele` varchar(50) NOT NULL,
  `id_marque` int(11) NOT NULL,
  PRIMARY KEY (`id_modele`),
  KEY `modele_marque_FK` (`id_marque`),
  CONSTRAINT `modele_marque_FK` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Listage des données de la table auto_dl8.modele : ~29 rows (environ)
/*!40000 ALTER TABLE `modele` DISABLE KEYS */;
INSERT INTO `modele` (`id_modele`, `nom_modele`, `id_marque`) VALUES
	(1, 'C3', 10),
	(2, 'Clio', 2),
	(3, 'Megane', 2),
	(4, '206', 1),
	(5, '208', 1),
	(6, '3008', 1),
	(7, 'C1', 10),
	(8, 'C4', 10),
	(9, 'Century', 8),
	(10, 'Electra', 8),
	(11, 'Invicta', 8),
	(12, 'Challenger', 7),
	(13, 'Charger', 7),
	(14, 'Model 3', 6),
	(15, 'Model S', 6),
	(16, 'Model X', 6),
	(17, 'A4', 5),
	(18, 'A6', 5),
	(19, 'R8', 5),
	(20, 'Civic', 9),
	(21, 'HR-V', 9),
	(22, 'NSX', 9),
	(23, 'Corolla', 4),
	(24, 'Camry', 4),
	(25, 'C-HR', 4),
	(26, 'Golf', 3),
	(27, 'Passat', 3),
	(28, 'Polo', 3),
	(29, 'Astra', 11),
	(30, 'Insignia', 11),
	(31, 'Corsa', 11);
/*!40000 ALTER TABLE `modele` ENABLE KEYS */;

-- Listage de la structure de la table auto_dl8. motorisation
CREATE TABLE IF NOT EXISTS `motorisation` (
  `id_motorisation` int(11) NOT NULL AUTO_INCREMENT,
  `nom_motorisation` varchar(50) NOT NULL,
  PRIMARY KEY (`id_motorisation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table auto_dl8.motorisation : ~4 rows (environ)
/*!40000 ALTER TABLE `motorisation` DISABLE KEYS */;
INSERT INTO `motorisation` (`id_motorisation`, `nom_motorisation`) VALUES
	(1, 'Essence'),
	(2, 'Diesel'),
	(3, 'Hybride'),
	(4, 'Electrique');
/*!40000 ALTER TABLE `motorisation` ENABLE KEYS */;

-- Listage de la structure de la table auto_dl8. origine
CREATE TABLE IF NOT EXISTS `origine` (
  `id_pays` int(11) NOT NULL AUTO_INCREMENT,
  `pays` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pays`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table auto_dl8.origine : ~4 rows (environ)
/*!40000 ALTER TABLE `origine` DISABLE KEYS */;
INSERT INTO `origine` (`id_pays`, `pays`) VALUES
	(1, 'France'),
	(2, 'Allemagne'),
	(3, 'Japon'),
	(4, 'USA');
/*!40000 ALTER TABLE `origine` ENABLE KEYS */;

-- Listage de la structure de la table auto_dl8. voitures
CREATE TABLE IF NOT EXISTS `voitures` (
  `id_voiture` int(11) NOT NULL AUTO_INCREMENT,
  `plaque_immatriculation` varchar(10) NOT NULL,
  `nb_portes` int(11) NOT NULL,
  `id_motorisation` int(11) NOT NULL,
  `id_modele` int(11) NOT NULL,
  PRIMARY KEY (`id_voiture`),
  KEY `voitures_motorisation_FK` (`id_motorisation`),
  KEY `voitures_modele0_FK` (`id_modele`),
  CONSTRAINT `voitures_modele0_FK` FOREIGN KEY (`id_modele`) REFERENCES `modele` (`id_modele`),
  CONSTRAINT `voitures_motorisation_FK` FOREIGN KEY (`id_motorisation`) REFERENCES `motorisation` (`id_motorisation`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table auto_dl8.voitures : ~10 rows (environ)
/*!40000 ALTER TABLE `voitures` DISABLE KEYS */;
INSERT INTO `voitures` (`id_voiture`, `plaque_immatriculation`, `nb_portes`, `id_motorisation`, `id_modele`) VALUES
	(1, 'OL_123_DE', 3, 2, 4),
	(2, 'PO_345_LE', 5, 2, 4),
	(3, 'ME_098_YG', 5, 1, 4),
	(4, 'MP_678_LK', 5, 1, 2),
	(5, 'OC_234_JH', 5, 2, 3),
	(6, 'CJ_341_LA', 5, 3, 28),
	(7, 'JA_452_CV', 5, 4, 14),
	(8, 'PO_645_KH', 5, 4, 15),
	(9, 'RV_762_KL', 5, 4, 16),
	(10, 'VB_345_HG', 3, 3, 29);
/*!40000 ALTER TABLE `voitures` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
