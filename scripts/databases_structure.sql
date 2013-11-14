CREATE DATABASE  IF NOT EXISTS `calendarplaces` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `calendarplaces`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: calendarplaces
-- ------------------------------------------------------
-- Server version	5.5.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment` text,
  `valoration` int(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `spaces_id` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`),
  UNIQUE KEY `id_comment_UNIQUE` (`id_comment`),
  KEY `fk_comments_users1_idx` (`users_id`),
  KEY `fk_comments_spaces1_idx` (`spaces_id`),
  CONSTRAINT `fk_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_spaces1` FOREIGN KEY (`spaces_id`) REFERENCES `spaces` (`id_space`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `contact_id` int(11) NOT NULL,
  PRIMARY KEY (`id_company`),
  KEY `fk_companies_users1_idx` (`contact_id`),
  CONSTRAINT `fk_companies_users1` FOREIGN KEY (`contact_id`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id_country` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(45) NOT NULL,
  PRIMARY KEY (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `days` (
  `id_day` int(11) NOT NULL,
  `day` varchar(45) NOT NULL,
  `spaces_id` int(11) NOT NULL,
  PRIMARY KEY (`id_day`),
  KEY `fk_days_spaces1_idx` (`spaces_id`),
  CONSTRAINT `fk_days_spaces1` FOREIGN KEY (`spaces_id`) REFERENCES `spaces` (`id_space`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `exclusion_days`
--

DROP TABLE IF EXISTS `exclusion_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exclusion_days` (
  `id_exclusion_day` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(140) DEFAULT NULL,
  `spaces_id` int(11) NOT NULL,
  PRIMARY KEY (`id_exclusion_day`),
  KEY `fk_exclution_days_spaces1_idx` (`spaces_id`),
  CONSTRAINT `fk_exclution_days_spaces1` FOREIGN KEY (`spaces_id`) REFERENCES `spaces` (`id_space`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `holy_days`
--

DROP TABLE IF EXISTS `holy_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `holy_days` (
  `id_holy_day` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `countries_id` int(11) NOT NULL,
  PRIMARY KEY (`id_holy_day`),
  KEY `fk_holy_days_countries1_idx` (`countries_id`),
  CONSTRAINT `fk_holy_days_countries1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id_country`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `spaces`
--

DROP TABLE IF EXISTS `spaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spaces` (
  `id_space` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `companies_id` int(11) NOT NULL,
  `schedulling` varchar(255) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id_space`),
  KEY `fk_spaces_type_spaces1_idx` (`type_id`),
  KEY `fk_spaces_companies1_idx` (`companies_id`),
  KEY `fk_spaces_countries1_idx` (`country_id`),
  CONSTRAINT `fk_spaces_type_spaces1` FOREIGN KEY (`type_id`) REFERENCES `types_space` (`id_type_space`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_spaces_companies1` FOREIGN KEY (`companies_id`) REFERENCES `companies` (`id_company`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_spaces_countries1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id_country`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `times`
--

DROP TABLE IF EXISTS `times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `times` (
  `id_time` int(11) NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL,
  `days_id` int(11) NOT NULL,
  PRIMARY KEY (`id_time`),
  KEY `fk_times_days1_idx` (`days_id`),
  CONSTRAINT `fk_times_days1` FOREIGN KEY (`days_id`) REFERENCES `days` (`id_day`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `types_space`
--

DROP TABLE IF EXISTS `types_space`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types_space` (
  `id_type_space` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type_space`),
  UNIQUE KEY `id_type_spaces_UNIQUE` (`id_type_space`),
  UNIQUE KEY `name_UNIQUE` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `roles_id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_has_spaces`
--

DROP TABLE IF EXISTS `users_has_spaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_has_spaces` (
  `users_id` int(11) NOT NULL,
  `spaces_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_ini` time NOT NULL,
  `time_fini` time NOT NULL,
  PRIMARY KEY (`users_id`,`spaces_id`,`date`,`time_ini`,`time_fini`),
  KEY `fk_users_has_spaces_spaces1_idx` (`spaces_id`),
  KEY `fk_users_has_spaces_users1_idx` (`users_id`),
  CONSTRAINT `fk_users_has_spaces_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_spaces_spaces1` FOREIGN KEY (`spaces_id`) REFERENCES `spaces` (`id_space`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_has_times`
--

DROP TABLE IF EXISTS `users_has_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_has_times` (
  `users_id_user` int(11) NOT NULL,
  `times_id_time` int(11) NOT NULL,
  `time_fini` time DEFAULT NULL,
  `time_ini` time DEFAULT NULL,
  PRIMARY KEY (`users_id_user`,`times_id_time`),
  KEY `fk_users_has_times_times1_idx` (`times_id_time`),
  KEY `fk_users_has_times_users1_idx` (`users_id_user`),
  CONSTRAINT `fk_users_has_times_users1` FOREIGN KEY (`users_id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_times_times1` FOREIGN KEY (`times_id_time`) REFERENCES `times` (`id_time`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-13 11:36:36
