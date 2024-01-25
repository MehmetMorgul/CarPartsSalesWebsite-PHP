<?php
// get_urunler.php

// Veritabanı bağlantısı için gerekli bilgileri içe aktarın
include 'mysql.php';
// Filtre değerini alın
$filtre = $_POST['filter'];
$marka = $_POST['marka'];
$model = $_POST['model'];
$yil = $_POST['yil'];

// Veritabanı bağlantısını oluşturun
if ($baglan->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $baglan->connect_error);
}

// Ürünleri filtrelemek için sorguyu hazırlayın
$sql = "SELECT * FROM urunler WHERE KATEGORI = '$filtre' AND MARKA='$marka' AND MODEL='$model' AND YIL='$yil'";

// Sorguyu veritabanında çalıştırın
$sonuc = $baglan->query($sql);

// Ürün kartlarını oluşturmak için HTML içeriğini oluşturun
$html = '';

if ($sonuc !== false) {
    if ($sonuc->num_rows > 0) {
        while ($row = $sonuc->fetch_assoc()) {
            $html .= '<div class="single-job mb-4 d-lg-flex justify-content-between">';
            $html .= '<div class="job-text">';
            $urunBasligi = $row['URUN_ADI'];
            $html .= '<h4>' . $urunBasligi . '</h4>';
            $html .= '<ul class="mt-4">';
            $html .= '<li class="mb-3"><h5><b>Kategori: </b>'.$row['KATEGORI'].'</h5>';
            $html .= '<h5><b>Marka/Model/Yıl: </b>'.$row['MARKA'].'/'.$row['MODEL'].'/'.$row['YIL'].'</h5>';
            $html .= '</ul>';
            $html .= '</div>';
            $html .= '<div class="job-img align-self-center">';
            $html .= '<div style="width: 128px; height: 128px; overflow: hidden;">';
            $html .= '<img src="upload/' . $row['RESIM'] . '" alt="ürün" style="width: 100%; height: 100%; object-fit: contain;">';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
    } else {
        $html .= '<p>Ürün bulunamadı</p>';
    }
} else {
    $html .= '<p>Sorgu hatası</p>';
}

// Veritabanı bağlantısını kapatın
$baglan->close();

// Oluşturulan HTML içeriğini döndür
echo $html;
?>
