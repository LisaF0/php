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

-- Listage des données de la table cinema_dl8_lf.casting : ~14 rows (environ)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 1),
	(2, 1, 1),
	(6, 1, 1),
	(1, 2, 2),
	(4, 2, 3),
	(1, 3, 3),
	(3, 3, 1),
	(1, 4, 4),
	(5, 4, 1),
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
  `duree` int(11) DEFAULT '0',
  `synopsis` text,
  `note` int(11) DEFAULT NULL,
  `affiche` varchar(250) DEFAULT NULL,
  `id_realisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `Film_realisateur_FK` (`id_realisateur`),
  CONSTRAINT `Film_realisateur_FK` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_dl8_lf.film : ~10 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre`, `annee_sortie`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'Star Wars IV : Un nouvel espoir', '1977', 121, 'Il y a bien longtemps, dans une galaxie très lointaine. La guerre civile fait rage entre l\'Empire galactique et l\'Alliance rebelle. Capturée par les troupes de choc de l\'Empereur menées par le sombre et impitoyable Dark Vador, la princesse Leia Organa dissimule les plans de l\'Etoile Noire, une station spatiale invulnérable, à son droïde R2-D2 avec pour mission de les remettre au Jedi Obi-Wan Kenobi.', 5, 'sw4.jpg', 6),
	(2, 'Star Wars V : L\'empire contre attaque', '1980', 124, 'Malgré la destruction de l\'Etoile Noire, l\'Empire maintient son emprise sur la galaxie, et poursuit sans relâche sa lutte contre l\'Alliance rebelle. Basés sur la planète glacée de Hoth, les rebelles essuient un assaut des troupes impériales. Parvenus à s\'échapper, la princesse Leia, Han Solo, Chewbacca et C-3P0 se dirigent vers Bespin, la cité des nuages gouvernée par Lando Calrissian, ancien compagnon de Han.', 4, 'sw5.jpg', 1),
	(3, 'Star Wars VI : Le retour du Jedi', '1983', 134, 'L\'empire galactique est plus puissant que jamais : la construction de la nouvelle arme, l\'étoile de la mort, menace l\'univers tout entier... Han Solo est remis à l\'ignoble contrebandier Jabba le Hutt par le chasseur de primes Boba Fett. après l\'échec d\'une première tentative d\'évasion menée par la princesse Leia, également arrêtée par Jabba, Luke Skywalker et Lando parviennent à libérer leurs amis.', 3, 'sw6.jpg', 1),
	(4, 'Le Seigneur des Anneaux : La Communauté de l\'Anneau', '2001', 178, 'Un jeune et timide `Hobbit\', Frodon Sacquet, hérite d\'un anneau magique. Bien loin d\'être une simple babiole, il s\'agit d\'un instrument de pouvoir absolu qui permettrait à Sauron, le `Seigneur des ténèbres\', de régner sur la `Terre du Milieu\' et de réduire en esclavage ses peuples. Frodon doit parvenir jusqu\'à la `Crevasse du Destin\' pour détruire l\'anneau.', 4, 'la communaute.jpg', 2),
	(5, 'Le Seigneur des Anneaux : Les Deux Tours', '2002', 179, 'Après la mort de Boromir et la disparition de Gandalf, la `Communauté\' s\'est scindée en trois. Perdus dans les collines d\'`Emyn Muil\', Frodon et Sam découvrent qu\'ils sont suivis par Gollum, une créature versatile corrompue par l\'anneau magique. Gollum promet de conduire les `Hobbits\' jusqu\'à la `Porte Noire\' du `Mordor\'. A travers la `Terre du Milieu\', Aragorn, Legolas et Gimli font route vers le `Rohan\', le royaume assiégé de Theoden.', 5, 'les deux tours.jpg', 2),
	(6, 'Le Seigneur des Anneaux : Le Retour du Roi', '2003', 201, 'Les armées de Sauron ont attaqué `Minas Tirith\', la capitale de `Gondor\'. Jamais ce royaume autrefois puissant n\'a eu autant besoin de son roi. Cependant, Aragorn trouvera-t-il en lui la volonté d\'accomplir sa destinée ? Tandis que Gandalf s\'efforce de soutenir les forces brisées de Gondor, Théoden exhorte les guerriers de Rohan à se joindre au combat. Cependant, malgré leur courage et leur loyauté, les forces des Hommes ne sont pas de taille à lutter contre les innombrables légions d\'ennemis.', 4, 'le retour du roi.jpg', 2),
	(7, 'Jurassic Park', '1993', 127, 'Ne pas réveiller le chat qui dort, c\'est ce que le milliardaire John Hammond aurait dû se rappeler avant de se lancer dans le clonage de dinosaures. C\'est à partir d\'une goutte de sang absorbée par un moustique fossilisé que John Hammond et son équipe ont réussi à faire renaître une dizaine d\'espèces de dinosaures.', 2, 'jurassic park.jpg', 3),
	(8, 'Casino Royale', '2006', 145, 'Pour sa première mission, James Bond affronte le tout-puissant banquier privé du terrorisme international, Le Chiffre. Pour achever de le ruiner et démanteler le plus grand réseau criminel qui soit, Bond doit le battre lors d\'une partie de poker à haut risque au Casino Royale. La très belle Vesper, attachée au Trésor, l\'accompagne afin de veiller à ce que l\'agent 007 prenne soin de l\'argent du gouvernement britannique qui lui sert de mise, mais rien ne va se passer comme prévu.', 4, 'casino royale.jpg', 5),
	(9, 'Golden Eye', '1995', 145, 'James Bond est chargé par le MI6 de retrouver le Goldeneye, un satellite russe volé par des mercenaires, dont la puissance de frappe pourrait rayer de la carte n\'importe quelle capitale. Sur les traces des responsables, l\'agent 007 se rend aux quatre coins du monde avant de retrouver sur son chemin une vieille connaissance. Entre sa mission et ses sentiments personnels, l\'agent secret se voit dans l\'obligation de faire un choix.', 3, 'golden eye.jpg', 5),
	(10, 'Spectre', '2015', 150, 'Un message cryptique surgi du passé entraîne James Bond dans une mission très personnelle à Mexico puis à Rome, où il rencontre Lucia Sciarra, la très belle veuve d\'un célèbre criminel. Bond réussit à infiltrer une réunion secrète révélant une redoutable organisation baptisée Spectre. Pendant ce temps, à Londres, Max Denbigh, le nouveau directeur du Centre pour la Sécurité Nationale, remet en cause les actions de Bond et l\'existence même du MI6, dirigé par M.', 5, 'spectre.jpg', 4);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_dl8_lf.realisateur : ~6 rows (environ)
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
