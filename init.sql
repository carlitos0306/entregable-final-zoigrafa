-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 06-04-2026 a las 23:08:16
-- Versión del servidor: 12.2.2-MariaDB-ubu2404
-- Versión de PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_ef`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `estado` tinyint(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `precio`, `descripcion`, `stock`, `estado`, `created`, `modified`) VALUES
(1, 'Botines con Punta de Acero', 'Calzado de Seguridad', 350.00, 'Botines de cuero vacuno con puntera de acero reforzada, suela antideslizante y dieléctrica.', 20, 1, '2026-04-06 23:03:19', '2026-04-06 23:03:19'),
(2, 'Casco de Seguridad ABS', 'Protección Craneal', 85.00, 'Casco de alta resistencia con suspensión de 6 puntos. Ajuste de trinquete. Color amarillo.', 10, 1, '2026-04-06 23:04:31', '2026-04-06 23:04:31'),
(3, 'Overol Térmico Impermeable', 'Ropa de Trabajo', 420.00, 'Overol azul industrial con cintas reflectantes de 2\", forro térmico para bajas temperaturas.', 30, 1, '2026-04-06 23:05:14', '2026-04-06 23:05:14'),
(4, 'Guantes de Nitrilo High-Grip', 'Protección Manual', 45.00, 'Guantes resistentes a químicos y aceites, excelente agarre en superficies mojadas. Talla L.', 50, 1, '2026-04-06 23:06:03', '2026-04-06 23:06:03'),
(5, 'Chaleco Reflectivo Clase 2', 'Alta Visibilidad', 60.00, 'Chaleco de malla naranja con bandas reflectantes tipo H. Ideal para construcción y vialidad.', 60, 1, '2026-04-06 23:06:38', '2026-04-06 23:06:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `language` varchar(10) DEFAULT 'es',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `password`, `language`, `created`, `modified`) VALUES
(5, 'carlos', 'jaure', 'carlos@gmail.com', '70917437', '$2y$12$zxBgjxNLFz4PCOGYY.N9oONBdkbIdMkyQqMUxVvPqzsuN3u1y6MM.', 'es', '2026-04-06 22:59:19', '2026-04-06 22:59:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
