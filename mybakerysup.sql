-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 16 août 2019 à 06:15
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mybakerysup`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(5) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `bill` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `delivered` tinyint(1) NOT NULL,
  `paid` tinyint(4) NOT NULL,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `date`, `quantity`, `bill`, `product_id`, `delivered`, `paid`, `code`) VALUES
(5, '2019-08-14 00:00:00', '20 trays', '68000', 3, 0, 0, 'O_201971578'),
(2, '2019-08-14 00:00:00', '30 trays', '5000', 2, 1, 1, 'O_201971583'),
(3, '2019-08-14 00:00:00', '10 trays', '2500', 2, 0, 1, 'O_201971557'),
(4, '2019-08-14 00:00:00', '10 trays', '25000', 2, 0, 0, 'O_201971557');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `code`, `description`, `price`, `supplier_id`) VALUES
(2, 'BROWN EGGS', 'Natural Brown Eggs ', '20 ngn/dozen', 3),
(3, 'WHITE EGGS', 'Natural White Eggs ', '25 ngn/tray', 1);

-- --------------------------------------------------------

--
-- Structure de la table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id` varchar(20) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `email`, `phoneNumber`, `name`, `address`, `id`) VALUES
(1, 'bakewithus@supplier.com', '13206526695', 'Bake with us corporation ', 'Nangang District\r\nNantong St. 145\r\nInternational Students Apartment,H.E.U', 'SUPPLIER1'),
(2, 'anothersupplier@supplier.com', '224578962', 'Flour and Salt Business ', 'Lome, Togo', 'SUPPLIER2'),
(3, 'thatfarm@suppliers.com', '2222222222', 'Best Farm for eggs and millk', 'Nigeria, Cross River', 'EGG&MILKSUPPLIER');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_ID` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `user_ID` (`user_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_ID`, `email`, `password`, `name`, `profile`) VALUES
(1, 'admin@admin.com', 'admin', 'Finance lead', 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
