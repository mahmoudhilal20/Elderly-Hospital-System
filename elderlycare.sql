-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 08:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elderlycare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`AdminID`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `assignedmedications`
--

CREATE TABLE `assignedmedications` (
  `PatientID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `MedicineName` varchar(50) NOT NULL,
  `Time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignedmedications`
--

INSERT INTO `assignedmedications` (`PatientID`, `Date`, `MedicineName`, `Time`) VALUES
(48, '2020-06-13', 'wwwwww', 'AfterNoon'),
(48, '2020-06-13', 'wwwwww', 'Morning'),
(48, '2020-06-13', 'wwwwww', 'Night'),
(48, '2020-06-13', 'yyy', 'AfterNoon'),
(48, '2020-06-13', 'yyy', 'Morning'),
(48, '2020-06-14', 'wwwwww', 'Morning'),
(48, '2020-06-16', 'wwwwww', 'Morning'),
(48, '2020-06-17', 'wwwwww', 'Morning');

-- --------------------------------------------------------

--
-- Table structure for table `doctorrate`
--

CREATE TABLE `doctorrate` (
  `PatientID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `DoctorID` int(11) NOT NULL,
  `WorkingHospital` varchar(100) NOT NULL,
  `Major` varchar(100) NOT NULL,
  `CVDoctor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`DoctorID`, `WorkingHospital`, `Major`, `CVDoctor`) VALUES
(49, 'Jabal Amel', 'Cardiologist', '49.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `doctorschedule`
--

CREATE TABLE `doctorschedule` (
  `DoctorID` int(11) NOT NULL,
  `Day` varchar(10) NOT NULL,
  `From` time NOT NULL,
  `To` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorschedule`
--

INSERT INTO `doctorschedule` (`DoctorID`, `Day`, `From`, `To`) VALUES
(49, 'Monday', '08:00:00', '14:00:00'),
(49, 'Wednesday', '08:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `DonatorFirstName` varchar(50) NOT NULL,
  `DonatorLastName` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`DonatorFirstName`, `DonatorLastName`, `Quantity`) VALUES
('mahmoud', 'Hilal', 111);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `HospitalName` varchar(100) NOT NULL,
  `HospitalLocation` varchar(100) NOT NULL,
  `HospitalPhoneNumber` int(8) UNSIGNED ZEROFILL NOT NULL,
  `AddedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`HospitalName`, `HospitalLocation`, `HospitalPhoneNumber`, `AddedBy`) VALUES
('American University of Beirut Medical Center', 'Beirut', 01350000, 1),
('Hiram', 'Tyre- Lebanon', 07343700, 1),
('Hotel Dieu', 'Achrafieh -Lebanon', 01604000, 1),
('Jabal Amel', 'Tyre- Lebanon', 07343852, 1),
('xyzw', 'Beirut - Lebanon', 07002002, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `PatientID` int(11) NOT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `MedicineName` varchar(100) NOT NULL,
  `DateFrom` date NOT NULL,
  `DateTo` date NOT NULL,
  `Status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`PatientID`, `DoctorID`, `MedicineName`, `DateFrom`, `DateTo`, `Status`) VALUES
(48, 49, 'amoxcillin', '2020-06-17', '2020-07-17', 'Removed'),
(48, 49, 'Aspirin', '2020-03-01', '2020-05-08', 'Active'),
(48, 49, 'Corvasal', '2020-04-01', '2020-05-15', 'Active'),
(48, 49, 'medicine 2', '2020-04-21', '2020-07-15', 'Removed'),
(48, 49, 'Test', '2020-05-20', '2020-05-29', 'Removed'),
(48, 49, 'testww', '2020-05-19', '2020-06-03', 'Removed'),
(48, 49, 'wwwwww', '2020-03-13', '2020-08-19', 'Active'),
(48, 49, 'yyy', '2020-05-04', '2020-08-30', 'Removed');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `PatientID` int(11) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nursecomments`
--

CREATE TABLE `nursecomments` (
  `PatientID` int(11) NOT NULL,
  `NurseID` int(11) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nursecomments`
--

INSERT INTO `nursecomments` (`PatientID`, `NurseID`, `Comment`) VALUES
(48, 47, 'Good Nurse'),
(48, 47, 'Not Bad');

-- --------------------------------------------------------

--
-- Table structure for table `nurserate`
--

CREATE TABLE `nurserate` (
  `PatientID` int(11) NOT NULL,
  `NurseID` int(11) NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurserate`
--

INSERT INTO `nurserate` (`PatientID`, `NurseID`, `Rate`) VALUES
(48, 47, 5);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `NurseID` int(11) NOT NULL,
  `WorkingHospital` varchar(100) DEFAULT NULL,
  `Online` int(1) NOT NULL,
  `CVNurse` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`NurseID`, `WorkingHospital`, `Online`, `CVNurse`) VALUES
(47, 'Jabal Amel', 1, '47.pdf'),
(93, 'American University of Beirut Medical Center', 1, 'n.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `nurseschedule`
--

CREATE TABLE `nurseschedule` (
  `NurseID` int(11) NOT NULL,
  `From` time NOT NULL,
  `To` time NOT NULL,
  `Day` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurseschedule`
--

INSERT INTO `nurseschedule` (`NurseID`, `From`, `To`, `Day`) VALUES
(47, '08:00:00', '14:00:00', 'Friday'),
(47, '08:00:00', '14:00:00', 'Monday'),
(47, '16:00:00', '08:00:00', 'Sunday'),
(47, '08:00:00', '14:00:00', 'Thursday'),
(47, '08:00:00', '14:00:00', 'Tuesday'),
(47, '08:00:00', '14:00:00', 'Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `ordernurse`
--

CREATE TABLE `ordernurse` (
  `NurseID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordernurse`
--

INSERT INTO `ordernurse` (`NurseID`, `PatientID`, `Status`) VALUES
(47, 48, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `PatientID` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Hospital` varchar(100) DEFAULT NULL,
  `Online` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`PatientID`, `Address`, `Hospital`, `Online`) VALUES
(48, 'Tyre- beside LIU', 'Jabal Amel', 0),
(92, 'tyre', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductDescrption` text NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ProductPhoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `AdminID`, `ProductName`, `ProductDescrption`, `Category`, `Price`, `Quantity`, `ProductPhoto`) VALUES
(1, 1, 'Handmade Pottery', 'Hand made Pottery made in china ', 'Handmade', 15, 10, '1.jpg'),
(2, 1, 'Colored Pottery', 'Colored pottery made by hand in Lebanon', 'Handmade', 30, 12, '2.jpeg'),
(3, 1, 'test', 'test', 'test', 10, 20, '3.jpg'),
(4, 1, 'test', 'test', 'test', 10, 20, '4.jpeg'),
(5, 1, 'test', 'test', 'geaga', 30, 12, '5.jpg'),
(6, 1, 'test', 'test', 'geaga', 30, 2, '6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `CustomerFirstName` varchar(50) NOT NULL,
  `CustomerLastName` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`OrderID`, `ProductID`, `CustomerFirstName`, `CustomerLastName`, `Address`, `Phone`, `Quantity`) VALUES
(1, 1, 'test', 'test', '1561fasnol', 11223344, 2),
(10, 1, 'mahmoud', 'Hilal', 'Tyre', 70000000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `requestnurse`
--

CREATE TABLE `requestnurse` (
  `PatientID` int(11) NOT NULL,
  `HospitalName` varchar(100) NOT NULL,
  `Request` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestnurse`
--

INSERT INTO `requestnurse` (`PatientID`, `HospitalName`, `Request`) VALUES
(48, 'American University of Beirut Medical Center', 'Done'),
(48, 'Hotel Dieu', 'Done'),
(48, 'Jabal Amel', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `HashedPassword` varchar(64) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DateofBirth` date NOT NULL,
  `PhoneNumber` int(8) NOT NULL,
  `MaritalState` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `UserPhoto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Email`, `HashedPassword`, `FirstName`, `LastName`, `Gender`, `DateofBirth`, `PhoneNumber`, `MaritalState`, `Status`, `UserPhoto`) VALUES
(1, '71730026@students.liu.edu.lb', 'f6e0a1e2ac41945a9aa7ff8a8aaa0cebc12a3bcc981a929ad5cf810a090e11ae', 'Mahmoud', 'Hilal', 'Male', '1999-07-28', 70000000, 'Single', 'Admin', NULL),
(47, 'Nurse@gmail.com', 'f6e0a1e2ac41945a9aa7ff8a8aaa0cebc12a3bcc981a929ad5cf810a090e11ae', 'Nurse1', 'NurseFamily', 'Male', '1999-07-28', 71000000, 'Single', 'Nurse', '47.jpg'),
(48, 'patient@gmail.com', 'f6e0a1e2ac41945a9aa7ff8a8aaa0cebc12a3bcc981a929ad5cf810a090e11ae', 'Patient1', 'PatientFamily', 'Male', '1950-12-04', 76000000, 'Married', 'Patient', NULL),
(49, 'doctor@gmail.com', 'f6e0a1e2ac41945a9aa7ff8a8aaa0cebc12a3bcc981a929ad5cf810a090e11ae', 'Doctor1', 'DoctorFamily', 'Female', '1960-04-22', 78000000, 'Married', 'Doctor', '49.png'),
(92, 'test@gmail.com', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a', 'test', 'test', '  Male', '1970-01-01', 70000000, 'Single', 'PendingPatient', NULL),
(93, 'nurse2@gmail.com', 'cf82c44a8e59687d2c7a53d28b1e182fa88f7d52260b62f46a7efaa870e92bb1', 'nurse2', 'nurse2F', 'Male', '1970-06-10', 7000000, 'Married', 'Nurse', NULL),
(94, 'nurse20@gmail.com', 'bed1ae73ffba41241c27c1cb83d871287ff93ba6f1efcf89c3770407cdb8c94c', 'nurse5', 'test', '  male', '1980-06-17', 70916222, 'Single', 'PendingPatient', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `assignedmedications`
--
ALTER TABLE `assignedmedications`
  ADD PRIMARY KEY (`PatientID`,`Date`,`MedicineName`,`Time`),
  ADD KEY `assignedmedications_ibfk_1` (`PatientID`,`MedicineName`);

--
-- Indexes for table `doctorrate`
--
ALTER TABLE `doctorrate`
  ADD PRIMARY KEY (`PatientID`,`DoctorID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DoctorID`),
  ADD KEY `WorkingHospital` (`WorkingHospital`) USING BTREE;

--
-- Indexes for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  ADD PRIMARY KEY (`DoctorID`,`Day`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`DonatorFirstName`,`DonatorLastName`,`Quantity`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`HospitalName`),
  ADD KEY `AddedBy` (`AddedBy`) USING BTREE;

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`PatientID`,`MedicineName`) USING BTREE,
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`PatientID`);

--
-- Indexes for table `nursecomments`
--
ALTER TABLE `nursecomments`
  ADD KEY `NurseID` (`NurseID`),
  ADD KEY `PatientID` (`PatientID`,`NurseID`) USING BTREE;

--
-- Indexes for table `nurserate`
--
ALTER TABLE `nurserate`
  ADD PRIMARY KEY (`PatientID`,`NurseID`),
  ADD KEY `NurseID` (`NurseID`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`NurseID`),
  ADD KEY `WorkingHospital` (`WorkingHospital`) USING BTREE;

--
-- Indexes for table `nurseschedule`
--
ALTER TABLE `nurseschedule`
  ADD PRIMARY KEY (`NurseID`,`Day`);

--
-- Indexes for table `ordernurse`
--
ALTER TABLE `ordernurse`
  ADD PRIMARY KEY (`NurseID`,`PatientID`,`Status`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`PatientID`),
  ADD KEY `hospital` (`Hospital`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `AdminID` (`AdminID`) USING BTREE;

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `purchase_ibfk_1` (`ProductID`);

--
-- Indexes for table `requestnurse`
--
ALTER TABLE `requestnurse`
  ADD PRIMARY KEY (`PatientID`,`HospitalName`,`Request`),
  ADD KEY `HospitalName` (`HospitalName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `NurseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `nurseschedule`
--
ALTER TABLE `nurseschedule`
  MODIFY `NurseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `assignedmedications`
--
ALTER TABLE `assignedmedications`
  ADD CONSTRAINT `assignedmedications_ibfk_1` FOREIGN KEY (`PatientID`,`MedicineName`) REFERENCES `medications` (`PatientID`, `MedicineName`);

--
-- Constraints for table `doctorrate`
--
ALTER TABLE `doctorrate`
  ADD CONSTRAINT `doctorrate_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctorrate_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`WorkingHospital`) REFERENCES `hospitals` (`HospitalName`);

--
-- Constraints for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  ADD CONSTRAINT `doctorschedule_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`);

--
-- Constraints for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD CONSTRAINT `hospitals_ibfk_1` FOREIGN KEY (`AddedBy`) REFERENCES `admins` (`AdminID`);

--
-- Constraints for table `medications`
--
ALTER TABLE `medications`
  ADD CONSTRAINT `medications_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`),
  ADD CONSTRAINT `medications_ibfk_3` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`);

--
-- Constraints for table `nursecomments`
--
ALTER TABLE `nursecomments`
  ADD CONSTRAINT `nursecomments_ibfk_1` FOREIGN KEY (`NurseID`) REFERENCES `nurses` (`NurseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nursecomments_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nurserate`
--
ALTER TABLE `nurserate`
  ADD CONSTRAINT `nurserate_ibfk_1` FOREIGN KEY (`NurseID`) REFERENCES `nurses` (`NurseID`),
  ADD CONSTRAINT `nurserate_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`);

--
-- Constraints for table `nurses`
--
ALTER TABLE `nurses`
  ADD CONSTRAINT `nurses_ibfk_1` FOREIGN KEY (`NurseID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nurses_ibfk_2` FOREIGN KEY (`WorkingHospital`) REFERENCES `hospitals` (`HospitalName`);

--
-- Constraints for table `nurseschedule`
--
ALTER TABLE `nurseschedule`
  ADD CONSTRAINT `nurseschedule_ibfk_1` FOREIGN KEY (`NurseID`) REFERENCES `nurses` (`NurseID`);

--
-- Constraints for table `ordernurse`
--
ALTER TABLE `ordernurse`
  ADD CONSTRAINT `ordernurse_ibfk_1` FOREIGN KEY (`NurseID`) REFERENCES `nurses` (`NurseID`),
  ADD CONSTRAINT `ordernurse_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`Hospital`) REFERENCES `hospitals` (`HospitalName`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admins` (`AdminID`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requestnurse`
--
ALTER TABLE `requestnurse`
  ADD CONSTRAINT `requestnurse_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`),
  ADD CONSTRAINT `requestnurse_ibfk_2` FOREIGN KEY (`HospitalName`) REFERENCES `hospitals` (`HospitalName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
