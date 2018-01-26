<?php

$HOST = "localhost"; //host
$DATABASE = "webguide";// veritabanı ismi
$USER = "root";//kullanıcı adı
$PASSWORD = "";// parola

try {
	$db = new PDO("mysql:host=".$HOST.";dbname=".$DATABASE,$USER,$PASSWORD); //bağlanmaya çalışıyor
	$db->exec("SET NAMES 'utf8'; SET CHARACTER SET utf8_general_ci"); //karakter formatını belirliyor
} catch ( PDOException $e ){ //hata yakalama kısmı
	print $e->getMessage(); //hatayı ekranda gösterir
}
?>