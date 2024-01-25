<?php
session_start();

// Oturum kontrolü yap
if (!isset($_SESSION['oturum']) || $_SESSION['oturum'] !== true) {
    // Oturum açılmamış, yönlendirme yap
    header("Location: index.php"); // Giriş sayfasının URL'sini buraya yazın
    exit();
}
?>
<?php
if (isset($_POST['eklebtn'])) {
    $markaAdi = $_POST['marka'];
    $modelAdi = $_POST['modeladi'];
    $modelYil = $_POST['modelyil'];

    include 'mysql.php';

    // MARKA tablosunda aynı marka adının olup olmadığını kontrol et
    $sql = "SELECT * FROM MARKA WHERE MARKA_ADI = '$markaAdi'";
    $result = mysqli_query($baglan, $sql);
    if (mysqli_num_rows($result) > 0) {
        // MARKA tablosunda marka bulundu, MODEL tablosuna ekle
        $sql = "INSERT INTO MODEL (MARKA_ADI, MODEL_ADI, MODEL_YIL) VALUES ('$markaAdi', '$modelAdi', '$modelYil')";
        if (mysqli_query($baglan, $sql)) {
            echo "<script>alert('Model başarıyla eklendi');</script>";
        } else {
            echo "<script>alert('Model eklenirken bir hata oluştu: " . mysqli_error($baglan) . "');</script>";
        }
    } else {
        echo "<script>alert('Seçilen marka mevcut değil');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<body>
    <?php
    include 'assets/bolumler/head.php';

    include 'mysql.php';

    // MARKA tablosundaki tüm markaları al
    $sql = "SELECT * FROM MARKA";
    $result = mysqli_query($baglan, $sql);
    $markalar = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
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
                                <li><a href="#">Marka İşlemleri</a>
                                    <ul class="sub-menu">
                                        <li><a href="markaekle.php">Marka Ekle</a></li>
                                        <li><a href="markaislemleri.php">Marka Düzenle, Sil</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Model İşlemleri</a>
                                    <ul class="sub-menu">
                                        <li><a href="modelekle.php">Model Ekle</a></li>
                                        <li><a href="modelislemleri.php">Model Düzenle, Sil</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Ürün İşlemleri</a>
                                    <ul class="sub-menu">
                                        <li><a href="urunekle.php">Ürün Ekle</a></li>
                                        <li><a href="urunislemleri.php">Ürün Düzenle, Sil</a></li>
                                    </ul>
                                </li>
                                <li class="menu-btn">
                                    <a href="cikis.php" class="template-btn">çikiş</a>
                                </li>
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
                        <h2>Model Ekle</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="whole-wrap">
        <div class="container">
            
            <div class="section-top-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h3 class="mb-30 title_color">Model Ekle</h3>
                        <form action="#" method="POST">
                            <div class="input-group-icon mt-10">
                                <div class="form-select" id="default-select">
                                    <select name="marka" required>
                                        <option value="">Marka Seçin</option>
                                        <?php foreach ($markalar as $marka) { ?>
                                            <option value="<?php echo $marka['MARKA_ADI']; ?>"><?php echo $marka['MARKA_ADI']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-10">
                                <input type="text" name="modeladi" placeholder="Model Adı" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Model Adı'" required class="single-input">
                            </div>
                            <div class="mt-10">
                                <input type="text" name="modelyil" placeholder="Model Yıl" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Model Yıl'" required class="single-input">
                            </div>
                            <br>
                            <input type="submit" name="eklebtn" value="EKLE" class="genric-btn primary">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Header Area End -->
    <?php include 'assets/bolumler/script.php'; ?>
</body>
</html>
