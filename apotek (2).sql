-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 02:19 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(20) NOT NULL,
  `id_item` varchar(255) NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `id_supplier` int(20) NOT NULL,
  `id_brand` int(20) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stock_barang` int(11) NOT NULL,
  `gambar_barang` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `tempo_barang` date NOT NULL,
  `create_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_item`, `id_kategori`, `id_supplier`, `id_brand`, `kode_barang`, `nama_barang`, `stock_barang`, `gambar_barang`, `qr_code`, `deskripsi`, `harga_barang`, `tempo_barang`, `create_date`, `status`) VALUES
(19, '08493120210722', 7, 9, 8, '123123', 'dekolgen', 70, '08493120210722S__16015497.jpg', '3121231', 'MINUN 2 KALI SEHARI', 20000, '2021-07-24', '2021-07-22', 'ACTIVE'),
(20, '08561020210722', 8, 10, 9, '123123', 'dekolgen', 123, '08561020210722S__16015497.jpg', '3121231', 'asdasd asas', 20000, '2021-07-25', '2021-07-22', 'ACTIVE'),
(21, '07405120210723', 7, 10, 9, '123', 'panadol', 123, '07405120210723S__16015497.jpg', '3121231', 'asd asd', 12000, '2021-07-24', '2021-07-23', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id_keluar` int(20) NOT NULL,
  `id_petugas` int(20) NOT NULL,
  `id_item` varchar(255) NOT NULL,
  `jumlah_barang` int(200) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `sisah_stock` int(11) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`id_keluar`, `id_petugas`, `id_item`, `jumlah_barang`, `keterangan`, `status`, `sisah_stock`, `create_date`) VALUES
(22, 5, '08493120210722', 10, 'asd', 'Barang Keluar', 110, '2021-07-23'),
(23, 5, '08493120210722', 10, 'asd', 'Barang Keluar', 100, '2021-07-23'),
(24, 5, '08493120210722', 10, '10', 'Barang Keluar', 90, '2021-07-23'),
(25, 5, '08493120210722', 10, '10', 'Barang Keluar', 80, '2021-07-23'),
(26, 5, '08493120210722', 10, 'keluar', 'Barang Keluar', 70, '2021-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id_masuk` int(20) NOT NULL,
  `id_item` varchar(255) NOT NULL,
  `id_petugas` int(20) NOT NULL,
  `jumlah_barang` int(200) NOT NULL,
  `sisah_stock` int(11) NOT NULL,
  `no_faktur` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id_masuk`, `id_item`, `id_petugas`, `jumlah_barang`, `sisah_stock`, `no_faktur`, `status`, `keterangan`, `create_date`) VALUES
(30, '08493120210722', 5, 120, 120, 'asdasd', 'Barang Masuk', '', '2021-07-22'),
(31, '08561020210722', 5, 123, 123, '123123', 'Barang Masuk', '', '2021-07-22'),
(32, '07405120210723', 5, 123, 123, 'asd123', 'Barang Masuk', '', '2021-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id_brand` int(20) NOT NULL,
  `nama_brand` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id_brand`, `nama_brand`, `create_date`, `status`) VALUES
(8, 'dekolgen', '2021-07-22', 'ACTIVE'),
(9, 'panadol', '2021-07-22', 'ACTIVE'),
(10, 'samsul', '2021-07-22', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eoq`
--

CREATE TABLE `tbl_eoq` (
  `id_eoq` int(11) NOT NULL,
  `id_item` varchar(255) NOT NULL,
  `demand` int(11) NOT NULL,
  `harga_simpan` float NOT NULL,
  `harga_pesan` float NOT NULL,
  `lead_time` int(11) NOT NULL,
  `hasil_eoq` int(11) NOT NULL,
  `TIC` int(255) NOT NULL,
  `ROP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_eoq`
--

INSERT INTO `tbl_eoq` (`id_eoq`, `id_item`, `demand`, `harga_simpan`, `harga_pesan`, `lead_time`, `hasil_eoq`, `TIC`, `ROP`) VALUES
(22, '08493120210722', 7300, 5, 148333, 7, 20812, 104059, 170);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `kode_rak` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `kode_rak`, `create_date`, `status`) VALUES
(7, 'kapsul', '120', '2021-07-22', 'ACTIVE'),
(8, 'air', '121', '2021-07-22', 'ACTIVE'),
(9, 'tablet', '123', '2021-07-22', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `id_logo` int(20) NOT NULL,
  `nama_logo` varchar(255) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`id_logo`, `nama_logo`, `create_date`) VALUES
(1, '08531020210722S__16015497.jpg', '2021-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `stock` int(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id_pesan`, `id_barang`, `nama_barang`, `img`, `stock`, `desc`, `create_date`) VALUES
(1, 19, 'dekolgen', '08493120210722S__16015497.jpg', 70, 'Barang Kadaluarsa', '2021-07-24'),
(2, 21, 'panadol', '07405120210723S__16015497.jpg', 123, 'Barang Kadaluarsa', '2021-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(20) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat_petugas` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `img`, `email`, `alamat_petugas`, `password`) VALUES
(5, 'asd', 'img.jpg', 'asd@asd.com', 'asd asd', '*F6DD0C0AC75395CB5BFC12C46B8880CD156B4799');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(20) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `kontak_supplier` varchar(255) NOT NULL,
  `lead_time` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `kontak_supplier`, `lead_time`, `create_date`, `status`) VALUES
(9, 'indomaret', 'jakarta jl taman bencong', '123123', 12, '2021-07-22', 'ACTIVE'),
(10, 'alfamart', 'asda asdasd ', '12312312', 7, '2021-07-22', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `tbl_eoq`
--
ALTER TABLE `tbl_eoq`
  ADD PRIMARY KEY (`id_eoq`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  MODIFY `id_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id_masuk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id_brand` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_eoq`
--
ALTER TABLE `tbl_eoq`
  MODIFY `id_eoq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id_logo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
