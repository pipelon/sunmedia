/*
SQLyog Community v8.71 
MySQL - 5.7.26 : Database - sun_media_advertisements
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sun_media_advertisements` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sun_media_advertisements`;

/*Table structure for table `anuncios` */

DROP TABLE IF EXISTS `anuncios`;

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `publicado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `anuncios` */

insert  into `anuncios`(`id`,`nombre`,`estado`,`fecha`,`publicado`) values (1,'Anuncio prueba','published','2019-10-17 13:25:24',2);

/*Table structure for table `componentes` */

DROP TABLE IF EXISTS `componentes`;

CREATE TABLE `componentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `anuncio_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre',
  `tipo` varchar(10) NOT NULL COMMENT 'Reglas',
  `formato` varchar(10) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `texto` varchar(140) DEFAULT NULL,
  `posicion` varchar(45) NOT NULL,
  `enlace` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_componentes_anuncios_idx` (`anuncio_id`),
  CONSTRAINT `fk_componentes_anuncios` FOREIGN KEY (`anuncio_id`) REFERENCES `anuncios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `componentes` */

insert  into `componentes`(`id`,`anuncio_id`,`nombre`,`tipo`,`formato`,`peso`,`texto`,`posicion`,`enlace`) values (4,1,'Imagen','imagen','JPG','10','','1, 2, 3','https://images.clarin.com/2019/09/09/el-momento-en-que-una___OXW2LuJLA_1256x620__1.jpg'),(5,1,'Video','video','MP4','10MB','','1, 2, 3, 4','https://www.google.com/search?client=firefox-b-d&q=custom+rule+yii2.mp4'),(6,1,'Texto','texto','','','1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever sin','1, 2, 3','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
