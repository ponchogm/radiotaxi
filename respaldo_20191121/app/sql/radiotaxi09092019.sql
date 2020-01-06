-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2019 a las 18:28:21
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.1.29

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
-- Estructura de tabla para la tabla `chofer`
--

CREATE TABLE `chofer` (
  `ChoferRut` varchar(12) NOT NULL,
  `ChoferNombres` varchar(50) DEFAULT NULL,
  `ChoferApellidoPat` varchar(50) DEFAULT NULL,
  `ChoferApellidoMat` varchar(50) DEFAULT NULL,
  `ChoferDireccion` varchar(200) DEFAULT NULL,
  `ChoferFono` varchar(50) DEFAULT NULL,
  `ChoferCelular` varchar(20) DEFAULT NULL,
  `ComunaCodigo` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chofer`
--

INSERT INTO `chofer` (`ChoferRut`, `ChoferNombres`, `ChoferApellidoPat`, `ChoferApellidoMat`, `ChoferDireccion`, `ChoferFono`, `ChoferCelular`, `ComunaCodigo`) VALUES
('07195592-3', 'PATRICIO', 'NORAMBUENA', 'JARA', 'DEL ROCIO NÂº 54', '6034551', '989122007', 294),
('10054470-9', 'JAVIER', 'COFRE', 'CASTRO', 'CIRC. SUR #916-D', '2161132', '989122008', 296),
('10293510-1', 'PABLO', 'CONTRERAS', 'TAPIA', 'SENDA 2 NORTE # 1104-C', '2160681', '989122008', 296),
('10403298-2', 'JUAN CARLOS', 'BEROIZA', 'FIGUEROA', 'P. ALFREDO ARTAGA # 1177', '2459316', '', 296),
('10457086-0', 'SERGIO', 'VALDIVIA', 'CARREÃ‘O', 'POZO ALMONTE NÂº 8940', '2116359', '', 303),
('10560258-8', 'CRISTIAN', 'SAN MARTIN', 'REYES', 'PADRE HURTADO SUR # 1176', '2161381', '09-6583377', 296),
('10882388-7', 'NELSON', 'PONCE', 'ROJAS', 'PJE. EL ESFUERZO # 13-B', '3717984', '', 296),
('10972268-5', 'MICHAEL', 'RIVEROS', 'MARTINEZ', 'N', '0', '', 291),
('11209936-0', 'CARLOS EDUARDO', 'JIMENES ', 'BUSTOS', 'JUAN PABRO PJE EL KIUI', '3711215', '08-4858584', 296),
('11263189-5', 'RICARDO', 'CAMPOS', 'MARDONES', 'P. ALFREDO ARTEAGA # 1021', '2168778', '', 296),
('11654056-8', 'OSVALDO', 'SUAREZ', 'REYES', 'PJE. 19 BLOCK 8759 D-31', '2161381', '09-7366337', 296),
('11866302-0', 'MAURICIO', 'ACEVEDO', 'ACEVEDO', 'LOS PATOS # 13777', '2164721', '', 296),
('12498531-5', 'RODRIGO', 'SUAREZ', 'REYES', 'LAGO YULTON # 1151', '2785434', '', 319),
('12663196-0', 'PEDRO', 'ROMERO', 'ARELLANO', 'SAN JUAN EVANGELISTA # 311', '2169119', '', 296),
('12666039-1', 'RAUL', 'CORTEZ', 'GOMEZ', 'RAUL LABBE # 330', '2161381', '09-6928302', 296),
('13272894-1', 'GERMAN ANDRES', 'LIZANA', 'CHEUQUEL', 'N', '0', '', 291),
('13690383-7', 'JUAN', 'MADRID', 'VICENCIO', 'RAUL LABBE # 37', '2161381', '09-4250000', 296),
('13952154-4', 'JUAN CARLOS', 'OPAZO', 'ARAVENA', 'Barnechea NÂº 538', '09-0904623', '09-0904623', 296),
('14178068-9', 'HECTOR', 'GUZMAN', 'BERRIOS', 'N', '0', '', 296),
('14254594-2', 'EDDIE WILLIAM', 'CASTRO', 'LATORRE', 'CIRC. SUR # 924-D', '2160496', '09-7174484', 296),
('14640318-2', 'VICTOR', 'ALDERETE', 'GONZALEZ', 'PASEO HERMITA # 13832', '2157882', '', 296),
('15474454-1', 'MARIO', 'VENEGAS', 'ATABALES', 'LASTRA #60', '2458875', '', 296),
('17101335-6', 'JOSE GUILLERMO', 'JIMENEZ', 'ANTINAO', 'EMAUS 13686', '2151706', '07.7533877', 296),
('3426220-9', 'SAMUEL', 'BERRIOS', 'BERRIOS', 'LAS RIENDAS # 1935', '2168513', '', 296),
('5525735-3', 'SERGIO', 'CONTRERAS', 'TAPIA', 'PAN. NORTE BLOCK 1701 ED. 20 D-11', '4430881', '', 296),
('6063193-K', 'PATRICIO', 'MADRID', 'SANTIBAÃ‘ES', 'LOS ARENEROS # 46-C', '2161648', '', 296),
('6063258-8', 'PEDRO', 'GALVEZ', 'MOLINA', 'RAUL LABBE # 66-A', '2423083', '', 296),
('6090518-5', 'SIGI ALFREDO', 'CONCHA', 'POBLETE', 'SANTO TOMAS # 13323', '2163960', '', 296),
('7077653-7', 'DANIEL', 'VALENCIA', 'VALDES', 'LASTRA # 283', '2168432', '', 296),
('7106028-4', 'JUAN', 'PONCE', 'CARMONA', 'PASEO HERMITA # 14200', '2170832', '', 296),
('7418854-0', 'MIGUEL', 'CORTES', 'VEGA', 'MÂª ROMAN GUERRERO # 13288', '2166969', '', 296),
('7811560-2', 'PATRICIO', 'MUÃ‘OZ', 'SOTO', 'CIRC. UNO SUR # 797-B', '2162810', '', 296),
('7849657-6', 'JUAN ALFREDO', 'BARRIOS', 'JOFRE', 'PJE. 4 #1028 VILLA NEBRAKCA', '2459084', '', 296),
('7895999-1', 'JUAN CARLOS', 'CARCAMO', 'CONTRERAS', 'CALLE 2 NORTE SENDA 8 # 1008-D', '2165325', '', 296),
('8605007-2', 'RAFAEL', 'GONZALEZ', 'RIVEROS', 'AV. BARNECHEA # 1559', '2161381', '09-8609681', 296),
('9117296-8', 'MARIO', 'VILLALOBOS', 'GONZALEZ', 'AV. BARNECHEA # 1559', '2161381', '09-7079721', 296),
('14175676-1', 'Daniel', 'Jara ', 'Norambuena', 'n', 'N', 'N', 291),
('12892729-8', 'CRISTIAN ', 'OLLANEDEL', 'MATURANA', 'PJE.LA RIENDA 1940', '0', '0', 291),
('13442166-5', 'Marcelo', 'Ezaguirre', 'Sanhuzsa', 'Av.Lo Barnechea 1594 Dto 411', '0', '95675040', 296),
('06844107-2', 'Juan', 'Olavarria', 'Barria', '0', '0', '0', 296),
('15484702-2', 'MARCELL ALEIN', 'LE-FEUVRE', 'MIRANDA', 'PASAJE OLGA 9304-102', '0', '71714718', 303),
('9803117-0', 'NELSON', 'GODOY', 'NAVIA', 'LOS VILOS # 1266', '2112656', '', 303),
('9838087-6', 'LUIS', 'LEON', 'GALLARDO', 'AV. BARNECHEA # 1559', '2162823', '', 296),
('10513967-5', 'Gabriel Moises', 'Aqueveque', 'Valenzuela', 'Quinchamali 14184', '0', '094967426', 296),
('21892758-0', 'Jorge Luis', 'Espinola ', 'Quipusco', 'N', '0', '0', 296),
('12029030-4', 'Diego Antonio', 'Maturana', 'Guerra', 'Lastra 14033 Dpto. C23', '2164589', '91298968', 296),
('09418725-7', 'Luis Armando', 'Sepulveda', 'Cartes', 'Joss', '0', '9.7191736', 296),
('07190628-0', 'MANUEL', 'Fernandez', 'Torres', 'n', '0', '0', 320),
('06978197-7', 'Arturo', 'Valdivieso', 'NuÃ±es', 'San miguel 1583', '0', '0', 291),
('10647333-1', 'Carlos', 'JaÃ±es', 'CHAMORRO', 'BATUCO', '0', '93133152', 296),
('12732205-8', 'patricio ', 'gonzalez', '000', 'nueva uno 1507', '0', '54687346', 291),
('12732202-3', 'MOISES ARCANGEL', 'GONZALES ', 'GUZMAN', 'COLON 1265', '0', '57685213', 291),
('11837242-5', 'Luis Alfonso', 'García', 'Manzo', 'Pasaje Ferreira 4315 casa C', '222218939', '989122008', 318);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `ComunaNombre` varchar(50) DEFAULT NULL,
  `ComunaCodigo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`ComunaNombre`, `ComunaCodigo`) VALUES
('TILTIL', 291),
('COLINA', 292),
('LAMPA', 293),
('QUILICURA', 294),
('HUECHURABA', 295),
('LO BARNECHEA', 296),
('PUDAHUEL', 297),
('RENCA', 298),
('CONCHALI', 299),
('VITACURA', 300),
('INDEPENDENCIA', 301),
('RECOLETA', 302),
('LAS CONDES', 303),
('CERRO NAVIA', 304),
('QUINTA NORMAL', 305),
('PROVIDENCIA', 306),
('LO PRADO', 307),
('ESTACION CENTRAL', 308),
('SANTIAGO', 309),
('ÑUÑOA', 310),
('LA REINA', 311),
('MAIPU', 312),
('CERRILLOS', 313),
('LO ESPEJO', 314),
('PEDRO AGUIRRE CERDA', 315),
('SAN MIGUEL', 316),
('SAN JOAQUIN', 317),
('MACUL', 318),
('PEÑALOLEN', 319),
('LA CISTERNA', 320),
('SAN RAMON', 321),
('LA GRANJA', 322),
('LA FLORIDA', 323),
('EL BOSQUE', 324),
('LA PINTANA', 325),
('SAN JOSE DE MAIPO', 326),
('PUENTE ALTO', 327),
('PIRQUE', 328),
('CURACAVI', 329),
('MARIA PINTO', 330),
('MELIPILLA', 331),
('SAN PEDRO', 332),
('ALHUE', 333),
('PEÑAFLOR', 334),
('EL MONTE', 335),
('TALAGANTE', 336),
('ISLA DE MAIPO', 337),
('PADRE HURTADO', 338),
('CALERA DE TANGO', 339),
('SAN BERNARDO', 340),
('BUIN', 341),
('PAINE', 342),
('NO DEFINIDA', 343);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio`
--

CREATE TABLE `convenio` (
  `ConvenioCodigo` int(11) NOT NULL,
  `ClienteRut` varchar(12) NOT NULL,
  `ConvenioTipoCodigo` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `convenio`
--

INSERT INTO `convenio` (`ConvenioCodigo`, `ClienteRut`, `ConvenioTipoCodigo`) VALUES
(225, '06289330-3', 1),
(238, '06690685-k', 1),
(235, '08321818-5', 1),
(208, '09450721-9', 1),
(204, '09497691-K', 1),
(252, '09775843-3', 1),
(257, '10293510-1', 1),
(160, '1-1', 1),
(180, '14448804-0', 1),
(161, '1-5', 1),
(181, '1-9', 1),
(147, '4898814-8', 1),
(133, '6167718-6', 1),
(188, '6972089-7', 1),
(256, '76957400-K', 1),
(122, '77579660-K', 1),
(174, '78712020-2', 1),
(187, '79945560-9', 1),
(179, '8861570-0', 1),
(129, '96600200-K', 1),
(123, '96625480-7', 1),
(137, '96928530-4', 1),
(250, '96934560-9', 1),
(267, '71277500-9', 1),
(272, '09094204-2', 1),
(275, '52003145-6', 1),
(279, '07362648-K', 1),
(281, '07220305-4', 1),
(298, '05866557-6', 1),
(300, '12222658-1', 1),
(304, '07625861-9', 1),
(315, '96564320-6', 1),
(318, '87845500-2', 1),
(319, '10354902-7', 1),
(322, '08354225-K', 1),
(325, '77777460-3', 1),
(329, '09493231-9', 1),
(332, '71614000-8', 1),
(337, '07776769-k', 1),
(340, '14603507-8', 1),
(346, '05081518-8', 1),
(347, '76040171-4', 1),
(348, '77779060-9', 1),
(349, '19567115-K', 1),
(350, '12892288-1', 1),
(359, '14261850-8', 1),
(360, '06068879-6', 1),
(362, '10783975-5', 1),
(363, '97006000-6', 1),
(365, '76025544-0', 1),
(373, '09908110-4', 1),
(376, '08632440-7', 1),
(378, '08621637-K', 1),
(380, '04255530-4', 1),
(381, '76178493-5', 1),
(382, '14621556-4', 1),
(383, '08868963-1', 1),
(384, '07014780-7', 1),
(386, '20805999-8', 1),
(389, '12659181-0', 1),
(390, '76145786-1', 1),
(393, '07554704-8', 1),
(394, '76069757-5', 1),
(397, '14171304-3', 1),
(398, '76600177-7', 1),
(401, '13068109-3', 1),
(402, '96929460-5', 1),
(403, '96550520-2', 1),
(405, '10528336-9', 1),
(406, '09838087-6', 1),
(407, '76072304-5', 1),
(408, '76418693-1', 1),
(409, '26702981-4', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `id_meses` int(11) NOT NULL,
  `MesesCodigo` varchar(2) NOT NULL,
  `MesesNombre` varchar(15) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id_meses`, `MesesCodigo`, `MesesNombre`, `estado`) VALUES
(1, '01', 'Enero', 0),
(2, '02', 'Febrero', 0),
(3, '03', 'Marzo', 0),
(4, '04', 'Abril', 0),
(5, '05', 'Mayo', 0),
(6, '06', 'Junio', 0),
(7, '12', 'Diciembre', 0),
(8, '07', 'Julio', 0),
(9, '08', 'Agosto', 0),
(10, '09', 'Septiembre', 1),
(11, '10', 'Octubre', 0),
(12, '11', 'Noviembre', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movil`
--

CREATE TABLE `movil` (
  `MovilCodigo` int(11) NOT NULL,
  `MovilTipoCodigo` int(11) DEFAULT '0',
  `DuenoRut` varchar(12) DEFAULT NULL,
  `MovilPatente` varchar(50) DEFAULT NULL,
  `MovilMarca` varchar(50) DEFAULT NULL,
  `MovilModelo` varchar(50) DEFAULT NULL,
  `MovilAnio` int(11) DEFAULT '0',
  `MovilNumero` int(11) DEFAULT '0',
  `MovilValorMes` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movil`
--

INSERT INTO `movil` (`MovilCodigo`, `MovilTipoCodigo`, `DuenoRut`, `MovilPatente`, `MovilMarca`, `MovilModelo`, `MovilAnio`, `MovilNumero`, `MovilValorMes`) VALUES
(47, 2, '10054470-9', 'BXLX-44', 'Toyota', 'Corolla', 2013, 40, 12000),
(48, 2, '9838087-6', 'BJWH-57', 'HYUNDAI', 'ELANTRA', 2010, 41, 80000),
(49, 2, '7418854-0', 'ZP-3548', 'KIA', 'SE', 2004, 42, 80000),
(50, 2, '06978197-7', 'RC-6381', 'KIA', 'CERATO', 2010, 43, 87500),
(51, 2, '06978197-7', 'PA-2153', 'DAEWOO', 'HEAVEN', 1996, 44, 175000),
(52, 2, '06978197-7', 'UX-2240', 'HUNDAY', 'ACCENT', 2002, 45, 12000),
(53, 2, '11866302-0', 'YE-8075', 'CHEVROLET', 'OPTRA', 2005, 46, 122500),
(54, 2, '5525735-3', 'TZ-1894', 'DAEWOO', 'NUBIRA', 2000, 47, 175000),
(55, 2, '10293510-1', 'UJ-8745', 'SANSUN', 'SM3', NULL, 48, 80000),
(56, 2, '06978197-7', 'UE-2918', 'CHEVROLET', 'OPTRA', 2009, 49, 175000),
(57, 2, '13272894-1', 'ZC-8458', 'CHEVROLET', 'CORSA', 2007, 50, 46000),
(58, 2, '8605007-2', 'TH-5442', 'PEUGEOT', '306', 2014, 51, 70000),
(59, 2, '11263189-5', 'KN 7325', 'SUBARU', 'LEGACY', 1993, 52, 100000),
(60, 2, '3426220-9', 'TZ 9638', 'KIA', 'CERATO', 2009, 53, 80000),
(61, 2, '14254594-2', 'BHJX-38', 'KIA', 'CERATO', 2008, 54, 160000),
(62, 2, '13690383-7', 'XA-2481', 'CHEVROLET', 'OPTRA', 2014, 55, 70000),
(63, 2, '07195592-3', 'XW-7649', 'CHEVROLET', 'OPTRA', 2007, 56, 122500),
(64, 2, '9117296-8', 'PE 1893', 'NISSAN', 'TIDA', 2010, 57, 10000),
(65, 2, '14178068-9', 'UE 4672', 'HYUNDAI', 'ACCENT', 2006, 58, 87500),
(73, 2, '7895999-1', 'ZC-8816', 'HYUNDAI', 'ELANTRA', 2009, 59, 80000),
(74, 2, '7077653-7', 'BDDX-28', 'CHEVROLET', 'OPTRA', 2007, 60, 50000),
(75, 2, '14640318-2', 'WT-2753', 'KIA', 'CERATO', 2007, 62, 175000),
(76, 2, '17101335-6', 'WP-3085', 'CHEVROLET', 'OPTRA', 2005, 61, 87500),
(78, 2, '21892758-0', 'YC-5641', 'HIUNDAY', 'ELANTRA', 2009, 63, 175000),
(79, 2, '15474454-1', 'YS-3439', 'HUNDAY', 'ACCENT', 2009, 65, 100),
(80, 2, '10882388-7', 'WP-2569', 'KIA', 'CERATO', 2007, 64, 85500),
(81, 2, '6063193-K', 'BC-ST-88', 'TOYOTA', 'COROLA', 2008, 67, 87500),
(83, 2, '21892758-0', 'YC5624', 'CHINA', 'ACCENT', 2013, 69, 70000),
(84, 2, '09418725-7', 'ZC-7918', 'HYUNDAI', 'ACCENT', 2006, 66, 175000),
(85, 2, '7106028-4', 'ZZ-2685', 'CHEVROLET', 'OPTRA', 2006, 68, 87500),
(99, 1, '8605007-2', 'XG-8072', 'NISSAN', 'V 16', 1985, 19, 12000),
(100, 2, '13442166-5', 'UE-2917', 'KIA', 'CERATO', 2008, 83, 0),
(102, 2, '15484702-2', 'PT-1925', 'CHEVROLET', 'SAIL', 2014, 84, 175000),
(103, 2, '12732205-8', 'FRKH-23', 'SANSUNG', 'SM3', 2014, 85, 0),
(104, 2, '12732202-3', 'FFVW-83', 'MAZDA', '5', 2014, 86, 0),
(86, 2, '7849657-6', 'BJYT-47', 'SAMSUNG', 'SM3', 2009, 71, 128500),
(87, 2, '5525735-3', 'XXXX', 'SANSUN', 'SM3', 2009, 70, 0),
(88, 2, '07190628-0', 'BLTF-89', 'KIA', 'CERATO', 2008, 72, 0),
(89, 2, '12666039-1', 'BJZC-48', 'HIUNDAY', 'ACCET', 2009, 74, 0),
(90, 2, '06978197-7', 'ZU-3347', 'HIUNDAY', 'ACCET', 2006, 73, 0),
(91, 2, '10647333-1', 'XG-80-72', 'HIUNDAY', 'ACCET', 2005, 75, 134000),
(92, 2, '7418854-0', 'XXXX', 'CHEVROLET', 'ORLANDO', 2013, 76, 122500),
(93, 2, '14175676-1', 'UE-4672', 'HIUNDAY', 'ELANTRA', 2011, 77, 122500),
(94, 2, '06978197-7', 'BCSS-62', 'KIA', 'CERATO', 2008, 78, 15000),
(95, 2, '06978197-7', 'BLTF-89', 'YUNDAY', 'ELANTRA', 2007, 79, 7000),
(96, 2, '06978197-7', 'BCST25', 'TOYOTA', 'COLORA', 2009, 80, 12000),
(97, 2, '10972268-5', 'MMMM69', 'NISSAN', 'TIDA', 2011, 81, 175000),
(113, 2, '15475942-5', 'FKCR14', 'Nissan', 'Tiida', 2013, 307, 45000),
(116, 2, NULL, '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movilchofer`
--

CREATE TABLE `movilchofer` (
  `MovilCodigo` int(11) NOT NULL DEFAULT '0',
  `ChoferRut` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movilchofer`
--

INSERT INTO `movilchofer` (`MovilCodigo`, `ChoferRut`) VALUES
(47, '11837242-5'),
(49, '13291168-1'),
(50, '10520817-0'),
(51, '12123756-3'),
(53, '11866302-0'),
(54, '12498531-5'),
(55, '6992244-9'),
(56, '9259272-3'),
(57, '4559212-K'),
(58, '9803117-0'),
(59, '11263189-5'),
(60, '3426220-9'),
(61, '14254594-2'),
(62, '13690383-7'),
(63, '12663196-0'),
(64, '7106028-4'),
(99, '10647333-1'),
(99, '8605007-2'),
(100, '06844107-2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talonario`
--

CREATE TABLE `talonario` (
  `TalonarioCodigo` int(11) NOT NULL,
  `TalonarioInicio` int(11) DEFAULT '0',
  `TalonarioTermino` int(11) DEFAULT '0',
  `TalonarioEstado` int(11) DEFAULT '0',
  `TalonarioFechaIngreso` varchar(10) DEFAULT NULL,
  `TalonarioTerminado` varchar(10) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `talonario`
--

INSERT INTO `talonario` (`TalonarioCodigo`, `TalonarioInicio`, `TalonarioTermino`, `TalonarioEstado`, `TalonarioFechaIngreso`, `TalonarioTerminado`) VALUES
(1, 1, 50, 1, '23-08-2019', '0'),
(2, 51, 100, 1, '23-08-2019', '0'),
(3, 101, 150, 1, '23-08-2019', '0'),
(4, 151, 200, 1, '23-08-2019', '0'),
(5, 201, 250, 1, '23-08-2019', '0'),
(6, 251, 300, 1, '23-08-2019', '0'),
(7, 301, 350, 1, '25-08-2019', '0'),
(8, 351, 400, 1, '26-08-2019', '0'),
(9, 401, 450, 1, '27-08-2019', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talonario_cliente`
--

CREATE TABLE `talonario_cliente` (
  `id` int(11) NOT NULL,
  `RutCliente` varchar(10) NOT NULL,
  `id_talonario` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `folio_inicio` int(11) NOT NULL,
  `folio_final` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `talonario_cliente`
--

INSERT INTO `talonario_cliente` (`id`, `RutCliente`, `id_talonario`, `estado`, `folio_inicio`, `folio_final`) VALUES
(1, '04255530-4', 1, 1, 1, 50),
(2, '07220305-4', 5, 1, 201, 250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talonario_movil`
--

CREATE TABLE `talonario_movil` (
  `id` int(11) NOT NULL,
  `id_movil` int(11) NOT NULL,
  `id_talonario` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `folio_inicio` int(11) NOT NULL,
  `folio_final` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `talonario_movil`
--

INSERT INTO `talonario_movil` (`id`, `id_movil`, `id_talonario`, `estado`, `folio_inicio`, `folio_final`) VALUES
(1, 47, 2, 1, 51, 100),
(2, 48, 3, 1, 101, 150),
(3, 49, 4, 1, 151, 200),
(4, 50, 6, 1, 251, 300),
(6, 51, 7, 1, 301, 350),
(7, 52, 8, 1, 351, 400),
(8, 53, 9, 1, 401, 450);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_rut` varchar(10) NOT NULL,
  `usuario_pass` varchar(100) NOT NULL,
  `usuario_pat` varchar(30) NOT NULL,
  `usuario_mat` varchar(30) NOT NULL,
  `usuario_nombres` varchar(50) NOT NULL,
  `usuario_dir` varchar(100) NOT NULL,
  `usuario_fono` varchar(15) NOT NULL,
  `usuario_correo` varchar(50) NOT NULL,
  `usuario_rol` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_rut`, `usuario_pass`, `usuario_pat`, `usuario_mat`, `usuario_nombres`, `usuario_dir`, `usuario_fono`, `usuario_correo`, `usuario_rol`) VALUES
(1, '11837242-5', 'rg1979', 'García', 'Manzo', 'Luis Alfonso', 'Pasaje Ferreira 4315 casa C', '989122008', 'luis.garcia@umce.cl', 1),
(2, '15475942-5', 'rod2019', 'Cofré', 'Palacios', 'Rodrigo Matías', 'Capitán Ignacio carrera Pinto 138 B', '969189092', 'rod.cofre@outlook.cl', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vale`
--

CREATE TABLE `vale` (
  `TalonarioCodigo` int(11) NOT NULL DEFAULT '0',
  `ValeNumero` int(11) NOT NULL DEFAULT '0',
  `ClienteRut` varchar(12) DEFAULT NULL,
  `AdicionalCodigo` int(11) DEFAULT '0',
  `MovilCodigo` int(11) DEFAULT '0',
  `ValeTipoCodigo` int(11) DEFAULT '1',
  `ConvenioCodigo` int(11) DEFAULT '1',
  `ValeHoraInicio` varchar(10) DEFAULT NULL,
  `ValeHoraTermino` varchar(10) DEFAULT NULL,
  `ValeFecha` varchar(10) DEFAULT NULL,
  `ValeValor` int(11) DEFAULT '0',
  `ValeLugarInicio` varchar(200) DEFAULT NULL,
  `ValeLugarDestino` varchar(200) DEFAULT NULL,
  `MesCodigo` int(11) DEFAULT '0',
  `ValeEstado` int(11) DEFAULT '0',
  `ValeObs` varchar(250) DEFAULT NULL,
  `ValeFechaIngreso` varchar(50) DEFAULT NULL,
  `AdministradorRut` varchar(12) DEFAULT NULL,
  `ValePeriodo` int(11) DEFAULT '0',
  `ValeFacturado` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vale`
--

INSERT INTO `vale` (`TalonarioCodigo`, `ValeNumero`, `ClienteRut`, `AdicionalCodigo`, `MovilCodigo`, `ValeTipoCodigo`, `ConvenioCodigo`, `ValeHoraInicio`, `ValeHoraTermino`, `ValeFecha`, `ValeValor`, `ValeLugarInicio`, `ValeLugarDestino`, `MesCodigo`, `ValeEstado`, `ValeObs`, `ValeFechaIngreso`, `AdministradorRut`, `ValePeriodo`, `ValeFacturado`) VALUES
(8, 351, NULL, 0, NULL, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0),
(9, 401, NULL, 0, NULL, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vales_movil`
--

CREATE TABLE `vales_movil` (
  `id` int(11) NOT NULL,
  `id_talonarioMovil` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_adicional` int(11) NOT NULL,
  `id_convenio` int(11) NOT NULL,
  `numero_vale` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `origen` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `valor` int(11) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `fecha_ingreso` varchar(15) NOT NULL,
  `MesCodigo` varchar(2) NOT NULL,
  `Periodo` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vales_movil`
--

INSERT INTO `vales_movil` (`id`, `id_talonarioMovil`, `id_cliente`, `id_adicional`, `id_convenio`, `numero_vale`, `direccion`, `origen`, `destino`, `fecha`, `hora`, `valor`, `observaciones`, `fecha_ingreso`, `MesCodigo`, `Periodo`, `usuario`) VALUES
(1, 2, 3289, 0, 0, 51, '', 'Casa', 'Trabajo', '12/03/2019', '12:25', 12000, 'Lo lleve a su casa y estaba curao', '05/09/2019', '09', 2019, ''),
(2, 2, 3216, 0, 0, 52, '', 'Casa', 'Trabajo', '05/09/2019', '15:45', 7000, '', '05/09/2019', '09', 2019, ''),
(3, 2, 3293, 0, 0, 53, '', 'Los Talaveras 3456', 'Porugal 45', '01/09/2019', '9:30', 5800, '', '06/09/2019', '09', 2019, ''),
(4, 3, 3248, 0, 0, 101, '', 'Avenida Macul 774', 'Jorge González Bastías 4308', '02/09/2019', '13:30', 2800, '', '06/09/2019', '09', 2019, ''),
(5, 6, 3306, 0, 0, 251, '', 'Las torres 1114', 'General Jofré 45', '12/08/2019', '21:30', 9000, '', '05/09/2019', '09', 2019, ''),
(6, 2, 3285, 0, 0, 54, '', 'Avenida Macul 774', 'Jorge González Bastías 4308', '09/09/2019', '11:51', 14000, 'Llego a su casa bien', '09/09/2019', '09', 2019, ''),
(7, 4, 3200, 0, 0, 151, '', 'Casa', 'Trabajo', '12/03/2019', '15:45', 12000, '', '09/09/2019', '09', 2019, ''),
(8, 2, 121, 0, 0, 55, '', 'Casa', 'Trabajo', '09/09/2019', '12:25', 3000, '', '09/09/2019', '09', 2019, ''),
(9, 7, 3202, 0, 0, 301, '', 'Casa', 'Trabajo', '12/09/2019', '15:23', 2000, '', '09/09/2019', '09', 2019, ''),
(10, 6, 3270, 0, 0, 252, '', 'Casa', 'Trabajo', '12/09/2019', '12:25', 2000, '', '09/09/2019', '09', 2019, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`ChoferRut`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ClienteRut`),
  ADD KEY `ClienteClave` (`ClienteClave`),
  ADD KEY `ClienteCodigo` (`ClienteCodigo`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`ComunaCodigo`);

--
-- Indices de la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`ClienteRut`),
  ADD KEY `ClienteRut` (`ClienteRut`),
  ADD KEY `ConvenioCodigo` (`ConvenioCodigo`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id_meses`);

--
-- Indices de la tabla `movil`
--
ALTER TABLE `movil`
  ADD PRIMARY KEY (`MovilCodigo`),
  ADD KEY `MovilCodigo` (`MovilCodigo`);

--
-- Indices de la tabla `movilchofer`
--
ALTER TABLE `movilchofer`
  ADD PRIMARY KEY (`MovilCodigo`,`ChoferRut`),
  ADD KEY `MovilCodigo` (`MovilCodigo`);

--
-- Indices de la tabla `talonario`
--
ALTER TABLE `talonario`
  ADD PRIMARY KEY (`TalonarioCodigo`);

--
-- Indices de la tabla `talonario_cliente`
--
ALTER TABLE `talonario_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `talonario_movil`
--
ALTER TABLE `talonario_movil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `vale`
--
ALTER TABLE `vale`
  ADD PRIMARY KEY (`TalonarioCodigo`,`ValeNumero`);

--
-- Indices de la tabla `vales_movil`
--
ALTER TABLE `vales_movil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ClienteCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3323;

--
-- AUTO_INCREMENT de la tabla `convenio`
--
ALTER TABLE `convenio`
  MODIFY `ConvenioCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id_meses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `movil`
--
ALTER TABLE `movil`
  MODIFY `MovilCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `talonario`
--
ALTER TABLE `talonario`
  MODIFY `TalonarioCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `talonario_cliente`
--
ALTER TABLE `talonario_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `talonario_movil`
--
ALTER TABLE `talonario_movil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vales_movil`
--
ALTER TABLE `vales_movil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
