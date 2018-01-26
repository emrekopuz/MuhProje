<?php

 require 'baglan.php';

 $id  = $_POST["id"];// gönderilen id deki verileri değişkene alıyor

 $sql = "DELETE FROM kayitlar WHERE id = '".$id."'"; // verileri silen sql komutu

 $result = $db->query($sql); //kodu çalıştırıyor

 echo json_encode([$id]); //değişkeni json formatına çeviriyor
 
?>