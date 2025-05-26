-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 03:22 PM
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
-- Database: `finalproject2`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `jobid` varchar(40) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `street` varchar(40) DEFAULT NULL,
  `suburb` varchar(40) DEFAULT NULL,
  `postcode` varchar(4) DEFAULT NULL,
  `state` varchar(3) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `skills_networks` tinyint(1) DEFAULT NULL,
  `skills_computer` tinyint(1) DEFAULT NULL,
  `codinglang_html` tinyint(1) DEFAULT NULL,
  `codinglang_css` tinyint(1) DEFAULT NULL,
  `codinglang_java` tinyint(1) DEFAULT NULL,
  `otherskills` text DEFAULT NULL,
  `resume_file` varchar(255) DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `jobid`, `firstname`, `lastname`, `dob`, `gender`, `street`, `suburb`, `postcode`, `state`, `phone`, `email`, `skills_networks`, `skills_computer`, `codinglang_html`, `codinglang_css`, `codinglang_java`, `otherskills`, `resume_file`, `status`) VALUES
(1, 'G05', 'Luke', 'Kelly', '0000-00-00', 'Male', '32 Blah St', 'Bentleigh East', '3165', 'VIC', '0480134198', 'lukekelly11b@gmail.com', 1, 0, NULL, NULL, NULL, 'hiii', '0', 'Current');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_ref` varchar(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `salary_range` varchar(50) DEFAULT NULL,
  `reports_to` varchar(100) DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `essential_skills` text DEFAULT NULL,
  `preferable_skills` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_ref`, `title`, `description`, `salary_range`, `reports_to`, `responsibilities`, `essential_skills`, `preferable_skills`) VALUES
(1, 'G05A1', 'IT Support Technician', 'The IT Support Technician will provide technical support to staff...', '$60,000 – $75,000 AUD', 'IT Services Manager', 'Provide Level 1 IT support\nAssist with installation and maintenance\nDocument incidents\nCollaborate on upgrades', 'Certificate IV in IT\n1+ years experience\nWindows/Mac familiarity', 'Ticketing systems\nCybersecurity basics'),
(2, 'GD302', 'Software Developer', 'We\'re seeking a Software Developer to build applications...', '$80,000 – $110,000 AUD', 'Lead Software Engineer', 'Design scalable software\nWrite clean code\nCollaborate with teams\nMaintain codebases', 'Bachelor’s in CS\n3+ years experience\nHTML, CSS, JS, Python', 'React/Node.js/Flask\nGit knowledge');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password124');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
