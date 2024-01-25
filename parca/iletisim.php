<!DOCTYPE html>
<html lang="tr">
<?php include 'assets/bolumler/head.php'; ?>
<body>
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
                        <h2>İletişim</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

<br>
<br>
<!-- Contact Form Starts -->
<section class="contact-form section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex">
                    <div class="into-icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="info-text">
                        <h4>ABC Mahallesi, 123 Caddesi</h4>
                        <p>İstanbul / TÜRKİYE</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="into-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="info-text">
                        <h4>+90(123) 456 78 90</h4>
                        <p>9:00-17:00</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="into-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="info-text">
                        <h4>info@parcaci.com</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <form action="#">
                    <div class="left">
                        <input type="text" placeholder="Ad Soyad" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ad Soyad'" required>
                        <input type="email" placeholder="Eposta" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Eposta'" required>
                        <input type="text" placeholder="Başlık" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Başlık'" required>
                    </div>
                    <div class="right">
                        <textarea name="message" cols="20" rows="7"  placeholder="Mesaj" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mesaj'" required></textarea>
                    </div>
                    <button type="submit" class="template-btn">gönder</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form End -->

<?php include 'assets/bolumler/footer.php'; ?>
<?php include 'assets/bolumler/script.php'; ?>
</body>
</html>
