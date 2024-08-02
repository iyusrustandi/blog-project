-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2024 pada 11.00
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
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('author1@gmail.com|127.0.0.1', 'i:1;', 1721201583),
('author1@gmail.com|127.0.0.1:timer', 'i:1721201582;', 1721201582),
('user1@mail.om|127.0.0.1', 'i:1;', 1721571292),
('user1@mail.om|127.0.0.1:timer', 'i:1721571292;', 1721571292);

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
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Programming', 'programming', NULL, '2024-07-10 00:27:52', '2024-07-12 18:41:39'),
(2, 'Car', 'car', NULL, '2024-07-10 01:07:54', '2024-07-12 18:41:51'),
(3, 'Tech', 'tech', NULL, '2024-07-10 01:08:03', '2024-07-12 18:42:09'),
(4, 'Category 4', 'Category 4', NULL, '2024-07-10 01:08:12', '2024-07-10 01:24:07'),
(9, 'Music', 'music', NULL, '2024-07-12 18:41:18', '2024-07-12 18:41:18'),
(10, 'Category2', 'category2', NULL, '2024-07-12 18:42:35', '2024-07-12 18:42:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2024_07_08_015650_create_posts_table', 2),
(5, '2024_07_08_020136_create_categories_table', 3),
(6, '2024_07_08_020143_create_tags_table', 3),
(7, '2024_07_08_020553_create_comments_table', 4),
(8, '2024_07_10_074043_add_profile_picture_to_users_table', 5),
(9, '2024_07_11_034120_add_author_and_created_to_posts_table', 6),
(10, '2024_07_11_034439_remove_created_from_posts_table', 7),
(11, '2024_07_11_035710_add_image_to_posts_table', 8),
(12, '2024_07_11_123020_add_slug_to_posts_table', 9),
(13, '2024_07_11_123615_remove_slug_from_posts_table', 10),
(14, '2024_07_12_023357_add_categories_to_posts_table', 11),
(15, '2024_07_12_025913_create_post_tag_table', 12),
(16, '2024_07_12_035627_add_tags_column_to_posts_table', 13),
(17, '2024_07_12_035746_drop_post_tag_table', 14),
(18, '2024_07_12_042948_add_tags_to_posts_table', 15),
(19, '2024_07_12_045100_remove_tags_from_posts_table', 16),
(20, '2024_07_12_051121_create_post_tag_table', 17),
(21, '2024_07_15_083652_add_slug_column_to_posts_table', 18),
(22, '2024_07_16_043331_add_color_to_categories_table', 19),
(23, '2024_07_18_042623_create_permission_tables', 20);

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
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `tag_id`, `author`, `content`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(73, 1, 'Create Slug With Javascript', 'create-slug-with-javascript', NULL, 'admin', '<p><strong>Use Title tag</strong></p>\r\n<p><br>use title tag on haed to create slug.<br>use Jquery CDN.</p>\r\n<p>&nbsp;</p>\r\n<pre class=\"language-markup\"><code>&lt;!DOCTYPE html&gt;\r\n&lt;html lang=\"en\"&gt;\r\n  &lt;head&gt;\r\n    &lt;meta charset=\"UTF-8\" /&gt;\r\n    &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" /&gt;\r\n    &lt;title&gt;HTML Javascript Slug&lt;/title&gt;\r\n    &lt;script src=\"https://code.jquery.com/jquery-3.7.1.js\"&gt;&lt;/script&gt;\r\n  &lt;/head&gt;\r\n  &lt;body&gt;\r\n    &lt;h1&gt;This is title page&lt;/h1&gt;\r\n\r\n    &lt;script&gt;\r\n      function convertToSlug(text) {\r\n        return text\r\n          .toLowerCase()\r\n          .replace(/ /g, \'-\')\r\n          .replace(/[^\\w-]+/g, \'\');\r\n      }\r\n\r\n      $(document).ready(function () {\r\n        const title = $(\'title\').text();\r\n        const slug = convertToSlug(title);\r\n\r\n        const currentPath = window.location.pathname.split(\'/\').slice(0, -1).join(\'/\');\r\n        const newUrl = `${window.location.protocol}//${window.location.host}${currentPath}/${slug}`;\r\n        window.history.replaceState({path: newUrl}, \'\', newUrl);\r\n\r\n        console.log(newUrl);\r\n      });\r\n    &lt;/script&gt;\r\n  &lt;/body&gt;\r\n&lt;/html&gt;</code></pre>\r\n<p>&nbsp;</p>\r\n<p><img title=\"html-js-slug-title-head.JPG\" src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/4QLmRXhpZgAATU0AKgAAAAgABAE7AAIAAAAJAAABSodpAAQAAAABAAABVJydAAEAAAASAAACzOocAAcAAAEMAAAAPgAAAAAc6gAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAASXl1c1J1c3QAAAAFkAMAAgAAABQAAAKikAQAAgAAABQAAAK2kpEAAgAAAAMyMgAAkpIAAgAAAAMyMgAA6hwABwAAAQwAAAGWAAAAABzqAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAyMDI0OjA3OjAzIDA5OjQxOjA2ADIwMjQ6MDc6MDMgMDk6NDE6MDYAAABJAHkAdQBzAFIAdQBzAHQAAAD/4QQbaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49J++7vycgaWQ9J1c1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCc/Pg0KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyI+PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj48cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0idXVpZDpmYWY1YmRkNS1iYTNkLTExZGEtYWQzMS1kMzNkNzUxODJmMWIiIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIvPjxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSJ1dWlkOmZhZjViZGQ1LWJhM2QtMTFkYS1hZDMxLWQzM2Q3NTE4MmYxYiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIj48eG1wOkNyZWF0ZURhdGU+MjAyNC0wNy0wM1QwOTo0MTowNi4yMjQ8L3htcDpDcmVhdGVEYXRlPjwvcmRmOkRlc2NyaXB0aW9uPjxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSJ1dWlkOmZhZjViZGQ1LWJhM2QtMTFkYS1hZDMxLWQzM2Q3NTE4MmYxYiIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIj48ZGM6Y3JlYXRvcj48cmRmOlNlcSB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPjxyZGY6bGk+SXl1c1J1c3Q8L3JkZjpsaT48L3JkZjpTZXE+DQoJCQk8L2RjOmNyZWF0b3I+PC9yZGY6RGVzY3JpcHRpb24+PC9yZGY6UkRGPjwveDp4bXBtZXRhPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw/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aZp4reGDbvkl3EAscAYUE9j2oAp0VstpCzabZm28vzmFy0km44dYwDx+GcVWt9HuLiCCZXiWOUSMWYnEapjczcdOe2SaAM+irt9prWVvbzi4guIrjd5bwlv4cZyCAR171SoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigDXoooqRl9dQWXTTZ3qGXyxm3kB+aM+nuvtVCiigAooooAKvtqCxaatpZIYvMGbiQn5pD6ey+1UKKACiiigArtZNf8ACviRobvxhb6tBqUcaRzz6Z5bLdhRgMwcja+AASMg9cVxVFAG/wCKfEUGty2lrpdmbDSdOiMVnbFtzAE5Z2buzHk/gKwKKKACqCH7PdndwM4/Cr9Q3EAmXI4YdDTA7HQNb0a78P8A/COeLBcR2aTG4s7+2UO9q7ABgVP3kbAJA5BFbWqeJ9C0qa/1LSdSuNe8QahAbf7fJafZYrVCuxiqZJLlRjPQZz7V5WHnt/lIOPcZFI13KwxkL9BRYCS9kBYIO3JqpS0lMR2sPj22HjBtdutHkdhpyWcKxXYSSB1iWMTI5jYBgFJHy8E9eM1QsvEek6X4usdcsNKvZTbSmeSK/wBQWYyy8lW3rEmMNhjkHOOormaKHq7h0t/Wmhqadq8Vm13c3Fo1zqMhSS1uzOym2lDhjJtHD5wRg+ua6O88eabdfbSvhsI2r3UNxq4N6StwEYOyRYUGJXfLHJcjjB4riKKO3kH9f1/XmdvY+PrG0Wwd/D4lm0a4ml0n/TD5cCuxdUlUoTKEc5BDIT3Nc/NrFq2oabe2+nGG4ttr3bm4Zzdyhyxk5HyZGBgccZrIoprR3X9f1179RNJpp9f6/rtsjY1nW4Na17VtTmsNr6hctcIvnE+TucsVzgbuDjOB61E+o2a24trWykjt3mWWdZLjezhc4UEKMDk9iefasyikkkrIptttvqa8etJZ+Qmm2zRxRymV1nl8wyEjbgkBQBtJHTPJ5pU1uK2aGOysylqpcyRSS72l3jawLADA28DjjrzWPRQI24tWto4f9HjaAWsTi2R23s0kmAWLAAcDpwOgqgt/jS47Py/uXBn37uuQBjH4dap0UAa11rKXkd8ktsw+03X2mMrLjy25GD8vzDB9qZeav9rfUW8jZ9ulWT7+dmCTjpz19qzKKLAa11rjXC3WyExNO8LhhJyhjUr6d859qlhvbiTTb661K9Nw0sAt4lluN8hO9WPy5JAAU8nisSigDevvEgu9OntY4J41mKEK1zujh2noibRtH4ntTJPEQl1OG6e02rHGwKJJht7Z3SBsHDZORwcYFYlFAG/N4jjnuYJZIr7dbxGNJlvyJslicl9vocYxUEutW155i3+n74/PaaJYJfK2bsblPynIOB2Bzn1rHooA1ItZ8q+024Fvn7CgXbv+/hmbrjj73v0q4dRsrbT9Jke3+0XNvG7LtnAVG8xiA64JPY4yK5+imBoyas0ljBGVkS5t5nljuI5NuNxBPGOuRwQR9KlsddkhuzdXr3tzcfKFlW7KNtGSUOQ2VPHHtWTRSA2I9eCNb7rRNkZn3ojbQyyjBVePlwOnWrFrq8Unk2NrZKtusUsbrPdqpdXwSd7AKCCoxx+Fc/RQBta7LbJY6fZWoUGASM6rMJtpYggF1AUnjtx0FYtFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAd3/AMK88Yf9C1qn/gK3+FH/AArzxh/0LWqf+Arf4V9h0VIz48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooA+PP+FeeMP8AoWtU/wDAVv8ACj/hXnjD/oWtU/8AAVv8K+w6KAPjz/hXnjD/AKFrVP8AwFb/AAo/4V54w/6FrVP/AAFb/CvsOigD48/4V54w/wCha1T/AMBW/wAKP+FeeMP+ha1T/wABW/wr7DooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi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XL6B8AbXQbXxHYReKNRbTNcjaNrRIkTaOdpZjksV3Hptz0IIr16ilbp5W+RV3+N/meQr4MT4SfAzxFYXHim9eBo5HS6gtFRrdnwo2KGySSQDl/ptrB0Pwl8erLQLCPS/GGhxWUVuggtpYkLKgUbVJ+znJx33H69692u7O21CzltL63iubaZSksMyB0dT1BB4IrBh8A6BbqI7ePUIrdRtFomq3Qtwv93yRJsx7bcU9W235fhcVkkkvP8AGxxuhWLfGz4SS2Xj61WC7hvZYPtFngDzIm2+bHnI9VPY8/hreB/hxq/hS0h0/VPGl7rOk2uBbWDWscSoB0DP8zsB2XcF7YxxXdWlnbWFnFa2NvFbW8K7Y4YkCqg9ABwKmp3s7r+vMVrqzCiiikMKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA//9k=\" alt=\"\" width=\"750\" height=\"159\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Use id</strong></p>\r\n<p>&nbsp;</p>\r\n<p>use id to create slug.<br>use Jquery CDN.</p>\r\n<p>&nbsp;</p>\r\n<pre class=\"language-markup\"><code>&lt;!DOCTYPE html&gt;\r\n&lt;html lang=\"en\"&gt;\r\n  &lt;head&gt;\r\n    &lt;meta charset=\"UTF-8\" /&gt;\r\n    &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" /&gt;\r\n    &lt;title&gt;HTML Javascript Slug&lt;/title&gt;\r\n    &lt;script src=\"https://code.jquery.com/jquery-3.7.1.js\"&gt;&lt;/script&gt;\r\n  &lt;/head&gt;\r\n  &lt;body&gt;\r\n    &lt;h1 id=\"slug-id\"&gt;This is title page&lt;/h1&gt;\r\n\r\n    &lt;script&gt;\r\n      function convertToSlug(text) {\r\n        return text\r\n          .toLowerCase()\r\n          .replace(/ /g, \'-\')\r\n          .replace(/[^\\w-]+/g, \'\');\r\n      }\r\n\r\n      $(document).ready(function () {\r\n        const title = $(\'#slug-id\').text();\r\n        const slug = convertToSlug(title);\r\n\r\n        const currentPath = window.location.pathname.split(\'/\').slice(0, -1).join(\'/\');\r\n        const newUrl = `${window.location.protocol}//${window.location.host}${currentPath}/${slug}`;\r\n        window.history.replaceState({path: newUrl}, \'\', newUrl);\r\n\r\n        console.log(newUrl);\r\n      });\r\n    &lt;/script&gt;\r\n  &lt;/body&gt;\r\n&lt;/html&gt;</code></pre>\r\n<p>&nbsp;</p>\r\n<p><img title=\"html-js-slug-id.JPG\" src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/4QLmRXhpZgAATU0AKgAAAAgABAE7AAIAAAAJAAABSodpAAQAAAABAAABVJydAAEAAAASAAACzOocAAcAAAEMAAAAPgAAAAAc6gAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAASXl1c1J1c3QAAAAFkAMAAgAAABQAAAKikAQAAgAAABQAAAK2kpEAAgAAAAM2MwAAkpIAAgAAAAM2MwAA6hwABwAAAQwAAAGWAAAAABzqAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAyMDI0OjA3OjAzIDA5OjU0OjEwADIwMjQ6MDc6MDMgMDk6NTQ6MTAAAABJAHkAdQBzAFIAdQBzAHQAAAD/4QQbaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49J++7vycgaWQ9J1c1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCc/Pg0KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyI+PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj48cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0idXVpZDpmYWY1YmRkNS1iYTNkLTExZGEtYWQzMS1kMzNkNzUxODJmMWIiIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIvPjxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSJ1dWlkOmZhZjViZGQ1LWJhM2QtMTFkYS1hZDMxLWQzM2Q3NTE4MmYxYiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIj48eG1wOkNyZWF0ZURhdGU+MjAyNC0wNy0wM1QwOTo1NDoxMC42Mjg8L3htcDpDcmVhdGVEYXRlPjwvcmRmOkRlc2NyaXB0aW9uPjxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSJ1dWlkOmZhZjViZGQ1LWJhM2QtMTFkYS1hZDMxLWQzM2Q3NTE4MmYxYiIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIj48ZGM6Y3JlYXRvcj48cmRmOlNlcSB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPjxyZGY6bGk+SXl1c1J1c3Q8L3JkZjpsaT48L3JkZjpTZXE+DQoJCQk8L2RjOmNyZWF0b3I+PC9yZGY6RGVzY3JpcHRpb24+PC9yZGY6UkRGPjwveDp4bXBtZXRhPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw/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RQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAf//Z\" alt=\"\" width=\"750\" height=\"173\"></p>\r\n<p>&nbsp;</p>', NULL, 14, '2024-07-21 01:55:38', '2024-07-21 01:55:38'),
(74, 3, 'Unveiling the Power of ASUS: A Look at Their Diverse Computing Solutions', 'unveiling-the-power-of-asus-a-look-at-their-diverse-computing-solutions', NULL, 'Author1', '<p>ASUS, a Taiwanese tech giant, has carved its niche in the world of computers by offering a compelling blend of innovation, performance, and design. From high-powered gaming rigs to portable workhorses and stylish everyday laptops, their diverse product portfolio caters to a wide range of users.</p>\r\n<p>&nbsp;</p>\r\n<p>One of the hallmarks of ASUS computers is their commitment to quality. They utilize robust materials and meticulous engineering to ensure their machines are built to last. Whether you\'re a student carrying your laptop around campus or a professional relying on it for demanding tasks, ASUS computers can withstand the daily wear and tear.</p>\r\n<p>&nbsp;</p>\r\n<p>Beyond durability, ASUS prioritizes performance. Their laptops and desktops are equipped with powerful processors, impressive graphics capabilities, and ample memory to handle even the most resource-intensive applications. This makes them ideal for gamers, creative professionals working with complex software, and anyone who needs a computer that can keep up with their fast-paced workflow.</p>\r\n<p>Of course, ASUS doesn\'t neglect aesthetics. Their laptops are known for their sleek and modern designs, often incorporating thin bezels, lightweight materials, and premium finishes. This focus on style ensures you have a device that not only performs well but also looks sharp, whether you\'re using it for work, school, or entertainment.</p>\r\n<p>&nbsp;</p>\r\n<p>For those who crave the ultimate flexibility, ASUS offers a range of convertible laptops. These innovative machines seamlessly transition between laptop and tablet mode, allowing you to adapt to any situation. Whether you\'re taking notes in class, sketching designs, or browsing the web on the couch, a convertible ASUS laptop provides the perfect balance of functionality and form.</p>\r\n<p>&nbsp;</p>\r\n<p>ASUS also recognizes the importance of a seamless user experience. Their laptops often boast comfortable keyboards, long-lasting batteries, and vibrant displays that make working or enjoying multimedia content a pleasure. Additionally, many ASUS laptops come pre-loaded with user-friendly features and software that enhance productivity and streamline daily tasks.</p>\r\n<p>&nbsp;</p>\r\n<p>Gamers, in particular, can rejoice with the ASUS Republic of Gamers (ROG) series. These high-performance laptops and desktops are specifically designed to deliver unparalleled gaming experiences. From powerful graphics cards and enhanced cooling systems to customizable lighting and dedicated gaming keys, ROG machines cater to even the most demanding gamers.</p>\r\n<p>&nbsp;</p>\r\n<p>In conclusion, ASUS computers offer a compelling proposition for anyone seeking a reliable, powerful, and stylish device. With their diverse range of options catering to different needs and budgets, ASUS continues to be a leading force in the ever-evolving world of computing.</p>', 'storage/posts/images/AeYuyn1jdy4wYJR1tuE2paqmDP20ywVhdAbyEOdz.jpg', 19, '2024-07-21 02:01:29', '2024-07-21 02:01:29'),
(75, 3, 'Powering Your World: A Look at Lenovo Computers', 'powering-your-world-a-look-at-lenovo-computers', NULL, 'Author1', '<p>Lenovo has become a household name in the tech world, and for good reason. They offer a vast range of computers, from sleek and stylish laptops to powerful workstations, catering to every need and budget. Whether you\'re a student, a creative professional, or a business on the go, there\'s a Lenovo computer that\'s perfect for you.</p>\r\n<p>&nbsp;</p>\r\n<p>One of Lenovo\'s biggest strengths is their commitment to innovation. They\'re constantly pushing the boundaries of technology, integrating cutting-edge features like artificial intelligence and next-gen processors into their machines. This focus on the future ensures that you\'re getting a computer that can handle your needs today and well into tomorrow.</p>\r\n<p>&nbsp;</p>\r\n<p>But it\'s not just about raw power. Lenovo also understands the importance of design and user experience. Their laptops are known for their comfortable keyboards, long battery life, and stunning displays. They even have a line of convertible laptops, like the Yoga series, which can transform from laptop to tablet mode, giving you ultimate flexibility in how you use your device.</p>\r\n<p>&nbsp;</p>\r\n<p>So, if you\'re looking for a reliable, powerful, and innovative computer, look no further than Lenovo. With their wide range of options and commitment to quality, you\'re sure to find the perfect machine to fit your needs and lifestyle.</p>', 'storage/posts/images/8Ydp8DaB50UOuZPy6A28ZYOINgK4iJxETxclY2Du.jpg', 19, '2024-07-21 02:03:04', '2024-07-21 02:03:04');
INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `tag_id`, `author`, `content`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(76, 9, 'The Enduring Allure of Gibson Guitars', 'the-enduring-allure-of-gibson-guitars', NULL, 'Author2', '<p>Gibson guitars have been synonymous with rock and roll royalty for decades. From the wailing solos of Slash to the bluesy riffs of Jimmy Page, these instruments have soundtracked countless legendary performances. But what makes a Gibson so special?</p>\r\n<p>&nbsp;</p>\r\n<p>Firstly, Gibson\'s craftsmanship is unmatched. Founded in 1894, the company has a long history of meticulous guitar making. Many models, like the Les Paul and the SG, are instantly recognizable for their classic designs and beautiful wood finishes. Owning a Gibson is like owning a piece of musical history.</p>\r\n<p>&nbsp;</p>\r\n<p>More importantly, though, Gibson guitars deliver a sound unlike any other. Their unique blend of woods and pickups creates a rich, resonant tone that cuts through the mix. Whether you\'re dialing in warm cleans or searing distortion, a Gibson responds with an undeniable sonic personality. It\'s no wonder that musicians across genres continue to reach for these iconic instruments.</p>', 'storage/posts/images/GCBod8tekOmZ9yzjzx9UKbQpUHXpWLJ3OtVC2hNq.jpg', 20, '2024-07-21 02:06:06', '2024-07-21 02:06:06'),
(77, 9, 'Fender: The Sound That Shaped Music History', 'fender-the-sound-that-shaped-music-history', NULL, 'Author2', '<p>Fender guitars are more than just instruments &ndash; they\'re cultural icons. Their instantly recognizable silhouettes and timeless sound have been a driving force in shaping music for over 70 years. From the twangy beginnings of country to the face-melting riffs of heavy metal, Fenders have been there, in the hands of legends like Jimi Hendrix and Eric Clapton.</p>\r\n<p>&nbsp;</p>\r\n<p>But what\'s the secret sauce behind Fender\'s enduring popularity? Innovation is a big part of it. Founder Leo Fender revolutionized guitar design with his focus on practicality and accessibility. &nbsp;His solid-body electric guitars, like the Telecaster and the Stratocaster, were built to withstand the rigors of the stage, while their lightweight construction made them perfect for all-night gigs. &nbsp;Fender also pioneered the use of the bolt-on neck, allowing for easier repairs and customization &ndash; a feature that continues to be a hallmark of their instruments today.</p>\r\n<p>&nbsp;</p>\r\n<p>Beyond innovation, Fender guitars are renowned for their versatility. Their bright, clear tones are perfect for clean passages and intricate picking, while their ability to handle distortion makes them ideal for heavy riffs and soaring solos. This sonic adaptability allows players across genres to find their own voice with a Fender. &nbsp;Whether you\'re a country twanger, a blues bender, or a headbanging metalhead, there\'s a Fender out there waiting to unleash your musical creativity.</p>', 'storage/posts/images/8lNOzVxhapd9JrgyQnuIy1IsZPo6uuzQP3O9gbvv.jpg', 20, '2024-07-21 02:07:04', '2024-07-21 02:07:04'),
(78, 9, 'Ibanez: Shredding Machines for the Modern Guitarist', 'ibanez-shredding-machines-for-the-modern-guitarist', NULL, 'Author3', '<p>Ibanez guitars have carved out a unique space in the world of electric instruments. Known for their sleek designs, shred-ready playability, and innovative features, they\'ve become the go-to axe for countless guitarists in the rock and metal scene. &nbsp;But Ibanez\'s appeal goes beyond just high-octane shredding.</p>\r\n<p>&nbsp;</p>\r\n<p>One of Ibanez\'s biggest strengths is their commitment to pushing boundaries. Unlike the traditional designs of Fenders and Gibsons, Ibanez guitars often feature a more \"superstrat\" aesthetic, with sharp angles, pointed headstocks, and innovative hardware like the Floyd Rose tremolo system. This focus on form and function creates instruments that are not just visually stunning but also built to handle the demands of aggressive playing. &nbsp;The thin, fast necks and high-output pickups are perfect for shredding and intricate soloing, while the tremolo systems allow for wild pitch manipulation and divebombs.</p>\r\n<p>&nbsp;</p>\r\n<p>Beyond metal, Ibanez offers a surprising amount of versatility. Many models come equipped with coil-splitting switches, which essentially turn humbucker pickups into single-coils. This allows players to achieve a wider range of tones, from thick, distorted humbucker sounds to bright and twangy single-coil territory. Additionally, Ibanez offers a wide range of guitar lines, from the affordable GIO series for beginners to the high-end Prestige models favored by professional musicians.</p>\r\n<p>&nbsp;</p>\r\n<p>So, whether you\'re a metalhead looking to unleash sonic fury or a more versatile player seeking an instrument that can handle a variety of styles, Ibanez guitars are definitely worth exploring. &nbsp;Their unique blend of cutting-edge design, player-friendly features, and surprising tonal range has made them a favorite among musicians for decades, and that legacy continues to inspire shredders and riff-makers of today.</p>', 'storage/posts/images/mtyrcNPiGK6Z8HAJ5fwVjGcpBI4aeUeB2BZGpxbx.jpg', 21, '2024-07-21 02:10:36', '2024-07-21 02:10:36'),
(79, 9, 'Schecter Guitars: Shred-Worthy Quality Without Breaking the Bank', 'schecter-guitars-shred-worthy-quality-without-breaking-the-bank', NULL, 'Author3', '<p>Schecter guitars have become a force to be reckoned with in the instrument world. Often overshadowed by the giants like Gibson and Fender, Schecter offers a unique combination of high-performance features, exceptional build quality, and a price tag that won\'t break the bank. This makes them a compelling option for guitarists of all levels, particularly those drawn to hard rock and metal.</p>\r\n<p>&nbsp;</p>\r\n<p>Schecter\'s roots lie in crafting high-quality guitar parts. This tradition of meticulous construction translates into their finished instruments. Schecter guitars boast solid construction with premium woods like mahogany and maple. They feature comfortable necks with smooth playability, perfect for shredding and intricate riffs. Additionally, Schecter equips many models with top-notch hardware, including EMG pickups known for their powerful and aggressive tones, and Floyd Rose tremolo systems for wild vibrato effects.</p>\r\n<p>&nbsp;</p>\r\n<p>But Schecter isn\'t just about shred. Their diverse lineup caters to a range of musical styles. From the classic curves of the Sun Valley Super Shredder to the sleek, modern contours of the Omen series, Schecter offers guitars with aesthetics to match any player\'s taste. &nbsp;Their pickups often come with coil-splitting options, allowing guitarists to achieve both thick distortion and sparkling cleans on a single instrument. This versatility makes Schecter guitars a great choice for players who dabble in various genres.</p>\r\n<p>&nbsp;</p>\r\n<p>Perhaps the most appealing aspect of Schecter guitars is their value proposition. Compared to some of their more established competitors, Schecter offers instruments with similar quality and features at a significantly lower price point. This makes them a fantastic option for beginner and intermediate guitarists seeking a professional-grade instrument without the hefty price tag.</p>\r\n<p>&nbsp;</p>\r\n<p>Whether you\'re a seasoned shredder or an aspiring musician looking for a versatile powerhouse guitar, Schecter offers a compelling option. &nbsp;Their commitment to quality, diverse lineup, and budget-friendly pricing make them a brand worth considering for any guitarist looking to take their playing to the next level.</p>', 'storage/posts/images/v1fFc9FykkyF5KexJpXop3l4XaxSqMS4ZqQSh3NS.jpg', 21, '2024-07-21 02:11:38', '2024-07-21 02:11:38'),
(80, 9, 'Jackson Guitars: Built for Speed and Aggression', 'jackson-guitars-built-for-speed-and-aggression', NULL, 'Author4', '<p>Jackson guitars are synonymous with shredding and high-octane rock. Their distinctive \"pointed\" designs and focus on playability have made them the weapon of choice for metal guitarists and shredders for decades. But what exactly makes a Jackson tick?</p>\r\n<p>&nbsp;</p>\r\n<p>Firstly, Jackson guitars are built for speed. Their necks are typically thin and fast, ideal for lightning-quick runs and intricate solos. They often feature high-output humbucker pickups that deliver a searing, aggressive tone that cuts through the mix perfectly. Additionally, many Jackson models come equipped with Floyd Rose tremolo systems, allowing for divebombs, squeals, and other dramatic pitch effects that are essential for metal music.</p>\r\n<p>&nbsp;</p>\r\n<p>Jackson doesn\'t just cater to metalheads, though. Their guitars offer surprising versatility. &nbsp;Many models feature coil-splitting switches, transforming humbuckers into single-coils for brighter, cleaner tones. This allows players to explore a wider sonic palette, venturing beyond heavy distortion into bluesy territory or even achieving sparkly cleans. &nbsp;Jackson also offers a variety of models beyond the pointy-bodied shredders, with more traditional designs like the Soloist appealing to guitarists who prefer a sleeker aesthetic. So, if you\'re looking for a guitar built for speed and aggression but with hidden depths, a Jackson might be the perfect axe for you.</p>', 'storage/posts/images/tkmQPgpKIibwFj7v6Cw2YhNG3zeoUSeE1HX2oZFH.jpg', 22, '2024-07-21 02:13:05', '2024-07-21 02:13:05'),
(81, 9, 'Martin Guitars: A Legacy Etched in Tonewood', 'martin-guitars-a-legacy-etched-in-tonewood', NULL, 'Author4', '<p>C.F. Martin &amp; Co. isn\'t just a guitar brand; it\'s a cornerstone of American musical heritage. Founded in 1833, Martin guitars have soundtracked centuries of music, gracing the stages and studios of countless legends. But what exactly makes a Martin so special? Let\'s delve into the world of these revered instruments and explore the reasons behind their enduring legacy.</p>\r\n<p>&nbsp;</p>\r\n<p>Firstly, Martin guitars are synonymous with unparalleled craftsmanship. Each instrument is meticulously handmade in Nazareth, Pennsylvania, using time-honored techniques passed down through generations. &nbsp;The finest tonewoods, like aged Sitka spruce for the tops and rich mahogany for the back and sides, are carefully selected and married together to create resonant masterpieces. This dedication to quality ensures that a Martin guitar is not just an instrument; it\'s an heirloom to be cherished for generations.</p>\r\n<p>&nbsp;</p>\r\n<p>Beyond craftsmanship, Martin guitars are renowned for their distinctive sound. Often described as warm, rich, and complex, Martin\'s signature tone has been a cornerstone of countless genres. From the fingerpicking intimacy of folk music to the booming strumming of bluegrass, Martins have the sonic versatility to adapt to any musical style. &nbsp;The iconic Dreadnought body shape, a Martin innovation, projects powerfully, making it a favorite for stage performances and cutting through a band mix. Owning a Martin guitar is like owning a piece of musical history, a connection to the countless artists who have shaped the soundscape with these instruments.</p>\r\n<p>&nbsp;</p>\r\n<p>The playability of a Martin guitar is another key aspect of its enduring appeal. The necks are known for their comfortable C-shape profile, perfect for both strumming and intricate fingerpicking. &nbsp;The action, the distance between the strings and the fretboard, is typically set up to be low and responsive, allowing for effortless playing. Whether you\'re a seasoned professional or a budding musician, a Martin guitar offers a playing experience that inspires creativity and encourages you to reach your full potential.</p>\r\n<p>&nbsp;</p>\r\n<p>Martin guitars come at a premium price point, reflecting the quality materials, meticulous construction, and rich heritage behind each instrument. However, for many guitarists, the investment is well worth it. &nbsp;A Martin guitar is not just an instrument; it\'s a lifelong companion, promising years of musical exploration and sonic satisfaction. It\'s an investment in quality, tone, and a legacy that continues to inspire generations of musicians.</p>', 'storage/posts/images/PdUWac5I3y3JEusohv3NVU7oGKNR77iyutsMndS8.jpg', 22, '2024-07-21 02:13:59', '2024-07-21 02:13:59'),
(82, 9, 'Taylor Guitars: The Modern Mastermind of Acoustic Innovation', 'taylor-guitars-the-modern-mastermind-of-acoustic-innovation', NULL, 'Author5', '<p>In the realm of acoustic guitars, Taylor Guitars stands out as a champion of innovation and player-centric design. Founded in 1974 by Bob Taylor and Kurt Listug, the company has carved a distinct niche in a market dominated by tradition. &nbsp;Unlike established brands like Martin, Taylor isn\'t afraid to push boundaries and embrace modern techniques, resulting in instruments known for their playability, sonic versatility, and forward-thinking features.</p>\r\n<p>&nbsp;</p>\r\n<p>A core tenet of Taylor\'s philosophy is the unwavering focus on player comfort. Their necks, often featuring a comfortable \"carved\" profile, are a revelation for guitarists of all skill levels. Combined with their patented neck relief system, Taylor guitars offer a low action, minimizing the effort required to fret notes and creating a smooth, effortless playing experience. This focus on playability extends to the body design as well. &nbsp;Many Taylor models feature unique ergonomic features like the patented \"cutaway,\" which allows for easier access to the higher frets, perfect for lead guitarists and soloists.</p>\r\n<p>&nbsp;</p>\r\n<p>While playability is a major focus, Taylor doesn\'t compromise on tone. Their innovative bracing systems, like the patented \"V-Class\" bracing, optimize the top\'s vibration, resulting in a rich, powerful sound with exceptional sustain. This translates to a guitar that projects beautifully when strumming and responds with clarity and articulation to fingerstyle playing. &nbsp;Taylor guitars are known for a brighter, more articulate sound compared to the warmer tones of traditional brands. This makes them ideal for a wider range of genres, from fingerstyle pop and percussive strumming to the intricate picking patterns of contemporary acoustic music.</p>\r\n<p>&nbsp;</p>\r\n<p>Beyond core features, Taylor offers a staggering array of customization options through their Build-to-Order program. Players can choose from a vast selection of tonewoods, body shapes, and appointments, allowing them to create a truly unique instrument that perfectly reflects their musical style and preferences. This level of customization caters to both seasoned players seeking a specific sonic palette and beginners who can personalize their first guitar, fostering a deeper connection with the instrument.</p>\r\n<p>&nbsp;</p>\r\n<p>Taylor\'s commitment to sustainability is another noteworthy aspect. They source their tonewoods from responsibly managed forests and utilize innovative manufacturing processes that minimize waste. This commitment to environmental responsibility resonates with eco-conscious musicians who appreciate quality instruments built with a focus on the future.</p>\r\n<p>&nbsp;</p>\r\n<p>While some might argue that Taylor guitars lack the traditional charm of established brands, their innovative spirit and focus on player experience have undeniably captured the hearts of countless musicians. &nbsp;Whether you\'re a seasoned professional or a budding guitarist looking for a comfortable, versatile, and endlessly customizable instrument, Taylor guitars offer a compelling proposition for the modern musician seeking to push the boundaries of acoustic music. &nbsp;So, the next time you\'re considering an acoustic guitar, don\'t just look to the past; explore the future of acoustic innovation with Taylor.</p>', NULL, 23, '2024-07-21 02:15:31', '2024-07-21 02:15:31'),
(83, 9, 'Gretsch: Beyond the Flash, a Wellspring of Vintage Tone', 'gretsch-beyond-the-flash-a-wellspring-of-vintage-tone', NULL, 'Author5', '<p>Gretsch guitars might grab your attention first with their undeniable visual flair. From the gleaming chrome hardware to the vibrant finishes and distinctive body shapes, there\'s a certain rockabilly swagger inherent in a Gretsch. But beneath the flash lies a rich history, a unique sonic identity, and a surprising versatility that make these instruments much more than just a pretty face.</p>\r\n<p>&nbsp;</p>\r\n<p>Founded in 1860, Gretsch built its reputation on quality craftsmanship and a dedication to innovation. While their hollow-body and semi-hollow-body electric guitars are their bread and butter, their thinline acoustic offerings deserve a spotlight too. &nbsp;These acoustic Gretsches, often featuring single-cutaway designs and filter\'Tron pickups, are perfect for players who crave a distinct aesthetic and tonal character.</p>\r\n<p>&nbsp;</p>\r\n<p>The sound of a Gretsch acoustic is unlike any other. &nbsp;They possess a bright, twangy personality, perfect for genres like country, blues, and rockabilly. &nbsp;The lighter construction of the thinline body allows for a more resonant and lively sound compared to a traditional dreadnought. This makes them ideal for fingerstyle playing and intricate picking patterns, where the articulation of each note shines through.</p>\r\n<p>&nbsp;</p>\r\n<p>Beyond their signature twang, Gretsch acoustics offer surprising versatility. Many models come equipped with onboard electronics, allowing you to plug straight into an amplifier and take your sound to the stage. &nbsp;The filter\'Tron pickups, known for their punchy and clear character, translate beautifully to the acoustic realm, adding a touch of warmth and presence to your unplugged sound. Additionally, the smaller body size makes them comfortable to hold for extended playing sessions, a welcome feature for both seasoned performers and beginner guitarists.</p>\r\n<p>While Gretsch guitars might not be the first choice for traditional folk purists, their unique blend of style, tone, and playability has captivated a legion of musicians. From the legendary Chet Atkins to modern players like Brian Setzer, Gretsch acoustics have found a place in various musical landscapes.</p>\r\n<p>&nbsp;</p>\r\n<p>Owning a Gretsch acoustic is more than just acquiring an instrument; it\'s an entry into a world of vintage charm and sonic character. &nbsp;It\'s a statement piece that reflects your individuality and a guitar that inspires you to explore the fringes of the acoustic world. So, next time you\'re looking for an instrument that\'s as visually striking as it is sonically captivating, don\'t overlook the hidden depths of a Gretsch acoustic guitar.</p>', 'storage/posts/images/k7gyhfvis41NFcntyeu583GcoSn2Y4RN29Xu85RJ.jpg', 23, '2024-07-21 02:16:06', '2024-07-21 02:16:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('PAxu3opZeOt7lSVmf4Yei6c4O4ilkOlFGy8GyJEB', 14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTXc4VXhZdjBXVldFeEhSbGZWVDlnQVRGOWVreGVNVFBXVmNMdWg4dSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VycyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE0O30=', 1721639547);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tag1', 'Tag1', '2024-07-10 00:28:56', '2024-07-10 19:11:01'),
(2, 'Tag2', 'Tag2', '2024-07-10 01:13:18', '2024-07-10 01:14:05'),
(3, 'Tag3', 'Tag3', '2024-07-10 01:13:28', '2024-07-10 01:14:19'),
(4, 'Tag4', 'Tag4', '2024-07-10 01:14:31', '2024-07-10 01:14:31'),
(6, 'Tag6', 'tag6', '2024-07-10 01:14:54', '2024-07-12 18:43:20'),
(7, 'Tag7', 'Tag7', '2024-07-10 01:15:24', '2024-07-10 01:15:24'),
(8, 'Tag8', 'Tag8', '2024-07-10 01:34:56', '2024-07-10 01:34:56'),
(9, 'Tag9', 'Tag9', '2024-07-10 18:47:29', '2024-07-10 18:47:29');

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
(23, 'Author5', 'author5@mail.com', NULL, NULL, '$2y$12$pL3mN18XtxxA4U.QA3QQdeboT1O4ENKGknNyqR2xZSk9rtWrTW7JS', 'author', NULL, '2024-07-21 01:20:14', '2024-07-21 19:32:16'),
(25, 'User1', 'user1@mail.com', NULL, NULL, '$2y$12$NMiudyPeIjRdufG7n2dGcOn6YqP8C8Rm2yazXBJuURSV7vwUTiQb2', 'user', NULL, '2024-07-21 01:22:42', '2024-07-21 18:31:38'),
(26, 'User2', 'user2@mail.com', NULL, NULL, '$2y$12$zpRGBpuL7ZanFQD5xzpU/Ou53hLoFyDjyJWJMD4R2RBos3HDq7tW.', 'user', NULL, '2024-07-21 01:25:21', '2024-07-21 01:25:21'),
(27, 'User3', 'user3@mail.com', NULL, NULL, '$2y$12$yA.x/BZDQfpLUsAOhgRGXuEWswNdOi8VLzEXrDjuNPzovGXWFvH6W', 'user', NULL, '2024-07-21 01:25:58', '2024-07-21 01:25:58'),
(28, 'User4', 'user4@mail.com', NULL, NULL, '$2y$12$6QokjqfLewUBE64IBPorWeYir4rF9frT/eubGgeV8jKVE/7HpoLDS', 'user', NULL, '2024-07-21 01:26:45', '2024-07-21 01:26:45'),
(29, 'User5', 'user5@mail.com', NULL, NULL, '$2y$12$745.//QWUGERNKpduN6.s./6zBv4hsVjeUGwkxlJ99m3dVUteQ9La', 'user', NULL, '2024-07-21 01:27:30', '2024-07-21 01:27:30');

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
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

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
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_tag_id_foreign` (`tag_id`);

--
-- Indeks untuk tabel `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
