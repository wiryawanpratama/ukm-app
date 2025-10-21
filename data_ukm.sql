-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2025 at 01:37 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_ukm`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_ukm`
--

CREATE TABLE `anggota_ukm` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` year NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukm_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota_ukm`
--

INSERT INTO `anggota_ukm` (`id`, `nama`, `nim`, `prodi`, `angkatan`, `jenis_kelamin`, `no_hp`, `email`, `alamat`, `foto`, `ukm_id`, `created_at`, `updated_at`) VALUES
(10, 'Fajar Setiawan', '2101001', 'Teknik Mesin', '2021', 'L', '081234567890', 'fajar@polman.ac.id', 'Jl. Cibereum No. 45, Bandung', 'default.jpg', 2, '2025-10-16 02:07:21', '2025-10-16 02:07:21'),
(11, 'Lina Marlina', '2101002', 'Teknik Kimia', '2021', 'P', '081245678901', 'lina@polman.ac.id', 'Jl. Sukaraja No. 22, Bandung', 'default.jpg', 2, '2025-10-16 02:07:21', '2025-10-16 02:07:21'),
(12, 'Hendra Gunawan', '2102001', 'Teknik Informatika', '2020', 'L', '081256789012', 'hendra@polman.ac.id', 'Jl. Babakan Sari No. 9, Bandung', 'default.jpg', 3, '2025-10-16 02:07:21', '2025-10-16 02:07:21'),
(13, 'Putri Amelia', '2102002', 'Teknik Elektro', '2020', 'P', '081267890123', 'putri@polman.ac.id', 'Jl. Cikutra No. 15, Bandung', 'default.jpg', 3, '2025-10-16 02:07:21', '2025-10-16 02:07:21'),
(14, 'Agus Firmansyah', '2103001', 'Teknik Industri', '2019', 'L', '081278901234', 'agus@polman.ac.id', 'Jl. Setiabudi No. 9, Bandung', 'default.jpg', 4, '2025-10-16 02:07:21', '2025-10-16 02:07:21'),
(15, 'Intan Permata', '2103002', 'Teknik Kimia', '2019', 'P', '081289012345', 'intan@polman.ac.id', 'Jl. Antapani No. 17, Bandung', 'default.jpg', 4, '2025-10-16 02:07:21', '2025-10-16 02:07:21'),
(16, 'Yusuf Rahman', '2104001', 'Teknik Mesin', '2020', 'L', '081290123456', 'yusuf@polman.ac.id', 'Jl. Sukamaju No. 8, Bandung', 'default.jpg', 5, '2025-10-16 02:07:21', '2025-10-16 02:07:21'),
(17, 'Dian Anggraini', '2104002', 'Teknik Komputer', '2020', 'P', '081201234567', 'dian@polman.ac.id', 'Jl. Cibogo No. 10, Bandung', 'default.jpg', 5, '2025-10-16 02:07:21', '2025-10-16 02:07:21'),
(18, 'Nanda Pratama', '2105001', 'Teknik Mesin', '2022', 'L', '081212345678', 'nanda@polman.ac.id', 'Jl. Gegerkalong No. 18, Bandung', 'default.jpg', 6, '2025-10-16 02:07:21', '2025-10-16 02:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_ukms`
--

CREATE TABLE `anggota_ukms` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_lomba`
--

CREATE TABLE `info_lomba` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lomba` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` enum('Online','Offline') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_lomba`
--

INSERT INTO `info_lomba` (`id`, `nama_lomba`, `tipe`, `tanggal_mulai`, `tanggal_selesai`, `link`, `deskripsi`, `created_at`, `updated_at`) VALUES
(3, 'lomba coding', 'Offline', '2025-10-16', '2025-10-17', NULL, NULL, '2025-10-16 03:57:20', '2025-10-16 03:57:20'),
(4, 'lomba hacking', 'Offline', '2025-10-18', '2025-10-24', NULL, NULL, '2025-10-16 04:05:37', '2025-10-16 04:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `info_ukm`
--

CREATE TABLE `info_ukm` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_ukm`
--

INSERT INTO `info_ukm` (`id`, `judul`, `deskripsi`, `tanggal`, `created_at`, `updated_at`) VALUES
(7, 'UKM Musik Menang lomba nasional', 'UKM Musik polman memenangkan lomba tampil musik di perlombaan nasional yang diselenggarakan di kota bandung', '2025-10-17', '2025-10-16 03:58:37', '2025-10-16 03:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_15_031957_create_ukm', 1),
(5, '2025_10_15_032009_create_anggota_ukm', 1),
(6, '2025_10_15_033642_create_anggota_ukms_table', 1),
(7, '2025_10_15_131625_create_info_lomba_table', 1),
(8, '2025_10_15_131630_create_info_ukm_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('C6snLqyDwxfvw6rh4x6qVHgoitbFFlDPy6Adhq3D', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWUJSTU5DNWczc21pWkdISlRYY0kzZVFJVHR4c2tQR3hWNUhnYkdzNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbmZvL3VrbSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1760612789);

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_ukm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ketua_ukm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id`, `nama_ukm`, `bidang`, `deskripsi`, `ketua_ukm`, `kontak`, `logo`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'UKM Basket', 'Olahraga', 'apa iyha', 'Andi Wijaya', NULL, NULL, NULL, '2025-10-15 18:58:12', '2025-10-15 20:10:41'),
(3, 'UKM Musik', 'Seni', NULL, 'Budi Santoso', NULL, NULL, NULL, '2025-10-15 18:58:12', '2025-10-15 18:58:12'),
(4, 'UKM Riset', 'Riset', NULL, 'Siti Nurhaliza', NULL, NULL, NULL, '2025-10-15 18:58:12', '2025-10-15 18:58:12'),
(5, 'UKM Tari', 'Seni', NULL, 'Dewi Lestari', NULL, NULL, NULL, '2025-10-15 18:58:12', '2025-10-15 18:58:12'),
(6, 'UKM Pecinta Alam', 'Lingkungan', NULL, 'Rizky Pratama', NULL, NULL, NULL, '2025-10-15 18:58:12', '2025-10-15 18:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Wiryawan Pratama', 'wiryawan@gmail.com', NULL, '$2y$12$1XbMadllLVJ1W/LnHfi3g.2Kcu2HXIlVuV4HxJT4lulnvYjDfPQMK', NULL, '2025-10-15 19:26:46', '2025-10-15 19:26:46'),
(4, 'Gibral Haikal Faiz', 'gibral@laravel.tes', NULL, '$2y$12$oA4s8k4IiZ6oiMImJ1rKN.YIGZlFxe0dWix33fvbuGNMKENb0w/6O', NULL, '2025-10-15 20:09:22', '2025-10-15 20:09:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_ukm`
--
ALTER TABLE `anggota_ukm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggota_ukm_nim_unique` (`nim`),
  ADD KEY `anggota_ukm_ukm_id_foreign` (`ukm_id`);

--
-- Indexes for table `anggota_ukms`
--
ALTER TABLE `anggota_ukms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `info_lomba`
--
ALTER TABLE `info_lomba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_ukm`
--
ALTER TABLE `info_ukm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ukm_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_ukm`
--
ALTER TABLE `anggota_ukm`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `anggota_ukms`
--
ALTER TABLE `anggota_ukms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_lomba`
--
ALTER TABLE `info_lomba`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `info_ukm`
--
ALTER TABLE `info_ukm`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_ukm`
--
ALTER TABLE `anggota_ukm`
  ADD CONSTRAINT `anggota_ukm_ukm_id_foreign` FOREIGN KEY (`ukm_id`) REFERENCES `ukm` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ukm`
--
ALTER TABLE `ukm`
  ADD CONSTRAINT `ukm_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
