-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 06:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ferdyfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id`, `transaksi_id`, `produk_id`, `qty`, `subtotal`) VALUES
(19, 14, 1, 3, 180000),
(20, 14, 2, 2, 56000),
(21, 14, 3, 1, 36000),
(22, 15, 4, 1, 32000),
(23, 15, 3, 1, 36000),
(24, 16, 3, 1, 36000),
(25, 16, 4, 1, 32000),
(26, 16, 8, 1, 60000),
(27, 17, 4, 2, 64000),
(28, 17, 3, 1, 36000),
(29, 18, 4, 1, 32000),
(30, 18, 3, 1, 36000),
(31, 19, 4, 1, 32000),
(32, 19, 3, 1, 36000),
(33, 19, 8, 1, 60000),
(34, 20, 4, 1, 32000),
(35, 20, 3, 1, 36000),
(36, 20, 2, 1, 28000),
(37, 21, 13, 1, 30000),
(38, 21, 11, 1, 30000),
(39, 22, 4, 1, 32000),
(40, 22, 3, 1, 36000),
(41, 23, 4, 1, 32000),
(42, 23, 3, 1, 36000),
(43, 24, 4, 1, 32000),
(44, 24, 3, 1, 36000),
(45, 2147483647, 2, 1, 28000),
(46, 2147483647, 4, 2, 64000),
(47, 2147483647, 3, 1, 36000),
(48, 2147483647, 2, 1, 28000),
(49, 1, 3, 1, 36000),
(50, 1, 4, 1, 32000),
(51, 2, 4, 1, 32000),
(52, 2, 3, 1, 36000),
(53, 2, 2, 1, 28000),
(54, 2, 1, 1, 60000),
(55, 2, 5, 1, 20000),
(56, 2, 6, 1, 30000),
(57, 2, 7, 1, 60000),
(58, 2, 8, 1, 60000),
(59, 2, 13, 1, 30000),
(60, 2, 11, 1, 30000),
(61, 2, 10, 1, 30000),
(62, 2, 9, 1, 24000),
(63, 3, 2, 3, 84000),
(64, 4, 3, 1, 36000),
(65, 4, 4, 1, 32000),
(66, 5, 1, 1, 60000),
(67, 5, 2, 1, 28000),
(68, 5, 4, 1, 32000),
(69, 6, 4, 1, 32000),
(70, 6, 3, 1, 36000),
(71, 7, 2, 1, 28000),
(72, 7, 1, 1, 60000);

--
-- Triggers `tb_detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `trigger_transaksi` AFTER INSERT ON `tb_detail_transaksi` FOR EACH ROW BEGIN
	UPDATE tb_product SET stock = stock-NEW.qty
    WHERE id_product = NEW.produk_id;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'rizki', 'klaten', '2020-05-09 13:03:34', '2020-05-10 13:03:34'),
(2, 'burhan', 'GTA', '2020-05-09 13:08:48', '2020-05-10 13:08:48'),
(3, 'reza', 'nangka', '2020-05-09 20:11:43', '2020-05-10 20:11:43'),
(4, 'irpan', 'suko', '2020-05-09 20:34:43', '2020-05-10 20:34:43'),
(5, 'hanip', 'alwa', '2020-05-10 19:44:20', '2020-05-11 19:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name_product` varchar(120) NOT NULL,
  `qty` int(3) NOT NULL,
  `price` int(11) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_product`, `name_product`, `qty`, `price`, `pilihan`) VALUES
(1, 1, 2, 'Champ Chicken Balls', 1, 28000, ''),
(2, 2, 2, 'Champ Chicken Balls', 1, 28000, ''),
(3, 3, 1, 'Fiesta Nugget', 1, 60000, ''),
(4, 3, 3, 'Fiesta French Fries', 1, 36000, ''),
(5, 4, 3, 'Fiesta French Fries', 1, 36000, ''),
(6, 4, 4, 'Okey Sosis Ayam', 1, 32000, ''),
(7, 5, 2, 'Champ Chicken Balls', 1, 28000, ''),
(8, 5, 1, 'Fiesta Nugget', 1, 60000, ''),
(9, 5, 3, 'Fiesta French Fries', 1, 36000, ''),
(10, 5, 1, 'Fiesta Nugget', 1, 60000, '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
    UPDATE tb_product SET stock = stock-NEW.qty
    WHERE id_product = NEW.id_product;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(120) NOT NULL,
  `information` varchar(225) NOT NULL,
  `category` varchar(60) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(4) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `name_product`, `information`, `category`, `price`, `stock`, `image`) VALUES
(1, 'Fiesta Nugget', 'Fiesta chicken nugget 1000gr', 'Nugget', 60000, 19, 'nugget1.jpg'),
(2, 'Champ Chicken Balls', 'Bakso Ayam 200g isi 20 ', 'Bakso', 28000, 10, 'bakso1.jpg'),
(3, 'Fiesta French Fries', 'French fries fiesta crinkle cut 1000g', 'Kentang', 36000, 8, 'kentang1.jpg\r\n'),
(4, 'Okey Sosis Ayam', 'Sosis Ayam 1000g', 'Sosis', 32000, 7, 'sosis1.jpg'),
(5, 'Fiesta Bakso Kuah', 'Bakso kuah Fiesta isi 10 butir 100g', 'Bakso', 20000, 10, 'bakso21.jpg'),
(6, 'Fiesta Bakso Ayam', 'bakso ayam fiesta 500g', 'Bakso', 30000, 10, 'bakso3.jpg'),
(7, 'Fiesta French Fries Shoestring', 'kentang goreng iris beku 1000g', 'Kentang', 60000, 10, 'kentang2.jpg'),
(8, 'Fiesta French Fries Batter Coated', 'Fiesta French Fries Batter Coated iris beku 1000g', 'Kentang', 60000, 10, 'kentang3.jpg'),
(9, 'Fiesta Chicken Nugget Dino', 'nugget bentuk dino 500g', 'Nugget', 24000, 20, 'nugget2.jpg'),
(10, 'Fiesta Chicken Nugget Happy Star', 'nugget happy star 500g', 'Nugget', 30000, 10, 'nugget3.jpg'),
(11, 'Fiesta Bakso Sosis', 'bakso ayam sosis 20 butir 300g', 'Sosis', 30000, 10, 'sosis2.jpg'),
(13, 'Fiesta Cheese Sausage', 'sosis fiesta isi keju 300g', 'Sosis', 30000, 10, 'sosis3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `kasir_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tanggal`, `total`, `kasir_id`) VALUES
(1, '2020-06-22', 68000, 1),
(2, '2020-06-22', 440000, 1),
(3, '2020-06-23', 84000, 1),
(4, '2020-06-23', 68000, 1),
(5, '2020-06-23', 120000, 1),
(6, '2020-06-23', 68000, 2),
(7, '2020-06-23', 88000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `role`) VALUES
(1, 'admin', 'admin', 'Admin', 1),
(2, 'kasir', 'kasir', 'Kasir Asep', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
