-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2022 pada 05.19
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gigi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `nama_lengkap`, `email`, `password`, `foto`) VALUES
(1, 'Baron', 'Wilmarc Maynard Kiu', 'aron@gmail.com', '12345', 'WhatsApp Image 2022-07-24 at 17.04.58.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar_pasien`
--

CREATE TABLE `tb_daftar_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no_registrasi` varchar(500) NOT NULL,
  `nama_operator` varchar(200) NOT NULL,
  `umur` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(50) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `nama_ortu` varchar(200) NOT NULL,
  `tgl_daftar` varchar(100) NOT NULL,
  `status_diagnosa` varchar(50) NOT NULL DEFAULT 'Kosong'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_daftar_pasien`
--

INSERT INTO `tb_daftar_pasien` (`id_pasien`, `nama`, `no_registrasi`, `nama_operator`, `umur`, `alamat`, `jk`, `pekerjaan`, `no_hp`, `nama_ortu`, `tgl_daftar`, `status_diagnosa`) VALUES
(1, 'Ipann ', '1', 'Gibe Tanauw', '21 Tahun', 'Kayu Putih', 'Laki - Laki', 'PELAJAR / MAHASISWA', '081238123123', 'Robert', '2022-08-02', 'Ada'),
(2, 'Gebi', '2', 'Gibe', '18 Tahun', 'Kupang', 'Laki - Laki', 'PEGAWAI NEGERI SIPIL', '081238123123', 'Robert', '2022-08-06', 'Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_diagnosa_pasien`
--

CREATE TABLE `tb_diagnosa_pasien` (
  `id_diagnosa` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `diagnosa` text NOT NULL,
  `elemen_gigi` varchar(300) NOT NULL,
  `therapi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_diagnosa_pasien`
--

INSERT INTO `tb_diagnosa_pasien` (`id_diagnosa`, `id_pasien`, `diagnosa`, `elemen_gigi`, `therapi`) VALUES
(1, 1, 'w', 'w', 'w'),
(2, 2, 'pulpitis ireversible', '26', 'perawatan sakluran akar kunjungan 1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_daftar_pasien`
--
ALTER TABLE `tb_daftar_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tb_diagnosa_pasien`
--
ALTER TABLE `tb_diagnosa_pasien`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_daftar_pasien`
--
ALTER TABLE `tb_daftar_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_diagnosa_pasien`
--
ALTER TABLE `tb_diagnosa_pasien`
  MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
