-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2024 a las 02:51:33
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
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `id_acceso` bigint(20) NOT NULL,
  `acceso` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `accesos`
--

INSERT INTO `accesos` (`id_acceso`, `acceso`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(1, 'Activo'),
(2, 'Inactivo');

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
  `detalle_blog` varchar(5000) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `idtipo_blog` int(11) NOT NULL,
  `estado_blog` varchar(10) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`idblog`, `titulo_blog`, `subtitulo_blog`, `imagen_blog`, `fecha_publicacion`, `detalle_blog`, `id_usuario`, `idtipo_blog`, `estado_blog`) VALUES
(1, 'Pruebas', 'Blog Pruebas', '/../Literagiando/Storage/img-blogs/blog.png', '2023-11-23', 'Pruebas de listado Index 2', 48, 1, 'Inactivo'),
(4, 'Insectos Sorprendetes 2', 'Las hormigas: Insectos sorprendentes 2', '/Literagiando/Storage/img-blogs/blog1.png', '2024-01-25', '¿Qué son las hormigas?\r\n', 51, 1, 'Inactivo'),
(5, 'Insectos Sorprendetes Las hormigas: Insectos sorprendentesLas hormigas: Insectos sorprendentes', 'Las hormigas: Insectos sorprendentes', '/Literagiando/Storage/img-blogs/blog1.png', '2024-01-25', 'Las hormigas son insectos comunes, pero presentan algunas características únicas. En el mundo se conocen más de 12 000 especies de hormiga. Predominan especialmente en los bosques tropicales, donde en determinados lugares pueden suponer hasta la mitad de la población de insectos.\r\n\r\n¿Qué son las hormigas?\r\nLas hormigas son insectos con algunas capacidades únicas. Destaca sobre todo su legendaria c', 51, 2, 'Activo'),
(6, 'Insectos Sorprendetes', 'Blog Pruebas', '/Literagiando/Storage/img-blogs/blog1.png', '2024-01-27', 'ret de blog', 48, 2, 'Activo'),
(8, 'Insectos Sorprendetes 2', 'Las hormigas: Insectos sorprendentes', '/Literagiando/Storage/img-blogs/blog1.png', '2024-01-27', 'Dieta y comportamiento\r\nLas hormigas, insectos sociales entusiastas, suelen vivir en comunidades de nidos estructurados que pueden estar situados bajo tierra, en montículos a nivel del suelo o en árboles. Las hormigas carpinteras, que incluyen más de mil especies del género Camponotus, anidan en la madera y pueden ser destructivas para los edificios (muy parecidas a las termitas, que causan daños ', 52, 2, 'Inactivo'),
(9, 'Pruebas', 'Blog Pruebas', '/Literagiando/Storage/img-blogs/mano.png', '2024-01-27', 'ejemplo blog mano', 49, 2, 'Inactivo'),
(10, 'wqeqw', 'Blog Pruebas', '/../Literagiando/Storage/img-blogs/fondo-login.jfif', '2024-02-03', 'awd', 52, 1, 'Inactivo'),
(11, 'Pruebas 101', '101', '/../Literagiando/Storage/img-blogs/fondo_noticias.png', '2024-03-02', '101', 51, 1, 'Activo');

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
-- Estructura de tabla para la tabla `disponibles`
--

CREATE TABLE `disponibles` (
  `id_disponible` bigint(20) NOT NULL,
  `disponible` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `disponibles`
--

INSERT INTO `disponibles` (`id_disponible`, `disponible`) VALUES
(1, 'Disponible'),
(2, 'Agotado'),
(1, 'Disponible'),
(2, 'Agotado');

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
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` bigint(20) NOT NULL,
  `estado` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `estado`) VALUES
(1, 'Devuelto'),
(2, 'Prestado'),
(1, 'Devuelto'),
(2, 'Prestado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `ideventos` int(11) NOT NULL,
  `imagen_eventos` varchar(200) NOT NULL,
  `fecha_evento` varchar(100) NOT NULL,
  `titulo_evento` varchar(200) NOT NULL,
  `detalle_evento` varchar(5000) NOT NULL,
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
(33, '/Literagiando/Storage/img-home/niños.jpeg', '2024-01-18', 'Taller de ilustración: Un acercamiento a la literatura', 'El Club de Jóvenes se reúne todos los viernes 3:00 p.m. Una experiencia con la lectura, abierto al dialogo, donde involucramos la conversación, las reflexiones, experiencias, además de respetar las opiniones de los demás, y una forma de descubrir nuevas potencialidades.\r\n\r\n\r\n¡Te esperamos!', 'Inactivo', 3, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventuras'),
(35, '/Literagiando/Storage/img-home/niños.jpeg', '2024-01-31', 'Taller de ilustración: Un acercamiento a la literatura', 'cosas que pasan', 'Activo', 2, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventura'),
(36, '/../Literagiando/Storage/img-eventos/products.png', '2024-02-22', 'Taller de ilustración: Un acercamiento a la literatura', 'evento nuevo', 'Activo', 2, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventura'),
(38, '/../Literagiando/Storage/img-eventos/Libro.png', '2024-02-22', 'evento 1 pero con titulo mas largo', 'q', 'Activo', 2, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventura'),
(39, '/../Literagiando/Storage/img-eventos/Logo-Uni.png', '2024-12-24T07:38', 'Señitas', 'd', 'Activo', 1, '﻿Ven al taller de ilustración, tendremos un acercamiento con la literatura, exploraremos la relacion de la literatura con el arte, cine, música, etc.', 'Universidad San Buenaventuras');

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
(4, 'Audio Libros 2', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 0);

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
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` bigint(20) NOT NULL,
  `titulo` varchar(101) NOT NULL,
  `autor` varchar(51) NOT NULL,
  `tema` varchar(51) NOT NULL,
  `descripcion` varchar(501) NOT NULL,
  `condicion_libro` varchar(51) NOT NULL,
  `edades` varchar(18) NOT NULL,
  `color` varchar(9) NOT NULL,
  `formato` varchar(8) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `portada` varchar(76) NOT NULL,
  `disponible` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `tema`, `descripcion`, `condicion_libro`, `edades`, `color`, `formato`, `link`, `portada`, `disponible`) VALUES
(1, 'LOS SECRETOS DE LOS ASESINOS DEL EMPERADOR (CAPÃ�TULO 1)', 'King stephen', 'Novela de terror', 'Lloyd, un hombre que acaba de perder a su mujer, recibe un Â«regaloÂ»  inesperado por parte de su hermana. Laurie, una adorable cachorrilla  mezcla de Border Collie y Mudi, que poco a poco cambiarÃ¡ su vida.', 'Perfectas condiciones', 'De 3 A 8 aÃ±os', '#c0b7a6', 'Fisico', 'https://www.facebook.com/photo/?fbid=452514816891196&set=a.452514776891200?=1', '0234567891.png', 1),
(2, 'LOS SECRETOS DE LOS ASESINOS DEL EMPERADOR (CAPÃ�TULO 2)', 'Gio morris', 'Novela de turismo', 'Esta es la historia de Toscano y Paula, dos almas gemelas que no se conocen de mucho, pero que se intuyen demasiado. Toscano muere y descubre que, para entrar en el cielo, poco importa lo que hizo en vida.', 'Perfectas condiciones', 'De 9 A 13 aÃ±os', '#e0dcae', 'Digital', 'https://www.facebook.com/photo/?fbid=452514816891196&set=a.452514776891200?=2', '0234567892.png', 1),
(3, 'LOS SECRETOS DE LOS ASESINOS DEL EMPERADOR (CAPÃ�TULO 3)', 'Ken follett', 'Novela contemporÃ¡nea', 'Este eBook contiene material extra sobre la aclamada trilogÃ­a de Ken  Follett Â«The CenturyÂ»: entrevistas y conversaciones con el autor, vÃ­deos  y material inÃ©dito sobre las familias protagonistas, etc.', 'Perfectas condiciones', 'De 14 A 18 aÃ±os', '#7a696e', 'Fisico', 'https://www.facebook.com/photo/?fbid=452514816891196&set=a.452514776891200?=3', '0234567893.png', 1),
(4, 'LOS SECRETOS DE LOS ASESINOS DEL EMPERADOR (CAPÃ�TULO 4)', 'King garcia', 'Historia de EspaÃ±a', 'Lloyd, un hombre que acaba de perder a su mujer, recibe un Â«regaloÂ»  inesperado por parte de su hermana. Laurie, una adorable cachorrilla  mezcla de Border Collie y Mudi, que poco a poco cambiarÃ¡ su vida.', 'Perfectas condiciones', 'De 19 A 23 aÃ±os', '#feed01', 'Digital', 'https://www.facebook.com/photo/?fbid=452514816891196&set=a.452514776891200?=4', '0234567894.png', 1),
(5, 'LOS SECRETOS DE LOS ASESINOS DEL EMPERADOR (CAPÃ�TULO 5)', 'Risto mejide', 'Novela contemporÃ¡nea', 'Esta es la historia de Toscano y Paula, dos almas gemelas que no se conocen de mucho, pero que se intuyen demasiado. Toscano muere y descubre que, para entrar en el cielo, poco importa lo que hizo en vida.', 'Perfectas condiciones', 'De 3 A 8 aÃ±os', '#0491a3', 'Fisico', 'https://www.facebook.com/photo/?fbid=452514816891196&set=a.452514776891200?=5', '0234567895.png', 1),
(6, 'LOS SECRETOS DE LOS ASESINOS DEL EMPERADOR (CAPÃ�TULO 6)', 'Matt morris', 'Novela histÃ³rica', 'Un hombre que acaba de perder a su mujer, recibe un Â«regaloÂ»  inesperado por parte de su hermana. Laurie, una adorable cachorrilla  mezcla de Border Collie y Mudi, que poco a poco cambiarÃ¡ su vida para siempre.', 'Perfectas condiciones', 'De 9 A 13 aÃ±os', '#5d3d1a', 'Digital', 'https://www.facebook.com/photo/?fbid=452514816891196&set=a.452514776891200?=6', '0234567896.png', 1),
(7, 'LOS SECRETOS DE LOS ASESINOS DEL EMPERADOR (CAPÃ�TULO 7)', 'Austen jane', 'Historia y Literatura', 'Este eBook contiene material extra sobre la aclamada trilogÃ­a de Ken  Follett Â«The CenturyÂ»: entrevistas y conversaciones con el autor, vÃ­deos  y material inÃ©dito sobre las familias protagonistas, etc.', 'Perfectas condiciones', 'De 14 A 18 aÃ±os', '#7e6e34', 'Fisico', 'https://www.facebook.com/photo/?fbid=452514816891196&set=a.452514776891200?=7', '0234567897.png', 1),
(8, 'LOS SECRETOS DE LOS ASESINOS DEL EMPERADOR (CAPÃ�TULO 8)', 'Leila cerri', 'Novela espiritualidad', 'Lloyd, un hombre que acaba de perder a su mujer, recibe un Â«regaloÂ»  inesperado por parte de su hermana. Laurie, una adorable cachorrilla  mezcla de Border Collie y Mudi, que poco a poco cambiarÃ¡ su vida.', 'Perfectas condiciones', 'De 19 A 23 aÃ±os', '#a5d2cf', 'Digital', 'https://www.facebook.com/photo/?fbid=452514816891196&set=a.452514776891200?=8', '0234567898.png', 1),
(9, 'LOS SECRETOS DE LOS ASESINOS DEL EMPERADOR (CAPÃ�TULO 9)', 'Tom y morris', 'Novela de filosofÃ­a', 'Esta es la historia de Toscano y Paula, dos almas gemelas que no se conocen de mucho, pero que se intuyen demasiado. Toscano muere y descubre que, para entrar en el cielo, poco importa lo que hizo en vida.', 'Perfectas condiciones', 'De 3 A 8 aÃ±os', '#cf1123', 'Fisico', 'https://www.facebook.com/photo/?fbid=452514816891196&set=a.452514776891200?=9', '0234567899.png', 1),
(10, 'LOS SECRETOS DE LOS ASESINOS DEL EMPERADOR (CAPÃ�TULO 10)', 'Gio zararri', 'Novela autoayuda', 'Este eBook contiene material extra sobre la aclamada trilogÃ­a de Ken  Follett Â«The CenturyÂ»: entrevistas y conversaciones con el autor, vÃ­deos  y material inÃ©dito sobre las familias protagonistas, etc.', 'Perfectas condiciones', 'De 9 A 13 aÃ±os', '#fbee61', 'Digital', 'https://www.facebook.com/photo/?fbid=452514816891196&set=a.452514776891200?=10', '0234567890.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcos`
--

CREATE TABLE `marcos` (
  `id_marco` bigint(20) NOT NULL,
  `foto_1` varchar(76) NOT NULL,
  `titulo_1` varchar(60) NOT NULL,
  `foto_2` varchar(76) NOT NULL,
  `titulo_2` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `marcos`
--

INSERT INTO `marcos` (`id_marco`, `foto_1`, `titulo_1`, `foto_2`, `titulo_2`) VALUES
(1, 'bg1-1-min.jpg', '', 'bg1-2-min.jpg', '');

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
  `detalle_noticias` varchar(5000) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `idtipo_Noticia` int(11) NOT NULL,
  `estado_noticia` varchar(10) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idnoticias`, `imagen_card`, `nombre_Noticia`, `fecha_publicacion`, `subtitulo_noticias`, `detalle_noticias`, `id_usuario`, `idtipo_Noticia`, `estado_noticia`) VALUES
(18, '/Literagiando/Storage/img-Noticias/mano.png', 'Teorias pedagogicas', '2024-01-25 06:56:53', 'Teorias pedagogicas', 'Técnicas inclusivas para la pedagogía ', 48, 2, 'Activo'),
(19, '/Literagiando/Storage/img-Noticias/noticia.png', 'Aprende conceptos básicosBasicosBasicos', '2024-03-04 01:44:52', 'Aprende conceptos básicos en Lengua de Señas con BibloRed', 'Durante abril y mayo de 2020 BibloRed ofreció a la comunidad el primer taller virtual de lengua de señas colombiana, en el abordaron temas como los saludos, los colores, la familia y el alfabeto.\r\n\r\nDurante junio de 2021 BibloRed ofreció a la comunidad el primer taller virtual de lengua de señas colombiana, en el abordaron temas como los saludos, los colores, la familia y el alfabeto.', 51, 1, 'Activo'),
(52, '/../Literagiando/Storage/img-Noticias/Libro.png', 'Noticia 16', '2024-02-03 13:57:17', 'Subtitulo 16', 'Contenido noticia 16 y de mas', 49, 2, 'Inactivo'),
(53, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 17', '2024-01-25 06:55:34', 'Subtitulo 17', 'Contenido noticia 17', 48, 2, 'Inactivo'),
(55, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 19', '2024-01-25 06:51:55', 'Subtitulo 19', 'Contenido noticia 19', 48, 2, 'Inactivo'),
(56, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 20', '2024-02-04 03:21:25', 'Subtitulo 20', 'Contenido noticia 20', 48, 1, 'Activo'),
(57, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 21', '2024-02-03 10:36:08', 'Subtitulo 21', 'Contenido noticia 21', 48, 2, 'Inactivo'),
(58, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 22', '2024-02-04 03:21:29', 'Subtitulo 22', 'nada', 48, 1, 'Activo'),
(59, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 23', '2024-01-25 21:26:49', 'Subtitulo 23', 'Contenido noticia 23', 51, 2, 'Activo'),
(60, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 24', '2024-01-25 06:52:20', 'Subtitulo 24', 'Contenido noticia 24', 48, 1, 'Inactivo'),
(61, '/Literagiando/Storage/img-Noticias/noticia.png', 'Noticia 25 CHANGE', '2024-01-25 21:34:07', 'Subtitulo 25', 'Contenido noticia 25 ', 48, 2, 'Activo'),
(62, '/Literagiando/Storage/img-Noticias/noticia.png', 'NOTICIA 26 ', '2024-02-21 07:13:11', 'AS', 'noticia 26 asdasd', 48, 1, 'Activo'),
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
(1, 'Objetivo Principal', 'q', 1),
(2, 'Objetivos Especificos', 'g', 1);

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
(6, 'Biblioteca', '/Literagiando/literagiando59/login.php', 'bx-library', '1', 2),
(7, 'Roles', '/Literagiando/Views/Roles/index.php', 'bx-anchor', '1', 1),
(8, 'Admin Usuarios', '/Literagiando/Views/UserAdmin/index.php', 'bx-user', '1', 1),
(9, 'Mis Eventos', '/Literagiando/Views/MisEventos/index.php', 'bx-calendar', '1', 2),
(10, 'Admin Sobre Nosotros\r\n', '/Literagiando/Views/HomeAdmin/sobreNosotros.php', 'bx-grid-alt', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` bigint(20) NOT NULL,
  `permiso` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `permiso`) VALUES
(1, 'Aprobado'),
(2, 'Desaprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `id_libro_1` bigint(20) DEFAULT NULL,
  `id_libro_2` bigint(20) DEFAULT NULL,
  `id_libro_3` bigint(20) DEFAULT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `estado` bigint(20) NOT NULL,
  `permiso` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

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
(2, 6),
(2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicios` int(11) NOT NULL,
  `tipo_servicios` varchar(200) NOT NULL,
  `detalle_servicio` varchar(1000) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicios`, `tipo_servicios`, `detalle_servicio`, `imagen`, `activo`) VALUES
(1, 'Material', 'This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', '/../Literagiando/Storage/img-home/1707894830912_Libro.png', 1),
(2, 'Referencias', 'This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', '/../Literagiando/Storage/img-home/1707894830912_Libro.png', 1),
(3, 'Apoyo', 'This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.\r\n', '/../Literagiando/Storage/img-home/mano.png', 1),
(4, 'Estudiantes', 'This content is a little bit longer. This is a longer card with supporting text below as a natural lead-in to additional content. \r\n', '/../Literagiando/Storage/img-home/waiter.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sobrenosotros`
--

CREATE TABLE `sobrenosotros` (
  `id_sobre_nosotros` int(11) NOT NULL,
  `titulo_general` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `titulo_historia` varchar(100) NOT NULL,
  `detalle_historia` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sobrenosotros`
--

INSERT INTO `sobrenosotros` (`id_sobre_nosotros`, `titulo_general`, `imagen`, `titulo_historia`, `detalle_historia`) VALUES
(2, 'Literagiando', '/../Literagiando/Storage/img-home/fondo_noticias.png', 'Historia', 'Sass Bootstrap uses Dart Sass for compiling our Sass source files into CSS files (included in our build process), and we recommend you do the same if you’re compiling Sass using your own asset pipelin\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sobre_nosotros`
--

CREATE TABLE `sobre_nosotros` (
  `id` int(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `facultad` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sobre_nosotros`
--

INSERT INTO `sobre_nosotros` (`id`, `nombre`, `cargo`, `facultad`, `imagen`) VALUES
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
  `identificacion` int(20) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_completo` varchar(200) NOT NULL,
  `direccion_usuario` varchar(200) NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `foto_perfil` varchar(200) NOT NULL DEFAULT '/Literagiando/Resources/img/User.png',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `idtipodedocumento` int(11) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT 2,
  `sexo` varchar(10) NOT NULL DEFAULT 'Femenino',
  `acceso` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`identificacion`, `id_usuario`, `nombre_completo`, `direccion_usuario`, `telefono`, `usuario`, `correo`, `password`, `estado`, `foto_perfil`, `fecha_registro`, `idtipodedocumento`, `rol`, `sexo`, `acceso`) VALUES
(2147483647, 48, 'Erika Estupiñan', 'Carrera 69f #64h-19', 5676866878, 'Erika1131', 'lorena@gmail.com', '$2y$10$njzM/DUcQ8jtyITH84fDCulBKk2tZt5SU8.iu7cQ9t0E6ZLYOqzfy', 1, '/Literagiando/Resources/img/User.png', '2024-03-02 14:42:54', 1, 1, 'Femenino', 1),
(123456, 49, 'Deyner Sanchez', 'Diagonal 92 #17 a-42', 573204501963, 'Dei0707', 'ext.deyner.sanchez@colgas.com', '$2y$10$ujV6C5X3YUpab7qaS0AbVudwtdoaNG6hcJSqc2rECRnpBWCliUwrW', 0, '/Literagiando/Resources/img/User.png', '2024-03-02 14:42:54', 1, 2, 'Masculino', 0),
(12, 51, 'daniel sierra blanco', 'cr 99 # 89', 3214634549, 'dsierrabl', 'mr.danielsi18@gmail.com', '$2y$10$eIt5l1.7JmRjwZnKgs7iaOPbDxTzxuBC/UCToau5gurMCooLWHOwW', 1, '/Literagiando/Resources/img/User.png', '2024-03-04 00:47:44', 1, 1, 'Femenino', 1),
(1212, 52, 'daniel', 'cr 77 ', 32146345491231, 'carlitos perez', 'dsierrabl@unal.edu.co', '$2y$10$ggIap0VzjmqzvL5.SQQ7u.31LGEVimDG8S2TsZrMdeNkkuSTH07hi', 1, '/Literagiando/Resources/img/User.png', '2024-03-02 14:42:54', 1, 1, 'Femenino', 1),
(1020, 67, 'carlos', 'cr 99', 573204501963, 'sin nick', 'lorasa@gmail.com', '$2y$10$yCNPV/tX4WNbx/Vdb/yjVujnbtGmjazuPC8Yn47Yn5cR9YOOvBOAm', 1, '/Literagiando/Resources/img/User.png', '2024-03-02 14:42:54', 5, 26, 'Femenino', 1),
(11, 113, 'pepito perez', 'cr 77 # 48 a ', 3124562112, 'nick2', '0@gmail.com', '$2y$10$C9iLH4a6gL7IiZtbqc/.LuR9rIBuBzoPMTbfHxugohSAYkH519GUK', 1, '/Literagiando/Resources/img/User.png', '2024-03-03 04:06:56', 1, 2, 'Femenino', 1),
(12123, 114, 'pepito perez ASDAS', 'cr 77 # 48 a123123', 123, 'omar', 'ASD@gmail.com', '$2y$10$UAqvr7v72v6CGfWbbpxvg.fru3F8UTDYYR0RkWbvdAQKD3EgurOLy', 1, '/Literagiando/Resources/img/User.png', '2024-03-04 01:38:37', 1, 2, 'Femenino', 1);

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `estado_acceso` BEFORE UPDATE ON `usuario` FOR EACH ROW BEGIN
  IF OLD.acceso <> NEW.estado THEN
    SET NEW.acceso = NEW.estado ;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT 2,
  `identificacion` bigint(20) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` varchar(65) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_perfil` varchar(76) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `estado` int(2) NOT NULL DEFAULT 1,
  `direccion_usuario` varchar(100) NOT NULL,
  `idtipodedocumento` int(11) NOT NULL,
  `acceso` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `identificacion`, `nombre_completo`, `sexo`, `telefono`, `correo`, `usuario`, `password`, `foto_perfil`, `fecha_creacion`, `estado`, `direccion_usuario`, `idtipodedocumento`, `acceso`) VALUES
(1, 1, 1143970700, 'Erik Andres Cortes Moreno', 'Masculino', 3176432032, 'conerikcortes@gmail.com', 'conerikcortes', '$2y$10$7o732JswEZI.YjsQ5GoFUe24F6H0/xtLLAElFMgxpXns4UAaI7tvq', 'conerikcortes.jpg', '2023-11-01', 1, '', 0, 1),
(2, 2, 1143970702, 'Laura Dayana Triana Perez', 'Femenino', 3176432002, 'latibeiffetou-2435@gmail.com', 'laura', '$2y$10$7o732JswEZI.YjsQ5GoFUe24F6H0/xtLLAElFMgxpXns4UAaI7tvq', '0234567890.png', '2023-11-01', 1, '', 0, 1),
(6, 2, 1234567890, 'pepito perez', '', 32145634549, 'mr.dani10@gmail.com', 'nick', '$2y$10$CyNTwITGed3iZeJoMc3Jp.QWFaRNB13.Lsn1aF3aHzBFFvkV2ZlMi', '', '0000-00-00', 0, 'cr 77 ', 1, 1);

--
-- Índices para tablas volcadas
--

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
  ADD KEY `idusuario` (`id_usuario`,`idtipo_Noticia`),
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
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo_usuario` (`correo`),
  ADD UNIQUE KEY `documento_usuario` (`identificacion`),
  ADD KEY `idtipodedocumento` (`idtipodedocumento`),
  ADD KEY `idrolusuario` (`rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_idrol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `idblog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `ideventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sobrenosotros`
--
ALTER TABLE `sobrenosotros`
  MODIFY `id_sobre_nosotros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sobre_nosotros`
--
ALTER TABLE `sobre_nosotros`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia_eventos`
--
ALTER TABLE `asistencia_eventos`
  ADD CONSTRAINT `asistencia_eventos_ibfk_2` FOREIGN KEY (`ideventos`) REFERENCES `eventos` (`ideventos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia_eventos_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`idtipo_blog`) REFERENCES `tipoblog` (`idtipo_blog`),
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD CONSTRAINT `carrito_compras_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id_usuario`),
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
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
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

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_idrol` FOREIGN KEY (`rol`) REFERENCES `roles` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
