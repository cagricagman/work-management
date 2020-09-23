-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Eyl 2020, 16:43:10
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `workmanagment`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notes`
--

CREATE TABLE `notes` (
  `Id` int(11) NOT NULL,
  `detail` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `project_Id` int(11) DEFAULT NULL,
  `createdUserId` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projects`
--

CREATE TABLE `projects` (
  `Id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `priority_status` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `incumbents` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `folder_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `note` text COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `projects`
--

INSERT INTO `projects` (`Id`, `title`, `start_date`, `finish_date`, `priority_status`, `incumbents`, `folder_name`, `createdAt`, `updatedAt`, `isActive`, `status`, `note`) VALUES
(3, 'Proje 1', '2020-09-23 00:00:00', NULL, 'Orta', '[\"1\",\"4\"]', 'proje-1', '2020-09-23 14:09:56', NULL, 1, 'Devam Ediyor', 'kajshdskajdfbsdf asjkhdjksadhfskdjhfb');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`Id`, `username`, `fullname`, `email`, `password`, `isActive`, `createdAt`, `profile_photo`, `updatedAt`) VALUES
(1, 'cagricagman', 'A.Çağrı', 'cagri.cagman@truekontrol.com', '4badaee57fed5610012a296273158f5f', 1, '2020-05-04 10:05:18', NULL, NULL),
(4, 'onurkarakaya', 'Onur Karakaya', 'onur.karakaya@truekontrol.com', '4badaee57fed5610012a296273158f5f', 1, '2020-09-22 14:09:49', NULL, NULL),
(5, 'gokayyilmaz', 'Gökay Yılmaz', 'gokay.yilmaz@truekontrol.com', '4badaee57fed5610012a296273158f5f', 1, '2020-09-22 14:09:18', NULL, NULL),
(6, 'hakanyalcin', 'Hakan Yalçın', 'hakan.yalcin@truekontrol.com', '4badaee57fed5610012a296273158f5f', 1, '2020-09-22 14:09:50', NULL, NULL),
(7, 'emirhanguraslan', 'Emirhan Güraslan', 'emirhan.guraslan@truekontrol.com', '4badaee57fed5610012a296273158f5f', 1, '2020-09-22 14:09:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_roles`
--

CREATE TABLE `user_roles` (
  `Id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=DYNAMIC;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`) USING BTREE;

--
-- Tablo için indeksler `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`Id`) USING BTREE;

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `notes`
--
ALTER TABLE `notes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `projects`
--
ALTER TABLE `projects`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
