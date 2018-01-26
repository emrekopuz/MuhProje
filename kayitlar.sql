# Host: localhost  (Version 5.5.5-10.1.28-MariaDB)
# Date: 2018-01-25 21:55:04
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

INSERT INTO `kayitlar` VALUES (71,'wqeqweqe','35345435','2018-01-25 17:19:01','qweqweqwe','12345678'),(80,'emre','05418641237','2018-01-25 18:16:57','kopuz','emrekopuz95@gmail.com'),(83,'atahan','12312321313','2018-01-25 19:40:17','duman ','nekbevjebhjegbvbe'),(92,'wqeqweqeqwe','qwe','2018-01-25 20:22:58','qwe','qwe'),(93,'ert','ert','2018-01-25 20:23:03','ert','ert'),(94,'tyu','tyu','2018-01-25 20:23:08','tyu','tyu'),(96,'muhammet','151612312','2018-01-25 21:41:00','taşbaşı','muhammettasbası');
