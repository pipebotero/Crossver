-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-10-2015 a las 00:00:59
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`idAlbum`, `nombreAlbum`, `idGenero`, `imagen`) VALUES
(1, 'Exiliados en la bahía', 1, 'public/productos/Exiliados en la bahía.jpg'),
(2, '14 Cañonazos Bailables Vol. 35', 7, 'public/productos/los14.jpg');

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
(1, 5),
(2, 6),
(2, 7),
(2, 8);

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
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE IF NOT EXISTS `artistas` (
  `idArtista` int(11) NOT NULL,
  `nombreArtista` varchar(50) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`idArtista`, `nombreArtista`, `imagen`) VALUES
(1, 'Dimitri Vegas & Like Mike', 'public/artistas/dm&lm.jpg'),
(2, 'Jorge Celedón', 'public/artistas/jorgeCeledon.jpeg'),
(3, 'Romeo Santos', 'public/artistas/romeo_santos.jpg'),
(4, 'El Gran Combo', 'public/artistas/El-Gran-Combo-1.jpg'),
(5, 'Maná', 'public/artistas/Mana.jpg'),
(6, 'Joe Arroyo', 'public/artistas/joe_arroyo.jpg'),
(7, 'Los Chiches del Vallenato', 'public/artistas/chiches_del_vallenato.jpg'),
(8, 'Los Tupamaros', 'public/artistas/tupamaros.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`idCancion`, `nombreCancion`, `idGenero`, `duracion`, `year`, `bitrate`, `formato`, `size`, `archivo`, `precio`) VALUES
(1, 'La Rebelion', 2, 285, 1990, 192018, 'mp3', 6857214, './public/canciones/La Rebelion - Joe Arroyo.mp3', 10000),
(2, 'Fábula de amor', 6, 190, 1999, 192026, 'mp3', 4580424, './public/canciones/Fábula de amor -los chiches.mp3', 10000);

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
(1, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE IF NOT EXISTS `carritos` (
  `idUsuario` int(11) NOT NULL,
  `idCancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(4, 'Bachata'),
(3, 'EDM'),
(5, 'Pop'),
(1, 'Rock'),
(2, 'Salsa'),
(6, 'Vallenato'),
(7, 'Varios');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `correo`, `password`, `idSexo`, `idRol`) VALUES
(1, 'afbotero', 'afbf492@gmail.com', 'abce59feab0228c8106b28b02b5cc5054600aba81a9bcbe77ff77d2e11bf9bcf9a461fc85c849c09e30b4c5e806c88ad9fef3270660da03b206977c823a06705', 1, 3),
(2, 'elabuelo', 'elabuelo@gmail.com', '1e7bba1bf3f0233c73903f9acbe568cfdc239cb5da47546c16bb4fc982ce73a89dc54411e0b18bc662fdbb05fab53c8d8a9ce9a30f48ddcd2b9d0d2179b28264', 1, 1),
(3, 'cristina12', 'lanenacris@hotmail.com', '1e7bba1bf3f0233c73903f9acbe568cfdc239cb5da47546c16bb4fc982ce73a89dc54411e0b18bc662fdbb05fab53c8d8a9ce9a30f48ddcd2b9d0d2179b28264', 2, 1);

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
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_calificaciones_albums_albums_idx` (`idAlbum`);

--
-- Indices de la tabla `calificaiones_canciones`
--
ALTER TABLE `calificaiones_canciones`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_calificaiones_canciones_canciones_idx` (`idCancion`);

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
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_comentarios_albums_albums_idx` (`idAlbum`);

--
-- Indices de la tabla `comentarios_canciones`
--
ALTER TABLE `comentarios_canciones`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_comentarios_canciones_canciones_idx` (`idCancion`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`idGenero`),
  ADD UNIQUE KEY `genero` (`genero`);

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
  MODIFY `idAlbum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `idArtista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `idCancion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `fk_calificaciones_albums_albums` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`idAlbum`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificaiones_canciones`
--
ALTER TABLE `calificaiones_canciones`
  ADD CONSTRAINT `fk_calificaiones_canciones_canciones` FOREIGN KEY (`idCancion`) REFERENCES `canciones` (`idCancion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_comentarios_albums_albums` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`idAlbum`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarios_canciones`
--
ALTER TABLE `comentarios_canciones`
  ADD CONSTRAINT `fk_comentarios_canciones_canciones` FOREIGN KEY (`idCancion`) REFERENCES `canciones` (`idCancion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_sexo` FOREIGN KEY (`idSexo`) REFERENCES `sexo` (`idSexo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
