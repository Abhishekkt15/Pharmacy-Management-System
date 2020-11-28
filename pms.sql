-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 07:59 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `total_revenue` (OUT `total_revenue` INT)  SELECT sum(tax) INTO total_revenue FROM invoice$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` tinyint(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `date`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cashier_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(2, 'Nitya', 'shree', '1', 'Tumkur', '9745623123', 'nithya24apr@gmail.co', 'nithya', 'nithya', '2017-11-01 09:36:27'),
(5, 'Pramod Kumar', 'D', '4', 'Mysore', '8694867733', 'pp@gmail.com', 'pramod', 'pramod', '2017-11-07 22:27:08'),
(6, 'abc', 'def', '125', 'gh', '9874563210', 'abc@gmail.com', 'abc', 'abc', '2019-10-01 08:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` tinyint(5) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `drug_id` tinyint(5) NOT NULL,
  `drug_name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `drug_id`, `drug_name`, `quantity`, `cost`, `tax`) VALUES
(1, 'Abhi', 1, 'Piriton', 20, 5, 0),
(2, 'Vinay', 3, 'Dual Cotexin', 30, 120, 0),
(3, 'Gowda', 4, 'Naproxen', 10, 250, 0),
(4, 'Pramod', 1, 'Piriton', 20, 300, 15),
(8, 'nnnnn', 1, 'bbbbb', 5, 5000, 250),
(9, 'RS', 1, 'Pirition', 20, 5, 0),
(10, 'abc', 1, 'Piriton', 30, 10, 1),
(11, 'Gowda', 1, 'Piriton', 30, 100, 5);

--
-- Triggers `invoice`
--
DELIMITER $$
CREATE TRIGGER `tax` BEFORE INSERT ON `invoice` FOR EACH ROW set new.tax=(new.cost*0.05)*1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(1, 'Vinay Kumar', 'Gowda', '1', 'Tumkur', '8523697410', 'vinay@gmail.com', 'vinay', 'vinay', '2017-10-20 07:52:15'),
(2, 'Dileep Kumar', 'H R', '4', 'Mysore', '9874563210', 'Dileep@gmail.com', 'dileep', 'dileep', '2017-11-07 21:30:42'),
(3, 'abhishek', 'gowda', '124', 'dfgkh', '7894561230', 'b@gmail.com', 'a', 'a', '2019-10-01 08:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` tinyint(5) NOT NULL,
  `invoice_no` tinyint(5) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_ammount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `invoice_no`, `customer_name`, `payment_type`, `total_ammount`) VALUES
(2, 2, 'vinay', 'credit', 200),
(3, 3, 'Gowda', 'cash', 250),
(4, 3, 'A', 'cash', 300),
(5, 2, 'B', 'credit', 100);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `pharmacist_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pharmacist_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(2, 'Abhishek', 'K T', '1', 'Tumkur', '7848827970', 'abhi@gmail.com', 'abhi', 'abhi', '2017-11-03 17:25:50'),
(9, 'Anil', 'Kumar', '25', 'Tumkur', '9874563210', 'anil@gmail.com', 'anil', 'anil', '2017-11-07 21:27:31'),
(10, 'abhishek', 'vinay', '123', 'tumkur', '7848827970', 'abhi@gmail.com', 'kt', 'kt', '2019-10-01 08:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` tinyint(5) NOT NULL,
  `drug_id` tinyint(5) NOT NULL,
  `drug_name` varchar(20) NOT NULL,
  `strength` varchar(10) NOT NULL,
  `dose` varchar(10) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `drug_id`, `drug_name`, `strength`, `dose`, `quantity`) VALUES
(1, 1, 'Piriton', '10 gms', '1x2', 10),
(4, 1, 'Piriton', '10 gms', '1x2', 20),
(6, 1, 'Piriton', '10 gms', '1x2', 50),
(7, 1, 'Piriton', '20 gms', '3x3', 50);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` tinyint(5) NOT NULL,
  `drug_name` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `company` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `date_supplied` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `drug_name`, `category`, `description`, `company`, `quantity`, `cost`, `date_supplied`) VALUES
(1, 'Piriton', 'Tablet', 'Pain Killer', 'SB', 1000, 5, '2017-11-03'),
(3, 'Dual Cotexin', 'Tablet', 'Maleria', 'GX', 150, 120, '2017-11-03'),
(4, 'Naproxen', 'Tablet', 'Reproductive', 'SB', 250, 250, '2017-11-03'),
(5, 'Flagi', 'Tablet', 'Digestive', 'GX', 650, 15, '2017-11-03'),
(6, 'Actal', 'Tablet', 'Stomach Reliev', 'GX', 1000, 2, '2017-11-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`),
  ADD KEY `drug_id` (`drug_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`),
  ADD KEY `drug_id` (`drug_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `pharmacist_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `idrugid` FOREIGN KEY (`drug_id`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `pinvoice_no` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `pdrugid` FOREIGN KEY (`drug_id`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
