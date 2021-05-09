-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2021 at 11:30 PM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wars`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anak`
--

CREATE TABLE `tb_anak` (
  `id_anak` int(11) NOT NULL,
  `id_wali_anak` int(11) DEFAULT NULL,
  `id_ibu_anak` int(11) DEFAULT NULL,
  `nama_anak` varchar(50) DEFAULT NULL,
  `jenis_kelamin_anak` char(1) DEFAULT NULL,
  `tempat_lahir_anak` varchar(255) DEFAULT NULL,
  `tgl_lahir_anak` varchar(20) DEFAULT NULL,
  `agama_anak` varchar(10) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `jml_saudara_anak` int(2) DEFAULT NULL,
  `warga_negara_anak` varchar(50) DEFAULT NULL,
  `suku_bangsa_anak` varchar(50) DEFAULT NULL,
  `bahasa_anak` varchar(20) DEFAULT NULL,
  `golongan_darah_anak` varchar(5) DEFAULT NULL,
  `riwayat_penyakit_anak` varchar(1000) DEFAULT NULL,
  `alamat_rumah_anak` varchar(1000) DEFAULT NULL,
  `foto_anak` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anak`
--

INSERT INTO `tb_anak` (`id_anak`, `id_wali_anak`, `id_ibu_anak`, `nama_anak`, `jenis_kelamin_anak`, `tempat_lahir_anak`, `tgl_lahir_anak`, `agama_anak`, `anak_ke`, `jml_saudara_anak`, `warga_negara_anak`, `suku_bangsa_anak`, `bahasa_anak`, `golongan_darah_anak`, `riwayat_penyakit_anak`, `alamat_rumah_anak`, `foto_anak`) VALUES
(19, 18, 3, 'Amir', 'L', 'Ngawi', '2021-05-04', 'Islam', 2, 2, 'Indonesia negra', 'Indonesia bangsa', 'Indonesia bahasa', 'ab', 'sds', 'sd', '9962Screenshot from 2021-02-17 15-43-47.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_tpa`
--

CREATE TABLE `tb_biaya_tpa` (
  `id_biaya_tpa` int(11) NOT NULL,
  `biaya_tpa` varchar(10) NOT NULL,
  `nama_paket` varchar(20) NOT NULL,
  `biaya_formulir_kb` varchar(10) NOT NULL,
  `insidental` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_biaya_tk_kb`
--

CREATE TABLE `tb_daftar_biaya_tk_kb` (
  `id_daftar_biaya` int(11) NOT NULL,
  `gel_ke` int(1) NOT NULL,
  `pendidikan` char(3) NOT NULL,
  `tgl_gel1` varchar(10) DEFAULT NULL,
  `tgl_gel2` varchar(10) DEFAULT NULL,
  `biaya_formulir` varchar(10) NOT NULL,
  `dpp` varchar(10) NOT NULL,
  `uang_kegiatan` varchar(10) NOT NULL,
  `uang_buku_pertahun` varchar(10) NOT NULL,
  `uang_seragam` varchar(10) NOT NULL,
  `spp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_daftar_biaya_tk_kb`
--

INSERT INTO `tb_daftar_biaya_tk_kb` (`id_daftar_biaya`, `gel_ke`, `pendidikan`, `tgl_gel1`, `tgl_gel2`, `biaya_formulir`, `dpp`, `uang_kegiatan`, `uang_buku_pertahun`, `uang_seragam`, `spp`) VALUES
(5, 1, 'tk', '2021-05-03', '2021-05-05', '200', '300', '400', '500', '600', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ibu`
--

CREATE TABLE `tb_ibu` (
  `id_ibu` int(11) NOT NULL,
  `id_wali_ibu` int(11) NOT NULL,
  `id_anak_ibu` int(11) DEFAULT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tempat_lahir_ibu` varchar(20) NOT NULL,
  `tgl_lahir_ibu` varchar(10) NOT NULL,
  `pendidikan_ibu` varchar(10) NOT NULL,
  `agama_ibu` varchar(10) NOT NULL,
  `negara_ibu` varchar(20) NOT NULL,
  `bangsa_ibu` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(15) NOT NULL,
  `penghasilan_ibu` varchar(15) NOT NULL,
  `alamat_kantor_ibu` varchar(255) NOT NULL,
  `hp_kantor_ibu` varchar(13) NOT NULL,
  `golongan_darah_ibu` varchar(5) NOT NULL,
  `alamat_rumah_ibu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ibu`
--

INSERT INTO `tb_ibu` (`id_ibu`, `id_wali_ibu`, `id_anak_ibu`, `nama_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `pendidikan_ibu`, `agama_ibu`, `negara_ibu`, `bangsa_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `alamat_kantor_ibu`, `hp_kantor_ibu`, `golongan_darah_ibu`, `alamat_rumah_ibu`) VALUES
(3, 18, 1, 'sri', 'ngawi', '2021-05-04', 's1', 'islam', 'ngawi', 'indonesia', 'tani', 's1', 'adsd', '098098098098', 'ab', 'adsd'),
(4, 19, NULL, 'sri', 'ngawi', '2021-05-18', 's1', 'islam', 'ngawi', 'indonesia', 'tani', 's1', 'ads', 'sdsd', 'ab', 'ads');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jadwal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_wawancara`
--

CREATE TABLE `tb_jadwal_wawancara` (
  `id_jadwal_wawancara` int(11) NOT NULL,
  `jadwal_wawancara` varchar(10) NOT NULL,
  `jam_wawancara` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jadwal_wawancara`
--

INSERT INTO `tb_jadwal_wawancara` (`id_jadwal_wawancara`, `jadwal_wawancara`, `jam_wawancara`) VALUES
(5, '2021-05-01', '11:16'),
(6, '2021-05-13', '00:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_user_pembayaran` int(11) DEFAULT NULL,
  `jenis_pendidikan` varchar(3) DEFAULT NULL,
  `nama_pembayaran` varchar(255) DEFAULT NULL,
  `gelombang_ke` varchar(2) DEFAULT NULL,
  `biaya_gelombang` varchar(10) DEFAULT '0',
  `status_pembayaran` int(11) NOT NULL DEFAULT 0,
  `tahun_pembayaran` int(4) DEFAULT NULL,
  `tgl_pembayaran` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_user_pembayaran`, `jenis_pendidikan`, `nama_pembayaran`, `gelombang_ke`, `biaya_gelombang`, `status_pembayaran`, `tahun_pembayaran`, `tgl_pembayaran`) VALUES
(17, 15, 'tk', '2005Screenshot from 2021-02-13 17-07-46.png', '1', '2000', 0, 2021, '09-05-2021'),
(18, 15, 'tk', '8150Screenshot from 2021-02-13 17-47-49.png', '1', '20', 0, 2021, '-2017'),
(19, 15, 'kb', '3650Screenshot from 2021-02-13 17-07-46.png', '1', '2003', 0, 2021, '-2017');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nama_pendidikan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transfer_gelombang`
--

CREATE TABLE `tb_transfer_gelombang` (
  `id_transfer_gelombang` int(11) NOT NULL,
  `gelombang` int(1) NOT NULL,
  `tgl_transfer` datetime NOT NULL,
  `biaya_transfer` varchar(15) NOT NULL,
  `jml_biaya` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `nama_user` varchar(225) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `foto_user` varchar(225) DEFAULT NULL,
  `tgl_registrasi` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `update_set` varchar(20) DEFAULT NULL,
  `level` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nik`, `nama_user`, `email_user`, `password_user`, `foto_user`, `tgl_registrasi`, `update_set`, `level`) VALUES
(14, 4, 'kepala', 'kepala@gmail.com', '$2y$10$..2z7WfHgmDUe6mfRaRJde89pZQce2jyZe78DXZoKrGrIF9iMclKW', '2091Screenshot from 2021-02-04 17-42-07.png', '05-04-2021 18:22:08', '08-04-2021 01:28:49', 2),
(15, 2, 'users database', 'user@gmail.com', '$2y$10$KrmEcrhnlZx0RAE0tFgN9e2LBCpQ7Zhnw5lejVsdA0QttQAMbFhbe', '8348Screenshot from 2021-02-13 17-08-55.png', '05-04-2021 18:25:16', '08-04-2021 01:16:07', 1),
(16, 32541610001, 'admin umar', 'fatkulumar@gmail.com', '$2y$10$NUjlCnCPa7vm.os1xDYBJeNg7bRf9K4gN5DQKvQdkmbUR5S9AV3wS', '8066Screenshot from 2021-02-12 21-33-44.png', '05-04-2021 18:25:22', '08-04-2021 00:53:17', 0),
(23, 5, 'Fatkul Umar', 'fatkulumar@gmail.com', 'sdadsd', NULL, '06-04-2021 21:41:13', '0', 1),
(24, 1, 'Fatkul U', 'mar@gmail.com', 'sdadsd', NULL, '06-04-2021 21:41:40', '0', 1),
(25, 0, 'Fatkul Umar', 'fatkulumar@gmail.com', 'sdadsd', NULL, '06-04-2021 21:56:42', '0', 1),
(26, 5, 'Fatkul Umar', 'fatkulumar@gmail.com', 'sdadsd', NULL, '06-04-2021 21:58:53', '0', 1),
(27, 5, 'Fatkul Umar', 'fatkulumar@gmail.com', 'sdadsd', NULL, '06-04-2021 21:59:33', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wali`
--

CREATE TABLE `tb_wali` (
  `id_wali` int(11) NOT NULL,
  `id_user_wali` int(11) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `tempat_lahir_wali` varchar(20) DEFAULT NULL,
  `tgl_lahir_wali` varchar(10) DEFAULT NULL,
  `pendidikan_wali` varchar(15) DEFAULT NULL,
  `agama_wali` varchar(10) DEFAULT NULL,
  `negara_wali` varchar(20) DEFAULT NULL,
  `bangsa_wali` varchar(15) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `penghasilan_wali` varchar(15) DEFAULT NULL,
  `alamat_kantor_wali` varchar(300) DEFAULT NULL,
  `hp_kantor_wali` varchar(13) DEFAULT NULL,
  `golongan_darah_wali` varchar(5) DEFAULT NULL,
  `alamat_rumah_wali` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_wali`
--

INSERT INTO `tb_wali` (`id_wali`, `id_user_wali`, `nama_wali`, `tempat_lahir_wali`, `tgl_lahir_wali`, `pendidikan_wali`, `agama_wali`, `negara_wali`, `bangsa_wali`, `pekerjaan_wali`, `penghasilan_wali`, `alamat_kantor_wali`, `hp_kantor_wali`, `golongan_darah_wali`, `alamat_rumah_wali`) VALUES
(18, 15, 'Mariyun', 'ngawi', '2021-05-05', 's1', 'islam', 'indonesia', 'Dayak', 'tani', 's1', 'sd', '0989898989', 'a', 'sd'),
(19, 16, 'ayah Mariyun', 'ngawi', '2021-05-06', 's1', 'islam', '', 'Dayak', 'tani', 's1', 'sada', '0989898989', 'a', 'sada');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wawancara`
--

CREATE TABLE `tb_wawancara` (
  `id_wawancara` int(11) NOT NULL,
  `id_user_wawancara` int(11) DEFAULT NULL,
  `id_jadwal_wawancara_wawancara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_wawancara`
--

INSERT INTO `tb_wawancara` (`id_wawancara`, `id_user_wawancara`, `id_jadwal_wawancara_wawancara`) VALUES
(4, 15, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anak`
--
ALTER TABLE `tb_anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `tb_biaya_tpa`
--
ALTER TABLE `tb_biaya_tpa`
  ADD PRIMARY KEY (`id_biaya_tpa`);

--
-- Indexes for table `tb_daftar_biaya_tk_kb`
--
ALTER TABLE `tb_daftar_biaya_tk_kb`
  ADD PRIMARY KEY (`id_daftar_biaya`);

--
-- Indexes for table `tb_ibu`
--
ALTER TABLE `tb_ibu`
  ADD PRIMARY KEY (`id_ibu`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_jadwal_wawancara`
--
ALTER TABLE `tb_jadwal_wawancara`
  ADD PRIMARY KEY (`id_jadwal_wawancara`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tb_transfer_gelombang`
--
ALTER TABLE `tb_transfer_gelombang`
  ADD PRIMARY KEY (`id_transfer_gelombang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_wali`
--
ALTER TABLE `tb_wali`
  ADD PRIMARY KEY (`id_wali`);

--
-- Indexes for table `tb_wawancara`
--
ALTER TABLE `tb_wawancara`
  ADD PRIMARY KEY (`id_wawancara`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anak`
--
ALTER TABLE `tb_anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_biaya_tpa`
--
ALTER TABLE `tb_biaya_tpa`
  MODIFY `id_biaya_tpa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_daftar_biaya_tk_kb`
--
ALTER TABLE `tb_daftar_biaya_tk_kb`
  MODIFY `id_daftar_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ibu`
--
ALTER TABLE `tb_ibu`
  MODIFY `id_ibu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jadwal_wawancara`
--
ALTER TABLE `tb_jadwal_wawancara`
  MODIFY `id_jadwal_wawancara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_wali`
--
ALTER TABLE `tb_wali`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_wawancara`
--
ALTER TABLE `tb_wawancara`
  MODIFY `id_wawancara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
