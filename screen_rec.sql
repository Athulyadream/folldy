-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2018 at 10:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `screen_rec`
--

-- --------------------------------------------------------

--
-- Table structure for table `pc_scr_admins`
--

CREATE TABLE `pc_scr_admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(64) NOT NULL,
  `admin_phone` varchar(10) NOT NULL,
  `admin_email` varchar(64) NOT NULL,
  `admin_username` varchar(64) NOT NULL,
  `admin_password` varchar(120) NOT NULL,
  `admin_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` varchar(10) NOT NULL,
  `updated_on` varchar(10) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc_scr_admins`
--

INSERT INTO `pc_scr_admins` (`admin_id`, `admin_name`, `admin_phone`, `admin_email`, `admin_username`, `admin_password`, `admin_status`, `created_on`, `updated_on`, `updated_by`) VALUES
(1, 'Primal COdes', '9497305362', 'jibinprimalcodes@gmail.com', 'primal_codes', '$2y$10$6a2Qe6vjNWgZ8.Qb5XaFMOtTFhgKfrMtJ9sLR6I5bLD2HuCB0ZfAy', 1, '1564000000', '1564000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pc_scr_keywords`
--

CREATE TABLE `pc_scr_keywords` (
  `keyword_id` int(11) NOT NULL,
  `keyword_value` varchar(120) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `created_on` varchar(10) NOT NULL,
  `updated_on` varchar(10) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc_scr_keywords`
--

INSERT INTO `pc_scr_keywords` (`keyword_id`, `keyword_value`, `transaction_id`, `created_on`, `updated_on`, `updated_by`) VALUES
(1, 'asd', 1, '1542976336', '1542976336', 1),
(2, 'asdsad', 1, '1542976337', '1542976337', 1),
(3, 'sadasdasd', 1, '1542976338', '1542976338', 1),
(4, 'Person A Deposit', 2, '1543482492', '1543482492', 1),
(5, 'Person A', 2, '1543482497', '1543482497', 1),
(6, '2000', 2, '1543482501', '1543482501', 1),
(7, 'Person A', 3, '1543482530', '1543482530', 1),
(8, 'Person A withdraw', 3, '1543482542', '1543482542', 1),
(9, '350', 3, '1543482546', '1543482546', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pc_scr_questions`
--

CREATE TABLE `pc_scr_questions` (
  `question_id` int(11) NOT NULL,
  `question_title` text NOT NULL,
  `table_id` int(11) NOT NULL,
  `question_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` varchar(10) NOT NULL,
  `updated_on` varchar(10) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc_scr_questions`
--

INSERT INTO `pc_scr_questions` (`question_id`, `question_title`, `table_id`, `question_status`, `created_on`, `updated_on`, `updated_by`) VALUES
(1, 'asdasdsad', 1, 1, '1542976347', '1542976347', 1),
(2, 'Calculate Balance Sheet', 2, 1, '1543482781', '1543482781', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pc_scr_tables`
--

CREATE TABLE `pc_scr_tables` (
  `table_id` int(11) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `table_columns` int(11) NOT NULL,
  `column_one_name` varchar(23) NOT NULL,
  `column_two_name` varchar(32) NOT NULL,
  `column_three_name` varchar(32) NOT NULL,
  `column_four_name` varchar(32) NOT NULL,
  `column_five_name` varchar(32) NOT NULL,
  `column_one_width` int(11) NOT NULL,
  `column_two_width` int(11) NOT NULL,
  `column_three_width` int(11) NOT NULL,
  `column_four_width` int(11) NOT NULL,
  `column_five_width` int(11) NOT NULL,
  `column_one_sum` tinyint(4) NOT NULL,
  `column_two_sum` tinyint(4) NOT NULL,
  `column_three_sum` tinyint(4) NOT NULL,
  `column_four_sum` tinyint(4) NOT NULL,
  `column_five_sum` tinyint(4) NOT NULL,
  `table_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` varchar(10) NOT NULL,
  `updated_on` varchar(10) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc_scr_tables`
--

INSERT INTO `pc_scr_tables` (`table_id`, `table_name`, `table_columns`, `column_one_name`, `column_two_name`, `column_three_name`, `column_four_name`, `column_five_name`, `column_one_width`, `column_two_width`, `column_three_width`, `column_four_width`, `column_five_width`, `column_one_sum`, `column_two_sum`, `column_three_sum`, `column_four_sum`, `column_five_sum`, `table_status`, `created_on`, `updated_on`, `updated_by`) VALUES
(1, 'Sample table', 3, 'Desc', 'Debit', 'Credit', '', '', 60, 20, 20, 0, 0, 0, 1, 1, 0, 0, 1, '1542976067', '1542976067', 1),
(2, 'Credit Debit Table', 3, 'Description', 'Debit', 'Credit', '', '', 60, 20, 20, 0, 0, 0, 1, 1, 0, 0, 1, '1543482409', '1543482409', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pc_scr_transactions`
--

CREATE TABLE `pc_scr_transactions` (
  `transaction_id` int(11) NOT NULL,
  `transaction_title` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` varchar(10) NOT NULL,
  `updated_on` varchar(10) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc_scr_transactions`
--

INSERT INTO `pc_scr_transactions` (`transaction_id`, `transaction_title`, `question_id`, `question_status`, `created_on`, `updated_on`, `updated_by`) VALUES
(1, 'sadas', 1, 1, '1542976340', '1542976340', 1),
(2, 'Person A deposited $2000', 2, 1, '1543482505', '1543482505', 1),
(3, 'Person A Withdraw $350', 2, 1, '1543482778', '1543482778', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pc_scr_admins`
--
ALTER TABLE `pc_scr_admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `pc_scr_keywords`
--
ALTER TABLE `pc_scr_keywords`
  ADD PRIMARY KEY (`keyword_id`);

--
-- Indexes for table `pc_scr_questions`
--
ALTER TABLE `pc_scr_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `pc_scr_tables`
--
ALTER TABLE `pc_scr_tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `pc_scr_transactions`
--
ALTER TABLE `pc_scr_transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pc_scr_admins`
--
ALTER TABLE `pc_scr_admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pc_scr_keywords`
--
ALTER TABLE `pc_scr_keywords`
  MODIFY `keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pc_scr_questions`
--
ALTER TABLE `pc_scr_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pc_scr_tables`
--
ALTER TABLE `pc_scr_tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pc_scr_transactions`
--
ALTER TABLE `pc_scr_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
