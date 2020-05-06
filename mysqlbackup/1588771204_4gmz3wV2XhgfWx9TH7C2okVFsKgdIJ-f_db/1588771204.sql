-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: h2h_db
-- ------------------------------------------------------
-- Server version 	5.7.29
-- Date: Wed, 06 May 2020 13:20:04 +0000

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
-- Table structure for table `auth_assignment`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `auth_assignment` VALUES ('admin','1',1587144544);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `auth_assignment` with 1 row(s)
--

--
-- Table structure for table `auth_item`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `auth_item` VALUES ('Access db',2,'Access db',NULL,NULL,1577737693,1577737693),('Access db1',2,'Access db1',NULL,NULL,1577737634,1577737634),('Access db10',2,'Access db10',NULL,NULL,1579035389,1579035389),('Access db2',2,'Access db2',NULL,NULL,1578741528,1578741528),('Access db3',2,'Access db3',NULL,NULL,1581581742,1581581762),('Access db4',2,'Access db4',NULL,NULL,1581667052,1581667052),('Access db5',2,'Access db5',NULL,NULL,1584401458,1584401458),('Access db6',2,'Access db6',NULL,NULL,1584401458,1584401458),('Access db7',2,'Access db7',NULL,NULL,1579035389,1579035389),('Access db8',2,'Access db8',NULL,NULL,1579035389,1579035389),('Access db9',2,'Access db9',NULL,NULL,1579035389,1579035389),('Access paypalagreement',2,'Access the Paypal Agreement',NULL,NULL,1577804284,1577804284),('Access Session',2,'Access Session',NULL,NULL,1565127671,1565209503),('Access Sessiondetail',2,'Access Sessiondetail',NULL,NULL,1565127753,1565127753),('admin',1,'Administrator of the first database  which serves to record all user data of the site. Users that are allowed to signup are designated a Manager role manually. ',NULL,NULL,1577666562,1588726719),('Backup Database',2,'Backup their allocated database',NULL,NULL,1564039903,1564039903),('Create Carousal',2,'Create Carousal',NULL,NULL,1544661317,1544661317),('Create Company',2,'Create Company',NULL,NULL,1512856530,1549635086),('Create Daily Clean',2,'Create Daily Clean',NULL,NULL,1512856530,1512856530),('Create Daily Job Sheet',2,'Create Daily Job Sheet',NULL,NULL,1512856530,1512856530),('Create Employee',2,'Create Employee',NULL,NULL,1512856530,1549631754),('Create Gocardlesscustomer',2,'Create Gocardlesscustomer',NULL,NULL,1564057944,1564057944),('Create House',2,'Create House',NULL,NULL,1512856530,1549631786),('Create Instruction',2,'Create Instruction',NULL,NULL,1549631630,1549635056),('Create Legal',2,'Create Legal',NULL,NULL,1563032629,1563032629),('Create Mandate',2,'Create Mandate',NULL,NULL,1564647598,1564647598),('Create Messagelog',2,'Create Messagelog',NULL,NULL,1544660727,1544660727),('Create Messaging',2,'Create Messaging',NULL,NULL,1544659806,1544659991),('Create Postalcode',2,'Create Postalcode',NULL,NULL,1512856531,1549634117),('Create Street',2,'Create Street',NULL,NULL,1512856530,1512856530),('Create Tax',2,'Create Tax',NULL,NULL,1544662943,1544662943),('createItem',2,'Create item',NULL,NULL,1577666562,1577666562),('Delete Carousal',2,'Delete Carousal',NULL,NULL,1544661364,1544661364),('Delete Company',2,'Delete Company',NULL,NULL,1512856530,1512856530),('Delete Daily Clean',2,'Delete Daily Clean',NULL,NULL,1512856530,1512856530),('Delete Daily Job Sheet',2,'Delete Daily Job Sheet',NULL,NULL,1512856530,1512856530),('Delete Employee',2,'Delete Employee',NULL,NULL,1512856530,1512856530),('Delete House',2,'Delete House',NULL,NULL,1512856530,1512856530),('Delete Instruction',2,'Delete Instruction',NULL,NULL,1549634229,1549634229),('Delete Mandate',2,'Delete Mandate',NULL,NULL,1564647708,1564647708),('Delete Messagelog',2,'Delete Messagelog',NULL,NULL,1544660767,1544660767),('Delete Messaging',2,'Delete Messaging',NULL,NULL,1544660079,1544660079),('Delete Postalcode',2,'Delete Postalcode',NULL,NULL,1512856531,1512856531),('Delete Street',2,'Delete Street',NULL,NULL,1512856531,1549633538),('Delete Tax',2,'Delete Tax',NULL,NULL,1544662983,1544662983),('deleteItem',2,'Delete item',NULL,NULL,1577666562,1577666562),('demo',1,'demo',NULL,NULL,1584405564,1584889800),('employee',1,'Key worker',NULL,NULL,1588726703,1588762835),('fencemode',1,'Fence Mode - Already registered Users can login. Guests cannot signup. Change the permission under Fence Mode to affect all users ie. all guests are fenced out - they cannot signup ...or they can.',NULL,NULL,1588723280,1588761077),('Google Translate',2,'Translate this package from English into a language of your choice. If you can use Google Translate already  your language will be  1 of 109 provided by Goodgle. Create a service account with Google and download the Json file. Provide this path under Company. ',NULL,NULL,1588279922,1588279922),('Import Houses',2,'Import Houses',NULL,NULL,1573842472,1573842472),('Manage Admin',2,'Manage Admin',NULL,NULL,1577744346,1577744346),('Manage Basic',2,'Perform Basic Tasks',NULL,NULL,1578419959,1578419959),('Manage Money',2,'Manage Money',NULL,NULL,1546700864,1546700864),('manageRoles',2,'Manage Roles and Permissions',NULL,NULL,1577666562,1577666562),('manageUsers',2,'Manage Users',NULL,NULL,1577666562,1577666562),('Mdb0',1,'Manager of db',NULL,NULL,1577738006,1583578098),('Mdb1',1,'Manager of db1',NULL,NULL,1577738006,1583578098),('Mdb10',1,'Manager of db10',NULL,NULL,1579035344,1584471378),('Mdb2',1,'Manager of db2',NULL,NULL,1578741488,1584409353),('Mdb3',1,'Manager of db3',NULL,NULL,1581581720,1581666851),('Mdb4',1,'Manager of db4',NULL,NULL,1581666990,1583577278),('Mdb5',1,'Manager of db5',NULL,NULL,1584401245,1584471624),('Mdb6',1,'Manager of db6',NULL,NULL,1584401245,1584471624),('Mdb7',1,'Manager of db7',NULL,NULL,1579035344,1584471378),('Mdb8',1,'Manager of db8',NULL,NULL,1579035344,1584471378),('Mdb9',1,'Manager of db9',NULL,NULL,1579035344,1584471378),('Migrate Works Database',2,'Migrate Works Database for databases db1 to db10. Not for admins database db.',NULL,NULL,1587736533,1587736533),('See Prices',2,'See Prices',NULL,NULL,1583610917,1583610917),('Subscription Free Privilege',2,'A Paypal Subscription is Not Necessary For This User',NULL,NULL,1580914633,1580914876),('support',1,'Create, update, delete all company specific data specific to designated company database. Mdb roles subservient to support role. ',NULL,NULL,1577666562,1588726741),('Udb0',1,'Subcontractor of db',NULL,NULL,1583583080,1588761277),('Udb1',1,'Subcontractor of db1',NULL,NULL,1583583080,1583583080),('Udb10',1,'Subcontractor of db10',NULL,NULL,1584402344,1584471662),('Udb2',1,'Subcontractor of db2',NULL,NULL,1583583080,1583583080),('Udb3',1,'Subcontractor of db3',NULL,NULL,1583578326,1588761126),('Udb4',1,'Subcontractor of db4',NULL,NULL,1583577262,1583581014),('Udb5',1,'Subcontractor of db5',NULL,NULL,1584402344,1584471662),('Udb6',1,'Subcontractor of db6',NULL,NULL,1584402344,1584471662),('Udb7',1,'Subcontractor of db7',NULL,NULL,1584402344,1584471662),('Udb8',1,'Subcontractor of db8',NULL,NULL,1584402344,1584471662),('Udb9',1,'Subcontractor of db9',NULL,NULL,1584402344,1584471662),('Update Carousal',2,'Update Carousal',NULL,NULL,1544661341,1544661341),('Update Company',2,'Update Company',NULL,NULL,1512856530,1512856530),('Update Daily Clean',2,'Update Daily Clean',NULL,NULL,1512856530,1512856530),('Update Daily Job Sheet',2,'Update Daily Job Sheet',NULL,NULL,1512856530,1512856530),('Update Employee',2,'Update Employee',NULL,NULL,1512856530,1512856530),('Update House',2,'Update House',NULL,NULL,1512856530,1512856530),('Update Instruction',2,'Update Instruction',NULL,NULL,1549634253,1549634253),('Update Mandate',2,'Update Mandate',NULL,NULL,1564647635,1564647635),('Update Messagelog',2,'Update Messagelog',NULL,NULL,1544660748,1544660748),('Update Messaging',2,'Update Messaging',NULL,NULL,1544660035,1544660035),('Update Postalcode',2,'Update Postalcode',NULL,NULL,1512856531,1512856531),('Update Street',2,'Update Street',NULL,NULL,1512856531,1512856531),('Update Tax',2,'Update Tax',NULL,NULL,1544662962,1544662962),('updateCommonUser',2,'Update user data, but not those of \'admin\'',NULL,NULL,1577666562,1577666562),('updateCreatedItem',2,'Update own item',NULL,NULL,1577666562,1577666562),('updateItem',2,'Update item',NULL,NULL,1577666562,1577666562),('updateUser',2,'Update user data',NULL,NULL,1577666562,1577666562),('Use Gocardless',2,'Use the Gocardless Payment Facility',NULL,NULL,1587646114,1587646114),('Use Twilio',2,'Use the Twilio Text Messaging Facility',NULL,NULL,1587646148,1587646148),('User can Login but not Signup - Fence Mode On',2,'Login Available but Signup Not Available - Fence Mode On',NULL,NULL,1588714051,1588714051),('View Bulletin Board',2,'View Bulletin Board',NULL,NULL,1563826631,1563826631),('View Carousal',2,'View Carousal',NULL,NULL,1558795525,1558795525),('View Company',2,'View Company',NULL,NULL,1512856530,1512856530),('View Daily Clean',2,'View Daily Clean',NULL,NULL,1546702743,1546702743),('View House',2,'View House',NULL,NULL,1583581575,1583581575),('View Instruction',2,'View Instruction',NULL,NULL,1549634202,1549635005),('View Mandate',2,'View Mandate',NULL,NULL,1564647670,1564647670),('View Revenue Reports',2,'View Revenue Reports',NULL,NULL,1564039903,1564039903);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `auth_item` with 110 row(s)
--

--
-- Table structure for table `auth_item_child`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `auth_item_child` VALUES ('admin','Access db'),('Mdb0','Access db'),('Udb0','Access db'),('Mdb1','Access db1'),('Udb1','Access db1'),('Mdb10','Access db10'),('Udb10','Access db10'),('Mdb2','Access db2'),('Udb2','Access db2'),('Mdb3','Access db3'),('Udb3','Access db3'),('Mdb4','Access db4'),('Udb4','Access db4'),('Mdb5','Access db5'),('Udb5','Access db5'),('Mdb6','Access db6'),('Udb6','Access db6'),('Mdb7','Access db7'),('Udb7','Access db7'),('Mdb8','Access db8'),('Udb8','Access db8'),('Mdb9','Access db9'),('Udb9','Access db9'),('admin','Access paypalagreement'),('admin','Access Session'),('admin','Access Sessiondetail'),('admin','Backup Database'),('Udb0','basic'),('admin','Create Carousal'),('demo','Create Carousal'),('support','Create Carousal'),('admin','Create Company'),('admin','Create Daily Clean'),('demo','Create Daily Clean'),('support','Create Daily Clean'),('admin','Create Daily Job Sheet'),('demo','Create Daily Job Sheet'),('support','Create Daily Job Sheet'),('admin','Create Employee'),('demo','Create Employee'),('support','Create Employee'),('admin','Create Gocardlesscustomer'),('demo','Create Gocardlesscustomer'),('support','Create Gocardlesscustomer'),('admin','Create House'),('demo','Create House'),('support','Create House'),('admin','Create Instruction'),('demo','Create Instruction'),('support','Create Instruction'),('admin','Create Legal'),('admin','Create Mandate'),('demo','Create Mandate'),('support','Create Mandate'),('admin','Create Messagelog'),('demo','Create Messagelog'),('support','Create Messagelog'),('admin','Create Messaging'),('demo','Create Messaging'),('support','Create Messaging'),('admin','Create Postalcode'),('demo','Create Postalcode'),('support','Create Postalcode'),('admin','Create Street'),('demo','Create Street'),('support','Create Street'),('admin','Create Tax'),('demo','Create Tax'),('support','Create Tax'),('admin','createItem'),('admin','Delete Carousal'),('demo','Delete Carousal'),('support','Delete Carousal'),('admin','Delete Company'),('admin','Delete Daily Clean'),('demo','Delete Daily Clean'),('support','Delete Daily Clean'),('admin','Delete Daily Job Sheet'),('demo','Delete Daily Job Sheet'),('support','Delete Daily Job Sheet'),('admin','Delete Employee'),('demo','Delete Employee'),('support','Delete Employee'),('admin','Delete House'),('demo','Delete House'),('support','Delete House'),('admin','Delete Instruction'),('demo','Delete Instruction'),('support','Delete Instruction'),('admin','Delete Mandate'),('demo','Delete Mandate'),('support','Delete Mandate'),('admin','Delete Messagelog'),('demo','Delete Messagelog'),('support','Delete Messagelog'),('admin','Delete Messaging'),('demo','Delete Messaging'),('support','Delete Messaging'),('admin','Delete Postalcode'),('demo','Delete Postalcode'),('support','Delete Postalcode'),('admin','Delete Street'),('demo','Delete Street'),('support','Delete Street'),('admin','Delete Tax'),('demo','Delete Tax'),('support','Delete Tax'),('admin','deleteItem'),('Udb1','employee'),('Udb10','employee'),('Udb2','employee'),('Udb4','employee'),('Udb5','employee'),('Udb6','employee'),('Udb7','employee'),('Udb8','employee'),('Udb9','employee'),('admin','fencemode'),('employee','fencemode'),('support','fencemode'),('admin','Google Translate'),('admin','Import Houses'),('demo','Import Houses'),('support','Import Houses'),('admin','Manage Admin'),('support','Manage Admin'),('admin','Manage Basic'),('demo','Manage Basic'),('employee','Manage Basic'),('support','Manage Basic'),('admin','Manage Money'),('demo','Manage Money'),('support','Manage Money'),('admin','manageRoles'),('admin','manageUsers'),('demo','manageUsers'),('Mdb0','manageUsers'),('support','manageUsers'),('admin','Migrate Works Database'),('admin','See Prices'),('demo','See Prices'),('support','See Prices'),('admin','Subscription Free Privilege'),('Mdb0','Subscription Free Privilege'),('Mdb1','Subscription Free Privilege'),('Mdb10','Subscription Free Privilege'),('Mdb2','Subscription Free Privilege'),('Mdb3','Subscription Free Privilege'),('Mdb4','Subscription Free Privilege'),('Mdb5','Subscription Free Privilege'),('Mdb6','Subscription Free Privilege'),('Mdb7','Subscription Free Privilege'),('Mdb8','Subscription Free Privilege'),('Mdb9','Subscription Free Privilege'),('Udb0','Subscription Free Privilege'),('Udb1','Subscription Free Privilege'),('Udb10','Subscription Free Privilege'),('Udb2','Subscription Free Privilege'),('Udb3','Subscription Free Privilege'),('Udb4','Subscription Free Privilege'),('Udb5','Subscription Free Privilege'),('Udb6','Subscription Free Privilege'),('Udb7','Subscription Free Privilege'),('Udb8','Subscription Free Privilege'),('Udb9','Subscription Free Privilege'),('Mdb0','support'),('Mdb1','support'),('Mdb10','support'),('Mdb2','support'),('Mdb3','support'),('Mdb4','support'),('Mdb5','support'),('Mdb6','support'),('Mdb7','support'),('Mdb8','support'),('Mdb9','support'),('admin','Update Carousal'),('demo','Update Carousal'),('support','Update Carousal'),('admin','Update Company'),('support','Update Company'),('admin','Update Daily Clean'),('demo','Update Daily Clean'),('support','Update Daily Clean'),('admin','Update Daily Job Sheet'),('demo','Update Daily Job Sheet'),('support','Update Daily Job Sheet'),('admin','Update Employee'),('demo','Update Employee'),('support','Update Employee'),('admin','Update House'),('demo','Update House'),('support','Update House'),('admin','Update Instruction'),('demo','Update Instruction'),('support','Update Instruction'),('admin','Update Mandate'),('demo','Update Mandate'),('support','Update Mandate'),('admin','Update Messagelog'),('demo','Update Messagelog'),('support','Update Messagelog'),('admin','Update Messaging'),('demo','Update Messaging'),('support','Update Messaging'),('admin','Update Postalcode'),('demo','Update Postalcode'),('support','Update Postalcode'),('admin','Update Street'),('demo','Update Street'),('support','Update Street'),('admin','Update Tax'),('demo','Update Tax'),('support','Update Tax'),('support','updateCommonUser'),('admin','updateCreatedItem'),('admin','updateItem'),('updateCreatedItem','updateItem'),('admin','updateUser'),('updateCommonUser','updateUser'),('admin','Use Gocardless'),('support','Use Gocardless'),('admin','Use Twilio'),('support','Use Twilio'),('fencemode','User can Login but not Signup - Fence Mode On'),('admin','View Bulletin Board'),('support','View Bulletin Board'),('admin','View Carousal'),('demo','View Carousal'),('support','View Carousal'),('admin','View Company'),('demo','View Company'),('support','View Company'),('admin','View Daily Clean'),('demo','View Daily Clean'),('support','View Daily Clean'),('Udb0','View Daily Clean'),('Udb1','View Daily Clean'),('Udb10','View Daily Clean'),('Udb2','View Daily Clean'),('Udb3','View Daily Clean'),('Udb4','View Daily Clean'),('Udb5','View Daily Clean'),('Udb6','View Daily Clean'),('Udb7','View Daily Clean'),('Udb8','View Daily Clean'),('Udb9','View Daily Clean'),('admin','View House'),('demo','View House'),('support','View House'),('admin','View Instruction'),('demo','View Instruction'),('support','View Instruction'),('admin','View Mandate'),('support','View Mandate'),('admin','View Revenue Reports'),('demo','View Revenue Reports'),('support','View Revenue Reports');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `auth_item_child` with 258 row(s)
--

--
-- Table structure for table `auth_rule`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `auth_rule` VALUES ('hasNotRole','O:29:\"sjaakp\\pluto\\rbac\\NotRoleRule\":3:{s:4:\"name\";s:10:\"hasNotRole\";s:9:\"createdAt\";i:1577666562;s:9:\"updatedAt\";i:1577666562;}',1577666562,1577666562),('hasRole','O:26:\"sjaakp\\pluto\\rbac\\RoleRule\":3:{s:4:\"name\";s:7:\"hasRole\";s:9:\"createdAt\";i:1577666562;s:9:\"updatedAt\";i:1577666562;}',1577666562,1577666562),('isCreator','O:29:\"sjaakp\\pluto\\rbac\\CreatorRule\":3:{s:4:\"name\";s:9:\"isCreator\";s:9:\"createdAt\";i:1577666562;s:9:\"updatedAt\";i:1577666562;}',1577666562,1577666562),('isCreatorOrUpdater','O:38:\"sjaakp\\pluto\\rbac\\CreatorOrUpdaterRule\":3:{s:4:\"name\";s:18:\"isCreatorOrUpdater\";s:9:\"createdAt\";i:1577666562;s:9:\"updatedAt\";i:1577666562;}',1577666562,1577666562),('isUpdater','O:29:\"sjaakp\\pluto\\rbac\\UpdaterRule\":3:{s:4:\"name\";s:9:\"isUpdater\";s:9:\"createdAt\";i:1577666562;s:9:\"updatedAt\";i:1577666562;}',1577666562,1577666562);
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `auth_rule` with 5 row(s)
--

--
-- Table structure for table `message`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `language` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `translation` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`,`language`),
  KEY `idx_message_language` (`language`),
  CONSTRAINT `fk_message_source_message` FOREIGN KEY (`id`) REFERENCES `source_message` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `message` VALUES (1,'af','Huis 2 Huis'),(2,'af','Ten minste agt karakters, een hoofletter, een syfer'),(3,'af','Huis 2 huis'),(4,'af','Die versoekte bladsy bestaan ​​nie.'),(5,'af','U het nie toestemming om \'n karrousel uit te vee nie.'),(6,'af','Hierdie prent of lêer is gekoppel. U moet hierdie skakel eers verwyder.'),(7,'af','U maatskappy se e-posadres is nie ingevul nie, of u e-posadres vir klante bestaan ​​nie vir Huis-ID nie:'),(8,'af','Die skoonmaak van direkte debietmandate moet deur u goedgekeur word.'),(9,'af','Hallo. Ons het \'n veranderlike mandaat vir direkte debiet deur Gocardless opgestel wat u sal goedkeur elke keer as betaling van u vereis word.'),(10,'af','<B> Hello. Ons het \'n veranderlike mandaat vir direkte debiet deur Gocardless geskep. Dat u elke keer wat u van <i> </i> </b> betaling vereis, goedkeur'),(11,'af','\'N E-pos is gestuur.'),(12,'af','Skep kliënt op Gocardless:'),(13,'af','Geen regmerkies gekies nie.'),(14,'af','U het nie toestemming om \'n daaglikse werkblad op te dateer nie.'),(15,'af','U het nie toestemming om hierdie besonderhede te sien nie.'),(16,'af','U het nie toestemming om \'n maatskappy te stig nie.'),(17,'af','U kan slegs een maatskappy skep. Verander die besonderhede van die huidige maatskappy.'),(18,'af','U het nie toestemming om maatskappybesonderhede op te dateer nie.'),(19,'af','U het nie toestemming om \'n maatskappy uit te vee nie.'),(20,'af','U maatskappy se naam'),(21,'af','Vee eers die koste-subkategorie of -koste uit, dan kan u hierdie lêer uitvee.'),(22,'af','U het nie toestemming om \'n koste te skep nie.'),(23,'af','Rekord suksesvol gestoor'),(24,'af','U het nie toestemming om \'n koste te skrap nie.'),(25,'af','Die koste #'),(26,'af','is suksesvol uitgevee. <a href = \"'),(27,'af','Klik hier'),(28,'af','om voort te gaan.'),(29,'af','Kan nie die koste # uitvee nie'),(30,'af','Dit bestaan ​​op daaglikse koste'),(31,'af','U het nie toestemming om \'n daaglikse kostestaat op te stel nie.'),(32,'af','U het nie toestemming om \'n daaglikse kosteblad by te werk nie.'),(33,'af','U het nie toestemming om \'n daaglikse kosteblad te skrap nie.'),(34,'af','Uitsondering op integriteitsbeperking.'),(35,'af','Kostebeheerkontroleur: Die versoekte model bestaan ​​nie.'),(36,'af','U het nie toestemming om \'n koste op te dateer nie.'),(37,'af','U het individuele koste op die detail wat u eers moet uitvee. Klik op koste en skrap al die individuele koste.'),(38,'af','U het nie toestemming om die gekose stap te kopieer nie.'),(39,'af','@@ Die koste wat gekontroleer of getik is, is na koste gekopieër: addeddat @@'),(40,'af','betaal:'),(41,'af','U het nie toestemming om \'n subkategorie Koste te skep nie.'),(42,'af','U het nie toestemming om \'n kostesubkategorie op te dateer nie.'),(43,'af','U het nie toestemming om \'n kostekategorie te verwyder nie.'),(44,'af','Vee eers die koste verbonde aan hierdie subkategorie uit, dan kan u hierdie subkategorie uitvee.'),(45,'af','U het nie toestemming om \'n werknemer te skep nie.'),(46,'af','U het nie toestemming om \'n werknemer op te dateer nie.'),(47,'af','U het nie toestemming om \'n werknemer uit te vee nie.'),(48,'af','Skrap eers die Daily Cleans waaraan die werknemer gekoppel is, dan kan u die werknemer uitvee.'),(49,'af','U het nie toestemming om huise in te voer nie.'),(50,'af','U het nie toestemming om die lêer op te dateer nie.'),(51,'af','Valideringsfout: eerste ry invoerlêer moet opskrifte bevat en sal oorgeslaan word. Gaan u veldwaardes na.'),(52,'af','Invoer suksesvol voltooi'),(53,'af','Kies u poskode en straat!'),(54,'af','Geen lêer gekies nie.'),(55,'af','U het nie toestemming om \'n opgelaaide lêer uit te vee nie.'),(56,'af','U het nie toestemming om \'n instruksie te skep nie.'),(57,'af','U het nie toestemming nie.'),(58,'af','Vee eers die daaglikse skoon detail uit waaraan hierdie instruksie gekoppel is, dan kan u hierdie lêer uitvee.'),(59,'af','U het nie toestemming om \'n boodskaplys te skep nie.'),(60,'af','U het nie toestemming om \'n boodskaplys op te dateer nie.'),(61,'af','U het nie toestemming om \'n boodskaplys te verwyder nie.'),(62,'af','Vee eers die daaglikse skoon items uit waarheen hierdie boodskap gestuur is, dan kan u hierdie boodskap uitvee.'),(63,'af','U het nie toestemming om \'n boodskap te skep nie.'),(64,'af','U het nie toestemming om \'n boodskap op te dateer nie.'),(65,'af','U het nie toestemming om \'n boodskap uit te vee nie.'),(66,'af','Vee eers subkategorie uit, dws. Strate wat aan hierdie kategorie gekoppel is, dws. Poskode, dan sal u hierdie kategorie kan uitvee, dws. poskode'),(67,'af','U het nie toestemming om \'n huis te skep nie.'),(68,'af','Gestoor rekord suksesvol tot die nuutste daaglikse skoonmaak'),(69,'af','met poskode'),(70,'af','Daaglikse werkblad: <a href = \"'),(71,'af','Klik hier </a> om voort te gaan.'),(72,'af','Jobcode'),(73,'af','nie gevind nie. Huis gered, maar nie gestoor tot by die nuutste daaglikse skoonmaak. Kopieer die huis na die daaglikse skoonmaak sodra u die daaglikse skoonmaakmiddel geskep het.'),(74,'af','U het nie toestemming om \'n huis uit te vee nie.'),(75,'af','Die huis #'),(76,'af','is suksesvol uitgevee.'),(77,'af','Kan nie die huis # uitvee nie'),(78,'af','. Dit bestaan ​​op Daily Clean'),(79,'af','skedule (e) al. Verwyder die huis eers op hierdie Daily Cleans.'),(80,'af','Óf van: E-posadres van die onderneming verlaat nie of na: E-posadres van die kliënt bestaan ​​nie vir Huis-ID nie:'),(81,'af','Maak seker dat albei ingevul is. E-posadres van die onderneming kan hier ingevoer word.'),(82,'af','skoon'),(83,'af',': Die skoonmaak van direkte debietmandaat moet binne 30 minute vanaf hierdie tyd deur u goedgekeur word:'),(84,'af','Geagte kliënt,'),(85,'af','Ons het \'n skakel met direkte debietmandaat na Gocardless vir u geskep.'),(86,'af','Hier is die skakel na die Gocardless-veilige webwerf waar u gevra word om u besonderhede in te voer. Klik op hierdie skakel.'),(87,'af','Gocardless veranderlike direkte debietmandaat'),(88,'af','Bêre ons nie u bankbesonderhede op nie. Dit word deur Gocardless hanteer. Sodra u die direkte debietmandaat goedgekeur het, sal ons in die toekoms \'n versoek om betaling op die Gocardless-webwerf kan uitreik. </ B>'),(89,'af','Ons sal \'n e-pos met bevestigingsbevestiging aan u stuur sodra u hierdie eenmalige mandaat goedgekeur het. Sodra u die mandaat goedgekeur het, moet u na ons webwerf herlei word. </ B>'),(90,'af','groete'),(91,'af','Direkteur van'),(92,'af','Meer inligting oor hoe GoCardless u persoonlike gegewens verwerk en u databeskermingsregte, insluitend u reg om beswaar te maak, is beskikbaar by'),(93,'af','Gocardless veranderlike direkte debietmandaatversoek gestuur vanaf'),(94,'af','om'),(95,'af','vir kliënt-ID:'),(96,'af','Die kliënt sal na hierdie webwerf verwys word sodra die mandaat goedgekeur is. \'N Eenvoudige flitsboodskap word aan hulle vertoon. U sal die ontvangs van die mandaat erken deur op die knoppie op die hoofmenu hierbo te druk. Hierdeur word u rekords opgedateer en \'n bevestiging van die ontvangs van die bevestiging-e-pos aan die kliënt gestuur met \'n bevestigingsskakel binne hul e-pos.'),(97,'af','Bêre ons nie u bankbesonderhede op nie. Dit word deur Gocardless hanteer. Sodra u die direkte debietmandaat goedgekeur het, kan u \'n versoek om \'n betalingsbedrag via die Gocardless-webwerf aan u uitreik. </ B>'),(98,'af','Antwoord asseblief hierdie e-pos nadat u die mandaat goedgekeur het.'),(99,'af','Die kliënt sal na hierdie webwerf verwys word sodra die mandaat goedgekeur is. \'N Eenvoudige flitsboodskap word aan hulle vertoon. U sal die ontvangs van die mandaat erken deur op die knoppie op die hoofmenu hierbo te druk. Hierdie knoppie sal eers verskyn sodra die mandaat goedgekeur is. Hierdeur word u rekords opgedateer en \'n bevestiging van die ontvangs van die bevestiging-e-pos aan die kliënt gestuur met \'n bevestigingsskakel binne hul e-pos.'),(100,'af','Geen regmerkie gekies nie.'),(101,'af','Daar is nie \'n mandaat- of \'n gokardlose klantnommer vir Huis-ID nie:'),(102,'af','Betalings moet gedoen word teen \'n geldige mandaat en klante geregistreer op Gocardless.com'),(103,'af','U totaal van'),(104,'af','is nie minder as die minimum van 1 plaaslike geldeenheid nie.'),(105,'af','Stelselboodskap:'),(106,'af',': Betalingsversoek:'),(107,'af','Die betaling is nou betaalbaar vir:'),(108,'af','Totaal: & pond'),(109,'af','Gocardless stuur u binnekort per e-pos met \'n kennisgewing van 3 dae vooruitskrywing van direkte skuld, sodat u kan reël vir enige kansellasie indien u nie tevrede is met bogenoemde bedrag nie.'),(110,'af','Kontak ons ​​gerus op'),(111,'af','sou u binne die volgende 3 dae wil kanselleer.'),(112,'af','Ons gebruik GoCardless om u direkte debietbetalings te verwerk. Meer inligting oor hoe GoCardless u persoonlike data en u databeskermingsregte verwerk, insluitend u reg'),(113,'af','om beswaar te maak, is beskikbaar by'),(114,'af','Betalingsversoek gestuur vanaf'),(115,'af','Eerste naam:'),(116,'af','Van:'),(117,'af','Mandaat nommer sonder kliënt:'),(118,'af','Bedrag: & pond'),(119,'af','Totaal: & pond'),(120,'af','Ons gebruik GoCardless om u direkte debietbetalings te verwerk. Meer inligting oor hoe GoCardless u persoonlike gegewens verwerk en u databeskermingsregte, insluitend u reg om beswaar te maak, is beskikbaar by'),(121,'af','Erkende klante-mandaat: ID'),(122,'af','Stelselboodskap: mandaat het na 30 minute verval. Stuur weer \'n outomatiese nuwe mandaat. Die kliënt moet die skakel na Gocardless binne 30 minute goedkeur en bevestig.'),(123,'af','Stelselboodskap: Kliënte moet mandate binne 30 minute goedkeur. Stuur \'n ander mandaat vir goedkeuring na kliënt-ID:'),(124,'af','Noem:'),(125,'af','U het nie toestemming om \'n straat te skep nie.'),(126,'af','U het nie toestemming om \'n straat op te dateer nie.'),(127,'af','U het nie toestemming om \'n straat uit te vee nie.'),(128,'af','Skrap eers die huise wat met hierdie subkategorie geassosieer word, dws. straat, dan sal jy hierdie straat kan uitvee.'),(129,'af','U het nie toestemming om \'n daaglikse werkblad te skep nie.'),(130,'af','U het nie toestemming om \'n daaglikse werkblad uit te vee nie.'),(131,'af','Skoon datum:'),(132,'af','weens:'),(133,'af','betaling waardeer. verwysing:'),(134,'af','Antwoord - betaal - op hierdie teks sodra die betaling gedoen is.'),(135,'af','Hi'),(136,'af','Uitsondering: óf Geen regmerkies gekies nie, geen e-pos van huishoudelike of geen direkte debietmandaat van huiseienaar nie.'),(137,'af','Hierdie daaglikse skoonmaak is gekopieër. Verander die datum later soos nodig.'),(138,'af','Die versoekte model bestaan ​​nie.'),(139,'af','U het nie toestemming om \'n daaglikse skoonmaakmiddel te sien nie.'),(140,'af','U het nie toestemming om \'n daaglikse skoonmaakmiddel te skep nie.'),(141,'af','U het nie toestemming om \'n daaglikse skoonmaakmiddel op te dateer nie.'),(142,'af','U het nie toestemming om \'n daaglikse skoonmaakmiddel uit te vee nie.'),(143,'af','U het individuele skoonmaakmiddels wat u eers moet verwyder. Klik op skoon en verwyder al die individuele skoonmaakmiddels.'),(144,'af','Daardie daaglikse skoonmaakmiddels wat gekontroleer of getik is, is gekopieër. Verander die datum soos nodig.'),(145,'af','U het nie toestemming om \'n sessie te besigtig nie.'),(146,'af','U het nie toestemming om \'n sessie op te dateer nie.'),(147,'af','U het nie toestemming om \'n sessie uit te vee nie.'),(148,'af','Dankie dat jy ons gekontak het. Ons sal so gou as moontlik op u reageer.'),(149,'af','Kon nie jou boodskap stuur nie.'),(150,'af',', Skoon versoek:'),(151,'af','Die prentjie mag nie groter as 2 MB wees nie.'),(152,'af','ID'),(153,'af','Kliënt-lêernaam, bv. joe20190304_1.jpg'),(154,'af','Bedienerslêernaam'),(155,'af','Inhoud Alt'),(156,'af','Inhoudstitel'),(157,'af','Inhoudsopskrif'),(158,'af','naam'),(159,'af','Adresstraat'),(160,'af','Adresgebied1 bv. Glasgow'),(161,'af','Adresgebied2 bv. Lanarkshire'),(162,'af','Adres Poskode'),(163,'af','telefoon'),(164,'af','Eksterne webwerf-URL'),(165,'af','e-pos'),(166,'af','Twilio Telefoon bv. bv. \"+441315103755\" as dit in die Verenigde Koninkryk is. Die nul word tussen die tweede 4 en die 1 laat val'),(167,'af','Faks'),(168,'af','Aanvangsdatum vir finansiële jaar'),(169,'af','Finansiële jaareinddatum'),(170,'af','Korporatiewe belastingdatum'),(171,'af','Maatskappy registrasie nommer'),(172,'af','BTW Nr'),(173,'af','Alternatiewe registrasienaam'),(174,'af','Alternatiewe Registrasienommer'),(175,'af','Alt vervaldatum'),(176,'af','Alt2 Registrasie Naam'),(177,'af','Alt2 Registrasienommer'),(178,'af','Alt2 vervaldatum'),(179,'af','Sic Naam'),(180,'af','Sic-kode'),(181,'af','Sic2 Naam'),(182,'af','Sic2-kode'),(183,'af','Sluit daaglikse skoonmaakbedrae ten volle uit die lys uit'),(184,'af','Sluit daaglikse koste ten volle uit die lys uit'),(185,'af','Notas sigbaar op die tuisblad wanneer die werker aangemeld is.'),(186,'af','Gocardless Accesstoken'),(187,'af','Gocardless Live Of Sandbox bv. Leef'),(188,'af','Smtp Transport Gasheer bv. send.one.com'),(189,'af','Smtp Vervoer Gebruikernaam'),(190,'af','Smtp vervoer wagwoord'),(191,'af','Smtp Vervoer Port'),(192,'af','Smtp-vervoerkodering'),(193,'af','Verifikasiekode'),(194,'af','beskrywing'),(195,'af','prys'),(196,'af','Koste nommer'),(197,'af','Kategorie kode (bv. SUB - Onderaannemer)'),(198,'af','Kategorie Kode eerste helfte eng. SUB (maksimum 4 karakters)'),(199,'af','Kategorie Kode Tweedehalf bv. 001 (maksimum 3 karakters)'),(200,'af','spesialisasie'),(201,'af','Eerste kostedatum'),(202,'af','Beëindigingsdatum (standaard: 2099/12/31). Stel dit in om van die kostelys te verwyder.'),(203,'af','Gewysigde datum (ignoreer)'),(204,'af','Belasting ID'),(205,'af','Modifieddate'),(206,'af','Daaglikse koste ID'),(207,'af','Koste (s) in skoon ID'),(208,'af','Betalingstipe bv. Kontant, tjek, Paypal, debietkaart, kredietkaart, ander * standaard: kontant'),(209,'af','Betalingverwysing:'),(210,'af','Volgende kostedatum'),(211,'af','Costcode'),(212,'af','Costsubcode'),(213,'af','koste'),(214,'af','Koste beskrywing'),(215,'af','Karousale lêer bv. jpg, png, pdf, xls, xlsx'),(216,'af','Bestel Aantal'),(217,'af','Eenheidsprys'),(218,'af','Lyntotaal'),(219,'af','betaal'),(220,'af','Gewysigde Datum'),(221,'af','Geen.'),(222,'af','Kostekode'),(223,'af','Koste-kode agtervoegsel'),(224,'af','Werknemer identiteit'),(225,'af','Koste Datum'),(226,'af','Subtotaal'),(227,'af','Belastingtotaal'),(228,'af','Totaal verskuldig'),(229,'af','Koste Kategorie'),(230,'af','Huisnommers'),(231,'af','Begin nommer'),(232,'af','Voltooi nommer'),(233,'af','Unieke identifikasienommer'),(234,'af','Kontak telefoonnommer'),(235,'af','Titel'),(236,'af','Geboortedatum'),(237,'af','Huwelikstatus'),(238,'af','geslag'),(239,'af','Huurdatum'),(240,'af','Salaris vlag'),(241,'af','Vakansietye'),(242,'af','Siek verlof ure'),(243,'af','Huidige vlag'),(244,'af','Gewysigde datum'),(245,'af','Produk-ID'),(246,'af','datum'),(247,'af','bedrag'),(248,'af','Die invoerlêer mag nie groter as 2 MB wees nie.'),(249,'af','Kliënt-lêernaam'),(250,'af','Voer lêer in'),(251,'af','kode'),(252,'af','Kode Betekenis'),(253,'af','Sluit in die vervolglys van verkoopsbestellingsbesonderhede in'),(254,'af','Privaatheidsbeleid'),(255,'af','Bepalings en voorwaardes'),(256,'af','Laas opgedateer'),(257,'af','boodskap'),(258,'af','Mobile'),(259,'af','Verkoopskode-poskode-ID'),(260,'af','Daar is geen gebruiker met hierdie e-posadres nie.'),(261,'af','Wagwoordterugstelling vir'),(262,'af','Verkoopsbestelling-detail-ID'),(263,'af','Gocardless-betalingsversoek-ID'),(264,'af','status'),(265,'af','Voornaam (nie verpligtend nie)'),(266,'af','Van (Nie verpligtend nie)'),(267,'af','Kontak mobiele'),(268,'af','Spesiale versoek'),(269,'af','Prys (verpligtend)'),(270,'af','Frekwensie (vereis)'),(271,'af','Huis nommer'),(272,'af','Poskode-area (bv. G32 - Carntyne)'),(273,'af','Poskode Firsthalf bv. G32 (maksimum 4 karakters)'),(274,'af','Poskode Secondhalf bv. 6LF (maksimum 3 karakters)'),(275,'af','Straat (verpligtend)'),(276,'af','Eerste vasgelegde datum'),(277,'af','Beëindigingsdatum (standaard: 2099/12/31). Stel dit van die rondte af.'),(278,'af','Is dit aktief?'),(279,'af','Die nuutste daaglikse skoon poskode om huis aan te skakel.'),(280,'af','Gokardlose kliëntmandaatskakel word per e-pos aan die kliënt gestuur (nog nie goedgekeur nie) / Mandaat nommer bv. MD1234AA123BB (goedgekeur)'),(281,'af','Kliënt nommer sonder Gocard in Gocardless webwerf wat aandui dat mandaat vir direkte debiet goedgekeur is.'),(282,'af','huis'),(283,'af','Eerste naam'),(284,'af','Van'),(285,'af','poskode'),(286,'af','straat'),(287,'af','Eerste skoon datum'),(288,'af','Volgende skoon datum'),(289,'af','Beëindigde Datum'),(290,'af','gebied'),(291,'af','Volgorde (Stel op 500 as dit met Quick Build gebruik word)'),(292,'af','Breedtegraad Begin bv. 55.8888888'),(293,'af','Lengtegraad Begin bv. -4,1111111'),(294,'af','Latitude Finish bv. 55.9999999'),(295,'af','Lengtegraad Afwerking bv. -4,2222222'),(296,'af','Aanwysings na volgende straat'),(297,'af','Is dit aktief? (Verstek: afgemerk)'),(298,'af','nota'),(299,'af','Geskep by'),(300,'af','Gewysig om'),(301,'af','Daaglikse skoon ID'),(302,'af','Huis (e) om ID skoon te maak'),(303,'af','Volgende skoon datum'),(304,'af','Poskode'),(305,'af','huiseienaar'),(306,'af','Poskode bv. BL'),(307,'af','Poskode agtervoegsel'),(308,'af','Carousel ID'),(309,'af','Skoon Datum'),(310,'af','ure'),(311,'af','Inkomste hr'),(312,'af','verval'),(313,'af','data'),(314,'af','Gebruiker-ID'),(315,'af','Db'),(316,'af','Gc ontslaan'),(317,'af','ID van die sessie'),(318,'af','Sessie ID'),(319,'af','Herlei vloei-ID'),(320,'af','Mandaat wat deur die kliënt bevestig word'),(321,'af','Erken deur die administrateur'),(322,'af','Hierdie gebruikersnaam is reeds geneem.'),(323,'af','Hierdie e-posadres is reeds geneem.'),(324,'af','Belastingtipe'),(325,'af','Belastingnaam'),(326,'af','Belastingpersentasie'),(327,'af','Kan nie \'n spesifieke klas vind nie.'),(328,'af','U rugsteunbesonderhede'),(329,'af','Aflaai'),(330,'af','Stoor u rugsteun op u plaaslike skyf op \'n veilige plek.'),(331,'af','U rugsteun-SQL-lêer kon nie gestoor word nie as gevolg van die volgende fout:'),(332,'af','U rugsteun-SQL-lêer sou gestoor gewees het in:'),(333,'af','terug'),(334,'af','U PHP-weergawe {0} is laer as 5.5+'),(335,'af','U DocumentRoot is nie ingestel op toepassing / web / i nie'),(336,'af','U MOET u DocumentRoot-instelling in u webbediener se konfigurasie op'),(337,'af','U PHP-weergawe hpversio'),(338,'af','U dokumentwortel is korrek ingestel op:'),(339,'af','volgende'),(340,'af','Kontroleer toestemmings'),(341,'af','Sommige van u lêers is nie toeganklik nie. Gaan voort op eie risiko?'),(342,'af','Tik taal in'),(343,'af','Voer u databasiskonfigurasie in'),(344,'af',NULL),(345,'af',NULL),(346,'af',NULL),(347,'af',NULL),(348,'af',NULL),(349,'af',NULL),(350,'af',NULL),(351,'af',NULL),(352,'af',NULL),(353,'af',NULL),(354,'af',NULL),(355,'af',NULL),(356,'af',NULL),(357,'af',NULL),(358,'af',NULL),(359,'af',NULL),(360,'af',NULL),(361,'af',NULL),(362,'af',NULL),(363,'af',NULL),(364,'af',NULL),(365,'af',NULL),(366,'af',NULL),(367,'af',NULL),(368,'af',NULL),(369,'af',NULL),(370,'af',NULL),(371,'af',NULL),(372,'af',NULL),(373,'af',NULL),(374,'af',NULL),(375,'af',NULL),(376,'af',NULL),(377,'af',NULL),(378,'af',NULL),(379,'af',NULL),(380,'af',NULL),(381,'af',NULL),(382,'af',NULL),(383,'af',NULL),(384,'af',NULL),(385,'af',NULL),(386,'af',NULL),(387,'af',NULL),(388,'af',NULL),(389,'af',NULL),(390,'af',NULL),(391,'af',NULL),(392,'af',NULL),(393,'af',NULL),(394,'af',NULL),(395,'af',NULL),(396,'af',NULL),(397,'af',NULL),(398,'af',NULL),(399,'af',NULL),(400,'af',NULL),(401,'af',NULL),(402,'af',NULL),(403,'af',NULL),(404,'af',NULL),(405,'af',NULL),(406,'af',NULL),(407,'af',NULL),(408,'af',NULL),(409,'af',NULL),(410,'af',NULL),(411,'af',NULL),(412,'af',NULL),(413,'af',NULL),(414,'af',NULL),(415,'af',NULL),(416,'af',NULL),(417,'af',NULL),(418,'af',NULL),(419,'af',NULL),(420,'af',NULL),(421,'af',NULL),(422,'af',NULL),(423,'af',NULL),(424,'af',NULL),(425,'af',NULL),(426,'af',NULL),(427,'af',NULL),(428,'af',NULL),(429,'af',NULL),(430,'af',NULL),(431,'af',NULL),(432,'af',NULL),(433,'af',NULL),(434,'af',NULL),(435,'af',NULL),(436,'af',NULL),(437,'af',NULL),(438,'af',NULL),(439,'af',NULL),(440,'af',NULL),(441,'af',NULL),(442,'af',NULL),(443,'af',NULL),(444,'af',NULL),(445,'af',NULL),(446,'af',NULL),(447,'af',NULL),(448,'af',NULL),(449,'af',NULL),(450,'af',NULL),(451,'af',NULL),(452,'af',NULL),(453,'af',NULL),(454,'af',NULL),(455,'af',NULL),(456,'af',NULL),(457,'af',NULL),(458,'af',NULL),(459,'af',NULL),(460,'af',NULL),(461,'af',NULL),(462,'af',NULL),(463,'af',NULL),(464,'af',NULL),(465,'af',NULL),(466,'af',NULL),(467,'af',NULL),(468,'af',NULL),(469,'af',NULL),(470,'af',NULL),(471,'af',NULL),(472,'af',NULL),(473,'af',NULL),(474,'af',NULL),(475,'af',NULL),(476,'af',NULL),(477,'af',NULL),(478,'af',NULL),(479,'af',NULL),(480,'af',NULL),(481,'af',NULL),(482,'af',NULL),(483,'af',NULL),(484,'af',NULL),(485,'af',NULL),(486,'af',NULL),(487,'af',NULL),(488,'af',NULL),(489,'af',NULL),(490,'af',NULL),(491,'af',NULL),(492,'af',NULL),(493,'af',NULL),(494,'af',NULL),(495,'af',NULL),(496,'af',NULL),(497,'af',NULL),(498,'af',NULL),(499,'af',NULL),(500,'af',NULL),(501,'af',NULL),(502,'af',NULL),(503,'af',NULL),(504,'af',NULL),(505,'af',NULL),(506,'af',NULL),(507,'af',NULL),(508,'af',NULL),(509,'af',NULL),(510,'af',NULL),(511,'af',NULL),(512,'af',NULL),(513,'af',NULL),(514,'af',NULL),(515,'af',NULL),(516,'af',NULL),(517,'af',NULL),(518,'af',NULL),(519,'af',NULL),(520,'af',NULL),(521,'af',NULL),(522,'af',NULL),(523,'af',NULL),(524,'af',NULL),(525,'af',NULL),(526,'af',NULL),(527,'af',NULL),(528,'af',NULL),(529,'af',NULL),(530,'af',NULL),(531,'af',NULL),(532,'af',NULL),(533,'af',NULL),(534,'af',NULL),(535,'af',NULL),(536,'af',NULL),(537,'af',NULL),(538,'af',NULL),(539,'af',NULL),(540,'af',NULL),(541,'af',NULL),(542,'af',NULL),(543,'af',NULL),(544,'af','Instellings'),(545,'af',NULL),(546,'af',NULL),(547,'af',NULL),(548,'af',NULL),(549,'af',NULL),(550,'af',NULL),(551,'af',NULL),(552,'af','Inkomste'),(553,'af',NULL),(554,'af',NULL),(555,'af',NULL),(556,'af','Uitgawes'),(557,'af',NULL),(558,'af',NULL),(559,'af',NULL),(560,'af',NULL),(561,'af',NULL),(562,'af',NULL),(563,'af',NULL),(564,'af',NULL),(565,'af',NULL),(566,'af',NULL),(567,'af',NULL),(568,'af',NULL),(569,'af',NULL),(570,'af',NULL),(571,'af',NULL),(572,'af',NULL),(573,'af',NULL),(574,'af',NULL),(575,'af',NULL),(576,'af',NULL),(577,'af',NULL),(578,'af',NULL),(579,'af',NULL),(580,'af',NULL),(581,'af',NULL),(582,'af',NULL),(583,'af',NULL),(584,'af',NULL),(585,'af',NULL),(586,'af',NULL),(587,'af',NULL),(588,'af',NULL),(589,'af',NULL),(590,'af',NULL),(591,'af',NULL),(592,'af',NULL),(593,'af',NULL),(594,'af',NULL),(595,'af',NULL),(596,'af',NULL),(597,'af',NULL),(598,'af',NULL),(599,'af',NULL),(600,'af',NULL),(601,'af',NULL),(602,'af',NULL),(603,'af',NULL),(604,'af',NULL),(605,'af',NULL),(606,'af',NULL),(607,'af',NULL),(608,'af',NULL),(609,'af',NULL),(610,'af',NULL),(611,'af',NULL),(612,'af',NULL),(613,'af',NULL),(614,'af',NULL),(615,'af',NULL),(616,'af',NULL),(617,'af',NULL),(618,'af',NULL),(619,'af',NULL),(620,'af',NULL),(621,'af',NULL),(622,'af',NULL),(623,'af',NULL),(624,'af',NULL),(625,'af',NULL),(626,'af',NULL),(627,'af',NULL),(628,'af',NULL),(629,'af',NULL),(630,'af',NULL),(631,'af',NULL),(632,'af',NULL),(633,'af',NULL),(634,'af',NULL),(635,'af',NULL),(636,'af',NULL),(637,'af',NULL),(638,'af',NULL),(639,'af',NULL),(640,'af',NULL),(641,'af',NULL),(642,'af',NULL),(643,'af',NULL),(644,'af',NULL),(645,'af',NULL),(646,'af',NULL),(647,'af',NULL),(648,'af',NULL),(649,'af',NULL),(650,'af',NULL),(651,'af',NULL),(652,'af',NULL),(653,'af',NULL),(654,'af',NULL),(655,'af',NULL),(656,'af',NULL),(657,'af',NULL),(658,'af',NULL),(659,'af',NULL),(660,'af',NULL),(661,'af',NULL),(662,'af',NULL),(663,'af',NULL),(664,'af',NULL),(665,'af',NULL),(666,'af',NULL),(667,'af',NULL),(668,'af',NULL),(669,'af',NULL),(670,'af',NULL),(671,'af',NULL),(672,'af',NULL),(673,'af',NULL),(674,'af',NULL),(675,'af',NULL),(676,'af',NULL),(677,'af',NULL),(678,'af',NULL),(679,'af',NULL),(680,'af',NULL),(681,'af',NULL),(682,'af',NULL),(683,'af',NULL),(684,'af',NULL),(685,'af',NULL),(686,'af',NULL),(687,'af',NULL),(688,'af',NULL),(689,'af',NULL),(690,'af',NULL),(691,'af',NULL),(692,'af',NULL),(693,'af',NULL),(694,'af',NULL),(695,'af',NULL),(696,'af',NULL),(697,'af',NULL),(698,'af',NULL),(699,'af',NULL),(700,'af',NULL),(701,'af',NULL),(702,'af',NULL),(703,'af',NULL),(704,'af',NULL),(705,'af',NULL),(706,'af',NULL),(707,'af',NULL),(708,'af',NULL),(709,'af',NULL),(710,'af',NULL),(711,'af',NULL),(712,'af',NULL),(713,'af',NULL),(714,'af',NULL),(715,'af',NULL),(716,'af',NULL),(717,'af',NULL),(718,'af',NULL),(719,'af',NULL),(720,'af','Huise om skoon te maak'),(721,'af','in'),(722,'af','Kyk na huis om skoon te maak ID'),(723,'af','Huise om ID skoon te maak'),(724,'af','Poskode Naam (Stel onder Poskode)'),(725,'af','Straatnaam (stel onder straat)'),(726,'af','Sorteerorde (Stel onder straat)'),(727,'af','Beskou'),(728,'af','Geen selfoonnommer nie'),(729,'af','Kopieer adres na knipbord'),(730,'af','gemis'),(731,'af','Volgende maand asb'),(732,'af','Fronte slegs gedoen'),(733,'af','Rugsteine slegs gedoen'),(734,'af','Skep daaglikse skoonmaak'),(735,'af','Daaglikse skoonmaak'),(736,'af','Klik hier om &#39;n dop te skep wat bestaan uit die skoon datum en &#39;n poskode wat die naam van u loop is. Kopieer huise vanaf Huis na hierdie skoon datum. Gebruik die Ticked copy-knoppie om hierdie skoon datum in die toekoms te herhaal. Meer as een poskode of skoon datum kan getik word en gekopieër word na &#39;n nuwe skoon datum as u van plan is om meer as een lopie op dieselfde dag te doen.'),(737,'af','Kopieer huise na daaglikse skoonmaak'),(738,'af','Dit sal u huis toe neem. Nadat u u besonderhede vir die huisheer ingevoer het, kan u die huis na u skoon datum kopieër.'),(739,'af','As u een van die vorige skoonmaakmiddels merk, word die detail gekopieër na &#39;n datum wat ongeveer twee maande voor die datum is. Pas die datum aan sodra dit gekopieër is om &#39;n meer realistiese datum te kry.'),(740,'af','+ 2 maande'),(741,'af','As u een van die vorige skoonmaakmiddels merk, word die detail gekopieër na &#39;n datum ongeveer &#39;n maand voor die datum. Pas die datum aan sodra dit gekopieër is om &#39;n meer realistiese datum te kry.'),(742,'af','+ 1 maand'),(743,'af','As u een van die vorige skoonmaakmiddels merk, word die detail gekopieër na &#39;n datum wat ongeveer twee weke voor die datum is. Pas die datum aan sodra dit gekopieër is om &#39;n meer realistiese datum te kry.'),(744,'af','+ twee weke / + 2 weke'),(745,'af','As u een van die vorige skoonmaakmiddels merk, word die detail gekopieër na &#39;n datum ongeveer &#39;n week voor die datum. Pas die datum aan sodra dit gekopieër is om &#39;n meer realistiese datum te kry.'),(746,'af','+ 1 week'),(747,'af','As u een van die vorige skoonmaakmiddels merk, word die detail gekopieër na &#39;n datum wat identies is aan die datum van vandag.'),(748,'af','Gebruik vandag se datum'),(749,'af','Schoont'),(750,'af','Poskode ...'),(751,'af','Vanaf datum ...'),(752,'af','Vooruit betaling'),(753,'af','Vorige betaling'),(754,'af','Dateer Daily Clean op'),(755,'af','Telefoonnommer van baas verkry vanaf die instellings van die maatskappy ... telefoon.'),(756,'af','Skep sessie'),(757,'af','sessies'),(758,'af','besonderhede'),(759,'af','Werk sessie op'),(760,'af','Skep sessiedetail'),(761,'af','Sessiebesonderhede'),(762,'af','Opdatering van sessie-detail'),(763,'af','sessie'),(764,'af','oor'),(765,'af','Dit is die About-bladsy. U kan die volgende lêer verander om die inhoud daarvan aan te pas'),(766,'af','gekanselleer'),(767,'af','U betaling is gekanselleer. Probeer asseblief weer.'),(768,'af','Integriteitsbeperking het voorgekom.'),(769,'af','Metode nie toegelaat nie'),(770,'af','Metode nie toegelaat nie: Http-uitsondering'),(771,'af','onderhoud'),(772,'af','Hierdie webwerf word onderhou. U kan die volgende lêer verander om die inhoud daarvan aan te pas'),(773,'af','Skep belasting'),(774,'af','belasting'),(775,'af','Belasting opdateer'),(776,'af','beskikbaar'),(777,'af','Gekies'),(778,'af','Wys alles'),(779,'af','Filter'),(780,'af','Beweeg gekies'),(781,'af','Beweeg almal'),(782,'af','Verwyder geselekteerde'),(783,'af','Verwyder alle'),(784,'af','Wys alle {0}'),(785,'af','<span class=\'text-dark bg-warning\'>Gefiltreer</span> {0} vanaf {1}'),(786,'af','Leë lys'),(787,'af','Die koste wat gekontroleer of getik is, is na koste gekopieër: {0}'),(788,'af','Uitgawes: {0} / {1}: Bedrag:'),(789,'af','U het nie toestemming om &#39;n belastingkode te skep nie.'),(790,'af','U het nie toestemming om &#39;n belastingkode op te dateer nie.'),(791,'af','U het nie toestemming om &#39;n belastingkode te skrap nie.'),(792,'af','Verwyder eers daaglikse skoonmaak of koste waaraan hierdie belastingkode gekoppel is, dan kan u hierdie belastingkode uitvee.'),(793,'af','bv. arbeid'),(794,'af','Koste Einddatum'),(795,'af','Dateer kostekodes op'),(796,'af','Koste kodes'),(797,'af','Koste Subkode'),(798,'af','Kies u lêernaam wat u onder invoerhuise opgelaai het'),(799,'af','U het nie toestemming om hierdie pakket te vertaal in &#39;n taal van u keuse nie. Vra die administrateur vir die toestemming van Google Translate, en u kan self kies watter sinne u wil vertaal.'),(800,'af','U het nie die lêernaam en die pad van u JSON-lêer wat u van Google Translate afgelaai het, opgestel nie'),(801,'af','lêernaam en pad met die aanhalings en met voorwaartse skuinsstrepe bv. &quot;C: /path/filename.json&quot;'),(802,'af','Google Translate'),(803,'af','Engels -&gt; U taal. Stel u JSON-lêernaam en -paadjie in wat u van Gooogle Translate in Company afgelaai het en maak seker dat u administrateur die Google Translate-toestemming verleen het.'),(804,'af','U PHP-weergawe {0} is laer as die vereiste 7.1'),(805,'af','U PHP-weergawe {0} is hoër as die minimum van 7.1'),(806,'af','U Google Translate-JSON-lêer is onder Instellings ... maatskappy gestel en bestaan op google_credential_fil'),(807,'af','GOOGLE TOEPASSING KREDENSIALE kos'),(808,'af','U Google-geloofwaardigheidsinstelling onder Instellings ... Maatskappy is nie ingestel nie.'),(809,'af','U Google Credential-lêernaam en -paadjie is onder Instellings ... maatskappy gestel, maar die lêer self bestaan nie. Sluit aanhalings en skuinsstrepe in.'),(810,'af','vertaal');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `message` with 810 row(s)
--

--
-- Table structure for table `migration`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `migration` VALUES ('m000000_000000_base',1587143815),('sjaakp\\pluto\\migrations\\m000000_000000_init',1587143822),('frontend\\migrations\\m191110_221831_Mass',1587143841),('frontend\\migrations\\m191207_152415_works_taxDataInsert',1587143842),('frontend\\migrations\\m191207_155342_works_instructionDataInsert',1587143842),('frontend\\migrations\\m191207_161454_works_importhouses',1587143842),('frontend\\migrations\\m200125_075111__carousal_id_fix',1587143843),('frontend\\modules\\subscription\\migrations\\m200407_153547_Mass',1587143844),('console\\migrations\\auth\\m200413_073958_auth_assignment',1587143844),('console\\migrations\\auth\\m200413_073959_auth_item',1587143845),('console\\migrations\\auth\\m200413_074000_auth_item_child',1587143846),('console\\migrations\\auth\\m200413_074001_auth_rule',1587143846),('console\\migrations\\auth\\m200413_082835_auth_itemDataInsert',1587143846),('console\\migrations\\auth\\m200413_082924_auth_item_childDataInsert',1587143847),('console\\migrations\\auth\\m200413_085036_auth_ruleDataInsert',1587143847),('frontend\\migrations\\m200414_125047_works_companyDataInsert',1587143847),('m150207_210500_i18n_init',1587970255);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `migration` with 17 row(s)
--

--
-- Table structure for table `paypal_agreement`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paypal_agreement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `agreement_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `end_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `executed_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `terminated_at` timestamp NULL DEFAULT NULL,
  `reactivated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paypal_agreement`
--

LOCK TABLES `paypal_agreement` WRITE;
/*!40000 ALTER TABLE `paypal_agreement` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `paypal_agreement` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `paypal_agreement` with 0 row(s)
--

--
-- Table structure for table `session_detail`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session_detail` (
  `session_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` char(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect_flow_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `db` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_approved` tinyint(1) NOT NULL DEFAULT '0',
  `administrator_acknowledged` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`session_detail_id`),
  KEY `fk_session_detail_to_session_idx` (`session_id`),
  KEY `redirect_flow_id` (`redirect_flow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session_detail`
--

LOCK TABLES `session_detail` WRITE;
/*!40000 ALTER TABLE `session_detail` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `session_detail` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `session_detail` with 0 row(s)
--

--
-- Table structure for table `source_message`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `idx_source_message_category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=811 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `source_message`
--

LOCK TABLES `source_message` WRITE;
/*!40000 ALTER TABLE `source_message` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `source_message` VALUES (1,'app','House 2 House'),(2,'app','At least eight characters, one uppercase, one digit'),(3,'app','Hosue 2 house'),(4,'app','The requested page does not exist.'),(5,'app','You do not have permission to delete a carousal.'),(6,'app','This image or file is linked. You will have to remove this link first.'),(7,'app','Either your Company email address has not been filled in or your Customer Email address does not exist for House ID: '),(8,'app','Cleaning Direct Debit mandate needs to be approved by you.'),(9,'app','Hello. We have created a variable direct debit mandate through Gocardless that you will approve each time payment is required from you.'),(10,'app','<b>Hello. We have created a variable direct debit mandate through Gocardless. That you will approve each time payment is required from you<i></i></b>'),(11,'app','An email has been sent.'),(12,'app',' Create Customer on Gocardless: '),(13,'app','No ticks selected.'),(14,'app','You do not have permission to update a daily jobsheet.'),(15,'app','You do not have permission to view these details.'),(16,'app','You do not have permission to create a company.'),(17,'app','You can only create one company. Modify details of the current company.'),(18,'app','You do not have permission to update company details.'),(19,'app','You do not have permission to delete a company.'),(20,'app','Your Company Name'),(21,'app','First delete the cost subcategory or cost then you will be able to delete this file.'),(22,'app','You do not have permission to create a cost.'),(23,'app','Saved record successfully'),(24,'app','You do not have permission to delete a cost.'),(25,'app','The cost # '),(26,'app',' was successfully deleted. <a href=\"'),(27,'app','Click here'),(28,'app','to proceed.'),(29,'app','Cannot delete the cost # '),(30,'app',' It exists on Daily Cost'),(31,'app','You do not have permission to create a daily cost sheet.'),(32,'app','You do not have permission to update a daily cost sheet.'),(33,'app','You do not have permission to delete a daily cost sheet.'),(34,'app','Integrity Constraint exception.'),(35,'app','CostdetailController: The requested model does not exist.'),(36,'app','You do not have permission to update a cost.'),(37,'app','You have individual costs on the detail which you must delete first. Click on costs and delete all of the individual costs.'),(38,'app','You do not have permission to copy the ticked step.'),(39,'app','@@Those costs that were checked or ticked have been copied to Costs:  addeddat@@'),(40,'app',' Paid: '),(41,'app','You do not have permission to create a Cost subcategory.'),(42,'app','You do not have permission to update a costsubcategory.'),(43,'app','You do not have permission to delete a costsubcategory.'),(44,'app','First delete the costs associated with this subcategory then you will be able to delete this subcategory.'),(45,'app','You do not have permission to create an employee.'),(46,'app','You do not have permission to update an employee.'),(47,'app','You do not have permission to delete an employee.'),(48,'app','First delete the Daily Cleans that the employee is linked to then you will be able to delete this employee.'),(49,'app','You do not have permission to import houses.'),(50,'app','You do not have permission to update the file.'),(51,'app','Validation error: First row of import file must include headings and will be skipped. Check your field values. '),(52,'app','Import completed successfully'),(53,'app','Select your postcode and street!'),(54,'app','No file selected.'),(55,'app','You do not have permission to delete an uploaded file.'),(56,'app','You do not have permission to create an instruction.'),(57,'app','You do not have permission.'),(58,'app','First delete the daily clean detail where this instruction has been linked to then you will be able to delete this file.'),(59,'app','You do not have permission to create a messagelog.'),(60,'app','You do not have permission to update a messagelog.'),(61,'app','You do not have permission to delete a messagelog.'),(62,'app','First delete the daily clean items this message was sent to then you will be able to delete this message.'),(63,'app','You do not have permission to create a message.'),(64,'app','You do not have permission to update a message.'),(65,'app','You do not have permission to delete a message.'),(66,'app','First delete subcategory ie. Streets linked to this category ie. Postcode then you will be able to delete this category ie. Postcode'),(67,'app','You do not have permission to create a house.'),(68,'app','Saved record successfully to latest daily clean '),(69,'app','with jobcode '),(70,'app','Daily Job Sheet: <a href=\"'),(71,'app','Click here</a> to proceed.'),(72,'app','Jobcode '),(73,'app',' not found. House saved but not saved to latest daliy clean. Copy the house to the daily clean once you have created the daily clean.'),(74,'app','You do not have permission to delete a house.'),(75,'app','The house # '),(76,'app',' was successfully deleted.'),(77,'app','Cannot delete the house # '),(78,'app','. It exists on Daily Clean'),(79,'app',' schedule(s) already. Delete this house on these Daily Cleans first please.'),(80,'app','Either From: Company Email address does not exit or To: Customer Email address does not exist for House ID: '),(81,'app',' Please make sure both are filled in. Company email address can be entered here. '),(82,'app','Clean'),(83,'app',': Cleaning Direct Debit mandate needs to be approved by you within 30 minutes from this time: '),(84,'app','Dear Customer,'),(85,'app','We have created a variable direct debit mandate link to Gocardless for you.'),(86,'app','Here is the link to the Gocardless secure Website where you will be required to enter your details. Please click on this link.'),(87,'app','Gocardless Variable Direct Debit Mandate'),(88,'app','At no stage do we store any of your bank details. This is handled by Gocardless. Once you have approved the direct debit mandate we will, in the future, be able to issue you with a payment amount request through the Gocardless website. </b>'),(89,'app','We will send you an acknowledgment confirmation email once you have approved this once-off mandate. You should be redirected to our website once you have approved the mandate. </b>'),(90,'app','Regards'),(91,'app','Director of '),(92,'app','More information on how GoCardless processes your personal data and your data protection rights, including your right to object, is available at '),(93,'app','Gocardless Variable Direct Debit Mandate Request sent from '),(94,'app',' to '),(95,'app',' for customer ID: '),(96,'app',' The customer will be redirected to this site once they have approved the Mandate. A simple flash message will be displayed to them. You will acknowledge receipt of the mandate by pressing a button on the main menu above House. This updates your records and sends an acknowledgement of receipt of mandate confirmation email to the customer with a confirmation link within their email.'),(97,'app','At no stage do we store any of your bank details. This is handled by Gocardless. Once you have approved the direct debit mandate we will be able to issue you with a payment amount request through the Gocardless website. </b>'),(98,'app','Please reply to this email once you have approved the mandate. '),(99,'app',' The customer will be redirected to this site once they have approved the Mandate. A simple flash message will be displayed to them. You will acknowledge receipt of the mandate by pressing a button on the main menu above House. This button will only appear once the mandate has been approved. This updates your records and sends an acknowledgement of receipt of mandate confirmation email to the customer with a confirmation link within their email.'),(100,'app','No tick selected.'),(101,'app','Either Mandate or Gocardless Customer Number does not exist for House ID: '),(102,'app',' Payments must be made against a valid mandate and customer registered on Gocardless.com'),(103,'app','Your total of '),(104,'app','does not equal or exceed the minimum of 1 local currency.'),(105,'app','System message: '),(106,'app',': Payment request: '),(107,'app','Payment is due now for: '),(108,'app','Total:     &pound'),(109,'app','Gocardless will be emailing you shortly with a 3 day Direct Debit Advance Notice in order for you to arrange for any cancellation if you are not happy with the above amount. '),(110,'app','Please contact us on '),(111,'app','should you wish to cancel within the next 3 days.  '),(112,'app','We use GoCardless to process your Direct Debit payments. More information on how GoCardless processes your personal data and your data protection rights, including your right '),(113,'app','to object, is available at '),(114,'app','Payment Request sent from '),(115,'app',' Firstname: '),(116,'app',' Surname: '),(117,'app',' Customer Gocardless Mandate Number: '),(118,'app',' Amount: &pound'),(119,'app','Total: &pound'),(120,'app','We use GoCardless to process your Direct Debit payments. More information on how GoCardless processes your personal data and your data protection rights, including your right to object, is available at '),(121,'app','Acknowledged Customer Mandate: ID '),(122,'app','System message: Mandate has expired after 30 minutes. Send an automatic new mandate again. Customer must approve and confirm email link to Gocardless within 30 minutes. '),(123,'app','System message: Customers must approve Mandates within 30 minutes. Send another mandate for approval to Customer ID: '),(124,'app',' Name: '),(125,'app','You do not have permission to create a street.'),(126,'app','You do not have permission to update a street.'),(127,'app','You do not have permission to delete a street.'),(128,'app','First delete the houses associated with this subcategory ie. street then you will be able to delete this street.'),(129,'app','You do not have permission to create a daily jobsheet.'),(130,'app','You do not have permission to delete a daily jobsheet.'),(131,'app','Clean date: '),(132,'app',' Owing:'),(133,'app',' payment appreciated. Reference: '),(134,'app',' Please reply -- paid -- to this text once payment has been made.'),(135,'app',' Hi '),(136,'app','Exception: Either No ticks selected, no email of householder, or no direct debit mandate from householder.'),(137,'app','This daily clean has been copied. Modify the date as necessary later.'),(138,'app','The requested model does not exist.'),(139,'app','You do not have permission to view a daily clean.'),(140,'app','You do not have permission to create a daily clean.'),(141,'app','You do not have permission to update a daily clean.'),(142,'app','You do not have permission to delete a daily clean.'),(143,'app','You have individual cleans which you must delete first. Click on cleans and delete all of the individual cleans.'),(144,'app','Those daily cleans that were checked or ticked have been copied. Modify the date as necessary.'),(145,'app','You do not have permission to view a session.'),(146,'app','You do not have permission to update a session.'),(147,'app','You do not have permission to delete a session.'),(148,'app','Thank you for contacting us. We will respond to you as soon as possible.'),(149,'app','There was an error sending your message.'),(150,'app',' , Clean Request: '),(151,'app','The picture cannot be larger than 2MB.'),(152,'app','ID'),(153,'app','Client-side Filename eg. joe20190304_1.jpg'),(154,'app','Server-side Filename'),(155,'app','Content Alt'),(156,'app','Content Title'),(157,'app','Content Caption'),(158,'app','Name'),(159,'app','Address Street'),(160,'app','Address Area1 eg. Glasgow'),(161,'app','Address Area2 eg. Lanarkshire'),(162,'app','Address Postcode'),(163,'app','Telephone'),(164,'app','External Website Url'),(165,'app','Email'),(166,'app','Twilio Telephone eg. eg. \"+441315103755\" if in the UK. The zero is dropped between the second 4 and the 1'),(167,'app','Fax'),(168,'app','Financial Year Start Date'),(169,'app','Financial Year End Date'),(170,'app','Corporation Tax Due Date'),(171,'app','Company Registration Number'),(172,'app','Vat No'),(173,'app','Alternative Registration Name'),(174,'app','Alternative Registration No.'),(175,'app','Alt Expiry Date'),(176,'app','Alt2 Registration Name'),(177,'app','Alt2 Registration No'),(178,'app','Alt2 Expiry Date'),(179,'app','Sic Name'),(180,'app','Sic Code'),(181,'app','Sic2 Name'),(182,'app','Sic2 Code'),(183,'app','Exclude Fully Paid Daily Cleans from List'),(184,'app','Exclude Fully Paid Daily Costs from List'),(185,'app','Notes visible on Home Page when worker is logged in.'),(186,'app','Gocardless Accesstoken'),(187,'app','Gocardless Live Or Sandbox eg. Live'),(188,'app','Smtp Transport Host eg. send.one.com'),(189,'app','Smtp Transport Username'),(190,'app','Smtp Transport Password'),(191,'app','Smtp Transport Port'),(192,'app','Smtp Transport Encryption'),(193,'app','Verification Code'),(194,'app','Description'),(195,'app','Price'),(196,'app','Cost Number'),(197,'app','Category Code (eg. SUB - Subcontractor)'),(198,'app','Category Code Firsthalf eg. SUB (Max 4 characters)'),(199,'app','Category Code Secondhalf eg. 001 (Max 3 characters)'),(200,'app','Specialisation'),(201,'app','First cost date'),(202,'app','Termination date (default: 2099/12/31) . Set to remove from cost list.'),(203,'app','Modified Date (ignore)'),(204,'app','Tax ID'),(205,'app','Modifieddate'),(206,'app','Daily Cost ID'),(207,'app','Cost(s) in Clean ID'),(208,'app','Payment Type eg. Cash, Cheque, Paypal, Debitcard, Creditcard, Other *Default: Cash'),(209,'app','Payment Reference:'),(210,'app','Next Cost Date'),(211,'app','Costcode'),(212,'app','Costsubcode'),(213,'app','Cost'),(214,'app','Cost Description'),(215,'app','Carousal File eg. jpg, png, pdf, xls, xlsx'),(216,'app','Order Qty'),(217,'app','Unit Price'),(218,'app','Line Total'),(219,'app','Paid'),(220,'app','Modified Date'),(221,'app','No.'),(222,'app','Cost Code'),(223,'app','Cost Code Suffix'),(224,'app','Employee ID'),(225,'app','Cost Date'),(226,'app','Sub Total'),(227,'app','Tax Amt'),(228,'app','Total Due'),(229,'app','Cost Category'),(230,'app','House Numbers'),(231,'app','Start Number'),(232,'app','Finish Number'),(233,'app','Unique identification Number'),(234,'app','Contact Telephone Number'),(235,'app','Title'),(236,'app','Birth Date'),(237,'app','Marital Status'),(238,'app','Gender'),(239,'app','Hire date'),(240,'app','Salaried flag'),(241,'app','Vacation hours'),(242,'app','Sickleave hours'),(243,'app','Current flag'),(244,'app','Modified date'),(245,'app','Product ID'),(246,'app','Date'),(247,'app','Amount'),(248,'app','The import file cannot be larger than 2MB.'),(249,'app','Client-side Filename'),(250,'app','Import File'),(251,'app','Code'),(252,'app','Code Meaning'),(253,'app','Include in Sales Order Detail Drop Down List'),(254,'app','Privacy Policy'),(255,'app','Terms and Conditions'),(256,'app','Last Updated'),(257,'app','Message'),(258,'app','Mobile'),(259,'app','Salesorderdetail ID'),(260,'app','There is no user with this email address.'),(261,'app','Password reset for '),(262,'app','Sales Order Detail ID'),(263,'app','Gocardless Payment Request ID'),(264,'app','Status'),(265,'app','Firstname (Not required)'),(266,'app','Surname (Not required)'),(267,'app','Contact Mobile'),(268,'app','Special Request'),(269,'app','Price (required)'),(270,'app','Frequency (required)'),(271,'app','House Number'),(272,'app','Postcode Area (eg. G32 - Carntyne)'),(273,'app','Postcode Firsthalf eg. G32 (Max 4 characters)'),(274,'app','Postcode Secondhalf eg. 6LF (Max 3 characters)'),(275,'app','Street (required)'),(276,'app','First captured date'),(277,'app','Termination date (default: 2099/12/31) . Set to remove from round.'),(278,'app','Is this active?'),(279,'app','Latest daily clean job code to link house to.'),(280,'app','Gocardless customer mandate link sent to customer in email (not approved yet) / Mandate Number eg. MD1234AA123BB (approved) '),(281,'app','Gocardless customer number in Gocardless Website indicating that direct debit mandate has been approved.'),(282,'app','House'),(283,'app','Firstname'),(284,'app','Surname'),(285,'app','Postcode'),(286,'app','Street'),(287,'app','First clean date'),(288,'app','Next Clean date'),(289,'app','Discontinued Date'),(290,'app','Area'),(291,'app','Sequence (Set to 500 if using with Quick Build)'),(292,'app','Latitude Start eg. 55.8888888'),(293,'app','Longitude Start eg. -4.1111111'),(294,'app','Latitude Finish eg. 55.9999999'),(295,'app','Longitude Finish eg. -4.2222222'),(296,'app','Directions to next street'),(297,'app','Is this active? (Default: Ticked)'),(298,'app','Note'),(299,'app','Created At'),(300,'app','Modified At'),(301,'app','Daily Clean ID'),(302,'app','House(s) to Clean ID'),(303,'app','Next Clean Date'),(304,'app','Postal Code'),(305,'app','Homeowner'),(306,'app','Job Code eg. BL'),(307,'app','Job Code Suffix'),(308,'app','Carousal ID'),(309,'app','Clean Date'),(310,'app','Hrs'),(311,'app','Income hr'),(312,'app','Expire'),(313,'app','Data'),(314,'app','User ID'),(315,'app','Db'),(316,'app','Gc Rid'),(317,'app','Session Detail ID'),(318,'app','Session ID'),(319,'app','Redirect Flow ID'),(320,'app','Mandate Confirmed by Customer'),(321,'app','Acknowledged by Administrator'),(322,'app','This username has already been taken.'),(323,'app','This email address has already been taken.'),(324,'app','Tax Type'),(325,'app','Tax Name'),(326,'app','Tax Percentage'),(327,'app','Unable to find specified class.'),(328,'app','Your Backup Details'),(329,'app','Download'),(330,'app','Save your backup to your local drive in a safe place.'),(331,'app','Your backup sql file could not be saved due to the following error:  '),(332,'app','Your backup sql file would have been saved to: '),(333,'app','Back'),(334,'app','Your PHP version {0} is lower then required 5.5+'),(335,'app','Your DocumentRoot is not set to application/web/i'),(336,'app','You MUST set your DocumentRoot setting in your web server config to'),(337,'app','Your PHP version hpversio'),(338,'app','Your document root is correctly set to: '),(339,'app','Next'),(340,'app','Checking permissions'),(341,'app','Some of your files are not accessible. Continue at your own risk?'),(342,'app','Enter language'),(343,'app','Enter your database configuration'),(344,'app','Could not connect to databse!'),(345,'app','Unable to create db-local config'),(346,'app','Running migrations'),(347,'app','Error in input data: '),(348,'app','Use memcached extension?'),(349,'app','You have to have the .. Migrate Works Database .. permission to do this migration. This facility is only to be run for databases db1 to db10. NOT the admin database db'),(350,'app','You have to have the .. Migrate Works Database .. permission to do this migration. This facility is only to be run for databases db1 to db10. NOT the admin database db.'),(351,'app','Database connection - ok'),(352,'app','You are trying to create the Works Tables for database db by means of migrations. These have already been done by means of the migrate-db-namespaced command ...see console config main ...'),(353,'app','Migrations completed successfully'),(354,'app','Cannot set time limit to 0. Some operations may not complete.'),(355,'app','Database connection error:'),(356,'app','Installation complete'),(357,'app','Home'),(358,'app','Open site frontend'),(359,'app','Installer - Final step'),(360,'app','Site settings:'),(361,'app','This is the hostname that your site will be using.'),(362,'app','This is port that your site will be using.'),(363,'app','Cache settings:'),(364,'app','Installer'),(365,'app','Installation of Works Database tables to either db1 to db10.'),(366,'app','Your PHP version {0} is lower than the required 5.5+'),(367,'app','Your PHP version {0} is higher than the required 5.5+'),(368,'app','You have set your document root therefore we can continue.'),(369,'app','You are currently working from the admin database and will NOT be able to do a Works migration since these tables are already set up. The console migration command eg. migrate-db1 picks up the current database that you are working from which is db and not in the range of db1 to db10. As admin you will have to change your ...Access db...permission to ... Access db1 ... in order to perform this migration.'),(370,'app','Installer - Language selection'),(371,'app','Select language'),(372,'app','Installer translated languages:'),(373,'app','Not translated but available in Yii2'),(374,'app','Installer - Database migration'),(375,'app','Step Three'),(376,'app','Migration settings:'),(377,'app','Command:'),(378,'app','Migration command output'),(379,'app','Exit code:'),(380,'app','STD err:'),(381,'app','STD out:'),(382,'app','Subscription - Part 1 - subscribe.php'),(383,'app','Subscription'),(384,'app',' .....Change to \"live\" in modulessubscriptioncomponentsConfigpaypal.php'),(385,'app','Billing/Subscription Plan: Payment Definition Settings'),(386,'app','Note: If Billing Plan Type is FIXED, Payment Definition Type must be REGULAR'),(387,'app','Billing/Subscription Plan Payment: Shipping Settings'),(388,'app','Merchant preferences using API MERCHANT PREFERENCES'),(389,'app','Finalize and test billing plan'),(390,'app','Agreement Name and Description'),(391,'app','Subscription Service Provider`s Shipping Address'),(392,'app','Start Date of Plan: '),(393,'app','Access token will be null on first run.'),(394,'app','I Agree'),(395,'app','Create Carousal'),(396,'app','Carousals'),(397,'app','Slider/Carousal Images'),(398,'app','no image'),(399,'app','Update Carousal'),(400,'app','Update'),(401,'app','Delete'),(402,'app','Are you sure you want to delete this item?'),(403,'app','black'),(404,'app','white'),(405,'app','red'),(406,'app','Colour'),(407,'app','Create Company'),(408,'app','Companies'),(409,'app','Company'),(410,'app','Create Cost'),(411,'app','Costs'),(412,'app','Filename: Costs_Printed_'),(413,'app','Daily Costs Date: '),(414,'app','--- select ---'),(415,'app','Font Size Adjuster:<br>'),(416,'app','Adjust to change the font size.'),(417,'app','Subcategory'),(418,'app','Surname...'),(419,'app','Cost Description...'),(420,'app','List Price'),(421,'app','Update Cost '),(422,'app','View Cost'),(423,'app','Daily'),(424,'app','Weekly'),(425,'app','Fortnightly'),(426,'app','Monthly'),(427,'app','Every two months'),(428,'app','Other'),(429,'app','Select...'),(430,'app','Select'),(431,'app','Create Costcodes'),(432,'app','Costcodes'),(433,'app','Costcode (eg. DIR - Direct Expenses)'),(434,'app','Create Costcode eg. DIR - Direct Expenses'),(435,'app','Search'),(436,'app','Reset'),(437,'app','Create House to Clean'),(438,'app','Houses to clean today'),(439,'app','@@Costs to include@@'),(440,'app','Daily Costs'),(441,'app','Filename: Clean_date-'),(442,'app','Printed '),(443,'app','daily, cost, daily cost'),(444,'app','View'),(445,'app','Cost category and subcategory'),(446,'app','Add Cost'),(447,'app','app'),(448,'app','Cost category and Subcategory'),(449,'app','Payment Type'),(450,'app','Cash'),(451,'app','Cheque'),(452,'app','Paypal'),(453,'app','Debitcard'),(454,'app','Creditcard'),(455,'app','Payment Type...'),(456,'app','Reference...'),(457,'app','Carousal File'),(458,'app','Export as CSV'),(459,'app','Export as HTML'),(460,'app','Export as PDF'),(461,'app','Export as EXCEL'),(462,'app','Export as TEXT'),(463,'app','Update Costs: ID: '),(464,'app','Daily Costs '),(465,'app','Costs on this day '),(466,'app','View Costs to Include: ID '),(467,'app','Costs to Include '),(468,'app','Are you sure you want to delete id? '),(469,'app','Paid in Full'),(470,'app','Unpaid in Full'),(471,'app','Category '),(472,'app','Subcategory '),(473,'app','Create Daily Cost'),(474,'app','Daily Cost'),(475,'app','Copy Costs to Daily Costs'),(476,'app','Use the checkbox column below to copy complete lists with paid reset to 0 for each item.'),(477,'app','(Ticked) Copy'),(478,'app','Cost Id...'),(479,'app','Paid to date'),(480,'app','Monthly Revenue'),(481,'app','Total'),(482,'app','Owed'),(483,'app','Unpaid'),(484,'app','Ignore'),(485,'app','Create Cost Subcategory'),(486,'app','Cost Subcategory'),(487,'app','Update Cost Subcategory '),(488,'app','Cost code'),(489,'app','Cost codes'),(490,'app','None'),(491,'app','Transfer House Numbers to a Street that has its Sequence or Order set to 500.'),(492,'app','Current Selected Street '),(493,'app','has a sequence value of 500 and is therefore selected for house number transfers.'),(494,'app',' to view.'),(495,'app','Have you setup your Postcodes and Streets? No street has their Order or Sequence ,ie. order of cleaning completion, set to 500. Identify a street and set its Order or Sequence to 500.'),(496,'app',' to go to street.'),(497,'app','Available House Numbers'),(498,'app','Selected House Numbers'),(499,'app','Select your house numbers that you wish to include in your current street using the list on the left.'),(500,'app',' Multiselect by holding down the Ctrl Key and press the single arrow.<br><br>The sequence or order value for the specific street must be set to the maximum of 500. Do not forget to change the sequence or order number back to the default of 99 when you are finished using this facility.'),(501,'app','Create Employee'),(502,'app','Employees'),(503,'app','Update Employee '),(504,'app','Single'),(505,'app','Divorced'),(506,'app','Married'),(507,'app','Male'),(508,'app','Female'),(509,'app','Paid per hour - Not Salaried'),(510,'app','Not paid per hour - Salaried'),(511,'app','Salaried Flag'),(512,'app','Not current'),(513,'app','Current'),(514,'app','Current Flag'),(515,'app','Create Gocardlessinvoice'),(516,'app','Gocardlessinvoices'),(517,'app','Update Gocardlessinvoice'),(518,'app',' Invoices'),(519,'app','Upload Importfile'),(520,'app','Import Houses'),(521,'app','Import Houses / Street /Postcode'),(522,'app','Step 1: Download template '),(523,'app','Compressed file'),(524,'app','Download a Microsoft Spreadsheet xls, Microsoft xlsx file and an Openoffice ods file contained within  a zip file that will be used to import houses within a street. Column 1: Firstname, Column 2: Surname, Column 3: Contactmobile, Column 4: Specialrequest, Column 5: Listprice, Column 6: Frequency, Column 7: Housenumber eg. 001, Column 8: Postcode first half, Column 9: Post code second half, Column 10: Email'),(525,'app','Get a copy of '),(526,'app','Download a copy of winrar in order to unzip the rar file to your left.'),(527,'app','Step 2 '),(528,'app','Upload Import File. This will appear in the table below once uploaded.'),(529,'app','Upload the downloaded file that you modified. This file is to be used to import houses within a street. xls, xlsx, and openoffice ods files may be used. Column 1: Firstname, Column 2: Surname, Column 3: Contactmobile, Column 4: Specialrequest, Column 5: Listprice, Column 6: Frequency, Column 7: Housenumber eg. 001, Column 8: Postcodefirsthalf, Column 9: Postcodesecondhalf, Column 10: Email'),(530,'app','Step 3: Select Postcode '),(531,'app','Create a Postcode'),(532,'app','--- Postcode ---'),(533,'app','Step 4: Select Street '),(534,'app','...Street...'),(535,'app','Step 5: '),(536,'app','Select one of your files below. The list of houses will be copied into the street that you have selected. A successful import will redirect you to your houses list and display the new houses under the street that you selected.  '),(537,'app','Import selected File below. (ticked)'),(538,'app','no filename'),(539,'app','Create Instruction'),(540,'app','Instructions'),(541,'app','Update Instruction '),(542,'app','Include snap shots, pdf, xlsx, ods file types from your phone here. These can be selected as a dropdown list under Daily Cleans or under Daily Costs.'),(543,'app','House 2 house'),(544,'app','Settings'),(545,'app','Texting - Messages'),(546,'app','Message Log'),(547,'app','Employee'),(548,'app','Tax Codes'),(549,'app','Used to categorize revenue and expenses. These codes are NOT used in any VAT calculations. In fact there are no vat calculations therefore figures that you enter eg. under Daily Cleans or House must be inclusive of vat.'),(550,'app','Images / Files Upload'),(551,'app','Instruction'),(552,'app','Revenue'),(553,'app','Quick Build'),(554,'app','Acknowledge Mandates ('),(555,'app','Daily Cleans'),(556,'app','Expenses'),(557,'app','Database'),(558,'app','Install database'),(559,'app','Non-administrators ie. managers can install their own database once they have logged in.'),(560,'app','Backup database'),(561,'app','Users with the Backup database permission can backup their own database.'),(562,'app','Admin'),(563,'app','Role Management (Admin)'),(564,'app','Update Admin'),(565,'app','Permission Management (Admin)'),(566,'app','Conditions/Rules Management (Admin)'),(567,'app','User Management (Support and Admin)'),(568,'app','Delete a User'),(569,'app','Download User Data'),(570,'app','Change User Name or Email Address'),(571,'app','User forgot their password'),(572,'app','Signup a User'),(573,'app','Quick Note'),(574,'app',' Subscription Active'),(575,'app',' Subscription Details'),(576,'app','Details of your Agreement including cycles, left, balance.'),(577,'app','Contact Support to setup an account either Manager or Employee.'),(578,'app','Support will assign a role and database to you.'),(579,'app',' Subscription Suspended'),(580,'app','Re-activate your subscription by clicking the button below.'),(581,'app','Reactivate Paypal Subscription'),(582,'app','Reactivating your subscription with '),(583,'app',' will allow you access to your data again.'),(584,'app','Login'),(585,'app','Forum'),(586,'app','Logout ('),(587,'app','House 2 house  - All rights reserved'),(588,'app','Online ~ Regular Services Management Software'),(589,'app','OK. Got it'),(590,'app','We use cookies on this website to help us offer you the best online experience. By continuing to use our website, you are agreeing to our use of cookies and to our privacy policy.'),(591,'app','Create Legal'),(592,'app','Legals'),(593,'app','Update Legal '),(594,'app','Create Messagelog'),(595,'app','Message logs'),(596,'app','Message log'),(597,'app','Update Messagelog: {nameAttribute}'),(598,'app','Messagelogs'),(599,'app','Are you sure you want to delete this item ?'),(600,'app','Save'),(601,'app','Create Messaging'),(602,'app','Messagings'),(603,'app','Create Message'),(604,'app','Update Messaging '),(605,'app','Messaging'),(606,'app','Create Paymentrequest'),(607,'app','Payment requests'),(608,'app','Paymentrequests'),(609,'app','Update Payment Request'),(610,'app','Payment Requests'),(611,'app','Create Paypal Agreement'),(612,'app','Paypal Agreements'),(613,'app','Update Paypal Agreement '),(614,'app','Create House'),(615,'app','Houses'),(616,'app','Company Name and Mobile Number'),(617,'app','Filename'),(618,'app','Frequency'),(619,'app','If empty ... Create House and set frequency eg. monthly, weekly of the individual house.'),(620,'app','Mandate Approved Customers'),(621,'app','This customer number appears on'),(622,'app','and indicates that the customer has approved the mandate that you sent to them.'),(623,'app','Have you setup your Postcode and street?'),(624,'app','Have you created your Daily Clean?'),(625,'app','Copy Ticked to: '),(626,'app','Daily Cleans Date: '),(627,'app','Goto Daily Cleans'),(628,'app','This will take you back to your Daily Cleans.'),(629,'app','Clicking here will send an email to this customer, that you have ticked, with a link to the direct debit mandate created by the Gocardless API. The customer must approve this mandate within 30 minutes otherwise you will have to resend. The email will have a link to the '),(630,'app',' website. Once the customer has entered their bank details on the '),(631,'app',' website they will be redirected to this website to a Thank you for approval message. You will then have to acknowledge this mandate by pressing the button above House on the main menu.  Only then will you be able to send Payment Requests via email with the adjacent button: An email will be sent to the customer with a breakdown of the payment. This email will be followed up with an email from'),(632,'app','Email Direct Debit Mandate Link to Customer for their approval. (tick)'),(633,'app','Clicking here will send an email to this customer, that you have ticked, informing them that you are requesting payment. Payment amounts must not be less than &pound 1.'),(634,'app','Email Payment Request to Customer. (tick)'),(635,'app','Id ...'),(636,'app','Special Request ...'),(637,'app','Post Code'),(638,'app','First Clean Date'),(639,'app','History'),(640,'app','Update House '),(641,'app','View House'),(642,'app','Not applicable'),(643,'app','House No '),(644,'app','View or Update or Delete'),(645,'app','Record as paid.'),(646,'app','Clean Date of Daily Clean'),(647,'app','Sales Order Header'),(648,'app','Sales Order Detail'),(649,'app','Pay off all (ticked)'),(650,'app','Not Applicable'),(651,'app','Select ...'),(652,'app','Houses Import'),(653,'app','Create Postcodes'),(654,'app','Postcodes'),(655,'app','Find Postcode'),(656,'app','Postcode Finder'),(657,'app','Create Postcode'),(658,'app','Previous'),(659,'app','Update Post Codes '),(660,'app','Post Codes'),(661,'app','Create Street'),(662,'app','This is the order in which jobs will be completed. View to set to 500 for Quick Build.'),(663,'app','Area Code'),(664,'app','Street Name '),(665,'app','Map'),(666,'app','Goto Google maps using this address.'),(667,'app','Update Street '),(668,'app','Yes'),(669,'app','No'),(670,'app','Create Quicknote'),(671,'app','Quicknotes'),(672,'app','Quick Notes'),(673,'app','Update Quicknote '),(674,'app','Houses to clean'),(675,'app','daily, clean, daily clean'),(676,'app','Text Paid'),(677,'app','Inform Boss of payment by text'),(678,'app','Price charged per clean'),(679,'app','Prepayment from a previous date. This cannot be edited since it is transferred from a previous date.'),(680,'app','Cash received today for future clean date. Transfer to future date using button above.'),(681,'app','Tips'),(682,'app','All tips.'),(683,'app','Do'),(684,'app','What is to be done. Load your codes under main menu instructions.'),(685,'app','Debt'),(686,'app','Debt from previous cleans not including the current clean.'),(687,'app','Address'),(688,'app','House Mobile'),(689,'app','Use this number to text your customer.'),(690,'app','Use the checkbox column to select all the houses that have been cleaned. All houses are assumed cleaned by default.'),(691,'app','Cleaned (ticked)'),(692,'app','Missed (ticked)'),(693,'app','Use the checkbox column to select all the houses that have not been cleaned. All houses are assumed cleaned by default.'),(694,'app','Not Cleaned (ticked)'),(695,'app','Paid (ticked)'),(696,'app','Unpaid (ticked)'),(697,'app','Add pre payment (ticked) to Paid'),(698,'app','Transfer advance payments (ticked) to future pre-payment'),(699,'app','Create Future Clean'),(700,'app','Date Today'),(701,'app',' +1 Month'),(702,'app','Customers can be sent a direct debit variable mandate to consent to each time you need payment from them.'),(703,'app',' One-off (ticked)'),(704,'app','Add House'),(705,'app','Different message types can be sent to your customer using Twilio, a service that requires a subscription'),(706,'app','Message '),(707,'app','Message ...'),(708,'app','Font Size Adjuster'),(709,'app','Adjust to the required font.'),(710,'app','Adjust font'),(711,'app','Cleaned'),(712,'app','Postcode and Street'),(713,'app','Remind'),(714,'app','Tip - Reduce to 0 if customer cancels'),(715,'app','Paid ...'),(716,'app','Debt that has accumulated from previous cleans not including the current clean.'),(717,'app','Refresh Grid if data entered not displaying.'),(718,'app','Update Houses to Clean ID'),(719,'app','Daily Cleans '),(720,'app','Houses to Clean '),(721,'app',' in '),(722,'app','View House to Clean ID '),(723,'app','Houses to Clean ID '),(724,'app','Postcode Name (Set under Postcode)'),(725,'app','Street Name (Set under Street)'),(726,'app','Sort Order (Set under Street)'),(727,'app','View '),(728,'app','No mobile number'),(729,'app','Copy address to clipboard'),(730,'app','Missed'),(731,'app','Next Month Please'),(732,'app','Fronts Done Only'),(733,'app','Backs Done Only'),(734,'app','Create Daily Clean'),(735,'app','Daily Clean'),(736,'app','Click here to create a shell consisting of the clean date and a job code which is the name of your run. Copy houses from House to this clean date. To replicate this clean date in the future use the Ticked copy button. More than one job code or clean date can be ticked and copied into a new clean date if you are planning to do more than one run on the same day. '),(737,'app','Copy Houses to Daily Clean'),(738,'app','This will take you to House. Once you have entered your details for the householder you can copy the house across to your clean date.'),(739,'app','If you tick one of the previous cleans, the detail will be copied to a date roughly two months ahead of its date. Adjust the date once copied to get a more realistic date.'),(740,'app',' + 2 month'),(741,'app','If you tick one of the previous cleans, the detail will be copied to a date roughly one month ahead of its date. Adjust the date once copied to get a more realistic date.'),(742,'app','  + 1 month'),(743,'app','If you tick one of the previous cleans, the detail will be copied to a date roughly two weeks ahead of its date. Adjust the date once copied to get a more realistic date.'),(744,'app',' + fortnight / + 2 weeks'),(745,'app','If you tick one of the previous cleans, the detail will be copied to a date roughly one week ahead of its date. Adjust the date once copied to get a more realistic date.'),(746,'app',' + 1 week'),(747,'app','If you tick one of the previous cleans, the detail will be copied to a date identical to todays date.'),(748,'app','Using todays date'),(749,'app','Cleans'),(750,'app','Job Code ...'),(751,'app','From Date ...'),(752,'app','Advance Payment'),(753,'app','Previous Payment'),(754,'app','Update Daily Clean '),(755,'app','Telephone number of Boss obtained from Company settings...telephone.'),(756,'app','Create Session'),(757,'app','Sessions'),(758,'app','Details'),(759,'app','Update Session '),(760,'app','Create Sessiondetail'),(761,'app','Session Details'),(762,'app','Update Session Detail '),(763,'app','Session'),(764,'app','About'),(765,'app','This is the About page. You may modify the following file to customize its content'),(766,'app','Cancelled'),(767,'app','Your payment has been cancelled. Please try again.'),(768,'app','Integrity constraint has occurred.'),(769,'app','Method not allowed'),(770,'app','Method not allowed: Http Exception'),(771,'app','Maintenance'),(772,'app','This site is under maintenance. You may modify the following file to customize its content'),(773,'app','Create Tax'),(774,'app','Taxes'),(775,'app','Update Tax '),(776,'pluto','Available'),(777,'pluto','Selected'),(778,'pluto','Show all'),(779,'pluto','Filter'),(780,'pluto','Move selected'),(781,'pluto','Move all'),(782,'pluto','Remove selected'),(783,'pluto','Remove all'),(784,'pluto','Showing all {0}'),(785,'pluto','<span class=\'text-dark bg-warning\'>Filtered</span> {0} from {1}'),(786,'pluto','Empty list'),(787,'app','Those costs that were checked or ticked have been copied to Costs: {0}'),(788,'app','Expenditure: {0}/{1}: Amount:'),(789,'app','You do not have permission to create a tax code.'),(790,'app','You do not have permission to update a tax code.'),(791,'app','You do not have permission to delete a tax code.'),(792,'app','First delete Daily cleans or costs that this tax code has been linked to then you will be able to delete this tax code.'),(793,'app','eg. Labour'),(794,'app','Cost End date'),(795,'app','Update Cost Codes '),(796,'app','Cost Codes'),(797,'app','Cost Sub Code'),(798,'app','Select your filename that you uploaded under import houses  '),(799,'app','You do not have permission to translate this package into a language of your choice. Ask your Administrator for the Google Translate permission and you will be able to multi select which sentences you want Google to translate.'),(800,'app','You have not setup the filename and path of your JSON file that you downloaded from Google Translate'),(801,'app','filename and path with the quotes and with forward slashes eg. \"c:/path/filename.json\"'),(802,'app','Google Translate'),(803,'app','English ->  Your Language. Set your JSON file name and path that you downloaded from Gooogle Translate in Company and ensure that your administrator has given you the Google Translate permission. '),(804,'app','Your PHP version {0} is lower than the required 7.1'),(805,'app','Your PHP version {0} is higher than the minimum of 7.1'),(806,'app','Your google translate JSON file is set under Settings...Company and exists at google_credential_fil'),(807,'app','GOOGLE APPLICATION CREDENTIALS eten'),(808,'app','Your Google Credential setting under Settings...Company has not been set.'),(809,'app','Your Google Credential Filename and path has been set under Settings...Company  but the file itself does not exist. Include quotes and forward slashes.'),(810,'app','Translated');
/*!40000 ALTER TABLE `source_message` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `source_message` with 810 row(s)
--

--
-- Table structure for table `user`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_hash` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blocked_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lastlogin_at` timestamp NULL DEFAULT NULL,
  `login_count` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `token` (`token`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `user` VALUES (1,'rossaddison','ZuMcndJCEwVulT2g7lzn8SrK6Vofik18','$2y$13$TjanwAT7nNo0vKbeGD/bY.P7Vhm4Peo/fJO4iJr5zl1S30WPG/ZgC',NULL,'ross.addison@bbqq.co.uk',3,'2020-04-17 17:28:38','2020-04-17 17:29:04',NULL,NULL,'2020-05-06 01:01:05',9);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `user` with 1 row(s)
--

--
-- Table structure for table `works_carousal`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_carousal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_source_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_web_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fontcolor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_carousal`
--

LOCK TABLES `works_carousal` WRITE;
/*!40000 ALTER TABLE `works_carousal` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_carousal` VALUES (1,'backupcodepackagist.png','le2NcU4likDM11WK5gZQ_XTKkf_JNlTV.png','Backupcodepackagist','Backupcodepackagist','Backupcodepackagist','black');
/*!40000 ALTER TABLE `works_carousal` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_carousal` with 1 row(s)
--

--
-- Table structure for table `works_company`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_street` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_area1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_area2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_areacode` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_website_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twilio_telephone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finyear_start_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finyear_end_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corp_tax_duedate` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_regno` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_no` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_reg_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_reg_no` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_expiry_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt2_reg_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt2_reg_no` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt2_expiry_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sic_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sic_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sic2_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sic2_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesorderheader_excludefullypaid` tinyint(1) NOT NULL DEFAULT '0',
  `costheader_excludefullypaid` tinyint(1) NOT NULL DEFAULT '0',
  `homepage` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gc_accesstoken` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gc_live_or_sandbox` enum('SANDBOX','LIVE') COLLATE utf8mb4_unicode_ci DEFAULT 'SANDBOX',
  `smtp_transport_host` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_transport_username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_transport_password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_transport_port` int(11) DEFAULT NULL,
  `smtp_transport_encryption` enum('','null','tls','ssl') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tls',
  `google_translate_json_filename_and_path` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_prefix` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_suffix` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_company`
--

LOCK TABLES `works_company` WRITE;
/*!40000 ALTER TABLE `works_company` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_company` VALUES (1,'Your Company Name','','','','','','','','','','','','','','','','','','','','','','','','',0,0,'','','SANDBOX','','','',NULL,'tls','\"C:/wamp64/bin/php/php7.4.4/google.json\"',NULL,NULL,NULL);
/*!40000 ALTER TABLE `works_company` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_company` with 1 row(s)
--

--
-- Table structure for table `works_cost`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costnumber` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frequency` enum('Daily','Weekly','Fortnightly','Monthly','Every two months','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `listprice` decimal(7,2) NOT NULL,
  `costcategory_id` int(11) NOT NULL,
  `costsubcategory_id` int(11) NOT NULL,
  `costcodefirsthalf` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costcodesecondhalf` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coststartdate` timestamp NULL DEFAULT NULL,
  `costenddate` date DEFAULT '2099-12-31',
  `discontinueddate` timestamp NULL DEFAULT NULL,
  `modifieddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cost_costsubcategory_idx` (`costsubcategory_id`),
  KEY `costsubcategory_id` (`costsubcategory_id`),
  KEY `costcategory_id` (`costcategory_id`),
  CONSTRAINT `fk_works_cost_costcategory_id` FOREIGN KEY (`costcategory_id`) REFERENCES `works_costcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_works_cost_costsubcategory_id` FOREIGN KEY (`costsubcategory_id`) REFERENCES `works_costsubcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_cost`
--

LOCK TABLES `works_cost` WRITE;
/*!40000 ALTER TABLE `works_cost` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_cost` VALUES (1,'Cost description','1001','Monthly',5.00,1,1,'erqe','ada','2020-04-16 23:00:00','2099-12-31','2020-04-16 23:00:00','2020-04-17 20:02:19'),(2,'Cost2 Description','002','Monthly',8.00,1,1,'SUB','002','2020-04-17 23:00:00','2099-12-31','2020-04-17 23:00:00','2020-04-18 15:26:13'),(3,'Cost test 3','005','Daily',10.00,1,1,'SUB','001','2020-04-19 23:00:00','2099-12-31','2020-04-19 23:00:00','2020-04-20 13:03:03');
/*!40000 ALTER TABLE `works_cost` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_cost` with 3 row(s)
--

--
-- Table structure for table `works_costcategory`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_costcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` int(2) NOT NULL,
  `modifieddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tax_id` (`tax_id`),
  CONSTRAINT `fk_works_costcategory_tax_id` FOREIGN KEY (`tax_id`) REFERENCES `works_tax` (`tax_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_costcategory`
--

LOCK TABLES `works_costcategory` WRITE;
/*!40000 ALTER TABLE `works_costcategory` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_costcategory` VALUES (1,'Cost code ',NULL,1,'2020-04-17 19:59:36');
/*!40000 ALTER TABLE `works_costcategory` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_costcategory` with 1 row(s)
--

--
-- Table structure for table `works_costdetail`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_costdetail` (
  `cost_header_id` int(11) NOT NULL,
  `cost_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `paymenttype` enum('Cash','Cheque','Paypal','Debitcard','Creditcard','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentreference` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nextcost_date` date NOT NULL,
  `costcategory_id` int(11) NOT NULL,
  `costsubcategory_id` int(11) NOT NULL,
  `cost_id` int(11) NOT NULL,
  `carousal_id` int(11) DEFAULT NULL,
  `order_qty` int(11) NOT NULL DEFAULT '1',
  `unit_price` decimal(9,2) NOT NULL,
  `line_total` int(11) NOT NULL,
  `paid` decimal(9,2) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cost_detail_id`),
  UNIQUE KEY `cost_detail_id` (`cost_detail_id`),
  KEY `fk_costdetail_costheader_idx` (`cost_header_id`),
  KEY `fk_costdetail_cost_idx` (`cost_id`),
  KEY `nextcost_date` (`nextcost_date`),
  KEY `cost_header_id` (`cost_header_id`),
  KEY `cost_header_detail_id_1` (`cost_detail_id`),
  KEY `fk_works_costdetail_carousal_id` (`carousal_id`),
  CONSTRAINT `fk_works_costdetail_carousal_id` FOREIGN KEY (`carousal_id`) REFERENCES `works_carousal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_works_costdetail_cost_header_id` FOREIGN KEY (`cost_header_id`) REFERENCES `works_costheader` (`cost_header_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_works_costdetail_cost_id` FOREIGN KEY (`cost_id`) REFERENCES `works_cost` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_costdetail`
--

LOCK TABLES `works_costdetail` WRITE;
/*!40000 ALTER TABLE `works_costdetail` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_costdetail` VALUES (1,1,'Debitcard','kjkkkddd','2020-05-18',1,1,2,NULL,1,9.00,8,9.00,'2020-04-18 23:52:53'),(1,2,'Paypal','ddddd','2020-05-18',1,1,1,NULL,1,5.00,5,5.00,'2020-04-18 23:52:53');
/*!40000 ALTER TABLE `works_costdetail` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_costdetail` with 2 row(s)
--

--
-- Table structure for table `works_costheader`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_costheader` (
  `cost_header_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusfile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL,
  `cost_date` date NOT NULL,
  `sub_total` decimal(7,2) DEFAULT NULL,
  `tax_amt` decimal(7,2) DEFAULT NULL,
  `total_due` decimal(7,2) DEFAULT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cost_header_id`),
  KEY `fk_costheader_employee_idx` (`employee_id`),
  CONSTRAINT `fk_works_costheader_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `works_employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_costheader`
--

LOCK TABLES `works_costheader` WRITE;
/*!40000 ALTER TABLE `works_costheader` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_costheader` VALUES (1,'DC1','FF',1,'2020-04-16',0.00,0.00,0.00,'2020-04-17 20:04:21');
/*!40000 ALTER TABLE `works_costheader` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_costheader` with 1 row(s)
--

--
-- Table structure for table `works_costsubcategory`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_costsubcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `costcategory_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modifieddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_costsubcategory_costcategory_idx` (`costcategory_id`),
  CONSTRAINT `fk_works_costsubcategory_costcategory_id` FOREIGN KEY (`costcategory_id`) REFERENCES `works_costcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_costsubcategory`
--

LOCK TABLES `works_costsubcategory` WRITE;
/*!40000 ALTER TABLE `works_costsubcategory` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_costsubcategory` VALUES (1,1,'Name','2020-04-17 20:00:37');
/*!40000 ALTER TABLE `works_costsubcategory` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_costsubcategory` with 1 row(s)
--

--
-- Table structure for table `works_development`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_development` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_development`
--

LOCK TABLES `works_development` WRITE;
/*!40000 ALTER TABLE `works_development` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `works_development` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_development` with 0 row(s)
--

--
-- Table structure for table `works_employee`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nationalinsnumber` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_telno` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL DEFAULT '1980-01-01',
  `maritalstatus` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hiredate` date NOT NULL DEFAULT '1980-01-01',
  `salariedflag` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacationhours` int(11) NOT NULL,
  `sickleavehours` int(11) NOT NULL,
  `currentflag` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modifieddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nationalinsnumber` (`nationalinsnumber`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_employee`
--

LOCK TABLES `works_employee` WRITE;
/*!40000 ALTER TABLE `works_employee` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_employee` VALUES (1,'aaa','77777777777','Title','2020-04-10','Single','Male','2020-04-02','Paid per hour - Not Salaried',0,0,'','2020-04-17 18:16:07'),(2,'qwerqwerq','34555555555','bbb','2020-04-01','Single','Male','2020-04-08','Not paid per hour - Salaried',0,0,'Current','2020-04-24 18:27:13');
/*!40000 ALTER TABLE `works_employee` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_employee` with 2 row(s)
--

--
-- Table structure for table `works_gocardless_invoice`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_gocardless_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoicenumber` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `payment_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `fk_works_gocardless_invoice_product_id` FOREIGN KEY (`product_id`) REFERENCES `works_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_gocardless_invoice`
--

LOCK TABLES `works_gocardless_invoice` WRITE;
/*!40000 ALTER TABLE `works_gocardless_invoice` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `works_gocardless_invoice` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_gocardless_invoice` with 0 row(s)
--

--
-- Table structure for table `works_importhouses`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_importhouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `importfile_source_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importfile_web_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_importhouses`
--

LOCK TABLES `works_importhouses` WRITE;
/*!40000 ALTER TABLE `works_importhouses` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `works_importhouses` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_importhouses` with 0 row(s)
--

--
-- Table structure for table `works_instruction`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_instruction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'E',
  `code_meaning` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `include` tinyint(1) NOT NULL DEFAULT '1',
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_instruction`
--

LOCK TABLES `works_instruction` WRITE;
/*!40000 ALTER TABLE `works_instruction` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_instruction` VALUES (1,'E','Everything',1,'2019-02-08 15:16:55'),(2,'B','Back',0,'2019-02-08 15:52:36'),(3,'F','Front',1,'2019-02-08 15:53:00'),(4,'S','Side',1,'2019-02-08 15:53:21'),(5,'FS','Front and Sides',1,'2019-02-08 15:53:45'),(6,'FB','Front and Back',0,'2019-02-08 15:54:23'),(7,'FBS','Front  Back   Sides',1,'2019-02-08 15:54:55'),(8,'END','Everything Not Door',0,'2019-02-08 15:58:24'),(9,'ED','Everything Especially the Door',1,'2019-02-08 15:59:08'),(10,'ENC','Everything Not Conservatory',1,'2019-12-01 19:20:41'),(11,'EV','Everything Especially  Veluxes',1,'2019-12-01 19:23:37'),(12,'ENV','Everything Not Veluxes',1,'2019-12-01 19:37:56'),(13,'G','Gutters',1,'2019-12-01 19:29:45'),(14,'F','Facias',1,'2019-12-01 19:32:02'),(15,'GF','Gutters and Facias',1,'2019-12-01 19:33:44'),(16,'DNC','Do Not Clean',1,'2019-12-01 19:37:56'),(17,'DNCO','Do Not Clean Owes',1,'2019-12-01 19:37:56'),(18,'DNCNTD','Do Not Clean No Time Today',1,'2019-12-01 19:37:56'),(19,'ePICS','Clean as usual and email photos as evidence of clean from mobilephone.',1,'2019-12-01 19:37:56');
/*!40000 ALTER TABLE `works_instruction` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_instruction` with 19 row(s)
--

--
-- Table structure for table `works_messagelog`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_messagelog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `phoneto` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salesorderdetail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `salesorderdetail_id` (`salesorderdetail_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `fk_works_messagelog_product_id` FOREIGN KEY (`product_id`) REFERENCES `works_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_works_messagelog_salesorderdetail_id` FOREIGN KEY (`salesorderdetail_id`) REFERENCES `works_salesorderdetail` (`sales_order_detail_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_messagelog`
--

LOCK TABLES `works_messagelog` WRITE;
/*!40000 ALTER TABLE `works_messagelog` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `works_messagelog` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_messagelog` with 0 row(s)
--

--
-- Table structure for table `works_messaging`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_messaging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_messaging`
--

LOCK TABLES `works_messaging` WRITE;
/*!40000 ALTER TABLE `works_messaging` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `works_messaging` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_messaging` with 0 row(s)
--

--
-- Table structure for table `works_paymentrequest`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_paymentrequest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_order_detail_id` int(11) NOT NULL,
  `gc_payment_request_id` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `gc_payment_request_id` (`gc_payment_request_id`),
  KEY `sales_order_detail_id` (`sales_order_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_paymentrequest`
--

LOCK TABLES `works_paymentrequest` WRITE;
/*!40000 ALTER TABLE `works_paymentrequest` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `works_paymentrequest` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_paymentrequest` with 0 row(s)
--

--
-- Table structure for table `works_product`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productnumber` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactmobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialrequest` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frequency` enum('Weekly','Fortnightly','Monthly','Every two months','Not applicable') COLLATE utf8mb4_unicode_ci NOT NULL,
  `listprice` decimal(4,2) NOT NULL,
  `productcategory_id` int(11) NOT NULL,
  `productsubcategory_id` int(11) NOT NULL,
  `postcodefirsthalf` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcodesecondhalf` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mandate` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gc_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sellstartdate` timestamp NULL DEFAULT NULL,
  `sellenddate` date DEFAULT '2099-12-31',
  `discontinueddate` timestamp NULL DEFAULT NULL,
  `modifieddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `jobcode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productsubcategory_id` (`productsubcategory_id`),
  KEY `productcategory_id` (`productcategory_id`),
  CONSTRAINT `fk_works_product_productcategory_id` FOREIGN KEY (`productcategory_id`) REFERENCES `works_productcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_works_product_productsubcategory_id` FOREIGN KEY (`productsubcategory_id`) REFERENCES `works_productsubcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_product`
--

LOCK TABLES `works_product` WRITE;
/*!40000 ALTER TABLE `works_product` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_product` VALUES (1,'Firstname','Surname','email@email.com','005','09999999977','fffg','Monthly',0.00,1,1,'','',NULL,NULL,NULL,'2020-04-16 23:00:00','2099-12-31',NULL,'2020-04-17 18:14:20',1,NULL),(2,'Firstname','Surname','email@email.com','007','09999999999','','Monthly',0.00,1,1,'','',NULL,NULL,NULL,'2020-04-16 23:00:00','2099-12-31',NULL,'2020-04-17 18:14:20',1,NULL),(3,'Firstname','Surname','email@email.com','009','09999999999','','Monthly',0.00,1,1,'','',NULL,NULL,NULL,'2020-04-16 23:00:00','2099-12-31',NULL,'2020-04-17 18:14:20',1,NULL),(4,'Four','Four','email@email.com','004','07777777777','','Monthly',10.00,1,1,'G32','6LN',NULL,NULL,NULL,NULL,'2099-12-31',NULL,'2020-04-18 21:21:17',1,NULL);
/*!40000 ALTER TABLE `works_product` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_product` with 4 row(s)
--

--
-- Table structure for table `works_productcategory`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_productcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_id` int(2) NOT NULL,
  `modifieddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tax_id` (`tax_id`),
  CONSTRAINT `fk_works_productcategory_tax_id` FOREIGN KEY (`tax_id`) REFERENCES `works_tax` (`tax_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_productcategory`
--

LOCK TABLES `works_productcategory` WRITE;
/*!40000 ALTER TABLE `works_productcategory` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_productcategory` VALUES (1,'G32 - Carntyne','No description',1,'2020-04-17 17:59:55');
/*!40000 ALTER TABLE `works_productcategory` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_productcategory` with 1 row(s)
--

--
-- Table structure for table `works_productsubcategory`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_productsubcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productcategory_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat_start` double NOT NULL,
  `lng_start` double NOT NULL,
  `lat_finish` double NOT NULL,
  `lng_finish` double NOT NULL,
  `directions_to_next_productsubcategory` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `modifieddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_productsubcategory_productcategory_idx` (`productcategory_id`),
  CONSTRAINT `fk_works_productsubcategory_productcategory_id` FOREIGN KEY (`productcategory_id`) REFERENCES `works_productcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_productsubcategory`
--

LOCK TABLES `works_productsubcategory` WRITE;
/*!40000 ALTER TABLE `works_productsubcategory` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_productsubcategory` VALUES (1,1,'Abbeyhill Street',0,0,0,0,'',500,'2020-04-17 18:02:40',1);
/*!40000 ALTER TABLE `works_productsubcategory` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_productsubcategory` with 1 row(s)
--

--
-- Table structure for table `works_quicknote`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_quicknote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_quicknote`
--

LOCK TABLES `works_quicknote` WRITE;
/*!40000 ALTER TABLE `works_quicknote` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `works_quicknote` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_quicknote` with 0 row(s)
--

--
-- Table structure for table `works_quotation`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postalcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `housenumber` int(11) NOT NULL,
  `streetname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialrequest` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferredquoteamount` int(2) NOT NULL,
  `building` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `windowsnumber` int(2) NOT NULL,
  `regularity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quoteamount` int(2) NOT NULL,
  `acceptedamount` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_quotation`
--

LOCK TABLES `works_quotation` WRITE;
/*!40000 ALTER TABLE `works_quotation` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `works_quotation` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_quotation` with 0 row(s)
--

--
-- Table structure for table `works_salesorderdetail`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_salesorderdetail` (
  `sales_order_id` int(11) NOT NULL,
  `sales_order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `cleaned` enum('Cleaned','Missed','Not cleaned','Fronts Done Only','Backs Done Only') COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_id` int(11) NOT NULL DEFAULT '1',
  `nextclean_date` date NOT NULL,
  `productcategory_id` int(11) NOT NULL,
  `productsubcategory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL DEFAULT '1',
  `pre_payment` decimal(7,2) NOT NULL DEFAULT '0.00',
  `unit_price` decimal(9,2) NOT NULL,
  `line_total` int(11) NOT NULL,
  `paid` decimal(9,2) NOT NULL DEFAULT '0.00',
  `advance_payment` decimal(9,2) NOT NULL DEFAULT '0.00',
  `tip` decimal(7,2) NOT NULL DEFAULT '0.00',
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sales_order_detail_id`),
  UNIQUE KEY `sales_order_detail_id` (`sales_order_detail_id`),
  KEY `fk_salesorderdetail_salesorderheader_idx` (`sales_order_id`),
  KEY `fk_salesorderdetail_product_idx` (`product_id`),
  KEY `nextclean_date` (`nextclean_date`),
  KEY `sales_order_id` (`sales_order_id`),
  CONSTRAINT `fk_works_salesorderdetail_product_id` FOREIGN KEY (`product_id`) REFERENCES `works_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_works_salesorderdetail_sales_order_id` FOREIGN KEY (`sales_order_id`) REFERENCES `works_salesorderheader` (`sales_order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_salesorderdetail`
--

LOCK TABLES `works_salesorderdetail` WRITE;
/*!40000 ALTER TABLE `works_salesorderdetail` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_salesorderdetail` VALUES (1,1,'Cleaned',1,'2020-05-17',1,1,1,1,0.00,0.00,0,0.00,0.00,0.00,'2020-04-17 18:17:21'),(1,2,'Cleaned',1,'2020-05-17',1,1,2,1,0.00,0.00,0,0.00,0.00,0.00,'2020-04-17 18:17:21'),(1,3,'Cleaned',1,'2020-05-17',1,1,3,1,0.00,0.00,0,0.00,0.00,0.00,'2020-04-17 18:17:21'),(1,4,'Cleaned',1,'2020-05-18',1,1,4,1,0.00,10.00,10,0.00,0.00,0.00,'2020-04-18 21:24:26');
/*!40000 ALTER TABLE `works_salesorderdetail` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_salesorderdetail` with 4 row(s)
--

--
-- Table structure for table `works_salesorderheader`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_salesorderheader` (
  `sales_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusfile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `carousal_id` int(11) DEFAULT NULL,
  `clean_date` date NOT NULL,
  `hoursworked` decimal(7,2) NOT NULL DEFAULT '8.00',
  `sub_total` decimal(7,2) DEFAULT NULL,
  `tax_amt` decimal(7,2) DEFAULT NULL,
  `total_due` decimal(7,2) DEFAULT NULL,
  `income_per_hour` decimal(7,2) DEFAULT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sales_order_id`),
  KEY `fk_salesorderheader_employee_idx` (`employee_id`),
  KEY `fx_salesorderheader_carousal_idx` (`carousal_id`),
  CONSTRAINT `fk_works_salesorderheader_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `works_employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_salesorderheader`
--

LOCK TABLES `works_salesorderheader` WRITE;
/*!40000 ALTER TABLE `works_salesorderheader` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_salesorderheader` VALUES (1,'VV',NULL,1,NULL,'2020-04-22',0.00,0.00,0.00,0.00,NULL,'2020-04-17 18:17:03');
/*!40000 ALTER TABLE `works_salesorderheader` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_salesorderheader` with 1 row(s)
--

--
-- Table structure for table `works_tax`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_tax` (
  `tax_id` int(2) NOT NULL AUTO_INCREMENT,
  `tax_type` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_percentage` decimal(10,2) NOT NULL,
  PRIMARY KEY (`tax_id`),
  KEY `tax_id` (`tax_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_tax`
--

LOCK TABLES `works_tax` WRITE;
/*!40000 ALTER TABLE `works_tax` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `works_tax` VALUES (1,'00','Zero',0.00),(2,'01','Standard',0.20),(3,'02','Exempt',0.00),(4,'03','Available',0.00),(5,'04','Available',0.00),(6,'05','Reduced',0.05);
/*!40000 ALTER TABLE `works_tax` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `works_tax` with 6 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Wed, 06 May 2020 13:20:09 +0000
