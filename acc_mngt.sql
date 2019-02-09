-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 06:58 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acc_mngt`
--

-- --------------------------------------------------------

--
-- Table structure for table `finished`
--

CREATE TABLE `finished` (
  `order_id` int(50) NOT NULL,
  `topic` text NOT NULL,
  `subject` text NOT NULL,
  `description` longtext NOT NULL,
  `date_posted` varchar(20) NOT NULL,
  `deadline` varchar(20) NOT NULL,
  `status` int(20) NOT NULL DEFAULT '0',
  `user_id` int(254) DEFAULT NULL,
  `rated` int(254) NOT NULL,
  `pages` int(254) NOT NULL,
  `slides` int(254) NOT NULL,
  `paid` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finished`
--

INSERT INTO `finished` (`order_id`, `topic`, `subject`, `description`, `date_posted`, `deadline`, `status`, `user_id`, `rated`, `pages`, `slides`, `paid`) VALUES
(1, 'hfhhfhfhhshsha', 'Computer Science', '<p>hhhsdsahdjsahdjsahsahfsafshfiwqi</p>', '1538665696', '1538665940', 1, 34, 5, 2, 1, '650');

-- --------------------------------------------------------

--
-- Table structure for table `onprogress`
--

CREATE TABLE `onprogress` (
  `number` int(254) NOT NULL,
  `order_id` int(254) NOT NULL,
  `user_id` int(254) NOT NULL,
  `order_topic` varchar(256) NOT NULL,
  `order_subject` varchar(256) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `deadline` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `onrevision`
--

CREATE TABLE `onrevision` (
  `no` int(254) NOT NULL,
  `order_id` text NOT NULL,
  `user_id` text NOT NULL,
  `rev_instructions` mediumtext NOT NULL,
  `deadline` int(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(50) NOT NULL,
  `topic` text NOT NULL,
  `subject` text NOT NULL,
  `description` longtext NOT NULL,
  `date_posted` varchar(20) NOT NULL,
  `deadline` varchar(20) NOT NULL,
  `status` int(20) NOT NULL DEFAULT '0',
  `user_id` int(254) DEFAULT NULL,
  `rated` int(254) NOT NULL DEFAULT '0',
  `pages` int(11) NOT NULL DEFAULT '0',
  `slides` int(11) NOT NULL DEFAULT '0',
  `paid` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `number` int(11) NOT NULL,
  `note_to_writers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`number`, `note_to_writers`) VALUES
(3, '\r\nÂ¿Por quÃ© lo usamos?\r\nEs un hecho establecido hace demasiado tiempo que un lector se distraerÃ¡ con el contenido del texto de un sitio mientras que mira su diseÃ±o. El punto de usar Lorem Ipsum es que tiene una distribuciÃ³n mÃ¡s o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquÃ­, contenido aquÃ­\". Estos textos hacen parecerlo un espaÃ±ol que se puede leer. Muchos paquetes de autoediciÃ³n y editores de pÃ¡ginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una bÃºsqueda de \"Lorem Ipsum\" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a travÃ©s de los aÃ±os, algunas veces por accidente, otras veces a propÃ³sito (por ejemplo insertÃ¡ndole humor y cosas por el estilo).\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `num` int(254) NOT NULL,
  `user_id` text COLLATE utf8_unicode_ci NOT NULL,
  `datei` text COLLATE utf8_unicode_ci NOT NULL,
  `amount_paid` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`num`, `user_id`, `datei`, `amount_paid`) VALUES
(6, ' 34 ', '26-06-2018 09:26:55 am', '-1000'),
(7, ' 34 ', '02-07-2018 04:34:34 pm', '2000'),
(8, ' 22 ', '05-07-2018 12:41:36 pm', '50'),
(3, ' 22 ', '25-06-2018 11:35:32 am', '1000'),
(4, ' 34 ', '26-06-2018 09:23:22 am', '150'),
(5, ' 34 ', '26-06-2018 09:24:11 am', '100'),
(9, ' 22 ', '06-07-2018 02:48:36 pm', '56'),
(10, ' 22 ', '17-07-2018 10:45:54 am', '1800'),
(11, ' 34 ', '04-10-2018 06:13:15 pm', '50');

-- --------------------------------------------------------

--
-- Table structure for table `pedding_approval`
--

CREATE TABLE `pedding_approval` (
  `number` int(254) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_subject` text NOT NULL,
  `order_topic` text NOT NULL,
  `user_name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `datei` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `number` int(250) NOT NULL,
  `order_id` int(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `User_type` varchar(27) NOT NULL DEFAULT 'user',
  `rating` int(254) NOT NULL DEFAULT '0',
  `timesi` int(254) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `balance` varchar(254) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `User_type`, `rating`, `timesi`, `status`, `balance`) VALUES
(22, 'sam ryan', 'samryan@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 'Admin', 70, 7, 'active', '0'),
(34, 'gatheru', 'gatheruwilson@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 'user', 68, 10, 'active', '600');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `finished`
--
ALTER TABLE `finished`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `onprogress`
--
ALTER TABLE `onprogress`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `onrevision`
--
ALTER TABLE `onrevision`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `pedding_approval`
--
ALTER TABLE `pedding_approval`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `finished`
--
ALTER TABLE `finished`
  MODIFY `order_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `onprogress`
--
ALTER TABLE `onprogress`
  MODIFY `number` int(254) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `onrevision`
--
ALTER TABLE `onrevision`
  MODIFY `no` int(254) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `num` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pedding_approval`
--
ALTER TABLE `pedding_approval`
  MODIFY `number` int(254) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `number` int(250) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
