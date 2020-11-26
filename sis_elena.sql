-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 04:39 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis_elena`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kd_unik` int(10) NOT NULL,
  `password_guru` varchar(20) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `email`, `alamat`, `kd_unik`, `password_guru`, `kode_mapel`) VALUES
('1233', 'Fatim', 'asd', 'Jember', 123, '1234', 'PA01'),
('12333', 'Fatim', 'asd', 'Jember', 123, '123', 'PA02');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kd_jadwal` int(10) NOT NULL,
  `kd_presensi` int(10) NOT NULL,
  `waktu_pelaksanaan` varchar(15) NOT NULL,
  `kode_mapel` int(10) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kd_jadwal`, `kd_presensi`, `waktu_pelaksanaan`, `kode_mapel`, `hari`, `tanggal`, `jam`) VALUES
(1, 1001, 'jam 2', 1, 'Kamis', '2020-11-19', 9);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` varchar(10) NOT NULL,
  `nis` int(4) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kode_mapel` int(10) NOT NULL,
  `tingkatan` int(3) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `r_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `nis`, `nama`, `kode_mapel`, `tingkatan`, `jurusan`, `r_kelas`) VALUES
('KPA01', 1235, 'X IPA 1', 12, 1, 'IPA', 'X IPA 1'),
('KPA02', 1234, 'X IPA 2', 12, 1, 'IPA', 'X IPA 2'),
('KPS01', 123, 'X IPS 1', 12, 1, 'IPS', 'X IPS 2');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL,
  `jenis_mapel` varchar(3) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kd_jadwal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `nama_mapel`, `jenis_mapel`, `kode_kelas`, `kd_jadwal`) VALUES
('PA01', 'Matematika', 'IPA', 'KPA01', 1),
('PA02', 'Fisika', 'IPA', 'KPA01', 1),
('PA03', 'Kimia', 'IPA', 'KPA01', 1),
('PA04', 'Biologi', 'IPA', 'KPA01', 1),
('PA05', 'Agama', 'IPA', 'KPA01', 1),
('PA06', 'PKn', 'IPA', 'KPA01', 1),
('PA07', 'Bahasa Indonesia', 'IPA', 'KPA01', 1),
('PA08', 'Seni Budaya', 'IPA', 'KPA01', 1),
('PA09', 'Fisika', 'IPA', 'KPA02', 1),
('PA10', 'Matematika', 'IPA', 'KPA02', 1),
('PA11', 'Kimia', 'IPA', 'KPA02', 1),
('PA12', 'Biologi', 'IPA', 'KPA02', 1),
('PA13', 'Agama', 'IPA', 'KPA02', 1),
('PA14', 'PKn', 'IPA', 'KPA02', 1),
('PA15', 'Bahasa Indonesia', 'IPA', 'KPA02', 1),
('PA16', 'Seni Budaya', 'IPA', 'KPA02', 1),
('PA17', 'Fisika', 'IPA', 'KPS01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(10) NOT NULL,
  `tugas` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL,
  `kuis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `kd_presensi` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`kd_presensi`, `hari`, `jam`, `tanggal`) VALUES
(1001, 'Kamis', 9, '2020-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `email`, `alamat`, `password`, `kode_kelas`) VALUES
(1234, 'Ricky Aditya Wardana', 'Meliodaskirisami@gmail.co', 'Desa Jajag Kecamatan Gambiran Banyuwangi', '1234', 'KPA01'),
(1235, 'Muhammad Audino Fakhri Arnandya', 'dino12@gmail.com', 'Desa Jajag Kecamatan Gambiran Banyuwangi', 'akabiluru1', 'KPA02');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_hub_guru`
--

CREATE TABLE `tabel_hub_guru` (
  `kd_unik` int(10) NOT NULL,
  `nip` int(20) NOT NULL,
  `kode_mapel` int(10) NOT NULL,
  `kd_nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `kd_presensi` (`kd_presensi`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`),
  ADD KEY `nis` (`nis`),
  ADD KEY `kd_mapel` (`kode_mapel`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`),
  ADD KEY `kd_jadwal` (`kd_jadwal`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`kd_presensi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `tabel_hub_guru`
--
ALTER TABLE `tabel_hub_guru`
  ADD PRIMARY KEY (`kd_unik`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kd_mapel` (`kode_mapel`,`kd_nilai`),
  ADD KEY `kd_nilai` (`kd_nilai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kd_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `kd_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `tabel_hub_guru`
--
ALTER TABLE `tabel_hub_guru`
  MODIFY `kd_unik` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kd_presensi`) REFERENCES `presensi` (`kd_presensi`);

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kd_kelas`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kd_kelas`);

--
-- Constraints for table `tabel_hub_guru`
--
ALTER TABLE `tabel_hub_guru`
  ADD CONSTRAINT `tabel_hub_guru_ibfk_2` FOREIGN KEY (`kd_nilai`) REFERENCES `nilai` (`kd_nilai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
