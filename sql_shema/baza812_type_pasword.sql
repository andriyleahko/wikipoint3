-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 14 2015 р., 20:11
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
-- Структура таблиці `baza812_type_pasword`
--

CREATE TABLE IF NOT EXISTS `baza812_type_pasword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп даних таблиці `baza812_type_pasword`
--

INSERT INTO `baza812_type_pasword` (`id`, `name`) VALUES
(1, 'куплено пароль и доступ на 30 дней'),
(2, 'Сообщение о сдаваемой квартире'),
(3, 'лайк в vk'),
(4, 'Подписка на рассылку новых объявлений'),
(5, 'Привести друзей на сайт'),
(6, 'Написать отзыв Вконтакте'),
(7, 'куплено пароль и доступ на 15 дней'),
(8, 'куплено пароль на 25 контактов');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
