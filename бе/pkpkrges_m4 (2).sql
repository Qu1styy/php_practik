-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: database:3306
-- Время создания: Мар 27 2026 г., 17:01
-- Версия сервера: 8.4.8
-- Версия PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pkpkrges_m4`
--

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE `departments` (
  `department_id` int NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_description`) VALUES
(1, 'Кафедра информационных систем', 'Кафедра информационных систем занимается подготовкой специалистов в области разработки, внедрения и сопровождения информационных систем для предприятий и организаций. Изучаются базы данных, проектирование ИС, бизнес-процессы, ERP-системы, анализ данных и автоматизация деятельности предприятий. '),
(2, 'Кафедра программирования', 'Кафедра программирования осуществляет подготовку специалистов по разработке программного обеспечения. Основное внимание уделяется языкам программирования, алгоритмам, структурам данных, разработке веб-приложений, мобильных приложений и программной инженерии.'),
(3, 'Кафедра вычислительной техники', 'Кафедра вычислительной техники специализируется на изучении аппаратного обеспечения компьютеров, микропроцессоров, архитектуры ЭВМ, операционных систем, встроенных систем и обслуживания вычислительной техники.'),
(4, 'Кафедра сетевых технологий', 'Кафедра сетевых технологий готовит специалистов в области компьютерных сетей, администрирования серверов, сетевого оборудования, телекоммуникаций, облачных технологий и сетевой безопасности.'),
(5, 'Кафедра информационной безопасности', 'Кафедра информационной безопасности занимается подготовкой специалистов по защите информации, криптографии, сетевой безопасности, защите баз данных, анализу уязвимостей и обеспечению безопасности информационных систем.');

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines`
--

CREATE TABLE `disciplines` (
  `discipline_id` int NOT NULL,
  `discipline_name` varchar(255) NOT NULL,
  `discipline_description` text,
  `hours_total` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `disciplines`
--

INSERT INTO `disciplines` (`discipline_id`, `discipline_name`, `discipline_description`, `hours_total`) VALUES
(1, 'Программирование на Python', 'Изучение языка Python, разработка приложений и работа с библиотеками', 120),
(2, 'Программирование на Java', 'Объектно-ориентированное программирование на Java', 110),
(3, 'Веб-разработка', 'Разработка веб-сайтов и веб-приложений', 130),
(4, 'Базы данных', 'Проектирование баз данных и SQL', 100),
(5, 'Проектирование информационных систем', 'Методы проектирования информационных систем', 90),
(6, 'Компьютерные сети', 'Основы сетевых технологий и протоколов', 100),
(7, 'Операционные системы', 'Принципы работы операционных систем', 80),
(8, 'Информационная безопасность', 'Методы защиты информации и безопасность систем', 90),
(9, 'Алгоритмы и структуры данных', 'Основные алгоритмы и структуры данных', 110),
(10, 'Архитектура вычислительных систем', 'Устройство и архитектура компьютеров', 85);

-- --------------------------------------------------------

--
-- Структура таблицы `discipline_users`
--

CREATE TABLE `discipline_users` (
  `discipline_user_id` int NOT NULL,
  `user_id` int NOT NULL,
  `discipline_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `discipline_users`
--

INSERT INTO `discipline_users` (`discipline_user_id`, `user_id`, `discipline_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 2),
(4, 2, 4),
(5, 3, 5),
(6, 3, 8),
(7, 4, 6),
(8, 5, 9),
(9, 5, 10),
(31, 59, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `genders`
--

CREATE TABLE `genders` (
  `gender_id` int NOT NULL,
  `gender_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `genders`
--

INSERT INTO `genders` (`gender_id`, `gender_name`) VALUES
(1, 'Мужской'),
(2, 'Женский');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `role_id` int NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Админ'),
(3, 'Преподаватель'),
(2, 'Сотрудник деканата');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `role_id` int DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `gender_id` int NOT NULL,
  `registration_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `date_birth` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `surname`, `name`, `patronymic`, `gender_id`, `registration_address`, `date_birth`, `email`, `login`, `password`) VALUES
(1, 1, 'Мещеряков', 'Артём', 'Витальевич', 1, 'г. Томск, ул. Ленина, д.1', '2006-05-12', 'amese@mail.ru', 'qu1sty', '202cb962ac59075b964b07152d234b70'),
(2, 1, 'Петров', 'Алексей', 'Сергеевич', 1, 'г. Томск, пр. Фрунзе, д.10', '1998-11-20', 'petrov@mail.ru', 'petrov', '202cb962ac59075b964b07152d234b70'),
(3, 2, 'Смирнова', 'Мария', 'Николаевна', 1, 'г. Томск, ул. Карла Маркса, д.5', '2001-03-15', 'smirnova@mail.ru', 'smirnova', '202cb962ac59075b964b07152d234b70'),
(4, 2, 'Кузнецов', 'Дмитрий', 'Алексеевич', 1, 'г. Томск, ул. Советская, д.12', '1999-08-08', 'kuznetsov@mail.ru', 'kuznetsov', '202cb962ac59075b964b07152d234b70'),
(5, 2, 'Васильева', 'Ольга', 'Петровна', 2, 'г. Томск, ул. Гагарина, д.7', '2002-01-25', 'vasilieva@mail.ru', 'vasilieva', '202cb962ac59075b964b07152d234b70'),
(59, 2, 'фцвфцв', 'вффцвфц', 'вфцвфцв', 1, 'фцвфцв', '2026-03-20', 'fefaw@segfrwe', 'qqwesvsfdfsa', '76d80224611fc919a5d54f0ff9fba446');

-- --------------------------------------------------------

--
-- Структура таблицы `user_departments`
--

CREATE TABLE `user_departments` (
  `user_department_id` int NOT NULL,
  `user_id` int NOT NULL,
  `department_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_departments`
--

INSERT INTO `user_departments` (`user_department_id`, `user_id`, `department_id`) VALUES
(4, 3, 1),
(1, 1, 2),
(6, 4, 3),
(2, 1, 4),
(20, 59, 4),
(5, 3, 5),
(7, 5, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Индексы таблицы `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`discipline_id`);

--
-- Индексы таблицы `discipline_users`
--
ALTER TABLE `discipline_users`
  ADD PRIMARY KEY (`discipline_user_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`,`discipline_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `discipline_id` (`discipline_id`);

--
-- Индексы таблицы `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Индексы таблицы `user_departments`
--
ALTER TABLE `user_departments`
  ADD PRIMARY KEY (`user_department_id`),
  ADD UNIQUE KEY `department_id` (`department_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `discipline_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `discipline_users`
--
ALTER TABLE `discipline_users`
  MODIFY `discipline_user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `user_departments`
--
ALTER TABLE `user_departments`
  MODIFY `user_department_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `discipline_users`
--
ALTER TABLE `discipline_users`
  ADD CONSTRAINT `discipline_users_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `discipline_users_ibfk_4` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`discipline_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`gender_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_departments`
--
ALTER TABLE `user_departments`
  ADD CONSTRAINT `user_departments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_departments_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
