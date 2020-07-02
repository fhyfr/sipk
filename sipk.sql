-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 12:52 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipk`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_hadir` int(11) NOT NULL,
  `jml_alfa` int(11) NOT NULL,
  `jml_izin` int(11) NOT NULL,
  `jml_sakit` int(11) NOT NULL,
  `jml_lembur` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id`, `name`, `bulan`, `tahun`, `jml_hadir`, `jml_alfa`, `jml_izin`, `jml_sakit`, `jml_lembur`, `created_at`, `updated_at`) VALUES
(7, 'Riski Kikuk', 'April', '2020', 10, 0, 0, 0, 6, '2020-06-28 18:51:19', '2020-06-29 23:05:01'),
(8, 'Fauziyah Latif', 'September', '2019', 20, 4, 5, 2, 5, '2020-06-28 18:58:47', '2020-06-29 23:06:01'),
(11, 'Firmansah', 'Juni', '2020', 1, 1, 1, 3, 4, '2020-06-28 21:34:10', '2020-06-28 21:34:10'),
(14, 'Ayu Vija Vimufti', 'Juli', '2020', 21, 2, 0, 3, 12, '2020-07-02 00:57:04', '2020-07-02 00:58:12'),
(16, 'Ilham Hernandes', 'September', '2020', 20, 0, 4, 0, 12, '2020-07-02 03:27:02', '2020-07-02 03:27:02'),
(17, 'Lee Min Ho', 'September', '2020', 20, 0, 0, 0, 10, '2020-07-02 03:29:31', '2020-07-02 03:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_pokok` bigint(20) NOT NULL,
  `insentif` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `jabatan`, `gaji_pokok`, `insentif`, `created_at`, `updated_at`) VALUES
(1, 'Marketing', 6500000, 1500000, '2020-06-29 12:13:38', '2020-06-29 13:25:26'),
(2, 'Direktur', 25000000, 3540000, '2020-06-29 12:14:15', '2020-06-29 12:14:15'),
(4, 'Security', 4500000, 2000000, '2020-06-29 13:26:59', '2020-07-02 02:54:08'),
(5, 'Staff IT', 7000000, 1000000, '2020-07-02 00:51:47', '2020-07-02 03:01:51'),
(7, 'Manajer', 7000000, 1500000, '2020-07-02 03:13:06', '2020-07-02 03:15:00'),
(9, 'Driver', 4500000, 1000000, '2020-07-02 03:14:44', '2020-07-02 03:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `nik`, `name`, `jabatan`, `jk`, `agama`, `telepon`, `created_at`, `updated_at`) VALUES
(7, '11170930000032', 'Firmansah', 'Direktur', 'Laki-laki', 'Islam', '081385505546', '2020-06-28 07:39:08', '2020-06-29 19:28:14'),
(8, '11170930000033', 'Riski Kikuk', 'Security', 'Laki-laki', 'Islam', '0877456689', '2020-06-28 07:39:40', '2020-06-29 19:28:56'),
(10, '1117093445688', 'Fauziyah Latif', 'Marketing', 'Perempuan', 'Islam', '0899567789', '2020-06-28 18:50:48', '2020-06-28 18:50:48'),
(11, '1117393193', 'Ayu Vija Vimufti', 'Staff IT', 'Perempuan', 'Katolik', '08334567756', '2020-07-02 00:55:08', '2020-07-02 00:55:35'),
(12, '172828282', 'Lee Min Ho', 'Driver', 'Laki-laki', 'Konghucu', '082234555', '2020-07-02 03:20:07', '2020-07-02 03:20:57'),
(13, '11263731', 'Ilham Hernandes', 'Manajer', 'Laki-laki', 'Kristen', '027788111', '2020-07-02 03:20:38', '2020-07-02 03:20:38');

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
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2020_06_24_101113_penyesuaian_table_users', 1),
(21, '2020_06_27_182538_create_karyawans_table', 2),
(23, '2020_06_28_120213_create_absensis_table', 3),
(24, '2020_06_29_145030_create_perusahaans_table', 4),
(26, '2020_06_29_175641_create_jabatans_table', 5),
(27, '2020_06_29_195400_create_pendapatans_table', 6),
(28, '2020_06_29_195429_create_potongans_table', 6);

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
-- Table structure for table `pendapatans`
--

CREATE TABLE `pendapatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_lembur` bigint(20) NOT NULL,
  `nm_makan` bigint(20) NOT NULL,
  `nm_tunjangan` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendapatans`
--

INSERT INTO `pendapatans` (`id`, `nm_lembur`, `nm_makan`, `nm_tunjangan`, `created_at`, `updated_at`) VALUES
(1, 50000, 60000, 1000000, NULL, '2020-07-02 03:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaans`
--

INSERT INTO `perusahaans` (`id`, `nama_perusahaan`, `nama_pimpinan`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'PT. Sejahtera Mulya Abadi, Tbk', 'Prof. Dr. Fransh Magnis Suseno, PhD', 'Bintaro, Jakarta Selatan', '0218887779', NULL, '2020-07-02 03:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `potongans`
--

CREATE TABLE `potongans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_alfa` bigint(20) NOT NULL,
  `nm_izin` bigint(20) NOT NULL,
  `nm_sakit` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `potongans`
--

INSERT INTO `potongans` (`id`, `nm_alfa`, `nm_izin`, `nm_sakit`, `created_at`, `updated_at`) VALUES
(1, 20000, 10000, 15000, NULL, '2020-07-02 03:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `username`, `password`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Firmansah', 'fhaya.firman@gmail.com', NULL, 'admin', '$2y$10$nkbRx9.T3gCMqEig8ghYq.gpxVKc/Dy1J6YDWhtzuZ9Cjsi/MGLAW', 'admin', 'mgvLakQyN6X4TjcoAzPOfksqvb16ewSIwXYvaOAu64Vl6SvYzAAnaeTLeGJL', '2020-06-27 10:42:32', '2020-06-27 10:42:32'),
(6, 'Latif Fauziyah', 'latif.fauziyah@gmail.com', NULL, 'karyawan', '$2y$10$fVdyWp4pJQc6laNGWHIytegMAMp18bAmwWDrTnqdXHipSE3QP0eGS', 'karyawan', '4FIUMIMKWsNnP4faIocyiiUh1bg0LCzvlCWx5rMOSIUBZMk5n5N3eTg0hin7', '2020-06-27 10:43:14', '2020-07-02 03:51:44'),
(8, 'Faiz Hanif Rizqullah', 'faiz@gmail.com', NULL, 'faiz', '$2y$10$ftqRv3IxYqoSEeBDhRpCw.JD0LQA6eJ/Iehm5CRZZ7909UqvQu95O', 'karyawan', NULL, '2020-06-28 06:54:53', '2020-07-02 00:47:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensis_karyawan_name` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jabatans_jabatan_unique` (`jabatan`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawans_nik_unique` (`nik`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `karyawans_jabatan` (`jabatan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pendapatans`
--
ALTER TABLE `pendapatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `perusahaans_nama_perusahaan_unique` (`nama_perusahaan`),
  ADD UNIQUE KEY `perusahaans_nama_pimpinan_unique` (`nama_pimpinan`),
  ADD UNIQUE KEY `perusahaans_alamat_unique` (`alamat`),
  ADD UNIQUE KEY `perusahaans_telepon_unique` (`telepon`);

--
-- Indexes for table `potongans`
--
ALTER TABLE `potongans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pendapatans`
--
ALTER TABLE `pendapatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `potongans`
--
ALTER TABLE `potongans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensis`
--
ALTER TABLE `absensis`
  ADD CONSTRAINT `absensis_karyawan_name` FOREIGN KEY (`name`) REFERENCES `karyawans` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD CONSTRAINT `karyawans_jabatan` FOREIGN KEY (`jabatan`) REFERENCES `jabatans` (`jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
