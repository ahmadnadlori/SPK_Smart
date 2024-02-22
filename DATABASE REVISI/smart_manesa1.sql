-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2023 pada 10.58
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_manesa1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `smart_akun`
--

CREATE TABLE `smart_akun` (
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` enum('operator','wali kelas','wakasek','kepala sekolah') NOT NULL DEFAULT 'operator'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `smart_akun`
--

INSERT INTO `smart_akun` (`username`, `password`, `akses`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'operator'),
('kepsek', '21232f297a57a5a743894a0e4a801fc3', 'kepala sekolah'),
('wakasek', '21232f297a57a5a743894a0e4a801fc3', 'wakasek'),
('wali kelas', '21232f297a57a5a743894a0e4a801fc3', 'wali kelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `smart_alternatif`
--

CREATE TABLE `smart_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `no_kk` bigint(20) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `hasil_alternatif` double NOT NULL,
  `ket_alternatif` varchar(8) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `smart_alternatif`
--

INSERT INTO `smart_alternatif` (`id_alternatif`, `id_tahun_akademik`, `no_kk`, `nama_alternatif`, `hasil_alternatif`, `ket_alternatif`, `id_kelas`) VALUES
(1224, 1, 45392414, 'FADIL PRIYANGAN', 55, 'ditolak', 1),
(1225, 1, 3053398546, 'DIAN PUTRI APSARI', 0, 'ditolak', 1),
(1226, 1, 51653134, 'DINDA SHALSA AGISTIE', 0, 'ditolak', 1),
(1227, 1, 44782853, 'GISHELA NUR FAUZIAH', 0, 'ditolak', 1),
(1228, 1, 51491400, 'REGHINA FAKHIRA SALSABILA', 0, 'ditolak', 1),
(1229, 1, 45271985, 'IKAWATI', 0, 'ditolak', 1),
(1230, 1, 60135099, 'TRIE AMALIA HANDAYANI', 0, 'ditolak', 1),
(1231, 1, 45874004, 'ANIS DESTIAWATI', 0, 'ditolak', 1),
(1232, 1, 58752267, 'DEWI SYIFAURAHMAH', 0, 'ditolak', 1),
(1233, 1, 45774221, 'NENG RESTI NURAENI', 0, 'ditolak', 1),
(1234, 1, 45874020, 'STEVFANY DWI LESMANA', 0, 'ditolak', 2),
(1235, 1, 69851412, 'JENI APRIANI', 0, 'ditolak', 2),
(1236, 1, 51491406, 'Mar\'atin Solihah', 0, 'ditolak', 2),
(1237, 1, 43501943, 'SASKYA OKTAVY', 0, 'ditolak', 2),
(1238, 1, 51491207, 'ANANDA SALSABILA', 0, 'ditolak', 2),
(1239, 1, 45392266, 'ZIHAN NUR ADINDA', 0, 'ditolak', 2),
(1240, 1, 52294985, 'MAWAR AULIA MALIK', 0, 'ditolak', 2),
(1241, 1, 59802408, 'Clara Septia Chonsa Fauziyah', 0, 'ditolak', 2),
(1242, 1, 57885715, 'DIENISA ETKA MAHARANI ZAKARA', 0, 'ditolak', 2),
(1243, 1, 52944734, 'RISMA NUR AZIZAH', 0, 'ditolak', 2),
(1244, 1, 51653349, 'ENDAH TANIA NUROHMAH', 0, 'ditolak', 3),
(1245, 1, 45873955, 'Anggis Tiara Hani', 0, 'ditolak', 3),
(1246, 1, 45874025, 'TAMARA DWI NOVIA ANDINI', 0, 'ditolak', 3),
(1247, 1, 51490891, 'Elis Nurcholizah', 0, 'ditolak', 3),
(1248, 1, 45873954, 'Siti Nuraiyni', 0, 'ditolak', 3),
(1249, 1, 51491559, 'Rahmy Alisia Nurazizah', 0, 'ditolak', 3),
(1250, 1, 45874028, 'YEFI NURHALISAH', 0, 'ditolak', 3),
(1251, 1, 51491550, 'ENGELINA FEBRIYANTI', 0, 'ditolak', 3),
(1252, 1, 3046341287, 'ZAHRA APRILIANA MAUDHY', 0, 'ditolak', 3),
(1253, 1, 48363588, 'DEWI KHODIJAH', 0, 'ditolak', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `smart_alternatif_kriteria`
--

CREATE TABLE `smart_alternatif_kriteria` (
  `id_smart_alternatif_kriteria` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_alternatif_kriteria` double NOT NULL,
  `bobot_alternatif_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `smart_alternatif_kriteria`
--

INSERT INTO `smart_alternatif_kriteria` (`id_smart_alternatif_kriteria`, `id_tahun_akademik`, `id_alternatif`, `id_kriteria`, `nilai_alternatif_kriteria`, `bobot_alternatif_kriteria`) VALUES
(351, 1, 1224, 124, 75, 30),
(352, 1, 1224, 125, 50, 15),
(353, 1, 1224, 128, 100, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `smart_kelas`
--

CREATE TABLE `smart_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `smart_kelas`
--

INSERT INTO `smart_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'XII IPA 1'),
(2, 'XII IPA 2'),
(3, 'XII IPA 3'),
(4, 'XII IPA 4'),
(5, 'XII IPA 5'),
(6, 'XII IPS 1'),
(7, 'XII IPS 2'),
(8, 'XII IPS 3'),
(9, 'XII IPS 4'),
(10, 'XII IPS 5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `smart_kriteria`
--

CREATE TABLE `smart_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `bobot_normalisasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `smart_kriteria`
--

INSERT INTO `smart_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `bobot_normalisasi`) VALUES
(124, 'Nilai Rata-rata Raport', 4, 0.4),
(125, 'Nilai Ujian Sekolah', 3, 0.3),
(126, 'Nilai Ekstrakulikuler', 1, 0.1),
(127, 'Nilai Prestasi', 1, 0.1),
(128, 'Nilai Presensi Kehadiran', 1, 0.1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `smart_sub_kriteria`
--

CREATE TABLE `smart_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `nama_sub_kriteria` varchar(50) NOT NULL,
  `nilai_sub_kriteria` double NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `smart_sub_kriteria`
--

INSERT INTO `smart_sub_kriteria` (`id_sub_kriteria`, `nama_sub_kriteria`, `nilai_sub_kriteria`, `id_kriteria`) VALUES
(4, 'Nilai Rata-rata >=91', 100, 124),
(5, 'Nilai Rata-rata 86-90', 75, 124),
(6, 'Nilai Rata-rata 81-85', 50, 124),
(7, 'Nilai Rata-rata 76-80', 25, 124),
(8, 'Nilai Rata-rata <=75', 0, 124),
(9, 'Nilai Rata-rata >=91', 100, 125),
(10, 'Nilai Rata-rata 86-90', 75, 125),
(11, 'Nilai Rata-rata 81-85', 50, 125),
(12, 'Nilai Rata-rata 76-80', 25, 125),
(13, 'Nilai Rata-rata <=75', 0, 125),
(14, 'Ketua Ekstrakulikuler', 100, 126),
(15, 'Wakil Ketua Ekstrakulikuler', 75, 126),
(16, 'Badan Pengurus Harian Ekstrakulikuler', 50, 126),
(17, 'Anggota Ekstrakulikuler', 25, 126),
(18, 'Tidak mengikuti Kegiatan Ekstrakulikuler', 0, 126),
(19, 'Mendapatkan 4 Prestasi atau lebih', 100, 127),
(20, 'Mendapatkan 3 Prestasi', 75, 127),
(21, 'Mendapatkan 2 Prestasi', 50, 127),
(22, 'Mendapatkan 1 Prestasi', 25, 127),
(23, 'Tidak Mendapatkan Prestasi', 0, 127),
(24, 'Presensi Kehadiran >=91%', 100, 128),
(25, 'Presensi Kehadiran 86-90%', 75, 128),
(26, 'Presensi Kehadiran 81-85%', 50, 128),
(27, 'Presensi Kehadiran 76-80%', 25, 128),
(28, 'Presensi Kehadiran <75%', 0, 128);

-- --------------------------------------------------------

--
-- Struktur dari tabel `smart_tahun_akademik`
--

CREATE TABLE `smart_tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `smart_tahun_akademik`
--

INSERT INTO `smart_tahun_akademik` (`id_tahun_akademik`, `tahun`, `status`) VALUES
(1, '2023', 1),
(2, '2024', 0),
(4, '2025', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `smart_akun`
--
ALTER TABLE `smart_akun`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- Indeks untuk tabel `smart_alternatif`
--
ALTER TABLE `smart_alternatif`
  ADD PRIMARY KEY (`id_alternatif`) USING BTREE;

--
-- Indeks untuk tabel `smart_alternatif_kriteria`
--
ALTER TABLE `smart_alternatif_kriteria`
  ADD PRIMARY KEY (`id_smart_alternatif_kriteria`) USING BTREE,
  ADD KEY `id_kriteria` (`id_kriteria`) USING BTREE,
  ADD KEY `id_alternatif` (`id_alternatif`) USING BTREE;

--
-- Indeks untuk tabel `smart_kelas`
--
ALTER TABLE `smart_kelas`
  ADD PRIMARY KEY (`id_kelas`) USING BTREE;

--
-- Indeks untuk tabel `smart_kriteria`
--
ALTER TABLE `smart_kriteria`
  ADD PRIMARY KEY (`id_kriteria`) USING BTREE;

--
-- Indeks untuk tabel `smart_sub_kriteria`
--
ALTER TABLE `smart_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`) USING BTREE,
  ADD KEY `id_kriteria` (`id_kriteria`) USING BTREE,
  ADD KEY `id_kriteria_2` (`id_kriteria`) USING BTREE;

--
-- Indeks untuk tabel `smart_tahun_akademik`
--
ALTER TABLE `smart_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `smart_alternatif`
--
ALTER TABLE `smart_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1268;

--
-- AUTO_INCREMENT untuk tabel `smart_alternatif_kriteria`
--
ALTER TABLE `smart_alternatif_kriteria`
  MODIFY `id_smart_alternatif_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT untuk tabel `smart_kelas`
--
ALTER TABLE `smart_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `smart_kriteria`
--
ALTER TABLE `smart_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `smart_sub_kriteria`
--
ALTER TABLE `smart_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `smart_tahun_akademik`
--
ALTER TABLE `smart_tahun_akademik`
  MODIFY `id_tahun_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `smart_alternatif_kriteria`
--
ALTER TABLE `smart_alternatif_kriteria`
  ADD CONSTRAINT `smart_alternatif_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `smart_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `smart_alternatif_kriteria_ibfk_2` FOREIGN KEY (`id_alternatif`) REFERENCES `smart_alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `smart_sub_kriteria`
--
ALTER TABLE `smart_sub_kriteria`
  ADD CONSTRAINT `smart_sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `smart_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
