-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2023 pada 08.40
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_ekspor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(150) NOT NULL,
  `adminPassword` varchar(256) NOT NULL,
  `hakAkses` enum('full','sebagian') NOT NULL,
  `imageAdmin` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminPassword`, `hakAkses`, `imageAdmin`) VALUES
(1, 'admin', 'admin123', 'sebagian', 'default.jpeg'),
(2, 'leader', 'leader123', 'full', 'default.jepg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`cartId`, `userId`, `productId`, `quantity`) VALUES
(21, 6, 1, 508),
(22, 6, 2, 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_orders`
--

CREATE TABLE `detail_orders` (
  `detailId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantityDisetujui` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_orders`
--

INSERT INTO `detail_orders` (`detailId`, `orderId`, `productId`, `quantity`, `quantityDisetujui`) VALUES
(54, 85, 1, 500, 0),
(55, 86, 2, 500, 0),
(56, 87, 2, 500, 35),
(57, 87, 3, 500, 0),
(58, 88, 1, 500, 500),
(59, 89, 1, 500, 0),
(60, 90, 2, 500, 600),
(61, 90, 2, 500, 700);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `paymentStatus` int(11) NOT NULL,
  `statusPengajuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `paymentStatus`, `statusPengajuan`) VALUES
(85, 6, 0, 1),
(86, 6, 0, 2),
(87, 6, 1, 1),
(88, 6, 0, 0),
(89, 6, 0, 0),
(90, 6, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(150) NOT NULL,
  `productDes` longtext NOT NULL,
  `price` float NOT NULL,
  `productImage` varchar(256) NOT NULL,
  `minOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`productId`, `productName`, `productDes`, `price`, `productImage`, `minOrder`) VALUES
(1, 'Kopi Toraja', 'Kopi Toraja Sulawesi memiliki aroma kopi spesial yang khas dengan tingkat keasaman yang rendah, halus, lembut, citarasa floral dan fruity. Sensasi rasa kopinya kuat dengan ciri karakter rempah-rempah atau kacang-kacangan seperti kayu manis atau cardamon (sejenis jahe)', 2.5, 'Kopi_Toraja.jpg', 500),
(2, 'Kopi Arabica ', 'Kopi Arabica Gayo memiliki citarasa nutty dan buttery. Aromanya sangat kuat dengan aksen nutty dan spice. Keasamannya sangat rendah, sweetness cenderung tinggi, dan body yang dihasilkan medium.', 2.5, 'Kopi_Arabica_Gayo.jpg', 500),
(3, 'Kopi Kintamani ', 'Kopi Kintamani Bali memiliki cita rasa asam segar seperti buah jeruk (citrusy) tanpa meninggalkan aftertaste di mulut. Body-nya medium dan aroma yang dihasilkan sangat kuat dan manis dengan sentuhan bunga dan rempah rempah.', 2.5, 'Kopi_Kintamani_Bali.jpg', 500),
(4, 'Kopi Robusta', 'kopi Robusta Lampung cenderung lebih pahit dan kurang asam dengan memiliki tubuh yang lebih berat dan tekstur yang lebih kental serta aroma yang khas yaitu sperti bau tanah, kayu, dan rempah-rempah.', 2.3, 'Kopi_Lampung.jpeg', 500),
(5, 'Kopi Wamena', 'Kopi Papua Wamena memiliki aroma yang khas dengan sentuhan buah tropis, bunga, dan rempah-rempah. Rasanya yang bervariasi dengan rasa buah, cokelat, dan rempah-rempah dengan asam yang lembut.', 2.5, 'Kopi_Wamena_Papua.jpg', 500),
(6, 'Kopi Mandailing', 'Kopi Mandailing memiliki aroma yang khas dengan sentuhan rempah-rempah, kayu, dan cokelat. Rasanya bisa mencakup rasa cokelat, bunga, rempah-rempah, dan kadang-kadang dengan sentuhan buah. Rasanya kompleks dan memuaskan.', 2.4, 'Kopi_Mandailing.jpg', 500),
(7, 'Kopi Flores', 'Kopi Flores Bajawa memiliki aroma yang khas dengan sentuhan buah tropis, bunga, dan rempah-rempah. Rasa kopinya memiliki asam yang hidup dan cerah, dengan sentuhan cokelat, rempah-rempah, dan buah.', 2.2, 'Kopi_Flores.jpg', 500),
(8, 'Kopi Java', 'Kopi Java memiliki aroma yang khas yaitu buah, bunga, kayu, dan rempah-rempah. Rasa kopi ini bervariasi, tetapi seringkali menawarkan rasa yang halus, seimbang, dan konsisten. Rasanya bisa mencakup cokelat, buah-buahan, dan kadang-kadang dengan sentuhan rempah-rempah.', 2.2, 'Kopi_Java.jpg', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL,
  `userImage` varchar(256) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `tanggalDibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`userId`, `name`, `username`, `email`, `phoneNumber`, `password`, `userImage`, `nationality`, `tanggalDibuat`) VALUES
(5, 'iksankocak', 'ucok', 'iksanwijaya7@gmail.com', '', '$2y$10$sKKwE0wYF3chhqC.fVgQ/.4tero7sJu0HdYxUMplx4KFlfjAgT4H2', 'default.jpeg', 'ikmasasa', '0000-00-00'),
(6, 'iksan', 'ucok', 'iksanwijaya8@gmail.com', '', '$2y$10$J0d7HZloI5JwJMBDpiovgOJ7ECl.Dg5.FbtrBet0I/jSJl74RQPV6', 'pro1701766783.png', 'ikmasasa', '0000-00-00'),
(7, 'iksan', 'sans', 'sans123@gmail.com', '', '$2y$10$6Hc.1QKnl0jw6/1HT9QzuOosejJCqOQ/LcTl8.cVmDlEgZyQan52q', 'pro1701753375.png', 'indo', '2023-12-05'),
(8, 'ikan', 'ikan', 'ikan123@gmail.com', '09090909090', '$2y$10$.g8r834R6QNbn7L4k86zaOMaRKx20jXdK7tSFs.ieCap8cCFRIJJm', 'pro1701943225.png', 'saasasasdsad', '2023-12-07'),
(9, 'iksanwijaya', 'sans', 'iksanwijaya1@gmail.com', '098989', '$2y$10$.6Lf570xQcVjzDIaCbjVuejFkNfZDxHRTgxgBnJ9QmKPklxpvVule', 'default.jpeg', 'ikikikiiki', '2023-12-13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indeks untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`detailId`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `detail_productId_foreginkey` (`productId`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `orders_userId_foreginkey` (`userId`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `detailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `productId` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`),
  ADD CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Ketidakleluasaan untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_productId_foreginkey` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`),
  ADD CONSTRAINT `orderId` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_userId_foreginkey` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
