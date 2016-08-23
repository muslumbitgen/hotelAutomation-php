-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 May 2016, 21:25:18
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `hotel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oda`
--

CREATE TABLE IF NOT EXISTS `oda` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `odano` int(50) NOT NULL,
  `odakat` int(20) NOT NULL,
  `odaTipi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Tablo döküm verisi `oda`
--

INSERT INTO `oda` (`id`, `odano`, `odakat`, `odaTipi`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 2, 1),
(6, 1, 2, 2),
(7, 2, 2, 2),
(8, 3, 2, 2),
(9, 4, 2, 2),
(10, 5, 2, 2),
(11, 1, 3, 3),
(12, 2, 3, 3),
(13, 3, 3, 3),
(14, 4, 3, 3),
(15, 5, 3, 3),
(16, 1, 4, 4),
(17, 2, 4, 4),
(18, 3, 4, 4),
(19, 4, 4, 4),
(20, 5, 4, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odatipleri`
--

CREATE TABLE IF NOT EXISTS `odatipleri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `odaTipi` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `yatakSayisi` int(11) NOT NULL,
  `tlFiyat` int(11) NOT NULL,
  `usdFiyat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `odatipleri`
--

INSERT INTO `odatipleri` (`id`, `odaTipi`, `yatakSayisi`, `tlFiyat`, `usdFiyat`) VALUES
(1, 'Standart', 4, 50, 22),
(2, 'Suite', 2, 333, 222),
(3, 'Deluxe', 3, 532, 123),
(4, 'SuperDeluxe', 1, 33, 33);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyon`
--

CREATE TABLE IF NOT EXISTS `rezervasyon` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `girisTarihi` date NOT NULL,
  `cikisTarihi` date NOT NULL,
  `yatakID` int(20) NOT NULL,
  `isim` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `adress` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=78 ;

--
-- Tablo döküm verisi `rezervasyon`
--

INSERT INTO `rezervasyon` (`id`, `girisTarihi`, `cikisTarihi`, `yatakID`, `isim`, `email`, `telefon`, `adress`, `mesaj`) VALUES
(35, '2017-05-10', '2017-05-10', 5, 'müslüm bitgen', 'bitgen63@gmail.com', '555 888 99 99', 'of trabzon', 'asdgfasdf'),
(34, '2017-05-10', '2017-05-10', 4, 'müslüm bitgen', 'bitgen63@gmail.com', '555 888 99 99', 'of trabzon', 'asdgfasdf'),
(33, '2017-05-10', '2017-05-10', 2, 'müslüm bitgen', 'bitgen63@gmail.com', '555 888 99 99', 'of trabzon', 'asdgfasdf'),
(46, '2016-05-11', '2016-05-11', 17, 'müslüm', 'bitgen63@gmail.com', '0542245545', 'dsmfkkfmsdmfk', 'dmsfmksmdfkmsdfm'),
(31, '2016-05-10', '2016-05-10', 6, 'müslüm bitgen', 'bitgen63@gmail.com', '555 888 99 99', 'of trabzon', 'afafafa'),
(44, '2016-05-11', '2016-05-11', 9, 'müslüm', 'bitgen63@gmail.com', '0542245545', 'dsmfkkfmsdmfk', 'dmsfmksmdfkmsdfm'),
(45, '2016-05-11', '2016-05-11', 16, 'müslüm', 'bitgen63@gmail.com', '0542245545', 'dsmfkkfmsdmfk', 'dmsfmksmdfkmsdfm'),
(36, '2016-06-10', '2016-06-10', 2, 'müslüm bitgen', 'bitgen63@gmail.com', '555 888 99 99', 'of trabzon', 'Mesajınız'),
(37, '2016-06-10', '2016-06-10', 3, 'müslüm bitgen', 'bitgen63@gmail.com', '555 888 99 99', 'of trabzon', 'Mesajınız'),
(48, '2016-05-11', '2016-05-12', 39, 'müslüm bitgen', 'bitgen12363@gmail.com', '05439130164', 'nsddo', 'sevgşler'),
(49, '2016-05-11', '2016-05-12', 10, 'müslüm', 'bitgen63@gmail.com', '05439130164', 'trabzon/of', 'jjkjkghhb'),
(51, '2016-05-12', '2016-05-12', 9, 'asd', 'asdasd@gmail.com', 'asdasd', 'asdasd', 'asdasd'),
(52, '2016-05-13', '2016-05-13', 9, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'fgsdfdas'),
(47, '2016-05-11', '2016-05-11', 18, 'müslüm', 'bitgen63@gmail.com', '0542245545', 'dsmfkkfmsdmfk', 'dmsfmksmdfkmsdfm'),
(53, '2016-05-13', '2016-05-13', 56, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'asdasd'),
(54, '2016-05-13', '2016-05-13', 57, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'asdasd'),
(55, '2016-05-13', '2016-05-13', 58, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'asdasd'),
(56, '2016-05-16', '2016-05-16', 9, 'refik can', 'redd@gmail.com', '052215515', 'istambul', 'çok güzel'),
(57, '2016-05-16', '2016-05-16', 56, 'refik can', 'redd@gmail.com', '052215515', 'istambul', 'çok güzel'),
(58, '2016-05-16', '2016-05-16', 57, 'refik can', 'redd@gmail.com', '052215515', 'istambul', 'çok güzel'),
(60, '2016-05-16', '2016-05-16', 10, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'ömfcv'),
(61, '2016-05-16', '2016-05-16', 59, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'ömfcv'),
(62, '2016-05-18', '2016-05-18', 9, 'asd', 'asd@sdf.com', 'asd', 'asd', 'asd'),
(63, '2016-05-19', '2016-05-21', 56, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(64, '2016-05-19', '2016-05-21', 43, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(65, '2016-05-19', '2016-05-21', 44, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(66, '2016-05-19', '2016-05-21', 84, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(67, '2016-05-19', '2016-05-21', 71, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(68, '2016-05-19', '2016-05-21', 72, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(69, '2016-05-19', '2016-05-21', 74, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(70, '2016-05-19', '2016-05-21', 49, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(71, '2016-05-19', '2016-05-21', 73, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(72, '2016-05-19', '2016-05-21', 48, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(73, '2016-05-19', '2016-05-21', 75, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(74, '2016-05-19', '2016-05-21', 76, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(75, '2016-05-19', '2016-05-21', 77, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(76, '2016-05-19', '2016-05-21', 46, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe'),
(77, '2016-05-19', '2016-05-21', 47, 'furkan öztürk', 'furkan@gmail.com', '05439130164', 'of', 'wqe');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(60) CHARACTER SET latin5 NOT NULL,
  `parola` varchar(60) CHARACTER SET latin5 NOT NULL,
  `eposta` varchar(60) CHARACTER SET latin5 NOT NULL,
  `tarih` date DEFAULT NULL,
  `yetki` varchar(60) NOT NULL DEFAULT '0',
  `tamisim` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `adres` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kullanici_adi`, `parola`, `eposta`, `tarih`, `yetki`, `tamisim`, `telefon`, `adres`) VALUES
(3, 'm.bitgen', 'c3284d0f94606de1fd2af172aba15bf3', 'bitgen63@gmail.com', '2009-11-04', '1', 'müslüm bitgen', '555 888 99 99', 'of trabzon'),
(12, 'mslm', 'd9b1d7db4cd6e70935368a1efb10e377', 'bitgen12363@gmail.com', '2016-05-11', '0', 'müslüm bitgen', '05439130164', 'nsddo'),
(13, 'furkan', 'd9b1d7db4cd6e70935368a1efb10e377', 'furkan@gmail.com', '2016-05-12', '0', 'furkan öztürk', '05439130164', 'of'),
(14, 'refik', 'd9b1d7db4cd6e70935368a1efb10e377', 'redd@gmail.com', '2016-05-16', '0', 'refik can', '052215515', 'istambul'),
(15, 'müslüm', 'd9b1d7db4cd6e70935368a1efb10e377', 'muslum@gmail.com', '2016-05-19', '0', 'müslüm bitgen', '054326665626', 'suruç');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yatak`
--

CREATE TABLE IF NOT EXISTS `yatak` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `odaID` int(25) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=85 ;

--
-- Tablo döküm verisi `yatak`
--

INSERT INTO `yatak` (`id`, `odaID`) VALUES
(9, 1),
(10, 2),
(16, 3),
(36, 4),
(39, 5),
(40, 6),
(41, 7),
(42, 8),
(43, 9),
(44, 10),
(45, 11),
(46, 12),
(47, 12),
(48, 13),
(49, 14),
(50, 15),
(51, 16),
(52, 17),
(53, 18),
(54, 19),
(55, 20),
(56, 1),
(57, 1),
(58, 1),
(59, 2),
(60, 2),
(61, 3),
(62, 3),
(63, 3),
(64, 4),
(65, 2),
(66, 4),
(67, 4),
(68, 5),
(69, 5),
(70, 5),
(71, 15),
(72, 15),
(73, 14),
(74, 14),
(75, 13),
(76, 13),
(77, 12),
(78, 11),
(79, 11),
(80, 6),
(81, 7),
(82, 8),
(83, 9),
(84, 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE IF NOT EXISTS `yorumlar` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(255) NOT NULL,
  `yorum_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yorum_yorum` text NOT NULL,
  PRIMARY KEY (`yorum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `kullanici_adi`, `yorum_tarih`, `yorum_yorum`) VALUES
(35, 'refik', '2016-05-19 20:21:22', 've sonunda bitti... :)))))'),
(36, 'refik', '2016-05-19 20:21:39', 'saygılar celal hoca :)'),
(41, 'furkan', '2016-05-19 22:23:13', 'ads');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
