-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2019 at 12:28 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_pfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `ID_MEMBRE` int(10) NOT NULL AUTO_INCREMENT,
  `NOM_MEMBRE` varchar(30) NOT NULL,
  `PRENOM_MEMBRE` varchar(30) NOT NULL,
  `LOGIN_MEMBRE` varchar(70) NOT NULL,
  `PWD_MEMBRE` varchar(64) NOT NULL,
  `DATEN_MEMBRE` date NOT NULL,
  `LEVEL` int(11) DEFAULT '1',
  `CREE_A` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_MEMBRE`),
  KEY `NOM_MEMBRE` (`NOM_MEMBRE`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`ID_MEMBRE`, `NOM_MEMBRE`, `PRENOM_MEMBRE`, `LOGIN_MEMBRE`, `PWD_MEMBRE`, `DATEN_MEMBRE`, `LEVEL`, `CREE_A`) VALUES
(1, 'Aguerram', 'Mostafa', 'agurram@live.fr ', '4a7d1ed414474e4033ac29ccb8653d9b', '1987-02-12', 1, '2019-03-22 16:13:44'),
(2, 'luis', 'charlie', 'luis-charlie00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1990-10-30', 1, '2019-03-22 16:13:44'),
(3, 'mahzoz', 'omar', 'mahzoz-omar00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1975-11-12', 1, '2019-03-22 16:13:44'),
(4, 'echigar', 'hanane', 'echigar-hanane00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1998-01-01', 1, '2019-03-22 16:13:44'),
(5, 'mabrouk', 'mouna', 'mabrouk-mouna00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1997-03-31', 2, '2019-03-22 16:13:44'),
(6, 'oubihi', 'hanan', 'oubihi-hanan00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1986-12-17', 1, '2019-03-22 16:13:44'),
(7, 'linois', 'luis', 'linois-luis00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1988-06-30', 1, '2019-03-22 16:13:44'),
(8, 'bernand', 'martin', 'bernand-martin00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1996-02-26', 1, '2019-03-22 16:13:44'),
(9, 'dubois', 'james', 'dubois-james00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1970-07-28', 1, '2019-03-22 16:13:44'),
(10, 'patris', 'naina', 'patris-naina00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1978-09-09', 1, '2019-03-22 16:13:44'),
(11, 'megan', 'alicia', 'megan-alicia00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1988-10-10', 1, '2019-03-22 16:13:44'),
(21, 'ensida', 'barbara', 'ensida-barbara00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1988-07-14', 1, '2019-03-22 16:13:44'),
(22, 'saad allah', 'yassmine', 'saad-yassmine00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1969-12-12', 1, '2019-03-22 16:13:44'),
(23, 'conor', 'jack', 'conor-jack00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1989-09-29', 1, '2019-03-22 16:13:44'),
(24, 'lionnel', 'fabian', 'lionnel-fabian00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1985-12-11', 1, '2019-03-22 16:13:44'),
(25, 'essaidi', 'karim', 'essaidi-karim00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1970-10-30', 1, '2019-03-22 16:13:44'),
(26, 'hilal', 'ahmed', 'hilal-ahmed00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1963-12-05', 1, '2019-03-22 16:13:44'),
(27, 'alfred', 'donald', 'alfred-donald00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1970-11-23', 1, '2019-03-22 16:13:44'),
(28, 'selessia', 'melissa', 'selessia-melissa00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1989-04-05', 1, '2019-03-22 16:13:44'),
(29, 'mason', 'robert', 'mason-robert00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1967-02-28', 1, '2019-03-22 16:13:44'),
(30, 'margaret', 'emma', 'margaret-emma00@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1990-12-31', 1, '2019-03-22 16:13:44'),
(31, 'dsfdsf', 'fdfsdf', 'agurram@live.com ', '4a7d1ed414474e4033ac29ccb8653d9b', '2019-03-06', 1, '2019-03-22 16:13:44'),
(32, 'Aguerram', 'Mostafa', 'agurram2013@gmail.com ', '4a7d1ed414474e4033ac29ccb8653d9b', '1998-06-29', 1, '2019-03-22 16:13:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
