-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2025 at 04:23 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digifor`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_korban`
--

CREATE TABLE IF NOT EXISTS `data_korban` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kejadian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_korban`
--

INSERT INTO `data_korban` (`id`, `nama_lengkap`, `no_hp`, `deskripsi_kejadian`, `created_at`, `updated_at`) VALUES
('ba84e350-c6f5-11f0-808e-0a0027000010', 'Fulan 1', '0823123456789', 'Kehilanagan motor di sigura gura', NULL, NULL),
('cc6f2d85-c6f5-11f0-808e-0a0027000010', 'Fulan 2', '0878945612354', 'kehilangan HP di jl. ijden', NULL, NULL),
('dff9faea-c6f5-11f0-808e-0a0027000010', 'fULAN 3', '08456789432', 'Ditemukan meninggal di kamar kost', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE IF NOT EXISTS `kasus` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_korban` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kasus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan_kasus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('baru','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'baru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`id`, `id_korban`, `jenis_kasus`, `ringkasan_kasus`, `created_at`, `updated_at`) VALUES
('0747f76e-c6f6-11f0-808e-0a0027000010', 'ba84e350-c6f5-11f0-808e-0a0027000010', 'Kehilangan', 'lorem ipsum dolor sit amet', NULL, NULL),
('28ac1e01-c6f6-11f0-808e-0a0027000010', 'cc6f2d85-c6f5-11f0-808e-0a0027000010', 'Kehilangan ', 'lorem ipsum dolor sit amet', NULL, NULL),
('28ac3837-c6f6-11f0-808e-0a0027000010', 'dff9faea-c6f5-11f0-808e-0a0027000010', 'Kematian ', 'lorme ipsum ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tindakan_forensik`
--

CREATE TABLE IF NOT EXISTS `tindakan_forensik` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kasus` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan_dilakuakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tindakan_forensik`
--

INSERT INTO `tindakan_forensik` (`id`, `id_kasus`, `tindakan_dilakuakan`, `waktu_tindakan`, `created_at`, `updated_at`) VALUES
('56043965-c6f6-11f0-808e-0a0027000010', '28ac1e01-c6f6-11f0-808e-0a0027000010', 'Penyelidikan via cctv ', 'Sabtu, 21 / 11 / 2025', NULL, NULL),
('56045650-c6f6-11f0-808e-0a0027000010', '28ac3837-c6f6-11f0-808e-0a0027000010', 'Penyelidikan via cctv ', 'Sabtu, 21 / 11 / 2025', NULL, NULL),
('5604685b-c6f6-11f0-808e-0a0027000010', '0747f76e-c6f6-11f0-808e-0a0027000010', 'Penyelidikan via cctv ', 'Sabtu, 21 / 11 / 2025', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_korban`
--
ALTER TABLE `data_korban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kasus_id_korban_foreign` (`id_korban`);

--
-- Indexes for table `tindakan_forensik`
--
ALTER TABLE `tindakan_forensik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tindakan_forensik_id_kasus_foreign` (`id_kasus`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kasus`
--
ALTER TABLE `kasus`
  ADD CONSTRAINT `kasus_id_korban_foreign` FOREIGN KEY (`id_korban`) REFERENCES `data_korban` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tindakan_forensik`
--
ALTER TABLE `tindakan_forensik`
  ADD CONSTRAINT `tindakan_forensik_id_kasus_foreign` FOREIGN KEY (`id_kasus`) REFERENCES `kasus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
