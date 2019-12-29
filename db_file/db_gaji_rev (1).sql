-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2019 at 12:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gaji_rev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idmin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idmin`, `username`, `full_name`, `password`) VALUES
(1, 'admin', 'Admin PGAJI', '$2y$05$9mUl9EhlHBQM27NvqAJ13uwP/dEq4OrguOhVUlMZ2iAeNXjr62OhK');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Hindu'),
(4, 'Budha'),
(5, 'Khonghucu'),
(6, 'Tidak Beragama');

-- --------------------------------------------------------

--
-- Table structure for table `data_gaji`
--

CREATE TABLE `data_gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `gapok` int(30) NOT NULL,
  `kesehatan` int(30) NOT NULL,
  `transport` int(30) NOT NULL,
  `makan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_gaji`
--

INSERT INTO `data_gaji` (`id_gaji`, `id_status`, `gapok`, `kesehatan`, `transport`, `makan`) VALUES
(3, 1, 2000000, 200000, 200000, 200000),
(4, 2, 0, 150000, 150000, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  `password` varchar(70) NOT NULL,
  `sertifikasi` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `id_jk`, `alamat`, `id_agama`, `id_gaji`, `password`, `sertifikasi`) VALUES
(77741, 'Hafiz Caniago', 1, 'Cirebon', 1, 3, '$2y$05$Yb.PDDFr7gq0E03gge8ypezPjVavBCL.v7grUzkSzGIfwy1MbSgJu', 2500000),
(77742, 'Ahmad Fauzan', 1, 'Cirebon', 1, 4, '$2y$05$njbt25.jWjF2osx8q2b6zuValy.DGdjB6h68/4TEysFizJ5r5c826', 0),
(77743, 'Cecep Suwanda', 1, 'Cirebon', 1, 3, '$2y$05$dOgA6oqFfcVBjGv.EuLd5eU6g49KZWBEDf6.8ogEwgaxPL/1dbDr6', 2500000),
(77744, 'Saputra', 1, 'Cirebon', 1, 4, '$2y$05$bfCFQCiSH9ev/DIJ4Pihh.Thw86AgRz0y4lWHuDrfTy6abQpfZ5tO', 0),
(77745, 'Jaja Hermawansyah', 1, 'Cirebon', 1, 3, '$2y$05$vagYQ3K726eyT2ToQ8ypouImHXPXADbeYVhoZQlOCc3R6vz7DMy4u', 2500000),
(77746, 'Sahrul Gunawan', 1, 'Cirebon', 1, 3, '$2y$05$a7ikpthlA/tUQ5W6KPbB4eSpc5UGouG4.PGx77PIczIoMirotf3vu', 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `honor_sks`
--

CREATE TABLE `honor_sks` (
  `id_honor` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `honor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `honor_sks`
--

INSERT INTO `honor_sks` (`id_honor`, `id_status`, `honor`) VALUES
(4, 1, 50000),
(8, 2, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `jk`
--

CREATE TABLE `jk` (
  `id_jk` int(11) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jk`
--

INSERT INTO `jk` (`id_jk`, `jenis_kelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_gaji`
--

CREATE TABLE `rekap_gaji` (
  `id_rekap` int(11) NOT NULL,
  `nidn` int(11) NOT NULL,
  `tgl_penggajian` date NOT NULL,
  `gaji_sks` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap_gaji`
--

INSERT INTO `rekap_gaji` (`id_rekap`, `nidn`, `tgl_penggajian`, `gaji_sks`) VALUES
(8, 77741, '2019-09-06', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Dosen Tetap'),
(2, 'Dosen Honorer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idmin`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `data_gaji`
--
ALTER TABLE `data_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`),
  ADD KEY `id_jk` (`id_jk`,`id_agama`,`id_gaji`),
  ADD KEY `id_gaji` (`id_gaji`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indexes for table `honor_sks`
--
ALTER TABLE `honor_sks`
  ADD PRIMARY KEY (`id_honor`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `jk`
--
ALTER TABLE `jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `rekap_gaji`
--
ALTER TABLE `rekap_gaji`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_gaji`
--
ALTER TABLE `data_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `honor_sks`
--
ALTER TABLE `honor_sks`
  MODIFY `id_honor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jk`
--
ALTER TABLE `jk`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekap_gaji`
--
ALTER TABLE `rekap_gaji`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_gaji`
--
ALTER TABLE `data_gaji`
  ADD CONSTRAINT `data_gaji_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `data_gaji` (`id_gaji`),
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`),
  ADD CONSTRAINT `dosen_ibfk_3` FOREIGN KEY (`id_jk`) REFERENCES `jk` (`id_jk`);

--
-- Constraints for table `honor_sks`
--
ALTER TABLE `honor_sks`
  ADD CONSTRAINT `honor_sks_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `rekap_gaji`
--
ALTER TABLE `rekap_gaji`
  ADD CONSTRAINT `rekap_gaji_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
