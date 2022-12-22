-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 01:41 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perjalanan_dinas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_perdins_tb`
--

CREATE TABLE `approved_perdins_tb` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Kota_awal` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_tujuan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `comment` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_perdins` int(20) DEFAULT NULL,
  `jarak` int(20) DEFAULT NULL,
  `duration` int(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approved_perdins_tb`
--

INSERT INTO `approved_perdins_tb` (`id`, `nama`, `Kota_awal`, `kota_tujuan`, `tanggal_awal`, `tanggal_akhir`, `comment`, `money_perdins`, `jarak`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Naruto', 'Palembang', 'Sleman', '2022-12-01', '2022-12-30', 'Pusdiklat antar daerah', 8700000, 623, NULL, NULL, NULL),
(2, 'Kakashi', 'Palembang', 'Sleman', '2022-12-10', '2022-12-24', 'Pusdiklat antar daerah', 4200000, 623, NULL, NULL, NULL),
(3, 'Kakashi', 'Palembang', 'Sleman', '2022-12-10', '2022-12-24', 'Pusdiklat antar daerah', 4200000, 623, NULL, NULL, NULL),
(4, 'Kakashi', 'Palembang', 'Sleman', '2022-12-10', '2022-12-24', 'Pusdiklat antar daerah', 4200000, 623, NULL, NULL, NULL),
(5, 'Kakashi', 'Palembang', 'Sleman', '2022-12-10', '2022-12-24', 'Pusdiklat antar daerah', 4200000, 623, NULL, NULL, NULL);

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_11_18_121554_create_approved_perdins_tb', 1),
(11, '2022_11_24_075344_create_tb_perdins_table', 2),
(12, '2022_11_24_091452_add_class_user_id_to_tb_perdins_table', 3);

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
-- Table structure for table `role_user_tb`
--

CREATE TABLE `role_user_tb` (
  `role_id` tinyint(1) NOT NULL,
  `role_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_user_tb`
--

INSERT INTO `role_user_tb` (`role_id`, `role_name`) VALUES
(0, 'user'),
(1, 'sdm');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perdins`
--

CREATE TABLE `tb_perdins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `distance` float DEFAULT NULL,
  `amount` int(20) DEFAULT NULL,
  `departure_date` date NOT NULL,
  `return_date` date NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hometown` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_perdins`
--

INSERT INTO `tb_perdins` (`id`, `user_id`, `distance`, `amount`, `departure_date`, `return_date`, `duration`, `hometown`, `destination_town`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 19, NULL, NULL, '2022-12-02', '2022-12-31', '29 Hari', 'Pariaman', 'Palembang', 'Pusdiklat antar Kota', 'Reject', NULL, NULL),
(2, 19, NULL, NULL, '2022-12-01', '2022-12-16', '15 Hari', 'Bandung', 'Sleman', 'Pusdiklat antar provinsi', 'Reject', NULL, NULL),
(3, 20, NULL, NULL, '2022-12-02', '2022-12-24', '22 Hari', 'Pariaman', 'Palembang', 'Pusdiklat antar provinsi', 'Approve', NULL, NULL),
(4, 19, NULL, NULL, '2022-12-10', '2022-12-17', '7 Hari', 'Bandung', 'Sleman', 'Pusdiklat antar daerah', 'Reject', NULL, NULL),
(5, 19, NULL, NULL, '2022-12-02', '2022-12-10', '8 Hari', 'sinombung', 'Palembang', 'Pusdiklat antar provinsi', 'Reject', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `town_tb`
--

CREATE TABLE `town_tb` (
  `id` int(11) NOT NULL,
  `name_town` varchar(255) NOT NULL,
  `province_town` varchar(255) NOT NULL,
  `island_town` varchar(30) NOT NULL,
  `abroad` varchar(12) NOT NULL,
  `latitude` double NOT NULL,
  `longtitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `town_tb`
--

INSERT INTO `town_tb` (`id`, `name_town`, `province_town`, `island_town`, `abroad`, `latitude`, `longtitude`) VALUES
(1, 'Palembang', 'Sumatra Selatan', 'Sumatra', 'Tidak', -2.985137294333543, 104.7464797220342),
(2, 'Sleman', 'Yogyakarta', 'Jawa', 'Tidak', -7.712141330786474, 110.33559192147068),
(3, 'Bandung', 'Jawa Barat', 'Jawa', 'Tidak', -6.9056578, 107.5456486),
(5, 'Pariaman', 'Sumatra Barat', 'Sumatra', 'Tidak', -6.91980404315052, 110.33559192147068),
(8, 'sinombung', 'Medan', 'Sumatra', 'Tidak', -6.9198040431505, 107.62255494174);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Joko', 'joko@gmail.com', NULL, '$2y$10$aBEp7hk3WV3GQoENiM0akOvsPnKzxTaPUxkCyywHcuAQYT8cuHcBe', 1, NULL, '2022-12-02 05:10:19', '2022-12-02 05:10:19'),
(12, 'hana', 'hana@gmail.com', NULL, '$2y$10$2PDmReVLs8x9kwb4z5u.eeOiK/Hgs5.F5e1YKdjUcP1UjPfTJ932C', 1, NULL, '2022-12-03 03:30:05', '2022-12-03 03:30:05'),
(19, 'Naruto', 'rasengan@gmail.com', NULL, '$2y$10$7ToEVh9JOOugOIB1UHj80Of9z3oAtgnHUSthc3I1jYYsdmB9zg6CK', 0, NULL, '2022-12-17 03:05:55', '2022-12-17 03:05:55'),
(20, 'pocong', 'pocong@gmail.com', NULL, '$2y$10$ohM8qAhmXEilCQ/4APKGMuwPZFpr/Jl2MYy74T3V6SuHGJZDwQN9C', 0, NULL, '2022-12-17 04:07:51', '2022-12-17 04:07:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approved_perdins_tb`
--
ALTER TABLE `approved_perdins_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role_user_tb`
--
ALTER TABLE `role_user_tb`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_perdins`
--
ALTER TABLE `tb_perdins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `town_tb`
--
ALTER TABLE `town_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approved_perdins_tb`
--
ALTER TABLE `approved_perdins_tb`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_user_tb`
--
ALTER TABLE `role_user_tb`
  MODIFY `role_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_perdins`
--
ALTER TABLE `tb_perdins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `town_tb`
--
ALTER TABLE `town_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_perdins`
--
ALTER TABLE `tb_perdins`
  ADD CONSTRAINT `tb_perdins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `role_user_tb` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
