<?php
include 'mysql.php';

if(isset($_POST['markaAdi'])) {
    $eskiMarkaAdi = $_POST['eskiMarkaAdi'];
    $markaAdi = $_POST['markaAdi'];

    // Veritabanında güncelleme işlemini gerçekleştir
    $sql = "UPDATE MARKA SET MARKA_ADI = '$markaAdi' WHERE MARKA_ADI = '$eskiMarkaAdi'";
    $result = mysqli_query($baglan, $sql);

    if ($result) {
        echo "Veri güncellendi";
    } else {
        echo "Güncelleme işlemi başarısız oldu";
    }
}
?>
