-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 02:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthone2.0`
--
CREATE DATABASE IF NOT EXISTS `healthone2.0` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `healthone2.0`;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210115120606', '2021-01-15 13:06:13', 185),
('DoctrineMigrations\\Version20210118115638', '2021-01-18 12:57:01', 113),
('DoctrineMigrations\\Version20210118121219', '2021-01-18 13:12:35', 100);

-- --------------------------------------------------------

--
-- Table structure for table `medicijnen`
--

CREATE TABLE `medicijnen` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `side_effect` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefits` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compensated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicijnen`
--

INSERT INTO `medicijnen` (`id`, `name`, `side_effect`, `benefits`, `compensated`) VALUES
(11, 'hoestdrank', 'deuzelig', 'geen keel pijn meer', 1),
(12, 'zc', 'zxczxc', 'cxzxc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patienten`
--

CREATE TABLE `patienten` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geboorte_datum` date NOT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `woonplaats` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zk_nummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patienten`
--

INSERT INTO `patienten` (`id`, `name`, `geboorte_datum`, `adres`, `woonplaats`, `zk_nummer`) VALUES
(4, 'Casper van LAer', '2021-01-28', 'van arembergelaan 88 2274BW', 'voorburg', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `recept`
--

CREATE TABLE `recept` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `dosis` int(11) NOT NULL,
  `duur` int(11) NOT NULL,
  `medicijn_id` int(11) NOT NULL,
  `patienten_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recept`
--

INSERT INTO `recept` (`id`, `datum`, `dosis`, `duur`, `medicijn_id`, `patienten_id`) VALUES
(9, '2016-03-01', 4, 123, 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voor_naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `voor_naam`) VALUES
(1, 'admin', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$N0FHREtJMVMueHJrbkpRMw$1c3RiNFh6pbP/8qlIiaNINiqr0r/GAuHrYoo5PqZBPM', 'casper'),
(6, 'arts', '[\"ROLE_ARTS\"]', '$argon2id$v=19$m=65536,t=4,p=1$N0FHREtJMVMueHJrbkpRMw$1c3RiNFh6pbP/8qlIiaNINiqr0r/GAuHrYoo5PqZBPM', 'arts'),
(7, 'apotheker', '[\"ROLE_APOTHEKER\"]', '$argon2id$v=19$m=65536,t=4,p=1$N0FHREtJMVMueHJrbkpRMw$1c3RiNFh6pbP/8qlIiaNINiqr0r/GAuHrYoo5PqZBPM', 'apho'),
(8, 'casper', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$U1lOVWNqQkpyMFl1Q1M5Mw$OKEtjScfboLlQq3ztE00X1um82g+t6FS0z18N54+4tI', 'cas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `medicijnen`
--
ALTER TABLE `medicijnen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patienten`
--
ALTER TABLE `patienten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recept`
--
ALTER TABLE `recept`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B92268A1DFC35CB` (`medicijn_id`),
  ADD KEY `IDX_B92268A11BDAEE1` (`patienten_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patienten`
--
ALTER TABLE `patienten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recept`
--
ALTER TABLE `recept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recept`
--
ALTER TABLE `recept`
  ADD CONSTRAINT `FK_B92268A11BDAEE1` FOREIGN KEY (`patienten_id`) REFERENCES `patienten` (`id`),
  ADD CONSTRAINT `FK_B92268A1DFC35CB` FOREIGN KEY (`medicijn_id`) REFERENCES `medicijnen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
