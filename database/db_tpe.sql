-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 09:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tpe`
--

-- --------------------------------------------------------

--
-- Table structure for table `estudio`
--

CREATE TABLE `estudio` (
  `id_nombre_fk` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `creacion` year(4) NOT NULL,
  `historia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estudio`
--

INSERT INTO `estudio` (`id_nombre_fk`, `nombre`, `creacion`, `historia`) VALUES
(1, 'Walt Disney ', 1923, 'Historia: Forma parte de The Walt Disney Company, la mayor compañía de entretenimiento del mundo. El conglomerado incluye Hollywood Pictures (serie B), Pixar, Touchstone Pictures y el canal ABC. Su filial Miramax cerró en 2010. Algunas de sus franquicias son Toy Story, Piratas del Caribe y Alicia en el País de las Maravillas. El año 2012 consiguió el 14.3% de maket share.\r\n\r\n'),
(2, 'Warner Bros. Entertainment', 1923, 'Warner Bros. Entertainment Inc. (simplemente conocida como Warner Bros. y abreviada como WB), anteriormente conocida como Warner Bros. Pictures, Inc., es una compañía estadounidense filial de Warner Bros. Discovery y con sede en Burbank, California. Tiene operaciones en cine, televisión y videojuegos y es uno de los principales estudios de cinematografía estadounidenses, así como miembro de la Motion Picture Association of America'),
(3, 'Universal', 1920, 'NBC Universal Media, LLC (anteriormente conocida como NBCUniversal, Inc.)​ es una compañía estadounidense de los medios de comunicación de masas enfocada en la producción y mercadeo de entretenimiento, noticias, y productos y servicios informativos para una base global de clientes. La compañía posee y opera cadenas de televisión, varios canales de cable, y un grupo de estaciones locales a lo largo de los Estados Unidos, así como productoras de películas, compañías para producción de televisión, y parques temáticos.'),
(4, 'Sony Pictures', 1924, 'Sony Pictures Entertainment, Inc. (SPE) es una distribuidora y productora cinematográfica estadounidense subsidiaria de Sony Corporation, un conglomerado de tecnología multinacional y medios de comunicación con sede en Japón. En 2010 se informó que sus ventas habían sido de $7200 millones.​ Sony Pictures es miembro de la Motion Picture Association (MPA).'),
(5, 'Paramount Global', 1912, 'Paramount Global, conocido simplemente como Paramount (anteriormente conocido como ViacomCBS, Inc.), es un conglomerado multinacional estadounidense de medios de comunicación con sede en Nueva York. La corporación se formó a través de la fusión de CBS Corporation y la segunda encarnación de Viacom el 4 de diciembre de 2019, que se crearon a partir del derrame y división del Viacom original en 2005.1​ La compañía tiene intereses en películas, televisión, publicaciones y medios digitales.');

-- --------------------------------------------------------

--
-- Table structure for table `pelis`
--

CREATE TABLE `pelis` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estreno` year(4) NOT NULL,
  `puntuacion` double NOT NULL,
  `director` varchar(150) NOT NULL,
  `fk_estudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelis`
--

INSERT INTO `pelis` (`id`, `nombre`, `estreno`, `puntuacion`, `director`, `fk_estudio`) VALUES
(1, 'Alicia en el pais de las Maravillas', 1951, 7.1, 'Wilfred Jackson, Hamilton Luske y Clyde Geronimi.', 1),
(2, 'Dumbo', 1941, 6.9, 'Ben Sharpteen, Norma Ferguson y Wilfred Jackson.', 1),
(3, 'El libro de la Selva', 1967, 7.2, 'Larry Clemonds, Ralph Wright y Ken Anderson.', 1),
(4, 'Harry Potter y la piedra filosofal', 2001, 6.8, 'Chris Columbus', 2),
(5, 'The Matrix Revolutions', 2003, 6, 'Hermanas Wachowski', 2),
(6, 'Escuadron Suicida', 2016, 6.3, 'David Ayer', 2),
(7, 'Rapidos y furiosos 7', 2015, 5.8, 'James Wan', 3),
(8, 'Jurassic World', 2015, 5, 'Colin Trevorrow', 3),
(9, 'E.T., el extraterrestre', 1982, 7.5, 'Steven Spielberg', 3),
(10, 'Karate Kid', 1984, 5.8, 'John Avildsen', 4),
(11, 'Jumanji', 1995, 5.2, 'Joe Johnston', 4),
(12, 'Bad Boys', 1995, 5.5, 'Michael Bay', 4),
(13, 'Los angeles de Charlie', 2000, 3.8, 'Joseph McGinty Nichol', 4),
(16, 'Top Gun: Maverick', 2022, 5.7, 'Joseph Kosinski', 5),
(17, 'Interstellar', 2014, 8.2, 'Christopher Nolan', 5),
(18, 'Thor: El Mundo Oscuro', 2014, 7, 'Alan Taylor', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estudio`
--
ALTER TABLE `estudio`
  ADD PRIMARY KEY (`id_nombre_fk`);

--
-- Indexes for table `pelis`
--
ALTER TABLE `pelis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estudio` (`fk_estudio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estudio`
--
ALTER TABLE `estudio`
  MODIFY `id_nombre_fk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelis`
--
ALTER TABLE `pelis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelis`
--
ALTER TABLE `pelis`
  ADD CONSTRAINT `pelis_ibfk_1` FOREIGN KEY (`fk_estudio`) REFERENCES `estudio` (`id_nombre_fk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
