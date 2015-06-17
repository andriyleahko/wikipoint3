-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 17 2015 р., 23:21
-- Версія сервера: 5.5.41-log
-- Версія PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `grandpr4_grand`
--

-- --------------------------------------------------------

--
-- Структура таблиці `baza812_user_access`
--

CREATE TABLE IF NOT EXISTS `baza812_user_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'id from table baza812_user',
  `pasword` varchar(15) NOT NULL,
  `when_get_pasword` int(11) NOT NULL,
  `type_pasword` int(11) NOT NULL,
  `number_opened_phone_allowed` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pasword` (`pasword`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп даних таблиці `baza812_user_access`
--

INSERT INTO `baza812_user_access` (`id`, `user_id`, `pasword`, `when_get_pasword`, `type_pasword`, `number_opened_phone_allowed`) VALUES
(1, 1, '123', 1433862779, 1, 6),
(2, 1, '111', 1433862779, 8, 20),
(3, 2, '00', 1133862779, 8, 1),
(4, 3, '25394', 1434395614, 2, 5),
(5, 5, '25185', 1434453248, 2, 5),
(6, 4, '10867', 1434455876, 2, 5),
(7, 6, '99134', 1434455879, 2, 5),
(8, 6, '26207', 1434456893, 2, 5),
(9, 6, '93501', 1434461320, 2, 3),
(10, 6, '91870', 1434461628, 2, 5),
(11, 6, '72786', 1434461814, 2, 5),
(12, 6, '79202', 1434461848, 2, 5),
(13, 6, '14328', 1434462462, 2, 5),
(14, 6, '65821', 1434462771, 2, 5),
(15, 6, '43821', 1434467684, 2, 5),
(16, 6, '15666', 1434468056, 2, 5),
(17, 6, '97058', 1434468203, 2, 5),
(18, 6, '77016', 1434552134, 2, 5),
(19, 6, '42711', 1434552293, 2, 5),
(20, 7, '63003', 1434552534, 2, 5),
(21, 8, '59595', 1434553809, 2, 5),
(22, 9, '23837', 1434556097, 2, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
