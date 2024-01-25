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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eklebtn'])) {
    // Diğer form verilerini al
	$marka = $_POST['marka'];
	$model = $_POST['model'];
	$urunadi = $_POST['urunadi'];
	$yil = $_POST['yil'];
	$fiyat = $_POST['fiyat'];
	$stok = $_POST['stok'];
	$kategori = $_POST['kategori'];

    // Resim dosyasını yüklemek için gereken işlemler
    $uploadDirectory = 'upload/'; // Resimlerin yükleneceği klasör
    $fileName = uniqid() . '_' . basename($_FILES['resim']['name']); // Benzersiz dosya adı oluştur
    $targetFile = $uploadDirectory . $fileName; // Dosyanın hedef konumu

    // Resim dosyasını upload klasörüne kaydet
    if (move_uploaded_file($_FILES['resim']['tmp_name'], $targetFile)) {
        // Resim dosyası başarıyla yüklendi, veritabanına kaydetme işlemlerini yap
    	include 'mysql.php';
    	if ($baglan->connect_error) {
    		die("Veritabanı bağlantısı başarısız: " . $baglan->connect_error);
    	}

        // Verileri veritabanına ekleme
    	$sql = "INSERT INTO urunler (MARKA, MODEL, URUN_ADI, YIL, FIYAT, STOK, RESIM, KATEGORI) VALUES ('$marka', '$model', '$urunadi', '$yil', '$fiyat', '$stok', '$fileName', '$kategori')";
    	if ($baglan->query($sql) === true) {
    		echo "<script>alert('Ürün başarıyla kaydedildi.');</script>";
    	} else {
    		echo "Hata: " . $sql . "<br>" . $baglan->error;
    	}

    	$baglan->close();
    } else {
    	echo "Resim yükleme hatası.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<?php
	include 'assets/bolumler/head.php';
	include 'mysql.php';

	if (!$baglan) {
		die("Veri tabanına bağlanılamadı: " . mysqli_connect_error());
	}

	// Markaları veri tabanından çekme
	$markaSorgusu = "SELECT MARKA_ADI FROM marka";
	$markalarSonucu = mysqli_query($baglan, $markaSorgusu);
	$markalar = mysqli_fetch_all($markalarSonucu, MYSQLI_ASSOC);

	// Kategorileri veri tabanından çekme
	$kategoriSorgusu = "SELECT KATEGORI_ADI FROM kategoriler";
	$kategoriSonucu = mysqli_query($baglan, $kategoriSorgusu);
	$kategoriler = mysqli_fetch_all($kategoriSonucu, MYSQLI_ASSOC);
	?>
</head>
<body>
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
									<a href="cikis.php" class="template-btn">Çıkış</a>
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
						<h2>Ürün Ekle</h2>
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
						<h3 class="mb-30 title_color">Ürün Ekle</h3>
						<form action="#" method="POST" enctype="multipart/form-data">
							<select id="marka" name="marka" required>
								<option value="">Marka Seç</option>
								<?php foreach ($markalar as $marka) { ?>
									<option value="<?php echo $marka['MARKA_ADI']; ?>"><?php echo $marka['MARKA_ADI']; ?></option>
								<?php } ?>
							</select>

							<select id="model" name="model" required>
								<option value="">Model Seç</option>
							</select>

							<select id="kategori" name="kategori" required>
								<option value="">Kategori Seç</option>
								<?php foreach ($kategoriler as $kategori) { ?>
									<option value="<?php echo $kategori['KATEGORI_ADI']; ?>"><?php echo $kategori['KATEGORI_ADI']; ?></option>
								<?php } ?>
							</select>
							<div class="mt-10">
								<input type="text" name="urunadi" placeholder="Ürün Adı" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ürün Adı'" required class="single-input">
							</div>
							<div class="mt-10">
								<input type="text" name="yil" maxlength="4" placeholder="Yıl" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Yıl'" required class="single-input">
							</div>
							<div class="mt-10">
								<input type="text" name="fiyat" placeholder="Fiyat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Fiyat'" required class="single-input">
							</div>
							<div class="mt-10">
								<input type="file" name="resim" placeholder="Resim" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Resim'" required class="single-input">
							</div>
							<div class="mt-10">
								<input type="text" name="stok" placeholder="Stok" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Stok'" required class="single-input">
							</div>
							<br>
							<input type="submit" name="eklebtn" value="EKLE" class="genric-btn primary">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'assets/bolumler/script.php'; ?>
	<script>
		$(document).ready(function () {
			$('#marka').change(function () {
				var marka = $(this).val();

				$.ajax({
					url: 'get_modeller.php',
					type: 'POST',
					data: {marka: marka},
					success: function (response) {
					var options = JSON.parse(response); // JSON verisini JavaScript nesnesine dönüştür

					var modelSelect = $('#model'); // Model select elementini seç
					modelSelect.empty(); // Önceki seçenekleri temizle

					if (options.length > 0) {
						$.each(options, function (index, option) {
							modelSelect.append('<option value="' + option.MODEL_ADI + '">' + option.MODEL_ADI + '</option>'); // Seçenekleri ekle
						});
						modelSelect.find('option[value=""]').remove(); // "Model Seç" yazısını sil
					} else {
						modelSelect.append('<option value="">Model Bulunamadı</option>'); // Model bulunamadı mesajını ekle
					}

					modelSelect.niceSelect('update'); // nice-select eklentisini güncelle
				}
			});
			});
		});
	</script>

</body>
</html>
