SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `corbateria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaModificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(100) NOT NULL,
  `activo` int NOT NULL
);

CREATE TABLE `subCategories` (
  `id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaModificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre`  varchar(100) NOT NULL,
  `categoria` int not null
);

CREATE TABLE `marca` (
  `id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaModificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre`  varchar(100) NOT NULL
);
--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `fechaCreacion`, `fechaModificacion`, `nombre`,`activo`) VALUES
(1, '2021-04-21 21:42:54', '2021-04-21 21:42:54', 'Pruebas', 1);

--
-- Volcado de datos para la tabla `subCategories`
--

INSERT INTO `subCategories` (`id`, `fechaCreacion`, `fechaModificacion`, `nombre`, `categoria`) VALUES
(1, '2021-04-21 21:42:54', '2021-04-21 21:42:54', 'Pruebas', 1);

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `fechaCreacion`, `fechaModificacion`, `nombre`) VALUES
(1, '2021-04-21 21:42:54', '2021-04-21 21:42:54', 'Pruebas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaModificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentario` text NOT NULL,
  `rank` int NOT NULL,
  `product` int NOT NULL,
  `ip` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `marca` int NOT NULL,
  `categoria` int NOT NULL,
  `imagen` varchar(100)
);

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `fechaCreacion`, `fechaModificacion`, `nombre`, `descripcion`, `marca`, `categoria`) VALUES
(1, '2021-04-21 21:43:41', '2021-04-22 00:43:41', 'Entrada 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel nunc hendrerit, interdum erat quis, imperdiet sem. Sed in eros eget nulla vehicula volutpat. Suspendisse dictum eu dui quis tincidunt. Integer ut justo felis. Nullam et imperdiet risus. Praesent pharetra ante nec lectus scelerisque, pharetra consequat sapien blandit. Sed tincidunt, nunc eget mollis scelerisque, erat felis pulvinar nulla, nec cursus dui ex sit amet erat. Praesent consectetur ipsum dui, id bibendum sapien sagittis eu. Vestibulum suscipit, magna ornare dignissim tempus, ipsum dui volutpat risus, vel dapibus lacus leo quis odio. Sed id metus quam. Nam sem quam, consectetur et ultricies eget, semper at ante. In non posuere nisl, non sagittis dui. Aliquam tempus molestie porta. Duis tincidunt nisi vitae ligula vehicula, quis sodales turpis pulvinar. Mauris at dolor sit amet lacus ultrices efficitur volutpat et lorem.\r\n\r\nDonec efficitur enim ut neque suscipit ornare in et purus. Suspendisse pharetra nibh nec odio hendrerit accumsan. Nunc ac rhoncus sem. Sed leo eros, rutrum vel magna eget, malesuada fermentum ligula. Aliquam commodo massa non felis fermentum malesuada. Duis elementum dolor ut sapien imperdiet ultricies. Sed a semper dui. Sed ornare lacus odio, et sagittis libero condimentum id. ', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_tags`
--

CREATE TABLE `product_tags` (
  `productId` int NOT NULL,
  `tagId` int NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaModificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(100) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaModificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL
);

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `fechaCreacion`, `fechaModificacion`, `nombre`, `email`) VALUES
(1, '2021-04-14 22:22:02', '2021-04-14 22:22:02', 'Prueba', 'prueba@prueba.com'),
(2, '2021-04-14 22:35:11', '2021-04-15 08:57:09', 'Test2', 'email2@email.com'),
(6, '2021-04-14 22:44:49', '2021-04-14 22:44:49', 'Test', 'email@email.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

  --
-- Indices de la tabla `subCategories`
--
ALTER TABLE `Subcategories`
  ADD PRIMARY KEY (`id`);

  --
-- Indices de la tabla `categories`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products` (`product`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca` (`marca`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `product_tags`
--
ALTER TABLE `product_tags`
  ADD KEY `tagId` (`tagId`),
  ADD KEY `productId` (`productId`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `subCategories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `marca`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`marca`) REFERENCES `marca` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `product_tags`
--
ALTER TABLE `product_tags` 
ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`tagId`) REFERENCES `tags` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

