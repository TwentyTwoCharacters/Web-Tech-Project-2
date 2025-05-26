-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2025 at 03:01 AM
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
-- Database: `jobs`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
