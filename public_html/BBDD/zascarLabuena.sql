-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2018 a las 13:41:26
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `aceptarPeticion` (IN `p_id` INT, IN `p_idusu` INT)  NO SQL
BEGIN
UPDATE viajes SET aceptado=1  
WHERE idtrayecto=p_id AND idusuario=p_idusu;

UPDATE trayecto SET plazas=(plazas-1) 
WHERE idtrayecto=p_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `borrarCuenta` (IN `p_idusu` INT)  NO SQL
BEGIN
SET FOREIGN_KEY_CHECKS=0;
DELETE FROM viajes WHERE idusuario=p_idusu;

DELETE FROM trayecto WHERE idusuario=p_idusu;

DELETE FROM usuarios WHERE idusuario=p_idusu;

DELETE FROM vehiculos WHERE idusuario=p_idusu;

DELETE FROM valoraciones WHERE idusuario=p_idusu;
SET FOREIGN_KEY_CHECKS=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `borrarTrayectoConductor` (IN `p_idusu` INT, IN `p_idtrayecto` INT)  NO SQL
BEGIN DELETE FROM viajes WHERE idusuario=p_idusu AND clase='conductor' AND idtrayecto=p_idtrayecto; DELETE FROM trayecto WHERE idtrayecto=p_idtrayecto AND idtrayecto=(select idtrayecto from viajes where clase='conductor' and idusuario=p_idusu); END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `borrarTrayectoPasajero` (IN `p_id` INT, IN `p_idusu` INT)  NO SQL
BEGIN
DELETE FROM viajes WHERE idusuario=p_idusu AND clase='pasajero' AND idtrayecto=p_id;

DELETE FROM trayecto WHERE idtrayecto=p_id AND idtrayecto=(select idtrayecto from viajes where clase='pasajero' and idusuario=p_idusu);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enviarValoracionNegativa` (IN `p_idusu` INT)  NO SQL
BEGIN
UPDATE valoraciones SET negativo=(negativo+1) 
WHERE idusuario=p_idusu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enviarValoracionPositiva` (IN `p_idusu` INT)  NO SQL
BEGIN
UPDATE valoraciones SET positivo=(positivo+1) 
WHERE idusuario=p_idusu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarUsuarios` (IN `p_nombre` VARCHAR(40), IN `p_apellidos` VARCHAR(40), IN `p_telefono` VARCHAR(40), IN `p_email` VARCHAR(40), IN `p_imagen` VARCHAR(200), IN `p_usuario` VARCHAR(40), IN `p_pass` VARCHAR(40))  NO SQL
BEGIN
INSERT INTO usuarios (nombre,apellidos,telefono,email,imagen,usuario,pass) values (p_nombre,p_apellidos,p_telefono,p_email,p_imagen,p_usuario,p_pass);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarTrayecto` ()  NO SQL
BEGIN
SELECT idtrayecto,origen , destino , fecha_hora , plazas , paradas, idusuario  FROM trayecto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mandarPeticiones` (IN `p_idusu` INT, IN `p_idtrayecto` INT)  NO SQL
BEGIN
INSERT INTO viajes (idusuario, idtrayecto, clase, aceptado) VALUES (p_idusu, p_idtrayecto, 'pasajero', 0);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarUsuario` (IN `p_idusuario` INT(11), IN `p_nombre` VARCHAR(40), IN `p_apellidos` VARCHAR(40), IN `p_telefono` VARCHAR(40), IN `p_email` VARCHAR(40), IN `p_imagen` VARCHAR(200), IN `p_usuario` VARCHAR(40), IN `p_pass` VARCHAR(40), IN `p_marca` VARCHAR(40), IN `p_plazas` VARCHAR(40), IN `p_combustible` VARCHAR(40), IN `p_matricula` VARCHAR(40))  NO SQL
BEGIN
UPDATE usuarios 
set nombre = p_nombre, apellidos = p_apellidos, telefono = p_telefono, email = p_email, imagen = p_imagen, usuario = p_usuario, pass = p_pass
where idusuario = p_idusuario;

IF EXISTS (SELECT * FROM vehiculos WHERE idusuario = p_idusuario) THEN
   UPDATE vehiculos
	set marca = p_marca, plazas = p_plazas, combustible = 				p_combustible, matricula = p_matricula
	where idusuario = p_idusuario;
ELSE
   INSERT INTO vehiculos(idusuario,marca, plazas, combustible, 			matricula) VALUES 						 							(p_idusuario,p_marca,p_plazas,p_combustible,p_matricula);
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarUsuarios` ()  NO SQL
BEGIN
SELECT * FROM usuarios;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_conductores_trayectos` (IN `p_id` INT)  NO SQL
BEGIN
SELECT usuarios.nombre, usuarios.apellidos, usuarios.imagen, usuarios.usuario, valoraciones.positivo, valoraciones.negativo from usuarios join valoraciones on usuarios.idusuario=valoraciones.idusuario 
where usuarios.idusuario=p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_usuarios_conductores` ()  NO SQL
BEGIN
SELECT usuarios.idusuario,usuarios.nombre, usuarios.apellidos, usuarios.imagen, usuarios.usuario, valoraciones.positivo, valoraciones.negativo from usuarios join valoraciones on usuarios.idusuario=valoraciones.idusuario 
where usuarios.idusuario in(SELECT idusuario from viajes where clase='conductor');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarUsuario` (IN `pnombre` VARCHAR(40), IN `papellidos` VARCHAR(80), IN `ptelefono` VARCHAR(40), IN `pemail` VARCHAR(40), IN `pimagen` VARCHAR(200), IN `pusuario` VARCHAR(40), IN `ppass` VARCHAR(40))  NO SQL
INSERT INTO usuarios(nombre, apellidos, telefono, email, imagen, usuario, pass) VALUES (pnombre,papellidos,ptelefono,pemail,pimagen,pusuario,ppass)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_trayecto` (IN `porigen` VARCHAR(40), IN `pdestino` VARCHAR(40), IN `pfechahora` DATETIME, IN `pplazas` INT(2), IN `pparadas` VARCHAR(200), IN `pidusuario` INT(11))  NO SQL
BEGIN

INSERT INTO trayecto (origen, destino, fecha_hora, plazas, paradas, idusuario) VALUES (porigen, pdestino, pfechahora, pplazas, pparadas, pidusuario);

INSERT INTO viajes (idusuario, idtrayecto, clase, aceptado) VALUES (pidusuario, LAST_INSERT_ID(), 'conductor', 1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_vehiculo` (IN `pidusuario` INT, IN `pmarca` VARCHAR(40), IN `pplaza` INT(2), IN `pcombustible` VARCHAR(40), IN `pmatricula` VARCHAR(8))  NO SQL
INSERT INTO vehiculos(idusuario,marca, plazas, combustible, matricula) VALUES (pidusuario,pmarca,pplaza,pcombustible,pmatricula)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarioPorId` (IN `p_id` INT)  NO SQL
select usuarios.*, vehiculos.* FROM usuarios LEFT JOIN vehiculos ON usuarios.idusuario=vehiculos.idusuario WHERE usuarios.idusuario=p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verPeticiones` (IN `p_id` INT)  NO SQL
SELECT usuarios.nombre,usuarios.telefono,usuarios.idusuario as idsolic, viajes.*,trayecto.* 
FROM viajes LEFT JOIN usuarios on usuarios.idusuario=viajes.idusuario LEFT JOIN trayecto on viajes.idtrayecto=trayecto.idtrayecto 
WHERE viajes.clase="pasajero" and viajes.aceptado=0 and viajes.idtrayecto IN(SELECT idtrayecto 
FROM trayecto WHERE idusuario=p_id)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verTrayectosConductor` (IN `p_id` INT)  NO SQL
select * from trayecto where idtrayecto IN(select idtrayecto from viajes where clase='conductor' and idusuario=p_id)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verTrayectosPasajero` (IN `p_id` INT)  NO SQL
select trayecto.*, usuarios.telefono, viajes.aceptado,viajes.clase from  trayecto  JOIN viajes ON trayecto.idtrayecto=viajes.idtrayecto JOIN usuarios ON viajes.idusuario=usuarios.idusuario WHERE viajes.idtrayecto in (SELECT idtrayecto FROM viajes WHERE idusuario=p_id AND clase='pasajero') AND clase='pasajero' and viajes.idusuario=p_id$$

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
(2, 'Marruecos', 'Noruega', '2017-12-29 00:00:00', 2, 'Francia, España, Portugal', 9),
(3, 'Donostia', 'Amorebieta', '2018-01-18 04:30:00', 4, 'Elgoibar,Eibar,Ermua,Durango', 18),
(4, 'Sestao, España', 'Reinosa, España', '2018-01-26 05:00:00', 4, 'uganda,swefwrfwaefdwewferfergvervgrfgrtgwrgffdserergfev', 7);

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
(7, 'jennifer', 'Hernandez Macias', '688659988', 'jennifer@gmail.com', 'https://blog.fotolia.com/es/files/2015/09/Screenshot1.png', 0, 'jennerys', '55555'),
(9, 'mikel', 'turuta', '69458715', 'mikelsillo@hotmail.com', 'https://vice-images.vice.com/images/content-images/2016/07/05/lo-que-tu-foto-de-perfil-de-facebook-dice-sobre-ti-body-image-1467737247.jpg?output-quality=75', 0, 'mikelsito', '123456'),
(10, 'prueba', 'prueva', 'pruefa', 'prrueba', 'prrueva', 0, 'prruefa', 'prruebha'),
(18, 'Ander', 'Lopez Moñigo', '47512369', 'andermoño@gmail.com', 'https://pbs.twimg.com/profile_images/3379609989/4cd28b985d64cc2c1623563d792d476b_400x400.jpeg', 0, 'Moñigito69', '1234567'),
(19, 'lucas', 'aaaa', '87451269', 'lucas@gmail.com', 'https://lsfu.files.wordpress.com/2010/08/foto-perfil-perfil.jpg', 0, 'lucas55', '12345');

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

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`idvaloracion`, `idusuario`, `positivo`, `negativo`) VALUES
(1, 7, 13, 1),
(2, 9, 1, 15),
(3, 18, 8, 8);

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

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`idcoche`, `idusuario`, `marca`, `plazas`, `combustible`, `matricula`) VALUES
(1, 7, 'Megane', 4, 'Dieselssxcc', '25824 JH'),
(2, 19, 'peugot', 1000, 'Excrementos', '1234HGT'),
(3, 9, 'Seat Leonardo', 4, 'Excremento', '12345HFR');

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
(7, 2, 'pasajero', 0),
(7, 4, 'conductor', 1),
(9, 1, 'pasajero', 0),
(10, 3, 'pasajero', 1),
(18, 2, 'pasajero', 0);

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
  MODIFY `idtrayecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `idvaloracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `idcoche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_old` ON SCHEDULE EVERY 1 DAY STARTS '2018-01-19 23:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN

-- Variables donde almacenar lo que nos traemos desde el SELECT
  DECLARE vidtrayecto INT(10);

-- Variable para controlar el fin del bucle
  DECLARE fin INTEGER DEFAULT 0;

-- El SELECT que vamos a ejecutar
  DECLARE trayectos_cursor CURSOR FOR 
    SELECT idtrayecto FROM trayecto WHERE fecha_hora < CURRENT_TIMESTAMP;

-- Condición de salida
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin=1;

  OPEN trayectos_cursor;
  get_trayectos: LOOP
    FETCH trayectos_cursor INTO vidtrayecto;
    IF fin = 1 THEN
        LEAVE get_trayectos;
    END IF;
    SET FOREIGN_KEY_CHECKS=0;
         DELETE FROM trayecto WHERE idtrayecto=vidtrayecto;
        DELETE FROM viajes WHERE idtrayecto=vidtrayecto;
        SET FOREIGN_KEY_CHECKS=1;
  END LOOP get_trayectos;

  CLOSE trayectos_cursor;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
