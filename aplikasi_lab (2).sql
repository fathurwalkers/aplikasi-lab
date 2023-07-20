-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Jul 2023 pada 18.47
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
(1, 'Barang quo et rerum dolorem', 'BAIK', 'BARANGYHBD9DWAAQ', 3, 54, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(2, 'Barang aliquam explicabo voluptas rerum', 'BAIK', 'BARANGWSVRPJQ2KN', 3, 3, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(3, 'Barang perspiciatis quae amet culpa', 'BAIK', 'BARANG9HOIFIUQES', 3, 80, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(4, 'Barang at aliquid quis qui', 'BAIK', 'BARANGI0NYH1DHC2', 5, 8, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(5, 'Barang atque odit molestiae nihil', 'RUSAK', 'BARANG9MANKJGKBG', 8, 57, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(6, 'Barang aut rerum ut eos', 'BAIK', 'BARANG7FKAYDBSPU', 6, 96, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(7, 'Barang reprehenderit totam et amet', 'BAIK', 'BARANGXUYYCYMSG6', 10, 5, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(8, 'Barang soluta reiciendis quia vero', 'BAIK', 'BARANGEXEKEKZKFD', 3, 9, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(9, 'Barang est veritatis sed qui', 'BAIK', 'BARANGUBTER8EKM9', 3, 12, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(10, 'Barang molestiae labore earum magnam', 'BAIK', 'BARANGG4RCQRBDZR', 4, 539, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(11, 'Barang quis aliquid dolore voluptatum', 'RUSAK', 'BARANGI3EQTXKO7T', 8, 89, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(12, 'Barang facilis quisquam qui consectetur', 'RUSAK', 'BARANG6EOHODNDAN', 1, 5, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(13, 'Barang eos veniam sed dolorem', 'BAIK', 'BARANGGTA3G3EIPN', 5, 81, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(14, 'Barang et libero quis soluta', 'RUSAK', 'BARANGMBQ5OTLQXZ', 7, 86, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(15, 'Barang non veritatis quis quisquam', 'RUSAK', 'BARANGADUCWTGLLJ', 10, 670, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(16, 'Barang similique dicta iusto cupiditate', 'BAIK', 'BARANGDCAMSSTJKR', 7, 8, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(17, 'Barang sed aspernatur fugit enim', 'BAIK', 'BARANGCHGATTWNQC', 5, 29, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(18, 'Barang sint ut eius nam', 'BAIK', 'BARANGP3TSCLAFVI', 8, 811, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(19, 'Barang iusto voluptatem omnis autem', 'RUSAK', 'BARANGX9QZZOA74C', 5, 7, '2023-07-21 01:07:45', '2023-07-21 01:07:45'),
(20, 'Barang ut ut sint fugiat', 'RUSAK', 'BARANGT4WSXHTBSP', 2, 9, '2023-07-21 01:07:45', '2023-07-21 01:07:45');

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
(1, 'Oliva Lestari', '(+62) 352 9023 0296', 'L', 'DW9NSYJL', 3, '2023-07-21 01:07:22', '2023-07-21 01:07:22'),
(2, 'Jasmin Nova Rahmawati S.T.', '(+62) 874 7487 6255', 'P', 'TBMJQNJD', 4, '2023-07-21 01:07:25', '2023-07-21 01:07:25'),
(3, 'Karma Mandala S.Pt', '(+62) 668 5700 5985', 'P', 'JOHJUYBA', 5, '2023-07-21 01:07:26', '2023-07-21 01:07:26'),
(4, 'Darimin Tedi Budiyanto M.TI.', '(+62) 29 4609 4294', 'L', 'Y2ZAES86', 6, '2023-07-21 01:07:27', '2023-07-21 01:07:27'),
(5, 'Restu Wastuti', '(+62) 26 0726 309', 'P', 'JYP4GK3I', 7, '2023-07-21 01:07:28', '2023-07-21 01:07:28'),
(6, 'Karja Kuswoyo', '0889 8246 2624', 'L', 'PCGICIMI', 8, '2023-07-21 01:07:29', '2023-07-21 01:07:29'),
(7, 'Padma Hartati', '0263 7389 288', 'L', 'GEZPD8JX', 9, '2023-07-21 01:07:30', '2023-07-21 01:07:30'),
(8, 'Humaira Prastuti', '025 2980 280', 'P', 'XYRTAY7H', 10, '2023-07-21 01:07:30', '2023-07-21 01:07:30'),
(9, 'Indah Mayasari', '0954 9129 3167', 'P', 'BLITF9QW', 11, '2023-07-21 01:07:31', '2023-07-21 01:07:31'),
(10, 'Julia Maida Nurdiyanti', '(+62) 28 1207 7878', 'L', 'NRRCONMF', 12, '2023-07-21 01:07:32', '2023-07-21 01:07:32'),
(11, 'Dalima Nuraini', '(+62) 725 3481 1649', 'P', '3IBHKPQG', 13, '2023-07-21 01:07:33', '2023-07-21 01:07:33'),
(12, 'Bala Prakasa', '(+62) 981 2933 896', 'P', 'SZP39UQM', 14, '2023-07-21 01:07:34', '2023-07-21 01:07:34'),
(13, 'Intan Yuniar', '(+62) 454 8285 335', 'L', 'KQZX03HE', 15, '2023-07-21 01:07:35', '2023-07-21 01:07:35'),
(14, 'Daru Pratama M.Pd', '(+62) 25 3232 3687', 'L', 'ZXE1XETD', 16, '2023-07-21 01:07:35', '2023-07-21 01:07:36'),
(15, 'Alika Hafshah Susanti', '0598 1282 6479', 'P', 'BE2WBYYH', 17, '2023-07-21 01:07:36', '2023-07-21 01:07:36'),
(16, 'Jessica Oni Mardhiyah', '(+62) 28 8881 684', 'P', 'VX5ZDPUH', 18, '2023-07-21 01:07:37', '2023-07-21 01:07:37'),
(17, 'Harjaya Iswahyudi', '(+62) 903 7815 2633', 'P', 'EETSUL1A', 19, '2023-07-21 01:07:38', '2023-07-21 01:07:38'),
(18, 'Endah Mutia Wulandari S.IP', '0497 3408 183', 'P', 'BORB0UUD', 20, '2023-07-21 01:07:39', '2023-07-21 01:07:39'),
(19, 'Bambang Habibi S.Pt', '0837 902 741', 'L', 'FC4RPXRT', 21, '2023-07-21 01:07:40', '2023-07-21 01:07:40'),
(20, 'Jasmin Nasyiah', '0533 4645 301', 'L', 'JHJVQU5X', 22, '2023-07-21 01:07:41', '2023-07-21 01:07:41'),
(21, 'Narji Kurniawan', '0840 0074 7322', 'L', '3RKFBPYZ', 23, '2023-07-21 01:07:42', '2023-07-21 01:07:42');

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
(1, 'INVCRT0KY', 'NO', '2023-07-21 01:46:50', '2023-07-21 01:46:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jasa_nama_alat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jasa_harga_care` int(11) DEFAULT NULL,
  `jasa_harga_cleaning` int(11) DEFAULT NULL,
  `jasa_harga_kalibrasi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id`, `jasa_nama_alat`, `jasa_harga_care`, `jasa_harga_cleaning`, `jasa_harga_kalibrasi`, `created_at`, `updated_at`) VALUES
(1, 'Mikroskop', 217467, 217467, 217467, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(2, 'Oven', 87262, 87262, 87262, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(3, 'Inkubator', 491014, 491014, 491014, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(4, 'Autoklaf / Sterilizer', 819014, 819014, 819014, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(5, 'Furnace / Tanur', 403149, 403149, 403149, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(6, 'Waterbath', 938000, 938000, 938000, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(7, 'Vortex Mixer', 10926, 10926, 10926, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(8, 'Shaker', 38701, 38701, 38701, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(9, 'Hot Plate / Stirer', 17004, 17004, 17004, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(10, 'Centrifuge', 654235, 654235, 654235, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(11, 'Timbangan', 56392, 56392, 56392, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(12, 'Spektrofotometer', 232131, 232131, 232131, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(13, 'Lemari Asam', 624589, 624589, 624589, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(14, 'Laminar Air Flow', 81125, 81125, 81125, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(15, 'Biosafety Cabinet', 57183, 57183, 57183, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(16, 'Shaker Incubator', 381072, 381072, 381072, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(17, 'Mikrotom', 534125, 534125, 534125, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(18, 'pH Meter', 953985, 953985, 953985, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(19, 'DO Meter', 3404, 3404, 3404, '2023-07-21 01:16:31', '2023-07-21 01:16:31'),
(20, 'BOD Meter', 416214, 416214, 416214, '2023-07-21 01:16:31', '2023-07-21 01:16:31');

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
(1, 'FathurWalkers', 'fathurwalkers', '$2y$12$6PyXP8B/ez9lTxz4fF.Jm.yQxtWpvd./sm1eczj8IAxO7cymVeMpC', 'fathurwalkers44@gmail.com', '085342072185', '$2y$12$mC0.jFk/e0aHUhWbLTyPn.0irJcU1H81BwFegOyAqzUWx5kLF2.3S', 'admin', 'verified', '2023-07-20 21:49:31', '2023-07-20 21:49:31'),
(2, 'Administrator', 'admin', '$2y$12$7miO175SiKgJ5hV3.8kRIu9qnfYGtWBCHZtFjZ1z0QjAoHzSuGDTK', 'administrator@gmail.com', '083400592841', '$2y$12$TLOt.Vz2vkwjPFISoQSsROdeR/lulNnb/F8GJpnb0KdZyTgeLpytm', 'admin', 'verified', '2023-07-20 21:49:31', '2023-07-20 21:49:31'),
(3, 'Oliva Lestari', 'example', '$2y$12$tzrGx05UvvqgSvMdWNZYGugB3PeuXRfO6AUOc.4syKPeKKUWwdAnW', 'mail55jpx@gmail.com', '(+62) 352 9023 0296', '$2y$12$R77uByDg5ISEqqRljrnJEu7EfWrBKBV7i/LCD0LvcwwjM0KW9SZYG', 'user', 'verified', '2023-07-21 01:07:22', '2023-07-21 01:07:22'),
(4, 'Jasmin Nova Rahmawati S.T.', 'user0v4lsb', '$2y$12$2EeRQKUR6Clgn1pq09SyCOKDLcklx4aqeuzSyUblscQB9YhYA..ay', 'mailbwg0f@gmail.com', '(+62) 874 7487 6255', '$2y$12$LEJmvG9MQiFuE0sm0ApLy.rNJPyY9LZC0GaWi0pG8onFVyEZv7t/C', 'user', 'verified', '2023-07-21 01:07:25', '2023-07-21 01:07:25'),
(5, 'Karma Mandala S.Pt', 'user1mgbn9', '$2y$12$u7qByaQPGKrUFSyCiTJnC.HwDhBlOrUT1lfH85tyu0RFF8rDyzlM6', 'mailisxsx@gmail.com', '(+62) 668 5700 5985', '$2y$12$9MfhDY0qXNe4wrkB3giaauT6KV7lqy8shIunUmKMzIf.K/8CNxWe6', 'user', 'verified', '2023-07-21 01:07:26', '2023-07-21 01:07:26'),
(6, 'Darimin Tedi Budiyanto M.TI.', 'user2tjhpu', '$2y$12$k.S/S/MmmMxHysLMsK.gjuRndx2tH.jdkE/kEj4uiNIhlP5OBTHqm', 'mail0ghqk@gmail.com', '(+62) 29 4609 4294', '$2y$12$62ZwA2eFKunTLhMC76gyaOc2nWm6bFTO/yu49nHN.PQbhEo/cGXuW', 'user', 'verified', '2023-07-21 01:07:27', '2023-07-21 01:07:27'),
(7, 'Restu Wastuti', 'user3foiiq', '$2y$12$QOvaOJfkH3TJ0V5sPBw5ye66m2tNGUxhyVPkWameFl683r4ksg/Ty', 'mailnxmsc@gmail.com', '(+62) 26 0726 309', '$2y$12$RzT4Gj8GpVwjEbc3QEdUIOHkwHuaLX7CM2U3WvTx3MZDKXAgCkD02', 'user', 'verified', '2023-07-21 01:07:28', '2023-07-21 01:07:28'),
(8, 'Karja Kuswoyo', 'user48d3fb', '$2y$12$Qeoto2d/t3DMu8.Wa72T5uHV1Rjb6A.rowDkKhL5J2JvTKoyXwRgC', 'mailjl3fz@gmail.com', '0889 8246 2624', '$2y$12$0kx43ESq8ULjAs9qOnQ/beqM8UpNY9YalGW7IjXQioqZ6K.J.QiK2', 'user', 'verified', '2023-07-21 01:07:29', '2023-07-21 01:07:29'),
(9, 'Padma Hartati', 'user5gkv9k', '$2y$12$iDtaCzKE1/nhqoCM6zscsOV6pay.Je148023AFtVqAzsuxRHDB1Dy', 'mailmnulx@gmail.com', '0263 7389 288', '$2y$12$bTrrSJSmDYHbXuNbIEvfr.gHXYd8bIpt0a4Mmxmm1k9xfVGZnzgva', 'user', 'verified', '2023-07-21 01:07:30', '2023-07-21 01:07:30'),
(10, 'Humaira Prastuti', 'user6kjqsb', '$2y$12$H2Lf51p14HtpZhKAQ7VxgeizMTezNjY5ADnn.Uozu0Z9KdI.iMr26', 'mailznc8c@gmail.com', '025 2980 280', '$2y$12$BgyZr1oHjFXvxvWH9zOICeQUs7myg5Y8gRuu.GMuvF5pDNdSVVCQe', 'user', 'verified', '2023-07-21 01:07:30', '2023-07-21 01:07:30'),
(11, 'Indah Mayasari', 'user7kwm9x', '$2y$12$KfUJvecxKe2bmkYVTn2mJOWjkzjShKUoC0bx.XrNGQK81kzpObCLi', 'mail5wbtc@gmail.com', '0954 9129 3167', '$2y$12$VydhAHvS2vkLFVaVV410v.JMcFRnWPHA35IxIHl35qDKyuPSAqtkW', 'user', 'verified', '2023-07-21 01:07:31', '2023-07-21 01:07:31'),
(12, 'Julia Maida Nurdiyanti', 'user8m2fov', '$2y$12$/zKxKJ/ExUIYahU82.1DZOmyDOPDuWEoSlqkQnU4/Bogc0.ARqNR2', 'mail2gmqs@gmail.com', '(+62) 28 1207 7878', '$2y$12$qk.39KMJpmEDpVm1IX4IyO3ZZu8vZuxZUbKRywnIYkX8km5WjVJwW', 'user', 'verified', '2023-07-21 01:07:32', '2023-07-21 01:07:32'),
(13, 'Dalima Nuraini', 'user9ekpqo', '$2y$12$wNv.MaZfks6zkBir88hCWOZV583TbL092uWNe2BMXsaAOuJucwd3y', 'mailgiyki@gmail.com', '(+62) 725 3481 1649', '$2y$12$E9MNvfAOAuz57FCBWWnene3dRHz.b/.dyhW84NHJpkPWSVBlcOQF2', 'user', 'verified', '2023-07-21 01:07:33', '2023-07-21 01:07:33'),
(14, 'Bala Prakasa', 'user109nde8', '$2y$12$0v.Evua6DfV/Tfj3Jvvq0uIk4VL/DDO3zvtdPnMncpC2myP0No7qG', 'mailxxkzk@gmail.com', '(+62) 981 2933 896', '$2y$12$xsW1iKRQ2Dbx4ZFg27Afq.duYSRlcYqeJhKMzdHwWfkTQujGSn2Re', 'user', 'verified', '2023-07-21 01:07:34', '2023-07-21 01:07:34'),
(15, 'Intan Yuniar', 'user11egbwx', '$2y$12$PrMo06..jriXu5ZS3oOdkOMKLUy66IYiUajzbxCKp7e1URBdvWVF6', 'mailrf4sl@gmail.com', '(+62) 454 8285 335', '$2y$12$46tYevBT2ufsCCDTMWiKKuWL4iiarrTMlXzZg1AzM0jj10R1Is2gy', 'user', 'verified', '2023-07-21 01:07:35', '2023-07-21 01:07:35'),
(16, 'Daru Pratama M.Pd', 'user12a4ice', '$2y$12$yWju1RRfRADMTplgAfSNWONCpnYo7XGKQFYDBpV5kdtsLvv0JE00W', 'mailtb6w7@gmail.com', '(+62) 25 3232 3687', '$2y$12$XpcT7AatTSPMtFKy4b.7W.hX/q3EhfaHP1mPCxBY/kYIzDG7VlR2e', 'user', 'verified', '2023-07-21 01:07:35', '2023-07-21 01:07:35'),
(17, 'Alika Hafshah Susanti', 'user13nlsdi', '$2y$12$t70c0V9wyJWEVwslB4Cmq.CVFHpnOBZe0xzrupNbe2OZxS4R5DvGm', 'mailhxdfg@gmail.com', '0598 1282 6479', '$2y$12$7V77kzmZOgbkevENTWPT/eQPYFicxU1Ac71Ht5gIhM3O1YoY.QRRS', 'user', 'verified', '2023-07-21 01:07:36', '2023-07-21 01:07:36'),
(18, 'Jessica Oni Mardhiyah', 'user14fy0ii', '$2y$12$LwD51YFr1246IO3.RR0yeuIRABQWvtm7cnbpU4xuElTGqcrUWp0LS', 'mail26244@gmail.com', '(+62) 28 8881 684', '$2y$12$Bn3RkeaAK0Q5623Xj3FvJeLmLy1p7B.3JUYDCRlErzAZQToub0gm.', 'user', 'verified', '2023-07-21 01:07:37', '2023-07-21 01:07:37'),
(19, 'Harjaya Iswahyudi', 'user155pwlu', '$2y$12$4p/Sa.Jm.Vy//te2jQWxJul9RHg3c0QJcFOtzt0lLQvZstvm1bMVW', 'mailqr8ho@gmail.com', '(+62) 903 7815 2633', '$2y$12$nrAaGig0OUHLwPFj1y3Ahu5j0OEBz.Cod9p2gWOvxwMur7AoRWZ6e', 'user', 'verified', '2023-07-21 01:07:38', '2023-07-21 01:07:38'),
(20, 'Endah Mutia Wulandari S.IP', 'user16wgad9', '$2y$12$R9wairt8PMYU2WRGPuQoCeYwocsOnoC.5JoliA0vUM/MsRJ8ClNVu', 'mail1op8a@gmail.com', '0497 3408 183', '$2y$12$93kv8oVReKyeyI4S1tCZWew58YLfIZinI0/F6r1UBeOlFBjL6xoC.', 'user', 'verified', '2023-07-21 01:07:39', '2023-07-21 01:07:39'),
(21, 'Bambang Habibi S.Pt', 'user17bvib6', '$2y$12$Lk166XuTaT3z98aeHaufaOpDijDJijw6XF5cw6otVHLhzUQ6QfdVK', 'mailuf2tu@gmail.com', '0837 902 741', '$2y$12$qGZO38.Qm4y7xpwVHxOcH.gtf9Q78Z4G/jgsewhEzP/V7BBVtKwVW', 'user', 'verified', '2023-07-21 01:07:40', '2023-07-21 01:07:40'),
(22, 'Jasmin Nasyiah', 'user18fhdhs', '$2y$12$N1Syk1npPbIoeRoQQBF/w.JZnHBjCpz6mMmVlFf9NnUj08B7LuBxe', 'mailg6hzk@gmail.com', '0533 4645 301', '$2y$12$xyEWL.qv/mjW0xujUbvpB.LGFUw2jnn.XtRpsJiZcz2UnlHHvBLnm', 'user', 'verified', '2023-07-21 01:07:41', '2023-07-21 01:07:41'),
(23, 'Narji Kurniawan', 'user19veujt', '$2y$12$MIPixUDkSClEu2I/6XpjLOtIXfE8w.maW0VJAjRhQh8F7FuEAoatC', 'mailw9cyq@gmail.com', '0840 0074 7322', '$2y$12$E.D0HGiwF3L5vDE28eVAbOtmuH8gQa1PDJSQTySSMz4ODioAl9UvW', 'user', 'verified', '2023-07-21 01:07:42', '2023-07-21 01:07:42');

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
(8, '2023_07_20_142300_create_jasas_table', 1),
(9, '2023_07_20_142404_create_penawarans_table', 1),
(10, '2023_07_20_142414_create_invoices_table', 1),
(11, '2023_07_20_142424_create_transaksis_table', 1),
(12, '2023_07_20_142434_create_penawaran_invoices_table', 1);

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
  `penawaran_tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_id` bigint(20) UNSIGNED DEFAULT NULL,
  `barang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jasa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penawaran`
--

INSERT INTO `penawaran` (`id`, `penawaran_kode`, `penawaran_deskripsi`, `penawaran_status`, `penawaran_harga_total`, `penawaran_tipe`, `data_id`, `barang_id`, `jasa_id`, `created_at`, `updated_at`) VALUES
(1, 'PNRWNY2R7HIP1JT', 'wdwdw', 'KONFIRMASI', 2814000, NULL, 1, 6, NULL, '2023-07-21 01:44:55', '2023-07-21 01:46:42');

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
(1, 1, 1, '2023-07-21 01:46:50', '2023-07-21 01:46:50');

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
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
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
  ADD KEY `penawaran_barang_id_foreign` (`barang_id`),
  ADD KEY `penawaran_jasa_id_foreign` (`jasa_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penawaran_invoice`
--
ALTER TABLE `penawaran_invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `penawaran_data_id_foreign` FOREIGN KEY (`data_id`) REFERENCES `data` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penawaran_jasa_id_foreign` FOREIGN KEY (`jasa_id`) REFERENCES `jasa` (`id`) ON DELETE CASCADE;

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
