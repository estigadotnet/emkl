-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 11, 2019 at 08:06 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_emkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `t001_shipper`
--

CREATE TABLE `t001_shipper` (
  `id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t001_shipper`
--

INSERT INTO `t001_shipper` (`id`, `Nama`) VALUES
(1, 'PERFECT'),
(2, 'INKOR'),
(3, 'SANGWOO'),
(4, 'HANIL'),
(5, 'SINAR TERANG BALI (STB)'),
(6, 'PT. ANEKA COFFEE INDUSTRY'),
(7, 'PT. KERRY LOGISTIC');

-- --------------------------------------------------------

--
-- Table structure for table `t002_destination`
--

CREATE TABLE `t002_destination` (
  `id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t002_destination`
--

INSERT INTO `t002_destination` (`id`, `Nama`) VALUES
(1, 'KWANGYANG'),
(2, 'BUSAN'),
(3, 'BANDAR ABBAS'),
(4, 'HOCHIMINH'),
(5, 'SURABAYA');

-- --------------------------------------------------------

--
-- Table structure for table `t003_feeder`
--

CREATE TABLE `t003_feeder` (
  `id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t003_feeder`
--

INSERT INTO `t003_feeder` (`id`, `Nama`) VALUES
(1, 'KMTC NHAVA SHEVA V. 1904 N'),
(2, 'AS COLUMBIA V. 0021 N.'),
(3, 'KMTC CHENNAI V. 1906 N.'),
(4, 'KMTC NHAVA SHEVA V. 1906 N.'),
(5, 'ROTTERDAM BRIDGE V. 009 N.'),
(6, 'KMTC CHENNAI V. 1905 N.'),
(7, 'KMTC NHAVA SHEVA V. 1905 N.'),
(8, 'NAVIOS DEDICATION V. 008 N.'),
(9, 'KMTC NINGBO V. 1906 N.'),
(10, 'NORTHERN VOLITION V. 1906 N.'),
(11, 'TR. ATHOS V. 1905 S.'),
(12, 'SEASPAN FRASER V. 051 S.'),
(13, 'NORTHERN DEDICATION V. 1906 S.');

-- --------------------------------------------------------

--
-- Table structure for table `t004_liner`
--

CREATE TABLE `t004_liner` (
  `id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t005_driver`
--

CREATE TABLE `t005_driver` (
  `id` int(11) NOT NULL,
  `TruckingVendor_id` int(11) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `No_HP_1` varchar(25) NOT NULL DEFAULT '-',
  `No_HP_2` varchar(25) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t005_driver`
--

INSERT INTO `t005_driver` (`id`, `TruckingVendor_id`, `Nama`, `No_HP_1`, `No_HP_2`) VALUES
(1, 1, 'ANDRI', '-', '-'),
(2, 1, 'EKO', '-', '-'),
(3, 1, '-', '-', '-'),
(4, 1, 'SUPANDI', '-', '-'),
(5, 1, 'KARNO', '-', '-'),
(6, 1, 'YONO', '-', '-'),
(7, 1, 'PENDIK', '-', '-'),
(8, 1, 'AGUNG', '-', '-'),
(9, 1, 'MARLAN', '-', '-'),
(10, 1, 'ASNAN', '-', '-'),
(11, 1, 'ANTO', '-', '-'),
(12, 2, 'NARDI', '-', '-'),
(13, 2, 'LEMAN', '-', '-'),
(14, 2, '-', '-', '-'),
(15, 1, 'DIMAS', '-', '-'),
(16, 1, 'YONO', '-', '-'),
(17, 1, 'NUR', '-', '-'),
(18, 1, 'ROFIQ', '-', '-'),
(19, 2, 'PITONO', '-', '-'),
(20, 2, 'YUDI', '-', '-'),
(21, 2, 'DONI', '-', '-'),
(22, 1, 'PITONO', '-', '-'),
(23, 1, 'YUDI', '-', '-'),
(24, 1, 'DONI', '-', '-'),
(25, 2, 'DENI', '-', '-'),
(26, 2, 'SOKRAN', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t006_trucking_vendor`
--

CREATE TABLE `t006_trucking_vendor` (
  `id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t006_trucking_vendor`
--

INSERT INTO `t006_trucking_vendor` (`id`, `Nama`) VALUES
(1, 'NIAGA'),
(2, '-');

-- --------------------------------------------------------

--
-- Table structure for table `t096_employees`
--

CREATE TABLE `t096_employees` (
  `EmployeeID` int(11) NOT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `TitleOfCourtesy` varchar(25) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `HireDate` datetime DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Region` varchar(15) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `HomePhone` varchar(24) DEFAULT NULL,
  `Extension` varchar(4) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Notes` longtext,
  `ReportsTo` int(11) DEFAULT NULL,
  `Password` varchar(50) NOT NULL DEFAULT '',
  `UserLevel` int(11) DEFAULT NULL,
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Activated` enum('Y','N') NOT NULL DEFAULT 'N',
  `Profile` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t097_userlevels`
--

CREATE TABLE `t097_userlevels` (
  `userlevelid` int(11) NOT NULL,
  `userlevelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t098_userlevelpermissions`
--

CREATE TABLE `t098_userlevelpermissions` (
  `userlevelid` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t101_jo_detail`
--

CREATE TABLE `t101_jo_detail` (
  `id` int(11) NOT NULL,
  `JOHead_id` int(11) NOT NULL,
  `TruckingVendor_id` int(11) NOT NULL,
  `Driver_id` int(11) NOT NULL,
  `Nomor_Polisi_1` varchar(5) NOT NULL,
  `Tanggal_Stuffing` date DEFAULT NULL,
  `Nomor_Polisi_2` varchar(10) NOT NULL,
  `Nomor_Polisi_3` varchar(5) NOT NULL,
  `Nomor_Container_1` varchar(10) NOT NULL,
  `Nomor_Container_2` varchar(10) NOT NULL,
  `Ref_JOHead_id` int(11) DEFAULT '0',
  `No_Tagihan` tinyint(4) NOT NULL DEFAULT '0',
  `Jumlah_Tagihan` float(14,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t101_jo_detail`
--

INSERT INTO `t101_jo_detail` (`id`, `JOHead_id`, `TruckingVendor_id`, `Driver_id`, `Nomor_Polisi_1`, `Tanggal_Stuffing`, `Nomor_Polisi_2`, `Nomor_Polisi_3`, `Nomor_Container_1`, `Nomor_Container_2`, `Ref_JOHead_id`, `No_Tagihan`, `Jumlah_Tagihan`) VALUES
(1, 1, 1, 1, 'L', '2019-05-02', '8606', 'US', 'HMMU', '6189859', 0, 0, 0.00),
(2, 1, 1, 2, 'L', '2019-05-02', '8204', 'UT', 'HMMU', '6183784', 0, 0, 0.00),
(3, 2, 1, 17, 'L', '2019-06-12', '9067', 'UL', 'BMOU', '6520402', 0, 0, 0.00),
(4, 2, 1, 17, 'L', '2019-06-12', '9067', 'UL', 'SEGU', '4675887', 0, 0, 0.00),
(5, 3, 1, 4, 'L', '2019-06-19', '8643', 'UY', 'BMOU', '4308415', 0, 6, 4200000.00),
(6, 3, 1, 5, 'L', '2019-06-19', '9484', 'UJ', 'SKHU', '9552175', 0, 5, 4200000.00),
(7, 3, 1, 6, 'L', '2019-06-19', '9065', 'UL', 'SKHU', '8724069', 0, 9, 4200000.00),
(8, 3, 1, 7, 'L', '2019-06-19', '9498', 'UJ', 'SKHU', '9301225', 0, 10, 4200000.00),
(9, 3, 1, 1, 'L', '2019-06-20', '8606', 'US', 'SKHU', '9503859', 0, 7, 4200000.00),
(10, 3, 1, 8, 'L', '2019-06-20', '8220', 'UD', 'SKHU', '8708710', NULL, 4, 4200000.00),
(11, 3, 1, 9, 'W', '2019-06-20', '8061', 'UX', 'SKHU', '9546640', 0, 8, 4200000.00),
(12, 4, 1, 4, 'L', '2019-06-25', '8643', 'UY', 'SKHU', '8106862', 0, 13, 4200000.00),
(13, 4, 1, 6, 'L', '2019-06-25', '9065', 'UL', 'FCIU', '8904600', 0, 12, 4200000.00),
(14, 4, 1, 10, 'L', '2019-06-27', '9744', 'UJ', 'BMOU', '4916760', 0, 11, 4200000.00),
(15, 4, 1, 11, 'L', '2019-06-27', '9858', 'UD', 'SKHU', '9316138', 0, 15, 4200000.00),
(16, 4, 1, 1, 'L', '2019-06-27', '8606', 'US', 'BMOU', '5800440', 0, 14, 4200000.00),
(17, 4, 1, 2, 'L', '2019-06-27', '8204', 'UT', 'TCNU', '8154060', 0, 16, 4200000.00),
(18, 5, 2, 12, 'B', '2019-06-27', '9263', 'JH', 'SKLU', '1670293', 0, 0, 0.00),
(19, 6, 2, 13, 'L', '2019-06-29', '9700', 'UX', 'SBAU', '2939911', 0, 1, 3800000.00),
(20, 7, 1, 11, 'L', '2019-05-21', '9858', 'UD', 'GESU', '6354599', 0, 0, 0.00),
(21, 7, 1, 15, 'L', '2019-05-21', '8476', 'UY', 'GESU', '6562340', 0, 0, 0.00),
(22, 7, 1, 16, 'L', '2019-05-23', '9065', 'UL', 'GESU', '6350000', 0, 0, 0.00),
(23, 7, 1, 4, 'L', '2019-05-23', '8643', 'UY', 'GESU', '6893651', 0, 2, 4200000.00),
(24, 8, 1, 7, 'L', '2019-05-28', '9498', 'UJ', 'SKHU', '8106353', 0, 0, 0.00),
(25, 8, 1, 5, 'L', '2019-05-29', '9484', 'UJ', 'TGHU', '6803922', 0, 1, 4200000.00),
(26, 8, 1, 9, 'W', '2019-05-29', '8061', 'UX', 'MAGU', '5186546', 0, 0, 0.00),
(27, 8, 1, 16, 'L', '2019-05-29', '9065', 'UL', 'TGHU', '6887179', 0, 3, 4200000.00),
(29, 10, 1, 16, 'L', '2019-06-13', '9065', 'UL', 'TCLU', '6224773', NULL, 1, 2200000.00),
(30, 11, 1, 17, 'L', '2019-06-13', '9067', 'UL', 'TCNU', '8844493', NULL, 2, 2200000.00),
(31, 11, 1, 5, 'L', '2019-06-13', '9484', 'UJ', 'BMOU', '6028455', NULL, 3, 2200000.00),
(32, 12, 1, 6, 'L', '2019-06-17', '9065', 'UL', 'CAIU', '8710227', 26, 0, 0.00),
(33, 13, 1, 10, 'L', '2019-06-17', '9744', 'UJ', 'BMOU', '6031253', 26, 0, 0.00),
(34, 14, 1, 7, 'L', '2019-06-17', '9498', 'UJ', 'CRSU', '9337180', 25, 0, 0.00),
(35, 14, 1, 17, 'L', '2019-06-17', '9067', 'UL', 'FCIU', '7126623', 25, 0, 0.00),
(36, 14, 1, 18, 'AG', '2019-06-17', '8753', 'UH', 'SEGU', '6151641', 25, 0, 0.00),
(37, 15, 1, 23, 'B', '2019-06-17', '9010', 'ZEH', 'BEAU', '4870372', 25, 0, 0.00),
(38, 15, 1, 15, 'L', '2019-06-17', '8476', 'UC', 'SEGU', '4798407', 25, 0, 0.00),
(39, 15, 1, 8, 'L', '2019-06-17', '8220', 'UD', 'TCNU', '5237243', 25, 0, 0.00),
(40, 15, 1, 11, 'L', '2019-06-17', '8606', 'US', 'TGHU', '6073552', 25, 0, 0.00),
(41, 16, 1, 4, 'L', '2019-06-17', '8643', 'UY', 'GESU', '6765563', 25, 0, 0.00),
(42, 17, 1, 23, 'L', '2019-06-17', '9065', 'UL', 'KMTU', '9275049', 25, 0, 0.00),
(43, 18, 2, 26, 'N', '2019-06-20', '9251', 'UU', 'SEGU', '6161953', NULL, 0, 0.00),
(44, 19, 1, 18, 'AG', '2019-06-20', '8753', 'UH', 'BMOU', '6919619', NULL, 19, 2200000.00),
(45, 20, 1, 4, 'L', '2019-06-27', '8643', 'UY', 'BSIU', '9275990', NULL, 21, 2200000.00),
(46, 21, 1, 17, 'L', '2019-06-27', '9067', 'UL', 'TCLU', '8450466', NULL, 0, 0.00),
(47, 21, 2, 25, 'B', '2019-06-27', '9010', 'UL', 'TCNU', '8580148', NULL, 0, 0.00),
(48, 21, 1, 6, 'L', '2019-06-27', '9065', 'UL', 'TEMU', '7695369', NULL, 20, 2200000.00),
(49, 22, 1, 7, 'L', '2019-06-27', '9498', 'UJ', 'BMOU', '5785270', NULL, 0, 0.00),
(50, 22, 1, 15, 'L', '2019-06-27', '8476', 'UC', 'GESU', '6805624', NULL, 23, 2200000.00),
(51, 22, 1, 9, 'W', '2019-06-27', '8061', 'UX', 'TCNU', '5462630', NULL, 22, 2200000.00),
(52, 23, 1, 18, 'AG', '2019-06-27', '8753', 'UH', 'CRSU', '9237556', NULL, 0, 0.00),
(53, 24, 2, 14, 'L', '2019-06-25', '9999', 'XX', 'DFSU', '6018119', 0, 0, 0.00),
(54, 24, 2, 14, 'L', '2019-06-25', '9999', 'XX', 'TEMU', '8546797', 0, 0, 0.00),
(55, 25, 1, 4, 'L', '2019-06-13', '8643', 'UY', 'GESU', '6765563', NULL, 12, 2200000.00),
(56, 25, 1, 5, 'L', '2019-06-13', '9484', 'UJ', 'KMTU', '9275049', NULL, 16, 2200000.00),
(57, 25, 1, 17, 'L', '2019-06-13', '9067', 'UL', 'FCIU', '7126623', NULL, 11, 2200000.00),
(58, 25, 1, 18, 'AG', '2019-06-13', '8753', 'UH', 'SEGU', '6151641', NULL, 7, 2200000.00),
(59, 25, 1, 7, 'L', '2019-06-13', '9498', 'UJ', 'CRSU', '9337180', NULL, 14, 2200000.00),
(60, 25, 1, 11, 'L', '2019-06-13', '8606', 'US', 'TGHU', '6073552', NULL, 13, 2200000.00),
(61, 25, 1, 8, 'L', '2019-06-13', '8220', 'UD', 'TCNU', '5237243', NULL, 15, 2200000.00),
(62, 25, 1, 15, 'L', '2019-06-13', '8476', 'UC', 'SEGU', '4798407', NULL, 8, 2200000.00),
(63, 25, 1, 2, 'L', '2019-06-13', '8204', 'UT', 'FCIU', '7276393', NULL, 18, 2200000.00),
(64, 25, 1, 23, 'B', '2019-06-13', '9010', 'ZEH', 'BEAU', '4870372', NULL, 9, 2200000.00),
(65, 25, 1, 22, 'B', '2019-06-13', '9009', 'ZEH', 'CXDU', '1304544', NULL, 10, 2200000.00),
(66, 25, 1, 24, 'B', '2019-06-13', '9011', 'ZEH', 'DFSU', '7698113', NULL, 17, 2200000.00),
(67, 26, 1, 16, 'L', '2019-06-13', '9065', 'UL', 'CAIU', '8710227', NULL, 6, 2200000.00),
(68, 26, 1, 10, 'L', '2019-06-13', '9744', 'UJ', 'BMOU', '6031253', NULL, 5, 2200000.00),
(69, 26, 1, 1, 'L', '2019-06-13', '8606', 'US', 'TEMU', '7799949', NULL, 4, 2200000.00),
(70, 27, 2, 14, 'L', '2019-06-15', '9259', 'UQ', 'CAIU', '8477162', NULL, 1, 4000000.00),
(71, 27, 2, 14, 'L', '2019-06-15', '9999', 'XX', 'REGU', '5076882', NULL, 0, 0.00),
(72, 28, 1, 22, 'B', '2019-06-26', '9009', 'ZEH', 'BSIU', '9270719', NULL, 24, 2200000.00);

-- --------------------------------------------------------

--
-- Table structure for table `t101_jo_head`
--

CREATE TABLE `t101_jo_head` (
  `id` int(11) NOT NULL,
  `Export_Import` enum('Export','Import') NOT NULL DEFAULT 'Export',
  `No_BL` varchar(50) DEFAULT '-',
  `Nomor_JO` varchar(50) NOT NULL DEFAULT '-',
  `Shipper_id` int(11) NOT NULL,
  `Party` int(11) NOT NULL,
  `Container` enum('40','20') NOT NULL DEFAULT '40',
  `Destination_id` int(11) NOT NULL,
  `Feeder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t101_jo_head`
--

INSERT INTO `t101_jo_head` (`id`, `Export_Import`, `No_BL`, `Nomor_JO`, `Shipper_id`, `Party`, `Container`, `Destination_id`, `Feeder_id`) VALUES
(1, 'Export', '-', '-', 3, 2, '40', 1, 1),
(2, 'Export', 'CKCOSUB0003183', '19.06.001', 5, 2, '40', 2, 2),
(3, 'Export', 'SNKO079190500507', '19.06.004', 2, 7, '40', 1, 3),
(4, 'Export', 'SNKO079190600147', '19.06.011', 2, 6, '40', 1, 4),
(5, 'Export', 'SNKO079190600173', '19.06.015', 2, 1, '20', 2, 4),
(6, 'Export', '-', '19.06.016', 1, 1, '20', 3, 5),
(7, 'Export', 'SNKO079190500210', '19.05.019', 2, 4, '40', 1, 6),
(8, 'Export', 'SNKO079190500394', '19.05.027', 2, 4, '40', 1, 7),
(10, 'Export', 'KMTCSUB1516389', '19.06.002', 4, 1, '40', 2, 8),
(11, 'Export', 'KMTCSUB1510396', '19.06.003', 4, 2, '40', 2, 8),
(12, 'Export', 'KMTCSUB1517534', '19.06.005', 4, 1, '40', 2, 9),
(13, 'Export', 'KMTCSUB1518536', '19.06.006', 4, 1, '40', 2, 9),
(14, 'Export', 'KMTCSUB1518535', '19.06.007', 4, 3, '40', 2, 9),
(15, 'Export', 'KMTCSUB1519540', '19.06.008', 4, 4, '40', 2, 9),
(16, 'Export', 'KMTCSUB1516539', '19.06.009', 4, 1, '40', 2, 9),
(17, 'Export', 'KMTCSUB1514538', '19.06.010', 4, 1, '40', 2, 9),
(18, 'Export', 'KMTCSUB1514761', '19.06.012', 4, 1, '40', 2, 3),
(19, 'Export', 'KMTCSUB1517770', '19.06.013', 4, 1, '40', 2, 3),
(20, 'Export', 'KMTCSUB1525244', '19.06.017', 4, 1, '40', 2, 4),
(21, 'Export', 'KMTCSUB1522250', '19.06.018', 4, 3, '40', 2, 4),
(22, 'Export', 'KMTCSUB1521255', '19.06.019', 4, 3, '40', 2, 4),
(23, 'Export', 'KMTCSUB1522260', '19.06.020', 4, 1, '40', 2, 4),
(24, 'Export', 'CKCOSUB0003257', '19.06.014', 6, 2, '40', 4, 10),
(25, 'Import', 'KMTCPUS702811', '19.06.001/IMP', 4, 12, '40', 5, 11),
(26, 'Import', 'KMTCPUS702812', '19.06.002/IMP', 4, 3, '40', 5, 11),
(27, 'Import', 'MNLCB19001829', '19.06.003/IMP', 7, 2, '40', 5, 12),
(28, 'Import', 'KMTCPUSB749208', '19.06.004/IMP', 4, 1, '40', 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `t101_tagihan_trucking`
--

CREATE TABLE `t101_tagihan_trucking` (
  `id` int(11) NOT NULL,
  `Nomor_Polisi_1` varchar(5) NOT NULL DEFAULT '-',
  `Nomor_Polisi_2` varchar(10) NOT NULL DEFAULT '-',
  `Nomor_Polisi_3` varchar(5) NOT NULL DEFAULT '-',
  `Tanggal` date NOT NULL,
  `Shipper_id` int(11) NOT NULL,
  `Dari_Lokasi` varchar(100) NOT NULL DEFAULT '-',
  `Ke_Lokasi` varchar(100) NOT NULL DEFAULT '-',
  `Jenis_Container` enum('40','20') NOT NULL DEFAULT '40',
  `Nomor_Container_1` varchar(5) NOT NULL DEFAULT '-',
  `Nomor_Container_2` varchar(10) NOT NULL DEFAULT '-',
  `Keterangan` text NOT NULL,
  `Tagihan` float(14,2) NOT NULL DEFAULT '0.00',
  `JO_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t101_tagihan_trucking`
--

INSERT INTO `t101_tagihan_trucking` (`id`, `Nomor_Polisi_1`, `Nomor_Polisi_2`, `Nomor_Polisi_3`, `Tanggal`, `Shipper_id`, `Dari_Lokasi`, `Ke_Lokasi`, `Jenis_Container`, `Nomor_Container_1`, `Nomor_Container_2`, `Keterangan`, `Tagihan`, `JO_id`) VALUES
(1, 'L', '9066', 'UL', '2019-05-15', 1, 'PERFECT', 'BANYUWANGI', '40', 'MEDU', '6607463', '-', 3600000.00, 1),
(2, 'L', '9743', 'UJ', '2019-05-15', 1, 'PERFECT', 'BANYUWANGI', '40', 'MEDU', '1223212', '-', 3600000.00, 1),
(3, 'L', '9600', 'UX', '2019-05-15', 1, 'PERFECT', 'BANYUWANGI', '40', 'TRLU', '9057365', '-', 3600000.00, 1),
(4, 'L', '9297', 'UP', '2019-05-13', 2, 'INKOR', 'BANYUWANGI', '40', 'CXDU', '1676665', '-', 4200000.00, 20),
(5, 'B', '9190', 'OZ', '2019-05-13', 2, 'INKOR', 'BANYUWANGI', '40', 'CXDU', '1340460', '-', 4200000.00, 20),
(6, 'L', '9858', 'UD', '2019-05-15', 2, 'INKOR', 'BANYUWANGI', '40', 'GESU', '6350654', '-', 4200000.00, 20),
(7, 'L', '8204', 'UJ', '2019-05-15', 2, 'INKOR', 'BANYUWANGI', '40', 'GESU', '6885379', '-', 4200000.00, 20),
(8, 'L', '9858', 'UD', '2019-05-20', 2, 'INKOR', 'BANYUWANGI', '40', 'GESU', '6354599', '-', 4200000.00, 21),
(9, 'L', '8476', 'UC', '2019-05-20', 2, 'INKOR', 'BANYUWANGI', '40', 'GESU', '6562340', '-', 4200000.00, 21),
(10, 'L', '8643', 'UY', '2019-05-22', 2, 'INKOR', 'BANYUWANGI', '40', 'GESU', '6350000', '-', 4200000.00, 21),
(11, 'L', '9498', 'UJ', '2019-05-27', 2, 'INKOR', 'BANYUWANGI', '40', 'SKHU', '8106353', '-', 4200000.00, 3),
(12, 'W', '8061', 'UX', '2019-05-29', 2, 'INKOR', 'BANYUWANGI', '40', 'MAGU', '5186546', '-', 4200000.00, 3),
(13, 'W', '8061', 'UX', '2019-05-15', 3, 'SANGWOO', 'BANYUWANGI', '40', 'TGHU', '9316888', '-', 4200000.00, 5),
(14, 'L', '9498', 'UJ', '2019-05-15', 3, 'SANGWOO', 'BANYUWANGI', '40', 'TEMU', '8584307', '-', 4200000.00, 5),
(15, 'B', '9619', '-', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'TCNU', '7920562', '-', 2200000.00, 6),
(16, 'L', '9858', 'UD', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'KMTU', '9280214', '-', 2200000.00, 7),
(17, 'L', '8606', 'US', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'TEMU', '7798454', '-', 2200000.00, 6),
(18, 'L', '8204', 'UJ', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'KMTU', '9338810', '-', 2200000.00, 6),
(19, 'L', '8220', 'UD', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'TEMU', '8991597', '-', 2200000.00, 6),
(20, 'L', '9498', 'UJ', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'BMOU', '6210238', '-', 2200000.00, 4),
(21, 'L', '9744', 'UJ', '2019-05-05', 4, 'HANIL', 'BOYOLALI', '40', 'BMOU', '6256563', '-', 2200000.00, 7),
(22, 'L', '9744', 'UJ', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'SEGU', '6161742', '-', 2200000.00, 4),
(23, 'L', '9498', 'UJ', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'CAIU', '4941969', '-', 2200000.00, 7),
(24, 'L', '9484', 'UJ', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'BMOU', '6343713', '-', 2200000.00, 7),
(25, 'W', '8061', 'UX', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'BMOU', '6345228', '-', 2200000.00, 7),
(26, 'W', '8061', 'UX', '2019-05-08', 4, 'HANIL', 'BOYOLALI', '40', 'BMOU', '6350013', '-', 2200000.00, 4),
(27, 'L', '8220', 'UD', '2019-05-08', 4, 'HANIL', 'BOYOLALI', '40', 'BEAU', '4856116', '-', 2200000.00, 4),
(28, 'L', '9065', 'UL', '2019-05-08', 4, 'HANIL', 'BOYOLALI', '40', 'UETU', '5453613', '-', 2200000.00, 4),
(29, 'L', '8643', 'UY', '2019-05-08', 4, 'HANIL', 'BOYOLALI', '40', 'FCIU', '7119115', '-', 2200000.00, 4),
(30, 'L', '9065', 'UL', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'BMOU', '6249292', '-', 2200000.00, 6),
(31, 'L', '8643', 'UY', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'TCNU', '5240268', '-', 2200000.00, 6),
(32, 'B', '9002', 'QN', '2019-05-09', 4, 'HANIL', 'BOYOLALI', '40', 'TGHU', '6446039', '-', 2200000.00, 4),
(33, 'L', '9423', 'UP', '2019-05-09', 4, 'HANIL', 'BOYOLALI', '40', 'TEMU', '8978825', '-', 2200000.00, 4),
(34, 'L', '9315', 'UP', '2019-05-09', 4, 'HANIL', 'BOYOLALI', '40', 'CRSU', '9122074', '-', 2200000.00, 4),
(35, 'L', '8476', 'UC', '2019-05-07', 4, 'HANIL', 'BOYOLALI', '40', 'DFSU', '7687037', '-', 2200000.00, 7),
(36, 'L', '9484', 'UJ', '2019-05-08', 4, 'HANIL', 'BOYOLALI', '40', 'SEGU', '5541943', '-', 2200000.00, 4),
(37, 'AG', '8753', '-', '2019-05-08', 4, 'HANIL', 'BOYOLALI', '40', 'UETU', '5452978', '-', 2200000.00, 4),
(38, 'L', '9858', 'UD', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'UETU', '5451170', '-', 2200000.00, 9),
(39, 'L', '8606', 'US', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'TCNU', '8873573', '-', 2200000.00, 10),
(40, 'L', '8204', 'UJ', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'FCIU', '7146424', '-', 2200000.00, 10),
(41, 'L', '9067', 'UL', '2019-05-09', 4, 'HANIL', 'BOYOLALI', '40', 'TCNU', '5176132', '-', 2200000.00, 4),
(42, 'L', '9498', 'UJ', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'TEMU', '6692241', '-', 2200000.00, 9),
(43, 'L', '8220', 'UD', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'BMOU', '6232026', '-', 2200000.00, 10),
(44, 'L', '8476', 'UC', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'BEAU', '4855552', '-', 2200000.00, 10),
(45, 'L', '9065', 'UL', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'TEMU', '6348961', '-', 2200000.00, 9),
(46, 'L', '9484', 'UJ', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'KMTU', '9267589', '-', 2200000.00, 9),
(47, 'L', '8643', 'UY', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'TGBU', '6411637', '-', 2200000.00, 10),
(48, 'B', '9010', '-', '2019-05-15', 4, 'HANIL', 'BOYOLALI', '40', 'TEMU', '7213852', '-', 2200000.00, 12),
(49, 'B', '9009', '-', '2019-05-15', 4, 'HANIL', 'BOYOLALI', '40', 'GESU', '6760772', '-', 2200000.00, 13),
(50, 'L', '9484', 'UJ', '2019-05-15', 4, 'HANIL', 'BOYOLALI', '40', 'BMOU', '6234348', '-', 2200000.00, 11),
(51, 'L', '9744', 'UJ', '2019-05-15', 4, 'HANIL', 'BOYOLALI', '40', 'TEMU', '7798686', '-', 2200000.00, 11),
(52, 'L', '9744', 'UJ', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'TCNU', '5236885', '-', 2200000.00, 10),
(53, 'W', '8061', 'UX', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'BSIU', '9332071', '-', 2200000.00, 10),
(54, 'L', '8643', 'UY', '2019-05-15', 4, 'HANIL', 'BOYOLALI', '40', 'BMOU', '6918994', '-', 2200000.00, 11),
(55, 'L', '9459', 'UP', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'TCNU', '5235718', '-', 2200000.00, 12),
(56, 'B', '9002', 'QN', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'TEMU', '7211546', '-', 2200000.00, 12),
(57, 'L', '9252', 'UP', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'SEGU', '5160778', '-', 2200000.00, 12),
(58, 'L', '9414', 'UP', '2019-05-13', 4, 'HANIL', 'BOYOLALI', '40', 'KMTU', '9331836', '-', 2200000.00, 12),
(59, 'L', '9065', 'UL', '2019-05-15', 4, 'HANIL', 'BOYOLALI', '20', 'KMTU', '9341691', '-', 2200000.00, 11),
(60, 'L', '9484', 'UJ', '2019-05-20', 4, 'HANIL', 'BOYOLALI', '40', 'BMOU', '6225813', '-', 2200000.00, 16),
(61, 'AG', '8753', '-', '2019-05-20', 4, 'HANIL', 'BOYOLALI', '40', 'TEMU', '6620811', '-', 2200000.00, 15),
(62, 'L', '8643', 'UY', '2019-05-20', 4, 'HANIL', 'BOYOLALI', '40', 'SEGU', '5548700', '-', 2200000.00, 16),
(63, 'W', '8061', 'UX', '2019-05-20', 4, 'HANIL', 'BOYOLALI', '40', 'UETU', '5451708', '-', 2200000.00, 15),
(64, 'L', '9744', 'UJ', '2019-05-20', 4, 'HANIL', 'BOYOLALI', '40', 'CXDU', '1104166', '-', 2200000.00, 15),
(65, 'L', '8606', 'US', '2019-05-20', 4, 'HANIL', 'BOYOLALI', '40', 'SEGU', '4597790', '-', 2200000.00, 16),
(66, 'B', '9017', '-', '2019-04-30', 4, 'HANIL', 'BOYOLALI', '40', 'UETU', '5450846', '-', 2200000.00, 17),
(67, 'L', '9066', 'UM', '2019-05-22', 4, 'HANIL', 'BOYOLALI', '20', 'CXDU', '1004995', '-', 3800000.00, 14),
(68, 'L', '9498', 'UJ', '2019-05-20', 4, 'HANIL', 'BOYOLALI', '40', 'BMOU', '4581348', '-', 2200000.00, 15),
(69, 'L', '9484', 'UJ', '2019-05-27', 4, 'HANIL', 'BOYOLALI', '40', 'DFSU', '7697689', '-', 2200000.00, 19),
(70, 'L', '8643', 'UY', '2019-05-27', 4, 'HANIL', 'BOYOLALI', '40', 'TEMU', '7801075', '-', 2200000.00, 18);

-- --------------------------------------------------------

--
-- Table structure for table `t399_audit_trail`
--

CREATE TABLE `t399_audit_trail` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `script` varchar(80) DEFAULT NULL,
  `user` varchar(80) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `table` varchar(80) DEFAULT NULL,
  `field` varchar(80) DEFAULT NULL,
  `keyvalue` longtext,
  `oldvalue` longtext,
  `newvalue` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t399_audit_trail`
--

INSERT INTO `t399_audit_trail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
(1, '2019-07-09 10:53:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '10', '0', '4'),
(2, '2019-07-09 10:53:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '10', '0.00', '4200000'),
(3, '2019-07-09 10:56:07', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '6', '0', '5'),
(4, '2019-07-09 10:56:07', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '6', '0.00', '4200000'),
(5, '2019-07-09 10:57:00', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '5', '0', '6'),
(6, '2019-07-09 10:57:00', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '5', '0.00', '4200000'),
(7, '2019-07-09 11:10:59', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '9', '0', '7'),
(8, '2019-07-09 11:10:59', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '9', '0.00', '4200000'),
(9, '2019-07-09 11:12:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '11', '0', '8'),
(10, '2019-07-09 11:12:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '11', '0.00', '4200000'),
(11, '2019-07-09 11:16:30', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '7', '0', '9'),
(12, '2019-07-09 11:16:30', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '7', '0.00', '4200000'),
(13, '2019-07-09 11:17:36', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '8', '0', '10'),
(14, '2019-07-09 11:17:36', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '8', '0.00', '4200000'),
(15, '2019-07-09 11:19:39', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '14', '0', '11'),
(16, '2019-07-09 11:19:39', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '14', '0.00', '4200000'),
(17, '2019-07-09 11:20:10', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '13', '0', '12'),
(18, '2019-07-09 11:20:10', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '13', '0.00', '4200000'),
(19, '2019-07-09 11:21:47', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '12', '0', '13'),
(20, '2019-07-09 11:21:47', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '12', '0.00', '4200000'),
(21, '2019-07-09 11:22:40', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '16', '0', '14'),
(22, '2019-07-09 11:22:40', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '16', '0.00', '4200000'),
(23, '2019-07-09 11:23:24', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '15', '0', '15'),
(24, '2019-07-09 11:23:24', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '15', '0.00', '4200000'),
(25, '2019-07-09 11:24:00', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '17', '0', '16'),
(26, '2019-07-09 11:24:00', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '17', '0.00', '4200000'),
(27, '2019-07-09 12:40:33', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'Nama', '6', '', 'KMTC CHENNAI V. 1905 N.'),
(28, '2019-07-09 12:40:33', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'id', '6', '', '6'),
(29, '2019-07-09 13:27:06', '/emkl/t101_jo_detaillist.php', '-1', '*** Batch update begin ***', 't101_jo_detail', '', '', '', ''),
(30, '2019-07-09 13:27:06', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '1', NULL, '2019-05-02'),
(31, '2019-07-09 13:27:06', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '2', NULL, '2019-05-02'),
(32, '2019-07-09 13:27:06', '/emkl/t101_jo_detaillist.php', '-1', '*** Batch update successful ***', 't101_jo_detail', '', '', '', ''),
(33, '2019-07-09 14:17:05', '/emkl/t101_jo_detaillist.php', '-1', '*** Batch update begin ***', 't101_jo_detail', '', '', '', ''),
(34, '2019-07-09 14:17:05', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '3', '3', '14'),
(35, '2019-07-09 14:17:05', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '3', NULL, '2019-06-12 14:16:35'),
(36, '2019-07-09 14:17:05', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '4', '1', '2'),
(37, '2019-07-09 14:17:05', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '4', '3', '14'),
(38, '2019-07-09 14:17:05', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '4', NULL, '2019-06-12 14:16:35'),
(39, '2019-07-09 14:17:05', '/emkl/t101_jo_detaillist.php', '-1', '*** Batch update successful ***', 't101_jo_detail', '', '', '', ''),
(40, '2019-07-09 14:18:07', '/emkl/t101_jo_headedit.php', '-1', '*** Batch update begin ***', 't101_jo_detail', '', '', '', ''),
(41, '2019-07-09 14:18:07', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '5', NULL, '2019-06-19 00:00:00'),
(42, '2019-07-09 14:18:07', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '6', NULL, '2019-06-19 00:00:00'),
(43, '2019-07-09 14:18:07', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '7', NULL, '2019-06-19 00:00:00'),
(44, '2019-07-09 14:18:07', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '8', NULL, '2019-06-19 00:00:00'),
(45, '2019-07-09 14:18:07', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '9', NULL, '2019-06-19 00:00:00'),
(46, '2019-07-09 14:18:07', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '10', NULL, '2019-06-19 00:00:00'),
(47, '2019-07-09 14:18:07', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '11', NULL, '2019-06-19 00:00:00'),
(48, '2019-07-09 14:18:07', '/emkl/t101_jo_headedit.php', '-1', '*** Batch update successful ***', 't101_jo_detail', '', '', '', ''),
(49, '2019-07-09 14:20:03', '/emkl/t101_jo_headedit.php', '-1', '*** Batch update begin ***', 't101_jo_detail', '', '', '', ''),
(50, '2019-07-09 14:20:03', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '9', '2019-06-19', '2019-06-20 00:00:00'),
(51, '2019-07-09 14:20:03', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '10', '2019-06-19', '2019-06-20 00:00:00'),
(52, '2019-07-09 14:20:03', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '11', '2019-06-19', '2019-06-20 00:00:00'),
(53, '2019-07-09 14:20:03', '/emkl/t101_jo_headedit.php', '-1', '*** Batch update successful ***', 't101_jo_detail', '', '', '', ''),
(54, '2019-07-09 14:22:49', '/emkl/t101_jo_headedit.php', '-1', '*** Batch update begin ***', 't101_jo_detail', '', '', '', ''),
(55, '2019-07-09 14:22:49', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '12', NULL, '2019-06-25 00:00:00'),
(56, '2019-07-09 14:22:49', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '13', NULL, '2019-06-25 00:00:00'),
(57, '2019-07-09 14:22:49', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '14', NULL, '2019-06-27 00:00:00'),
(58, '2019-07-09 14:22:49', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '15', NULL, '2019-06-27 00:00:00'),
(59, '2019-07-09 14:22:49', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '16', NULL, '2019-06-27 00:00:00'),
(60, '2019-07-09 14:22:49', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '17', NULL, '2019-06-27 00:00:00'),
(61, '2019-07-09 14:22:49', '/emkl/t101_jo_headedit.php', '-1', '*** Batch update successful ***', 't101_jo_detail', '', '', '', ''),
(62, '2019-07-09 14:23:42', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '18', NULL, '2019-06-27 14:23:33'),
(63, '2019-07-09 14:25:23', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Tanggal_Stuffing', '19', NULL, '2019-06-29 14:25:14'),
(64, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '7', '', 'Export'),
(65, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '7', '', '19.05.019'),
(66, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '7', '', '2'),
(67, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '7', '', '4'),
(68, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '7', '', '40'),
(69, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '7', '', '1'),
(70, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '7', '', '6'),
(71, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '7', '', '7'),
(72, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(73, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '20', '', '1'),
(74, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '20', '', '11'),
(75, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '20', '', '2019-05-21 00:00:00'),
(76, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '20', '', 'L'),
(77, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '20', '', '9858'),
(78, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '20', '', 'UD'),
(79, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '20', '', 'GESU'),
(80, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '20', '', '6354599'),
(81, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '20', '', '0'),
(82, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '20', '', '0'),
(83, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '20', '', '7'),
(84, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '20', '', '20'),
(85, '2019-07-09 15:58:29', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(86, '2019-07-09 15:59:23', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '15', '', '1'),
(87, '2019-07-09 15:59:23', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'Nama', '15', '', 'DIMAS'),
(88, '2019-07-09 15:59:23', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_1', '15', '', '-'),
(89, '2019-07-09 15:59:23', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_2', '15', '', '-'),
(90, '2019-07-09 15:59:23', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'id', '15', '', '15'),
(91, '2019-07-09 16:00:26', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '16', '', '1'),
(92, '2019-07-09 16:00:26', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'Nama', '16', '', 'YONO'),
(93, '2019-07-09 16:00:26', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_1', '16', '', '-'),
(94, '2019-07-09 16:00:26', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_2', '16', '', '-'),
(95, '2019-07-09 16:00:26', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'id', '16', '', '16'),
(96, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', '*** Batch update begin ***', 't101_jo_detail', '', '', '', ''),
(97, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '21', '', '1'),
(98, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '21', '', '15'),
(99, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '21', '', '2019-05-21 00:00:00'),
(100, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '21', '', 'L'),
(101, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '21', '', '8476'),
(102, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '21', '', 'UY'),
(103, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '21', '', 'GESU'),
(104, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '21', '', '6562340'),
(105, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '21', '', '0'),
(106, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '21', '', '0'),
(107, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '21', '', '7'),
(108, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'id', '21', '', '21'),
(109, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '22', '', '1'),
(110, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '22', '', '16'),
(111, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '22', '', '2019-05-23 00:00:00'),
(112, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '22', '', 'L'),
(113, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '22', '', '9065'),
(114, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '22', '', 'UL'),
(115, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '22', '', 'GESU'),
(116, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '22', '', '6350000'),
(117, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '22', '', '0'),
(118, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '22', '', '0'),
(119, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '22', '', '7'),
(120, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'id', '22', '', '22'),
(121, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '23', '', '1'),
(122, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '23', '', '4'),
(123, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '23', '', '2019-05-23 00:00:00'),
(124, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '23', '', 'L'),
(125, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '23', '', '8643'),
(126, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '23', '', 'UY'),
(127, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '23', '', 'GESU'),
(128, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '23', '', '6893651'),
(129, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '23', '', '0'),
(130, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '23', '', '0'),
(131, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '23', '', '7'),
(132, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', 'A', 't101_jo_detail', 'id', '23', '', '23'),
(133, '2019-07-09 16:02:54', '/emkl/t101_jo_headedit.php', '-1', '*** Batch update successful ***', 't101_jo_detail', '', '', '', ''),
(134, '2019-07-09 16:05:30', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'Nama', '7', '', 'KMTC NHAVA SHEVA V. 1905 N.'),
(135, '2019-07-09 16:05:30', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'id', '7', '', '7'),
(136, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '8', '', 'Export'),
(137, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '8', '', '19.05.027'),
(138, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '8', '', '2'),
(139, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '8', '', '4'),
(140, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '8', '', '40'),
(141, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '8', '', '1'),
(142, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '8', '', '7'),
(143, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '8', '', '8'),
(144, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(145, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '24', '', '1'),
(146, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '24', '', '7'),
(147, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '24', '', '2019-05-28 00:00:00'),
(148, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '24', '', 'L'),
(149, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '24', '', '9498'),
(150, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '24', '', 'UJ'),
(151, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '24', '', 'SKHU'),
(152, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '24', '', '8106353'),
(153, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '24', '', '0'),
(154, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '24', '', '0'),
(155, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '24', '', '8'),
(156, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '24', '', '24'),
(157, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '25', '', '1'),
(158, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '25', '', '5'),
(159, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '25', '', '2019-05-29 00:00:00'),
(160, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '25', '', 'L'),
(161, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '25', '', '9484'),
(162, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '25', '', 'UJ'),
(163, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '25', '', 'TGHU'),
(164, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '25', '', '6803922'),
(165, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '25', '', '0'),
(166, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '25', '', '0'),
(167, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '25', '', '8'),
(168, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '25', '', '25'),
(169, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '26', '', '1'),
(170, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '26', '', '9'),
(171, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '26', '', '2019-05-29 00:00:00'),
(172, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '26', '', 'W'),
(173, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '26', '', '8061'),
(174, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '26', '', 'UX'),
(175, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '26', '', 'MAGU'),
(176, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '26', '', '5186546'),
(177, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '26', '', '0'),
(178, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '26', '', '0'),
(179, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '26', '', '8'),
(180, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '26', '', '26'),
(181, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '27', '', '1'),
(182, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '27', '', '16'),
(183, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '27', '', '2019-05-29 00:00:00'),
(184, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '27', '', 'L'),
(185, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '27', '', '9065'),
(186, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '27', '', 'UL'),
(187, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '27', '', 'TGHU'),
(188, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '27', '', '6887179'),
(189, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '27', '', '0'),
(190, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '27', '', '0'),
(191, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '27', '', '8'),
(192, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '27', '', '27'),
(193, '2019-07-09 16:09:31', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(194, '2019-07-09 16:10:10', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '27', '0', '3'),
(195, '2019-07-09 16:10:10', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '27', '0.00', '4200000'),
(196, '2019-07-09 16:10:56', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '23', '0', '2'),
(197, '2019-07-09 16:10:56', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '23', '0.00', '4200000'),
(198, '2019-07-09 16:11:23', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '25', '0', '1'),
(199, '2019-07-09 16:11:23', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '25', '0.00', '4'),
(200, '2019-07-09 16:11:32', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '25', '4.00', '4200000'),
(201, '2019-07-09 16:24:29', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '17', '', '1'),
(202, '2019-07-09 16:24:29', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'Nama', '17', '', 'NUR'),
(203, '2019-07-09 16:24:29', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_1', '17', '', '-'),
(204, '2019-07-09 16:24:29', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_2', '17', '', '-'),
(205, '2019-07-09 16:24:29', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'id', '17', '', '17'),
(206, '2019-07-09 16:27:19', '/emkl/t101_jo_headedit.php', '-1', '*** Batch update begin ***', 't101_jo_detail', '', '', '', ''),
(207, '2019-07-09 16:27:19', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '3', '2', '1'),
(208, '2019-07-09 16:27:19', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '3', '14', '17'),
(209, '2019-07-09 16:27:19', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '4', '2', '1'),
(210, '2019-07-09 16:27:19', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '4', '14', '17'),
(211, '2019-07-09 16:27:19', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '4', '9999', '9067'),
(212, '2019-07-09 16:27:19', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '4', 'XX', 'UL'),
(213, '2019-07-09 16:27:19', '/emkl/t101_jo_headedit.php', '-1', '*** Batch update successful ***', 't101_jo_detail', '', '', '', ''),
(214, '2019-07-09 16:34:44', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'Nama', '8', '', 'NAVIOS DEDICATION V. 008 N.'),
(215, '2019-07-09 16:34:44', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'id', '8', '', '8'),
(216, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '9', '', 'Export'),
(217, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '9', '', '19.06.002'),
(218, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '9', '', '4'),
(219, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '9', '', '1'),
(220, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '9', '', '40'),
(221, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '9', '', '2'),
(222, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '9', '', '8'),
(223, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '9', '', '9'),
(224, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(225, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '28', '', '1'),
(226, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '28', '', '16'),
(227, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '28', '', '2019-06-13 00:00:00'),
(228, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '28', '', 'L'),
(229, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '28', '', '9065'),
(230, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '28', '', 'UL'),
(231, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '28', '', 'TCLU'),
(232, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '28', '', '6224773'),
(233, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '28', '', '0'),
(234, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '28', '', '0'),
(235, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '28', '', '9'),
(236, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '28', '', '28'),
(237, '2019-07-09 16:36:51', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(238, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '10', '', 'Export'),
(239, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '10', '', '19.06.002'),
(240, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '10', '', '4'),
(241, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '10', '', '1'),
(242, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '10', '', '40'),
(243, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '10', '', '2'),
(244, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '10', '', '8'),
(245, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '10', '', '10'),
(246, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(247, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '29', '', '1'),
(248, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '29', '', '16'),
(249, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '29', '', '2019-06-13 00:00:00'),
(250, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '29', '', 'L'),
(251, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '29', '', '9065'),
(252, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '29', '', 'UL'),
(253, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '29', '', 'TCLU'),
(254, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '29', '', '6224773'),
(255, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '29', '', '0'),
(256, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '29', '', '0'),
(257, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '29', '', '10'),
(258, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '29', '', '29'),
(259, '2019-07-09 17:02:44', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(260, '2019-07-09 17:03:28', '/emkl/t101_jo_headdelete.php', '-1', '*** Batch delete begin ***', 't101_jo_head', '', '', '', ''),
(261, '2019-07-09 17:03:28', '/emkl/t101_jo_headdelete.php', '-1', 'D', 't101_jo_head', 'id', '9', '9', ''),
(262, '2019-07-09 17:03:28', '/emkl/t101_jo_headdelete.php', '-1', 'D', 't101_jo_head', 'Export_Import', '9', 'Export', ''),
(263, '2019-07-09 17:03:28', '/emkl/t101_jo_headdelete.php', '-1', 'D', 't101_jo_head', 'Nomor_JO', '9', '19.06.002', ''),
(264, '2019-07-09 17:03:28', '/emkl/t101_jo_headdelete.php', '-1', 'D', 't101_jo_head', 'Shipper_id', '9', '4', ''),
(265, '2019-07-09 17:03:28', '/emkl/t101_jo_headdelete.php', '-1', 'D', 't101_jo_head', 'Party', '9', '1', ''),
(266, '2019-07-09 17:03:28', '/emkl/t101_jo_headdelete.php', '-1', 'D', 't101_jo_head', 'Container', '9', '40', ''),
(267, '2019-07-09 17:03:28', '/emkl/t101_jo_headdelete.php', '-1', 'D', 't101_jo_head', 'Destination_id', '9', '2', ''),
(268, '2019-07-09 17:03:28', '/emkl/t101_jo_headdelete.php', '-1', 'D', 't101_jo_head', 'Feeder_id', '9', '8', ''),
(269, '2019-07-09 17:03:28', '/emkl/t101_jo_headdelete.php', '-1', '*** Batch delete successful ***', 't101_jo_head', '', '', '', ''),
(270, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '11', '', 'Export'),
(271, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '11', '', '19.06.003'),
(272, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '11', '', '4'),
(273, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '11', '', '2'),
(274, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '11', '', '40'),
(275, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '11', '', '2'),
(276, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '11', '', '8'),
(277, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '11', '', '11'),
(278, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(279, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '30', '', '1'),
(280, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '30', '', '17'),
(281, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '30', '', '2019-06-13 00:00:00'),
(282, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '30', '', 'L'),
(283, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '30', '', '9067'),
(284, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '30', '', 'UL'),
(285, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '30', '', 'TCNU'),
(286, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '30', '', '8844493'),
(287, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '30', '', '0'),
(288, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '30', '', '0'),
(289, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '30', '', '11'),
(290, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '30', '', '30'),
(291, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '31', '', '1'),
(292, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '31', '', '5'),
(293, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '31', '', '2019-06-13 00:00:00'),
(294, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '31', '', 'L'),
(295, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '31', '', '9484'),
(296, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '31', '', 'UJ'),
(297, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '31', '', 'BMOU'),
(298, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '31', '', '6028455'),
(299, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '31', '', '0'),
(300, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '31', '', '0'),
(301, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '31', '', '11'),
(302, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '31', '', '31'),
(303, '2019-07-09 17:14:26', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(304, '2019-07-09 17:53:01', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'Nama', '9', '', 'KMTC NINGBO V. 1906 N.'),
(305, '2019-07-09 17:53:01', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'id', '9', '', '9'),
(306, '2019-07-09 17:54:50', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '12', '', 'Export'),
(307, '2019-07-09 17:54:50', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '12', '', '19.06.005'),
(308, '2019-07-09 17:54:50', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '12', '', '4'),
(309, '2019-07-09 17:54:50', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '12', '', '1'),
(310, '2019-07-09 17:54:50', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '12', '', '40'),
(311, '2019-07-09 17:54:50', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '12', '', '2'),
(312, '2019-07-09 17:54:50', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '12', '', '9'),
(313, '2019-07-09 17:54:50', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '12', '', '12'),
(314, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(315, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '32', '', '2'),
(316, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '32', '', '14'),
(317, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '32', '', '2019-06-17 00:00:00'),
(318, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '32', '', 'L'),
(319, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '32', '', '9999'),
(320, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '32', '', 'XX'),
(321, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '32', '', 'CAIU'),
(322, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '32', '', '8710227'),
(323, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '32', '', '0'),
(324, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '32', '', '0'),
(325, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '32', '', '12'),
(326, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '32', '', '32'),
(327, '2019-07-09 17:54:51', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(328, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '13', '', 'Export'),
(329, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '13', '', '19.06.006'),
(330, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '13', '', '4'),
(331, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '13', '', '1'),
(332, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '13', '', '40'),
(333, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '13', '', '2'),
(334, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '13', '', '9'),
(335, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '13', '', '13'),
(336, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(337, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '33', '', '2'),
(338, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '33', '', '14'),
(339, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '33', '', '2019-06-17 00:00:00'),
(340, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '33', '', 'L'),
(341, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '33', '', '9999'),
(342, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '33', '', 'XX'),
(343, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '33', '', 'BMOU'),
(344, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '33', '', '6031253'),
(345, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '33', '', '0'),
(346, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '33', '', '0'),
(347, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '33', '', '13'),
(348, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '33', '', '33'),
(349, '2019-07-09 17:56:17', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(350, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '14', '', 'Export'),
(351, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '14', '', '19.06.007'),
(352, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '14', '', '4'),
(353, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '14', '', '3'),
(354, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '14', '', '40'),
(355, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '14', '', '2'),
(356, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '14', '', '9'),
(357, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '14', '', '14'),
(358, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(359, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '34', '', '2'),
(360, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '34', '', '14'),
(361, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '34', '', '2019-06-17 00:00:00'),
(362, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '34', '', 'L'),
(363, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '34', '', '9999'),
(364, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '34', '', 'XX'),
(365, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '34', '', 'CRSU'),
(366, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '34', '', '9337180'),
(367, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '34', '', '0'),
(368, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '34', '', '0'),
(369, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '34', '', '14'),
(370, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '34', '', '34'),
(371, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '35', '', '2'),
(372, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '35', '', '14'),
(373, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '35', '', '2019-06-17 00:00:00'),
(374, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '35', '', 'L'),
(375, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '35', '', '9999'),
(376, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '35', '', 'XX'),
(377, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '35', '', 'FCIU'),
(378, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '35', '', '7126623'),
(379, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '35', '', '0'),
(380, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '35', '', '0'),
(381, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '35', '', '14'),
(382, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '35', '', '35'),
(383, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '36', '', '2'),
(384, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '36', '', '14'),
(385, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '36', '', '2019-06-17 00:00:00'),
(386, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '36', '', 'L'),
(387, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '36', '', '9999'),
(388, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '36', '', 'XX'),
(389, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '36', '', 'SEGU'),
(390, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '36', '', '6151641'),
(391, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '36', '', '0'),
(392, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '36', '', '0'),
(393, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '36', '', '14'),
(394, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '36', '', '36'),
(395, '2019-07-09 17:58:43', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(396, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '15', '', 'Export'),
(397, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '15', '', 'KMTCSUB1519540'),
(398, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '15', '', '19.06.008'),
(399, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '15', '', '4'),
(400, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '15', '', '4'),
(401, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '15', '', '40'),
(402, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '15', '', '2'),
(403, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '15', '', '9'),
(404, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '15', '', '15'),
(405, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(406, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '37', '', '2'),
(407, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '37', '', '14'),
(408, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '37', '', '2019-06-17 00:00:00'),
(409, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '37', '', 'L'),
(410, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '37', '', '9999');
INSERT INTO `t399_audit_trail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
(411, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '37', '', 'XX'),
(412, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '37', '', 'BEAU'),
(413, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '37', '', '4870372'),
(414, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '37', '', '0'),
(415, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '37', '', '0'),
(416, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '37', '', '15'),
(417, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '37', '', '37'),
(418, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '38', '', '2'),
(419, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '38', '', '14'),
(420, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '38', '', '2019-06-17 00:00:00'),
(421, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '38', '', 'L'),
(422, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '38', '', '9999'),
(423, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '38', '', 'XX'),
(424, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '38', '', 'SEGU'),
(425, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '38', '', '4798407'),
(426, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '38', '', '0'),
(427, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '38', '', '0'),
(428, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '38', '', '15'),
(429, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '38', '', '38'),
(430, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '39', '', '2'),
(431, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '39', '', '14'),
(432, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '39', '', '2019-06-17 00:00:00'),
(433, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '39', '', 'L'),
(434, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '39', '', '9999'),
(435, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '39', '', 'XX'),
(436, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '39', '', 'TCNU'),
(437, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '39', '', '5237243'),
(438, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '39', '', '0'),
(439, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '39', '', '0'),
(440, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '39', '', '15'),
(441, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '39', '', '39'),
(442, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '40', '', '2'),
(443, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '40', '', '14'),
(444, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '40', '', '2019-06-17 00:00:00'),
(445, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '40', '', 'L'),
(446, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '40', '', '9999'),
(447, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '40', '', 'XX'),
(448, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '40', '', 'TGHU'),
(449, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '40', '', '6073552'),
(450, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '40', '', '0'),
(451, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '40', '', '0'),
(452, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '40', '', '15'),
(453, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '40', '', '40'),
(454, '2019-07-09 18:10:39', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(455, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '16', '', 'Export'),
(456, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '16', '', 'KMTCSUB1516539'),
(457, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '16', '', '19.06.009'),
(458, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '16', '', '4'),
(459, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '16', '', '1'),
(460, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '16', '', '40'),
(461, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '16', '', '2'),
(462, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '16', '', '9'),
(463, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '16', '', '16'),
(464, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(465, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '41', '', '2'),
(466, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '41', '', '14'),
(467, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '41', '', '2019-06-17 00:00:00'),
(468, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '41', '', 'L'),
(469, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '41', '', '9999'),
(470, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '41', '', 'XX'),
(471, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '41', '', 'GESU'),
(472, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '41', '', '6765563'),
(473, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '41', '', '0'),
(474, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '41', '', '0'),
(475, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '41', '', '16'),
(476, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '41', '', '41'),
(477, '2019-07-09 18:12:26', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(478, '2019-07-09 18:14:10', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '17', '', 'Export'),
(479, '2019-07-09 18:14:10', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '17', '', 'KMTCSUB1514538'),
(480, '2019-07-09 18:14:10', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '17', '', '19.06.010'),
(481, '2019-07-09 18:14:10', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '17', '', '4'),
(482, '2019-07-09 18:14:10', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '17', '', '1'),
(483, '2019-07-09 18:14:10', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '17', '', '40'),
(484, '2019-07-09 18:14:10', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '17', '', '2'),
(485, '2019-07-09 18:14:10', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '17', '', '9'),
(486, '2019-07-09 18:14:10', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '17', '', '17'),
(487, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(488, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '42', '', '2'),
(489, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '42', '', '14'),
(490, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '42', '', '2019-06-17 00:00:00'),
(491, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '42', '', 'L'),
(492, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '42', '', '9999'),
(493, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '42', '', 'XX'),
(494, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '42', '', 'KMTU'),
(495, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '42', '', '9275049'),
(496, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '42', '', '0'),
(497, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '42', '', '0'),
(498, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '42', '', '17'),
(499, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '42', '', '42'),
(500, '2019-07-09 18:14:11', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(501, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '18', '', 'Export'),
(502, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '18', '', 'KMTCSUB1514761'),
(503, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '18', '', '19.06.012'),
(504, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '18', '', '4'),
(505, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '18', '', '1'),
(506, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '18', '', '40'),
(507, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '18', '', '2'),
(508, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '18', '', '3'),
(509, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '18', '', '18'),
(510, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(511, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '43', '', '2'),
(512, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '43', '', '14'),
(513, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '43', '', '2019-06-20 00:00:00'),
(514, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '43', '', 'L'),
(515, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '43', '', '9999'),
(516, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '43', '', 'XX'),
(517, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '43', '', 'SEGU'),
(518, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '43', '', '6161953'),
(519, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '43', '', '0'),
(520, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '43', '', '0'),
(521, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '43', '', '18'),
(522, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '43', '', '43'),
(523, '2019-07-09 18:17:53', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(524, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '19', '', 'Export'),
(525, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '19', '', 'KMTCSUB1517770'),
(526, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '19', '', '19.06.013'),
(527, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '19', '', '4'),
(528, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '19', '', '1'),
(529, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '19', '', '40'),
(530, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '19', '', '2'),
(531, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '19', '', '3'),
(532, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '19', '', '19'),
(533, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(534, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '44', '', '2'),
(535, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '44', '', '14'),
(536, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '44', '', '2019-06-20 00:00:00'),
(537, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '44', '', 'L'),
(538, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '44', '', '9999'),
(539, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '44', '', 'XX'),
(540, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '44', '', 'BMOU'),
(541, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '44', '', '6919619'),
(542, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '44', '', '0'),
(543, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '44', '', '0'),
(544, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '44', '', '19'),
(545, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '44', '', '44'),
(546, '2019-07-09 18:20:01', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(547, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '20', '', 'Export'),
(548, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '20', '', 'KMTCSUB1525244'),
(549, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '20', '', '19.06.017'),
(550, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '20', '', '4'),
(551, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '20', '', '1'),
(552, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '20', '', '40'),
(553, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '20', '', '2'),
(554, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '20', '', '4'),
(555, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '20', '', '20'),
(556, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(557, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '45', '', '2'),
(558, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '45', '', '14'),
(559, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '45', '', '2019-06-27 00:00:00'),
(560, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '45', '', 'L'),
(561, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '45', '', '9999'),
(562, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '45', '', 'XX'),
(563, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '45', '', 'BSIU'),
(564, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '45', '', '9275990'),
(565, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '45', '', '0'),
(566, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '45', '', '0'),
(567, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '45', '', '20'),
(568, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '45', '', '45'),
(569, '2019-07-09 18:21:57', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(570, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '21', '', 'Export'),
(571, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '21', '', 'KMTCSUB1522250'),
(572, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '21', '', '19.06.018'),
(573, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '21', '', '4'),
(574, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '21', '', '3'),
(575, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '21', '', '40'),
(576, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '21', '', '2'),
(577, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '21', '', '4'),
(578, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '21', '', '21'),
(579, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(580, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '46', '', '2'),
(581, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '46', '', '14'),
(582, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '46', '', '2019-06-27 00:00:00'),
(583, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '46', '', 'L'),
(584, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '46', '', '9999'),
(585, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '46', '', 'XX'),
(586, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '46', '', 'TCLU'),
(587, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '46', '', '8450466'),
(588, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '46', '', '0'),
(589, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '46', '', '0'),
(590, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '46', '', '21'),
(591, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '46', '', '46'),
(592, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '47', '', '2'),
(593, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '47', '', '14'),
(594, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '47', '', '2019-06-27 00:00:00'),
(595, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '47', '', 'L'),
(596, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '47', '', '9999'),
(597, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '47', '', 'XX'),
(598, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '47', '', 'TCNU'),
(599, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '47', '', '8580148'),
(600, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '47', '', '0'),
(601, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '47', '', '0'),
(602, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '47', '', '21'),
(603, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '47', '', '47'),
(604, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '48', '', '2'),
(605, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '48', '', '14'),
(606, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '48', '', '2019-06-27 00:00:00'),
(607, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '48', '', 'L'),
(608, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '48', '', '9999'),
(609, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '48', '', 'XX'),
(610, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '48', '', 'TEMU'),
(611, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '48', '', '7695369'),
(612, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '48', '', '0'),
(613, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '48', '', '0'),
(614, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '48', '', '21'),
(615, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '48', '', '48'),
(616, '2019-07-09 18:24:40', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(617, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '22', '', 'Export'),
(618, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '22', '', 'KMTCSUB1521255'),
(619, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '22', '', '19.06.019'),
(620, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '22', '', '4'),
(621, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '22', '', '3'),
(622, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '22', '', '40'),
(623, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '22', '', '2'),
(624, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '22', '', '4'),
(625, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '22', '', '22'),
(626, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(627, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '49', '', '2'),
(628, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '49', '', '14'),
(629, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '49', '', '2019-06-27 00:00:00'),
(630, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '49', '', 'L'),
(631, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '49', '', '9999'),
(632, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '49', '', 'XX'),
(633, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '49', '', 'BMOU'),
(634, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '49', '', '5785270'),
(635, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '49', '', '0'),
(636, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '49', '', '0'),
(637, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '49', '', '22'),
(638, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '49', '', '49'),
(639, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '50', '', '2'),
(640, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '50', '', '14'),
(641, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '50', '', '2019-06-27 00:00:00'),
(642, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '50', '', 'L'),
(643, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '50', '', '9999'),
(644, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '50', '', 'XX'),
(645, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '50', '', 'GESU'),
(646, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '50', '', '6805624'),
(647, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '50', '', '0'),
(648, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '50', '', '0'),
(649, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '50', '', '22'),
(650, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '50', '', '50'),
(651, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '51', '', '2'),
(652, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '51', '', '14'),
(653, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '51', '', '2019-06-27 00:00:00'),
(654, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '51', '', 'L'),
(655, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '51', '', '9999'),
(656, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '51', '', 'XX'),
(657, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '51', '', 'TCNU'),
(658, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '51', '', '5462630'),
(659, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '51', '', '0'),
(660, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '51', '', '0'),
(661, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '51', '', '22'),
(662, '2019-07-09 18:27:03', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '51', '', '51'),
(663, '2019-07-09 18:27:04', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(664, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '23', '', 'Export'),
(665, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '23', '', 'KMTCSUB1522260'),
(666, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '23', '', '19.06.020'),
(667, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '23', '', '4'),
(668, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '23', '', '1'),
(669, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '23', '', '40'),
(670, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '23', '', '2'),
(671, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '23', '', '4'),
(672, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '23', '', '23'),
(673, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(674, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '52', '', '2'),
(675, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '52', '', '14'),
(676, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '52', '', '2019-06-27 00:00:00'),
(677, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '52', '', 'L'),
(678, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '52', '', '9999'),
(679, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '52', '', 'XX'),
(680, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '52', '', 'CRSU'),
(681, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '52', '', '9237556'),
(682, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '52', '', '0'),
(683, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '52', '', '0'),
(684, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '52', '', '23'),
(685, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '52', '', '52'),
(686, '2019-07-09 18:28:38', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(687, '2019-07-09 18:30:17', '/emkl/api/index.php', '-1', 'A', 't001_shipper', 'Nama', '6', '', 'PT. ANEKA COFFEE INDUSTRY'),
(688, '2019-07-09 18:30:17', '/emkl/api/index.php', '-1', 'A', 't001_shipper', 'id', '6', '', '6'),
(689, '2019-07-09 18:30:52', '/emkl/api/index.php', '-1', 'A', 't002_destination', 'Nama', '4', '', 'HOCHIMINH'),
(690, '2019-07-09 18:30:52', '/emkl/api/index.php', '-1', 'A', 't002_destination', 'id', '4', '', '4'),
(691, '2019-07-09 18:31:49', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'Nama', '10', '', 'NORTHERN VOLITION V. 1906 N.'),
(692, '2019-07-09 18:31:49', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'id', '10', '', '10'),
(693, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '24', '', 'Export'),
(694, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '24', '', 'CKCOSUB0003257'),
(695, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '24', '', '19.06.014'),
(696, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '24', '', '6'),
(697, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '24', '', '2'),
(698, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '24', '', '40'),
(699, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '24', '', '4'),
(700, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '24', '', '10'),
(701, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '24', '', '24'),
(702, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(703, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '53', '', '2'),
(704, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '53', '', '14'),
(705, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '53', '', '2019-06-25 00:00:00'),
(706, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '53', '', 'L'),
(707, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '53', '', '9999'),
(708, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '53', '', 'XX'),
(709, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '53', '', 'DFSU'),
(710, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '53', '', '6018119'),
(711, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '53', '', '0'),
(712, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '53', '', '0'),
(713, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '53', '', '24'),
(714, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '53', '', '53'),
(715, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '54', '', '2'),
(716, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '54', '', '14'),
(717, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '54', '', '2019-06-25 00:00:00'),
(718, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '54', '', 'L'),
(719, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '54', '', '9999'),
(720, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '54', '', 'XX'),
(721, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '54', '', 'TEMU'),
(722, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '54', '', '8546797'),
(723, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '54', '', '0'),
(724, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '54', '', '0'),
(725, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '54', '', '24'),
(726, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '54', '', '54'),
(727, '2019-07-09 18:33:00', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(728, '2019-07-09 18:40:20', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'No_Tagihan', '19', '0', '1'),
(729, '2019-07-09 18:40:20', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Jumlah_Tagihan', '19', '0.00', '3800000'),
(730, '2019-07-09 18:44:21', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '29', '0', '1'),
(731, '2019-07-09 18:44:21', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '29', '0.00', '2200000'),
(732, '2019-07-09 18:44:48', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '30', '0', '2'),
(733, '2019-07-09 18:44:48', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '30', '0.00', '2200000'),
(734, '2019-07-09 18:45:19', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '31', '0', '3'),
(735, '2019-07-09 18:45:19', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '31', '0.00', '2200000'),
(736, '2019-07-09 18:47:26', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '33', '0', '5'),
(737, '2019-07-09 18:47:26', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '33', '0.00', '2200000'),
(738, '2019-07-09 18:47:49', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '32', '0', '6'),
(739, '2019-07-09 18:47:49', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '32', '0.00', '2200000'),
(740, '2019-07-09 18:48:09', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '36', '0', '7'),
(741, '2019-07-09 18:48:09', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '36', '0.00', '2200000'),
(742, '2019-07-09 18:48:32', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '38', '0', '8'),
(743, '2019-07-09 18:48:32', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '38', '0.00', '2200000'),
(744, '2019-07-09 18:48:55', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '37', '0', '9'),
(745, '2019-07-09 18:48:55', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '37', '0.00', '2200000'),
(746, '2019-07-09 18:49:34', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '35', '0', '11'),
(747, '2019-07-09 18:49:34', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '35', '0.00', '2200000'),
(748, '2019-07-09 18:49:53', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '41', '0', '12'),
(749, '2019-07-09 18:49:53', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '41', '0.00', '2200000'),
(750, '2019-07-09 18:50:14', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '40', '0', '13'),
(751, '2019-07-09 18:50:14', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '40', '0.00', '2200000'),
(752, '2019-07-09 18:50:37', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '34', '0', '14'),
(753, '2019-07-09 18:50:37', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '34', '0.00', '2200000'),
(754, '2019-07-09 18:50:57', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '39', '0', '15'),
(755, '2019-07-09 18:50:57', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '39', '0.00', '2200000'),
(756, '2019-07-09 18:51:30', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '42', '0', '16'),
(757, '2019-07-09 18:51:30', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '42', '0.00', '2200000'),
(758, '2019-07-09 18:56:03', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '44', '0', '19'),
(759, '2019-07-09 18:56:03', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '44', '0.00', '2200000'),
(760, '2019-07-09 18:56:27', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '48', '0', '20'),
(761, '2019-07-09 18:56:27', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '48', '0.00', '2200000'),
(762, '2019-07-09 18:56:58', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '45', '0', '21'),
(763, '2019-07-09 18:56:58', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '45', '0.00', '2200000'),
(764, '2019-07-09 18:57:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '51', '0', '22'),
(765, '2019-07-09 18:57:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '51', '0.00', '2200000'),
(766, '2019-07-09 18:57:40', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '50', '0', '23'),
(767, '2019-07-09 18:57:40', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '50', '0.00', '2200000'),
(768, '2019-07-10 11:53:52', '/emkl/api/index.php', '-1', 'A', 't002_destination', 'Nama', '5', '', 'SURABAYA'),
(769, '2019-07-10 11:53:52', '/emkl/api/index.php', '-1', 'A', 't002_destination', 'id', '5', '', '5'),
(770, '2019-07-10 11:54:23', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'Nama', '11', '', 'TR. ATHOS V. 1905 S.'),
(771, '2019-07-10 11:54:23', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'id', '11', '', '11'),
(772, '2019-07-10 11:58:01', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '18', '', '1'),
(773, '2019-07-10 11:58:01', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'Nama', '18', '', 'ROFIQ'),
(774, '2019-07-10 11:58:01', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_1', '18', '', '-'),
(775, '2019-07-10 11:58:01', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_2', '18', '', '-'),
(776, '2019-07-10 11:58:01', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'id', '18', '', '18'),
(777, '2019-07-10 12:04:44', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '19', '', '2'),
(778, '2019-07-10 12:04:44', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'Nama', '19', '', 'PITONO'),
(779, '2019-07-10 12:04:44', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_1', '19', '', '-'),
(780, '2019-07-10 12:04:44', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_2', '19', '', '-'),
(781, '2019-07-10 12:04:44', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'id', '19', '', '19'),
(782, '2019-07-10 12:06:20', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '20', '', '2'),
(783, '2019-07-10 12:06:20', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'Nama', '20', '', 'YUDI'),
(784, '2019-07-10 12:06:20', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_1', '20', '', '-'),
(785, '2019-07-10 12:06:20', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_2', '20', '', '-'),
(786, '2019-07-10 12:06:20', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'id', '20', '', '20'),
(787, '2019-07-10 12:08:35', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '21', '', '2'),
(788, '2019-07-10 12:08:35', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'Nama', '21', '', 'DONI'),
(789, '2019-07-10 12:08:35', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_1', '21', '', '-'),
(790, '2019-07-10 12:08:35', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_2', '21', '', '-'),
(791, '2019-07-10 12:08:35', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'id', '21', '', '21'),
(792, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '25', '', 'Export'),
(793, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '25', '', 'KMTCPUS702811'),
(794, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '25', '', '19.06.001/IMP'),
(795, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '25', '', '4'),
(796, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '25', '', '12'),
(797, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '25', '', '40'),
(798, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '25', '', '5'),
(799, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '25', '', '11'),
(800, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '25', '', '25'),
(801, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(802, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '55', '', '1'),
(803, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '55', '', '4'),
(804, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '55', '', '2019-06-13 00:00:00'),
(805, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '55', '', 'L'),
(806, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '55', '', '8643'),
(807, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '55', '', 'UY'),
(808, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '55', '', 'GESU'),
(809, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '55', '', '6765563'),
(810, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '55', '', '0'),
(811, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '55', '', '0'),
(812, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '55', '', '25'),
(813, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '55', '', '55'),
(814, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '56', '', '1'),
(815, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '56', '', '5'),
(816, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '56', '', '2019-06-13 00:00:00'),
(817, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '56', '', 'L'),
(818, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '56', '', '9484'),
(819, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '56', '', 'UJ'),
(820, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '56', '', 'KMTU'),
(821, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '56', '', '9275049'),
(822, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '56', '', '0'),
(823, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '56', '', '0'),
(824, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '56', '', '25'),
(825, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '56', '', '56');
INSERT INTO `t399_audit_trail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
(826, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '57', '', '1'),
(827, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '57', '', '17'),
(828, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '57', '', '2019-06-13 00:00:00'),
(829, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '57', '', 'L'),
(830, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '57', '', '9067'),
(831, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '57', '', 'UL'),
(832, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '57', '', 'FCIU'),
(833, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '57', '', '7126623'),
(834, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '57', '', '0'),
(835, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '57', '', '0'),
(836, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '57', '', '25'),
(837, '2019-07-10 12:09:16', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '57', '', '57'),
(838, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '58', '', '1'),
(839, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '58', '', '18'),
(840, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '58', '', '2019-06-13 00:00:00'),
(841, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '58', '', 'AG'),
(842, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '58', '', '8753'),
(843, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '58', '', 'UH'),
(844, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '58', '', 'SEGU'),
(845, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '58', '', '6151641'),
(846, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '58', '', '0'),
(847, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '58', '', '0'),
(848, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '58', '', '25'),
(849, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '58', '', '58'),
(850, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '59', '', '1'),
(851, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '59', '', '7'),
(852, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '59', '', '2019-06-13 00:00:00'),
(853, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '59', '', 'L'),
(854, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '59', '', '9498'),
(855, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '59', '', 'UJ'),
(856, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '59', '', 'CRSU'),
(857, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '59', '', '9337180'),
(858, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '59', '', '0'),
(859, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '59', '', '0'),
(860, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '59', '', '25'),
(861, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '59', '', '59'),
(862, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '60', '', '1'),
(863, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '60', '', '11'),
(864, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '60', '', '2019-06-13 00:00:00'),
(865, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '60', '', 'L'),
(866, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '60', '', '9858'),
(867, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '60', '', 'UD'),
(868, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '60', '', 'TGHU'),
(869, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '60', '', '6073552'),
(870, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '60', '', '0'),
(871, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '60', '', '0'),
(872, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '60', '', '25'),
(873, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '60', '', '60'),
(874, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '61', '', '1'),
(875, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '61', '', '8'),
(876, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '61', '', '2019-06-13 00:00:00'),
(877, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '61', '', 'L'),
(878, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '61', '', '8220'),
(879, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '61', '', 'UD'),
(880, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '61', '', 'TCNU'),
(881, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '61', '', '5237243'),
(882, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '61', '', '0'),
(883, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '61', '', '0'),
(884, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '61', '', '25'),
(885, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '61', '', '61'),
(886, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '62', '', '1'),
(887, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '62', '', '15'),
(888, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '62', '', '2019-06-13 00:00:00'),
(889, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '62', '', 'L'),
(890, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '62', '', '8476'),
(891, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '62', '', 'UY'),
(892, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '62', '', 'SEGU'),
(893, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '62', '', '4798407'),
(894, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '62', '', '0'),
(895, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '62', '', '0'),
(896, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '62', '', '25'),
(897, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '62', '', '62'),
(898, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '63', '', '1'),
(899, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '63', '', '2'),
(900, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '63', '', '2019-06-13 00:00:00'),
(901, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '63', '', 'L'),
(902, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '63', '', '8204'),
(903, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '63', '', 'UT'),
(904, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '63', '', 'FCIU'),
(905, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '63', '', '7276393'),
(906, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '63', '', '0'),
(907, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '63', '', '0'),
(908, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '63', '', '25'),
(909, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '63', '', '63'),
(910, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '64', '', '2'),
(911, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '64', '', '20'),
(912, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '64', '', '2019-06-13 00:00:00'),
(913, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '64', '', 'B'),
(914, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '64', '', '9010'),
(915, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '64', '', 'ZEH'),
(916, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '64', '', 'BEAU'),
(917, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '64', '', '4870372'),
(918, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '64', '', '0'),
(919, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '64', '', '0'),
(920, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '64', '', '25'),
(921, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '64', '', '64'),
(922, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '65', '', '2'),
(923, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '65', '', '19'),
(924, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '65', '', '2019-06-13 00:00:00'),
(925, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '65', '', 'B'),
(926, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '65', '', '9009'),
(927, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '65', '', 'ZEH'),
(928, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '65', '', 'CXDU'),
(929, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '65', '', '1304544'),
(930, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '65', '', '0'),
(931, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '65', '', '0'),
(932, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '65', '', '25'),
(933, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '65', '', '65'),
(934, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '66', '', '2'),
(935, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '66', '', '21'),
(936, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '66', '', '2019-06-13 00:00:00'),
(937, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '66', '', 'B'),
(938, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '66', '', '9011'),
(939, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '66', '', 'ZEH'),
(940, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '66', '', 'DFSU'),
(941, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '66', '', '7698113'),
(942, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '66', '', '0'),
(943, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '66', '', '0'),
(944, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '66', '', '25'),
(945, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '66', '', '66'),
(946, '2019-07-10 12:09:17', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(947, '2019-07-10 12:11:01', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '65', '0', '10'),
(948, '2019-07-10 12:11:01', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '65', '0.00', '2200000'),
(949, '2019-07-10 12:11:24', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_head', 'Export_Import', '25', 'Export', 'Import'),
(950, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '26', '', 'Import'),
(951, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '26', '', 'KMTCPUS702812'),
(952, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '26', '', '19.06.002/IMP'),
(953, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '26', '', '4'),
(954, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '26', '', '3'),
(955, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '26', '', '40'),
(956, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '26', '', '5'),
(957, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '26', '', '11'),
(958, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '26', '', '26'),
(959, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(960, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '67', '', '1'),
(961, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '67', '', '16'),
(962, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '67', '', '2019-06-13 00:00:00'),
(963, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '67', '', 'L'),
(964, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '67', '', '9065'),
(965, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '67', '', 'UL'),
(966, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '67', '', 'CAIU'),
(967, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '67', '', '8710227'),
(968, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '67', '', '0'),
(969, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '67', '', '0'),
(970, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '67', '', '26'),
(971, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '67', '', '67'),
(972, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '68', '', '1'),
(973, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '68', '', '10'),
(974, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '68', '', '2019-06-13 00:00:00'),
(975, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '68', '', 'L'),
(976, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '68', '', '9744'),
(977, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '68', '', 'UJ'),
(978, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '68', '', 'BMOU'),
(979, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '68', '', '6031253'),
(980, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '68', '', '0'),
(981, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '68', '', '0'),
(982, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '68', '', '26'),
(983, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '68', '', '68'),
(984, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '69', '', '1'),
(985, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '69', '', '1'),
(986, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '69', '', '2019-06-13 00:00:00'),
(987, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '69', '', 'L'),
(988, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '69', '', '8606'),
(989, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '69', '', 'US'),
(990, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '69', '', 'TEMU'),
(991, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '69', '', '7799949'),
(992, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '69', '', '0'),
(993, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '69', '', '0'),
(994, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '69', '', '26'),
(995, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '69', '', '69'),
(996, '2019-07-10 12:57:52', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(997, '2019-07-10 12:59:24', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '69', '0', '4'),
(998, '2019-07-10 12:59:24', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '69', '0.00', '2200000'),
(999, '2019-07-10 13:00:11', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '66', '0', '17'),
(1000, '2019-07-10 13:00:11', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '66', '0.00', '2200000'),
(1001, '2019-07-10 13:00:40', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '63', '0', '18'),
(1002, '2019-07-10 13:00:40', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '63', '0.00', '2200000'),
(1003, '2019-07-10 13:04:27', '/emkl/api/index.php', '-1', 'A', 't001_shipper', 'Nama', '7', '', 'PT. KERRY LOGISTIC'),
(1004, '2019-07-10 13:04:27', '/emkl/api/index.php', '-1', 'A', 't001_shipper', 'id', '7', '', '7'),
(1005, '2019-07-10 13:05:58', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'Nama', '12', '', 'SEASPAN FRASER V. 051 S.'),
(1006, '2019-07-10 13:05:58', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'id', '12', '', '12'),
(1007, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '27', '', 'Import'),
(1008, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '27', '', 'MNLCB19001829'),
(1009, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '27', '', '19.06.003/IMP'),
(1010, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '27', '', '7'),
(1011, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '27', '', '2'),
(1012, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '27', '', '40'),
(1013, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '27', '', '5'),
(1014, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '27', '', '12'),
(1015, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '27', '', '27'),
(1016, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(1017, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '70', '', '1'),
(1018, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '70', '', '3'),
(1019, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '70', '', '2019-06-15 00:00:00'),
(1020, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '70', '', 'L'),
(1021, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '70', '', '9999'),
(1022, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '70', '', 'XX'),
(1023, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '70', '', 'CAIU'),
(1024, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '70', '', '8477162'),
(1025, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '70', '', '0'),
(1026, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '70', '', '0'),
(1027, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '70', '', '27'),
(1028, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '70', '', '70'),
(1029, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '71', '', '1'),
(1030, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '71', '', '3'),
(1031, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '71', '', '2019-06-15 00:00:00'),
(1032, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '71', '', 'L'),
(1033, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '71', '', '9999'),
(1034, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '71', '', 'XX'),
(1035, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '71', '', 'REGU'),
(1036, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '71', '', '5076882'),
(1037, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '71', '', '0'),
(1038, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '71', '', '0'),
(1039, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '71', '', '27'),
(1040, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '71', '', '71'),
(1041, '2019-07-10 13:07:32', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(1042, '2019-07-10 13:09:55', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'Nama', '13', '', 'NORTHERN DEDICATION V. 1906 S.'),
(1043, '2019-07-10 13:09:55', '/emkl/api/index.php', '-1', 'A', 't003_feeder', 'id', '13', '', '13'),
(1044, '2019-07-10 13:10:37', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '22', '', '1'),
(1045, '2019-07-10 13:10:37', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'Nama', '22', '', 'PITONO'),
(1046, '2019-07-10 13:10:37', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_1', '22', '', '-'),
(1047, '2019-07-10 13:10:37', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_2', '22', '', '-'),
(1048, '2019-07-10 13:10:37', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'id', '22', '', '22'),
(1049, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Export_Import', '28', '', 'Import'),
(1050, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'No_BL', '28', '', 'KMTCPUSB749208'),
(1051, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Nomor_JO', '28', '', '19.06.004/IMP'),
(1052, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Shipper_id', '28', '', '4'),
(1053, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Party', '28', '', '1'),
(1054, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Container', '28', '', '40'),
(1055, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Destination_id', '28', '', '5'),
(1056, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'Feeder_id', '28', '', '13'),
(1057, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_head', 'id', '28', '', '28'),
(1058, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert begin ***', 't101_jo_detail', '', '', '', ''),
(1059, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'TruckingVendor_id', '72', '', '1'),
(1060, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Driver_id', '72', '', '22'),
(1061, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Tanggal_Stuffing', '72', '', '2019-06-26 00:00:00'),
(1062, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_1', '72', '', 'B'),
(1063, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_2', '72', '', '9009'),
(1064, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Polisi_3', '72', '', 'ZEH'),
(1065, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_1', '72', '', 'BSIU'),
(1066, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Nomor_Container_2', '72', '', '9270719'),
(1067, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'No_Tagihan', '72', '', '0'),
(1068, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'Jumlah_Tagihan', '72', '', '0'),
(1069, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'JOHead_id', '72', '', '28'),
(1070, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', 'A', 't101_jo_detail', 'id', '72', '', '72'),
(1071, '2019-07-10 13:11:14', '/emkl/t101_jo_headadd.php', '-1', '*** Batch insert successful ***', 't101_jo_detail', '', '', '', ''),
(1072, '2019-07-10 13:11:59', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '72', '0', '24'),
(1073, '2019-07-10 13:11:59', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '72', '0.00', '2200000'),
(1074, '2019-07-10 13:55:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '58', '0', NULL),
(1075, '2019-07-10 13:55:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '58', '0', '7'),
(1076, '2019-07-10 13:55:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '58', '0.00', '2200000'),
(1077, '2019-07-10 13:55:48', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '36', '0', '25'),
(1078, '2019-07-10 14:24:20', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '36', '7', '0'),
(1079, '2019-07-10 14:24:20', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '36', '2200000.00', '0'),
(1080, '2019-07-10 14:26:26', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '36', '2', '1'),
(1081, '2019-07-10 14:26:26', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '36', '14', '18'),
(1082, '2019-07-10 14:26:26', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_1', '36', 'L', 'AG'),
(1083, '2019-07-10 14:26:26', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '36', '9999', '8753'),
(1084, '2019-07-10 14:26:26', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '36', 'XX', 'UH'),
(1085, '2019-07-10 14:31:09', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1086, '2019-07-10 14:31:09', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '57', '0', NULL),
(1087, '2019-07-10 14:31:09', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '57', '0', '11'),
(1088, '2019-07-10 14:31:09', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '57', '0.00', '2200000'),
(1089, '2019-07-10 14:31:09', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '35', '0', '25'),
(1090, '2019-07-10 14:31:09', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '35', '11', '0'),
(1091, '2019-07-10 14:31:09', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '35', '2200000.00', '0'),
(1092, '2019-07-10 14:31:09', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1093, '2019-07-10 14:33:13', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1094, '2019-07-10 14:33:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '59', '0', NULL),
(1095, '2019-07-10 14:33:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '59', '0', '14'),
(1096, '2019-07-10 14:33:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '59', '0.00', '2200000'),
(1097, '2019-07-10 14:33:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '34', '0', '25'),
(1098, '2019-07-10 14:33:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '34', '14', '0'),
(1099, '2019-07-10 14:33:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '34', '2200000.00', '0'),
(1100, '2019-07-10 14:33:14', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1101, '2019-07-10 14:35:12', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '35', '2', '1'),
(1102, '2019-07-10 14:35:12', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '35', '14', '17'),
(1103, '2019-07-10 14:35:43', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '35', '9999', '9067'),
(1104, '2019-07-10 14:35:43', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '35', 'XX', 'UL'),
(1105, '2019-07-10 14:37:35', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '34', '2', '1'),
(1106, '2019-07-10 14:37:35', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '34', '14', '7'),
(1107, '2019-07-10 14:37:35', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '34', '9999', '9498'),
(1108, '2019-07-10 14:37:35', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '34', 'XX', 'UJ'),
(1109, '2019-07-10 14:45:20', '/emkl/t101_jo_headedit.php', '-1', 'U', 't101_jo_head', 'No_BL', '2', '-', 'CKCOSUB0003183'),
(1110, '2019-07-10 14:52:45', '/emkl/t101_jo_headlist.php', '-1', '*** Batch update begin ***', 't101_jo_head', '', '', '', ''),
(1111, '2019-07-10 14:52:45', '/emkl/t101_jo_headlist.php', '-1', 'U', 't101_jo_head', 'No_BL', '10', '-', 'KMTCSUB1516389'),
(1112, '2019-07-10 14:52:45', '/emkl/t101_jo_headlist.php', '-1', 'U', 't101_jo_head', 'No_BL', '11', '-', 'KMTCSUB1510396'),
(1113, '2019-07-10 14:52:45', '/emkl/t101_jo_headlist.php', '-1', 'U', 't101_jo_head', 'No_BL', '3', '-', 'SNKO079190500507'),
(1114, '2019-07-10 14:52:45', '/emkl/t101_jo_headlist.php', '-1', 'U', 't101_jo_head', 'No_BL', '12', '-', 'KMTCSUB1517534'),
(1115, '2019-07-10 14:52:45', '/emkl/t101_jo_headlist.php', '-1', 'U', 't101_jo_head', 'No_BL', '13', '-', 'KMTCSUB1518536'),
(1116, '2019-07-10 14:52:45', '/emkl/t101_jo_headlist.php', '-1', 'U', 't101_jo_head', 'No_BL', '14', '-', 'KMTCSUB1518535'),
(1117, '2019-07-10 14:52:45', '/emkl/t101_jo_headlist.php', '-1', 'U', 't101_jo_head', 'No_BL', '4', '-', 'SNKO079190600147'),
(1118, '2019-07-10 14:52:45', '/emkl/t101_jo_headlist.php', '-1', 'U', 't101_jo_head', 'No_BL', '5', '-', 'SNKO079190600173'),
(1119, '2019-07-10 14:52:45', '/emkl/t101_jo_headlist.php', '-1', '*** Batch update successful ***', 't101_jo_head', '', '', '', ''),
(1120, '2019-07-10 14:56:16', '/emkl/t101_jo_headlist.php', '-1', 'U', 't101_jo_head', 'No_BL', '8', '-', 'SNKO079190500394'),
(1121, '2019-07-10 17:45:06', '/emkl/t101_jo_headlist.php', '-1', 'U', 't101_jo_head', 'No_BL', '7', '-', 'SNKO079190500210'),
(1122, '2019-07-10 19:06:46', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '70', '0', NULL),
(1123, '2019-07-10 19:06:46', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '70', '0', '1'),
(1124, '2019-07-10 19:06:46', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '70', '0.00', '4000000'),
(1125, '2019-07-10 19:08:10', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '70', '9999', '9259'),
(1126, '2019-07-10 19:08:10', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '70', 'XX', 'UQ'),
(1127, '2019-07-10 19:25:11', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '32', '2', '1'),
(1128, '2019-07-10 19:25:11', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '32', '14', '6'),
(1129, '2019-07-10 19:25:11', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '32', '9999', '9065'),
(1130, '2019-07-10 19:25:11', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '32', 'XX', 'UL'),
(1131, '2019-07-10 19:25:11', '/emkl/t101_jo_detaillist.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '32', '0', NULL),
(1132, '2019-07-10 19:27:10', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '33', '2', '1'),
(1133, '2019-07-10 19:27:10', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '33', '14', '10'),
(1134, '2019-07-10 19:27:10', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '33', '9999', '9744'),
(1135, '2019-07-10 19:27:10', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '33', 'XX', 'UJ'),
(1136, '2019-07-10 19:27:10', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '33', '0', NULL),
(1137, '2019-07-10 19:32:17', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '23', '', '1'),
(1138, '2019-07-10 19:32:17', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'Nama', '23', '', 'YUDI'),
(1139, '2019-07-10 19:32:17', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_1', '23', '', '-'),
(1140, '2019-07-10 19:32:17', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_2', '23', '', '-'),
(1141, '2019-07-10 19:32:17', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'id', '23', '', '23'),
(1142, '2019-07-10 19:32:35', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '37', '2', '1'),
(1143, '2019-07-10 19:32:35', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '37', '14', '23'),
(1144, '2019-07-10 19:32:35', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_1', '37', 'L', 'B'),
(1145, '2019-07-10 19:32:35', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '37', '9999', '9010'),
(1146, '2019-07-10 19:32:35', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '37', 'XX', 'ZEH'),
(1147, '2019-07-10 19:32:35', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '37', '0', NULL),
(1148, '2019-07-10 19:33:42', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '38', '2', '1'),
(1149, '2019-07-10 19:33:42', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '38', '14', '15'),
(1150, '2019-07-10 19:33:42', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '38', '9999', '8476'),
(1151, '2019-07-10 19:33:42', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '38', 'XX', 'UC'),
(1152, '2019-07-10 19:33:42', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '38', '0', NULL),
(1153, '2019-07-10 19:34:31', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '39', '2', '1'),
(1154, '2019-07-10 19:34:31', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '39', '14', '8'),
(1155, '2019-07-10 19:34:31', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '39', '9999', '8220'),
(1156, '2019-07-10 19:34:31', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '39', 'XX', 'UD'),
(1157, '2019-07-10 19:34:31', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '39', '0', NULL),
(1158, '2019-07-10 19:36:32', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '40', '2', '1'),
(1159, '2019-07-10 19:36:32', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '40', '14', '11'),
(1160, '2019-07-10 19:36:32', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '40', '9999', '8606'),
(1161, '2019-07-10 19:36:32', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '40', 'XX', 'US'),
(1162, '2019-07-10 19:36:32', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '40', '0', NULL),
(1163, '2019-07-10 19:38:15', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '41', '2', '1'),
(1164, '2019-07-10 19:38:15', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '41', '14', '4'),
(1165, '2019-07-10 19:38:15', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '41', '9999', '8643'),
(1166, '2019-07-10 19:38:15', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '41', 'XX', 'UY'),
(1167, '2019-07-10 19:38:15', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '41', '0', NULL),
(1168, '2019-07-10 19:40:40', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '42', '2', '1'),
(1169, '2019-07-10 19:40:40', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '42', '14', '23'),
(1170, '2019-07-10 19:40:40', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '42', '9999', '9065'),
(1171, '2019-07-10 19:40:40', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '42', 'XX', 'UL'),
(1172, '2019-07-10 19:40:40', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '42', '0', NULL),
(1173, '2019-07-10 19:42:13', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1174, '2019-07-10 19:42:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '56', '0', NULL),
(1175, '2019-07-10 19:42:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '56', '0', '16'),
(1176, '2019-07-10 19:42:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '56', '0.00', '2200000'),
(1177, '2019-07-10 19:42:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '42', NULL, '25'),
(1178, '2019-07-10 19:42:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '42', '16', '0'),
(1179, '2019-07-10 19:42:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '42', '2200000.00', '0'),
(1180, '2019-07-10 19:42:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '45', '0', NULL),
(1181, '2019-07-10 19:42:13', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1182, '2019-07-10 19:51:41', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1183, '2019-07-10 19:51:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '68', '0', NULL),
(1184, '2019-07-10 19:51:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '68', '0', '5'),
(1185, '2019-07-10 19:51:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '68', '0.00', '2200000'),
(1186, '2019-07-10 19:51:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '33', NULL, '26'),
(1187, '2019-07-10 19:51:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '33', '5', '0'),
(1188, '2019-07-10 19:51:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '33', '2200000.00', '0'),
(1189, '2019-07-10 19:51:41', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1190, '2019-07-10 19:58:13', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1191, '2019-07-10 19:58:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '10', '0', NULL),
(1192, '2019-07-10 19:58:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '67', '0', NULL),
(1193, '2019-07-10 19:58:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '67', '0', '6'),
(1194, '2019-07-10 19:58:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '67', '0.00', '2200000'),
(1195, '2019-07-10 19:58:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '32', NULL, '26'),
(1196, '2019-07-10 19:58:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '32', '6', '0'),
(1197, '2019-07-10 19:58:13', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '32', '2200000.00', '0'),
(1198, '2019-07-10 19:58:13', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1199, '2019-07-10 20:01:20', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1200, '2019-07-10 20:01:21', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '62', '0', NULL),
(1201, '2019-07-10 20:01:21', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '62', '0', '8'),
(1202, '2019-07-10 20:01:21', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '62', '0.00', '2200000'),
(1203, '2019-07-10 20:01:21', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '38', NULL, '25'),
(1204, '2019-07-10 20:01:21', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '38', '8', '0'),
(1205, '2019-07-10 20:01:21', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '38', '2200000.00', '0'),
(1206, '2019-07-10 20:01:21', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1207, '2019-07-10 20:02:14', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '62', 'UY', 'UC'),
(1208, '2019-07-10 20:04:04', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1209, '2019-07-10 20:04:04', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '64', '0', NULL),
(1210, '2019-07-10 20:04:04', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '64', '0', '9'),
(1211, '2019-07-10 20:04:04', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '64', '0.00', '2200000'),
(1212, '2019-07-10 20:04:04', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '37', NULL, '25'),
(1213, '2019-07-10 20:04:04', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '37', '9', '0'),
(1214, '2019-07-10 20:04:04', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '37', '2200000.00', '0'),
(1215, '2019-07-10 20:04:04', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1216, '2019-07-10 20:04:38', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1217, '2019-07-10 20:04:38', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'truckingvendor_id', '64', '2', '1'),
(1218, '2019-07-10 20:04:38', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1219, '2019-07-10 20:06:02', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1220, '2019-07-10 20:06:02', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'driver_id', '64', '20', '23'),
(1221, '2019-07-10 20:06:02', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1222, '2019-07-10 20:07:17', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1223, '2019-07-10 20:07:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'truckingvendor_id', '65', '2', '1'),
(1224, '2019-07-10 20:07:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'driver_id', '65', '19', '22'),
(1225, '2019-07-10 20:07:17', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '65', '0', NULL);
INSERT INTO `t399_audit_trail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
(1226, '2019-07-10 20:07:17', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1227, '2019-07-10 20:13:06', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1228, '2019-07-10 20:13:06', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '55', '0', NULL),
(1229, '2019-07-10 20:13:06', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '55', '0', '12'),
(1230, '2019-07-10 20:13:06', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '55', '0.00', '2200000'),
(1231, '2019-07-10 20:13:06', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '41', NULL, '25'),
(1232, '2019-07-10 20:13:06', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '41', '12', '0'),
(1233, '2019-07-10 20:13:06', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '41', '2200000.00', '0'),
(1234, '2019-07-10 20:13:06', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1235, '2019-07-10 20:19:14', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1236, '2019-07-10 20:19:14', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '60', '0', NULL),
(1237, '2019-07-10 20:19:14', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '60', '0', '13'),
(1238, '2019-07-10 20:19:14', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '60', '0.00', '2200000'),
(1239, '2019-07-10 20:19:14', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '40', NULL, '25'),
(1240, '2019-07-10 20:19:14', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '40', '13', '0'),
(1241, '2019-07-10 20:19:14', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '40', '2200000.00', '0'),
(1242, '2019-07-10 20:19:14', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1243, '2019-07-10 20:20:51', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '60', '9858', '8606'),
(1244, '2019-07-10 20:20:51', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '60', 'UD', 'US'),
(1245, '2019-07-10 20:24:41', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1246, '2019-07-10 20:24:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '61', '0', NULL),
(1247, '2019-07-10 20:24:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '61', '0', '15'),
(1248, '2019-07-10 20:24:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '61', '0.00', '2200000'),
(1249, '2019-07-10 20:24:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '39', NULL, '25'),
(1250, '2019-07-10 20:24:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'no_tagihan', '39', '15', '0'),
(1251, '2019-07-10 20:24:41', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'jumlah_tagihan', '39', '2200000.00', '0'),
(1252, '2019-07-10 20:24:41', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1253, '2019-07-10 20:29:57', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1254, '2019-07-10 20:29:57', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'truckingvendor_id', '66', '2', '1'),
(1255, '2019-07-10 20:29:57', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'driver_id', '66', '21', '3'),
(1256, '2019-07-10 20:29:57', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '66', '0', NULL),
(1257, '2019-07-10 20:29:57', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1258, '2019-07-10 20:30:23', '/emkl/t005_driveradd.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '24', '', '1'),
(1259, '2019-07-10 20:30:23', '/emkl/t005_driveradd.php', '-1', 'A', 't005_driver', 'Nama', '24', '', 'DONI'),
(1260, '2019-07-10 20:30:23', '/emkl/t005_driveradd.php', '-1', 'A', 't005_driver', 'No_HP_1', '24', '', '-'),
(1261, '2019-07-10 20:30:23', '/emkl/t005_driveradd.php', '-1', 'A', 't005_driver', 'No_HP_2', '24', '', '-'),
(1262, '2019-07-10 20:30:23', '/emkl/t005_driveradd.php', '-1', 'A', 't005_driver', 'id', '24', '', '24'),
(1263, '2019-07-10 20:30:33', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1264, '2019-07-10 20:30:33', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'driver_id', '66', '3', '24'),
(1265, '2019-07-10 20:30:33', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1266, '2019-07-10 20:33:23', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '63', '0', NULL),
(1267, '2019-07-10 20:35:09', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '44', '2', '1'),
(1268, '2019-07-10 20:35:09', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '44', '14', '18'),
(1269, '2019-07-10 20:35:09', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_1', '44', 'L', 'AG'),
(1270, '2019-07-10 20:35:09', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '44', '9999', '8753'),
(1271, '2019-07-10 20:35:09', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '44', 'XX', 'UH'),
(1272, '2019-07-10 20:35:09', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '44', '0', NULL),
(1273, '2019-07-10 20:38:18', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '48', '2', '1'),
(1274, '2019-07-10 20:38:18', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '48', '14', '6'),
(1275, '2019-07-10 20:38:18', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '48', '9999', '9065'),
(1276, '2019-07-10 20:38:18', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '48', 'XX', 'UL'),
(1277, '2019-07-10 20:38:18', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '48', '0', NULL),
(1278, '2019-07-10 20:39:43', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '45', '2', '1'),
(1279, '2019-07-10 20:39:43', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '45', '14', '4'),
(1280, '2019-07-10 20:39:43', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '45', '9999', '8643'),
(1281, '2019-07-10 20:39:43', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '45', 'XX', 'UY'),
(1282, '2019-07-10 20:41:24', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '51', '2', '1'),
(1283, '2019-07-10 20:41:24', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '51', '14', '9'),
(1284, '2019-07-10 20:41:24', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_1', '51', 'L', 'W'),
(1285, '2019-07-10 20:41:24', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '51', '9999', '8061'),
(1286, '2019-07-10 20:41:24', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '51', 'XX', 'UX'),
(1287, '2019-07-10 20:41:24', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '51', '0', NULL),
(1288, '2019-07-10 20:42:40', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '50', '2', '1'),
(1289, '2019-07-10 20:42:40', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '50', '14', '15'),
(1290, '2019-07-10 20:42:40', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '50', '9999', '8476'),
(1291, '2019-07-10 20:42:40', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '50', 'XX', 'UC'),
(1292, '2019-07-10 20:42:40', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '50', '0', NULL),
(1293, '2019-07-10 20:43:42', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update begin ***', 'v101_jo_head_detail', '', '', '', ''),
(1294, '2019-07-10 20:43:42', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '72', '0', NULL),
(1295, '2019-07-10 20:43:42', '/emkl/v101_jo_head_detaillist.php', '-1', '*** Batch update successful ***', 'v101_jo_head_detail', '', '', '', ''),
(1296, '2019-07-10 20:44:47', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'truckingvendor_id', '70', '1', '2'),
(1297, '2019-07-10 20:44:47', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'driver_id', '70', '3', '14'),
(1298, '2019-07-10 20:45:08', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'truckingvendor_id', '71', '1', '2'),
(1299, '2019-07-10 20:45:08', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'driver_id', '71', '3', '14'),
(1300, '2019-07-10 20:45:08', '/emkl/v101_jo_head_detaillist.php', '-1', 'U', 'v101_jo_head_detail', 'ref_johead_id', '71', '0', NULL),
(1301, '2019-07-10 20:45:33', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '69', '0', NULL),
(1302, '2019-07-10 20:46:59', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '52', '2', '1'),
(1303, '2019-07-10 20:46:59', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '52', '14', '18'),
(1304, '2019-07-10 20:46:59', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_1', '52', 'L', 'AG'),
(1305, '2019-07-10 20:46:59', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '52', '9999', '8753'),
(1306, '2019-07-10 20:46:59', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '52', 'XX', 'UH'),
(1307, '2019-07-10 20:46:59', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '52', '0', NULL),
(1308, '2019-07-10 20:49:12', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '49', '2', '1'),
(1309, '2019-07-10 20:49:12', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '49', '14', '7'),
(1310, '2019-07-10 20:49:12', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '49', '9999', '9498'),
(1311, '2019-07-10 20:49:12', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '49', 'XX', 'UJ'),
(1312, '2019-07-10 20:49:12', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '49', '0', NULL),
(1313, '2019-07-10 20:50:38', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'TruckingVendor_id', '46', '2', '1'),
(1314, '2019-07-10 20:50:38', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '46', '14', '17'),
(1315, '2019-07-10 20:50:38', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '46', '9999', '9067'),
(1316, '2019-07-10 20:50:38', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '46', 'XX', 'UL'),
(1317, '2019-07-10 20:50:38', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '46', '0', NULL),
(1318, '2019-07-10 20:51:12', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '25', '', '2'),
(1319, '2019-07-10 20:51:12', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'Nama', '25', '', 'DENI'),
(1320, '2019-07-10 20:51:12', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_1', '25', '', '-'),
(1321, '2019-07-10 20:51:12', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_2', '25', '', '-'),
(1322, '2019-07-10 20:51:12', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'id', '25', '', '25'),
(1323, '2019-07-10 20:51:25', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '47', '14', '25'),
(1324, '2019-07-10 20:51:25', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_1', '47', 'L', 'B'),
(1325, '2019-07-10 20:51:25', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '47', '9999', '9010'),
(1326, '2019-07-10 20:51:25', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '47', 'XX', 'UL'),
(1327, '2019-07-10 20:51:25', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '47', '0', NULL),
(1328, '2019-07-10 20:54:07', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'TruckingVendor_id', '26', '', '2'),
(1329, '2019-07-10 20:54:07', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'Nama', '26', '', 'SOKRAN'),
(1330, '2019-07-10 20:54:07', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_1', '26', '', '-'),
(1331, '2019-07-10 20:54:07', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'No_HP_2', '26', '', '-'),
(1332, '2019-07-10 20:54:07', '/emkl/api/index.php', '-1', 'A', 't005_driver', 'id', '26', '', '26'),
(1333, '2019-07-10 20:54:24', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Driver_id', '43', '14', '26'),
(1334, '2019-07-10 20:54:24', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_1', '43', 'L', 'N'),
(1335, '2019-07-10 20:54:24', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_2', '43', '9999', '9251'),
(1336, '2019-07-10 20:54:24', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Nomor_Polisi_3', '43', 'XX', 'UU'),
(1337, '2019-07-10 20:54:24', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '43', '0', NULL),
(1338, '2019-07-10 20:57:13', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '30', '0', NULL),
(1339, '2019-07-10 20:57:26', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '31', '0', NULL),
(1340, '2019-07-10 20:57:46', '/emkl/t101_jo_detailedit.php', '-1', 'U', 't101_jo_detail', 'Ref_JOHead_id', '29', '0', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v101_jo_head_detail`
-- (See below for the actual view)
--
CREATE TABLE `v101_jo_head_detail` (
`id` int(11)
,`export_import` enum('Export','Import')
,`no_bl` varchar(50)
,`nomor_jo` varchar(50)
,`shipper_id` int(11)
,`party` int(11)
,`container` enum('40','20')
,`tanggal_stuffing` date
,`destination_id` int(11)
,`feeder_id` int(11)
,`truckingvendor_id` int(11)
,`driver_id` int(11)
,`nomor_polisi_1` varchar(5)
,`nomor_polisi_2` varchar(10)
,`nomor_polisi_3` varchar(5)
,`nomor_container_1` varchar(10)
,`nomor_container_2` varchar(10)
,`ref_johead_id` int(11)
,`no_tagihan` tinyint(4)
,`jumlah_tagihan` float(14,2)
);

-- --------------------------------------------------------

--
-- Structure for view `v101_jo_head_detail`
--
DROP TABLE IF EXISTS `v101_jo_head_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v101_jo_head_detail`  AS  select `detail`.`id` AS `id`,`head`.`Export_Import` AS `export_import`,`head`.`No_BL` AS `no_bl`,`head`.`Nomor_JO` AS `nomor_jo`,`head`.`Shipper_id` AS `shipper_id`,`head`.`Party` AS `party`,`head`.`Container` AS `container`,`detail`.`Tanggal_Stuffing` AS `tanggal_stuffing`,`head`.`Destination_id` AS `destination_id`,`head`.`Feeder_id` AS `feeder_id`,`detail`.`TruckingVendor_id` AS `truckingvendor_id`,`detail`.`Driver_id` AS `driver_id`,`detail`.`Nomor_Polisi_1` AS `nomor_polisi_1`,`detail`.`Nomor_Polisi_2` AS `nomor_polisi_2`,`detail`.`Nomor_Polisi_3` AS `nomor_polisi_3`,`detail`.`Nomor_Container_1` AS `nomor_container_1`,`detail`.`Nomor_Container_2` AS `nomor_container_2`,`detail`.`Ref_JOHead_id` AS `ref_johead_id`,`detail`.`No_Tagihan` AS `no_tagihan`,`detail`.`Jumlah_Tagihan` AS `jumlah_tagihan` from (`t101_jo_detail` `detail` left join `t101_jo_head` `head` on((`head`.`id` = `detail`.`JOHead_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t001_shipper`
--
ALTER TABLE `t001_shipper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t002_destination`
--
ALTER TABLE `t002_destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t003_feeder`
--
ALTER TABLE `t003_feeder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t004_liner`
--
ALTER TABLE `t004_liner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t005_driver`
--
ALTER TABLE `t005_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t006_trucking_vendor`
--
ALTER TABLE `t006_trucking_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t096_employees`
--
ALTER TABLE `t096_employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `t097_userlevels`
--
ALTER TABLE `t097_userlevels`
  ADD PRIMARY KEY (`userlevelid`);

--
-- Indexes for table `t098_userlevelpermissions`
--
ALTER TABLE `t098_userlevelpermissions`
  ADD PRIMARY KEY (`userlevelid`,`tablename`);

--
-- Indexes for table `t101_jo_detail`
--
ALTER TABLE `t101_jo_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t101_jo_head`
--
ALTER TABLE `t101_jo_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t101_tagihan_trucking`
--
ALTER TABLE `t101_tagihan_trucking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t399_audit_trail`
--
ALTER TABLE `t399_audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t001_shipper`
--
ALTER TABLE `t001_shipper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t002_destination`
--
ALTER TABLE `t002_destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t003_feeder`
--
ALTER TABLE `t003_feeder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t004_liner`
--
ALTER TABLE `t004_liner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t005_driver`
--
ALTER TABLE `t005_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `t006_trucking_vendor`
--
ALTER TABLE `t006_trucking_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t096_employees`
--
ALTER TABLE `t096_employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t101_jo_detail`
--
ALTER TABLE `t101_jo_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `t101_jo_head`
--
ALTER TABLE `t101_jo_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `t101_tagihan_trucking`
--
ALTER TABLE `t101_tagihan_trucking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `t399_audit_trail`
--
ALTER TABLE `t399_audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1341;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;