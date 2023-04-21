-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 22 2023 г., 00:32
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `videohosting`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `videos_id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `videos_id`, `user_id`, `user_name`, `text`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'T-1000', 'Несомненно, одна из моих лучших ролей, но стоило ли это добавлять в учебный проект?', '2023-04-21 22:12:46', '2023-04-21 22:12:46'),
(2, 2, 4, 'T-1000 Hesus', 'Не вижу в этом ничего плохого.', '2023-04-21 22:14:54', '2023-04-21 22:14:54'),
(5, 2, 3, 'T-1000', 'Ещё бы ты видел что-то плохое. Напомнить события второй части?', '2023-04-21 22:19:43', '2023-04-21 22:19:43'),
(6, 3, 5, 'SANSara', 'помню как записывали этот ролик. холод пробирал до КОСТЕЙ', '2023-04-21 22:27:48', '2023-04-21 22:27:48'),
(7, 3, 6, 'Papyrus', 'Я НАДЕЯЛСЯ ЧТО ХОТЯ БЫ ЗДЕСЬ ТЫ НЕ БУДЕШЬ ДЕМОНСТРИРОВАТЬ ВСЕМ СВОЙ УЖАСНЫЙ ЮМОР!!!', '2023-04-21 22:29:50', '2023-04-21 22:29:50');

-- --------------------------------------------------------

--
-- Структура таблицы `dislikes`
--

CREATE TABLE `dislikes` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `videos_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dislikes`
--

INSERT INTO `dislikes` (`id`, `users_id`, `videos_id`, `created_at`, `updated_at`) VALUES
(1, 2, 8, '2023-04-21 21:02:58', '2023-04-21 21:02:58');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `videos_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `users_id`, `videos_id`, `created_at`, `updated_at`) VALUES
(1, 2, 6, '2023-04-21 21:02:23', '2023-04-21 21:02:23'),
(2, 2, 3, '2023-04-21 21:03:08', '2023-04-21 21:03:08'),
(3, 2, 2, '2023-04-21 21:03:18', '2023-04-21 21:03:18');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_03_113836_create_videos_table', 1),
(6, '2023_04_03_113905_create_comments_table', 1),
(7, '2023_04_03_113943_create_likes_table', 1),
(8, '2023_04_03_114010_create_dislikes_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nikname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nikname`, `email`, `password`, `path`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Persona4_5', 'user@mail.com', '$2y$10$VP8VpLFYyvNSHTtNgHYR0.sbojBmzNgtnusv.NfiFLfAhHv7Cz78q', 'TqbLALM8RETHLvxrUYGwBYAyDrRH6TQ9pWXQE6GM.jpg', 'user', NULL, '2023-04-21 20:29:15', '2023-04-21 20:29:15'),
(2, 'MadWithpower', 'admin@mail.com', '$2y$10$bun/PKBq/NR3DTxRa1M56uunsUOAM3CWdb7.KzWmUlwfqlKwsIi9G', '1IzU6Xrz6rfflEYgN1qNyw4MYzySZmMzSKiFPj52.jpg', 'admin', NULL, '2023-04-21 21:02:04', '2023-04-21 21:02:04'),
(3, 'T-1000', 'terminator@mail.ru', '$2y$10$tHdnk4w26hlOkWsVXkAWYOItdg02YEBFSelTWkGONeadqELBF6br6', 'vLvLPrM0cmjvu8QcQJEOWjFZjilCg0qomSRAeS0a.jpg', 'user', NULL, '2023-04-21 22:06:03', '2023-04-21 22:06:03'),
(4, 'T-1000 Hesus', 'teremnator@gmail.com', '$2y$10$9m4gAoPKMve1WSl4u625geCPAE7agNB49fM4lUmdrpqcexTfvGmEe', 'q45eg8NxFtbghwxuw2eRrrtVAxYo6sQtXBLZdSUf.jpg', 'user', NULL, '2023-04-21 22:11:08', '2023-04-21 22:11:08'),
(5, 'SANSara', 'sanes@mail.ru', '$2y$10$NH8hQUvxTPh4xmrZDK1SaeeQTmQ43Ld08f5DNuoT1ag9ssWt/bb9e', 'bXXGQaPty0SCtkBu7TUYqrMHxg9jPsjcWawSZofj.png', 'user', NULL, '2023-04-21 22:26:01', '2023-04-21 22:26:01'),
(6, 'Papyrus', 'pappy@yandex.ru', '$2y$10$AU/gcMhv2Ff.ecVfxXJqiOVGc.0krGdT7F.bR.gqKay/rYtkONuZm', 'j0CyqTOje5Sv8iakUgwH8MWF4WwCpKuiKkjRROyo.png', 'user', NULL, '2023-04-21 22:28:38', '2023-04-21 22:28:38');

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE `videos` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `likes` int DEFAULT NULL,
  `dislikes` int DEFAULT NULL,
  `likes_to_dislikes` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `restrictions` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id`, `users_id`, `title`, `path`, `description`, `likes`, `dislikes`, `likes_to_dislikes`, `created_at`, `updated_at`, `category`, `restrictions`) VALUES
(1, 1, 'Кёрби Анимация', 'bk6lwsfHrFic5vo75EKYlQuyN2fkEbrE04Hl5Eno.mp4', 'Песня - Choice', 0, 0, 0, '2023-04-21 23:43:58', '2023-04-21 23:43:58', 'game', 0),
(2, 1, 'Мем с ногой фильм классика', 'e7KZ82KWyoc9lMH75dlRQ3iMI7vSDEPo9ukOBfa0.mp4', NULL, 1, 0, 1, '2023-04-21 23:45:46', '2023-04-22 00:03:18', 'film', 0),
(3, 1, 'Спагетти и СМЕРТЬ', 'Yl3aAgf3UQmO9P8eRNCC0RYJsdVIz9kq3q0iLYLf.mp4', NULL, 1, 0, 1, '2023-04-21 23:46:38', '2023-04-22 00:03:08', 'game', 0),
(4, 1, 'Святая война - Лазурный Лев', 'KxVOTxzZ2lkPXAgrszwWlqyvgyYlmlOX8eHybkki.mp4', 'Музыкальное видео!!!', 0, 0, 0, '2023-04-21 23:47:46', '2023-04-21 23:47:46', 'cartoon', 0),
(5, 1, 'Я твой отец', 'HhSgl7ZuUEcDYEN7FY9X1I4pVtd1cNdqPD4RyxBG.mp4', 'Всем известный момент', 0, 0, 0, '2023-04-21 23:49:10', '2023-04-22 00:04:26', 'film', 1),
(6, 1, 'Электрический мозг - АНИМАЦИЯ', 'U54pCKwBTg9kl0A0bUd3KIfT0V9yTymMPh164I1A.mp4', 'Работал над этим год', 1, 0, 1, '2023-04-21 23:50:08', '2023-04-22 00:02:23', 'TVseries', 0),
(7, 1, 'Деньги или жизнь', 'ChsytvTx0NdaYDeasb14jhNx9GzIVVrC8PGckkPk.mp4', NULL, 0, 0, 0, '2023-04-21 23:51:10', '2023-04-21 23:51:10', 'game', 0),
(8, 1, 'Хоббиты', 'LdeN5DXEHKnYsPG228Cn7U3Zf2eUml98RJAUxY4Z.mp4', 'идут', 0, 1, -1, '2023-04-21 23:55:09', '2023-04-22 00:02:58', 'film', 0),
(9, 1, 'Мей - AMV', 'nDN6a2njdNNT1oIm3g8xC2fWJ38a9rG6Nesz8uKS.mp4', 'Девочка-дракон-лошадь', 0, 0, 0, '2023-04-21 23:56:10', '2023-04-21 23:56:10', 'cartoon', 0),
(10, 1, 'Lions inside', 'u4BveMsklC7iaoJFO50UgzjfUcaWLvCkV6AsK0Js.mp4', 'LMK АМВишка', 0, 0, 0, '2023-04-21 23:58:22', '2023-04-22 00:04:33', 'cartoon', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_videos_id_foreign` (`videos_id`);

--
-- Индексы таблицы `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dislikes_users_id_foreign` (`users_id`),
  ADD KEY `dislikes_videos_id_foreign` (`videos_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_users_id_foreign` (`users_id`),
  ADD KEY `likes_videos_id_foreign` (`videos_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nikname_unique` (`nikname`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_users_id_foreign` (`users_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_videos_id_foreign` FOREIGN KEY (`videos_id`) REFERENCES `videos` (`id`);

--
-- Ограничения внешнего ключа таблицы `dislikes`
--
ALTER TABLE `dislikes`
  ADD CONSTRAINT `dislikes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dislikes_videos_id_foreign` FOREIGN KEY (`videos_id`) REFERENCES `videos` (`id`);

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_videos_id_foreign` FOREIGN KEY (`videos_id`) REFERENCES `videos` (`id`);

--
-- Ограничения внешнего ключа таблицы `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
