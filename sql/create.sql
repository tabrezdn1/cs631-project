CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `AName` varchar(50) DEFAULT NULL,
  `Astatus` varchar(255) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `enclosure_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `buildings` (
  `building_id` int(11) NOT NULL,
  `Bname` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `cares_for` (
  `species_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




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


CREATE TABLE `enclosures` (
  `enclosure_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `sqft` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `hourly_rate` (
  `hourly_rate_id` int(11) NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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



CREATE TABLE `participates_in` (
  `revenue_id` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `required_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `revenue_events` (
  `date_time` datetime NOT NULL,
  `revenue_id` int(11) NOT NULL,
  `revenue` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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


CREATE TABLE `species` (
  `species_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `food_cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enclosures`
--
ALTER TABLE `enclosures`
  MODIFY `enclosure_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hourly_rate`
--
ALTER TABLE `hourly_rate`
  MODIFY `hourly_rate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenue_types`
--
ALTER TABLE `revenue_types`
  MODIFY `revenue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `species_id` int(11) NOT NULL AUTO_INCREMENT;

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


