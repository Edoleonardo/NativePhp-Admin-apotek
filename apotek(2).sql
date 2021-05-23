-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 08:13 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

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
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_item`, `id_kategori`, `id_supplier`, `id_brand`, `kode_barang`, `nama_barang`, `stock_barang`, `gambar_barang`, `qr_code`, `deskripsi`, `harga_barang`, `create_date`) VALUES
(7, '02112320210523', 1, 4, 1, '123123', 'joh', 145, '02112320210523Untitled-1.png', '3121231', 'asddas', 111, '2021-05-24'),
(8, '02571820210523', 1, 4, 1, '231321', 'dasdsa', 50, '0257182021052331ubh69kvDL.jpg', '3121231', 'saddsa', 10000, '2021-05-26'),
(9, '12554320210523', 1, 4, 1, '122131231', 'tablet', 50, '12554320210523sandhika.jpeg', '3121231', 'asda asda asd asd asd asd asda s asda sda asd sad a asdasda', 15000, '2021-05-28'),
(10, '01054220210523', 1, 4, 1, '132', 'anjir', 150, '01054220210523Untitled-2.png', '3121231', '213132 asdas ads asd', 1500, '2021-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id_keluar` int(20) NOT NULL,
  `id_petugas` int(20) NOT NULL,
  `id_item` varchar(255) NOT NULL,
  `jumlah_barang` int(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`id_keluar`, `id_petugas`, `id_item`, `jumlah_barang`, `date`) VALUES
(3, 1, '02112320210523', 5, '2021-05-23'),
(4, 1, '02571820210523', 100, '2021-05-23'),
(5, 1, '01054220210523', 10, '2021-05-23'),
(6, 1, '01054220210523', 100, '2021-05-23'),
(7, 1, '01054220210523', 50, '2021-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar_detail`
--

CREATE TABLE `tbl_barang_keluar_detail` (
  `id_barang_keluar` int(20) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `jumlah_keluar` int(20) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id_masuk` int(20) NOT NULL,
  `id_item` varchar(255) NOT NULL,
  `id_petugas` int(20) NOT NULL,
  `jumlah_barang` int(200) NOT NULL,
  `no_faktur` varchar(255) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id_masuk`, `id_item`, `id_petugas`, `jumlah_barang`, `no_faktur`, `create_date`) VALUES
(2, '02112320210523', 1, 123, 'ad223', '2021-05-23'),
(3, '02571820210523', 1, 100, 'asdasd', '2021-05-23'),
(4, '02112320210523', 1, 22, '213321dasdas', '2021-05-23'),
(5, '02112320210523', 1, 5, '123123adsasd', '2021-05-23'),
(6, '02571820210523', 1, 50, 'adsa1312', '2021-05-23'),
(7, '12554320210523', 1, 50, '321312dasads', '2021-05-23'),
(8, '01054220210523', 1, 230, 'dfsdfds234', '2021-05-23'),
(9, '01054220210523', 1, 100, 'asd213', '2021-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk_detail`
--

CREATE TABLE `tbl_barang_masuk_detail` (
  `id_barang_masuk` int(20) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id_brand` int(20) NOT NULL,
  `nama_brand` varchar(255) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id_brand`, `nama_brand`, `create_date`) VALUES
(1, 'pertamina', '2021-05-21'),
(4, 'pertamax', '2021-05-21'),
(5, 'nestle', '2021-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `kode_rak` varchar(255) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `kode_rak`, `create_date`) VALUES
(1, 'Kapsul', '201', '2021-05-21'),
(5, 'Bubuk', '356', '2021-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(20) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `email`, `password`) VALUES
(1, 'asd', 'asd@asd.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(2, 'aa', 'a@a.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan_barang`
--

CREATE TABLE `tbl_satuan_barang` (
  `id_satuan` int(20) NOT NULL,
  `nama_satuan` varchar(255) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(20) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `kontak_supplier` varchar(255) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `kontak_supplier`, `create_date`) VALUES
(4, 'johan', 'as asd asdda asd asdasd assda  asd as 123 qad 12 asd 132 asas', '123123123321', '2021-05-22'),
(5, 'amoba', 'asd', '213323213', '2021-05-22');

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
-- Indexes for table `tbl_barang_keluar_detail`
--
ALTER TABLE `tbl_barang_keluar_detail`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `tbl_barang_masuk_detail`
--
ALTER TABLE `tbl_barang_masuk_detail`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_satuan_barang`
--
ALTER TABLE `tbl_satuan_barang`
  ADD PRIMARY KEY (`id_satuan`);

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
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  MODIFY `id_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_barang_keluar_detail`
--
ALTER TABLE `tbl_barang_keluar_detail`
  MODIFY `id_barang_keluar` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id_masuk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_barang_masuk_detail`
--
ALTER TABLE `tbl_barang_masuk_detail`
  MODIFY `id_barang_masuk` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id_brand` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_satuan_barang`
--
ALTER TABLE `tbl_satuan_barang`
  MODIFY `id_satuan` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
