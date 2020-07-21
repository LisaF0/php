#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: origine
#------------------------------------------------------------

CREATE TABLE origine(
        id_pays Int  Auto_increment  NOT NULL ,
        pays    Varchar (50) NOT NULL
	,CONSTRAINT origine_PK PRIMARY KEY (id_pays)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: couleur
#------------------------------------------------------------

CREATE TABLE couleur(
        id_couleur Int  Auto_increment  NOT NULL ,
        couleur    Varchar (50) NOT NULL
	,CONSTRAINT couleur_PK PRIMARY KEY (id_couleur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: motorisation
#------------------------------------------------------------

CREATE TABLE motorisation(
        id_motorisation Int  Auto_increment  NOT NULL ,
        motorisation    Varchar (50) NOT NULL
	,CONSTRAINT motorisation_PK PRIMARY KEY (id_motorisation)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: marque
#------------------------------------------------------------

CREATE TABLE marque(
        id_marque Int  Auto_increment  NOT NULL ,
        marque    Varchar (50) NOT NULL ,
        id_pays   Int NOT NULL
	,CONSTRAINT marque_PK PRIMARY KEY (id_marque)

	,CONSTRAINT marque_origine_FK FOREIGN KEY (id_pays) REFERENCES origine(id_pays)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: modele
#------------------------------------------------------------

CREATE TABLE modele(
        id_modele Int  Auto_increment  NOT NULL ,
        modele    Varchar (50) NOT NULL ,
        id_marque Int NOT NULL
	,CONSTRAINT modele_PK PRIMARY KEY (id_modele)

	,CONSTRAINT modele_marque_FK FOREIGN KEY (id_marque) REFERENCES marque(id_marque)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: voitures
#------------------------------------------------------------

CREATE TABLE voitures(
        id_voiture             Int  Auto_increment  NOT NULL ,
        plaque_immatriculation Varchar (10) NOT NULL ,
        nb_portes              Int NOT NULL ,
        id_motorisation        Int NOT NULL ,
        id_modele              Int NOT NULL
	,CONSTRAINT voitures_PK PRIMARY KEY (id_voiture)

	,CONSTRAINT voitures_motorisation_FK FOREIGN KEY (id_motorisation) REFERENCES motorisation(id_motorisation)
	,CONSTRAINT voitures_modele0_FK FOREIGN KEY (id_modele) REFERENCES modele(id_modele)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: colorer
#------------------------------------------------------------

CREATE TABLE colorer(
        id_couleur Int NOT NULL ,
        id_voiture Int NOT NULL
	,CONSTRAINT colorer_PK PRIMARY KEY (id_couleur,id_voiture)

	,CONSTRAINT colorer_couleur_FK FOREIGN KEY (id_couleur) REFERENCES couleur(id_couleur)
	,CONSTRAINT colorer_voitures0_FK FOREIGN KEY (id_voiture) REFERENCES voitures(id_voiture)
)ENGINE=InnoDB;

