# Host: localhost  (Version 5.5.5-10.1.28-MariaDB)
# Date: 2018-01-25 21:40:27
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "kayitlar"
#

CREATE TABLE `kayitlar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` text COLLATE utf8_unicode_ci NOT NULL,
  `tarih` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `soyad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "kayitlar"
#

INSERT INTO `kayitlar` VALUES (71,'wqeqweqe','35345435','2018-01-25 17:19:01','qweqweqwe','12345678'),(80,'emre','05418641237','2018-01-25 18:16:57','kopuz','emrekopuz95@gmail.com'),(83,'atahan','12312321313','2018-01-25 19:40:17','duman ','nekbevjebhjegbvbe'),(92,'wqeqweqeqwe','qwe','2018-01-25 20:22:58','qwe','qwe'),(93,'ert','ert','2018-01-25 20:23:03','ert','ert'),(94,'tyu','tyu','2018-01-25 20:23:08','tyu','tyu'),(95,'rtytyyt','tyutyu','2018-01-25 20:23:21','ytutyu','tyutyu');

#
# Structure for table "kisiler"
#

CREATE TABLE `kisiler` (
  `Id` int(6) NOT NULL AUTO_INCREMENT,
  `Ad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Soyad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Telefon` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Data for table "kisiler"
#

INSERT INTO `kisiler` VALUES (1,'Emre','Kopuz','emrekopuz95@gmail.com','05418641237'),(2,'Perihan','Tutuncu','prhn_1905@hotmail.com','05453573225'),(3,'asdfasd','asd','asdfghjk','46432443445'),(4,'sfadfasd','asdasdas','sfdfsfsdf','87976445788');
