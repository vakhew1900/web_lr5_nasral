-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 08 2023 г., 18:36
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `electronic_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `electronics`
--

CREATE TABLE `electronics` (
  `electronic_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `cost` int(10) UNSIGNED NOT NULL,
  `img_path` varchar(60) NOT NULL DEFAULT 'no_img.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `electronics`
--

INSERT INTO `electronics` (`electronic_id`, `name`, `stock_id`, `description`, `cost`, `img_path`) VALUES
(1, 'ASUS TUF Gaming F15 FX506HCB-US51', 5, 'Ноутбук игровой ASUS TUF Gaming F15 FX506HCB-US51', 68756, 'game_notebook.jpg'),
(2, 'Haier 50 Smart TV AX Pro', 1, 'Телевизор Haier 50 Smart TV AX Pro ', 40567, 'tv_1.jpg'),
(3, 'Apple iPhone 14 Pro 128GB Deep Purple', 8, 'Смартфон Apple iPhone 14 Pro 128GB Deep Purple', 108564, 'iphone.webp'),
(4, 'Apple MacBook Air 13 M2 8c/8c 8/256GB Silver (MLXY3)', 3, 'Ноутбук Apple MacBook Air 13 M2 8c/8c 8/256GB Silver (MLXY3)', 109900, 'macbook-1.png'),
(5, 'Apple MacBook Air 13 M1/8/256 Gold (MGND3)', 4, 'Ноутбук Apple MacBook Air 13 M1/8/256 Gold (MGND3)', 80678, 'macbook-2.webp'),
(6, 'ASUS TUF Gaming A15 FA506IHR-US51 90NR07G6-M004F0', 1, 'Ноутбук игровой ASUS TUF Gaming A15 FA506IHR-US51 90NR07G6-M004F0', 78970, 'game-notebook.webp'),
(10, 'Xiaomi Redmi Note 10 Pro 128GB Onyx Gray', 10, 'Смартфон Xiaomi Redmi Note 10 Pro 128GB Onyx Gray', 24000, 'smartphone.jpg'),
(11, 'Samsung Galaxy S23 128GB Cream (SM-S911/DS)', 6, 'Смартфон Samsung Galaxy S23 128GB Cream (SM-S911/DS)', 45678, 'samsung.jpg'),
(12, 'Haier 32 Smart TV MX', 4, 'Телевизор Haier 32 Smart TV MX', 14678, 'tv_2.webp'),
(13, 'Samsung UE50BU8000U', 1, 'Телевизор Samsung UE50BU8000U', 58676, 'tv_3.webp'),
(14, 'Haier 32 Smart TV S1', 7, 'Телевизор Haier 32 Smart TV S1', 34567, 'tv_4.webp'),
(15, 'Haier HW70-BP12969AS', 10, 'Стиральная машина узкая Haier HW70-BP12969AS', 45676, 'genshin.webp'),
(16, 'Haier HW80-BP14979', 7, 'Стиральная машина узкая Haier HW80-BP14979', 60000, 'genshin_2.webp'),
(18, ' Haier HW70-BP12969A', 6, 'Стиральная машина узкая Haier HW70-BP12969A', 50000, 'genshin_3.webp'),
(19, 'Xiaomi 13 Lite 8/256GB Black', 1, 'Смартфон Xiaomi 13 Lite 8/256GB Black', 40000, 'xiaomi.webp'),
(20, 'Xiaomi 13 Lite 8/256GB Blue', 8, 'Смартфон Xiaomi 13 Lite 8/256GB Blue', 40000, 'xiaomi_2.webp'),
(21, 'Xiaomi 13 Lite 8/256GB Pink', 5, 'Смартфон Xiaomi 13 Lite 8/256GB Pink', 40000, 'xiaomi_3.webp'),
(22, 'Xiaomi Mi Smart Band 7 Pro Black (BHR5970GL)', 9, 'Фитнес-трекер Xiaomi Mi Smart Band 7 Pro Black (BHR5970GL)', 5999, 'clock.webp'),
(23, 'Xiaomi Smart Band 7 Pro White (BHR6076GL)', 1, 'Фитнес-трекер Xiaomi Smart Band 7 Pro White (BHR6076GL)', 6000, 'clock_2.webp'),
(24, 'Galaxy S23 Ultra 256GB Cream (SM-S918/DS)', 4, 'Смартфон Samsung Galaxy S23 Ultra 256GB Cream (SM-S918/DS)', 110000, 'sasung.webp');

-- --------------------------------------------------------

--
-- Структура таблицы `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `stocks`
--

INSERT INTO `stocks` (`stock_id`, `description`) VALUES
(1, 'Скидка 50% на товар того же производителя'),
(2, 'Скидка 40% на товар того же производителя'),
(3, 'Скидка до 3000 рублей на следующий  товар'),
(4, 'Скидка до 5000 рублей на следующий  товар'),
(5, 'Новогодняя распродажа.'),
(6, 'Распродажа к Международному женскому дню.'),
(7, 'Распродажа к 23 февраля'),
(8, 'Распродажа к 14 февраля'),
(9, 'Скидка 40%'),
(10, 'Скидка 10%');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `electronics`
--
ALTER TABLE `electronics`
  ADD PRIMARY KEY (`electronic_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Индексы таблицы `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `electronics`
--
ALTER TABLE `electronics`
  MODIFY `electronic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `electronics`
--
ALTER TABLE `electronics`
  ADD CONSTRAINT `electronics_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`stock_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
