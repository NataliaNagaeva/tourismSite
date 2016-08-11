-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 12 2016 г., 00:11
-- Версия сервера: 5.1.71-community-log
-- Версия PHP: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `simple_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `email` varchar(70) NOT NULL DEFAULT '',
  `date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `email`, `date`) VALUES
(1, 'Nata', 'ijaiushc jscsacisajv						', '', '2016-07-02'),
(2, 'nats', 'isfjisnvsnvsjvsv						', '', '2016-07-02'),
(3, 'nats', 'isfjisnvsnvsjvsv						', '', '2016-07-02'),
(5, '123', '	dwfc xwsfqadxacvvsacs					', '', '2016-07-02'),
(6, 'gvdsgffg', '	egbdzsfasdcasc					', '', '2016-07-02'),
(7, 'trtrty', '	rtrytttttttttttttttttttt					', '', '2016-07-04'),
(8, 'asdasdasd', 'sdasdasd	asdasda					', '', '2016-07-04'),
(11, '90', '90', '', '2016-07-06'),
(12, '909090', '9090909090', '', '2016-07-06'),
(16, 'Татьяна Зюклва', 'СПАСИБО Я ЗАКАЗЫВАЛА У ВАС И ОЧЕНЬ ДОВОЛЬНА ИСПОЛНЕНИЕМ РАБОТЫ!!!! И ВСЕМ ОЧЕНЬ НРАВИТСЯ!!!', '', '2016-07-01'),
(17, 'Нина Блинкова', 'На сайте наш потолок :) Хорошая компания Амега-Спасибо!!!', '', '2016-07-02'),
(19, 'Андрей Ромашкин', 'Спасибо огромное! Нам сделали почти такой же  потолок на кухне, только цвет чуть другой, очень понравилось всей семье! Ребята профессионалы с большой буквы. Вся наша семья выражает им благодарность. К весне планируем сделать двухуровневый в зал, уже придумываем варианты.', '', '2016-07-03'),
(20, '7r5c7', 'c868', 'ucr58r5', '2016-07-07'),
(21, '575e7', 'e47e47', '', '2016-07-07'),
(22, '11111111', '11111', '', '2016-07-08'),
(23, '22', '2', '', '2016-07-08'),
(24, 'efcsacas', 'safasvsxcsaf', 'sdsafscsascscs', '2016-07-08'),
(25, 'sdscacad', 'afsaczadaD', '', '2016-07-08'),
(26, '9090900', '9090909', '', '2016-07-08'),
(27, '000000000000', '0000', '', '2016-07-08'),
(28, 'vghvh', 'vvgvvg', '', '2016-07-08'),
(29, 'sfdf', 'zfvvdv', '', '2016-07-21'),
(30, 'пнпрг', 'еаоплрир', '', '2016.07.21');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
