<?php
include 'mysql.php';

if (isset($_POST['index']) && isset($_POST['urunAdi']) && isset($_POST['yil']) && isset($_POST['fiyat']) && isset($_POST['stok'])) {
  $index = $_POST['index'];
  $urunAdi = $_POST['urunAdi'];
  $yil = $_POST['yil'];
  $fiyat = $_POST['fiyat'];
  $stok = $_POST['stok'];

  // Güncelleme işlemini gerçekleştir
  $sql = "UPDATE urunler SET URUN_ADI = '$urunAdi', YIL = '$yil', FIYAT = '$fiyat', STOK = '$stok' WHERE KAYIT_ID = '$index'";
  $result = mysqli_query($baglan, $sql);

  if ($result) {
    echo "success";
  } else {
    echo "error";
  }
} else {
  echo "Eksik parametreler";
}
?>
