-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 30 2024 г., 10:11
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
  `catalog_id` int(11) DEFAULT NULL,
  `rent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `catalog_id`, `rent_id`, `created_at`) VALUES
(47, 4, 3, '2024-03-26 21:46:51'),
(48, 6, NULL, '2024-03-27 16:18:53'),
(49, 4, 3, '2024-03-27 16:52:27');

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

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `image`, `video`, `characteristics`, `description`, `price`, `category_id`) VALUES
(4, 'Каталог', '2.png', NULL, '', 'wdawdawdawd', 1500, 1),
(5, '2 ', '2.png', NULL, 'awdawdawd', 'wadawdawdawd', 1500, 2),
(6, 'VOX PATHFINDER 10', '3.png', NULL, 'Транзисторный гитарный комбо-усилитель. Мощность 10 Ватт. 1 динамик 6,5 дюймов. 1 чистый канал, 1 канал перегруза. Модель динамиков: VOX Bulldog. Габариты: 380 (Ш) х 260 (Г) х 170 (В) мм. Вес: 4,8 кг. Цвет: Черный.', 'Портативный гитарный комбоусилитель VOX PATHFINDER 10 с двумя каналами звучания компании VOX подарит отличное время практики в домашних условиях и музицирования в небольших репетиционных помещениях. Гитарный комбо поможет значительно расширить возможности как практикующих, так и начинающих гитаристов. Компактный комбо для электрогитары PATHFINDER 10 (VOX) имеет выходную мощность в 10 Вт (RMS), благодаря чему гитарист может получить достаточно громкое и качественное звучание. За мощное звучание комбо отвечает один динамик VOX Bulldog размером 6,5 дюймов. Для коммутации электрогитары используется стандартный вход с разъёмом 1/4 Jack. Купить портативный комбоусилитель для электрогитары VOX PATHFINDER 10 можно в нашем интернет магазине и в салонах продаж. Комбо предлагает идеальное сочетание качества, возможностей и уникального, мощного звучания по весьма доступной цене.', 8750, 4);

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

--
-- Дамп данных таблицы `proposal`
--

INSERT INTO `proposal` (`id`, `username`, `phone_number`, `email`, `basket_id`, `created_at`) VALUES
(51, 'Никита', '+7-(123)-918-27-39', 'qw@sd.sd', 47, '2024-03-26 21:46:51'),
(52, 'Никита', '+7-(123)-918-27-39', 'nikital9835@gmail.com', 48, '2024-03-27 16:18:53'),
(53, 'Никита', '+7-(123)-918-27-39', 'qw@sd.sd', 49, '2024-03-27 16:52:27');

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

--
-- Дамп данных таблицы `rent`
--

INSERT INTO `rent` (`id`, `name`, `image`, `video`, `characteristics`, `description`, `price`, `category_id`) VALUES
(3, 'Аренда', '2.png', NULL, '', NULL, 200, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `cookie` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD KEY `rent_id` (`rent_id`);

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
-- Индексы таблицы `session`
--
ALTER TABLE `session`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `category_catalog`
--
ALTER TABLE `category_catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `category_rent`
--
ALTER TABLE `category_rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`rent_id`) REFERENCES `rent` (`id`) ON DELETE CASCADE;

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
