-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: bsu_db
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `COURSE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COURSE_NAME` varchar(80) NOT NULL,
  `COURSE_LEVEL` varchar(50) NOT NULL DEFAULT '1',
  `COURSE_MAJOR` varchar(50) NOT NULL DEFAULT 'None',
  `COURSE_DESC` varchar(255) NOT NULL,
  `DEPT_ID` int(11) NOT NULL,
  `SETSEMESTER` varchar(90) NOT NULL,
  PRIMARY KEY (`COURSE_ID`),
  KEY `DEPT_ID` (`DEPT_ID`),
  KEY `idx_course_dept` (`DEPT_ID`),
  KEY `idx_course_level` (`COURSE_LEVEL`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` (`COURSE_ID`, `COURSE_NAME`, `COURSE_LEVEL`, `COURSE_MAJOR`, `COURSE_DESC`, `DEPT_ID`, `SETSEMESTER`) VALUES (1,'Bachelor of Industrial Technology','1','Automotive Technology','Bachelor of Industrial Technology',34,''),(2,'Bachelor of Industrial Technology','1','Construction Technology','Bachelor of Industrial Technology',34,''),(3,'Bachelor of Industrial Technology','1','Electrical Technology','Bachelor of Industrial Technology',34,''),(4,'Bachelor of Industrial Technology','1','Apparel and Fashion Technology','Bachelor of Industrial Technology',34,''),(5,'Bachelor of Industrial Technology','1','Culinary Technology','Bachelor of Industrial Technology',34,''),(6,'Bachelor of Industrial Technology','1','Welding and Fabrication Techno','Bachelor of Industrial Technology',34,''),(7,'Bachelor of Science in Information Technology','1','None','Bachelor of Science in Information Technology',34,''),(8,'Bachelor of Technical-Vocational Teacher Education','1','Civil and Construction Technol','BTVTEd Major in Civil & Construction Technology',36,''),(10,'Bachelor in Public Administration','1','None','Bachelor in Public Administration',35,''),(11,'Bachelor of Technical-Vocational Teacher Education','1','Automotive Technology','Bachelor of Technical-Vocational Teacher Education',36,''),(12,'Bachelor of Technical-Vocational Teacher Education','1','Civil and Construction Technol','Bachelor of Technical-Vocational Teacher Education',36,''),(14,'Bachelor of Technical-Vocational Teacher Education','1','Food and Service Management','Bachelor of Technical-Vocational Teacher Education',36,''),(15,'Bachelor of Technical-Vocational Teacher Education','1','Fashion, Garments and Design','Bachelor of Technical-Vocational Teacher Education',36,''),(16,'Bachelor of Technology and Livelihood Education','1','Home Economics','Bachelor of Technology and Livelihood Education',36,''),(17,'Bachelor of Technology and Livelihood Education','1','Industrial Arts','Bachelor of Technology and Livelihood Education',36,''),(18,'Bachelor of Secondary Education','1','English','Bachelor of Secondary Education',36,''),(19,'Bachelor of Secondary Education','1','Filipino','Bachelor of Secondary Education',36,''),(20,'Bachelor of Secondary Education','1','Science','Bachelor of Secondary Education',36,''),(22,'Bachelor of Secondary Education','1','Social Studies','Bachelor of Secondary Education',36,''),(23,'Bachelor of Elementary Education','1','None','Bachelor of Elementary Education',36,''),(25,'Bachelor of Science in Criminology','1','None','Bachelor of Science in Criminology',37,''),(62,'Bachelor of Technical-Vocational Teacher Education','1','Automotive Technology','BTVTEd Major in Automotive Technology',36,''),(63,'Bachelor of Technical-Vocational Teacher Education','1','Civil and Construction Technol','BTVTEd Major in Civil & Construction Technology',36,''),(64,'Bachelor of Technical-Vocational Teacher Education','1','Electrical Technology','BTVTEd Major in Electrical Technology',36,''),(67,'Bachelor of Technology and Livelihood Education','1','Home Economics','BTLEd Major in Home Economics',36,''),(68,'Bachelor of Technology and Livelihood Education','1','Industrial Arts','BTLEd Major in Industrial Arts',36,''),(73,'Bachelor of Science in Criminology','1','None','Bachelor of Science in Criminology',37,''),(74,'Bachelor of Technical-Vocational Teacher Education','1','Automotive Technology','BTVTEd Major in Automotive Technology',36,''),(75,'Bachelor of Technical-Vocational Teacher Education','1','Civil and Construction Technol','BTVTEd Major in Civil & Construction Technology',36,''),(77,'Bachelor of Technical-Vocational Teacher Education','1','Food and Service Management','BTVTEd Major in Food & Service Management',36,''),(78,'Bachelor of Technical-Vocational Teacher Education','1','Fashion, Garments and Design','BTVTEd Major in Fashion, Garments & Design',36,''),(79,'Bachelor of Technology and Livelihood Education','1','Home Economics','BTLEd Major in Home Economics',36,''),(80,'Bachelor of Technology and Livelihood Education','1','Industrial Arts','BTLEd Major in Industrial Arts',36,''),(82,'Bachelor of Culture and Arts Education','1','None','Bachelor of Culture and Arts Education',36,''),(84,'Bachelor of Industrial Technology','1','Construction Technology','BIT Major in Construction Technology',34,''),(89,'Bachelor of Technology and Livelihood Education','1','Home Economics','BTLEd Major in Home Economics',36,''),(90,'Bachelor of Science in Criminology','1','None','Bachelor of Science in Criminology',37,'');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTMENT_NAME` varchar(30) NOT NULL,
  `DEPARTMENT_DESC` varchar(50) NOT NULL,
  PRIMARY KEY (`DEPT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`DEPT_ID`, `DEPARTMENT_NAME`, `DEPARTMENT_DESC`) VALUES (34,'CAT','College of Applied Technology'),(35,'CBAM','College of Business Administration & Management'),(36,'CED','College of Education'),(37,'CCJE','College of Criminal Education');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `GRADE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNO` int(11) NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `FIRST` int(11) NOT NULL,
  `SECOND` int(11) NOT NULL,
  `THIRD` int(11) NOT NULL,
  `FOURTH` int(11) NOT NULL,
  `AVE` float NOT NULL,
  `REMARKS` text NOT NULL,
  `COMMENT` text NOT NULL,
  `SEMS` varchar(90) NOT NULL,
  PRIMARY KEY (`GRADE_ID`),
  KEY `IDNO` (`IDNO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expires_at` datetime NOT NULL,
  `used` tinyint(1) DEFAULT 0,
  `used_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`token_id`),
  UNIQUE KEY `token` (`token`),
  KEY `idx_token` (`token`,`expires_at`),
  KEY `idx_email` (`email`,`used`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schoolyr`
--

DROP TABLE IF EXISTS `schoolyr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schoolyr` (
  `SYID` int(11) NOT NULL AUTO_INCREMENT,
  `AY` varchar(30) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `IDNO` int(30) NOT NULL,
  `CATEGORY` varchar(30) NOT NULL DEFAULT 'ENROLLED',
  `DATE_RESERVED` datetime NOT NULL,
  `DATE_ENROLLED` datetime NOT NULL,
  `STATUS` varchar(30) NOT NULL DEFAULT 'New',
  PRIMARY KEY (`SYID`),
  KEY `IDNO` (`IDNO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schoolyr`
--

LOCK TABLES `schoolyr` WRITE;
/*!40000 ALTER TABLE `schoolyr` DISABLE KEYS */;
/*!40000 ALTER TABLE `schoolyr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentschedule`
--

DROP TABLE IF EXISTS `studentschedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentschedule` (
  `CLASS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SUBJ_ID` int(11) NOT NULL,
  `schedID` int(11) NOT NULL,
  `AY` varchar(11) NOT NULL,
  `DAY` varchar(20) NOT NULL,
  `C_TIME` varchar(30) NOT NULL,
  `IDNO` int(11) NOT NULL,
  `ROOM` text NOT NULL,
  `CSECTION` varchar(30) NOT NULL DEFAULT 'NONE',
  `COURSE_ID` int(11) NOT NULL,
  `SEMESTER` varchar(30) NOT NULL,
  PRIMARY KEY (`CLASS_ID`),
  KEY `IDNO` (`IDNO`),
  KEY `schedID` (`schedID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentschedule`
--

LOCK TABLES `studentschedule` WRITE;
/*!40000 ALTER TABLE `studentschedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentschedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentsubjects`
--

DROP TABLE IF EXISTS `studentsubjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentsubjects` (
  `STUDSUBJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNO` int(11) NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `LEVEL` int(11) NOT NULL,
  `SEMESTER` varchar(30) NOT NULL,
  `SY` text NOT NULL,
  `ATTEMP` int(11) NOT NULL,
  `AVERAGE` double NOT NULL,
  `OUTCOME` text NOT NULL,
  PRIMARY KEY (`STUDSUBJ_ID`),
  KEY `IDNO` (`IDNO`),
  KEY `SUBJ_ID` (`SUBJ_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentsubjects`
--

LOCK TABLES `studentsubjects` WRITE;
/*!40000 ALTER TABLE `studentsubjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentsubjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `SUBJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SUBJ_CODE` varchar(30) NOT NULL,
  `SUBJ_DESCRIPTION` varchar(255) NOT NULL,
  `UNIT` int(2) NOT NULL,
  `PRE_REQUISITE` varchar(30) NOT NULL DEFAULT 'None',
  `COURSE_ID` int(11) NOT NULL,
  `AY` varchar(30) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL,
  `PreTaken` tinyint(1) NOT NULL,
  PRIMARY KEY (`SUBJ_ID`),
  KEY `COURSE_ID` (`COURSE_ID`),
  KEY `idx_subject_course` (`COURSE_ID`),
  KEY `idx_subject_semester` (`SEMESTER`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`SUBJ_ID`, `SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`, `COURSE_ID`, `AY`, `SEMESTER`, `PreTaken`) VALUES (1,'ENG21','Purposive Communication',3,'None',23,'','First',0),(2,'FIL21','Kontekstwalisadong Komunikasyon sa Filipino',3,'None',23,'','First',0),(3,'ART21','Art Appreciation',3,'None',23,'','First',0),(4,'SS21','Understanding The Self',3,'None',23,'','First',0),(5,'FTC101','The Child and Adolescent Learners and Learning Principles',3,'None',23,'','First',0),(6,'FTC110','The Teaching Profession',3,'None',23,'','First',0),(7,'ELED111','Good Manners and Right Conduct',3,'None',23,'','First',0),(8,'PATHFIT1','Movement Competency Training',2,'None',23,'','First',0),(9,'NSTP21','National Service Training Program 1',3,'None',23,'','First',0),(10,'LIT21','Panitikan ng Pilipinas',3,'None',23,'','Second',0),(11,'SS22','Readings in Philippine History',3,'None',23,'','Second',0),(12,'SS23','The Contemporary World',3,'None',23,'','Second',0),(13,'MATH21','Mathematics in the Modern World',3,'None',23,'','Second',0),(14,'FTC106','Foundation of Special and Inclusive Education',3,'None',23,'','Second',0),(15,'ELED112','Teaching Arts in the Elementary Grades',3,'None',23,'','Second',0),(16,'PCK136','Building and Enhancing New Literacies Across the Curriculum',3,'None',23,'','Second',0),(17,'PCK126','Technology for Teaching and Learning 1',3,'None',23,'','Second',0),(18,'PATHFIT2','Exercised-Based Fitness',2,'None',23,'','Second',0),(19,'NSTP22','National Service Training Program 2',3,'None',23,'','Second',0),(20,'PA101','Organization and Management',3,'None',10,'','Second',0),(21,'PA102','Philippine Administrative Thought and Institutions',3,'None',10,'','Second',0),(22,'PA103','Politics and Administration',3,'None',10,'','Second',0),(23,'PA120','Human Behavior in Organization',3,'None',10,'','Second',0),(24,'AB13','Basic Accounting',3,'None',10,'','Second',0),(25,'MST24','Living in the IT Era',3,'None',10,'','Second',0),(26,'PATHFIT2','Exercised-Based Fitness Activities',2,'None',10,'','Second',0),(27,'NSTP22','National Service Training Program 2',3,'None',10,'','Second',0),(28,'CORDI101','Cordillera: History and Socio-Cultural Heritage',3,'None',25,'','First',0),(29,'SSP22','Philippine Indigenous Community with Gender and Society',3,'None',25,'','First',0),(30,'CLJ2','Human Rights Education',3,'None',25,'','First',0),(31,'CRIM2','Theories and Causation',3,'None',25,'','First',0),(32,'LEA1','Law Enforcement Organization and Administration',4,'None',25,'','First',0),(33,'LEA2','Comparative Models of Policing',3,'None',25,'','First',0),(34,'CDI1','Fundamentals of Investigation and Intelligence',4,'None',25,'','First',0),(35,'PATHFIT3','First Aid and Water Safety',2,'None',25,'','First',0),(36,'ENG21','Purposive Communication',3,'None',2,'','First',0),(37,'SS21','Understanding The Self',3,'None',2,'','First',0),(38,'MATH21','Mathematics in the Modern World',3,'None',2,'','First',0),(39,'BCT101','Construction Safety, Tools and Equipment',3,'None',2,'','First',0),(40,'BCT102','Basic Carpentry and Masonry',3,'BCT101',2,'','First',0),(41,'DRAW101','Technical Drawing and Blueprint Reading',2,'None',2,'','First',0),(42,'PATHFIT1','Movement Competency Training',2,'None',2,'','First',0),(43,'NSTP21','National Service Training Program 1',3,'None',2,'','First',0),(44,'SS22','Readings in Philippine History',3,'None',2,'','Second',0),(45,'SS23','The Contemporary World',3,'None',2,'','Second',0),(46,'BCT103','Surveying and Site Layout',3,'BCT101',2,'','Second',0),(47,'BCT104','Concrete and Formwork',3,'BCT102',2,'','Second',0),(48,'BCT105','Construction Materials and Methods',3,'BCT101',2,'','Second',0),(49,'PATHFIT2','Exercised-Based Fitness',2,'PATHFIT1',2,'','Second',0),(50,'NSTP22','National Service Training Program 2',3,'NSTP21',2,'','Second',0),(51,'ENG21','Purposive Communication',3,'None',4,'','First',0),(52,'SS21','Understanding The Self',3,'None',4,'','First',0),(53,'MATH21','Mathematics in the Modern World',3,'None',4,'','First',0),(54,'BAF101','Introduction to Fashion Design',3,'None',4,'','First',0),(55,'BAF102','Textile Science',3,'None',4,'','First',0),(56,'BAF103','Clothing Construction 1',3,'None',4,'','First',0),(57,'PATHFIT1','Movement Competency Training',2,'None',4,'','First',0),(58,'NSTP21','National Service Training Program 1',3,'None',4,'','First',0),(59,'SS22','Readings in Philippine History',3,'None',4,'','Second',0),(60,'SS23','The Contemporary World',3,'None',4,'','Second',0),(61,'BAF104','Pattern Making 1',3,'BAF103',4,'','Second',0),(62,'BAF105','Fashion Illustration',3,'BAF101',4,'','Second',0),(63,'BAF106','Garment Production Techniques',3,'BAF103',4,'','Second',0),(64,'PATHFIT2','Exercised-Based Fitness',2,'PATHFIT1',4,'','Second',0),(65,'NSTP22','National Service Training Program 2',3,'NSTP21',4,'','Second',0),(66,'ENG21','Purposive Communication',3,'None',5,'','First',0),(67,'SS21','Understanding The Self',3,'None',5,'','First',0),(68,'MATH21','Mathematics in the Modern World',3,'None',5,'','First',0),(69,'BCU101','Food Safety and Sanitation',3,'None',5,'','First',0),(70,'BCU102','Basic Culinary Arts',3,'None',5,'','First',0),(71,'BCU103','Baking and Pastry 1',3,'None',5,'','First',0),(72,'PATHFIT1','Movement Competency Training',2,'None',5,'','First',0),(73,'NSTP21','National Service Training Program 1',3,'None',5,'','First',0),(74,'SS22','Readings in Philippine History',3,'None',5,'','Second',0),(75,'SS23','The Contemporary World',3,'None',5,'','Second',0),(76,'BCU104','Garde Manger and Cold Kitchen',3,'BCU102',5,'','Second',0),(77,'BCU105','Asian Cuisine',3,'BCU102',5,'','Second',0),(78,'BCU106','Western Cuisine Basics',3,'BCU102',5,'','Second',0),(79,'PATHFIT2','Exercised-Based Fitness',2,'PATHFIT1',5,'','Second',0),(80,'NSTP22','National Service Training Program 2',3,'NSTP21',5,'','Second',0),(81,'ENG21','Purposive Communication',3,'None',6,'','First',0),(82,'SS21','Understanding The Self',3,'None',6,'','First',0),(83,'MATH21','Mathematics in the Modern World',3,'None',6,'','First',0),(84,'BWF101','Welding Safety and Shop Practices',3,'None',6,'','First',0),(85,'BWF102','Basic Shielded Metal Arc Welding',3,'BWF101',6,'','First',0),(86,'DRAW101','Blueprint Reading for Welders',2,'None',6,'','First',0),(87,'PATHFIT1','Movement Competency Training',2,'None',6,'','First',0),(88,'NSTP21','National Service Training Program 1',3,'None',6,'','First',0),(89,'SS22','Readings in Philippine History',3,'None',6,'','Second',0),(90,'SS23','The Contemporary World',3,'None',6,'','Second',0),(91,'BWF103','Gas Metal and Gas Tungsten Arc Welding',3,'BWF102',6,'','Second',0),(92,'BWF104','Fabrication Layout and Assembly',3,'BWF101',6,'','Second',0),(93,'BWF105','Welding Metallurgy Basics',3,'BWF101',6,'','Second',0),(94,'PATHFIT2','Exercised-Based Fitness',2,'PATHFIT1',6,'','Second',0),(95,'NSTP22','National Service Training Program 2',3,'NSTP21',6,'','Second',0);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblauto`
--

DROP TABLE IF EXISTS `tblauto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblauto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `autocode` varchar(255) DEFAULT NULL,
  `autoname` varchar(255) DEFAULT NULL,
  `appendchar` varchar(255) DEFAULT NULL,
  `autostart` int(11) DEFAULT 0,
  `autoend` int(11) DEFAULT 0,
  `incrementvalue` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `autocode` (`autocode`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblauto`
--

LOCK TABLES `tblauto` WRITE;
/*!40000 ALTER TABLE `tblauto` DISABLE KEYS */;
INSERT INTO `tblauto` (`ID`, `autocode`, `autoname`, `appendchar`, `autostart`, `autoend`, `incrementvalue`) VALUES (1,'Asset','Asset','ASitem',0,3,1),(2,'Trans','Transaction','TrAnS',1,5,1),(3,'SIDNO','IDNO','2015',1000000,230,1),(4,'EMPLOYEE','EMPID','020010',0,2,1);
/*!40000 ALTER TABLE `tblauto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblgrades`
--

DROP TABLE IF EXISTS `tblgrades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblgrades` (
  `GRADE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNO` int(11) NOT NULL COMMENT 'Student ID',
  `SUBJ_ID` int(11) NOT NULL COMMENT 'Subject ID',
  `INST_ID` int(11) NOT NULL COMMENT 'Instructor ID',
  `SEMESTER` varchar(50) NOT NULL COMMENT 'Semester (e.g., First, Second)',
  `SCHOOLYEAR` varchar(50) NOT NULL COMMENT 'School Year (e.g., 2024-2025)',
  `PRELIM` decimal(5,2) DEFAULT NULL COMMENT 'Prelim grade (0-100)',
  `MIDTERM` decimal(5,2) DEFAULT NULL COMMENT 'Midterm grade (0-100)',
  `PREFINAL` decimal(5,2) DEFAULT NULL COMMENT 'Pre-final grade (0-100)',
  `FINAL` decimal(5,2) DEFAULT NULL COMMENT 'Final grade (0-100)',
  `AVE` decimal(5,2) GENERATED ALWAYS AS (case when `PRELIM` is not null and `MIDTERM` is not null and `PREFINAL` is not null and `FINAL` is not null then (`PRELIM` + `MIDTERM` + `PREFINAL` + `FINAL`) / 4 else NULL end) STORED COMMENT 'Average of all grades',
  `REMARKS` enum('Passed','Failed','INC','DRP','IP') DEFAULT NULL COMMENT 'Grade remarks',
  `IS_LOCKED` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = locked, 0 = editable',
  `SUBMITTED_DATE` datetime DEFAULT current_timestamp() COMMENT 'When grade was first entered',
  `MODIFIED_DATE` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Last modification date',
  `LOCKED_DATE` datetime DEFAULT NULL COMMENT 'When grade was locked',
  `LOCKED_BY` int(11) DEFAULT NULL COMMENT 'User who locked the grade',
  PRIMARY KEY (`GRADE_ID`),
  UNIQUE KEY `unique_grade` (`IDNO`,`SUBJ_ID`,`SEMESTER`,`SCHOOLYEAR`),
  KEY `idx_student` (`IDNO`),
  KEY `idx_subject` (`SUBJ_ID`),
  KEY `idx_instructor` (`INST_ID`),
  KEY `idx_semester` (`SEMESTER`,`SCHOOLYEAR`),
  KEY `idx_is_locked` (`IS_LOCKED`),
  KEY `fk_grades_locked_by` (`LOCKED_BY`),
  CONSTRAINT `fk_grades_instructor` FOREIGN KEY (`INST_ID`) REFERENCES `tblinstructor` (`INST_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_grades_locked_by` FOREIGN KEY (`LOCKED_BY`) REFERENCES `useraccounts` (`ACCOUNT_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_grades_student` FOREIGN KEY (`IDNO`) REFERENCES `tblstudent` (`IDNO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_grades_subject` FOREIGN KEY (`SUBJ_ID`) REFERENCES `subject` (`SUBJ_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Student grades per subject per semester';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblgrades`
--

LOCK TABLES `tblgrades` WRITE;
/*!40000 ALTER TABLE `tblgrades` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblgrades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblgrades_history`
--

DROP TABLE IF EXISTS `tblgrades_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblgrades_history` (
  `HISTORY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GRADE_ID` int(11) NOT NULL COMMENT 'Reference to tblgrades',
  `CHANGED_BY` int(11) NOT NULL COMMENT 'User who made the change',
  `CHANGE_DATE` datetime DEFAULT current_timestamp(),
  `FIELD_CHANGED` varchar(50) NOT NULL COMMENT 'Which field was changed',
  `OLD_VALUE` varchar(255) DEFAULT NULL,
  `NEW_VALUE` varchar(255) DEFAULT NULL,
  `REASON` text DEFAULT NULL COMMENT 'Reason for change',
  PRIMARY KEY (`HISTORY_ID`),
  KEY `idx_grade_id` (`GRADE_ID`),
  KEY `idx_changed_by` (`CHANGED_BY`),
  KEY `idx_change_date` (`CHANGE_DATE`),
  CONSTRAINT `fk_history_grade` FOREIGN KEY (`GRADE_ID`) REFERENCES `tblgrades` (`GRADE_ID`) ON DELETE CASCADE,
  CONSTRAINT `fk_history_user` FOREIGN KEY (`CHANGED_BY`) REFERENCES `useraccounts` (`ACCOUNT_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Audit trail for grade changes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblgrades_history`
--

LOCK TABLES `tblgrades_history` WRITE;
/*!40000 ALTER TABLE `tblgrades_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblgrades_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinstructor`
--

DROP TABLE IF EXISTS `tblinstructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinstructor` (
  `INST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `IS_ACTIVE` tinyint(1) NOT NULL DEFAULT 1,
  `CREATED_AT` datetime DEFAULT current_timestamp(),
  `UPDATED_AT` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `INST_NAME` varchar(90) NOT NULL,
  `INST_MAJOR` varchar(90) NOT NULL,
  `INST_CONTACT` varchar(30) NOT NULL,
  PRIMARY KEY (`INST_ID`),
  KEY `idx_instructor_account` (`ACCOUNT_ID`),
  KEY `idx_instructor_active` (`IS_ACTIVE`),
  CONSTRAINT `fk_instructor_account` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `useraccounts` (`ACCOUNT_ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinstructor`
--

LOCK TABLES `tblinstructor` WRITE;
/*!40000 ALTER TABLE `tblinstructor` DISABLE KEYS */;
INSERT INTO `tblinstructor` (`INST_ID`, `ACCOUNT_ID`, `IS_ACTIVE`, `CREATED_AT`, `UPDATED_AT`, `INST_NAME`, `INST_MAJOR`, `INST_CONTACT`) VALUES (1,NULL,1,'2025-11-18 22:28:58',NULL,'Shakira B. Herman','Education / English / Crim','09123456780'),(2,NULL,1,'2025-11-18 22:28:58',NULL,'Rowena P. Viray','Education / Filipino','09123456781'),(3,NULL,1,'2025-11-18 22:28:58',NULL,'Violeta B. Bugtong','Guidance / Social Sciences','09123456782'),(4,NULL,1,'2025-11-18 22:28:58',NULL,'Crisha Belle M. Bondad','Education / SPED & Literacies','09123456783'),(5,NULL,1,'2025-11-18 22:28:58',NULL,'Adrian Kyle C. Cariño','Education / Professional Ed.','09123456784'),(6,NULL,1,'2025-11-18 22:28:58',NULL,'Joan S. Inluban','Education / Elementary & Cordi','09123456785'),(7,NULL,1,'2025-11-18 22:28:58',NULL,'Corina L. Masing','PE / NSTP','09123456786'),(8,NULL,1,'2025-11-18 22:28:58',NULL,'Clinton G. Bedso','NSTP / Criminology','09123456787'),(9,NULL,1,'2025-11-18 22:28:58',NULL,'Gleemoore C. Makie','Education / Academics Head','09123456788'),(10,NULL,1,'2025-11-18 22:28:58',NULL,'R. Dicos','Social Studies / PATHFIT','09123456789'),(11,NULL,1,'2025-11-18 22:28:58',NULL,'R. Tobias','Mathematics / ICT','09123456790'),(12,NULL,1,'2025-11-18 22:28:58',NULL,'Federico B. Basco','Public Administration / Economics','09123456791'),(13,NULL,1,'2025-11-18 22:28:58',NULL,'Hazel G. Lino','Accounting','09123456792'),(14,NULL,1,'2025-11-18 22:28:58',NULL,'Mckleen Jeff O. Aroco','Information Technology','09123456793'),(15,NULL,1,'2025-11-18 22:28:58',NULL,'Joel H. Nehyeban','Criminology / Law Enforcement','09123456794'),(16,NULL,1,'2025-11-18 22:28:58',NULL,'F. Polkero','Criminology / Policing','09123456795'),(17,NULL,1,'2025-11-18 22:28:58',NULL,'M. Bosetan','Physical Education','09123456796'),(18,NULL,1,'2025-11-18 22:28:58',NULL,'K. Contero','EdTech / Technology for Teaching','09123456797'),(19,NULL,1,'2025-11-18 22:28:58',NULL,'Marcelino P. Dela Cruz','Mathematics / General Education','09123456798'),(20,NULL,1,'2025-11-18 22:28:58',NULL,'Ivy L. Domingo','Information Technology / Programming','09123456799'),(21,NULL,1,'2025-11-18 22:28:58',NULL,'Rey Anthony B. Navarro','Digital Logic / Discrete Structures','09123456800'),(22,NULL,1,'2025-11-18 22:28:58',NULL,'Leandro C. Rivera','Automotive Tech - Engines & Chassis','09123456801'),(23,NULL,1,'2025-11-18 22:28:58',NULL,'Noel G. Pascua','Automotive Tech - Electrical Systems','09123456802'),(24,NULL,1,'2025-11-18 22:28:58',NULL,'Ruel M. Gonzales','Electrical Tech - Circuits & Machines','09123456803'),(25,NULL,1,'2025-11-18 22:28:58',NULL,'Arnold V. Bautista','Electrical Tech - Installation','09123456804'),(26,NULL,1,'2025-11-18 22:28:58',NULL,'Jonathan E. Ramos','Construction Tech - Carpentry','09123456805'),(27,NULL,1,'2025-11-18 22:28:58',NULL,'Eugene B. Flores','Construction Tech - Survey & Materials','09123456806'),(28,NULL,1,'2025-11-18 22:28:58',NULL,'Melissa F. Duyag','Fashion Design / Textiles','09123456807'),(29,NULL,1,'2025-11-18 22:28:58',NULL,'Karen Mae G. Alonzo','Pattern Making / Garment Construction','09123456808'),(30,NULL,1,'2025-11-18 22:28:58',NULL,'Rochelle D. Manalo','Culinary Arts / Hot Kitchen','09123456809'),(31,NULL,1,'2025-11-18 22:28:58',NULL,'Gilbert R. Lumawag','Baking and Pastry Arts','09123456810'),(32,NULL,1,'2025-11-18 22:28:58',NULL,'Randy T. Flores','Welding Tech - SMAW/GMAW','09123456811'),(33,NULL,1,'2025-11-18 22:28:58',NULL,'Benjie P. Sagabaen','Metal Fabrication & Layout','09123456812');
/*!40000 ALTER TABLE `tblinstructor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllogs`
--

DROP TABLE IF EXISTS `tbllogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbllogs` (
  `LOGID` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` int(11) NOT NULL,
  `LOGDATETIME` datetime NOT NULL,
  `LOGROLE` varchar(55) NOT NULL,
  `LOGMODE` varchar(55) NOT NULL,
  PRIMARY KEY (`LOGID`)
) ENGINE=InnoDB AUTO_INCREMENT=705 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllogs`
--

LOCK TABLES `tbllogs` WRITE;
/*!40000 ALTER TABLE `tbllogs` DISABLE KEYS */;
INSERT INTO `tbllogs` (`LOGID`, `USERID`, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) VALUES (1,1,'2016-09-22 21:46:01','Administrator','Logged in'),(2,100000022,'2016-09-22 21:46:29','Student','Logged out'),(3,100000015,'2016-09-23 05:00:38','Student','Logged in'),(4,100000015,'2016-09-23 05:00:45','Student','Logged out'),(5,100000025,'2016-09-23 05:02:31','Student','Logged in'),(6,100000025,'2016-09-23 05:02:55','Student','Logged out'),(7,100000025,'2016-09-23 05:03:53','Student','Logged in'),(8,100000025,'2016-09-23 05:11:40','Student','Logged out'),(44,1,'2016-09-28 15:59:30','Administrator','Logged in'),(45,100000071,'2016-09-28 16:03:54','Student','Logged in'),(46,100000071,'2016-09-28 16:08:44','Student','Logged out'),(47,1,'2016-09-28 16:35:55','Administrator','Logged out'),(48,1,'2016-09-28 16:36:01','Administrator','Logged in'),(49,1,'2016-09-28 16:37:41','Administrator','Logged out'),(50,2,'2016-09-28 16:37:46','Registrar','Logged in'),(51,2,'2016-09-28 16:37:53','Registrar','Logged in'),(52,2,'2016-09-28 16:38:00','Registrar','Logged in'),(53,1,'2016-09-28 16:38:05','Administrator','Logged in'),(54,1,'2016-09-28 16:38:19','Administrator','Logged out'),(55,2,'2016-09-28 16:38:25','Registrar','Logged in'),(56,2,'2016-09-28 16:38:34','Registrar','Logged in'),(57,1,'2016-09-28 16:38:44','Administrator','Logged in'),(58,1,'2016-09-28 17:11:31','Administrator','Logged in'),(59,1,'2016-09-28 17:12:57','Administrator','Logged out'),(60,2,'2016-09-28 17:13:03','Registrar','Logged in'),(61,2,'2016-09-28 17:13:22','Registrar','Logged out'),(62,1,'2016-09-28 17:16:24','Administrator','Logged in'),(63,100000073,'2016-09-29 00:09:36','Student','Logged out'),(64,100000076,'2016-09-29 02:28:04','Student','Logged out'),(65,2,'2016-09-29 03:16:04','Registrar','Logged in'),(66,2,'2016-09-29 03:59:22','Registrar','Logged in'),(67,2,'2016-09-29 04:48:52','Registrar','Logged in'),(68,100000079,'2016-09-29 04:49:11','Student','Logged out'),(69,100000080,'2016-09-29 04:53:17','Student','Logged out'),(70,100000073,'2016-09-29 04:53:53','Student','Logged in'),(71,2,'2016-09-29 05:29:19','Registrar','Logged in'),(72,2,'2016-09-29 05:29:32','Registrar','Logged out'),(73,1,'2016-09-29 05:29:42','Administrator','Logged in'),(74,100000073,'2016-09-29 05:30:16','Student','Logged out'),(75,100000080,'2016-09-29 05:30:25','Student','Logged in'),(76,1,'2016-09-29 07:19:58','Administrator','Logged in'),(77,2,'2016-09-29 08:48:03','Registrar','Logged in'),(78,2,'2016-09-29 08:49:03','Registrar','Logged out'),(79,1,'2016-09-29 08:49:32','Administrator','Logged in'),(80,100000081,'2016-09-29 08:53:32','Student','Logged out'),(81,100000079,'2016-09-29 08:53:55','Student','Logged in'),(82,100000079,'2016-09-29 10:15:53','Student','Logged out'),(83,100000083,'2016-09-29 10:20:12','Student','Logged out'),(84,100000084,'2016-09-29 10:23:29','Student','Logged out'),(85,100000085,'2016-09-29 10:28:26','Student','Logged out'),(86,100000086,'2016-09-29 10:31:39','Student','Logged out'),(87,100000087,'2016-09-29 10:35:43','Student','Logged out'),(88,100000086,'2016-09-29 10:35:51','Student','Logged in'),(89,100000086,'2016-09-29 10:40:03','Student','Logged out'),(90,100000073,'2016-09-29 10:40:10','Student','Logged in'),(91,100000073,'2016-09-29 10:40:41','Student','Logged out'),(92,100000081,'2016-09-29 10:43:26','Student','Logged in'),(93,100000081,'2016-09-29 10:46:48','Student','Logged out'),(94,1,'2016-09-29 10:47:56','Administrator','Logged out'),(95,2,'2016-09-29 10:48:02','Registrar','Logged in'),(96,2,'2016-09-29 10:48:22','Registrar','Logged out'),(97,1,'2016-09-29 10:48:29','Administrator','Logged in'),(98,100000088,'2016-09-29 10:50:11','Student','Logged out'),(99,100000073,'2016-09-29 10:50:18','Student','Logged in'),(100,100000073,'2016-09-29 11:01:04','Student','Logged out'),(101,100000090,'2016-09-29 11:02:07','Student','Logged out'),(102,100000091,'2016-09-29 11:06:07','Student','Logged out'),(103,100000086,'2016-09-29 11:06:17','Student','Logged in'),(104,100000086,'2016-09-29 11:06:53','Student','Logged out'),(105,100000073,'2016-09-29 11:07:02','Student','Logged in'),(106,100000073,'2016-09-29 11:07:20','Student','Logged out'),(107,100000092,'2016-09-29 11:30:44','Student','Logged out'),(108,100000093,'2016-09-29 11:34:39','Student','Logged out'),(109,100000073,'2016-09-29 11:36:12','Student','Logged in'),(110,100000073,'2016-09-29 11:36:17','Student','Logged out'),(111,100000094,'2016-09-29 11:37:59','Student','Logged out'),(112,100000094,'2016-09-29 11:38:09','Student','Logged in'),(113,100000094,'2016-09-29 11:40:37','Student','Logged out'),(114,100000095,'2016-09-29 11:42:30','Student','Logged out'),(115,100000096,'2016-09-29 11:44:16','Student','Logged out'),(116,100000097,'2016-09-29 11:46:46','Student','Logged out'),(117,100000098,'2016-09-29 11:57:01','Student','Logged out'),(118,100000099,'2016-09-29 11:58:45','Student','Logged out'),(119,100000099,'2016-09-29 11:58:52','Student','Logged in'),(120,100000099,'2016-09-29 11:58:58','Student','Logged out'),(121,1000000100,'2016-09-29 12:01:01','Student','Logged out'),(122,1000000101,'2016-09-29 12:02:54','Student','Logged out'),(123,1000000102,'2016-09-29 12:04:18','Student','Logged out'),(124,1000000103,'2016-09-29 12:07:27','Student','Logged out'),(125,1000000104,'2016-09-29 12:08:50','Student','Logged out'),(126,1000000105,'2016-09-29 12:10:44','Student','Logged out'),(127,1000000106,'2016-09-29 12:13:13','Student','Logged out'),(128,1000000107,'2016-09-29 12:14:57','Student','Logged out'),(129,1000000108,'2016-09-29 12:16:53','Student','Logged out'),(130,1,'2016-09-29 16:37:39','Administrator','Logged in'),(131,1,'2016-09-29 16:38:17','Administrator','Logged out'),(132,1,'2016-09-29 16:38:21','Administrator','Logged in'),(133,1,'2016-09-29 16:39:19','Administrator','Logged out'),(134,1,'2016-09-29 16:39:23','Administrator','Logged in'),(135,1000000109,'2016-09-29 16:49:15','Student','Logged out'),(136,100000073,'0000-00-00 00:00:00','Student','Logged in'),(137,100000073,'2016-09-29 17:07:59','Student','Logged out'),(138,100000073,'0000-00-00 00:00:00','Student','Logged in'),(139,1,'2016-09-29 17:53:03','Administrator','Logged in'),(140,100000073,'2016-09-29 18:09:53','Student','Logged out'),(141,1000000110,'2016-09-29 18:15:25','Student','Logged out'),(142,1000000111,'2016-09-29 18:19:26','Student','Logged out'),(143,1000000112,'2016-09-29 18:22:58','Student','Logged out'),(144,1000000113,'2016-09-29 18:25:01','Student','Logged out'),(145,1000000114,'2016-09-29 18:26:55','Student','Logged out'),(146,1000000115,'2016-09-29 18:28:09','Student','Logged out'),(147,1000000116,'2016-09-29 18:29:09','Student','Logged out'),(148,1000000117,'2016-09-29 18:31:08','Student','Logged out'),(149,1000000118,'2016-09-29 18:32:45','Student','Logged out'),(150,1000000119,'2016-09-29 18:34:05','Student','Logged out'),(151,1000000120,'2016-09-29 18:43:34','Student','Logged out'),(152,1000000121,'2016-09-29 18:44:47','Student','Logged out'),(153,1000000122,'2016-09-29 18:45:53','Student','Logged out'),(154,1000000123,'2016-09-29 18:50:13','Student','Logged out'),(155,1000000124,'2016-09-29 18:51:24','Student','Logged out'),(156,1000000125,'2016-09-29 18:52:34','Student','Logged out'),(157,1000000126,'2016-09-29 18:53:39','Student','Logged out'),(158,1000000120,'2016-09-29 18:53:49','Student','Logged in'),(159,1000000120,'2016-09-29 18:54:03','Student','Logged out'),(160,1000000127,'2016-09-29 18:55:34','Student','Logged out'),(161,1000000128,'2016-09-29 18:56:39','Student','Logged out'),(162,1000000129,'2016-09-29 18:57:42','Student','Logged out'),(163,1000000130,'2016-09-29 18:59:04','Student','Logged out'),(164,1,'2016-09-29 19:07:28','Administrator','Logged in'),(165,1000000121,'2016-09-29 19:07:43','Student','Logged in'),(166,1000000121,'2016-09-29 19:07:50','Student','Logged out'),(167,1000000131,'2016-09-29 19:08:04','Student','Logged in'),(168,1000000131,'2016-09-29 19:08:39','Student','Logged out'),(169,1000000121,'2016-09-29 19:14:18','Student','Logged in'),(170,1000000121,'2016-09-29 19:15:12','Student','Logged out'),(171,1000000132,'2016-09-29 19:17:36','Student','Logged out'),(172,1,'2016-09-29 23:50:06','Administrator','Logged in'),(173,1,'2016-09-29 23:54:23','Administrator','Logged in'),(174,1000000133,'2016-09-30 01:34:28','Student','Logged out'),(175,1000000134,'2016-09-30 01:38:26','Student','Logged out'),(176,1000000135,'2016-09-30 01:44:48','Student','Logged out'),(177,1,'2016-09-30 01:46:34','Administrator','Logged in'),(178,1,'2016-09-30 02:42:22','Administrator','Logged in'),(179,1000000136,'2016-09-30 02:50:21','Student','Logged out'),(180,1000000137,'2016-09-30 03:23:48','Student','Logged out'),(181,100000073,'2016-09-30 03:23:57','Student','Logged in'),(182,1,'2016-10-03 00:58:29','Administrator','Logged in'),(183,1,'2016-10-04 09:59:35','Administrator','Logged in'),(184,100000087,'2016-10-04 10:05:41','Student','Logged in'),(185,100000087,'2016-10-04 10:09:59','Student','Logged out'),(186,1000000139,'2016-10-04 10:43:22','Student','Logged out'),(187,1,'2016-10-04 14:20:22','Administrator','Logged in'),(188,1,'2016-10-04 23:35:32','Administrator','Logged in'),(189,1000000116,'2016-10-05 01:21:09','Student','Logged in'),(190,1,'2016-10-05 01:34:20','Administrator','Logged in'),(191,1000000116,'2016-10-05 02:30:47','Student','Logged out'),(192,1000000133,'2016-10-05 02:30:55','Student','Logged in'),(193,1,'2016-10-05 02:59:26','Administrator','Logged in'),(194,1000000133,'2016-10-05 03:36:18','Student','Logged in'),(195,1000000133,'2016-10-05 03:49:32','Student','Logged out'),(196,1000000140,'0000-00-00 00:00:00','Student','Logged in'),(197,1000000140,'2016-10-05 06:50:22','Student','Logged out'),(198,100000077,'2016-10-05 06:50:30','Student','Logged in'),(199,100000077,'2016-10-05 06:51:25','Student','Logged out'),(200,1000000140,'2016-10-05 06:51:33','Student','Logged in'),(201,1000000140,'2016-10-05 06:52:38','Student','Logged out'),(202,1000000140,'0000-00-00 00:00:00','Student','Logged in'),(203,1000000140,'2016-10-05 06:53:27','Student','Logged out'),(204,100000077,'0000-00-00 00:00:00','Student','Logged in'),(205,100000077,'2016-10-05 06:59:20','Student','Logged out'),(206,1000000140,'2016-10-05 06:59:49','Student','Logged in'),(207,1000000140,'2016-10-05 07:02:13','Student','Logged out'),(208,1,'2016-10-05 08:55:14','Administrator','Logged in'),(209,1000000121,'0000-00-00 00:00:00','Student','Logged in'),(210,1000000121,'2016-10-05 09:28:07','Student','Logged out'),(211,1000000140,'2016-10-05 09:28:13','Student','Logged in'),(212,1000000142,'2016-10-06 08:40:16','Student','Logged out'),(213,1,'2016-10-06 08:44:09','Administrator','Logged in'),(214,1000000143,'2016-10-06 08:44:29','Student','Logged out'),(215,1000000144,'2016-10-06 08:48:51','Student','Logged out'),(216,1000000144,'2016-10-06 08:49:01','Student','Logged in'),(217,1000000144,'2016-10-06 08:49:10','Student','Logged out'),(218,1000000145,'2016-10-06 08:57:58','Student','Logged out'),(219,100000073,'0000-00-00 00:00:00','Student','Logged in'),(220,100000073,'2016-10-06 09:05:17','Student','Logged out'),(221,100000086,'2016-10-06 09:07:20','Student','Logged in'),(222,100000086,'2016-10-06 09:08:00','Student','Logged out'),(223,100000096,'2016-10-06 09:08:37','Student','Logged in'),(224,100000096,'2016-10-06 09:26:06','Student','Logged out'),(225,100000096,'0000-00-00 00:00:00','Student','Logged in'),(226,100000096,'2016-10-06 09:26:27','Student','Logged out'),(227,100000096,'2016-10-06 09:26:33','Student','Logged in'),(228,1,'2016-10-06 14:03:43','Administrator','Logged in'),(229,1000000146,'2016-10-06 14:16:14','Student','Logged out'),(230,100000073,'2016-10-06 14:16:25','Student','Logged in'),(231,1,'2016-10-06 14:16:41','Administrator','Logged in'),(232,100000073,'2016-10-06 14:45:24','Student','Logged out'),(233,100000073,'2016-10-06 14:49:12','Student','Logged in'),(234,100000073,'2016-10-06 15:20:54','Student','Logged out'),(235,100000096,'2016-10-06 15:21:07','Student','Logged in'),(236,100000096,'2016-10-06 15:29:37','Student','Logged out'),(237,100000096,'2016-10-06 15:29:57','Student','Logged in'),(238,100000096,'2016-10-06 15:31:13','Student','Logged out'),(239,100000096,'2016-10-06 15:50:34','Student','Logged in'),(240,1,'2016-10-07 00:26:28','Administrator','Logged in'),(241,1,'2016-10-07 01:09:04','Administrator','Logged in'),(242,100000073,'2016-10-07 01:17:39','Student','Logged in'),(243,100000073,'2016-10-07 01:20:53','Student','Logged out'),(244,1000000148,'2016-10-07 01:24:45','Student','Logged out'),(245,1000000149,'2016-10-07 01:40:59','Student','Logged out'),(246,100000096,'2016-10-07 01:41:53','Student','Logged in'),(247,100000096,'2016-10-07 02:24:12','Student','Logged out'),(248,1000000149,'2016-10-07 02:24:17','Student','Logged in'),(249,1000000149,'2016-10-07 06:27:56','Student','Logged out'),(250,1000000152,'2016-10-07 06:32:26','Student','Logged out'),(251,1000000153,'2016-10-07 06:34:59','Student','Logged out'),(252,1000000154,'2016-10-07 06:37:58','Student','Logged out'),(253,1000000155,'2016-10-07 06:39:39','Student','Logged out'),(254,1000000156,'2016-10-07 06:41:05','Student','Logged out'),(255,1000000157,'2016-10-07 06:44:26','Student','Logged out'),(256,1000000158,'2016-10-07 06:46:32','Student','Logged out'),(257,1000000159,'2016-10-07 06:48:24','Student','Logged out'),(258,1000000160,'2016-10-07 06:50:16','Student','Logged out'),(259,1000000161,'2016-10-07 07:14:03','Student','Logged out'),(260,1000000162,'2016-10-07 07:16:34','Student','Logged out'),(261,1000000140,'2016-10-07 07:16:48','Student','Logged in'),(262,1000000140,'2016-10-07 07:30:19','Student','Logged out'),(263,1000000140,'0000-00-00 00:00:00','Student','Logged in'),(264,1000000140,'2016-10-07 07:31:20','Student','Logged out'),(265,1000000161,'2016-10-07 07:31:28','Student','Logged in'),(266,1000000161,'2016-10-07 07:42:46','Student','Logged out'),(267,1000000161,'0000-00-00 00:00:00','Student','Logged in'),(268,1000000163,'2016-10-07 13:17:15','Student','Logged out'),(269,1000000164,'2016-10-07 13:20:44','Student','Logged out'),(270,1000000165,'2016-10-07 13:26:27','Student','Logged out'),(271,1000000166,'2016-10-07 13:30:09','Student','Logged out'),(272,1000000167,'2016-10-07 13:34:10','Student','Logged out'),(273,1000000168,'2016-10-07 13:37:31','Student','Logged out'),(274,1000000169,'2016-10-07 13:40:41','Student','Logged out'),(275,1000000170,'2016-10-07 13:42:53','Student','Logged out'),(276,1000000171,'2016-10-07 13:48:06','Student','Logged out'),(277,1000000172,'2016-10-07 13:50:37','Student','Logged out'),(278,1000000173,'2016-10-07 13:55:45','Student','Logged out'),(279,1000000174,'2016-10-07 14:01:20','Student','Logged out'),(280,1000000175,'2016-10-07 14:04:13','Student','Logged out'),(281,1000000176,'2016-10-07 14:06:41','Student','Logged out'),(282,1000000177,'2016-10-07 14:12:44','Student','Logged out'),(283,1,'2016-10-07 14:12:57','Administrator','Logged in'),(284,1000000140,'0000-00-00 00:00:00','Student','Logged in'),(285,1000000140,'2016-10-07 14:17:04','Student','Logged out'),(286,1000000178,'2016-10-07 14:24:09','Student','Logged out'),(287,1000000179,'2016-10-07 14:28:17','Student','Logged out'),(288,1000000180,'2016-10-07 14:32:34','Student','Logged out'),(289,1000000181,'2016-10-07 14:34:47','Student','Logged out'),(290,1000000182,'2016-10-07 14:56:22','Student','Logged out'),(291,1000000140,'0000-00-00 00:00:00','Student','Logged in'),(292,1000000140,'2016-10-07 15:01:26','Student','Logged out'),(293,1000000183,'2016-10-07 15:03:38','Student','Logged out'),(294,1000000184,'2016-10-07 15:07:07','Student','Logged out'),(295,1000000185,'2016-10-07 15:16:27','Student','Logged out'),(296,1000000186,'2016-10-07 15:18:29','Student','Logged out'),(297,1000000187,'2016-10-07 15:19:53','Student','Logged out'),(298,1000000188,'2016-10-07 15:21:13','Student','Logged out'),(299,1000000189,'2016-10-07 15:22:55','Student','Logged out'),(300,1000000190,'2016-10-07 15:24:47','Student','Logged out'),(301,1000000191,'2016-10-07 15:26:21','Student','Logged out'),(302,1000000192,'2016-10-07 15:28:19','Student','Logged out'),(303,1000000193,'2016-10-07 15:29:59','Student','Logged out'),(304,1000000194,'2016-10-07 15:31:22','Student','Logged out'),(305,1000000195,'2016-10-07 15:33:16','Student','Logged out'),(306,1000000196,'2016-10-07 15:34:57','Student','Logged out'),(307,1000000197,'2016-10-07 15:36:17','Student','Logged out'),(308,1000000198,'2016-10-07 15:37:54','Student','Logged out'),(309,1000000199,'2016-10-07 15:39:23','Student','Logged out'),(310,1000000200,'2016-10-07 15:41:08','Student','Logged out'),(311,1000000201,'2016-10-07 15:50:13','Student','Logged out'),(312,1000000167,'2016-10-07 15:54:23','Student','Logged in'),(313,1000000167,'2016-10-07 15:55:46','Student','Logged out'),(314,1000000166,'0000-00-00 00:00:00','Student','Logged in'),(315,1000000166,'2016-10-07 15:58:22','Student','Logged out'),(316,1000000168,'0000-00-00 00:00:00','Student','Logged in'),(317,1000000168,'2016-10-07 15:59:13','Student','Logged out'),(318,1000000174,'0000-00-00 00:00:00','Student','Logged in'),(319,1000000174,'2016-10-07 16:00:36','Student','Logged out'),(320,1000000201,'2016-10-07 16:00:45','Student','Logged in'),(321,1000000201,'2016-10-07 16:04:18','Student','Logged out'),(322,1000000201,'2016-10-07 16:04:26','Student','Logged in'),(323,1000000201,'2016-10-07 16:12:13','Student','Logged out'),(324,100000098,'2016-10-07 16:12:21','Student','Logged in'),(325,100000098,'2016-10-07 16:21:49','Student','Logged out'),(326,100000077,'0000-00-00 00:00:00','Student','Logged in'),(327,100000077,'2016-10-07 16:23:43','Student','Logged out'),(328,1000000102,'2016-10-07 16:25:15','Student','Logged in'),(329,1000000102,'2016-10-07 17:35:17','Student','Logged out'),(330,1000000100,'2016-10-07 17:36:28','Student','Logged in'),(331,1000000100,'2016-10-07 18:14:44','Student','Logged out'),(332,100000098,'2016-10-07 18:14:54','Student','Logged in'),(333,100000098,'2016-10-07 18:24:59','Student','Logged out'),(334,1000000201,'2016-10-07 18:25:05','Student','Logged in'),(335,1000000201,'2016-10-07 18:32:57','Student','Logged out'),(336,1000000156,'2016-10-07 18:33:06','Student','Logged in'),(337,1000000156,'2016-10-07 19:07:05','Student','Logged out'),(338,100000098,'2016-10-07 19:07:23','Student','Logged in'),(339,1,'2025-10-12 08:02:34','Administrator','Logged in'),(340,1,'2025-10-12 08:25:31','Administrator','Logged out'),(341,1,'2025-10-12 08:25:37','Administrator','Logged in'),(342,1,'2025-10-12 08:26:17','Administrator','Logged out'),(343,1000000202,'2025-10-12 08:27:39','Student','Logged out'),(344,1,'2025-10-12 08:27:55','Administrator','Logged in'),(345,1,'2025-10-12 08:28:34','Administrator','Logged out'),(346,1,'2025-10-12 08:32:08','Administrator','Logged in'),(347,1,'2025-10-12 08:56:44','Administrator','Logged out'),(348,1000000203,'2025-10-12 09:25:07','Student','Logged out'),(349,1000000203,'2025-10-12 09:39:08','Student','Logged in'),(350,1000000203,'2025-10-12 10:58:09','Student','Logged out'),(351,1000000204,'2025-10-12 11:49:57','Student','Logged out'),(352,1000000205,'2025-10-12 12:19:52','Student','Logged out'),(353,1000000206,'2025-10-12 12:21:14','Student','Logged out'),(354,1,'2025-10-12 12:24:08','Administrator','Logged out'),(355,1000000207,'2025-10-12 12:30:06','Student','Logged out'),(356,1,'2025-10-12 12:30:17','Administrator','Logged in'),(357,1000000208,'2025-10-12 12:33:55','Student','Logged out'),(358,1,'2025-10-12 12:34:07','Administrator','Logged in'),(359,1,'2025-10-12 12:35:17','Administrator','Logged out'),(360,1000000209,'2025-10-12 12:45:53','Student','Logged out'),(361,1,'2025-10-12 12:53:30','Administrator','Logged out'),(362,1,'2025-10-12 15:02:46','Administrator','Logged in'),(363,1,'2025-10-12 16:07:03','Administrator','Logged in'),(364,1000000210,'2025-10-12 18:01:11','Student','Logged out'),(365,1,'2025-10-12 18:04:06','Administrator','Logged in'),(366,1,'2025-10-12 18:08:13','Administrator','Logged in'),(367,1,'2025-10-12 18:17:27','Administrator','Logged in'),(368,1,'2025-10-12 18:17:59','Administrator','Logged out'),(369,1,'2025-10-12 18:28:18','Administrator','Logged out'),(370,1,'2025-10-12 18:31:37','Administrator','Logged in'),(371,1000000212,'2025-10-12 18:42:18','Student','Logged out'),(372,1000000212,'2025-10-12 19:15:28','Student','Logged in'),(373,1,'2025-10-12 19:22:48','Administrator','Logged out'),(374,1000000212,'2025-10-12 19:22:57','Student','Logged in'),(375,1000000212,'2025-10-12 19:46:50','Student','Logged out'),(376,1,'2025-10-12 19:47:01','Administrator','Logged in'),(377,1,'2025-10-12 20:07:29','Administrator','Logged out'),(378,1,'2025-10-12 20:26:56','Administrator','Logged in'),(379,1000000212,'2025-10-12 20:34:30','Student','Logged out'),(380,1000000212,'2025-10-12 20:35:01','Student','Logged in'),(381,1000000212,'2025-10-12 20:35:39','Student','Logged out'),(382,1,'2025-10-13 04:10:03','Administrator','Logged in'),(383,1,'2025-10-13 04:11:38','Administrator','Logged out'),(384,1000000213,'2025-10-13 04:11:54','Student','Logged in'),(385,1,'2025-10-13 04:12:59','Administrator','Logged in'),(386,1,'2025-10-13 04:21:35','Administrator','Logged out'),(387,1000000213,'2025-10-13 04:21:49','Student','Logged in'),(388,1000000213,'2025-10-13 04:23:51','Student','Logged out'),(389,1,'2025-10-13 04:24:16','Administrator','Logged in'),(390,1,'2025-10-13 04:35:07','Administrator','Logged out'),(391,1,'2025-10-13 04:39:20','Administrator','Logged in'),(392,1000000213,'2025-10-13 05:25:41','Student','Logged in'),(393,1000000213,'2025-10-13 05:48:18','Student','Logged out'),(394,1,'2025-10-14 15:25:47','Administrator','Logged out'),(395,1,'2025-10-14 15:26:23','Administrator','Logged in'),(396,1,'2025-10-14 15:51:10','Administrator','Logged in'),(397,1,'2025-10-14 16:00:33','Administrator','Logged in'),(398,1,'2025-10-14 16:11:39','Administrator','Logged in'),(399,1,'2025-10-14 16:24:43','Administrator','Logged out'),(400,1,'2025-10-14 17:37:18','Administrator','Logged in'),(401,1000000212,'2025-10-14 18:26:10','Student','Logged in'),(402,1000000212,'2025-10-14 18:26:35','Student','Logged out'),(403,1000000212,'2025-10-14 18:26:44','Student','Logged in'),(404,1000000212,'2025-10-14 18:27:26','Student','Logged out'),(405,1000000212,'2025-10-14 18:28:11','Student','Logged in'),(406,1000000212,'2025-10-14 18:29:32','Student','Logged out'),(407,1000000214,'2025-10-14 18:57:53','Student','Logged out'),(408,1000000215,'2025-10-14 19:59:29','Student','Logged out'),(409,1000000216,'2025-10-14 20:05:25','Student','Logged out'),(410,1,'2025-10-15 07:59:55','Administrator','Logged in'),(411,1,'2025-10-15 08:51:01','Administrator','Logged in'),(412,1,'2025-10-15 08:51:44','Administrator','Logged out'),(413,1000000217,'2025-10-15 13:28:00','Student','Logged out'),(414,1,'2025-10-15 14:08:02','Administrator','Logged in'),(415,1,'2025-10-15 14:08:50','Administrator','Logged out'),(416,1,'2025-10-15 14:08:56','Administrator','Logged in'),(417,1,'2025-10-15 18:13:17','Administrator','Logged in'),(418,1,'2025-10-16 13:36:12','Administrator','Logged in'),(419,1,'2025-10-16 13:57:47','Administrator','Logged out'),(420,1,'2025-10-16 13:58:06','Administrator','Logged in'),(421,1,'2025-10-16 14:12:23','Administrator','Logged out'),(422,1,'2025-10-16 15:53:47','Administrator','Logged in'),(423,1,'2025-10-16 15:59:21','Administrator','Logged out'),(424,1,'2025-10-16 16:00:17','Administrator','Logged in'),(425,1000000218,'2025-10-16 16:01:38','Student','Logged out'),(426,1000000212,'2025-10-16 17:34:47','Student','Logged in'),(427,1000000212,'2025-10-16 17:34:52','Student','Logged out'),(428,1,'2025-10-16 17:36:01','Administrator','Logged in'),(429,1,'2025-10-16 17:36:14','Administrator','Logged out'),(430,1,'2025-10-16 17:36:23','Administrator','Logged in'),(431,1,'2025-10-16 17:37:13','Administrator','Logged out'),(432,1,'2025-10-16 17:56:41','Administrator','Logged out'),(433,1000000219,'2025-10-16 17:57:06','Student','Logged out'),(434,1000000212,'2025-10-16 18:17:04','Student','Logged in'),(435,1000000212,'2025-10-16 18:17:40','Student','Logged in'),(436,1000000212,'2025-10-16 18:18:54','Student','Logged out'),(437,1000000212,'2025-10-16 18:19:36','Student','Logged in'),(438,1000000212,'2025-10-16 18:19:54','Student','Logged out'),(439,1000000212,'2025-10-16 18:20:00','Student','Logged in'),(440,1000000212,'2025-10-16 18:20:08','Student','Logged out'),(441,1000000212,'2025-10-16 18:20:12','Student','Logged out'),(442,1000000212,'2025-10-16 18:20:19','Student','Logged in'),(443,1000000212,'2025-10-16 18:20:24','Student','Logged out'),(444,1,'2025-10-16 18:20:43','Administrator','Logged in'),(445,1000000212,'2025-10-16 18:40:32','Student','Logged in'),(446,1000000212,'2025-10-16 18:40:35','Student','Logged out'),(447,1000000220,'2025-10-16 18:43:58','Student','Logged out'),(448,1000000221,'2025-10-16 18:46:48','Student','Logged out'),(449,1000000221,'2025-10-16 19:37:41','Student','Logged in'),(450,1000000221,'2025-10-16 19:42:10','Student','Logged out'),(451,1000000221,'2025-10-16 19:42:54','Student','Logged in'),(452,1,'2025-10-16 20:20:37','Administrator','Logged out'),(453,1000000221,'2025-10-16 20:23:12','Student','Logged out'),(454,1,'2025-10-17 02:08:53','Administrator','Logged in'),(455,1,'2025-10-17 02:42:22','Administrator','Logged out'),(456,1,'2025-10-17 04:17:28','Administrator','Logged in'),(457,1,'2025-10-17 05:20:03','Administrator','Logged in'),(458,1,'2025-10-17 10:30:39','Administrator','Logged in'),(459,1,'2025-10-17 10:48:42','Administrator','Logged out'),(460,1,'2025-10-17 18:04:01','Administrator','Logged out'),(461,1,'2025-10-17 18:04:11','Administrator','Logged in'),(462,1,'2025-10-18 11:42:19','Administrator','Logged in'),(463,1,'2025-10-19 12:27:34','Administrator','Logged out'),(464,1,'2025-10-19 13:01:51','Administrator','Logged in'),(465,1,'2025-10-19 14:05:33','','Logged out'),(466,1,'2025-10-19 14:05:47','Administrator','Logged in'),(467,1,'2025-10-19 14:05:47','Administrator','Logged in'),(468,1,'2025-10-19 14:07:11','','Logged out'),(469,2,'2025-10-19 14:08:37','Registrar','Logged in'),(470,2,'2025-10-19 14:08:37','Registrar','Logged in'),(471,2,'2025-10-19 14:09:09','','Logged out'),(472,3,'2025-10-19 14:13:49','Administrator','Logged in'),(473,3,'2025-10-19 14:13:49','Administrator','Logged in'),(474,3,'2025-10-19 14:16:26','','Logged out'),(475,3,'2025-10-19 14:16:36','Administrator','Logged in'),(476,3,'2025-10-19 14:16:36','Administrator','Logged in'),(477,3,'2025-10-19 14:19:56','','Logged out'),(478,3,'2025-10-19 14:20:12','Administrator','Logged in'),(479,3,'2025-10-19 14:20:12','Administrator','Logged in'),(480,3,'2025-10-19 14:34:30','','Logged out'),(481,3,'2025-10-19 14:34:40','Administrator','Logged in'),(482,3,'2025-10-19 14:34:40','Administrator','Logged in'),(483,3,'2025-10-19 14:38:17','','Logged out'),(484,3,'2025-10-19 14:38:23','Administrator','Logged in'),(485,3,'2025-10-19 14:38:23','Administrator','Logged in'),(486,3,'2025-10-19 14:53:26','','Logged out'),(487,5,'2025-10-19 14:53:31','','Logged in'),(488,5,'2025-10-19 14:53:31','','Logged in'),(489,5,'2025-10-19 14:57:06','','Logged out'),(490,5,'2025-10-19 14:57:23','Administrator','Logged in'),(491,5,'2025-10-19 15:38:30','Administrator','Logged out'),(492,6,'2025-10-19 15:38:33','Administrator','Logged in'),(493,6,'2025-10-19 16:40:08','Administrator','Logged out'),(494,2,'2025-10-19 16:40:14','Registrar','Logged in'),(495,2,'2025-10-19 16:40:46','Registrar','Logged out'),(496,2,'2025-10-19 16:40:57','Registrar','Logged in'),(497,2,'2025-10-19 16:55:03','Registrar','Logged out'),(498,3,'2025-10-19 16:55:11','Chairperson','Logged in'),(499,3,'2025-10-19 16:55:50','Chairperson','Logged out'),(500,2,'2025-10-19 16:56:00','Registrar','Logged in'),(501,2,'2025-10-19 17:05:12','Registrar','Logged out'),(502,1,'2025-10-19 17:05:16','Administrator','Logged in'),(503,1,'2025-10-19 17:05:23','Administrator','Logged out'),(504,3,'2025-10-19 17:05:32','Chairperson','Logged in'),(505,3,'2025-10-19 17:13:05','Chairperson','Logged out'),(506,1,'2025-10-19 17:13:10','Administrator','Logged in'),(507,1,'2025-10-19 17:13:17','Administrator','Logged out'),(508,2,'2025-10-19 17:13:22','Registrar','Logged in'),(509,2,'2025-10-19 17:19:36','Registrar','Logged out'),(510,1,'2025-10-19 17:19:40','Administrator','Logged in'),(511,1,'2025-10-19 17:19:52','Administrator','Logged out'),(512,3,'2025-10-19 17:20:02','Chairperson','Logged in'),(513,3,'2025-10-19 17:43:50','Chairperson','Logged out'),(514,1,'2025-10-19 17:43:58','Administrator','Logged in'),(515,1,'2025-10-19 18:10:06','Administrator','Logged out'),(516,3,'2025-10-19 18:10:11','Chairperson','Logged in'),(517,3,'2025-10-19 18:15:05','Chairperson','Logged out'),(518,2,'2025-10-19 18:15:16','Registrar','Logged in'),(519,2,'2025-10-19 18:16:10','Registrar','Logged out'),(520,1,'2025-10-19 18:20:01','Administrator','Logged in'),(521,1,'2025-10-19 18:20:10','Administrator','Logged out'),(522,2,'2025-10-19 18:20:22','Registrar','Logged in'),(523,2,'2025-10-19 18:26:28','Registrar','Logged out'),(524,3,'2025-10-19 18:26:33','Chairperson','Logged in'),(525,3,'2025-10-19 18:26:38','Chairperson','Logged out'),(526,1,'2025-10-19 18:26:45','Administrator','Logged in'),(527,1,'2025-10-19 18:44:34','Administrator','Logged out'),(528,2,'2025-10-19 18:44:44','Registrar','Logged in'),(529,2,'2025-10-19 18:46:53','Registrar','Logged out'),(530,1,'2025-10-19 18:47:09','Administrator','Logged in'),(531,1,'2025-10-19 19:02:21','Administrator','Logged out'),(532,2,'2025-10-19 19:02:32','Registrar','Logged in'),(533,1000000222,'2025-10-19 19:03:08','Student','Logged out'),(534,1,'2025-10-19 19:03:27','Administrator','Logged in'),(535,1,'2025-10-19 19:24:41','Administrator','Logged out'),(536,3,'2025-10-19 19:24:48','Chairperson','Logged in'),(537,3,'2025-10-19 19:35:30','Chairperson','Logged out'),(538,1,'2025-10-19 19:35:37','Administrator','Logged in'),(539,2,'2025-10-19 19:47:41','Registrar','Logged out'),(540,1,'2025-10-19 19:48:09','Administrator','Logged in'),(541,1,'2025-10-19 20:32:21','Administrator','Logged out'),(542,2,'2025-10-19 20:36:44','Registrar','Logged in'),(543,2,'2025-10-19 20:47:51','Registrar','Logged out'),(544,1,'2025-10-19 20:48:07','Administrator','Logged in'),(545,1,'2025-10-19 20:48:39','Administrator','Logged out'),(546,1,'2025-10-19 20:48:46','Administrator','Logged in'),(547,1,'2025-10-19 20:56:18','Administrator','Logged out'),(548,3,'2025-10-19 20:56:26','Chairperson','Logged in'),(549,1,'2025-10-19 21:24:23','Administrator','Logged out'),(550,3,'2025-10-19 21:24:32','Chairperson','Logged in'),(551,2,'2025-10-19 21:39:27','Registrar','Logged in'),(552,3,'2025-10-19 21:42:14','Chairperson','Logged out'),(553,1,'2025-10-19 21:42:39','Administrator','Logged in'),(554,1,'2025-10-19 21:42:44','Administrator','Logged out'),(555,3,'2025-10-19 21:42:57','Chairperson','Logged in'),(556,3,'2025-10-19 22:09:37','Chairperson','Logged out'),(557,2,'2025-10-19 22:09:57','Registrar','Logged in'),(558,2,'2025-10-19 22:12:02','Registrar','Logged out'),(559,1,'2025-10-19 22:12:10','Administrator','Logged in'),(560,1,'2025-10-19 22:19:19','Administrator','Logged out'),(561,3,'2025-10-19 22:19:32','Chairperson','Logged in'),(562,3,'2025-10-19 22:25:09','Chairperson','Logged out'),(563,1,'2025-10-19 22:25:14','Administrator','Logged in'),(564,1,'2025-10-19 22:36:46','Administrator','Logged out'),(565,2,'2025-10-19 22:36:57','Registrar','Logged in'),(566,2,'2025-10-19 22:57:01','Registrar','Logged out'),(567,1,'2025-10-19 22:57:06','Administrator','Logged in'),(568,2,'2025-10-19 23:49:48','Registrar','Logged out'),(569,1,'2025-10-20 00:08:37','Administrator','Logged out'),(570,2,'2025-10-20 00:08:52','Registrar','Logged in'),(571,2,'2025-10-20 00:09:42','Registrar','Logged out'),(572,1,'2025-10-20 00:09:51','Administrator','Logged in'),(573,1,'2025-10-20 00:40:24','Administrator','Logged out'),(574,3,'2025-10-20 00:40:31','Chairperson','Logged in'),(575,3,'2025-10-20 00:58:08','Chairperson','Logged out'),(576,1,'2025-10-20 00:58:15','Administrator','Logged in'),(577,1000000222,'2025-10-20 01:10:34','Student','Logged in'),(578,1000000222,'2025-10-20 01:11:29','Student','Logged out'),(579,1000000222,'2025-10-20 01:18:32','Student','Logged in'),(580,1000000222,'2025-10-20 01:18:47','Student','Logged out'),(581,1,'2025-10-20 01:19:22','Administrator','Logged in'),(582,1,'2025-10-20 01:45:12','Administrator','Logged out'),(583,1000000222,'2025-10-20 01:45:19','Student','Logged in'),(584,1000000222,'2025-10-20 01:45:35','Student','Logged out'),(585,1,'2025-10-20 01:45:49','Administrator','Logged in'),(586,1,'2025-10-24 11:37:16','Administrator','Logged in'),(587,1,'2025-10-24 11:38:42','Administrator','Logged out'),(588,1,'2025-10-24 14:14:02','Administrator','Logged in'),(589,1,'2025-10-24 14:50:31','Administrator','Logged out'),(590,1,'2025-10-24 14:50:44','Administrator','Logged in'),(591,1,'2025-10-24 15:05:24','Administrator','Logged in'),(592,1,'2025-10-24 16:06:29','Administrator','Logged out'),(593,1,'2025-10-24 16:16:21','Administrator','Logged out'),(594,1,'2025-10-24 16:28:52','Administrator','Logged in'),(595,1,'2025-10-24 16:52:02','Administrator','Logged out'),(596,1,'2025-10-25 22:27:18','Administrator','Logged in'),(597,1,'2025-10-25 22:31:13','Administrator','Logged in'),(598,1,'2025-10-25 22:39:10','Administrator','Logged in'),(599,1,'2025-10-25 22:41:41','Administrator','Logged in'),(600,1,'2025-10-25 23:07:24','Administrator','Logged out'),(601,1,'2025-10-25 23:21:32','Administrator','Logged in'),(602,1,'2025-10-25 23:28:53','Administrator','Logged out'),(603,1,'2025-10-25 23:36:32','Administrator','Logged in'),(604,1000000223,'2025-10-25 23:37:15','Student','Logged out'),(605,1,'2025-10-25 23:42:22','Administrator','Logged out'),(606,1000000222,'2025-10-25 23:45:10','Student','Logged in'),(607,1000000222,'2025-10-25 23:47:55','Student','Logged out'),(608,1000000224,'2025-10-26 00:15:15','Student','Logged out'),(609,1,'2025-10-26 00:15:32','Administrator','Logged in'),(610,2,'2025-10-26 00:36:56','Registrar','Logged in'),(611,2,'2025-10-26 01:41:52','Registrar','Logged out'),(612,2,'2025-10-26 01:42:52','Registrar','Logged in'),(613,2,'2025-10-26 01:44:50','Registrar','Logged out'),(614,1,'2025-10-26 01:46:47','Administrator','Logged in'),(615,1,'2025-10-26 01:50:33','Administrator','Logged out'),(616,1,'2025-10-26 09:00:20','Administrator','Logged in'),(617,1,'2025-10-26 09:01:57','Administrator','Logged out'),(618,1,'2025-10-26 22:52:03','Administrator','Logged in'),(619,1,'2025-10-26 22:53:05','Administrator','Logged out'),(620,1,'2025-10-26 23:28:26','Administrator','Logged in'),(621,1000000225,'2025-10-26 23:42:54','Student','Logged in'),(622,1000000225,'2025-10-26 23:43:57','Student','Logged out'),(623,1000000225,'2025-10-26 23:58:58','Student','Logged out'),(624,1000000225,'2025-10-27 00:00:02','Student','Logged in'),(625,1000000225,'2025-10-27 00:00:24','Student','Logged out'),(626,1,'2025-10-27 00:57:04','Administrator','Logged out'),(627,1000000226,'2025-10-27 11:06:36','Student','Logged out'),(628,1000000226,'2025-10-27 11:06:57','Student','Logged in'),(629,1000000226,'2025-10-27 11:07:23','Student','Logged out'),(630,1000000226,'2025-10-27 11:07:38','Student','Logged in'),(631,1000000226,'2025-10-27 11:08:14','Student','Logged out'),(632,1,'2025-11-04 09:05:39','Administrator','Logged in'),(633,1,'2025-11-04 09:36:49','Administrator','Logged out'),(634,1000000227,'2025-11-04 09:56:27','Student','Logged out'),(635,1,'2025-11-04 14:40:24','Administrator','Logged in'),(636,1000000227,'2025-11-04 14:40:57','Student','Logged in'),(637,1000000227,'2025-11-04 16:00:07','Student','Logged out'),(638,1,'2025-11-04 16:00:35','Administrator','Logged in'),(639,1,'2025-11-04 16:01:10','Administrator','Logged out'),(640,1,'2025-11-04 16:58:58','Administrator','Logged out'),(641,1,'2025-11-04 16:59:15','Administrator','Logged in'),(642,1000000228,'2025-11-04 16:59:33','Student','Logged out'),(643,1000000229,'2025-11-05 11:12:56','Student','Logged in'),(644,1,'2025-11-05 22:27:33','Administrator','Logged in'),(645,1,'2025-11-06 00:21:22','Administrator','Logged out'),(646,1000000229,'2025-11-06 00:21:53','Student','Logged in'),(647,1000000229,'2025-11-06 00:22:54','Student','Logged out'),(648,1,'2025-11-06 00:52:09','Administrator','Logged in'),(649,1,'2025-11-06 00:52:57','Administrator','Logged out'),(650,3,'2025-11-06 00:53:07','Chairperson','Logged in'),(651,3,'2025-11-06 00:53:49','Chairperson','Logged out'),(652,1000000229,'2025-11-06 10:23:40','Student','Logged in'),(653,1000000229,'2025-11-06 10:23:55','Student','Logged out'),(654,1,'2025-11-06 10:25:08','Administrator','Logged in'),(655,1,'2025-11-06 14:05:51','Administrator','Logged in'),(656,1,'2025-11-06 16:57:25','Administrator','Logged out'),(657,3,'2025-11-06 17:02:05','Chairperson','Logged in'),(658,3,'2025-11-06 17:02:51','Chairperson','Logged out'),(659,1,'2025-11-06 22:16:17','Administrator','Logged in'),(660,1,'2025-11-07 10:47:12','Administrator','Logged out'),(661,1,'2025-11-07 10:47:21','Administrator','Logged in'),(662,1,'2025-11-17 21:10:14','Administrator','Logged in'),(663,1,'2025-11-17 21:18:29','Administrator','Logged in'),(664,1,'2025-11-17 14:57:24','Administrator','Logged out'),(665,1,'2025-11-17 18:05:44','Administrator','Logged in'),(666,1,'2025-11-18 04:46:13','Administrator','Logged in'),(667,1,'2025-11-18 04:50:04','Administrator','Logged out'),(668,3,'2025-11-18 04:50:13','Chairperson','Logged in'),(669,3,'2025-11-18 04:52:52','Chairperson','Logged out'),(670,1,'2025-11-18 07:11:22','Administrator','Logged in'),(671,1,'2025-11-18 07:32:20','Administrator','Logged out'),(672,2,'2025-11-18 07:32:27','Registrar','Logged in'),(673,2,'2025-11-18 07:32:36','Registrar','Logged out'),(674,1,'2025-11-18 07:32:40','Administrator','Logged in'),(675,1,'2025-11-18 07:37:26','Administrator','Logged out'),(676,2,'2025-11-18 07:37:32','Registrar','Logged in'),(677,1,'2025-11-18 07:57:04','Administrator','Logged out'),(678,3,'2025-11-18 07:58:47','Chairperson','Logged in'),(679,3,'2025-11-18 08:20:36','Chairperson','Logged out'),(680,1,'2025-11-18 08:29:38','Administrator','Logged in'),(681,1,'2025-11-18 08:33:17','Administrator','Logged out'),(682,1,'2025-11-18 08:50:57','Administrator','Logged in'),(683,1,'2025-11-18 08:51:01','Administrator','Logged out'),(684,3,'2025-11-18 08:51:07','Chairperson','Logged in'),(685,3,'2025-11-18 09:47:57','Chairperson','Logged out'),(686,1,'2025-11-18 09:48:02','Administrator','Logged in'),(687,1,'2025-11-18 09:52:34','Administrator','Logged out'),(688,3,'2025-11-18 09:52:42','Chairperson','Logged in'),(689,3,'2025-11-18 09:54:44','Chairperson','Logged out'),(690,1,'2025-11-18 09:54:48','Administrator','Logged in'),(691,1,'2025-11-18 09:59:39','Administrator','Logged out'),(692,2,'2025-11-18 09:59:46','Registrar','Logged in'),(693,2,'2025-11-18 10:20:28','Registrar','Logged out'),(694,3,'2025-11-18 10:20:37','Chairperson','Logged in'),(695,3,'2025-11-18 10:21:49','Chairperson','Logged out'),(696,3,'2025-11-18 10:21:54','Chairperson','Logged in'),(697,3,'2025-11-18 13:15:06','Chairperson','Logged out'),(698,1,'2025-11-18 13:15:09','Administrator','Logged in'),(699,1,'2025-11-18 13:21:22','Administrator','Logged out'),(700,1,'2025-11-18 13:25:44','Administrator','Logged in'),(701,1,'2025-11-18 14:23:02','Administrator','Logged out'),(702,1,'2025-11-18 14:25:55','Administrator','Logged in'),(703,1,'2025-11-18 14:26:44','Administrator','Logged out'),(704,1,'2025-11-18 14:50:47','Administrator','Logged in');
/*!40000 ALTER TABLE `tbllogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblschedule`
--

DROP TABLE IF EXISTS `tblschedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblschedule` (
  `schedID` int(11) NOT NULL AUTO_INCREMENT,
  `TIME_FROM` varchar(90) NOT NULL,
  `TIME_TO` varchar(90) NOT NULL,
  `sched_time` varchar(30) NOT NULL,
  `sched_day` varchar(30) NOT NULL,
  `sched_semester` varchar(30) NOT NULL,
  `sched_sy` varchar(30) NOT NULL,
  `sched_room` varchar(30) NOT NULL,
  `SECTION` varchar(30) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `INST_ID` int(11) NOT NULL,
  PRIMARY KEY (`schedID`),
  KEY `COURSE_ID` (`COURSE_ID`),
  KEY `SUBJ_ID` (`SUBJ_ID`),
  KEY `idx_schedule_subject` (`SUBJ_ID`),
  KEY `idx_schedule_instructor` (`INST_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblschedule`
--

LOCK TABLES `tblschedule` WRITE;
/*!40000 ALTER TABLE `tblschedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblschedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsemester`
--

DROP TABLE IF EXISTS `tblsemester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsemester` (
  `SEMID` int(11) NOT NULL AUTO_INCREMENT,
  `SEMESTER` varchar(90) NOT NULL,
  `SETSEM` tinyint(1) NOT NULL,
  PRIMARY KEY (`SEMID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsemester`
--

LOCK TABLES `tblsemester` WRITE;
/*!40000 ALTER TABLE `tblsemester` DISABLE KEYS */;
INSERT INTO `tblsemester` (`SEMID`, `SEMESTER`, `SETSEM`) VALUES (1,'First',1),(2,'Second',0);
/*!40000 ALTER TABLE `tblsemester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstuddetails`
--

DROP TABLE IF EXISTS `tblstuddetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstuddetails` (
  `DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNO` int(30) NOT NULL,
  `LAST_SCHOOL` varchar(255) DEFAULT NULL,
  `LAST_SCHOOL_ADDR` varchar(255) DEFAULT NULL,
  `ADDR_WHILE_STUDY` varchar(255) DEFAULT NULL,
  `FATHER_NAME` varchar(150) DEFAULT NULL,
  `FATHER_CONTACT` varchar(100) DEFAULT NULL,
  `MOTHER_NAME` varchar(150) DEFAULT NULL,
  `MOTHER_CONTACT` varchar(100) DEFAULT NULL,
  `EMER_NAME` varchar(150) DEFAULT NULL,
  `EMER_REL` varchar(100) DEFAULT NULL,
  `EMER_ADDR` varchar(255) DEFAULT NULL,
  `EMER_CONTACT` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`DETAIL_ID`),
  KEY `IDNO` (`IDNO`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstuddetails`
--

LOCK TABLES `tblstuddetails` WRITE;
/*!40000 ALTER TABLE `tblstuddetails` DISABLE KEYS */;
INSERT INTO `tblstuddetails` (`DETAIL_ID`, `IDNO`, `LAST_SCHOOL`, `LAST_SCHOOL_ADDR`, `ADDR_WHILE_STUDY`, `FATHER_NAME`, `FATHER_CONTACT`, `MOTHER_NAME`, `MOTHER_CONTACT`, `EMER_NAME`, `EMER_REL`, `EMER_ADDR`, `EMER_CONTACT`, `EMAIL`) VALUES (1,100000056,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,100000056,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,100000057,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,100000058,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,100000061,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,100000061,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,100000062,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,100000067,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,100000068,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,100000069,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,100000069,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,100000071,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,100000073,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,100000076,'',NULL,'','','','','','','',NULL,'',NULL),(15,100000077,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,100000079,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,100000080,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,100000081,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,100000083,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,100000084,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,100000085,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,100000086,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,100000087,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,100000088,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,100000090,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,100000091,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,100000092,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,100000093,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,100000094,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,100000095,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,100000096,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,100000097,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,100000098,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,100000099,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,1000000100,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,1000000101,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,1000000102,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,1000000103,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,1000000104,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,1000000105,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,1000000106,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,1000000107,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,1000000108,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(44,1000000109,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,1000000110,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(46,1000000111,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,1000000112,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(48,1000000113,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(49,1000000114,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(50,1000000115,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,1000000116,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(52,1000000117,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(53,1000000118,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,1000000119,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,1000000120,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(56,1000000121,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(57,1000000122,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(58,1000000123,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(59,1000000124,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(60,1000000125,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(61,1000000126,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(62,1000000127,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(63,1000000128,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(64,1000000129,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(65,1000000130,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(66,1000000131,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(67,1000000132,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(68,1000000133,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(69,1000000134,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(70,1000000135,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(71,1000000136,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(72,1000000137,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(73,1000000139,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(74,1000000140,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(75,1000000142,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(76,1000000143,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(77,1000000144,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(78,1000000145,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(79,1000000146,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(80,1000000148,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(81,1000000149,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(82,1000000152,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(83,1000000153,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(84,1000000154,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(85,1000000155,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(86,1000000156,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(87,1000000157,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(88,1000000158,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(89,1000000159,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(90,1000000160,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(91,1000000161,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(92,1000000162,'',NULL,'','','','','','','',NULL,'',NULL),(93,1000000163,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(94,1000000164,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(95,1000000165,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(96,1000000166,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(97,1000000167,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(98,1000000168,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(99,1000000169,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(100,1000000170,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(101,1000000171,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(102,1000000172,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(103,1000000173,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(104,1000000174,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(105,1000000175,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(106,1000000176,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(107,1000000177,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(108,1000000178,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(109,1000000179,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(110,1000000180,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(111,1000000181,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(112,1000000182,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(113,1000000183,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(114,1000000184,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(115,1000000185,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(116,1000000186,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(117,1000000187,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(118,1000000188,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(119,1000000189,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(120,1000000190,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(121,1000000191,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(122,1000000192,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(123,1000000193,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(124,1000000194,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(125,1000000195,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(126,1000000196,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(127,1000000197,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(128,1000000198,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(129,1000000199,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(130,1000000200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(142,1000000212,'Ambuklao National High School','Poblacion, Bokod, Benguet','Poblacion, Bokod, Benguet','Douglas Palos','12345678910','Cornelia Palos','09197233884','Cornelia Palos','Mother','Poblacion, Bokod, Benguet','09453754120','elt0npalos@gmail.com'),(143,1000000213,'Ambuklao National High School','Poblacion, Bokod, Benguet','Poblacion, Bokod, Benguet','Henry Kelcho','1234567','Emma Kelcho','12345678','Emma','mother','Poblacion, Bokod, Benguet','12345678910','kurtreuelkelchs@gmail.com'),(144,1000000214,'Ambuklao National High School','Poblacion, Bokod, Benguet','Poblacion, Bokod, Benguet','Douglas Palos','12345678910','Cornelia Palos','09197233884','Elton John D Palos','Mother','Poblacion, Bokod, Benguet','09453754120','elt0npalos@gmail.com'),(146,1000000216,'','','','','','','','','','','',''),(147,1000000217,'Ambuklao National High School','Poblacion, Bokod, Benguet','Poblacion, Bokod, Benguet','Douglas Palos','09453754120','Cornelia Palos','09453754120','Elton John D Palos','Father','Poblacion, Bokod, Benguet','09453754120','elt0npalos@gmail.com'),(148,1000000218,'Ambuklao National High School','Poblacion, Bokod, Benguet','Poblacion, Bokod, Benguet','Douglas Palos','09453754120','Cornelia Palos','09453754120','Elton John D Palos','Mother','Poblacion, Bokod, Benguet','09453754120','elt0npalos@gmail.com'),(149,1000000219,'Ambuklao National High School','Poblacion, Bokod, Benguet','Poblacion, Bokod, Benguet','Douglas Palos','09453754120','Cornelia Palos','09197233884','Conan D Edogawa','Mother','Poblacion, Bokod, Benguet','09453754120','eltonshinji6@gmail.com'),(150,1000000220,'Ambuklao National High School','Poblacion, Bokod, Benguet','Poblacion, Bokod, Benguet','Douglas Palos','09453754120','Cornelia Palos','09197233884','Elton John D Palos','Mother','Poblacion, Bokod, Benguet','09453754120','elt0npalos@gmail.com'),(151,1000000221,'Ambuklao National High School','Poblacion, Bokod, Benguet','Poblacion, Bokod, Benguet','Douglas Palos','09453754120','Cornelia Palos','09197233884','Elton John D Palos','Mother','Poblacion, Bokod, Benguet','09453754120','elt0npalos@gmail.com'),(152,1000000222,'Ambuklao National High School','Poblacion, Bokod, Benguet','Poblacion, Bokod, Benguet','Douglas Palos','12345678910','Cornelia Palos','09197233884','Cornelia Palos','Mother','Bobok-Bisal, Bokod, Benguet','09453754120','elt0npalos@gmail.com'),(153,1000000223,'Ambuklao National High School','bokod','Tokyo, Japan','Elon Musk','12345678910','jgjlajgljagljgj','12345678911','Elon Musk','Father','bokod','12345678910','elt0npalos@gmail.com'),(154,1000000224,'Ambuklao National High School','bokod','Tokyo, Japan','Elon Musk','12345678910','jgjlajgljagljgj','12345678911','Elon Musk','Father','bokod','12345678910','elt0npalos@gmail.com'),(155,1000000225,'Ambuklao National High School','bokod','Poblacion, Bokod, Benguet','Elon Musk','12345678910','Cornelia Palos','12345678911','Elon Musk','Father','bokod','09453754120','elt0npalos@gmail.com'),(156,1000000226,'Ambuklao National High School','Poblacion','Poblacion','Kento Yamazaki','09453754120','Ana de Armas','09453754120','John D Watson Sr','Grandfather','Poblacion','09197233884','elt0npalos@gmail.com'),(157,1000000227,'Ambuklao National High School','bokod','Poblacion, Bokod, Benguet','Elon Musk','12345678910','Cornelia Palos','12345678911','Elon Musk','Father','bokod','12345678910','elt0npalos@gmail.com'),(158,1000000228,'Ambuklao National High School','Ambuklao, Bokod, Benguet','Poblacion, Bokod, Benguet','Elon Musk','12345678910','Cornelia Palos','09197233884','Elon Musk','Father','Poblacion, Bokod, Benguet','12345678910','elt0npalos@gmail.com'),(159,1000000229,'Ambuklao National High School','Ambuklao, Bokod, Benguet','Poblacion, Bokod, Benguet','Elon Musk','12345678910','Cornelia Palos','09197233884','Elon Musk','Father','Poblacion, Bokod, Benguet','12345678910','elt0npalos@gmail.com');
/*!40000 ALTER TABLE `tblstuddetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstudent`
--

DROP TABLE IF EXISTS `tblstudent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstudent` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNO` int(20) NOT NULL,
  `FNAME` varchar(40) NOT NULL,
  `LNAME` varchar(40) NOT NULL,
  `MNAME` varchar(40) NOT NULL,
  `SUFFIX` varchar(20) DEFAULT NULL,
  `SEX` varchar(10) NOT NULL DEFAULT 'Male',
  `BDAY` date NOT NULL,
  `BPLACE` text NOT NULL,
  `AGE` int(30) NOT NULL,
  `NATIONALITY` varchar(40) NOT NULL,
  `CONTACT_NO` varchar(40) NOT NULL,
  `HOME_ADD` text NOT NULL,
  `ACC_USERNAME` varchar(255) NOT NULL,
  `ACC_PASSWORD` text NOT NULL,
  `student_status` text NOT NULL,
  `YEARLEVEL` int(11) NOT NULL,
  `STUDSECTION` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `STUDPHOTO` varchar(255) NOT NULL,
  `SEMESTER` varchar(30) NOT NULL,
  `SYEAR` varchar(30) NOT NULL,
  `NewEnrollees` tinyint(1) NOT NULL,
  `ENROLLMENT_STATUS` enum('Pending','Approved','Rejected','Enrolled','Withdrawn') NOT NULL DEFAULT 'Pending',
  `APPROVED_BY` int(11) DEFAULT NULL,
  `APPROVED_DATE` datetime DEFAULT NULL,
  `REJECTION_REASON` text DEFAULT NULL,
  `WITHDRAWAL_DATE` datetime DEFAULT NULL,
  `NOTES` text DEFAULT NULL,
  `MAIDEN_NAME` varchar(150) DEFAULT NULL,
  `ETHNICITY` varchar(100) DEFAULT NULL,
  `last_password_reset` datetime DEFAULT NULL,
  `password_reset_count` int(11) DEFAULT 0,
  PRIMARY KEY (`S_ID`),
  UNIQUE KEY `IDNO` (`IDNO`),
  KEY `idx_enrollment_status` (`ENROLLMENT_STATUS`),
  KEY `idx_approved_by` (`APPROVED_BY`),
  KEY `idx_newenrollees_status` (`NewEnrollees`,`ENROLLMENT_STATUS`),
  KEY `idx_student_course` (`COURSE_ID`),
  KEY `idx_student_year` (`YEARLEVEL`),
  CONSTRAINT `fk_student_approved_by` FOREIGN KEY (`APPROVED_BY`) REFERENCES `useraccounts` (`ACCOUNT_ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstudent`
--

LOCK TABLES `tblstudent` WRITE;
/*!40000 ALTER TABLE `tblstudent` DISABLE KEYS */;
INSERT INTO `tblstudent` (`S_ID`, `IDNO`, `FNAME`, `LNAME`, `MNAME`, `SUFFIX`, `SEX`, `BDAY`, `BPLACE`, `AGE`, `NATIONALITY`, `CONTACT_NO`, `HOME_ADD`, `ACC_USERNAME`, `ACC_PASSWORD`, `student_status`, `YEARLEVEL`, `STUDSECTION`, `COURSE_ID`, `STUDPHOTO`, `SEMESTER`, `SYEAR`, `NewEnrollees`, `ENROLLMENT_STATUS`, `APPROVED_BY`, `APPROVED_DATE`, `REJECTION_REASON`, `WITHDRAWAL_DATE`, `NOTES`, `MAIDEN_NAME`, `ETHNICITY`, `last_password_reset`, `password_reset_count`) VALUES (13,100000076,'Junnel','Henong','L',NULL,'Male','1995-09-28','Bokod',0,'Filipino','09179959869','Poblacion, Bokod, Benguet','junnel','c507f3285dc8f7c2ec06c8e84a5bcfdef5b75bc3','New',1,1,18,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(14,100000077,'Alamada','Norhan','K',NULL,'Male','1995-08-10','Tublay',0,'Filipino','09287466580','Poblacion, Tublay, Benguet','norhan','eb64988565e5d1a8eb2417a3d23781811f6316c8','New',1,1,18,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(15,100000079,'Rabpani','Palisaman','p',NULL,'Male','1997-07-14','Itogon',0,'PIlipino','09179959869','Poblacion, Itogon, Benguet','palisaman','2e2acf50c2e443211ce148db65e456120fc9edd4','New',1,1,23,'','Second','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(16,100000080,'Edward','Madriaga','M',NULL,'Male','1999-08-26','Bakun',0,'Filipino','09264566776','Poblacion, Bakun, Benguet','edward','55b5a0f748d3a82dce10b205ecb0a0d8916c66a1','New',1,1,18,'','Second','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(18,100000083,'Josh Bernard','Cadelina','H',NULL,'Male','1994-11-22','Kapangan',0,'Filipino','092756633785','Poblacion, Kapangan, Benguet','josh','c028c213ed5efcf30c3f4fc7361dbde0c893c5b7','New',1,1,10,'student_image/13406890_1099504936754825_2344921503074981979_n.jpg','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(19,100000084,'Icer Yves','Exiomo','F',NULL,'Male','1997-02-22','Kibungan',0,'Filipino','09287466580','Poblacion, Kibungan, Benguet','icer','8870c5997fb3dc73724d6ef9716013706bc0eb6d','New',1,1,18,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(20,100000085,'Baltazar, Jr.','Votacion','B',NULL,'Male','1998-02-28','Mankayan',0,'Filipino','09097844576','Poblacion, Mankayan, Benguet','baltazar','97b13511481f75df46827988e27e8b925ee7c0ac','New',1,1,18,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(21,100000086,'Jenny Lyn','Dorado','K',NULL,'Male','1996-02-29','Buguias',0,'Filipino','09754990672','Poblacion, Buguias, Benguet','jenny','6a3f4389a53c889b623e67f385f28ab8e84e5029','New',1,1,10,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(22,100000087,'Ronald','Dela Cruz','K',NULL,'Male','1997-09-28','Kabayan',0,'Filipino','09267588909','Poblacion, Kabayan, Benguet','ronald','9d270ca213048cc46f762591f54b6a0d59390996','New',0,0,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(23,100000088,'Ar ar','Catalan','C',NULL,'Male','1997-09-28','Sablan',0,'Filipino','09287569403','Poblacion, Sablan, Benguet','arar','1dface85bd933c1b72b17eec0bdb76ed95e659ba','New',1,0,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(24,100000090,'Jenny Pearl','Cordero','K',NULL,'Female','1995-09-08','La Trinidad',0,'Filipino','09267577888','Poblacion, La Trinidad, Benguet','pearl','4ddc5d84096cb270103079731103f93082d8b099','New',1,0,10,'','Second','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(25,100000091,'Bainusarah','Mangulamas','M',NULL,'Female','1997-02-15','Bokod',0,'Filipino','09267544890','Poblacion, Bokod, Benguet','bai','7c824f2e1c4d8e5c9445dd7ded4e96febed020f7','New',1,1,18,'','Second','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(26,100000092,'Jerome','Legazpe','M',NULL,'Male','1996-02-28','Tublay',0,'Filipino','09275566712','Poblacion, Tublay, Benguet','jerome','723156650c5778d0e4df4b2fbfeefa65359302e5','New',1,1,18,'','Second','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(29,100000095,'Johnrey','Betito','W',NULL,'Male','1998-09-09','Atok',0,'Filipino','09878757575','Poblacion, Atok, Benguet','johnrey','38bdca114849afd1be4000a690e233ee6ab11e25','New',1,0,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(30,100000096,'Jammal','Mangulamas','L',NULL,'Male','1996-10-09','Kapangan',0,'Filipino','09129877756','Poblacion, Kapangan, Benguet','jammal','55e95a5a5f88bbb32ea13542d428540fc4f6faea','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(31,100000097,'Almohadnie','Angeles','O',NULL,'Male','1990-01-02','Kibungan',0,'Filipino','09129989876','Poblacion, Kibungan, Benguet','almohadnie','24655db0feba3830ac7bc346ee331e94d85201ac','New',1,0,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(32,100000098,'Lorraine','Merquillo','S',NULL,'Female','1998-10-02','Mankayan',0,'Filipino','09129987883','Poblacion, Mankayan, Benguet','lorraine','007eedf694d0287b7f3609669737ee8025708336','Irregular',1,2,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(33,100000099,'Joseph','Handoc','M',NULL,'Male','1995-07-29','Buguias',0,'Filipino','09087765556','Poblacion, Buguias, Benguet','joseph','461476587780aa9fa5611ea6dc3912c146a91760','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(34,1000000100,'Ivy','Santiago','B',NULL,'Female','1997-09-09','Kabayan',0,'Filipino','09998877665','Poblacion, Kabayan, Benguet','ivy','2c66c6e3c743465602c6dcd8e9412bee5fb846ed','New',1,1,10,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(35,1000000101,'Suzette','Cadelina','H',NULL,'Female','1987-09-15','Sablan',0,'Filipino','09127875674','Poblacion, Sablan, Benguet','suzette','754597e45a1a8d6c6c071ea892194e8f5483f782','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,'Gonzales',NULL,NULL,0),(36,1000000102,'Arjohn','Bustamante','G',NULL,'Male','1994-07-08','La Trinidad',0,'Filipino','09128987657','Poblacion, La Trinidad, Benguet','arjohn','33faf9c06d0cc880493e3c57a8fb25fb1e180610','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(37,1000000103,'Christopher','Basa','K',NULL,'Male','1998-12-25','Bokod',0,'Filipino','09367584758','Poblacion, Bokod, Benguet','christopher','d6a3a4306f20dc52f478d602ba53e8d95963acac','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(38,1000000104,'Remvi','Cadet','M',NULL,'Male','1990-11-08','Tublay',0,'Filipino','09128873674','Poblacion, Tublay, Benguet','remvi','a38966035b61798fce9e1fd0cd3df4d2edb3d417','New',1,1,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(39,1000000105,'Abby','Peralta','L',NULL,'Female','1994-10-29','Itogon',0,'Filipino','09199989887','Poblacion, Itogon, Benguet','abby','e76ceff3c47adb10f62b1acd7109f88fbd5e9ca7','New',1,1,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(40,1000000106,'Mary Lee','Borja','H',NULL,'Female','1998-01-20','Bakun',0,'Filipino','09152283774','Poblacion, Bakun, Benguet','marylee','1c24578ca947f858d5735526cb7fd1e54dcb84e0','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(41,1000000107,'Jhing','Bawaan','T',NULL,'Female','1999-05-22','Atok',0,'Filipino','09165567890','Poblacion, Atok, Benguet','jhing','fcf49f880f12c32bf91b172910440771279e0878','New',1,1,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(42,1000000108,'Edwin','Manda','G',NULL,'Male','1999-08-20','Kapangan',0,'Filipino','09098765434','Poblacion, Kapangan, Benguet','edwin','3c7a591985b5e780ebcc40916fdeb443b8541c2a','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(43,1000000109,'Danae Shaira','Villacruz','G',NULL,'Female','1997-03-04','Kibungan',0,'Filipino','09178766776','Poblacion, Kibungan, Benguet','danae','eb93e232a50ba000b7a9e0779c92e9e87d804058','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(44,1000000110,'Gwendolyn','Cadelina','H',NULL,'Female','1995-10-16','Mankayan',0,'Filipino','09887676546','Poblacion, Mankayan, Benguet','gwendolyn','93b7df2fa1586cc4351e99bce3f74805c1df4790','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(45,1000000111,'Kiana Justine','Tirasol','C',NULL,'Female','1997-04-28','Buguias',0,'Filipino','09127788767','Poblacion, Buguias, Benguet','kiana','703ddbc5fe426b4973c206f758719f6009b363c3','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(46,1000000112,'Hannah','Siasico','C',NULL,'Female','1998-02-04','Kabayan',0,'Filipino','09187767645','Poblacion, Kabayan, Benguet','hannah','675dc611bafb0b7348dd3baf7e005b6916fb954d','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(47,1000000113,'Laraine Dee','Handoc','M',NULL,'Female','0000-00-00','Sablan',0,'09356672663','09356672663','Poblacion, Sablan, Benguet','laraine','c8915fcccf9088a7b8f8242d9fbed3017cc573a8','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(48,1000000114,'Elzevir','Pagayon','P',NULL,'Male','1999-05-01','La Trinidad',0,'Filipino','09289937774','Poblacion, La Trinidad, Benguet','elzevir','be0127ba8587beced734e5a350582f3dba5e5b4b','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(49,1000000115,'Novelyn','Villaruel','Y',NULL,'Female','1998-05-22','Bokod',0,'Filipino','09878874847','Poblacion, Bokod, Benguet','novelyn','661382b240420fef499ddb3168c5182b4045113d','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(50,1000000116,'Jeremiah','Garcia','G',NULL,'Male','2011-11-11','Tublay',0,'Filipino','09678837637','Poblacion, Tublay, Benguet','jeremiah','a9df78b4b5c00745f26b0821b2cc57336a474862','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(51,1000000117,'Ruby Ann','Pelaez','G',NULL,'Female','1997-10-04','Itogon',0,'Filipino','09234646773','Poblacion, Itogon, Benguet','ruby','18e40e1401eef67e1ae69efab09afb71f87ffb81','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(52,1000000118,'Pia Samantha','Roldan','C',NULL,'Female','1995-09-23','Bakun',0,'Filipino','09127873664','Poblacion, Bakun, Benguet','pia','5cd788f9fa28387309d0bcc2c5429570ee9fe30e','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(53,1000000119,'Virgil','Loquias','M',NULL,'Male','1993-04-05','Atok',0,'Filipino','09478837288','Poblacion, Atok, Benguet','virgil','8460e247a3dbc5da1ba0ca46c5321ac9db046fb9','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(54,1000000120,'Precious','Lanuevo','N',NULL,'Female','1997-09-04','Kapangan',0,'Filipino','09238847849','Poblacion, Kapangan, Benguet','precious','42e63a94dbeff43190f6c03f7c5885c01c87c200','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(55,1000000121,'Carlyne Joy','Tenecio','H',NULL,'Female','1997-10-26','Kibungan',0,'Filipino','09127738462','Poblacion, Kibungan, Benguet','carlyne','9dbb824721b2dbdbd89077996cdab1d940764303','New',1,0,18,'student_image/12909489_1257077340988202_2965799069910400828_o.jpg','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(56,1000000122,'Jake','Umpa','U',NULL,'Male','1992-08-31','Mankayan',0,'Filipino','09237873662','Poblacion, Mankayan, Benguet','jake','c8d99c2f7cd5f432c163abcd422672b9f77550bb','New',1,0,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(57,1000000123,'Michael','Cadelina','T',NULL,'Male','1996-08-21','Buguias',0,'Filipino','09148874738','Poblacion, Buguias, Benguet','michael','17b9e1c64588c7fa6419b4d29dc1f4426279ba01','New',1,0,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(58,1000000124,'Kristine','Villaruel','B',NULL,'Female','1995-06-11','Kabayan',0,'Filipino','09477463722','Poblacion, Kabayan, Benguet','kristine','a63a3be77fa51c8ca25c3b8be5ac5d0e93917c0b','New',1,0,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(59,1000000125,'Kindahl','Alog','E',NULL,'Female','1999-04-22','Sablan',0,'Filipino','09192883737','Poblacion, Sablan, Benguet','kindahl','4dc1091beca44e5133fe7ca443ce4116e6275006','New',1,0,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(60,1000000126,'Jecel','Eran','K',NULL,'Female','1998-03-02','La Trinidad',0,'Filipino','09789938383','Poblacion, La Trinidad, Benguet','jecel','efa848a414acf8bd9b39c2c55b55a6901c648f89','New',1,1,18,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(61,1000000127,'Earle','Valdez','Q',NULL,'Male','1997-11-26','Bokod',0,'Filipino','09567748392','Poblacion, Bokod, Benguet','earle','aa2521688dc8a0d74bd77a583e928d31a5731836','New',1,1,18,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(62,1000000128,'Gaudelyn','Eucare','V',NULL,'Female','1996-02-14','Tublay',0,'Filipino','09578847384','Poblacion, Tublay, Benguet','gaudelyn','e03a6ee418ce3dc843a2b9c8abdbb7af253d919d','New',1,0,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(63,1000000129,'Ellyza','Doroteo','O',NULL,'Female','1996-12-12','Itogon',0,'Filipino','09127736846','Poblacion, Itogon, Benguet','ellyza','886093a9895ab643ddb92809dd62eb898a88751f','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(64,1000000130,'Cunanan','Pagayao','L',NULL,'Male','1990-10-14','Bakun',0,'Filipino','09257748383','Poblacion, Bakun, Benguet','cunanan','894f59cb98e073fec902cbbff0e9d143102082fd','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(65,1000000131,'Samantha','Romano','I',NULL,'Female','1990-12-05','Atok',0,'Filipino','09238746574','Poblacion, Atok, Benguet','samantha','ec5a7c3e21436a8e76716710ce551356f9aa745e','Transferee',3,0,20,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(66,1000000132,'Charnel','Manajero','D',NULL,'Male','1990-05-19','Kapangan',0,'Filipino','09768859575','Poblacion, Kapangan, Benguet','charnel','eab5aa588a82582c0f60e4d6b304d6822efb127e','New',0,0,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(67,1000000133,'Timmy-babe','kaliga','k',NULL,'Male','1998-05-05','Kibungan',0,'Filipino','09752345768','Poblacion, Kibungan, Benguet','Timmy','cb88945e9d64c16a44cb4cf567b2b6a211e9dce2','New',1,1,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(68,1000000134,'Reann','Alaban','K',NULL,'Male','1997-09-08','Mankayan',0,'Filipino','9756787455','Poblacion, Mankayan, Benguet','Reann','f31445a35f65dbc7040cb5b1bd58f1a70ff4b093','New',1,1,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(69,1000000135,'Redd','Ventura','V',NULL,'Male','1996-08-07','Buguias',0,'Filipino','09757867543','Poblacion, Buguias, Benguet','Redd','0e3b14615c2c441f2215aff1fe5488866545b9c5','New',1,0,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(70,1000000136,'Ronald','Careno','M',NULL,'Female','2002-02-01','Kabayan',0,'09257655897','09257655897','Poblacion, Kabayan, Benguet','careno','0160c52958109c870c01b623f7846c414bf0b0f5','New',1,0,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(71,1000000137,'Kyla','Catalan','C',NULL,'Female','1997-01-28','Sablan',0,'Filipino','09287566444','Poblacion, Sablan, Benguet','kyla','d4e85d45106df12908f2fb2490bd303ad8a30d32','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(72,1000000139,'Rain','Storm','G',NULL,'Female','2001-02-01','La Trinidad',0,'09129978666','09129978666','Poblacion, La Trinidad, Benguet','rain','fbec17cb2fcbbd1c659b252230b48826fc563788','New',1,1,18,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(73,1000000140,'khein','alamada','c',NULL,'Male','1997-10-07','Bokod',0,'Filipino','09751209609','Poblacion, Bokod, Benguet','khein','20ae5f2ba23d8ba0798e8ae1f48701d3c14db635','New',1,1,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(80,1000000149,'Yancy','Mangelen','M',NULL,'Male','1997-08-28','Mankayan',0,'Filipino','09753558619','Poblacion, Mankayan, Benguet','yancy','70a24d536eb68af18a2f5051690c3021e98b1f8e','New',1,1,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(81,1000000152,'Zennia Rica','Alog','M',NULL,'Female','1998-01-20','Buguias',0,'09274658202','09274658202','Poblacion, Buguias, Benguet','rica','e2d9832b3cefa975803be763b95d3c502c42a0dc','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(82,1000000153,'Sam','Tacardon Jr.','M',NULL,'Male','1998-02-28','Kabayan',0,'Filipino','09274355123','Poblacion, Kabayan, Benguet','sam','f16bed56189e249fe4ca8ed10a1ecae60e8ceac0','New',1,1,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(83,1000000154,'Niña Rica ','Miguel','G',NULL,'Female','1999-05-28','Sablan',0,'Filipino','09287535332','Poblacion, Sablan, Benguet','nina','b443de4b0ff48581d8743a5f5cad5321e40054c2','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(84,1000000155,'Gianna Mae','Gapasin','K',NULL,'Female','1999-01-29','La Trinidad',0,'Filipino','09274523532','Poblacion, La Trinidad, Benguet','gianna','72b1ddf9b91795e4bde0de7811e8e35865e1f0f7','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(85,1000000156,'Rojie Andrea','Alog','H',NULL,'Female','1999-09-28','Bokod',0,'Filipino','09275644190','Poblacion, Bokod, Benguet','rojie','4f07c77b1d33cce74323b28bb449979c42e9a151','New',1,2,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(86,1000000157,'Jerih Mae','Hapinat','H',NULL,'Female','1998-12-12','Tublay',0,'Filipino','09274344123','Poblacion, Tublay, Benguet','jerih','7fc63d22370ec9812fc7a94d6adf74a5511b5e6d','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(87,1000000158,'Krista Mae','Lazo','C',NULL,'Female','1998-08-22','Itogon',0,'Filipino','09265355123','Poblacion, Itogon, Benguet','krista','ba770747d84d60654212d3173c719564d2f30240','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(88,1000000159,'Rossel Abasola','Del Pilar','B',NULL,'Female','1999-01-30','Bakun',0,'Filipino','09285355102','Poblacion, Bakun, Benguet','rossel','d35fb797cd118a2bb7b679cee6ceada9a6bdd151','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(89,1000000160,'Allyza Joyce','Anajao','A',NULL,'Female','1998-02-21','Atok',0,'Filipino','09251908245','Poblacion, Atok, Benguet','allyza','5b13d27681d01db855b898f5c3ff33f592138806','New',1,0,23,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(90,1000000161,'Joali','Plang ','C',NULL,'Male','1997-09-13','Kapangan',0,'Filipino','09256171768','Poblacion, Kapangan, Benguet','joali','87d59f4b9ca4058fa88b586ce4ef27492562873e','New',1,1,10,'','First','',1,'Pending',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(91,1000000162,'jahad','mantil','k',NULL,'Male','1998-08-23','Kibungan',0,'Filipino','09753421234','Poblacion, Kibungan, Benguet','jahad','34753f1ba315c18f3ffa134ec02c4ffbdf2bc9cb','New',1,1,10,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(92,1000000163,'hamid','Abdul','G',NULL,'Male','1997-07-25','Mankayan',0,'Philippines','09765623654','Poblacion, Mankayan, Benguet','hamid','e5c4f933a178cd626655c7715ac38cde59f1efe3','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(93,1000000164,'kamaruden','adapen ','K',NULL,'Male','1998-06-12','Buguias',0,'Filipino','09876543143','Poblacion, Buguias, Benguet','kamaruden','0a5c751a397ba846cdf3578da5d5107875ad1e6d','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(94,1000000165,'Abdulsalam','mamadla','L',NULL,'Male','1998-05-15','Kabayan',0,'Filipino','09757645152','Poblacion, Kabayan, Benguet','mamadla','19cb9f6c054fc862004d2e2d14356bed5c162ef7','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(95,1000000166,'alex','Uga','H',NULL,'Male','1997-08-12','Sablan',0,'Filipino','09756544523','Poblacion, Sablan, Benguet','alex','60c6d277a8bd81de7fdde19201bf9c58a3df08f4','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(96,1000000167,'Ron bryan ','Presas','P',NULL,'Male','1998-07-06','La Trinidad',0,'Filipino','09751234765','Poblacion, La Trinidad, Benguet','Presas','111ef72383af1ef97f8dfac345e2e052b72b2e9e','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(97,1000000168,'Anne','Parcon','S',NULL,'Female','1999-09-07','Bokod',0,'Filipino','09265112349','Poblacion, Bokod, Benguet','anne','96657fd33d4351fb0ec777fd7064e03b0adc3a35','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(98,1000000169,'Christian','Oranza','K',NULL,'Male','1999-07-06','Tublay',0,'Filipino','09876543565','Poblacion, Tublay, Benguet','christian','2314b2e3a4a1f7db165be2aafbf1efd78f28cc97','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(99,1000000170,'Ella','Banares','H',NULL,'Female','1998-04-04','Itogon',0,'Filipino','09123445768','Poblacion, Itogon, Benguet','ella','5edf31da3f42a518437a149eb6d70cd01c02c3cd','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(100,1000000171,'Dexter','Magoncia','M',NULL,'Male','1997-05-05','Bakun',0,'Filipino','09675413276','Poblacion, Bakun, Benguet','dexter','efce8cd161897feeaa7979d892dc26a8a8d8eea3','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(101,1000000172,'Elea','Medrano','M',NULL,'Female','1997-04-04','Atok',0,'Filipino','09876312342','Poblacion, Atok, Benguet','elea','687bc2d923531096fac1059dfb9c606182c0958d','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(102,1000000173,'Joseph','Handoc','K',NULL,'Female','0207-01-07','Kapangan',0,'09811326781','09811326781','Poblacion, Kapangan, Benguet','Handoc','e6b38ca094163918db68452fbe5ace8732794415','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(103,1000000174,'Zoharto','Manangga','M',NULL,'Male','1998-11-23','Kibungan',0,'Filipino','09123487657','Poblacion, Kibungan, Benguet','zoharto','eedda5500b1e2bce2cb46aaf959587429a8669cd','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(104,1000000175,'Bianca','Camelle','C',NULL,'Female','1998-12-23','Mankayan',0,'Filipino','09352176898','Poblacion, Mankayan, Benguet','bianca','2a69ed80e5dfa142aa29c01680eb65649b12b9b6','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(105,1000000176,'Jhon','Bacalso','B',NULL,'Male','1996-03-07','Buguias',0,'Filipino','09756765432','Poblacion, Buguias, Benguet','jhon','c27224cfa8386dcd2bb90db1e1ed7f0747de8cd7','New',1,1,17,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(106,1000000177,'Kristina','claudio','K',NULL,'Female','1998-11-30','Kabayan',0,'Filipino','09756478765','Poblacion, Kabayan, Benguet','kristina','2d3b2ae69a50d2c9c76ad4e6a67c7707909d0797','New',1,1,16,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(107,1000000178,'Miralles','Dalyne','H',NULL,'Female','1999-02-04','Sablan',0,'Filipino','09654367543','Poblacion, Sablan, Benguet','miralles','08b1cf978acabd01a00322224e5c52c31ae8dbfd','New',1,1,15,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(108,1000000179,'Janette','Nillos','A',NULL,'Female','1997-02-01','La Trinidad',0,'09876543564','09876543564','Poblacion, La Trinidad, Benguet','janette','db744ba63c35ddb50f92933afaeebaef9025483a','New',1,1,14,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(109,1000000180,'Farsallah','Aliso','A',NULL,'Female','1997-06-25','Bokod',0,'Filipino','09786756432','Poblacion, Bokod, Benguet','farsallah','f2d9114d659e229e7b58f5813daaa9d88cb841ab','New',1,1,8,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(110,1000000181,'Lady Lyn','Sullano','B',NULL,'Female','1997-08-15','Tublay',0,'Filipino','09878767654','Poblacion, Tublay, Benguet','ladylyn','470f859af53837465e3c8fc53ae4a1be800d7240','New',1,1,11,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(111,1000000182,'alex','wellms','W',NULL,'Male','1995-07-16','Itogon',0,'Filipino','09756454322','Poblacion, Itogon, Benguet','wellms','63bdc53e431e4957b62faa6cd0465a666bd6ce1e','New',1,1,17,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(112,1000000183,'Glyd','Manda','M',NULL,'Male','1997-03-24','Bakun',0,'Filipino','09122366754','Poblacion, Bakun, Benguet','glyd','cd31ef62c1722df14cbc0bc238cbbe9cb5e970ca','New',1,1,16,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(113,1000000184,'wevan','chae','D',NULL,'Male','1997-11-12','Atok',0,'Filipino','098765453','Poblacion, Atok, Benguet','wevan','aadad817d5f525087ca053ccce75ac5e9bafd3a0','New',1,1,82,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(114,1000000185,'Kitty','Zevlag','Z',NULL,'Male','1995-10-25','Kapangan',0,'Filipino','09872354676','Poblacion, Kapangan, Benguet','kitty','95d79f53b52da1408cc79d83f445224a58355b13','New',1,1,22,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(115,1000000186,'Christine','Parantar','H',NULL,'Female','1996-09-18','Kibungan',0,'Filipino','09876754123','Poblacion, Kibungan, Benguet','christine','70e8b6e13c18e8800ef6b67166d0409e66ab58a9','New',1,1,20,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(116,1000000187,'JC','Burgos','B',NULL,'Male','1996-09-17','Mankayan',0,'Filipino','09871234981','Poblacion, Mankayan, Benguet','jc','f9ae8604de015e6fc12a1ebdbe72f262b981a2f6','New',1,1,19,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(117,1000000188,'Dedal','Stef','S',NULL,'Male','1996-09-15','Buguias',0,'Filipino','09877656123','Poblacion, Buguias, Benguet','dedal','bc370f94f6cf9acc580c2c50f3d4dff756e39bac','New',1,1,18,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(118,1000000189,'Tessa','Balboa','T',NULL,'Female','2000-02-23','Kabayan',0,'Filipino','-09765445321','Poblacion, Kabayan, Benguet','tessa','e2e18d551d92039e2ae71fc6854f0a12d2f9a730','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(119,1000000190,'Neoboy','Bumatay','A',NULL,'Male','0196-11-09','Sablan',0,'Filipino','09564534198','Poblacion, Sablan, Benguet','neoboy','e5aa55fb947a507a6b9fddcb2885eea498b2ace9','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(120,1000000191,'Marian','Parcon','K',NULL,'Female','2000-11-17','La Trinidad',0,'Filipino','09876545676','Poblacion, La Trinidad, Benguet','marian','15985e73bfe2e61c83c1b328087be49992d25081','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(121,1000000192,'Jonathan','Watson','A',NULL,'Male','1996-10-19','Bokod',0,'Filipino-Canadian','09674523897','Poblacion, Bokod, Benguet','jonathan','3692bfa45759a67d83aedf0045f6cb635a966abf','New',1,1,23,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(122,1000000193,'Arliz','Tomboc','T',NULL,'Male','1997-12-12','Tublay',0,'Filipino','09876523109','Poblacion, Tublay, Benguet','arliz','e9bc16a650318b1a218c3212e63af7f5c65f9295','New',1,1,6,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(123,1000000194,'Rhon','Agot','V',NULL,'Male','1997-11-22','Itogon',0,'Filipino','09261789765','Poblacion, Itogon, Benguet','rhon','473f8c82c83421d18ecb9464d158b846f611008f','New',1,1,5,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(124,1000000195,'Alison','Venus','S',NULL,'Female','1997-03-23','Bakun',0,'Filipino','-09176534281','Poblacion, Bakun, Benguet','alison','4a4f22fbabc5d6375b354538de0249eb0a80f614','New',1,1,4,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(125,1000000196,'Pauline ','Estrella','E',NULL,'Female','1996-11-30','Atok',0,'Filipino','09756754121','Poblacion, Atok, Benguet','pauline','e4b4cd4210ee87c60da653c1b6a77d529c1a079d','New',1,1,2,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(126,1000000197,'Diane','Dina','D',NULL,'Female','2000-11-09','Kapangan',0,'Filipino','09176564129','Poblacion, Kapangan, Benguet','diane','daf3ef29366afaf65c691b1e42f84c8621f09db6','New',1,1,3,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(127,1000000198,'klee','Nex','X',NULL,'Male','1997-11-17','Kibungan',0,'Filipino','09765412098','Poblacion, Kibungan, Benguet','klee','e47124b77b6860396297e8649228afd93a29bc6f','New',1,1,3,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(128,1000000199,'Betchay','Yapchengco','Y',NULL,'Female','1996-09-16','Mankayan',0,'Filipino','09657654192','Poblacion, Mankayan, Benguet','betchay','aafe76c1565aa924f2674f5c6d1c0d38cb81802b','New',1,1,1,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(129,1000000200,'Tito','Nueza ','A',NULL,'Male','1997-06-14','Buguias',0,'Filipino','09876756120','Poblacion, Buguias, Benguet','tito','1a96f9437697ef43237868412d77b15991964f6e','New',1,1,7,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(130,1000000201,'Randy','Agravante','A',NULL,'Male','1998-11-12','Kabayan',0,'Filipino-Canadian','09876512812','Poblacion, Kabayan, Benguet','randy','68507a13665ec3a31759c0d3a94804221c0a87d3','New',1,1,25,'','First','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(145,1000000213,'Kurt','Choyog','',NULL,'Male','2001-10-23','Bokod',0,'Filipino','09605805587','Poblacion, Bokod, Benguet','kkokey','20eabe5d64b0e216796e834f52d61fd0b70332fc','New',1,1,16,'','','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,'','Ibaloi',NULL,0),(157,1000000225,'Sherlock','Holmes','D','','Male','2000-03-06','London, United Kingdom',0,'British','09453754120','bokod','sherlock','$2y$10$5vyDYc400awrpZnJdQ4MGONVP4lfBPDERjjun18f8k7h/6BU6HNme','New',1,1,3,'student_image/bsu_bg.jpg','','',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,'','Caucasian',NULL,0),(158,1000000226,'John','Watson','D','','Male','2000-03-06','Poblacion',0,'','09453754120','Poblacion','watson','$2y$10$39CsKbf1AMtbDvT1wHfYrOj3wncYu14S.4k2.x2tcrcZxOKwJR/ES','New',1,0,7,'','','',1,'Pending',NULL,NULL,NULL,NULL,NULL,'','Ibaloi',NULL,0),(161,1000000229,'Elton','Palos','D','Jr.','Male','2000-03-06','Tokyo, Japan',0,'Filipino','09453754120','Bobok-Bisal, Bokod, Benguet','palos','$2y$10$OShmME1fBOW5gn2TDbwKnOGYyFrn4S40O5zJWmMYAwi3c1LG6St8i','New',1,1,11,'','First','2025-2026',0,'Enrolled',NULL,NULL,NULL,NULL,NULL,'','Ibaloi',NULL,0);
/*!40000 ALTER TABLE `tblstudent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useraccounts`
--

DROP TABLE IF EXISTS `useraccounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useraccounts` (
  `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_NAME` varchar(255) NOT NULL,
  `ACCOUNT_USERNAME` varchar(255) NOT NULL,
  `ACCOUNT_PASSWORD` text NOT NULL,
  `ACCOUNT_TYPE` enum('Administrator','Registrar','Chairperson','Instructor','Other') NOT NULL,
  `DEPT_ID` int(11) DEFAULT NULL,
  `IS_ACTIVE` tinyint(1) NOT NULL DEFAULT 1,
  `LAST_LOGIN` datetime DEFAULT NULL,
  `EMPID` int(11) NOT NULL DEFAULT 0,
  `USERIMAGE` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ACCOUNT_ID`),
  UNIQUE KEY `ACCOUNT_USERNAME` (`ACCOUNT_USERNAME`),
  KEY `idx_dept_id` (`DEPT_ID`),
  KEY `idx_account_type` (`ACCOUNT_TYPE`),
  KEY `idx_is_active` (`IS_ACTIVE`),
  CONSTRAINT `fk_useraccounts_dept` FOREIGN KEY (`DEPT_ID`) REFERENCES `department` (`DEPT_ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useraccounts`
--

LOCK TABLES `useraccounts` WRITE;
/*!40000 ALTER TABLE `useraccounts` DISABLE KEYS */;
INSERT INTO `useraccounts` (`ACCOUNT_ID`, `ACCOUNT_NAME`, `ACCOUNT_USERNAME`, `ACCOUNT_PASSWORD`, `ACCOUNT_TYPE`, `DEPT_ID`, `IS_ACTIVE`, `LAST_LOGIN`, `EMPID`, `USERIMAGE`) VALUES (1,'Administrator','admin','d033e22ae348aeb5660fc2140aec35850c4da997','Administrator',NULL,1,NULL,1234,'photos/wallpaperflare.com_wallpaper (3).jpg'),(2,'Registrar','registrar','d033e22ae348aeb5660fc2140aec35850c4da997','Registrar',NULL,1,NULL,0,''),(3,'Chairperson 1','chair','d033e22ae348aeb5660fc2140aec35850c4da997','Chairperson',NULL,1,NULL,0,''),(10,'Chairperson 2','chair2','d033e22ae348aeb5660fc2140aec35850c4da997','Chairperson',NULL,1,NULL,0,''),(11,'Chairperson 3','chair3','d033e22ae348aeb5660fc2140aec35850c4da997','Chairperson',NULL,1,NULL,0,''),(12,'John Doe','john','d033e22ae348aeb5660fc2140aec35850c4da997','Administrator',NULL,1,NULL,0,'');
/*!40000 ALTER TABLE `useraccounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_active_enrollments`
--

DROP TABLE IF EXISTS `view_active_enrollments`;
/*!50001 DROP VIEW IF EXISTS `view_active_enrollments`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_active_enrollments` AS SELECT
 1 AS `IDNO`,
  1 AS `FNAME`,
  1 AS `LNAME`,
  1 AS `MNAME`,
  1 AS `COURSE_ID`,
  1 AS `COURSE_NAME`,
  1 AS `COURSE_LEVEL`,
  1 AS `DEPT_ID`,
  1 AS `DEPARTMENT_NAME`,
  1 AS `ENROLLMENT_STATUS`,
  1 AS `NewEnrollees`,
  1 AS `YEARLEVEL`,
  1 AS `SEMESTER` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_instructor_load`
--

DROP TABLE IF EXISTS `view_instructor_load`;
/*!50001 DROP VIEW IF EXISTS `view_instructor_load`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_instructor_load` AS SELECT
 1 AS `INST_ID`,
  1 AS `INST_NAME`,
  1 AS `ACCOUNT_ID`,
  1 AS `IS_ACTIVE`,
  1 AS `total_subjects`,
  1 AS `total_schedules`,
  1 AS `total_units` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_student_grades`
--

DROP TABLE IF EXISTS `view_student_grades`;
/*!50001 DROP VIEW IF EXISTS `view_student_grades`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_student_grades` AS SELECT
 1 AS `GRADE_ID`,
  1 AS `IDNO`,
  1 AS `student_name`,
  1 AS `SUBJ_ID`,
  1 AS `SUBJ_CODE`,
  1 AS `SUBJ_DESCRIPTION`,
  1 AS `INST_ID`,
  1 AS `INST_NAME`,
  1 AS `SEMESTER`,
  1 AS `SCHOOLYEAR`,
  1 AS `PRELIM`,
  1 AS `MIDTERM`,
  1 AS `PREFINAL`,
  1 AS `FINAL`,
  1 AS `AVE`,
  1 AS `REMARKS`,
  1 AS `IS_LOCKED` */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_active_enrollments`
--

/*!50001 DROP VIEW IF EXISTS `view_active_enrollments`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_active_enrollments` AS select `s`.`IDNO` AS `IDNO`,`s`.`FNAME` AS `FNAME`,`s`.`LNAME` AS `LNAME`,`s`.`MNAME` AS `MNAME`,`s`.`COURSE_ID` AS `COURSE_ID`,`c`.`COURSE_NAME` AS `COURSE_NAME`,`c`.`COURSE_LEVEL` AS `COURSE_LEVEL`,`c`.`DEPT_ID` AS `DEPT_ID`,`d`.`DEPARTMENT_NAME` AS `DEPARTMENT_NAME`,`s`.`ENROLLMENT_STATUS` AS `ENROLLMENT_STATUS`,`s`.`NewEnrollees` AS `NewEnrollees`,`s`.`YEARLEVEL` AS `YEARLEVEL`,`s`.`SEMESTER` AS `SEMESTER` from ((`tblstudent` `s` left join `course` `c` on(`s`.`COURSE_ID` = `c`.`COURSE_ID`)) left join `department` `d` on(`c`.`DEPT_ID` = `d`.`DEPT_ID`)) where `s`.`ENROLLMENT_STATUS` in ('Approved','Enrolled') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_instructor_load`
--

/*!50001 DROP VIEW IF EXISTS `view_instructor_load`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_instructor_load` AS select `i`.`INST_ID` AS `INST_ID`,`i`.`INST_NAME` AS `INST_NAME`,`i`.`ACCOUNT_ID` AS `ACCOUNT_ID`,`i`.`IS_ACTIVE` AS `IS_ACTIVE`,count(distinct `sch`.`SUBJ_ID`) AS `total_subjects`,count(distinct `sch`.`schedID`) AS `total_schedules`,sum(`s`.`UNIT`) AS `total_units` from ((`tblinstructor` `i` left join `tblschedule` `sch` on(`i`.`INST_ID` = `sch`.`INST_ID`)) left join `subject` `s` on(`sch`.`SUBJ_ID` = `s`.`SUBJ_ID`)) where `i`.`IS_ACTIVE` = 1 group by `i`.`INST_ID` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_student_grades`
--

/*!50001 DROP VIEW IF EXISTS `view_student_grades`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_student_grades` AS select `g`.`GRADE_ID` AS `GRADE_ID`,`g`.`IDNO` AS `IDNO`,concat(`st`.`FNAME`,' ',`st`.`LNAME`) AS `student_name`,`g`.`SUBJ_ID` AS `SUBJ_ID`,`s`.`SUBJ_CODE` AS `SUBJ_CODE`,`s`.`SUBJ_DESCRIPTION` AS `SUBJ_DESCRIPTION`,`g`.`INST_ID` AS `INST_ID`,`i`.`INST_NAME` AS `INST_NAME`,`g`.`SEMESTER` AS `SEMESTER`,`g`.`SCHOOLYEAR` AS `SCHOOLYEAR`,`g`.`PRELIM` AS `PRELIM`,`g`.`MIDTERM` AS `MIDTERM`,`g`.`PREFINAL` AS `PREFINAL`,`g`.`FINAL` AS `FINAL`,`g`.`AVE` AS `AVE`,`g`.`REMARKS` AS `REMARKS`,`g`.`IS_LOCKED` AS `IS_LOCKED` from (((`tblgrades` `g` join `tblstudent` `st` on(`g`.`IDNO` = `st`.`IDNO`)) join `subject` `s` on(`g`.`SUBJ_ID` = `s`.`SUBJ_ID`)) join `tblinstructor` `i` on(`g`.`INST_ID` = `i`.`INST_ID`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-18 22:53:40
