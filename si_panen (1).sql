-- phpMyAdmin SQL Dump
-- version 5.2.2-dev+20230604.7b88ab16af
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 08:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_panen`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_hasil_panens`
--

CREATE TABLE `foto_hasil_panens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_panen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_hasil_panens`
--

INSERT INTO `foto_hasil_panens` (`id`, `nama`, `hasil_panen_id`, `created_at`, `updated_at`) VALUES
(1, 'img/hasil-panen/1702296339_WhatsApp Image 2023-12-08 at 21.06.59 (1)_11zon.jpg', 4, '2023-12-11 13:05:39', '2023-12-11 13:05:39'),
(2, 'img/hasil-panen/1703843955_WhatsApp Image 2023-12-28 at 09.06.58_11zon (1).jpg', 5, '2023-12-29 10:59:15', '2023-12-29 10:59:15'),
(3, 'img/hasil-panen/1703844070_WhatsApp Image 2023-12-28 at 09.06.58.jpeg', 6, '2023-12-29 11:01:10', '2023-12-29 11:01:10'),
(4, 'img/hasil-panen/1703844334_WhatsApp Image 2023-12-28 at 09.06.58_11zon (1).jpg', 7, '2023-12-29 11:05:34', '2023-12-29 11:05:34'),
(5, 'img/hasil-panen/1703844502_WhatsApp Image 2023-12-28 at 09.06.58_11zon (1).jpg', 8, '2023-12-29 11:08:22', '2023-12-29 11:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_panens`
--

CREATE TABLE `hasil_panens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `luas_lahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelompok_tani` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_ubinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gkp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gkg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_produksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_hasil_produksi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelurahan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_panens`
--

INSERT INTO `hasil_panens` (`id`, `luas_lahan`, `kelompok_tani`, `alamat_ubinan`, `gkp`, `gkg`, `hasil_produksi`, `detail_hasil_produksi`, `url_lokasi`, `kecamatan_id`, `kelurahan_id`, `created_at`, `updated_at`) VALUES
(5, '100 H', 'Sejahtera', 'Teluk Tiram darat', '10', '10', '10', 'Hasil yang di dapat para petani bdfksjhdakdhaksdhaksdhaskdhaskdhaskdhaskdh', 'https://maps.app.goo.gl/3gzBShtqwHKhBWBw6', 5, 2, '2023-12-29 10:59:14', '2023-12-29 10:59:14'),
(6, '100', 'Sejahtera', 'Teluk Tiram darat', '10', '10', '10', 'Hasil yang di dapat para petani bdfksjhdakdhaksdhaksdhaskdhaskdhaskdhaskdh', 'https://maps.app.goo.gl/3gzBShtqwHKhBWBw6', 5, 2, '2023-12-29 11:01:09', '2023-12-29 11:01:09'),
(7, '100', 'Sejahtera', 'Teluk Tiram darat', '10', '10', '10', 'Hasil yang di dapat para petani bdfksjhdakdhaksdhaksdhaskdhaskdhaskdhaskdh', 'https://maps.app.goo.gl/3gzBShtqwHKhBWBw6', 1, 3, '2023-12-29 11:05:33', '2023-12-29 11:05:33'),
(8, '100', 'Sejahtera', 'Teluk Tiram darat', '10', '10', '10', 'Hasil yang di dapat para petani bdfksjhdakdhaksdhaksdhaskdhaskdhaskdhaskdh', 'https://maps.app.goo.gl/3gzBShtqwHKhBWBw6', 4, 4, '2023-12-29 11:08:22', '2023-12-29 11:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Banjarmasin Tengah', '2023-12-11 12:43:57', '2023-12-11 12:43:57'),
(2, 'Banjarmasin Utara', '2023-12-11 12:43:57', '2023-12-11 12:43:57'),
(3, 'Banjarmasin Selatan', '2023-12-11 12:43:57', '2023-12-11 12:43:57'),
(4, 'Banjarmasin Barat', '2023-12-11 12:43:57', '2023-12-11 12:43:57'),
(9, 'Banjarmasin Tengah', '2023-12-29 11:03:37', '2023-12-29 11:03:37'),
(10, 'Banjarmasin Barat', '2023-12-29 11:06:37', '2023-12-29 11:06:37'),
(11, 'Banjarmasin Timur', '2023-12-30 06:44:20', '2023-12-30 06:44:20'),
(12, 'Banjarmasin Utara', '2023-12-30 06:44:35', '2023-12-30 06:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahans`
--

CREATE TABLE `kelurahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelurahans`
--

INSERT INTO `kelurahans` (`id`, `nama`, `kecamatan_id`, `created_at`, `updated_at`) VALUES
(3, 'teluk tiram', 1, '2023-12-29 11:04:44', '2023-12-29 11:04:44'),
(4, 'mawar', 4, '2023-12-29 11:06:57', '2023-12-29 11:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_27_133301_create_hasil_panens_table', 1),
(6, '2023_11_28_094432_create_kelurahans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `telp`, `roles`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@hotmail.com', '081208120812', 'admin', 'Aktif', '$2y$10$KYgH1h0kyJH4eWetYikY/eZCw6mRasJHfO4wh6qNyHHxWApB6esh2', NULL, '2023-12-11 12:43:57', '2023-12-11 12:43:57'),
(2, 'Penyuluh', 'penyuluh', 'penyuluh@hotmail.com', '081208120812', 'penyuluh', 'Aktif', '$2y$10$mraUfti7lmd0gXDuxaw8/.2BTYeypy.J4CupassjXfRkVCQTaaZfe', NULL, '2023-12-11 12:43:57', '2023-12-11 12:43:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto_hasil_panens`
--
ALTER TABLE `foto_hasil_panens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_panens`
--
ALTER TABLE `hasil_panens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahans`
--
ALTER TABLE `kelurahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_hasil_panens`
--
ALTER TABLE `foto_hasil_panens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil_panens`
--
ALTER TABLE `hasil_panens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelurahans`
--
ALTER TABLE `kelurahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
