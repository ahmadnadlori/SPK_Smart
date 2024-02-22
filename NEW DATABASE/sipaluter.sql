-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Mei 2023 pada 05.37
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipaluter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `smart_akun`
--

CREATE TABLE IF NOT EXISTS `smart_akun` (
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

CREATE TABLE IF NOT EXISTS `smart_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `no_kk` bigint(20) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `hasil_alternatif` double NOT NULL,
  `ket_alternatif` varchar(8) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1232 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `smart_alternatif`
--

INSERT INTO `smart_alternatif` (`id_alternatif`, `id_tahun_akademik`, `no_kk`, `nama_alternatif`, `hasil_alternatif`, `ket_alternatif`, `id_kelas`) VALUES
(1208, 1, 20130909, 'Galih Kharismawan', 55, 'ditolak', 1),
(1209, 1, 20190910, 'Ahmad Firdaus', 75, 'diterima', 2),
(1210, 1, 20190911, 'Rohmat Pangestu', 85, 'diterima', 6),
(1211, 1, 20190912, 'Rafif abdur', 100, 'diterima', 10),
(1212, 1, 20190913, 'Dedi Wirawan', 30, 'ditolak', 3),
(1219, 1, 1233214434242313, 'tiyem', 50, 'ditolak', 0),
(1220, 1, 20190914, 'Tria Febriana', 35, 'ditolak', 4),
(1221, 1, 20190915, 'Fadly Gimnastiar', 55, 'ditolak', 5),
(1222, 1, 20190917, 'Edward Jamhuri', 55, 'ditolak', 7),
(1223, 1, 20190918, 'Pipit Pitria', 62.5, 'ditolak', 8),
(1224, 1, 20190919, 'Anin Nurjanah', 55, 'ditolak', 9),
(1227, 1, 1, '1', 50, 'ditolak', 1),
(1229, 2, 99999, 'siswa 1', 25, 'ditolak', 1),
(1231, 2, 888888, 'siswa 2', 50, 'ditolak', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `smart_alternatif_kriteria`
--

CREATE TABLE IF NOT EXISTS `smart_alternatif_kriteria` (
  `id_smart_alternatif_kriteria` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_alternatif_kriteria` double NOT NULL,
  `bobot_alternatif_kriteria` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=348 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `smart_alternatif_kriteria`
--

INSERT INTO `smart_alternatif_kriteria` (`id_smart_alternatif_kriteria`, `id_tahun_akademik`, `id_alternatif`, `id_kriteria`, `nilai_alternatif_kriteria`, `bobot_alternatif_kriteria`) VALUES
(270, 0, 1209, 124, 100, 40),
(271, 0, 1209, 125, 75, 22.5),
(272, 0, 1209, 126, 25, 2.5),
(273, 0, 1209, 127, 50, 5),
(274, 0, 1209, 128, 50, 5),
(275, 0, 1210, 124, 100, 40),
(276, 0, 1210, 125, 100, 30),
(277, 0, 1210, 126, 25, 2.5),
(278, 0, 1210, 127, 50, 5),
(279, 0, 1210, 128, 75, 7.5),
(280, 0, 1211, 124, 100, 40),
(281, 0, 1211, 125, 100, 30),
(282, 0, 1211, 126, 100, 10),
(283, 0, 1211, 127, 100, 10),
(284, 0, 1211, 128, 100, 10),
(285, 0, 1212, 124, 25, 10),
(286, 0, 1212, 125, 25, 7.5),
(287, 0, 1212, 128, 25, 2.5),
(288, 0, 1212, 126, 50, 5),
(289, 0, 1212, 127, 50, 5),
(290, 0, 1219, 124, 50, 20),
(291, 0, 1219, 125, 75, 22.5),
(292, 0, 1219, 126, 0, 0),
(293, 0, 1219, 127, 0, 0),
(294, 0, 1219, 128, 75, 7.5),
(295, 0, 1220, 124, 25, 10),
(296, 0, 1220, 125, 50, 15),
(297, 0, 1220, 126, 0, 0),
(298, 0, 1220, 127, 25, 2.5),
(299, 0, 1220, 128, 75, 7.5),
(300, 0, 1221, 124, 50, 20),
(301, 0, 1221, 125, 75, 22.5),
(302, 0, 1221, 126, 25, 2.5),
(303, 0, 1221, 127, 0, 0),
(304, 0, 1221, 128, 100, 10),
(308, 0, 1222, 124, 75, 30),
(309, 0, 1222, 125, 50, 15),
(310, 0, 1222, 126, 25, 2.5),
(311, 0, 1222, 127, 0, 0),
(312, 0, 1222, 128, 75, 7.5),
(313, 0, 1223, 124, 50, 20),
(314, 0, 1223, 125, 100, 30),
(315, 0, 1223, 126, 25, 2.5),
(316, 0, 1223, 127, 0, 0),
(317, 0, 1223, 128, 100, 10),
(323, 0, 1208, 124, 75, 30),
(324, 0, 1208, 125, 50, 15),
(325, 0, 1208, 126, 25, 2.5),
(326, 0, 1208, 127, 0, 0),
(327, 0, 1208, 128, 75, 7.5),
(328, 0, 1224, 124, 50, 20),
(329, 0, 1224, 125, 75, 22.5),
(330, 0, 1224, 126, 25, 2.5),
(331, 0, 1224, 127, 25, 2.5),
(332, 0, 1224, 128, 75, 7.5),
(333, 1, 1227, 124, 25, 10),
(334, 1, 1227, 125, 100, 30),
(335, 1, 1227, 126, 25, 2.5),
(336, 1, 1227, 127, 25, 2.5),
(337, 1, 1227, 128, 50, 5),
(338, 2, 1229, 124, 25, 10),
(339, 2, 1229, 125, 25, 7.5),
(340, 2, 1229, 126, 25, 2.5),
(341, 2, 1229, 127, 25, 2.5),
(342, 2, 1229, 128, 25, 2.5),
(343, 2, 1231, 124, 50, 20),
(344, 2, 1231, 125, 50, 15),
(345, 2, 1231, 126, 50, 5),
(346, 2, 1231, 127, 50, 5),
(347, 2, 1231, 128, 50, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `smart_kelas`
--

CREATE TABLE IF NOT EXISTS `smart_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

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

CREATE TABLE IF NOT EXISTS `smart_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `bobot_normalisasi` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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

CREATE TABLE IF NOT EXISTS `smart_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `nama_sub_kriteria` varchar(50) NOT NULL,
  `nilai_sub_kriteria` double NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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

CREATE TABLE IF NOT EXISTS `smart_tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
-- Indexes for table `smart_akun`
--
ALTER TABLE `smart_akun`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- Indexes for table `smart_alternatif`
--
ALTER TABLE `smart_alternatif`
  ADD PRIMARY KEY (`id_alternatif`) USING BTREE;

--
-- Indexes for table `smart_alternatif_kriteria`
--
ALTER TABLE `smart_alternatif_kriteria`
  ADD PRIMARY KEY (`id_smart_alternatif_kriteria`) USING BTREE,
  ADD KEY `id_kriteria` (`id_kriteria`) USING BTREE,
  ADD KEY `id_alternatif` (`id_alternatif`) USING BTREE;

--
-- Indexes for table `smart_kelas`
--
ALTER TABLE `smart_kelas`
  ADD PRIMARY KEY (`id_kelas`) USING BTREE;

--
-- Indexes for table `smart_kriteria`
--
ALTER TABLE `smart_kriteria`
  ADD PRIMARY KEY (`id_kriteria`) USING BTREE;

--
-- Indexes for table `smart_sub_kriteria`
--
ALTER TABLE `smart_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`) USING BTREE,
  ADD KEY `id_kriteria` (`id_kriteria`) USING BTREE,
  ADD KEY `id_kriteria_2` (`id_kriteria`) USING BTREE;

--
-- Indexes for table `smart_tahun_akademik`
--
ALTER TABLE `smart_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smart_alternatif`
--
ALTER TABLE `smart_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1232;
--
-- AUTO_INCREMENT for table `smart_alternatif_kriteria`
--
ALTER TABLE `smart_alternatif_kriteria`
  MODIFY `id_smart_alternatif_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=348;
--
-- AUTO_INCREMENT for table `smart_kelas`
--
ALTER TABLE `smart_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `smart_kriteria`
--
ALTER TABLE `smart_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `smart_sub_kriteria`
--
ALTER TABLE `smart_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `smart_tahun_akademik`
--
ALTER TABLE `smart_tahun_akademik`
  MODIFY `id_tahun_akademik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
