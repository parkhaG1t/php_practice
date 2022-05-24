/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - moneyweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`moneyweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `moneyweb`;

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwd` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telno` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regdate` date NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `member` */

insert  into `member`(`email`,`name`,`passwd`,`telno`,`regdate`) values 
('abc@abc.com','abc','123','01023456789','2022-05-22'),
('apple123@abc.com','Apple','123','01022223333','2022-05-24'),
('hello@abc.com','hellow kin','123','01022234444','2022-05-24');

/*Table structure for table `moneynote` */

DROP TABLE IF EXISTS `moneynote`;

CREATE TABLE `moneynote` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `io` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iodate` date NOT NULL,
  `memo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `moneynote` */

insert  into `moneynote`(`no`,`email`,`money`,`io`,`note`,`iodate`,`memo`,`confirm`) values 
(9,'hello@abc.com',200000,'in','용돈','2022-05-01','한달 용돈','Y'),
(11,'hello@abc.com',15000,'out','영화','2022-05-07','영화관람','N');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
