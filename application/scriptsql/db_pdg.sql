/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100425
 Source Host           : localhost:3306
 Source Schema         : db_pdg

 Target Server Type    : MySQL
 Target Server Version : 100425
 File Encoding         : 65001

 Date: 10/08/2023 19:19:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `version` bigint NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (20221022154800);

-- ----------------------------
-- Table structure for nu_about
-- ----------------------------
DROP TABLE IF EXISTS `nu_about`;
CREATE TABLE `nu_about`  (
  `aboutId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `aboutTitle` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `aboutDescription` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `aboutModal` int NOT NULL DEFAULT 0,
  `moduleId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioCreacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `usuarioModificacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT current_timestamp,
  `fechaModificacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ipCreacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipModificacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` int NULL DEFAULT 1,
  PRIMARY KEY (`aboutId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nu_about
-- ----------------------------
INSERT INTO `nu_about` VALUES ('12', 'Aqui va un Titulo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus iure laborum inventore quasi, suscipit explicabo! Nisi, quia? Vitae rerum', 1, 'video', '1', '1', '2022-11-17 16:25:15', '2022-11-19 12:41:25', '127.0.0.1', '127.0.0.1', 1);
INSERT INTO `nu_about` VALUES ('14', 'Aqui va otro titulo para el modal', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus iure laborum inventore quasi, suscipit explicabo! Nisi, quia? Vitae rerum id commodi! Incidunt perferendis vel sapiente voluptatem temporibus hic totam sequi?', 1, ' video', '1', NULL, '2022-11-19 12:40:37', NULL, '127.0.0.1', NULL, 1);
INSERT INTO `nu_about` VALUES ('15', 'Titulo sobre Nosotros', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus iure laborum inventore quasi, suscipit explicabo! Nisi, quia? Vitae rerum id commodi! Incidunt perferendis vel sapiente voluptatem temporibus hic totam sequi?', 0, 'video', '1', '1', '2022-11-17 16:26:03', '2022-11-19 12:41:47', '127.0.0.1', '127.0.0.1', 1);
INSERT INTO `nu_about` VALUES ('56', 'Otro Titulo', 'Lorem ipsum dolor quia? Vitae rerum id commodi!', 0, 'video', '1', '1', '2022-11-19 12:44:00', '2022-11-19 12:46:06', '127.0.0.1', '127.0.0.1', 1);

-- ----------------------------
-- Table structure for nu_categorys
-- ----------------------------
DROP TABLE IF EXISTS `nu_categorys`;
CREATE TABLE `nu_categorys`  (
  `categoryId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `categoryName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `categoryDescription` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioCreacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `usuarioModificacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT current_timestamp,
  `fechaModificacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ipCreacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipModificacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` int NULL DEFAULT 1,
  PRIMARY KEY (`categoryId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nu_categorys
-- ----------------------------
INSERT INTO `nu_categorys` VALUES ('desing', 'diseño', 'Esta es la categoría sobre diseño gráfico', '1', '1', '2022-11-10 22:27:11', '2022-11-10 23:27:50', '127.0.0.1', '127.0.0.1', 1);
INSERT INTO `nu_categorys` VALUES ('impresion', 'impresión', 'Impresiones y mucho más', '1', NULL, '2022-11-10 22:27:51', '2022-11-10 22:38:51', '127.0.0.1', NULL, 1);
INSERT INTO `nu_categorys` VALUES ('marketing', 'marketing', 'Marketing Digital y manejo de Redes Sociales', '1', NULL, '2022-11-10 22:28:39', '2022-11-10 22:38:53', '127.0.0.1', NULL, 1);

-- ----------------------------
-- Table structure for nu_config
-- ----------------------------
DROP TABLE IF EXISTS `nu_config`;
CREATE TABLE `nu_config`  (
  `configId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `configName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `configValue` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `configDescription` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioCreacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `usuarioModificacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT current_timestamp,
  `fechaModificacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ipCreacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipModificacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` int NULL DEFAULT 1,
  PRIMARY KEY (`configId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nu_config
-- ----------------------------
INSERT INTO `nu_config` VALUES ('Descp', 'Description', 'SitioWeb de la marca de diseño gráfico cosmo imagine.', 'Descripción del sitioweb', '1', '0', '2022-10-24 14:52:30', NULL, '127.0.0.0', '0.0.0.0', 1);
INSERT INTO `nu_config` VALUES ('Design', 'Design', 'Ruben Lizarazo', 'Nombre del desarrollador en el footer', '1', '0', '2022-10-24 14:52:30', '2023-08-09 13:02:11', '127.0.0.0', '0.0.0.0', 1);
INSERT INTO `nu_config` VALUES ('Dom', 'Dominio', 'www.cosmoimagen.com', 'El dominio del sitio web', '1', '0', '2022-10-24 14:52:30', NULL, '127.0.0.0', '0.0.0.0', 1);
INSERT INTO `nu_config` VALUES ('Emp', 'nombreEmpresa', 'CosmoImagen', 'El nombre de la Empresa', '1', '0', '2022-10-24 14:52:30', NULL, '127.0.0.0', '0.0.0.0', 1);
INSERT INTO `nu_config` VALUES ('ficon', 'favicon', 'fvicon', '', NULL, NULL, '2023-08-09 12:39:41', NULL, NULL, NULL, 1);
INSERT INTO `nu_config` VALUES ('kywds', 'keywords', 'Diseño, gráfico, logos, pendones, impresiones, tachira, rubio, Venezuela', 'Palabras claves para SEO', '1', '0', '2022-10-24 14:52:30', NULL, '127.0.0.0', '0.0.0.0', 1);
INSERT INTO `nu_config` VALUES ('Logo', 'Logo', 'cosmoimagen-logo.png', 'El logo del sitio web o de la empresa', '1', '1', '2022-10-24 14:52:30', '2023-08-09 12:39:46', '127.0.0.0', '127.0.0.1', 1);
INSERT INTO `nu_config` VALUES ('mailEmp', 'emailcontacto', 'contacto@empresa.com', 'Correo del formulario de contacto', '1', '1', '2022-10-24 14:52:30', '2022-11-06 19:12:25', '127.0.0.0', '127.0.0.1', 1);
INSERT INTO `nu_config` VALUES ('Map', 'Mapa', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424.01823977953916!2d-72.36756770237544!3d7.693578184167264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e663e439229c16f%3A0xa0e8d1a10fc2c852!2sRubio%205030%2C%20T%C3%A1chira!5e1!3m2!1ses!', 'url del mapa de googlemaps', '1', '0', '2022-10-24 14:52:29', NULL, '127.0.0.0', '0.0.0.0', 1);
INSERT INTO `nu_config` VALUES ('ptlla', 'plantilla', 'shop/index', 'esta es la plantilla a usar en el welcome', '1', '0', '2023-08-09 08:41:33', '2023-08-09 12:42:48', '127.0.0.0', '0.0.0.0', 1);
INSERT INTO `nu_config` VALUES ('Ttl', 'title', 'Cosmo Imagine - Diseñadora Gráfica', 'Titulo del website', '1', '0', '2022-10-24 14:52:30', NULL, '127.0.0.0', '0.0.0.0', 1);

-- ----------------------------
-- Table structure for nu_modules
-- ----------------------------
DROP TABLE IF EXISTS `nu_modules`;
CREATE TABLE `nu_modules`  (
  `moduleId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `moduleName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `moduleDescription` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioCreacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `usuarioModificacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT current_timestamp,
  `fechaModificacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ipCreacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipModificacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` int NULL DEFAULT 1,
  PRIMARY KEY (`moduleId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nu_modules
-- ----------------------------
INSERT INTO `nu_modules` VALUES ('1', 'social-icons', 'barra de iconos de redes sociales en el siderbar', '1', '43535', '0000-00-00 00:00:00', '2023-06-26 21:48:07', '127.0.0.0', '127.0.0.1', 0);
INSERT INTO `nu_modules` VALUES ('contact', 'Contacta a - Nuestro Equipo', 'lCurabitur hendrerit mauris mollis ipsum vulputate rutrum. Phasellus luctus odio eget dui imperdiet.', '1', '1', '0000-00-00 00:00:00', '2022-11-08 16:21:28', '127.0.0.0', '127.0.0.1', 1);
INSERT INTO `nu_modules` VALUES ('featured', 'Proyectos - Recientes', 'Estos son solo algunos de nuestros proyectos de mayor calidad Puedes darles un vistazo y decidirlo tu mismo.', '1', '1', '0000-00-00 00:00:00', '2022-11-08 20:08:22', '127.0.0.0', '127.0.0.1', 1);
INSERT INTO `nu_modules` VALUES ('projects', 'Servicios - Ofrecidos', 'Aqui tenemos algunos de nuestro proyectos mas recientes, puedes mirarlos y decidir por tu mismo. ¿Cual es tu favorito?', '1', '0', '0000-00-00 00:00:00', '2022-11-06 20:47:14', '127.0.0.0', '000.000.000.000', 1);
INSERT INTO `nu_modules` VALUES ('slider', 'slider', 'modulo del slider de imágenes', '1', '0', '0000-00-00 00:00:00', '2022-11-06 20:47:15', '127.0.0.0', '000.000.000.000', 1);
INSERT INTO `nu_modules` VALUES ('video', 'Cual es el objetivo de nuestra - Compañía', 'Cosmo <em>Imagine</em> te ofrece un servicio de calidad cuando se trata de cumplir las expectativas del cliente en base al tipo de diseño que ha elegido <br> al igual con la eficiencia y creatividad del mismo.', '1', '1', '0000-00-00 00:00:00', '2022-11-08 16:21:49', '127.0.0.0', '127.0.0.1', 1);

-- ----------------------------
-- Table structure for nu_projects
-- ----------------------------
DROP TABLE IF EXISTS `nu_projects`;
CREATE TABLE `nu_projects`  (
  `projectId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `projectImagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `projectTitle` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `projectDescription` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `moduleId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioCreacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `usuarioModificacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT current_timestamp,
  `fechaModificacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ipCreacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipModificacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` int NULL DEFAULT 0,
  PRIMARY KEY (`projectId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nu_projects
-- ----------------------------
INSERT INTO `nu_projects` VALUES ('pro1', 'featured_1.jpg', 'Aqui va un titulo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus iure laborum inventore quasi, suscipit explicabo! Nisi, quia? ', 'featured', '1', '1', '2022-11-10 10:19:33', '2022-11-19 12:49:55', '127.0.0.1', '127.0.0.1', 1);
INSERT INTO `nu_projects` VALUES ('pro2', 'featured_2.jpg', 'Aqui va un titulo 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. totam sequi?', 'featured', '1', '1', '2022-11-10 10:21:21', '2022-11-19 12:50:24', '127.0.0.1', '127.0.0.1', 1);
INSERT INTO `nu_projects` VALUES ('pro3', 'featured_3.jpg', 'Aqui va el titulo 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus iure laborum inventore quasi, suscipit explicabo! Nisi, quia? Vitae rerum id commodi! Incidunt perferendis vel sapiente voluptatem temporibus hic totam sequi?', 'featured', '1', '1', '2022-11-10 10:22:37', '2022-11-19 12:49:02', '127.0.0.1', '127.0.0.1', 1);

-- ----------------------------
-- Table structure for nu_rols
-- ----------------------------
DROP TABLE IF EXISTS `nu_rols`;
CREATE TABLE `nu_rols`  (
  `rolId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rolName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rolDescription` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioCreacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `usuarioModificacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT current_timestamp,
  `fechaModificacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ipCreacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipModificacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` int NULL DEFAULT 1,
  PRIMARY KEY (`rolId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nu_rols
-- ----------------------------
INSERT INTO `nu_rols` VALUES ('1', 'Administrador (super usuario)', 'Administrador del sitio con permisos de Super Usuario', NULL, '1', '2022-11-08 16:32:24', '2022-11-12 02:40:26', NULL, '127.0.0.1', 1);
INSERT INTO `nu_rols` VALUES ('2', 'Administrador', 'Administrador con permisos limitados', '1', NULL, '2022-11-12 02:40:53', NULL, '127.0.0.1', NULL, 1);

-- ----------------------------
-- Table structure for nu_services
-- ----------------------------
DROP TABLE IF EXISTS `nu_services`;
CREATE TABLE `nu_services`  (
  `serviceId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `serviceTitle` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `serviceImagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `servicePrice` double(20, 2) NULL DEFAULT NULL,
  `serviceDescription` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `categoryId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `moduleId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioCreacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `usuarioModificacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT current_timestamp,
  `fechaModificacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ipCreacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipModificacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` int NULL DEFAULT 0,
  PRIMARY KEY (`serviceId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nu_services
-- ----------------------------
INSERT INTO `nu_services` VALUES ('01', 'Diseño de Logo', 'portfolio_1.jpg', 12.00, 'Diseño de logo para tu marca o producto', 'desing', 'projects', '1', NULL, '2022-11-12 01:01:32', NULL, '127.0.0.1', NULL, 1);
INSERT INTO `nu_services` VALUES ('02', 'Diseño de Flayers', 'portfolio_big_6.jpg', 13.00, 'Diseñamos los mejores y más llamativos Flayers.', 'desing', 'projects', '1', '1', '2022-11-12 00:56:06', '2022-11-12 02:15:46', '127.0.0.1', '127.0.0.1', 1);
INSERT INTO `nu_services` VALUES ('03', 'Impresión de Pendones', 'portfolio_big_3.jpg', 29.00, '  This text is quite long, and will be truncated once displayed sdgffdsg gtfthgfhfg dsfgfdg fgfdgdfgsd dsfsd.', 'impresion', 'projects', '1', NULL, '2022-11-12 01:04:18', NULL, '127.0.0.1', NULL, 1);
INSERT INTO `nu_services` VALUES ('04', 'Marketing Digital', 'portfolio_big_4.jpg', 20.00, 'This text is quite long, and will be truncated once displayed sdgffdsg gtfthgfhfg dsfgfdg fgfdgdfgsd dsfsd.', 'marketing', 'projects', '1', NULL, '2022-11-12 01:05:56', NULL, '127.0.0.1', NULL, 1);
INSERT INTO `nu_services` VALUES ('05', 'Impresión de publicidad', 'portfolio_big_5.jpg', 10.00, 'Impresión de flayers, afiches, panfletos, volantes y más', 'impresion', 'projects', '1', NULL, '2022-11-12 01:27:30', NULL, '127.0.0.1', NULL, 1);

-- ----------------------------
-- Table structure for nu_slider
-- ----------------------------
DROP TABLE IF EXISTS `nu_slider`;
CREATE TABLE `nu_slider`  (
  `sliderId` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `sliderImagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sliderTitle` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SliderText` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `moduleId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioCreacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioModificacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fechaCreacion` timestamp NULL DEFAULT current_timestamp,
  `fechaModificacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ipCreacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ipModificacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`sliderId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nu_slider
-- ----------------------------
INSERT INTO `nu_slider` VALUES (6, 'slide_1.jpg', 'Bienvenido a - Cosmo Imagine', 'Contamos con una gran variedad de Banner y Proyectos gráficos a tu disposición.', 'slider', '1', '', '2022-11-09 19:40:01', '2022-11-09 20:14:56', '127.0.0.1', '', 1);
INSERT INTO `nu_slider` VALUES (7, 'slide_2.jpg', 'Invita - a tus Amigos', 'Nunca sabes cuando necesites un banner, Gracias por elegirnos', 'slider', '1', '', '2022-11-09 19:42:13', NULL, '127.0.0.1', '', 1);
INSERT INTO `nu_slider` VALUES (8, 'slide_3.jpg', 'Aqui en - Cosmo Imagine', 'Nos especializamos en diseño gráfico y creación de Banners. Si tú lo necesitas ¡Nosotros lo tenemos!', 'slider', '1', '1', '2022-11-09 19:45:00', '2022-11-10 00:01:00', '127.0.0.1', '127.0.0.1', 1);

-- ----------------------------
-- Table structure for nu_social
-- ----------------------------
DROP TABLE IF EXISTS `nu_social`;
CREATE TABLE `nu_social`  (
  `socialId` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `socialName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `socialDescription` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `socialIcon` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `socialUrl` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `moduleId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioCreacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `usuarioModificacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT current_timestamp,
  `fechaModificacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ipCreacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipModificacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` int NULL DEFAULT 1,
  PRIMARY KEY (`socialId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nu_social
-- ----------------------------
INSERT INTO `nu_social` VALUES ('1', 'Facebook', 'link de Facebook', 'fa-facebook', 'httmp://facebook.com', '1', '1', '43535', '0000-00-00 00:00:00', '2023-06-26 21:47:04', '127.0.0.0', '127.0.0.1', 1);
INSERT INTO `nu_social` VALUES ('2', 'Instagram', 'link de Instagram', 'fa-instagram', 'http://instagram.com', '1', '1', '43535', '0000-00-00 00:00:00', '2023-06-26 21:47:04', '127.0.0.0', '127.0.0.1', 1);
INSERT INTO `nu_social` VALUES ('3', 'Youtube', 'link de Youtube', 'fa-youtube', 'http://youtube.com', '1', '1', '43535', '0000-00-00 00:00:00', '2023-06-26 21:47:04', '127.0.0.0', '127.0.0.1', 1);
INSERT INTO `nu_social` VALUES ('4', 'Linkedin', 'link de Linkedin', 'fa-linkedin', 'http://linkedin.com', '1', '1', '43535', '0000-00-00 00:00:00', '2023-06-26 21:47:04', '127.0.0.0', '127.0.0.1', 0);
INSERT INTO `nu_social` VALUES ('5', 'Twitter', 'link de Twitter', 'fa-twitter', 'http://twitter.com', '1', '1', '43535', '0000-00-00 00:00:00', '2023-06-26 21:47:04', '127.0.0.0', '127.0.0.1', 1);
INSERT INTO `nu_social` VALUES ('6', 'Rss', 'link de Rss', 'fa-rss', 'http://rss.com', '1', '1', '43535', '0000-00-00 00:00:00', '2023-06-26 21:47:04', '127.0.0.0', '127.0.0.1', 1);

-- ----------------------------
-- Table structure for nu_users
-- ----------------------------
DROP TABLE IF EXISTS `nu_users`;
CREATE TABLE `nu_users`  (
  `userId` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `userName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rolId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioCreacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `usuarioModificacion` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT current_timestamp,
  `fechaModificacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ipCreacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipModificacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activo` int NULL DEFAULT 1,
  PRIMARY KEY (`userId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nu_users
-- ----------------------------
INSERT INTO `nu_users` VALUES ('1', 'Administrador', '123456', 'admin@pdg.com', '1', NULL, '1', '2022-10-24 14:52:30', '2022-11-07 01:57:50', NULL, '127.0.0.1', 1);
INSERT INTO `nu_users` VALUES ('43535', 'admin2', '12345', 'admin2@pdg.com', '2', '1', NULL, '2022-11-12 02:41:50', NULL, '127.0.0.1', NULL, 1);

SET FOREIGN_KEY_CHECKS = 1;
