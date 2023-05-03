DROP DATABASE IF EXISTS `calculadora`;

CREATE DATABASE IF NOT EXISTS `calculadora`
/*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci */
/*!80016 DEFAULT ENCRYPTION='N' */
;

USE `calculadora`;

-- Volcando estructura para tabla calculadora.operaciones
DROP TABLE IF EXISTS `operaciones`;

CREATE TABLE IF NOT EXISTS `operaciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `num_uno` int NOT NULL,
  `num_dos` int NOT NULL,
  `operacion` int NOT NULL,
  `resultado` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish2_ci;

-- Volcando datos para la tabla calculadora.operaciones: ~0 rows (aproximadamente)
DELETE FROM
  `operaciones`;

-- Volcando estructura para tabla calculadora.operadores
DROP TABLE IF EXISTS `operadores`;

CREATE TABLE IF NOT EXISTS `operadores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish2_ci;

-- Volcando datos para la tabla calculadora.operadores: ~4 rows (aproximadamente)
DELETE FROM
  `operadores`;

INSERT INTO
  `operadores` (`id`, `nombre`)
VALUES
  (1, 'SUMA'),
  (2, 'RESTA'),
  (3, 'MULTIPLICACIÓN'),
  (4, 'DIVISIÓN');