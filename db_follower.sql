-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2021 at 11:47 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_follower`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int NOT NULL,
  `nombreCliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `puestoCliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `empresaCliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mailCliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mailalternoCliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telCliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `waCliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ejecutivasCliente` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombreCliente`, `puestoCliente`, `empresaCliente`, `mailCliente`, `mailalternoCliente`, `telCliente`, `waCliente`, `ejecutivasCliente`) VALUES
(1, 'David Zaragoza', 'Gerente de Marketing B2B', 'BFGOODRICH', 'david.zaragoza@michelin.com', 'david.zaragoza@michelin.com', '4422267034', '4422267034', 'carolina@ezqualo.com fernanda.rodriguez@ezqualo.com'),
(2, 'Karla Rode', 'Trade Marketing B2B', 'MICHELIN', 'karla.rode@michelin.com', 'karla.rode@michelin.com', '4422009614 ', '4422009614 ', 'carolina@ezqualo.com'),
(3, 'Santiago Silva', 'Manager de BFG y Uniroyal', 'MICHELIN', 'santiago.silva@michelin.com', 'santiago.silva@michelin.com', '4420000000', '4420000000', 'fernanda.rodriguez@ezqualo.com'),
(4, 'Yeraseth Bello', 'Coordinadora de Marketing Institucional ', 'BRASKEM', 'yeraseth.bello@braskem.com', 'yeraseth.bello@braskem.com', '5540948859', '5540948859', 'carolina@ezqualo.com p.posadas@ezqualo.com'),
(5, 'Carlona García Sánchez', 'Analista Pleno Marketing Institucional', 'BRASKEM', 'carola.garciasanchez@braskem.com', 'carola.garciasanchez@braskem.com', '5543510426', '5543510426', 'carolina@ezqualo.com p.posadas@ezqualo.com'),
(6, 'Yoselin Díaz Morgan', 'Pet Food Product Line Specialist', 'CARGILL', 'Yoselin_diaz@cargill.com', 'ydiazmorgan@gmail.com', '015511057400', '8182595497', 'dalys.mendivil@ezqualo.com p.posadas@ezqualo.com'),
(7, 'Nelson Merchán', 'Gerente de Educación Profesional México & North Hub', 'JOHNSON & JOHNSON', 'nmercha5@its.jnj.com', 'nmerchanb@yahoo.com', '5548305277', '5548305277', 'p.posadas@ezqualo.com'),
(8, 'Sophie del Signo', 'Brand Assistant', 'JOHNSON & JOHNSON', 'sdelsign@its.jnj.com', 'sophie@delsigno.org', '5561117877', '5561117877', 'p.posadas@ezqualo.com'),
(9, 'Karla Vivanco Ramírez', 'Marketing Manager', 'JOHNSON & JOHNSON', 'kvivanco@its.jnj.com', 'hermosacaifanes@gmail.com', '5549405786', '5549405786', 'p.posadas@ezqualo.com'),
(10, 'Jorge R. Gutiérrez', 'Socio Administrador', 'VMGE ABOGADOS', 'jgutierrez@vmge.com', 'jgutierrez@vmge.com', '4422020376', '4422020376', 'p.posadas@ezqualo.com'),
(11, 'Nina Wendling', 'Operational Marketing Manager OHT & MIN AMC', 'MICHELIN', 'nina.wendling1@michelin.com', 'nina.wendling1@michelin.com', '442 358 9957', '442 358 9957', 'carolina@ezqualo.com'),
(12, 'Jorge Montaño', 'Coordinador Red de Servicios Michelin', 'MICHELIN', 'jorge.montano@michelin.com', 'jorge.montano@michelin.com', '442 478 3008', '442 478 3008', 'carorila@ezqualo.com');

-- --------------------------------------------------------

--
-- Table structure for table `equipoArte`
--

CREATE TABLE `equipoArte` (
  `Id` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `puesto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estatus` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `equipoArte`
--

INSERT INTO `equipoArte` (`Id`, `nombre`, `puesto`, `correo`, `estatus`) VALUES
(1, 'Beatriz Dellanely García Yáñez', 'Directora de Arte', 'b.garcia@ezqualo.com', 'con contrato'),
(2, 'Michell Tena Ávalos', 'Directora de arte Michelin', 'm.tena@ezqualo.com', 'con contrato'),
(3, 'Franco Mercado', 'Diseñador Jr. Michelin', 'f.mercado@ezqualo.com\r\n', 'con contrato'),
(4, 'Beatriz González Zepeda', 'Diseñador Jr. Michelin', 'a.gonzalez@ezqualo.com', 'con contrato'),
(5, 'Octavio Vélez del río', 'Diseñador Jr.  Michelin comunicación interna', 'octavio.velez@ezqualo.com', 'Periodo de prueba'),
(6, 'Francisco Javier Delgado', 'Diseñador Jr. Michelin Flotas Conectadas', 'j.delgado@ezqualo.com', 'con contrato'),
(7, 'Nereida Zuñiga', 'Diseñador Jr. Michelin', 'n.zuñiga@ezqualo.com', 'con contrato'),
(8, 'Yessica Lazcano', 'Directora de arte Michelin', 'y.lazcano@ezqualo.com', 'con contrato'),
(9, 'Carlos Iván Gutiérrez Hernández', 'Director de arte Michelin Braskem, Acuvue, VMGE, Balmoral', 'i.gutierrez@ezqualo.com', 'con contrato'),
(11, 'Michel Salceda Ortiz', 'Diseñador Jr. Acuvue', 'm.salceda@ezqualo.com', 'con contrato'),
(12, 'Valeria Garcia Basaldua', 'Diseñador Jr. Acuvue', 'v.garcia@ezqualo.com', 'con contrato'),
(13, 'Romario González Cobos', 'Diseñador Jr. Braskem', 'r.gonzalez@ezqualo.com', 'con contrato'),
(14, 'Raúl Martinez', 'Diseñador Jr. Braskem', 'r.martinez@ezqualo.com', 'con contrato'),
(15, 'Sindy Gama', 'Diseñador Jr. BRaskem', 'sindy.gama@ezqualo.com', 'Periodo de prueba'),
(16, 'Diego Armenta', 'Diseñador Sr. Cargill y Koon', 'd.armenta@ezqualo.com', 'con contrato'),
(17, 'Kevin Omar Parra Luna', 'Diseñador Jr. Loyall y Koon', 'o.luna@ezqualo.com', 'con contrato'),
(18, 'Alicia Gama', 'Diseñador Jr. Loyall y Koon', 'a.gama@ezqualo.com', 'con contrato'),
(19, 'Lizbeth Zenteno', 'Diseñador Jr. Loyall y Koon', 'l.centeno@ezqualo.com', 'con contrato'),
(20, 'Gloria Fernanda Salinas', 'Diseñador Jr. Loyall y Koon', 'g.salinas@ezqualo.com', 'con contrato'),
(21, 'Katia León', 'Diseñador Jr. Loyall y Koon', 'k.leon@ezqualo.com', 'con contrato');

-- --------------------------------------------------------

--
-- Table structure for table `equipoProgramadores`
--

CREATE TABLE `equipoProgramadores` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `puesto` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipoProgramadores`
--

INSERT INTO `equipoProgramadores` (`id`, `nombre`, `puesto`, `correo`, `estatus`) VALUES
(1, 'Ivan Salazar', 'Programador', 'ivan.salazar@ezqualo.com', 'Prueba'),
(2, 'Xavier Escamilla', 'Programador', 'xavier.escamilla@ezqualo.com', 'Prueba');

-- --------------------------------------------------------

--
-- Table structure for table `nomenclaturas`
--

CREATE TABLE `nomenclaturas` (
  `Id` int NOT NULL,
  `nomenclatura` varchar(50) CHARACTER SET ucs2 COLLATE ucs2_spanish_ci NOT NULL,
  `empresa` varchar(50) CHARACTER SET ucs2 COLLATE ucs2_spanish_ci NOT NULL,
  `usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomenclaturas`
--

INSERT INTO `nomenclaturas` (`Id`, `nomenclatura`, `empresa`, `usuario`) VALUES
(1, 'BFC BFGoodrich Camion', 'BFGOODRICH', 'fernanda.rodriguez@ezqualo.com'),
(2, 'BFG Tcar y Retail', 'BFGOODRICH', 'fernanda.rodriguez@ezqualo.com'),
(3, 'BFE BFGoodrich eventos', 'BFGOODRICH', 'carolina@ezqualo.com'),
(4, 'BFD BFGoodrich digital', 'BFGOODRICH', 'fernanda.rodriguez@ezqualo.com carolina@ezqualo.com'),
(6, 'MC Michelin Camion', 'MICHELIN', 'carolina@ezqualo.com'),
(7, 'MAG Michelin Agricola', 'MICHELIN', 'fernanda.rodriguez@ezqualo.com'),
(8, 'MGC Michelin Muevetierra / Mineria', 'MICHELIN', 'fernanda.rodriguez@ezqualo.com'),
(9, 'BR Braskem', 'BRASKEM', 'fernanda.rodriguez@ezqualo.com p.posadas@ezqualo.com'),
(10, 'MT Michelin TCar y Retail', 'MICHELIN', 'carolina@ezqualo.com'),
(11, 'ME Michelin Eventos', 'MICHELIN', 'carolina@ezqualo.com'),
(12, 'MD Michelin Digital', 'MICHELIN', 'carolina@ezqualo.com'),
(13, 'M2R Michelin 2 Ruedas', 'MICHELIN', 'carolina@ezqualo.com'),
(14, 'MG Michelin Grupo', 'MICHELIN', 'carolina@ezqualo.com'),
(15, 'MFC Michelin Flotas Conectadas', 'MICHELIN', 'carolina@ezqualo.com'),
(16, 'UT Uniroyal Tcar y Retail', 'UNIROYAL', 'fernanda.rodriguez@ezqualo.com'),
(17, 'UD Uniroyal Digital', 'UNIROYAL', 'fernanda.rodriguez@ezqualo.com'),
(18, 'UC Uniroyal Camion', 'UNIROYAL', 'fernanda.rodriguez@ezqualo.com'),
(19, 'GA Gati', 'CARGILL', 'carolina@ezqualo.com p.posadas@ezqualo.com'),
(20, 'LO Loyall', 'CARGILL', 'fernanda.rodriguez@ezqualo.com p.posadas@ezqualo.com'),
(21, 'DO Dogui', 'CARGILL', 'fernanda.rodriguez@ezqualo.com p.posadas@ezqualo.com'),
(22, 'AV Acuvue', 'ACUVUE', 'p.posadas@ezqualo.com'),
(23, 'BE Balmoral', 'BALMORAL', 'p.posadas@ezqualo.com'),
(24, 'BBVA Bancomer', 'BANCOMER', 'p.posadas@ezqualo.com'),
(25, 'EZQ Ezqualo', 'EZQUALO', 'fernanda.rodriguez@ezqualo.com');

-- --------------------------------------------------------

--
-- Table structure for table `odts`
--

CREATE TABLE `odts` (
  `id` int NOT NULL,
  `idOdt` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `proyecto` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `areasAgregadas` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `responsablesAreas` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `objetivo` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dummy` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `artesEzqualo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `artesSeparados` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaSolicitud` datetime NOT NULL,
  `fechaEntrega` datetime NOT NULL,
  `otra` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `digital` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `impreso` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `granFormato` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `medidas` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `acabados` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `archivo` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `odts`
--

INSERT INTO `odts` (`id`, `idOdt`, `marca`, `proyecto`, `cliente`, `areasAgregadas`, `responsablesAreas`, `objetivo`, `dummy`, `artesEzqualo`, `artesSeparados`, `fechaSolicitud`, `fechaEntrega`, `otra`, `digital`, `impreso`, `granFormato`, `medidas`, `acabados`, `archivo`) VALUES
(1, '1-BFE BFGoodrich eventos', 'BFE BFGoodrich eventos', 'Prueba', 'Karla Rode', 'Arte', 'Beatriz Dellanely García Yáñez', 'Prueba', 'SI', 'NO', 'SI', '2021-04-01 00:00:00', '2021-04-07 00:00:00', ' Prueba', 'SI', 'SI', 'SI', '1080x600', ' Prueba', '2');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cuentas'),
(3, 'clientes');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idRol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `genero`, `nombre`, `password`, `idRol`) VALUES
(1, 'admin', 'Hombre', 'Administrador', '3zqu4l0++', 1),
(2, 'antonio@ezqualo.com', 'Hombre', 'Antonio Valle', '4nt0n10.v4ll3++', 1),
(3, 'omar.coria@ezqualo.com', 'Hombre', 'Omar Coria', '0m4r.c0r14++', 1),
(4, 'xavier.escamilla@ezqualo.com', 'Hombre', 'Xavier Escamilla', 'x4v13r.3sc4m1ll4++', 1),
(5, 'ivan.salazar@ezqualo.com', 'Hombre', 'Ivan Salazar', '1v4n.s4l4z4r++', 1),
(6, 'fernanda.rodriguez@ezqualo.com', 'Mujer', 'Fernanda Rodriguez', 'cuentas', 1),
(7, 'santiago.silva@michelin.com', 'Hombre', 'Santiago Silva', '12345', 3),
(8, 'carolina@ezqualo.com', 'Mujer', 'Carolina ', 'cuentas123', 2),
(9, 'p.posadas@ezqualo.com', 'Mujer', 'Pamela Pozadas', 'p4m3l4++', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `ejecutivasCliente` (`ejecutivasCliente`);

--
-- Indexes for table `equipoArte`
--
ALTER TABLE `equipoArte`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `equipoProgramadores`
--
ALTER TABLE `equipoProgramadores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nomenclaturas`
--
ALTER TABLE `nomenclaturas`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Id_2` (`Id`),
  ADD KEY `Id_3` (`Id`);

--
-- Indexes for table `odts`
--
ALTER TABLE `odts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `equipoArte`
--
ALTER TABLE `equipoArte`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `equipoProgramadores`
--
ALTER TABLE `equipoProgramadores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nomenclaturas`
--
ALTER TABLE `nomenclaturas`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `odts`
--
ALTER TABLE `odts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
