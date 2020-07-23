-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2020 pada 15.54
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avengerstore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`categoryid`, `categoryname`, `description`) VALUES
(1, 'Alat Olahraga', 'Alat Olahraga'),
(2, 'Komputer', 'Komputer'),
(3, 'Alat Rumah Tangga', 'Alat Rumah Tangga'),
(4, 'Kandang Hewan', 'Kandang Hewan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `customerid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postalcode` int(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `phone` int(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`customerid`, `email`, `password`, `firstname`, `lastname`, `address1`, `address2`, `city`, `state`, `postalcode`, `country`, `phone`, `foto`) VALUES
(1, 'faruq@gmail.com', '$2y$10$EufxgOdXqtaeoa/QbqeEEe.tp8/n4SH59Gn/Dtx7n4R9mUKniJZvK', 'faruq', 'iman', 'jl.patimura', 'kec jatinegara kel rawabadung', 'jakarta timur', 'DKI Jakarta', 12980, 'Indonesia', 8972782, 'img_avatar.png'),
(2, 'iskey@gmail.com', '$2y$10$D/4Z3wzv8vM/K3hP7IM9u.o7kLFaOh..gVnWz6FtnCFtyONHoaHyS', 'iskey', 'DJ', 'kalimantab', 'jakarta', 'jakarta', 'dki jakarta', 12890, 'Indonesia', 8787878, ''),
(3, 'lazuardy@gmail.com', '$2y$10$Nx07X3ayKxr/33zpMSVHAOBk89DmE/Iusutyl.lCbLV0unx11o/km', 'faruq', 'iskey', 'kalimantab', 'jakarta', 'jakarta', 'dki jakarta', 12890, 'Indonesia', 87878784, ''),
(4, 'faruq8@gmail.com', '$2y$10$.Gjwoe85E2r57sAe3P/ze./4dCOn9eQlPhZ1G5tauEIpnqEBIOtaK', 'faruq', 'iskey', 'kalimantab', 'kalimantab\r\njakarta', 'jakarta', 'dki jakarta', 12890, 'Indonesia', 8787878, 'cars2.png'),
(5, 'faruq10@gmail.com', '$2y$10$6b.khfpqSoPyriehrJt7tucwANLeTsDcW7jL2JbxYxKXrmTHBdEiW', 'faruq', 'iskey', 'kalimantab', 'kalimantab\r\njakarta', 'jakarta', 'dki jakarta', 12890, 'Indonesia', 8787878, 'file_1594745569_faruqpng'),
(6, 'faruq11@gmail.com', '$2y$10$orJlTBAcKxEDJfVaqiEkVewb2HOxCG6z2VgXYyVOA/dLbIojRUcPS', 'faruq', 'iskey', 'kalimantab', 'kalimantab\r\njakarta', 'jakarta', 'dki jakarta', 12890, 'Indonesia', 8787878, 'file_1594746072_faruq.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `discussions`
--

CREATE TABLE `discussions` (
  `id` int(11) NOT NULL,
  `productid` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idcomentator` int(11) NOT NULL,
  `rolecomentator` varchar(100) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='rolecomentator';

--
-- Dumping data untuk tabel `discussions`
--

INSERT INTO `discussions` (`id`, `productid`, `created_at`, `idcomentator`, `rolecomentator`, `comment`) VALUES
(1, 1, '2020-07-19 16:51:57', 1, 'seller', 'The border-top shorthand property sets all the top border properties in one declaration.'),
(2, 1, '2020-07-19 16:51:57', 1, 'customer', 'The border-top shorthand property sets all the top border properties in one declaration.'),
(3, 1, '2020-07-19 17:27:03', 1, 'seller', 'The border-top shorthand property sets all the top border properties in one declarations.'),
(4, 1, '2020-07-19 17:27:03', 1, 'customer', 'The border-top shorthand property sets all the top border properties in one declarations.'),
(5, 1, '2020-07-19 17:27:18', 1, 'seller', 'The border-top shorthand property sets all the top border properties in one declarationss.'),
(6, 1, '2020-07-19 17:27:18', 1, 'customer', 'The border-top shorthand property sets all the top border properties in one declarationss.'),
(7, 4, '2020-07-20 14:44:10', 1, 'customer', 'test dong'),
(8, 1, '2020-07-20 16:49:11', 1, 'customer', 'The border-top shorthand property sets all the top border properties in one declarations.sa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `customerid` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `productid` int(11) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `paid` varchar(5) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(30) NOT NULL,
  `postalcode` int(20) NOT NULL,
  `varian` varchar(5000) NOT NULL,
  `ccname` varchar(200) NOT NULL,
  `ccnumber` bigint(50) NOT NULL,
  `ccexpiration` varchar(10) NOT NULL,
  `cccvv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `email`, `productid`, `orderdate`, `status`, `paid`, `firstname`, `lastname`, `address1`, `address2`, `state`, `country`, `postalcode`, `varian`, `ccname`, `ccnumber`, `ccexpiration`, `cccvv`) VALUES
(3, 1, 'faruq@gmail.com', 1, '2020-07-21 05:18:11', 'Delivered', 'yes', 'faruq', 'iman', 'jl.patimura', 'kec jatinegara kel rawabadung', 'DKI Jakarta', 'Indonesia', 12980, 'Hitam', 'faruq iman', 121313121, '07/20', 588),
(4, 1, 'faruq@gmail.com', 4, '2020-07-21 08:47:44', 'Delivered', 'yes', 'faruq', 'iman', 'jl.patimura', 'kec jatinegara kel rawabadung', 'DKI Jakarta', 'Indonesia', 12980, 'Hitam', 'faruq iman', 21113131, '3131', 311);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productname` varchar(500) NOT NULL,
  `productdescription` varchar(1000) NOT NULL,
  `sellerid` int(50) NOT NULL,
  `price` bigint(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `categoryid` int(50) NOT NULL,
  `stock` int(50) NOT NULL,
  `varian` varchar(5000) NOT NULL,
  `berat` int(10) NOT NULL,
  `kondisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`productid`, `productname`, `productdescription`, `sellerid`, `price`, `foto`, `categoryid`, `stock`, `varian`, `berat`, `kondisi`) VALUES
(1, 'Sepeda Statis Platinum Bike TL8207', '<p style=\"text-align:left;\"> PLATINUM BIKE 2 IN 1 SEPEDA FITNESS GYM OLAHRAGA STATIS AS ON TV <br><br>Platinum bike sepeda olahraga ini Memiliki Fungsi bukan hanya pada kayuhan kaki saja , tetapi pada gerakan tangan. Sehingga cocok bagi yg ingin melakukan terapi. Gerakan pada ayuhan tangan juga bisa dikunci agar tidak digerakkan sehingga menjadi gerakan bersepeda biasa.<br>Olah Raga Jadi Lebih Mudah Tanpa Harus Keluar Rumah Atau Ke Fitness Center, Menggunakan Sepeda Statis Platinum Bike Ini, Anda Bisa Berolah Raga Di Rumah Stiap Harinya.<br><br>Spesifikasi :<br>- Dual motion<br>- LCD display : Speed, calories, distance, timer, heart pulse<br>- Adjustable height<br>- Adjustable resistance level<br>- Water bottle &amp; holder<br><br>NOTE : JIKA WARNA SILVER KOSONG , KITA KIRIM WARNA YG HITAM . ATC KAMI ANGGAP SETUJU .<br><br>HAPPY SHOPPING ^_^</p>', 1, 1500000, 'sepedastatis.jpg', 1, 1, '[\"Merah\",\"Hijau\",\"Hitam\"]', 1, 'Baru'),
(2, 'GK1 Wireless Keyboard Simple', 'GK1 Wireless Keyboard Simple', 1, 87000, 'wirelesskeyboard.jpg', 2, 1, '[\"Merah\",\"Hijau\",\"Hitam\"]', 1, 'Baru'),
(3, 'RAK DINDING DAPUR ALUMUNIUM', 'RAK DINDING DAPUR ALUMUNIUM', 1, 95000, 'rakdinding.jpg', 3, 1, '[\"Merah\",\"Hijau\",\"Hitam\"]', 1, 'Baru'),
(4, 'Keranjang Rio Besar L - Pet Cargo ', 'Keranjang Rio Besar L - Pet Cargo ', 1, 105000, 'keranjang.jpg', 4, 1, '[\"Merah\",\"Hijau\",\"Hitam\"]', 1, 'Baru'),
(6, 'Sepeda Fitness statis sepeda fitnes ', '<p>Jaminan pengembalian produk berlaku 2x24 jam dari produk diterima pembeli<br /><br />Jaminan Pengembalian Produk berlaku untuk kesalahan dalam ukuran produk yang dikirim.<br /><br />Terdapat cacat produksi pada produk yang menggunakan kemasan original brand.<br /><br />Ongkir dari pembeli ke toko untuk produk yang akan ditukarkan ditanggung pembeli, dan akan mendapat penggantian pada saat barang pengganti dikirim dari toko ke pembeli</p>', 1, 2500000, 'file_1595337029_HealthStore.jpg', 1, 1, '[\"Merah\",\"Kuning\",\"Hijau\"]', 1, 'Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sellers`
--

CREATE TABLE `sellers` (
  `sellerid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postalcode` int(20) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sellers`
--

INSERT INTO `sellers` (`sellerid`, `email`, `phone`, `companyname`, `logo`, `notes`, `password`, `firstname`, `lastname`, `address1`, `address2`, `city`, `state`, `postalcode`, `country`) VALUES
(1, 'seller@gmail.com', 1272728, 'Health Store', 'file_1595150165_HealthStore.jpg', 'Kami adalah store super lengkaps', '$2y$10$EufxgOdXqtaeoa/QbqeEEe.tp8/n4SH59Gn/Dtx7n4R9mUKniJZvK', 'Health', 'Store', 'Jl.Kalimantan', 'Kec Koja Kel Cililitan', 'DKI Jakarta', 'Jakarta Utara', 13930, 'Indonesia'),
(2, 'seller2@gmail.com', 8787878, 'health care', 'Spider-Man-In-Avengers-Infinity-War-4K-HD-Wallpaper-WallpapersByte-com-1920x1080.jpg', 'test2', '$2y$10$pWz6AeqH0PPCqF7PNs.H4O2v7vNSN4yZToyXbr6U/2C5hJWx1qRAu', '', '', 'kalimantab', 'jakarta', 'jakarta', 'dki jakarta', 12890, 'Indonesia'),
(3, 'faruq412@gmail.com', 8787878, 'health care', 'fox.png', 'test4', '$2y$10$oUEDdbDKvlriZEGArprZ0emMPvxhO8Ti2LsLUBE463TxAsDciI1Bm', '', '', 'kalimantab', 'jakarta', 'jakarta', 'dki jakarta', 12890, 'Indonesia'),
(4, 'faruq4125@gmail.com', 8787878, 'health care', 'fox1.png', 'test5', '$2y$10$3.rmdH1uPC2H6TSbOyAr7uaw2ozfeFp6kZeK.dAENhhLpWW1oO9.q', '', '', 'kalimantab', 'jakarta', 'jakarta', 'dki jakarta', 12890, 'Indonesia'),
(5, 'faruq12@gmail.com', 8787878, 'sdwadwa', 'file_1594746675_sdwadwa.png', 'dwadwa', '$2y$10$h1woYhgWc4RtrUQUtR3.meDaO8NILnCiE/RknmIE0d48.M0q819lm', '', '', 'kalimantab', 'jakarta', 'jakarta', 'dki jakarta', 12890, 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shippers`
--

CREATE TABLE `shippers` (
  `shippersid` int(11) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`);

--
-- Indeks untuk tabel `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`);

--
-- Indeks untuk tabel `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`sellerid`);

--
-- Indeks untuk tabel `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`shippersid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sellers`
--
ALTER TABLE `sellers`
  MODIFY `sellerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `shippers`
--
ALTER TABLE `shippers`
  MODIFY `shippersid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
