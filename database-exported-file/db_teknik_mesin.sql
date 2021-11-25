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
-- Database: `db_teknik_mesin`
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
(1, '160211100123', 'Asyrof', 'TEKNIK MESIN', 'Desa Pangpong, Kec. Labang', 'Bangkalan, 08 Agustus 1998', 'Islam', 'Laki-laki', 'SMA 1 KAMAL', '02 Juli 2016', 'Sugiono', 'Hayati', 'Desa Pangpong, Kec. Labang', 'Indonesia', 'Aktif'),
(2, '160311100154', 'Perjaka Sakti', 'TEKNIK MESIN', 'Desa Kamal', '2-Januari-1980', 'ISLAM', 'Laki-laki', 'SMA 1 BANGKALAN', '3-Maret-2010', 'SUKIMAN', 'NUR', 'Desa Kamal', 'Indonesia', 'Aktif');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_1`
--
ALTER TABLE `tbl_matkul_semester_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_2`
--
ALTER TABLE `tbl_matkul_semester_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_3`
--
ALTER TABLE `tbl_matkul_semester_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_4`
--
ALTER TABLE `tbl_matkul_semester_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_5`
--
ALTER TABLE `tbl_matkul_semester_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
