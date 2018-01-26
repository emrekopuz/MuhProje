<?php
require 'baglan.php';


  $id  = $_POST["id"];// post metodu ile gönderilen verinin id sini alıyoruz
  $post = $_POST; // post metodu ile gönderilen tüm veriyi alıyoruz

  $sql = "UPDATE kayitlar SET ad = '".$post['ad']."',soyad = '".$post['soyad']."',tel = '".$post['tel']."',email = '".$post['email']."'
    WHERE id = '".$id."'"; // update yapan sql kodunu $sql değişkenine alıyoruz

  $result = $db->query($sql); //sql kodunu çalıştırarak değişkene alıyoruz


  $sql = "SELECT * FROM kayitlar WHERE id = '".$id."'"; // sql değişkeninin içini değiştirerek id ye göre verileri çekiyoruz

  $data = $db->query($sql, PDO::FETCH_ASSOC); //sql değişkenini çalıştırıyoruz


  echo json_encode($data); //datayı json formatına çeviriyoruz
?>