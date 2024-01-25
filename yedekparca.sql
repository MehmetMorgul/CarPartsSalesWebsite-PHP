-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Haz 2023, 08:57:58
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yedekparca`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `KAYIT_ID` int(11) NOT NULL,
  `KATEGORI_ADI` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`KAYIT_ID`, `KATEGORI_ADI`) VALUES
(1, 'Fren Sistemleri'),
(2, 'Ezgoz Sistemi'),
(3, 'Tekerlek ve Süspansiyon'),
(4, 'Motor Parçaları'),
(5, 'Şarj Sistemi'),
(6, 'Trriger ve Gergi Sistemleri'),
(7, 'Aydınlatma Aksamı'),
(8, 'Ateşleme Sistemi'),
(9, 'Direksiyon Sistemi'),
(10, 'Kaporta Aksamı'),
(11, 'Yakıt ve Enjeksiyon Sistemi'),
(12, 'Isıtma ve Soğutma Sistemi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `marka`
--

CREATE TABLE `marka` (
  `MARKA_ID` int(11) NOT NULL,
  `MARKA_ADI` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `marka`
--

INSERT INTO `marka` (`MARKA_ID`, `MARKA_ADI`) VALUES
(2, 'Mercedes'),
(3, 'BMW'),
(4, 'Renault'),
(5, 'Opel'),
(6, 'Peugeot');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model`
--

CREATE TABLE `model` (
  `MODEL_ID` int(11) NOT NULL,
  `MARKA_ADI` varchar(50) NOT NULL,
  `MODEL_ADI` varchar(50) NOT NULL,
  `MODEL_YIL` varchar(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `model`
--

INSERT INTO `model` (`MODEL_ID`, `MARKA_ADI`, `MODEL_ADI`, `MODEL_YIL`) VALUES
(4, 'Renault', 'Clio', '2022'),
(2, 'BMW', '520', '2020'),
(3, 'MERCEDES', 'cla180', '2020'),
(5, 'Opel', 'astra', '2019'),
(6, 'Peugeot', '408', '2023');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `KAYIT_ID` int(11) NOT NULL,
  `URUN_ADI` varchar(50) NOT NULL,
  `KATEGORI` varchar(50) NOT NULL,
  `MARKA` varchar(50) NOT NULL,
  `MODEL` varchar(50) NOT NULL,
  `YIL` varchar(50) NOT NULL,
  `FIYAT` float NOT NULL,
  `RESIM` varchar(300) DEFAULT NULL,
  `STOK` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`KAYIT_ID`, `URUN_ADI`, `KATEGORI`, `MARKA`, `MODEL`, `YIL`, `FIYAT`, `RESIM`, `STOK`) VALUES
(3, 'Renault Clio 2022 Tekerlek', 'Tekerlek ve Süspansiyon', 'Renault', 'Clio', '2022', 1000, '64871febc1bac_Clio lastik.jpg', '10'),
(2, 'BMW 520 tekerlek', 'Tekerlek ve Süspansiyon', 'BMW', '520', '2000', 1000, '6486ff959af02_2V_iMdWG0D7n_2V_iMdWG0D7n.jpg', '10'),
(4, 'Renault Clio ateşleme sistemi', 'Ateşleme Sistemi', 'Renault', 'Clio', '2022', 100, '6487204b95e03_Ateşleme-bobini-kablo-soket-kablo-demeti-renault-clio.jpeg', '10'),
(5, 'Renault Clio 2022 far', 'Aydınlatma Aksamı', 'Renault', 'Clio', '2022', 300, '6487208482dff_renault-clio-5-sol-led-far---260606305r_2724.jpg', '10'),
(6, 'Renault clio 2022 direksiyon', 'Direksiyon Sistemi', 'Renault', 'Clio', '2022', 500, '648720c29e98e_renault-clio-1.jpg', '10'),
(7, 'Renault Clio 2022 Egzos ', 'Ezgoz Sistemi', 'Renault', 'Clio', '2022', 400, '648720ed18b71_clio-bja-rs-line-orta-ve-arka-egzoz-kcm33739658-1-9f3f4b2005fa4f0398acb276987b0813.avif', '10'),
(8, 'Renault Clio 2022 Fren sistemi', 'Fren Sistemleri', 'Renault', 'Clio', '2022', 500, '6487213d35041_bk21-2m008-ac.jpg', '10'),
(9, 'Renault clio 2022 Hava filtresi', 'Isıtma ve Soğutma Sistemi', 'Renault', 'Clio', '2022', 300, '648721b68ff73_hava-filtresi_h3dwmk.jpg', '10'),
(10, 'Renault Clio 2022 kaporta', 'Kaporta Aksamı', 'Renault', 'Clio', '2022', 200, '648721f940d85_651002659r.webp', '10'),
(11, 'Renault Clio 2022 egzoz manifoldu', 'Motor Parçaları', 'Renault', 'Clio', '2022', 500, '648722496276a_renault-clio-2-egzoz-manifoldu-118470-5-118.jpg', '10'),
(12, 'Renault Clio 2022 şarj dinamosu', 'Şarj Sistemi', 'Renault', 'Clio', '2022', 1000, '6487228dc0ceb_clio-2-alternator-sarj-dinamosu-75a-valeo-136492-3-136.jpg', '10'),
(13, 'Renault Clio 2022 trriger kayışı', 'Trriger ve Gergi Sistemleri', 'Renault', 'Clio', '2022', 1000, '648722beb8944_9749662793778.jpg', '10'),
(14, 'Renault Clio 2022 yakıt sistemi ', 'Yakıt ve Enjeksiyon Sistemi', 'Renault', 'Clio', '2022', 1000, '648724716eb51_renault-clio-4-yakit-samandirasi-159124-1-159.jpg', '10'),
(15, 'Peugeot 408 egzoz', 'Ezgoz Sistemi', 'Peugeot', '408', '2023', 1000, '64880c7db5923_6486ff959af02_2V_iMdWG0D7n_2V_iMdWG0D7n.jpg', '10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim`
--

CREATE TABLE `yonetim` (
  `KULLANICI_ID` int(11) NOT NULL,
  `KULLANICI_ADI` varchar(50) NOT NULL,
  `SIFRE` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetim`
--

INSERT INTO `yonetim` (`KULLANICI_ID`, `KULLANICI_ADI`, `SIFRE`) VALUES
(1, 'admin', '123456');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`KAYIT_ID`),
  ADD UNIQUE KEY `KATEGORI_ADI` (`KATEGORI_ADI`);

--
-- Tablo için indeksler `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`MARKA_ID`),
  ADD UNIQUE KEY `MARKA_ADI` (`MARKA_ADI`);

--
-- Tablo için indeksler `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`MODEL_ID`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`KAYIT_ID`),
  ADD UNIQUE KEY `RESIM` (`RESIM`);

--
-- Tablo için indeksler `yonetim`
--
ALTER TABLE `yonetim`
  ADD PRIMARY KEY (`KULLANICI_ID`),
  ADD UNIQUE KEY `KULLANICI_ADI` (`KULLANICI_ADI`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `KAYIT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `marka`
--
ALTER TABLE `marka`
  MODIFY `MARKA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `model`
--
ALTER TABLE `model`
  MODIFY `MODEL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `KAYIT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim`
--
ALTER TABLE `yonetim`
  MODIFY `KULLANICI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
