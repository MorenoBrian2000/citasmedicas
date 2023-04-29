-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-10-2021 a las 09:04:30
-- Versión del servidor: 5.7.35
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grcd_sac`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`cpses_grid2qbk16`@`localhost` PROCEDURE `sp_pago_abono` (IN `folio` VARCHAR(50), IN `monto` FLOAT(10), IN `tipo` VARCHAR(50))  BEGIN
	DECLARE _rollback BOOL DEFAULT 0;
	DECLARE _total_actual FLOAT DEFAULT 0;
	DECLARE _total_pago FLOAT DEFAULT 0;

	DECLARE _new_total FLOAT DEFAULT 0;
	
	
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET _rollback = 1;
	START TRANSACTION;
	
	SELECT monto_abonado INTO _total_actual  FROM tbl_pago WHERE folio_pago = folio;
	SELECT monto_total  INTO _total_pago FROM tbl_pago WHERE folio_pago = folio;
	INSERT INTO tbl_pago_abono(folio_pago, monto_abono, tipo) VALUES (folio, monto, tipo);
	SELECT SUM(monto_abono) INTO _new_total FROM tbl_pago_abono WHERE folio_pago = folio;
	IF(_new_total > _total_pago) THEN
		SELECT 'EL MONTO SUPERA LA CANTIDAD'  AS mesnsage;
		ROLLBACK;
	END IF;

	IF(_new_total = _total_pago) THEN
		SELECT 'SE COMPLETO EL PAGO CON EXITO' AS mesnsage;
		UPDATE tbl_pago SET monto_abonado = _new_total , status_pago = 1 WHERE folio_pago = folio;
		COMMIT;
	END IF;

	IF(_new_total < _total_pago) THEN
		SELECT 'SE AGREGO EL ABONO CORRECTAMENTE'  AS mesnsage;
		UPDATE tbl_pago SET monto_abonado = _new_total WHERE folio_pago = folio;
		COMMIT;
	END IF;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `buscar_medico`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `buscar_medico` (
`id_medico` int(11)
,`nombre_medico` varchar(152)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `buscar_paciente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `buscar_paciente` (
`id_paciente` int(11)
,`nombre_paciente` varchar(152)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_citas`
--

CREATE TABLE `tbl_citas` (
  `id_cita` int(11) NOT NULL,
  `folio_cita` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `fechaProgramada_cita` date DEFAULT NULL,
  `horaInicio_cita` time DEFAULT NULL,
  `horaFin_cita` time DEFAULT NULL,
  `fechaAlta_cita` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  `asunto_cita` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `nota_cita` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `enfermedad_cita` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `sinstomas_cita` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `medicamentos_cita` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado_cita` int(11) DEFAULT '1',
  `pago_cita` int(11) DEFAULT '0',
  `estatus_pago` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_citas`
--

INSERT INTO `tbl_citas` (`id_cita`, `folio_cita`, `id_paciente`, `id_medico`, `fechaProgramada_cita`, `horaInicio_cita`, `horaFin_cita`, `fechaAlta_cita`, `status`, `asunto_cita`, `nota_cita`, `enfermedad_cita`, `sinstomas_cita`, `medicamentos_cita`, `estado_cita`, `pago_cita`, `estatus_pago`) VALUES
(3, 'CT003', 6, 4, '2021-04-16', '16:30:00', '17:00:00', '2021-04-09 21:27:32', 1, 'Diseño de sonrisa ', '', '', '', '', 3, 0, 3),
(4, 'CT004', 7, 4, '2021-04-16', '16:30:00', '17:00:00', '2021-04-09 21:38:07', 1, 'Resinas', '', '', '', '', 1, 0, 0),
(5, 'CT005', 8, 4, '2021-04-13', '17:30:00', '17:50:00', '2021-04-09 22:20:16', 1, 'Revisión de placa ', '', '', '', '', 3, 0, 3),
(6, 'CT006', 13, 0, '2021-04-22', '08:00:00', '08:30:00', '2021-04-16 00:04:21', 1, 'Pulido ', '', '', '', '', 1, 0, 0),
(7, 'CT007', 18, 4, '2021-04-21', '18:30:00', '19:00:00', '2021-04-16 23:25:26', 1, 'endodoncia ', '', '', '', '', 1, 0, 0),
(8, 'CT008', 19, 4, '2021-04-21', '12:00:00', '12:30:00', '2021-04-19 18:53:28', 1, 'cementar', '', '', '', '', 1, 0, 0),
(9, 'CT009', 20, 4, '2021-04-21', '18:00:00', '18:30:00', '2021-04-19 18:56:18', 1, 'limpieza', '', '', '', '', 1, 0, 0),
(10, 'CT0010', 12, 4, '0000-00-00', '16:30:00', '17:00:00', '2021-04-19 18:59:48', 1, 'endodoncia ', '', '', '', '', 1, 0, 0),
(11, 'CT0011', 22, 4, '2021-04-22', '18:30:00', '19:00:00', '2021-04-19 19:03:14', 1, 'revision', '', '', '', '', 1, 0, 0),
(12, 'CT0012', 25, 4, '2021-04-21', '18:00:00', '18:30:00', '2021-04-20 16:16:55', 1, 'limpieza', '', '', '', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_documetos`
--

CREATE TABLE `tbl_documetos` (
  `id_documento` int(11) NOT NULL,
  `nombre_documento` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `ruta_documento` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_especialidades`
--

CREATE TABLE `tbl_especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_especialidad` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_medico` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_especialidades`
--

INSERT INTO `tbl_especialidades` (`id_especialidad`, `nombre_especialidad`, `id_medico`) VALUES
(5, 'ORTODONCIA', 0),
(6, 'MÉDICO CIRUJANO DENTISTA', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_cita`
--

CREATE TABLE `tbl_estado_cita` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_estado_cita`
--

INSERT INTO `tbl_estado_cita` (`id`, `nombre`) VALUES
(1, 'Pendiente'),
(2, 'Aplicada'),
(3, 'No asistio'),
(4, 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_medicos`
--

CREATE TABLE `tbl_medicos` (
  `id_medico` int(11) NOT NULL,
  `nombre_medico` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `apaterno_medico` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `amaterno_medico` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `correo_medico` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `domicilio_medico` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL,
  `rfc_medico` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `telefono_medico` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `cedula_medico` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `status_medico` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_medicos`
--

INSERT INTO `tbl_medicos` (`id_medico`, `nombre_medico`, `apaterno_medico`, `amaterno_medico`, `correo_medico`, `domicilio_medico`, `id_especialidad`, `rfc_medico`, `telefono_medico`, `cedula_medico`, `status_medico`, `id_usuario`) VALUES
(4, 'Samuel', 'Goméz', 'Ramírez', 'samuelgomez_2@hotmail.com', 'Andador Ceres # 127 Col. Popular Anaya', 6, 'GORS890506RGA ', ' 477 263 3515', '9591809', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pacientes`
--

CREATE TABLE `tbl_pacientes` (
  `id_paciente` int(11) NOT NULL,
  `nombre_paciente` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apaterno_paciente` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `amaterno_paciente` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo_paciente` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `domicilio_paciente` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `rfc_paciente` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `alergias_paciente` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `telefono_paciente` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `status_paciente` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_pacientes`
--

INSERT INTO `tbl_pacientes` (`id_paciente`, `nombre_paciente`, `apaterno_paciente`, `amaterno_paciente`, `correo_paciente`, `domicilio_paciente`, `rfc_paciente`, `alergias_paciente`, `telefono_paciente`, `status_paciente`) VALUES
(5, 'Ana Maria', 'Perez', 'Ramírez ', '', 'Av Amazonas #102 col el potrero ', '', '', '4772297027', NULL),
(6, 'Sharon arelli ', 'Pineda', 'Hernandez ', '', 'Bat #108 deportiva 1', '', '', '4776584274', 1),
(7, 'Margarita ', 'Escobedo ', 'Escobedo ', '', '', '', '', '4777146248', 1),
(8, 'Francisco (poquito)', 'Torrez ', 'Zuñiga', '', '', '', '', '4771802542', 1),
(9, 'Veronica ', 'Caudillo', '', '', '', '', '', '4771081275', 1),
(10, 'Natan Emanuel ', 'Romero ', 'Medina', '', '', '', 'No', '4791442403', 1),
(11, 'Paulina', 'Muñoz ', 'Hernandez ', '', '', '', '', '4775520483', 1),
(12, 'Elizabeth ', 'Rodriguez ', 'Perez', '', '', '', '', '4772475044', 1),
(13, 'Ana Elena ', 'Flores', 'Zoto ', '', 'Topógrafos #1018 col. Panorama  ', '', '', '4771759965', 1),
(14, 'Teresita de Jesús ', 'Ariñaga', 'Barrón ', '', 'Montaña de la joya #235', '', '', '4773200674', 1),
(15, 'Irineo ', 'Rodriguez ', 'Hernandez', '', 'San Hermundo #203 col. San Manuel ', '', '', '4777721634', 1),
(16, 'Maria Irma', 'Andrade', 'Torrez', '', 'Mandarina #127', '', '', '4791441856', 1),
(17, 'Pedro Daniel ', 'Aldana', 'Galvan', '', 'Montaña de la joya #235', '', '', '4773200674', 1),
(18, 'Johana ', 'Lara ', 'Gomez', '', '', '', '', '4773375151', 1),
(19, 'María Luz', 'Barajas ', 'Lira ', '', '', '', '', '4774074064', 1),
(20, 'Roberto', 'Martínez ', 'Zermeño', '', '', '', '', '4777648020', 1),
(21, 'Elizabeth ', 'Rodríguez ', 'Pérez ', '', '', '', '', '4772475044', 1),
(22, 'Simona ', 'Lara ', 'Méndez ', '', '', '', '', '4773747722', 1),
(23, 'José Rosario ', 'Caudillo ', 'Valtierra', '', '', '', '', '4774053325', 1),
(24, 'Paulina ', 'Muñoz ', 'Hernandez ', '', '', '', '', '4775520483', 1),
(25, 'Roberto ', 'Martínez ', 'Zermeño ', '', '', '', '', '4777641020', 1),
(26, 'Ana Elena ', 'Flores', 'Zoto  ', '', 'Topógrafos #1018 col. panorama  ', '', '', '4771759965', 1),
(27, 'Juan José ', 'Galván ', 'Ortiz ', '', 'Júpiter # 224', '', '', '4779151574', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pago`
--

CREATE TABLE `tbl_pago` (
  `id_pago` int(11) NOT NULL,
  `folio_pago` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_cita` int(11) DEFAULT NULL,
  `monto_total` float DEFAULT '0',
  `monto_subtotal` float DEFAULT NULL,
  `monto_abonado` float DEFAULT '0',
  `status_pago` int(11) DEFAULT '0',
  `tipo_pago` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `notas` varchar(200) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_pago`
--

INSERT INTO `tbl_pago` (`id_pago`, `folio_pago`, `descripcion`, `id_cita`, `monto_total`, `monto_subtotal`, `monto_abonado`, `status_pago`, `tipo_pago`, `status`, `notas`, `fecha`) VALUES
(5, 'F0005', NULL, 1, 232, 200, 232, 1, 'EFECTIVO', 0, 'PAGO CITA', '2021-04-08 12:40:26'),
(6, 'F0006', NULL, 3, 348, 300, 348, 1, 'EFECTIVO', 0, '', '2021-09-28 15:10:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pago_abono`
--

CREATE TABLE `tbl_pago_abono` (
  `id_pago_abono` int(11) NOT NULL,
  `folio_pago` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `monto_abono` float DEFAULT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_pago_abono`
--

INSERT INTO `tbl_pago_abono` (`id_pago_abono`, `folio_pago`, `monto_abono`, `tipo`, `fecha`) VALUES
(1, 'F0001', 100, 'EFECTIVO', '2021-04-08 10:08:28'),
(2, 'F0001', 100, 'EFECTIVO', '2021-04-08 10:08:41'),
(3, 'F0002', 100, 'EFECTIVO', '2021-04-08 10:57:21'),
(4, 'F0002', 100, 'EFECTIVO', '2021-04-08 10:57:34'),
(5, 'F0004', 100, 'EFECTIVO', '2021-04-08 12:37:10'),
(6, 'F0005', 100, 'EFECTIVO', '2021-04-08 12:40:44'),
(7, 'F0005', 100, 'EFECTIVO', '2021-04-08 13:01:33'),
(8, 'F0005', 32, 'EFECTIVO', '2021-04-08 13:02:07'),
(9, 'F0006', 100, 'EFECTIVO', '2021-09-28 15:10:28'),
(10, 'F0006', 100, 'EFECTIVO', '2021-09-28 15:10:40'),
(11, 'F0006', 148, 'EFECTIVO', '2021-09-28 15:10:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pago_detalle`
--

CREATE TABLE `tbl_pago_detalle` (
  `id_pago_detalle` int(11) NOT NULL,
  `folio_pago` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '0',
  `tipo` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_paquete_servicio` int(11) DEFAULT '0',
  `costo` float DEFAULT '0',
  `iva` float DEFAULT '0',
  `subtotal` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_pago_detalle`
--

INSERT INTO `tbl_pago_detalle` (`id_pago_detalle`, `folio_pago`, `tipo`, `id_paquete_servicio`, `costo`, `iva`, `subtotal`) VALUES
(1, 'F0001', 'SERVICIO', 2, 2000, 320, 2320),
(2, 'F0002', 'SERVICIO', 2, 2000, 320, 2320),
(3, 'F0001', 'SERVICIO', 1, 2500, 400, 2900),
(4, 'F0002', 'SERVICIO', 1, 2500, 400, 2900),
(5, 'F0004', 'PAGO CITA', 4, 200, 232, 200),
(6, 'F0005', 'PAGO CITA', 4, 200, 32, 232),
(7, 'F0006', 'SERVICIO', 2, 100, 16, 116),
(8, 'F0006', 'SERVICIO', 1, 200, 32, 232);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_paquetes`
--

CREATE TABLE `tbl_paquetes` (
  `id_paquete` int(11) NOT NULL,
  `nombre_paquete` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `monto_paquete` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_serivcios`
--

CREATE TABLE `tbl_serivcios` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `monto_servicio` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_serivcios`
--

INSERT INTO `tbl_serivcios` (`id_servicio`, `nombre_servicio`, `monto_servicio`) VALUES
(1, 'Limpieza Ejemplo', 200),
(2, 'ejemplo', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `nombre_user` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `apaterno_user` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `amaterno_user` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `correo_user` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `domicilio_user` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `telefono_user` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `username_user` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `password_user` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `status_user` int(11) DEFAULT '1',
  `rol_user` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `nombre_user`, `apaterno_user`, `amaterno_user`, `correo_user`, `domicilio_user`, `telefono_user`, `username_user`, `password_user`, `status_user`, `rol_user`) VALUES
(1, 'BRIAN', 'ERNESTO', 'MORNEO', 'BRIANMORENO@GMAIL.COM', 'LEON GTO, MEXICO', '47791454785', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(8, 'Paola', '', '', 'pao@grclinicadental.com.mx', 'LEON GTO, MEXICO', '', 'pao@grclinicadental.com.mx', '68783e2f6bc4b43f104bd1491552b921', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `a_paterno_usuario` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `a_materno_usuario` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `correo_usuario` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `domicilio_usuario` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `rfc_usuario` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `alergias_usuario` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `telefono_usuario` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `status_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `nombre_usuario`, `a_paterno_usuario`, `a_materno_usuario`, `correo_usuario`, `domicilio_usuario`, `rfc_usuario`, `alergias_usuario`, `telefono_usuario`, `status_usuario`) VALUES
(1, 'Brian ', 'Moreno', 'Escareño', 'brianmoreno@gmial.com', 'Antonio Clavel #306', 'REF5656', 'No', '4779158457', 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `buscar_medico`
--
DROP TABLE IF EXISTS `buscar_medico`;

CREATE ALGORITHM=UNDEFINED DEFINER=`grcd`@`localhost` SQL SECURITY DEFINER VIEW `buscar_medico`  AS SELECT `T1`.`id_medico` AS `id_medico`, concat_ws(' ',`T1`.`nombre_medico`,`T1`.`apaterno_medico`,`T1`.`amaterno_medico`) AS `nombre_medico` FROM `tbl_medicos` AS `T1` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `buscar_paciente`
--
DROP TABLE IF EXISTS `buscar_paciente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`grcd`@`localhost` SQL SECURITY DEFINER VIEW `buscar_paciente`  AS SELECT `T1`.`id_paciente` AS `id_paciente`, concat_ws(' ',`T1`.`nombre_paciente`,`T1`.`apaterno_paciente`,`T1`.`amaterno_paciente`) AS `nombre_paciente` FROM `tbl_pacientes` AS `T1` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_citas`
--
ALTER TABLE `tbl_citas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `tbl_documetos`
--
ALTER TABLE `tbl_documetos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `tbl_especialidades`
--
ALTER TABLE `tbl_especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `tbl_estado_cita`
--
ALTER TABLE `tbl_estado_cita`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_medicos`
--
ALTER TABLE `tbl_medicos`
  ADD PRIMARY KEY (`id_medico`) USING BTREE;

--
-- Indices de la tabla `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  ADD PRIMARY KEY (`id_paciente`) USING BTREE;

--
-- Indices de la tabla `tbl_pago`
--
ALTER TABLE `tbl_pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `tbl_pago_abono`
--
ALTER TABLE `tbl_pago_abono`
  ADD PRIMARY KEY (`id_pago_abono`);

--
-- Indices de la tabla `tbl_pago_detalle`
--
ALTER TABLE `tbl_pago_detalle`
  ADD PRIMARY KEY (`id_pago_detalle`) USING BTREE;

--
-- Indices de la tabla `tbl_paquetes`
--
ALTER TABLE `tbl_paquetes`
  ADD PRIMARY KEY (`id_paquete`);

--
-- Indices de la tabla `tbl_serivcios`
--
ALTER TABLE `tbl_serivcios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuario`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_citas`
--
ALTER TABLE `tbl_citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_documetos`
--
ALTER TABLE `tbl_documetos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_especialidades`
--
ALTER TABLE `tbl_especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_estado_cita`
--
ALTER TABLE `tbl_estado_cita`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_medicos`
--
ALTER TABLE `tbl_medicos`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tbl_pago`
--
ALTER TABLE `tbl_pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_pago_abono`
--
ALTER TABLE `tbl_pago_abono`
  MODIFY `id_pago_abono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbl_pago_detalle`
--
ALTER TABLE `tbl_pago_detalle`
  MODIFY `id_pago_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_paquetes`
--
ALTER TABLE `tbl_paquetes`
  MODIFY `id_paquete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_serivcios`
--
ALTER TABLE `tbl_serivcios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`grcd`@`localhost` EVENT `Backup` ON SCHEDULE EVERY 1 WEEK STARTS '2020-03-27 16:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
SET @sql_text = CONCAT("SELECT * FROM tbl_usuarios INTO OUTFILE 'C:\Users\BrianMoreno\Desktop\bk_mysql" , DATE_FORMAT( NOW(), '%Y%m%d') , "BonInterne.csv'" ); 
PREPARE s1 FROM @sql_text; 
EXECUTE s1; 
DEALLOCATE PREPARE s1;
END$$

CREATE DEFINER=`grcd`@`localhost` EVENT `evet_tbl_usuarios` ON SCHEDULE EVERY 1 WEEK STARTS '2020-03-27 17:05:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
SET @sql_text = CONCAT("SELECT * FROM db_sac.tbl_citas INTO OUTFILE 'C:\Users\BrianMoreno\Desktop\bk_mysql" , DATE_FORMAT( NOW(), '%Y%m%d') , "BonInterne.csv'" ); 
PREPARE s1 FROM @sql_text; 
EXECUTE s1; 
DEALLOCATE PREPARE s1;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
