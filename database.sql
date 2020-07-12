-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 May 2019, 08:48:54
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sv`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `deneyim`
--

CREATE TABLE `deneyim` (
  `sirket_adi` varchar(255) NOT NULL,
  `pozisyon` varchar(255) NOT NULL,
  `baslangic_tarihi` date NOT NULL,
  `bitis_tarihi` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `deneyim`
--

INSERT INTO `deneyim` (`sirket_adi`, `pozisyon`, `baslangic_tarihi`, `bitis_tarihi`, `id`) VALUES
('den1', 'poz1', '2019-04-05', '2019-04-12', 6),
('den2', 'den3', '2019-04-04', '2019-04-11', 6),
('d', 'p', '2019-04-12', '2019-04-20', 1),
('r', 'r', '2019-04-15', '2019-04-22', 1),
('d', 'd', '2019-04-01', '2019-04-01', 9),
('d', 'd', '2019-04-01', '2019-04-01', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dil`
--

CREATE TABLE `dil` (
  `id` int(11) NOT NULL,
  `dil_adi` varchar(255) NOT NULL,
  `seviye` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `dil`
--

INSERT INTO `dil` (`id`, `dil_adi`, `seviye`) VALUES
(6, 'in', 'Baslangic'),
(6, 'fra', 'Orta'),
(1, 'i', 'Orta'),
(1, 'a', 'Ileri'),
(1, 'f', 'Ileri'),
(7, 'Array', 'Array'),
(9, 'i', 'Baslangic'),
(9, 'f', 'Orta');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `egitim`
--

CREATE TABLE `egitim` (
  `id` int(11) NOT NULL,
  `universite` varchar(255) NOT NULL,
  `bolum` varchar(255) NOT NULL,
  `baslangic_tarihi` date NOT NULL,
  `bitis_tarihi` date NOT NULL,
  `yabanci_dil` varchar(255) NOT NULL,
  `egitimderecesi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `egitim`
--

INSERT INTO `egitim` (`id`, `universite`, `bolum`, `baslangic_tarihi`, `bitis_tarihi`, `yabanci_dil`, `egitimderecesi`) VALUES
(6, 'universite1', 'bolum1', '2019-04-02', '2019-04-09', 'dil1', 'universite'),
(6, 'yuksek Lisans1', 'bolum2', '2019-04-05', '2019-04-23', 'dil2', 'yukseklisans'),
(1, 'u', 'u', '2019-04-11', '2019-04-02', 'u', 'universite'),
(1, 'u', 'u', '2019-04-02', '2019-04-09', 'u', 'universite'),
(1, 'u', 'u', '2019-04-17', '2019-04-24', 'u', 'universite'),
(9, 'a', 'a', '2019-04-01', '2019-04-01', 'a', 'universite'),
(9, 'b', 'b', '2019-04-01', '2019-04-01', 'b', 'universite');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `il` varchar(25) DEFAULT NULL,
  `ilce` varchar(25) DEFAULT NULL,
  `telefon` int(11) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `il`, `ilce`, `telefon`, `email`) VALUES
(1, 'ad', 'ad', 85, 'ad'),
(6, 'il', 'ice', 13456, 'adad'),
(7, 'f', 'f', 1, 'ad'),
(9, 'i', 'i', 1, 'a');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `username`, `password`) VALUES
(1, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda'),
(2, 'admin2', 'c84258e9c39059a89ab77d846ddab909'),
(3, 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6'),
(4, 'admin4', 'fc1ebc848e31e0a68e868432225e3c82'),
(5, 'admin6', 'c6b853d6a7cc7ec49172937f68f446c8'),
(6, 'admin10', '4fbd41a36dac3cd79aa1041c9648ab89'),
(7, 'admin20', 'b29b1de827ef626d07210f0a2713f782'),
(8, 'root1', 'e5d9dee0892c9f474a174d3bfffb7810'),
(9, 'admin30', 'e6a0d43e6b902af6c0cb3e32de8ed69b');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `soyad` varchar(255) NOT NULL,
  `fotograf` varchar(255) NOT NULL,
  `cvdosyasi` varchar(255) DEFAULT NULL,
  `aciklama` varchar(255) DEFAULT NULL,
  `cinsiyet` varchar(255) DEFAULT NULL,
  `dogutarihi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `profil`
--

INSERT INTO `profil` (`id`, `ad`, `soyad`, `fotograf`, `cvdosyasi`, `aciklama`, `cinsiyet`, `dogutarihi`) VALUES
(1, 'a', 'a', 'upload/mgk_face.jpg', 'cvupload/Example One Page CV.pdf', 'AÃ§Ä±klama', 'Erkek', '2019-04-04'),
(6, 'Ä°sim', 'Soyisim', 'upload/yuz_1.jpg', 'cvupload/Example One Page CV.pdf', 'acÄ±k', 'kadin', '2019-04-03'),
(7, 'a', 'a', 'upload/yuz_2.jpg', 'cvupload/Example One Page CV.pdf', 'ad', 'kadin', '2019-04-19'),
(9, 'i', 'i', 'upload/bz_yuz.jpg', 'cvupload/Example One Page CV.pdf', 'a', 'Erkek', '2019-04-01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referans`
--

CREATE TABLE `referans` (
  `id` int(11) NOT NULL,
  `refad` varchar(255) NOT NULL,
  `refsoyad` varchar(255) NOT NULL,
  `reftelefon` int(11) NOT NULL,
  `unvan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `referans`
--

INSERT INTO `referans` (`id`, `refad`, `refsoyad`, `reftelefon`, `unvan`) VALUES
(6, 'ref1', 'ref2', 7894, 'un1'),
(6, 'ref2', 'ref3', 9694, 'un1'),
(1, 'tr', 'r', 58, 'da'),
(1, 'r', 'r', 58, 'ad'),
(9, 'r', 'r', 1, 'r'),
(9, 'r', 'r', 2, 'r');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `yoneticiler`
--

INSERT INTO `yoneticiler` (`id`, `username`, `password`) VALUES
(1, 'root2', '9b70d6dbfb1457d05e4e2c2fbb42d7db'),
(2, 'root10', 'd37d9107122c562c7ac32ea9ba48c949');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `deneyim`
--
ALTER TABLE `deneyim`
  ADD KEY `id` (`id`);

--
-- Tablo için indeksler `dil`
--
ALTER TABLE `dil`
  ADD KEY `dil_ibfk_1` (`id`);

--
-- Tablo için indeksler `egitim`
--
ALTER TABLE `egitim`
  ADD KEY `id` (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `referans`
--
ALTER TABLE `referans`
  ADD KEY `id` (`id`);

--
-- Tablo için indeksler `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `deneyim`
--
ALTER TABLE `deneyim`
  ADD CONSTRAINT `deneyim_ibfk_1` FOREIGN KEY (`id`) REFERENCES `kullanicilar` (`id`);

--
-- Tablo kısıtlamaları `dil`
--
ALTER TABLE `dil`
  ADD CONSTRAINT `dil_ibfk_1` FOREIGN KEY (`id`) REFERENCES `kullanicilar` (`id`);

--
-- Tablo kısıtlamaları `egitim`
--
ALTER TABLE `egitim`
  ADD CONSTRAINT `egitim_ibfk_1` FOREIGN KEY (`id`) REFERENCES `kullanicilar` (`id`);

--
-- Tablo kısıtlamaları `iletisim`
--
ALTER TABLE `iletisim`
  ADD CONSTRAINT `iletisim_ibfk_1` FOREIGN KEY (`id`) REFERENCES `kullanicilar` (`id`);

--
-- Tablo kısıtlamaları `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`id`) REFERENCES `kullanicilar` (`id`);

--
-- Tablo kısıtlamaları `referans`
--
ALTER TABLE `referans`
  ADD CONSTRAINT `referans_ibfk_1` FOREIGN KEY (`id`) REFERENCES `kullanicilar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
