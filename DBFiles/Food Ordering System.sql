-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 06:08 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwpjcompo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bid` int(8) NOT NULL,
  `cid` int(5) DEFAULT NULL,
  `total` float(8,2) DEFAULT NULL,
  `dat` date DEFAULT NULL,
  `tim` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bid`, `cid`, `total`, `dat`, `tim`) VALUES
(10000016, 1, 1275.00, '2019-10-16', '23:41:35'),
(10000021, 1, 180.00, '2019-10-17', '18:24:36'),
(10000022, 3, 1605.00, '2019-10-17', '23:20:12'),
(10000024, 1, 5430.00, '2019-10-17', '23:46:55'),
(10000029, 1, 580.00, '2019-10-18', '09:19:14'),
(10000032, 1, 295.00, '2019-11-07', '20:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `bill10000016`
--

CREATE TABLE `bill10000016` (
  `oid` int(5) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill10000016`
--

INSERT INTO `bill10000016` (`oid`, `sub_tot`) VALUES
(10016, 990.00),
(10017, 285.00);

-- --------------------------------------------------------

--
-- Table structure for table `bill10000021`
--

CREATE TABLE `bill10000021` (
  `oid` int(5) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill10000021`
--

INSERT INTO `bill10000021` (`oid`, `sub_tot`) VALUES
(10026, 180.00);

-- --------------------------------------------------------

--
-- Table structure for table `bill10000022`
--

CREATE TABLE `bill10000022` (
  `oid` int(5) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill10000022`
--

INSERT INTO `bill10000022` (`oid`, `sub_tot`) VALUES
(10027, 810.00),
(10028, 340.00),
(10029, 95.00),
(10030, 360.00);

-- --------------------------------------------------------

--
-- Table structure for table `bill10000024`
--

CREATE TABLE `bill10000024` (
  `oid` int(5) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill10000024`
--

INSERT INTO `bill10000024` (`oid`, `sub_tot`) VALUES
(10026, 180.00),
(10035, 2755.00),
(10036, 595.00),
(10037, 1540.00),
(10038, 360.00);

-- --------------------------------------------------------

--
-- Table structure for table `bill10000029`
--

CREATE TABLE `bill10000029` (
  `oid` int(5) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill10000029`
--

INSERT INTO `bill10000029` (`oid`, `sub_tot`) VALUES
(10044, 200.00),
(10045, 380.00);

-- --------------------------------------------------------

--
-- Table structure for table `bill10000030`
--

CREATE TABLE `bill10000030` (
  `oid` int(5) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill10000030`
--

INSERT INTO `bill10000030` (`oid`, `sub_tot`) VALUES
(10046, 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `bill10000032`
--

CREATE TABLE `bill10000032` (
  `oid` int(5) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill10000032`
--

INSERT INTO `bill10000032` (`oid`, `sub_tot`) VALUES
(10050, 200.00),
(10051, 95.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(5) NOT NULL,
  `cname` varchar(25) DEFAULT NULL,
  `cusername` varchar(25) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `pno1` int(10) NOT NULL,
  `pn02` int(10) DEFAULT NULL,
  `cemailid` varchar(30) DEFAULT NULL,
  `addrl1` varchar(50) DEFAULT NULL,
  `addrl2` varchar(50) DEFAULT NULL,
  `addrl3` varchar(50) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `pincode` varchar(25) DEFAULT NULL,
  `state` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cname`, `cusername`, `cpassword`, `pno1`, `pn02`, `cemailid`, `addrl1`, `addrl2`, `addrl3`, `city`, `pincode`, `state`) VALUES
(1, 'Kedarnath K Chimmad', 'Kedarnath123', 'ca193cc042c717938bf4b699db949629c10cccab', 2147483647, 2147483647, 'kedarnathchimmad555@gmail.com', 'J Block Room No 254', 'VIT MENS HOSTEL', 'VIT Katpadi', 'VELLORE', '632014', 'Tamil Nadu'),
(3, 'Rajat', 'Rajatr@123', '59461e1e63b42ac9b1bf7d727efcd89602d298a4', 2147483647, 2147483647, 'rajatr123@gmail.com', 'J Block Room No 254', 'VIT MENS HOSTEL', 'VIT Katpadi', 'VELLORE', '632014', 'Tamil Nadu');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hid` int(5) NOT NULL,
  `hname` varchar(30) NOT NULL,
  `husername` varchar(25) NOT NULL,
  `hpassword` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `pno1` int(10) DEFAULT NULL,
  `pno2` int(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hid`, `hname`, `husername`, `hpassword`, `address`, `pno1`, `pno2`, `email`) VALUES
(1, 'Bihar Dhaba', 'BDhaba@123', '504701ae2e0ce12259d44184871bedabafb75645', 'VIT,VELLORE', 1234567890, 2147483647, NULL),
(2, 'Punjabi Dhaba', 'PDhaba@123', '9bc6ac5f639c32b3223b97766e83cb5c6a65547b', 'VIT VELLORE', 1234567890, 123456789, NULL),
(6, 'Hotel Tarama', 'Tarama@123', 'fda9edec7714455f6128efa33d2156ed4dd0ad8f', 'VIT,VELLORE', 2147483647, 2147483647, NULL),
(7, 'Swagath Dine Inn', 'Swagath@123', '8ea4b24d8ac68de85be834eb1fe424f561df3375', 'VIT,VELLORE', 2147483647, 2147483647, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `iid` int(5) NOT NULL,
  `iname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`iid`, `iname`) VALUES
(10014, 'Panner Burji'),
(10015, 'Egg Burji'),
(10016, 'Panner masala'),
(10017, 'PAnner butter masala'),
(10018, 'Panner 65'),
(10019, 'Panner Tikka Masala'),
(10020, 'Veg Biriyani'),
(10021, 'Gobi 65'),
(10022, 'Chilly Gobi '),
(10023, 'Honey Chilli Potato'),
(10024, 'Chilly Potato'),
(10025, 'Gobi Manchurian'),
(10026, 'Egg Masala'),
(10027, 'Chicken Tikka Masala'),
(10028, 'Chicken Butter Masala'),
(10029, 'Dum Biriyani'),
(10030, 'Chicken Hyderbadi Biriyani'),
(10031, 'Gobi Chilly'),
(10032, 'Tandoori Roti'),
(10033, 'Parotha'),
(10034, 'Naan'),
(10035, 'Kulcha'),
(10036, 'Butter Kulcha'),
(10037, 'Butter Roti'),
(10038, 'Egg Biriryani'),
(10039, 'Masala Dosa'),
(10040, 'Idli (2 pieces)'),
(10041, 'rava dosa'),
(10042, 'Poori Masala');

-- --------------------------------------------------------

--
-- Table structure for table `order10016`
--

CREATE TABLE `order10016` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10016`
--

INSERT INTO `order10016` (`iid`, `quantity`, `sub_tot`) VALUES
(10018, 9, 810.00),
(10021, 2, 180.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10017`
--

CREATE TABLE `order10017` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10017`
--

INSERT INTO `order10017` (`iid`, `quantity`, `sub_tot`) VALUES
(10031, 3, 285.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10026`
--

CREATE TABLE `order10026` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10026`
--

INSERT INTO `order10026` (`iid`, `quantity`, `sub_tot`) VALUES
(10018, 1, 90.00),
(10021, 1, 90.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10027`
--

CREATE TABLE `order10027` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10027`
--

INSERT INTO `order10027` (`iid`, `quantity`, `sub_tot`) VALUES
(10018, 5, 450.00),
(10022, 2, 180.00),
(10025, 2, 180.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10028`
--

CREATE TABLE `order10028` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10028`
--

INSERT INTO `order10028` (`iid`, `quantity`, `sub_tot`) VALUES
(10022, 4, 340.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10029`
--

CREATE TABLE `order10029` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10029`
--

INSERT INTO `order10029` (`iid`, `quantity`, `sub_tot`) VALUES
(10031, 1, 95.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10030`
--

CREATE TABLE `order10030` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10030`
--

INSERT INTO `order10030` (`iid`, `quantity`, `sub_tot`) VALUES
(10021, 4, 360.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10035`
--

CREATE TABLE `order10035` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10035`
--

INSERT INTO `order10035` (`iid`, `quantity`, `sub_tot`) VALUES
(10018, 1, 90.00),
(10021, 2, 180.00),
(10022, 3, 255.00),
(10019, 9, 1080.00),
(10026, 6, 450.00),
(10029, 7, 700.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10036`
--

CREATE TABLE `order10036` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10036`
--

INSERT INTO `order10036` (`iid`, `quantity`, `sub_tot`) VALUES
(10018, 1, 95.00),
(10014, 5, 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10037`
--

CREATE TABLE `order10037` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10037`
--

INSERT INTO `order10037` (`iid`, `quantity`, `sub_tot`) VALUES
(10018, 1, 90.00),
(10022, 4, 360.00),
(10019, 2, 240.00),
(10028, 3, 450.00),
(10020, 5, 400.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10038`
--

CREATE TABLE `order10038` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10038`
--

INSERT INTO `order10038` (`iid`, `quantity`, `sub_tot`) VALUES
(10037, 20, 360.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10044`
--

CREATE TABLE `order10044` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10044`
--

INSERT INTO `order10044` (`iid`, `quantity`, `sub_tot`) VALUES
(10039, 4, 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10045`
--

CREATE TABLE `order10045` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10045`
--

INSERT INTO `order10045` (`iid`, `quantity`, `sub_tot`) VALUES
(10031, 4, 380.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10050`
--

CREATE TABLE `order10050` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10050`
--

INSERT INTO `order10050` (`iid`, `quantity`, `sub_tot`) VALUES
(10018, 2, 180.00),
(10040, 1, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `order10051`
--

CREATE TABLE `order10051` (
  `iid` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `sub_tot` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order10051`
--

INSERT INTO `order10051` (`iid`, `quantity`, `sub_tot`) VALUES
(10018, 1, 95.00);

-- --------------------------------------------------------

--
-- Table structure for table `ords`
--

CREATE TABLE `ords` (
  `oid` int(5) NOT NULL,
  `hid` int(5) DEFAULT NULL,
  `cid` int(5) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `dat` date DEFAULT NULL,
  `tim` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ords`
--

INSERT INTO `ords` (`oid`, `hid`, `cid`, `status`, `dat`, `tim`) VALUES
(10016, 1, 1, 'Delivered', '2019-10-16', '23:41:34'),
(10017, 2, 1, 'Delivered', '2019-10-16', '23:41:35'),
(10026, 1, 1, 'Delivered', '2019-10-17', '23:51:56'),
(10027, 6, 3, 'Delivered', '2019-10-17', '23:20:12'),
(10028, 7, 3, 'Delivered', '2019-10-17', '23:20:12'),
(10029, 2, 3, 'Delivered', '2019-10-17', '23:20:12'),
(10030, 1, 3, 'Delivered', '2019-10-17', '23:20:12'),
(10035, 1, 1, 'Delivered', '2019-10-17', '23:51:56'),
(10036, 2, 1, 'Delivered', '2019-10-17', '23:51:56'),
(10037, 6, 1, 'Delivered', '2019-10-17', '23:51:56'),
(10038, 7, 1, 'Delivered', '2019-10-17', '23:51:56'),
(10044, 1, 1, 'Delivered', '2019-10-18', '09:19:14'),
(10045, 2, 1, 'Ordered', '2019-10-18', '09:19:14'),
(10050, 1, 1, 'Ordered', '2019-11-07', '20:49:12'),
(10051, 2, 1, 'Ordered', '2019-11-07', '20:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `provide`
--

CREATE TABLE `provide` (
  `hid` int(5) DEFAULT NULL,
  `iid` int(5) DEFAULT NULL,
  `price` float(6,2) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provide`
--

INSERT INTO `provide` (`hid`, `iid`, `price`, `type`) VALUES
(1, 10014, 120.00, 'Veg Main Course'),
(1, 10015, 60.00, 'Non Veg Main Course'),
(1, 10018, 90.00, 'Starter'),
(1, 10019, 120.00, 'Veg Main Course'),
(1, 10020, 90.00, 'Biriyani'),
(1, 10021, 90.00, 'Starter'),
(1, 10022, 85.00, 'Starter'),
(1, 10023, 100.00, 'Starter'),
(1, 10024, 90.00, 'Starter'),
(1, 10025, 100.00, 'Starter'),
(1, 10026, 75.00, 'Non Veg Main Course'),
(1, 10027, 150.00, 'Non Veg Main Course'),
(1, 10028, 150.00, 'Non Veg Main Course'),
(1, 10029, 100.00, 'Biriyani'),
(1, 10030, 150.00, 'Biriyani'),
(2, 10018, 95.00, 'Starter'),
(2, 10014, 100.00, 'Veg Main Course'),
(2, 10019, 150.00, 'Veg Main Course'),
(2, 10031, 95.00, 'Starter'),
(6, 10015, 60.00, 'Non Veg Main Course'),
(6, 10018, 90.00, 'Starter'),
(6, 10014, 110.00, 'Veg Main Course'),
(6, 10019, 120.00, 'Veg Main Course'),
(6, 10028, 150.00, 'Non Veg Main Course'),
(6, 10030, 120.00, 'Biriyani'),
(6, 10027, 120.00, 'Non Veg Main Course'),
(6, 10022, 90.00, 'Starter'),
(6, 10020, 80.00, 'Biriyani'),
(6, 10023, 90.00, 'Starter'),
(6, 10025, 90.00, 'Starter'),
(6, 10026, 60.00, 'Non Veg Main Course'),
(6, 10021, 90.00, 'Starter'),
(6, 10029, 150.00, 'Biriyani'),
(6, 10024, 80.00, 'Starter'),
(7, 10015, 55.00, 'Non Veg Main Course'),
(7, 10018, 85.00, 'Starter'),
(7, 10014, 100.00, 'Veg Main Course'),
(7, 10032, 10.00, 'Indian Breads'),
(7, 10033, 20.00, 'Indian Breads'),
(7, 10034, 25.00, 'Indian Breads'),
(7, 10035, 20.00, 'Indian Breads'),
(7, 10036, 25.00, 'Indian Breads'),
(7, 10037, 18.00, 'Indian Breads'),
(7, 10023, 100.00, 'Starter'),
(7, 10019, 90.00, 'Veg Main Course'),
(7, 10028, 150.00, 'Non Veg Main Course'),
(7, 10030, 120.00, 'Biriyani'),
(7, 10027, 130.00, 'Non Veg Main Course'),
(7, 10022, 85.00, 'Starter'),
(7, 10024, 75.00, 'Starter'),
(7, 10029, 100.00, 'Biriyani'),
(7, 10026, 60.00, 'Non Veg Main Course'),
(7, 10021, 90.00, 'Starter'),
(7, 10020, 90.00, 'Biriyani'),
(7, 10038, 90.00, 'Biriyani'),
(1, 10039, 60.00, 'Breakfast'),
(1, 10040, 20.00, 'Breakfast'),
(1, 10041, 45.00, 'Breakfast'),
(1, 10042, 50.00, 'Breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `RID` int(6) NOT NULL,
  `CID` int(5) DEFAULT NULL,
  `HID` int(5) DEFAULT NULL,
  `IID` int(5) DEFAULT NULL,
  `DAT` date DEFAULT NULL,
  `TIM` time DEFAULT NULL,
  `REVIEW` varchar(50) DEFAULT NULL,
  `RATING` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `fkbillcid` (`cid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cusername` (`cusername`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hid`),
  ADD UNIQUE KEY `husername` (`husername`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `ords`
--
ALTER TABLE `ords`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `fkordscid` (`cid`),
  ADD KEY `fkordshid` (`hid`);

--
-- Indexes for table `provide`
--
ALTER TABLE `provide`
  ADD KEY `fk_provide_iid` (`iid`),
  ADD KEY `fk_provide_hid` (`hid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`RID`),
  ADD KEY `fk_reviewscid` (`CID`),
  ADD KEY `fk_reviewhid` (`HID`),
  ADD KEY `fk_reviewiid` (`IID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000033;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `iid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10043;

--
-- AUTO_INCREMENT for table `ords`
--
ALTER TABLE `ords`
  MODIFY `oid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10052;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fkbillcid` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE;

--
-- Constraints for table `ords`
--
ALTER TABLE `ords`
  ADD CONSTRAINT `fkordscid` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE,
  ADD CONSTRAINT `fkordshid` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hid`) ON DELETE CASCADE;

--
-- Constraints for table `provide`
--
ALTER TABLE `provide`
  ADD CONSTRAINT `fk_provide_hid` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hid`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_provide_iid` FOREIGN KEY (`iid`) REFERENCES `items` (`iid`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviewhid` FOREIGN KEY (`HID`) REFERENCES `hotel` (`hid`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_reviewiid` FOREIGN KEY (`IID`) REFERENCES `items` (`iid`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_reviewscid` FOREIGN KEY (`CID`) REFERENCES `customer` (`cid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
