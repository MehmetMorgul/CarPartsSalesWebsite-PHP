<?php
include 'mysql.php';

if (isset($_POST['model'])) {
  $model = mysqli_real_escape_string($baglan, $_POST['model']);

  // Veritabanından veriyi çek
  $sql = "SELECT * FROM urunler WHERE MODEL = '$model'";
  $result = mysqli_query($baglan, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Verileri array olarak oluştur
    $veri = array(
      'urunAdi' => $row['URUN_ADI'],
      'yil' => $row['YIL'],
      'fiyat' => $row['FIYAT'],
      'stok' => $row['STOK']
    );

    echo json_encode($veri); // Veriyi JSON olarak dön
  } else {
    echo "Veri bulunamadı";
  }
} else {
  echo "Model parametresi eksik";
}
?>
