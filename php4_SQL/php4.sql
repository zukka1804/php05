-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2022 at 06:36 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testament`
--

-- --------------------------------------------------------

--
-- Table structure for table `testament_an_table`
--

CREATE TABLE `testament_an_table` (
  `id` int(12) NOT NULL,
  `number1` varchar(64) NOT NULL,
  `property1` varchar(64) NOT NULL,
  `relation1` varchar(64) NOT NULL,
  `name1` varchar(64) NOT NULL,
  `method1` varchar(64) NOT NULL,
  `number2` varchar(64) NOT NULL,
  `property2` varchar(64) NOT NULL,
  `relation2` varchar(64) NOT NULL,
  `name2` varchar(64) NOT NULL,
  `method2` varchar(64) NOT NULL,
  `number3` varchar(64) NOT NULL,
  `property3` varchar(64) NOT NULL,
  `relation3` varchar(64) NOT NULL,
  `name3` varchar(64) NOT NULL,
  `method3` varchar(64) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `group_name` varchar(64) NOT NULL,
  `group_address` text NOT NULL,
  `lawyer_name` varchar(64) NOT NULL,
  `lawyer_address` text NOT NULL,
  `lawyer_birth` varchar(64) NOT NULL,
  `ps` text NOT NULL,
  `testator_address` text NOT NULL,
  `testator_name` varchar(64) NOT NULL,
  `testator_birth` varchar(64) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testament_an_table`
--

INSERT INTO `testament_an_table` (`id`, `number1`, `property1`, `relation1`, `name1`, `method1`, `number2`, `property2`, `relation2`, `name2`, `method2`, `number3`, `property3`, `relation3`, `name3`, `method3`, `amount`, `group_name`, `group_address`, `lawyer_name`, `lawyer_address`, `lawyer_birth`, `ps`, `testator_address`, `testator_name`, `testator_birth`, `indate`) VALUES
(1, '2', '預貯金', '子', 'ｄｄｄｄ', '相続させる', '1', '預貯金', '子', 'あああ', '相続させる', '1', '自動車', '甥', 'ｌｌ', '相続させる', 9999999999, 'ああ', 'kk', 'kk', 'mmm', '2022-02-28', 'jj', 'ｖｓｓ', 'takahasi', '2022-02-23', '2022-02-03 07:36:05'),
(2, '', '', '', '', '相続させる', '', '', '', '', '相続させる', '', '', '', '', '相続させる', 0, '', 'cdd', '', '', '2022-02-08', '', '', 'ｐｐｐ', '', '2022-02-03 18:54:18'),
(3, '', '', '', '', '相続させる', '', '', '', '', '相続させる', '', '', '', '', '相続させる', 0, '', 'fkfmkmvsfvmr', '', '', '', '', '', '', '', '2022-02-03 18:54:30'),
(4, '', '', '', '', '相続させる', '', '', '', '', '相続させる', '', '', '', '', '相続させる', 0, '', '', '', '', '', '', '', '岡田', '', '2022-02-03 19:08:39'),
(5, '', '', '', '', '相続させる', '', '', '', '', '相続させる', '', '', '', '', '相続させる', 0, '', '', '', 'ｓｓｓｓ', '', '', '', '', '', '2022-02-03 19:13:48'),
(6, '', '', '', '', '相続させる', '', '', '', '', '相続させる', '', '', '', '', '相続させる', 0, '', '', '', 'ｓｓｓｓ', '', '', '', '', '', '2022-02-03 22:52:52'),
(7, '', '', '', '', '相続させる', '', '', '', '', '相続させる', '', '', '', '', '相続させる', 0, '', '', '', 'ｄｄｄ', '', '', '', '', '', '2022-02-04 07:22:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `testament_an_table`
--
ALTER TABLE `testament_an_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `testament_an_table`
--
ALTER TABLE `testament_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
