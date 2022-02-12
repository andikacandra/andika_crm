/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 8.0.28-0ubuntu0.20.04.3 : Database - db_smart_01
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_smart_01` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_smart_01`;

/*Table structure for table `tbl_company_size` */

DROP TABLE IF EXISTS `tbl_company_size`;

CREATE TABLE `tbl_company_size` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_company_size` */

insert  into `tbl_company_size`(`id`,`name`) values 
(1,'-'),
(2,'Small (0-50 employees)'),
(3,'Medium (50 - 250 employees)'),
(4,'Large ( > 250 Employees)');

/*Table structure for table `tbl_company_type` */

DROP TABLE IF EXISTS `tbl_company_type`;

CREATE TABLE `tbl_company_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_company_type` */

insert  into `tbl_company_type`(`id`,`name`) values 
(1,'-'),
(2,'Accounting'),
(3,'Airlines / Aviation'),
(4,'Alternative Medicine'),
(5,'Animation'),
(6,'Apparel / Fashion'),
(7,'Architecture / Planning'),
(8,'Arts / Crafts'),
(9,'Automotive'),
(10,'Aviation / Aerospace'),
(11,'Banking / Mortgage'),
(12,'Biotechnology / Greentech'),
(13,'Broadcast Media'),
(14,'Building Materials'),
(15,'Business Supplies / Equipment'),
(16,'Capital Markets / Hedge Fund / Private Equity'),
(17,'Chemicals'),
(18,'Civic / Social Organization'),
(19,'Civil Engineering'),
(20,'Commercial Real Estate'),
(21,'Computer Games'),
(22,'Computer Hardware'),
(23,'Computer Networking'),
(24,'Computer Software / Engineering'),
(25,'Computer / Network Security'),
(26,'Construction'),
(27,'Consumer Electronics'),
(28,'Consumer Goods'),
(29,'Consumer Services'),
(30,'Cosmetics'),
(31,'Dairy'),
(32,'Defense / Space'),
(33,'Design'),
(34,'E - Learning'),
(35,'Education Management'),
(36,'Electrical / Electronic Manufacturing'),
(37,'Entertainment / Movie Production'),
(38,'Environmental Services'),
(39,'Events Services'),
(40,'Executive Office'),
(41,'Facilities Services'),
(42,'Farming'),
(43,'Financial Services'),
(44,'Fine Art'),
(45,'Fishery'),
(46,'Food Production'),
(47,'Food / Beverages'),
(48,'Fundraising'),
(49,'Furniture'),
(50,'Gambling / Casinos'),
(51,'Glass / Ceramics / Concrete'),
(52,'Government Administration'),
(53,'Government Relations'),
(54,'Graphic Design / Web Design'),
(55,'Health / Fitness'),
(56,'Higher Education / Acadamia'),
(57,'Hospital / Health Care'),
(58,'Hospitality'),
(59,'Human Resources / HR'),
(60,'Import / Export'),
(61,'Individual / Family Services'),
(62,'Industrial Automation'),
(63,'Information Services'),
(64,'Information Technology / IT'),
(65,'Insurance'),
(66,'International Affairs'),
(67,'International Trade / Development'),
(68,'Internet'),
(69,'Investment Banking / Venture'),
(70,'Investment Management / Hedge Fund / Private Equity'),
(71,'Judiciary'),
(72,'Law Enforcement'),
(73,'Law Practice / Law Firms'),
(74,'Legal Services'),
(75,'Legislative Office'),
(76,'Leisure / Travel'),
(77,'Library'),
(78,'Logistics / Procurement'),
(79,'Luxury Goods / Jewelry'),
(80,'Machinery'),
(81,'Management Consulting'),
(82,'Maritime'),
(83,'Market Research'),
(84,'Marketing / Advertising / Sales'),
(85,'Mechanical or Industrial Engineering'),
(86,'Media Production'),
(87,'Medical Equipment'),
(88,'Medical Practice'),
(89,'Mental Health Care'),
(90,'Military Industry'),
(91,'Mining / Metals'),
(92,'Motion Pictures / Film'),
(93,'Museums / Institutions'),
(94,'Music'),
(95,'Nanotechnology'),
(96,'Newspapers / Journalism'),
(97,'Non - Profit / Volunteering'),
(98,'Oil / Energy / Solar / Greentech'),
(99,'Online Publishing'),
(100,'Other Industry'),
(101,'Outsourcing / Offshoring'),
(102,'Package / Freight Delivery'),
(103,'Packaging / Containers'),
(104,'Paper / Forest Products'),
(105,'Performing Arts'),
(106,'Pharmaceuticals'),
(107,'Philanthropy'),
(108,'Photography'),
(109,'Plastics'),
(110,'Political Organization'),
(111,'Primary / Secondary Education'),
(112,'Printing'),
(113,'Professional Training'),
(114,'Program Development'),
(115,'Public Relations / PR'),
(116,'Public Safety'),
(117,'Publishing Industry'),
(118,'Railroad Manufacture'),
(119,'Ranching'),
(120,'Real Estate / Mortgage'),
(121,'Recreational Facilities / Services'),
(122,'Religious Institutions'),
(123,'Renewables / Environment'),
(124,'Research Industry'),
(125,'Restaurants'),
(126,'Retail Industry'),
(127,'Security / Investigations'),
(128,'Semiconductors'),
(129,'Shipbuilding'),
(130,'Sporting Goods'),
(131,'Sports'),
(132,'Staffing / Recruiting'),
(133,'Supermarkets'),
(134,'Telecommunications'),
(135,'Textiles'),
(136,'Think Tanks'),
(137,'Tobacco'),
(138,'Translation / Localization'),
(139,'Transportation'),
(140,'Utilities'),
(141,'Venture Capital / VC'),
(142,'Veterinary'),
(143,'Warehousing'),
(144,'Wholesale'),
(145,'Wine / Spirits'),
(146,'Wireless'),
(147,'Writing / Editing');

/*Table structure for table `tbl_lead` */

DROP TABLE IF EXISTS `tbl_lead`;

CREATE TABLE `tbl_lead` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `company_size_id` int DEFAULT NULL,
  `company_type_id` int DEFAULT NULL,
  `address` text,
  `website` varchar(100) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `lead_status_id` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_lead` */

/*Table structure for table `tbl_lead_status` */

DROP TABLE IF EXISTS `tbl_lead_status`;

CREATE TABLE `tbl_lead_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_lead_status` */

insert  into `tbl_lead_status`(`id`,`name`) values 
(1,'-'),
(2,'Haven\'t called yet'),
(3,'Wrong number / not connected'),
(4,'Need to call again'),
(5,'Not qualified'),
(6,'Qualified, but not interested'),
(7,'Qualified'),
(8,'Already our customer');

/*Table structure for table `tbl_product` */

DROP TABLE IF EXISTS `tbl_product`;

CREATE TABLE `tbl_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `price` float(11,2) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_product` */

insert  into `tbl_product`(`id`,`name`,`description`,`price`,`status`) values 
(1,'Internet 10 Mbpss','- Up to 3 users',275000.00,1),
(3,'Internet 20 Mbpss','- Up to 5 devices',375000.00,1),
(4,'Internet 30 Mbpss','- Up to 10 User',500000.00,1);

/*Table structure for table `tbl_quotation_letter` */

DROP TABLE IF EXISTS `tbl_quotation_letter`;

CREATE TABLE `tbl_quotation_letter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `lead_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0=wait, 1=approve, 2=reject',
  `approved_by` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_quotation_letter` */

/*Table structure for table `tbl_quotation_letter_line` */

DROP TABLE IF EXISTS `tbl_quotation_letter_line`;

CREATE TABLE `tbl_quotation_letter_line` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_description` text,
  `product_price` double(11,2) DEFAULT NULL,
  `customer_price` double(11,2) DEFAULT NULL,
  `deal_price` double(11,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_quotation_letter_line` */

/*Table structure for table `tbl_role` */

DROP TABLE IF EXISTS `tbl_role`;

CREATE TABLE `tbl_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_role` */

insert  into `tbl_role`(`id`,`name`,`access`) values 
(1,'Administrator','1,2,3,4,5,6'),
(2,'Manager Marketing','1,4,5'),
(3,'Sales','1,2,3');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_role` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`name`,`email`,`password`,`id_role`) values 
(1,'Administrator','admin@smart.com','21232f297a57a5a743894a0e4a801fc3',1),
(2,'Manager','manager@smart.com','21232f297a57a5a743894a0e4a801fc3',2),
(3,'Sales','sales@smart.com','21232f297a57a5a743894a0e4a801fc3',3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
