-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2017 pada 10.31
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `doctor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Gender` int(1) DEFAULT NULL,
  `Umur` int(2) DEFAULT NULL,
  `Bdahak` int(1) DEFAULT NULL,
  `BBTurun` int(1) DEFAULT NULL,
  `Keringat` int(1) DEFAULT NULL,
  `BDarah` int(1) DEFAULT NULL,
  `DemamL` int(1) DEFAULT NULL,
  `SesakN` int(1) DEFAULT NULL,
  `NyeriD` int(1) DEFAULT NULL,
  `Klasifikasi` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=161 ;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`ID`, `Gender`, `Umur`, `Bdahak`, `BBTurun`, `Keringat`, `BDarah`, `DemamL`, `SesakN`, `NyeriD`, `Klasifikasi`) VALUES
(1, 2, 60, 1, 1, 1, 1, 1, 1, 1, 'Paru Kuat'),
(2, 2, 35, 1, 1, 1, 0, 0, 0, 0, 'Negatif'),
(3, 1, 70, 1, 0, 1, 0, 0, 0, 0, 'Negatif'),
(4, 1, 23, 1, 1, 1, 0, 0, 1, 0, 'Paru Ringan'),
(5, 1, 27, 1, 1, 1, 0, 1, 0, 1, 'Paru Kuat'),
(6, 1, 60, 1, 1, 1, 1, 0, 0, 0, 'Paru Kuat'),
(7, 2, 18, 1, 1, 1, 0, 0, 1, 0, 'Paru Ringan'),
(8, 1, 56, 1, 1, 0, 0, 1, 0, 0, 'Negatif'),
(9, 1, 39, 1, 0, 1, 0, 0, 0, 0, 'Negatif'),
(10, 2, 33, 0, 1, 0, 0, 1, 0, 0, 'Negatif'),
(11, 1, 23, 1, 1, 1, 0, 1, 0, 0, 'Paru Ringan'),
(12, 2, 60, 1, 1, 0, 0, 1, 0, 0, 'Negatif'),
(13, 2, 43, 1, 0, 1, 0, 1, 0, 1, 'Paru Kuat'),
(14, 1, 32, 0, 1, 1, 0, 1, 0, 0, 'Negatif'),
(15, 1, 38, 1, 1, 1, 0, 1, 0, 1, 'Paru Kuat'),
(16, 1, 26, 1, 0, 0, 0, 1, 0, 0, 'Negatif'),
(17, 1, 65, 1, 1, 1, 0, 1, 0, 1, 'Paru Kuat'),
(18, 1, 57, 1, 1, 0, 0, 1, 1, 1, 'Paru Kuat'),
(19, 2, 19, 1, 1, 1, 0, 1, 0, 0, 'Paru Ringan'),
(20, 2, 50, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(21, 2, 40, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(22, 2, 38, 1, 1, 1, 0, 1, 0, 0, 'Paru Ringan'),
(23, 1, 21, 1, 1, 1, 0, 0, 0, 1, 'Paru Kuat'),
(24, 1, 65, 1, 1, 1, 1, 1, 1, 1, 'Paru Kuat'),
(25, 2, 60, 1, 0, 1, 0, 0, 0, 0, 'Negatif'),
(26, 1, 24, 1, 1, 1, 0, 1, 0, 0, 'Paru Ringan'),
(27, 2, 25, 1, 1, 1, 0, 1, 0, 1, 'Paru Kuat'),
(28, 2, 35, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(29, 2, 31, 1, 1, 1, 0, 0, 1, 1, 'Paru Ringan'),
(30, 1, 45, 1, 1, 0, 1, 0, 1, 1, 'Paru Kuat'),
(31, 2, 60, 1, 1, 0, 0, 0, 0, 1, 'Paru Kuat'),
(32, 1, 24, 1, 1, 1, 1, 0, 0, 1, 'Paru Ringan'),
(33, 1, 35, 1, 1, 1, 1, 0, 0, 1, 'Paru Kuat'),
(34, 2, 50, 1, 1, 1, 0, 0, 0, 0, 'Negatif'),
(35, 2, 55, 1, 1, 1, 1, 0, 0, 1, 'Paru Kuat'),
(36, 1, 40, 1, 0, 1, 0, 0, 1, 1, 'Negatif'),
(37, 2, 65, 1, 1, 0, 0, 0, 1, 0, 'Negatif'),
(38, 1, 70, 1, 1, 0, 1, 0, 0, 1, 'Negatif'),
(39, 2, 43, 1, 0, 0, 0, 0, 0, 1, 'Negatif'),
(40, 2, 60, 1, 1, 0, 1, 0, 1, 1, 'Negatif'),
(41, 1, 70, 1, 1, 0, 0, 0, 0, 1, 'Negatif'),
(42, 1, 21, 1, 1, 1, 0, 1, 0, 1, 'Paru Kuat'),
(43, 2, 27, 0, 1, 1, 0, 0, 0, 1, 'Negatif'),
(44, 2, 22, 1, 1, 0, 1, 0, 0, 1, 'Paru Kuat'),
(45, 1, 60, 1, 1, 0, 1, 0, 1, 0, 'Paru Kuat'),
(46, 2, 60, 0, 0, 0, 0, 0, 0, 0, 'Negatif'),
(47, 1, 50, 0, 1, 1, 0, 0, 0, 1, 'Negatif'),
(48, 1, 40, 1, 1, 0, 1, 0, 1, 1, 'Paru Kuat'),
(49, 1, 20, 1, 1, 1, 1, 1, 1, 1, 'Paru Kuat'),
(50, 2, 26, 1, 1, 1, 0, 1, 0, 0, 'Paru Ringan'),
(51, 1, 51, 1, 1, 0, 1, 0, 0, 1, 'Paru Kuat'),
(52, 1, 32, 1, 1, 1, 0, 0, 1, 1, 'Paru Ringan'),
(53, 1, 24, 1, 0, 1, 1, 0, 1, 0, 'Paru Kuat'),
(54, 1, 20, 1, 1, 1, 1, 0, 1, 1, 'Paru Kuat'),
(55, 1, 28, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(56, 2, 18, 1, 1, 0, 0, 0, 0, 1, 'Paru Ringan'),
(57, 2, 38, 1, 1, 0, 1, 0, 0, 0, 'Negatif'),
(58, 2, 47, 1, 1, 1, 0, 1, 0, 1, 'Paru Kuat'),
(59, 1, 33, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(60, 1, 20, 1, 1, 1, 0, 0, 0, 1, 'Paru Ringan'),
(61, 1, 65, 1, 1, 1, 0, 0, 1, 1, 'Paru Kuat'),
(62, 1, 27, 1, 1, 0, 1, 0, 0, 1, 'Negatif'),
(63, 2, 30, 1, 1, 1, 0, 1, 0, 0, 'Negatif'),
(64, 1, 20, 1, 1, 0, 0, 1, 1, 0, 'Paru Ringan'),
(65, 2, 44, 1, 1, 0, 0, 0, 1, 1, 'Paru Kuat'),
(66, 1, 55, 1, 1, 0, 0, 0, 1, 1, 'Paru Ringan'),
(67, 2, 50, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(68, 1, 36, 1, 1, 0, 0, 1, 0, 0, 'Negatif'),
(69, 1, 27, 1, 1, 1, 0, 0, 0, 1, 'Paru Kuat'),
(70, 1, 27, 1, 1, 1, 0, 0, 0, 1, 'Paru Ringan'),
(71, 1, 70, 1, 1, 0, 0, 0, 1, 1, 'Paru Kuat'),
(72, 2, 35, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(73, 1, 46, 1, 1, 0, 0, 0, 1, 1, 'Paru Ringan'),
(74, 2, 52, 1, 1, 0, 0, 0, 0, 0, 'Paru Kuat'),
(75, 1, 35, 1, 1, 0, 1, 0, 1, 1, 'Paru Kuat'),
(76, 2, 40, 1, 0, 1, 0, 0, 0, 1, 'Negatif'),
(77, 1, 31, 1, 1, 1, 0, 0, 0, 1, 'Paru Ringan'),
(78, 1, 58, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(79, 2, 65, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(80, 1, 71, 1, 1, 1, 0, 0, 0, 0, 'Negatif'),
(81, 2, 24, 1, 1, 0, 0, 0, 1, 0, 'Negatif'),
(82, 1, 56, 1, 1, 0, 0, 0, 0, 1, 'Paru Ringan'),
(83, 1, 22, 1, 1, 1, 0, 1, 1, 0, 'Paru Ringan'),
(84, 1, 22, 1, 1, 0, 1, 1, 1, 1, 'Paru Kuat'),
(85, 1, 50, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(86, 1, 21, 1, 1, 0, 0, 0, 0, 1, 'Paru Ringan'),
(87, 1, 71, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(88, 1, 20, 1, 1, 0, 1, 1, 0, 0, 'Paru Ringan'),
(89, 1, 68, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(90, 1, 50, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(91, 1, 22, 1, 1, 1, 0, 0, 1, 1, 'Paru Kuat'),
(92, 1, 70, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(93, 1, 40, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(94, 1, 58, 1, 1, 0, 0, 0, 1, 1, 'Paru Kuat'),
(95, 1, 50, 1, 1, 0, 0, 0, 1, 0, 'Paru Kuat'),
(96, 2, 40, 1, 1, 0, 0, 0, 1, 1, 'Paru Ringan'),
(97, 1, 66, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(98, 2, 70, 1, 1, 0, 0, 0, 1, 1, 'Negatif'),
(99, 1, 55, 1, 1, 0, 1, 0, 1, 1, 'Paru Kuat'),
(100, 1, 60, 1, 1, 0, 0, 0, 1, 1, 'Negatif'),
(101, 1, 17, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(102, 2, 50, 1, 1, 0, 1, 0, 1, 1, 'Paru Kuat'),
(103, 1, 36, 1, 1, 1, 0, 0, 0, 0, 'Negatif'),
(104, 1, 26, 1, 1, 0, 1, 0, 1, 1, 'Paru Kuat'),
(105, 2, 41, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(106, 1, 33, 1, 1, 0, 0, 0, 0, 1, 'Paru Ringan'),
(107, 2, 50, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(108, 2, 55, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(109, 1, 21, 1, 1, 1, 0, 0, 1, 1, 'Paru Kuat'),
(110, 2, 50, 1, 0, 0, 1, 0, 0, 0, 'Negatif'),
(111, 2, 60, 1, 0, 0, 0, 0, 1, 0, 'Negatif'),
(112, 2, 45, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(113, 1, 53, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(114, 1, 45, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(115, 2, 55, 1, 1, 0, 0, 0, 1, 0, 'Paru Ringan'),
(116, 1, 27, 1, 1, 1, 0, 0, 0, 1, 'Paru Ringan'),
(117, 1, 38, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(118, 1, 32, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(119, 2, 60, 1, 1, 1, 0, 1, 0, 1, 'Paru Kuat'),
(120, 1, 23, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(121, 1, 55, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(122, 2, 60, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(123, 1, 65, 1, 1, 1, 0, 0, 1, 1, 'Paru Ringan'),
(124, 2, 30, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(125, 2, 33, 1, 1, 1, 0, 0, 1, 0, 'Negatif'),
(126, 2, 58, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(127, 1, 60, 1, 0, 1, 0, 0, 0, 0, 'Negatif'),
(128, 1, 60, 1, 1, 0, 0, 0, 1, 0, 'Negatif'),
(129, 1, 37, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(130, 1, 72, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(131, 2, 15, 1, 1, 0, 1, 1, 0, 1, 'Paru Kuat'),
(132, 1, 50, 1, 1, 0, 1, 1, 1, 1, 'Paru Kuat'),
(133, 1, 50, 1, 1, 1, 0, 1, 1, 0, 'Paru Ringan'),
(134, 2, 56, 1, 1, 1, 0, 0, 0, 0, 'Paru Ringan'),
(135, 1, 60, 1, 1, 1, 1, 0, 1, 1, 'Paru Kuat'),
(136, 1, 30, 1, 1, 1, 1, 0, 1, 1, 'Paru Kuat'),
(137, 1, 80, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(138, 2, 24, 1, 1, 1, 0, 0, 0, 0, 'Negatif'),
(139, 2, 28, 1, 1, 1, 0, 0, 1, 0, 'Negatif'),
(140, 1, 51, 1, 1, 1, 0, 1, 0, 1, 'Paru Kuat'),
(141, 2, 60, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(142, 1, 33, 1, 1, 1, 0, 0, 0, 0, 'Negatif'),
(143, 2, 55, 1, 1, 1, 0, 1, 0, 1, 'Paru Kuat'),
(144, 2, 54, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(145, 2, 18, 1, 1, 1, 0, 0, 0, 0, 'Negatif'),
(146, 2, 23, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(147, 1, 65, 1, 1, 1, 0, 1, 0, 1, 'Paru Kuat'),
(148, 1, 38, 1, 1, 1, 1, 1, 1, 1, 'Paru Kuat'),
(149, 1, 33, 1, 1, 1, 0, 0, 0, 1, 'Paru Kuat'),
(150, 1, 45, 1, 1, 0, 0, 0, 1, 0, 'Negatif'),
(151, 1, 25, 1, 1, 1, 0, 1, 0, 0, 'Paru Ringan'),
(152, 1, 55, 1, 1, 1, 1, 0, 1, 1, 'Paru Kuat'),
(153, 1, 29, 1, 1, 0, 0, 0, 1, 1, 'Paru Kuat'),
(154, 1, 46, 1, 1, 1, 0, 0, 0, 0, 'Negatif'),
(155, 1, 80, 1, 1, 1, 0, 0, 1, 0, 'Negatif'),
(156, 2, 58, 1, 1, 0, 0, 0, 0, 0, 'Paru Ringan'),
(157, 1, 65, 1, 1, 1, 0, 0, 1, 1, 'Paru Kuat'),
(158, 2, 24, 1, 1, 1, 0, 0, 0, 0, 'Paru Ringan'),
(159, 2, 58, 1, 1, 0, 0, 0, 0, 0, 'Negatif'),
(160, 2, 60, 1, 1, 1, 0, 0, 1, 1, 'Negatif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prediksi`
--

CREATE TABLE IF NOT EXISTS `prediksi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Gender` int(1) DEFAULT NULL,
  `Umur` int(2) DEFAULT NULL,
  `Bdahak` int(1) DEFAULT NULL,
  `BBTurun` int(1) DEFAULT NULL,
  `Keringat` int(1) DEFAULT NULL,
  `BDarah` int(1) DEFAULT NULL,
  `DemamL` int(1) DEFAULT NULL,
  `SesakN` int(1) DEFAULT NULL,
  `NyeriD` int(1) DEFAULT NULL,
  `Klasifikasi` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `prediksi`
--

INSERT INTO `prediksi` (`ID`, `Gender`, `Umur`, `Bdahak`, `BBTurun`, `Keringat`, `BDarah`, `DemamL`, `SesakN`, `NyeriD`, `Klasifikasi`) VALUES
(1, 1, 23, 1, 0, 1, 1, 0, 0, 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
