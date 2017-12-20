-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 12:46 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `bb_admin`
--

CREATE TABLE `bb_admin` (
  `id_admin` int(2) NOT NULL,
  `username_admin` varchar(35) NOT NULL,
  `password_admin` text NOT NULL,
  `date_admin` date NOT NULL,
  `time_admin` time NOT NULL,
  `date_time_admin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_admin`
--

INSERT INTO `bb_admin` (`id_admin`, `username_admin`, `password_admin`, `date_admin`, `time_admin`, `date_time_admin`) VALUES
(1, 'admin', '9b2b2b708fc80ce45315e7ea2837d58a', '2017-07-01', '01:00:00', '2017-07-01 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bb_bank`
--

CREATE TABLE `bb_bank` (
  `id_bank` int(3) NOT NULL,
  `name_bank` varchar(45) NOT NULL,
  `acc_bank` varchar(25) NOT NULL,
  `owner_bank` varchar(45) NOT NULL,
  `logo_bank` varchar(45) NOT NULL,
  `date_bank` date NOT NULL,
  `time_bank` time NOT NULL,
  `date_time_bank` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_bank`
--

INSERT INTO `bb_bank` (`id_bank`, `name_bank`, `acc_bank`, `owner_bank`, `logo_bank`, `date_bank`, `time_bank`, `date_time_bank`) VALUES
(1, 'BCA', '88348384', 'MobRent', 'tg1501078655.png', '2017-11-13', '21:14:24', '2017-11-13 21:14:24'),
(2, 'Mandiri', '14141131', 'MobRent', 'tg1501154838.png', '2017-11-13', '21:14:34', '2017-11-13 21:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `bb_category`
--

CREATE TABLE `bb_category` (
  `id_cat` int(3) NOT NULL,
  `name_cat` varchar(35) NOT NULL,
  `desc_cat` text NOT NULL,
  `slug_cat` text NOT NULL,
  `date_cat` date NOT NULL,
  `time_cat` time NOT NULL,
  `date_time_cat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_category`
--

INSERT INTO `bb_category` (`id_cat`, `name_cat`, `desc_cat`, `slug_cat`, `date_cat`, `time_cat`, `date_time_cat`) VALUES
(1, 'MPV', 'Bus besar dapat menampung banyak penumpang', 'mpv', '2017-10-23', '14:05:51', '2017-10-23 14:05:51'),
(2, 'SUV', 'Bus dengan berukuran sedang', 'suv', '2017-10-23', '14:06:25', '2017-10-23 14:06:25'),
(5, 'rarar', 'wewqe', 'rarar', '2017-08-01', '19:58:36', '2017-08-01 19:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `bb_invoice`
--

CREATE TABLE `bb_invoice` (
  `id_inv` int(3) NOT NULL,
  `id_vh` int(3) NOT NULL,
  `status_inv` int(1) NOT NULL,
  `code_inv` varchar(13) NOT NULL,
  `name_inv` varchar(45) NOT NULL,
  `handphone_inv` varchar(20) NOT NULL,
  `email_inv` varchar(35) NOT NULL,
  `destination_inv` text NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `finish_date` date NOT NULL,
  `long_inv` int(3) NOT NULL,
  `total_inv` varchar(35) NOT NULL,
  `penalty_inv` varchar(45) NOT NULL,
  `img_inv` text NOT NULL,
  `id_bank` int(2) NOT NULL,
  `date_inv` date NOT NULL,
  `date_time_inv` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bb_menu`
--

CREATE TABLE `bb_menu` (
  `id_menu` int(5) NOT NULL,
  `id_page` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_menu`
--

INSERT INTO `bb_menu` (`id_menu`, `id_page`) VALUES
(24, 2),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bb_meta_category`
--

CREATE TABLE `bb_meta_category` (
  `id_mc` int(3) NOT NULL,
  `id_cat` int(3) NOT NULL,
  `id_vh` int(3) NOT NULL,
  `date_mc` date NOT NULL,
  `time_mc` time NOT NULL,
  `date_time_mc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_meta_category`
--

INSERT INTO `bb_meta_category` (`id_mc`, `id_cat`, `id_vh`, `date_mc`, `time_mc`, `date_time_mc`) VALUES
(2, 1, 2, '2017-07-17', '16:14:58', '2017-07-17 16:14:58'),
(3, 2, 3, '2017-07-17', '16:17:54', '2017-07-17 16:17:54'),
(4, 1, 4, '2017-08-01', '21:31:03', '2017-08-01 21:31:03'),
(5, 1, 5, '2017-08-01', '21:56:27', '2017-08-01 21:56:27'),
(6, 2, 6, '2017-08-01', '22:02:12', '2017-08-01 22:02:12'),
(7, 5, 7, '2017-11-13', '21:25:46', '2017-11-13 21:25:46'),
(8, 0, 8, '2017-12-10', '16:30:36', '2017-12-10 16:30:36'),
(9, 1, 9, '2017-12-10', '16:31:00', '2017-12-10 16:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `bb_meta_seat`
--

CREATE TABLE `bb_meta_seat` (
  `id_ms` int(3) NOT NULL,
  `id_seat` int(3) NOT NULL,
  `id_vh` int(3) NOT NULL,
  `date_ms` date NOT NULL,
  `time_ms` time NOT NULL,
  `date_time_ms` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_meta_seat`
--

INSERT INTO `bb_meta_seat` (`id_ms`, `id_seat`, `id_vh`, `date_ms`, `time_ms`, `date_time_ms`) VALUES
(3, 1, 2, '2017-07-17', '16:14:58', '0000-00-00 00:00:00'),
(4, 2, 2, '2017-07-17', '16:14:58', '0000-00-00 00:00:00'),
(5, 3, 3, '2017-07-17', '16:17:54', '0000-00-00 00:00:00'),
(6, 4, 3, '2017-07-17', '16:17:54', '0000-00-00 00:00:00'),
(7, 1, 4, '2017-08-01', '21:31:03', '0000-00-00 00:00:00'),
(8, 1, 5, '2017-08-01', '21:56:27', '0000-00-00 00:00:00'),
(9, 2, 5, '2017-08-01', '21:56:27', '0000-00-00 00:00:00'),
(10, 1, 6, '2017-08-01', '22:02:12', '0000-00-00 00:00:00'),
(11, 3, 6, '2017-08-01', '22:02:12', '0000-00-00 00:00:00'),
(12, 4, 6, '2017-08-01', '22:02:12', '0000-00-00 00:00:00'),
(13, 1, 7, '2017-11-13', '21:25:46', '0000-00-00 00:00:00'),
(14, 0, 8, '2017-12-10', '16:30:36', '0000-00-00 00:00:00'),
(15, 5, 9, '2017-12-10', '16:31:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bb_page`
--

CREATE TABLE `bb_page` (
  `id_page` int(3) NOT NULL,
  `name_page` varchar(45) NOT NULL,
  `desc_page` text NOT NULL,
  `slug_page` text NOT NULL,
  `date_page` date NOT NULL,
  `time_page` time NOT NULL,
  `date_time_page` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_page`
--

INSERT INTO `bb_page` (`id_page`, `name_page`, `desc_page`, `slug_page`, `date_page`, `time_page`, `date_time_page`) VALUES
(1, 'Kontak Kami', 'Lorem ipsum bla bla', 'kontak-kami', '2017-07-25', '18:43:55', '2017-07-25 18:43:55'),
(2, 'Tentang Kami', '<p>Deskripsi mobil. . .</p>', 'tentang-kami', '2017-08-01', '20:24:49', '2017-08-01 20:24:49'),
(3, 'gdgfglfkhf', 'Deskripsi mobil . . .', 'gdgfglfkhf', '2017-11-13', '21:26:41', '2017-11-13 21:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `bb_seat`
--

CREATE TABLE `bb_seat` (
  `id_seat` int(3) NOT NULL,
  `total_seat` varchar(3) NOT NULL,
  `date_seat` date NOT NULL,
  `time_seat` time NOT NULL,
  `date_time_seat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_seat`
--

INSERT INTO `bb_seat` (`id_seat`, `total_seat`, `date_seat`, `time_seat`, `date_time_seat`) VALUES
(5, '2', '2017-11-13', '21:32:57', '2017-11-13 21:32:57'),
(6, '8', '2017-11-13', '21:33:10', '2017-11-13 21:33:10'),
(7, '4', '2017-11-13', '21:33:18', '2017-11-13 21:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `bb_setting`
--

CREATE TABLE `bb_setting` (
  `id_ws` int(11) NOT NULL,
  `name_ws` varchar(45) NOT NULL,
  `slogan_ws` varchar(55) NOT NULL,
  `telp_ws` varchar(19) NOT NULL,
  `email_ws` varchar(45) NOT NULL,
  `address_ws` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_setting`
--

INSERT INTO `bb_setting` (`id_ws`, `name_ws`, `slogan_ws`, `telp_ws`, `email_ws`, `address_ws`) VALUES
(1, 'Rental Mobil', 'Akomodasi dengan standar kenyamanan yang memuaskan', '123456789', 'author@mail.com', 'jl. jalan jalan');

-- --------------------------------------------------------

--
-- Table structure for table `bb_vehicle`
--

CREATE TABLE `bb_vehicle` (
  `id_vh` int(3) NOT NULL,
  `name_vh` varchar(35) NOT NULL,
  `desc_vh` text NOT NULL,
  `slug_vh` text NOT NULL,
  `price_vh` varchar(35) NOT NULL,
  `image_vh` text NOT NULL,
  `date_vh` date NOT NULL,
  `time_vh` time NOT NULL,
  `date_time_vh` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_vehicle`
--

INSERT INTO `bb_vehicle` (`id_vh`, `name_vh`, `desc_vh`, `slug_vh`, `price_vh`, `image_vh`, `date_vh`, `time_vh`, `date_time_vh`) VALUES
(9, 'eqweqw', 'Deskripsi Kendaraan . . .', 'eqweqw', '2313', 'tg1512898260.png', '2017-12-10', '16:31:00', '2017-12-10 16:31:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bb_admin`
--
ALTER TABLE `bb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bb_bank`
--
ALTER TABLE `bb_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `bb_category`
--
ALTER TABLE `bb_category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `bb_invoice`
--
ALTER TABLE `bb_invoice`
  ADD PRIMARY KEY (`id_inv`);

--
-- Indexes for table `bb_menu`
--
ALTER TABLE `bb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `bb_meta_category`
--
ALTER TABLE `bb_meta_category`
  ADD PRIMARY KEY (`id_mc`);

--
-- Indexes for table `bb_meta_seat`
--
ALTER TABLE `bb_meta_seat`
  ADD PRIMARY KEY (`id_ms`);

--
-- Indexes for table `bb_page`
--
ALTER TABLE `bb_page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `bb_seat`
--
ALTER TABLE `bb_seat`
  ADD PRIMARY KEY (`id_seat`);

--
-- Indexes for table `bb_setting`
--
ALTER TABLE `bb_setting`
  ADD PRIMARY KEY (`id_ws`);

--
-- Indexes for table `bb_vehicle`
--
ALTER TABLE `bb_vehicle`
  ADD PRIMARY KEY (`id_vh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bb_admin`
--
ALTER TABLE `bb_admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bb_bank`
--
ALTER TABLE `bb_bank`
  MODIFY `id_bank` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bb_category`
--
ALTER TABLE `bb_category`
  MODIFY `id_cat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bb_invoice`
--
ALTER TABLE `bb_invoice`
  MODIFY `id_inv` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `bb_menu`
--
ALTER TABLE `bb_menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `bb_meta_category`
--
ALTER TABLE `bb_meta_category`
  MODIFY `id_mc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bb_meta_seat`
--
ALTER TABLE `bb_meta_seat`
  MODIFY `id_ms` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `bb_page`
--
ALTER TABLE `bb_page`
  MODIFY `id_page` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bb_seat`
--
ALTER TABLE `bb_seat`
  MODIFY `id_seat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bb_setting`
--
ALTER TABLE `bb_setting`
  MODIFY `id_ws` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bb_vehicle`
--
ALTER TABLE `bb_vehicle`
  MODIFY `id_vh` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
