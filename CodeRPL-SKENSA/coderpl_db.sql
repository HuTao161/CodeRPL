-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2026 at 04:06 PM
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
-- Database: `coderpl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnis`
--

CREATE TABLE `alumnis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `tempat_pkl` varchar(255) NOT NULL,
  `industri_bekerja` varchar(255) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `testimoni` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumnis`
--

INSERT INTO `alumnis` (`id`, `nama`, `foto`, `tahun_lulus`, `tempat_pkl`, `industri_bekerja`, `posisi`, `testimoni`, `created_at`, `updated_at`) VALUES
(1, 'Ari Wibawa', NULL, '2023', 'PT. Teknologi Indonesia', 'Google Indonesia', 'Software Engineer', 'SMKN 1 Denpasar memberikan dasar yang kuat untuk karir di bidang IT.', '2026-01-18 04:53:26', '2026-01-18 04:53:26'),
(2, 'Sari Dewi', NULL, '2022', 'Startup Bali Tech', 'Tokopedia', 'Frontend Developer', 'Pengalaman PKL sangat membantu dalam memahami dunia kerja.', '2026-01-18 04:53:26', '2026-01-18 04:53:26'),
(3, 'Putu Adi', NULL, '2021', 'Bali Digital Studio', 'Traveloka', 'Backend Developer', 'Jurusan RPL memberikan skill yang dibutuhkan industri.', '2026-01-18 04:53:26', '2026-01-18 04:53:26'),
(4, 'Made Wijaya', NULL, '2020', 'PT. Solusi Digital', 'Bukalapak', 'Full Stack Developer', 'Dasar-dasar pemrograman dari sekolah sangat bermanfaat.', '2026-01-18 04:53:26', '2026-01-18 04:53:26'),
(5, 'Ketut Surya', NULL, '2019', 'Multimedia Bali', 'Shopee', 'Mobile Developer', 'Terima kasih kepada guru-guru RPL yang telah membimbing.', '2026-01-18 04:53:26', '2026-01-18 04:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industris`
--

CREATE TABLE `industris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_industri` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `bidang` enum('IT','Software House','Multimedia','Telekomunikasi','Startup','Lainnya') NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `kuota_pkl` int(11) NOT NULL,
  `kuota_terisi` int(11) NOT NULL DEFAULT 0,
  `deskripsi` text NOT NULL,
  `status` enum('tersedia','penuh') NOT NULL DEFAULT 'tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industris`
--

INSERT INTO `industris` (`id`, `nama_industri`, `logo`, `bidang`, `alamat`, `kontak`, `kuota_pkl`, `kuota_terisi`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PT. Teknologi Indonesia', NULL, 'Software House', 'Jl. Raya Puputan No. 123, Denpasar', '(0361) 123456', 10, 8, 'Perusahaan pengembangan software terkemuka di Bali.', 'tersedia', '2026-01-18 04:53:26', '2026-01-18 04:53:26'),
(2, 'Bali Digital Studio', NULL, 'Multimedia', 'Jl. Teuku Umar No. 45, Denpasar', 'bali@digitalstudio.com', 8, 8, 'Studio kreatif khusus multimedia dan animasi.', 'penuh', '2026-01-18 04:53:26', '2026-01-18 04:53:26'),
(3, 'Startup Bali Tech', NULL, 'Startup', 'Jl. Hayam Wuruk No. 67, Denpasar', 'info@balitech.com', 6, 4, 'Startup teknologi fokus pada solusi digital untuk pariwisata.', 'tersedia', '2026-01-18 04:53:26', '2026-01-18 04:53:26'),
(4, 'PT. Solusi Digital', NULL, 'IT', 'Jl. Gatot Subroto No. 89, Denpasar', '(0361) 987654', 12, 10, 'Provider solusi IT dan jaringan untuk perusahaan.', 'tersedia', '2026-01-18 04:53:26', '2026-01-18 04:53:26'),
(5, 'Multimedia Bali', NULL, 'Multimedia', 'Jl. Sudirman No. 101, Denpasar', 'contact@multimediabali.com', 5, 3, 'Spesialis produksi konten multimedia dan video.', 'tersedia', '2026-01-18 04:53:26', '2026-01-18 04:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_18_112449_create_alumnis_table', 1),
(5, '2026_01_18_112451_create_industris_table', 1),
(6, '2026_01_18_112452_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','siswa') NOT NULL DEFAULT 'siswa',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin CodeRPL', 'admin@coderpl.sch.id', NULL, '$2y$12$AS4GKaEcP3XjCB3h.V17FeydNgH6zXJvNoC9FGtBzLIEOykTeNHe.', 'admin', NULL, '2026-01-18 04:53:25', '2026-01-18 04:53:25'),
(2, 'Budi Santoso', 'budi@email.com', NULL, '$2y$12$YU856kOFXuDMQ8kmzQRTv.JpnhqqzOy4Yq47M2K/VQ77hhKIiS4we', 'siswa', NULL, '2026-01-18 04:53:26', '2026-01-18 04:53:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnis`
--
ALTER TABLE `alumnis`
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
-- Indexes for table `industris`
--
ALTER TABLE `industris`
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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industris`
--
ALTER TABLE `industris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
