-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3310
-- Время создания: Июн 19 2023 г., 11:35
-- Версия сервера: 5.7.42
-- Версия PHP: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `petc`
--

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
(6, 'Альтаир', 1, 1, '2023-06-06', '2023-06-15 17:49:47'),
(8, 'Спайси', 2, 25, '2023-06-17', '0000-00-00 00:00:00'),
(12, 'Тор', 1, 7, '2011-01-11', '0000-00-00 00:00:00'),
(13, 'Страый волк', 1, 22, '1999-01-01', '0000-00-00 00:00:00'),
(15, 'Брайн', 1, 4, '2011-02-02', '0000-00-00 00:00:00'),
(16, 'Бигги', 2, 7, '2004-04-04', '0000-00-00 00:00:00'),
(17, 'Бэтмен', 1, 1, '2011-11-11', '0000-00-00 00:00:00'),
(24, 'БрекФаст', 1, 23, '2023-06-21', '2023-06-16 14:13:06'),
(31, 'Арбуз', 2, 23, '2020-12-12', '2023-06-16 14:18:42'),
(34, 'Карта', 2, 3, '2012-12-12', '2023-06-16 14:24:15'),
(44, 'Артас', 1, 1, '2017-12-17', '2023-06-16 15:32:40'),
(49, '$____A____$', 1, 10, '2012-12-12', '2023-06-16 15:52:12'),
(51, 'Максимус', 1, 1, '2012-12-12', '2023-06-18 17:12:20'),
(52, 'БигCAT', 2, 2, '1111-11-11', '2023-06-18 17:13:05'),
(53, 'Кофтик', 2, 2, '2021-08-19', '2023-06-19 00:41:48'),
(54, 'Барсик', 2, 7, '2023-05-31', '2023-06-19 09:45:56');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
