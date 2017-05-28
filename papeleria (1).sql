-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2017 a las 18:39:01
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papeleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_05_16_045619_create_products_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('luigidanny@hotmail.com', '2717426a8521602353086baafdcd7f9bfa7aca42cb4c3524fd284f312b2c2e42', '2017-05-16 08:02:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `available` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `price`, `category`, `available`, `model`, `brand`, `size`, `weight`, `type`, `unit`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Corrector liquido blanco', 'A1B2C3', '15.00', '', 'si', '123', 'PaperMate', '10x10x0', '200ML', 'frasco', 'PZA', 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Lapicera BIC punto fino', 'A1B2C3D4', '12.00', '', 'no', '1234', 'BIC', '10x1.5', 'n/a', 'Pieza', 'PZA', 'Ninguno', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Goma de Borrar para lapiz', 'A1B2C3D4C5', '2.50', '', 'si', '12345', 'Pelican', '2.5x5', '5 gr.', 'Pieza', 'PZA', 'n/a', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Paquete de 500 Hojas Papermate', 'A1B2C3D4C5E6', '480.00', '', 'no', '123456', 'Papermate', 'A4', '2.5 Kg.', 'Paquete', 'PAQ', 'Paquete de 500 Hojas tipo carta(a4) marca papermate.', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Dolores Cardenas', 'danieldolores117@gmail.com', '$2y$10$BnRoxabE/zhdA8iAVxmzYOx2sOkgFY9nkv0Hgpir3PS/qTiM1NtsO', 'EBRtAsruqoIv5P2UtovPPN9hRvV3FlKjPI1bnRAlGXoxXYX2y2SW47ncNoCg', 'admin', '2017-03-11 01:17:55', '2017-03-15 00:22:35'),
(2, 'daniel dolores', 'luigidanny@hotmail.com', '$2y$10$sxRkMnYJNCf7OyX8/yER.OyxVCDw.FpcpTPoQBacfSg2G0su1LeKq', 'PUjSfNzgKPYDh2HhiIZHJf6PuQZP8IcXCR8KwrMeELiqSjyLXn1NZ7slayy2', 'admin', '2017-03-11 05:21:50', '2017-05-23 04:35:48'),
(3, 'Kevin Perez', 'kevindperezm@hotmail.com', '$2y$10$vFRGEsWZReSVSIQji7hC8e.2bqFw7pviMf/iNx1XbrpGZBkCIDjNK', '9ZW5zrAZX0WfPtZe0JDAnrN9r7YX02mpOJZRjBPWeoC0y3QXBYwc8X0cnaP9', 'normal', '2017-05-16 07:55:17', '2017-05-21 23:00:22'),
(4, 'Casandra Dolores Cardenas', 'casandrapeach@gmail.com', '$2y$10$3eB2cda8vyF6XSfxOekV5uhnvbwjY0RymX3TBEMvNYud2cZI2O/zS', 'TPBVao2aCBU6UyaBGX6Cy3fAr02hhoTTQdCkVdCv1JFFMwe4MWD5gdALGvJg', 'admin', '2017-05-21 23:04:00', '2017-05-22 00:44:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
