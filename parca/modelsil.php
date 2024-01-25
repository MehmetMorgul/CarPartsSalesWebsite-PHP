<?php
include 'mysql.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $modelAdi = $_POST['modelAdi'];

    // Silme işlemini gerçekleştir
    $sql = "DELETE FROM MODEL WHERE MODEL_ADI = '$modelAdi'";
    $result = mysqli_query($baglan, $sql);

    if ($result) {
        echo "Model başarıyla silindi.";
    } else {
        echo "Silme işlemi sırasında bir hata oluştu.";
    }
}
?>
