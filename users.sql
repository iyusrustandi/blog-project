-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2024 pada 08.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-blog-project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','author','admin') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_picture`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'admin', 'admin@gmail.com', '1721549657.jpg', NULL, '$2y$12$3eod7kmYZzHobKsMAYba/.VJy0Y9keoK0Ay9eSEBRsK0q2yvdMLJO', 'admin', NULL, '2024-07-15 00:36:18', '2024-07-21 01:14:17'),
(19, 'Author1', 'author1@mail.com', NULL, NULL, '$2y$12$7VVtCPfB86TA38Gs2d90dOlSUSisWlDgRmyBG8VIoaWUlFFwrFSw6', 'author', NULL, '2024-07-21 01:17:01', '2024-07-21 01:17:01'),
(20, 'Author2', 'author2@mail.com', NULL, NULL, '$2y$12$D4nijV2U1Gn2N73R4X6lMe1S21fNwnARlxKL8Mmp8CkyKSe5n.9y.', 'author', NULL, '2024-07-21 01:17:43', '2024-07-21 01:17:43'),
(21, 'Author3', 'author3@mail.com', NULL, NULL, '$2y$12$11c3cq.GB6Em1QdhHVz/nuTdkEOL/gWUb96yD6zyXbrfytY0Bd9/e', 'author', NULL, '2024-07-21 01:18:44', '2024-07-21 01:18:44'),
(22, 'Author4', 'author4@mail.com', NULL, NULL, '$2y$12$uckK.NBbJX80v4KLTcHRX./ZedQKBOq/VJv1UfsS4wazZkar0PS5q', 'author', NULL, '2024-07-21 01:19:28', '2024-07-21 01:19:28'),
(23, 'Author5', 'author5@mail.com', NULL, NULL, '$2y$12$pL3mN18XtxxA4U.QA3QQdeboT1O4ENKGknNyqR2xZSk9rtWrTW7JS', 'author', NULL, '2024-07-21 01:20:14', '2024-07-21 01:20:14'),
(25, 'User1', 'user1@mail.com', NULL, NULL, '$2y$12$NMiudyPeIjRdufG7n2dGcOn6YqP8C8Rm2yazXBJuURSV7vwUTiQb2', 'user', NULL, '2024-07-21 01:22:42', '2024-07-21 01:22:42'),
(26, 'User2', 'user2@mail.com', NULL, NULL, '$2y$12$zpRGBpuL7ZanFQD5xzpU/Ou53hLoFyDjyJWJMD4R2RBos3HDq7tW.', 'user', NULL, '2024-07-21 01:25:21', '2024-07-21 01:25:21'),
(27, 'User3', 'user3@mail.com', NULL, NULL, '$2y$12$yA.x/BZDQfpLUsAOhgRGXuEWswNdOi8VLzEXrDjuNPzovGXWFvH6W', 'user', NULL, '2024-07-21 01:25:58', '2024-07-21 01:25:58'),
(28, 'User4', 'user4@mail.com', NULL, NULL, '$2y$12$6QokjqfLewUBE64IBPorWeYir4rF9frT/eubGgeV8jKVE/7HpoLDS', 'user', NULL, '2024-07-21 01:26:45', '2024-07-21 01:26:45'),
(29, 'User5', 'user5@mail.com', NULL, NULL, '$2y$12$745.//QWUGERNKpduN6.s./6zBv4hsVjeUGwkxlJ99m3dVUteQ9La', 'user', NULL, '2024-07-21 01:27:30', '2024-07-21 01:27:30');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
