CREATE DATABASE IF NOT EXISTS `Salon de massage`;

USE `Salon de massage`;

CREATE TABLE `articles` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`auteur` varchar(70) NOT NULL,
	`titre` varchar(50) NOT NULL,
	`résumé` varchar(120) NOT NULL,
	`contenue1` varchar(300) NOT NULL,
	`titre_2` varchar(50) NOT NULL,
	`contenu_2` varchar(300) NOT NULL,
	`titre_3` varchar(50) NOT NULL,
	`contenu_3` varchar(300) NOT NULL,
	`photo` varchar(100) NOT NULL,
	`dateDePublication` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
);

CREATE TABLE `utilisateur` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nom` varchar(50) NOT NULL,
	`prenom` varchar(50) NOT NULL,
	`photo` varchar(100) NOT NULL,
	`role` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
);



