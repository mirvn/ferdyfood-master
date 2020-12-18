-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 04:21 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(3, 'Fiesta French Fries', 'French fries fiesta crinkle cut 1000g', 'Kentang', 36000, 10, 'kentang1.jpg\r\n'),
(4, 'Okey Sosis Ayam', 'Sosis Ayam 1000g', 'Sosis', 32000, 10, 'sosis1.jpg'),
(5, 'Fiesta Bakso Kuah', 'Bakso kuah Fiesta isi 10 butir 100g', 'bakso', 20000, 10, 'bakso21.jpg'),
(6, 'Fiesta Bakso Ayam', 'bakso ayam fiesta 500g', 'bakso', 30000, 10, 'bakso3.jpg'),
(7, 'Fiesta French Fries Shoestring', 'kentang goreng iris beku 1000g', 'kentang', 60000, 10, 'kentang2.jpg'),
(8, 'Fiesta French Fries Batter Coated', 'Fiesta French Fries Batter Coated iris beku 1000g', 'kentang', 60000, 10, 'kentang3.jpg'),
(9, 'Fiesta Chicken Nugget Dino', 'nugget bentuk dino 500g', 'nugget', 24000, 20, 'nugget2.jpg'),
(10, 'Fiesta Chicken Nugget Happy Star', 'nugget happy star 500g', 'nugget', 30000, 10, 'nugget3.jpg'),
(11, 'Fiesta Bakso Sosis', 'bakso ayam sosis 20 butir 300g', 'sosis', 30000, 10, 'sosis2.jpg'),
(13, 'Fiesta Cheese Sausage', 'sosis fiesta isi keju 300g', 'sosis', 30000, 10, 'sosis3.jpg');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
