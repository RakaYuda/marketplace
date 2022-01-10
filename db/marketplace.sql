-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 10 Jan 2022 pada 16.30
-- Versi server: 5.7.32
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mp_brand`
--

CREATE TABLE `mp_brand` (
  `id_brand` int(11) NOT NULL,
  `name_brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mp_brand`
--

INSERT INTO `mp_brand` (`id_brand`, `name_brand`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(6, 'ZARA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mp_category_product`
--

CREATE TABLE `mp_category_product` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mp_category_product`
--

INSERT INTO `mp_category_product` (`id_category`, `name_category`) VALUES
(1, 'Fashion'),
(2, 'Traveling'),
(5, 'Electronic');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mp_product`
--

CREATE TABLE `mp_product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `stock_product` int(11) NOT NULL,
  `category_product` int(11) NOT NULL,
  `brand_product` int(11) NOT NULL,
  `image_product` varchar(255) NOT NULL,
  `price_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mp_product`
--

INSERT INTO `mp_product` (`id_product`, `name_product`, `stock_product`, `category_product`, `brand_product`, `image_product`, `price_product`) VALUES
(1, 'Limited Red Shoes', 100, 1, 1, 'https://images.pexels.com/photos/5584997/pexels-photo-5584997.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 100),
(2, 'Nike Low Sneaker', 100, 1, 1, 'https://images.pexels.com/photos/1456705/pexels-photo-1456705.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mp_role`
--

CREATE TABLE `mp_role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mp_role`
--

INSERT INTO `mp_role` (`id_role`, `role_name`) VALUES
(1, 'ADMIN'),
(2, 'USER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mp_transaction`
--

CREATE TABLE `mp_transaction` (
  `id_transaction` int(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cart_products` varchar(255) NOT NULL,
  `date_transaction` date NOT NULL,
  `total` varchar(100) NOT NULL,
  `is_pay` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mp_transaction`
--

INSERT INTO `mp_transaction` (`id_transaction`, `customer_id`, `cart_products`, `date_transaction`, `total`, `is_pay`) VALUES
(1, 1, '[1]', '2022-01-01', '100', 1),
(2, 1, '[1,1]', '2021-12-09', '200', 1),
(3, 1, '[1]', '2022-01-02', '100', 1),
(9, 1, '[1]', '2022-01-10', '100', 1),
(10, 1, '[1]', '2022-01-10', '100', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mp_user`
--

CREATE TABLE `mp_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mp_user`
--

INSERT INTO `mp_user` (`id_user`, `username`, `password`, `name`, `email`, `address`, `role`) VALUES
(1, 'admin', 'admin', 'Raka', NULL, NULL, 1),
(3, 'raka', '$2y$10$F5omxR8B5YhBgq41xf2WlOtsFkSN3KC8Q3Uztn6e./wtp2G8nhqqG', 'raka', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mp_brand`
--
ALTER TABLE `mp_brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indeks untuk tabel `mp_category_product`
--
ALTER TABLE `mp_category_product`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `mp_product`
--
ALTER TABLE `mp_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `category_product` (`category_product`),
  ADD KEY `brand_product` (`brand_product`);

--
-- Indeks untuk tabel `mp_role`
--
ALTER TABLE `mp_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `mp_transaction`
--
ALTER TABLE `mp_transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indeks untuk tabel `mp_user`
--
ALTER TABLE `mp_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mp_brand`
--
ALTER TABLE `mp_brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mp_category_product`
--
ALTER TABLE `mp_category_product`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mp_product`
--
ALTER TABLE `mp_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mp_role`
--
ALTER TABLE `mp_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mp_transaction`
--
ALTER TABLE `mp_transaction`
  MODIFY `id_transaction` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mp_user`
--
ALTER TABLE `mp_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mp_product`
--
ALTER TABLE `mp_product`
  ADD CONSTRAINT `mp_product_ibfk_1` FOREIGN KEY (`category_product`) REFERENCES `mp_category_product` (`id_category`),
  ADD CONSTRAINT `mp_product_ibfk_2` FOREIGN KEY (`brand_product`) REFERENCES `mp_brand` (`id_brand`);

--
-- Ketidakleluasaan untuk tabel `mp_user`
--
ALTER TABLE `mp_user`
  ADD CONSTRAINT `mp_user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `mp_role` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
