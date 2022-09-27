-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 27 sep. 2022 à 15:17
-- Version du serveur : 10.5.12-MariaDB-cll-lve
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u659482928_sney3i`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `adress`, `patente`, `role`, `password`, `status`, `remember_token`, `image`, `deleted_at`, `created_at`, `updated_at`, `manar`) VALUES
(3, 'societe test', 'onsibenattia@gmail.com', '56619731', 'Sousse', '', 'societe', '$2a$08$q9sCKMQEwFxUNvOq05eeKuu8QdqZDLGYWF11Rz3QBTqp7U4WrOmQ2', 'verified', '', NULL, NULL, NULL, '2022-06-20 00:00:57', NULL),
(5, 'societe test2', 'societe.test2@test.com', '56619732', 'Sousse', '', 'societe', '123', 'verified', '', NULL, NULL, NULL, '2022-05-19 01:34:10', NULL),
(6, 'societe test', 'test@societe.com', '12345678', 'Pause gourmande', '1234565', 'societe', '$2y$10$9LYt5ICCCnRRXOyaInhgSuQvrCpFOAMXUsnq.rnueW7BNi6kljJum', 'verified', NULL, '202206191557cola.jpg', NULL, '2022-06-19 14:57:47', '2022-06-19 17:52:43', NULL),
(7, 'axia', 'axia@gmail.com', '23444555', 'Sousse', 'fdg', 'societe', '$2y$10$sAz2BLVNLfyg1HHCauQYvubmKcHU88cpIGvS.WDK0VTJfSxBjVE3i', 'pending', NULL, '202206191900imù.png', NULL, '2022-06-19 18:00:01', '2022-06-19 18:00:01', NULL),
(8, 'aa', 'aa@gmail.com', '22222', 'NJJH', 'jjjj', 'societe', '$2y$10$zcTrDKIqoWlrbIMnX/kY.eFMENP.B3zATgxZnvYXxUE7Gqk20PBwC', 'pending', NULL, '202206191914imù.png', NULL, '2022-06-19 18:14:48', '2022-06-19 18:14:48', NULL),
(17, 'bigbazar', 'bigbazar@gmail.com', '23444789', 'sousse', '234345', 'societe', '$2y$10$jKN483Ue7yzYK/rymJPpbumkV2K11Ya6rgl2XaBPWvxJJLTlh/ZbC', 'verified', NULL, '202206211828okklllll.png', NULL, '2022-06-21 17:28:45', '2022-06-23 19:48:37', NULL),
(19, 'admin', 'faten@nj.com', '54240725', 'Sousse', '', 'admin', '$2y$10$jKN483Ue7yzYK/rymJPpbumkV2K11Ya6rgl2XaBPWvxJJLTlh/ZbC', 'verified', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'rim', 'rim@gmail.com', '5224659', 'Sousse', '11111', 'societe', '$2y$10$Nv5g3rciQQMt1SELM9U13OyYc4rzZ7mBTEetn0NDgKo68QzT7x9Tq', 'verified', NULL, '202206232047cola.jpg', NULL, '2022-06-23 19:47:02', '2022-06-23 20:01:42', NULL),
(23, 'axia', 'axiasolution@gmail.com', '5555555', 'msaken', '6547', 'societe', '$2y$10$RVpZ38wRi/haFJbzwfyC2.EOjAgGb0sP5EPRKNbUJyczyNGaFTjlm', 'verified', NULL, '202206241424r.jpg', NULL, '2022-06-24 13:24:07', '2022-06-24 13:24:41', NULL),
(24, 'gloulou', 'saifgorchene@gmail.com', '23435555', 'SOUSSE', 'oshfd', 'societe', '$2y$10$4h8lQf08z7MtnpGOL3ZtYufEaOYqfbGRXUPkbXKV/IXc5btY3JdoS', 'verified', NULL, '202207031027rima.jpg', NULL, '2022-07-03 09:27:31', '2022-07-03 09:34:12', NULL),
(25, 'abderrahmen', 'abderrahmen.fekih2@gmail.com', '23456789', 'Sousse', 'QDFSGD', 'societe', '$2y$10$Kvc3NZfxtt1H80ivV0mVo.SqgmgIGF1bmohBUDVKivD5NuRRzp/uu', 'verified', NULL, '202207310927rep.jpg', NULL, '2022-07-31 08:27:42', '2022-07-31 08:33:56', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `icon`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'reparation', '151836.png', NULL, '2022-05-18 23:20:21', '2022-06-19 14:33:39'),
(6, 'beauté', 'beauty.png', NULL, '2022-05-18 23:20:21', '2022-06-02 13:19:26'),
(7, 'chauffeur', 'chauffeur.png', NULL, '2022-05-18 23:20:21', '2022-06-02 13:19:26'),
(8, 'test', '202206191522anas.jpg', '2022-06-24 07:45:45', '2022-06-19 14:22:01', '2022-06-24 07:45:45'),
(9, 'froid chaud service', '202206191855imù.png', NULL, '2022-06-19 17:55:21', '2022-06-19 17:55:21'),
(10, 'chantier', '202206211815okklllll.png', NULL, '2022-06-21 17:15:00', '2022-06-21 17:15:00'),
(11, 'aide sociale', '202206232105s.jpg', NULL, '2022-06-23 20:05:04', '2022-06-23 20:05:04'),
(12, 'aide sociale', '202206232105s.jpg', '2022-06-23 20:05:13', '2022-06-23 20:05:04', '2022-06-23 20:05:13'),
(13, 'plombier', '202206241413s.jpg', NULL, '2022-06-24 13:13:49', '2022-06-24 13:13:49'),
(14, 'femme de menage', '202206251144rima.jpg', NULL, '2022-06-25 10:44:51', '2022-06-25 10:44:51'),
(15, 'restauration', '202207031025r.jpg', NULL, '2022-07-03 09:25:22', '2022-07-03 09:25:22');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `uid`, `first_name`, `last_name`, `adress`, `phone`, `birthday`, `gender`, `image`, `status`, `cin`, `email`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'fatennnn', 'rima', 'Sousse', '56619732', '27-02-1990', 'female', 'avatar.png', 'verified', NULL, 'faten@gmail.com', '$2y$10$jKN483Ue7yzYK/rymJPpbumkV2K11Ya6rgl2XaBPWvxJJLTlh/ZbC', NULL, NULL, NULL, '2022-06-24 19:28:17'),
(2, NULL, 'Test', '2', 'Sousse', '84659', '2022-06-18T03:22:14.021Z', NULL, '/proffessionel/62ad4541a60f9.png', 'verified', '256585', 'Test2@tt.col', '$2y$10$1ZM.iNwnZXh1EWEkZRcUA.UDYMd5Sm/ygq3GA62PYLS4oz9UwU6X6', NULL, NULL, '2022-06-18 01:23:45', '2022-06-19 14:30:33'),
(3, NULL, 'hamdi', 'hassen', 'sousse', '24853674', '14-06-2022', NULL, '/proffessionel/62b6f9e1b35a7.png', 'pending', '12486973', 'hamdi@gmail.com', '$2y$10$VjWcOMNmSms3ObUFOLco1erZFBbzAlwsWXNUWayqDx14dEdQkq4rG', NULL, NULL, '2022-06-25 11:04:49', '2022-06-25 11:04:49'),
(6, NULL, 'urutu', 'urutu', NULL, NULL, NULL, NULL, '/proffessionel/632adb12bff5f.png', NULL, NULL, 'abderrahmen.fekih2@gmail.com', '$2y$10$FmKwoE6c1InsAst5nsMJLeGGIRBLRMsRCVZymQpdSxzPd8LXsp7IS', NULL, NULL, '2022-09-21 09:36:18', '2022-09-21 09:36:18');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `proffessionel_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `client_id`, `proffessionel_id`, `created_at`, `updated_at`) VALUES
(8, 14, 3, '2022-06-15 21:18:40', '2022-06-15 21:18:40'),
(10, 4, 3, '2022-06-15 22:50:38', '2022-06-15 22:50:38'),
(11, 14, 13, '2022-06-15 21:18:40', '2022-06-15 21:18:40'),
(12, 4, 13, '2022-06-15 22:50:38', '2022-06-15 22:50:38'),
(13, 2, 1, '2022-06-19 16:44:50', '2022-06-19 16:44:50'),
(17, 1, 3, '2022-06-25 10:55:06', '2022-06-25 10:55:06');

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `feedback`
--

INSERT INTO `feedback` (`id`, `fullname`, `email`, `phone`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Foulen ben Foulen', 'foulen.ben.foulen@gmail.com', '22222222', 'test feedback test feedback test feedback test feedback test feedback test feedback test feedback test feedback                                 test feedback test feedback test feedback test feedback test feedback                              ', '2022-05-18 19:26:42', NULL),
(2, 'test', 'test@test.com', '56619733', 'test test test test', '2022-05-19 04:07:51', '2022-05-19 04:07:51'),
(3, 'rim', 'Rima.koukii@gmail.com', '22222', 'ghhyy', '2022-06-24 07:43:10', '2022-06-24 07:43:10'),
(4, 'faten', 'faten@gmail.com', '3456678', 'fjhg', '2022-06-24 13:30:56', '2022-06-24 13:30:56');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_17_153657_create_client_table', 1),
(6, '2022_05_17_154049_create_professionnel_table', 1),
(7, '2022_05_17_154258_create_category_table', 1),
(8, '2022_05_17_154306_create_sub_category_table', 1),
(9, '2022_05_17_154419_create_reclamation_table', 1),
(10, '2022_05_17_154649_create_rating_table', 1),
(11, '2022_05_17_154758_create_feed_back_table', 1),
(12, '2022_05_17_154901_create_admin_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `professionel_cateogry`
--

CREATE TABLE `professionel_cateogry` (
  `id` int(11) NOT NULL,
  `category_id` char(36) NOT NULL,
  `professionel_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `professionel_cateogry`
--

INSERT INTO `professionel_cateogry` (`id`, `category_id`, `professionel_id`) VALUES
(1, '3', '1'),
(4, '3', '2'),
(5, '7', '2'),
(6, '3', '2'),
(7, '7', '2'),
(8, '3', '2'),
(9, '7', '2'),
(10, '2', '3'),
(11, '4', '3'),
(12, '4', '4'),
(13, '3', '4'),
(14, '10', '4'),
(15, '12', '2'),
(16, '2', '12'),
(17, '2', '13'),
(18, '4', '14'),
(19, '13', '15');

-- --------------------------------------------------------

--
-- Structure de la table `professionnels`
--

CREATE TABLE `professionnels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_completed` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professionnels`
--

INSERT INTO `professionnels` (`id`, `uid`, `first_name`, `last_name`, `adress`, `phone`, `birthday`, `gender`, `image`, `status`, `cin`, `email`, `parent_id`, `deleted_at`, `password`, `remember_token`, `created_at`, `updated_at`, `picture`, `has_completed`) VALUES
(1, NULL, 'foulen', 'Ben foulen', 'Sousse', '56619711', '27-02-1990', 'male', 'avatar.png', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, 0),
(2, NULL, 'Kyle', 'Hoeger', '2706 Hartmann Harbor', '773-874-4738', '2022-07-23', 'famme', '202206180340288437175_1414387939037607_4999937792287766705_n.png', 'verified', 'North Keenan', 'your.email+fakedata61459@gmail.com', '3', '2022-06-24 08:03:22', 'NO LOGIN', NULL, '2022-06-18 01:40:40', '2022-06-24 08:03:22', NULL, 0),
(3, NULL, 'TEST', 'PROF', 'Sousse', '12345600', '1977-06-19', 'homme', '202206191600or1.png', 'verified', '12841131', 'onsibenattia@gmail.com', '6', NULL, 'NO LOGIN', NULL, '2022-06-19 15:00:39', '2022-06-21 17:08:35', NULL, 0),
(4, NULL, 'TEST', 'PROF', 'Sousse', '23477988', '2022-06-17', 'famme', '202206211838ddd.png', 'verified', '234567865', 'OOIt@jar.com', '17', NULL, 'NO LOGIN', NULL, '2022-06-21 17:38:48', '2022-06-21 17:38:48', NULL, 0),
(6, NULL, 'mounir', 'mohamed', 'Sousse', '12345678', '2022-06-25', 'homme', '202206240906r.jpg', 'verified', '128411', 'mohamed@gmail.com', '17', NULL, 'NO LOGIN', NULL, '2022-06-24 08:06:09', '2022-06-24 08:06:09', NULL, 0),
(12, NULL, 'TEST', 'RIM', 'Sousse', '54240725', '1997-01-25', 'famme', '202206241420kll.png', 'verified', '123', 'rima@gmail.com', '17', NULL, 'NO LOGIN', NULL, '2022-06-24 13:20:35', '2022-06-24 13:20:35', NULL, 0),
(13, NULL, 'bb', 'mohamed', 'Sousse', '1234567', '1999-06-24', 'homme', '202206242003hai.jpg', 'verified', '12344', 'mounir@gmail.com', '17', NULL, 'NO LOGIN', NULL, '2022-06-24 19:03:33', '2022-06-24 19:03:33', NULL, 0),
(14, NULL, 'jarrar', 'faten', 'monastir', '3345667', '1997-06-08', 'famme', '202206242007rima.jpg', 'verified', '1111111', 'faten@gmail.com', '17', NULL, 'NO LOGIN', NULL, '2022-06-24 19:07:48', '2022-06-24 19:07:48', NULL, 0),
(15, NULL, 'benabdallah', 'samia', 'Sousse', '2323240725', '2022-06-25', 'famme', '202206251148r.jpg', 'verified', '00000000000000000000000', 'samia@gmail.com', '17', NULL, 'NO LOGIN', NULL, '2022-06-25 10:48:22', '2022-06-25 10:48:22', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proffessionnel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `rating`, `proffessionnel_id`, `created_at`, `updated_at`) VALUES
(1, '1', '4', '1', '2022-06-18 01:16:37', '2022-06-18 01:16:37'),
(2, '1', '4', '12', '2022-06-24 18:43:05', '2022-06-24 18:43:05'),
(3, '1', '5', '3', '2022-06-24 18:43:29', '2022-06-24 18:43:29'),
(4, '1', '3', '4', '2022-06-24 18:51:20', '2022-06-24 18:51:20'),
(5, '1', '2', '13', '2022-06-25 10:42:30', '2022-06-25 10:42:30'),
(6, '1', '3', '15', '2022-06-25 10:50:45', '2022-06-25 10:50:45'),
(7, '1', '2', '14', '2022-06-25 11:12:32', '2022-06-25 11:12:32');

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--

CREATE TABLE `reclamations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proffessionnel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reclamations`
--

INSERT INTO `reclamations` (`id`, `user_id`, `content`, `proffessionnel_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'test reclamation', '1', 'Resolu', '2022-05-18 19:28:36', '2022-06-19 14:32:34'),
(2, '1', 'reclamation 2 ', '1', 'Non Resolu', '2022-05-18 19:28:36', '2022-05-18 22:48:55');

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `icon`, `parent_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'mecanicien', '151836.png', '2', NULL, '2022-05-19 00:11:15', '2022-05-19 00:11:36'),
(3, 'maquillage', '3129443.png', '6', NULL, '2022-05-19 21:09:38', '2022-05-19 21:14:24'),
(4, 'plombier', '312971.png', '2', NULL, '2022-05-19 00:11:15', '2022-05-19 00:11:36'),
(5, 'macon', '2421985.png', '2', NULL, '2022-05-19 00:11:15', '2022-05-19 00:11:36'),
(6, 'cheveux', '1689760.png', '6', NULL, '2022-05-19 21:09:38', '2022-05-19 21:14:24'),
(7, 'taxi', 'taxi.png', '7', NULL, '2022-05-19 21:09:38', '2022-05-19 21:14:24'),
(8, 'chauffeur personnel', 'chauff_pers.png', '7', NULL, '2022-05-19 21:09:38', '2022-05-19 21:14:24'),
(9, 'test', '202206191523', '8', NULL, '2022-06-19 14:23:01', '2022-06-19 14:23:01'),
(10, 'frigoriste', '202206191856', '9', NULL, '2022-06-19 17:56:22', '2022-06-19 17:56:22'),
(11, 'menuisier', '202206211816', '10', NULL, '2022-06-21 17:16:41', '2022-06-21 17:16:41'),
(12, 'maçon', '202206211820', '10', NULL, '2022-06-21 17:20:48', '2022-06-21 17:20:48'),
(13, 'baby sitter', '202206232108', '11', NULL, '2022-06-23 20:08:54', '2022-06-23 20:08:54'),
(14, 'chef', '202207031025', '15', NULL, '2022-07-03 09:25:50', '2022-07-03 09:25:50');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'client@test.com', NULL, '$2a$08$q9sCKMQEwFxUNvOq05eeKuu8QdqZDLGYWF11Rz3QBTqp7U4WrOmQ2', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD UNIQUE KEY `admin_phone_unique` (`phone`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_cin_unique` (`cin`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `professionnels`
--
ALTER TABLE `professionnels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professionnels_cin_unique` (`cin`),
  ADD UNIQUE KEY `professionnels_email_unique` (`email`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `professionnels`
--
ALTER TABLE `professionnels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
