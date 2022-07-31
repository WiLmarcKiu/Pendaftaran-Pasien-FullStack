-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 04:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(300) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `foto`) VALUES
(1, 'Desty Mihabalo', 'desty@gmail.com', 'desty123', 'profile.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tgl_terima` date NOT NULL,
  `gaji_pokok` varchar(500) NOT NULL,
  `tunjangan_kinerja` varchar(500) NOT NULL,
  `tunjangan_pasangan` varchar(500) NOT NULL,
  `tunjangan_anak` varchar(500) NOT NULL,
  `tunjangan_makan` varchar(500) NOT NULL,
  `tunjangan_jabatan` varchar(500) NOT NULL,
  `total` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id_pegawai`, `tgl_terima`, `gaji_pokok`, `tunjangan_kinerja`, `tunjangan_pasangan`, `tunjangan_anak`, `tunjangan_makan`, `tunjangan_jabatan`, `total`) VALUES
(1, 1, '2022-07-03', '3000000', '5000000', '150000', '75000', '35000', '2000000', '5760000'),
(4, 2, '2022-07-08', '3500000', '200000', '200000', '150000', '200000', '300000', '4550000');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tgl_mutasi` date NOT NULL,
  `unit_lama` varchar(300) NOT NULL,
  `unit_baru` varchar(300) NOT NULL,
  `alasan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `id_pegawai`, `tgl_mutasi`, `unit_lama`, `unit_baru`, `alasan`) VALUES
(1, 1, '2022-07-03', 'KEPEGAWAIAN', 'BIRO ORGANISASI', 'Jarak tempuh ke kantor terlalu jauh');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `prestasi_kerja` varchar(100) NOT NULL,
  `masa_kerja` varchar(100) NOT NULL,
  `pangkat_tmt_lama` varchar(100) NOT NULL,
  `pangkat_tmt_baru` varchar(100) NOT NULL,
  `gaji_pokok_lama` varchar(500) NOT NULL,
  `sk_pangkat_terakhir` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `id_pegawai`, `prestasi_kerja`, `masa_kerja`, `pangkat_tmt_lama`, `pangkat_tmt_baru`, `gaji_pokok_lama`, `sk_pangkat_terakhir`) VALUES
(1, 1, 'Memuaskan', '4 Tahun 5 Bulan', '2022-07-03', '2023-02-03', '3000000', 'berkas jilid proposal.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `gol_pegawai` varchar(100) NOT NULL,
  `status_kawin` varchar(100) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `jabatan` varchar(300) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `email` varchar(300) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `agama`, `pendidikan_terakhir`, `gol_pegawai`, `status_kawin`, `pangkat`, `jabatan`, `telepon`, `foto`, `email`, `status`) VALUES
(1, 'Julia Mariance N. Fuah, S.Kom', '19750708199825178', 'Perempuan', 'Kupang', '1977-05-14', 'Oebobo', 'Kristen Protestan', 'DIPLOMA IV / STRATA I', 'IIId', 'Kawin', 'Penata Tingkat I', '', '085111253741', 'pegawai1.jpg', 'julia@gmail.com', 'Aktif'),
(2, 'Revansa Elimanafe', '12345678911234597', 'Laki - Laki', 'Kupang', '2000-07-12', 'Liliba', 'Kristen Protestan', 'DIPLOMA IV / STRATA I', 'IIIa', 'Belum Kawin', 'Juru Tingkat I', '', '082234567891', 'pegawai2.jpg', 'revan@gmail.com', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pensiun`
--

CREATE TABLE `pensiun` (
  `id_pensiun` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `masa_kerja_golongan` varchar(300) NOT NULL,
  `tgl_pensiun` date NOT NULL,
  `masa_kerja` varchar(300) NOT NULL,
  `sk_pensiun` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pensiun`
--

INSERT INTO `pensiun` (`id_pensiun`, `id_pegawai`, `masa_kerja_golongan`, `tgl_pensiun`, `masa_kerja`, `sk_pensiun`) VALUES
(1, 1, '3 Tahun', '2022-07-03', '4 Tahun 5 Bulan', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pensiun`
--
ALTER TABLE `pensiun`
  ADD PRIMARY KEY (`id_pensiun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pensiun`
--
ALTER TABLE `pensiun`
  MODIFY `id_pensiun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
