-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2019 pada 07.01
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_inv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `bid` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`bid`, `brand_name`, `status`) VALUES
(50, 'Amiko', '1'),
(51, 'Kresna', '1'),
(52, 'test', '1'),
(53, 'Erection', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `parent_cat` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`cid`, `parent_cat`, `category_name`, `status`) VALUES
(20, 0, 'Besi', '1'),
(21, 0, 'Aksesoris', '1'),
(25, 0, 'Baut', '1'),
(26, 25, 'Mur', '1'),
(27, 0, 'Plumbing', '1'),
(28, 0, 'Electrical', '1'),
(29, 0, 'Bahan Pembantu', '1'),
(30, 21, 'Kecil', '1'),
(31, 21, 'Besar', '1'),
(33, 0, 'Lainya', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(61, 'Aprea', '2018-05-10', 50000, 0, 0, 0, 50000, 0, 'Cash'),
(62, 'Aprea', '2018-05-10', 50000, 0, 0, 0, 50000, 0, 'Cash'),
(63, 'Aprea', '2018-05-10', 50000, 0, 0, 0, 50000, 0, 'Cash'),
(64, 'Aprea', '2018-05-10', 500000, 0, 0, 0, 500000, 0, 'Cash'),
(65, 'Erection', '2018-05-10', 1000000, 0, 0, 0, 1000000, 0, 'Cash'),
(66, 'Josua', '2018-10-10', 50000, 0, 0, 0, 25000, 25000, 'Cash'),
(67, 'Erection', '2018-10-10', 150000, 0, 0, 0, 15000, 135000, 'Cash'),
(68, 'Erection', '0000-00-00', 3500000, 0, 0, 0, 1000000, 2500000, 'Cash'),
(69, 'gudangluar', '0000-00-00', 7050000, 0, 0, 0, 3000000, 4050000, 'Cash'),
(70, 'Gudang Luar', '0000-00-00', 4380000, 0, 0, 0, 3000000, 1380000, 'Cash'),
(71, 'Gudang Luar', '0000-00-00', 372000, 0, 0, 0, 70000, 302000, 'Cash'),
(72, 'Gudang Luar 2', '0000-00-00', 3650000, 0, 0, 0, 900000, 2750000, 'Cash');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
(1, 61, 'M30', 50000, 1),
(2, 62, 'M30', 50000, 1),
(3, 63, 'M30', 50000, 1),
(4, 64, 'M30', 50000, 10),
(5, 65, 'M30', 50000, 20),
(6, 66, 'M30', 50000, 1),
(7, 67, 'M30', 50000, 1),
(8, 67, 'Baut', 10000, 10),
(9, 68, 'M30', 50000, 50),
(10, 68, 'Baut', 10000, 100),
(11, 69, 'AS55', 705000, 10),
(12, 70, 'AS25', 365000, 12),
(13, 71, 'Longdrat M24', 62000, 6),
(14, 72, 'AS25', 365000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `p_status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`pid`, `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES
(23, 20, 51, 'AS55', 705000, 90, '2018-11-09', '1'),
(24, 20, 51, 'AS25', 365000, 78, '2018-11-09', '1'),
(25, 20, 51, 'AS24', 77000, 100, '2018-11-09', '1'),
(26, 25, 51, 'Longdrat M20', 45000, 100, '2018-11-09', '1'),
(27, 25, 51, 'Longdrat M24', 62000, 94, '2018-11-09', '1'),
(28, 27, 51, 'Ball Velve 2', 345000, 200, '2018-11-09', '1'),
(29, 29, 51, 'Baru', 50000, 200, '2018-11-19', '1'),
(30, 20, 51, 'Besi Beton 8mm', 45000, 200, '2018-11-21', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` enum('Admin','Other') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(8, 'aprea', 'apreak@yahoo.com', '$2y$08$Eu3sfZyfXzuT4ajFFCskd.wKAS04/qRU.tY1C.w.pvUi997RLwln.', 'Admin', '2018-09-25', '2019-01-07 06:01:19', ''),
(9, 'admin', 'admin@yahoo.com', '$2y$08$dCVE32eYxfHjLywD.1RK/.MN6VITIDqLTT3zFj8CI2A5GXg/zbOIi', 'Admin', '2018-09-25', '2018-11-21 06:11:36', ''),
(10, 'admin2', 'admin2@yahoo.com', '$2y$08$wqHWtocQ88JE6zjv.sBsI.mjNa6.b9Ef0WiUf5De/1tTPZw.ouV.y', 'Admin', '2018-09-25', '2018-09-25 10:09:46', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indeks untuk tabel `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `cid` (`cid`),
  ADD KEY `bid` (`bid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `brands` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
