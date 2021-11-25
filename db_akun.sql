-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Des 2018 pada 13.17
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akun`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `username` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `level_` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`username`, `email`, `passwd`, `level_`) VALUES
('130411100012', '130411100012@student.trunojoyo.ac.id', '202cb962ac59075b964b07152d234b70', '2'),
('160211100123', '160211100123@student.trunojoyo.ac.id', '202cb962ac59075b964b07152d234b70', '2'),
('160311100150', '160311100150@student.trunojoyo.ac.id', '202cb962ac59075b964b07152d234b70', '2'),
('160311100154', '160311100154@student.trunojoyo.ac.id', '202cb962ac59075b964b07152d234b70', '2'),
('160411100154', '160411100154@student.trunojoyo.ac.id', '202cb962ac59075b964b07152d234b70', '2'),
('admin', 'admin@trunojoyo.ac.id', '21232f297a57a5a743894a0e4a801fc3', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
