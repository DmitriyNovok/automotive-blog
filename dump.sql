-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 22 2018 г., 18:21
-- Версия сервера: 5.6.38-log
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog_cars`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_text` text NOT NULL,
  `article_image` varchar(255) DEFAULT NULL,
  `article_icon` varchar(255) NOT NULL,
  `article_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_text`, `article_image`, `article_icon`, `article_date`, `user_id`) VALUES
(1, 'Автомобили Баварии', 'В прошлом году(2017) немецкий бизнес-класс выбрали более 11 тысяч покупателей. И половина из них остановились на уже немолодом Мерседесе Е-класса. «Пятёрка» BMW, даром что новинка, стала второй по популярности — почти с двукратным отставанием. А Audi A6 на излёте карьеры продавалась совсем вяло. Все ждали новую «шестёрку». Не напрасно ли? Может, стоило купить BMW?Немецкий автопром – это не просто набор легендарных брендов.', 'icon1.jpg', 'icon_article1.jpg', '2018-06-01', 1),
(2, 'Автомобили Японии', 'Автопром Японии уже давно известен во всём мире как одна из самых успешных отраслей японской промышленности (страна «Восходящего Солнца» – это родина ряда крупных автомобилестроительных компаний, занимающих «лидирующие позиции на планете»)… Ну а японские автомобили, в свою очередь, стали «символом»: надежности, престижа, комфорта и уверенности на дороге – завоевав всеобщее признание на мировой арене…', 'icon3.jpg', 'icon_article3.jpg', '2018-05-04', 2),
(3, 'Автомобили Америки', 'История автопрома Соединённых Штатов Америки уходит своими корнями в последнее десятилетие XIX века – в 1893 году появился первый автопроизводитель Duryea Motor Wagon Company … После этого последовало бурное развитие американского автомобилестроения, но настоящий «переворот» произошел в 1908 году, когда Генри Форд первым в мире додумался поставить производство автомобилей «на поток» …', 'icon2.jpg', 'icon_article2.jpg', '2018-07-08', 3),
(4, 'Автомобили Европы', 'Автомобильная промышленность зародилась в Европе в 80-х годах XIX века – в 1886-м немецкий инженер Карл Бенц выпустил первый в мире автомобиль, оснащенный бензиновым двигателем. Впоследствии европейский автопром начал бурно развиваться, но тяжелым ударом для него стала Вторая Мировая Война, которая вынудила большинство заводов переориентироваться на выпуск военной техники. После войны многие предприятия были разрушены, однако уже в 1950-е года автопроизводители Европы вновь начали «набирать обороты», а к концу 1960-х и вовсе заняли лидирующие позиции на мировой арене…. и это позиции они удерживают до сих пор, выпуская автомобили различных классов в широкой ценовой категории.', 'cars4.jpg', 'icon_article4.jpg', '2018-07-22', 3),
(5, 'Автомобили Китая', 'Китайский автопром развивается «стремительными темпами» – производители из Поднебесной не просто постепенно отходят от «банального клонирования» известных моделей (склоняясь к официальному партнерству с ведущими мировыми компаниями), но и «вливают» в разработку собственных новых технологий огромные деньги. А по общему количеству автомобильных брендов Китай сейчас уступает разве что только всем европейским странам вместе взятым…', 'cars5.jpg', 'icon_article5.jpg', '2018-07-12', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Дмитрий', 'steamap@mail.ru', '1234'),
(2, 'Кристина', 'kr.matsak@yandex.ru', '0123'),
(3, 'Никита', 'honney77@yandex.ru', '2345'),
(25, 'Таня', 'tanya@mail.ru', '0123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
