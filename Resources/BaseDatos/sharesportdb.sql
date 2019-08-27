/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.3.16-MariaDB : Database - sharesportdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sharesportdb` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `sharesportdb`;

/*Table structure for table `st_deportes` */

DROP TABLE IF EXISTS `st_deportes`;

CREATE TABLE `st_deportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `st_deportes` */

insert  into `st_deportes`(`id`,`nombre`) values 
(1,'Running'),
(2,'Ciclismo'),
(3,'Natación'),
(4,'CrossFit'),
(5,'Surf');

/*Table structure for table `st_posts` */

DROP TABLE IF EXISTS `st_posts`;

CREATE TABLE `st_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_hora` datetime DEFAULT current_timestamp(),
  `contenido` varchar(1000) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_deporte` int(11) NOT NULL,
  `id_post_padre` int(11) DEFAULT -1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `st_posts` */

insert  into `st_posts`(`id`,`fecha_hora`,`contenido`,`id_usuario`,`id_deporte`,`id_post_padre`) values 
(1,'2019-08-22 12:00:00','Hoy 5km en media hora, me he ganado la hamburguesa, jaja',1,1,-1),
(2,'2019-01-02 00:00:00','Primer día de crossfit, llevo bien los propósitos de año nuevo',2,4,-1),
(3,'2019-08-22 13:43:29','Sigo nadando, aún no he encontrado a Nemo pero han caído 2km en hora y 5.',3,3,-1),
(4,'2019-08-22 13:43:55','Preparando la rutica del sábado, va a ser buena.',1,1,-1),
(5,'2019-08-22 13:45:46','30km de bici antes de currar, ^_^',7,2,-1),
(6,'2019-08-22 13:52:59','Hoy día vago, corred vosotros que yo descanso.',1,1,-1);

/*Table structure for table `st_usuarios` */

DROP TABLE IF EXISTS `st_usuarios`;

CREATE TABLE `st_usuarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nick` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `foto` blob DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `permisos` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

/*Data for the table `st_usuarios` */

insert  into `st_usuarios`(`id`,`nick`,`password`,`mail`,`nombre`,`apellidos`,`ciudad`,`foto`,`fecha_nac`,`estado`,`permisos`) values 
(201,'nick0','nick0','mail1@mail.com','María','Rodríguez Fernández','Madrid',NULL,'0000-00-00','activo','usuario'),
(202,'nick1','nick1','mail2@mail.com','Daniel','López Muñoz','Bilbao',NULL,'0000-00-00','activo','usuario'),
(203,'nick2','nick2','mail3@mail.com','Héctor','Pérez Muñoz','Málaga',NULL,'0000-00-00','activo','usuario'),
(204,'nick3','nick3','mail4@mail.com','Felipe','Ruiz Rodríguez','Palma',NULL,'0000-00-00','activo','usuario'),
(205,'nick4','nick4','mail5@mail.com','Karla','Ruiz Martin','Granada',NULL,'0000-00-00','activo','usuario'),
(206,'nick5','nick5','mail6@mail.com','Karla','Muñoz Diaz','Bilbao',NULL,'0000-00-00','activo','usuario'),
(207,'nick6','nick6','mail7@mail.com','Gerardo','González Pérez','Barcelona',NULL,'0000-00-00','activo','usuario'),
(208,'nick7','nick7','mail8@mail.com','Daniel','Pérez Moreno','Palma',NULL,'0000-00-00','activo','usuario'),
(209,'nick8','nick8','mail9@mail.com','Karla','Gómez Muñoz','Córdoba',NULL,'0000-00-00','activo','usuario'),
(210,'nick9','nick9','mail10@mail.com','Carmen','Martin Martin','Zaragoza',NULL,'0000-00-00','activo','usuario'),
(211,'nick10','nick10','mail11@mail.com','Ernesto','Gutiérrez Rodríguez','Sevilla',NULL,'0000-00-00','activo','usuario'),
(212,'nick11','nick11','mail12@mail.com','Adriana','Rodríguez Gómez','Las Palmas de Gran Canaria',NULL,'0000-00-00','activo','usuario'),
(213,'nick12','nick12','mail13@mail.com','Josefina','Gómez Romero','Córdoba',NULL,'0000-00-00','activo','usuario'),
(214,'nick13','nick13','mail14@mail.com','Alejandra','Ruiz Romero','Valladolid',NULL,'0000-00-00','activo','usuario'),
(215,'nick14','nick14','mail15@mail.com','Bertha','Pérez Martin','Córdoba',NULL,'0000-00-00','activo','usuario'),
(216,'nick15','nick15','mail16@mail.com','Ernesto','Romero Gutiérrez','Murcia',NULL,'0000-00-00','activo','usuario'),
(217,'nick16','nick16','mail17@mail.com','Alejandra','Jiménez González','Vitoria',NULL,'0000-00-00','activo','usuario'),
(218,'nick17','nick17','mail18@mail.com','Julieta','Moreno Hernández','Gijón',NULL,'0000-00-00','activo','usuario'),
(219,'nick18','nick18','mail19@mail.com','Felipe','García Gómez','Murcia',NULL,'0000-00-00','activo','usuario'),
(220,'nick19','nick19','mail20@mail.com','Bertha','Gómez Jiménez','Gijón',NULL,'0000-00-00','activo','usuario'),
(221,'nick20','nick20','mail21@mail.com','Adriana','Gutiérrez Jiménez','Vitoria',NULL,'0000-00-00','activo','usuario'),
(222,'nick21','nick21','mail22@mail.com','Josefina','Álvarez García','Málaga',NULL,'0000-00-00','activo','usuario'),
(223,'nick22','nick22','mail23@mail.com','Diana','López Fernández','Madrid',NULL,'0000-00-00','activo','usuario'),
(224,'nick23','nick23','mail24@mail.com','Karla','Jiménez Romero','Valladolid',NULL,'0000-00-00','activo','usuario'),
(225,'nick24','nick24','mail25@mail.com','Susana','Gómez Ruiz','Valencia',NULL,'0000-00-00','activo','usuario'),
(226,'nick25','nick25','mail26@mail.com','Susana','Martínez Diaz','Vigo',NULL,'0000-00-00','activo','usuario'),
(227,'nick26','nick26','mail27@mail.com','Ernesto','Muñoz Moreno','Málaga',NULL,'0000-00-00','activo','usuario'),
(228,'nick27','nick27','mail28@mail.com','Susana','Pérez Romero','Vigo',NULL,'0000-00-00','activo','usuario'),
(229,'nick28','nick28','mail29@mail.com','Karla','Diaz Hernández','Bilbao',NULL,'0000-00-00','activo','usuario'),
(230,'nick29','nick29','mail30@mail.com','Julieta','Martin Jiménez','Málaga',NULL,'0000-00-00','activo','usuario'),
(231,'nick30','nick30','mail31@mail.com','Alejandro','Diaz Gutiérrez','La Coruña',NULL,'0000-00-00','activo','usuario'),
(232,'nick31','nick31','mail32@mail.com','Julieta','Rodríguez Alonso','Hospitalet de Llobregat',NULL,'0000-00-00','activo','usuario'),
(233,'nick32','nick32','mail33@mail.com','Carmen','Álvarez Álvarez','Málaga',NULL,'0000-00-00','activo','usuario'),
(234,'nick33','nick33','mail34@mail.com','Héctor','Pérez Sánchez','Valladolid',NULL,'0000-00-00','activo','usuario'),
(235,'nick34','nick34','mail35@mail.com','Diana','López Muñoz','Vitoria',NULL,'0000-00-00','activo','usuario'),
(236,'nick35','nick35','mail36@mail.com','Bertha','Gómez Diaz','Málaga',NULL,'0000-00-00','activo','usuario'),
(237,'nick36','nick36','mail37@mail.com','Julieta','Pérez Romero','Málaga',NULL,'0000-00-00','activo','usuario'),
(238,'nick37','nick37','mail38@mail.com','Susana','Martin Álvarez','Palma',NULL,'0000-00-00','activo','usuario'),
(239,'nick38','nick38','mail39@mail.com','Julieta','Gómez Martínez','Vigo',NULL,'0000-00-00','activo','usuario'),
(240,'nick39','nick39','mail40@mail.com','Julieta','Gutiérrez Pérez','Bilbao',NULL,'0000-00-00','activo','usuario'),
(241,'nick40','nick40','mail41@mail.com','Diana','Ruiz Jiménez','Gijón',NULL,'0000-00-00','activo','usuario'),
(242,'nick41','nick41','mail42@mail.com','Ernesto','Martínez Muñoz','Málaga',NULL,'0000-00-00','activo','usuario'),
(243,'nick42','nick42','mail43@mail.com','Felipe','Gutiérrez Hernández','Sevilla',NULL,'0000-00-00','activo','usuario'),
(244,'nick43','nick43','mail44@mail.com','Adriana','Alonso García','Valencia',NULL,'0000-00-00','activo','usuario'),
(245,'nick44','nick44','mail45@mail.com','Carlos','Martínez Hernández','Zaragoza',NULL,'0000-00-00','activo','usuario'),
(246,'nick45','nick45','mail46@mail.com','Julieta','Romero Romero','Córdoba',NULL,'0000-00-00','activo','usuario'),
(247,'nick46','nick46','mail47@mail.com','Adriana','Jiménez García','Málaga',NULL,'0000-00-00','activo','usuario'),
(248,'nick47','nick47','mail48@mail.com','Bertha','Alonso Pérez','Palma',NULL,'0000-00-00','activo','usuario'),
(249,'nick48','nick48','mail49@mail.com','Karla','Alonso Moreno','Madrid',NULL,'0000-00-00','activo','usuario'),
(250,'nick49','nick49','mail50@mail.com','Adriana','Álvarez Muñoz','Alicante',NULL,'0000-00-00','activo','usuario');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

UPDATE st_usuarios
SET permisos = '["usuario"]'
