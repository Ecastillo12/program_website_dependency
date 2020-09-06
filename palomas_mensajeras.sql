-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2018 a las 16:35:49
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `palomas_mensajeras`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `udusuario` (`id_u` INTEGER, `id_s` INTEGER) RETURNS VARCHAR(10) CHARSET latin1 BEGIN
UPDATE usuario SET id_solic=id_s WHERE id_usuario=id_u;
RETURN "1";
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`usuario`, `pass`) VALUES
('ADMIN1', '123'),
('ADMIN2', '321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `fecha` varchar(11) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_solic` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `fecha`, `hora`, `descripcion`, `id_solic`, `estado`) VALUES
(2, '2018-06-21', '12:30', 'ENTREVISTA', 3, 'CUMPLIDA'),
(3, '2018-06-22', '14:00', 'CITA CON PSICOLÓGO', 3, 'CUMPLIDA'),
(4, '2018-06-18', '13:00', 'CITA ROMANTICA CON UNA NENA :3', 4, 'PENDIENTE'),
(5, '2018-06-16', '01:01', 'CITA', 3, 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_pariente` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `monto` decimal(6,2) DEFAULT NULL,
  `fecha_recepcion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pariente`
--

CREATE TABLE `pariente` (
  `id_pariente` int(11) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `appat` varchar(40) NOT NULL,
  `apmat` varchar(40) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `zip` decimal(5,0) NOT NULL,
  `tel` decimal(10,0) NOT NULL,
  `estatus` varchar(50) NOT NULL,
  `parentezco` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pariente`
--

INSERT INTO `pariente` (`id_pariente`, `curp`, `nombre`, `appat`, `apmat`, `calle`, `numero`, `zip`, `tel`, `estatus`, `parentezco`) VALUES
(14, 'CAGE960612HMNSND06', 'EDUARDO SALVADOR', 'CASTILLO', 'GONZALEZ', 'RIO YAQUI', 399, '61604', '4341324201', 'LEGAL', 'HIJO'),
(15, 'RASSFASFAWFWEFEFEF', 'CARLOS MANUEL', 'RAMOS', 'VEGA', 'NIñOS HEROES', 13, '61601', '4562626062', 'LEGAL', 'HIJO'),
(16, 'DAFC234567HMNMGR03', 'FERNANDO', 'ARREOLA', 'SANDOVAL', 'TU CORAZON', 69, '54321', '4341449676', 'ILEGAL', 'HIJO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitante`
--

CREATE TABLE `solicitante` (
  `id_solic` int(11) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `appat` varchar(40) NOT NULL,
  `apmat` varchar(40) NOT NULL,
  `fecha_nac` varchar(15) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `colonia` varchar(50) NOT NULL,
  `cp` decimal(5,0) NOT NULL,
  `state` varchar(20) NOT NULL,
  `grupo` varchar(25) DEFAULT NULL,
  `avance_solicitud` decimal(3,0) DEFAULT NULL,
  `estado_solicitud` varchar(20) DEFAULT NULL,
  `id_pariente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitante`
--

INSERT INTO `solicitante` (`id_solic`, `curp`, `nombre`, `appat`, `apmat`, `fecha_nac`, `calle`, `numero`, `colonia`, `cp`, `state`, `grupo`, `avance_solicitud`, `estado_solicitud`, `id_pariente`) VALUES
(3, 'GATOLO120432HMSND6', 'EDUARDO PADRE', 'CASTILLO', 'NOSE', '1952-06-12', 'LLOREDA', 48, 'CENTRO', '61600', 'CALIFORNIA', NULL, '60', 'ACTIVO', 14),
(4, 'YFGEFEUIFHERUIFHER', 'FERCHO PADRE', 'ARREOLA', 'NOSE', '1950-01-01', 'LLOREDA', 1, 'CENTRO', '61600', 'GEORGIA', NULL, '10', 'ACTIVO', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `id_pariente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `curp`, `pass`, `id_pariente`) VALUES
(5, 'CAGE960612HMNSND06', '12345', 14),
(6, 'RASSFASFAWFWEFEFEF', '12345', 15),
(7, 'DAFC234567HMNMGR03', 'carlitos', 16);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vdatos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vdatos` (
`fecha` varchar(11)
,`CITA` varchar(100)
,`Solicitante` int(11)
,`PAGO` varchar(250)
,`monto` decimal(6,2)
,`fecha_recepcion` date
,`Pariente` int(11)
,`id_pariente` int(11)
,`curp` varchar(18)
,`id_solic` int(11)
,`avance_solicitud` decimal(3,0)
,`estado_solicitud` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vsolic`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vsolic` (
`id_solic` int(11)
,`nombre` varchar(50)
,`appat` varchar(40)
,`apmat` varchar(40)
,`curp` varchar(18)
,`Pariente` int(11)
,`ApPa` varchar(40)
,`ApMa` varchar(40)
,`nombrePa` varchar(50)
,`parentezco` varchar(30)
,`curpPa` varchar(18)
,`id_pariente` int(11)
,`tel` decimal(10,0)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vdatos`
--
DROP TABLE IF EXISTS `vdatos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdatos`  AS  select `c`.`fecha` AS `fecha`,`c`.`descripcion` AS `CITA`,`c`.`id_solic` AS `Solicitante`,`g`.`descripcion` AS `PAGO`,`g`.`monto` AS `monto`,`g`.`fecha_recepcion` AS `fecha_recepcion`,`g`.`id_pariente` AS `Pariente`,`p`.`id_pariente` AS `id_pariente`,`p`.`curp` AS `curp`,`s`.`id_solic` AS `id_solic`,`s`.`avance_solicitud` AS `avance_solicitud`,`s`.`estado_solicitud` AS `estado_solicitud` from (((`citas` `c` join `pagos` `g`) join `pariente` `p`) join `solicitante` `s`) where ((`c`.`id_solic` = `s`.`id_solic`) and (`g`.`id_pariente` = `p`.`id_pariente`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vsolic`
--
DROP TABLE IF EXISTS `vsolic`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsolic`  AS  select `s`.`id_solic` AS `id_solic`,`s`.`nombre` AS `nombre`,`s`.`appat` AS `appat`,`s`.`apmat` AS `apmat`,`s`.`curp` AS `curp`,`s`.`id_pariente` AS `Pariente`,`p`.`appat` AS `ApPa`,`p`.`apmat` AS `ApMa`,`p`.`nombre` AS `nombrePa`,`p`.`parentezco` AS `parentezco`,`p`.`curp` AS `curpPa`,`p`.`id_pariente` AS `id_pariente`,`p`.`tel` AS `tel` from (`solicitante` `s` join `pariente` `p`) where (`s`.`id_pariente` = `p`.`id_pariente`) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `cita_X_solicitante` (`id_solic`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `pagos_X_pariente` (`id_pariente`);

--
-- Indices de la tabla `pariente`
--
ALTER TABLE `pariente`
  ADD PRIMARY KEY (`id_pariente`),
  ADD UNIQUE KEY `curp` (`curp`);

--
-- Indices de la tabla `solicitante`
--
ALTER TABLE `solicitante`
  ADD PRIMARY KEY (`id_solic`),
  ADD UNIQUE KEY `curp` (`curp`),
  ADD KEY `sol_X_par` (`id_pariente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `curp` (`curp`),
  ADD KEY `usuario_X_pariente` (`id_pariente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pariente`
--
ALTER TABLE `pariente`
  MODIFY `id_pariente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `solicitante`
--
ALTER TABLE `solicitante`
  MODIFY `id_solic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_X_pariente` FOREIGN KEY (`id_pariente`) REFERENCES `pariente` (`id_pariente`);

--
-- Filtros para la tabla `solicitante`
--
ALTER TABLE `solicitante`
  ADD CONSTRAINT `sol_X_par` FOREIGN KEY (`id_pariente`) REFERENCES `pariente` (`id_pariente`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_X_pariente` FOREIGN KEY (`id_pariente`) REFERENCES `pariente` (`id_pariente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
