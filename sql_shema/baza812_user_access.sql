-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 11 2015 р., 17:32
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
  `ids_object` longtext NOT NULL COMMENT 'ids form table object',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pasword` (`pasword`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп даних таблиці `baza812_user_access`
--

INSERT INTO `baza812_user_access` (`id`, `user_id`, `pasword`, `when_get_pasword`, `type_pasword`, `number_opened_phone_allowed`, `ids_object`) VALUES
(1, 1, '123', 1433862779, 1, 11, 'a:12:{i:0;s:6:"297414";i:1;s:6:"297409";i:2;s:6:"297420";i:3;s:6:"297397";i:4;s:6:"297395";i:5;s:6:"297392";i:6;s:6:"297407";i:7;s:6:"297406";i:8;s:6:"297401";i:9;s:6:"297400";i:10;s:6:"297300";i:11;s:6:"297301";}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
