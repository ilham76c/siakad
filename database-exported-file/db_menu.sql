-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Des 2018 pada 13.18
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
-- Database: `db_menu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu_admin`
--

CREATE TABLE `tbl_menu_admin` (
  `id` int(11) NOT NULL,
  `menu` varchar(20) NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `sub` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu_admin`
--

INSERT INTO `tbl_menu_admin` (`id`, `menu`, `icon`, `link`, `sub`) VALUES
(5, 'Data Mahasiswa', 'fa fa-database', '#', 'yes'),
(2, 'Kelola Akun', 'fa fa-users', '#', 'yes'),
(7, 'Kelola Judul TA', 'fa fa-list', '#', 'yes'),
(3, 'Kelola Matakuliah', 'fa fa-book', '#', 'yes'),
(9, 'Kelola Menu', 'fa fa-edit', '#', 'yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu_user`
--

CREATE TABLE `tbl_menu_user` (
  `id` int(11) NOT NULL,
  `menu` varchar(20) NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `sub` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu_user`
--

INSERT INTO `tbl_menu_user` (`id`, `menu`, `icon`, `link`, `sub`) VALUES
(1, 'Dashboard', 'fa fa-dashboard', 'index.php', 'no'),
(3, 'Informasi Matakuliah', 'fa fa-info', 'InformasiMatakuliah.php', 'no'),
(7, 'Judul Tugas Akhir', 'fa fa-tasks', 'JudulTugasAkhir.php', 'no'),
(5, 'Kartu Hasil Studi', 'fa fa-book', 'KartuHasilStudi.php', 'no'),
(4, 'Kartu Rencana Studi', 'fa fa-file-text', 'KartuRencanaStudi.php', 'no'),
(2, 'Profil', 'fa fa-user', 'profil.php', 'no'),
(6, 'Transkrip Nilai', 'fa fa-list-alt', 'TranskripNilai.php', 'no'),
(9, 'Ubah Password', 'fa fa-wrench', 'UbahPassword.php', 'no');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_submenu_admin`
--

CREATE TABLE `tbl_submenu_admin` (
  `menu` varchar(20) NOT NULL,
  `submenu` varchar(20) NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_submenu_admin`
--

INSERT INTO `tbl_submenu_admin` (`menu`, `submenu`, `icon`, `link`) VALUES
('Kelola Akun', 'Edit Akun', 'fa fa-edit', 'EditAkun.php'),
('Kelola Matakuliah', 'Edit Matakuliah', 'fa fa-edit', 'EditMatakuliah.php'),
('Kelola Akun', 'Hapus Akun', 'fa fa-remove', 'HapusAkun.php'),
('Data Mahasiswa', 'Hapus Data', 'fa fa-remove', 'HapusData.php'),
('Kelola Judul TA', 'Hapus Judul', 'fa fa-remove', 'HapusJudulTA.php'),
('Kelola Matakuliah', 'Hapus Matakuliah', 'fa fa-remove', 'HapusMatakuliah.php'),
('Kelola Menu', 'Hapus Menu', 'fa fa-remove', 'HapusMenu.php'),
('Kelola Akun', 'Tambah Akun', 'fa fa-plus', 'TambahAkun.php'),
('Data Mahasiswa', 'Tambah Data', 'fa fa-plus', 'TambahData.php'),
('Kelola Judul TA', 'Tambah Judul', 'fa fa-plus', 'TambahJudulTA.php'),
('Kelola Matakuliah', 'Tambah Matakuliah', 'fa fa-plus', 'TambahMatakuliah.php'),
('Kelola Menu', 'Tambah Menu', 'fa fa-plus', 'TambahMenu.php');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_submenu_user`
--

CREATE TABLE `tbl_submenu_user` (
  `menu` varchar(20) DEFAULT NULL,
  `submenu` varchar(20) NOT NULL,
  `icon` varchar(15) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_menu_admin`
--
ALTER TABLE `tbl_menu_admin`
  ADD PRIMARY KEY (`menu`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_menu_user`
--
ALTER TABLE `tbl_menu_user`
  ADD PRIMARY KEY (`menu`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indeks untuk tabel `tbl_submenu_admin`
--
ALTER TABLE `tbl_submenu_admin`
  ADD PRIMARY KEY (`submenu`),
  ADD KEY `menu` (`menu`);

--
-- Indeks untuk tabel `tbl_submenu_user`
--
ALTER TABLE `tbl_submenu_user`
  ADD PRIMARY KEY (`submenu`),
  ADD KEY `menu` (`menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_menu_admin`
--
ALTER TABLE `tbl_menu_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu_user`
--
ALTER TABLE `tbl_menu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_submenu_admin`
--
ALTER TABLE `tbl_submenu_admin`
  ADD CONSTRAINT `tbl_submenu_admin_ibfk_1` FOREIGN KEY (`menu`) REFERENCES `tbl_menu_admin` (`menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_submenu_user`
--
ALTER TABLE `tbl_submenu_user`
  ADD CONSTRAINT `tbl_submenu_user_ibfk_1` FOREIGN KEY (`menu`) REFERENCES `tbl_menu_user` (`menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
