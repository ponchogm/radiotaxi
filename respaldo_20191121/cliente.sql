-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2019 a las 20:44:52
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `radiotaxi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ClienteCodigo` int(11) NOT NULL,
  `ClienteRut` varchar(12) NOT NULL,
  `ClienteNombres` varchar(50) DEFAULT NULL,
  `ClienteApellidoPat` varchar(50) DEFAULT NULL,
  `ClienteApellidoMat` varchar(50) DEFAULT NULL,
  `ClienteDireccion` varchar(200) DEFAULT NULL,
  `ClienteFonoCasa` varchar(50) DEFAULT NULL,
  `ClienteFonoTrabajo` varchar(50) DEFAULT NULL,
  `ClienteFonoCelular` varchar(20) DEFAULT NULL,
  `ComunaCodigo` int(11) DEFAULT '0',
  `ClienteFecNac` varchar(10) DEFAULT NULL,
  `ClienteEmail` varchar(50) DEFAULT NULL,
  `ClienteTipoCodigo` int(11) DEFAULT '1',
  `ClienteEmpRLRut` varchar(12) DEFAULT NULL,
  `ClienteEmpRLNombres` varchar(200) DEFAULT NULL,
  `ClienteEmpRLDireccion` varchar(50) DEFAULT NULL,
  `ClienteEmpRLFono` varchar(50) DEFAULT NULL,
  `ClienteEmpRLCelular` varchar(50) DEFAULT NULL,
  `ClienteEmpRLEmail` varchar(50) DEFAULT NULL,
  `ClienteClave` varchar(10) DEFAULT '123456',
  `ClienteNumero` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ClienteCodigo`, `ClienteRut`, `ClienteNombres`, `ClienteApellidoPat`, `ClienteApellidoMat`, `ClienteDireccion`, `ClienteFonoCasa`, `ClienteFonoTrabajo`, `ClienteFonoCelular`, `ComunaCodigo`, `ClienteFecNac`, `ClienteEmail`, `ClienteTipoCodigo`, `ClienteEmpRLRut`, `ClienteEmpRLNombres`, `ClienteEmpRLDireccion`, `ClienteEmpRLFono`, `ClienteEmpRLCelular`, `ClienteEmpRLEmail`, `ClienteClave`, `ClienteNumero`) VALUES
(121, '06289330-3', 'Rene Alberto', 'Abuhadba', 'Fernandez', 'Av. Valle Escondido Nº 4540 Depto. 104 Edificio el Quillay II', '3215008', '2323232323', '989122008', 296, '01/01/1970', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 41),
(130, '06690685-k', 'Soledad', 'Donoso', 'Schroeder', 'Lomas de la Dehesa Nº 9956', '2161120', '', '', 296, '01/01/1970', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 58),
(128, '08321818-5', 'Maria Loreto', 'Magallon', 'Quezada', 'P.LIRA URQUIETA 10663', '2434218', '2064300', '', 296, '01/01/1970', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 47),
(105, '09450721-9', 'Gloria', 'Romero', 'Galarce', 'Cerro Punta de Damas Nº 12404', '2418070', '', '', 296, '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 77),
(102, '09497691-K', 'Marlen', 'Marin', '', 'CNO. LAS BRISAS Nº 14598 - B', '3254356', '', '', 296, '01/01/1970', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 74),
(136, '09775843-3', 'RONNY', 'N', 'N', 'La Cienaga Nº 12359', '2435801', '', '', 296, '01/01/1970', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 40),
(141, '10293510-1', 'Comasa', '(Administracion)', '', 'AV.LA DEHESA 2450', '9552850', '9552850', '0', 294, '21/02/1961', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 8),
(3200, '07362648-K', 'Soraya', 'Nazal', 'Ahuile', 'Huinganal 3556-L -12', '2459320', '09-4444293', '0', 296, '0', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 32),
(3234, '08354225-K', 'Humberto', 'Mandujano', 'Reygadas', 'Parque 12701 Casa 12', '9541714', '', '90163259', 296, '25/03/1965', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 53),
(3237, '77777460-3', 'Julia Rojas Villagran', NULL, NULL, 'Av.Viel 1344', '5550021', '0', NULL, 309, NULL, NULL, 3, '15465310-4', 'Cristina Verdugo', 'L.D.L.Dehesa', '5550021', '0', '0', '123456', 15),
(3270, '06068879-6', 'Manuel', 'Bengolea', 'Chadurik', 'Cno Del Chin 3640', '29434300', '81886582', '81886583', 296, '0', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 20),
(3272, '14261850-8', 'Claudia', 'Sabala', 'Amaya', 'Manuel Guzman 1500 Casa 1', '22156854', '96472468', '', 296, '25/03/1970', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 22),
(3274, '97006000-6', 'Comasa ( Infiniti )', NULL, NULL, 'No registrada', '1', '1', NULL, 296, NULL, '', 3, '5', 'Rosita Cabrera', 'N', 'N', '0', '0', '123456', 6),
(3293, '07014780-7', 'Mónica', 'Becerra', 'Salinas', 'Huinganal 3555 12A', '0', '0', '999199919', 296, '17/03/2016', 'wemanagesocial@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 14),
(71, '1-1', 'Alberto', 'Espina', '', 'La Colina N° 3277', '2160515', '', '', 296, '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 16),
(84, '14448804-0', 'Graciela', 'Waingortin', '', 'El Gabino NÂº 13375', '4188820', '', '09-2377246', 296, '01/01/1970', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 61),
(75, '1-5', 'Alberto', 'Velasco', NULL, 'Lomas de la Dehesa NÂ° 10507', '2165273', NULL, NULL, 296, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 50),
(20, '1-9', 'Anonimo', NULL, NULL, NULL, NULL, NULL, NULL, 296, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 0),
(65, '4898814-8', 'Eugenio', 'Guzman', 'Espinosa', 'Paseo Alcala NÂº 11098', '2434991', '', '', 296, '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 21),
(53, '6167718-6', 'Enrique', 'yusari', '', 'Pedro L. Urquieta NÂº 10844', '2165617', '', '', 296, '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 44),
(90, '6972089-7', 'Jaime Andres', 'Bonilla', '', 'Cno. del Membrillar NÂº 13371', '2423237', '2423237', '', 296, '01/01/1970', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 65),
(140, '76957400-K', 'TEST DRIVE SK BERGE', NULL, NULL, 'AV.LA DEHESA 1993', '08-8880849', '', NULL, 291, NULL, NULL, 3, '', 'PABLO ARZE SPIDER', '', '00', '0', '', '123456', 9),
(42, '77579660-K', 'Pte Nuevo', NULL, NULL, 'Av. Las Condes NÂº 12916', '3959242', '', NULL, 303, NULL, NULL, 3, '', '', '', '3959242', '', '', '123456', 28),
(81, '78712020-2', 'DiseÃ±o Alquimia ', NULL, NULL, 'Las Catalpas NÂº 1522', '3741757', '', NULL, 300, NULL, NULL, 3, '', 'Marina Sepulveda Sierra', 'Comandante Malbec NÂº 13440', '3741757', '', '', '123456', 52),
(89, '79945560-9', 'GGE CONSULTORES LTDA.', NULL, NULL, 'Burgos NÂº 80 Oficina 902', '2630975', '2630972', NULL, 303, NULL, NULL, 3, '', 'GermÃ¡n Guerrero Espinoza', 'Burgos NÂº 80 Oficina 902', '2630975', '', '', '123456', 64),
(83, '8861570-0', 'Jose', 'Blanco', '', 'Cno. El Yunque NÂº 14021', '2423030', '', '', 296, '01/01/1970', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 60),
(36, '96564320-6', 'Federic y Cia. S.A.', NULL, NULL, 'Alonso De Cordova NÂº 2700 Of. 24', '2633517', '', NULL, 300, NULL, NULL, 3, '', 'Raul Federic', 'Aguas Claras NÂº 220 Depto. 51', '2633517', '', '', '123456', 17),
(49, '96600200-K', 'Antullape Inversiones S.A.', NULL, NULL, 'Carmencita NÂº 25 Of. 81', '2167236', '', NULL, 303, NULL, NULL, 3, '6297613-1', 'Jaqueline Toha', 'Estero De Las Rosas NÂº 13168', '2167236', '', '', '123456', 37),
(43, '96625480-7', 'Lider ', NULL, NULL, 'Av. El Rodeo NÂº 12850', '2168283', '', NULL, 296, NULL, NULL, 3, '', '', '', '2168283', '', '', '123456', 29),
(33, '96928530-4', 'Comasa( Servicio)', NULL, NULL, 'Americo Vespucio NÂº 1601', '4286400', '', NULL, 294, NULL, NULL, 3, '', '', '', '4286400', '', '', '123456', 10),
(134, '96934560-9', ' Comasa (Ventas)', NULL, NULL, 'Americo Vespucio NÂº 1601', '4286400', '', NULL, 294, NULL, NULL, 3, '', '', '', '4286400', '', '', '123456', 11),
(3241, '09493231-9', 'Andrea', 'Del Sante', 'Lira', 'Paseo Alcala 11578', '2425104', '0', '99976711', 296, '11/03/1965', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 26),
(3248, '07776769-k', 'Sara', 'Mora', 'Miranda', 'Cno Del Sol 3325-31 B', '2168747', '0', '0', 296, '0', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 33),
(3257, '05081518-8', 'Alfonso', 'Canales', 'Undurraga', 'La MaÃ±ana 2198', '2153987', '', '', 291, '03/11/1965', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 5),
(3259, '77779060-9', 'Florence', 'Gazabatt', '', 'Berna 4751 Casa J ', '98721356', '0', '0', 291, '0', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 45),
(3261, '12892288-1', 'Lorraine', 'Gibbons', '', 'Padre Ted Huard 4299 Casa 12 T  3', '0', '2458130', '92390569', 296, '24/03/1965', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 54),
(3273, '10783975-5', 'Hans', 'Erpez', 'Lizana', 'Huinganal 3585 Dto E 31', '9.2192873', '0', '', 296, '0', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 87),
(3285, '08632440-7', 'Claudio', 'Ricke', 'Sieemund', 'Fdez Vial 10340 Casa', '22459961', '0', '0', 296, '1965', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 23),
(3287, '08621637-K', 'Francisca', 'Alamos', 'Eyzaguirre', 'Fray Leon 12615 Casa C', '93268166', '0', '0', 303, '25/03/1965', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 56),
(3294, '08868963-1', 'Pedro', 'Guglielmetti', 'Guglielmetti', 'El Huinganal 2315', '982938691', '0', '0', 296, '17/03/2016', 'argmoulas@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 55),
(3188, '71277500-9', 'Comunidad Israelita', NULL, NULL, 'Av. Las Condes 13450', '2405000', '0', NULL, 303, NULL, NULL, 3, '71277500-9', 'Roberto SantibaÃ±ez', 'Av.Las Condes 13450', '2405000', '0', '0', '123456', 69),
(3193, '09094204-2', 'PAZ', 'DOMINGUEZ', 'RIVERA', 'EL FALDEO 4041', '2458693', '', '9-7891301', 296, '24/03/1965', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 78),
(3196, '52003145-6', 'Ronny Willekens', NULL, NULL, 'Sta Teresa 9494 Dto 504', '0', '0', NULL, 296, NULL, NULL, 3, '12092045-6', 'Frederric', 'Sta Teresa 9494 Dto 504', '0', '', '', '123456', 85),
(3202, '07220305-4', 'Pauli', 'Weber', '', 'La Quebrada 14310', '2425233', '0', '98247356', 303, '01/01/1970', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 88),
(3216, '05866557-6', 'Claudio', 'Villarino', 'Achondo', 'Aguas 170-Dto 61', '2156738', '0', '0', 296, '25/03/1965', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 57),
(3218, '12222658-1', 'Carolina', 'Sciaccaluga', 'Schultz', 'Cno.Turistico11820.Dto.403.B', '7932852', '0', '8-1588528', 296, '0', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 63),
(3219, '07625861-9', 'Nancy', 'Goldstein', 'Avdaloff', 'Av- Valle Del Monasterio2298 Torre 12 A Dto 601', '9555107', '0', '9.8377936', 296, '0', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 71),
(3251, '14603507-8', 'Gabriela', 'Clivio', 'Stifano', 'Huinganal 3577 Casa 4', '9.3499022', '0', '0', 296, '03/03/1965', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 92),
(3276, '76025544-0', 'Gestion De Talentos', NULL, NULL, 'Cerro De La Cruz 10460 Casa C', '29551648', '0', NULL, 296, NULL, NULL, 3, '10937382-7', 'Raquel Michelow', 'Cerro De La Cuz 10460', '29551648', '0', '0', '123456', 100),
(3289, '04255530-4', 'Jose', 'Conder', 'Chijner', 'Alonso De Cordova 2600 Of.22', '0', '0', '0', 300, '11/03/1965', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 70),
(3292, '14621556-4', 'Viviana', 'Garcia', 'Ramos', 'Los CastaÃ±os 1656 casa 17', '0', '0', '988185611', 296, '14/03/2016', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 27),
(3230, '87845500-2', 'Saitec S.A', NULL, NULL, 'Avda.Del Valle 787 Piso 2', '4848219', '4848248', NULL, 295, NULL, NULL, 3, '9838087-6', 'Carolina', 'Avda.del Valle787 Piso 2', '4848219', '0', '', '123456', 51),
(3232, '10354902-7', 'Karen', 'Doggenweyler', 'Lapuente', 'El Rodeo 13183', '3560101', '0', '0', 296, '24/05/0965', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 59),
(3244, '71614000-8', 'ESE', NULL, NULL, 'Av. La Plaza 1905', '4129540', '0', NULL, 303, NULL, NULL, 3, '', '0', '0', '0', '0', '0', '123456', 3),
(3258, '76040171-4', 'Skberge Logistica SA', NULL, NULL, 'Av. La Dehesa 1201 OF.312', '9552850', '0', NULL, 296, NULL, NULL, 3, '0', '0', '0', '0', '0', '0', '123456', 7),
(3260, '19567115-K', 'Diego', 'Garil', '', 'Cerro El Altar 11295', '2424160', '0', '0', 296, '0', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 46),
(3283, '09908110-4', 'Stefano', 'Dalbora', '', 'Camino Del Chin 3776 K', '84282561', '0', '0', 296, '11/03/1965', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 48),
(3291, '76178493-5', 'Porsche Inter Auto Chile S.A', NULL, NULL, 'Raul Labbe 12509', '26787770', '0', NULL, 296, NULL, NULL, 3, '0', 'Cludia Lazcano', '0', '0', '0', '0', '123456', 2),
(3295, '20805999-8', 'Claudia ', 'Astete', '', 'Valle Monasterio 2480 Depto. 206', '962187250', '', '962187250', 296, '01/04/2016', 'asteteclaudia@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 39),
(3296, '12659181-0', 'Marcela', 'Babul ', 'Karmy', 'Los Juglares 3880, casa 30', '0', '0', '94448490', 296, '25/07/2016', 'marcela.babul@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 75),
(3297, '76145786-1', 'Lider La Plaza', NULL, NULL, 'Av. La Plaza 540', '0', '0', NULL, 303, NULL, NULL, 3, 'N', 'N', 'N', '0', '0', '0', '123456', 30),
(3299, '07554704-8', 'Carolina', 'Scipioni', '', 'Teresa Vial 4275-25', '0', '0', '0', 296, '0', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 90),
(3300, '76069757-5', 'Lider Estoril', NULL, NULL, 'Av.Las Condes 10295', '0', '0', NULL, 303, NULL, NULL, 3, '0', 'Eduardo Del Solar', 'Av. Las Condes 10295', '0', '', '0', '123456', 31),
(3302, '14171304-3', 'Radisson', NULL, NULL, 'C.Malbes 12851', '229374100', 'O', NULL, 296, NULL, NULL, 3, 'O', 'Victor Bueno', 'C. malbbes 12851', 'O', 'O', 'o', '123456', 13),
(3303, '76600177-7', 'L.D.C.Group. Spa', NULL, NULL, 'Av.La Dehesa 181 Of.211', '9-68397202', '0', NULL, 296, NULL, NULL, 3, '13.253.408-k', 'Leandro Diaz Herrera', '0', '0', '0', '0', '123456', 67),
(3306, '13068109-3', 'SEBASTIAN', 'TERRAZAS', 'R', 'GOL LOMAS DE  LA DEHESA 9385', '9922567721', '0', '0', 296, '03/03/1965', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 4),
(3307, '96929460-5', 'FERRARY', NULL, NULL, 'ALCALDE DELANO', '228371640', '0', NULL, 296, NULL, NULL, 3, '14169993-8', 'PATRICIO ABUSLEME', 'A', '0', '0', '0', '123456', 12),
(3308, '96550520-2', 'IN.Y CONTRUCIONES C.Y.I.S.A', NULL, NULL, 'Av.Marchan Pereira 221 Of 31', '0', '0', NULL, 296, NULL, NULL, 3, '17642117-7', 'Judith Troncoso Gonzales', 'Marchan Pereira', '0', '0', '0', '123456', 18),
(3309, '10528336-9', 'Luis', 'Chadwick', '', 'Av.Parque Golf 10620.Casa 209', '0', '0', '0', 296, '11/03/2016', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 19),
(3310, '09838087-6', 'ANDRES', 'N', '', 'LAS PATAGUAS', '0', '0', '0', 296, '03/11/1965', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 24),
(3311, '76072304-5', 'SHOPPING', 'LA', 'DEHESA', 'RAUL LABBE', '222425498', '222169451', '', 296, '03/03/1965', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 25),
(3312, '76418693-1', 'VOLKSWAGEN', NULL, NULL, 'RAUL  LABBE', '0', '0', NULL, 296, NULL, NULL, 3, '12570431-K', 'MARIO', 'RAUL LABBE', '0', '0', '0', '123456', 72),
(3313, '26702981-4', 'Warren', 'Colgan', '', 'C.P.De Damas 12195', '934155172', '0', '0', 296, '11/03/1965', '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 1),
(3319, '11837242-5', 'Luis Alfonso', 'García', 'Manzo', 'Pasaje Ferreira 4315 casa C', '222216669', '2323232323', '989122008', 318, '25/06/1971', 'ponchogm@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 500),
(3320, '60995678-4', 'Medis S.A.', NULL, NULL, 'Avenida Providencia 554', '223446578', NULL, NULL, 306, NULL, 'medis@medis.cl', 3, '12345654-6', 'Lucas Rojas Gonzalez', NULL, NULL, NULL, NULL, '123456', 678),
(3321, '9705234-4', 'Claudia Estrella', 'Ramírez', 'Campillo', 'Suarez Mujica 2188-A', '', '223445678', '993572352', 310, '13/10/1966', 'clauestrella@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 665);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ClienteRut`),
  ADD KEY `ClienteClave` (`ClienteClave`),
  ADD KEY `ClienteCodigo` (`ClienteCodigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ClienteCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3323;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
