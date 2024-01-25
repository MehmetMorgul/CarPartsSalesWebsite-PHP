<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include 'assets/bolumler/head.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header class="header-area single-page">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo-area">
                            <a href="index.php"><img src="assets/images/logo-light.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="custom-navbar">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>  
                        <div class="main-menu main-menu-light">
                            <ul>
                                <li class="active"><a href="index.php">anasayfa</a></li>
                                <li><a href="hakkimizda.php">hakkımızda</a></li>
                                <li><a href="iletisim.php">iletişim</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-title text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h2>Arama Sonuçları</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Job Single Content Starts -->
    <section class="job-single-content section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-content">
                        <div class="single-content1">
                            <!-- Ürün kartları buraya gelecek -->
                            <?php
                            error_reporting(0);
                            include 'mysql.php'; // Veritabanı bağlantısını içe aktarın
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['marka']) && isset($_POST['model']) && isset($_POST['yil']))
                            {
                                $marka = $_POST['marka'];
                                $model = $_POST['model'];
                                $yil   = $_POST['yil'];

                                // Veritabanından ilgili ürünleri çekin
                                if ($baglan->connect_error) {
                                    die("Veritabanı bağlantısı başarısız: " . $baglan->connect_error);
                                }

                                $sql = "SELECT * FROM urunler WHERE MARKA='$marka' AND MODEL='$model' AND YIL='$yil'";
                                $sonuc = $baglan->query($sql);

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

                                $baglan->close(); // Veritabanı bağlantısını kapatın
                                echo $html; // Oluşturulan HTML içeriğini döndür
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar mt-5 mt-lg-0">
                        <div class="single-item mb-4">
                            <h4 class="mb-4">Ürün Filtreleme</h4>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Fren Sistemleri">
                                <span>Fren Sistemleri</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Egzoz Sistemi">
                                <span>Egzoz Sistemi</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Tekerlek ve Süspansiyon">
                                <span>Tekerlek ve Süspansiyon</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Motor Parçaları">
                                <span>Motor Parçaları</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Şarj Sistemi">
                                <span>Şarj Sistemi</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Triger ve Gergi Sistemleri">
                                <span>Triger ve Gergi Sistemleri</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Aydınlatma Aksamı">
                                <span>Aydınlatma Aksamı</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Ateşleme Sistemi">
                                <span>Ateşleme Sistemi</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Direksiyon Sistemi">
                                <span>Direksiyon Sistemi</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Kaporta Aksamı">
                                <span>Kaporta Aksamı</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Yakıt ve Enjeksiyon Sistemi">
                                <span>Yakıt ve Enjeksiyon Sistemi</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between filter" data-filter="Isıtma ve Soğutma Sistemi">
                                <span>Isıtma ve Soğutma Sistemi</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Job Single Content End -->

    <?php include 'assets/bolumler/footer.php'; ?>
    <?php include 'assets/bolumler/script.php'; ?>
    <input type="text" id="marka" value="<?php echo $marka; ?>" hidden>
    <input type="text" id="model" value="<?php echo $model; ?>" hidden>
    <input type="text" id="yil" value="<?php echo $yil; ?>" hidden>

    <script>
        $(document).ready(function() {
            $('.filter').on('click', function(e) {
                e.preventDefault();
                var filter = $(this).data('filter');
                var marka = $('#marka').val();
                var model = $('#model').val();
                var yil = $('#yil').val();
        getFilteredProducts(filter, marka, model, yil); // Değişkenleri de aktarıyoruz
    });
        });

function getFilteredProducts(filter, marka, model, yil) { // Değişkenleri parametre olarak alıyoruz
    $.ajax({
        url: 'get_urunler.php',
        type: 'POST',
        data: { filter: filter, marka: marka, model: model, yil: yil },
        success: function(response) {
            $('.single-content1').html(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
</script>
</body>

</html>
