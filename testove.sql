-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 02 2018 г., 14:02
-- Версия сервера: 5.7.19
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testove`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'vegetables', '2018-02-28 11:22:28', '2018-02-28 11:22:28'),
(2, 'fruits', '2018-02-28 11:22:28', '2018-02-28 11:22:28'),
(3, 'berries', '2018-02-28 11:22:28', '2018-02-28 11:22:28');

-- --------------------------------------------------------

--
-- Структура таблицы `farm`
--

CREATE TABLE `farm` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `farm`
--

INSERT INTO `farm` (`id`, `name`, `description`, `location`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'farm1', 'Lorem ipsum dolor sit amet, ei prompta veritus quo, id choro dicunt vituperatoribus mel, no quaestio ullamcorper eos. Et usu veritus sensibus indoctum, cum habemus suscipit ad, probo eligendi ius ei. Te per euismod facilis2is1.', '', 1, '2018-02-28 21:45:24', '2018-03-02 00:27:29'),
(4, 'farm3', 'Lorem ipsum dolor sit amet, ei prompta veritus quo, id choro dicunt vituperatoribus mel, no quaestio ullamcorper eos. Et usu veritus sensibus indoctum, cum habemus suscipit ad, probo eligendi ius ei. Te per euismod facilisis.', '', 2, '2018-02-28 21:45:24', '2018-02-28 21:45:24'),
(5, 'farm2', 'Lorem ipsum dolor sit amet, ei prompta veritus quo, id choro dicunt vituperatoribus mel, no quaestio ullamcorper eos. Et usu veritus sensibus indoctum, cum habemus suscipit ad, probo eligendi ius ei. Te per euismod facilisis.', '', 2, '2018-02-28 21:45:24', '2018-02-28 21:45:24'),
(6, 'farm12', 'hkjhkjhkj', '', 2, '2018-03-01 23:53:37', '2018-03-01 23:53:37'),
(7, 'farm16', 'hhjk hjkh kj', '', 2, '2018-03-01 23:54:18', '2018-03-01 23:54:18'),
(9, 'farm1hgjh', 'hkjhkjh h kj h', '', 2, '2018-03-01 23:57:01', '2018-03-01 23:57:01'),
(10, 'farm17', 'gfd gdf g d', '', 2, '2018-03-02 00:00:47', '2018-03-02 00:00:47'),
(11, 'farm17', 'gfd gdf g d', '', 2, '2018-03-02 00:01:24', '2018-03-02 00:01:24'),
(12, 'sfsfsdf', 'fsdfsdf', '', 1, '2018-03-02 06:35:05', '2018-03-02 06:35:05');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2018_02_28_103819_create_rols_table', 1),
(11, '2018_02_28_105039_create_farm_table', 1),
(12, '2018_02_28_105200_create_category_table', 1),
(13, '2018_02_28_105225_create_product_table', 1),
(14, '2018_02_28_110144_create_product_slider_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `category_id`, `farm_id`, `created_at`, `updated_at`) VALUES
(1, 'Apple1', '5_95e80bb5161f41e4b81de448d346b32f.jpg.pagespeed.ce.QiM6X0kB9Q.jpg', 2, 1, '2018-02-28 22:28:57', '2018-03-02 02:01:06'),
(2, 'Apple1', 'default.jpg', 2, 1, '2018-02-28 22:29:15', '2018-02-28 22:29:15'),
(3, 'Blackberry', '75855+-.jpg', 3, 1, '2018-02-28 23:05:01', '2018-02-28 23:05:01'),
(4, 'Potato', '9a799861a9fb941527d3411670feb45a.jpg', 1, 1, '2018-02-28 23:10:55', '2018-02-28 23:10:55'),
(5, 'Beet', '573157911_w0_h0_942c2fae4106a0__9ba2d_big.jpeg', 1, 1, '2018-02-28 23:17:02', '2018-02-28 23:17:02'),
(6, 'gfdgdfg', 'apple.jpg', 2, 1, '2018-03-02 01:28:06', '2018-03-02 01:28:06'),
(9, 'Apple1', '5_95e80bb5161f41e4b81de448d346b32f.jpg.pagespeed.ce.QiM6X0kB9Q.jpg', 2, 1, '2018-02-28 22:28:57', '2018-03-02 02:01:06'),
(10, 'Apple1', 'default.jpg', 2, 1, '2018-02-28 22:29:15', '2018-02-28 22:29:15'),
(11, 'Potato', '9a799861a9fb941527d3411670feb45a.jpg', 1, 1, '2018-02-28 23:10:55', '2018-02-28 23:10:55'),
(12, 'Apple1', 'default.jpg', 2, 1, '2018-02-28 22:29:15', '2018-02-28 22:29:15'),
(13, 'Potato', '9a799861a9fb941527d3411670feb45a.jpg', 1, 1, '2018-02-28 23:10:55', '2018-02-28 23:10:55'),
(14, 'sdfsd', '5_95e80bb5161f41e4b81de448d346b32f.jpg.pagespeed.ce.QiM6X0kB9Q.jpg', 1, 12, '2018-03-02 06:35:27', '2018-03-02 06:35:27');

-- --------------------------------------------------------

--
-- Структура таблицы `product_slider`
--

CREATE TABLE `product_slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_slider`
--

INSERT INTO `product_slider` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '554826.jpg', '2018-02-28 23:36:33', '2018-02-28 23:36:33'),
(14, 5, '5_95e80bb5161f41e4b81de448d346b32f.jpg.pagespeed.ce.QiM6X0kB9Q.jpg', '2018-03-02 02:54:55', '2018-03-02 02:54:55'),
(16, 5, 'Natural-red-apple.jpg', '2018-03-02 02:56:51', '2018-03-02 02:56:51'),
(17, 5, '554826.jpg', '2018-03-02 02:56:58', '2018-03-02 02:56:58'),
(20, 1, 'apple.jpg', '2018-03-02 03:02:16', '2018-03-02 03:02:16'),
(21, 1, 'chervoni-yabluka.jpg', '2018-03-02 03:02:25', '2018-03-02 03:02:25'),
(23, 14, 'apple.jpg', '2018-03-02 06:35:51', '2018-03-02 06:35:51');

-- --------------------------------------------------------

--
-- Структура таблицы `rols`
--

CREATE TABLE `rols` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rols`
--

INSERT INTO `rols` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'farmer', '2018-02-28 11:20:29', '2018-02-28 11:20:29'),
(2, 'admin', '2018-02-28 11:20:55', '2018-02-28 11:20:55');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rols_id` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rols_id`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sasha', 'itsaninho1@gmail.com', '$2y$10$y5V7Jiiqcq/Tcz8xSA5GheeJCgeOrPaA4GSIUxSfK5WiD.caE/A4S', 2, 1, 'oPU1GyXiaCNohPEHvUQzNnTvHPRGPLHCSVo4nAt2gCXTbdtymM6fvJz9Nimq', '2018-02-28 11:14:24', '2018-02-28 11:14:24'),
(2, 'Newuser', 'Newuser@gmail.com', '$2y$10$8ezGJRNmum9Uz2M.qHFVPeI4KxjhODlkoFogNqgc9wH9FCX7qJTtW', 1, 0, '9Bz6NBzlnRQ4jNgzdGviMhvHgk6zxZJ0TxSu2KRXI08TPFoZgM9qv59NTrXq', '2018-02-28 11:23:03', '2018-02-28 11:23:03'),
(3, 'sdfsf', 'itsanidnho@gmail.com', '$2y$10$b7zxjoToZU36PN/I0MTsReGedk7oXQUDC5YKUGlP2RjCxPNQFJ74S', 1, 0, NULL, '2018-03-02 06:18:41', '2018-03-02 06:18:41'),
(4, 'sdfdsf', 'itsaninho@gmail.com', '$2y$10$L2gSWAwpkgoXnaxDlD3kWuKum145amk5DI6Q3TAO9aZVVp.ujoTNe', 1, 0, '2jKboRPawcOzbrsGMAc76HPcqb3uad', '2018-03-02 08:49:46', '2018-03-02 08:49:46');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_slider`
--
ALTER TABLE `product_slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `farm`
--
ALTER TABLE `farm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `product_slider`
--
ALTER TABLE `product_slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
