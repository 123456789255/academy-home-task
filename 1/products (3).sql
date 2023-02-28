-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 22 2023 г., 18:44
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rjhbtfnn_m1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `year` int NOT NULL,
  `category` enum('laser','inkjet','thermal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `year`, `category`, `in_stock`, `description`, `model`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Принтер1', 'minecraft.jpg', 1000, 2023, 'laser', 1, 'Описание товара фыофыаподрвапзэоЫа', '2002', 3, '2023-01-31 23:21:46', '2023-01-31 23:21:49'),
(2, 'Принтер2', 'minecraft.jpg', 14000, 2022, 'inkjet', 1, 'Описание товара фыофыаподрвапзэоЫа', '2020', 5, '2023-02-01 23:21:46', '2023-02-01 23:21:49'),
(3, 'Принтер3', 'minecraft.jpg', 2000, 2021, 'thermal', 1, 'Описание товара фыофыаподрвапзэоЫа', '2015', 11, '2023-02-02 23:21:46', '2023-02-02 23:21:49'),
(4, 'Принтер4', 'minecraft.jpg', 19000, 2020, 'laser', 1, 'Описание товара фыофыаподрвапзэоЫа', '2010', 4, '2023-02-03 23:21:46', '2023-02-03 23:21:49'),
(5, 'Принтер5', 'minecraft.jpg', 1000, 2023, 'laser', 1, 'Описание товара фыофыаподрвапзэоЫа', '2002', 3, '2023-02-04 23:21:46', '2023-02-04 23:21:49'),
(6, 'Принтер6', 'minecraft.jpg', 14000, 2022, 'inkjet', 1, 'Описание товара фыофыаподрвапзэоЫа', '2020', 5, '2023-02-05 23:21:46', '2023-02-05 23:21:49'),
(7, 'Принтер7', 'minecraft.jpg', 2000, 2021, 'thermal', 1, 'Описание товара фыофыаподрвапзэоЫа', '2015', 11, '2023-02-06 23:21:46', '2023-02-06 23:21:49'),
(8, 'Принтер8', 'minecraft.jpg', 19000, 2020, 'laser', 1, 'Описание товара фыофыаподрвапзэоЫа', '2010', 4, '2023-02-07 23:21:46', '2023-02-07 23:21:49');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
