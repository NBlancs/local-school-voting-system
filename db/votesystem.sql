-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 12:55 PM
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
-- Database: `votesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'admin', '$2y$10$fLK8s7ZDnM.1lE7XMP.J6OuPbQ.DPUVKBo7rENnQY7gYq0xAzsKJy', 'Noel Omar', 'Blanco', 'blanco_noelJhume.jpg', '2024-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `platform` text NOT NULL,
  `partylist_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `firstname`, `lastname`, `photo`, `platform`, `partylist_id`) VALUES
(63, 12, 'Larrance ', 'Baltazar', '441745445_7610981695612223_8835382123177848164_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(64, 13, 'Rhea', 'Tupas', '441872288_7610982008945525_8051383193215712341_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(65, 14, 'Redin', 'Semillano', '441872529_7610982245612168_7454903990230820469_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(66, 30, 'Leah', 'Vence', '441900073_7610982692278790_2101826817941416979_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(67, 31, 'Ian John', 'Nagangga', '441876278_7610982868945439_8928138598200367445_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(68, 32, 'Tresha', 'Benigno', '441880692_7610983298945396_4593588943328433281_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(69, 33, 'Ruvie', 'Lungay', '441872182_7610983612278698_6181268917564731110_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(70, 34, 'Grant Jasper', 'Sandag', '441872297_7610983808945345_6262973317320073474_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(71, 36, 'Errol', 'Pendon', '441874492_7610984185611974_7378558525440031153_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(72, 37, 'Jade', 'Ellorimo', '441880394_7610984382278621_7551520753552852817_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(73, 38, 'Sue', 'Vallescas', '441881930_7610984645611928_4735960588140164166_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(74, 44, 'Alix John', 'Escobal', '441727946_7610984928945233_4888607574015864459_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(75, 45, 'Junkenith', 'Casing', '441890134_7610985112278548_7660198587973646291_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(76, 46, 'Mary Jane', 'Atillo', '441887447_7610985235611869_7372287221883175631_n.jpg', 'Transparency, Attendance Policy, Fines, Peso Print, Suggestion Box', 11),
(77, 12, 'Den Mark', 'Vicoy', '445719838_460943479680430_6673653020106909707_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.', 12),
(78, 13, 'Jhon Michael', 'Retalla', '444479403_460948046346640_3844967401728189651_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.', 12),
(79, 14, 'Angel', 'Micabalo', '445034531_460948419679936_3198972999916826791_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.', 12),
(80, 30, 'John Vincent', 'Justol', '445003818_460948653013246_5440231448985296423_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.', 12),
(81, 31, 'Gabriel', 'Roca', '445436820_460949073013204_7238794813528961760_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.\r\n', 12),
(82, 33, 'Dexie', 'Dela Rosa', '445551522_460950023013109_8901283282904858196_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.\r\n', 12),
(83, 34, 'Kenny', 'Adrigado', '445423300_460950386346406_4435556859743596611_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.\r\n', 12),
(84, 46, 'Jhazdia Jhune', 'Bandoy', '444759539_460951176346327_397781922987997181_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.\r\n', 12),
(85, 38, 'Kristine Jay', 'Jamora', '445029404_460951939679584_8238047226108922749_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.\r\n', 12),
(86, 45, 'Richmond', 'Tadle', '442483465_460952573012854_5839251884292703342_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.\r\n', 12),
(87, 37, 'Shenah', 'Caños', '442495681_460953463012765_6843923835283922240_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.\r\n', 12),
(88, 36, 'Krisha Lou', 'Into', '445488629_460954553012656_976737411001110070_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.\r\n', 12),
(89, 44, 'Jean', 'Tampus', '438302707_460954633012648_468666293296154524_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.\r\n', 12),
(90, 32, 'Cearg Ryam', 'Trinidad', '445804925_461111912996920_2333451799986328874_n.jpg', 'Transparency, Card Based Attendance, Food and Crafts Bazaar, Environmental Awareness, SUPPORTTKAORG, Empowering Students, Seminar, Update for You, Student Welfare, Space Safe Act.\r\n', 12),
(91, 12, 'John Michael', 'Roxas', '445365059_3888476158139620_8587592264361769341_n.jpg', 'Fundraising Events, Education Workshops, Art and Creativity Initiatives, Collaboration with our organizations and other school organization, Health and Hygiene Kits, Alumni Engagement, Transporation Supports.', 13);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `max_vote`, `priority`) VALUES
(12, 'President', 1, 1),
(13, 'Internal V-President', 1, 2),
(14, 'External V-President', 1, 3),
(30, 'Secretary', 1, 4),
(31, 'Asst. Secretary', 1, 5),
(32, 'Treasurer', 1, 6),
(33, 'Asst. Treasurer', 1, 7),
(34, 'Auditor', 1, 8),
(35, 'BSBA 1st Year Representative', 1, 9),
(36, 'BSBA 2nd Year Representative', 1, 10),
(37, 'BSBA 3rd Year Representative', 1, 11),
(38, 'BSBA 4th Year Representative', 1, 12),
(43, 'BSIT 1st Year Representative', 1, 13),
(44, 'BSIT 2nd Year Representative', 1, 14),
(45, 'BSIT 3rd Year Representative', 1, 15),
(46, 'BSIT 4th Year Representative', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partylist`
--

CREATE TABLE `tbl_partylist` (
  `id` int(11) NOT NULL,
  `partylist` varchar(255) NOT NULL,
  `partylistslogan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_partylist`
--

INSERT INTO `tbl_partylist` (`id`, `partylist`, `partylistslogan`) VALUES
(11, 'ICARE Partylist', 'Serving you with Care. ICARE, You care, We care! '),
(12, 'Blaze Partylist', 'Building Leaders, Achieving Zeal, Empowering Change. \"We are here to serve, not to be served\"'),
(13, 'Independent', '\"CHOOSE THE LEADER THAT WILL CHOOSE YOU\" ');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `voters_id` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `email`, `voters_id`, `password`, `firstname`, `lastname`, `photo`, `status`) VALUES
(46, 'hanyunikul@gmail.com', 'LEiP65xQyJhp4mY', '$2y$10$mS3cYJVCBSA/YinPcaQX0usr5VvrrDD8sWJYQGJr5Z5YZzzkzjmXK', 'Yohan', 'Callanta', '431328628_360766570268650_2716999355067969384_n.jpg', 1),
(47, 'balondoytisoy@gmail.com', 'GOuFTSmgx1MnELe', '$2y$10$6H8rZtuE2Zjay7uUPXKHNuXbKuTBMPiNDJqJDH3RKQomxiXTT5X1W', 'James', 'Culibar', '44794758_1855633754550081_8286312259945234432_n.jpg', 1),
(48, 'noeljhumel@aclcbukidnon.com', 'Y6VGne532xWtaUL', '$2y$10$9Uyy7u1uaLgUr5Op/1qQmeUwQg.RSDyRg.aMKyED3BJCU83uPGogO', 'Noel Jhumel', 'Blanco', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voters_id`, `candidate_id`, `position_id`) VALUES
(224, 45, 63, 12),
(225, 45, 78, 13),
(226, 45, 79, 14),
(227, 45, 66, 30),
(228, 45, 81, 31),
(229, 45, 68, 32),
(230, 45, 82, 33),
(231, 45, 70, 34),
(232, 45, 71, 36),
(233, 45, 87, 37),
(234, 45, 73, 38),
(235, 45, 74, 44),
(236, 45, 86, 45),
(237, 45, 76, 46),
(238, 47, 77, 12),
(239, 47, 64, 13),
(240, 47, 65, 14),
(241, 47, 66, 30),
(242, 47, 81, 31),
(243, 47, 68, 32),
(244, 47, 69, 33),
(245, 47, 70, 34),
(246, 47, 88, 36),
(247, 47, 72, 37),
(248, 47, 73, 38),
(249, 47, 74, 44),
(250, 47, 86, 45),
(251, 47, 76, 46),
(252, 48, 63, 12),
(253, 48, 78, 13),
(254, 48, 65, 14),
(255, 48, 66, 30),
(256, 48, 67, 31),
(257, 48, 68, 32),
(258, 48, 82, 33),
(259, 48, 70, 34),
(260, 48, 71, 36),
(261, 48, 87, 37),
(262, 48, 73, 38),
(263, 48, 74, 44),
(264, 48, 75, 45),
(265, 48, 76, 46);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_partylist`
--
ALTER TABLE `tbl_partylist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_partylist`
--
ALTER TABLE `tbl_partylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
