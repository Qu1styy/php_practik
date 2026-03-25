-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: database:3306
-- Время создания: Мар 24 2026 г., 12:53
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
  `department_description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_description`, `created_at`) VALUES
(1, 'Кафедра информационных систем', 'Кафедра информационных систем занимается подготовкой специалистов в области разработки, внедрения и сопровождения информационных систем для предприятий и организаций. Изучаются базы данных, проектирование ИС, бизнес-процессы, ERP-системы, анализ данных и автоматизация деятельности предприятий. ', '2026-03-24 03:35:47'),
(2, 'Кафедра программирования', 'Кафедра программирования осуществляет подготовку специалистов по разработке программного обеспечения. Основное внимание уделяется языкам программирования, алгоритмам, структурам данных, разработке веб-приложений, мобильных приложений и программной инженерии.', '2026-03-24 03:36:04'),
(3, 'Кафедра вычислительной техники', 'Кафедра вычислительной техники специализируется на изучении аппаратного обеспечения компьютеров, микропроцессоров, архитектуры ЭВМ, операционных систем, встроенных систем и обслуживания вычислительной техники.', '2026-03-24 03:36:17'),
(4, 'Кафедра сетевых технологий', 'Кафедра сетевых технологий готовит специалистов в области компьютерных сетей, администрирования серверов, сетевого оборудования, телекоммуникаций, облачных технологий и сетевой безопасности.', '2026-03-24 03:36:29'),
(5, 'Кафедра информационной безопасности', 'Кафедра информационной безопасности занимается подготовкой специалистов по защите информации, криптографии, сетевой безопасности, защите баз данных, анализу уязвимостей и обеспечению безопасности информационных систем.', '2026-03-24 03:36:44');

-- --------------------------------------------------------

--
-- Структура таблицы `department_disciplines`
--

CREATE TABLE `department_disciplines` (
  `department_disciplines_id` int NOT NULL,
  `department_id` int NOT NULL,
  `discipline_id` int NOT NULL,
  `hours_planned` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `department_disciplines`
--

INSERT INTO `department_disciplines` (`department_disciplines_id`, `department_id`, `discipline_id`, `hours_planned`, `created_at`) VALUES
(1, 2, 1, 120, '2026-03-24 05:29:54'),
(2, 2, 2, 110, '2026-03-24 05:38:00'),
(3, 1, 4, 100, '2026-03-24 05:42:48'),
(4, 1, 5, 90, '2026-03-24 05:43:44'),
(5, 2, 3, 130, '2026-03-24 05:45:17'),
(6, 3, 7, 80, '2026-03-24 05:45:40'),
(7, 3, 10, 85, '2026-03-24 05:46:16'),
(8, 4, 6, 100, '2026-03-24 05:46:55'),
(9, 5, 8, 90, '2026-03-24 05:47:14'),
(10, 2, 9, 110, '2026-03-24 05:47:32');

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines`
--

CREATE TABLE `disciplines` (
  `discipline_id` int NOT NULL,
  `discipline_name` varchar(255) NOT NULL,
  `discipline_description` text,
  `hours_total` int DEFAULT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `disciplines`
--

INSERT INTO `disciplines` (`discipline_id`, `discipline_name`, `discipline_description`, `hours_total`, `created_at`) VALUES
(1, 'Программирование на Python', 'Изучение языка Python, разработка приложений и работа с библиотеками', 120, '2026-03-24 03:41:01'),
(2, 'Программирование на Java', 'Объектно-ориентированное программирование на Java', 110, '2026-03-24 03:41:41'),
(3, 'Веб-разработка', 'Разработка веб-сайтов и веб-приложений', 130, '2026-03-24 03:42:01'),
(4, 'Базы данных', 'Проектирование баз данных и SQL', 100, '2026-03-24 03:42:24'),
(5, 'Проектирование информационных систем', 'Методы проектирования информационных систем', 90, '2026-03-24 03:42:45'),
(6, 'Компьютерные сети', 'Основы сетевых технологий и протоколов', 100, '2026-03-24 03:43:04'),
(7, 'Операционные системы', 'Принципы работы операционных систем', 80, '2026-03-24 03:43:24'),
(8, 'Информационная безопасность', 'Методы защиты информации и безопасность систем', 90, '2026-03-24 03:43:37'),
(9, 'Алгоритмы и структуры данных', 'Основные алгоритмы и структуры данных', 110, '2026-03-24 03:43:56'),
(10, 'Архитектура вычислительных систем', 'Устройство и архитектура компьютеров', 85, '2026-03-24 03:44:11');

-- --------------------------------------------------------

--
-- Структура таблицы `discipline_users`
--

CREATE TABLE `discipline_users` (
  `discipline_user_id` int NOT NULL,
  `user_id` int NOT NULL,
  `discipline_id` int NOT NULL,
  `hours` int NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `discipline_users`
--

INSERT INTO `discipline_users` (`discipline_user_id`, `user_id`, `discipline_id`, `hours`, `position`, `start_date`, `end_date`, `created_at`) VALUES
(1, 1, 1, 60, 'Лектор', '2026-09-01', NULL, '2026-03-24 12:36:01'),
(2, 1, 3, 40, 'Практика', '2026-09-01', NULL, '2026-03-24 12:36:01'),
(3, 2, 2, 80, 'Лектор', '2026-09-01', NULL, '2026-03-24 12:36:01'),
(4, 2, 4, 50, 'Практика', '2026-09-01', NULL, '2026-03-24 12:36:01'),
(5, 3, 5, 70, 'Лектор', '2026-09-01', NULL, '2026-03-24 12:36:01'),
(6, 3, 8, 40, 'Практика', '2026-09-01', NULL, '2026-03-24 12:36:01'),
(7, 4, 6, 90, 'Лектор', '2026-09-01', NULL, '2026-03-24 12:36:01'),
(8, 5, 9, 60, 'Лектор', '2026-09-01', NULL, '2026-03-24 12:36:01'),
(9, 5, 10, 40, 'Практика', '2026-09-01', NULL, '2026-03-24 12:36:01');

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
  `registration_address` text NOT NULL,
  `date_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `surname`, `name`, `patronymic`, `gender_id`, `registration_address`, `date_birth`, `email`, `login`, `password`, `created_at`, `updated_at`) VALUES
(1, 2, 'Иванов', 'Иван', 'Иванович', 1, 'г. Томск, ул. Ленина, д.1', '2000-05-12', 'ivanov@mail.ru', 'ivanov', '123456', '2026-03-24 12:23:43', '2026-03-24 12:24:06'),
(2, 2, 'Петров', 'Алексей', 'Сергеевич', 1, 'г. Томск, пр. Фрунзе, д.10', '1998-11-20', 'petrov@mail.ru', 'petrov', '123456', '2026-03-24 12:23:43', '2026-03-24 12:24:11'),
(3, 2, 'Смирнова', 'Мария', 'Николаевна', 2, 'г. Томск, ул. Карла Маркса, д.5', '2001-03-15', 'smirnova@mail.ru', 'smirnova', '123456', '2026-03-24 12:23:43', '2026-03-24 12:24:15'),
(4, 2, 'Кузнецов', 'Дмитрий', 'Алексеевич', 1, 'г. Томск, ул. Советская, д.12', '1999-08-08', 'kuznetsov@mail.ru', 'kuznetsov', '123456', '2026-03-24 12:23:43', '2026-03-24 12:24:25'),
(5, 2, 'Васильева', 'Ольга', 'Петровна', 2, 'г. Томск, ул. Гагарина, д.7', '2002-01-25', 'vasilieva@mail.ru', 'vasilieva', '123456', '2026-03-24 12:23:43', '2026-03-24 12:24:38');

-- --------------------------------------------------------

--
-- Структура таблицы `user_departments`
--

CREATE TABLE `user_departments` (
  `user_department_id` int NOT NULL,
  `user_id` int NOT NULL,
  `department_id` int NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_departments`
--

INSERT INTO `user_departments` (`user_department_id`, `user_id`, `department_id`, `position`, `start_date`, `end_date`, `created_at`) VALUES
(1, 1, 2, 'Преподаватель', '2026-09-01', NULL, '2026-03-24 12:29:34'),
(2, 1, 4, 'Преподаватель', '2026-09-01', NULL, '2026-03-24 12:29:34'),
(3, 2, 2, 'Старший преподаватель', '2026-09-01', NULL, '2026-03-24 12:29:34'),
(4, 3, 1, 'Доцент', '2026-09-01', NULL, '2026-03-24 12:29:34'),
(5, 3, 5, 'Доцент', '2026-09-01', NULL, '2026-03-24 12:29:34'),
(6, 4, 3, 'Преподаватель', '2026-09-01', NULL, '2026-03-24 12:29:34'),
(7, 5, 5, 'Зав. кафедрой', '2026-09-01', NULL, '2026-03-24 12:29:34');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Индексы таблицы `department_disciplines`
--
ALTER TABLE `department_disciplines`
  ADD PRIMARY KEY (`department_disciplines_id`),
  ADD UNIQUE KEY `unique_department_discipline` (`department_id`,`discipline_id`),
  ADD KEY `discipline_id` (`discipline_id`);

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
  MODIFY `department_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `department_disciplines`
--
ALTER TABLE `department_disciplines`
  MODIFY `department_disciplines_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `discipline_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `discipline_users`
--
ALTER TABLE `discipline_users`
  MODIFY `discipline_user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `user_departments`
--
ALTER TABLE `user_departments`
  MODIFY `user_department_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `department_disciplines`
--
ALTER TABLE `department_disciplines`
  ADD CONSTRAINT `department_disciplines_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
  ADD CONSTRAINT `department_disciplines_ibfk_2` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`discipline_id`);

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
