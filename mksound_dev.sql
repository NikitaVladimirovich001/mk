-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 01 2024 г., 19:17
-- Версия сервера: 10.5.17-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mksound_dev`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `catalog_id` int(11) DEFAULT NULL,
  `rent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `video` varchar(256) DEFAULT NULL,
  `characteristics` text NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category_catalog`
--

CREATE TABLE `category_catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_catalog`
--

INSERT INTO `category_catalog` (`id`, `name`) VALUES
(1, 'Аксессуары для музыкантов'),
(2, 'Стойки'),
(3, 'Звуковое оборудование'),
(4, 'Студийное оборудование'),
(5, 'Сетевое оборудование');

-- --------------------------------------------------------

--
-- Структура таблицы `category_rent`
--

CREATE TABLE `category_rent` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_rent`
--

INSERT INTO `category_rent` (`id`, `name`) VALUES
(1, 'Стойка'),
(2, 'Звуковое оборудование');

-- --------------------------------------------------------

--
-- Структура таблицы `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `phone_number` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `basket_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `video` varchar(256) DEFAULT NULL,
  `characteristics` text NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `cookie` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `cookie`, `created_at`) VALUES
(45, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 13:43:53'),
(46, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 13:48:49'),
(47, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 13:50:38'),
(48, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 13:52:05'),
(49, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 14:00:03'),
(50, 'a:3:{i:0;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}i:1;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 14:09:08'),
(51, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 14:10:07'),
(52, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 14:11:12'),
(53, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 14:11:51'),
(54, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 14:12:59'),
(55, 'a:2:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 14:14:11'),
(56, 'a:2:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 14:20:05'),
(57, 'a:3:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 14:23:46'),
(58, 'a:4:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}i:3;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 14:25:15'),
(59, 'a:4:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}i:3;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 14:26:41'),
(60, 'a:4:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}i:3;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 14:30:23'),
(61, 'a:2:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 15:01:02'),
(62, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 15:04:02'),
(63, 'a:4:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}i:3;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 15:05:37'),
(64, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 15:10:01'),
(65, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 15:13:27'),
(66, 'a:3:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 15:26:57'),
(67, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 15:29:47'),
(68, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 15:30:28'),
(69, 'a:3:{i:0;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 15:38:26'),
(70, 'a:3:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 15:39:21'),
(71, 'a:3:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 15:43:37'),
(72, 'a:3:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 15:49:56'),
(73, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"3\";s:4:\"type\";s:4:\"rent\";}}', '2024-03-31 15:50:32'),
(74, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 15:51:21'),
(75, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 15:52:38'),
(76, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 16:00:37'),
(77, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 16:01:31'),
(78, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 16:04:08'),
(79, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 16:10:49'),
(80, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 16:13:01'),
(81, 'a:1:{i:0;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}}', '2024-03-31 16:15:05'),
(82, 'a:3:{i:0;a:2:{s:2:\"id\";s:1:\"4\";s:4:\"type\";s:7:\"catalog\";}i:1;a:2:{s:2:\"id\";s:1:\"5\";s:4:\"type\";s:7:\"catalog\";}i:2;a:2:{s:2:\"id\";s:1:\"6\";s:4:\"type\";s:7:\"catalog\";}}', '2024-04-01 11:23:34');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'qwe123!', '2024-03-25 12:02:53');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_id` (`catalog_id`),
  ADD KEY `rent_id` (`rent_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `category_catalog`
--
ALTER TABLE `category_catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_rent`
--
ALTER TABLE `category_rent`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basket_id` (`basket_id`);

--
-- Индексы таблицы `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `category_catalog`
--
ALTER TABLE `category_catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `category_rent`
--
ALTER TABLE `category_rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT для таблицы `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`rent_id`) REFERENCES `rent` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_ibfk_3` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `catalog_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_catalog` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`basket_id`) REFERENCES `basket` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_rent` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
