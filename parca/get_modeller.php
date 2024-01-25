<?php
include 'mysql.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['marka'])) {
    $marka = $_POST['marka'];

    if ($baglan->connect_error) {
        die("Veritabanı bağlantısı başarısız: " . $baglan->connect_error);
    }

    // Seçilen markaya ait modelleri veritabanından çekme
    $sql = "SELECT * FROM model WHERE MARKA_ADI = '$marka'";
    $sonuc = $baglan->query($sql);

    if ($sonuc !== false) {
        // Modelleri JSON formatında döndürme
        $modeller = array();
        if ($sonuc->num_rows > 0) {
            while ($row = $sonuc->fetch_assoc()) {
                $modeller[] = array(
                    'MODEL_ID' => $row['MODEL_ID'],
                    'MODEL_ADI' => $row['MODEL_ADI']
                );
            }
        }

        echo json_encode($modeller);
    } else {
        echo json_encode(array('error' => 'Sorgu Hatası'));
    }

    $baglan->close();
}
?>
