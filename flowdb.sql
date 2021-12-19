-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2019 at 01:06 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `flowtable`
--

CREATE DATABASE IF NOT EXISTS flowdb;

CREATE TABLE `flowtable` (
  `id` int(11) NOT NULL,
  `json_data` text NOT NULL,
  `created_date` date DEFAULT NULL,
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flowtable`
--

INSERT INTO `flowtable` (`id`, `json_data`, `created_date`, `modified_date`) VALUES
(15, '{\"operators\":{\"A\":{\"top\":40,\"left\":20,\"properties\":{\"title\":\"A\",\"class\":\"dashclass\",\"inputs\":{},\"outputs\":{\"ao1\":{\"label\":\"a1\"},\"ao2\":{\"label\":\"a2\"},\"ao3\":{\"label\":\"a3\"}}}},\"B\":{\"top\":0,\"left\":500,\"properties\":{\"title\":\"B\",\"class\":\"searclass\",\"inputs\":{\"bi1\":{\"label\":\"b1\"},\"bi2\":{\"label\":\"b2\"}},\"outputs\":{\"bo1\":{\"label\":\"b1\"},\"bo2\":{\"label\":\"b2\"}}}},\"C\":{\"top\":120,\"left\":900,\"properties\":{\"title\":\"C\",\"class\":\"proclass\",\"inputs\":{\"ci1\":{\"label\":\"c1\",\"multipleLinks\":true}},\"outputs\":{}}}},\"links\":{\"0\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao3\",\"fromSubConnector\":0,\"toOperator\":\"B\",\"toConnector\":\"bi2\",\"toSubConnector\":0},\"1\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao2\",\"toOperator\":\"B\",\"toConnector\":\"bi1\"},\"3\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo1\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"},\"4\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo2\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"},\"5\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao1\",\"fromSubConnector\":0,\"toOperator\":\"C\",\"toConnector\":\"ci1\",\"toSubConnector\":0}},\"operatorTypes\":{}}', NULL, NULL),
(16, '{\"operators\":{\"A\":{\"top\":40,\"left\":20,\"properties\":{\"title\":\"A\",\"class\":\"dashclass\",\"inputs\":{},\"outputs\":{\"ao1\":{\"label\":\"a1\"},\"ao2\":{\"label\":\"a2\"},\"ao3\":{\"label\":\"a3\"}}}},\"B\":{\"top\":0,\"left\":500,\"properties\":{\"title\":\"B\",\"class\":\"searclass\",\"inputs\":{\"bi1\":{\"label\":\"b1\"},\"bi2\":{\"label\":\"b2\"}},\"outputs\":{\"bo1\":{\"label\":\"b1\"},\"bo2\":{\"label\":\"b2\"}}}},\"C\":{\"top\":120,\"left\":900,\"properties\":{\"title\":\"C\",\"class\":\"proclass\",\"inputs\":{\"ci1\":{\"label\":\"c1\",\"multipleLinks\":true}},\"outputs\":{}}}},\"links\":{\"1\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao2\",\"toOperator\":\"B\",\"toConnector\":\"bi1\"},\"2\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao3\",\"fromSubConnector\":0,\"toOperator\":\"C\",\"toConnector\":\"ci1\",\"toSubConnector\":0},\"3\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo1\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"},\"4\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo2\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"},\"5\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao1\",\"fromSubConnector\":0,\"toOperator\":\"C\",\"toConnector\":\"ci1\",\"toSubConnector\":0}},\"operatorTypes\":{}}', NULL, NULL),
(17, '{\"operators\":{\"A\":{\"top\":40,\"left\":20,\"properties\":{\"title\":\"A\",\"class\":\"dashclass\",\"inputs\":{},\"outputs\":{\"ao1\":{\"label\":\"a1\"},\"ao2\":{\"label\":\"a2\"},\"ao3\":{\"label\":\"a3\"}}}},\"B\":{\"top\":0,\"left\":500,\"properties\":{\"title\":\"B\",\"class\":\"searclass\",\"inputs\":{\"bi1\":{\"label\":\"b1\"},\"bi2\":{\"label\":\"b2\"}},\"outputs\":{\"bo1\":{\"label\":\"b1\"},\"bo2\":{\"label\":\"b2\"}}}},\"C\":{\"top\":120,\"left\":900,\"properties\":{\"title\":\"C\",\"class\":\"proclass\",\"inputs\":{\"ci1\":{\"label\":\"c1\",\"multipleLinks\":true}},\"outputs\":{}}}},\"links\":{\"1\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao2\",\"toOperator\":\"B\",\"toConnector\":\"bi1\"},\"2\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao1\",\"fromSubConnector\":0,\"toOperator\":\"B\",\"toConnector\":\"bi2\",\"toSubConnector\":0},\"3\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo1\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"},\"4\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo2\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"}},\"operatorTypes\":{}}', NULL, NULL),
(23, '{\"operators\":{\"A\":{\"top\":40,\"left\":20,\"properties\":{\"title\":\"A\",\"class\":\"dashclass\",\"inputs\":{},\"outputs\":{\"ao1\":{\"label\":\"a1\"},\"ao2\":{\"label\":\"a2\"},\"ao3\":{\"label\":\"a3\"}}}},\"B\":{\"top\":0,\"left\":500,\"properties\":{\"title\":\"B\",\"class\":\"searclass\",\"inputs\":{\"bi1\":{\"label\":\"b1\"},\"bi2\":{\"label\":\"b2\"}},\"outputs\":{\"bo1\":{\"label\":\"b1\"},\"bo2\":{\"label\":\"b2\"}}}},\"C\":{\"top\":120,\"left\":900,\"properties\":{\"title\":\"C\",\"class\":\"proclass\",\"inputs\":{\"ci1\":{\"label\":\"c1\",\"multipleLinks\":true}},\"outputs\":{}}}},\"links\":{\"0\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao3\",\"fromSubConnector\":0,\"toOperator\":\"B\",\"toConnector\":\"bi2\",\"toSubConnector\":0},\"1\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao2\",\"toOperator\":\"B\",\"toConnector\":\"bi1\"},\"3\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo1\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"},\"4\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo2\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"},\"5\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao1\",\"fromSubConnector\":0,\"toOperator\":\"C\",\"toConnector\":\"ci1\",\"toSubConnector\":0}},\"operatorTypes\":{}}', NULL, NULL),
(24, '{\"operators\":{\"A\":{\"top\":60,\"left\":500,\"properties\":{\"title\":\"A\",\"class\":\"dashclass\",\"inputs\":{},\"outputs\":{\"ao1\":{\"label\":\"a1\"},\"ao2\":{\"label\":\"a2\"},\"ao3\":{\"label\":\"a3\"}}}},\"B\":{\"top\":320,\"left\":160,\"properties\":{\"title\":\"B\",\"class\":\"searclass\",\"inputs\":{\"bi1\":{\"label\":\"b1\"},\"bi2\":{\"label\":\"b2\"}},\"outputs\":{\"bo1\":{\"label\":\"b1\"},\"bo2\":{\"label\":\"b2\"}}}},\"C\":{\"top\":400,\"left\":800,\"properties\":{\"title\":\"C\",\"class\":\"proclass\",\"inputs\":{\"ci1\":{\"label\":\"c1\",\"multipleLinks\":true}},\"outputs\":{}}}},\"links\":{\"0\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao3\",\"fromSubConnector\":0,\"toOperator\":\"B\",\"toConnector\":\"bi2\",\"toSubConnector\":0},\"1\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao2\",\"toOperator\":\"B\",\"toConnector\":\"bi1\"},\"3\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo1\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"},\"4\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo2\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"},\"5\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao1\",\"fromSubConnector\":0,\"toOperator\":\"C\",\"toConnector\":\"ci1\",\"toSubConnector\":0}},\"operatorTypes\":{}}', NULL, NULL),
(26, '{\"operators\":{\"A\":{\"top\":60,\"left\":40,\"properties\":{\"title\":\"A\",\"class\":\"dashclass\",\"inputs\":{},\"outputs\":{\"ao1\":{\"label\":\"a1\"},\"ao2\":{\"label\":\"a2\"},\"ao3\":{\"label\":\"a3\"}}}},\"B\":{\"top\":0,\"left\":540,\"properties\":{\"title\":\"B\",\"class\":\"searclass\",\"inputs\":{\"bi1\":{\"label\":\"b1\"},\"bi2\":{\"label\":\"b2\"}},\"outputs\":{\"bo1\":{\"label\":\"b1\"},\"bo2\":{\"label\":\"b2\"}}}},\"C\":{\"top\":400,\"left\":800,\"properties\":{\"title\":\"C\",\"class\":\"proclass\",\"inputs\":{\"ci1\":{\"label\":\"c1\",\"multipleLinks\":true}},\"outputs\":{}}}},\"links\":{\"2\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao1\",\"fromSubConnector\":0,\"toOperator\":\"B\",\"toConnector\":\"bi1\",\"toSubConnector\":0},\"3\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo1\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"},\"4\":{\"fromOperator\":\"B\",\"fromConnector\":\"bo2\",\"toOperator\":\"C\",\"toConnector\":\"ci1\"},\"5\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao2\",\"fromSubConnector\":0,\"toOperator\":\"C\",\"toConnector\":\"ci1\",\"toSubConnector\":0},\"6\":{\"fromOperator\":\"A\",\"fromConnector\":\"ao3\",\"fromSubConnector\":0,\"toOperator\":\"C\",\"toConnector\":\"ci1\",\"toSubConnector\":0}},\"operatorTypes\":{}}', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flowtable`
--
ALTER TABLE `flowtable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flowtable`
--
ALTER TABLE `flowtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
