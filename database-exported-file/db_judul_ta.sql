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
-- Database: `db_judul_ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_judul_ta`
--

CREATE TABLE `tbl_judul_ta` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_judul_ta`
--

INSERT INTO `tbl_judul_ta` (`id`, `judul`, `nim`, `nama`, `prodi`) VALUES
(6, 'Analisa Perbandingan SAW dan TOPSIS untuk Open Recruitment Warga Laboratorium Teknik Informatika di Universitas Trunojoyo Madura', '090411100056', 'MERLIEN N FEBRIYATI', 'TEKNIK INFORMATIKA'),
(1, 'Aplikasi Sistem Informasi Evaluasi Mutu Akademik dan Proses Pembelajaran Berbasis Android Studi Kasus Program Studi Teknik Informatika Universitas Tru', '100411100096', 'ASMUL FARSYADANI', 'TEKNIK INFORMATIKA'),
(8, 'Faktor-faktor yang Mempengaruhi Keputusan Mahasiswa Memilih Teknik Industri sebagai Program Studi', '120421100062', 'WIDIA HIKMAWATI', 'TEKNIK INDUSTRI'),
(7, 'Faktor-faktor yang Mempengaruhi Tingkat Kepuasan Mahasiswa terhadap Pelayanan Program Studi Teknik Industri UTM', '120421100064', 'ERDIANA EKA S D', 'TEKNIK INDUSTRI'),
(12, 'Optimasi Parameter Proses Pengelasan Terhadap Kekuatan Tarik Pengelasan pada Mesin Automated Welding dengan Metode Taguchi', '120421100018', 'DWI HARTANTO', 'TEKNIK INDUSTRI'),
(3, 'Pembuatan Aplikasi Olap (On-Line Analytical Processing) Tingkat Kelulusan Mahasiswa (Studi Kasus Fakultas Teknik Program Studi Teknik Informatika Univ', '100411100032', 'DEWI MUZAYYANA 	', 'TEKNIK INFORMATIKA'),
(10, 'Penentuan Kebijakan Perawatan Optimal pada Mesin Steam Turbine 105-JT dengan Pendekatan Reliabity Centered Maintenance (RCM) (Studi Kasus : PT. Petrok', '120421100098', 'HANDIK YULIANTO', 'TEKNIK INDUSTRI'),
(9, 'Penentuan Lokasi Distribution Center pada Supply Chain Industri Batik Pamekasan Madura (Studi Kasus : IKM Batik dan Retail)', '120421100029', 'NANANG ANDRIANTO', 'TEKNIK INDUSTRI'),
(5, 'Perancangan Sistem Informasi Pengelolaan Anggaran Berbasis Web Dinas Komunikasi dan Informatika Kabupaten Sumenep', '120241100005', 'SUHARTO', 'TEKNIK INFORMATIKA'),
(4, 'Sistem Pendukung Keputusan Penentuan Pegawai Berprestasi dengan Metode Weighted Product (WP) dan TOPSIS (Studi Kasus : Dinas Komunikasi dan Informatik', '120241100012', 'YULI RATNA SARI', 'TEKNIK INFORMATIKA'),
(11, 'Usulan Jadwal Perawatan Optimal pada Mesin Chrome dengan Metode Reliability Centered Maintenance (RCM) Studi Kasus PT. Hungsheng Kreasindo Gravure Ind', '120421100093', 'MOH. WISMOYO ARIS M', 'TEKNIK INDUSTRI');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_judul_ta`
--
ALTER TABLE `tbl_judul_ta`
  ADD PRIMARY KEY (`judul`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_judul_ta`
--
ALTER TABLE `tbl_judul_ta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
