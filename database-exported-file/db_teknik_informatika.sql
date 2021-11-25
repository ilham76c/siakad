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
-- Database: `db_teknik_informatika`
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
(9, '160411100154', 'TIK501', 'Analisa $ Perancangan Perangkat Lunak', 'WAHYUDI AGUSTIONNO, S.Kom.,M.Sc.,Ph.D.', 'B', 'W', 3),
(10, '160411100154', 'TIK502', 'Penambangan Data', 'MULA\'AB,S.Si.,M.Kom', 'E', 'W', 3),
(11, '160411100154', 'TIK506', 'Interaksi Manusia dan Komputer', 'AKHMAD TAJUDDIN S.Kom,T. MS,M.Kom', 'E', 'W', 2),
(12, '160411100154', 'TIK505', 'Pengolahan Citra', 'ROSIDA VIVIN NAHARI,S.Kom,.MT', 'B', 'W', 3),
(13, '160411100154', 'TIK101', 'Matematika', 'Mr. Karjito', 'B', 'W', 2),
(14, '160411100154', 'TIK301', 'Matematika Diskrit', 'FITRI DAMAYANTI, S.Kom., M.Kom.', 'D', 'W', 3);

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
(2, '130411100012', 'M. Catur Budi', 'TEKNIK INFORMATIKA', 'Jln. Junok', '22 April 1995', 'ISLAM', 'Laki-laki', 'SMK 2 BANGKALAN', '20 Agustus 2013', 'Sugiono', 'Astuti', 'Jln. Junok', 'Indonesia', 'Aktif'),
(1, '160411100154', 'Moh. Ilham Burhanuddin', 'TEKNIK INFORMATIKA', 'Kec. Sepulu, Kab. Bangakalan', 'Bangkalan, 09 Juni 1997', 'ISLAM', 'Laki-laki', 'MAN BANGKALAN', '02 juli 2016', 'H. Makmun', 'Masruroh', 'Kec. Sepulu, Kab. Bangkalan', 'Indonesia', 'Aktif');

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
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_matkul_semester_1`
--

INSERT INTO `tbl_matkul_semester_1` (`id`, `kode`, `matakuliah`, `dosen`, `kelas`, `wp`, `sks`) VALUES
(5, 'TIK102', 'Algoritma Pemrograman', 'Dr.INDAH AGUSTIEN SIRADJUDDIN, S.Kom., M.Kom', 'C', 'W', 4),
(6, 'TIK102', 'Algoritma Pemrograman', 'Dr.INDAH AGUSTIEN SIRADJUDDIN, S.Kom., M.Kom', 'D', 'W', 4),
(7, 'TIK102', 'Algoritma Pemrograman', 'SIGIT SUSANTO PUTRO, S.Kom., M.Kom.', 'E', 'W', 4),
(8, 'TIK102', 'Algoritma Pemrograman', 'EKA MALA SARI ROCHMAN, S.Kom.M.Kom', 'B', 'W', 4),
(9, 'TIK105', 'Bahasa Indonesia (Tata Tulis Karya Ilmiah)', 'Silvia Melati, M.Pd., ', 'B', 'W', 4),
(10, 'TIK105', 'Bahasa Indonesia (Tata Tulis Karya Ilmiah)', 'Silvia Melati, M.Pd.,', 'E', 'W', 2),
(11, 'TIK105', 'Bahasa Indonesia (Tata Tulis Karya Ilmiah)', 'Silvia Melati, M.Pd.,', 'A', 'W', 2),
(12, 'TIK105', 'Bahasa Indonesia (Tata Tulis Karya Ilmiah)', 'NAELUR ROHMAH, S.Pd., M.Pd.', 'D', 'W', 2),
(13, 'UNG110', 'Bahasa Inggris', 'Heriawan, S.Kom.,MT', 'A', 'W', 3),
(14, 'UNG110', 'Bahasa Inggris', 'Heriawan, S.Kom.,MT', 'B', 'W', 3),
(15, 'UNG110', 'Bahasa Inggris', 'Heriawan, S.Kom.,MT', 'C', 'W', 3),
(16, 'UNG110', 'Bahasa Inggris', 'Heriawan, S.Kom.,MT', 'D', 'W', 3),
(17, 'UNG110', 'Bahasa Inggris', 'Heriawan, S.Kom.,MT', 'E', 'W', 3),
(18, 'TIK104', 'Matematika', 'Waluyo, S.Kom.', 'A', 'W', 3),
(19, 'TIK104', 'Matematika', 'Waluyo, S.Kom.', 'B', 'W', 3),
(20, 'TIK104', 'Matematika', 'Waluyo, S.Kom.', 'C', 'W', 3),
(21, 'TIK104', 'Matematika', 'Waluyo, S.Kom.', 'C', 'W', 3),
(22, 'TIK104', 'Matematika', 'Waluyo, S.Kom.', 'D', 'W', 4),
(23, 'TIK103', 'Logika Informatika', 'IKA OKTAVIA SUZANTI, S.Kom.,M.Cs', 'A', 'W', 2),
(24, 'TIK103', 'Logika Informatika', 'IKA OKTAVIA SUZANTI, S.Kom.,M.Cs', 'B', 'W', 2),
(25, 'TIK103', 'Logika Informatika', 'IKA OKTAVIA SUZANTI, S.Kom.,M.Cs', 'C', 'W', 2),
(26, 'TIK103', 'Logika Informatika', 'IKA OKTAVIA SUZANTI, S.Kom.,M.Cs', 'D', 'W', 2),
(27, 'UNG101', 'Pendidikan Agama Islam', 'Soleh, S.Kom.', 'A', 'W', 3),
(28, 'UNG101', 'Pendidikan Agama Islam', 'Soleh, S.Kom.', 'B', 'W', 3),
(29, 'UNG101', 'Pendidikan Agama Islam', 'Soleh, S.Kom.', 'C', 'W', 2),
(30, 'UNG101', 'Pendidikan Agama Islam', 'Soleh, S.Kom.', 'D', 'W', 2),
(31, 'TIK101', 'Pengantar Informatika', 'ACHMAD JAUHARI, S.T., M.Kom.', 'A', 'W', 3),
(32, 'TIK101', 'Pengantar Informatika', 'ACHMAD JAUHARI, S.T., M.Kom.', 'B', 'W', 3),
(33, 'UNG101', 'Pengantar Informatika', 'IWAN SANTOSA, ST.,MT', 'E', 'W', 3),
(34, 'UNG110', 'Bahasa Inggris', 'MOH. SYIFAUDDIN, S.Pd.I. M.Pd', 'B', 'W', 3);

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
(1, 'TIK301', 'Matematika Diskrit', 'EZA RAHMANITA, ST.,MT', 'E', 'W', 3),
(2, 'TIK301', 'Matematika Diskrit', 'FITRI DAMAYANTI, S.Kom., M.Kom.', 'C', 'W', 3),
(3, 'TIK301', 'Matematika Diskrit', 'FITRI DAMAYANTI, S.Kom., M.Kom.', 'D', 'W', 3),
(4, 'TIK301', 'Matematika Diskrit', 'FITRI DAMAYANTI, S.Kom., M.Kom.', 'D', 'W', 3),
(8, 'TIK303', 'Pemrograman Berorientasi Objek', 'ARIK KURNIAWATI, S.Kom., M.T', 'A', 'W', 4),
(9, 'TIK303', 'Pemrograman Berorientasi Objek', 'ARIK KURNIAWATI, S.Kom., M.T', 'B', 'W', 4),
(10, 'TIK303', 'Pemrograman Berorientasi Objek', 'Moh. Kautsar Sophan, , S.Kom., M.MT', 'C', 'W', 4),
(11, 'TIK303', 'Pemrograman Berorientasi Objek', 'Moh. Kautsar Sophan, , S.Kom., M.MT', 'D', 'W', 4),
(12, 'TIK306', 'Pemrograman Desktop', 'YONATHAN FERRY HENDRAWAN, ST., MIT.', 'E', 'W', 4),
(13, 'TIK306', 'Pemrograman Desktop', 'YONATHAN FERRY HENDRAWAN, ST., MIT.', 'B', 'W', 4),
(14, 'TIK306', 'Pemrograman Desktop', 'YONATHAN FERRY HENDRAWAN, ST., MIT.', 'C', 'W', 4),
(15, 'TIK306', 'Pemrograman Desktop', 'Moh. Kautsar Sophan, , S.Kom., M.MT', 'D', 'W', 4),
(16, 'TIK306', 'Pemrograman Desktop', 'YOGA DWITYA PRAMUDITA, S.Kom., M.Cs.', 'A', 'W', 4);

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
-- Dumping data untuk tabel `tbl_transkrip_nilai`
--

INSERT INTO `tbl_transkrip_nilai` (`nim`, `semester`, `kode`, `matakuliah`, `sks`, `nilai`) VALUES
('160411100154', 'Gasal 2016/2017', 'TIK101', 'Pengantar Informatika', 3, 'B+'),
('160411100154', 'Gasal 2016/2017', 'TIK105', 'Bahasa Indonesia', 2, 'B+'),
('160411100154', 'Genap 2016/2107', 'TIK201', 'Dasar Pemrograman Web', 4, 'A'),
('160411100154', 'Genap 2016/2107', 'TIK202', 'Struktur Data', 4, 'B+'),
('160411100154', 'Genap 2016/2107', 'TIK203', 'Organisasi Komputer', 3, 'A'),
('160411100154', 'Gasal 2016/2017', 'UNG101', 'Pendidikan Agama Islam', 3, 'B'),
('160411100154', 'Gasal 2016/2017', 'UNG110', 'Bahasa Inggris', 3, 'A');

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
-- Indeks untuk tabel `tbl_transkrip_nilai`
--
ALTER TABLE `tbl_transkrip_nilai`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_1`
--
ALTER TABLE `tbl_matkul_semester_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_2`
--
ALTER TABLE `tbl_matkul_semester_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_matkul_semester_3`
--
ALTER TABLE `tbl_matkul_semester_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
