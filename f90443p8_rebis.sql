-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 05 2020 г., 19:21
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `f90443p8_rebis`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--
-- Создание: Ноя 04 2020 г., 17:21
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--
-- Создание: Ноя 04 2020 г., 17:24
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `category_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `about` varchar(90) NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--
-- Создание: Ноя 04 2020 г., 17:22
-- Последнее обновление: Ноя 05 2020 г., 14:25
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` decimal(10,2) NOT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `rejected` tinyint(1) NOT NULL,
  `address` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `timestamp`, `price`, `finished`, `rejected`, `address`) VALUES
(1, 1, '2020-11-05 14:23:53', '296.00', 0, 0, 'Пункт выдачи'),
(2, 3, '2020-11-05 14:25:33', '309.00', 0, 0, 'Пункт выдачи'),
(3, 3, '2020-11-05 14:25:54', '291.00', 0, 0, 'Пункт выдачи');

-- --------------------------------------------------------

--
-- Структура таблицы `orders_items`
--
-- Создание: Ноя 04 2020 г., 17:20
-- Последнее обновление: Ноя 05 2020 г., 14:24
--

DROP TABLE IF EXISTS `orders_items`;
CREATE TABLE `orders_items` (
  `order_id` int(10) NOT NULL,
  `goods_id` int(10) NOT NULL,
  `count` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders_status`
--
-- Создание: Ноя 04 2020 г., 17:18
--

DROP TABLE IF EXISTS `orders_status`;
CREATE TABLE `orders_status` (
  `order_id` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL,
  `comment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Ноя 04 2020 г., 15:52
-- Последнее обновление: Ноя 04 2020 г., 16:54
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `rights` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rights`) VALUES
(1, 'echigrus', '$2y$12$2yNkiGvnYiif11RgHDsHq.2q5fsdmaEvPeYfXawAlAcgujIX3uYES', 1),
(2, 'rebis_inspector', '$2y$12$dJcZHh5mnHYJZbCEtKiIiODvom9qB6L8EOnMFrkq5duqKHIk0F4SS', 1),
(3, 'rebis_user', '$2y$12$3zPVbQ20OHWBS/QR0Z7SEubkCiGB8TU6eRz4DoWD/iH.4eAO/tIQG', 0),
(4, 'Neking', '$2y$12$7Jx5.LatxTm/.LN4EmlGR.knJaJqhu0J/f969BVXBkGf.SyKQyFvu', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
