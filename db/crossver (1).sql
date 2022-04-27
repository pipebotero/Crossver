-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-10-2015 a las 22:38:32
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crossver`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `idAlbum` int(11) NOT NULL,
  `nombreAlbum` varchar(50) NOT NULL,
  `idGenero` int(11) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`idAlbum`, `nombreAlbum`, `idGenero`, `imagen`) VALUES
(1, 'Estadio Nacional', 1, 'public/productos/EstadioNacional.jpg'),
(2, 'Exitos del Binomio de Oro', 3, 'public/productos/Binomio.jpg'),
(3, 'Exiliados en la bahía', 1, 'public/productos/Exiliados en la bah°a.jpg'),
(4, 'La Danza de la Chancaca', 2, 'public/productos/La Danza de la Chancaca.jpg'),
(5, 'United We Are', 7, 'public/productos/United We Are.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums_has_artistas`
--

CREATE TABLE IF NOT EXISTS `albums_has_artistas` (
  `idAlbum` int(11) NOT NULL,
  `idArtista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `albums_has_artistas`
--

INSERT INTO `albums_has_artistas` (`idAlbum`, `idArtista`) VALUES
(1, 2),
(2, 3),
(3, 4),
(5, 5),
(4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums_has_canciones`
--

CREATE TABLE IF NOT EXISTS `albums_has_canciones` (
  `idAlbum` int(11) NOT NULL,
  `idCancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `albums_has_canciones`
--

INSERT INTO `albums_has_canciones` (`idAlbum`, `idCancion`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE IF NOT EXISTS `artistas` (
  `idArtista` int(11) NOT NULL,
  `nombreArtista` varchar(50) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`idArtista`, `nombreArtista`, `imagen`) VALUES
(1, 'Jorge Celedón', 'public/artistas/JorgeCeledon.jpg'),
(2, 'Los Prisioneros', 'public/artistas/prisioneros.jpg'),
(3, 'Binomio de Oro', 'public/artistas/binomioDeOro.jpg'),
(4, 'Maná', 'public/artistas/Mana.jpg'),
(5, 'Hardwell', 'public/artistas/hardwell.jpg'),
(6, 'Grupo niche', 'public/artistas/grupoNiche.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_albums`
--

CREATE TABLE IF NOT EXISTS `calificaciones_albums` (
  `idUsuario` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaiones_canciones`
--

CREATE TABLE IF NOT EXISTS `calificaiones_canciones` (
  `idUsuario` int(11) NOT NULL,
  `idCancion` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE IF NOT EXISTS `canciones` (
  `idCancion` int(11) NOT NULL,
  `nombreCancion` varchar(50) NOT NULL,
  `idGenero` int(11) NOT NULL,
  `duracion` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `bitrate` int(11) NOT NULL,
  `formato` varchar(10) NOT NULL,
  `size` double NOT NULL,
  `archivo` varchar(150) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`idCancion`, `nombreCancion`, `idGenero`, `duracion`, `year`, `bitrate`, `formato`, `size`, `archivo`, `precio`) VALUES
(1, 'El baile de los que sobran', 1, 17, 1997, 1411200, 'wav', 3015696, 'public/canciones/El Baile De los que sobran.wav', 4500),
(2, 'Para amar', 1, 7, 1997, 1411200, 'wav', 1253256, 'public/canciones/Para Amar.wav', 4200),
(3, 'Por que no se van', 1, 16, 1997, 1411200, 'wav', 2891048, 'public/canciones/Por Que No Se Van.wav', 4350),
(4, 'Sexo', 1, 17, 1997, 1411200, 'wav', 3080980, 'public/canciones/Sexo.wav', 4000),
(5, 'Tren al sur', 1, 19, 1997, 1411200, 'wav', 3493904, 'public/canciones/Tren Al Sur.wav', 4100),
(6, 'Como te olvido', 3, 14, 1998, 1411200, 'wav', 2546752, 'public/canciones/Como Te Olvido.wav', 3900),
(7, 'Me ilusione', 3, 19, 1998, 1411200, 'wav', 3459840, 'public/canciones/Me ilusione.wav', 4000),
(8, 'Niña bonita', 3, 14, 1998, 1411200, 'wav', 2540656, 'public/canciones/Nina Bonita.wav', 4900),
(9, 'Olvidala', 3, 15, 1998, 1411200, 'wav', 2689616, 'public/canciones/Olvidala.wav', 4600),
(10, 'Osito dormilon', 3, 14, 1998, 1411200, 'wav', 2480840, 'public/canciones/Osito Dormilon.wav', 4700),
(11, 'Bendita la luz', 1, 15, 2012, 1411200, 'wav', 2650292, 'public/canciones/Bendita la Luz.wav', 5200),
(12, 'Corazon Espinado', 1, 18, 2012, 1411200, 'wav', 3341476, 'public/canciones/Corazon Espinado.wav', 6000),
(13, 'Eres Mi Religion', 1, 19, 2012, 1411200, 'wav', 3516228, 'public/canciones/Eres Mi Religion.wav', 5300),
(14, 'Manda Una Señal', 1, 21, 4400, 1411200, 'wav', 3869516, 'public/canciones/Manda Una Senal.wav', 6000),
(15, 'Si no te hubieras ido', 1, 19, 2012, 1411200, 'wav', 3522456, 'public/canciones/Si no Te Hubieras Ido.wav', 4900),
(16, 'Buenaventura y Caney', 2, 25, 2001, 1411200, 'wav', 4570180, 'public/canciones/Buenaventura y Caney.wav', 4600),
(17, 'Cali Ají', 2, 19, 2001, 1411200, 'wav', 3362684, 'public/canciones/Cali Aji.wav', 4200),
(18, 'Cali Panchangero', 2, 21, 2001, 1411200, 'wav', 3874284, 'public/canciones/Cali Panchangero.wav', 4400),
(19, 'Gotas de lluvia', 2, 19, 2001, 1411200, 'wav', 3372704, 'public/canciones/Gotas De lluvia.wav', 3900),
(20, 'Sin sentimiento', 2, 22, 2001, 1411200, 'wav', 3974160, 'public/canciones/Sin Sentimiento.wav', 3880),
(21, 'A51', 7, 17, 2015, 1411200, 'wav', 3129448, 'public/canciones/A51.wav', 5100),
(22, 'Arcadia', 7, 24, 2015, 1411200, 'wav', 4381888, 'public/canciones/Arcadia.wav', 4900),
(23, 'Don''t Stop The Madness', 7, 21, 2015, 1411200, 'wav', 3803888, 'public/canciones/Don''t Stop The Madness.wav', 5300),
(24, 'United We are', 7, 19, 2015, 1411200, 'wav', 3473296, 'public/canciones/United We are.wav', 5050),
(25, 'Young Again', 7, 11, 2015, 1411200, 'wav', 2116104, 'public/canciones/Young Again.wav', 4850);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones_has_artistas`
--

CREATE TABLE IF NOT EXISTS `canciones_has_artistas` (
  `idCancion` int(11) NOT NULL,
  `idArtista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `canciones_has_artistas`
--

INSERT INTO `canciones_has_artistas` (`idCancion`, `idArtista`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE IF NOT EXISTS `carritos` (
  `idUsuario` int(11) NOT NULL,
  `idCancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carritos`
--

INSERT INTO `carritos` (`idUsuario`, `idCancion`) VALUES
(7, 3),
(7, 5),
(7, 7),
(7, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_albums`
--

CREATE TABLE IF NOT EXISTS `comentarios_albums` (
  `idUsuario` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  `comentario` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_canciones`
--

CREATE TABLE IF NOT EXISTS `comentarios_canciones` (
  `idUsuario` int(11) NOT NULL,
  `idCancion` int(11) NOT NULL,
  `comentario` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE IF NOT EXISTS `generos` (
  `idGenero` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`idGenero`, `genero`) VALUES
(7, 'EDM'),
(5, 'Merengue'),
(6, 'Pop'),
(1, 'Rock'),
(2, 'Salsa'),
(3, 'Vallenato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `rol`) VALUES
(1, 'Usuario'),
(2, 'Admin'),
(3, 'SuperAdmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `idSexo` int(11) NOT NULL,
  `sexo` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`idSexo`, `sexo`) VALUES
(1, 'M'),
(2, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `idSexo` int(11) NOT NULL,
  `idRol` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `correo`, `password`, `idSexo`, `idRol`) VALUES
(7, 'afbotero', 'afbf492@gmail.com', 'abce59feab0228c8106b28b02b5cc5054600aba81a9bcbe77ff77d2e11bf9bcf9a461fc85c849c09e30b4c5e806c88ad9fef3270660da03b206977c823a06705', 1, 3),
(8, 'Dgrisales', 'davidGrisales@gmail.com', '1e7bba1bf3f0233c73903f9acbe568cfdc239cb5da47546c16bb4fc982ce73a89dc54411e0b18bc662fdbb05fab53c8d8a9ce9a30f48ddcd2b9d0d2179b28264', 1, 2),
(9, 'pepitoPerez', 'pepito@hotmail.com', '1e7bba1bf3f0233c73903f9acbe568cfdc239cb5da47546c16bb4fc982ce73a89dc54411e0b18bc662fdbb05fab53c8d8a9ce9a30f48ddcd2b9d0d2179b28264', 1, 1),
(10, 'JuanaOchoa', 'Juanita21@hotmail.com', '1e7bba1bf3f0233c73903f9acbe568cfdc239cb5da47546c16bb4fc982ce73a89dc54411e0b18bc662fdbb05fab53c8d8a9ce9a30f48ddcd2b9d0d2179b28264', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`idAlbum`),
  ADD KEY `fk_albums_generos_idx` (`idGenero`);

--
-- Indices de la tabla `albums_has_artistas`
--
ALTER TABLE `albums_has_artistas`
  ADD PRIMARY KEY (`idAlbum`,`idArtista`),
  ADD KEY `fk_albums_has_artistas_artistas_idx` (`idArtista`),
  ADD KEY `fk_albums_has_artistas_albums_idx` (`idAlbum`);

--
-- Indices de la tabla `albums_has_canciones`
--
ALTER TABLE `albums_has_canciones`
  ADD PRIMARY KEY (`idAlbum`,`idCancion`),
  ADD KEY `fk_canciones_has_albums_albums_idx` (`idAlbum`),
  ADD KEY `fk_canciones_has_albums_canciones_idx` (`idCancion`);

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`idArtista`);

--
-- Indices de la tabla `calificaciones_albums`
--
ALTER TABLE `calificaciones_albums`
  ADD PRIMARY KEY (`idUsuario`,`idAlbum`),
  ADD KEY `fk_calificaciones_albums_albums_idx` (`idAlbum`),
  ADD KEY `fk_calificaciones_albums_usuarios_idx` (`idUsuario`);

--
-- Indices de la tabla `calificaiones_canciones`
--
ALTER TABLE `calificaiones_canciones`
  ADD PRIMARY KEY (`idUsuario`,`idCancion`),
  ADD KEY `fk_calificaiones_canciones_canciones_idx` (`idCancion`),
  ADD KEY `fk_calificaiones_canciones_usuarios_idx` (`idUsuario`);

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`idCancion`),
  ADD KEY `fk_canciones_generos_idx` (`idGenero`);

--
-- Indices de la tabla `canciones_has_artistas`
--
ALTER TABLE `canciones_has_artistas`
  ADD PRIMARY KEY (`idCancion`,`idArtista`),
  ADD KEY `fk_canciones_has_artistas_artistas_idx` (`idArtista`),
  ADD KEY `fk_canciones_has_artistas_canciones_idx` (`idCancion`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`idUsuario`,`idCancion`),
  ADD KEY `fk_carritos_canciones_idx` (`idCancion`),
  ADD KEY `fk_carritos_usuarios_idx` (`idUsuario`);

--
-- Indices de la tabla `comentarios_albums`
--
ALTER TABLE `comentarios_albums`
  ADD PRIMARY KEY (`idUsuario`,`idAlbum`),
  ADD KEY `fk_comentarios_albums_albums_idx` (`idAlbum`),
  ADD KEY `fk_comentarios_albums_usuarios_idx` (`idUsuario`);

--
-- Indices de la tabla `comentarios_canciones`
--
ALTER TABLE `comentarios_canciones`
  ADD PRIMARY KEY (`idUsuario`,`idCancion`),
  ADD KEY `fk_comentarios_canciones_canciones_idx` (`idCancion`),
  ADD KEY `fk_comentarios_canciones_usuarios_idx` (`idUsuario`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`idGenero`),
  ADD UNIQUE KEY `genero_UNIQUE` (`genero`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`idSexo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `nombreUsuario_UNIQUE` (`nombreUsuario`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD KEY `fk_usuarios_roles_idx` (`idRol`),
  ADD KEY `fk_usuarios_sexo_idx` (`idSexo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albums`
--
ALTER TABLE `albums`
  MODIFY `idAlbum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `idArtista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `idCancion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `idSexo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `fk_albums_generos` FOREIGN KEY (`idGenero`) REFERENCES `generos` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `albums_has_artistas`
--
ALTER TABLE `albums_has_artistas`
  ADD CONSTRAINT `fk_albums_has_artistas_albums` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`idAlbum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_albums_has_artistas_artistas` FOREIGN KEY (`idArtista`) REFERENCES `artistas` (`idArtista`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `albums_has_canciones`
--
ALTER TABLE `albums_has_canciones`
  ADD CONSTRAINT `fk_canciones_has_albums_albums` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`idAlbum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_canciones_has_albums_canciones` FOREIGN KEY (`idCancion`) REFERENCES `canciones` (`idCancion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificaciones_albums`
--
ALTER TABLE `calificaciones_albums`
  ADD CONSTRAINT `fk_calificaciones_albums_albums` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`idAlbum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificaciones_albums_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificaiones_canciones`
--
ALTER TABLE `calificaiones_canciones`
  ADD CONSTRAINT `fk_calificaiones_canciones_canciones` FOREIGN KEY (`idCancion`) REFERENCES `canciones` (`idCancion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificaiones_canciones_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `fk_canciones_generos` FOREIGN KEY (`idGenero`) REFERENCES `generos` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `canciones_has_artistas`
--
ALTER TABLE `canciones_has_artistas`
  ADD CONSTRAINT `fk_canciones_has_artistas_artistas` FOREIGN KEY (`idArtista`) REFERENCES `artistas` (`idArtista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_canciones_has_artistas_canciones` FOREIGN KEY (`idCancion`) REFERENCES `canciones` (`idCancion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `fk_carritos_canciones` FOREIGN KEY (`idCancion`) REFERENCES `canciones` (`idCancion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carritos_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarios_albums`
--
ALTER TABLE `comentarios_albums`
  ADD CONSTRAINT `fk_comentarios_albums_albums` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`idAlbum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_albums_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarios_canciones`
--
ALTER TABLE `comentarios_canciones`
  ADD CONSTRAINT `fk_comentarios_canciones_canciones` FOREIGN KEY (`idCancion`) REFERENCES `canciones` (`idCancion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_canciones_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_sexo` FOREIGN KEY (`idSexo`) REFERENCES `sexo` (`idSexo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
