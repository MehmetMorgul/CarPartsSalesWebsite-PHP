<?php
include 'mysql.php';

if (isset($_POST['modelAdi'])) {
    $modelAdi = $_POST['modelAdi'];

    // Silme işlemini gerçekleştir
    $sql = "DELETE FROM urunler WHERE MODEL = '$modelAdi'";
    $result = mysqli_query($baglan, $sql);

    if ($result) {
        echo "success"; // Başarılı durumu yanıt olarak döndür
    } else {
        echo "error"; // Hata durumu yanıt olarak döndür
    }
}
?>
