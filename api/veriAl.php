<?php
require 'baglan.php';

$num_rec_per_page = 5; //verileri kaçarlı gruplar halinde alacağını belirliyor

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; //Get metodu ile verileri çekiyor

$start_from = ($page-1) * $num_rec_per_page; // kaçıncı sayfadan başlayacağını belirleyen kısım

$sqlTotal = "SELECT * FROM kayitlar"; //bütün verileri seçen sql kodunu değişkene alıyoruz
$sql = "SELECT * FROM kayitlar ORDER BY id DESC LIMIT $start_from, $num_rec_per_page"; //başlangıç noktasını ve kaç adet veri alacağını belirleyen kod


  $result = $db->query($sql, PDO::FETCH_ASSOC); //$sql değişkeninin içindeki kodu çalıştırıyoruz
  
  foreach ($result as $row){ //değerleri row değişkenine alıyoruz

     $json[] = $row; // aldığımız değerleri dizide tutuyoruz

  }

  $data['data'] = $json; // data değişkenine diziyi gönderiyoruz

$result = $db->query($sqlTotal, PDO::FETCH_ASSOC); //$sqltotal değişkenini çalıştırıyoruz

$data['total'] = $result->rowCount(); // data değişkeninin total ile gösterilen alanına çalıştırılan kodun sonuçlarını yani gelen veriyi alıyoruz

echo json_encode($data); //aldığımız veriyi json formatına çeviriyoruz

?>