<?php
if (isset($_POST['markaAdi'])) {
    $markaAdi = $_POST['markaAdi'];

    include 'mysql.php';

    // MARKA tablosundan markayı sil
    $sql = "DELETE FROM MARKA WHERE MARKA_ADI = '$markaAdi'";
    if (mysqli_query($baglan, $sql)) {
        echo "Marka başarıyla silindi";
    } else {
        echo "Marka silinirken bir hata oluştu: " . mysqli_error($baglan);
    }
}
?>
