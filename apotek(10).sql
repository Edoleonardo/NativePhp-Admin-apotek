-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 03:13 PM
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
  `tempo_barang` date NOT NULL,
  `create_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_item`, `id_kategori`, `id_supplier`, `id_brand`, `kode_barang`, `nama_barang`, `stock_barang`, `gambar_barang`, `qr_code`, `deskripsi`, `harga_barang`, `tempo_barang`, `create_date`, `status`) VALUES
(12, '09254620210528', 6, 7, 7, '23443fds', 'asd', 20, '09254620210528asd1.png', '3121231', 'sadasd asdasd asd asd as', 12000, '2021-06-07', '2021-05-28', 'ACTIVE'),
(13, '10341120210528', 6, 7, 6, '231', 'andi', 123, '10341120210528sandhika.jpeg', '3121231', 'ayam ayam', 10000000, '2021-06-04', '2021-04-15', 'ACTIVE'),
(14, '07144620210530', 6, 7, 7, '123', 'dinda', 120, '08512620210606test1.png', '3121231', 'sdfdsfsdf', 2000, '2021-05-30', '2021-05-30', 'ACTIVE'),
(15, '12512720210616', 6, 7, 7, '231', 'anjayy', 15, '12512720210616Untitled-2.png', '3121231', 'kebesaran', 13000, '2021-06-17', '2021-06-16', 'IN-ACTIVE'),
(16, '12535120210616', 6, 7, 7, '231', 'anjayy', 10, '12535120210616Untitled-2.png', '3121231', 'asdasdasdasdasdasdasdasd', 13000, '2021-07-01', '2021-06-16', 'ACTIVE');

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
(14, 1, '09254620210528', 3, 'asddsadsa', 'Barang Keluar', 3, '2021-06-01'),
(15, 1, '09254620210528', 1, 'ads', 'Barang Keluar', 2, '2021-06-01'),
(16, 1, '10341120210528', 1, 'adas', 'Barang Keluar', 124, '2021-06-17'),
(17, 1, '12535120210616', 2, 'ads', 'Barang Keluar', 10, '2021-06-17'),
(18, 1, '10341120210528', 3, 'asddsadsa', 'Barang Keluar', 121, '2021-06-19'),
(19, 1, '07144620210530', 3, 'asd', 'Barang Keluar', 120, '2021-06-19'),
(20, 1, '09254620210528', 5, 'asd ads', 'Salah Input', 20, '2021-06-21');

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
(22, '09254620210528', 1, 1, 6, 'asdadsd adas', 'Barang Masuk', '', '2021-06-01'),
(23, '10341120210528', 1, 2, 123, 'asdadsd adas', 'Barang Masuk', '', '2021-06-01'),
(24, '07144620210530', 1, 1, 121, 'asd213', 'Barang Masuk', '', '2021-06-17'),
(25, '07144620210530', 1, 2, 123, 'asdasd', 'Barang Masuk', '', '2021-06-17'),
(26, '09254620210528', 1, 20, 22, '234432', 'Barang Masuk', '', '2021-06-19'),
(27, '09254620210528', 1, 3, 25, '21das', 'Barang Masuk', 'asdsda asdads', '2021-06-21');

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
(4, 'pertamax', '2021-05-21', 'IN-ACTIVE'),
(5, 'nestle', '2021-05-21', '0'),
(6, 'dinda', '2021-06-03', 'IN-ACTIVE'),
(7, 'asd', '2021-06-06', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eoq`
--

CREATE TABLE `tbl_eoq` (
  `id_eoq` int(11) NOT NULL,
  `id_item` varchar(255) NOT NULL,
  `demand` int(11) NOT NULL,
  `harga_simpan` float NOT NULL,
  `harga_unit` float NOT NULL,
  `lead_time` int(11) NOT NULL,
  `hasil_eoq` int(11) NOT NULL,
  `hasil_jarak_pesan` int(11) NOT NULL,
  `ROP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_eoq`
--

INSERT INTO `tbl_eoq` (`id_eoq`, `id_item`, `demand`, `harga_simpan`, `harga_unit`, `lead_time`, `hasil_eoq`, `hasil_jarak_pesan`, `ROP`) VALUES
(11, '10341120210528', 20, 0.02, 3000000, 12, 77460, 3873, 0),
(21, '09254620210528', 100, 0.02, 100, 12, 1000, 10, 200);

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
(1, 'Kapsul', '201', '2021-05-21', '0'),
(5, 'Bubuk', '356', '2021-05-22', '0'),
(6, 'wahyu', '123', '2021-06-03', 'ACTIVE');

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
(1, '0850502021060631ubh69kvDL.jpg', '2021-06-06');

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
(1, 16, 'anjayy', '12535120210616Untitled-2.png', 10, 'Stock barang hampir habis', '2021-06-22'),
(2, 12, 'asd', '09254620210528asd1.png', 20, 'Barang Kadaluarsa', '2021-06-22'),
(3, 13, 'andi', '10341120210528sandhika.jpeg', 123, 'Barang Kadaluarsa', '2021-06-22'),
(4, 14, 'dinda', '08512620210606test1.png', 120, 'Barang Kadaluarsa', '2021-06-22');

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
(1, 'asd', '08505820210606test1.png', 'asd@asd.com', 'asdasddas', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(2, 'aa', 'img.jpg', 'a@a.com', 'asddas asddsadsa asddasd', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(3, 'dinda', 'img.jpg', 'wahyuhaw@gmail.com', 'asdasd asdas asdasd asd', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(4, 'indah', 'img.jpg', 'indah@asd.com', 'asdads asasd asdasd asda sd', '*F6DD0C0AC75395CB5BFC12C46B8880CD156B4799');

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
  `lead_time` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `kontak_supplier`, `lead_time`, `create_date`, `status`) VALUES
(4, 'johan', 'as asd asdda asd asdasd assda  asd as 123 qad 12 asd 132 asas', '123123123321', 3, '2021-05-22', 'ACTIVE'),
(5, 'amobaa', 'asd', '213323213', 7, '2021-05-22', 'ACTIVE'),
(7, 'dinda', '123', '1321233', 1, '2021-06-03', 'ACTIVE'),
(8, 'asd', 'asdads asasd asdasd asda sd', '123231', 12, '2021-06-22', 'ACTIVE');

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
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  MODIFY `id_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id_masuk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id_brand` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_eoq`
--
ALTER TABLE `tbl_eoq`
  MODIFY `id_eoq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id_logo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_satuan_barang`
--
ALTER TABLE `tbl_satuan_barang`
  MODIFY `id_satuan` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
