-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 04:12 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail_pinjam` int(3) NOT NULL,
  `id_inventaris` varchar(8) NOT NULL,
  `jumlah_pinjam` int(3) NOT NULL,
  `id_peminjaman` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail_pinjam`, `id_inventaris`, `jumlah_pinjam`, `id_peminjaman`) VALUES
(142, 'INV-1', 1, 'PNJ-1'),
(143, 'INV-2', 1, 'PNJ-2'),
(145, 'INV-2', 1, 'PNJ-3'),
(146, 'INV-1', 1, 'PNJ-4'),
(163, 'INV-1', 1, 'PNJ-5'),
(164, 'INV-2', 1, 'PNJ-5'),
(186, 'INV-1', 1, 'PNJ-6'),
(187, 'INV-2', 3, 'PNJ-6'),
(188, 'INV-2', 2, 'PNJ-7'),
(189, 'INV-2', 1, 'PNJM-001'),
(190, 'INVN-001', 1, 'PNJM-002');

--
-- Triggers `detail_pinjam`
--
DELIMITER $$
CREATE TRIGGER `peminjaman` AFTER INSERT ON `detail_pinjam` FOR EACH ROW BEGIN
UPDATE inventaris SET jumlah=jumlah-new.jumlah_pinjam WHERE id_inventaris=new.id_inventaris;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` varchar(8) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `keterangan` varchar(5) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `id_jenis` varchar(8) NOT NULL,
  `tanggal_register` date NOT NULL,
  `id_ruang` varchar(8) NOT NULL,
  `kode_inventaris` varchar(8) NOT NULL,
  `id_petugas` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama`, `kondisi`, `keterangan`, `jumlah`, `id_jenis`, `tanggal_register`, `id_ruang`, `kode_inventaris`, `id_petugas`) VALUES
('INV-1', 'Buku', 'Baik', 'Masih', 3, 'JNS-4', '2019-04-29', 'RNG-2', 'A-01', 'PTG-1'),
('INV-2', 'Kursi', 'Pilih Kond', 'Rusak', 11, 'JNS-1', '2019-04-29', 'RNG-3', 'B-01', 'PTG-1'),
('INVN-001', 'Hidupku', 'Rusak', '---', 9998, 'JNS-2', '2021-06-15', 'RNG-3', 'INVNT601', 'PTG-1');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(8) NOT NULL,
  `nama_jenis` varchar(25) NOT NULL,
  `kode_jenis` varchar(8) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan`) VALUES
('JNS-1', 'Kursi', 'A-01', 'Butuh Diperbaru'),
('JNS-2', 'Komputer', 'B-01', 'Sudah Lama'),
('JNS-3', 'ATK', 'C-01', 'Baik'),
('JNS-4', 'Buku', 'D-01', 'Masih Baru');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` varchar(8) NOT NULL,
  `nama_level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
('Level-01', 'Admin'),
('Level-02', 'Operator'),
('Level-03', 'Peminjam');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(8) NOT NULL,
  `nama_pegawai` varchar(25) NOT NULL,
  `nip` int(12) NOT NULL,
  `alamat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `alamat`) VALUES
('PGW-1', 'Nida Mahmuda', 123789, 'Keling'),
('PGW-2', 'Elfi Ellyana', 101010, 'Keling Bono');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(8) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_peminjaman` varchar(10) NOT NULL,
  `id_pegawai` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `id_pegawai`) VALUES
('PNJ-1', '2019-04-27', '2019-05-04', 'Kembali', 'PGW-1'),
('PNJ-2', '2019-04-27', '2019-05-04', 'Kembali', 'PGW-1'),
('PNJ-3', '2019-04-28', '2019-05-04', 'Kembali', 'PGW-1'),
('PNJ-4', '2019-04-15', '2019-05-05', 'Kembali', 'PGW-1'),
('PNJ-5', '2019-04-29', '2019-04-22', 'Kembali', 'PGW-1'),
('PNJ-6', '2019-04-29', '2019-05-06', 'Kembali', 'PGW-1'),
('PNJM-001', '2021-06-15', '2021-06-16', 'Pinjam', 'PGW-2'),
('PNJM-002', '2021-06-15', '2021-06-23', 'Pinjam', 'PGW-2');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(8) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `id_level` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `id_level`) VALUES
('PTG-1', 'Admin', 'admin', 'Nida Mahmuda', 'Level-01'),
('PTG-2', 'Operator', 'operator', 'Elfi Ellyana', 'Level-02'),
('PTG-3', 'Peminjam', 'peminjam', 'Peminjam', 'Level-03');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(8) NOT NULL,
  `nama_ruang` varchar(20) NOT NULL,
  `kode_ruang` varchar(8) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `keterangan`) VALUES
('RNG-1', 'Tata Usaha', 'R-01', 'Bersih'),
('RNG-2', 'Perpustakaan', 'R-02', 'Bersih'),
('RNG-3', 'Gudang', 'R-03', 'Kurang Bersih');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `id_inventaris` (`id_inventaris`),
  ADD KEY `id_detail_pinjam` (`id_detail_pinjam`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_peminjaman_2` (`id_peminjaman`),
  ADD KEY `id_peminjaman_3` (`id_peminjaman`),
  ADD KEY `id_peminjaman_4` (`id_peminjaman`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `id_inventaris` (`id_inventaris`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id_detail_pinjam` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `detail_pinjam_ibfk_1` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventaris_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_peminjaman`) REFERENCES `detail_pinjam` (`id_peminjaman`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
