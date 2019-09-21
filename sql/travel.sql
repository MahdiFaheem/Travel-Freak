-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2019 at 10:08 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fbackId` int(40) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `personId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fbackId`, `rating`, `comment`, `personId`) VALUES
(17, 'good', 'Onek nayes				', 10),
(18, 'bad', '	very good					', 10);

-- --------------------------------------------------------

--
-- Table structure for table `foodcox`
--

CREATE TABLE `foodcox` (
  `foodId` int(40) NOT NULL,
  `foodName` varchar(30) NOT NULL,
  `foodType` varchar(20) NOT NULL,
  `foodPrice` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodcox`
--

INSERT INTO `foodcox` (`foodId`, `foodName`, `foodType`, `foodPrice`) VALUES
(1, 'Bengali (parata, curry etc.)', 'Breakfast', 200),
(2, 'Western(bread, butter, etc)', 'Breakfast', 280),
(3, 'Bengali', 'lunch', 300),
(4, 'Sea Food', 'lunch', 550),
(5, 'Chinese', 'lunch', 480),
(6, 'Bengali', 'Dinner', 300),
(7, 'Seafood', 'Dinner', 550),
(8, 'Chinese', 'Dinner', 480);

-- --------------------------------------------------------

--
-- Table structure for table `hotelcox`
--

CREATE TABLE `hotelcox` (
  `htlId` int(40) NOT NULL,
  `htlName` varchar(100) NOT NULL,
  `sPrice` int(20) NOT NULL,
  `dPrice` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotelcox`
--

INSERT INTO `hotelcox` (`htlId`, `htlName`, `sPrice`, `dPrice`) VALUES
(1, 'Sayeman Beach Resort', 7300, 9250),
(2, 'Royal Tulip Sea Pearl Beach Resort & Spa', 6465, 8365),
(3, 'Hotel Prime park', 3717, 4717),
(4, 'Orchid Blue ', 3571, 4971),
(5, 'Hotel Marine Plaza', 2920, 3999),
(6, 'Hotel Sea Crown', 2197, 2999);

-- --------------------------------------------------------

--
-- Table structure for table `hotelsylhet`
--

CREATE TABLE `hotelsylhet` (
  `htlId` int(40) NOT NULL,
  `htlName` varchar(100) NOT NULL,
  `sPrice` int(20) NOT NULL,
  `dPrice` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotelsylhet`
--

INSERT INTO `hotelsylhet` (`htlId`, `htlName`, `sPrice`, `dPrice`) VALUES
(1, 'Rose View Hotel', 8300, 9450),
(2, 'Hotel Star Pacific', 6660, 7750),
(3, 'The Boutique Hotel', 4470, 5980),
(4, 'Hotel Noorjahan Grand', 3120, 4880),
(5, 'Hotel Garden Inn', 2970, 3999);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `personId` int(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personId`, `name`, `password`, `phone`, `email`, `type`) VALUES
(1, 'admin', 'admin', 1622334543, 'admin@gmail.com', 1),
(10, 'faheem', '12345678', 1521433753, 'faheem@abc.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`) VALUES
(1, 'Cox\'s Bazar'),
(2, 'Sundarban'),
(3, 'Kuakata Sea Beach'),
(4, 'Sylhet'),
(5, 'Sajek'),
(6, 'Bandarban');

-- --------------------------------------------------------

--
-- Table structure for table `placecox`
--

CREATE TABLE `placecox` (
  `placeId` int(40) NOT NULL,
  `dstName` varchar(100) NOT NULL,
  `popularity` int(3) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placecox`
--

INSERT INTO `placecox` (`placeId`, `dstName`, `popularity`, `description`, `image`) VALUES
(1, 'Sea Beach', 0, 'Take a vacation to the longest sea beach in the world at Cox\'s Bazar Beach. At 125 km (78 mi) long, this impressive stretch of shoreline offers plenty of room to stretch out, so much so that you might feel like you have the whole place to yourself. Situated between the Bakkali River and the Bay of Bengal, the beach offers smooth sand and a gentle slope into the water, so even children can swim safely. Join in activities like speed boating, horseback riding, and playing football, or simply collect sea-worn stones from the shore.', 'images/coxBazar.jpg'),
(2, 'Himchori Water fall', 0, 'Observe the diverse wildlife found at Himchori Waterfall, with over 55 animal species and 117 plant species located in the national park, including elephants, tigers, wild boars, sloths, and many more. A nearby waterfall cascades over moss-covered stones, while the beach looks out over the Bengal bay. Take the forest trail up the hill to enjoy panoramic sea views, or stay nearer the beach and treat yourself to a fresh coconut.', 'images/hichari.jpg'),
(3, '100Feet Buddha', 1, 'The statue of Great Buddha is the third largest statue in the world, located at Ramu, 20 km from Cox\'sbazar towards Chittagong.', 'images/100ft.jpg'),
(4, 'Inani Beach', 0, 'Located around 32 kilometers to the south of the popular tourist destination of Cox\'s Bazar in Bangladesh, the beautiful Inani Beach attracts visitors who appreciate the wonders of nature. Inani Beach is just as beautiful as the beach at Cox\'s Bazar.', 'images/inanibeach.jpg'),
(5, 'Sangu River', 1, 'A river with big boulders. Many of the waterfalls of bandarban directly fall into Sangu. Over the seasons, sangu changes its nature and beauty. This river is surrounded by lash green hillocks and jungles. Most beautiful scenery of this river could be seen from Thanchi to Remakri.', 'images/sangu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `placesylhet`
--

CREATE TABLE `placesylhet` (
  `placeId` int(40) NOT NULL,
  `dstName` varchar(100) NOT NULL,
  `popularity` int(3) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placesylhet`
--

INSERT INTO `placesylhet` (`placeId`, `dstName`, `popularity`, `description`, `image`) VALUES
(1, 'Sreemongol and Tea Gardens', 0, 'In Sylhet, Sreemongol has long been credited as a top tourist attraction having earned its recognition as a town as early as the beginning of the19th century. Even though the first ever tea garden in Sylhet Malnichara was established near Sylhet city in 1854, large tea estates eventually found their niche in Sreemongol town and the surrounding hills and mountains. The only tea research institute in Bangladesh BTRI which is a popular tourist destination is also situated in this town. Of the 138 tea gardens in Greater Sylhet, 38 are situated in Sreemongol, and this number would be no fewer than 60 when added to gardens in the surrounding areas.', 'images/sreemongol.jpg'),
(2, 'Hazrat Shahjalal Mazar Sharif', 0, 'This Mazar is where Hazrat Shahjalal is where Hazrat Shahjalal is remembered. He was known to have come here within this region and preach Islam with a few of his followers. People come and pray here for their own peace and sanity. It is quite beautiful but very busy at times. It is also very historical.', 'images/mazar.jpg'),
(3, 'Jaflong', 0, 'Despite the loss of its former splendour due to unrestricted mining and crushing of stones, Jaflong is still a must see destination for tourists visiting Sylhet. Flowing from the north Khasi mountains, the river Dauki enters Bangladesh under the name Piyain, along the bank of which lies the spectacular Jaflong. About 62 km north-east from Sylhet city, Jaflong is in the East Jaflong Union under Guainghat Upazilla. Visitors can hire boats to go to the Zero Point and see the beautiful hanging bridge over the Dauki.', 'images/jaflong.jpg'),
(4, 'Ratargul Swamp Forest', 1, 'Ratargul is the only freshwater swamp forest in Bangladesh. Despite its existence over a vast stretch of swampland in the not too distant past, the swamp forest now occupies an area of only two square kilometres. A dense forest comprising mostly native hijol and koroch trees, Ratargul offers a sanctuary for different species of birds, monkeys, snakes and other reptiles.', 'images/ratargul.jpg'),
(5, 'Lawachara National Park', 1, 'On the Vanugach-Komalganj Road about seven kilometres from Sreemongol town is the entry to Lauachora National Garden. It is an evergreen rainforest with excessive precipitation. Tall trees with their lofty branches and soaring foliage make for a unique cover for the forest on a sunny day. Lauachora is one of the seven safari parks and 10 national gardens in Bangladesh. An area of 1,250 hectares from the 2,740-hectare West Vanugach Reserve Forest was declared a national garden in 1996.', 'images/lawachara.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `planId` int(30) NOT NULL,
  `strtDate` date NOT NULL,
  `endDate` date NOT NULL,
  `totalDate` int(30) NOT NULL,
  `noOfpeople` int(20) NOT NULL,
  `htlBill` int(30) NOT NULL DEFAULT '0',
  `foodBill` int(30) NOT NULL DEFAULT '0',
  `totalBill` int(30) NOT NULL DEFAULT '0',
  `pay` int(10) NOT NULL DEFAULT '0',
  `personId` int(40) NOT NULL,
  `htlId` int(40) DEFAULT NULL,
  `foodId` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`planId`, `strtDate`, `endDate`, `totalDate`, `noOfpeople`, `htlBill`, `foodBill`, `totalBill`, `pay`, `personId`, `htlId`, `foodId`) VALUES
(48, '2019-08-20', '2019-08-22', 2, 3, 33100, 2480, 35580, 1, 10, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `uplace`
--

CREATE TABLE `uplace` (
  `pid` int(20) NOT NULL,
  `placeName` varchar(100) NOT NULL,
  `personId` int(40) NOT NULL,
  `strtDate` date NOT NULL,
  `endDate` date NOT NULL,
  `totalBill` int(30) DEFAULT NULL,
  `pay` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uplace`
--

INSERT INTO `uplace` (`pid`, `placeName`, `personId`, `strtDate`, `endDate`, `totalBill`, `pay`) VALUES
(5, 'Sea Beach', 10, '2019-08-20', '2019-08-22', 35580, 1),
(6, 'Himchori Water fall', 10, '2019-08-20', '2019-08-22', 35580, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fbackId`);

--
-- Indexes for table `hotelsylhet`
--
ALTER TABLE `hotelsylhet`
  ADD PRIMARY KEY (`htlId`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personId`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placecox`
--
ALTER TABLE `placecox`
  ADD PRIMARY KEY (`placeId`);

--
-- Indexes for table `placesylhet`
--
ALTER TABLE `placesylhet`
  ADD PRIMARY KEY (`placeId`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`planId`),
  ADD KEY `fk2` (`foodId`),
  ADD KEY `fk5` (`personId`),
  ADD KEY `fk6` (`htlId`) USING BTREE;

--
-- Indexes for table `uplace`
--
ALTER TABLE `uplace`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk7` (`personId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fbackId` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hotelsylhet`
--
ALTER TABLE `hotelsylhet`
  MODIFY `htlId` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `personId` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `placecox`
--
ALTER TABLE `placecox`
  MODIFY `placeId` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `placesylhet`
--
ALTER TABLE `placesylhet`
  MODIFY `placeId` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `planId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `uplace`
--
ALTER TABLE `uplace`
  MODIFY `pid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `uplace`
--
ALTER TABLE `uplace`
  ADD CONSTRAINT `fk7` FOREIGN KEY (`personId`) REFERENCES `person` (`personId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
