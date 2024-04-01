-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 04:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `ID_donatur` int(11) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Alamat` varchar(50) DEFAULT NULL,
  `Jenis_zakat` varchar(50) DEFAULT NULL,
  `Jumlah` varchar(5) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`ID_donatur`, `Nama`, `Alamat`, `Jenis_zakat`, `Jumlah`, `Tanggal`) VALUES
(13325, 'Ryuu Kevin', 'Tangerang, Banten', 'Beras', ' 5kg', '2024-03-26'),
(13326, 'Rully Baskom', 'Lembang, Jawa Barat', 'Beras', ' 5kg', '2024-03-06'),
(13327, 'Rusdi Cukur', 'Bogor, Jawa Barat', 'Emas', '10g', '2024-03-18'),
(13328, 'Maou-sama', 'Kastil Raja Iblis', 'Beras', '50kg', '2024-03-09'),
(13329, 'Schwalbe', 'Berlin, Jerman', 'Emas', '50g', '2032-03-21'),
(13330, 'Mas Mursid', 'Ngawi, Jawa Timur', 'Beras', '50kg', '2032-03-12'),
(13331, 'Bajax Roamer', 'Sukabumi, Jawa Barat', 'Beras', '10kg', '2032-03-17'),
(13340, 'Fuad Bmx', 'Sulawesi Tenggara', 'Emas', '50g', '2024-03-19'),
(13343, 'Pungky', 'Karawaci, Tangerang', 'Uang', '200k', '2024-03-12');

--
-- Triggers `donatur`
--
DELIMITER $$
CREATE TRIGGER `riwayat_insert` AFTER INSERT ON `donatur` FOR EACH ROW BEGIN
    DECLARE last_id INT;

    -- Mendapatkan nilai terakhir dari ID_transaksi
    SELECT IFNULL(MAX(ID_transaksi), 33000) INTO last_id FROM transaksi;

    -- Menetapkan nilai ID_transaksi untuk baris baru
    INSERT INTO transaksi (ID_transaksi, ID_donatur, Jumlah, Status_pembayaran, Tanggal)
    VALUES (last_id + 1, NEW.ID_donatur, NEW.Jumlah, 'Belum Lunas', NEW.Tanggal);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `riwayat_update` AFTER UPDATE ON `donatur` FOR EACH ROW BEGIN
    DECLARE last_id INT;

    -- Mendapatkan nilai terakhir dari ID_transaksi
    SELECT IFNULL(MAX(ID_transaksi), 33000) INTO last_id FROM transaksi;

    -- Menetapkan nilai ID_transaksi untuk baris baru
    INSERT INTO transaksi (ID_transaksi, ID_donatur, Jumlah, Status_pembayaran, Tanggal)
    VALUES (last_id + 1, NEW.ID_donatur, NEW.Jumlah, 'Belum Lunas', NEW.Tanggal);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `ID_penerima` int(11) NOT NULL,
  `Nama_penerima` varchar(100) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `ID_donatur` int(11) DEFAULT NULL,
  `Zakat_diterima` varchar(100) DEFAULT NULL,
  `Jumlah_diterima` varchar(100) DEFAULT NULL,
  `Jumlah_jiwa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`ID_penerima`, `Nama_penerima`, `Alamat`, `ID_donatur`, `Zakat_diterima`, `Jumlah_diterima`, `Jumlah_jiwa`) VALUES
(22001, 'Nikol', 'Bandung', NULL, 'Beras', '5Kg', '3');

-- --------------------------------------------------------

--
-- Table structure for table `seq_id_transaksi`
--

CREATE TABLE `seq_id_transaksi` (
  `next_not_cached_value` bigint(21) NOT NULL,
  `minimum_value` bigint(21) NOT NULL,
  `maximum_value` bigint(21) NOT NULL,
  `start_value` bigint(21) NOT NULL COMMENT 'start value when sequences is created or value if RESTART is used',
  `increment` bigint(21) NOT NULL COMMENT 'increment value',
  `cache_size` bigint(21) UNSIGNED NOT NULL,
  `cycle_option` tinyint(1) UNSIGNED NOT NULL COMMENT '0 if no cycles are allowed, 1 if the sequence should begin a new cycle when maximum_value is passed',
  `cycle_count` bigint(21) NOT NULL COMMENT 'How many cycles have been done'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seq_id_transaksi`
--

INSERT INTO `seq_id_transaksi` (`next_not_cached_value`, `minimum_value`, `maximum_value`, `start_value`, `increment`, `cache_size`, `cycle_option`, `cycle_count`) VALUES
(311001, 1, 9223372036854775806, 311001, 1, 1000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_transaksi` int(11) NOT NULL,
  `ID_donatur` int(11) DEFAULT NULL,
  `Jumlah` varchar(50) DEFAULT NULL,
  `Status_pembayaran` varchar(100) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_transaksi`, `ID_donatur`, `Jumlah`, `Status_pembayaran`, `Tanggal`) VALUES
(33001, 13325, ' 5kg', 'Belum Lunas', '2024-03-26'),
(33002, 13326, ' 5kg', 'Belum Lunas', '2024-03-06'),
(33003, 13327, '10g', 'Belum Lunas', '2024-03-18'),
(33004, 13328, '50kg', 'Belum Lunas', '2024-03-09'),
(33005, 13329, '50g', 'Belum Lunas', '2032-03-21'),
(33006, 13330, '50kg', 'Belum Lunas', '2032-03-12'),
(33007, 13331, '10kg', 'Belum Lunas', '2032-03-17'),
(33010, 13340, '50uni', 'Belum Lunas', '2024-03-19'),
(33011, 13340, '50uni', 'Belum Lunas', '2024-03-19'),
(33012, 13340, '50g', 'Belum Lunas', '2024-03-19'),
(33013, 13343, '200k', 'Belum Lunas', '2024-03-12'),
(33014, 13343, '200k', 'Belum Lunas', '2024-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Level` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Username`, `Password`, `Level`) VALUES
(44001, 'ryu1234', '1234', 'admin'),
(44004, 'miruku', '123456', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`ID_donatur`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`ID_penerima`),
  ADD KEY `ID_donatur` (`ID_donatur`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_transaksi`),
  ADD KEY `transaksi_ibfk_1` (`ID_donatur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `ID_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13348;

--
-- AUTO_INCREMENT for table `penerima`
--
ALTER TABLE `penerima`
  MODIFY `ID_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22002;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34786;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penerima`
--
ALTER TABLE `penerima`
  ADD CONSTRAINT `penerima_ibfk_1` FOREIGN KEY (`ID_donatur`) REFERENCES `donatur` (`ID_donatur`) ON DELETE SET NULL;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_donatur`) REFERENCES `donatur` (`ID_donatur`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
