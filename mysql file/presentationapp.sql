-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2025 pada 06.42
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presentationapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tutorials`
--

CREATE TABLE `detail_tutorials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_tutorial_id` bigint(20) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` enum('show','hide') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_tutorials`
--

INSERT INTO `detail_tutorials` (`id`, `master_tutorial_id`, `text`, `gambar`, `code`, `url`, `order`, `status`, `created_at`, `updated_at`) VALUES
(22, 5, 'Start module apache pada XAMPP', 'tutorial-images/insZuh7JwHGTHDGZ5Mz34y5eQVnrKmH9ddlYS4gz.webp', NULL, NULL, 1, 'show', '2025-04-24 20:58:11', '2025-04-24 20:58:11'),
(23, 5, 'Buat folder baru bernama “latihan” pada direktori C:/xampp/htdocs', 'tutorial-images/tmOJYxG6tp7T5vnUruYem6ncQffnvBxxrECjnpwu.webp', NULL, NULL, 2, 'show', '2025-04-24 20:58:39', '2025-04-24 20:58:39'),
(24, 5, 'Buka folder latihan tersebut pada VS Code. Di dalam folder latihan buat file baru bernama “hello.php” kemudian isi dengan code', 'tutorial-images/o9VvY3tmXClR4jdl3mS9QvHBK5cdBdGwZRzIHgaH.webp', '<?php\r\necho \"Hello World!\";\r\n?>', NULL, 3, 'show', '2025-04-24 20:59:14', '2025-04-24 20:59:14'),
(25, 5, 'Lihat hasilnya pada browser dengan mengakses url', 'tutorial-images/8l5vg6G9fUibFmVrg5n5QGJR6pAcJ7cadLkSUjIf.webp', NULL, 'http://localhost/latihan/hello.php', 4, 'hide', '2025-04-24 21:00:13', '2025-04-24 21:00:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `master_tutorials`
--

CREATE TABLE `master_tutorials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kode_matkul` varchar(255) NOT NULL,
  `url_presentation` varchar(255) DEFAULT NULL,
  `url_finished` varchar(255) DEFAULT NULL,
  `creator_email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_tutorials`
--

INSERT INTO `master_tutorials` (`id`, `judul`, `kode_matkul`, `url_presentation`, `url_finished`, `creator_email`, `created_at`, `updated_at`) VALUES
(5, 'Create PHP For Newbie', 'A11.54314', 'http://localhost:8080/presentation/hello-world-dengan-php-0456b46e-4e33-489a-9c1c-30dd9349c374-25a6e6f5-8477-4077-ac57-22f637ad71cf', 'http://localhost:8080/finished/hello-world-dengan-php-17455472097XcS9-17455476813SGLf', 'aprilyani.safitri@gmail.com', '2025-04-24 18:49:56', '2025-04-24 19:21:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_23_052419_create_master_tutorials_table', 2),
(5, '2025_04_23_201311_create_detail_tutorials_table', 3),
(6, '2025_04_23_222602_alter_nullable_columns_in_detail_tutorials_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IoQV7jkG5dm4qdJ35AHRD8sVRXXiDgW3jj6v8Z4o', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiUWVnMU5kSVlYOW1tOVdweUZWY1l2OGFlUjE0RmhlMzZ4UWdJZGxCaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODA4MC9NYXN0ZXJUdXRvcmlhbC81L0RldGFpbFR1dG9yaWFsIjt9czoxMjoicmVmcmVzaFRva2VuIjtzOjIyMDoiZXlKaGJHY2lPaUpJVXpJMU5pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SjFjMlZ5U1dRaU9qTTRMQ0p1WVcxbElqb2lRWEJ5YVd4NVlXNXBJaXdpWlcxaGFXd2lPaUpoY0hKcGJIbGhibWt1YzJGbWFYUnlhVUJuYldGcGJDNWpiMjBpTENKcFlYUWlPakUzTkRVMU5EUXlPRGdzSW1WNGNDSTZNVGMwTlRZek1EWTRPSDAubXlWOXR4cjRCSlVfejA0cWVQREJCaGZGU2U5MHd2amZCeVFjd0pUcmY4MCI7czoxMDoidXNlcl9lbWFpbCI7czoyNzoiYXByaWx5YW5pLnNhZml0cmlAZ21haWwuY29tIjt9', 1745555729),
('N9Q6wEWPA16kaH9qhwhl9gEVXjVO5SosJUR0ml9N', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHF1dHVmNUZaaG8wVmthZWYwR2sxSW1Ya1FseW9PUExDZnNrdXdLeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMxOiJodHRwOi8vbG9jYWxob3N0OjgwODAvcHJlc2VudGF0aW9uL2hlbGxvLXdvcmxkLWRlbmdhbi1waHAtMDQ1NmI0NmUtNGUzMy00ODlhLTljMWMtMzBkZDkzNDljMzc0LTI1YTZlNmY1LTg0NzctNDA3Ny1hYzU3LTIyZjYzN2FkNzFjZiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745555700);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `detail_tutorials`
--
ALTER TABLE `detail_tutorials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_tutorials_master_tutorial_id_foreign` (`master_tutorial_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_tutorials`
--
ALTER TABLE `master_tutorials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `master_tutorials_url_presentation_unique` (`url_presentation`),
  ADD UNIQUE KEY `master_tutorials_url_finished_unique` (`url_finished`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_tutorials`
--
ALTER TABLE `detail_tutorials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_tutorials`
--
ALTER TABLE `master_tutorials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_tutorials`
--
ALTER TABLE `detail_tutorials`
  ADD CONSTRAINT `detail_tutorials_master_tutorial_id_foreign` FOREIGN KEY (`master_tutorial_id`) REFERENCES `master_tutorials` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
