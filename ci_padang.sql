-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 08:44 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_padang`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE IF NOT EXISTS `bahan_baku` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `harga` int(6) NOT NULL,
  `jumlah` tinyint(3) NOT NULL,
  `kategori` tinyint(2) NOT NULL,
  `satuan` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `nama`, `harga`, `jumlah`, `kategori`, `satuan`) VALUES
(1, 'Ayam', 13000, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `due_tanggal` datetime NOT NULL,
  `id_user` tinyint(3) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `tanggal`, `due_tanggal`, `id_user`, `status`) VALUES
(1, '2017-01-05 08:01:34', '2017-01-12 08:01:34', 2, 'confirmed'),
(2, '2017-01-05 08:25:25', '2017-01-12 08:25:25', 2, 'confirmed'),
(3, '2017-01-05 08:29:25', '2017-01-12 08:29:25', 2, 'belum lunas'),
(4, '2017-01-06 16:17:28', '2017-01-13 16:17:28', 19, 'belum lunas'),
(5, '2017-01-06 16:17:28', '2017-01-13 16:17:28', 19, 'belum lunas');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Daging'),
(2, 'Bumbu Kering'),
(3, 'Sayuran'),
(4, 'Bumbu basah'),
(5, 'Ikan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`) VALUES
(1, 'Daging'),
(2, 'Sayur');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE IF NOT EXISTS `log_activity` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `nama`) VALUES
(1, 'Tambah Produk'),
(2, 'Edit Produk'),
(3, 'Hapus Produk'),
(4, 'Tambah Kategori'),
(5, 'Edit Kategori'),
(6, 'Hapus Kategori'),
(7, 'Tambah Bahan Baku'),
(8, 'Update Bahan Baku'),
(9, 'Hapus Bahan Baku'),
(10, 'Pakai Bahan Baku');

-- --------------------------------------------------------

--
-- Table structure for table `log_bahan_baku`
--

CREATE TABLE IF NOT EXISTS `log_bahan_baku` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `id_bahan_baku` tinyint(3) NOT NULL,
  `id_activity` tinyint(3) NOT NULL,
  `id_user` tinyint(3) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jumlah` tinyint(3) NOT NULL,
  `harga` int(6) NOT NULL,
  `tanggal_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `log_bahan_baku`
--

INSERT INTO `log_bahan_baku` (`id`, `id_bahan_baku`, `id_activity`, `id_user`, `nama`, `jumlah`, `harga`, `tanggal_added`) VALUES
(1, 1, 10, 1, '', 1, 0, '2017-01-05 09:34:15'),
(2, 3, 7, 1, 'Udang', 1, 0, '2017-01-05 00:00:00'),
(3, 3, 9, 1, '0', 0, 0, '2017-01-05 00:00:00'),
(4, 2, 9, 1, 'Udang', 0, 0, '2017-01-05 00:00:00'),
(5, 3, 9, 1, '0', 0, 0, '2017-01-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `log_produk`
--

CREATE TABLE IF NOT EXISTS `log_produk` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `id_produk` tinyint(3) NOT NULL,
  `id_kategori` tinyint(3) NOT NULL,
  `id_activity` tinyint(3) NOT NULL,
  `id_user` tinyint(3) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `stok` tinyint(3) NOT NULL,
  `tanggal_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `log_produk`
--

INSERT INTO `log_produk` (`id`, `id_produk`, `id_kategori`, `id_activity`, `id_user`, `nama`, `stok`, `tanggal_added`) VALUES
(3, 2, 1, 1, 1, 'Ayam Betutu Sudirman', 12, '2017-01-05'),
(4, 3, 1, 1, 1, 'rendang', 15, '2017-01-06'),
(5, 4, 1, 1, 1, 'cumi', 8, '2017-01-06'),
(6, 4, 0, 2, 1, 'cumi', 10, '2017-01-06'),
(7, 4, 0, 3, 1, 'cumi', 0, '2017-01-06'),
(8, 5, 1, 1, 1, 'cumi', 10, '2017-01-06'),
(9, 0, 3, 4, 1, 'bumbu', 0, '2017-01-06'),
(10, 0, 3, 5, 1, 'bumbu cabe', 0, '2017-01-06'),
(11, 0, 3, 6, 1, 'bumbu cabe', 0, '2017-01-06'),
(12, 2, 0, 3, 1, 'Ayam Betutu Sudirman', 0, '2017-02-01'),
(13, 5, 0, 3, 1, 'cumi', 0, '2017-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `id_invoice` tinyint(3) NOT NULL,
  `id_produk` tinyint(3) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_invoice`, `id_produk`, `nama_barang`, `jumlah`, `harga`) VALUES
(1, 1, 2, 'Ayam Betutu Sudirman', 2, 10000),
(2, 2, 2, 'Ayam Betutu Sudirman', 2, 10000),
(3, 3, 2, 'Ayam Betutu Sudirman', 1, 10000),
(4, 4, 2, 'Ayam Betutu Sudirman', 2, 10000),
(5, 5, 3, 'rendang', 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `id_kategori` tinyint(3) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `harga` int(6) NOT NULL,
  `stok` tinyint(2) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_kategori`, `nama`, `harga`, `stok`, `gambar`) VALUES
(3, 1, 'rendang', 5000, 13, 'file_06012017161050.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama`) VALUES
(1, 'Kilogram'),
(2, 'Liter'),
(3, 'Gram');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(8) NOT NULL,
  `groups` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `groups`) VALUES
(1, '', 'root', '1234', 1),
(2, 'Jonathan', 'jon', '123', 2),
(18, 'alza', 'alza', '123', 2),
(19, 'ike kurniawati', 'ike', '12345', 2),
(20, 'nadhiful', 'ipul', '123', 2),
(21, '', 'Ridha', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `use_raw`
--

CREATE TABLE IF NOT EXISTS `use_raw` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `id_bahan_baku` tinyint(2) NOT NULL,
  `jumlah` tinyint(3) NOT NULL,
  `tanggal_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `use_raw`
--

INSERT INTO `use_raw` (`id`, `id_bahan_baku`, `jumlah`, `tanggal_added`) VALUES
(1, 1, 1, '2017-01-05 09:34:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
