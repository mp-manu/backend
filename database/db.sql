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
  `answer` varchar(500) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `answer_questions` */

insert  into `answer_questions`(`id`,`service_id`,`question`,`answer`,`username`,`phone`,`type`,`status`) values 
(1,1,'От чего зависит финальная стоимость изделия?','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','','',1,1),
(2,1,'Я из другого города. Возможно ли сделать заказ?','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','','',1,1),
(3,1,'Как мне контролировать ход выполнения заказа?','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','','',1,1),
(4,1,'Может ли быть так, что деталь не будет соответствовать чертежу?','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','','',1,1),
(5,1,'Может ли меняться цена в процессе выполнения заказа?','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','','',1,1),
(6,1,'213131231321',NULL,'Manuchehr','+7 (999) 999 99 99',2,1),
(7,1,'dawdawdawdwadwa',NULL,'Manuchehr','+7 (999) 999 99 99',2,1),
(8,1,'adwwada',NULL,'asdaw','+7 (999) 999 99 99',2,1),
(9,1,'324242342 qwdwada dwada',NULL,'Manuchehr','+7 (999) 999 99 99',2,1);

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values 
('Администратор','1',1570799169),
('Администратор','22',1570799169),
('Администратор','23',1570870330),
('Администратор','25',1570870330),
('Администратор','26',1570871101);

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values 
('/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/answer-questions/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/answer-questions/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/answer-questions/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/answer-questions/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/answer-questions/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/answer-questions/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/default/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/default/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/depend',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/depend/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/editable/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/editable/answer-question-status',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/editable/chenge-order',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/editable/chenge-slide-access',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/editable/front-menu-access',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/editable/requisites-status',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/editable/section-status',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/editable/service-status',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/editable/work-proccess-status',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/editable/work-result-status',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/front-menu/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/front-menu/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/front-menu/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/front-menu/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/front-menu/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/front-menu/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/image-manager/*',2,NULL,NULL,NULL,1570875945,1570875945),
('/admin/image-manager/create',2,NULL,NULL,NULL,1570875945,1570875945),
('/admin/image-manager/delete',2,NULL,NULL,NULL,1570875945,1570875945),
('/admin/image-manager/edit-setting',2,NULL,NULL,NULL,1570875945,1570875945),
('/admin/image-manager/index',2,NULL,NULL,NULL,1570875945,1570875945),
('/admin/image-manager/update',2,NULL,NULL,NULL,1570875945,1570875945),
('/admin/main/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/main/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/main/login',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/main/logout',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/pages/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/pages/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/pages/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/pages/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/pages/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/pages/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/price-list/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/price-list/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/price-list/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/price-list/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/price-list/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/price-list/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/requisites/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/requisites/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/requisites/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/requisites/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/requisites/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/requisites/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/sections/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/sections/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/sections/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/sections/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/sections/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/sections/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/service-info/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/service-info/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/service-info/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/service-info/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/service-info/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/service-info/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/services/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/services/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/services/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/services/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/services/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/services/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/slider/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/slider/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/slider/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/slider/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/slider/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/slider/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/user/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/user/change-password',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/user/create',2,NULL,NULL,NULL,1570818202,1570818202),
('/admin/user/delete',2,NULL,NULL,NULL,1570818210,1570818210),
('/admin/user/list',2,NULL,NULL,NULL,1570818192,1570818192),
('/admin/user/login-details',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/user/profile',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/user/register',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/user/update',2,NULL,NULL,NULL,1570818204,1570818204),
('/admin/user/view',2,NULL,NULL,NULL,1570818198,1570818198),
('/admin/work-proccess/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/work-proccess/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/work-proccess/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/work-proccess/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/work-proccess/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/work-proccess/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/work-results/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/work-results/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/work-results/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/work-results/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/work-results/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/admin/work-results/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/debug/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/debug/default/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/debug/default/db-explain',2,NULL,NULL,NULL,1570799082,1570799082),
('/debug/default/download-mail',2,NULL,NULL,NULL,1570799082,1570799082),
('/debug/default/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/debug/default/toolbar',2,NULL,NULL,NULL,1570799082,1570799082),
('/debug/default/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/debug/user/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/debug/user/reset-identity',2,NULL,NULL,NULL,1570799082,1570799082),
('/debug/user/set-identity',2,NULL,NULL,NULL,1570799082,1570799082),
('/gii/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/gii/default/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/gii/default/action',2,NULL,NULL,NULL,1570799082,1570799082),
('/gii/default/diff',2,NULL,NULL,NULL,1570799082,1570799082),
('/gii/default/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/gii/default/preview',2,NULL,NULL,NULL,1570799082,1570799082),
('/gii/default/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/gridview/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/gridview/export/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/gridview/export/download',2,NULL,NULL,NULL,1570799082,1570799082),
('/page/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/page/about',2,NULL,NULL,NULL,1570799082,1570799082),
('/page/captcha',2,NULL,NULL,NULL,1570799082,1570799082),
('/page/contact',2,NULL,NULL,NULL,1570799082,1570799082),
('/page/error',2,NULL,NULL,NULL,1570799082,1570799082),
('/page/service-cold-stamping',2,NULL,NULL,NULL,1570799082,1570799082),
('/page/service-metal-bending',2,NULL,NULL,NULL,1570799082,1570799082),
('/page/thanks',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/assignment/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/assignment/assign',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/assignment/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/assignment/remove',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/assignment/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/permission/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/permission/assign',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/permission/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/permission/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/permission/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/permission/remove',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/permission/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/permission/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/role/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/role/assign',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/role/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/role/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/role/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/role/remove',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/role/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/role/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/route/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/route/assign',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/route/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/route/refresh',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/route/remove',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/rule/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/rule/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/rule/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/rule/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/rule/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/rbac/rule/view',2,NULL,NULL,NULL,1570799082,1570799082),
('/request/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/request/contact',2,NULL,NULL,NULL,1570799082,1570799082),
('/request/need-to-call',2,NULL,NULL,NULL,1570799082,1570799082),
('/request/order-by-drawing',2,NULL,NULL,NULL,1570799082,1570799082),
('/request/question',2,NULL,NULL,NULL,1570799082,1570799082),
('/settings/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/settings/default/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/settings/default/create',2,NULL,NULL,NULL,1570799082,1570799082),
('/settings/default/delete',2,NULL,NULL,NULL,1570799082,1570799082),
('/settings/default/edit-setting',2,NULL,NULL,NULL,1570799082,1570799082),
('/settings/default/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/settings/default/update',2,NULL,NULL,NULL,1570799082,1570799082),
('/site/*',2,NULL,NULL,NULL,1570799082,1570799082),
('/site/captcha',2,NULL,NULL,NULL,1570799082,1570799082),
('/site/error',2,NULL,NULL,NULL,1570799082,1570799082),
('/site/index',2,NULL,NULL,NULL,1570799082,1570799082),
('/site/logout',2,NULL,NULL,NULL,1570799082,1570799082),
('Администратор',2,'Доступ администратора',NULL,NULL,1570799133,1570799133),
('Сотрудник',2,'Сотрудник',NULL,NULL,1570872556,1570872556);

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values 
('Администратор','/*'),
('Сотрудник','/*'),
('Администратор','/admin/*'),
('Администратор','/admin/answer-questions/*'),
('Администратор','/admin/answer-questions/create'),
('Администратор','/admin/answer-questions/delete'),
('Администратор','/admin/answer-questions/index'),
('Администратор','/admin/answer-questions/update'),
('Администратор','/admin/answer-questions/view'),
('Администратор','/admin/default/*'),
('Администратор','/admin/default/index'),
('Администратор','/admin/depend'),
('Администратор','/admin/depend/*'),
('Администратор','/admin/editable/*'),
('Администратор','/admin/editable/answer-question-status'),
('Администратор','/admin/editable/chenge-order'),
('Администратор','/admin/editable/chenge-slide-access'),
('Администратор','/admin/editable/front-menu-access'),
('Администратор','/admin/editable/requisites-status'),
('Администратор','/admin/editable/section-status'),
('Администратор','/admin/editable/service-status'),
('Администратор','/admin/editable/work-proccess-status'),
('Администратор','/admin/editable/work-result-status'),
('Администратор','/admin/front-menu/*'),
('Администратор','/admin/front-menu/create'),
('Администратор','/admin/front-menu/delete'),
('Администратор','/admin/front-menu/index'),
('Администратор','/admin/front-menu/update'),
('Администратор','/admin/front-menu/view'),
('Администратор','/admin/image-manager/*'),
('Администратор','/admin/image-manager/create'),
('Администратор','/admin/image-manager/delete'),
('Администратор','/admin/image-manager/edit-setting'),
('Администратор','/admin/image-manager/index'),
('Администратор','/admin/image-manager/update'),
('Администратор','/admin/main/*'),
('Администратор','/admin/main/index'),
('Администратор','/admin/main/login'),
('Администратор','/admin/main/logout'),
('Администратор','/admin/pages/*'),
('Администратор','/admin/pages/create'),
('Администратор','/admin/pages/delete'),
('Администратор','/admin/pages/index'),
('Администратор','/admin/pages/update'),
('Администратор','/admin/pages/view'),
('Администратор','/admin/price-list/*'),
('Администратор','/admin/price-list/create'),
('Администратор','/admin/price-list/delete'),
('Администратор','/admin/price-list/index'),
('Администратор','/admin/price-list/update'),
('Администратор','/admin/price-list/view'),
('Администратор','/admin/requisites/*'),
('Администратор','/admin/requisites/create'),
('Администратор','/admin/requisites/delete'),
('Администратор','/admin/requisites/index'),
('Администратор','/admin/requisites/update'),
('Администратор','/admin/requisites/view'),
('Администратор','/admin/sections/*'),
('Администратор','/admin/sections/create'),
('Администратор','/admin/sections/delete'),
('Администратор','/admin/sections/index'),
('Администратор','/admin/sections/update'),
('Администратор','/admin/sections/view'),
('Администратор','/admin/service-info/*'),
('Администратор','/admin/service-info/create'),
('Администратор','/admin/service-info/delete'),
('Администратор','/admin/service-info/index'),
('Администратор','/admin/service-info/update'),
('Администратор','/admin/service-info/view'),
('Администратор','/admin/services/*'),
('Администратор','/admin/services/create'),
('Администратор','/admin/services/delete'),
('Администратор','/admin/services/index'),
('Администратор','/admin/services/update'),
('Администратор','/admin/services/view'),
('Администратор','/admin/slider/*'),
('Администратор','/admin/slider/create'),
('Администратор','/admin/slider/delete'),
('Администратор','/admin/slider/index'),
('Администратор','/admin/slider/update'),
('Администратор','/admin/slider/view'),
('Администратор','/admin/user/*'),
('Администратор','/admin/user/change-password'),
('Администратор','/admin/user/create'),
('Администратор','/admin/user/delete'),
('Администратор','/admin/user/list'),
('Администратор','/admin/user/login-details'),
('Администратор','/admin/user/profile'),
('Администратор','/admin/user/register'),
('Администратор','/admin/user/update'),
('Администратор','/admin/user/view'),
('Администратор','/admin/work-proccess/*'),
('Администратор','/admin/work-proccess/create'),
('Администратор','/admin/work-proccess/delete'),
('Администратор','/admin/work-proccess/index'),
('Администратор','/admin/work-proccess/update'),
('Администратор','/admin/work-proccess/view'),
('Администратор','/admin/work-results/*'),
('Администратор','/admin/work-results/create'),
('Администратор','/admin/work-results/delete'),
('Администратор','/admin/work-results/index'),
('Администратор','/admin/work-results/update'),
('Администратор','/admin/work-results/view'),
('Администратор','/debug/*'),
('Администратор','/debug/default/*'),
('Администратор','/debug/default/db-explain'),
('Администратор','/debug/default/download-mail'),
('Администратор','/debug/default/index'),
('Администратор','/debug/default/toolbar'),
('Администратор','/debug/default/view'),
('Администратор','/debug/user/*'),
('Администратор','/debug/user/reset-identity'),
('Администратор','/debug/user/set-identity'),
('Администратор','/gii/*'),
('Администратор','/gii/default/*'),
('Администратор','/gii/default/action'),
('Администратор','/gii/default/diff'),
('Администратор','/gii/default/index'),
('Администратор','/gii/default/preview'),
('Администратор','/gii/default/view'),
('Администратор','/gridview/*'),
('Администратор','/gridview/export/*'),
('Администратор','/gridview/export/download'),
('Администратор','/page/*'),
('Администратор','/page/about'),
('Администратор','/page/captcha'),
('Администратор','/page/contact'),
('Администратор','/page/error'),
('Администратор','/page/service-cold-stamping'),
('Администратор','/page/service-metal-bending'),
('Администратор','/page/thanks'),
('Администратор','/rbac/*'),
('Администратор','/rbac/assignment/*'),
('Администратор','/rbac/assignment/assign'),
('Администратор','/rbac/assignment/index'),
('Администратор','/rbac/assignment/remove'),
('Администратор','/rbac/assignment/view'),
('Администратор','/rbac/permission/*'),
('Администратор','/rbac/permission/assign'),
('Администратор','/rbac/permission/create'),
('Администратор','/rbac/permission/delete'),
('Администратор','/rbac/permission/index'),
('Администратор','/rbac/permission/remove'),
('Администратор','/rbac/permission/update'),
('Администратор','/rbac/permission/view'),
('Администратор','/rbac/role/*'),
('Администратор','/rbac/role/assign'),
('Администратор','/rbac/role/create'),
('Администратор','/rbac/role/delete'),
('Администратор','/rbac/role/index'),
('Администратор','/rbac/role/remove'),
('Администратор','/rbac/role/update'),
('Администратор','/rbac/role/view'),
('Администратор','/rbac/route/*'),
('Администратор','/rbac/route/assign'),
('Администратор','/rbac/route/index'),
('Администратор','/rbac/route/refresh'),
('Администратор','/rbac/route/remove'),
('Администратор','/rbac/rule/*'),
('Администратор','/rbac/rule/create'),
('Администратор','/rbac/rule/delete'),
('Администратор','/rbac/rule/index'),
('Администратор','/rbac/rule/update'),
('Администратор','/rbac/rule/view'),
('Администратор','/request/*'),
('Администратор','/request/contact'),
('Администратор','/request/need-to-call'),
('Администратор','/request/order-by-drawing'),
('Администратор','/request/question'),
('Администратор','/settings/*'),
('Администратор','/settings/default/*'),
('Администратор','/settings/default/create'),
('Администратор','/settings/default/delete'),
('Администратор','/settings/default/edit-setting'),
('Администратор','/settings/default/index'),
('Администратор','/settings/default/update'),
('Администратор','/site/*'),
('Администратор','/site/captcha'),
('Администратор','/site/error'),
('Администратор','/site/index'),
('Администратор','/site/logout');

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_rule` */

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `back_menu` */

insert  into `back_menu`(`nodeid`,`parentnodeid`,`nodeshortname`,`nodename`,`nodeurl`,`userstatus`,`nodeaccess`,`nodestatus`,`nodeorder`,`nodefile`,`nodeicon`,`ishasdivider`,`hasnotify`,`notifyscript`,`isforguest`,`arrow_tag`,`position`) values 
(1,0,'Главная','Главная','/admin','ALL',1,1,1,NULL,'dashboard','no','no','','no','','left'),
(2,0,'Управление элементами','Управление элементами','#','ALL',1,1,2,NULL,'create','no','no','','no','arrow','left'),
(3,0,'Страницы','Страницы','#','ALL',1,1,3,NULL,'dvr','no','no','','no','arrow','left'),
(4,0,'Выход','Выход','/admin/main/logout','ALL',1,1,100,NULL,'directions_walk','no','no','','no',NULL,'left'),
(5,2,'Меню','Меню','/admin/front-menu/index','ALL',1,1,1,NULL,NULL,'no','no','','no',NULL,'left'),
(6,2,'Слайдер','Слайдер','/admin/slider/index','ALL',1,1,2,NULL,NULL,'no','no','','no',NULL,'left'),
(7,3,'Услуги','Услуги','#','ALL',1,1,2,NULL,NULL,'no','no','','yes','arrow','left'),
(8,7,'Управление услугами','Управление услугами','/admin/services','ALL',1,1,0,NULL,NULL,'no','no','','yes',NULL,'left'),
(9,7,'Примеры работ','Примеры работ','/admin/work-results','ALL',1,1,3,NULL,NULL,'no','no','','yes',NULL,'left'),
(10,7,'Прайслист','Прайслист','/admin/price-list','ALL',1,1,4,NULL,NULL,'no','no','','yes',NULL,'left'),
(11,7,'Вопрос-ответ','Вопрос-ответ','/admin/answer-questions','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(12,7,'Доп. информации','Доп. информации','/admin/service-info','ALL',1,1,5,NULL,NULL,'no','no','','yes',NULL,'left'),
(13,3,'Главная страница','Главная страница','/admin/sections?SectionsSearch%5Bpage_id%5D=1','ALL',1,1,1,NULL,'arrow','no','no','','yes',NULL,'left'),
(14,3,'Контакты','Контакты','/admin/sections?SectionsSearch%5Bpage_id%5D=3','ALL',1,1,3,NULL,NULL,'no','no','','yes',NULL,'left'),
(15,3,'О компании','О компании','/admin/sections?SectionsSearch%5Bpage_id%5D=4&SectionsSearch%5Btitle%5D=&SectionsSearch%5Balias%5D=&SectionsSearch%5Bdescription%5D=&SectionsSearch%5Btype%5','ALL',1,1,4,NULL,NULL,'no','no','','yes',NULL,'left'),
(16,3,'Страница СПАСИБО','Страница СПАСИБО','/admin/sections?SectionsSearch%5Bpage_id%5D=7','ALL',1,1,5,NULL,NULL,'no','no','','yes',NULL,'left'),
(17,3,'Страница 404','Страница 404','/admin/sections?SectionsSearch%5Bpage_id%5D=6','ALL',1,1,6,NULL,NULL,'no','no','','yes',NULL,'left'),
(18,7,'Процесс работ','Процесс работ','/admin/work-proccess','ALL',1,1,2,NULL,NULL,'no','no','','yes',NULL,'left'),
(19,0,'Организация','Организация','#','ALL',1,1,4,NULL,'location_city','no','no','','yes','arrow','left'),
(20,19,'Реквизиты','Реквизиты','/admin/requisites','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(21,19,'Контакты','Контакты','/admin/requisites','ALL',0,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(22,2,'Настройки текстов','Настройки текстов','/settings','ALL',1,1,10,NULL,NULL,'no','no','','yes',NULL,'left'),
(23,13,'Как мы работаем','Как мы работаем','/admin/how-we-work','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(24,13,'Почему мы','Почему мы','/admin/why-we','ALL',1,1,1,NULL,NULL,'no','no','','yes',NULL,'left'),
(25,2,'Блоки страниц','Раздел страниц','/admin/sections','ALL',1,1,3,NULL,NULL,'no','no','','yes',NULL,'left'),
(26,2,'Фото страниц','Фото страниц','/admin/page-photos','ALL',1,1,4,NULL,NULL,'no','no','','yes',NULL,'left'),
(27,0,'Пользователи','Пользователи','#','ALL',1,1,4,NULL,'person','no','no','','yes','arrow','left'),
(28,27,'Назначения','Назначения','/rbac','ALL',1,1,1,NULL,NULL,'no','no','','yes','',NULL),
(29,27,'Маршруты','Маршруты','/rbac/route','ALL',1,1,2,NULL,NULL,'no','no','','yes',NULL,NULL),
(30,27,'Разрешения','Разрешения','/rbac/permission','ALL',1,1,3,NULL,NULL,'no','no','','yes',NULL,NULL),
(31,27,'Роли','Роли','/rbac/role','ALL',1,1,3,NULL,NULL,'no','no','','yes',NULL,NULL),
(32,27,'Список пользователей','Список пользователей','/admin/user/list','ALL',1,1,0,NULL,NULL,'no','no','','yes',NULL,NULL),
(33,27,'Добавить','Добавить','/admin/user/create','ALL',1,1,0,NULL,NULL,'no','no','','yes',NULL,NULL),
(34,2,'Настройки фото','Настройки фото','/admin/image-manager/index','ALL',1,1,10,NULL,NULL,'no','no','','yes',NULL,'left');

/*Table structure for table `call_request` */

DROP TABLE IF EXISTS `call_request`;

CREATE TABLE `call_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1-active, 2-confirm, 0-denied',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `call_request` */

insert  into `call_request`(`id`,`customer_id`,`status`,`created_at`) values 
(1,1,1,'2019-10-10 12:15:03'),
(2,2,1,'2019-10-10 12:15:41'),
(3,6,1,'2019-10-10 16:51:54'),
(4,7,1,'2019-10-11 00:40:16'),
(5,12,1,'2019-10-11 13:13:03'),
(6,13,1,'2019-10-11 21:16:53');

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '2-confirmed, 1-active, 0-inactive,',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `contact` */

insert  into `contact`(`id`,`customer_id`,`message`,`status`,`created_at`) values 
(1,4,'my message',1,'2019-10-10 13:07:47'),
(2,5,'mmm',1,'2019-10-10 14:41:24'),
(3,8,'my message',1,'2019-10-11 09:08:24'),
(4,9,'my message',1,'2019-10-11 09:09:53'),
(5,10,'my message',1,'2019-10-11 09:10:12'),
(6,11,'my message',1,'2019-10-11 09:10:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `customers` */

insert  into `customers`(`id`,`name`,`phone_number`,`email`,`organization`,`status`,`created_at`) values 
(1,'M','+7 (999) 999 99 99',NULL,NULL,1,'2019-10-10 12:15:03'),
(2,'+7 (992) 700 10 11','+7 (999) 999 99 99',NULL,NULL,1,'2019-10-10 12:15:41'),
(3,'Manuchehr','+7 (999) 999 99 99',NULL,NULL,1,'2019-10-10 12:16:42'),
(4,'Manuchehr','+7 (922) 222 22 22','manu6699@mail.ru','TexApceNaL',1,'2019-10-10 13:07:47'),
(5,'M','+7 (888) 585 85 85','manu6699@mail.ru','ppp',1,'2019-10-10 14:41:24'),
(6,'muzafarov9797','+7 (242) 422 42 42',NULL,NULL,1,'2019-10-10 16:51:54'),
(7,'da','+7 (424) 242 42 42',NULL,NULL,1,'2019-10-11 00:40:16'),
(8,'admin','+7 (314) 343 24 24','manu6699@mail.ru','organization',1,'2019-10-11 09:08:24'),
(9,'admin','+7 (314) 343 24 24','manu6699@mail.ru','organization',1,'2019-10-11 09:09:53'),
(10,'admin','+7 (314) 343 24 24','manu6699@mail.ru','organization',1,'2019-10-11 09:10:12'),
(11,'admin','+7 (314) 343 24 24','manu6699@mail.ru','organization',1,'2019-10-11 09:10:26'),
(12,'adwa','+7 (342) 242 43 24',NULL,NULL,1,'2019-10-11 13:13:03'),
(13,'admin','+7 (213) 132 13 12',NULL,NULL,1,'2019-10-11 21:16:53');

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

/*Table structure for table `image_manager` */

DROP TABLE IF EXISTS `image_manager`;

CREATE TABLE `image_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `image_manager` */

insert  into `image_manager`(`id`,`type`,`section`,`key`,`value`,`img`,`status`,`description`,`created_at`,`updated_at`) values 
(1,'string','Главная страница','рук_цеха_штамповки','about-cover.jpg','about-cover.jpg',1,'',1570879261,1570880468),
(2,'string','Главная страница','большая_картинка','image.jpg','image.jpg',1,'большая картинка\r\nна главном странице',1570879627,1570880468),
(3,'string','Главная страница','add','image.jpg','image.jpg',1,'',1570880034,1570880468);

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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

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
(25,1,1,'2019-10-10 12:33:04',NULL,'127.0.0.1'),
(26,1,1,'2019-10-10 16:39:05',NULL,'127.0.0.1'),
(27,1,1,'2019-10-10 17:58:33',NULL,'127.0.0.1'),
(28,1,1,'2019-10-10 22:08:48',NULL,'127.0.0.1'),
(29,1,1,'2019-10-10 22:45:37',NULL,'127.0.0.1'),
(30,1,1,'2019-10-11 09:05:28',NULL,'127.0.0.1'),
(31,1,1,'2019-10-11 09:05:44',NULL,'127.0.0.1'),
(32,1,1,'2019-10-11 13:27:11',NULL,'127.0.0.1'),
(33,1,1,'2019-10-11 18:21:45',NULL,'127.0.0.1'),
(34,1,1,'2019-10-11 18:23:33',NULL,'127.0.0.1'),
(35,1,1,'2019-10-11 21:15:27',NULL,'127.0.0.1'),
(36,1,1,'2019-10-11 21:15:43',NULL,'127.0.0.1'),
(37,1,1,'2019-10-11 22:04:45',NULL,'127.0.0.1'),
(38,1,1,'2019-10-11 22:06:45',NULL,'127.0.0.1'),
(39,1,1,'2019-10-11 22:07:29',NULL,'127.0.0.1'),
(40,1,1,'2019-10-12 08:46:18',NULL,'127.0.0.1'),
(41,1,1,'2019-10-12 13:39:55',NULL,'127.0.0.1'),
(42,1,1,'2019-10-12 13:44:23',NULL,'127.0.0.1'),
(43,22,1,'2019-10-12 13:49:26',NULL,'127.0.0.1'),
(44,22,1,'2019-10-12 13:50:50',NULL,'127.0.0.1'),
(45,1,1,'2019-10-12 13:51:57',NULL,'127.0.0.1'),
(46,23,1,'2019-10-12 13:52:20',NULL,'127.0.0.1'),
(47,1,1,'2019-10-12 13:52:58',NULL,'127.0.0.1'),
(48,1,1,'2019-10-12 13:55:17',NULL,'127.0.0.1'),
(49,1,1,'2019-10-12 13:55:23',NULL,'127.0.0.1'),
(50,1,1,'2019-10-12 13:55:28',NULL,'127.0.0.1'),
(51,25,1,'2019-10-12 13:58:06',NULL,'127.0.0.1'),
(52,1,1,'2019-10-12 14:04:48',NULL,'127.0.0.1'),
(53,26,1,'2019-10-12 14:05:11',NULL,'127.0.0.1'),
(54,1,1,'2019-10-12 14:05:26',NULL,'127.0.0.1'),
(55,1,1,'2019-10-12 14:10:28',NULL,'127.0.0.1'),
(56,1,1,'2019-10-12 14:10:45',NULL,'127.0.0.1'),
(57,22,1,'2019-10-12 14:17:28',NULL,'127.0.0.1'),
(58,22,1,'2019-10-12 14:19:30',NULL,'127.0.0.1'),
(59,1,1,'2019-10-12 14:32:43',NULL,'127.0.0.1'),
(60,1,1,'2019-10-12 14:33:07',NULL,'127.0.0.1');

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
('m140506_102106_rbac_init',1570774067),
('m150227_114524_init',1570695247),
('m161109_104201_rename_setting_table',1570695247),
('m170323_102933_add_description_column_to_setting_table',1570695247),
('m170413_125133_rename_date_columns',1570695247),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1570774067),
('m180523_151638_rbac_updates_indexes_without_prefix',1570774068);

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
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

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
  `ico` varchar(500) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `sections` */

insert  into `sections`(`id`,`page_id`,`title`,`alias`,`description`,`type`,`ico`,`img`,`status`) values 
(1,1,'Почему мы','','100% совпадение с чертежами заказчика',1,'feature-1.png','feature-cover.jpg',1),
(2,1,'Почему мы','Почему мы','Мы реализуем все этапы производства.<br>Никаких субподрядчиков',1,'feature-2.png','feature-cover.jpg',1),
(3,1,'Почему мы','Почему мы','Годами отработанная технология по всем<br>представленным услугам',1,'feature-3.png','feature-cover.jpg',1),
(4,1,'Почему мы','Почему мы','Годами отработанная технология по всем<br>представленным услугам',1,'feature-4.png','feature-cover.jpg',1),
(5,1,'Принятие чертежа. Уточнение подробностей','Как мы работаем','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.',2,'','',1),
(6,1,'Расчёт количества металла','Как мы работаем','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.',2,'','',1),
(7,1,'Эксперт контролирует качество','Как мы работаем','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.',2,'','',1),
(8,1,'Отбракованные детали на переплавку','Как мы работаем','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.',2,'','',1),
(9,4,'Компания ТехАрсенал','о компании','На сегодняшний день обработка металла холодной штамповкой – наиболее прогрессивный метод. Так можно получить детали различных размеров, форм и конфигураций. Они сразу готовы к использованию и не требуют последующего термического воздействия, что значительно упрощает процесс и позволяет его автоматизировать. Рассмотрим все особенности такой обработки давлением.',3,'','about-cover.jpg',1),
(10,4,'Штампуем уникальные детали по чертежам','о компании','Производим методом холодной штамповки более 2000 видов стандартных деталей. А также разрабатываем уникальные формы на заказ для серийной штамповки. <br>',4,'','',1),
(11,4,'Холодная штамповка<br>«под ключ»','о компании','Наша продукция: металлоизделия по чертежам, закладные для ЖБИ, винтовые сваи, скребки, диски, цепи коммунальной техники.  Выполняем полный цикл изготовления продукции от заказа и чертежа до готового изделия',4,'','',1),
(12,4,'С чего все начиналось','2009','Идейным вдохновителем был Дмитрий Семёнов. Как-то ему были нужны качественные детали для станка цеха отца, который достался ему по ',5,'','history-item-1.jpg',1),
(13,4,'С чего все начиналось','2012','Идейным вдохновителем был Дмитрий Семёнов. Как-то ему были нужны качественные детали для станка цеха отца, который достался ему по ',5,'','history-item-1.jpg',1),
(14,4,'С чего все начиналось','206','Идейным вдохновителем был Дмитрий Семёнов. Как-то ему были нужны качественные детали для станка цеха отца, который достался ему по ',5,'','history-item-1.jpg',1),
(15,4,'С чего все начиналось','2014','Идейным вдохновителем был Дмитрий Семёнов. Как-то ему были нужны качественные детали для станка цеха отца, который достался ему по ',5,'','history-item-1.jpg',1),
(16,4,'С чего все начиналось','2019','Идейным вдохновителем был Дмитрий Семёнов. Как-то ему были нужны качественные детали для станка цеха отца, который достался ему по ',5,'','history-item-1.jpg',1),
(17,3,'Телефон','Тел','+7 (910) 788-40-41',NULL,'','person.jpg',1),
(18,3,'Адрес','','Смоленск, дер. Тепличный Комбинат №1',NULL,'','',1),
(19,3,'Email','','andrey@prometey67.ru',NULL,'','',1),
(20,7,'Спасибо!','Не хочется ждать','Наш техник скоро свяжется с вами, <br>и Вы зададите ему любые вопросы',6,'','',1),
(21,6,'Страница не найдена','Страница не найдена','Страница не найдена',7,'','not-found.png',1);

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
  `url` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `services` */

insert  into `services`(`id`,`parent_id`,`name`,`alias`,`description`,`img`,`url`,`status`) values 
(1,0,'Холодная штамповка','Холодная штамповка','Холодная штамповка позволяет получить под давлением без нагрева разнопрофильные изделия.\r\nПроизводство очень эффективно, так как детали почти не требуют дополнительной обработки и отличаются замечательным внешним видом.\r\nСамо получение происходит в специальном инструменте - штампе.','service_cover_1.jpg','/page/service-cold-stamping',1),
(2,0,'Гибка метала','Гибка метала','В отличие от сварки не увеличивает риск коррозии.\r\nГибку можно применять: на любом металлическом профиле, трубах, листовом металле и стальных листах.','service_cover_2.jpg','/page/service-metal-bending',1),
(3,2,'Гибка металлопрофиля','Гибка металлопрофиля','Это самый распространённый способ изготовления карнизов, рельс для дверей, оконных откосов, металлических уголков для декорирования помещений, скоб, самых сложных металлических коробов для компьютерной и другой техники и мн. др.','service_cover_1.jpg','/page/service-metal-bending',1),
(4,2,'Гибка труб','Гибка труб','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','service_cover_1.jpg','/page/service-metal-bending',1),
(5,0,'Гибка листового метала','Гибка листового метала','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','service_cover_1.jpg','/page/service-metal-bending',1),
(6,2,'Гибка стальных листов','Гибка стальных листов','С самого начала выверяем всё с максимальной точностью. Чем точнее первый этап, тем меньше в дальнейшем будет трудностей. Оснастку мы изготавливаем сперва на станке, а затем доводим вручную, пока она не будет на 100% соответствовать чертежу. Мы не начинаем штамповку, пока она не достигнет максимально точных размеров. Иначе у нас не бывает.','service_cover_1.jpg','/page/service-metal-bending',1),
(7,0,'Плазменная резка','Плазменная резка','','service_cover_1.jpg','/page/service-metal-bending',1),
(8,0,'Порошковая покраска и цинкование','Порошковая покраска и цинкование','','service_cover_2.jpg','/page/service-metal-bending',1),
(9,0,'Сварочные работы','Сварочные работы','','service_cover_2.jpg','/page/service-metal-bending',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(11,'string','Услуги','инфо_об_холод_штамп','Производим детали методом холодной \r\nштамповки по чертежам. \r\nДоводим оснастку до идеальной \r\nформы и соответствия чертежу.',1,'главная страница - информация\r\nоб услуги хол. штамповки',1570704011,1570704017),
(12,'string','Сайт','Имя компании','ООО ТехАрсенал, Смоленск',1,'имя компании в низу',1570707829,1570707829),
(13,'string','Текст','Прочие услуги','Прочие услуги',1,'Прочие услуги',1570716884,1570716884),
(14,'string','Текст','Как мы работаем','Как мы работаем',1,'Как мы работаем',1570716926,1570716926),
(15,'string','Текст','Почему мы','Почему мы',1,'Почему мы',1570716953,1570716953),
(16,'string','Текст','Контакты','Контакты',1,'Контакты',1570717000,1570717000),
(17,'string','Должность','главТехник','Дмитрий Соляник',1,'',1570739691,1570739691),
(18,'string','Контакты','Телефон','+7 (910) 788-40-41',1,'Телефон',1570739811,1570739907),
(19,'string','Контакты','Email','andrey@prometey67.ru',1,'Email',1570739847,1570739942),
(20,'string','Сотрудник','главТехник','Дмитрий Соляник',1,'главТехник',1570739891,1570739891);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`user_id`,`username`,`user_password`,`email`,`user_type`,`is_block`,`avatar`,`created_at`,`created_by`,`updated_at`,`updated_by`,`secret_key`,`auth_key`,`session_id`) values 
(1,'admin','f6fdffe48c908deb0f4c3bd36c032e72','admin@polytech.tj','E',0,'std7.jpg','2019-10-12 14:32:54',1,'2015-05-27 15:56:35',1,NULL,NULL,'1048ltl19ahhn013l96v0g40jvg4vhs1'),
(22,'admin2','af8eb328301d219cfd1d50e6c6a48f58',NULL,'A',0,'std5.jpg','2019-10-12 13:45:41',1,NULL,NULL,NULL,NULL,'2514tkgqduig3mq1ubbr2okt335l7ndm'),
(23,'admin3','7169390683d2b222ba778ca6374b59d3',NULL,'A',1,'std7.jpg','2019-10-12 13:52:10',1,NULL,NULL,NULL,NULL,'ak5h7tnec99b69cipd80ralc0p2fa23l'),
(25,'admin4','dfa5f43cb476ef890a83010f0da7c6b0',NULL,'A',1,'std3.jpg','2019-10-12 13:57:57',1,NULL,NULL,NULL,NULL,'2pqp9rissts870sj830jkor0jntj15h9'),
(26,'admin6','b48d62f30f50c2c191ab949186c532d3',NULL,'A',1,'std6.jpg','2019-10-12 14:05:01',1,NULL,NULL,NULL,NULL,'90c8pfqa6cchpcofouj9qsl1hvngu3f3');

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
