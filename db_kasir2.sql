-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2024 pada 15.27
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `kode_barang`, `tgl_masuk`, `gambar`, `supplier`) VALUES
(4, 'Indomie Goreng', '3000', 20, '1', '0000-00-00', 'indomie.jpg\r\n', '0'),
(6, 'Teh Pucuk', '3000', 51, '3', '0000-00-00', 'teh_pucuk.jpg', '0'),
(7, 'Mie Sedap Rasa Soto', '2900', 15, '2', '0000-00-00', 'mie_soto.jpg', '0'),
(9, 'Aqua Botol 600ml', '2800', 72, '111', '0000-00-00', 'aqua.jpg', '0'),
(14, 'French Fries 2000 63g', '8000', 27, '121', '0000-00-00', 'friench.png', '0'),
(24, 'Chitato Snack Potato Chips Sapi Panggang 68g', '12700', 23, '40', '2024-02-23', 'chitato.jpg', '0'),
(33, 'Minyak Goreng Bimoli 1 Liter', '23000', 30, '7', '2024-03-05', '410108761_minyak.jpg', '0'),
(34, 'Pepsodent 180 gram ', '15500', 39, '6', '2024-03-05', '1672133677_pepsodent.jpg', '0'),
(35, 'Whiskas 80 gram ', '8000', 48, '20', '2024-03-05', '573130198_whiskas.jpg', '0'),
(36, 'Luwak White Coffe 20 gram', '8000', 80, '150', '2024-03-05', '1961762351_luwak.jpg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id_barang_msk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `supplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id_barang_msk`, `id_barang`, `jumlah`, `tgl_masuk`, `nama_barang`, `supplier`) VALUES
(2, 4, 11, '2024-02-19', 'Indomie Goreng', 'indofood'),
(3, 6, 3, '2024-02-19', 'Teh Pucuk', 'Mayora Group'),
(8, 9, 5, '2024-02-23', 'Aqua Botol 600ml', 'PT Air Murni'),
(12, 0, 50, '2024-02-23', 'Chitato Snack Potato Chips Sapi Panggang 68g', 'IndoTrading'),
(14, 9, 3, '2024-02-23', 'Aqua Botol 600ml', 'PT Air Murni'),
(15, 7, 3, '2024-02-25', 'Mie Sedap Rasa Soto', 'indofood'),
(16, 0, 1111, '2024-03-01', 'Chitato Snack Potato Chips Sapi Panggang 68g1', 'IndoTrading'),
(18, 0, 11, '2024-03-01', 'Chitato Snack Potato Chips Sapi Panggang 68g1', 'IndoTrading'),
(19, 9, 1, '2024-03-01', 'Aqua Botol 600ml', 'PT Air Murni'),
(20, 0, 111, '2024-03-01', 'Chitato Snack Potato Chips Sapi Panggang 68g', 'IndoTrading'),
(21, 0, 11, '2024-03-01', 'French Fries 2000 62g', 'IndoTrading'),
(22, 24, 3, '2024-03-01', 'Chitato Snack Potato Chips Sapi Panggang 68g', 'IndoTrading'),
(23, 14, 3, '2024-03-01', 'French Fries 2000 62g', 'IndoTrading'),
(24, 14, 3, '2024-03-01', 'French Fries 2000 62g', 'IndoTrading'),
(26, 9, 1, '2024-03-01', 'Aqua Botol 600ml', 'PT Air Murni'),
(27, 24, 3, '2024-03-01', 'Chitato Snack Potato Chips Sapi Panggang 68g', 'IndoTrading'),
(28, 0, 10, '2024-03-02', 'floridina', 'PT Indah Jaya Indonesia'),
(29, 31, 1111, '2024-03-02', 'floridina', 'PT Indah Jaya Indonesia'),
(30, 24, 30, '2024-03-02', 'Chitato Snack Potato Chips Sapi Panggang 68g', 'IndoTrading'),
(32, 24, 5, '2024-03-05', 'Chitato Snack Potato Chips Sapi Panggang 68g', 'IndoTrading'),
(33, 4, 24, '2024-03-05', 'Indomie Goreng', 'indofood'),
(34, 24, 28, '2024-03-05', 'Chitato Snack Potato Chips Sapi Panggang 68g', 'IndoTrading'),
(35, 0, 30, '2024-03-05', 'Minyak Goreng Bimoli 1 Liter', 'PT Indah Jaya Indonesia'),
(36, 0, 40, '2024-03-05', 'pepsodent 180 gram ', 'PT Indah Jaya Indonesia'),
(37, 0, 50, '2024-03-05', 'Whiskas 80 gram ', 'PT Indah Jaya Indonesia'),
(38, 0, 50, '2024-03-05', 'Luwak White Coffe 20 gram', 'IndoTrading'),
(39, 36, 30, '2024-03-05', 'Luwak White Coffe 20 gram', 'IndoTrading'),
(46, 9, 20, '2024-03-07', 'Aqua Botol 600ml', 'PT Air Murni');

--
-- Trigger `tbl_barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `menambah_stok` AFTER INSERT ON `tbl_barang_masuk` FOR EACH ROW BEGIN

UPDATE tbl_barang SET 
stok = stok+NEW.jumlah 
WHERE id_barang = NEW.id_barang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `nama`, `alamat`, `no_tlp`, `email`, `poin`) VALUES
(1, 'Bagas', 'Jalan Raya Keadilan', '081541517515', 'bagas@gmail.com', 100),
(3, 'Raditya Meyka Harry Sandhiva', 'Jalan Raya Keadilan Pancoran Mas', '081513175617', 'radityameyka5@gmil.com', 370),
(5, 'Ika  Partiwi', 'Pancoran Mas', '08616818861', 'ika@gmail.com', 50),
(7, 'budi', 'Pancoran Mas', '08813232321', 'ika@gmail.com', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_barang` text NOT NULL,
  `id_barang` varchar(150) NOT NULL,
  `jumlah` varchar(150) NOT NULL,
  `sub_total` varchar(30) NOT NULL,
  `bayar` varchar(30) NOT NULL,
  `kembalian` varchar(30) NOT NULL,
  `status` enum('lunas','belum') NOT NULL,
  `kode_bayar` varchar(15) NOT NULL,
  `poin` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `potongan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_member`, `tanggal`, `nama_barang`, `id_barang`, `jumlah`, `sub_total`, `bayar`, `kembalian`, `status`, `kode_bayar`, `poin`, `nama`, `potongan`) VALUES
(9, 0, '2024-02-23', 'Indomie Goreng,Aqua Botol 600ml', '4,9', '1,2', '8600', '20000', '11400', 'lunas', '1234', '0', 'Ika Pratiwi', '0'),
(13, 3, '2024-02-24', 'French Fries 2000 62g,Aqua Botol 600ml', '14,9', '2,1', '18800', '20000', '1200', 'lunas', '1234', '10', '', '0'),
(14, 0, '2024-02-25', 'Indomie Goreng,Mie Sedap Rasa Soto,Teh Pucuk,Aqua Botol 600ml,Chitato Snack Potato Chips Sapi Panggang 68g', '4,7,6,9,24', '2,1,2,2,1', '33200', '40000', '6800', 'lunas', '0', '0', '', '0'),
(29, 1, '2024-02-25', 'Chitato Snack Potato Chips Sapi Panggang 68g', '24', '1', '12700', '20000', '7300', 'lunas', '0', '10', '', '0'),
(39, 3, '2024-02-25', 'Indomie Goreng,Chitato Snack Potato Chips Sapi Panggang 68g', '4,24', '1,1', '15700', '20000', '4300', 'lunas', '0', '10', '', '0'),
(40, 3, '2024-02-26', 'Indomie Goreng,Teh Pucuk,Chitato Snack Potato Chips Sapi Panggang 68g', '4,6,24', '2,1,2', '34400', '40000', '5600', 'lunas', '0', '30', '', '0'),
(44, 1, '2024-02-26', 'Indomie Goreng,Chitato Snack Potato Chips Sapi Panggang 68g', '4,24', '1,1', '15700', '16000', '300', 'lunas', '0', '10', '', '0'),
(52, 0, '2024-02-29', 'Chitato Snack Potato Chips Sapi Panggang 68g,Teh Pucuk', '24,6', '1,2', '18700', '20000', '1300', 'lunas', '4280', '0', 'Raditya Meyka', '0'),
(75, 3, '2024-03-01', 'Chitato Snack Potato Chips Sapi Panggang 68g,Aqua Botol 600ml', '24,9', '2,1', '28200', '30000', '1800', 'lunas', '0', '10', '', '0'),
(76, 0, '2024-03-01', 'Chitato Snack Potato Chips Sapi Panggang 68g,French Fries 2000 62g,Teh Pucuk', '24,14,6', '2,1,1', '36400', '40000', '3600', 'lunas', '4775', '0', 'Ika Pratiwi', '0'),
(77, 3, '2024-03-01', 'Indomie Goreng,Chitato Snack Potato Chips Sapi Panggang 68g', '4,24', '2,1', '18700', '20000', '1300', 'lunas', '0', '10', '', '0'),
(82, 0, '2024-03-02', 'Indomie Goreng,Chitato Snack Potato Chips Sapi Panggang 68g,Mie Sedap Rasa Soto', '4,24,7', '1,1,1', '18600', '20000', '1400', 'lunas', '6781', '0', 'Ika Pratiwi', '0'),
(95, 5, '2024-03-02', 'Chitato Snack Potato Chips Sapi Panggang 68g,French Fries 2000 63g,Mie Sedap Rasa Soto', '24,14,7', '1,1,1', '23600', '25000', '1400', 'lunas', '3930', '10', 'Ika Pratiwi', '0'),
(100, 5, '2024-03-03', 'Chitato Snack Potato Chips Sapi Panggang 68g,French Fries 2000 63g,Aqua Botol 600ml', '24,14,9', '2,1,1', '36200', '40000', '3800', 'lunas', '7035', '10', 'Ika Pratiwi', '0'),
(101, 3, '2024-03-03', 'Chitato Snack Potato Chips Sapi Panggang 68g', '24', '1', '12700', '15000', '2300', 'lunas', '9316', '10', 'Raditya Meyka', '0'),
(108, 3, '2024-03-03', 'Chitato Snack Potato Chips Sapi Panggang 68g', '24', '1', '12700', '10000', '700', 'lunas', '0', '10', '', '3400'),
(109, 1, '2024-03-03', 'Indomie Goreng,Chitato Snack Potato Chips Sapi Panggang 68g', '4,24', '1,1', '15700', '16000', '300', 'lunas', '0', '10', '', '0'),
(110, 3, '2024-03-03', 'Chitato Snack Potato Chips Sapi Panggang 68g', '24', '1', '12700', '10000', '800', 'lunas', '0', '10', '', '3500'),
(113, 5, '2024-03-03', 'Indomie Goreng,Chitato Snack Potato Chips Sapi Panggang 68g', '4,24', '1,1', '15700', '16000', '300', 'lunas', '0', '10', '', '0'),
(120, 5, '2024-03-04', 'Indomie Goreng,Chitato Snack Potato Chips Sapi Panggang 68g', '4,24', '1,1', '15700', '16000', '300', 'lunas', '0', '10', '', '0'),
(121, 5, '2024-03-04', 'Indomie Goreng,Chitato Snack Potato Chips Sapi Panggang 68g', '4,24', '1,1', '15700', '16000', '400', 'lunas', '0', '10', '', '100'),
(122, 5, '2024-03-04', 'Chitato Snack Potato Chips Sapi Panggang 68g,Mie Sedap Rasa Soto', '24,7', '1,1', '15600', '13000', '400', 'lunas', '0', '10', '', '3000'),
(123, 5, '2024-03-04', 'Chitato Snack Potato Chips Sapi Panggang 68g,Aqua Botol 600ml', '24,9', '1,1', '15500', '16000', '500', 'lunas', '0', '10', '', '0'),
(126, 0, '2024-03-04', 'Teh Pucuk,Mie Sedap Rasa Soto,French Fries 2000 63g', '6,7,14', '1,1,1', '13900', '15000', '1100', 'lunas', '2204', '0', 'Raditya Meyka', '0'),
(129, 0, '2024-03-05', 'Indomie Goreng', '4', '1', '3000', '5000', '2000', 'lunas', '0', '0', '', '0'),
(130, 0, '2024-03-05', 'Indomie Goreng,Mie Sedap Rasa Soto', '4,7', '1,1', '5900', '6000', '100', 'lunas', '0', '0', '', '0'),
(131, 0, '2024-03-05', 'Chitato Snack Potato Chips Sapi Panggang 68g,French Fries 2000 63g,Aqua Botol 600ml', '24,14,9', '1,1,1', '23500', '25000', '1500', 'lunas', '9054', '0', 'Ika Pratiwi', '0'),
(132, 0, '2024-03-05', 'Chitato Snack Potato Chips Sapi Panggang 68g', '24', '1', '12700', '15000', '2300', 'lunas', '9712', '0', 'Ika Pratiwi', '0'),
(133, 0, '2024-03-05', 'Chitato Snack Potato Chips Sapi Panggang 68g', '24', '1', '12700', '13000', '300', 'lunas', '9187', '0', 'Ika Pratiwi', '0'),
(134, 5, '2024-03-05', 'Chitato Snack Potato Chips Sapi Panggang 68g', '24', '1', '12700', '15000', '2300', 'lunas', '8063', '10', 'Ika Pratiwi', '0'),
(135, 0, '2024-03-05', 'Chitato Snack Potato Chips Sapi Panggang 68g,Mie Sedap Rasa Soto', '24,7', '1,1', '15600', '16000', '400', 'lunas', '2690', '0', 'Raditya Meyka', '0'),
(136, 5, '2024-03-05', 'Chitato Snack Potato Chips Sapi Panggang 68g,Mie Sedap Rasa Soto', '24,7', '1,1', '15600', '16000', '400', 'lunas', '6410', '10', 'Raditya Meyka', '0'),
(137, 5, '2024-03-05', 'Indomie Goreng,Chitato Snack Potato Chips Sapi Panggang 68g', '4,24', '1,1', '15700', '16000', '300', 'lunas', '0', '10', '', '0'),
(138, 5, '2024-03-05', 'Pepsodent 180 gram ', '34', '1', '15500', '15000', '1600', 'lunas', '0', '10', '', '2100'),
(139, 5, '2024-03-05', 'Indomie Goreng,Chitato Snack Potato Chips Sapi Panggang 68g', '4,24', '2,1', '18700', '17000', '400', 'lunas', '0', '10', '', '2100'),
(140, 0, '2024-03-05', 'Indomie Goreng,Teh Pucuk', '4,6', '1,1', '6000', '0', '0', 'belum', '1529', '0', 'Raditya', '0'),
(141, 5, '2024-03-05', 'Chitato Snack Potato Chips Sapi Panggang 68g,French Fries 2000 63g', '24,14', '2,1', '33400', '40000', '6600', 'lunas', '6788', '30', 'Ika Pratiwi', '0'),
(142, 0, '2024-03-06', 'Mie Sedap Rasa Soto,Teh Pucuk,Indomie Goreng', '7,6,4', '1,1,1', '8900', '0', '0', 'belum', '246306', '0', 'Raditya Meyka', '0'),
(143, 0, '2024-03-06', 'Teh Pucuk,Mie Sedap Rasa Soto', '6,7', '1,2', '8800', '0', '0', 'belum', '560706', '0', 'Ika Pratiwi', '0'),
(146, 0, '2024-03-06', 'French Fries 2000 63g,Whiskas 80 gram ', '14,35', '1,1', '16000', '17000', '1000', 'lunas', '385306', '0', 'Raditya Meyka', '0'),
(149, 5, '2024-03-07', 'Mie Sedap Rasa Soto,Indomie Goreng,French Fries 2000 63g', '7,4,14', '1,1,1', '13900', '15000', '1100', 'lunas', '518107', '10', 'Ika Pratiwi', '0'),
(150, 0, '2024-03-07', 'French Fries 2000 63g,Whiskas 80 gram ,Indomie Goreng', '14,35,4', '1,1,1', '19000', '0', '0', 'belum', '684407', '0', 'dzaki', '0'),
(153, 0, '2024-03-07', 'Indomie Goreng,Teh Pucuk', '4,6', '10,15', '45000', '0', '0', 'belum', '679607', '0', 'Ika Pratiwi', '0'),
(154, 0, '2024-03-07', 'Teh Pucuk', '6', '12', '36000', '0', '0', 'belum', '580107', '0', 'Ridho', '0'),
(155, 0, '2024-03-07', 'Aqua Botol 600ml,Teh Pucuk', '9,6', '5,8', '23000', '0', '0', 'belum', '825507', '0', 'Ika Pratiwi', '0');

--
-- Trigger `tbl_pemesanan`
--
DELIMITER $$
CREATE TRIGGER `menambah_poin` AFTER INSERT ON `tbl_pemesanan` FOR EACH ROW BEGIN

IF (NEW.id_member > 0) THEN
UPDATE tbl_member SET
poin = poin+NEW.poin
WHERE id_member=NEW.id_member;

END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `menambah_poin_online` AFTER UPDATE ON `tbl_pemesanan` FOR EACH ROW BEGIN

IF (NEW.id_member > 0) THEN
UPDATE tbl_member SET
poin = poin+NEW.poin
WHERE id_member=NEW.id_member;

END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `mengurangi_poin` AFTER INSERT ON `tbl_pemesanan` FOR EACH ROW BEGIN

IF (NEW.id_member > 0 && NEW.potongan > 0 && NEW.poin > 0) THEN
UPDATE tbl_member SET
poin = NEW.poin
WHERE id_member=NEW.id_member;

ELSEIF (NEW.id_member > 0 && NEW.potongan > 0 && NEW.poin = 0) THEN
UPDATE tbl_member SET
poin = 0
WHERE id_member=NEW.id_member;

END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jabatan` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `jabatan`) VALUES
(4, 'admin', 'admin', 'admin', 'admin'),
(6, 'kasir', 'kasir', 'kasir', 'petugas'),
(18, 'Raditya meyka', 'radit1', 'radit1', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id_barang_msk`);

--
-- Indeks untuk tabel `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id_barang_msk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
