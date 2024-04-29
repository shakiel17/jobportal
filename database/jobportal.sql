/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.1.38-MariaDB : Database - jobportal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jobportal` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jobportal`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`password`,`fullname`) values 
(1,'admin','1234','Administrator');

/*Table structure for table `applicant` */

DROP TABLE IF EXISTS `applicant`;

CREATE TABLE `applicant` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `app_code` varchar(100) DEFAULT NULL,
  `app_lastname` varchar(100) DEFAULT NULL,
  `app_firstname` varchar(100) DEFAULT NULL,
  `app_middlename` varchar(100) DEFAULT NULL,
  `app_birthdate` date DEFAULT NULL,
  `app_gender` varchar(100) DEFAULT NULL,
  `app_address` text,
  `app_contactno` varchar(100) DEFAULT NULL,
  `app_username` varchar(100) DEFAULT NULL,
  `app_password` varchar(100) DEFAULT NULL,
  `app_interest` text,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `applicant` */

/*Table structure for table `employer` */

DROP TABLE IF EXISTS `employer`;

CREATE TABLE `employer` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `comp_name` text,
  `comp_address` text,
  `comp_email` varchar(100) DEFAULT NULL,
  `comp_contactno` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `employer` */

/*Table structure for table `job_application` */

DROP TABLE IF EXISTS `job_application`;

CREATE TABLE `job_application` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `app_code` varchar(100) DEFAULT NULL,
  `documents` longblob,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `job_application` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `job_description` text,
  `job_keyword` varchar(100) DEFAULT NULL,
  `job_status` varchar(100) DEFAULT 'Open',
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jobs` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
