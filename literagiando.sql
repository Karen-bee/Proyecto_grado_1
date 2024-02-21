-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2024 a las 23:12:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

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
  `idrolusuario` int(11) NOT NULL,
  `idpagina` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignacion_paginas`
--

INSERT INTO `asignacion_paginas` (`idrolusuario`, `idpagina`, `estado`) VALUES
(6, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_eventos`
--

CREATE TABLE `asistencia_eventos` (
  `idusuario` int(11) NOT NULL,
  `ideventos` int(11) NOT NULL,
  `asiste` varchar(2) NOT NULL DEFAULT 'si'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencia_eventos`
--

INSERT INTO `asistencia_eventos` (`idusuario`, `ideventos`, `asiste`) VALUES
(51, 31, 'si'),
(51, 33, 'no'),
(51, 37, 'si'),
(51, 38, 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `idblog` int(11) NOT NULL,
  `titulo_blog` varchar(200) NOT NULL,
  `subtitulo_blog` varchar(200) NOT NULL,
  `imagen_blog` varchar(200) NOT NULL,
  `fecha_publicacion` date NOT NULL DEFAULT current_timestamp(),
  `detalle_blog` varchar(400) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idtipo_blog` int(11) NOT NULL,
  `estado_blog` varchar(10) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`idblog`, `titulo_blog`, `subtitulo_blog`, `imagen_blog`, `fecha_publicacion`, `detalle_blog`, `idusuario`, `idtipo_blog`, `estado_blog`) VALUES
(1, 'Pruebas', 'Blog Pruebas', '/../Literagiando/Storage/img-blogs/blog.png', '2023-11-23', 'Pruebas de listado Index 2', 48, 1, 'Activo'),
(4, 'Insectos Sorprendetes 2', 'Las hormigas: Insectos sorprendentes 2', '/Literagiando/Storage/img-blogs/blog1.png', '2024-01-25', '¿Qué son las hormigas?\r\n', 51, 1, 'Activo'),
(5, 'Insectos Sorprendetes', 'Las hormigas: Insectos sorprendentes', '/Literagiando/Storage/img-blogs/blog1.png', '2024-01-25', 'Las hormigas son insectos comunes, pero presentan algunas características únicas. En el mundo se conocen más de 12 000 especies de hormiga. Predominan especialmente en los bosques tropicales, donde en determinados lugares pueden suponer hasta la mitad de la población de insectos.\r\n\r\n¿Qué son las hormigas?\r\nLas hormigas son insectos con algunas capacidades únicas. Destaca sobre todo su legendaria c', 51, 2, 'Activo'),
(6, 'Insectos Sorprendetes', 'Blog Pruebas', '/Literagiando/Storage/img-blogs/blog1.png', '2024-01-27', 'ret d', 48, 2, 'Activo'),
(8, 'Insectos Sorprendetes 2', 'Las hormigas: Insectos sorprendentes', '/Literagiando/Storage/img-blogs/blog1.png', '2024-01-27', 'Dieta y comportamiento\r\nLas hormigas, insectos sociales entusiastas, suelen vivir en comunidades de nidos estructurados que pueden estar situados bajo tierra, en montículos a nivel del suelo o en árboles. Las hormigas carpinteras, que incluyen más de mil especies del género Camponotus, anidan en la madera y pueden ser destructivas para los edificios (muy parecidas a las termitas, que causan daños ', 52, 2, 'Inactivo'),
(9, 'Pruebas', 'Blog Pruebas', '/Literagiando/Storage/img-blogs/mano.png', '2024-01-27', 'ejemplo blog mano', 49, 2, 'Inactivo'),
(10, 'wqeqw', 'Blog Pruebas', '/../Literagiando/Storage/img-blogs/fondo-login.jfif', '2024-02-03', 'awd', 52, 1, 'Inactivo');

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
  `fecha_evento` varchar(100) NOT NULL,
  `titulo_evento` varchar(200) NOT NULL,
  `detalle_evento` varchar(2000) NOT NULL,
  `estado_evento` varchar(10) NOT NULL DEFAULT 'Activo',
  `idtipo_evento` int(11) NOT NULL,
  `subtitulo_evento` varchar(200) NOT NULL,
  `lugar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ideventos`, `imagen_eventos`, `fecha_evento`, `titulo_evento`, `detalle_evento`, `estado_evento`, `idtipo_evento`, `subtitulo_evento`, `lugar`) VALUES
(31, '/Literagiando/Storage/img-eventos/202205130625407.jpg', '2024-01-29 17:08:08', 'Taller de ilustración: Un acercamiento a la literatura', 'El Club de Jóvenes se reúne todos los viernes 3:00 p.m. Una experiencia con la lectura, abierto al dialogo, donde involucramos la conversación, las reflexiones, experiencias, además de respetar las opiniones de los demás, y una forma de descubrir nuevas potencialidades.\r\n¡Te esperamos!', 'Activo', 2, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventura'),
(33, '/Literagiando/Storage/img-home/niños.jpeg', '2024-01-18', 'Taller de ilustración: Un acercamiento a la literatura', 'El Club de Jóvenes se reúne todos los viernes 3:00 p.m. Una experiencia con la lectura, abierto al dialogo, donde involucramos la conversación, las reflexiones, experiencias, además de respetar las opiniones de los demás, y una forma de descubrir nuevas potencialidades.\r\n\r\n\r\n¡Te esperamos!', 'Activo', 3, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventuras'),
(35, '/Literagiando/Storage/img-home/niños.jpeg', '2024-01-31', 'Taller de ilustración: Un acercamiento a la literatura', 'cosas que pasan', 'Activo', 2, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventura'),
(36, '/../Literagiando/Storage/img-eventos/library.png', '2024-02-22', 'Taller de ilustración: Un acercamiento a la literatura', 'evento nuevo', 'Activo', 2, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventura'),
(37, '/../Literagiando/Storage/img-eventos/fondo_noticias.png', '2024-03-28', '1', 'evento algo', 'Activo', 2, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventura'),
(38, '/../Literagiando/Storage/img-eventos/Libro.png', '2024-02-22', 'evento 1 pero con titulo mas largo', 'q', 'Activo', 2, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventura'),
(39, '/../Literagiando/Storage/img-eventos/Logo-Uni.png', '2024-02-29', 'Señitas', 'd', 'Inactivo', 1, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventuras');

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
  `id_generos` int(11) NOT NULL,
  `tipo_genero` varchar(45) NOT NULL,
  `detalle_genero` varchar(1000) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos_literarios`
--

INSERT INTO `generos_literarios` (`id_generos`, `tipo_genero`, `detalle_genero`, `activo`) VALUES
(1, 'Cuentos', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 1),
(2, 'Audio Libros', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 1),
(3, 'Cuentos 2', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 1),
(4, 'Audio Libros 2', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 1);

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
(5, 'Slider 3.jpeg', 'image/jpeg', 170428, 'd-block w-100', 'Activo', '/Literagiando/Storage/img-home/Slider 3.jpeg'),
(7, 'Slider 4.jpeg', 'image/jpeg', 144868, 'd-block w-100', 'Activo', '/Literagiando/Storage/img-home/Slider 4.jpeg'),
(18, 'Logo-Uni.png', 'image/png', 23616, 'd-block w-100', 'Activo', '/../Literagiando/Storage/img-home/Logo-Uni.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idnoticias` int(11) NOT NULL,
  `imagen_card` varchar(200) NOT NULL,
  `nombre_Noticia` varchar(200) NOT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subtitulo_noticias` varchar(300) NOT NULL,
  `detalle_noticias` varchar(2000) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idtipo_Noticia` int(11) NOT NULL,
  `estado_noticia` varchar(10) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idnoticias`, `imagen_card`, `nombre_Noticia`, `fecha_publicacion`, `subtitulo_noticias`, `detalle_noticias`, `idusuario`, `idtipo_Noticia`, `estado_noticia`) VALUES
(18, '/Literagiando/Storage/img-Noticias/mano.png', 'Teorias pedagogicas', '2024-01-25 06:56:53', 'Teorias pedagogicas', 'Técnicas inclusivas para la pedagogía ', 48, 2, 'Activo'),
(19, '/Literagiando/Storage/img-Noticias/noticia.png', 'Aprende conceptos básicos en Lengua de Señas con BibloRed', '2024-02-03 10:20:46', 'Aprende conceptos básicos en Lengua de Señas con BibloRed', 'Durante abril y mayo de 2020 BibloRed ofreció a la comunidad el primer taller virtual de lengua de señas colombiana, en el abordaron temas como los saludos, los colores, la familia y el alfabeto.\r\n\r\nDurante junio de 2021 BibloRed ofreció a la comunidad el primer taller virtual de lengua de señas colombiana, en el abordaron temas como los saludos, los colores, la familia y el alfabeto.', 51, 1, 'Inactivo'),
(52, '/../Literagiando/Storage/img-Noticias/Libro.png', 'Noticia 16', '2024-02-03 13:57:17', 'Subtitulo 16', 'Contenido noticia 16 y de mas', 49, 2, 'Inactivo'),
(53, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 17', '2024-01-25 06:55:34', 'Subtitulo 17', 'Contenido noticia 17', 48, 2, 'Inactivo'),
(55, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 19', '2024-01-25 06:51:55', 'Subtitulo 19', 'Contenido noticia 19', 48, 2, 'Inactivo'),
(56, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 20', '2024-02-04 03:21:25', 'Subtitulo 20', 'Contenido noticia 20', 48, 1, 'Activo'),
(57, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 21', '2024-02-03 10:36:08', 'Subtitulo 21', 'Contenido noticia 21', 48, 2, 'Inactivo'),
(58, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 22', '2024-02-04 03:21:29', 'Subtitulo 22', 'nada', 48, 1, 'Activo'),
(59, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 23', '2024-01-25 21:26:49', 'Subtitulo 23', 'Contenido noticia 23', 51, 2, 'Activo'),
(60, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 24', '2024-01-25 06:52:20', 'Subtitulo 24', 'Contenido noticia 24', 48, 1, 'Inactivo'),
(61, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 25 CHANGE', '2024-01-25 21:34:07', 'Subtitulo 25', 'Contenido noticia 25 ', 48, 2, 'Activo'),
(62, '/Literagiando/Storage/img-Noticias/noticia.png', 'NOTICIA 26 CHANGE', '2024-02-03 09:56:52', 'AS', 'noticia 26', 48, 1, 'Inactivo'),
(65, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 29', '2024-02-29 06:45:00', 'Subtitulo 29', 'Contenido noticia 29', 48, 2, 'Activo'),
(66, '/../Literagiando/Storage/img-Noticias/mano.png', 'Noticia 30', '2024-02-03 09:59:30', 'Subtitulo 30', 'Contenido noticia 30 con relleno', 48, 1, 'Activo'),
(68, '/Literagiando/Storage/img-Noticias/fondo_noticias.png', 'Noticia 99', '2024-01-25 07:28:50', 'Noticia 99', 'fdfas asdf aasdfa sdsdf', 48, 1, 'Activo'),
(69, '/Literagiando/Storage/img-Noticias/library.png', 'ejemplo', '2024-02-03 10:30:36', 'ejemplo', 'asd asd a sdasd asd a', 52, 2, 'Inactivo'),
(71, '/Literagiando/Storage/img-Noticias/fondo_noticias.png', 'a', '2024-02-03 10:30:33', 'a', 'como que a', 52, 1, 'Inactivo'),
(72, '/Literagiando/Storage/img-Noticias/birrete.png', 'Noticia 99', '2024-01-28 18:04:55', 'ejemplo largo', 'idblog', 49, 2, 'Inactivo'),
(75, '/../Literagiando/Storage/img-Noticias/Logo_Literagiando.png', 'a', '2024-02-03 10:07:42', 'asdfghj', 'asdfgh', 48, 1, 'Activo'),
(76, '/../Literagiando/Storage/img-Noticias/Logo_Universidad.png', 'a', '2024-02-03 10:09:54', 'a', 'a', 52, 1, 'Inactivo'),
(80, '/Literagiando/Storage/img-noticias/noticia.png', 'Noticia 99', '2024-02-03 13:54:52', 'a', 'as', 49, 1, 'Activo'),
(81, '/../Literagiando/Storage/img-Noticias/fondo_noticias.png', 'Noticia 99', '2024-02-03 13:55:37', 'Subtitulo 16', 'asd asd asd', 49, 1, 'Activo'),
(82, '/../Literagiando/Storage/img-Noticias/fondo_noticias.png', 'Noticia 99', '2024-02-03 13:56:00', 'Subtitulo 16', 'asd asd asd', 49, 1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE `objetivos` (
  `id_objetivo` int(11) NOT NULL,
  `titulo_objetivos` varchar(200) NOT NULL,
  `detalle_objetivos` varchar(2000) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `objetivos`
--

INSERT INTO `objetivos` (`id_objetivo`, `titulo_objetivos`, `detalle_objetivos`, `activo`) VALUES
(1, 'Objetivo Principal', 'Sass Bootstrap uses Dart Sass for compiling our Sass source files .', 1),
(2, 'Objetivos Especificos', 'Sass Bootstrap uses Dart Sass for compiling our Sass source files into CSS files (included in our build process), and we recommend you do the same if you’re compiling Sass using your own asset pipeline. We previously used Node Sass for Bootstrap v4, but LibSass and packages built on top of it, including Node Sass, are now deprecated. Dart Sass uses a rounding precision of 10 and for efficiency reasons does not allow adjustment of this value. We don’t lower this precision during further processing of our generated CSS, such as during minification, but if you chose to do so we recommend maintaining a precision of at least 6 to prevent issues with browser rounding.	', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `nombre_pagina` varchar(200) NOT NULL,
  `url_pagina` varchar(200) NOT NULL,
  `class` varchar(20) DEFAULT 'bx-grid-alt',
  `estado_pagina` varchar(200) NOT NULL,
  `roluser_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `nombre_pagina`, `url_pagina`, `class`, `estado_pagina`, `roluser_id`) VALUES
(1, 'Dashboard', '/Literagiando/Views/Dashboard.php', 'bx-grid-alt', '1', 1),
(2, 'Admin Eventos', '/Literagiando/Views/EventosAdmin/index.php', 'bx-calendar-edit', '1', 1),
(3, 'Admin Noticias', '/Literagiando/Views/NoticiasAdmin/index.php', 'bx-chat', '1', 1),
(4, 'Admin Blog', '/Literagiando/Views/BlogAdmin/index.php', 'bxl-blogger', '1', 1),
(5, 'Admin Slider', '/Literagiando/Views/SliderAdmin/index.php', 'bx-slideshow', '1', 1),
(6, 'Biblioteca', '#', 'bx-library', '1', 1),
(7, 'Roles', '/Literagiando/Views/Roles/index.php', 'bx-anchor', '1', 1),
(8, 'Admin Usuarios', '/Literagiando/Views/UserAdmin/index.php', 'bx-user', '1', 1),
(9, 'Mis Eventos', '/Literagiando/Views/MisEventos/index.php', 'bx-calendar', '1', 2),
(10, 'Admin Sobre Nosotros\r\n', '/Literagiando/Views/HomeAdmin/sobreNosotros.php', 'bx-grid-alt', '1', 1);

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
(2, 'Estudiante'),
(26, 'teacher');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_permisos`
--

CREATE TABLE `roles_permisos` (
  `idrol` int(11) NOT NULL,
  `id_pagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles_permisos`
--

INSERT INTO `roles_permisos` (`idrol`, `id_pagina`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 1),
(2, 9),
(26, 1),
(26, 9),
(26, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicios` int(11) NOT NULL,
  `tipo_servicios` varchar(200) NOT NULL,
  `detalle_servicio` varchar(1000) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicios`, `tipo_servicios`, `detalle_servicio`, `activo`) VALUES
(1, 'Material', 'This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 1),
(2, 'Referencias', 'This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 1),
(3, 'Apoyo', 'This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.\r\n', 1),
(4, 'Estudiantes', 'This content is a little bit longer. This is a longer card with supporting text below as a natural lead-in to additional content. \r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sobrenosotros`
--

CREATE TABLE `sobrenosotros` (
  `id_sobre_nosotros` int(11) NOT NULL,
  `titulo_general` varchar(200) NOT NULL,
  `imagen_banner` varchar(200) NOT NULL,
  `titulo_historia` varchar(100) NOT NULL,
  `detalle_historia` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sobrenosotros`
--

INSERT INTO `sobrenosotros` (`id_sobre_nosotros`, `titulo_general`, `imagen_banner`, `titulo_historia`, `detalle_historia`) VALUES
(2, 'Literagiando', '/Literagiando/Storage/img-home/Slider 1.jpeg', 'Historia', 'Sass Bootstrap uses Dart Sass for compiling our Sass source files into CSS files (included in our build process), and we recommend you do the same if you’re compiling Sass using your own asset pipelin\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sobre_nosotros`
--

CREATE TABLE `sobre_nosotros` (
  `id` int(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `facultad` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sobre_nosotros`
--

INSERT INTO `sobre_nosotros` (`id`, `nombre`, `rol`, `facultad`, `imagen`) VALUES
(1, 'dsierrabl', 'profesora', 'colegio', '/Literagiando/Storage/img-home/User.png'),
(2, 'Diana Carolina Alberto Chapelles', 'Profesor', 'Facultad de Humanidades y Ciencias de la Educación', '/Literagiando/Storage/img-home/erika.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoblog`
--

CREATE TABLE `tipoblog` (
  `idtipo_blog` int(11) NOT NULL,
  `tipo_blog` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoblog`
--

INSERT INTO `tipoblog` (`idtipo_blog`, `tipo_blog`) VALUES
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
  `idtipo_Noticia` int(11) NOT NULL,
  `tipo_noticia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiponoticia`
--

INSERT INTO `tiponoticia` (`idtipo_Noticia`, `tipo_noticia`) VALUES
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
  `foto_usuario` varchar(200) NOT NULL DEFAULT '/Literagiando/Resources/img/User.png',
  `Fecha_registro` timestamp NULL DEFAULT NULL,
  `idtipodedocumento` int(11) NOT NULL,
  `idrolusuario` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento_usuario`, `idusuario`, `nombrecompleto_usuario`, `direccion_usuario`, `telefono_usuario`, `username`, `correo_usuario`, `password`, `estado`, `foto_usuario`, `Fecha_registro`, `idtipodedocumento`, `idrolusuario`) VALUES
(2147483647, 48, 'Erika Estupiñan', 'Carrera 69f #64h-19', 5676866878, 'Erika1131', 'lorena@gmail.com', '$2y$10$njzM/DUcQ8jtyITH84fDCulBKk2tZt5SU8.iu7cQ9t0E6ZLYOqzfy', 1, '/Literagiando/Resources/img/User.png', NULL, 1, 1),
(123456, 49, 'Deyner Sanchez', 'Diagonal 92 #17a-42', 573204501963, 'Dei0707', 'ext.deyner.sanchez@colgas.com', '$2y$10$ujV6C5X3YUpab7qaS0AbVudwtdoaNG6hcJSqc2rECRnpBWCliUwrW', 0, '/Literagiando/Resources/img/User.png', NULL, 1, 2),
(12, 51, 'daniel sierra blanco', 'cr 99 # 89', 3214634549, 'dsierrabl', 'mr.danielsi18@gmail.com', '$2y$10$bgTYXHpk7MqMHHLKpWf9neXOZOwkhEy2Dbp3G1RIciggliKP9poqC', 1, '/../Literagiando/Resources/img/users/User.png', '2024-02-13 02:32:43', 1, 1),
(1212, 52, 'daniel', 'cr 77 ', 32146345491231, 'carlitos perez', 'dsierrabl@unal.edu.co', '$2y$10$ggIap0VzjmqzvL5.SQQ7u.31LGEVimDG8S2TsZrMdeNkkuSTH07hi', 1, '/Literagiando/Resources/img/User.png', NULL, 1, 1),
(1020, 67, 'carlos', 'cr 99', 573204501963, 'sin nick', 'lorasa@gmail.com', '$2y$10$yCNPV/tX4WNbx/Vdb/yjVujnbtGmjazuPC8Yn47Yn5cR9YOOvBOAm', 1, '/Literagiando/Resources/img/User.png', NULL, 5, 26);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_paginas`
--
ALTER TABLE `asignacion_paginas`
  ADD PRIMARY KEY (`idrolusuario`,`idpagina`),
  ADD KEY `idrolusuario` (`idrolusuario`,`idpagina`),
  ADD KEY `idpagina` (`idpagina`);

--
-- Indices de la tabla `asistencia_eventos`
--
ALTER TABLE `asistencia_eventos`
  ADD PRIMARY KEY (`idusuario`,`ideventos`),
  ADD KEY `idusuario` (`idusuario`,`ideventos`),
  ADD KEY `ideventos` (`ideventos`);

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idblog`),
  ADD KEY `id_usuario` (`idusuario`,`idtipo_blog`),
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
  ADD PRIMARY KEY (`id_generos`);

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
  ADD KEY `idusuario` (`idusuario`,`idtipo_Noticia`),
  ADD KEY `idtiponoticia` (`idtipo_Noticia`);

--
-- Indices de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id_objetivo`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`),
  ADD KEY `roluser_id` (`roluser_id`);

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
  ADD PRIMARY KEY (`idrol`),
  ADD UNIQUE KEY `nombre_rol` (`nombre_rol`);

--
-- Indices de la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD PRIMARY KEY (`idrol`,`id_pagina`),
  ADD KEY `idrol` (`idrol`),
  ADD KEY `idpermisos` (`id_pagina`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicios`);

--
-- Indices de la tabla `sobrenosotros`
--
ALTER TABLE `sobrenosotros`
  ADD PRIMARY KEY (`id_sobre_nosotros`);

--
-- Indices de la tabla `sobre_nosotros`
--
ALTER TABLE `sobre_nosotros`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`idtipo_Noticia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `correo_usuario` (`correo_usuario`),
  ADD UNIQUE KEY `documento_usuario` (`documento_usuario`),
  ADD KEY `idtipodedocumento` (`idtipodedocumento`),
  ADD KEY `idrolusuario` (`idrolusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `idblog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `ideventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  MODIFY `idbibliografia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos_literarios`
--
ALTER TABLE `generos_literarios`
  MODIFY `id_generos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `home`
--
ALTER TABLE `home`
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_home`
--
ALTER TABLE `imagenes_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idnoticias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `id_objetivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sobrenosotros`
--
ALTER TABLE `sobrenosotros`
  MODIFY `id_sobre_nosotros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sobre_nosotros`
--
ALTER TABLE `sobre_nosotros`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `idtipo_Noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

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
  ADD CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`idtipo_Noticia`) REFERENCES `tiponoticia` (`idtipo_Noticia`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`);

--
-- Filtros para la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_pagina`) REFERENCES `pagina` (`id_pagina`),
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idtipodedocumento`) REFERENCES `tipodocumento` (`idtipodocumento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
