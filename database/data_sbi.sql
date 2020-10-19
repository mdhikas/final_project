-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 08:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_sbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` bigint(3) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `kode`, `nama_alternatif`, `created_at`, `updated_at`) VALUES
(62, 'A1', 'Farhan Ali Hidayat', '2020-08-12 11:34:52', '2020-08-12 11:34:52'),
(63, 'A2', 'Renaldy Bagas Bayu Pambudi', '2020-08-12 11:35:06', '2020-08-12 11:35:06'),
(64, 'A3', 'Indri Dwi Lestari', '2020-08-12 11:35:18', '2020-08-12 11:35:18'),
(65, 'A4', 'Yusuf Kurnia Aji', '2020-08-12 11:35:28', '2020-08-12 11:35:28'),
(66, 'A5', 'Tedi Rayadi', '2020-08-12 11:35:39', '2020-08-12 11:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sertifikasi` int(11) NOT NULL,
  `nama_sertifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_klasifikasi` int(11) NOT NULL,
  `nama_sertifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sertifikasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dept` int(11) NOT NULL,
  `nama_dept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Hindu','Budha','Kristen','Katolik','Konghucu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nik`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `agama`, `posisi`, `jabatan`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 201631168, 'Muhammad', 'Dhika Azizi', 'L', 'Islam', 'Admin', 'Super User', 1, NULL, NULL),
(2, 201631180, 'Sigit', 'Prasetyo Noprianto', 'L', 'Islam', 'SECRETARY', 'User', 4, '2020-07-08 04:09:15', '2020-07-08 04:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_perhitungans`
--

CREATE TABLE `hasil_perhitungans` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai_leavingflow` float DEFAULT NULL,
  `rank_leavingflow` int(11) DEFAULT NULL,
  `nilai_enteringflow` float DEFAULT NULL,
  `rank_enteringflow` int(11) DEFAULT NULL,
  `nilai_netflow` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_perhitungans`
--

INSERT INTO `hasil_perhitungans` (`id`, `id_alternatif`, `nilai_leavingflow`, `rank_leavingflow`, `nilai_enteringflow`, `rank_enteringflow`, `nilai_netflow`) VALUES
(9, 62, 0.0672917, 2, -0.0672917, 4, 0.134583),
(10, 63, 0.0516667, 3, -0.0516667, 3, 0.103333),
(11, 64, -0.148333, 5, 0.148333, 1, -0.296667),
(12, 65, 0.088125, 1, -0.088125, 5, 0.17625),
(13, 66, -0.05875, 4, 0.05875, 2, -0.1175);

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int(11) NOT NULL,
  `minmax` enum('Maximum','Minimum') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_preferensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q` double(8,2) NOT NULL,
  `p` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `kode`, `nama_kriteria`, `bobot`, `minmax`, `tipe_preferensi`, `q`, `p`, `created_at`, `updated_at`) VALUES
(3, 'K1', 'Pemahaman Objective Program', 10, 'Maximum', 'Tipe Linier (Linear Criterion atau V-Shape)', 0.00, 10.00, '2020-07-08 05:27:26', '2020-07-23 19:23:46'),
(4, 'K2', 'Pemahaman Isi Materi Program', 15, 'Maximum', 'Tipe Linier (Linear Criterion atau V-Shape)', 0.00, 10.00, '2020-07-08 09:13:57', '2020-07-23 19:24:03'),
(5, 'K3', 'Kompetensi Skill Sesuai  Objective Program', 30, 'Maximum', 'Tipe Linier (Linear Criterion atau V-Shape)', 0.00, 10.00, '2020-07-08 09:19:06', '2020-07-23 19:24:27'),
(6, 'K4', 'Kompetensi Problem Solving', 20, 'Maximum', 'Tipe Linier (Linear Criterion atau V-Shape)', 0.00, 10.00, '2020-07-08 09:22:16', '2020-07-23 19:24:53'),
(8, 'K6', 'Kemauan Untuk Meningkatkan Performance Pekerjaan', 10, 'Maximum', 'Tipe Linier (Linear Criterion atau V-Shape)', 0.00, 10.00, '2020-07-08 09:23:58', '2020-07-23 19:25:38'),
(11, 'K5', 'Tingkat Kepercayaan Diri Penerapan Dalam Pekerjaan', 15, 'Maximum', 'Tipe Linier (Linear Criterion atau V-Shape)', 0.00, 10.00, '2020-07-08 19:10:38', '2020-07-23 19:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `master_sertifs`
--

CREATE TABLE `master_sertifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `id_training` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2020_03_19_031925_create_employees_table', 1),
(3, '2020_04_12_100114_create_departments_table', 1),
(4, '2020_04_12_100324_create_positions_table', 1),
(5, '2020_04_12_100349_create_certifications_table', 1),
(6, '2020_04_12_100404_create_classifications_table', 1),
(7, '2020_04_12_100423_create_trainings_table', 1),
(8, '2020_04_12_101401_create_master_sertifs_table', 1),
(9, '2020_04_21_071657_create_skknis_table', 1),
(10, '2020_07_08_023836_create_kriterias_table', 1),
(11, '2020_07_08_043954_create_alternatifs_table', 1),
(12, '2020_07_08_044124_create_nilai_alternatifs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatifs`
--

CREATE TABLE `nilai_alternatifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED NOT NULL,
  `c1` int(11) DEFAULT NULL,
  `c2` int(11) DEFAULT NULL,
  `c3` int(11) DEFAULT NULL,
  `c4` int(11) DEFAULT NULL,
  `c5` int(11) DEFAULT NULL,
  `c6` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatifs_2`
--

CREATE TABLE `nilai_alternatifs_2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED NOT NULL,
  `id_kriteria` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_alternatifs_2`
--

INSERT INTO `nilai_alternatifs_2` (`id`, `id_alternatif`, `id_kriteria`, `nilai`, `created_at`, `updated_at`) VALUES
(137, 62, 3, 80, '2020-08-12 11:34:52', '2020-08-12 11:36:03'),
(138, 62, 4, 69, '2020-08-12 11:34:52', '2020-08-12 11:36:12'),
(139, 62, 5, 70, '2020-08-12 11:34:52', '2020-08-12 11:37:44'),
(140, 62, 6, 82, '2020-08-12 11:34:52', '2020-08-12 11:37:53'),
(141, 62, 11, 90, '2020-08-12 11:34:52', '2020-08-12 11:38:01'),
(142, 62, 8, 85, '2020-08-12 11:34:52', '2020-08-12 11:38:09'),
(143, 63, 3, 90, '2020-08-12 11:35:06', '2020-08-12 11:38:20'),
(144, 63, 4, 70, '2020-08-12 11:35:06', '2020-08-12 11:38:28'),
(145, 63, 5, 83, '2020-08-12 11:35:06', '2020-08-12 11:38:46'),
(146, 63, 6, 63, '2020-08-12 11:35:06', '2020-08-12 11:38:56'),
(147, 63, 11, 70, '2020-08-12 11:35:06', '2020-08-12 11:39:07'),
(148, 63, 8, 95, '2020-08-12 11:35:06', '2020-08-12 11:39:17'),
(149, 64, 3, 50, '2020-08-12 11:35:18', '2020-08-12 11:39:35'),
(150, 64, 4, 83, '2020-08-12 11:35:18', '2020-08-12 11:39:45'),
(151, 64, 5, 60, '2020-08-12 11:35:18', '2020-08-12 11:39:54'),
(152, 64, 6, 76, '2020-08-12 11:35:18', '2020-08-12 11:40:04'),
(153, 64, 11, 85, '2020-08-12 11:35:18', '2020-08-12 11:40:16'),
(154, 64, 8, 40, '2020-08-12 11:35:18', '2020-08-12 11:40:33'),
(155, 65, 3, 65, '2020-08-12 11:35:28', '2020-08-12 11:40:53'),
(156, 65, 4, 75, '2020-08-12 11:35:28', '2020-08-12 11:41:02'),
(157, 65, 5, 80, '2020-08-12 11:35:28', '2020-08-12 11:41:13'),
(158, 65, 6, 75, '2020-08-12 11:35:28', '2020-08-12 11:41:54'),
(159, 65, 11, 90, '2020-08-12 11:35:28', '2020-08-12 11:42:02'),
(160, 65, 8, 85, '2020-08-12 11:35:28', '2020-08-12 11:42:11'),
(161, 66, 3, 86, '2020-08-12 11:35:39', '2020-08-12 11:42:23'),
(162, 66, 4, 74, '2020-08-12 11:35:39', '2020-08-12 11:42:31'),
(163, 66, 5, 66, '2020-08-12 11:35:39', '2020-08-12 11:42:38'),
(164, 66, 6, 87, '2020-08-12 11:35:39', '2020-08-12 11:42:46'),
(165, 66, 11, 50, '2020-08-12 11:35:39', '2020-08-12 11:42:55'),
(166, 66, 8, 73, '2020-08-12 11:35:39', '2020-08-12 11:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `nama_posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promethees`
--

CREATE TABLE `promethees` (
  `id` bigint(11) NOT NULL,
  `id_nilai_alt` bigint(11) NOT NULL,
  `id_alternatif` bigint(11) NOT NULL,
  `id_kriteria` bigint(11) NOT NULL,
  `leaving_flow` double NOT NULL,
  `entering_flow` double NOT NULL,
  `net_flow` double NOT NULL,
  `rank` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skknis`
--

CREATE TABLE `skknis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cnc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelatihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `kriteria` enum('I','P','S') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_training` int(11) NOT NULL,
  `nama_training` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_klasifikasi` int(11) NOT NULL,
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_retype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Admin','Karyawan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Karyawan',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `password_retype`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@sbi', NULL, '$2y$10$bv02QsV.FCq2V0MLvLqFE.Sf97lB6I5xykwGMHaqXkRkq.U/GWGba', '$2y$10$yf87/.rTYDrYIiJltc3B5OZ4KutnlbNrDLIXzpUnKNCCZQiG2sXiS', 'Admin', NULL, '2020-07-08 00:11:06', '2020-08-12 08:07:18'),
(4, 'Sigit', 'sigit@gmail.com', NULL, NULL, NULL, 'Karyawan', NULL, '2020-07-08 04:09:15', '2020-07-08 04:09:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_id_user_foreign` (`id_user`);

--
-- Indexes for table `hasil_perhitungans`
--
ALTER TABLE `hasil_perhitungans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_sertifs`
--
ALTER TABLE `master_sertifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatifs`
--
ALTER TABLE `nilai_alternatifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif.nilai_alternatifs_fk_alternatifs.id` (`id_alternatif`) USING BTREE;

--
-- Indexes for table `nilai_alternatifs_2`
--
ALTER TABLE `nilai_alternatifs_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promethees`
--
ALTER TABLE `promethees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skknis`
--
ALTER TABLE `skknis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` bigint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hasil_perhitungans`
--
ALTER TABLE `hasil_perhitungans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `master_sertifs`
--
ALTER TABLE `master_sertifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nilai_alternatifs`
--
ALTER TABLE `nilai_alternatifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nilai_alternatifs_2`
--
ALTER TABLE `nilai_alternatifs_2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promethees`
--
ALTER TABLE `promethees`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skknis`
--
ALTER TABLE `skknis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `nilai_alternatifs`
--
ALTER TABLE `nilai_alternatifs`
  ADD CONSTRAINT `id_alternatif.nilai_alternatifs_fk_alternatifs.id	` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
