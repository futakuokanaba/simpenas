-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2018 at 08:22 AM
-- Server version: 5.6.39-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kslungco_simpenas`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_anggota`
--

CREATE TABLE `data_anggota` (
  `kode_da` smallint(6) NOT NULL,
  `nama_da` varchar(300) NOT NULL,
  `status_aktif` varchar(30) NOT NULL,
  `tmt` date NOT NULL,
  `kode_ja` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_anggota`
--

INSERT INTO `data_anggota` (`kode_da`, `nama_da`, `status_aktif`, `tmt`, `kode_ja`) VALUES
(1, 'Abdul Gani', 'Aktif', '2018-06-13', 5),
(2, 'Nurholis Abdullah', 'Cuti', '2018-06-10', 1),
(3, 'Ardi Ramadan', 'Aktif', '2018-07-27', 3),
(4, 'Jusman Konda', 'Tidak Aktif', '2018-06-10', 4),
(5, 'Andre Pratama', 'Aktif', '2018-06-10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `kode_du` tinyint(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(30) NOT NULL DEFAULT 'operator'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`kode_du`, `username`, `password`, `hak_akses`) VALUES
(1, 'johny.deep', 'johny.deep', 'admin'),
(2, 'operator', 'e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e', 'operator'),
(4, 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_anggota`
--

CREATE TABLE `jenis_anggota` (
  `kode_ja` tinyint(4) NOT NULL,
  `nama_ja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_anggota`
--

INSERT INTO `jenis_anggota` (`kode_ja`, `nama_ja`) VALUES
(1, 'Ketua DPRD'),
(2, 'Wakil Ketua DPRD'),
(3, 'Staff Ahli'),
(4, 'Staf Humasa'),
(5, 'Anggota'),
(6, 'Staff Keilmuan'),
(9, 'Staff Biasa'),
(10, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `kode_jk` mediumint(4) NOT NULL,
  `nama_jk` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`kode_jk`, `nama_jk`) VALUES
(1, 'Kunjungan'),
(2, 'Penelitian');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perjalanan`
--

CREATE TABLE `jenis_perjalanan` (
  `kode_jp` smallint(4) NOT NULL,
  `nama_jp` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_perjalanan`
--

INSERT INTO `jenis_perjalanan` (`kode_jp`, `nama_jp`) VALUES
(1, 'Wisata Ilmiah'),
(2, 'Kunjungan Penting');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kode_kegiatan` mediumint(9) NOT NULL,
  `no_surat_tugas` varchar(50) NOT NULL,
  `daerah_tujuan` varchar(300) NOT NULL,
  `waktu_berangkat` date NOT NULL,
  `waktu_kembali` date NOT NULL,
  `kode_jp` smallint(6) NOT NULL,
  `kode_jk` mediumint(9) NOT NULL,
  `kode_da` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`kode_kegiatan`, `no_surat_tugas`, `daerah_tujuan`, `waktu_berangkat`, `waktu_kembali`, `kode_jp`, `kode_jk`, `kode_da`) VALUES
(1, '1j1u218ej', 'Suwawa, Gorontalo', '2018-06-04', '2018-06-08', 2, 1, 4),
(2, '91812hwh1', 'Paguyaman, Gorontalo', '2018-06-03', '2018-06-01', 1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `panjar`
--

CREATE TABLE `panjar` (
  `kode_panjar` smallint(6) NOT NULL,
  `no_surat_tugas` varchar(50) NOT NULL,
  `daerah_tujuan` varchar(100) NOT NULL,
  `waktu_berangkat` date NOT NULL,
  `waktu_kembali` date NOT NULL COMMENT '88I',
  `waktu_pembayaran` date NOT NULL,
  `no_bukti` varchar(100) NOT NULL,
  `jumlah_panjar` varchar(100) NOT NULL,
  `kode_jp` smallint(6) NOT NULL,
  `kode_jk` mediumint(9) NOT NULL,
  `kode_da` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panjar`
--

INSERT INTO `panjar` (`kode_panjar`, `no_surat_tugas`, `daerah_tujuan`, `waktu_berangkat`, `waktu_kembali`, `waktu_pembayaran`, `no_bukti`, `jumlah_panjar`, `kode_jp`, `kode_jk`, `kode_da`) VALUES
(1, '13261gwvdgav2', 'Boalemo, Gorontalo', '2018-06-11', '2018-06-10', '2018-06-03', '21y27ehywg2', '12000000', 2, 2, 4),
(2, '1wwd23241', 'Suwawa, Gorontalo', '2018-06-03', '2018-06-18', '2018-06-14', '1828shwuhd27', '10000000', 2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pelunasan`
--

CREATE TABLE `pelunasan` (
  `kode_pelunasan` mediumint(9) NOT NULL,
  `no_surat_tugas` varchar(100) NOT NULL,
  `daerah_tujuan` varchar(300) NOT NULL,
  `waktu_berangkat` date NOT NULL,
  `waktu_kembali` date NOT NULL,
  `waktu_pembayaran` date NOT NULL,
  `no_bukti` varchar(100) NOT NULL,
  `jumlah_pelunasan` varchar(100) NOT NULL,
  `jumlah_panjar` varchar(100) NOT NULL,
  `jumlah_sisa` varchar(100) NOT NULL,
  `kode_jp` smallint(6) NOT NULL,
  `kode_jk` mediumint(9) NOT NULL,
  `kode_da` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelunasan`
--

INSERT INTO `pelunasan` (`kode_pelunasan`, `no_surat_tugas`, `daerah_tujuan`, `waktu_berangkat`, `waktu_kembali`, `waktu_pembayaran`, `no_bukti`, `jumlah_pelunasan`, `jumlah_panjar`, `jumlah_sisa`, `kode_jp`, `kode_jk`, `kode_da`) VALUES
(2, '38yeheqwu', 'Ternate, Maluku Utara', '2018-07-25', '2018-07-25', '2018-07-14', '38u3ej2u', '12000000', '5000000', '7000000', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_anggota`
--
ALTER TABLE `data_anggota`
  ADD PRIMARY KEY (`kode_da`),
  ADD KEY `kode_ja` (`kode_ja`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`kode_du`);

--
-- Indexes for table `jenis_anggota`
--
ALTER TABLE `jenis_anggota`
  ADD PRIMARY KEY (`kode_ja`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`kode_jk`);

--
-- Indexes for table `jenis_perjalanan`
--
ALTER TABLE `jenis_perjalanan`
  ADD PRIMARY KEY (`kode_jp`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`kode_kegiatan`),
  ADD KEY `kode_jp` (`kode_jp`),
  ADD KEY `kode_jk` (`kode_jk`),
  ADD KEY `kode_da` (`kode_da`);

--
-- Indexes for table `panjar`
--
ALTER TABLE `panjar`
  ADD PRIMARY KEY (`kode_panjar`),
  ADD KEY `kode_jp` (`kode_jp`),
  ADD KEY `kode_jk` (`kode_jk`),
  ADD KEY `kode_da` (`kode_da`);

--
-- Indexes for table `pelunasan`
--
ALTER TABLE `pelunasan`
  ADD PRIMARY KEY (`kode_pelunasan`),
  ADD KEY `kode_jp` (`kode_jp`),
  ADD KEY `kode_jk` (`kode_jk`),
  ADD KEY `kode_da` (`kode_da`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_anggota`
--
ALTER TABLE `data_anggota`
  MODIFY `kode_da` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `kode_du` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_anggota`
--
ALTER TABLE `jenis_anggota`
  MODIFY `kode_ja` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `kode_jk` mediumint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_perjalanan`
--
ALTER TABLE `jenis_perjalanan`
  MODIFY `kode_jp` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `kode_kegiatan` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `panjar`
--
ALTER TABLE `panjar`
  MODIFY `kode_panjar` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelunasan`
--
ALTER TABLE `pelunasan`
  MODIFY `kode_pelunasan` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_anggota`
--
ALTER TABLE `data_anggota`
  ADD CONSTRAINT `data_anggota_ibfk_1` FOREIGN KEY (`kode_ja`) REFERENCES `jenis_anggota` (`kode_ja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`kode_da`) REFERENCES `data_anggota` (`kode_da`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`kode_jk`) REFERENCES `jenis_kegiatan` (`kode_jk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_ibfk_3` FOREIGN KEY (`kode_jp`) REFERENCES `jenis_perjalanan` (`kode_jp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panjar`
--
ALTER TABLE `panjar`
  ADD CONSTRAINT `panjar_ibfk_1` FOREIGN KEY (`kode_jk`) REFERENCES `jenis_kegiatan` (`kode_jk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panjar_ibfk_2` FOREIGN KEY (`kode_da`) REFERENCES `data_anggota` (`kode_da`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panjar_ibfk_3` FOREIGN KEY (`kode_jp`) REFERENCES `jenis_perjalanan` (`kode_jp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelunasan`
--
ALTER TABLE `pelunasan`
  ADD CONSTRAINT `pelunasan_ibfk_1` FOREIGN KEY (`kode_da`) REFERENCES `data_anggota` (`kode_da`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelunasan_ibfk_2` FOREIGN KEY (`kode_jp`) REFERENCES `jenis_perjalanan` (`kode_jp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelunasan_ibfk_3` FOREIGN KEY (`kode_jk`) REFERENCES `jenis_kegiatan` (`kode_jk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
