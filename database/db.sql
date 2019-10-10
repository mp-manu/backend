/*
SQLyog  v13.1.1 (64 bit)
MySQL - 5.7.25 : Database - tech_arsenal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tech_arsenal` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tech_arsenal`;

/*Table structure for table `answer_questions` */

DROP TABLE IF EXISTS `answer_questions`;

CREATE TABLE `answer_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `question` text,
  `answer` varchar(500) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `answer_questions` */

insert  into `answer_questions`(`id`,`service_id`,`question`,`answer`,`username`,`phone`,`type`,`status`) values 
(1,1,'От чего зависит финальная стоимость изделия?','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','','',1,1),
(2,1,'Я из другого города. Возможно ли сделать заказ?','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','','',1,1),
(3,1,'Как мне контролировать ход выполнения заказа?','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','','',1,1),
(4,1,'Может ли быть так, что деталь не будет соответствовать чертежу?','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','','',1,1),
(5,1,'Может ли меняться цена в процессе выполнения заказа?','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','','',1,1);

/*Table structure for table `back_menu` */

DROP TABLE IF EXISTS `back_menu`;

CREATE TABLE `back_menu` (
  `nodeid` int(6) NOT NULL AUTO_INCREMENT,
  `parentnodeid` int(6) NOT NULL,
  `nodeshortname` varchar(50) NOT NULL,
  `nodename` varchar(100) NOT NULL,
  `nodeurl` varchar(255) NOT NULL,
  `userstatus` varchar(10) NOT NULL DEFAULT 'ALL',
  `nodeaccess` int(1) NOT NULL,
  `nodestatus` int(1) NOT NULL,
  `nodeorder` int(3) NOT NULL,
  `nodefile` varchar(255) DEFAULT NULL,
  `nodeicon` varchar(50) DEFAULT NULL,
  `ishasdivider` enum('no','yes') NOT NULL DEFAULT 'no',
  `hasnotify` enum('no','yes') NOT NULL DEFAULT 'no',
  `notifyscript` varchar(255) DEFAULT '',
  `isforguest` enum('no','yes') DEFAULT 'yes',
  `arrow_tag` varchar(255) DEFAULT NULL,
  `position` enum('left','right','top') DEFAULT NULL,
  PRIMARY KEY (`nodeid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `back_menu` */

insert  into `back_menu`(`nodeid`,`parentnodeid`,`nodeshortname`,`nodename`,`nodeurl`,`userstatus`,`nodeaccess`,`nodestatus`,`nodeorder`,`nodefile`,`nodeicon`,`ishasdivider`,`hasnotify`,`notifyscript`,`isforguest`,`arrow_tag`,`position`) values 
(1,0,'Главная','Главная','/admin','ALL',1,1,1,NULL,'dashboard','no','no','','no','','left'),
(2,0,'Управление элементами','Управление элементами','#','ALL',1,1,2,NULL,'create','no','no','','no','arrow','left'),
(3,0,'Страницы','Страницы','#','ALL',1,1,3,NULL,'dvr','no','no','','no','arrow','left'),
(4,0,'Выход','Выход','/admin/main/logout','ALL',1,1,100,NULL,'directions_walk','no','no','','no',NULL,'left'),
(5,2,'Меню','Меню','/admin/front-menu/index','ALL',1,1,1,NULL,NULL,'no','no','','no',NULL,'left'),
(6,2,'Слайдер','Слайдер','/admin/slider/index','ALL',1,1,1,NULL,NULL,'no','no','','no',NULL,'left'),
(7,3,'Услуги','Услуги','#','ALL',1,1,1,NULL,NULL,'no','no','','yes','arrow','left'),
(8,7,'Управление услугами','Управление услугами','/admin/services','ALL',1,1,0,NULL,NULL,'no','no','','yes',NULL,'left'),
(9,7,'Примеры работ','Примеры работ','/admin/work-results','ALL',1,1,3,NULL,NULL,'no','no','','yes',NULL,'left'),
(10,7,'Прайслист','Прайслист','/admin/price-list','ALL',1,1,4,NULL,NULL,'no','no','','yes',NULL,'left'),
(11,7,'Вопрос-ответ','Вопрос-ответ','/admin/answer-questions','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(12,7,'Доп. информации','Доп. информации','/admin/service-info','ALL',1,1,5,NULL,NULL,'no','no','','yes',NULL,'left'),
(13,3,'Главная страница','Главная страница','#','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(14,3,'Страница контактов','Страница контактов','#','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(15,3,'О компании','О компании','#','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(16,3,'Страница СПАСИБО','Страница СПАСИБО','#','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(17,3,'Страница 404','Страница 404','#','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(18,7,'Процесс работ','Процесс работ','/admin/work-proccess','ALL',1,1,2,NULL,NULL,'no','no','','yes',NULL,'left'),
(19,0,'Организация','Организация','#','ALL',1,1,4,NULL,'location_city','no','no','','yes','arrow','left'),
(20,19,'Реквизиты','Реквизиты','/admin/requisites','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(21,19,'Контакты','Контакты','/admin/requisites','ALL',0,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(22,2,'Настройки и тексты','Настройки и тексты','/settings','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left');

/*Table structure for table `call_request` */

DROP TABLE IF EXISTS `call_request`;

CREATE TABLE `call_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1-active, 2-confirm, 0-denied',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `call_request` */

insert  into `call_request`(`id`,`customer_id`,`status`,`created_at`) values 
(1,1,1,'2019-10-10 12:15:03'),
(2,2,1,'2019-10-10 12:15:41');

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '2-confirmed, 1-active, 0-inactive,',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `contact` */

insert  into `contact`(`id`,`customer_id`,`message`,`status`,`created_at`) values 
(1,4,'my message',1,'2019-10-10 13:07:47'),
(2,5,'mmm',1,'2019-10-10 14:41:24');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `phone_number` varchar(18) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `organization` varchar(500) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL COMMENT '1-active, 0-inactive',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `customers` */

insert  into `customers`(`id`,`name`,`phone_number`,`email`,`organization`,`status`,`created_at`) values 
(1,'M','+7 (999) 999 99 99',NULL,NULL,1,'2019-10-10 12:15:03'),
(2,'+7 (992) 700 10 11','+7 (999) 999 99 99',NULL,NULL,1,'2019-10-10 12:15:41'),
(3,'Manuchehr','+7 (999) 999 99 99',NULL,NULL,1,'2019-10-10 12:16:42'),
(4,'Manuchehr','+7 (922) 222 22 22','manu6699@mail.ru','TexApceNaL',1,'2019-10-10 13:07:47'),
(5,'M','+7 (888) 585 85 85','manu6699@mail.ru','ppp',1,'2019-10-10 14:41:24');

/*Table structure for table `front_menu` */

DROP TABLE IF EXISTS `front_menu`;

CREATE TABLE `front_menu` (
  `nodeid` int(6) NOT NULL AUTO_INCREMENT,
  `parentnodeid` int(6) NOT NULL,
  `nodeshortname` varchar(50) NOT NULL,
  `nodename` varchar(100) NOT NULL,
  `nodeurl` varchar(255) NOT NULL,
  `userstatus` varchar(10) NOT NULL DEFAULT 'ALL',
  `nodeaccess` int(1) NOT NULL,
  `nodestatus` int(1) NOT NULL,
  `nodeorder` int(3) NOT NULL,
  `nodefile` varchar(255) DEFAULT NULL,
  `nodeicon` varchar(50) DEFAULT NULL,
  `ishasdivider` enum('no','yes') NOT NULL DEFAULT 'no',
  `hasnotify` enum('no','yes') NOT NULL DEFAULT 'no',
  `notifyscript` varchar(255) DEFAULT '',
  `isforguest` enum('no','yes') DEFAULT 'yes',
  `arrow_tag` varchar(255) DEFAULT NULL,
  `position` enum('left','right','top') DEFAULT NULL,
  PRIMARY KEY (`nodeid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `front_menu` */

insert  into `front_menu`(`nodeid`,`parentnodeid`,`nodeshortname`,`nodename`,`nodeurl`,`userstatus`,`nodeaccess`,`nodestatus`,`nodeorder`,`nodefile`,`nodeicon`,`ishasdivider`,`hasnotify`,`notifyscript`,`isforguest`,`arrow_tag`,`position`) values 
(1,0,'Услуги','Услуги','#','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,NULL),
(2,0,'О компании','О компании','/page/about','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,NULL),
(3,0,'Контакты','Контакты','/page/contact','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,NULL),
(4,1,'Холодная штамповка','Холодная штамповка','/page/service-cold-stamping','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,NULL),
(5,1,'Гибка металла','Гибка металла','/page/service-metal-bending','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,NULL),
(6,1,'Плазменная резка','Плазменная резка','#','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,NULL),
(7,1,'Порошковая покраска и цинкование','Порошковая покраска и цинкование','#','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,NULL),
(8,1,'Сварочные работы','Сварочные работы','#','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,NULL);

/*Table structure for table `login_details` */

DROP TABLE IF EXISTS `login_details`;

CREATE TABLE `login_details` (
  `login_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_user_id` int(11) NOT NULL,
  `login_status` tinyint(1) NOT NULL DEFAULT '0',
  `login_at` datetime NOT NULL,
  `logout_at` datetime DEFAULT NULL,
  `user_ip_address` varchar(16) NOT NULL,
  PRIMARY KEY (`login_detail_id`),
  KEY `login_user_id` (`login_user_id`),
  CONSTRAINT `login_details_ibfk_1` FOREIGN KEY (`login_user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `login_details` */

insert  into `login_details`(`login_detail_id`,`login_user_id`,`login_status`,`login_at`,`logout_at`,`user_ip_address`) values 
(1,1,1,'2019-10-07 18:13:45',NULL,'127.0.0.1'),
(2,1,1,'2019-10-07 18:15:29',NULL,'127.0.0.1'),
(3,1,1,'2019-10-07 18:15:31',NULL,'127.0.0.1'),
(4,1,1,'2019-10-07 18:15:32',NULL,'127.0.0.1'),
(5,1,1,'2019-10-07 18:15:33',NULL,'127.0.0.1'),
(6,1,1,'2019-10-07 18:15:34',NULL,'127.0.0.1'),
(7,1,1,'2019-10-07 18:15:34',NULL,'127.0.0.1'),
(8,1,1,'2019-10-07 18:15:35',NULL,'127.0.0.1'),
(9,1,1,'2019-10-07 18:16:58',NULL,'127.0.0.1'),
(10,1,1,'2019-10-07 18:17:00',NULL,'127.0.0.1'),
(11,1,1,'2019-10-07 18:18:27',NULL,'127.0.0.1'),
(12,1,1,'2019-10-07 18:20:27',NULL,'127.0.0.1'),
(13,1,1,'2019-10-07 18:24:14',NULL,'127.0.0.1'),
(14,1,1,'2019-10-07 18:24:30',NULL,'127.0.0.1'),
(15,1,1,'2019-10-07 20:09:22',NULL,'127.0.0.1'),
(16,1,1,'2019-10-07 23:31:59',NULL,'127.0.0.1'),
(17,1,1,'2019-10-07 23:37:22',NULL,'127.0.0.1'),
(18,1,1,'2019-10-07 23:38:32',NULL,'127.0.0.1'),
(19,1,1,'2019-10-07 23:42:26',NULL,'127.0.0.1'),
(20,1,1,'2019-10-09 00:54:11',NULL,'127.0.0.1'),
(21,1,1,'2019-10-09 00:56:06',NULL,'127.0.0.1'),
(22,1,1,'2019-10-09 08:09:30',NULL,'127.0.0.1'),
(23,1,1,'2019-10-09 08:09:49',NULL,'127.0.0.1'),
(24,1,1,'2019-10-09 15:14:33',NULL,'127.0.0.1'),
(25,1,1,'2019-10-10 12:33:04',NULL,'127.0.0.1');

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values 
('m000000_000000_base',1570448170),
('m150227_114524_init',1570695247),
('m161109_104201_rename_setting_table',1570695247),
('m170323_102933_add_description_column_to_setting_table',1570695247),
('m170413_125133_rename_date_columns',1570695247);

/*Table structure for table `order_by_drawing` */

DROP TABLE IF EXISTS `order_by_drawing`;

CREATE TABLE `order_by_drawing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `file` varchar(500) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1-active, 2-confirm, 0-denied',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `order_by_drawing` */

insert  into `order_by_drawing`(`id`,`customer_id`,`file`,`status`,`created_at`) values 
(1,3,'detail.png',1,'2019-10-10 12:16:42');

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `pages` */

insert  into `pages`(`id`,`name`,`description`,`status`) values 
(1,'Главная страница',NULL,1),
(2,'Услуги',NULL,1),
(3,'Контакты',NULL,1),
(4,'О компании',NULL,1),
(5,'Как мы работаем',NULL,1),
(6,'Страница 404',NULL,1),
(7,'Страница СПАСИБО',NULL,1);

/*Table structure for table `price_list` */

DROP TABLE IF EXISTS `price_list`;

CREATE TABLE `price_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `signature` varchar(200) DEFAULT NULL,
  `depth` double(6,2) DEFAULT NULL,
  `length` int(6) DEFAULT NULL,
  `deadline` varchar(15) DEFAULT NULL COMMENT 'Days',
  `description` varchar(500) DEFAULT NULL,
  `price` float(11,2) NOT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

/*Data for the table `price_list` */

insert  into `price_list`(`id`,`service_id`,`signature`,`depth`,`length`,`deadline`,`description`,`price`,`type`,`status`) values 
(1,1,'Листы свыше 50 000 м², 5 мм толщина',NULL,NULL,'76-90','Листы свыше 50 000 м², 5 мм толщина',950000.00,1,1),
(2,1,'Листы 20 000 - 50 000 м², 5 мм толщина',NULL,NULL,'76-90','Листы 20 000 - 50 000 м², 5 мм толщина',650000.00,1,1),
(3,1,'Листы 10 000 - 20 000 м², 5 мм толщина',NULL,NULL,'76-90','Листы 10 000 - 20 000 м², 5 мм толщина',450000.00,1,1),
(4,1,'Листы до 10 000 м², 5 мм толщина',NULL,NULL,'76-90','Листы до 10 000 м², 5 мм толщина',450000.00,1,1),
(5,3,'',1.00,100,'','',100.00,2,1),
(6,3,'',2.00,100,'','',10.00,2,1),
(7,3,'',3.00,100,'','',10.00,2,1),
(8,3,'',4.00,100,'','',12.00,2,1),
(9,3,'',5.00,100,'','',12.00,2,1),
(10,3,'',5.50,100,'','',13.00,2,1),
(11,3,'',6.00,100,'','',12.00,2,1),
(12,3,NULL,1.00,200,NULL,NULL,12.00,2,1),
(13,3,NULL,2.00,200,NULL,NULL,12.00,2,1),
(14,3,NULL,3.00,200,NULL,NULL,12.00,2,1),
(15,3,NULL,4.00,200,NULL,NULL,14.00,2,1),
(16,3,NULL,5.00,200,NULL,NULL,14.00,2,1),
(17,3,NULL,5.50,200,NULL,NULL,14.00,2,1),
(18,3,NULL,6.00,200,NULL,NULL,16.00,2,1),
(19,3,NULL,1.00,500,NULL,NULL,12.00,2,1),
(20,3,NULL,2.00,500,NULL,NULL,12.00,2,1),
(21,3,NULL,3.00,500,NULL,NULL,12.00,2,1),
(22,3,NULL,4.00,500,NULL,NULL,14.00,2,1),
(23,3,NULL,5.00,500,NULL,NULL,14.00,2,1),
(24,3,NULL,5.50,500,NULL,NULL,14.00,2,1),
(25,3,NULL,6.00,500,NULL,NULL,16.00,2,1),
(26,4,NULL,1.00,100,NULL,NULL,22.00,2,1),
(27,4,NULL,2.00,100,NULL,NULL,10.00,2,1),
(28,4,NULL,3.00,100,NULL,NULL,10.00,2,1),
(29,4,NULL,4.00,100,NULL,NULL,12.00,2,1),
(30,4,NULL,5.00,100,NULL,NULL,12.00,2,1),
(31,4,NULL,5.50,100,NULL,NULL,13.00,2,1),
(32,4,NULL,6.00,100,NULL,NULL,12.00,2,1),
(33,4,NULL,1.00,200,NULL,NULL,12.00,2,1),
(34,4,NULL,2.00,200,NULL,NULL,12.00,2,1),
(35,4,NULL,3.00,200,NULL,NULL,12.00,2,1),
(36,4,NULL,4.00,200,NULL,NULL,14.00,2,1),
(37,4,NULL,5.00,200,NULL,NULL,14.00,2,1),
(38,4,NULL,5.50,200,NULL,NULL,14.00,2,1),
(39,4,NULL,6.00,200,NULL,NULL,16.00,2,1),
(40,4,NULL,1.00,500,NULL,NULL,12.00,2,1),
(41,4,NULL,2.00,500,NULL,NULL,12.00,2,1),
(42,4,NULL,3.00,500,NULL,NULL,12.00,2,1),
(43,4,NULL,4.00,500,NULL,NULL,14.00,2,1),
(44,4,NULL,5.00,500,NULL,NULL,14.00,2,1),
(45,4,NULL,5.50,500,NULL,NULL,14.00,2,1),
(46,4,NULL,6.00,500,NULL,NULL,16.00,2,1),
(57,5,NULL,1.00,100,NULL,NULL,10.00,2,1),
(58,5,NULL,2.00,100,NULL,NULL,10.00,2,1),
(59,5,NULL,3.00,100,NULL,NULL,10.00,2,1),
(60,5,NULL,4.00,100,NULL,NULL,12.00,2,1),
(61,5,NULL,5.00,100,NULL,NULL,12.00,2,1),
(62,5,NULL,5.50,100,NULL,NULL,13.00,2,1),
(63,5,NULL,6.00,100,NULL,NULL,12.00,2,1),
(64,5,NULL,1.00,200,NULL,NULL,12.00,2,1),
(65,5,NULL,2.00,200,NULL,NULL,12.00,2,1),
(66,5,NULL,3.00,200,NULL,NULL,12.00,2,1),
(67,5,NULL,4.00,200,NULL,NULL,14.00,2,1),
(68,5,NULL,5.00,200,NULL,NULL,14.00,2,1),
(69,5,NULL,5.50,200,NULL,NULL,14.00,2,1),
(70,5,NULL,6.00,200,NULL,NULL,16.00,2,1),
(71,5,NULL,1.00,500,NULL,NULL,12.00,2,1),
(72,5,NULL,2.00,500,NULL,NULL,12.00,2,1),
(73,5,NULL,3.00,500,NULL,NULL,12.00,2,1),
(74,5,NULL,4.00,500,NULL,NULL,14.00,2,1),
(75,5,NULL,5.00,500,NULL,NULL,14.00,2,1),
(76,5,NULL,5.50,500,NULL,NULL,14.00,2,1),
(77,5,NULL,6.00,500,NULL,NULL,16.00,2,1),
(88,6,NULL,1.00,100,NULL,NULL,10.00,2,1),
(89,6,NULL,2.00,100,NULL,NULL,10.00,2,1),
(90,6,NULL,3.00,100,NULL,NULL,10.00,2,1),
(91,6,NULL,4.00,100,NULL,NULL,12.00,2,1),
(92,6,NULL,5.00,100,NULL,NULL,12.00,2,1),
(93,6,NULL,5.50,100,NULL,NULL,13.00,2,1),
(94,6,NULL,6.00,100,NULL,NULL,12.00,2,1),
(95,6,NULL,1.00,200,NULL,NULL,12.00,2,1),
(96,6,NULL,2.00,200,NULL,NULL,12.00,2,1),
(97,6,NULL,3.00,200,NULL,NULL,12.00,2,1),
(98,6,NULL,4.00,200,NULL,NULL,14.00,2,1),
(99,6,NULL,5.00,200,NULL,NULL,14.00,2,1),
(100,6,NULL,5.50,200,NULL,NULL,14.00,2,1),
(101,6,NULL,6.00,200,NULL,NULL,16.00,2,1),
(102,6,NULL,1.00,500,NULL,NULL,12.00,2,1),
(103,6,NULL,2.00,500,NULL,NULL,12.00,2,1),
(104,6,NULL,3.00,500,NULL,NULL,12.00,2,1),
(105,6,NULL,4.00,500,NULL,NULL,14.00,2,1),
(106,6,NULL,5.00,500,NULL,NULL,14.00,2,1),
(107,6,NULL,5.50,500,NULL,NULL,14.00,2,1),
(108,6,NULL,6.00,500,NULL,NULL,250.00,2,1);

/*Table structure for table `requisites` */

DROP TABLE IF EXISTS `requisites`;

CREATE TABLE `requisites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `legal_address` varchar(250) DEFAULT NULL,
  `mailing_address` varchar(250) DEFAULT NULL,
  `inn` varchar(12) DEFAULT NULL,
  `kpp` varchar(12) DEFAULT NULL,
  `rs` varchar(25) DEFAULT NULL,
  `ks` varchar(25) DEFAULT NULL,
  `okpo` varchar(12) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `requisites` */

insert  into `requisites`(`id`,`legal_address`,`mailing_address`,`inn`,`kpp`,`rs`,`ks`,`okpo`,`status`) values 
(1,'Смоленск, дер. Тепличный Комбинат №1',' Смоленск, дер. Тепличный Комбинат №1',' 7712345678','301012345000','40702810123450101230','30101234500000000225','7712345678',1);

/*Table structure for table `sections` */

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sections` */

/*Table structure for table `service_info` */

DROP TABLE IF EXISTS `service_info`;

CREATE TABLE `service_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `val` varchar(255) NOT NULL,
  `img` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `service_info` */

insert  into `service_info`(`id`,`service_id`,`key`,`val`,`img`,`description`,`status`) values 
(1,1,'advantage','Преимущества способа',NULL,'Штамповка - самый недорогой способ получить множество деталей на 100% соответсвующих чертежу.\r\nДолговечность изделий.\r\nВысокая скорость, большие объемы.',1),
(2,1,'when_you_need','Когда вам нужна штамповка',NULL,'Нужно быстро сделать много деталей по чертежам.\r\nУ вас есть чертежи.\r\nТолщина детали в широкой части не более 5 мм.\r\nВам нужны детали сложных форм с высокой точностью размеров.',1),
(3,1,'our_equipment','Наше оборудование',NULL,'Пресса кривошипные с усилием от 6 до 100 тонн.\r\nПресс ножницы комбинированные.\r\nНожницы гильотинные до 12 мм.',1);

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(150) DEFAULT NULL,
  `description` text,
  `img` varchar(500) NOT NULL DEFAULT 'service-cover.jpg',
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `services` */

insert  into `services`(`id`,`parent_id`,`name`,`alias`,`description`,`img`,`status`) values 
(1,0,'Холодная штамповка','Холодная штамповка','Холодная штамповка позволяет получить под давлением без нагрева разнопрофильные изделия.\r\nПроизводство очень эффективно, так как детали почти не требуют дополнительной обработки и отличаются замечательным внешним видом.\r\nСамо получение происходит в специальном инструменте - штампе.','service_cover_1.jpg',1),
(2,0,'Гибка метала','Гибка метала','В отличие от сварки не увеличивает риск коррозии.\r\nГибку можно применять: на любом металлическом профиле, трубах, листовом металле и стальных листах.','service_cover_2.jpg',1),
(3,2,'Гибка металлопрофиля','Гибка металлопрофиля','Это самый распространённый способ изготовления карнизов, рельс для дверей, оконных откосов, металлических уголков для декорирования помещений, скоб, самых сложных металлических коробов для компьютерной и другой техники и мн. др.','',1),
(4,2,'Гибка труб','Гибка труб','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','',1),
(5,0,'Гибка листового метала','Гибка листового метала','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','',1),
(6,2,'Гибка стальных листов','Гибка стальных листов','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','',1),
(7,0,'Плазменная резка','Плазменная резка','','',1),
(8,0,'Порошковая покраска и цинкование','Порошковая покраска и цинкование','','',1),
(9,0,'Сварочные работы','Сварочные работы','','',1);

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `setting` */

insert  into `setting`(`id`,`type`,`section`,`key`,`value`,`status`,`description`,`created_at`,`updated_at`) values 
(2,'string','Контакты','адресс','Смоленск, дер. Тепличный Комбинат №1',1,'адресс компании',1570700604,1570702057),
(3,'string','Сайт','имя','<i>Тех</i>Арсенал',1,'имя сайта',1570701140,1570702031),
(4,'string','Сайт','описание','Современный подход<br>к холодной штамповке',1,'коротко о сайте',1570702099,1570702099),
(5,'string','Компания','тел','+7 (952) 687-58-04',1,'телефон компании',1570702305,1570702305),
(6,'string','Компания','деятельность','Производим методом холодной штамповки \r\nболее 2000 видов стандартны деталей,\r\n разрабатываем уникальные формы на \r\nзаказ для серийной штамповки.',1,'главная страница - \r\nдеятельность компании',1570702648,1570704077),
(7,'string','Сотрудник','руков_цеха_штамп','Дмитрий Соляник',1,'главная страница - \r\nРуководитель цеха штамповки',1570702781,1570704064),
(8,'string','Текст','слова_руков_цеха_штамп','Самая трудоёмкая часть производства \r\nна заказ - создание оснастки (формы). \r\nНеобходимо точно сделать компьютерный \r\nрасчет формы, а затем выполнить ее в материале. \r\nСтоимость изготовления уникальной оснастки \r\nот 100 000 руб. Затем переходим к серийной штамповке.',1,'главная страница - \r\nСлова руководителя штамповки \r\nна главном странице',1570702966,1570704054),
(9,'string','Должность','руков_цеха_штамп','Руководитель цеха штамповки',1,'главная страница - Руководитель \r\nцеха штамповки',1570703345,1570704043),
(10,'string','Услуги','холодная_штамповка','Холодная штамповка',1,'главная страница - имя услуги',1570703729,1570704026),
(11,'string','Услуги','инфо_об_холод_штамп','Производим детали методом холодной \r\nштамповки по чертежам. \r\nДоводим оснастку до идеальной \r\nформы и соответствия чертежу.',1,'главная страница - информация\r\nоб услуги хол. штамповки',1570704011,1570704017);

/*Table structure for table `slider` */

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `title` varchar(500) DEFAULT NULL COMMENT 'Title',
  `description` varchar(500) DEFAULT NULL COMMENT 'Description',
  `img_url` varchar(500) NOT NULL COMMENT 'Image Url',
  `slide_cover` varchar(500) DEFAULT NULL,
  `is_has_btn` tinyint(1) DEFAULT NULL COMMENT 'Is Has Button',
  `btn_title` varchar(50) DEFAULT NULL COMMENT 'Button Title',
  `btn_link` varchar(500) DEFAULT NULL COMMENT 'Button Link',
  `order` tinyint(2) DEFAULT NULL COMMENT 'Order',
  `access` tinyint(2) NOT NULL DEFAULT '1' COMMENT 'Status',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `slider` */

insert  into `slider`(`id`,`title`,`description`,`img_url`,`slide_cover`,`is_has_btn`,`btn_title`,`btn_link`,`order`,`access`) values 
(1,'Тест ','тест','slide-cover_1.jpg','slide-cover-img-1.png',1,'Заказать по чертежу',NULL,0,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(65) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `user_type` char(2) NOT NULL,
  `is_block` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `secret_key` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_login_id` (`username`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`user_id`,`username`,`user_password`,`email`,`user_type`,`is_block`,`avatar`,`created_at`,`created_by`,`updated_at`,`updated_by`,`secret_key`,`auth_key`,`session_id`) values 
(1,'admin','abcbbfaea4e618fa7f88cb6b47c6969c','admin@polytech.tj','A',0,'prof1.jpg','2017-10-23 11:52:23',1,'2015-05-27 15:56:35',1,NULL,NULL,'ch0vblsusbe4g9muflbej29ihf1sole0'),
(3,'admin2','4297f44b13955235245b2497399d7a93','manu6699@mail.ru','A',0,NULL,'2018-07-30 14:22:25',1,'2015-05-27 15:56:35',1,NULL,NULL,''),
(15,'admin3','4baee7411b65cadc2c33bdc3a3155e06','admin@mail.ru','A',0,NULL,'2015-05-27 15:56:35',1,'2015-05-27 15:56:35',1,NULL,NULL,''),
(16,'admin5','4baee7411b65cadc2c33bdc3a3155e06','admin5@mail.ru','U',0,NULL,'2015-05-27 15:56:35',1,'2015-05-27 15:56:35',1,NULL,NULL,''),
(19,'st15882','4baee7411b65cadc2c33bdc3a3155e06','manu6699@mail.ru','U',0,NULL,'2018-08-06 22:53:55',3,'2018-08-06 22:54:08',1,NULL,NULL,''),
(20,'2','b6d767d2f8ed5d21a44b0e5886680cb9','manu6699@mail.ru','U',0,NULL,'2018-12-08 14:07:45',3,NULL,NULL,NULL,NULL,'');

/*Table structure for table `work_proccess` */

DROP TABLE IF EXISTS `work_proccess`;

CREATE TABLE `work_proccess` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `img` varchar(500) NOT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `work_proccess` */

insert  into `work_proccess`(`id`,`service_id`,`title`,`description`,`img`,`status`) values 
(1,1,'Владимир подготавливает оснастку 190','Владимир подготавливает оснастку 190','work-proccess_1.png',1),
(2,1,'Владимир подготавливает оснастку 11','Владимир подготавливает оснастку 11','work-proccess_2.jpg',1),
(3,1,'Владимир подготавливает оснастку 33','Владимир подготавливает оснастку 33','work-proccess_3.jpg',1),
(4,1,'Владимир подготавливает оснастку 44','Владимир подготавливает оснастку 44','work-proccess_4.jpg',1);

/*Table structure for table `work_results` */

DROP TABLE IF EXISTS `work_results`;

CREATE TABLE `work_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `deadline` varchar(200) DEFAULT NULL,
  `price` varchar(100) NOT NULL,
  `tooked_metall` varchar(20) DEFAULT NULL,
  `img` varchar(500) NOT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `work_results` */

insert  into `work_results`(`id`,`name`,`description`,`deadline`,`price`,`tooked_metall`,`img`,`status`) values 
(1,'100 000 дверных петель для фирмы производителя дверей','Форма петель не типовая,дизайнерская. Поэтому основные трудозатраты - создание форм и оснастка. А дальше дело техники','за 560 часов','700 000 руб','10 тонн','work-result_1.jpg',1),
(2,'100 000 дверных петель для фирмы производителя дверей 2','Форма петель не типовая,дизайнерская. Поэтому основные трудозатраты - создание форм и оснастка. А дальше дело техники','за 560 часов','700 000 руб','10 тонн','work-result_2.jpg',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
