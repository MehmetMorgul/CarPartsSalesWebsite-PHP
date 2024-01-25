<?php
include 'mysql.php';

if (isset($_POST['eskiModelAdi']) && isset($_POST['modelAdi'])) {
    $eskiModelAdi = $_POST['eskiModelAdi'];
    $yeniModelAdi = $_POST['modelAdi'];

    // Güncelleme işlemini gerçekleştir
    $sql = "UPDATE model SET MODEL_ADI = '$yeniModelAdi' WHERE MODEL_ADI = '$eskiModelAdi'";
    $result = mysqli_query($baglan, $sql);

    if ($result) {
        echo "Başarıyla güncellendi";
    } else {
        echo "Güncelleme işlemi başarısız oldu";
    }
}
?>
