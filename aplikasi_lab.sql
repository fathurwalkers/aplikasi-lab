-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Jul 2023 pada 14.46
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_lab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang_kondisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang_stok` int(11) DEFAULT NULL,
  `barang_nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `barang_nama`, `barang_kondisi`, `barang_kode`, `barang_stok`, `barang_nilai`, `created_at`, `updated_at`) VALUES
(1, 'Barang dolorem dolorum ducimus eligendi', 'RUSAK', 'BARANGFXJUILXPBH', 1, 810, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(2, 'Barang sit veritatis voluptatem pariatur', 'BAIK', 'BARANGP5KCFY8SVX', 2, 522, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(3, 'Barang officiis delectus enim est', 'BAIK', 'BARANGA6HJ3X0B7U', 2, 76, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(4, 'Barang harum velit ipsam est', 'BAIK', 'BARANG1UFKHSHK12', 4, 89, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(5, 'Barang tempora quia placeat deleniti', 'RUSAK', 'BARANGAYRG5NP5KI', 9, 56, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(6, 'Barang quidem exercitationem nulla ut', 'RUSAK', 'BARANGWTTFLMXQF8', 7, 5, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(7, 'Barang quod mollitia ducimus omnis', 'RUSAK', 'BARANGJHZ8TTKAAL', 2, 56, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(8, 'Barang dolor et fugit dolorem', 'BAIK', 'BARANGUZP94TFZZV', 1, 273, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(9, 'Barang iure dolorem tempora quis', 'RUSAK', 'BARANGLELIAPNJAU', 3, 301, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(10, 'Barang ipsum aspernatur dolorem voluptas', 'BAIK', 'BARANGDYTTLF2S97', 7, 7, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(11, 'Barang in cum atque sed', 'BAIK', 'BARANGUWLOHO0YXJ', 2, 438, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(12, 'Barang et quaerat quo sunt', 'BAIK', 'BARANGGJNSQUR5B9', 4, 19, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(13, 'Barang maiores illo non laudantium', 'RUSAK', 'BARANG0YA9ADB8JE', 7, 377, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(14, 'Barang et modi consequatur vel', 'BAIK', 'BARANGQB3KPKDWTA', 2, 72, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(15, 'Barang adipisci atque veritatis qui', 'RUSAK', 'BARANGCBUI1HIXRJ', 3, 0, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(16, 'Barang quia unde occaecati et', 'BAIK', 'BARANGSESFSMQKPL', 10, 649, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(17, 'Barang eaque blanditiis recusandae in', 'BAIK', 'BARANGIY5NWLIBCC', 8, 7, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(18, 'Barang dignissimos dolor perferendis ducimus', 'BAIK', 'BARANGOHGHTPC3AK', 10, 60, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(19, 'Barang maxime inventore assumenda sit', 'BAIK', 'BARANGFHB37VBAYU', 8, 1, '2023-06-15 02:38:04', '2023-06-15 02:38:04'),
(20, 'Barang qui ea exercitationem eaque', 'BAIK', 'BARANGWIXX5ENMML', 2, 840, '2023-06-15 02:38:04', '2023-06-15 02:38:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_jeniskelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `data_nama`, `data_telepon`, `data_jeniskelamin`, `data_kode`, `login_id`, `created_at`, `updated_at`) VALUES
(1, 'Ella Hassanah', '(+62) 847 9375 6106', 'P', 'MQZOIBQJ', 3, '2023-06-15 02:41:04', '2023-06-15 02:41:04'),
(2, 'Hasna Pia Aryani', '(+62) 516 2370 103', 'L', 'SSWTBO6V', 4, '2023-06-15 02:41:05', '2023-06-15 02:41:05'),
(3, 'Lukita Kadir Mangunsong', '0902 9455 108', 'P', 'RVBFIHKN', 5, '2023-06-15 02:41:05', '2023-06-15 02:41:05'),
(4, 'Ina Hesti Maryati S.E.', '0721 2836 745', 'L', 'J4PJLQUT', 6, '2023-06-15 02:41:06', '2023-06-15 02:41:06'),
(5, 'Kurnia Tarihoran M.M.', '(+62) 973 3119 6219', 'P', 'R4DPGNON', 7, '2023-06-15 02:41:07', '2023-06-15 02:41:07'),
(6, 'Bakianto Maulana', '(+62) 707 6896 9647', 'P', 'SPDX5L7Z', 8, '2023-06-15 02:41:08', '2023-06-15 02:41:08'),
(7, 'Lalita Juli Astuti', '0387 6361 3664', 'L', 'Z6D2V1YK', 9, '2023-06-15 02:41:09', '2023-06-15 02:41:09'),
(8, 'Warta Kayun Prayoga S.Kom', '(+62) 421 0732 5955', 'P', 'FFADH5IP', 10, '2023-06-15 02:41:10', '2023-06-15 02:41:10'),
(9, 'Dinda Yuliarti S.Pd', '0384 3659 4559', 'L', 'PQOFTLNB', 11, '2023-06-15 02:41:11', '2023-06-15 02:41:11'),
(10, 'Wahyu Nugroho S.Ked', '024 6106 3568', 'L', 'DJYE4J4X', 12, '2023-06-15 02:41:11', '2023-06-15 02:41:11'),
(11, 'Usman Winarno M.Ak', '0941 4074 601', 'P', 'KAQQYDK7', 13, '2023-06-15 02:41:12', '2023-06-15 02:41:12'),
(12, 'Darsirah Najmudin', '0599 3265 043', 'L', 'NCCKIWH5', 14, '2023-06-15 02:41:13', '2023-06-15 02:41:13'),
(13, 'Harto Limar Halim', '0221 9208 6404', 'P', '8UXI3YTX', 15, '2023-06-15 02:41:14', '2023-06-15 02:41:14'),
(14, 'Nrima Saefullah', '0938 1952 2624', 'P', 'XAK8IKWE', 16, '2023-06-15 02:41:15', '2023-06-15 02:41:15'),
(15, 'Salwa Zulaikha Lestari S.Psi', '023 9957 305', 'P', 'JGURHS5A', 17, '2023-06-15 02:41:16', '2023-06-15 02:41:16'),
(16, 'Pangeran Mustofa', '(+62) 460 2065 8481', 'L', 'SRKTKMRE', 18, '2023-06-15 02:41:17', '2023-06-15 02:41:17'),
(17, 'Wisnu Asirwanda Mansur M.M.', '020 1026 467', 'P', 'QPBSLTL1', 19, '2023-06-15 02:41:19', '2023-06-15 02:41:19'),
(18, 'Rangga Saragih', '0860 1636 0643', 'L', 'MU4XHHEW', 20, '2023-06-15 02:41:21', '2023-06-15 02:41:21'),
(19, 'Malika Hartati', '0864 8325 649', 'L', 'KDIKOATF', 21, '2023-06-15 02:41:22', '2023-06-15 02:41:22'),
(20, 'Kayun Enteng Mustofa', '(+62) 880 9893 906', 'P', 'YS8BJ0Q1', 22, '2023-06-15 02:41:23', '2023-06-15 02:41:23'),
(21, 'Farah Puspita M.Farm', '(+62) 26 9907 921', 'P', '3MBBPKCD', 23, '2023-06-15 02:41:28', '2023-06-15 02:41:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_kode`, `invoice_status`, `created_at`, `updated_at`) VALUES
(1, 'INVCO1FSI', 'NO', '2023-06-15 04:35:02', '2023-06-15 04:35:02'),
(2, 'INVC1TMOJ', 'NO', '2023-06-15 04:35:02', '2023-06-15 04:35:02'),
(3, 'INVCHOKTS', 'NO', '2023-06-15 04:35:02', '2023-06-15 04:35:02'),
(4, 'INVCEOKAF', 'NO', '2023-06-15 04:38:49', '2023-06-15 04:38:49'),
(5, 'INVC0QQS7', 'NO', '2023-06-15 04:38:49', '2023-06-15 04:38:49'),
(6, 'INVCHFD4I', 'NO', '2023-06-15 04:38:49', '2023-06-15 04:38:49'),
(7, 'INVCBVWYO', 'NO', '2023-06-15 05:29:56', '2023-06-15 05:29:56'),
(8, 'INVCLLQFN', 'NO', '2023-06-15 05:29:56', '2023-06-15 05:29:56'),
(9, 'INVCPSH1X', 'NO', '2023-06-15 05:30:19', '2023-06-15 05:30:19'),
(10, 'INVCAEHGV', 'NO', '2023-06-15 05:30:19', '2023-06-15 05:30:19'),
(11, 'INVCRQ8NP', 'NO', '2023-07-04 10:09:09', '2023-07-04 10:09:09'),
(12, 'INVCS4DRB', 'NO', '2023-07-04 10:09:09', '2023-07-04 10:09:09'),
(13, 'INVCMQPPM', 'NO', '2023-07-04 10:09:09', '2023-07-04 10:09:09'),
(14, 'INVCWFHMH', 'NO', '2023-07-04 10:09:09', '2023-07-04 10:09:09'),
(15, 'INVCOJITA', 'NO', '2023-07-05 07:11:30', '2023-07-05 07:11:30'),
(16, 'INVCX9FYO', 'NO', '2023-07-05 07:11:30', '2023-07-05 07:11:30'),
(17, 'INVCPW5PO', 'NO', '2023-07-05 23:48:12', '2023-07-05 23:48:12'),
(18, 'INVC2FCJ3', 'NO', '2023-07-05 23:48:12', '2023-07-05 23:48:12'),
(19, 'INVCWLS8F', 'NO', '2023-07-05 23:48:12', '2023-07-05 23:48:12'),
(20, 'INVCOBMCN', 'NO', '2023-07-05 23:48:12', '2023-07-05 23:48:12'),
(21, 'INVCMJXCO', 'NO', '2023-07-13 21:13:46', '2023-07-13 21:13:46'),
(22, 'INVCQHJCK', 'NO', '2023-07-13 21:13:46', '2023-07-13 21:13:46'),
(23, 'INVCEIMDG', 'NO', '2023-07-13 21:16:12', '2023-07-13 21:16:12'),
(24, 'INVC1CBJZ', 'NO', '2023-07-13 21:16:12', '2023-07-13 21:16:12'),
(25, 'INVCRBGDO', 'NO', '2023-07-13 21:16:12', '2023-07-13 21:16:12'),
(26, 'INVCBEZNJ', 'NO', '2023-07-13 21:16:39', '2023-07-13 21:16:39'),
(27, 'INVCZVZ0R', 'NO', '2023-07-13 21:16:39', '2023-07-13 21:16:39'),
(28, 'INVCG6FLT', 'NO', '2023-07-13 21:16:39', '2023-07-13 21:16:39'),
(29, 'INVCSZKAF', 'NO', '2023-07-13 21:17:13', '2023-07-13 21:17:13'),
(30, 'INVC6WCZV', 'NO', '2023-07-13 21:17:13', '2023-07-13 21:17:13'),
(31, 'INVCFU44E', 'NO', '2023-07-13 21:17:13', '2023-07-13 21:17:13'),
(32, 'INVCWACLU', 'NO', '2023-07-13 21:29:04', '2023-07-13 21:29:04'),
(33, 'INVCGAVKS', 'NO', '2023-07-13 21:29:04', '2023-07-13 21:29:04'),
(34, 'INVC8JS5K', 'NO', '2023-07-13 21:29:04', '2023-07-13 21:29:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_token` text COLLATE utf8mb4_unicode_ci,
  `login_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `login_nama`, `login_username`, `login_password`, `login_email`, `login_telepon`, `login_token`, `login_level`, `login_status`, `created_at`, `updated_at`) VALUES
(1, 'FathurWalkers', 'fathurwalkers', '$2y$12$SEDhy1NRaKxYVdw6k9gp4evsyht3zDVMFWSrwmvyBPWDaezbnbAoO', 'fathurwalkers44@gmail.com', '085342072185', '$2y$12$rta6SMbrpyGCLgdHyxUXw.Rq7QyYo5oeXklv6VxtjX3q85ubCYnHm', 'admin', 'verified', '2023-06-15 02:36:24', '2023-06-15 02:36:24'),
(2, 'Administrator', 'admin', '$2y$12$f2j08yKWnNfogHwhCDw2Oe2/KUDm/qk6GSeScYQDqVv3Q.otr.r0a', 'administrator@gmail.com', '083400592841', '$2y$12$o0arAX2e1jykIxMigVhUuOhsy/9gjsKYoi3hM5EMmWDKmd3Wn1Die', 'admin', 'verified', '2023-06-15 02:36:25', '2023-06-15 02:36:25'),
(3, 'Ella Hassanah', 'user0cb6jp', '$2y$12$rUy5kggw36jDplAmt5qhMeaSREudoasb3yCDrB2XTr6sV9j89vYGC', 'mailbqelr@gmail.com', '(+62) 847 9375 6106', '$2y$12$Y4BcDqs//PLTu6nNH3XrMuw9GWwINtbpJLrc0zekyXU.quQbzEP4u', 'user', 'verified', '2023-06-15 02:41:04', '2023-06-15 02:41:04'),
(4, 'Hasna Pia Aryani', 'user1nqkvw', '$2y$12$J3UTYTbG614NKFWvmegGS.jXfHIvwMZsQ/x6YOqaC66qnOZ6HGc/y', 'mail5cy9p@gmail.com', '(+62) 516 2370 103', '$2y$12$e.Km9NVsN3uQHoCKu07tAOltPY8KEMEWnmK9Bk62sNfLfyWXhV2su', 'user', 'verified', '2023-06-15 02:41:05', '2023-06-15 02:41:05'),
(5, 'Lukita Kadir Mangunsong', 'user2tom3u', '$2y$12$nDTRkg0M0IYVekGwt389jeWu189MqBSxJfWwtzNyivvpAk4U./edS', 'mailquuau@gmail.com', '0902 9455 108', '$2y$12$wZGTp4Mn3VyH/CXSOfPFHOFG.E2HZKSmya70EcNTIgYqZtjsxOzPC', 'user', 'verified', '2023-06-15 02:41:05', '2023-06-15 02:41:05'),
(6, 'Ina Hesti Maryati S.E.', 'user3k9eob', '$2y$12$AWfV.RQYGE/TwEgYGr5cPedC8ARHogR2e0iJoox9Yien/sKEPBK0y', 'mailbdfj7@gmail.com', '0721 2836 745', '$2y$12$2fCVSvexUl2MI6/6YvYWweXBjs6QmX2P2AAIeAmMCfMimvCthn1PK', 'user', 'verified', '2023-06-15 02:41:06', '2023-06-15 02:41:06'),
(7, 'Kurnia Tarihoran M.M.', 'user4vohtj', '$2y$12$Bm7rOJd6tazsAN2rRxv/ee0mXnibM/IR.cd0v19ysezlVkk4alqNu', 'mailei3wk@gmail.com', '(+62) 973 3119 6219', '$2y$12$XTQ4EHlRcW4g9sVO2Z89l.ChA7Wa1KPFoeL7TqJk0woq9IJf1dkI2', 'user', 'verified', '2023-06-15 02:41:07', '2023-06-15 02:41:07'),
(8, 'Bakianto Maulana', 'user5obiqj', '$2y$12$AOLo1/3A5w6mPNX/SWDzEOqDhxqg7f0dEPTfiNPCQVFc28gffvmTW', 'mailjjezx@gmail.com', '(+62) 707 6896 9647', '$2y$12$bwJvojlwZFlpiROpepM79uNI6RK4b1j/gjcj.kVms0aItls9kEHXy', 'user', 'verified', '2023-06-15 02:41:08', '2023-06-15 02:41:08'),
(9, 'Lalita Juli Astuti', 'user6xtbwj', '$2y$12$jMSQktZgrYKLe28csah2weJvrPqRVy/p3qrj6ScW0NMmy9mhPCwHC', 'mailtbmra@gmail.com', '0387 6361 3664', '$2y$12$sVdlyReO43yw7xgLNkHOYuhX6ZAYw8FacrjuZKEmCcYA.1wKiPaxq', 'user', 'verified', '2023-06-15 02:41:09', '2023-06-15 02:41:09'),
(10, 'Warta Kayun Prayoga S.Kom', 'user7e9aqo', '$2y$12$y1xVmNPNX3nYhC1lH17PRO480WzKHW6148v2mQaLNixUU4NdO.7PG', 'mailjwqwv@gmail.com', '(+62) 421 0732 5955', '$2y$12$08/ingdKiVJc4Xa53UpVKe4W8bKDIyN7KZ62xE6gPqIrhOrSKCvqC', 'user', 'verified', '2023-06-15 02:41:10', '2023-06-15 02:41:10'),
(11, 'Dinda Yuliarti S.Pd', 'user8e0tgd', '$2y$12$WlnqBmdN65ynDaPOA6SDbOkrXplpOnt9fN71Xe72yXSoU52wvncgi', 'mail7wj6d@gmail.com', '0384 3659 4559', '$2y$12$x.tR/P.sNght/jrn5Wz8TesC1ej726FVfv.XlmQoEhmq4VP4JWZN.', 'user', 'verified', '2023-06-15 02:41:11', '2023-06-15 02:41:11'),
(12, 'Wahyu Nugroho S.Ked', 'user9bnpcp', '$2y$12$Naf/tovNDBGcWi.5tWIfD.w32275W/2e189bYnMTYCs6PFgcpTGuu', 'mailkjofi@gmail.com', '024 6106 3568', '$2y$12$2ahkyiTYqpnizu3V8IJ6veqckdR1bfRWdn0ruKvbXJFiCkcMRDBMq', 'user', 'verified', '2023-06-15 02:41:11', '2023-06-15 02:41:11'),
(13, 'Usman Winarno M.Ak', 'user10f6xpc', '$2y$12$mFs4Aj86BHj/9iXn9vpi2.xaYYwdPzblVpEJ.RHdIireZwS1WOF32', 'mailuljwq@gmail.com', '0941 4074 601', '$2y$12$RHNSjM3C.aG2XLhlh3QOL.bDn1N3JmnGn5jWEC2AQ1yo5mJWE.Q0y', 'user', 'verified', '2023-06-15 02:41:12', '2023-06-15 02:41:12'),
(14, 'Darsirah Najmudin', 'user11vxvue', '$2y$12$y/JNnUXaDM0gfCT0tWXfS.bhdEp2.EQr1NPEWnUd04SxMbo1APEPC', 'mailpkvfs@gmail.com', '0599 3265 043', '$2y$12$eNmh1ZpWh5QZeuz.vIz1hOGaBUt/HP03NB7Ws4reaMAuBoKm.Lmle', 'user', 'verified', '2023-06-15 02:41:13', '2023-06-15 02:41:13'),
(15, 'Harto Limar Halim', 'user12vsa5n', '$2y$12$fHGBM6aMNcPdKwR4IWZneuL6hSbnXagWbzRi570ZUg6v7oGHkDwPC', 'mailrvvog@gmail.com', '0221 9208 6404', '$2y$12$21x/9cxt1fROZH0.MOm56OkzqwzZObVQerpvh4JaV.WUt4YO/pDMO', 'user', 'verified', '2023-06-15 02:41:14', '2023-06-15 02:41:14'),
(16, 'Nrima Saefullah', 'user13oirxy', '$2y$12$Zkfo8sHNMa1ScBKRujPBpuyjk8A9mc3.I417BS8NodPCGfbX11vsm', 'mailwn0tp@gmail.com', '0938 1952 2624', '$2y$12$eHjNmMHOvsHy8.U673qswubs3ufcBtZMrMKCZad3a6NSM6bmr9CEq', 'user', 'verified', '2023-06-15 02:41:15', '2023-06-15 02:41:15'),
(17, 'Salwa Zulaikha Lestari S.Psi', 'user14vgjx0', '$2y$12$CNUsV0SIJ.RSJQFb7hIM3udvDPG76qACjoipjTSlSkoq.yjQRENie', 'maileb3zf@gmail.com', '023 9957 305', '$2y$12$mgVGE.Ojlt280UiUsT2ZZe29rEK838OS5o7WlVDQQznQbQoqnBh6C', 'user', 'verified', '2023-06-15 02:41:16', '2023-06-15 02:41:16'),
(18, 'Pangeran Mustofa', 'user15sdjqs', '$2y$12$MVn4kxrxaghkn3fa0wx4Z.RrC10MtfTa1heMgxX81vTJf/3kooBzS', 'mailwzdqk@gmail.com', '(+62) 460 2065 8481', '$2y$12$SR0HvoLr36/zWHm.2o2TSuI.Ar.8RhwOA8J4Q1YOkOanr9e/zB4E6', 'user', 'verified', '2023-06-15 02:41:17', '2023-06-15 02:41:17'),
(19, 'Wisnu Asirwanda Mansur M.M.', 'user16kzkhi', '$2y$12$dYOmjdXfuGNKiEldlb53HOJRdO3hxTkLs/SV4uvubyRfEi57Czmi2', 'mailfxnwf@gmail.com', '020 1026 467', '$2y$12$AgTM4gsO0XX.aYM9KJYiA.8VgMFhnOan3cjrmas96GwQM5HOEMGBu', 'user', 'verified', '2023-06-15 02:41:19', '2023-06-15 02:41:19'),
(20, 'Rangga Saragih', 'user17htb6l', '$2y$12$uwJfCwiw2KrAxOXhzsI3/Ouot6duL3gvCnc4zSzqU8qe9cBWRYIoC', 'mailbow4b@gmail.com', '0860 1636 0643', '$2y$12$yk7S43OfN9qyIdPo3LznBujHvBOiwvZda/7TVGJGAFonlIdUwhF32', 'user', 'verified', '2023-06-15 02:41:21', '2023-06-15 02:41:21'),
(21, 'Malika Hartati', 'user18mfcu0', '$2y$12$rvBCsma6IrHA1IznohBu0ubzLwUQ6Z.zBl8/pgwJ.3gkBZDnyOTwS', 'maild0bsv@gmail.com', '0864 8325 649', '$2y$12$RlI8JSrGY7TJ3YFhrKxAmuaBiQUV4iTHzttxZPr4QA.Y5NJQdf3Qi', 'user', 'verified', '2023-06-15 02:41:22', '2023-06-15 02:41:22'),
(22, 'Kayun Enteng Mustofa', 'user19flvcj', '$2y$12$WH2jlvakn/1MzUAylAJ9/Oj6XgaqFQK2yj7ZFaDNvA9wo1tF8VbXS', 'mailpipjx@gmail.com', '(+62) 880 9893 906', '$2y$12$.eycSzToPDW8Bf1Mpnvp4.aMJJXUtRYaGzz273IIuTKo4xKPvEd8C', 'user', 'verified', '2023-06-15 02:41:23', '2023-06-15 02:41:23'),
(23, 'Farah Puspita M.Farm', 'example', '$2y$12$VxRH4734xUADGtthNakU0./nhs264dhYweH2HL.kz/VM..lIgabBa', 'maillqtw1@gmail.com', '(+62) 26 9907 921', '$2y$12$Pf8auBCHjL4oIZyos6Tc7.gNegkCvbNVRQcYbDd1rQcsecxNqd6iS', 'user', 'verified', '2023-06-15 02:41:28', '2023-06-15 02:41:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_02_130933_create_logins_table', 1),
(6, '2023_05_02_130946_create_data_table', 1),
(7, '2023_05_14_191349_create_barangs_table', 1),
(8, '2023_05_14_193001_create_penawarans_table', 1),
(9, '2023_05_14_193018_create_invoices_table', 1),
(10, '2023_05_17_221404_create_transaksis_table', 1),
(11, '2023_06_14_154944_create_penawaran_invoices_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penawaran`
--

CREATE TABLE `penawaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penawaran_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penawaran_deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `penawaran_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penawaran_harga_total` int(11) DEFAULT NULL,
  `data_id` bigint(20) UNSIGNED DEFAULT NULL,
  `barang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penawaran`
--

INSERT INTO `penawaran` (`id`, `penawaran_kode`, `penawaran_deskripsi`, `penawaran_status`, `penawaran_harga_total`, `data_id`, `barang_id`, `created_at`, `updated_at`) VALUES
(18, 'PNRWNXFZMQ4KUND', 'pengadaan barang', 'PENDING', 581, 21, 8, '2023-07-13 21:15:59', '2023-07-13 21:15:59'),
(19, 'PNRWNZLRFMA8FVJ', 'pengadaan barang', 'PENDING', 581, 21, 9, '2023-07-13 21:15:59', '2023-07-13 21:15:59'),
(20, 'PNRWNC9JFYZRRCW', 'pengadaan barang', 'PENDING', 581, 21, 10, '2023-07-13 21:15:59', '2023-07-13 21:15:59'),
(21, 'PNRWNMD3IJYACIY', 'Pelayanan Jasa Pengadaan Komputer', 'PENDING', 884, 21, 2, '2023-07-13 21:28:46', '2023-07-13 21:28:46'),
(22, 'PNRWNLPH1NL1UKU', 'Pelayanan Jasa Pengadaan Komputer', 'PENDING', 884, 21, 4, '2023-07-13 21:28:46', '2023-07-13 21:28:46'),
(23, 'PNRWN7ZIVH6PD3X', 'Pelayanan Jasa Pengadaan Komputer', 'PENDING', 884, 21, 8, '2023-07-13 21:28:46', '2023-07-13 21:28:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penawaran_invoice`
--

CREATE TABLE `penawaran_invoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penawaran_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penawaran_invoice`
--

INSERT INTO `penawaran_invoice` (`id`, `penawaran_id`, `invoice_id`, `created_at`, `updated_at`) VALUES
(23, 18, 23, '2023-07-13 21:16:12', '2023-07-13 21:16:12'),
(24, 19, 24, '2023-07-13 21:16:12', '2023-07-13 21:16:12'),
(25, 20, 25, '2023-07-13 21:16:12', '2023-07-13 21:16:12'),
(26, 18, 26, '2023-07-13 21:16:39', '2023-07-13 21:16:39'),
(27, 19, 27, '2023-07-13 21:16:39', '2023-07-13 21:16:39'),
(28, 20, 28, '2023-07-13 21:16:39', '2023-07-13 21:16:39'),
(29, 18, 29, '2023-07-13 21:17:13', '2023-07-13 21:17:13'),
(30, 19, 30, '2023-07-13 21:17:13', '2023-07-13 21:17:13'),
(31, 20, 31, '2023-07-13 21:17:13', '2023-07-13 21:17:13'),
(32, 18, 32, '2023-07-13 21:29:04', '2023-07-13 21:29:04'),
(33, 19, 33, '2023-07-13 21:29:04', '2023-07-13 21:29:04'),
(34, 22, 34, '2023-07-13 21:29:04', '2023-07-13 21:29:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_pemilik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaksi_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaksi_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaksi_harga_total` int(11) DEFAULT NULL,
  `transaksi_bukti` text COLLATE utf8mb4_unicode_ci,
  `transaksi_kwitansi` text COLLATE utf8mb4_unicode_ci,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_login_id_foreign` (`login_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_login_username_unique` (`login_username`),
  ADD UNIQUE KEY `login_login_email_unique` (`login_email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penawaran_data_id_foreign` (`data_id`),
  ADD KEY `penawaran_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `penawaran_invoice`
--
ALTER TABLE `penawaran_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penawaran_invoice_penawaran_id_foreign` (`penawaran_id`),
  ADD KEY `penawaran_invoice_invoice_id_foreign` (`invoice_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_invoice_id_foreign` (`invoice_id`);

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
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `penawaran_invoice`
--
ALTER TABLE `penawaran_invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_login_id_foreign` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  ADD CONSTRAINT `penawaran_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penawaran_data_id_foreign` FOREIGN KEY (`data_id`) REFERENCES `data` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penawaran_invoice`
--
ALTER TABLE `penawaran_invoice`
  ADD CONSTRAINT `penawaran_invoice_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penawaran_invoice_penawaran_id_foreign` FOREIGN KEY (`penawaran_id`) REFERENCES `penawaran` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
