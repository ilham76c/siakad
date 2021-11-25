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
-- Database: `db_teknik_industri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `id` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `wp` char(1) DEFAULT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_krs`
--

INSERT INTO `tbl_krs` (`id`, `nim`, `kode`, `matakuliah`, `dosen`, `kelas`, `wp`, `sks`) VALUES
(1, '160311100150', 'UNG110', 'Bahasa Inggris', 'MOH. SYIFAUDDIN, S.Pd.I. M.Pd', 'A', 'W', 3),
(2, '160311100150', 'UNG110', 'Bahasa Inggris', 'MOH. SYIFAUDDIN, S.Pd.I. M.Pd', 'C', 'W', 3),
(3, '160311100150', 'TID101', 'FISIKA DASAR I', 'ANIS ARENDRA, ST. M.Eng', 'A', 'W', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `ttl` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `slta` varchar(50) NOT NULL,
  `tgl_daftar` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `alamat_ortu` varchar(50) DEFAULT NULL,
  `warga_negara` varchar(50) NOT NULL,
  `status_` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id`, `nim`, `nama`, `jurusan`, `alamat`, `ttl`, `agama`, `jenis_kelamin`, `slta`, `tgl_daftar`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `warga_negara`, `status_`) VALUES
(1, '160311100150', 'Abdul Ghofur', 'TEKNIK INDUSTRI', 'Desa Pangpong, Kec. Labang', 'Bangkalan, 08 Januari 1995', 'Islam', 'Laki-laki', 'SMAK 1 BANGKALAN', '02 Juli 2014', 'H. Mael Lincah', 'Ima Pikachu', 'Desa Pangpong, Kec. Labang', 'Indonesia', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkul_semester_1`
--

CREATE TABLE `tbl_matkul_semester_1` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `dosen` varchar(50) DEFAULT NULL,
  `kelas` varchar(10) NOT NULL,
  `wp` char(1) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_matkul_semester_1`
--

INSERT INTO `tbl_matkul_semester_1` (`id`, `kode`, `matakuliah`, `dosen`, `kelas`, `wp`, `sks`) VALUES
(1, 'UNG110', 'Bahasa Inggris', 'MOH. SYIFAUDDIN, S.Pd.I. M.Pd', 'A', 'W', 3),
(2, 'UNG110', 'Bahasa Inggris', 'MOH. SYIFAUDDIN, S.Pd.I. M.Pd', 'C', 'W', 3),
(3, 'TID101', 'FISIKA DASAR I', 'ANIS ARENDRA, ST. M.Eng', 'A', 'W', 3),
(4, 'TID101', 'FISIKA DASAR I', 'ANIS ARENDRA, ST. M.Eng', 'B', 'W', 3),
(5, 'TID102', 'KALKULUS I', 'Shofi Fitrotis Salimah, ST., MT.', 'D', 'W', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkul_semester_2`
--

CREATE TABLE `tbl_matkul_semester_2` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `dosen` varchar(50) DEFAULT NULL,
  `kelas` varchar(10) NOT NULL,
  `wp` char(1) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkul_semester_3`
--

CREATE TABLE `tbl_matkul_semester_3` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `dosen` varchar(50) DEFAULT NULL,
  `kelas` varchar(10) NOT NULL,
  `wp` char(1) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_matkul_semester_3`
--

INSERT INTO `tbl_matkul_semester_3` (`id`, `kode`, `matakuliah`, `dosen`, `kelas`, `wp`, `sks`) VALUES
(1, 'TID308', 'ALGORITMA DAN PEMROGRAMAN KOMPUTER', 'ACHMAD YASID, S.Kom. M.Kom', 'B', 'W', 3),
(2, 'TID308', 'ALGORITMA DAN PEMROGRAMAN KOMPUTER', 'ACHMAD YASID, S.Kom. M.Kom', 'A', 'W', 3),
(3, 'TID308', 'ALGORITMA DAN PEMROGRAMAN KOMPUTER', 'ACHMAD YASID, S.Kom. M.Kom', 'C', 'W', 3),
(4, 'TID302', 'DASAR PERANCANGAN TEKNIK INDUSTRI', 'MUALIM, ST., MT.', 'A', 'W', 2),
(5, 'TID302', 'DASAR PERANCANGAN TEKNIK INDUSTRI', 'ANIS ARENDRA, ST. M.Eng', 'B', 'W', 2),
(6, 'TID302', 'DASAR PERANCANGAN TEKNIK INDUSTRI', 'SABARUDIN AKHMAD, ST., MT.', 'C', 'W', 2),
(7, 'TID302', 'DASAR PERANCANGAN TEKNIK INDUSTRI', 'S.TRULLIE ANNISA, M.T', 'D', 'W', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkul_semester_4`
--

CREATE TABLE `tbl_matkul_semester_4` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `dosen` varchar(50) DEFAULT NULL,
  `kelas` varchar(10) NOT NULL,
  `wp` char(1) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkul_semester_5`
--

CREATE TABLE `tbl_matkul_semester_5` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `dosen` varchar(50) DEFAULT NULL,
  `kelas` varchar(10) NOT NULL,
  `wp` char(1) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_matkul_semester_5`
--

INSERT INTO `tbl_matkul_semester_5` (`id`, `kode`, `matakuliah`, `dosen`, `kelas`, `wp`, `sks`) VALUES
(1, 'TID503', 'PENELITIAN OPERASIONAL II', 'IKA DEEFI ANNA, ST. MT', 'A', 'W', 3),
(2, 'TID503', 'PENELITIAN OPERASIONAL II', 'HERI AWALUL ILHAMSYAH, ST., MT.', 'B', 'W', 3),
(3, 'TID503', 'PENELITIAN OPERASIONAL II', 'IKA DEEFI ANNA, ST. MT', 'D', 'W', 3),
(4, 'TID503', 'PENELITIAN OPERASIONAL II', 'HERI AWALUL ILHAMSYAH, ST., MT.', 'C', 'W', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkul_semester_6`
--

CREATE TABLE `tbl_matkul_semester_6` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `dosen` varchar(50) DEFAULT NULL,
  `kelas` varchar(10) NOT NULL,
  `wp` char(1) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkul_semester_7`
--

CREATE TABLE `tbl_matkul_semester_7` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `dosen` varchar(50) DEFAULT NULL,
  `kelas` varchar(10) NOT NULL,
  `wp` char(1) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkul_semester_8`
--

CREATE TABLE `tbl_matkul_semester_8` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `dosen` varchar(50) DEFAULT NULL,
  `kelas` varchar(10) NOT NULL,
  `wp` char(1) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transkrip_nilai`
--

CREATE TABLE `tbl_transkrip_nilai` (
  `nim` varchar(12) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `matakuliah` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `nilai` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transkrip_nilai`
--

INSERT INTO `tbl_transkrip_nilai` (`nim`, `semester`, `kode`, `matakuliah`, `sks`, `nilai`) VALUES
('160311100150', 'Gasal 2016/2017', 'UNG110', 'BAHASA INGGRIS', 3, 'B+'),
('160311100150', 'Gasal 2016/2017', 'TID101', 'FISIKA DASAR I', 3, 'A'),
('160311100150', 'Gasal 2016/2017', 'TID102', 'KALKULUS I', 3, 'B'),
('160311100150', 'Gasal 2016/2017', 'UNG110', 'MENGGAMBAR TEKNIK', 3, 'C+'),
('160311100150', 'Gasal 2016/2017', 'UNG110', 'BAHASA INGGRIS', 3, 'B+'),
('160311100150', 'Gasal 2016/2017', 'TID101', 'FISIKA DASAR I', 3, 'A'),
('160311100150', 'Gasal 2016/2017', 'TID102', 'KALKULUS I', 3, 'B'),
('160311100150', 'Gasal 2016/2017', 'UNG110', 'MENGGAMBAR TEKNIK', 3, 'C+');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_matkul_semester_1`
--
ALTER TABLE `tbl_matkul_semester_1`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_matkul_semester_2`
--
ALTER TABLE `tbl_matkul_semester_2`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_matkul_semester_3`
--
ALTER TABLE `tbl_matkul_semester_3`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_matkul_semester_4`
--
ALTER TABLE `tbl_matkul_semester_4`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_matkul_semester_5`
--
ALTER TABLE `tbl_matkul_semester_5`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_matkul_semester_6`
--
ALTER TABLE `tbl_matkul_semester_6`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_matkul_semester_7`
--
ALTER TABLE `tbl_matkul_semester_7`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_matkul_semester_8`
--
ALTER TABLE `tbl_matkul_semester_8`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_1`
--
ALTER TABLE `tbl_matkul_semester_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_2`
--
ALTER TABLE `tbl_matkul_semester_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_3`
--
ALTER TABLE `tbl_matkul_semester_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_4`
--
ALTER TABLE `tbl_matkul_semester_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_5`
--
ALTER TABLE `tbl_matkul_semester_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_6`
--
ALTER TABLE `tbl_matkul_semester_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_7`
--
ALTER TABLE `tbl_matkul_semester_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_8`
--
ALTER TABLE `tbl_matkul_semester_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
