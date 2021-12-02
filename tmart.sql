-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 02 2021 г., 01:28
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tmart`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE `auto` (
  `id_auto` int(11) NOT NULL,
  `title_auto` varchar(255) NOT NULL,
  `desc_auto` varchar(999) NOT NULL,
  `class_auto` varchar(255) NOT NULL,
  `oldprice_auto` varchar(255) NOT NULL,
  `newprice_auto` varchar(255) NOT NULL,
  `cover_auto` varchar(255) NOT NULL,
  `slider1_auto` varchar(255) NOT NULL,
  `slider2_auto` varchar(255) NOT NULL,
  `slider3_auto` varchar(255) NOT NULL,
  `link_auto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`id_auto`, `title_auto`, `desc_auto`, `class_auto`, `oldprice_auto`, `newprice_auto`, `cover_auto`, `slider1_auto`, `slider2_auto`, `slider3_auto`, `link_auto`) VALUES
(1, 'Mercedes-Benz GL-Class', 'Серия полноразмерных кроссоверов люкс-класса от немецкой компании Mercedes-Benz. В                                иерархии классов компании стоит выше M/GLE-класса и является флагманом в линейке                                кроссоверов марки. Включает три поколения автомобилей: X164, выпускавшегося с 2006 по                                2012 год, X166, продажи которого начались в 2012 году и X167, который выпускается с 2020                                года.', 'gl', '50000', '45000', 'gl_1.png', 'gl_2.jpg', 'gl_3.jpg', 'gl_4.jpg', 'https://www.youtube.com/watch?v=HSTex8ej16s'),
(2, 'Mercedes-Benz CLS-Class', 'Mercedes-Benz CLS — представительский седан, или четырехдверное купе, созданное на основе E-Class. В 2010-м появилось второе поколение (C218), а в 2014-м компания Mercedes-Benz представила обновленное семейство CLS 2015 модельного года. Рестайлинговый седан CLS-Class отличается слегка освеженной внешностью, рядом изменений в интерьере, модернизированной силовой частью и дополнительными опциями.', 'cls', '99000', '89000', 'cls_1.jpg', 'cls_2.jpg', 'cls_3.jpg', 'cls_4.jpg', 'https://www.youtube.com/watch?v=Xvqknnazaxk'),
(3, 'Mercedes-Benz GLE Coupe', 'В апреле 2014 года компания Mercedes-Benz представила на открывшемся в Пекине автосалоне прототип нового кроссовера. Используя название Concept Coupe SUV, сам автопроизводитель подчеркивал то, что данная модель не просто кроссовер, а четырехдверное купе с постоянным полным приводом 4MATIC.', 'gle', '87000', '66000', 'gle_1.png', 'gle_2.jpg', 'gle_3.jpg', 'gle_4.jpg', 'https://www.youtube.com/watch?v=1_x0ksCXAEs'),
(4, 'Mercedes-Benz S-Class', 'В 2009 году Mercedes-Benz S-Class W221 подвергся рестайлингу. Презентация S-Class 2010 модельного года состоялась в апреле в Штутгарте. Обновленную модель легко узнать по следующим признакам. Изменились вырезы воздухозаборников в бампере, на месте прежних противотуманок появились светодиодные секции.', 's', '73000', '12000', 's_1.png', 's_2.jpg', 's_3.jpg', 's_4.jpg', 'https://www.youtube.com/watch?v=Gy1YSoanDu8');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_auto`) VALUES
(73, 15, 1),
(89, 16, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `name_order` varchar(255) NOT NULL,
  `fam_order` varchar(255) NOT NULL,
  `mail_order` varchar(255) NOT NULL,
  `phone_order` varchar(255) NOT NULL,
  `desc_order` varchar(255) NOT NULL,
  `city_order` varchar(255) NOT NULL,
  `address_order` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `name_order`, `fam_order`, `mail_order`, `phone_order`, `desc_order`, `city_order`, `address_order`) VALUES
(10, 'Николай', 'Вихров', 'vikhrov-1972@mail.ru', '+79294308779', 'Цвет серый', 'Иркутск', 'Ядринцева 90');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `is_admin`) VALUES
(15, 'blackadmin', '$2y$10$cfbe7QbLEWdMta.qfYbERei9R4g67uhQCzjcC/jq.oJw711bxa3aq', '2021-11-29 11:45:21', 1),
(16, 'testuser', '$2y$10$4Bw1sdrAC1v8fNKWewVXnOd6F6fRbtNU/v9bFN4cLMo3tUBO.kSVy', '2021-11-29 11:46:24', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id_auto`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_auto` (`id_auto`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

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
-- AUTO_INCREMENT для таблицы `auto`
--
ALTER TABLE `auto`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_auto`) REFERENCES `auto` (`id_auto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
