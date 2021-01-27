-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 04:48 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annkafruits`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Juice'),
(2, 'Smoothie'),
(3, 'FruitSalad');

-- --------------------------------------------------------

--
-- Table structure for table `customerorder`
--

CREATE TABLE `customerorder` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Date_Time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerorder`
--

INSERT INTO `customerorder` (`OrderID`, `CustomerID`, `Date_Time`) VALUES
(84, 26, '2020-11-26 11:30:56am'),
(85, 26, '2020-11-26 11:31:11am'),
(86, 26, '2020-11-26 11:31:29am'),
(87, 24, '2020-11-26 12:07:02pm'),
(88, 24, '2020-11-26 12:11:30pm'),
(89, 24, '2020-11-26 12:12:17pm'),
(90, 21, '2020-11-26 12:38:28pm'),
(93, 38, '2020-11-26 06:01:05pm'),
(94, 39, '2020-11-26 06:01:45pm');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ItemID` int(11) NOT NULL,
  `ItemName` varchar(100) NOT NULL,
  `ItemPrice` double NOT NULL,
  `ItemType` int(10) NOT NULL,
  `ImageLocation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ItemID`, `ItemName`, `ItemPrice`, `ItemType`, `ImageLocation`) VALUES
(1, 'Honey Lime Quinoa Fruit Salad', 350, 3, 'Pics\\Honeylimequinoafruitsalad.jpg'),
(2, 'Melon and Pineapple Fruit Salad', 300, 3, 'Pics\\MelonPineappleFruitSalad.jpg'),
(4, 'Pineapple Juice', 100, 1, 'Pics\\PineappleJuice.jpg'),
(5, 'Banana Smoothie', 150, 2, 'Pics\\BananaSmoothie.jpg'),
(7, 'Green Pear Smoothie', 200, 2, 'Pics/GreenPearSmoothie.jpg'),
(8, 'Tropical Mango Smoothie', 150, 2, 'Pics/TropicalMangoSmoothie.jpg'),
(10, 'Orange Juice', 100, 1, 'Pics/OrangeJuice.jpg'),
(11, 'Hawaiian Fruit Salad', 250, 3, 'Pics/Hawaiianfruitsalad.jpg'),
(17, 'food1', 200, 1, 'Pics/Juice2.jpg'),
(18, 'food2', 200, 2, 'Pics/WatermelonSmoothie.jpg'),
(19, 'food3', 150, 3, 'Pics/cucumberbasilwatermelonsalad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `OrderItemID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`OrderItemID`, `OrderID`, `ItemID`, `Quantity`) VALUES
(651, 84, 7, 1),
(652, 84, 5, 1),
(653, 85, 7, 1),
(654, 85, 5, 1),
(655, 86, 7, 1),
(656, 87, 5, 1),
(657, 87, 7, 3),
(658, 88, 7, 1),
(659, 89, 1, 1),
(660, 90, 2, 3),
(665, 93, 17, 2),
(666, 93, 18, 2),
(667, 94, 19, 2),
(668, 94, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(10) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `UserType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FName`, `LName`, `Email`, `Contact`, `Password`, `UserType`) VALUES
(20, 'George', 'Mercyo', 'georgemercyo@annka.co.ke', '0705999819', 'Fred', 1),
(21, 'Grace', 'Morokial', 'gracemorokial@gmail.com', '0705999820', 'Deed', 2),
(22, 'Brenda', 'Boronga', 'brendabrona@annka.co.ke', '0705999819', 'Look', 1),
(23, 'Hiram', 'Koldaine', 'hiramkoldaine@gmail.com', '0705999819', 'You', 2),
(24, 'Sharon', 'Kipenzi', 'sharonkipenzi@gmail.com', '0789241231', 'Shazie', 2),
(25, 'Dilan', 'Kambona', 'dilakambona@annka.co.ke', '0701728712', 'Sheluck', 1),
(26, 'Larry', 'Hussein', 'larryhussein@gmail.com', '0783918362', 'larry', 2),
(27, 'Valerie', 'Nyaboke', 'valerienyaboke@gmail.com', '0783236716', 'Val', 2),
(38, 'Client', 'One', 'clientone@gmail.com', '0793829283', 'client1', 2),
(39, 'Client', 'Two', 'clienttwo@gmail.com', '0792839283', 'client2', 2),
(40, 'Admin', 'One', 'adminone@annka.co.ke', '0793289828', 'admin1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `TypeID` int(11) NOT NULL,
  `TypeName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`TypeID`, `TypeName`) VALUES
(1, 'Administrator'),
(2, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customerorder`
--
ALTER TABLE `customerorder`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `customerorder_ibfk_2` (`CustomerID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `ItemType` (`ItemType`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`OrderItemID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UniqueEmail` (`Email`),
  ADD KEY `UserType` (`UserType`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`TypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customerorder`
--
ALTER TABLE `customerorder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `OrderItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=669;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerorder`
--
ALTER TABLE `customerorder`
  ADD CONSTRAINT `customerorder_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`ItemType`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`UserType`) REFERENCES `usertype` (`TypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
