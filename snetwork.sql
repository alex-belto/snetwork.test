-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 25 2021 г., 08:43
-- Версия сервера: 5.7.26
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `snetwork`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(32) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `post_id`, `text`, `sender_id`, `sender_name`, `date`) VALUES
(1, 1, 'первый комент', 1, 'Александр', '1613730926'),
(2, 5, 'по ходу заработало', 1, 'Александр', '1613730959'),
(3, 2, 'таки нет', 1, 'Александр', '1613731088'),
(4, 5, 'зароботало', 1, 'Александр', '1613844980'),
(5, 5, 'зароботало', 1, 'Александр', '1613844987'),
(6, 6, 'проблема', 1, 'Александр', '1613910068'),
(7, 6, 'проблема', 1, 'Александр', '1613910071'),
(8, 7, 'кнопка отмена дублирует последний пост', 1, 'Александр', '1613910094'),
(9, 7, 'кнопка отмена дублирует последний пост', 1, 'Александр', '1613910100'),
(10, 7, 'кнопка ответить', 1, 'Александр', '1613910231'),
(11, 7, 'кнопка ответить', 1, 'Александр', '1613910236'),
(12, 8, 'комент', 1, 'Александр', '1613910536'),
(13, 8, 'дкбля нет', 1, 'Александр', '1613910553'),
(14, 8, 'фкх', 1, 'Александр', '1613910564'),
(15, 3, 'норм', 4, 'Олежа', '1613917916'),
(16, 4, 'Такой, Санс', 4, 'Олежа', '1613917927'),
(17, 11, 'sdgsfg', 1, 'Александр', '1614241521'),
(18, 11, 'sdfgsdfg', 1, 'Александр', '1614241538');

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(32) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `message`, `sender_id`, `sender_name`, `recipient_id`, `date`) VALUES
(1, 'Такой, Олежа!', 1, 'Александр', 4, '1613915195'),
(2, 'шото она быстро едет...', 1, 'Александр', 4, '1613917382'),
(3, 'Такой, Мишаня', 1, 'Александр', 3, '1613917618'),
(4, 'харе тролить', 4, 'Олежа', 1, '1613918138');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `url`, `text`) VALUES
(1, 'Index', '/', 'The index'),
(2, 'Chat', 'chat', 'About us'),
(3, 'Users', 'users', 'Our contacts'),
(4, 'File not found', '404', 'file wasn\'t found'),
(5, 'Friends', 'friends', ''),
(6, 'Registration', 'registration', ''),
(9, 'Login', 'login', ''),
(10, 'Logout', 'logout', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `age` int(4) NOT NULL,
  `img` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `tel` varchar(16) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `friends` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `age`, `img`, `email`, `tel`, `login`, `password`, `friends`) VALUES
(1, 'Александр', 'муж', 23, 'fox.jpg', 'alex@dot.com', '+73073825778', 'alex', '$2y$10$bjhIAI/cCcwIBcZpyzURn.mqWF9NUqmWYtPtDDvoZ4z6mhZszQOA.', '4,9,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3'),
(3, 'Михаил Иващук', 'муж', 23, 'download (3).jpeg', 'ivashchuk@mail.ru', '+37307382577', 'miha', '$2y$10$t3yxkfMxoyi10f0gOkUJcuEES.R52XIDkJ16b5RhFFpCfXXy4Rpbm', ''),
(4, 'Олежа', 'муж', 23, 'download.jpeg', 'Ivanov@mail.ru', '+37307682577', 'olega', '$2y$10$TDZiXnOYT8azdXDFnWConuKSrxN3E7YROOKi0N200Mmuv58od15ta', '1,1'),
(5, 'Марта', 'жен', 23, 'download (4).jpeg', 'marta@mail.ru', '+730738253363', 'marta', '$2y$10$uJ3f5ANAvzppzN8.17ybEezONgWMtxrubsKg9LIyz6Yi8vCRJbdEy', ''),
(6, 'Игорь', 'муж', 25, '68bf6332f73706ed6ce388b5fdaf9a98.jpg', 'igor@mail.ru', '+730709857765', 'igor', '$2y$10$aZbfeTG2L/sW9yiiJW0zBet/X6lEFt5rJiSLfU0.8UNTznvLWRv4m', ''),
(7, 'Оля', 'жен', 25, 'download (2).jpeg', 'ola@mail.ru', '+730738257734', 'olla', '$2y$10$7W9fN8afYYOGjsePXRr4YOywDGBwxZ6HJsNNduoxpUIKmaareFZOG', ''),
(8, 'Настя', 'жен', 23, 'download (1).jpeg', 'nastia@mail.ru', '+730218257765', 'nastia', '$2y$10$FK7ULz3TRu861eA/F0FACuGuMfedhL.lKPSY4hWl4vnBpNTWtxflu', ''),
(9, 'Полина', 'жен', 23, 'images (1).jpeg', 'polina@mail.ru', '+730730367765', 'polli', '$2y$10$cHFGrOESvGXT9o1i2VpU8e40aOv63iGh0XqOurRLYQr1folX8ktqS', ''),
(11, 'Мирнов Василий', 'муж', 24, '3-11.jpg', 'vasiliy_mirnov@mail.ru', '+730738257765', 'vasiliy321', '$2y$10$QzQprceDZjBxxbvJkUQ.uORtR86XRokkzOIfU8DrXeGeScnnKlL/S', ''),
(12, 'Паша', 'муж', 25, 'images.jpeg', 'Ivanov@mail.ruf', '+73073825778', 'pasha', '$2y$10$OqwTfpOdu9VSzGDWudJGPO/4zl76KvESu9CrodcyzSpqVgQiVtrQ2', '1,3,4,9');

-- --------------------------------------------------------

--
-- Структура таблицы `wall`
--

CREATE TABLE `wall` (
  `id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `date` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wall`
--

INSERT INTO `wall` (`id`, `recipient_id`, `sender_id`, `sender_name`, `text`, `date`) VALUES
(1, 3, 1, 'Александр', 'первая запись!', '1613556356'),
(2, 3, 1, 'Александр', 'где мой звонок?', '1613556466'),
(3, 4, 1, 'Александр', 'и шо там ?', '1613585685'),
(4, 4, 1, 'Александр', 'Такой Орех!', '1613585714'),
(5, 3, 1, 'Александр', 'не работает', '1613730329'),
(6, 1, 1, 'Александр', 'щапись на моей стене', '1613910028'),
(7, 1, 1, 'Александр', 'щапись на моей стене', '1613910032'),
(8, 1, 1, 'Александр', 'новая', '1613910505'),
(10, 1, 4, 'Олежа', 'gddfgdfg', '1613917854'),
(11, 1, 4, 'Олежа', 'Такой, Саня', '1613917897'),
(12, 3, 1, 'Александр', 'mjggmgmggmg', '1614241855'),
(13, 4, 1, 'Александр', 'fgsfdgsdfg', '1614241898'),
(14, 3, 1, 'Александр', 'gdzfxgs', '1614242080'),
(15, 3, 1, 'Александр', 'sdasfaf', '1614242094'),
(16, 3, 1, 'Александр', 'dfasdf', '1614242147');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wall`
--
ALTER TABLE `wall`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `wall`
--
ALTER TABLE `wall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
