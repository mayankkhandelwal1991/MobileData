CREATE DATABASE  IF NOT EXISTS `mobile_data` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mobile_data`;
-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: mobile_data
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `emailid` varchar(100) NOT NULL,
  `contactno` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`emailid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` VALUES ('Mayank Khandelwal','123','mayankkhandelwal1991@gmail.com','9875227758');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_info`
--

DROP TABLE IF EXISTS `tbl_user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_info` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(45) DEFAULT NULL,
  `cus_no` varchar(45) DEFAULT NULL,
  `sim_no` varchar(45) DEFAULT NULL,
  `father_name` varchar(45) DEFAULT NULL,
  `altername_no` varchar(45) DEFAULT NULL,
  `FRC` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `rejection` varchar(45) DEFAULT NULL,
  `resend_id` varchar(45) DEFAULT NULL,
  `sim_type` varchar(45) DEFAULT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `sim_selection` varchar(45) DEFAULT NULL,
  `temporaryNumber` varchar(45) DEFAULT NULL,
  `UPCCode` varchar(45) DEFAULT NULL,
  `isFRCDone` int(1) DEFAULT NULL,
  `is_verified` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_info`
--

LOCK TABLES `tbl_user_info` WRITE;
/*!40000 ALTER TABLE `tbl_user_info` DISABLE KEYS */;
INSERT INTO `tbl_user_info` VALUES (1,'mayank khandelwal','9875227758','1234567890','prahlad khandelwal','9413294381','1000','2015-05-14','','','GSM','Reliance','NEW','','',1,'1'),(2,'s','1234567890','','s','1234567890','12','2015-05-06','','','GSM','Aircel','NEW','','',NULL,NULL),(3,'s3','1231231231233','','s','1234567890','12','2015-05-06','','','GSM','Aircel','NEW','','',NULL,NULL),(4,'s','1234567894','','ssss','1','123','2015-05-06','','','GSM','Aircel','NEW','','',1,NULL),(5,'ser','1234567823','','ssss','1','123','2015-05-06','','','GSM','Aircel','NEW','','',NULL,NULL),(6,'ser','123452344','','ssss','1','123','2015-05-06','','','GSM','Aircel','NEW','','',NULL,NULL);
/*!40000 ALTER TABLE `tbl_user_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-16 20:21:04
