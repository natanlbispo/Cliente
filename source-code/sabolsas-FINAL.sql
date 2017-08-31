-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: us-cdbr-iron-east-05.cleardb.net    Database: heroku_f52219254f7e7c8
-- ------------------------------------------------------
-- Server version	5.6.36-log

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
-- Table structure for table `agencia_fomentadora`
--

DROP TABLE IF EXISTS `agencia_fomentadora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agencia_fomentadora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abv` varchar(45) NOT NULL,
  `ocult` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agencia_fomentadora`
--

LOCK TABLES `agencia_fomentadora` WRITE;
/*!40000 ALTER TABLE `agencia_fomentadora` DISABLE KEYS */;
INSERT INTO `agencia_fomentadora` VALUES (1,'Fundação de Amparo à Pesquisa do Estado da Bahia','FAPESB',1),(11,'d','nada',0),(21,'d','nada',0),(31,'d','nada',0),(41,'CAPES','CAPES',0),(51,'CNPq','CNPq',0);
/*!40000 ALTER TABLE `agencia_fomentadora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areap`
--

DROP TABLE IF EXISTS `areap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ocult` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areap`
--

LOCK TABLES `areap` WRITE;
/*!40000 ALTER TABLE `areap` DISABLE KEYS */;
INSERT INTO `areap` VALUES (1,'',0),(11,'',0),(21,'',0),(31,'',0),(41,'',0),(51,'',0);
/*!40000 ALTER TABLE `areap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `id` bigint(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` bigint(11) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (123456789,'Caio','caio@tes',12345678911,'2017-08-29 17:03:39','2017-08-29 17:03:39',0),(1478545487,'Daniela Claro','dclaro@ufba.br',12345678910,'2017-08-29 16:05:39','2017-08-29 16:05:30',1),(68637251420,'Eduardo Santana de Almeida','esa@dcc.ufba.br',68637251420,NULL,NULL,0),(1476456212631,'Ivan Machado','ivan@ufba.br',123456789,'2017-08-29 16:04:21','2017-08-29 02:31:06',1),(5487895646123,'Ivan Machado','ivan@ufba.br',12345687541,'2017-08-29 16:07:02','2017-08-29 16:07:02',0),(18446744073709551615,'Daniela Claro','dclaro@ufba.br',12365478974,'2017-08-29 13:56:24','2017-08-29 13:56:24',0);
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `agencia_fomentadora_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (2,'Bolsa Teste2',1502164257,1548820257,1,'2017-08-29 14:14:37','2017-08-08 06:50:57',1),(11,'Bolsa do Lançamento',1503970090,1535074090,1,'2017-08-29 01:28:10','2017-08-29 01:28:10',0),(21,'Bolsa dos Ricos',1504014897,1535118897,1,'2017-08-29 13:54:57','2017-08-29 13:54:57',0),(31,'Bolsa Família',1504015990,1509199990,1,'2017-08-29 14:13:10','2017-08-29 14:13:10',0),(41,'Bolsa Teste 3',1504151535,1535255535,51,'2017-08-31 03:52:15','2017-08-31 03:52:15',0);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_manager`
--

DROP TABLE IF EXISTS `project_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_manager` (
  `project_id` int(11) NOT NULL,
  `professor_matricula` bigint(11) unsigned NOT NULL,
  `student_matricula` bigint(11) unsigned DEFAULT NULL,
  `start_date` int(11) DEFAULT NULL,
  `end_date` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_manager`
--

LOCK TABLES `project_manager` WRITE;
/*!40000 ALTER TABLE `project_manager` DISABLE KEYS */;
INSERT INTO `project_manager` VALUES (2,68637251420,213200211,1503969313,1519521313,'2017-08-29 01:15:13','2017-08-29 01:15:13'),(2,68637251420,12547889412,1503979500,1563595500,'2017-08-29 04:05:01','2017-08-29 04:05:01'),(2,1476456212631,12223,1503980025,1535084025,'2017-08-29 04:13:45','2017-08-29 04:13:45'),(11,1476456212631,365412369,1504014622,1509198622,'2017-08-29 13:50:22','2017-08-29 13:50:22'),(2,1476456212631,123456789,1504014638,1509198638,'2017-08-29 13:50:38','2017-08-29 13:50:38'),(21,9223372036854775807,123321113,1504015383,1511791383,'2017-08-29 14:03:03','2017-08-29 14:03:03'),(21,68637251420,12223,1504015414,1509199414,'2017-08-29 14:03:34','2017-08-29 14:03:34'),(31,123456789,145687984,1504149994,1506741994,'2017-08-31 03:26:34','2017-08-31 03:26:34'),(41,5487895646123,785489456,1504151572,1535255572,'2017-08-31 03:52:52','2017-08-31 03:52:52');
/*!40000 ALTER TABLE `project_manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` bigint(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `enrollment_date` int(11) NOT NULL,
  `student_grade_id` int(11) NOT NULL,
  `cpf` bigint(11) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_student_student_grade1_idx` (`student_grade_id`),
  CONSTRAINT `fk_student_student_grade1` FOREIGN KEY (`student_grade_id`) REFERENCES `student_grade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (12223,'Lucas','lucas@teste',20152,41,122233,'2017-08-29 14:03:58','2017-08-29 04:13:18',1),(123321113,'Yoon Bomi','apinkbbom@ufba.br',20152,71,14777414777,'2017-08-29 14:02:46','2017-08-29 14:02:46',0),(123456789,'Aluno Teste','teste@gmail.com',20152,51,12345678912,'2017-08-29 16:06:21','2017-08-29 05:42:32',1),(145687984,'Jeredy','je@je.com',20152,81,12315641897,'2017-08-31 03:26:19','2017-08-31 03:26:19',0),(365412369,'Goku','kakaroto_hlera@ufba.br',20152,61,12345678912,'2017-08-29 13:50:04','2017-08-29 13:50:04',0),(785489456,'Carolina','ca@gmail.com',20151,91,12315489612,'2017-08-31 03:52:39','2017-08-31 03:52:39',0);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_grade`
--

DROP TABLE IF EXISTS `student_grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_matricula` bigint(11) NOT NULL,
  `grade` decimal(4,2) NOT NULL,
  `normalized_grade` decimal(10,2) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_grade`
--

LOCK TABLES `student_grade` WRITE;
/*!40000 ALTER TABLE `student_grade` DISABLE KEYS */;
INSERT INTO `student_grade` VALUES (41,12223,9.99,13.74,'2017-08-31 03:52:52','2017-08-29 04:13:18'),(51,123456789,6.50,10.14,'2017-08-31 03:52:52','2017-08-29 05:42:32'),(61,365412369,12.00,14.24,'2017-08-31 03:52:53','2017-08-29 13:50:04'),(71,123321113,10.00,13.75,'2017-08-31 03:52:52','2017-08-29 14:02:46'),(81,145687984,7.00,10.74,'2017-08-31 03:52:53','2017-08-31 03:26:19'),(91,785489456,8.00,5.00,'2017-08-31 03:52:53','2017-08-31 03:52:39');
/*!40000 ALTER TABLE `student_grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_has_professor`
--

DROP TABLE IF EXISTS `student_has_professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_has_professor` (
  `student_matricula` bigint(11) unsigned NOT NULL,
  `professor_matricula` bigint(11) unsigned NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  PRIMARY KEY (`student_matricula`,`professor_matricula`),
  KEY `fk_student_has_professor_professor1_idx` (`professor_matricula`),
  KEY `fk_student_has_professor_student_idx` (`student_matricula`),
  CONSTRAINT `fk_student_has_professor_professor1` FOREIGN KEY (`professor_matricula`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_professor_student` FOREIGN KEY (`student_matricula`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_has_professor`
--

LOCK TABLES `student_has_professor` WRITE;
/*!40000 ALTER TABLE `student_has_professor` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_has_professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_matricula` bigint(11) unsigned NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,68637251420,1,1,'$2y$10$6BFGIA1GLi0UcgPIYcweT.vs8B.o1dioCzH7qxKkJwCnf.jfFsFRy','Ojk2aFtVo75uZxWTeC1czQAIhimHuj3XNsUKmF2RxbGDdu0HoMe9TRYunSB4',NULL,NULL),(21,1476456212631,1,0,'$2y$10$22cpb2U3BLlPu5p5HhZ9leUnqPjJLt9sLhBRSDDQ74KIly/WjDVFa',NULL,'2017-08-29 02:31:16','2017-08-29 02:31:06'),(41,18446744073709551615,0,0,'$2y$10$eh7RCdA08GASCQJKxBli0ej3Gxtbggd7HyAdYUyKwVzIaRgtyF9rO',NULL,'2017-08-29 13:56:25','2017-08-29 13:56:25'),(51,1478545487,0,0,'$2y$10$WUbT7OokajCx9qzh6SLkeu.xabbdNCue48vWliOBiMiCU4PypZMsm',NULL,'2017-08-29 16:05:30','2017-08-29 16:05:30'),(61,5487895646123,1,0,'$2y$10$YqPjImT0NXKNeQPlxA6dK.bTUSXm4fGX4xBFsCAr28gzZ27HWWOxq',NULL,'2017-08-29 16:47:06','2017-08-29 16:07:03'),(71,123456789,1,1,'$2y$10$.usqds2HbKcJERyF4r.EM.Zy8prdes/z/Z.qpEsIKAsk.yptKciDG',NULL,'2017-08-29 17:04:08','2017-08-29 17:03:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-31  1:40:29
