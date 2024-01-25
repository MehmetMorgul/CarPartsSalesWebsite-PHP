<?php
session_start();

// Oturum kontrolü yap
if (!isset($_SESSION['oturum']) || $_SESSION['oturum'] !== true) {
    // Oturum açılmamış, yönlendirme yap
    header("Location: index.php"); // Giriş sayfasının URL'sini buraya yazın
    exit();
}
?>

<!doctype html>
<html lang="en">
<body>
	<?php include 'assets/bolumler/head.php'; ?>
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
							<a href="index.html"><img src="assets/images/logo-light.png" alt="logo"></a>
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
						<h2>Kontrol Paneli</h2>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header Area End -->
	<?php include 'assets/bolumler/script.php'; ?>
</html>