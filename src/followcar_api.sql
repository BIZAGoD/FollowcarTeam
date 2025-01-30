-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2025 at 07:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `followcar_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `CategoriasInventario`
--

CREATE TABLE `CategoriasInventario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `CategoriasInventario`
--

INSERT INTO `CategoriasInventario` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Categoria 1', 'Descripcion de la categoria 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `CategoriasServicio`
--

CREATE TABLE `CategoriasServicio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `icono` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `CategoriasServicio`
--

INSERT INTO `CategoriasServicio` (`id`, `nombre`, `descripcion`, `icono`, `created_at`, `updated_at`) VALUES
(1, 'Categoria 1', 'Descripcion de la categoria 1', 'icono1.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Citas`
--

CREATE TABLE `Citas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ClienteId` bigint(20) UNSIGNED NOT NULL,
  `VehiculoId` bigint(20) UNSIGNED NOT NULL,
  `TipoServicioId` bigint(20) UNSIGNED NOT NULL,
  `MecanicoId` bigint(20) UNSIGNED NOT NULL,
  `FechaHora` date NOT NULL,
  `Estado` varchar(255) NOT NULL,
  `MotivoCancelacion` varchar(255) DEFAULT NULL,
  `ObservacionesCliente` text DEFAULT NULL,
  `ObservacionesInternas` text DEFAULT NULL,
  `Prioridad` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Citas`
--

INSERT INTO `Citas` (`id`, `ClienteId`, `VehiculoId`, `TipoServicioId`, `MecanicoId`, `FechaHora`, `Estado`, `MotivoCancelacion`, `ObservacionesCliente`, `ObservacionesInternas`, `Prioridad`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2025-01-29', 'Pendiente', 'No se presento', 'Cliente no se presento', 'Cliente no se presento', 'Alta', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Cotizaciones`
--

CREATE TABLE `Cotizaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `DiagnosticoId` bigint(20) UNSIGNED NOT NULL,
  `NumeroCotizacion` varchar(255) NOT NULL,
  `Subtotal` decimal(8,2) NOT NULL,
  `IVA` decimal(8,2) NOT NULL,
  `Total` decimal(8,2) NOT NULL,
  `Estado` varchar(255) NOT NULL,
  `MotivoRechazo` varchar(255) DEFAULT NULL,
  `FechaAprobacion` date NOT NULL,
  `FechaExpiracion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Cotizaciones`
--

INSERT INTO `Cotizaciones` (`id`, `DiagnosticoId`, `NumeroCotizacion`, `Subtotal`, `IVA`, `Total`, `Estado`, `MotivoRechazo`, `FechaAprobacion`, `FechaExpiracion`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 1000.00, 160.00, 1160.00, 'Pendiente', 'No se acepto el presupuesto', '2025-01-29', '2025-02-28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `DetallesCotizaciones`
--

CREATE TABLE `DetallesCotizaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CotizacionId` bigint(20) UNSIGNED NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  `PiezaId` bigint(20) UNSIGNED DEFAULT NULL,
  `ServicioId` bigint(20) UNSIGNED DEFAULT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioUnitario` decimal(8,2) NOT NULL,
  `Subtotal` decimal(8,2) NOT NULL,
  `Notas` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `DetallesCotizaciones`
--

INSERT INTO `DetallesCotizaciones` (`id`, `CotizacionId`, `Tipo`, `PiezaId`, `ServicioId`, `Descripcion`, `Cantidad`, `PrecioUnitario`, `Subtotal`, `Notas`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pieza', 1, NULL, 'Pieza 1', 1, 100.00, 100.00, 'Pieza 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Diagnosticos`
--

CREATE TABLE `Diagnosticos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CitaId` bigint(20) UNSIGNED NOT NULL,
  `MecanicoId` bigint(20) UNSIGNED NOT NULL,
  `Estado` varchar(255) NOT NULL,
  `DescripcionProblema` varchar(255) NOT NULL,
  `DiagnosticoDetallado` varchar(255) NOT NULL,
  `Recomendaciones` varchar(255) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `FotosEvidencia` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Diagnosticos`
--

INSERT INTO `Diagnosticos` (`id`, `CitaId`, `MecanicoId`, `Estado`, `DescripcionProblema`, `DiagnosticoDetallado`, `Recomendaciones`, `FechaInicio`, `FechaFin`, `FotosEvidencia`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'En proceso', 'Problema 1', 'Diagnostico 1', 'Recomendacion 1', '2025-01-29', '2025-01-29', 'Foto 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `DocumentosVehiculo`
--

CREATE TABLE `DocumentosVehiculo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `VehiculoId` bigint(20) UNSIGNED NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  `ArchivoUrl` varchar(255) NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `DocumentosVehiculo`
--

INSERT INTO `DocumentosVehiculo` (`id`, `VehiculoId`, `Tipo`, `ArchivoUrl`, `FechaVencimiento`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tipo 1', 'Archivo 1', '2025-01-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Especialidades`
--

CREATE TABLE `Especialidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Especialidades`
--

INSERT INTO `Especialidades` (`id`, `Nombre`, `Descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Especialidad 1', 'Descripcion 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Facturas`
--

CREATE TABLE `Facturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Facturas`
--

INSERT INTO `Facturas` (`id`, `cliente_id`, `fecha`, `total`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-01-29', 100.00, 'pendiente', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Inventarios`
--

CREATE TABLE `Inventarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(8,2) NOT NULL,
  `CategoriaId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Inventarios`
--

INSERT INTO `Inventarios` (`id`, `Nombre`, `Descripcion`, `Cantidad`, `Precio`, `CategoriaId`, `created_at`, `updated_at`) VALUES
(1, 'Producto 1', 'Descripcion 1', 10, 100.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Mecanicos`
--

CREATE TABLE `Mecanicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Mecanicos`
--

INSERT INTO `Mecanicos` (`id`, `Nombre`, `Apellido`, `Telefono`, `Email`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'Perez', '12345678', 'juanchotacorta@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Mensajes`
--

CREATE TABLE `Mensajes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Contenido` varchar(255) NOT NULL,
  `RemitenteId` int(11) NOT NULL,
  `DestinatarioId` int(11) NOT NULL,
  `FechaEnvio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Estado` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Mensajes`
--

INSERT INTO `Mensajes` (`id`, `Contenido`, `RemitenteId`, `DestinatarioId`, `FechaEnvio`, `Estado`, `created_at`, `updated_at`) VALUES
(1, 'Hola, ¿cómo estás?', 1, 2, '2025-01-30 06:00:00', 'Enviado', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_28_151021_create_categorias_inventario_table', 1),
(5, '2025_01_29_000609_create_categorias_servicios_table', 1),
(6, '2025_01_29_005355_create_citas_table', 1),
(7, '2025_01_29_012310_create_cotizaciones_table', 1),
(8, '2025_01_29_141025_create_detalles_cotizaciones_table', 1),
(9, '2025_01_29_145633_diagnosticos', 1),
(10, '2025_01_29_150734_create_documentos_vehiculos_table', 1),
(11, '2025_01_29_163532_create_especialidades_table', 1),
(12, '2025_01_29_232915_create_facturas_table', 1),
(13, '2025_01_29_234239_create_inventarios_table', 1),
(14, '2025_01_29_235200_create_mecanicos_table', 1),
(15, '2025_01_30_000546_create_mensajes_table', 1),
(16, '2025_01_30_001221_create_movimientosinventarios_table', 1),
(17, '2025_01_30_002832_create_notificaciones_table', 1),
(18, '2025_01_30_003526_create_pagos_table', 1),
(19, '2025_01_30_004549_create_roles_table', 1),
(20, '2025_01_30_004849_create_tipos_servicios_table', 1),
(21, '2025_01_30_010131_create_usuarios_table', 1),
(22, '2025_01_30_014939_create_vehiculos_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `MovimientosInventario`
--

CREATE TABLE `MovimientosInventario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `InventarioId` int(11) NOT NULL,
  `TipoMovimiento` varchar(255) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `FechaMovimiento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `MovimientosInventario`
--

INSERT INTO `MovimientosInventario` (`id`, `InventarioId`, `TipoMovimiento`, `Cantidad`, `FechaMovimiento`, `Descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'Entrada', 10, '2025-01-30 06:00:00', 'Compra de productos', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Notificaciones`
--

CREATE TABLE `Notificaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `UsuarioId` int(11) NOT NULL,
  `Mensaje` varchar(255) NOT NULL,
  `FechaEnvio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Estado` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Notificaciones`
--

INSERT INTO `Notificaciones` (`id`, `UsuarioId`, `Mensaje`, `FechaEnvio`, `Estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Venta de productos', '2025-01-30 06:00:00', 'Enviado', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Pagos`
--

CREATE TABLE `Pagos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `FacturaId` bigint(20) NOT NULL,
  `Monto` decimal(8,2) NOT NULL,
  `FechaPago` date NOT NULL,
  `MetodoPago` varchar(50) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Pagos`
--

INSERT INTO `Pagos` (`id`, `FacturaId`, `Monto`, `FechaPago`, `MetodoPago`, `Estado`, `created_at`, `updated_at`) VALUES
(1, 1, 100.00, '2025-01-30', 'Efectivo', 'Pagado', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `TiposServicio`
--

CREATE TABLE `TiposServicio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `TiposServicio`
--

INSERT INTO `TiposServicio` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Tipo 1', 'Descripcion del tipo 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `nombre`, `apellido`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'Perez', '12345678', 'juanjo@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Vehiculos`
--

CREATE TABLE `Vehiculos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Modelo` varchar(255) NOT NULL,
  `Marca` varchar(255) NOT NULL,
  `Anio` varchar(255) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `Placa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Vehiculos`
--

INSERT INTO `Vehiculos` (`id`, `Modelo`, `Marca`, `Anio`, `Color`, `Placa`, `created_at`, `updated_at`) VALUES
(1, 'Modelo 1', 'Marca 1', '2021', 'Color 1', 'Placa 1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `CategoriasInventario`
--
ALTER TABLE `CategoriasInventario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CategoriasServicio`
--
ALTER TABLE `CategoriasServicio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Citas`
--
ALTER TABLE `Citas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Cotizaciones`
--
ALTER TABLE `Cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DetallesCotizaciones`
--
ALTER TABLE `DetallesCotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Diagnosticos`
--
ALTER TABLE `Diagnosticos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DocumentosVehiculo`
--
ALTER TABLE `DocumentosVehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Especialidades`
--
ALTER TABLE `Especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Facturas`
--
ALTER TABLE `Facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `Inventarios`
--
ALTER TABLE `Inventarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Mecanicos`
--
ALTER TABLE `Mecanicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Mensajes`
--
ALTER TABLE `Mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MovimientosInventario`
--
ALTER TABLE `MovimientosInventario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Notificaciones`
--
ALTER TABLE `Notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Pagos`
--
ALTER TABLE `Pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `TiposServicio`
--
ALTER TABLE `TiposServicio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Vehiculos`
--
ALTER TABLE `Vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CategoriasInventario`
--
ALTER TABLE `CategoriasInventario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `CategoriasServicio`
--
ALTER TABLE `CategoriasServicio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Citas`
--
ALTER TABLE `Citas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Cotizaciones`
--
ALTER TABLE `Cotizaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `DetallesCotizaciones`
--
ALTER TABLE `DetallesCotizaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Diagnosticos`
--
ALTER TABLE `Diagnosticos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `DocumentosVehiculo`
--
ALTER TABLE `DocumentosVehiculo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Especialidades`
--
ALTER TABLE `Especialidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Facturas`
--
ALTER TABLE `Facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Inventarios`
--
ALTER TABLE `Inventarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Mecanicos`
--
ALTER TABLE `Mecanicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Mensajes`
--
ALTER TABLE `Mensajes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `MovimientosInventario`
--
ALTER TABLE `MovimientosInventario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Notificaciones`
--
ALTER TABLE `Notificaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Pagos`
--
ALTER TABLE `Pagos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `TiposServicio`
--
ALTER TABLE `TiposServicio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Vehiculos`
--
ALTER TABLE `Vehiculos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
