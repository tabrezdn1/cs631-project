-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2023 at 08:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zms`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `AName` varchar(50) DEFAULT NULL,
  `Astatus` varchar(255) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `enclosure_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `AName`, `Astatus`, `birth_year`, `species_id`, `enclosure_id`, `building_id`) VALUES
(1, 'Simba', 'Healthy', 2018, 1, 1, 1),
(2, 'Nala', 'Healthy', 2019, 1, 1, 1),
(3, 'Python', 'Healthy', 2017, 2, 4, 4),
(4, 'Boa', 'Healthy', 2016, 2, 4, 4),
(5, 'Eagle1', 'Healthy', 2015, 3, 5, 5),
(6, 'Eagle2', 'Healthy', 2016, 3, 5, 5),
(7, 'Goldfish1', 'Healthy', 2019, 4, 2, 2),
(8, 'Goldfish2', 'Healthy', 2020, 4, 2, 2),
(9, 'Frog1', 'Healthy', 2017, 5, 3, 3),
(10, 'Frog2', 'Healthy', 2018, 5, 3, 3),
(11, 'Butterfly1', 'Healthy', 2020, 6, 8, 8),
(12, 'Butterfly2', 'Healthy', 2019, 6, 8, 8),
(13, 'Tiger1', 'Healthy', 2018, 1, 7, 7),
(14, 'Tiger2', 'Healthy', 2019, 1, 7, 7),
(15, 'Giraffe1', 'Healthy', 2016, 5, 6, 6),
(16, 'Giraffe2', 'Healthy', 2017, 5, 6, 6),
(17, 'Ant1', 'Healthy', 2021, 6, 8, 8),
(18, 'Ant2', 'Healthy', 2022, 6, 8, 8),
(19, 'Kangaroo1', 'Healthy', 2017, 5, 7, 7),
(20, 'Kangaroo2', 'Healthy', 2018, 5, 7, 7),
(21, 'Lion3', 'Young', 2022, 1, 1, 1),
(22, 'Lion4', 'Sick', 2017, 1, 1, 1),
(23, 'Python3', 'Old', 2010, 2, 4, 4),
(24, 'Boa3', 'Healthy', 2015, 2, 4, 4),
(25, 'Eagle3', 'Young', 2021, 3, 5, 5),
(26, 'Eagle4', 'Sick', 2019, 3, 5, 5),
(27, 'Goldfish3', 'Old', 2008, 4, 2, 2),
(28, 'Goldfish4', 'Healthy', 2016, 4, 2, 2),
(29, 'Frog3', 'Young', 2023, 5, 3, 3),
(30, 'Frog4', 'Sick', 2015, 5, 3, 3),
(31, 'Butterfly3', 'Old', 2010, 6, 8, 8),
(32, 'Butterfly4', 'Healthy', 2018, 6, 8, 8),
(33, 'Tiger3', 'Young', 2020, 1, 7, 7),
(34, 'Tiger4', 'Sick', 2016, 1, 7, 7),
(35, 'Giraffe3', 'Old', 2009, 5, 6, 6),
(36, 'Giraffe4', 'Healthy', 2017, 5, 6, 6),
(37, 'Ant3', 'Young', 2022, 6, 8, 8),
(38, 'Ant4', 'Sick', 2013, 6, 8, 8),
(39, 'Kangaroo3', 'Old', 2007, 5, 7, 7),
(40, 'Kangaroo4', 'Healthy', 2015, 5, 7, 7),
(41, 'Lion5', 'Young', 2022, 1, 1, 1),
(42, 'Lion6', 'Old', 2010, 1, 1, 1),
(43, 'Python5', 'Sick', 2019, 2, 4, 4),
(44, 'Boa5', 'Young', 2021, 2, 4, 4),
(45, 'Eagle5', 'Sick', 2019, 3, 5, 5),
(46, 'Eagle6', 'Healthy', 2018, 3, 5, 5),
(47, 'Goldfish5', 'Young', 2020, 4, 2, 2),
(48, 'Goldfish6', 'Old', 2008, 4, 2, 2),
(49, 'Frog5', 'Sick', 2017, 5, 3, 3),
(50, 'Frog6', 'Young', 2023, 5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `building_id` int(11) NOT NULL,
  `Bname` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`building_id`, `Bname`, `type`) VALUES
(1, 'Savannah Pavilion', 'Animal Exhibit'),
(2, 'Coral Cove', 'Aquarium'),
(3, 'Primate Paradise', 'Animal Exhibit'),
(4, 'Reptile Realm', 'Reptile Exhibit'),
(5, 'Bird Haven', 'Bird Exhibit'),
(6, 'Insect Discovery Center', 'Insect Exhibit'),
(7, 'Main Entrance', 'Entrance'),
(8, 'Food Shops', 'Shop');

-- --------------------------------------------------------

--
-- Table structure for table `cares_for`
--

CREATE TABLE `cares_for` (
  `species_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cares_for`
--

INSERT INTO `cares_for` (`species_id`, `emp_id`) VALUES
(1, 1),
(1, 2),
(2, 8),
(2, 9),
(3, 5),
(3, 12),
(3, 32),
(4, 11),
(4, 19),
(5, 15),
(5, 25),
(6, 18),
(6, 32);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `hourly_rate_id` int(11) NOT NULL,
  `revenue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `first_name`, `middle_name`, `last_name`, `start_date`, `street`, `city`, `state`, `zip`, `job_type`, `sup_id`, `hourly_rate_id`, `revenue_id`) VALUES
(1, 'Alice', 'M.', 'Johnson', '2022-01-10', '123 Main St', 'Newark', 'NJ', '12345', 'Animal Care Specialist', 1, 1, 0),
(2, 'Bob', 'A.', 'Smith', '2022-02-15', '456 Oak St', 'Harrison', 'NJ', '67890', 'Veterinarian', 1, 2, 0),
(3, 'Charlie', 'L.', 'Williams', '2022-03-20', '789 Pine St', 'Kearny', 'NJ', '45678', 'Maintenance', 1, 3, 0),
(4, 'David', 'K.', 'Brown', '2022-04-25', '101 Elm St', 'Newark', 'NJ', '98765', 'Ticket Seller', 1, 4, 1),
(5, 'Eva', 'D.', 'Miller', '2022-05-30', '202 Maple St', 'Harrison', 'NJ', '34567', 'Animal Care Specialist', 1, 5, 0),
(6, 'Frank', 'S.', 'Jones', '2022-06-05', '303 Oak St', 'Newark', 'NJ', '23456', 'Customer Service', 2, 6, 6),
(7, 'Grace', 'P.', 'Anderson', '2022-07-10', '404 Pine St', 'Kearny', 'NJ', '87654', 'Maintenance', 3, 7, 0),
(8, 'Henry', 'R.', 'White', '2022-08-15', '505 Maple St', 'Harrison', 'NJ', '76543', 'Animal Care Specialist', 1, 8, 0),
(9, 'Ivy', 'T.', 'Lee', '2022-09-20', '606 Elm St', 'Newark', 'NJ', '65432', 'Veterinarian', 1, 9, 0),
(10, 'Jack', 'N.', 'Clark', '2022-10-25', '707 Oak St', 'Newark', 'NJ', '54321', 'Ticket Seller', 1, 1, 4),
(11, 'Olivia', 'S.', 'Taylor', '2022-11-01', '808 Elm St', 'Newark', 'NJ', '98765', 'Animal Care Specialist', 2, 10, 0),
(12, 'Peter', 'P.', 'Martin', '2022-12-06', '909 Pine St', 'Kearny', 'NJ', '87654', 'Veterinarian', 1, 9, 0),
(13, 'Quinn', 'R.', 'Roberts', '2023-01-11', '101 Oak St', 'Harrison', 'NJ', '76543', 'Maintenance', 3, 5, 0),
(14, 'Rachel', 'T.', 'Turner', '2023-02-16', '202 Maple St', 'Newark', 'NJ', '65432', 'Ticket Seller', 1, 4, 7),
(15, 'Samuel', 'W.', 'Wilson', '2023-03-21', '303 Elm St', 'Harrison', 'NJ', '54321', 'Animal Care Specialist', 1, 2, 0),
(16, 'Tina', 'L.', 'Lopez', '2023-04-26', '404 Pine St', 'Newark', 'NJ', '43210', 'Customer Service', 1, 1, 6),
(17, 'Ulysses', 'G.', 'Gomez', '2023-05-31', '505 Oak St', 'Kearny', 'NJ', '32109', 'Maintenance', 1, 1, 0),
(18, 'Victoria', 'H.', 'Harris', '2023-06-05', '606 Pine St', 'Newark', 'NJ', '21098', 'Animal Care Specialist', 1, 6, 0),
(19, 'William', 'E.', 'Evans', '2023-07-10', '707 Elm St', 'Harrison', 'NJ', '10987', 'Veterinarian', 1, 8, 0),
(20, 'Xavier', 'C.', 'Cooper', '2023-08-15', '808 Maple St', 'Newark', 'NJ', '09876', 'Ticket Seller', 1, 4, 5),
(21, 'Yasmine', 'F.', 'Fisher', '2023-09-20', '909 Oak St', 'Harrison', 'NJ', '98765', 'Animal Care Specialist', 2, 3, 0),
(22, 'Zachary', 'D.', 'Dixon', '2023-10-25', '101 Pine St', 'Newark', 'NJ', '87654', 'Customer Service', 1, 2, 2),
(23, 'Abigail', 'M.', 'Morrison', '2023-11-01', '202 Elm St', 'Kearny', 'NJ', '76543', 'Maintenance', 2, 1, 0),
(24, 'Benjamin', 'N.', 'Nelson', '2023-12-06', '303 Maple St', 'Newark', 'NJ', '65432', 'Animal Care Specialist', 3, 5, 0),
(25, 'Chloe', 'G.', 'Gordon', '2024-01-11', '404 Oak St', 'Harrison', 'NJ', '54321', 'Veterinarian', 1, 4, 0),
(26, 'Daniel', 'R.', 'Reynolds', '2024-02-16', '505 Elm St', 'Newark', 'NJ', '43210', 'Ticket Seller', 1, 2, 8),
(27, 'Emma', 'S.', 'Sullivan', '2024-03-21', '606 Pine St', 'Harrison', 'NJ', '32109', 'Animal Care Specialist', 1, 2, 0),
(28, 'Freddie', 'H.', 'Harrison', '2024-04-26', '707 Oak St', 'Newark', 'NJ', '21098', 'Customer Service', 1, 2, 2),
(29, 'Grace', 'C.', 'Cameron', '2024-05-31', '808 Elm St', 'Newark', 'NJ', '10987', 'Maintenance', 1, 2, 0),
(30, 'Henry', 'L.', 'Lawson', '2024-06-05', '909 Pine St', 'Kearny', 'NJ', '09876', 'Animal Care Specialist', 1, 3, 0),
(31, 'Alice', 'M.', 'Johnson', '2022-01-10', '123 Oak St', 'Newark', 'NJ', '12345', 'Animal Care Specialist', 1, 1, 0),
(32, 'Bob', 'L.', 'Smith', '2022-02-15', '456 Maple St', 'Harrison', 'NJ', '67890', 'Veterinarian', 1, 2, 0),
(33, 'Charlie', 'A.', 'Williams', '2022-03-20', '789 Pine St', 'Kearny', 'NJ', '45678', 'Maintenance', 1, 3, 0),
(34, 'David', 'K.', 'Miller', '2022-04-25', '101 Elm St', 'Newark', 'NJ', '98765', 'Ticket Seller', 1, 4, 4),
(35, 'Eva', 'P.', 'Brown', '2022-05-05', '202 Oak St', 'Harrison', 'NJ', '34567', 'Animal Care Specialist', 1, 5, 0),
(36, 'Frank', 'S.', 'Jones', '2022-06-10', '303 Maple St', 'Newark', 'NJ', '23456', 'Customer Service', 1, 6, 6),
(37, 'Grace', 'N.', 'Anderson', '2022-07-15', '404 Pine St', 'Kearny', 'NJ', '87654', 'Maintenance', 1, 7, 0),
(38, 'Holly', 'R.', 'White', '2022-08-20', '505 Elm St', 'Harrison', 'NJ', '76543', 'Veterinarian', 1, 8, 0),
(39, 'Ivan', 'T.', 'Lee', '2022-09-25', '606 Oak St', 'Newark', 'NJ', '65432', 'Ticket Seller', 1, 9, 9),
(40, 'Jack', 'N.', 'Taylor', '2022-10-30', '707 Maple St', 'Newark', 'NJ', '54321', 'Customer Service', 1, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `enclosures`
--

CREATE TABLE `enclosures` (
  `enclosure_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `sqft` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enclosures`
--

INSERT INTO `enclosures` (`enclosure_id`, `building_id`, `sqft`) VALUES
(1, 1, 1500.00),
(2, 2, 1200.00),
(3, 3, 800.00),
(4, 4, 1000.00),
(5, 5, 600.00),
(6, 6, 2000.00),
(7, 7, 1800.00),
(8, 8, 400.00);

-- --------------------------------------------------------

--
-- Table structure for table `hourly_rate`
--

CREATE TABLE `hourly_rate` (
  `hourly_rate_id` int(11) NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hourly_rate`
--

INSERT INTO `hourly_rate` (`hourly_rate_id`, `rate`) VALUES
(1, 25.00),
(2, 30.00),
(3, 35.00),
(4, 40.00),
(5, 45.00),
(6, 50.00),
(7, 55.00),
(8, 60.00),
(9, 65.00),
(10, 70.00);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `EmpID` int(5) NOT NULL,
  `Password` varchar(123) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Role` varchar(1) NOT NULL,
  `Salary` mediumtext NOT NULL,
  `SSN` varchar(9) NOT NULL,
  `HireDate` date NOT NULL DEFAULT curdate(),
  `LocID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`EmpID`, `Password`, `Name`, `Role`, `Salary`, `SSN`, `HireDate`, `LocID`) VALUES
(1250, '123', 'John', 'M', '50000', '123456789', '2023-04-21', 1),
(1251, '1234', 'Jack', 'M', '51000', '123456789', '2022-09-01', 2),
(1252, '1234', 'Mike', 'M', '51000', '123490789', '2020-06-14', 3),
(1253, '1234', 'Ram', 'M', '51000', '123456990', '2021-07-22', 4);

-- --------------------------------------------------------

--
-- Table structure for table `participates_in`
--

CREATE TABLE `participates_in` (
  `revenue_id` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `required_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenue_events`
--

CREATE TABLE `revenue_events` (
  `date_time` datetime NOT NULL,
  `revenue_id` int(11) NOT NULL,
  `revenue` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `revenue_events`
--

INSERT INTO `revenue_events` (`date_time`, `revenue_id`, `revenue`, `quantity`, `name`, `type`) VALUES
('2023-11-01 14:30:00', 2, 120.00, 6, 'Hot Dog', 'Concession'),
('2023-11-01 16:00:00', 7, 250.00, 12, 'Elephant Parade', 'Animal Show'),
('2023-11-01 17:30:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-02 11:30:00', 5, 90.00, 4, 'French Fries', 'Concession'),
('2023-11-02 13:00:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-11-02 15:00:00', 3, 150.00, 7, 'Bird Show', 'Animal Show'),
('2023-11-02 16:30:00', 8, 180.00, 9, 'Penguin Presentation', 'Animal Show'),
('2023-11-03 14:00:00', 6, 60.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-03 15:30:00', 5, 110.00, 5, 'French Fries', 'Concession'),
('2023-11-03 17:00:00', 1, 450.00, 22, 'General Admission', 'Zoo Admission'),
('2023-11-03 18:30:00', 8, 180.00, 9, 'Penguin Presentation', 'Animal Show'),
('2023-11-04 11:30:00', 25, 240.00, 12, 'Kangaroo Jump', 'Animal Show'),
('2023-11-04 13:00:00', 4, 50.00, 2, 'Zoo Membership', 'Zoo Admission'),
('2023-11-04 14:30:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-04 16:00:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-11-05 11:00:00', 2, 100.00, 5, 'Hot Dog', 'Concession'),
('2023-11-05 13:30:00', 24, 210.00, 10, 'Butterfly Exhibit', 'Animal Show'),
('2023-11-05 15:00:00', 6, 60.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-05 16:30:00', 13, 120.00, 6, 'Popcorn', 'Concession'),
('2023-11-06 12:00:00', 1, 400.00, 20, 'General Admission', 'Zoo Admission'),
('2023-11-06 14:30:00', 3, 150.00, 7, 'Bird Show', 'Animal Show'),
('2023-11-06 16:00:00', 15, 90.00, 4, 'Cotton Candy', 'Concession'),
('2023-11-06 17:30:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-07 11:30:00', 12, 80.00, 4, 'Soda', 'Concession'),
('2023-11-07 13:00:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-11-07 14:30:00', 16, 120.00, 6, 'Pretzel', 'Concession'),
('2023-11-07 16:00:00', 25, 200.00, 10, 'Kangaroo Jump', 'Animal Show'),
('2023-11-08 12:00:00', 4, 50.00, 2, 'Zoo Membership', 'Zoo Admission'),
('2023-11-08 13:30:00', 17, 100.00, 5, 'Nachos', 'Concession'),
('2023-11-08 15:00:00', 1, 480.00, 24, 'General Admission', 'Zoo Admission'),
('2023-11-08 16:30:00', 8, 180.00, 9, 'Penguin Presentation', 'Animal Show'),
('2023-11-09 11:00:00', 7, 250.00, 12, 'Elephant Parade', 'Animal Show'),
('2023-11-09 13:30:00', 6, 60.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-09 15:00:00', 15, 110.00, 5, 'Cotton Candy', 'Concession'),
('2023-11-09 16:30:00', 1, 450.00, 22, 'General Admission', 'Zoo Admission'),
('2023-11-10 12:00:00', 3, 150.00, 7, 'Bird Show', 'Animal Show'),
('2023-11-10 13:30:00', 24, 210.00, 10, 'Butterfly Exhibit', 'Animal Show'),
('2023-11-10 15:00:00', 4, 50.00, 2, 'Zoo Membership', 'Zoo Admission'),
('2023-11-10 16:30:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-11 11:00:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-11-11 13:30:00', 15, 120.00, 6, 'Cotton Candy', 'Concession'),
('2023-11-11 15:00:00', 20, 200.00, 10, 'Dolphin Show', 'Animal Show'),
('2023-11-11 16:30:00', 6, 60.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-12 10:00:00', 2, 120.00, 6, 'Hot Dog', 'Concession'),
('2023-11-12 11:30:00', 20, 250.00, 12, 'Dolphin Show', 'Animal Show'),
('2023-11-12 13:00:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-12 14:30:00', 5, 90.00, 4, 'French Fries', 'Concession'),
('2023-11-13 12:00:00', 1, 480.00, 24, 'General Admission', 'Zoo Admission'),
('2023-11-13 13:30:00', 11, 150.00, 7, 'Tiger Show', 'Animal Show'),
('2023-11-13 15:00:00', 20, 180.00, 9, 'Dolphin Show', 'Animal Show'),
('2023-11-13 16:30:00', 4, 50.00, 2, 'Zoo Membership', 'Zoo Admission'),
('2023-11-14 11:30:00', 14, 110.00, 5, 'Ice Cream', 'Concession'),
('2023-11-14 13:00:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-11-14 14:30:00', 8, 180.00, 9, 'Penguin Presentation', 'Animal Show'),
('2023-11-14 16:00:00', 7, 240.00, 12, 'Elephant Parade', 'Animal Show'),
('2023-11-15 10:00:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-15 11:30:00', 5, 90.00, 4, 'French Fries', 'Concession'),
('2023-11-15 13:00:00', 1, 480.00, 24, 'General Admission', 'Zoo Admission'),
('2023-11-15 14:30:00', 2, 120.00, 6, 'Hot Dog', 'Concession'),
('2023-11-16 12:00:00', 10, 250.00, 12, 'Giraffe Feeding', 'Animal Show'),
('2023-11-16 13:30:00', 4, 50.00, 2, 'Zoo Membership', 'Zoo Admission'),
('2023-11-16 15:00:00', 15, 110.00, 5, 'Cotton Candy', 'Concession'),
('2023-11-16 16:30:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-11-17 10:00:00', 3, 150.00, 7, 'Bird Show', 'Animal Show'),
('2023-11-17 11:30:00', 10, 180.00, 9, 'Giraffe Feeding', 'Animal Show'),
('2023-11-17 13:00:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-17 14:30:00', 5, 90.00, 4, 'French Fries', 'Concession'),
('2023-11-18 12:00:00', 1, 480.00, 24, 'General Admission', 'Zoo Admission'),
('2023-11-18 13:30:00', 2, 120.00, 6, 'Hot Dog', 'Concession'),
('2023-11-18 15:00:00', 25, 250.00, 12, 'Kangaroo Jump', 'Animal Show'),
('2023-11-18 16:30:00', 4, 50.00, 2, 'Zoo Membership', 'Zoo Admission'),
('2023-11-19 10:00:00', 15, 110.00, 5, 'Cotton Candy', 'Concession'),
('2023-11-19 11:30:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-11-19 13:00:00', 25, 180.00, 9, 'Kangaroo Jump', 'Animal Show'),
('2023-11-19 14:30:00', 7, 240.00, 12, 'Elephant Parade', 'Animal Show'),
('2023-11-20 09:00:00', 1, 400.00, 20, 'General Admission', 'Zoo Admission'),
('2023-11-20 10:30:00', 3, 150.00, 7, 'Bird Show', 'Animal Show'),
('2023-11-20 12:00:00', 10, 200.00, 10, 'Giraffe Feeding', 'Animal Show'),
('2023-11-20 13:30:00', 6, 60.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-21 11:00:00', 5, 90.00, 4, 'French Fries', 'Concession'),
('2023-11-21 12:30:00', 1, 450.00, 22, 'General Admission', 'Zoo Admission'),
('2023-11-21 14:00:00', 2, 120.00, 6, 'Hot Dog', 'Concession'),
('2023-11-21 15:30:00', 22, 250.00, 12, 'Monkey Business', 'Animal Show'),
('2023-11-22 14:00:00', 4, 50.00, 2, 'Zoo Membership', 'Zoo Admission'),
('2023-11-22 15:30:00', 5, 110.00, 5, 'French Fries', 'Concession'),
('2023-11-22 17:00:00', 1, 450.00, 22, 'General Admission', 'Zoo Admission'),
('2023-11-22 18:30:00', 22, 180.00, 9, 'Monkey Business', 'Animal Show'),
('2023-11-23 12:00:00', 4, 50.00, 2, 'Zoo Membership', 'Zoo Admission'),
('2023-11-23 13:30:00', 15, 90.00, 4, 'Cotton Candy', 'Concession'),
('2023-11-23 15:00:00', 1, 450.00, 22, 'General Admission', 'Zoo Admission'),
('2023-11-23 16:30:00', 21, 150.00, 7, 'Sea Lion Performance', 'Animal Show'),
('2023-11-24 11:30:00', 23, 180.00, 9, 'Panda Encountern', 'Animal Show'),
('2023-11-24 13:00:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-24 14:30:00', 17, 110.00, 5, 'Nachos', 'Concession'),
('2023-11-24 16:00:00', 1, 480.00, 24, 'General Admission', 'Zoo Admission'),
('2023-11-25 13:30:00', 8, 180.00, 9, 'Penguin Presentation', 'Animal Show'),
('2023-11-25 15:00:00', 7, 240.00, 12, 'Elephant Parade', 'Animal Show'),
('2023-11-25 16:30:00', 4, 50.00, 2, 'Zoo Membership', 'Zoo Admission'),
('2023-11-25 18:00:00', 5, 60.00, 3, 'French Fries', 'Concession'),
('2023-11-26 12:00:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-11-26 13:30:00', 16, 120.00, 6, 'Pretzel', 'Concession'),
('2023-11-26 15:00:00', 23, 180.00, 9, 'Panda Encounter', 'Animal Show'),
('2023-11-26 16:30:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-27 11:30:00', 5, 90.00, 4, 'French Fries', 'Concession'),
('2023-11-27 13:00:00', 1, 450.00, 22, 'General Admission', 'Zoo Admission'),
('2023-11-27 14:30:00', 21, 150.00, 7, 'Sea Lion Performance', 'Animal Show'),
('2023-11-27 16:00:00', 7, 240.00, 12, 'Elephant Parade', 'Animal Show'),
('2023-11-28 13:30:00', 4, 50.00, 2, 'Zoo Membership', 'Zoo Admission'),
('2023-11-28 15:00:00', 16, 110.00, 5, 'Pretzel', 'Concession'),
('2023-11-28 16:30:00', 1, 480.00, 24, 'General Admission', 'Zoo Admission'),
('2023-11-28 18:00:00', 23, 180.00, 9, 'Panda Encounter', 'Animal Show'),
('2023-11-29 12:00:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-29 13:30:00', 17, 110.00, 5, 'Nachos', 'Concession'),
('2023-11-29 15:00:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-11-29 16:30:00', 23, 180.00, 9, 'Panda Encounter', 'Animal Show'),
('2023-11-30 11:30:00', 25, 250.00, 12, 'Kangaroo Jump', 'Animal Show'),
('2023-11-30 13:00:00', 4, 50.00, 2, 'Zoo Membership', 'Zoo Admission'),
('2023-11-30 14:30:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-11-30 16:00:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-12-01 10:00:00', 23, 220.00, 10, 'Panda Encounter', 'Animal Show'),
('2023-12-01 12:00:00', 4, 60.00, 12, 'Zoo Membership', 'Zoo Admission'),
('2023-12-01 14:00:00', 12, 100.00, 40, 'Soda', 'Concession'),
('2023-12-01 16:00:00', 1, 400.00, 10, 'General Admission', 'Zoo Admission'),
('2023-12-02 11:30:00', 22, 150.00, 10, 'Monkey Business', 'Animal Show'),
('2023-12-02 13:30:00', 24, 250.00, 10, 'Butterfly Exhibit', 'Animal Show'),
('2023-12-02 15:30:00', 9, 80.00, 4, 'Reptile Encounter', 'Animal Show'),
('2023-12-02 17:30:00', 13, 120.00, 15, 'Popcorn', 'Concession'),
('2023-12-04 10:00:00', 6, 60.00, 2, 'Guided Tours', 'Zoo Admission'),
('2023-12-04 12:00:00', 5, 60.00, 15, 'French Fries', 'Concession'),
('2023-12-04 14:30:00', 1, 400.00, 20, 'General Admission', 'Zoo Admission'),
('2023-12-04 16:00:00', 3, 100.00, 5, 'Bird Show', 'Animal Show'),
('2023-12-05 14:30:00', 13, 80.00, 10, 'Popcorn', 'Concession'),
('2023-12-05 16:00:00', 7, 200.00, 10, 'Elephant Parade', 'Animal Show'),
('2023-12-05 17:30:00', 6, 80.00, 4, 'Guided Tours', 'Zoo Admission'),
('2023-12-05 19:00:00', 1, 350.00, 18, 'General Admission', 'Zoo Admission'),
('2023-12-06 11:30:00', 5, 120.00, 30, 'French Fries', 'Concession'),
('2023-12-06 13:00:00', 1, 400.00, 10, 'General Admission', 'Zoo Admission'),
('2023-12-06 15:00:00', 3, 120.00, 6, 'Bird Show', 'Animal Show'),
('2023-12-06 16:30:00', 8, 160.00, 7, 'Penguin Presentation', 'Animal Show'),
('2023-12-07 10:00:00', 7, 200.00, 10, 'Elephant Parade', 'Animal Show'),
('2023-12-07 11:30:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-12-07 13:00:00', 14, 90.00, 14, 'Ice Cream', 'Concession'),
('2023-12-08 14:30:00', 2, 120.00, 24, 'Hot Dog', 'Concession'),
('2023-12-08 16:00:00', 7, 250.00, 12, 'Elephant Parade', 'Animal Show'),
('2023-12-08 17:30:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-12-09 11:30:00', 5, 90.00, 4, 'French Fries', 'Concession'),
('2023-12-09 13:00:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-12-09 15:00:00', 21, 150.00, 7, 'Sea Lion Performance', 'Animal Show'),
('2023-12-09 16:30:00', 8, 180.00, 9, 'Penguin Presentation', 'Animal Show'),
('2023-12-10 14:30:00', 2, 120.00, 6, 'Hot Dog', 'Concession'),
('2023-12-10 16:00:00', 25, 250.00, 12, 'Kangaroo Jump', 'Animal Show'),
('2023-12-10 17:30:00', 6, 70.00, 3, 'Guided Tours', 'Zoo Admission'),
('2023-12-11 10:00:00', 5, 90.00, 4, 'French Fries', 'Concession'),
('2023-12-11 11:30:00', 1, 420.00, 21, 'General Admission', 'Zoo Admission'),
('2023-12-11 13:00:00', 21, 150.00, 7, 'Sea Lion Performance', 'Animal Show'),
('2023-12-11 14:30:00', 25, 180.00, 9, 'Kangaroo Jump', 'Animal Show');

-- --------------------------------------------------------

--
-- Table structure for table `revenue_types`
--

CREATE TABLE `revenue_types` (
  `revenue_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Rtype` varchar(255) NOT NULL,
  `building_id` int(11) NOT NULL,
  `senior_price` decimal(10,2) NOT NULL,
  `adult_price` decimal(10,2) NOT NULL,
  `child_price` decimal(10,2) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `shows_per_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `revenue_types`
--

INSERT INTO `revenue_types` (`revenue_id`, `name`, `Rtype`, `building_id`, `senior_price`, `adult_price`, `child_price`, `product_price`, `shows_per_day`) VALUES
(1, 'General Admission', 'Zoo Admission', 7, 20.00, 40.00, 15.00, 0.00, 5),
(2, 'Hot Dog', 'Concession', 8, 0.00, 0.00, 0.00, 5.00, 0),
(3, 'Bird Show', 'Animal Show', 5, 25.00, 50.00, 20.00, 0.00, 3),
(4, 'Zoo Membership', 'Zoo Admission', 7, 5.00, 5.00, 0.00, 0.00, 0),
(5, 'French Fries', 'Concession', 8, 0.00, 0.00, 0.00, 4.00, 0),
(6, 'Guided Tours', 'Zoo Admission', 7, 15.00, 30.00, 10.00, 0.00, 2),
(7, 'Elephant Parade', 'Animal Show', 1, 25.00, 50.00, 20.00, 0.00, 3),
(8, 'Penguin Presentation', 'Animal Show', 3, 10.00, 25.00, 8.00, 0.00, 2),
(9, 'Reptile Encounter', 'Animal Show', 4, 15.00, 30.00, 10.00, 0.00, 2),
(10, 'Giraffe Feeding', 'Animal Show', 1, 10.00, 20.00, 8.00, 0.00, 2),
(11, 'Tiger Show', 'Animal Show', 3, 20.00, 40.00, 15.00, 0.00, 3),
(12, 'Soda', 'Concession', 8, 0.00, 0.00, 0.00, 2.50, 0),
(13, 'Popcorn', 'Concession', 8, 0.00, 0.00, 0.00, 8.00, 0),
(14, 'Ice Cream', 'Concession', 8, 0.00, 0.00, 0.00, 5.00, 0),
(15, 'Cotton Candy', 'Concession', 8, 0.00, 0.00, 0.00, 4.00, 0),
(16, 'Pretzel', 'Concession', 8, 0.00, 0.00, 0.00, 6.00, 0),
(17, 'Nachos', 'Concession', 8, 0.00, 0.00, 0.00, 7.50, 0),
(18, 'Hot Chocolate', 'Concession', 8, 0.00, 0.00, 0.00, 3.00, 0),
(19, 'Candy Bar', 'Concession', 8, 0.00, 0.00, 0.00, 2.00, 0),
(20, 'Dolphin Show', 'Animal Show', 2, 30.00, 60.00, 25.00, 0.00, 4),
(21, 'Sea Lion Performance', 'Animal Show', 2, 25.00, 50.00, 20.00, 0.00, 3),
(22, 'Monkey Business', 'Animal Show', 1, 18.00, 35.00, 15.00, 0.00, 2),
(23, 'Panda Encounter', 'Animal Show', 3, 22.00, 45.00, 18.00, 0.00, 3),
(24, 'Butterfly Exhibit', 'Animal Show', 6, 12.00, 25.00, 10.00, 0.00, 2),
(25, 'Kangaroo Jump', 'Animal Show', 1, 15.00, 30.00, 12.00, 0.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `species_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `food_cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`species_id`, `name`, `food_cost`) VALUES
(1, 'Mammals', 100.00),
(2, 'Reptiles', 50.00),
(3, 'Birds', 30.00),
(4, 'Fish', 80.00),
(5, 'Amphibians', 60.00),
(6, 'Insects', 40.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `species_id` (`species_id`),
  ADD KEY `enclosure_id` (`enclosure_id`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `cares_for`
--
ALTER TABLE `cares_for`
  ADD PRIMARY KEY (`species_id`,`emp_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `enclosures`
--
ALTER TABLE `enclosures`
  ADD PRIMARY KEY (`enclosure_id`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `hourly_rate`
--
ALTER TABLE `hourly_rate`
  ADD PRIMARY KEY (`hourly_rate_id`);

--
-- Indexes for table `participates_in`
--
ALTER TABLE `participates_in`
  ADD PRIMARY KEY (`revenue_id`,`species_id`),
  ADD KEY `species_id` (`species_id`);

--
-- Indexes for table `revenue_events`
--
ALTER TABLE `revenue_events`
  ADD PRIMARY KEY (`date_time`);

--
-- Indexes for table `revenue_types`
--
ALTER TABLE `revenue_types`
  ADD PRIMARY KEY (`revenue_id`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`species_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `enclosures`
--
ALTER TABLE `enclosures`
  MODIFY `enclosure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hourly_rate`
--
ALTER TABLE `hourly_rate`
  MODIFY `hourly_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `revenue_types`
--
ALTER TABLE `revenue_types`
  MODIFY `revenue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `species_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `species` (`species_id`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`enclosure_id`) REFERENCES `enclosures` (`enclosure_id`),
  ADD CONSTRAINT `animal_ibfk_3` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`building_id`);

--
-- Constraints for table `cares_for`
--
ALTER TABLE `cares_for`
  ADD CONSTRAINT `cares_for_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `species` (`species_id`),
  ADD CONSTRAINT `cares_for_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `enclosures`
--
ALTER TABLE `enclosures`
  ADD CONSTRAINT `enclosures_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`building_id`);

--
-- Constraints for table `participates_in`
--
ALTER TABLE `participates_in`
  ADD CONSTRAINT `participates_in_ibfk_1` FOREIGN KEY (`revenue_id`) REFERENCES `revenue_types` (`revenue_id`),
  ADD CONSTRAINT `participates_in_ibfk_2` FOREIGN KEY (`species_id`) REFERENCES `species` (`species_id`);

--
-- Constraints for table `revenue_types`
--
ALTER TABLE `revenue_types`
  ADD CONSTRAINT `revenue_types_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`building_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
