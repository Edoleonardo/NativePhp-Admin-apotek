-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 05:16 PM
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
(22, '03461020210725', 10, 11, 11, '123', 'asd', 123, '03461020210725Capture.PNG', '3121231', 'ASD', 12000, '2021-07-30', '2021-07-25', 'ACTIVE'),
(23, '03481620210725', 10, 11, 11, '212', 'asss', 231, '03481620210725Capture.PNG', '3121231', 'asd', 1233, '2021-07-28', '2021-07-25', 'ACTIVE'),
(24, '10093620210725', 10, 11, 11, '123asd', 'berak', 123, '10093620210725Capture.PNG', '3121231', 'asd asd', 12000, '2021-07-26', '2021-07-25', 'ACTIVE'),
(25, '10113420210725', 10, 11, 11, 'asd12', 'dekolgen', 123, '10113420210725Capture.PNG', '3121231', 'asd', 12000, '2021-07-26', '2021-07-25', 'ACTIVE'),
(26, '10124120210725', 10, 11, 11, 'asd123', 'pana', 123, '10124120210725Capture.PNG', '3121231', 'asd', 123000, '2021-07-28', '2021-07-25', 'ACTIVE');

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
  `create_date` date NOT NULL,
  `no_faktur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`id_keluar`, `id_petugas`, `id_item`, `jumlah_barang`, `keterangan`, `status`, `sisah_stock`, `create_date`, `no_faktur`) VALUES
(27, 7, '03461020210725', 12, 'ads', 'Barang Keluar', 123, '2021-07-25', '-');

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
(33, '03461020210725', 7, 123, 123, 'ASD12', 'Barang Masuk', '', '2021-07-25'),
(34, '03481620210725', 7, 231, 231, 'asad123', 'Barang Masuk', '', '2021-07-25'),
(35, '03461020210725', 7, 12, 135, 'asd212', 'Barang Masuk', 'asd', '2021-07-25'),
(36, '10093620210725', 7, 123, 123, 'asd123', 'Barang Masuk', 'asd123', '2021-07-25'),
(37, '10113420210725', 7, 123, 123, 'asd123', 'Barang Masuk', 'asd123', '2021-07-25'),
(38, '10124120210725', 7, 123, 123, 'asd123', 'Barang Masuk', 'berak', '2021-07-25');

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
(11, 'asd', '2021-07-25', 'ACTIVE');

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
(10, 'asd', '123', '2021-07-25', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `id_logo` int(20) NOT NULL,
  `nama_logo` varchar(255) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 'asd', 'img.jpg', 'asd@asd.com', 'asd', '*F6DD0C0AC75395CB5BFC12C46B8880CD156B4799');

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
(11, 'asd', 'asd asdasd asdasd', '123123', 7, '2021-07-25', 'ACTIVE');

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
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  MODIFY `id_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id_masuk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id_brand` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_eoq`
--
ALTER TABLE `tbl_eoq`
  MODIFY `id_eoq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id_logo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
