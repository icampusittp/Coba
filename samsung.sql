-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2019 pada 19.20
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samsung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_samsung`
--

CREATE TABLE `data_samsung` (
  `id` int(11) NOT NULL,
  `kode_hp` varchar(20) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `nama_hp` varchar(50) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `harga_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_samsung`
--

INSERT INTO `data_samsung` (`id`, `kode_hp`, `tgl_masuk`, `nama_hp`, `gambar`, `harga_hp`) VALUES
(1, 'SS01-14-Q1', '2014-01-15', 'Samsung Galaxy Grand Prime', 'GrandPrime.jpg', '1.800.000'),
(2, 'XMI01-14-Q1', '2014-02-04', 'Xiaomi Redmi Go', 'go.jpg', '1.499.000'),
(3, 'SS02-14-Q2', '2014-07-27', 'Samsung Galaxy Mega 2', 'mega2.jpg', '2.499.000'),
(4, 'XMI02-14-Q2', '2014-08-01', 'Xiaomi Redmi 5 Plus', 'redmi5plus.jpg', '4.500.000'),
(5, 'SS03-15-Q1', '2015-03-12', 'Samsung Galaxy Camera 2', 'camera2.jpg', '4.000.000'),
(6, 'XMI03-15-Q1', '2015-04-18', 'Xiaomi Pocophone F1', 'poco.jpg', '3.750.000'),
(7, 'SS04-15-Q2', '2015-09-08', 'Samsung Grand Max', 'max.jpg', '3.499.000'),
(8, 'XMI04-15-Q2', '2015-10-17', 'Xiaomi Redmi Note 6 Pro', 'note6pro.jpg', '8.999.000'),
(9, 'SS05-16-Q1', '2016-05-14', 'Samsung Galaxy Ace 4', 'ace4.jpg', '1.399.000'),
(10, 'XMI05-16-Q1', '2016-06-23', 'Xiaomi Mi 7', 'mi7.jpg', '1.699.000'),
(11, 'SS06-16-Q2', '2016-11-09', 'Samsung Galaxy J5', 'j5.jpg', '3.899.000'),
(12, 'XMI06-16-Q2', '2016-12-02', 'Xiaomi Mi Max', 'mimax.jpg', '4.599.000'),
(13, 'SS07-17-Q1', '2017-01-03', 'Samsung Galaxy S8 edge', 's8.jpg', '7.999.000'),
(14, 'NK01-17-Q1', '2017-02-18', 'Nokia 9 PureView', '9pure.jpg', '2.499.000'),
(15, 'SS08-17-Q2', '2017-07-04', 'Samsung Galaxy Note5', 'note5.jpg', '5.999.000'),
(16, 'NK02-17-Q2', '2017-08-18', 'Nokia 7', 'nokia71.jpg', '4.299.000'),
(17, 'SS09-18-Q1', '2018-03-26', 'Samsung Galaxy A8+', 'a8+.jpg', '7.299.000'),
(18, 'NK03-18-Q1', '2018-04-11', 'Nokia 8', 'nokia8.jpg', '4.999.000'),
(19, 'SS10-18-Q2', '2019-09-25', 'Samsung Galaxy S9', 's9.jpg', '8.399.000'),
(20, 'NK04-18-Q2', '2018-10-12', 'Nokia 7 Plus', 'nokia7plus.jpg', '9.599.000'),
(21, 'SS11-19-Q1', '2019-05-28', 'Samsung Galaxy S10', 's10.jpg', '9.999.000'),
(22, 'NK05-19-Q1', '2019-06-14', 'Nokia 10', 'nokia10.jpg', '12.999.000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_samsung`
--
ALTER TABLE `data_samsung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_samsung`
--
ALTER TABLE `data_samsung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
