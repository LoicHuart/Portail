CREATE TABLE fiche_pc (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	Banque VARCHAR(200) NOT NULL,
	Comptabilité_et_Gestion VARCHAR(200) NOT NULL,
	Négociation_et_Relation_Client VARCHAR(200) NOT NULL,
	Services_Informatiques_aux_Organisations VARCHAR(200) NOT NULL,
	nom VARCHAR(200) NOT NULL,
	prenom VARCHAR(200) NOT NULL,
	adresse VARCHAR(200) NOT NULL,
	code_postal CHAR(5) NOT NULL,
	Ville VARCHAR(200) NOT NULL,
	tel_por CHAR(20),
	mail VARCHAR(200) NOT NULL,
	datenais CHAR(20),
	annee_en_cours CHAR(20),
	etablissement VARCHAR(200),
	Formation VARCHAR(200),
	specialite VARCHAR(200),
	spec VARCHAR(200), 
	etablissement_titu VARCHAR(200),
	anneeobt CHAR(20),
	Forum CHAR(3),
	porte_ouverte CHAR(3),
	autres VARCHAR(200),
	PRIMARY KEY (id)
)
ENGINE=INNODB;

