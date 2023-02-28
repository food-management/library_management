-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: library_management
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `library_management`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `library_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `library_management`;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(5255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `information` varchar(5255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (10,'Monica Heisey','authorRomance1-63f9cdae00bc2.jpg','A hilarious and painfully relatable debut novel about one woman’s messy search for joy and meaning in the wake of an unexpected breakup, from comedian, essayist, and award-winning screenwriter Monica Heisey  Maggie is fine. She’s doing really good, actual'),(11,'Cassandra Clare','authorRomance2-63f9cdd19647a.jpg','Cassandra Clare was born to American parents in Teheran, Iran and spent much of her childhood travelling the world with her family, including one trek through the Himalayas as a toddler where she spent a month living in her father’s backpack. She lived in'),(12,'Heather Fawcett','authorRomance3-63f9ce6896bd4.jpg','Heather Fawcett is the author of Emily Wilde’s Encyclopaedia of Faeries, as well as a number of books for children and young adults, including Ember and the Ice Dragons, The Grace of Wild Things, and Even the Darkest Stars. She has a master’s degree in En'),(13,'Danielle Clode','da-63fa60ea613db.jpg','Danielle is the author of several narrative non-fiction books including Voyages to the South Seas, which won the Victorian Premier\'s Literary Prize for nonfiction in 2007 and The Wasp and the Orchid which was shortlisted for the National BIography Award i'),(14,'Robert Waldinger','authorScience2-63f9cff508b98.jpg','Robert J. Waldinger (born 1951) is an American psychiatrist, psychoanalyst, and Zen priest. He is a part-time Professor of Psychiatry at Harvard Medical School and directs the Harvard Study of Adult Development, one of the longest-running studies of adult'),(15,'Bethany Brookshire','authiorScience3-63f9d12358d41.png','Bethany Brookshire was the staff writer at Science News for Students from 2013 to 2021. She has a B.S. in biology and a B.A. in philosophy from The College of William and Mary, and a Ph.D. in physiology and pharmacology from Wake Forest University School '),(16,'David Goggins','AuthorSefl1-63f9d1f85976a.jpg','Goggins has completed more than seventy ultra-distance races, often placing in the top-five, and is a former Guinness World Record holder for completing 4,030 pull-ups in seventeen hours.  A sought after public speaker, he’s traveled the world sharing his'),(17,'Tori Dunlap','authiorScience3-63f9d27acade3.png','After saving $100,000 at age 25, Tori Dunlap quit her marketing job and started \'Her First $100k,\' a brand producing educational materials to fight financial inequality by empowering women to negotiate salary, pay off debt, build savings and invest. Her p'),(18,'Sarah Levy','authorSeflh3-63f9d2f3f2d15.jpg','Sarah Levy the author of DRINKING GAMES, a memoir in essays about the role alcohol has in our formative years, and what it means to opt out of a culture completely enmeshed in drinking. She has written for The New York Times, New York Magazine/The Cut, Co');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1255) NOT NULL,
  `discription` varchar(1255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `booktype_id` int(11) NOT NULL,
  `bookauthor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CBE5A33115A8609D` (`booktype_id`),
  KEY `IDX_CBE5A331C14AA022` (`bookauthor_id`),
  CONSTRAINT `FK_CBE5A33115A8609D` FOREIGN KEY (`booktype_id`) REFERENCES `book_type` (`id`),
  CONSTRAINT `FK_CBE5A331C14AA022` FOREIGN KEY (`bookauthor_id`) REFERENCES `author` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (4,'Really Good, Actually','A hilarious and painfully relatable debut novel about one woman’s messy search for joy and meaning in the wake of an unexpected breakup, from comedian, essayist, and award-winning screenwriter Monica Heisey  Maggie is fine. She’s doing really good, actual','romance1-63f9d37fde4aa.jpg',4,10),(5,'Chain of Thorns','Cordelia Carstairs has lost everything that matters to her. In only a few short weeks, she has seen her father murdered, her plans to become parabatai with her best friend, Lucie, destroyed, and her marriage to James Herondale crumble before her eyes. Eve','romance2-63f9d389b57fa.jpg',4,11),(6,'Emily Wilde\'s Encyclopaedia of Faeries','Cambridge professor Emily Wilde is good at many things: She is the foremost expert on the study of faeries. She is a genius scholar and a meticulous researcher who is writing the world\'s first encyclopaedia of faerie lore. But Emily Wilde is not good at p','romance3-63f9d39822915.jpg',4,12),(7,'Koala: A Natural History and an Uncertain Future','Koalas regularly appeared in Australian biologist Danielle Clode’s backyard, but it was only when a bushfire threatened that she truly paid them attention. She soon realized how much she had to learn about these complex and mysterious animals.  In vivid,','science1-63f9d09172b96.jpg',3,13),(8,'The Good Life: Lessons from the World\'s Longest Scientific Study of Happiness','What makes a life fulfilling and meaningful? The simple but surprising answer is: relationships. The stronger our relationships, the more likely we are to live happy, satisfying, and overall healthier lives. In fact, the Harvard Study of Adult Development','science2-63f9d03b8f425.jpg',3,14),(9,'Pests: How Humans Create Animal Villains','A squirrel in the garden. A rat in the wall. A pigeon on the street. Humans have spent so much of our history drawing a hard line between human spaces and wild places. When animals pop up where we don’t expect or want them, we respond with fear, rage, or ','science3-63f9d142920e2.jpg',3,15),(10,'Never Finished: Unshackle Your Mind and Win the War Within','Can\'t Hurt Me, David Goggins\' smash hit memoir, demonstrated how much untapped ability we all have but was merely an introduction to the power of the mind. In Never Finished, Goggins takes you inside his Mental Lab, where he developed the philosophy, psyc','saveh1-63f9d2134aa8f.jpg',2,16),(11,'Financial Feminist: Overcome the Patriarchy\'s Bullsh*t to Master Your Money and Build a Life You Love','Tori Dunlap was always good with money. As a kid, she watched her prudent parents balance their checkbook every month and learned to save for musical tickets by gathering pennies in an Altoids tin. But she quickly discovered that her experience with money','Seflh2-63f9d2b38d70b.jpg',2,17),(12,'Drinking Games','Drinking Games explores the role alcohol has in our formative adult lives, and what it means to opt out of a culture completely enmeshed in drinking. Sarah explores what our short-term choices about alcohol do to our long-term selves and how it challenges','seflh3-63f9d30d2ed86.jpg',2,18);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_type`
--

DROP TABLE IF EXISTS `book_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_type`
--

LOCK TABLES `book_type` WRITE;
/*!40000 ALTER TABLE `book_type` DISABLE KEYS */;
INSERT INTO `book_type` VALUES (2,'Self-help'),(3,'Science fiction'),(4,'Romance');
/*!40000 ALTER TABLE `book_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrower_list`
--

DROP TABLE IF EXISTS `borrower_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borrower_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `borrowed_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `userbr_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A0B021316A2B381` (`book_id`),
  KEY `IDX_A0B02135A429BD7` (`userbr_id`),
  CONSTRAINT `FK_A0B021316A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  CONSTRAINT `FK_A0B02135A429BD7` FOREIGN KEY (`userbr_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrower_list`
--

LOCK TABLES `borrower_list` WRITE;
/*!40000 ALTER TABLE `borrower_list` DISABLE KEYS */;
INSERT INTO `borrower_list` VALUES (4,'2023-02-27','2023-03-27','Borrowing',12,6),(5,'2023-02-01','2023-02-07','Return',10,7),(6,'2023-02-27','2023-02-12','Borrowing',6,9),(7,'2023-02-10','2023-03-10','Borrowing',8,10),(8,'2023-01-20','2023-02-20','Return',5,8);
/*!40000 ALTER TABLE `borrower_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20230221122940','2023-02-21 13:29:47',50),('DoctrineMigrations\\Version20230221123143','2023-02-21 13:31:47',33),('DoctrineMigrations\\Version20230221124533','2023-02-21 13:45:38',48),('DoctrineMigrations\\Version20230221125320','2023-02-21 13:53:32',53),('DoctrineMigrations\\Version20230221131720','2023-02-21 14:17:27',74),('DoctrineMigrations\\Version20230221131829','2023-02-21 14:18:33',35),('DoctrineMigrations\\Version20230221134552','2023-02-21 14:45:57',42),('DoctrineMigrations\\Version20230223062157','2023-02-23 07:23:30',530),('DoctrineMigrations\\Version20230223062434','2023-02-23 07:24:38',32),('DoctrineMigrations\\Version20230223062525','2023-02-23 07:49:16',51),('DoctrineMigrations\\Version20230224082615','2023-02-24 09:26:20',175),('DoctrineMigrations\\Version20230224083250','2023-02-24 09:32:59',262),('DoctrineMigrations\\Version20230224085523','2023-02-24 09:55:43',71),('DoctrineMigrations\\Version20230224091126','2023-02-24 10:11:30',200),('DoctrineMigrations\\Version20230224131723','2023-02-24 14:17:41',34),('DoctrineMigrations\\Version20230224133715','2023-02-24 14:37:21',44);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (2,'f',1,'2023-02-17','12-63f8d4639f399.png',112);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (4,'user@gmail.com','[\"ROLE_USER\"]','$2y$13$OEC954BeZ3YzTvAuK5ChS.p62jljBn6zCS4ryIntmiIwRIjVSk7zm','User1','012345','Can Tho','Male'),(5,'Admin@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$iPWA1aEDu9GaPpkSz58qWuBXwD5DYsMv3S33eJNW63OM5W26Cc3m2','Admin','098765','Ho Chi Minh','Female'),(6,'daihanh@gmail.com','[\"ROLE_USER\"]','$2y$13$pzoZyeQMVpiUFS0uAWktp.EIa/XvRvZWLp5ME1lSUDIDcotc9pyUi','Dai Hanh','0964378909','Da Lat','Female'),(7,'minhthe@gmail.com','[\"ROLE_USER\"]','$2y$13$1UbBjrZaaN524iWPjO6dEu1PYqQYkrqQox52.oJMXeudjFWFPy6ba','Minh The','0192872615','Can Tho','Male'),(8,'hoanghuu@gmail.com','[\"ROLE_USER\"]','$2y$13$8EpYwVSI9gsLOey3oEn7q.ghcwwJIxSMUqcvdrJm6TWvvEBivafby','Hoang Huu','0982567891','Da Nang','Male'),(9,'nhuphuong@gmail.com','[\"ROLE_USER\"]','$2y$13$nv2b0.Pda3fZS8kQIXfKkOO/VhXcSifsmXcpPb6JO5Z8gufFnIOwu','Nhu Phuong','0162578945','Vinh Long','Female'),(10,'ngocquy@gmail.com','[\"ROLE_USER\"]','$2y$13$bEF8rRskgT88EQ1iaxifZut6795s3I1jgXonE42PtcZRGuh0hQzHm','Ngoc Quy','0726141721','Kien Giang','Female');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-28  0:44:40
