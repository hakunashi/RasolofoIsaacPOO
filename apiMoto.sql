-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 26 mai 2024 à 00:11
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `apiMoto`
--
CREATE DATABASE IF NOT EXISTS `apiMoto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `apiMoto`;

-- --------------------------------------------------------

--
-- Structure de la table `moto`
--

CREATE TABLE IF NOT EXISTS `moto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(250) NOT NULL,
  `model` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `moto`
--

INSERT INTO `moto` (`id`, `brand`, `model`, `type`, `price`, `image`) VALUES
(1, 'Honda', 'CBR600RR', 'Enduro', 16000, 'https://images.netdirector.co.uk/gforces-auto/image/upload/w_620,h_465,q_auto,c_fill,f_auto,fl_lossy/auto-client/2c7fd497b0029eecbe7de3b927d764d7/2022_yam_yzf1000r1spl_eu_bwm2_stu_001_03_1.jpg'),
(2, 'Ducati', 'Panigale V4', 'Custom', 28499, 'https://images.netdirector.co.uk/gforces-auto/image/upload/w_620,h_465,q_auto,c_fill,f_auto,fl_lossy/auto-client/2c7fd497b0029eecbe7de3b927d764d7/2022_yam_yzf1000r1spl_eu_bwm2_stu_001_03_1.jpg'),
(3, 'BMW', 'S1000RR', 'Enduro', 21599, 'https://images.netdirector.co.uk/gforces-auto/image/upload/w_620,h_465,q_auto,c_fill,f_auto,fl_lossy/auto-client/2c7fd497b0029eecbe7de3b927d764d7/2022_yam_yzf1000r1spl_eu_bwm2_stu_001_03_1.jpg'),
(4, 'Kawasaki', 'Ninja ZX-10R', 'Roadster', 18000, 'https://images.netdirector.co.uk/gforces-auto/image/upload/w_620,h_465,q_auto,c_fill,f_auto,fl_lossy/auto-client/2c7fd497b0029eecbe7de3b927d764d7/2022_yam_yzf1000r1spl_eu_bwm2_stu_001_03_1.jpg'),
(5, 'Suzuki', 'GSX-R1000', 'Roadster', 16799, 'https://images.netdirector.co.uk/gforces-auto/image/upload/w_620,h_465,q_auto,c_fill,f_auto,fl_lossy/auto-client/2c7fd497b0029eecbe7de3b927d764d7/2022_yam_yzf1000r1spl_eu_bwm2_stu_001_03_1.jpg'),
(9, 'Toto', 'super 1212', 'Custom', 100000, 'https://images.netdirector.co.uk/gforces-auto/image/upload/w_620,h_465,q_auto,c_fill,f_auto,fl_lossy/auto-client/2c7fd497b0029eecbe7de3b927d764d7/2022_yam_yzf1000r1spl_eu_bwm2_stu_001_03_1.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
