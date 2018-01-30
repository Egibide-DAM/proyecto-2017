-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net

-- Servidor: localhost
-- Tiempo de generación: 29-01-2018 a las 21:08:16
-- Versión del servidor: 5.7.21-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `bd`
--
CREATE DATABASE IF NOT EXISTS `bd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

DROP TABLE IF EXISTS `datos`;
CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `mensaje` varchar(100) NOT NULL,
  `DateTime_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `cliente`, `topic`, `mensaje`, `DateTime_created`) VALUES
(1, 'Photon', 'photon/humedad', '31.700001', '2018-01-29 20:49:46'),
(2, 'Photon', 'photon/temperatura', '23.100000', '2018-01-29 20:49:46');

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
