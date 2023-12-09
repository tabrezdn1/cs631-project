-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 07:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `enclosure_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `status`, `birth_year`, `species_id`, `enclosure_id`, `building_id`) VALUES
(23, 'Sick', 2018, 3, 3, 3),
(24, 'Healthy', 2016, 4, 4, 4),
(25, 'Young', 2022, 5, 5, 5),
(26, 'Healthy', 2014, 6, 6, 6),
(27, 'Old', 2010, 7, 7, 7),
(28, 'Young', 2021, 8, 8, 8),
(29, 'Healthy', 2017, 9, 9, 9),
(30, 'Sick', 2019, 10, 10, 10),
(31, 'Healthy', 2013, 11, 11, 11),
(32, 'Young', 2023, 12, 12, 12),
(33, 'Healthy', 2016, 13, 13, 13),
(34, 'Old', 2009, 14, 14, 14),
(35, 'Young', 2020, 15, 15, 15),
(36, 'Healthy', 2012, 16, 16, 16),
(37, 'Sick', 2018, 17, 17, 17),
(38, 'Young', 2024, 18, 18, 18),
(39, 'Healthy', 2011, 19, 19, 19),
(40, 'Old', 2008, 20, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `building_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`building_id`, `name`, `type`) VALUES
(1, 'Main Zoo Building', 'Exhibit'),
(2, 'Aviary', 'Aviary'),
(3, 'Aquarium', 'Aquatic'),
(4, 'Reptile House', 'Exhibit'),
(5, 'Primate Pavilion', 'Exhibit'),
(6, 'Penguin Paradise', 'Exhibit'),
(7, 'Big Cat Complex', 'Exhibit'),
(8, 'Tropical Rainforest', 'Exhibit'),
(9, 'Children\'s Zoo', 'Interactive'),
(10, 'Safari Lodge', 'Exhibit'),
(11, 'Insect Kingdom', 'Exhibit'),
(12, 'Marine Mammal Pavilion', 'Aquatic'),
(13, 'Arctic Zone', 'Exhibit'),
(14, 'Australian Outback', 'Exhibit'),
(15, 'African Savannah', 'Exhibit'),
(16, 'Asian Jungle', 'Exhibit'),
(17, 'North American Wilderness', 'Exhibit'),
(18, 'Panda Pavilion', 'Exhibit'),
(19, 'Bear Country', 'Exhibit'),
(20, 'Birds of Prey Center', 'Aviary');

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
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(5) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone_Number` varchar(10) NOT NULL,
  `Credit_Card_No` varchar(16) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Name`, `Address`, `Phone_Number`, `Credit_Card_No`, `Email`, `Password`, `Username`) VALUES
(1, 'Pranit', '14 Kingsland Ave', '6468759916', '7745554897856612', 'pranitmenkar24@gmail.com', 'admin', 'pranitm24');

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
(1, 'John', 'Doe', 'Smith', '2023-01-01', '123 Main St', 'Cityville', 'CA', '12345', 'Manager', NULL, 1, 1),
(2, 'Jane', 'E.', 'Johnson', '2023-02-15', '456 Oak St', 'Townsville', 'NY', '67890', 'Assistant', 1, 2, 2),
(3, 'Robert', 'A.', 'Williams', '2023-03-10', '789 Pine St', 'Villagetown', 'TX', '56789', 'Caretaker', 1, 1, 3),
(4, 'Emily', 'B.', 'Jones', '2023-04-20', '101 Cedar St', 'Hamletville', 'FL', '34567', 'Trainer', 2, 2, 4),
(5, 'Michael', 'C.', 'Brown', '2023-05-05', '202 Maple St', 'Ruraltown', 'GA', '23456', 'Caretaker', 2, 1, 5),
(6, 'Amanda', 'M.', 'Davis', '2023-06-15', '303 Birch St', 'Suburbia', 'CA', '67890', 'Trainer', 1, 2, 6),
(7, 'Christopher', 'D.', 'Miller', '2023-07-20', '404 Redwood St', 'Cityburg', 'NY', '12345', 'Caretaker', 1, 1, 7),
(8, 'Jessica', 'R.', 'Martinez', '2023-08-10', '505 Elm St', 'Villageland', 'TX', '56789', 'Trainer', 2, 2, 8),
(9, 'David', 'S.', 'Garcia', '2023-09-25', '606 Oak St', 'Townsville', 'FL', '34567', 'Assistant', 2, 1, 9),
(10, 'Sarah', 'K.', 'Rodriguez', '2023-10-15', '707 Pine St', 'Cityville', 'GA', '23456', 'Trainer', 1, 2, 10),
(11, 'Andrew', 'L.', 'Hernandez', '2023-11-05', '808 Cedar St', 'Ruraltown', 'CA', '67890', 'Caretaker', 2, 1, 11),
(12, 'Olivia', 'P.', 'Lopez', '2023-12-10', '909 Birch St', 'Suburbia', 'NY', '12345', 'Trainer', 1, 2, 12),
(13, 'Daniel', 'Q.', 'Taylor', '2024-01-20', '123 Spruce St', 'Villagetown', 'TX', '56789', 'Manager', NULL, 2, 13),
(14, 'Sophia', 'N.', 'Smith', '2024-02-28', '234 Cedar St', 'Hamletville', 'FL', '34567', 'Assistant', 1, 1, 14),
(15, 'William', 'E.', 'Anderson', '2024-03-15', '345 Oak St', 'Cityburg', 'GA', '23456', 'Caretaker', 1, 2, 15),
(16, 'Isabella', 'F.', 'White', '2024-04-25', '456 Maple St', 'Villageland', 'CA', '67890', 'Trainer', 2, 1, 16),
(17, 'Ethan', 'G.', 'Thomas', '2024-05-10', '567 Pine St', 'Suburbia', 'NY', '12345', 'Caretaker', 2, 2, 17),
(18, 'Mia', 'H.', 'Jackson', '2024-06-20', '678 Cedar St', 'Cityville', 'TX', '56789', 'Trainer', 1, 1, 18),
(19, 'Alexander', 'I.', 'Martin', '2024-07-05', '789 Birch St', 'Townsville', 'FL', '34567', 'Manager', NULL, 2, 19),
(20, 'Abigail', 'J.', 'Harris', '2024-08-15', '890 Oak St', 'Ruraltown', 'GA', '23456', 'Assistant', 1, 1, 20);

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
(1, 1, 5000.00),
(2, 2, 3000.00),
(3, 3, 7000.00),
(4, 4, 4000.00),
(5, 5, 5500.00),
(6, 6, 2500.00),
(7, 7, 6000.00),
(8, 8, 4500.00),
(9, 9, 3500.00),
(10, 10, 8000.00),
(11, 11, 2000.00),
(12, 12, 9000.00),
(13, 13, 5000.00),
(14, 14, 7000.00),
(15, 15, 6000.00),
(16, 16, 5500.00),
(17, 17, 4500.00),
(18, 18, 3500.00),
(19, 19, 4000.00),
(20, 20, 3000.00);

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
(1, 15.50),
(2, 18.75),
(3, 20.00),
(4, 22.50),
(5, 25.00),
(6, 30.00),
(7, 35.75),
(8, 40.00),
(9, 45.25),
(10, 50.00),
(11, 55.25),
(12, 60.00),
(13, 65.50),
(14, 70.00),
(15, 75.25),
(16, 80.00),
(17, 85.50),
(18, 90.00),
(19, 95.25),
(20, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
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
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`EmpID`, `Password`, `Name`, `Role`, `Salary`, `SSN`, `HireDate`, `LocID`) VALUES
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

--
-- Dumping data for table `participates_in`
--

INSERT INTO `participates_in` (`revenue_id`, `species_id`, `required_no`) VALUES
(1, 1, 2),
(1, 2, 3),
(2, 5, 2),
(2, 6, 2),
(3, 8, 1),
(4, 12, 2),
(4, 13, 2),
(5, 16, 1),
(6, 3, 2),
(6, 4, 2),
(7, 7, 1),
(8, 9, 1),
(8, 10, 2),
(9, 11, 1),
(10, 14, 2),
(11, 17, 1),
(11, 18, 2),
(12, 19, 2),
(13, 20, 1),
(14, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `revenue_events`
--

CREATE TABLE `revenue_events` (
  `date_time` datetime NOT NULL,
  `revenue_id` int(11) NOT NULL,
  `revenue` decimal(10,2) NOT NULL,
  `tickets_sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `revenue_events`
--

INSERT INTO `revenue_events` (`date_time`, `revenue_id`, `revenue`, `tickets_sold`) VALUES
('2023-01-15 12:00:00', 1, 5000.00, 100),
('2023-02-28 14:30:00', 2, 7500.00, 150),
('2023-03-10 10:45:00', 3, 3000.00, 60),
('2023-04-05 15:20:00', 4, 4500.00, 90),
('2023-05-20 11:30:00', 5, 6000.00, 120),
('2023-06-15 14:00:00', 6, 3500.00, 70),
('2023-07-08 13:15:00', 7, 4800.00, 96),
('2023-08-25 12:45:00', 8, 5200.00, 104),
('2023-09-10 09:30:00', 9, 4200.00, 84),
('2023-10-15 16:00:00', 10, 6800.00, 136),
('2023-11-30 13:30:00', 11, 3000.00, 60),
('2023-12-20 10:00:00', 12, 5500.00, 110),
('2024-01-05 14:45:00', 13, 8000.00, 160),
('2024-02-18 12:20:00', 14, 4200.00, 84),
('2024-03-10 15:50:00', 15, 6000.00, 120),
('2024-04-25 11:15:00', 16, 7500.00, 150),
('2024-05-15 10:00:00', 17, 4800.00, 96),
('2024-06-20 14:30:00', 18, 5200.00, 104),
('2024-07-05 13:00:00', 19, 6800.00, 136),
('2024-08-15 16:45:00', 20, 3000.00, 60);

-- --------------------------------------------------------

--
-- Table structure for table `revenue_types`
--

CREATE TABLE `revenue_types` (
  `revenue_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `building_id` int(11) NOT NULL,
  `senior_price` decimal(10,2) NOT NULL,
  `adult_price` decimal(10,2) NOT NULL,
  `child_price` decimal(10,2) NOT NULL,
  `product` varchar(255) NOT NULL,
  `shows_per_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `revenue_types`
--

INSERT INTO `revenue_types` (`revenue_id`, `name`, `type`, `building_id`, `senior_price`, `adult_price`, `child_price`, `product`, `shows_per_day`) VALUES
(1, 'Zoo Admission', 'General', 1, 10.00, 20.00, 5.00, 'Souvenir', 3),
(2, 'Bird Show', 'Special Event', 2, 15.00, 25.00, 10.00, 'Bird Feeder', 2),
(3, 'Aquarium Tour', 'Guided Tour', 3, 20.00, 30.00, 15.00, 'Aquarium Book', 1),
(4, 'Reptile Encounter', 'Interactive', 4, 12.00, 22.00, 8.00, 'Reptile Plush Toy', 2),
(5, 'Primate Presentation', 'Special Event', 5, 18.00, 28.00, 12.00, 'Monkey Keychain', 3),
(6, 'Penguin Parade', 'Interactive', 6, 14.00, 24.00, 9.00, 'Penguin Mug', 2),
(7, 'Big Cat Show', 'Special Event', 7, 22.00, 32.00, 18.00, 'Tiger Poster', 2),
(8, 'Rainforest Adventure', 'Guided Tour', 8, 25.00, 35.00, 20.00, 'Rainforest Guidebook', 1),
(9, 'Children\'s Zoo Day', 'Interactive', 9, 8.00, 15.00, 5.00, 'Zoo Stickers', 4),
(10, 'Safari Expedition', 'Guided Tour', 10, 30.00, 40.00, 25.00, 'Safari Hat', 1),
(11, 'Insect Encounter', 'Interactive', 11, 12.00, 20.00, 8.00, 'Bug Viewer', 3),
(12, 'Marine Mammal Show', 'Special Event', 12, 20.00, 30.00, 15.00, 'Dolphin Keychain', 2),
(13, 'Arctic Adventure', 'Guided Tour', 13, 28.00, 38.00, 22.00, 'Polar Bear Plush', 1),
(14, 'Australian Outback Experience', 'Interactive', 14, 16.00, 26.00, 11.00, 'Kangaroo Magnet', 2),
(15, 'African Safari Spectacle', 'Special Event', 15, 24.00, 34.00, 18.00, 'Zebra Figurine', 2),
(16, 'Asian Jungle Trek', 'Guided Tour', 16, 26.00, 36.00, 20.00, 'Elephant Backpack', 1),
(17, 'North American Wilderness Walk', 'Interactive', 17, 18.00, 28.00, 12.00, 'Bear Plush Toy', 3),
(18, 'Panda Paradise', 'Special Event', 18, 32.00, 42.00, 27.00, 'Panda Pillow', 2),
(19, 'Birds of Prey Show', 'Interactive', 19, 14.00, 24.00, 9.00, 'Hawk Keychain', 2),
(20, 'Animal Encounters Day', 'Special Event', 20, 20.00, 30.00, 15.00, 'Animal Mask Set', 3);

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
(1, 'Lion', 150.00),
(2, 'Elephant', 300.00),
(3, 'Giraffe', 200.00),
(4, 'Zebra', 120.00),
(5, 'Penguin', 50.00),
(6, 'Kangaroo', 80.00),
(7, 'Tiger', 170.00),
(8, 'Panda', 250.00),
(9, 'Koala', 90.00),
(10, 'Gorilla', 180.00),
(11, 'Polar Bear', 200.00),
(12, 'Hippopotamus', 220.00),
(13, 'Rhinoceros', 260.00),
(14, 'Puma', 130.00),
(15, 'Red Panda', 70.00),
(16, 'Leopard', 160.00),
(17, 'Cheetah', 140.00),
(18, 'Sloth', 60.00),
(19, 'Arctic Fox', 80.00),
(20, 'Kookaburra', 40.00);

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
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

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
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `enclosures`
--
ALTER TABLE `enclosures`
  MODIFY `enclosure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hourly_rate`
--
ALTER TABLE `hourly_rate`
  MODIFY `hourly_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `revenue_types`
--
ALTER TABLE `revenue_types`
  MODIFY `revenue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `species_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
