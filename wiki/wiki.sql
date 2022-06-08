-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 07 2017 г., 11:35
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wiki`
--

-- --------------------------------------------------------

--
-- Структура таблицы `body_car`
--

CREATE TABLE IF NOT EXISTS `body_car` (
  `id_body` int(11) NOT NULL,
  `type_body` varchar(100) DEFAULT NULL,
  `door_col_body` int(11) DEFAULT NULL,
  `place_col_body` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Характеристики кузова автомобиля';

--
-- Дамп данных таблицы `body_car`
--

INSERT INTO `body_car` (`id_body`, `type_body`, `door_col_body`, `place_col_body`) VALUES
(1, 'Седан', 2, 5),
(2, 'Седан', 4, 5),
(3, 'Седан', 4, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_img`) VALUES
(1, 'Acura', 'images/brand/acura.png'),
(2, 'Alfa-Romeo', 'images/brand/alfa-romeo.png'),
(3, 'Aston-Martin', 'images/brand/aston-martin1.png'),
(4, 'Audi', 'images/brand/audi1.png');

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `car_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `model_name` varchar(255) NOT NULL,
  `model_img` varchar(255) NOT NULL DEFAULT '/images/models/default.png',
  `content` blob,
  `date_product` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_body` int(11) DEFAULT NULL,
  `id_size` int(11) DEFAULT NULL,
  `engine_id` int(11) DEFAULT NULL,
  `dynamics_id` int(11) DEFAULT NULL,
  `transmission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`car_id`, `brand_id`, `country_id`, `model_name`, `model_img`, `content`, `date_product`, `id_body`, `id_size`, `engine_id`, `dynamics_id`, `transmission_id`) VALUES
(1, 1, 2, 'CSX', 'images/models/acura/acura_csx.png', 0x3c703ed0b0d183d0b0d18364776564776446444546453c2f703e0d0a, '2005 - н.в.', 1, 1, 1, 1, 1),
(2, 1, 2, 'TSX', 'images/models/acura/acura_tsx.jpg', 0x3c703e41637572612054535820d0b2d182d0bed180d0bed0b3d0be20d0bfd0bed0bad0bed0bbd0b5d0bdd0b8d18f20d18fd0b2d0bbd18fd0b5d182d181d18f20d181d0b5d0b2d0b5d180d0bed0b0d0bcd0b5d180d0b8d0bad0b0d0bdd181d0bad0bed0b920d0b2d0b0d180d0b8d0b0d186d0b8d0b5d0b920d0bdd0b020d182d0b5d0bcd18320d0a5d0bed0bdd0b4d0bed0b2d181d0bad0bed0b3d0be20d090d0bad0bad0bed180d0b4d0b020d0b2d0bed181d18cd0bcd0bed0b3d0be20d0bfd0bed0bad0bed0bbd0b5d0bdd0b8d18f2e3c2f703e0d0a, '2008 - н.в.', 2, 2, 2, 2, 2),
(3, 1, 2, 'TL', 'images/models/acura/acura_tl.png', 0x3c703ed091d18bd181d182d180d18bd0b520d0b820d0bad0bed0bcd184d0bed180d182d0b0d0b1d0b5d0bbd18cd0bdd18bd0b520d181d0bfd0bed180d182d0b8d0b2d0bdd18bd0b520d181d0b5d0b4d0b0d0bdd18b20544c20d181d183d189d0b5d181d182d0b2d0b5d0bdd0bdd0be20d0bed182d0bbd0b8d187d0b0d18ed182d181d18f20d0bed18220d181d0b2d0bed0b5d0b3d0be20d18fd0bfd0bed0bdd181d0bad0bed0b3d0be20d0b0d0bdd0b0d0bbd0bed0b3d0b0266e6273703b486f6e646120496e7370697265266e6273703bd0bad0b0d0ba20d0b2d0bdd0b5d188d0bdd0b8d0bc20d0b2d0b8d0b4d0bed0bc2c20d182d0b0d0ba20d0b820d0b0d0b3d180d0b5d0b3d0b0d182d0bdd0bed0b920d187d0b0d181d182d18cd18e2e20d09dd0b020d0b1d0b0d0b7d0bed0b2d183d18e20d0bcd0bed0b4d0b5d0bbd18c20544c20d183d181d182d0b0d0bdd0b0d0b2d0bbd0b8d0b2d0b0d18ed18220332c352dd0bbd0b8d182d180d0bed0b2d18bd0b920d0b4d0b2d0b8d0b3d0b0d182d0b5d0bbd18c20563620d0bcd0bed189d0bdd0bed181d182d18cd18e2032383020d0bb2ed1812e2c20d0b020d0bdd0b020d181d0bfd0bed180d182d0b8d0b2d0bdd183d18e20d0bcd0bed0b4d0b8d184d0b8d0bad0b0d186d0b8d18e20544c2054797065205320266d646173683b203330352dd181d0b8d0bbd18cd0bdd18bd0b920d0bcd0bed182d0bed18020d180d0b0d0b1d0bed187d0b8d0bc20d0bed0b1d18ad0b5d0bcd0bed0bc20332c3720d0bb2e20d0a1d182d0b0d0bdd0b4d0b0d180d182d0bdd18bd0bc20d0b4d0bbd18f20d0b2d181d0b5d18520d0bcd0bed0b4d0b5d0bbd0b5d0b920d18fd0b2d0bbd18fd0b5d182d181d18f20d0b3d0b8d0b4d180d0bed0bcd0b5d185d0b0d0bdd0b8d187d0b5d181d0bad0b8d0b920352d20d0b8d0bbd0b820362dd181d182d183d0bfd0b5d0bdd187d0b0d182d18bd0b920d0b0d0b4d0b0d0bfd182d0b8d0b2d0bdd18bd0b920266c6171756f3bd0b0d0b2d182d0bed0bcd0b0d18226726171756f3b2c20d0bdd0be20d0bdd0b02054797065205320d0bfd0bed0b420d0b7d0b0d0bad0b0d0b720d0b2d0bed0b7d0bcd0bed0b6d0bdd0b020d183d181d182d0b0d0bdd0bed0b2d0bad0b020d0bed0b1d18bd187d0bdd0bed0b920362dd181d182d183d0bfd0b5d0bdd187d0b0d182d0bed0b920d0bcd0b5d185d0b0d0bdd0b8d187d0b5d181d0bad0bed0b920d0bad0bed180d0bed0b1d0bad0b82e20d0a3d0b6d0b520d0b220d0b1d0b0d0b7d0bed0b2d0bed0b920d0bad0bed0bcd0bfd0bbd0b5d0bad182d0b0d186d0b8d0b820d181d0b5d0b4d0b0d0bdd18b20544c20d181d182d0bed0b8d0bcd0bed181d182d18cd18e20d0bed1822024333336353020d0b8d0bcd0b5d18ed18220d0bed181d0bdd0b0d189d0b5d0bdd0b8d0b520d0bad0bbd0b0d181d181d0b020266c6171756f3bd0bbd18ed0bad18126726171756f3b2e20d09220d0bdd0b5d0b520d0b2d185d0bed0b4d0b8d1822c20d0bdd0b0d0bfd180d0b8d0bcd0b5d1802c20d0bed182d0b4d0b5d0bbd0bad0b020d181d0b0d0bbd0bed0bdd0b020d0b820d181d0b8d0b4d0b5d0bdd0b8d0b920d0bfd0b5d180d184d0bed180d0b8d180d0bed0b2d0b0d0bdd0bdd0bed0b920d0bad0bed0b6d0b5d0b92c20d0bfd0b5d180d0b5d0b4d0bdd0b8d0b520d181d0b8d0b4d0b5d0bdd18cd18f20d18120d18dd0bbd0b5d0bad182d180d0bed0bfd180d0b8d0b2d0bed0b4d0b0d0bcd0b820d180d0b5d0b3d183d0bbd0b8d180d0bed0b2d0bed0ba20d0b820d0bcd0bdd0bed0b3d0bed0b520d0b4d180d183d0b3d0bed0b52e266e6273703b3c2f703e0d0a, '2008 - н.в.', 3, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id_country` int(11) NOT NULL,
  `name_country` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id_country`, `name_country`) VALUES
(1, 'Япония'),
(2, 'Канада'),
(3, 'США'),
(4, 'Германия');

-- --------------------------------------------------------

--
-- Структура таблицы `dynamics_car`
--

CREATE TABLE IF NOT EXISTS `dynamics_car` (
  `dynamics_id` int(11) NOT NULL,
  `dynamics_max_speed` varchar(100) DEFAULT NULL,
  `dynamics_acceleration` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Таблица динамических характеристик автомобиля';

--
-- Дамп данных таблицы `dynamics_car`
--

INSERT INTO `dynamics_car` (`dynamics_id`, `dynamics_max_speed`, `dynamics_acceleration`) VALUES
(1, '', ''),
(2, NULL, NULL),
(3, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `engine_car`
--

CREATE TABLE IF NOT EXISTS `engine_car` (
  `engine_id` int(11) NOT NULL,
  `engine_location` varchar(100) DEFAULT NULL,
  `engine_type` varchar(100) DEFAULT NULL,
  `enngine_capacity` varchar(100) DEFAULT NULL,
  `engine_output` varchar(100) DEFAULT NULL,
  `engine_torque` varchar(100) DEFAULT NULL,
  `engine_cylinder` varchar(100) DEFAULT NULL,
  `engine_fuel_consum` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Таблица с характристиками двигателя автомобиля';

--
-- Дамп данных таблицы `engine_car`
--

INSERT INTO `engine_car` (`engine_id`, `engine_location`, `engine_type`, `enngine_capacity`, `engine_output`, `engine_torque`, `engine_cylinder`, `engine_fuel_consum`) VALUES
(1, 'спереди поперечно', '4-цилиндровый, бензиновый, инжекторный, четырехтактный', '1998', '155/6000', '188/4500', '4 ', '8 л/100км'),
(2, 'cпереди поперечно', '4-цилиндровый, бензиновый, инжекторный, четырехтактный', '2354', '201/6800 ', '233/4500', '4', '9,5 л/100'),
(3, 'спереди поперечно', '6-цилиндровый, бензиновый, инжекторный, четырехтактный', '3471', '280/6200', '344/5000 ', '4 ', '11 л/100 км');

-- --------------------------------------------------------

--
-- Структура таблицы `size_car`
--

CREATE TABLE IF NOT EXISTS `size_car` (
  `id_size` int(11) NOT NULL,
  `length_size` varchar(11) DEFAULT NULL,
  `width_size` varchar(11) DEFAULT NULL,
  `height_size` varchar(11) DEFAULT NULL,
  `wheelbase_size` varchar(11) DEFAULT NULL,
  `clearance_size` varchar(11) DEFAULT NULL,
  `track_front_size` varchar(11) DEFAULT NULL,
  `track_back_size` varchar(11) DEFAULT NULL,
  `mass_size` varchar(11) DEFAULT NULL,
  `trunk_size` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Таблица размеров автомобиля';

--
-- Дамп данных таблицы `size_car`
--

INSERT INTO `size_car` (`id_size`, `length_size`, `width_size`, `height_size`, `wheelbase_size`, `clearance_size`, `track_front_size`, `track_back_size`, `mass_size`, `trunk_size`) VALUES
(1, '4544', '1752', '1435', '2700', '', '1499', '1528', '1290', '340'),
(2, '4726', '1840', '1440', '2705', '', '1580', '1580', '', ''),
(3, '4966', '1880', '1452', '2775', '', '1620', '1620', '1978', '');

-- --------------------------------------------------------

--
-- Структура таблицы `transmission_car`
--

CREATE TABLE IF NOT EXISTS `transmission_car` (
  `transmission_id` int(11) NOT NULL,
  `transmission` varchar(100) DEFAULT NULL,
  `transmission_type` varchar(100) DEFAULT NULL,
  `transmission_suspension_front` varchar(100) DEFAULT NULL,
  `transmission_suspension_back` varchar(100) DEFAULT NULL,
  `transmission_absorbers` varchar(100) DEFAULT NULL,
  `transmission_front_brakes` varchar(100) DEFAULT NULL,
  `transmission_back_brakes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Таблица ходовых характеристик автомобиля';

--
-- Дамп данных таблицы `transmission_car`
--

INSERT INTO `transmission_car` (`transmission_id`, `transmission`, `transmission_type`, `transmission_suspension_front`, `transmission_suspension_back`, `transmission_absorbers`, `transmission_front_brakes`, `transmission_back_brakes`) VALUES
(1, 'пятиступенчатая автоматическая', 'Передний', 'независимая', 'независимая', 'гидравлические, двустороннего действия', 'дисковые, вентилируемые', 'дисковые'),
(2, 'пятиступенчатая автоматическая', 'Передний', 'независимая', 'независимая', 'гидравлические, двустороннего действия', 'дисковые, вентилируемые', 'дисковые'),
(3, 'пятиступенчатая автоматическая', 'Передний', 'независимая', 'независимая', 'гидравлические, двустороннего действия', 'дисковые, вентилируемые', 'дисковые');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL DEFAULT 'images/users/user_default.png',
  `user_group` int(11) NOT NULL DEFAULT '1',
  `user_zametki` blob
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `email`, `password`, `user_img`, `user_group`, `user_zametki`) VALUES
(1, 'Tester', 'tester@mail.ru', '$2y$10$JQIHK564r/Hyv/vMMxXrNO1MRjFWeY7I3YhuNWd7dOhohIAJjg3ha', 'images/users/user_default.png', 2, 0xd09fd180d0b8d0b2d0b5d182),
(2, 'Tester1', 'tester1@mail.ru', '$2y$10$4CEJS/cplTYfIOiXHgW7beyt7z9R5L7J0Ep9O0GNpbMigWrVxNhS2', 'images/users/user_default.png', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `wiki_pages`
--

CREATE TABLE IF NOT EXISTS `wiki_pages` (
  `page_id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wiki_pages`
--

INSERT INTO `wiki_pages` (`page_id`, `car_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `body_car`
--
ALTER TABLE `body_car`
  ADD PRIMARY KEY (`id_body`),
  ADD KEY `id_body` (`id_body`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `id` (`car_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `id_body` (`id_body`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `engine_id` (`engine_id`),
  ADD KEY `dynamics_id` (`dynamics_id`),
  ADD KEY `transmission_id` (`transmission_id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`),
  ADD KEY `id_country` (`id_country`);

--
-- Индексы таблицы `dynamics_car`
--
ALTER TABLE `dynamics_car`
  ADD PRIMARY KEY (`dynamics_id`),
  ADD KEY `dynamics_id` (`dynamics_id`);

--
-- Индексы таблицы `engine_car`
--
ALTER TABLE `engine_car`
  ADD PRIMARY KEY (`engine_id`),
  ADD KEY `engine_id` (`engine_id`);

--
-- Индексы таблицы `size_car`
--
ALTER TABLE `size_car`
  ADD PRIMARY KEY (`id_size`),
  ADD KEY `id_size` (`id_size`);

--
-- Индексы таблицы `transmission_car`
--
ALTER TABLE `transmission_car`
  ADD PRIMARY KEY (`transmission_id`),
  ADD KEY `transmission_id` (`transmission_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `id` (`user_id`);

--
-- Индексы таблицы `wiki_pages`
--
ALTER TABLE `wiki_pages`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `body_car`
--
ALTER TABLE `body_car`
  MODIFY `id_body` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `dynamics_car`
--
ALTER TABLE `dynamics_car`
  MODIFY `dynamics_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `engine_car`
--
ALTER TABLE `engine_car`
  MODIFY `engine_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `size_car`
--
ALTER TABLE `size_car`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `transmission_car`
--
ALTER TABLE `transmission_car`
  MODIFY `transmission_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `wiki_pages`
--
ALTER TABLE `wiki_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id_country`),
  ADD CONSTRAINT `cars_ibfk_3` FOREIGN KEY (`id_body`) REFERENCES `body_car` (`id_body`),
  ADD CONSTRAINT `cars_ibfk_4` FOREIGN KEY (`id_size`) REFERENCES `size_car` (`id_size`),
  ADD CONSTRAINT `cars_ibfk_5` FOREIGN KEY (`engine_id`) REFERENCES `engine_car` (`engine_id`),
  ADD CONSTRAINT `cars_ibfk_6` FOREIGN KEY (`dynamics_id`) REFERENCES `dynamics_car` (`dynamics_id`),
  ADD CONSTRAINT `cars_ibfk_7` FOREIGN KEY (`transmission_id`) REFERENCES `transmission_car` (`transmission_id`);

--
-- Ограничения внешнего ключа таблицы `wiki_pages`
--
ALTER TABLE `wiki_pages`
  ADD CONSTRAINT `wiki_pages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `wiki_pages_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
