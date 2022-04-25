-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2022 at 11:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f1db`
--

-- --------------------------------------------------------

--
-- Table structure for table `circuits`
--

CREATE TABLE `circuits` (
  `cid` int(10) NOT NULL,
  `circuitName` varchar(80) NOT NULL,
  `country` varchar(20) NOT NULL,
  `circuitLength` double NOT NULL DEFAULT '0',
  `laps` int(11) NOT NULL DEFAULT '0',
  `circuitImg` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circuits`
--

INSERT INTO `circuits` (`cid`, `circuitName`, `country`, `circuitLength`, `laps`, `circuitImg`) VALUES
(1, 'Bahrain International Circuit', 'Bahrain', 5.412, 57, 'https://www.formula1.com/content/dam/fom-website/2018-redesign-assets/Circuit%20maps%2016x9/Bahrain_Circuit.png.transform/7col-retina/image.png'),
(2, 'Autodromo Internazionale Enzo e Dino Ferrari, Imola.', 'Italy', 4.567, 68, 'https://www.formula1.com/content/dam/fom-website/2018-redesign-assets/Circuit%20maps%2016x9/Emilia_Romagna_Circuit.png.transform/7col-retina/image.png'),
(3, 'Autodromo Internacional do Algarve, Portimao', 'Portugal', 5.765, 55, 'https://www.formula1.com/content/dam/fom-website/2018-redesign-assets/Circuit%20maps%2016x9/Portugal_Circuit.png.transform/7col-retina/image.png'),
(4, 'Circuit de Catalunya, Barcelona', 'Spain', 4.655, 66, 'https://www.formula1.com/content/dam/fom-website/2018-redesign-assets/Circuit%20maps%2016x9/Spain_Circuit.png.transform/7col-retina/image.png'),
(5, 'Monaco', 'Monaco', 3.337, 78, 'https://www.formula1.com/content/dam/fom-website/2018-redesign-assets/Circuit%20maps%2016x9/Monoco_Circuit.png.transform/7col-retina/image.png'),
(6, 'Baku City Circuit', 'Azerbaijan', 6.003, 51, 'https://www.formula1.com/content/dam/fom-website/2018-redesign-assets/Circuit%20maps%2016x9/Baku_Circuit.png.transform/4col-retina/image.png'),
(7, 'Circuit Paul Ricard, Le Castellet', 'France', 5.842, 53, 'https://www.formula1.com/content/dam/fom-website/2018-redesign-assets/Circuit%20maps%2016x9/France_Circuit.png.transform/7col-retina/image.png'),
(8, 'Red Bull Ring, Spielberg', 'Austria', 4.381, 70, 'https://www.formula1.com/content/dam/fom-website/2018-redesign-assets/Circuit%20maps%2016x9/Styria_Circuit.png.transform/7col-retina/image.png'),
(9, 'Istanbul Park', 'Turkey', 5.338, 58, 'https://www.formula1.com/content/dam/fom-website/2018-redesign-assets/Circuit%20maps%2016x9/Turkey_Circuit.png.transform/7col-retina/image.png'),
(10, 'Sabanci Circuit', 'Turkey', 143, 45, 'https://www.sabancivakfi.org/i/content/1294_1_sabanciuniv.gif');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `did` int(11) NOT NULL,
  `startedRacing` int(11) DEFAULT '0',
  `raceWins` int(11) DEFAULT '0',
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`did`, `startedRacing`, `raceWins`, `photo`) VALUES
(4, 2013, 999, 'https://www.formula1.com/content/dam/fom-website/drivers/M/MAXVER01_Max_Verstappen/maxver01.png.transform/2col-retina/image.png'),
(5, 2003, 104, 'https://www.formula1.com/content/dam/fom-website/drivers/L/LEWHAM01_Lewis_Hamilton/lewham01.png.transform/2col-retina/image.png'),
(6, 2008, 43, 'https://www.formula1.com/content/dam/fom-website/drivers/V/VALBOT01_Valtteri_Bottas/valbot01.png.transform/2col-retina/image.png'),
(7, 2016, 65, 'https://www.formula1.com/content/dam/fom-website/drivers/L/LANNOR01_Lando_Norris/lannor01.png.transform/2col-retina/image.png'),
(8, 2014, 65, 'https://www.formula1.com/content/dam/fom-website/drivers/S/SERPER01_Sergio_Perez/serper01.png.transform/2col-retina/image.png'),
(9, 2015, 55, 'https://www.formula1.com/content/dam/fom-website/drivers/C/CARSAI01_Carlos_Sainz/carsai01.png.transform/2col-retina/image.png'),
(10, 2017, 52, 'https://www.formula1.com/content/dam/fom-website/drivers/C/CHALEC01_Charles_Leclerc/chalec01.png.transform/2col-retina/image.png'),
(11, 2016, 47, 'https://www.formula1.com/content/dam/fom-website/drivers/D/DANRIC01_Daniel_Ricciardo/danric01.png.transform/2col-retina/image.png'),
(12, 2018, 72, 'https://www.formula1.com/content/dam/fom-website/drivers/P/PIEGAS01_Pierre_Gasly/piegas01.png.transform/2col-retina/image.png'),
(13, 2003, 85, 'https://www.formula1.com/content/dam/fom-website/drivers/F/FERALO01_Fernando_Alonso/feralo01.png.transform/2col-retina/image.png'),
(14, 2019, 22, 'https://www.formula1.com/content/dam/fom-website/drivers/E/ESTOCO01_Esteban_Ocon/estoco01.png.transform/2col-retina/image.png'),
(15, 2004, 67, 'https://www.formula1.com/content/dam/fom-website/drivers/S/SEBVET01_Sebastian_Vettel/sebvet01.png.transform/2col-retina/image.png'),
(16, 2019, 3, 'https://www.formula1.com/content/dam/fom-website/drivers/L/LANSTR01_Lance_Stroll/lanstr01.png.transform/2col-retina/image.png'),
(17, 2020, 0, 'https://www.formula1.com/content/dam/fom-website/drivers/Y/YUKTSU01_Yuki_Tsunoda/yuktsu01.png.transform/2col-retina/image.png'),
(18, 2019, 4, 'https://www.formula1.com/content/dam/fom-website/drivers/G/GEORUS01_George_Russell/georus01.png.transform/2col-retina/image.png'),
(19, 2020, 2, 'https://www.formula1.com/content/dam/fom-website/drivers/N/NICLAF01_Nicholas_Latifi/niclaf01.png.transform/2col-retina/image.png'),
(20, 2001, 76, 'https://www.formula1.com/content/dam/fom-website/drivers/K/KIMRAI01_Kimi_Räikkönen/kimrai01.png.transform/2col-retina/image.png'),
(21, 2019, 12, 'https://www.formula1.com/content/dam/fom-website/drivers/A/ANTGIO01_Antonio_Giovinazzi/antgio01.png.transform/2col-retina/image.png'),
(42, 2021, 42, 'https://www.formula1.com/content/dam/fom-website/drivers/M/MICSCH02_Mick_Schumacher/micsch02.png.transform/2col-retina/image.png'),
(43, 2021, 31, 'https://www.formula1.com/content/dam/fom-website/drivers/N/NIKMAZ01_Nikita_Mazepin/nikmaz01.png.transform/2col-retina/image.png'),
(65, 2021, 99, 'https://www.formula1.com/content/dam/fom-website/drivers/L/LEWHAM01_Lewis_Hamilton/lewham01.png.transform/2col-retina/image.png');

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

CREATE TABLE `engineers` (
  `eid` int(11) NOT NULL,
  `department` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`eid`, `department`) VALUES
(50, 'Race Engineer'),
(51, 'Race Engineer'),
(52, 'Race Engineer'),
(55, 'Hamiltona Sevmek'),
(56, 'Ahiret Soru Hazirlama');

-- --------------------------------------------------------

--
-- Table structure for table `grandprix`
--

CREATE TABLE `grandprix` (
  `gpid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `gpName` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `circuitId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grandprix`
--

INSERT INTO `grandprix` (`gpid`, `sid`, `gpName`, `date`, `circuitId`) VALUES
(1, 2021, 'Emilia-Romagna Grand Prix', '2021-10-13', 2),
(2, 2021, 'Azerbaijan Grand Prix', '2021-10-20', 6),
(3, 2021, 'Monaco Grand Prix', '2021-11-08', 5),
(4, 2021, 'Turkish Grand Prix', '2021-10-27', 9),
(5, 2021, 'French Grand Prix', '2021-10-21', 7),
(6, 2021, 'Austrian Grand Prix', '2021-12-20', 8),
(7, 2021, 'Bahrain Grand Prix', '2021-12-01', 1),
(8, 2021, 'Sabanci University Grand Prix', '2022-01-01', 10),
(10, 2021, 'Konya Grand Prix', '2022-01-22', 5);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `pid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`pid`, `name`) VALUES
(4, 'Max Verstappen'),
(5, 'Lewis Hamilton'),
(6, 'Valtteri Bottas'),
(7, 'Lando Norris'),
(8, 'Sergio Perez'),
(9, 'Carlos Sainz Jr.'),
(10, 'Charles Leclerc'),
(11, 'Daniel Ricciardo'),
(12, 'Pierre Gasly'),
(13, 'Fernando Alonso'),
(14, 'Esteban Ocon'),
(15, 'Sebastian Vettel'),
(16, 'Lance Stroll'),
(17, 'Yuki Tsunoda'),
(18, 'George Russell'),
(19, 'Nicholas Latifi'),
(20, 'Kimi Raikkonen'),
(21, 'Antonio Giovinazzi'),
(42, 'Mick Schumacher'),
(43, 'Nikita Mazepin'),
(50, 'Peter Bonnington'),
(51, 'Christian Horner'),
(52, 'Zak Brown'),
(55, 'Albert Levi'),
(56, 'Kamer Kaya'),
(65, 'Cem Bolukbasi');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `gpid` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `did` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`gpid`, `position`, `did`) VALUES
(1, 1, 4),
(1, 13, 5),
(1, 19, 6),
(1, 12, 7),
(1, 20, 8),
(1, 4, 9),
(1, 5, 10),
(1, 6, 11),
(1, 3, 12),
(1, 8, 13),
(1, 7, 14),
(1, 14, 15),
(1, 11, 16),
(1, 18, 17),
(1, 9, 18),
(1, 16, 19),
(1, 10, 20),
(1, 2, 21),
(1, 15, 42),
(1, 17, 43);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `season` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`season`) VALUES
(2021);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `tid` int(10) NOT NULL,
  `teamName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`tid`, `teamName`) VALUES
(3, 'Alfa Romeo Racing ORLEN'),
(7, 'Alpine F1 Team'),
(8, 'Aston Martin Cognizant Formula One Team'),
(12, 'CS301 Zebanileri'),
(5, 'McLaren F1 Team'),
(4, 'Mercedes-AMG Petronas F1 Team'),
(1, 'Red Bull Racing'),
(6, 'Scuderia AlphaTauri Honda'),
(2, 'Scuderia Ferrari Mission Winnow'),
(10, 'Uralkali Haas F1 Team'),
(11, 'VAR Racing'),
(9, 'Williams Racing');

-- --------------------------------------------------------

--
-- Table structure for table `works_for`
--

CREATE TABLE `works_for` (
  `wid` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `season` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works_for`
--

INSERT INTO `works_for` (`wid`, `tid`, `season`) VALUES
(4, 1, 2021),
(8, 1, 2021),
(51, 1, 2021),
(9, 2, 2021),
(10, 2, 2021),
(20, 3, 2021),
(21, 3, 2021),
(5, 4, 2021),
(6, 4, 2021),
(50, 4, 2021),
(7, 5, 2021),
(11, 5, 2021),
(52, 5, 2021),
(12, 6, 2021),
(17, 6, 2021),
(13, 7, 2021),
(14, 7, 2021),
(15, 8, 2021),
(16, 8, 2021),
(18, 9, 2021),
(19, 9, 2021),
(42, 10, 2021),
(43, 10, 2021),
(65, 11, 2021);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `circuits`
--
ALTER TABLE `circuits`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `engineers`
--
ALTER TABLE `engineers`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `grandprix`
--
ALTER TABLE `grandprix`
  ADD PRIMARY KEY (`gpid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `circuitId` (`circuitId`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`gpid`,`position`) USING BTREE,
  ADD KEY `did` (`did`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`season`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `teamName` (`teamName`);

--
-- Indexes for table `works_for`
--
ALTER TABLE `works_for`
  ADD PRIMARY KEY (`wid`,`season`),
  ADD KEY `tid` (`tid`),
  ADD KEY `season` (`season`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `circuits`
--
ALTER TABLE `circuits`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `engineers`
--
ALTER TABLE `engineers`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `grandprix`
--
ALTER TABLE `grandprix`
  MODIFY `gpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `season` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `isal` FOREIGN KEY (`did`) REFERENCES `people` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `engineers`
--
ALTER TABLE `engineers`
  ADD CONSTRAINT `asdasdasdad` FOREIGN KEY (`eid`) REFERENCES `people` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grandprix`
--
ALTER TABLE `grandprix`
  ADD CONSTRAINT `grandprix_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `seasons` (`season`),
  ADD CONSTRAINT `grandprix_ibfk_2` FOREIGN KEY (`circuitId`) REFERENCES `circuits` (`cid`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `driver` FOREIGN KEY (`did`) REFERENCES `drivers` (`did`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`gpid`) REFERENCES `grandprix` (`gpid`) ON DELETE CASCADE;

--
-- Constraints for table `works_for`
--
ALTER TABLE `works_for`
  ADD CONSTRAINT `isaRelationship` FOREIGN KEY (`wid`) REFERENCES `people` (`pid`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_for_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `teams` (`tid`),
  ADD CONSTRAINT `works_for_ibfk_3` FOREIGN KEY (`season`) REFERENCES `seasons` (`season`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
