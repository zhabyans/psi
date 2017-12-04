-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04 Des 2017 pada 08.35
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outlet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `NAMA_BARANG` varchar(30) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `EXPIRED` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `NAMA_BARANG`, `HARGA`, `EXPIRED`) VALUES
(1, 'Roti Basah', 7000, 4),
(2, 'roti manis', 3000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengeluaran`
--

CREATE TABLE `data_pengeluaran` (
  `ID_TRANSAKSI` varchar(20) NOT NULL,
  `ID_PENDATAAN` varchar(20) DEFAULT NULL,
  `ID_BARANG` int(11) DEFAULT NULL,
  `ID_USER` int(11) NOT NULL,
  `TANGGAL_TERJUAL` date DEFAULT NULL,
  `JUMLAH_TERJUAL` int(11) DEFAULT NULL,
  `TOTAL_TERJUAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pengeluaran`
--

INSERT INTO `data_pengeluaran` (`ID_TRANSAKSI`, `ID_PENDATAAN`, `ID_BARANG`, `ID_USER`, `TANGGAL_TERJUAL`, `JUMLAH_TERJUAL`, `TOTAL_TERJUAL`) VALUES
('kjfdsgh', 'PROD001', 1, 1, '2017-11-16', 5, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendataan_barang`
--

CREATE TABLE `pendataan_barang` (
  `ID_PENDATAAN` varchar(20) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `TANGGAL_MASUK` date DEFAULT NULL,
  `TANGGAL_RETUR` date DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `STATUS_RETUR` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendataan_barang`
--

INSERT INTO `pendataan_barang` (`ID_PENDATAAN`, `ID_BARANG`, `ID_USER`, `TANGGAL_MASUK`, `TANGGAL_RETUR`, `STOK`, `STATUS_RETUR`) VALUES
('PROD001', 2, 1, '2017-11-24', '0000-00-00', 4, 'retur'),
('PROD002', 1, 1, '2017-11-24', '0000-00-00', 5, 'retur'),
('PROD003', 1, 1, '2017-11-24', '0000-00-00', 4, 'retur'),
('PROD004', 2, 1, '2017-11-25', '0000-00-00', 8, 'retur'),
('PROD006', 1, 1, '2017-12-01', '2017-12-05', 5, NULL),
('PROD007', 2, 1, '2017-12-01', '2017-12-04', 7, 'retur'),
('PROD008', 2, 1, '2017-12-01', '2017-12-04', 7, 'retur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `USER` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `USER`, `PASSWORD`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`);

--
-- Indexes for table `data_pengeluaran`
--
ALTER TABLE `data_pengeluaran`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `FK_MENCATAT` (`ID_USER`),
  ADD KEY `FK_MENGAKSES_NAMA` (`ID_BARANG`),
  ADD KEY `FK_MENGAMBIL_STOK` (`ID_PENDATAAN`);

--
-- Indexes for table `pendataan_barang`
--
ALTER TABLE `pendataan_barang`
  ADD PRIMARY KEY (`ID_PENDATAAN`),
  ADD KEY `FK_MENGINPUTKAN` (`ID_USER`),
  ADD KEY `FK_MENYIMPAN_NAMA` (`ID_BARANG`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pengeluaran`
--
ALTER TABLE `data_pengeluaran`
  ADD CONSTRAINT `FK_MENCATAT` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_MENGAKSES_NAMA` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_MENGAMBIL_STOK` FOREIGN KEY (`ID_PENDATAAN`) REFERENCES `pendataan_barang` (`ID_PENDATAAN`);

--
-- Ketidakleluasaan untuk tabel `pendataan_barang`
--
ALTER TABLE `pendataan_barang`
  ADD CONSTRAINT `FK_MENGINPUTKAN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_MENYIMPAN_NAMA` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
