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
-- Структура таблиці `baza812_user`
--

CREATE TABLE IF NOT EXISTS `baza812_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `about_me` text NOT NULL,
  `ids_object` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп даних таблиці `baza812_user`
--

INSERT INTO `baza812_user` (`id`, `name`, `phone`, `email`, `about_me`, `ids_object`) VALUES
(1, 'roman', '+380638720191', 'leshkoroman@gmail.com', 'This is me', 'a:4:{i:0;s:6:"297428";i:1;s:6:"297420";i:2;s:6:"297419";i:3;s:6:"297435";}'),
(2, 'Федя', '+380962545357', 'feda@mail.ru', 'Федя', ''),
(3, '', '(111)111-11-11', '', 'qwrewrewte', ''),
(4, '', '(014)575-75-27', 'leshkoroman@mail.ru', 'qeretreyhr', ''),
(5, '', '(454)545-45-45', 'leshkoroman@mail.ru', 'цукцкеупа', ''),
(6, '', '(555)555-55-55', 'leshkoroman@mail.ru', 'dqwe', 'a:2:{i:0;s:6:"297418";i:1;s:6:"297428";}'),
(7, '', '(999)999-99-99', 'leshkoroman@mail.ru', '999', ''),
(8, '', '(000)000-00-00', 'leshkoroman@mail.ru', '0', ''),
(9, '', '(222)222-22-22', 'leshkoroman@mail.ru', 'weter', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
