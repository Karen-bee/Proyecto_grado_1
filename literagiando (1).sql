-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2024 a las 04:18:16
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `literagiando`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_paginas`
--

CREATE TABLE `asignacion_paginas` (
  `id_asignacion` int(11) NOT NULL,
  `idrolusuario` int(11) NOT NULL,
  `idpagina` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignacion_paginas`
--

INSERT INTO `asignacion_paginas` (`id_asignacion`, `idrolusuario`, `idpagina`, `estado`) VALUES
(30, 2, 1, 1),
(31, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_eventos`
--

CREATE TABLE `asistencia_eventos` (
  `idusuario` int(11) NOT NULL,
  `ideventos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `idblog` int(11) NOT NULL,
  `titulo_blog` varchar(200) NOT NULL,
  `subtitulo_blog` varchar(200) NOT NULL,
  `imagen_blog` varchar(200) NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `detalle_blog` varchar(400) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `idtipo_blog` int(11) NOT NULL,
  `estado_blog` varchar(10) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`idblog`, `titulo_blog`, `subtitulo_blog`, `imagen_blog`, `fecha_publicacion`, `detalle_blog`, `id_usuario`, `idtipo_blog`, `estado_blog`) VALUES
(1, 'Pruebas', 'Blog Pruebas', '/Storage/img-blogs/imagen.png', '2023-11-23 18:48:13', 'Pruebsa de listado Index', 48, 1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compras`
--

CREATE TABLE `carrito_compras` (
  `idcarrito_compras` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  `codigo_producto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `categorias` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `duracion_prestamo`
--

CREATE TABLE `duracion_prestamo` (
  `idfechaduracion` int(11) NOT NULL,
  `dias_prestamo` int(11) NOT NULL,
  `codigo_producto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `ideventos` int(11) NOT NULL,
  `imagen_eventos` varchar(200) NOT NULL,
  `fecha_evento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `titulo_evento` varchar(200) NOT NULL,
  `detalle_evento` varchar(200) NOT NULL,
  `estado_evento` varchar(10) NOT NULL DEFAULT 'Activo',
  `idtipo_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ideventos`, `imagen_eventos`, `fecha_evento`, `titulo_evento`, `detalle_evento`, `estado_evento`, `idtipo_evento`) VALUES
(11, '../Storage/img-eventos/linetime.png', '2023-11-09 21:32:02', 'Guardado Img', 'Guardado Imagen', 'Activo', 1),
(12, '../Storage/img-eventos/image (1).png', '2023-11-09 21:36:38', 'HTML', 'Note that you should compare same length hashes, e.g. sha384 with sha384, otherwise it’s expected for them to be different. As such, you can use an online tool like SRI Hash Generator to make sure tha', 'Activo', 1),
(13, '../Storage/img-eventos/linetime.png', '2023-11-15 00:56:39', 'Guardado Img', 'Pruebas de guardado', 'Activo', 1),
(14, '../Storage/img-eventos/linetime.png', '2023-11-18 16:47:34', 'Pruebas Save', 'sswdwd  wd wdwd', 'Activo', 2),
(15, '../Storage/img-eventos/Slider 3.jpeg', '2023-12-12 01:32:49', 'Pruebas', 'nnononnkn', 'Activo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_tecnica`
--

CREATE TABLE `ficha_tecnica` (
  `idbibliografia` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `codigo` int(12) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `tema` varchar(200) NOT NULL,
  `edades` varchar(200) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `estado_libro` varchar(200) NOT NULL,
  `tipo_formato` varchar(200) NOT NULL,
  `link_descarga` varchar(1000) NOT NULL,
  `codigo_producto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos_literarios`
--

CREATE TABLE `generos_literarios` (
  `idgeneros` int(11) NOT NULL,
  `tipo_genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `home`
--

CREATE TABLE `home` (
  `id_home` int(11) NOT NULL,
  `imagen_carrusel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_home`
--

CREATE TABLE `imagenes_home` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `tamano` int(11) NOT NULL,
  `clase` varchar(255) NOT NULL DEFAULT 'd-block w-100',
  `activo` varchar(255) NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_home`
--

INSERT INTO `imagenes_home` (`id`, `nombre`, `tipo`, `tamano`, `clase`, `activo`, `ruta`) VALUES
(5, 'Slider 3.jpeg', 'image/jpeg', 170428, 'd-block w-100', '', '.../Storage/img-home/Slider 3.jpeg'),
(6, 'Slider 5.jpeg', 'image/jpeg', 209849, 'd-block w-100', 'active', '../Storage/img-home/Slider 5.jpeg'),
(7, 'Slider 4.jpeg', 'image/jpeg', 144868, 'd-block w-100', '', '../Storage/img-home/Slider 4.jpeg'),
(8, 'Imagen Slider2.jpeg', 'image/jpeg', 171417, 'd-block w-100', '', '../Storage/img-home/Imagen Slider2.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idnoticias` int(11) NOT NULL,
  `imagen_card` varchar(200) NOT NULL,
  `titulo_noticias` varchar(200) NOT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subtitulo_noticias` varchar(200) NOT NULL,
  `detalle_noticias` varchar(500) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idtiponoticia` int(11) NOT NULL,
  `estado_noticia` varchar(10) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE `objetivos` (
  `idobjetivo` int(11) NOT NULL,
  `tipo_objetivo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `nombre_pagina` varchar(200) NOT NULL,
  `url_pagina` varchar(200) NOT NULL,
  `class` varchar(20) DEFAULT 'bx bx-grid-alt',
  `estado_pagina` varchar(200) NOT NULL,
  `roluser_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `nombre_pagina`, `url_pagina`, `class`, `estado_pagina`, `roluser_id`) VALUES
(1, 'Dashboard', '/Views/UserAdmin/index.php', 'bx-grid-alt', '1', 1),
(2, 'Admin Eventos', '/Views//EventosAdmin/index.php', 'bx-calendar', '1', 2),
(3, 'Admin Noticias', '/Views/NoticiasAdmin/index.php', 'bx-chat', '1', 1),
(4, 'Admin Blog', '/Views/BlogAdmin/index.php', 'bxl-blogger', '1', 1),
(5, 'Admin Slider', '/Views/SliderAdmin/index.php', 'bx-slideshow', '1', 1),
(6, 'Biblioteca', '#', 'bx-library', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermisos` int(11) NOT NULL,
  `Crear` int(11) NOT NULL,
  `Editar` int(11) NOT NULL,
  `Actualizar` int(11) NOT NULL,
  `Eliminar` int(11) NOT NULL,
  `Ver` int(11) NOT NULL,
  `Paginas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermisos`, `Crear`, `Editar`, `Actualizar`, `Eliminar`, `Ver`, `Paginas`) VALUES
(1, 0, 0, 0, 0, 0, 'Dashboard'),
(2, 0, 0, 0, 0, 0, 'Biblioteca'),
(3, 1, 0, 0, 0, 0, 'Mis Eventos'),
(4, 0, 0, 0, 0, 0, 'Admin Slider Home'),
(5, 0, 0, 0, 0, 0, 'Administrador Blog'),
(6, 0, 0, 0, 0, 0, 'Administrador Noticias'),
(7, 0, 0, 0, 0, 0, 'Administrador Eventos'),
(8, 0, 0, 0, 0, 0, 'Administrador Usuarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo_producto` varchar(200) NOT NULL,
  `nombre_producto` varchar(45) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `imagen` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `nombre_rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_permisos`
--

CREATE TABLE `roles_permisos` (
  `idrol` int(11) NOT NULL,
  `idpermisos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idservicios` int(11) NOT NULL,
  `tipo_servicios` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sobrenosotros`
--

CREATE TABLE `sobrenosotros` (
  `idsobrenosotros` int(11) NOT NULL,
  `titulo_general` varchar(200) NOT NULL,
  `imagen_banner` varchar(200) NOT NULL,
  `titulo_historia` varchar(200) NOT NULL,
  `detalle_historia` varchar(200) NOT NULL,
  `titulo_objetivos` varchar(200) NOT NULL,
  `detalle_objetivos` varchar(200) NOT NULL,
  `titulo_servicios` varchar(200) NOT NULL,
  `detalle_servicios` varchar(300) NOT NULL,
  `titulo_generos` varchar(200) NOT NULL,
  `detalle_generos` varchar(200) NOT NULL,
  `titulo_profesoras` varchar(200) NOT NULL,
  `nombre_profesor` varchar(200) NOT NULL,
  `cargo_profesor` varchar(200) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idobjetivo` int(11) NOT NULL,
  `idservicios` int(11) NOT NULL,
  `idgeneros` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoblog`
--

CREATE TABLE `tipoblog` (
  `idtipo_blog` int(11) NOT NULL,
  `nombre_blog` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoblog`
--

INSERT INTO `tipoblog` (`idtipo_blog`, `nombre_blog`) VALUES
(1, 'Catedra'),
(2, 'Eventos Blog');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idtipodocumento` int(11) NOT NULL,
  `nombre_documento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idtipodocumento`, `nombre_documento`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Tarteja de Identidad '),
(5, 'Cedula Extranjeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoevento`
--

CREATE TABLE `tipoevento` (
  `idtipo_evento` int(11) NOT NULL,
  `nombre_evento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoevento`
--

INSERT INTO `tipoevento` (`idtipo_evento`, `nombre_evento`) VALUES
(1, 'Clase'),
(2, 'Evento'),
(3, 'Curso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiponoticia`
--

CREATE TABLE `tiponoticia` (
  `idtiponoticia` int(11) NOT NULL,
  `tipo_noticia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiponoticia`
--

INSERT INTO `tiponoticia` (`idtiponoticia`, `tipo_noticia`) VALUES
(1, 'Señas'),
(2, 'Lenguaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `documento_usuario` int(20) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nombrecompleto_usuario` varchar(200) NOT NULL,
  `direccion_usuario` varchar(200) NOT NULL,
  `telefono_usuario` bigint(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `correo_usuario` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `foto_usuario` varchar(200) NOT NULL DEFAULT '/Resources/img/User.png',
  `Fecha_registro` timestamp NULL DEFAULT NULL,
  `idtipodedocumento` int(11) NOT NULL,
  `idrolusuario` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento_usuario`, `idusuario`, `nombrecompleto_usuario`, `direccion_usuario`, `telefono_usuario`, `username`, `correo_usuario`, `password`, `estado`, `foto_usuario`, `Fecha_registro`, `idtipodedocumento`, `idrolusuario`) VALUES
(2147483647, 48, 'Erika Estupiñan', 'Carrera 69f #64h-19', 5676866878, 'Erika1131', 'lorena@gmail.com', '$2y$10$njzM/DUcQ8jtyITH84fDCulBKk2tZt5SU8.iu7cQ9t0E6ZLYOqzfy', 1, '/Resources/img/User.png', NULL, 1, 1),
(2147483647, 49, 'Deyner Sanchez', 'Diagonal 92 #17a-42', 573204501963, 'Dei0707', 'ext.deyner.sanchez@colgas.com', '$2y$10$ujV6C5X3YUpab7qaS0AbVudwtdoaNG6hcJSqc2rECRnpBWCliUwrW', 1, '/Resources/img/User.png', NULL, 1, 2),
(1020, 50, 'daniel sierra', 'cr 77', 3214634549, 'dsierrabl', 'mr.dani@gmail.com', '$2y$10$su/pVqWY7xtlOYWYoKR8s.Q/c4Xap3UlC99HdstdWy1j3jxWpbi26', 1, '/Resources/img/User.png', NULL, 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_paginas`
--
ALTER TABLE `asignacion_paginas`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `idrolusuario` (`idrolusuario`,`idpagina`),
  ADD KEY `idpagina` (`idpagina`);

--
-- Indices de la tabla `asistencia_eventos`
--
ALTER TABLE `asistencia_eventos`
  ADD KEY `idusuario` (`idusuario`,`ideventos`),
  ADD KEY `ideventos` (`ideventos`);

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idblog`),
  ADD KEY `id_usuario` (`id_usuario`,`idtipo_blog`),
  ADD KEY `idtipo_blog` (`idtipo_blog`);

--
-- Indices de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD PRIMARY KEY (`idcarrito_compras`),
  ADD KEY `idusuario` (`idusuario`,`codigo_producto`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `duracion_prestamo`
--
ALTER TABLE `duracion_prestamo`
  ADD PRIMARY KEY (`idfechaduracion`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ideventos`),
  ADD KEY `idtipo_evento` (`idtipo_evento`);

--
-- Indices de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  ADD PRIMARY KEY (`idbibliografia`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `generos_literarios`
--
ALTER TABLE `generos_literarios`
  ADD PRIMARY KEY (`idgeneros`);

--
-- Indices de la tabla `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id_home`);

--
-- Indices de la tabla `imagenes_home`
--
ALTER TABLE `imagenes_home`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idnoticias`),
  ADD KEY `idusuario` (`idusuario`,`idtiponoticia`),
  ADD KEY `idtiponoticia` (`idtiponoticia`);

--
-- Indices de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`idobjetivo`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`),
  ADD KEY `roluser_id` (`roluser_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermisos`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo_producto`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD KEY `idrol` (`idrol`),
  ADD KEY `idpermisos` (`idpermisos`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idservicios`);

--
-- Indices de la tabla `sobrenosotros`
--
ALTER TABLE `sobrenosotros`
  ADD PRIMARY KEY (`idsobrenosotros`),
  ADD KEY `idusuario` (`idusuario`,`idobjetivo`,`idservicios`,`idgeneros`),
  ADD KEY `idgeneros` (`idgeneros`),
  ADD KEY `idobjetivo` (`idobjetivo`),
  ADD KEY `idservicios` (`idservicios`);

--
-- Indices de la tabla `tipoblog`
--
ALTER TABLE `tipoblog`
  ADD PRIMARY KEY (`idtipo_blog`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idtipodocumento`);

--
-- Indices de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  ADD PRIMARY KEY (`idtipo_evento`);

--
-- Indices de la tabla `tiponoticia`
--
ALTER TABLE `tiponoticia`
  ADD PRIMARY KEY (`idtiponoticia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idtipodedocumento` (`idtipodedocumento`),
  ADD KEY `idrolusuario` (`idrolusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion_paginas`
--
ALTER TABLE `asignacion_paginas`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `idblog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  MODIFY `idcarrito_compras` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `duracion_prestamo`
--
ALTER TABLE `duracion_prestamo`
  MODIFY `idfechaduracion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ideventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  MODIFY `idbibliografia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos_literarios`
--
ALTER TABLE `generos_literarios`
  MODIFY `idgeneros` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `home`
--
ALTER TABLE `home`
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_home`
--
ALTER TABLE `imagenes_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idnoticias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `idobjetivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idservicios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sobrenosotros`
--
ALTER TABLE `sobrenosotros`
  MODIFY `idsobrenosotros` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoblog`
--
ALTER TABLE `tipoblog`
  MODIFY `idtipo_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `idtipodocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  MODIFY `idtipo_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tiponoticia`
--
ALTER TABLE `tiponoticia`
  MODIFY `idtiponoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion_paginas`
--
ALTER TABLE `asignacion_paginas`
  ADD CONSTRAINT `asignacion_paginas_ibfk_2` FOREIGN KEY (`idpagina`) REFERENCES `pagina` (`id_pagina`);

--
-- Filtros para la tabla `asistencia_eventos`
--
ALTER TABLE `asistencia_eventos`
  ADD CONSTRAINT `asistencia_eventos_ibfk_2` FOREIGN KEY (`ideventos`) REFERENCES `eventos` (`ideventos`),
  ADD CONSTRAINT `asistencia_eventos_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`idtipo_blog`) REFERENCES `tipoblog` (`idtipo_blog`),
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD CONSTRAINT `carrito_compras_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `carrito_compras_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`);

--
-- Filtros para la tabla `duracion_prestamo`
--
ALTER TABLE `duracion_prestamo`
  ADD CONSTRAINT `duracion_prestamo_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`idtipo_evento`) REFERENCES `tipoevento` (`idtipo_evento`);

--
-- Filtros para la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  ADD CONSTRAINT `ficha_tecnica_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`);

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`idtiponoticia`) REFERENCES `tiponoticia` (`idtiponoticia`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`);

--
-- Filtros para la tabla `sobrenosotros`
--
ALTER TABLE `sobrenosotros`
  ADD CONSTRAINT `sobrenosotros_ibfk_1` FOREIGN KEY (`idgeneros`) REFERENCES `generos_literarios` (`idgeneros`),
  ADD CONSTRAINT `sobrenosotros_ibfk_2` FOREIGN KEY (`idobjetivo`) REFERENCES `objetivos` (`idobjetivo`),
  ADD CONSTRAINT `sobrenosotros_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `sobrenosotros_ibfk_4` FOREIGN KEY (`idservicios`) REFERENCES `servicios` (`idservicios`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idtipodedocumento`) REFERENCES `tipodocumento` (`idtipodocumento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
