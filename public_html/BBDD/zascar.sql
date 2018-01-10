-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2017 a las 11:08:02
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zascar`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarUsuarios` (IN `p_nombre` VARCHAR(40), IN `p_apellidos` VARCHAR(40), IN `p_telefono` VARCHAR(40), IN `p_email` VARCHAR(40), IN `p_imagen` VARCHAR(200), IN `p_usuario` VARCHAR(40), IN `p_pass` VARCHAR(40))  NO SQL
BEGIN
INSERT INTO usuarios (nombre,apellidos,telefono,email,imagen,usuario,pass) values (p_nombre,p_apellidos,p_telefono,p_email,p_imagen,p_usuario,p_pass);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarUsuario` (IN `p_idusuario` INT(11), IN `p_nombre` VARCHAR(40), IN `p_apellidos` VARCHAR(40), IN `p_telefono` VARCHAR(40), IN `p_email` VARCHAR(40), IN `p_imagen` VARCHAR(200), IN `p_usuario` VARCHAR(40), IN `p_pass` VARCHAR(40))  NO SQL
BEGIN
UPDATE usuarios 
set nombre = p_nombre, apellidos = p_apellidos, telefono = p_telefono, email = p_email, imagen = p_imagen, usuario = p_usuario, pass = p_pass
where idusuario = p_idusuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarUsuarios` ()  NO SQL
BEGIN
SELECT * FROM usuarios;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verPeticiones` (IN `p_id` INT)  NO SQL
select * from trayecto where idtrayecto=(select idtrayecto from viajes where aceptado=0 and idusuario=p_id)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verTrayectosConductor` (IN `p_id` INT)  NO SQL
select * from trayecto where idtrayecto=(select idtrayecto from viajes where clase='conductor' and idusuario=p_id)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verTrayectosPasajero` (IN `p_id` INT)  NO SQL
select * from trayecto where idtrayecto=(select idtrayecto from viajes where clase='pasajero' and idusuario=p_id)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trayecto`
--

CREATE TABLE `trayecto` (
  `idtrayecto` int(11) NOT NULL,
  `origen` varchar(40) NOT NULL,
  `destino` varchar(40) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `plazas` int(2) NOT NULL,
  `paradas` varchar(200) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trayecto`
--

INSERT INTO `trayecto` (`idtrayecto`, `origen`, `destino`, `fecha_hora`, `plazas`, `paradas`, `idusuario`) VALUES
(1, 'Sevilla', 'Urritxe', '2017-12-21 04:04:07', 4, 'Madrid,Burgos', 7),
(2, 'marruecos', 'noruega', '2017-12-29 00:00:00', 2, 'Francia, España, Portugal', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `permisos` tinyint(1) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellidos`, `telefono`, `email`, `imagen`, `permisos`, `usuario`, `pass`) VALUES
(7, 'jennifer', 'Hernandez Macias', '688659988', 'jennifer@gmail.com', 'http://es.web.img2.acsta.net/pictures/17/03/23/12/22/099965.jpg', 0, 'jennerys', '12345'),
(9, 'Mikel', 'Martin Culoprieto', '999999999', 'mikel@gmail.com', 'https://www.gazetaesportiva.com/wp-content/uploads/imagem/2015/12/31/008340131-1024x682.jpg', 0, 'mikelsito', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `idvaloracion` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `positivo` int(11) NOT NULL,
  `negativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `idcoche` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `plazas` int(2) NOT NULL,
  `combustible` varchar(40) NOT NULL,
  `matricula` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `idusuario` int(11) NOT NULL,
  `idtrayecto` int(11) NOT NULL,
  `clase` varchar(11) NOT NULL,
  `aceptado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`idusuario`, `idtrayecto`, `clase`, `aceptado`) VALUES
(7, 1, 'conductor', 1),
(7, 2, 'pasajero', 1),
(9, 1, 'pasajero', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `trayecto`
--
ALTER TABLE `trayecto`
  ADD PRIMARY KEY (`idtrayecto`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`idvaloracion`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`idcoche`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`idusuario`,`idtrayecto`),
  ADD KEY `idtrayecto` (`idtrayecto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `trayecto`
--
ALTER TABLE `trayecto`
  MODIFY `idtrayecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `idvaloracion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `idcoche` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trayecto`
--
ALTER TABLE `trayecto`
  ADD CONSTRAINT `trayecto_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `viajes_ibfk_2` FOREIGN KEY (`idtrayecto`) REFERENCES `trayecto` (`idtrayecto`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
