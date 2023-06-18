-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Июн 19 2023 г., 00:12
-- Версия сервера: 5.7.34
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hunbow`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `lastname`, `phone`, `email`, `birthday`, `created`) VALUES
(1, 'Никита', 'Сержевский', '89192712505', 'hun_bow@mail.ru', '1995-11-17', '2023-06-15 13:05:46'),
(2, 'Екатерина', 'М', '89111111111', 'k@mail.ru', '2000-09-19', '2023-06-15 13:05:46'),
(3, 'Иван', 'Иванов', '89111111111', 'iv@mail.ru', '1999-09-19', '2023-06-15 13:05:46'),
(4, 'af', 'asdf', '+7(919)271-25-05', 'hun_bow@mail.ru', '1111-11-11', '2023-06-18 17:19:18'),
(7, 'Саша', 'Скулл', '+7 (321) 341-23-51', 'dsssf@mail.ru', '1111-11-11', '2023-06-18 17:53:03'),
(10, 'Стас', 'Михайлов', '+7 (919) 271-25-05', 'dsf@mail.ru', '1111-11-11', '2023-06-18 17:53:04'),
(12, 'Денис', 'Денисов', '+7 (123) 214-12-34', 'dddd@mail.ru', '1111-11-11', '2023-06-18 17:53:04'),
(22, 'Петр', 'Петров', '+7 (123) 421-39-50', 'hu1@mail.ru', '1111-11-11', '2023-06-18 22:43:14'),
(23, 'dsgfg', 'wfgdsfg', '+7 (234) 245-23-43', 'admin@d.ru', '0111-11-11', '2023-06-18 22:47:42'),
(24, 'овыолиы', 'ывфапыап', '+7 (324) 123-52-52', 'h2o@d.ru', '0235-12-23', '2023-06-18 22:48:46'),
(25, 'Никита', 'фыв', '+7 (123) 423-14-12', 'hhh@mail.ru', '1232-03-12', '2023-06-18 23:53:04');

-- --------------------------------------------------------

--
-- Структура таблицы `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `type_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pets`
--

INSERT INTO `pets` (`id`, `name`, `type_id`, `owner_id`, `birthday`, `created`) VALUES
(1, 'Геральд', 1, 24, '2020-06-01', '2023-06-15 15:49:47'),
(2, 'Элис', 2, 12, '2021-06-01', '2023-06-15 15:49:47'),
(3, 'Сникерс', 1, 3, '2019-06-01', '2023-06-15 15:49:47'),
(4, 'Стелла', 2, 3, '2011-02-02', '2023-06-15 15:49:47'),
(6, 'Альтаир', 1, 1, '0000-00-00', '2023-06-15 17:49:47'),
(8, 'Спайси', 2, 25, '2023-06-17', '0000-00-00 00:00:00'),
(12, 'Черный Боб', 1, 7, '2011-01-11', '0000-00-00 00:00:00'),
(13, 'Страый волк', 1, 1, '1999-01-01', '0000-00-00 00:00:00'),
(15, 'Брайн', 1, 2, '2011-02-02', '0000-00-00 00:00:00'),
(16, 'Бигги', 2, 7, '2004-04-04', '0000-00-00 00:00:00'),
(17, 'Бэтмен', 1, 1, '2011-11-11', '0000-00-00 00:00:00'),
(24, 'БрекФаст', 1, 23, '2023-06-21', '2023-06-16 14:13:06'),
(31, 'АрбузЗЗЗ', 2, 23, '2020-12-12', '2023-06-16 14:18:42'),
(32, 'Калаш', 2, 3, '2004-12-12', '2023-06-16 14:21:00'),
(33, 'Дрын', 1, 2, '2011-12-12', '2023-06-16 14:22:34'),
(34, 'Карта', 2, 3, '2012-12-12', '2023-06-16 14:24:15'),
(44, 'Артас Меленил', 1, 1, '2017-12-17', '2023-06-16 15:32:40'),
(49, '$____A____$', 1, 22, '2012-12-12', '2023-06-16 15:52:12'),
(50, 'Альтаир', 1, 2, '1212-12-12', '2023-06-18 14:38:19'),
(51, 'Максимус', 1, 1, '2012-12-12', '2023-06-18 17:12:20'),
(52, 'БигС', 2, 2, '1111-11-11', '2023-06-18 17:13:05');

-- --------------------------------------------------------

--
-- Структура таблицы `pet_types`
--

CREATE TABLE `pet_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pet_types`
--

INSERT INTO `pet_types` (`id`, `type_name`) VALUES
(1, 'Собака'),
(2, 'Кошка');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pet_types`
--
ALTER TABLE `pet_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `pet_types`
--
ALTER TABLE `pet_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
