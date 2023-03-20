-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 09 2021 г., 22:40
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dimm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dimms`
--

CREATE TABLE `dimms` (
  `id` int(11) NOT NULL,
  `SKU` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_null',
  `Vendor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_null',
  `oscillation` smallint(4) NOT NULL,
  `amount` tinyint(2) NOT NULL,
  `price` double DEFAULT NULL,
  `type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dimms`
--

INSERT INTO `dimms` (`id`, `SKU`, `Vendor`, `oscillation`, `amount`, `price`, `type`) VALUES
(1, 'PVS48G300C6', 'Patriot', 3000, 8, 6000, 1),
(2, 'H5AN4G8NAFR-TFC', 'Hynix', 2400, 8, 5500, 1),
(3, 'F4-3200C16D-16GSXFB', 'G.Skill', 3200, 16, 10000, 1),
(11, 'fd312783612hg', 'operativka', 3500, 33, 4000, 1),
(12, 'gfhfgh', 'operativka', 1600, 8, 3000, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `memory_type`
--

CREATE TABLE `memory_type` (
  `id_type` int(11) NOT NULL,
  `memory_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `memory_type`
--

INSERT INTO `memory_type` (`id_type`, `memory_type`) VALUES
(1, 'DDR1'),
(2, 'DDR2'),
(3, 'DDR3'),
(4, 'DDR4');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dimms`
--
ALTER TABLE `dimms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `type` (`type`);

--
-- Индексы таблицы `memory_type`
--
ALTER TABLE `memory_type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dimms`
--
ALTER TABLE `dimms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `memory_type`
--
ALTER TABLE `memory_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dimms`
--
ALTER TABLE `dimms`
  ADD CONSTRAINT `dimms_ibfk_1` FOREIGN KEY (`type`) REFERENCES `memory_type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
