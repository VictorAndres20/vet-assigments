-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2019 at 09:27 PM
-- Server version: 5.7.11-0ubuntu6
-- PHP Version: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `cod_assign` int(11) NOT NULL,
  `cod_pet` int(11) NOT NULL,
  `cod_service` int(11) NOT NULL,
  `cod_state` int(11) NOT NULL,
  `date_assign` date NOT NULL,
  `time_assign` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`cod_assign`, `cod_pet`, `cod_service`, `cod_state`, `date_assign`, `time_assign`) VALUES
(1, 1, 1, 4, '2019-01-15', '12:00:00'),
(2, 1, 1, 5, '2019-01-15', '17:00:00'),
(4, 1, 1, 1, '2019-01-15', '18:00:00'),
(5, 1, 1, 1, '2019-01-17', '12:00:00'),
(6, 2, 1, 3, '2019-01-15', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cod_city` int(11) NOT NULL,
  `nom_city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cod_city`, `nom_city`) VALUES
(1, 'Bogotá'),
(2, 'Villavicencio'),
(3, 'Yopal');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cod_client` int(11) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `addr_client` varchar(70) NOT NULL,
  `phon_client` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cod_client`, `nom_client`, `addr_client`, `phon_client`) VALUES
(1, 'Rómulo Gallego', 'crr 48 n 160-56', '3145678767'),
(2, 'Ana Gallego', 'crr 48 n 160-56', '3145678768'),
(3, 'Carolina Gallego', 'crr 48 n 160-56', '3145678799');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `cod_pet` int(11) NOT NULL,
  `nom_pet` varchar(15) NOT NULL,
  `cod_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`cod_pet`, `nom_pet`, `cod_client`) VALUES
(1, 'Maxy', 1),
(2, 'Betty', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `cod_service` int(11) NOT NULL,
  `nom_service` varchar(70) NOT NULL,
  `desc_service` varchar(200) NOT NULL,
  `quant_hour` int(11) NOT NULL,
  `price_service` double NOT NULL,
  `cod_vet` int(11) NOT NULL,
  `cod_t_service` int(11) NOT NULL,
  `cod_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`cod_service`, `nom_service`, `desc_service`, `quant_hour`, `price_service`, `cod_vet`, `cod_t_service`, `cod_state`) VALUES
(1, 'Peluquería canina', 'Peluquería solo para tus mascotas perrunas', 2, 20000, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `cod_state` int(11) NOT NULL,
  `nom_state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`cod_state`, `nom_state`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Pendiente'),
(4, 'Eliminado'),
(5, 'Completado');

-- --------------------------------------------------------

--
-- Table structure for table `t_service`
--

CREATE TABLE `t_service` (
  `cod_t_service` int(11) NOT NULL,
  `nom_t_service` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_service`
--

INSERT INTO `t_service` (`cod_t_service`, `nom_t_service`) VALUES
(1, 'Comida'),
(2, 'Peluquería'),
(3, 'Medicina'),
(4, 'Aseo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `cod_user` int(11) NOT NULL,
  `login_user` varchar(50) NOT NULL,
  `mail_user` varchar(100) NOT NULL,
  `pass_user` varchar(256) NOT NULL,
  `cod_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`cod_user`, `login_user`, `mail_user`, `pass_user`, `cod_state`) VALUES
(1, 'AdminRoot', 'admin.vsa@gmail.com', 'cdf4a007e2b02a0c49fc9b7ccfbb8a10c644f635e1765dcf2a7ab794ddc7edac', 1),
(2, 'Vitolo', 'vpedraza@unbosque.edu.co', 'cdf4a007e2b02a0c49fc9b7ccfbb8a10c644f635e1765dcf2a7ab794ddc7edac', 1),
(3, 'Bocachico', 'dmcorrales@unbosque.edu.co', 'cdf4a007e2b02a0c49fc9b7ccfbb8a10c644f635e1765dcf2a7ab794ddc7edac', 1),
(4, 'Paula', 'pasanga@gmail.com', 'cdf4a007e2b02a0c49fc9b7ccfbb8a10c644f635e1765dcf2a7ab794ddc7edac', 1),
(5, 'Egaleves', 'egal@gmail.com', 'cdf4a007e2b02a0c49fc9b7ccfbb8a10c644f635e1765dcf2a7ab794ddc7edac', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vet`
--

CREATE TABLE `vet` (
  `cod_vet` int(11) NOT NULL,
  `nom_vet` varchar(70) NOT NULL,
  `addr_vet` varchar(100) NOT NULL,
  `phon_vet` varchar(12) NOT NULL,
  `cod_city` int(11) DEFAULT NULL,
  `cod_user` int(11) NOT NULL,
  `cod_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vet`
--

INSERT INTO `vet` (`cod_vet`, `nom_vet`, `addr_vet`, `phon_vet`, `cod_city`, `cod_user`, `cod_state`) VALUES
(1, 'Vitolete', 'crr 7 n 116 -27', '3145678799', 1, 4, 1),
(2, 'Don Oliver', 'crr 7 n 116 -27', '3145678799', 1, 4, 1),
(3, 'Paulita Vet', 'crr 7 n 116 -27', '3145678799', 1, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`cod_assign`),
  ADD KEY `fk_ass_pet` (`cod_pet`),
  ADD KEY `fk_ass_ser` (`cod_service`),
  ADD KEY `fk_ass_sta` (`cod_state`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cod_city`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cod_client`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`cod_pet`),
  ADD KEY `fk_pet_cli` (`cod_client`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`cod_service`),
  ADD KEY `fk_ser_vet` (`cod_vet`),
  ADD KEY `fk_ser_tse` (`cod_t_service`),
  ADD KEY `fk_ser_sta` (`cod_state`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`cod_state`);

--
-- Indexes for table `t_service`
--
ALTER TABLE `t_service`
  ADD PRIMARY KEY (`cod_t_service`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`cod_user`),
  ADD KEY `fk_use_sta` (`cod_state`);

--
-- Indexes for table `vet`
--
ALTER TABLE `vet`
  ADD PRIMARY KEY (`cod_vet`),
  ADD KEY `fk_vet_use` (`cod_user`),
  ADD KEY `fk_vet_cit` (`cod_city`),
  ADD KEY `fk_vet_sta` (`cod_state`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `cod_assign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cod_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cod_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `cod_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `cod_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `cod_state` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_service`
--
ALTER TABLE `t_service`
  MODIFY `cod_t_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vet`
--
ALTER TABLE `vet`
  MODIFY `cod_vet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `fk_ass_pet` FOREIGN KEY (`cod_pet`) REFERENCES `pet` (`cod_pet`),
  ADD CONSTRAINT `fk_ass_ser` FOREIGN KEY (`cod_service`) REFERENCES `service` (`cod_service`),
  ADD CONSTRAINT `fk_ass_sta` FOREIGN KEY (`cod_state`) REFERENCES `state` (`cod_state`);

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `fk_pet_cli` FOREIGN KEY (`cod_client`) REFERENCES `client` (`cod_client`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_ser_sta` FOREIGN KEY (`cod_state`) REFERENCES `state` (`cod_state`),
  ADD CONSTRAINT `fk_ser_tse` FOREIGN KEY (`cod_t_service`) REFERENCES `t_service` (`cod_t_service`),
  ADD CONSTRAINT `fk_ser_vet` FOREIGN KEY (`cod_vet`) REFERENCES `vet` (`cod_vet`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_use_sta` FOREIGN KEY (`cod_state`) REFERENCES `state` (`cod_state`);

--
-- Constraints for table `vet`
--
ALTER TABLE `vet`
  ADD CONSTRAINT `fk_vet_cit` FOREIGN KEY (`cod_city`) REFERENCES `city` (`cod_city`),
  ADD CONSTRAINT `fk_vet_sta` FOREIGN KEY (`cod_state`) REFERENCES `state` (`cod_state`),
  ADD CONSTRAINT `fk_vet_use` FOREIGN KEY (`cod_user`) REFERENCES `users` (`cod_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
