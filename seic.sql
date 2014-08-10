-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 05 Août 2014 à 16:36
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `seic`
--

-- --------------------------------------------------------

--
-- Structure de la table `campuses`
--

CREATE TABLE IF NOT EXISTS `campuses` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `campus_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `creator_id` int(7) NOT NULL,
  `parent_id` int(7) NOT NULL,
  `project_id` int(7) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `archive` longblob,
  `content` text COLLATE utf8_unicode_ci,
  `creation_date` datetime NOT NULL,
  `is_directory` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`),
  KEY `parent_id` (`parent_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `campus_id` int(7) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(7) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `campus_id` (`campus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `campus_id` int(7) DEFAULT NULL,
  `author_id` int(7) NOT NULL,
  `creator_date` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campus_id` (`campus_id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `meetings`
--

CREATE TABLE IF NOT EXISTS `meetings` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `creator_id` int(7) NOT NULL,
  `project_id` int(7) DEFAULT NULL,
  `date` datetime NOT NULL,
  `duration` time NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `summary` text COLLATE utf8_unicode_ci,
  `archive` blob,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `meeting_users`
--

CREATE TABLE IF NOT EXISTS `meeting_users` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `user_id` int(7) NOT NULL,
  `meeting_id` int(7) NOT NULL,
  `status` int(7) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `meeting_id` (`meeting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `author_id` int(7) NOT NULL,
  `publication_date` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `news_comments`
--

CREATE TABLE IF NOT EXISTS `news_comments` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `news_id` int(7) NOT NULL,
  `author_id` int(7) NOT NULL,
  `publication_date` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `privileges`
--

CREATE TABLE IF NOT EXISTS `privileges` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `campus_id` int(7) NOT NULL,
  `creator_id` int(7) NOT NULL,
  `project_manager_id` int(7) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  `deadline_date` datetime NOT NULL,
  `progress` int(7) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `technologies` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `campusId` (`campus_id`,`creator_id`,`project_manager_id`),
  KEY `creatorId` (`creator_id`),
  KEY `projectManagerId` (`project_manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `project_comments`
--

CREATE TABLE IF NOT EXISTS `project_comments` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `project_id` int(7) NOT NULL,
  `author_id` int(7) NOT NULL,
  `publication_date` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `project_users`
--

CREATE TABLE IF NOT EXISTS `project_users` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `user_id` int(7) NOT NULL,
  `project_id` int(7) NOT NULL,
  `status` int(7) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`project_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `rents`
--

CREATE TABLE IF NOT EXISTS `rents` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `campus_id` int(7) NOT NULL,
  `author_id` int(7) NOT NULL,
  `item_id` int(7) NOT NULL,
  `id_booster` int(7) NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `return` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campus_id` (`campus_id`),
  KEY `author_id` (`author_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `to_do`
--

CREATE TABLE IF NOT EXISTS `to_do` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `campus_id` int(7) DEFAULT NULL,
  `author_id` int(7) NOT NULL,
  `creation_date` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campus_id` (`campus_id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_booster` int(7) NOT NULL,
  `campus_id` int(7) NOT NULL,
  `privilege_id` int(7) NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_booster`),
  KEY `campusId` (`campus_id`),
  KEY `privilegeId` (`privilege_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `meetings_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `meeting_users`
--
ALTER TABLE `meeting_users`
  ADD CONSTRAINT `meeting_users_ibfk_2` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meeting_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `news_comments`
--
ALTER TABLE `news_comments`
  ADD CONSTRAINT `news_comments_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `news_comments_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`project_manager_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `project_comments`
--
ALTER TABLE `project_comments`
  ADD CONSTRAINT `project_comments_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `project_comments_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `project_users`
--
ALTER TABLE `project_users`
  ADD CONSTRAINT `project_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `project_users_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rents_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rents_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `to_do`
--
ALTER TABLE `to_do`
  ADD CONSTRAINT `to_do_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id_booster`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `to_do_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
