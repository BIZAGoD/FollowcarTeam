-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2025 a las 20:53:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

Create database Followcar;
USE Followcar;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `followcar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CategoriasInventario`
--

CREATE TABLE `CategoriasInventario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` longtext DEFAULT NULL,
  `CreatedAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CategoriasServicio`
--

CREATE TABLE `CategoriasServicio` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` longtext DEFAULT NULL,
  `Icono` varchar(50) DEFAULT NULL,
  `CreatedAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Citas`
--

CREATE TABLE `Citas` (
  `Id` int(11) NOT NULL,
  `ClienteId` int(11) NOT NULL,
  `VehiculoId` int(11) NOT NULL,
  `TipoServicioId` int(11) NOT NULL,
  `MecanicoId` int(11) DEFAULT NULL,
  `FechaHora` datetime(6) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `MotivoCancelacion` longtext DEFAULT NULL,
  `ObservacionesCliente` longtext DEFAULT NULL,
  `ObservacionesInternas` longtext DEFAULT NULL,
  `Prioridad` varchar(10) NOT NULL,
  `CreatedAt` datetime(6) NOT NULL,
  `UpdatedAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cotizaciones`
--

CREATE TABLE `Cotizaciones` (
  `Id` int(11) NOT NULL,
  `DiagnosticoId` int(11) NOT NULL,
  `NumeroCotizacion` varchar(20) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL,
  `IVA` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `MotivoRechazo` longtext DEFAULT NULL,
  `FechaAprobacion` datetime(6) DEFAULT NULL,
  `FechaExpiracion` datetime(6) NOT NULL,
  `CreatedAt` datetime(6) NOT NULL,
  `UpdatedAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DetallesCotizacion`
--

CREATE TABLE `DetallesCotizacion` (
  `Id` int(11) NOT NULL,
  `CotizacionId` int(11) NOT NULL,
  `Tipo` varchar(10) NOT NULL,
  `PiezaId` int(11) DEFAULT NULL,
  `ServicioId` int(11) DEFAULT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioUnitario` decimal(10,2) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL,
  `Notas` longtext DEFAULT NULL,
  `CreatedAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Diagnosticos`
--

CREATE TABLE `Diagnosticos` (
  `Id` int(11) NOT NULL,
  `CitaId` int(11) NOT NULL,
  `MecanicoId` int(11) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `DescripcionProblema` longtext NOT NULL,
  `DiagnosticoDetallado` longtext DEFAULT NULL,
  `Recomendaciones` longtext DEFAULT NULL,
  `FechaInicio` datetime(6) DEFAULT NULL,
  `FechaFin` datetime(6) DEFAULT NULL,
  `FotosEvidencia` longtext DEFAULT NULL,
  `CreatedAt` datetime(6) NOT NULL,
  `UpdatedAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DocumentosVehiculo`
--

CREATE TABLE `DocumentosVehiculo` (
  `Id` int(11) NOT NULL,
  `VehiculoId` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `ArchivoUrl` varchar(255) NOT NULL,
  `FechaVencimiento` datetime(6) DEFAULT NULL,
  `CreatedAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Especialidades`
--

CREATE TABLE `Especialidades` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` longtext DEFAULT NULL,
  `CreatedAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Continue similarly for the remaining table names.
