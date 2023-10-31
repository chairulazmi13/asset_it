-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Nov 2018 pada 07.15
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_it`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asset`
--

CREATE TABLE `asset` (
  `id_asset` int(11) NOT NULL,
  `nama_asset` varchar(50) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `id_model` int(11) DEFAULT NULL,
  `tanggal_pengadaan` date NOT NULL,
  `harga` int(11) NOT NULL,
  `asal_asset` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `id_departement` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `asset`
--

INSERT INTO `asset` (`id_asset`, `nama_asset`, `serial`, `id_model`, `tanggal_pengadaan`, `harga`, `asal_asset`, `catatan`, `id_departement`, `id_user`, `status`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(1, 'Laptop IT', 'PF0RBTG8', 1, '2018-11-15', 5000000, 'Pembelian Pusat', 'Intel Core i 3', 5, 1, 1, '2018-11-21', '2018-11-21'),
(3, 'Lenovo Admin Program', 'PF0RBTG10', 1, '2018-11-15', 4500000, 'Pembelian Pusat', 'Intel Pentium Dualcore', 1, 2, 1, '2018-11-21', '2018-11-20'),
(4, 'Laptop Admin Gudang', 'XY2019102', 1, '2018-11-16', 5000000, 'Pembelian', 'Dualcore Processor', 2, 4, 1, '2018-11-20', '2018-11-20'),
(5, 'Laptop Koordinator Gudang', 'KHD798712', 2, '2018-11-15', 4500000, 'Pembelian Pusat', 'Intel Dualcore', 2, 3, 1, '2018-11-15', '0000-00-00'),
(6, 'Printer LaserJet Finance', 'HP910212', 4, '2018-11-15', 2500000, 'Pembelian Cabang', '', 1, 0, 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `asset_histori`
--

CREATE TABLE `asset_histori` (
  `id` int(11) NOT NULL,
  `id_asset` int(11) DEFAULT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `departement` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `asset_histori`
--

INSERT INTO `asset_histori` (`id`, `id_asset`, `nama_pengguna`, `departement`, `tanggal`, `keterangan`) VALUES
(4, 4, 'arif', NULL, '2018-11-20', 'Meminjam'),
(5, 4, NULL, NULL, '2018-11-20', 'Mengembalikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `nama_departement` char(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departement`
--

INSERT INTO `departement` (`id`, `nama_departement`) VALUES
(1, 'Finance'),
(2, 'Warehouse'),
(3, 'Sales'),
(4, 'Delivery'),
(5, 'IT'),
(6, 'HR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL DEFAULT '0',
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `keterangan`) VALUES
(1, 'Laptop', 'Segala macam jenis laptop'),
(2, 'Printer', 'Segala macam jenis printer'),
(4, 'Tablet', 'Tablet samsung'),
(5, 'Printer Dot Matrix', 'Printer Faktur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `nama_level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `nama_model` varchar(50) NOT NULL DEFAULT '0',
  `brand` varchar(50) NOT NULL DEFAULT '0',
  `nomor_model` varchar(50) DEFAULT NULL,
  `id_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `model`
--

INSERT INTO `model` (`id`, `nama_model`, `brand`, `nomor_model`, `id_kategori`) VALUES
(1, 'LENOVO ideapad 320', 'LENOVO', '80XG', '1'),
(2, 'HP Pavilion', 'HP', 'X360', '1'),
(3, 'SAMSUNG GALAXY TAB A', 'SAMSUNG', 'SM-T449', '3'),
(4, 'Printer LaserJet', 'HP', 'HP LaserJet M12W', '2'),
(5, 'SAMSUNG GALAXY TAB A', 'SAMSUNG', 'SM-T285', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(50) NOT NULL DEFAULT '0',
  `tipe_status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `nama_status`, `tipe_status`) VALUES
(1, 'bisa digunakan', 'digunakan'),
(2, 'tidak bisa digunakan', 'pending'),
(3, 'rusak', 'arsip'),
(4, 'hilang', 'arsip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `nama` char(50) NOT NULL DEFAULT '0',
  `nik` varchar(50) DEFAULT NULL,
  `alamat` tinytext,
  `id_departement` int(20) NOT NULL DEFAULT '0',
  `level` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `nik`, `alamat`, `id_departement`, `level`) VALUES
(1, 'chairulazmi', 'e10adc3949ba59abbe56e057f20f883e', 'Chairul Azmi', 'NIK201722019', 'Slawi, Tegal', 5, '1'),
(2, 'putriamaliyah', 'e10adc3949ba59abbe56e057f20f883e', 'Putri Amaliyah', 'NIK0912080123', 'Pacul, Tegal', 1, '2'),
(3, 'ekowibowo', 'e10adc3949ba59abbe56e057f20f883e', 'Eko Wibowo', '20170102KI', 'Dukuhturi, Tegal', 2, '2'),
(4, 'arif', 'e10adc3949ba59abbe56e057f20f883e', 'arif', 'KI23018-2', 'Pegirikan, Tegal', 2, '2'),
(5, 'jokoindratno', 'e10adc3949ba59abbe56e057f20f883e', 'Joko Indratno', 'KI02232', 'Pegirikan, Tegal', 4, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id_asset`);

--
-- Indexes for table `asset_histori`
--
ALTER TABLE `asset_histori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `id_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `asset_histori`
--
ALTER TABLE `asset_histori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
