INSERT INTO species (name, food_cost) VALUES
('Mammals', 100.00),
('Reptiles', 50.00),
('Birds', 30.00),
('Fish', 80.00),
('Amphibians', 60.00),
('Insects', 40.00);

INSERT INTO buildings (Bname, type) VALUES
('Savannah Pavilion', 'Animal Exhibit'),
('Coral Cove', 'Aquarium'),
('Primate Paradise', 'Animal Exhibit'),
('Reptile Realm', 'Animal Exhibit'),
('Aviary Haven', 'Bird Exhibit'),
('Arctic World', 'Animal Exhibit'),
('Tall Grass Terrace', 'Animal Exhibit'),
('Insect Discovery Center', 'Insect Exhibit'),
('Main Entrance', 'Entrance'),
('Zoo Emporium', 'Shop');

INSERT INTO enclosures (building_id, sqft) VALUES
(1, 1500.00),  -- Corresponds to 'Savannah Pavilion'
(2, 1200.00),  -- Corresponds to 'Coral Cove'
(3, 800.00),   -- Corresponds to 'Primate Paradise'
(4, 1000.00),  -- Corresponds to 'Reptile Realm'
(5, 600.00),   -- Corresponds to 'Aviary Haven'
(6, 2000.00),  -- Corresponds to 'Arctic World'
(7, 1800.00),  -- Corresponds to 'Tall Grass Terrace'
(8, 400.00),   -- Corresponds to 'Insect Discovery Center'
(9, 300.00),   -- Corresponds to 'Main Entrance'
(10, 500.00);  -- Corresponds to 'Zoo Emporium'

INSERT INTO animal (AName, Astatus, birth_year, species_id, enclosure_id, building_id) VALUES
('Simba', 'Healthy', 2018, 1, 1, 1),     -- Lion in Savannah Pavilion
('Nala', 'Healthy', 2019, 1, 1, 1),      -- Lion in Savannah Pavilion
('Python', 'Healthy', 2017, 2, 4, 4),    -- Snake in Reptile Realm
('Boa', 'Healthy', 2016, 2, 4, 4),       -- Snake in Reptile Realm
('Eagle1', 'Healthy', 2015, 3, 5, 5),     -- Eagle in Aviary Haven
('Eagle2', 'Healthy', 2016, 3, 5, 5),     -- Eagle in Aviary Haven
('Goldfish1', 'Healthy', 2019, 4, 2, 2),  -- Fish in Coral Cove
('Goldfish2', 'Healthy', 2020, 4, 2, 2),  -- Fish in Coral Cove
('Frog1', 'Healthy', 2017, 5, 3, 3),      -- Amphibian in Primate Paradise
('Frog2', 'Healthy', 2018, 5, 3, 3),      -- Amphibian in Primate Paradise
('Butterfly1', 'Healthy', 2020, 6, 8, 8), -- Insect in Insect Discovery Center
('Butterfly2', 'Healthy', 2019, 6, 8, 8), -- Insect in Insect Discovery Center
('Tiger1', 'Healthy', 2018, 1, 7, 7),     -- Tiger in Tall Grass Terrace
('Tiger2', 'Healthy', 2019, 1, 7, 7),     -- Tiger in Tall Grass Terrace
('Giraffe1', 'Healthy', 2016, 5, 6, 6),   -- Giraffe in Arctic World
('Giraffe2', 'Healthy', 2017, 5, 6, 6),   -- Giraffe in Arctic World
('Ant1', 'Healthy', 2021, 6, 8, 8),       -- Insect in Insect Discovery Center
('Ant2', 'Healthy', 2022, 6, 8, 8),       -- Insect in Insect Discovery Center
('Kangaroo1', 'Healthy', 2017, 5, 7, 7),  -- Kangaroo in Tall Grass Terrace
('Kangaroo2', 'Healthy', 2018, 5, 7, 7);  -- Kangaroo in Tall Grass Terrace

INSERT INTO animal (AName, Astatus, birth_year, species_id, enclosure_id, building_id) VALUES
('Lion3', 'Young', 2022, 1, 1, 1),
('Lion4', 'Sick', 2017, 1, 1, 1),
('Python3', 'Old', 2010, 2, 4, 4),
('Boa3', 'Healthy', 2015, 2, 4, 4),
('Eagle3', 'Young', 2021, 3, 5, 5),
('Eagle4', 'Sick', 2019, 3, 5, 5),
('Goldfish3', 'Old', 2008, 4, 2, 2),
('Goldfish4', 'Healthy', 2016, 4, 2, 2),
('Frog3', 'Young', 2023, 5, 3, 3),
('Frog4', 'Sick', 2015, 5, 3, 3),
('Butterfly3', 'Old', 2010, 6, 8, 8),
('Butterfly4', 'Healthy', 2018, 6, 8, 8),
('Tiger3', 'Young', 2020, 1, 7, 7),
('Tiger4', 'Sick', 2016, 1, 7, 7),
('Giraffe3', 'Old', 2009, 5, 6, 6),
('Giraffe4', 'Healthy', 2017, 5, 6, 6),
('Ant3', 'Young', 2022, 6, 8, 8),
('Ant4', 'Sick', 2013, 6, 8, 8),
('Kangaroo3', 'Old', 2007, 5, 7, 7),
('Kangaroo4', 'Healthy', 2015, 5, 7, 7),
-- Add 10 more records with varied Astatus values
('Lion5', 'Young', 2022, 1, 1, 1),
('Lion6', 'Old', 2010, 1, 1, 1),
('Python5', 'Sick', 2019, 2, 4, 4),
('Boa5', 'Young', 2021, 2, 4, 4),
('Eagle5', 'Sick', 2019, 3, 5, 5),
('Eagle6', 'Healthy', 2018, 3, 5, 5),
('Goldfish5', 'Young', 2020, 4, 2, 2),
('Goldfish6', 'Old', 2008, 4, 2, 2),
('Frog5', 'Sick', 2017, 5, 3, 3),
('Frog6', 'Young', 2023, 5, 3, 3);

-- Insert records into the 'revenue_types' table
INSERT INTO revenue_types (name, Rtype, building_id, senior_price, adult_price, child_price, product_price, shows_per_day) VALUES
('General Admission', 'Zoo Admission', 9, 20.00, 40.00, 15.00, 5.00, 5),
('Concession Stand', 'Concession', 10, 0.00, 0.00, 0.00, 10.00, 0),
('Animal Shows', 'Animal Show', 5, 25.00, 50.00, 20.00, 5.00, 3),
('Special Exhibit', 'Zoo Admission', 1, 30.00, 60.00, 25.00, 15.00, 2),
('Zoo Membership', 'Zoo Admission', 9, 0.00, 0.00, 0.00, 0.00, 0),
('Gift Shop Sales', 'Concession', 10, 0.00, 0.00, 0.00, 20.00, 0),
('Guided Tours', 'Zoo Admission', 8, 15.00, 30.00, 10.00, 5.00, 2),
('Educational Programs', 'Zoo Admission', 6, 10.00, 20.00, 8.00, 5.00, 2),
('Animal Encounters', 'Animal Show', 7, 20.00, 40.00, 15.00, 8.00, 3),
('Parking Fee', 'Zoo Admission', 9, 0.00, 10.00, 5.00, 0.00, 0);

-- Insert 20 records into the 'revenue_types' table with Rtype as 'Animal Show'
INSERT INTO revenue_types (name, Rtype, building_id, senior_price, adult_price, child_price, product_price, shows_per_day) VALUES
('Dolphin Show', 'Animal Show', 6, 15.00, 30.00, 10.00, 5.00, 2),
('Birds of Prey Show', 'Animal Show', 5, 20.00, 40.00, 15.00, 8.00, 3),
('Sea Lion Show', 'Animal Show', 6, 18.00, 35.00, 12.00, 6.00, 2),
('Elephant Parade', 'Animal Show', 6, 25.00, 50.00, 20.00, 10.00, 3),
('Penguin Presentation', 'Animal Show', 5, 12.00, 25.00, 8.00, 4.00, 2),
('Reptile Encounter', 'Animal Show', 4, 15.00, 30.00, 10.00, 5.00, 2),
('Giraffe Feeding', 'Animal Show', 6, 10.00, 20.00, 8.00, 4.00, 2),
('Tiger Show', 'Animal Show', 7, 20.00, 40.00, 15.00, 8.00, 3),
('Kangaroo Jump-a-thon', 'Animal Show', 7, 12.00, 25.00, 8.00, 4.00, 2),
('Snake Charmer Spectacle', 'Animal Show', 4, 18.00, 35.00, 12.00, 6.00, 2),
('Cheetah Sprint Race', 'Animal Show', 7, 22.00, 45.00, 18.00, 9.00, 3),
('Gorilla Talent Showcase', 'Animal Show', 3, 20.00, 40.00, 15.00, 8.00, 3),
('Panda Playtime', 'Animal Show', 6, 15.00, 30.00, 10.00, 5.00, 2),
('Ostrich Racing Extravaganza', 'Animal Show', 7, 12.00, 25.00, 8.00, 4.00, 2),
('Fox Tricks and Treats', 'Animal Show', 3, 18.00, 35.00, 12.00, 6.00, 2),
('Sloth Slo-Mo Exhibition', 'Animal Show', 6, 10.00, 20.00, 8.00, 4.00, 2),
('Zebra Dance-off', 'Animal Show', 6, 22.00, 45.00, 18.00, 9.00, 3),
('Koala Cuteness Corner', 'Animal Show', 5, 15.00, 30.00, 10.00, 5.00, 2),
('Rhino Horn Display', 'Animal Show', 7, 12.00, 25.00, 8.00, 4.00, 2),
('Anteater Antics', 'Animal Show', 6, 18.00, 35.00, 12.00, 6.00, 2);

INSERT INTO hourly_rate (rate) VALUES
(25.00),
(30.00),
(35.00),
(40.00),
(45.00),
(50.00),
(55.00),
(60.00),
(65.00),
(70.00);

INSERT INTO `employees` (`first_name`, `middle_name`, `last_name`, `start_date`, `street`, `city`, `state`, `zip`, `job_type`, `sup_id`, `hourly_rate_id`, `revenue_id`) VALUES
('Alice', 'M.', 'Johnson', '2022-01-10', '123 Main St', 'City', 'State', '12345', 'Animal Care Specialist', 1, 1, 1),
('Bob', 'A.', 'Smith', '2022-02-15', '456 Oak St', 'Town', 'State', '67890', 'Veterinarian', 1, 2, 2),
('Charlie', 'L.', 'Williams', '2022-03-20', '789 Pine St', 'Village', 'State', '45678', 'Maintenance', 1, 3, 3),
('David', 'K.', 'Brown', '2022-04-25', '101 Elm St', 'City', 'State', '98765', 'Ticket Seller', 1, 4, 1),
('Eva', 'D.', 'Miller', '2022-05-30', '202 Maple St', 'Town', 'State', '34567', 'Animal Care Specialist', 1, 5, 5),
('Frank', 'S.', 'Jones', '2022-06-05', '303 Oak St', 'City', 'State', '23456', 'Customer Service', 2, 6, 6),
('Grace', 'P.', 'Anderson', '2022-07-10', '404 Pine St', 'Village', 'State', '87654', 'Maintenance', 3, 7, 7),
('Henry', 'R.', 'White', '2022-08-15', '505 Maple St', 'Town', 'State', '76543', 'Animal Care Specialist', 1, 8, 8),
('Ivy', 'T.', 'Lee', '2022-09-20', '606 Elm St', 'City', 'State', '65432', 'Veterinarian', 1, 9, 9),
('Jack', 'N.', 'Clark', '2022-10-25', '707 Oak St', 'City', 'State', '54321', 'Ticket Seller', 1, 1, 4),
('Olivia', 'S.', 'Taylor', '2022-11-01', '808 Elm St', 'City', 'State', '98765', 'Animal Care Specialist', 2, 10, 10),
('Peter', 'P.', 'Martin', '2022-12-06', '909 Pine St', 'Village', 'State', '87654', 'Veterinarian', 1, 9, 9),
('Quinn', 'R.', 'Roberts', '2023-01-11', '101 Oak St', 'Town', 'State', '76543', 'Maintenance', 3, 5, 8),
('Rachel', 'T.', 'Turner', '2023-02-16', '202 Maple St', 'City', 'State', '65432', 'Ticket Seller', 1, 4, 7),
('Samuel', 'W.', 'Wilson', '2023-03-21', '303 Elm St', 'Town', 'State', '54321', 'Animal Care Specialist', 4, 2, 6),
('Tina', 'L.', 'Lopez', '2023-04-26', '404 Pine St', 'City', 'State', '43210', 'Customer Service', 5, 1, 6),
('Ulysses', 'G.', 'Gomez', '2023-05-31', '505 Oak St', 'Village', 'State', '32109', 'Maintenance', 6, 1, 17),
('Victoria', 'H.', 'Harris', '2023-06-05', '606 Pine St', 'City', 'State', '21098', 'Animal Care Specialist', 4, 6, 18),
('William', 'E.', 'Evans', '2023-07-10', '707 Elm St', 'Town', 'State', '10987', 'Veterinarian', 1, 8, 19),
('Xavier', 'C.', 'Cooper', '2023-08-15', '808 Maple St', 'City', 'State', '09876', 'Ticket Seller', 1, 4, 5),
('Yasmine', 'F.', 'Fisher', '2023-09-20', '909 Oak St', 'Town', 'State', '98765', 'Animal Care Specialist', 5, 3, 21),
('Zachary', 'D.', 'Dixon', '2023-10-25', '101 Pine St', 'City', 'State', '87654', 'Customer Service', 6, 2, 2),
('Abigail', 'M.', 'Morrison', '2023-11-01', '202 Elm St', 'Village', 'State', '76543', 'Maintenance', 7, 1, 23),
('Benjamin', 'N.', 'Nelson', '2023-12-06', '303 Maple St', 'City', 'State', '65432', 'Animal Care Specialist', 6, 5, 24),
('Chloe', 'G.', 'Gordon', '2024-01-11', '404 Oak St', 'Town', 'State', '54321', 'Veterinarian', 1, 4, 25),
('Daniel', 'R.', 'Reynolds', '2024-02-16', '505 Elm St', 'City', 'State', '43210', 'Ticket Seller', 1, 2, 8),
('Emma', 'S.', 'Sullivan', '2024-03-21', '606 Pine St', 'Town', 'State', '32109', 'Animal Care Specialist', 7, 2, 27),
('Freddie', 'H.', 'Harrison', '2024-04-26', '707 Oak St', 'City', 'State', '21098', 'Customer Service', 8, 2, 2),
('Grace', 'C.', 'Cameron', '2024-05-31', '808 Elm St', 'City', 'State', '10987', 'Maintenance', 9, 2, 29),
('Henry', 'L.', 'Lawson', '2024-06-05', '909 Pine St', 'Village', 'State', '09876', 'Animal Care Specialist', 8, 3, 30);


INSERT INTO employees (first_name, middle_name, last_name, start_date, street, city, state, zip, job_type, sup_id, hourly_rate_id, revenue_id) VALUES
('Alice', 'M.', 'Johnson', '2022-01-10', '123 Oak St', 'City', 'State', '12345', 'Animal Care Specialist', 1, 1, 1),
('Bob', 'L.', 'Smith', '2022-02-15', '456 Maple St', 'Town', 'State', '67890', 'Veterinarian', 1, 2, 2),
('Charlie', 'A.', 'Williams', '2022-03-20', '789 Pine St', 'Village', 'State', '45678', 'Maintenance', 1, 3, 3),
('David', 'K.', 'Miller', '2022-04-25', '101 Elm St', 'City', 'State', '98765', 'Ticket Seller', 1, 4, 4),
('Eva', 'P.', 'Brown', '2022-05-05', '202 Oak St', 'Town', 'State', '34567', 'Animal Care Specialist', 1, 5, 5),
('Frank', 'S.', 'Jones', '2022-06-10', '303 Maple St', 'City', 'State', '23456', 'Customer Service', 2, 6, 6),
('Grace', 'N.', 'Anderson', '2022-07-15', '404 Pine St', 'Village', 'State', '87654', 'Maintenance', 3, 7, 7),
('Holly', 'R.', 'White', '2022-08-20', '505 Elm St', 'Town', 'State', '76543', 'Veterinarian', 1, 8, 8),
('Ivan', 'T.', 'Lee', '2022-09-25', '606 Oak St', 'City', 'State', '65432', 'Ticket Seller', 1, 9, 9),
('Jack', 'N.', 'Taylor', '2022-10-30', '707 Maple St', 'City', 'State', '54321', 'Customer Service', 6, 10, 10);



INSERT INTO cares_for (species_id, emp_id) VALUES
(1, 1),  -- Employee Alice cares for species with ID 1
(2, 2),  -- Employee Bob cares for species with ID 2
(3, 5),  -- Employee Eva cares for species with ID 3
(4, 9),  -- Employee Ivy cares for species with ID 4
(5, 10); -- Employee Jack cares for species with ID 5

INSERT INTO revenue_events (date_time, revenue_id, revenue, quantity, name, type) VALUES
('2023-01-15 10:00:00', 1, 500.00, 25, 'General Admission', 'Zoo Admission'),
('2023-02-20 12:30:00', 2, 1200.00, 40, 'Concession Stand Sales', 'Concession'),
('2023-03-25 14:45:00', 3, 800.00, 20, 'Special Exhibit Tickets', 'Zoo Admission'),
('2023-04-10 11:15:00', 4, 300.00, 15, 'Parking Fees', 'Zoo Admission'),
('2023-05-05 09:30:00', 5, 600.00, 30, 'Gift Shop Sales', 'Concession'),
('2023-06-18 16:00:00', 6, 400.00, 10, 'Guided Tour Tickets', 'Zoo Admission'),
('2023-07-22 13:20:00', 7, 200.00, 8, 'Educational Program Fees', 'Zoo Admission'),
('2023-08-30 15:45:00', 8, 700.00, 25, 'Animal Show Tickets', 'Animal Show'),
('2023-09-12 10:30:00', 9, 150.00, 5, 'Membership Fees', 'Zoo Admission'),
('2023-10-05 11:45:00', 10, 180.00, 12, 'Concession Stand Sales', 'Concession');

INSERT INTO revenue_events (date_time, revenue_id, revenue, quantity, name, type) VALUES
('2023-11-05 09:30:00', 1, 500.00, 25, 'General Admission', 'Zoo Admission'),
('2023-11-10 12:30:00', 2, 1200.00, 40, 'Concession Stand Sales', 'Concession'),
('2023-11-15 14:45:00', 3, 800.00, 20, 'Special Exhibit Tickets', 'Zoo Admission'),
('2023-11-20 11:15:00', 4, 300.00, 15, 'Parking Fees', 'Zoo Admission'),
('2023-11-25 09:30:00', 5, 600.00, 30, 'Gift Shop Sales', 'Concession'),
('2023-10-05 16:00:00', 6, 400.00, 10, 'Guided Tour Tickets', 'Zoo Admission'),
('2023-10-10 13:20:00', 7, 200.00, 8, 'Educational Program Fees', 'Zoo Admission'),
('2023-10-15 15:45:00', 8, 700.00, 25, 'Animal Show Tickets', 'Animal Show'),
('2023-10-20 10:30:00', 9, 150.00, 5, 'Membership Fees', 'Zoo Admission'),
('2023-10-25 11:45:00', 10, 180.00, 12, 'Concession Stand Sales', 'Concession'),
('2023-09-05 09:30:00', 1, 500.00, 25, 'General Admission', 'Zoo Admission'),
('2023-09-10 12:30:00', 2, 1200.00, 40, 'Concession Stand Sales', 'Concession'),
('2023-09-15 14:45:00', 3, 800.00, 20, 'Special Exhibit Tickets', 'Zoo Admission'),
('2023-09-20 11:15:00', 4, 300.00, 15, 'Parking Fees', 'Zoo Admission'),
('2023-09-25 09:30:00', 5, 600.00, 30, 'Gift Shop Sales', 'Concession'),
('2023-08-05 16:00:00', 6, 400.00, 10, 'Guided Tour Tickets', 'Zoo Admission'),
('2023-08-10 13:20:00', 7, 200.00, 8, 'Educational Program Fees', 'Zoo Admission'),
('2023-08-15 15:45:00', 8, 700.00, 25, 'Animal Show Tickets', 'Animal Show'),
('2023-08-20 10:30:00', 9, 150.00, 5, 'Membership Fees', 'Zoo Admission'),
('2023-08-25 11:45:00', 10, 180.00, 12, 'Concession Stand Sales', 'Concession');



INSERT INTO revenue_events (date_time, revenue_id, revenue, quantity, name, type) VALUES
('2023-11-01 09:30:00', 1, 500.00, 25, 'General Admission', 'Zoo Admission'),
('2023-11-02 12:30:00', 2, 1200.00, 40, 'Concession Stand Sales', 'Concession'),
('2023-11-03 14:45:00', 3, 800.00, 20, 'Special Exhibit Tickets', 'Zoo Admission'),
('2023-11-04 11:15:00', 4, 300.00, 15, 'Parking Fees', 'Zoo Admission'),
('2023-10-01 09:30:00', 1, 500.00, 25, 'General Admission', 'Zoo Admission'),
('2023-10-02 12:30:00', 2, 1200.00, 40, 'Concession Stand Sales', 'Concession'),
('2023-10-03 14:45:00', 3, 800.00, 20, 'Special Exhibit Tickets', 'Zoo Admission'),
('2023-10-04 11:15:00', 4, 300.00, 15, 'Parking Fees', 'Zoo Admission');

INSERT INTO `admin` (`EmpID`, `Password`, `Name`, `Role`, `Salary`, `SSN`, `HireDate`, `LocID`) VALUES
(1250, '123', 'John', 'M', '50000', '123456789', '2023-04-21', 1),
(1251, '1234', 'Jack', 'M', '51000', '123456789', '2022-09-01', 2),
(1252, '1234', 'Mike', 'M', '51000', '123490789', '2020-06-14', 3),
(1253, '1234', 'Ram', 'M', '51000', '123456990', '2021-07-22', 4);