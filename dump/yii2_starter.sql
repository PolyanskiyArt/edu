-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 01 2020 г., 13:00
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2_starter`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Administrator', '1', 1585607804),
('Authenticated', '1', 1585607804),
('Authenticated', '2', 1578339991),
('Master', '1', 1585607804);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('*', 2, 'Allow Everything', NULL, NULL, 1578244555, 1578244555),
('admin/dashboard/*', 2, 'Route admin/dashboard/*', NULL, NULL, 1578244568, 1578244568),
('admin/dashboard/error', 2, 'Route admin/dashboard/error', NULL, NULL, 1578244568, 1578244568),
('admin/dashboard/index', 2, 'Route admin/dashboard/index', NULL, NULL, 1578244568, 1578244568),
('admin/rbac/permissions/*', 2, 'Route admin/rbac/permissions/*', NULL, NULL, 1578244574, 1578244574),
('admin/rbac/permissions/add-relation', 2, 'Route admin/rbac/permissions/add-relation', NULL, NULL, 1578244574, 1578244574),
('admin/rbac/permissions/create', 2, 'Route admin/rbac/permissions/create', NULL, NULL, 1578244574, 1578244574),
('admin/rbac/permissions/delete', 2, 'Route admin/rbac/permissions/delete', NULL, NULL, 1578244574, 1578244574),
('admin/rbac/permissions/index', 2, 'Route admin/rbac/permissions/index', NULL, NULL, 1578244574, 1578244574),
('admin/rbac/permissions/remove-relation', 2, 'Route admin/rbac/permissions/remove-relation', NULL, NULL, 1578244574, 1578244574),
('admin/rbac/permissions/scan', 2, 'Route admin/rbac/permissions/scan', NULL, NULL, 1578244574, 1578244574),
('admin/rbac/permissions/update', 2, 'Route admin/rbac/permissions/update', NULL, NULL, 1578244574, 1578244574),
('admin/rbac/roles/*', 2, 'Route admin/rbac/roles/*', NULL, NULL, 1578244574, 1578244574),
('admin/rbac/roles/create', 2, 'Route admin/rbac/roles/create', NULL, NULL, 1578244574, 1578244574),
('admin/rbac/roles/delete', 2, 'Route admin/rbac/roles/delete', NULL, NULL, 1578244574, 1578244574),
('admin/rbac/roles/update', 2, 'Route admin/rbac/roles/update', NULL, NULL, 1578244574, 1578244574),
('admin/settings/*', 2, 'Route admin/settings/*', NULL, NULL, 1578244568, 1578244568),
('admin/settings/app', 2, 'Route admin/settings/app', NULL, NULL, 1578244568, 1578244568),
('admin/users/*', 2, 'Route admin/users/*', NULL, NULL, 1578244568, 1578244568),
('admin/users/create', 2, 'Route admin/users/create', NULL, NULL, 1578244568, 1578244568),
('admin/users/delete', 2, 'Route admin/users/delete', NULL, NULL, 1578244568, 1578244568),
('admin/users/index', 2, 'Route admin/users/index', NULL, NULL, 1578244568, 1578244568),
('admin/users/update', 2, 'Route admin/users/update', NULL, NULL, 1578244568, 1578244568),
('administer', 2, 'Access administration panel.', NULL, NULL, 1578244555, 1578244555),
('Administrator', 1, 'Administrator.', NULL, NULL, 1578244555, 1578244555),
('auth/*', 2, 'Route auth/*', NULL, NULL, 1578244568, 1578244568),
('auth/login', 2, 'Route auth/login', NULL, NULL, 1578244568, 1578244568),
('auth/logout', 2, 'Route auth/logout', NULL, NULL, 1578244568, 1578244568),
('auth/password-request', 2, 'Route auth/password-request', NULL, NULL, 1578244568, 1578244568),
('auth/password-update', 2, 'Route auth/password-update', NULL, NULL, 1578244568, 1578244568),
('auth/register', 2, 'Route auth/register', NULL, NULL, 1578244568, 1578244568),
('Authenticated', 1, 'Authenticated user.', NULL, NULL, 1578244555, 1578244555),
('course-group/*', 2, 'Route course-group/*', NULL, NULL, 1578791173, 1578791173),
('course-group/create', 2, 'Route course-group/create', NULL, NULL, 1578791173, 1578791173),
('course-group/delete', 2, 'Route course-group/delete', NULL, NULL, 1578791173, 1578791173),
('course-group/index', 2, 'Route course-group/index', NULL, NULL, 1578791173, 1578791173),
('course-group/update', 2, 'Route course-group/update', NULL, NULL, 1578791173, 1578791173),
('course-group/view', 2, 'Route course-group/view', NULL, NULL, 1578791173, 1578791173),
('course/*', 2, 'Route course/*', NULL, NULL, 1578782434, 1578782434),
('course/create', 2, 'Route course/create', NULL, NULL, 1578782653, 1578782653),
('course/delete', 2, 'Route course/delete', NULL, NULL, 1578782653, 1578782653),
('course/index', 2, 'Route course/index', NULL, NULL, 1578782434, 1578782434),
('course/update', 2, 'Route course/update', NULL, NULL, 1578782653, 1578782653),
('course/view', 2, 'Route course/view', NULL, NULL, 1578782653, 1578782653),
('Guest', 1, 'Usual site visitor.', NULL, NULL, 1578244555, 1578244555),
('lesson-group/*', 2, 'Route lesson-group/*', NULL, NULL, 1578791173, 1578791173),
('lesson-group/create', 2, 'Route lesson-group/create', NULL, NULL, 1578791173, 1578791173),
('lesson-group/delete', 2, 'Route lesson-group/delete', NULL, NULL, 1578791174, 1578791174),
('lesson-group/index', 2, 'Route lesson-group/index', NULL, NULL, 1578791173, 1578791173),
('lesson-group/update', 2, 'Route lesson-group/update', NULL, NULL, 1578791173, 1578791173),
('lesson-group/view', 2, 'Route lesson-group/view', NULL, NULL, 1578791173, 1578791173),
('lesson/*', 2, 'Route lesson/*', NULL, NULL, 1578791173, 1578791173),
('lesson/create', 2, 'Route lesson/create', NULL, NULL, 1578791173, 1578791173),
('lesson/delete', 2, 'Route lesson/delete', NULL, NULL, 1578791173, 1578791173),
('lesson/index', 2, 'Route lesson/index', NULL, NULL, 1578791173, 1578791173),
('lesson/update', 2, 'Route lesson/update', NULL, NULL, 1578791173, 1578791173),
('lesson/view', 2, 'Route lesson/view', NULL, NULL, 1578791173, 1578791173),
('Master', 1, 'Has full system access.', NULL, NULL, 1578244555, 1578244555),
('payment/*', 2, 'Route payment/*', NULL, NULL, 1578791174, 1578791174),
('payment/create', 2, 'Route payment/create', NULL, NULL, 1578791174, 1578791174),
('payment/delete', 2, 'Route payment/delete', NULL, NULL, 1578791174, 1578791174),
('payment/index', 2, 'Route payment/index', NULL, NULL, 1578791174, 1578791174),
('payment/update', 2, 'Route payment/update', NULL, NULL, 1578791174, 1578791174),
('payment/view', 2, 'Route payment/view', NULL, NULL, 1578791174, 1578791174),
('site/*', 2, 'Route site/*', NULL, NULL, 1578244568, 1578244568),
('site/about', 2, 'Route site/about', NULL, NULL, 1578244568, 1578244568),
('site/captcha', 2, 'Route site/captcha', NULL, NULL, 1578244568, 1578244568),
('site/contact', 2, 'Route site/contact', NULL, NULL, 1578244568, 1578244568),
('site/error', 2, 'Route site/error', NULL, NULL, 1578244568, 1578244568),
('site/index', 2, 'Route site/index', NULL, NULL, 1578244568, 1578244568),
('teacher', 1, 'Преподаватель', NULL, NULL, 1578791139, 1578791139),
('teacher-profile/*', 2, 'Route teacher-profile/*', NULL, NULL, 1578791174, 1578791174),
('teacher-profile/create', 2, 'Route teacher-profile/create', NULL, NULL, 1578791174, 1578791174),
('teacher-profile/delete', 2, 'Route teacher-profile/delete', NULL, NULL, 1578791174, 1578791174),
('teacher-profile/index', 2, 'Route teacher-profile/index', NULL, NULL, 1578791174, 1578791174),
('teacher-profile/update', 2, 'Route teacher-profile/update', NULL, NULL, 1578791174, 1578791174),
('teacher-profile/view', 2, 'Route teacher-profile/view', NULL, NULL, 1578791174, 1578791174);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('*', 'admin/dashboard/*'),
('*', 'admin/dashboard/error'),
('*', 'admin/dashboard/index'),
('*', 'admin/rbac/permissions/*'),
('*', 'admin/rbac/permissions/add-relation'),
('*', 'admin/rbac/permissions/create'),
('*', 'admin/rbac/permissions/delete'),
('*', 'admin/rbac/permissions/index'),
('*', 'admin/rbac/permissions/remove-relation'),
('*', 'admin/rbac/permissions/scan'),
('*', 'admin/rbac/permissions/update'),
('*', 'admin/rbac/roles/*'),
('*', 'admin/rbac/roles/create'),
('*', 'admin/rbac/roles/delete'),
('*', 'admin/rbac/roles/update'),
('*', 'admin/settings/*'),
('*', 'admin/settings/app'),
('*', 'admin/users/*'),
('*', 'admin/users/create'),
('*', 'admin/users/delete'),
('*', 'admin/users/index'),
('*', 'admin/users/update'),
('*', 'administer'),
('*', 'auth/*'),
('*', 'auth/login'),
('*', 'auth/logout'),
('*', 'auth/password-request'),
('*', 'auth/password-update'),
('*', 'auth/register'),
('*', 'course-group/*'),
('*', 'course-group/create'),
('*', 'course-group/delete'),
('*', 'course-group/index'),
('*', 'course-group/update'),
('*', 'course-group/view'),
('*', 'course/*'),
('*', 'course/create'),
('*', 'course/delete'),
('*', 'course/index'),
('*', 'course/update'),
('*', 'course/view'),
('*', 'lesson-group/*'),
('*', 'lesson-group/create'),
('*', 'lesson-group/delete'),
('*', 'lesson-group/index'),
('*', 'lesson-group/update'),
('*', 'lesson-group/view'),
('*', 'lesson/*'),
('*', 'lesson/create'),
('*', 'lesson/delete'),
('*', 'lesson/index'),
('*', 'lesson/update'),
('*', 'lesson/view'),
('*', 'payment/*'),
('*', 'payment/create'),
('*', 'payment/delete'),
('*', 'payment/index'),
('*', 'payment/update'),
('*', 'payment/view'),
('*', 'site/*'),
('*', 'site/about'),
('*', 'site/captcha'),
('*', 'site/contact'),
('*', 'site/error'),
('*', 'site/index'),
('*', 'teacher-profile/*'),
('*', 'teacher-profile/create'),
('*', 'teacher-profile/delete'),
('*', 'teacher-profile/index'),
('*', 'teacher-profile/update'),
('*', 'teacher-profile/view'),
('admin/dashboard/*', 'admin/dashboard/error'),
('admin/dashboard/*', 'admin/dashboard/index'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/add-relation'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/create'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/delete'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/index'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/remove-relation'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/scan'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/update'),
('admin/rbac/roles/*', 'admin/rbac/roles/create'),
('admin/rbac/roles/*', 'admin/rbac/roles/delete'),
('admin/rbac/roles/*', 'admin/rbac/roles/update'),
('admin/settings/*', 'admin/settings/app'),
('admin/users/*', 'admin/users/create'),
('admin/users/*', 'admin/users/delete'),
('admin/users/*', 'admin/users/index'),
('admin/users/*', 'admin/users/update'),
('Administrator', 'administer'),
('Administrator', 'course/*'),
('Administrator', 'course/index'),
('auth/*', 'auth/login'),
('auth/*', 'auth/logout'),
('auth/*', 'auth/password-request'),
('auth/*', 'auth/password-update'),
('auth/*', 'auth/register'),
('Authenticated', 'course/*'),
('Authenticated', 'course/index'),
('course-group/*', 'course-group/create'),
('course-group/*', 'course-group/delete'),
('course-group/*', 'course-group/index'),
('course-group/*', 'course-group/update'),
('course-group/*', 'course-group/view'),
('course/*', 'course/view'),
('Guest', 'course/*'),
('Guest', 'course/index'),
('lesson-group/*', 'lesson-group/create'),
('lesson-group/*', 'lesson-group/delete'),
('lesson-group/*', 'lesson-group/index'),
('lesson-group/*', 'lesson-group/update'),
('lesson-group/*', 'lesson-group/view'),
('lesson/*', 'lesson/create'),
('lesson/*', 'lesson/delete'),
('lesson/*', 'lesson/index'),
('lesson/*', 'lesson/update'),
('lesson/*', 'lesson/view'),
('Master', '*'),
('payment/*', 'payment/create'),
('payment/*', 'payment/delete'),
('payment/*', 'payment/index'),
('payment/*', 'payment/update'),
('payment/*', 'payment/view'),
('site/*', 'site/about'),
('site/*', 'site/captcha'),
('site/*', 'site/contact'),
('site/*', 'site/error'),
('site/*', 'site/index'),
('teacher', 'Authenticated'),
('teacher-profile/*', 'teacher-profile/create'),
('teacher-profile/*', 'teacher-profile/delete'),
('teacher-profile/*', 'teacher-profile/index'),
('teacher-profile/*', 'teacher-profile/update'),
('teacher-profile/*', 'teacher-profile/view');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL COMMENT 'Название курса',
  `description` text NOT NULL COMMENT 'Текст описания курса',
  `price` int(11) NOT NULL COMMENT 'Стоимость',
  `lesson_count` int(11) NOT NULL COMMENT 'Количество занятий',
  `difficult` tinyint(4) NOT NULL COMMENT 'Степень сложности (от 1 до 3)',
  `image_path` varchar(250) DEFAULT NULL COMMENT 'Фоновая картинка'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `price`, `lesson_count`, `difficult`, `image_path`) VALUES
(1, 'PHP с нуля до Junior', 'Описание курса', 1000, 16, 1, NULL),
(2, 'Верстка', 'Основы верстки', 1000, 16, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `course_group`
--

CREATE TABLE `course_group` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL COMMENT 'Идентификатор курса',
  `date_start` date NOT NULL COMMENT 'Дата время начала занятий',
  `comment` text DEFAULT NULL COMMENT 'Комментарий (не обязательно)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `course_group`
--

INSERT INTO `course_group` (`id`, `course_id`, `date_start`, `comment`) VALUES
(1, 1, '2020-03-31', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL COMMENT 'Идентификатор курса',
  `name` varchar(150) NOT NULL COMMENT 'Название урока',
  `description` text NOT NULL COMMENT 'Текстовое описание урока',
  `duration_minutes` int(11) NOT NULL COMMENT 'Продолжительность (в минутах)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `lesson_group`
--

CREATE TABLE `lesson_group` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL COMMENT 'Идентификатор группы',
  `lesson_id` int(11) NOT NULL COMMENT 'Идентификатор урока',
  `time_start` datetime NOT NULL COMMENT 'Время начала урока',
  `teacher_id` int(11) NOT NULL COMMENT 'Идентификатор учителя'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1578244505),
('m130524_201442_create_user_table', 1578244530),
('m140506_102106_rbac_init', 1578244531),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1578244531),
('m170913_142352_create_settings_table', 1578244531),
('m180523_151638_rbac_updates_indexes_without_prefix', 1578244531);

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'Идентификатор пользователя (студента)',
  `payed_at` datetime DEFAULT NULL COMMENT 'Время платежа',
  `sum` int(11) DEFAULT NULL COMMENT 'Сумма платежа',
  `course_group_id` int(11) NOT NULL COMMENT 'Идентификатор группы в которую он вступает',
  `approved_at` datetime DEFAULT NULL COMMENT 'Время подтверждения платежа',
  `approved_by` int(11) DEFAULT NULL COMMENT 'Пользователь подтвердивший платеж',
  `scan_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`id`, `student_id`, `payed_at`, `sum`, `course_group_id`, `approved_at`, `approved_by`, `scan_path`) VALUES
(1, 1, NULL, 1000, 1, NULL, NULL, 'фывфывыфв');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `section_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `student_progress`
--

CREATE TABLE `student_progress` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'Идентификатор пользователя (студента)',
  `lesson_group_id` int(11) NOT NULL COMMENT 'Идентификатор пройденного урока'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `teacher_profile`
--

CREATE TABLE `teacher_profile` (
  `id` int(11) NOT NULL,
  `photo_path` varchar(250) NOT NULL COMMENT 'Путь к фото',
  `description` text NOT NULL COMMENT 'Описание опыта',
  `user_id` int(11) NOT NULL COMMENT 'Ссылка на пользователя'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teacher_profile`
--

INSERT INTO `teacher_profile` (`id`, `photo_path`, `description`, `user_id`) VALUES
(1, '', 'описание преподавателя', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `first_name`, `last_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1ZodOHS3SZAZkUHmBsVYJLnUThUlYk26', '$2y$13$wabPLbTtTywk2ipHmWAb2./ANV2OJB3WoPmfbqqte8Hb3M2odRWYS', NULL, 'mergenmasterf1@gmail.com', 'Hattie', 'Jacobi', 10, 1501889814, 1585607804),
(2, 'vsenger@rutherford.com', 'sHnq6_McSMRTtYAEnStxNAW26NMai3ex', '$2y$13$N0loi6KoKHVbyabKs0XEr.jz7uoZJM6Zgu0NGqRNSl1XqYKNWy1Ci', NULL, 'vsenger@rutherford.com', 'Dorothea', 'Rowe', 10, 1503772620, 1504064939),
(3, 'thompson.warren@padberg.biz', 'BnguNkoiCQf4Zn_GWhM4uFMtHFXz8C8u', '$2y$13$FFnFOZo5PqqZG9dqWYFwo.NyPyEsBu9u39hKHXeqTBmk10q1iZ7ue', NULL, 'thompson.warren@padberg.biz', 'Geovanni', 'Dare', 10, 1500700337, 1501322624),
(4, 'jamil.hessel@lowe.com', '2JAvBW1EwLtxS5PG1uv2B8SKvUuvOH3c', '$2y$13$OwiN7UYPLd1bV/UiyHSGXeCm9RcShpNQnFsqA/g0J481HAuNnGuri', NULL, 'jamil.hessel@lowe.com', 'Pascale', 'Nicolas', 10, 1502901456, 1503000727),
(5, 'lucienne48@rogahn.com', 'zqCBb3UVAYP8N0HpQfFh6r0i6EYBZoFS', '$2y$13$Y2.2.X5LxtrM21jac9lajeIVclP2LGW1ZbIOerIPBrpYyRMWqBDge', NULL, 'lucienne48@rogahn.com', 'Alford', 'Strosin', 10, 1502988716, 1503932799),
(6, 'stanton.fleta@hotmail.com', 'hYu8rkeQGCvH-kMyz7ZQvQb5HEZZYQL9', '$2y$13$i7vOm4utj2vxZr1boEYSBO6usgVEQAr2qVeop6CjslNypl5F8TmrO', NULL, 'stanton.fleta@hotmail.com', 'Antoinette', 'Larson', 10, 1501374035, 1503770129),
(7, 'loren66@yost.com', '2IF1vm_laFwbV1qPoeHy4StMU1lL8oh7', '$2y$13$UVi31EsmIccl7UiVO1E7pOLgC6Bzz5YxlkRaInNsB2TGMLyt0QO2m', NULL, 'loren66@yost.com', 'Shane', 'Veum', 10, 1504408663, 1504501176),
(8, 'adolphus.jast@hotmail.com', 'h96n9Sv9bzn1qR0RarWDcm8XEmWttS3g', '$2y$13$1kZkLt82V.5jDed0cy12K.w/S.3gZlbYK.skKP9LmXrnAXHHaiiKG', NULL, 'adolphus.jast@hotmail.com', 'Marjory', 'O\'Reilly', 10, 1499553449, 1503595580),
(9, 'pwunsch@hotmail.com', 'Hms4zBg7eQlOgJ6ZTVZrBWiCOvHDGcnK', '$2y$13$9GLQMyaTEoxVzQTxMUuay.Vg0x5Q8V4t7bu5T1fkhHgyABQ9hunn6', NULL, 'pwunsch@hotmail.com', 'Lamar', 'Smitham', 10, 1502497456, 1503971827),
(10, 'katelin59@schowalter.com', '4bnJTTawE3pUtNA38SbDkw3kCOFmq-MG', '$2y$13$sRH9yAfaB4uhn8kGn2zBnOsEoYr3MQ31iE6jqJ/5IAw.RhzAOGSou', NULL, 'katelin59@schowalter.com', 'Sally', 'Rempel', 10, 1500400339, 1504563576),
(11, 'elouise.wilkinson@ernser.com', 'DxWY0TW1SIpA6bvrOHPmsiickKi7LCEE', '$2y$13$pXKlbV716QVvbGfBKZPtBuUxkB04aIJBlwrhmmf3t.g1rGHUKA3Nm', NULL, 'elouise.wilkinson@ernser.com', 'Alberta', 'Wiza', 10, 1500532174, 1500604115),
(12, 'zechariah58@hotmail.com', 'tmhA6fghJ8ZQwUKp7AMYyQnC-vMyQbt1', '$2y$13$/PxfAlKzMvQJ/zhkCe/SgebzuKPXpY13Uuu7PybWS9pwqipzRu/kS', NULL, 'zechariah58@hotmail.com', 'Hubert', 'Murray', 10, 1504260853, 1504534296),
(13, 'meda91@yahoo.com', '9hdX_IAt8LAEhGcgh37sdHNap1LtP_aC', '$2y$13$y2k8MP8cf5zDLp8rPba5IOqYYerIDtaB91BqeZuorjpW3GTfgddCe', NULL, 'meda91@yahoo.com', 'Myrtle', 'Howell', 10, 1502944641, 1504557667),
(14, 'wrenner@yahoo.com', 'RfFA61a1H3NtITVJp_pecGQNGCfJF7-b', '$2y$13$gaYuJIRap56GHp1Yg9NjBuknyjz0/z8.zFWYZrTbJLHq9nIIlqXbO', NULL, 'wrenner@yahoo.com', 'Jacques', 'Pouros', 10, 1500064424, 1500677368),
(15, 'kilback.kareem@gmail.com', 'qplzwsSMJvZYkmqjB0o7fJEt3o230ujo', '$2y$13$s9l2P/sWTKC1BITMneaj/um9TsLrAH2j8zDzbMDZ55/FOF6rta.im', NULL, 'kilback.kareem@gmail.com', 'Maeve', 'Corkery', 10, 1500861523, 1503641318),
(16, 'gloria.heaney@yahoo.com', '_7QXlJnBT1xGskOMUwbxINg49AZdkYDP', '$2y$13$m1IpRCyq404PgZbozxDPyuPXc399IZFYEBu/UcPaVw1Z7l8Fsglg6', NULL, 'gloria.heaney@yahoo.com', 'Christine', 'Glover', 10, 1504100658, 1504490455),
(17, 'dicki.ellen@ohara.org', 'y5-t9SkZv0EcMfO9V1-WEUvpWZ4psTkj', '$2y$13$gQYQYG4hjEtJG241ooqcb.Lo19t/G1D88x8ifdWkeGx3miuSe1lJK', NULL, 'dicki.ellen@ohara.org', 'Mohamed', 'Cronin', 10, 1502009057, 1503931074),
(18, 'wthompson@hotmail.com', 'el-Y2X4VHu8qcJr1ayIw8BLD_mKzQ4Ij', '$2y$13$NYkNPluOx90Bj4D9yEKwFehLjItmuuMXmzGpkW8QgVgYIV1Cf1wQG', NULL, 'wthompson@hotmail.com', 'Kayleigh', 'Schimmel', 10, 1499913111, 1503395060),
(19, 'harry52@ward.com', 'qWdgqlFQZUzS9me9KFdEBm2lnCE2d4Vs', '$2y$13$wlYbFw6XJ6.B.zCtZnS7deNuAWg2l0pEQaDUQu7NF4KaR.KdTV2U6', NULL, 'harry52@ward.com', 'Christ', 'Ebert', 10, 1504073742, 1504490349),
(20, 'geovanni.carter@dubuque.net', 'lHHGqJYs3WZ1ftQ2LjVLenYi8LSBT6BJ', '$2y$13$7uWYCUszGDzbf/pBEtFoJejphDYCWo8Oc1b2g9gixUikbhw68rZuy', NULL, 'geovanni.carter@dubuque.net', 'Margaretta', 'Brekke', 10, 1503570376, 1504179475),
(21, 'fabian.oconner@hotmail.com', '7soLOJZ_qeCLseWA7DnfgyKJ8I2PGwdW', '$2y$13$cPyW7pU7G3p/XDBE4/6b3OIbwjrB2BPrLRfCDmLukxo..VrfVUQLG', NULL, 'fabian.oconner@hotmail.com', 'Catherine', 'Cartwright', 10, 1501188752, 1501774347),
(22, 'rmccullough@ebert.com', 'uJ9FbxxlgDZEsWVU4qbc7sgLWkNPg7dX', '$2y$13$oRbXw7XvL.o1ak4fxfDl1.Tx6Xh2RsJOaTjhJx0sQudXFPxSLInmW', NULL, 'rmccullough@ebert.com', 'Adela', 'Luettgen', 10, 1501080570, 1502130728),
(23, 'donnie06@kihn.com', 'RWwbnPAA_YQP62TyCw-Oh9fw7rjHOlGQ', '$2y$13$obtmN7jFRrP2jfCnA7tcge7sGkOrLMnNkUjAtOw6QmT4n/A.46QdG', NULL, 'donnie06@kihn.com', 'Isabelle', 'Hilll', 10, 1502569158, 1503265276),
(24, 'mac83@yahoo.com', 'xAUWFc2Au2qt9-6WTFLlfpz1VfkGTxyg', '$2y$13$V5n5JisbkQYqLIa3a2MLduwS2fv7wYkjUOiVCEiFs42uKRGjVzZtu', NULL, 'mac83@yahoo.com', 'Veronica', 'Hackett', 10, 1499925416, 1500837200),
(25, 'carolanne.rohan@ullrich.net', 'Nds07yxQpQ_TQrsclXSniwPw7vYvQpuv', '$2y$13$stMRiTJTyTkB/H4DtLn0m.CEMMeeF7ocnVPZ3djnfz6RO1HXEvGm.', NULL, 'carolanne.rohan@ullrich.net', 'Tommie', 'Jenkins', 10, 1499609262, 1501010933),
(26, 'aernser@hotmail.com', 'ZsxSDI7bUTQ3X46WCje8OPvO2jE0ovJz', '$2y$13$KqXSDU7ZI5yMjc7WcLDXxOTLVG5yCZTBoi3vABQvzedgnDRGdKuWO', NULL, 'aernser@hotmail.com', 'Michel', 'Welch', 10, 1500372626, 1501409756),
(27, 'okuneva.jaydon@gmail.com', '1j7235arvNLf95GUxhsjguUYHXD9TpWX', '$2y$13$A/yr00Da/v8GZ.B/.AHybe.oh2Q0LefqMXEMJjYbebxRrNkDjvBO2', NULL, 'okuneva.jaydon@gmail.com', 'Judy', 'Beatty', 10, 1500978830, 1501381704),
(28, 'rolando.gleason@hotmail.com', 'Ck7_-Eh2L6K0BCiAjHbXYn0rTiwH4-BV', '$2y$13$HV3v6vXrLZpNEeG.yVoM7uOLGLIo22vuLnifWLx3gnPh354KnWx4i', NULL, 'rolando.gleason@hotmail.com', 'Kelley', 'Brakus', 10, 1499443171, 1504485494),
(29, 'dedric83@glover.org', 'YdITMZyiRlQEHegOpVL2qKOMrCSJXRkt', '$2y$13$REk3hA7Epxzeatyo3MQIPuneYo0N/f0eL3URH30sqWK3j4VpXvGhC', NULL, 'dedric83@glover.org', 'Polly', 'Marquardt', 10, 1499812201, 1500398003),
(30, 'breilly@witting.com', 'WEaRKIE0vST37W7db7-kV54pd_3rPS6z', '$2y$13$sQgh.vSap5trjJ.bhNqtIuS4JsV9sIhUnie5Puk4fBV9bAuw88LKK', NULL, 'breilly@witting.com', 'Wanda', 'Schroeder', 10, 1499998535, 1501601708),
(31, 'lexus82@hotmail.com', 'xoRJxR28MjczJsZlQrtQ5FPecLgxC7ux', '$2y$13$3y7rqGMRKNa8u27TSbqof.FM8qsqWQbHFcchmTqyiIs8NOeE6L5vu', NULL, 'lexus82@hotmail.com', 'Jalyn', 'Spencer', 10, 1503901449, 1503906864),
(32, 'jordan.pfeffer@little.com', 'KITuV8sC28qHJ5Eojt7fyWZqOdV40Bdo', '$2y$13$1Ed49ksA1kpT/reRGNGpa.PFmXIeDAjPSjHpd/tMbxiCkmMjYqxna', NULL, 'jordan.pfeffer@little.com', 'Sim', 'Bins', 10, 1499926729, 1501602604),
(33, 'mueller.magdalena@beier.com', '9_OqTdARvFPU91j0RQEKrSq6CZ6pVq5b', '$2y$13$wq01FIszLgY3d2FhlzpMVeEWeY..qGR2R6ezuSjr9vOSAJxToS.9W', NULL, 'mueller.magdalena@beier.com', 'Eleazar', 'Sanford', 10, 1503290132, 1503537722),
(34, 'mitchell.maurice@quigley.net', 'He4nJ5MHP0v7GKZSvJdJN3aLuA8aSldg', '$2y$13$bU7RxrzcpvKvp0eZ.D.5D.1hg.5YCv28hnpVEr5AY/4MJ05PtckHC', NULL, 'mitchell.maurice@quigley.net', 'Angelita', 'Bashirian', 10, 1499937563, 1502922918),
(35, 'ledner.keaton@stark.com', 'j-NW0tpzNeGUl6nvFbTQbc4gGW44SQmM', '$2y$13$2Xgbh8ME..TYVB7pYV.DMOdlXLv1GFiOdVgUWkq74uNBiPEVHIoj.', NULL, 'ledner.keaton@stark.com', 'Julianne', 'Fisher', 10, 1504340068, 1504592075),
(36, 'tlittel@keeling.com', 'uWWDlXeWI_DY1eYAjg2ATgIC_r6vyuK_', '$2y$13$mBU9MXnwNuxASUUjqd3W8euo4f5Gyam7OKVyyujjWJhtsrD2b7AIK', NULL, 'tlittel@keeling.com', 'Alessandro', 'Douglas', 10, 1500559992, 1501710756),
(37, 'ayana13@gmail.com', 'qolu2-tQyPk_LDn4rU4Nj5oMIyng_PbL', '$2y$13$AcruCghcijrZEX9slRcSI.5ao0m/aKU2zaolh2rLka5YK38Wt7qNi', NULL, 'ayana13@gmail.com', 'Rosella', 'Nikolaus', 10, 1499770006, 1502357353),
(38, 'ckunze@feest.org', '0v3R4lG58xx6xpK6Ckrdt-6bBZp0FfZ7', '$2y$13$0gDbqx8PbAC7E7TKxi2Cr.Bdje9Zi8Br4eyAm2lmT5hWmyIleEY.y', NULL, 'ckunze@feest.org', 'Norval', 'Bernier', 10, 1502443891, 1503898956),
(39, 'claudia.deckow@wiza.com', 'Zy14mvceyVPtysm91buTJUi4kSKCasJr', '$2y$13$Ic2V6TbGZtAmSaFnY63buOIFtf8yoGhOlUqMUPQuXvy7wvb3rgAHW', NULL, 'claudia.deckow@wiza.com', 'Mariana', 'Harris', 10, 1503960236, 1504406229),
(40, 'tomasa81@yahoo.com', 'Gu7KRYOLVfBm9bNEG9y0MTDgLL_nlxzr', '$2y$13$fLYzXxXsYqm6RNaMhS8YL.UJXhtfaK8OAIFFtf6v8i2U29yW2tXgm', NULL, 'tomasa81@yahoo.com', 'Everette', 'Wilkinson', 10, 1503907434, 1504554471),
(41, 'wilma11@hotmail.com', '-pm3cH_QqWBIBQazyX9uFYOcPPmeqbrd', '$2y$13$jsvSv693gGrwgP96PJQi8ezCrdA.bNBwV45gFA8tRqyuO/o4xT7XS', NULL, 'wilma11@hotmail.com', 'Oma', 'Stoltenberg', 10, 1504380714, 1504390950),
(42, 'wade.witting@yahoo.com', 'NKVzKrOfmSiW1cnR7edfzkbLrFCBJf03', '$2y$13$J/im7VjE19SE9kufEny2MuD0EK4.AGv3LFhCmlkmB4T2ynvEiBk8q', NULL, 'wade.witting@yahoo.com', 'Russel', 'Feil', 10, 1500212586, 1501317776),
(43, 'eulah64@pagac.com', '2ASD_bfObat4KEFAQXR_uca3u1og-Mnt', '$2y$13$BCko27CqqiJiDPd0vQFMR.ZhQ.sdkZ7uTKotAVD0sRPLv31Lq617G', NULL, 'eulah64@pagac.com', 'Zane', 'Rosenbaum', 10, 1500231187, 1500891445),
(44, 'deckow.shanon@gmail.com', 'HRgwqjqhTMEDksV2wSloXZYpxK1WXKY4', '$2y$13$lTdwABqnnUgYDlHbnCH6V.ZJmE/.ejNi6GWloy3J2PYTek8nzQIsK', NULL, 'deckow.shanon@gmail.com', 'Jessyca', 'Beatty', 10, 1500600665, 1501506068),
(45, 'maxine13@yahoo.com', '3syEQ-gtDwZy4PYtABpEQ7N2EsjnSCc_', '$2y$13$3uRDbo/Y22ZeDZ.XxxOgF.XYZNtoMrlwKwcEMtV2vAqMyUhe4HJB6', NULL, 'maxine13@yahoo.com', 'Alberta', 'Price', 10, 1500849000, 1502103034),
(46, 'guadalupe.hyatt@gmail.com', 'zIBR6dOiu-h0bF_2U4fv0g3nNXO7k01d', '$2y$13$UVLI5HEzkgZo1TbZ1VmW/OLz/0D28yhyBjPp2i6LGAcOmTAWXopXq', NULL, 'guadalupe.hyatt@gmail.com', 'Breanna', 'Kshlerin', 10, 1502402759, 1502698246),
(47, 'kdurgan@durgan.info', 'wvCm3mMQ2Sh2-DbVReEmsVpAzBrxZUB0', '$2y$13$Mh5UeLxCznks0yXrBcZJq.Jo0gh9E5xwVhcurCjaJ8ZPWY31JTh/m', NULL, 'kdurgan@durgan.info', 'Donnell', 'Becker', 10, 1501200035, 1503479607),
(48, 'whansen@grady.com', 'QY40mkjLr3Tm5sXo4yKf9c_f7mh2gLr0', '$2y$13$uQfRaeZFaZ7fObf.oHGkPulnfucfiwikasQ2cYn0SABIeszB1qpgS', NULL, 'whansen@grady.com', 'Randal', 'Klocko', 10, 1501978597, 1502197827),
(49, 'jasmin.nikolaus@wyman.com', 'Wvzofr4bMsFhia6AFm3MdCAWHBrN4g2k', '$2y$13$5NRtoxpR4bMGlioJrIvQmukpwjQn8jZTbvoVNeyFeG0e0vOtY/XtC', NULL, 'jasmin.nikolaus@wyman.com', 'Dante', 'Price', 10, 1503854968, 1504304834),
(50, 'knicolas@rippin.com', 'yGnE6nGJ1izQl9WzSG0uTc_zAtDm0WRS', '$2y$13$imhKCC31fByn52qPOsKOUu7mKlaPLzKc8C1Cl4Q0WG9DD.rEsR8s.', NULL, 'knicolas@rippin.com', 'Rodolfo', 'Koch', 10, 1503171681, 1504328567);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `course_group`
--
ALTER TABLE `course_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Индексы таблицы `lesson_group`
--
ALTER TABLE `lesson_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approved_by` (`approved_by`),
  ADD KEY `student_id` (`student_id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`section_name`,`key`);

--
-- Индексы таблицы `student_progress`
--
ALTER TABLE `student_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_group_id` (`lesson_group_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Индексы таблицы `teacher_profile`
--
ALTER TABLE `teacher_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `course_group`
--
ALTER TABLE `course_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lesson_group`
--
ALTER TABLE `lesson_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `student_progress`
--
ALTER TABLE `student_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `teacher_profile`
--
ALTER TABLE `teacher_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `course_group`
--
ALTER TABLE `course_group`
  ADD CONSTRAINT `course_group_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Ограничения внешнего ключа таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Ограничения внешнего ключа таблицы `lesson_group`
--
ALTER TABLE `lesson_group`
  ADD CONSTRAINT `lesson_group_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `lesson_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `course_group` (`id`),
  ADD CONSTRAINT `lesson_group_ibfk_3` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`);

--
-- Ограничения внешнего ключа таблицы `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`approved_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `student_progress`
--
ALTER TABLE `student_progress`
  ADD CONSTRAINT `student_progress_ibfk_1` FOREIGN KEY (`lesson_group_id`) REFERENCES `lesson_group` (`id`),
  ADD CONSTRAINT `student_progress_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `teacher_profile`
--
ALTER TABLE `teacher_profile`
  ADD CONSTRAINT `teacher_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
