<?php
require 'baglan.php'; //bağlantıyı sağlayan php sayfası

$post = $_POST; //post metodu ile gelen verileri değişkene alıyoruz

$sql = "INSERT INTO kayitlar (ad,soyad,tel,email) 
VALUES ('".$post['ad']."','".$post['soyad']."','".$post['tel']."','".$post['email']."')"; //verileri veritabanında ilgili yere yerleştiren sql kodu

$result = $db->query($sql);


$sql = "SELECT * FROM kayitlar Order by id desc LIMIT 1";  //verileri id ye göre sıralayarak çekiyoruz

$data = $db->query($sql,PDO::FETCH_ASSOC); // kodu çalıştırıyoruz ve data değişkenine atıyoruz

echo json_encode($data); //değişkeni json formatında encode ediyoruz
?>