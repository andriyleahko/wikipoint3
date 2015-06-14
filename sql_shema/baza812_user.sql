-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 14 2015 р., 21:28
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
-- Структура таблиці `baza812_user`
--

CREATE TABLE IF NOT EXISTS `baza812_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `about_me` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп даних таблиці `baza812_user`
--

INSERT INTO `baza812_user` (`id`, `name`, `phone`, `email`, `about_me`) VALUES
(1, 'roman', '+380638720191', 'leshkoroman@gmail.com', 'This is me'),
(2, 'Федя', '+380962545357', 'feda@mail.ru', 'Федя');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
