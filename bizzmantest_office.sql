-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 03:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bizzmantest_office`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `balance_sheet` varchar(255) DEFAULT NULL,
  `profit_and_loss` varchar(255) DEFAULT NULL,
  `bank_statement` varchar(255) DEFAULT NULL,
  `loan_confirmation` text DEFAULT NULL,
  `vouchers` varchar(255) DEFAULT NULL,
  `trail_balance` varchar(255) DEFAULT NULL,
  `memorandum_article_association` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `folder_id`, `company_id`, `balance_sheet`, `profit_and_loss`, `bank_statement`, `loan_confirmation`, `vouchers`, `trail_balance`, `memorandum_article_association`) VALUES
(1, 3, 8, NULL, NULL, 'ABHIEERU_COMPLEX_SHARE_LIST.pdf', 'dfgdsjh hsfgsbf ehjfgsfj', NULL, '45', 'gffg');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company_id` varchar(255) NOT NULL,
  `company_vertical` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `registered_office_address` varchar(255) NOT NULL,
  `corporate_office_address` varchar(255) NOT NULL,
  `admin_office_address` varchar(255) NOT NULL,
  `factory_address` varchar(255) NOT NULL,
  `branch_address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `office_number` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `work_of_client` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 1,
  `created_by` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_id`, `company_vertical`, `company_name`, `contact_person`, `registered_office_address`, `corporate_office_address`, `admin_office_address`, `factory_address`, `branch_address`, `email`, `password`, `website`, `office_number`, `mobile_number`, `work_of_client`, `status`, `created_by`, `created_at`, `modified_at`) VALUES
(3, 'COMP002', 1, 'Construction PVT. LTD.', 'Gaurav', 'Howrah', 'Howrah', '', '', '', 'saurabhmishra2100@gmail.com', '741dfb1614499a1bb0c50fbde37f817e35f63bd41e81f73af1566bd52a1494f4d70c0e376692d41bce8c0c90d11e357ab82e03e3e97f9ce5f2b1e792116f8735', 'construction.com', '8420465985', '8420465985', 'Building Construction', 1, '1', '2022-08-23 04:12:36', '2022-08-23 08:12:36'),
(18, 'asd0011', 1, 'BizzmanWeb', 'sudipta', 'Kolkata', 'gfgfh dfgf', '', '', '', 'pwc@gmail.com', '', '', '', '987456123', '', 1, '1', '2022-06-16 10:02:17', '0000-00-00 00:00:00'),
(19, 'asd0022', 2, 'KPMC', 'sudipta', 'salt lake', 'gfgfh fgrtvcngv nbhm', '', '', '', 'kpmc@gmail.com', '', '', '', '321456789', '', 1, '1', '2022-06-16 10:02:17', '0000-00-00 00:00:00'),
(20, 'COMP003', 3, 'redd', 'vijay test', 'salt lake', 'salt lake', 'sector 2', 'Bidhannagar', 'Bidhannagar', 'test123@gmail.com', 'cde32637535d9c1c44ff69e4d323847003781c379f47734eab7f1caab349305fb56c53c656ad176bdcda6347645a80a2bdac33ee780b2ad2aabe429391240f32', 'https://fgfgf.com', 'vvvvvvv', 'fgfffgghghghgh', 'test', 1, '1', '2022-07-11 10:24:14', '2022-07-11 14:24:14'),
(22, 'COMP004', 4, 'vijat test', 'test vijay', 'fddffd', 'fdfddf', 'fdfddfgddzg', 'fdfdfdgzdzdgzdf', 'dfddfdfgzdgzdgdzt est', 'fdfddffd@gmailcom', 'e4fc692450b4c6f978c86ee14e9a8c78002c5e25b49dc47504bdcb97f64b7ca7f6df81e67609dd0305881d2eca12ccd1c358202e3a95b9b09df94191cec5c0c9', 'djd', 'djdd', 'hjjdjd', 'dgjjdjd', 1, '1', '2022-07-11 10:27:31', '2022-07-11 14:27:31'),
(23, 'COMP005', 10, 'ABC', '123', 'KOLKATA', 'KOLKATA', 'kOLKATA', 'KOLKATA', 'kOLKATA', 'A@gmail.com', '91ffc40a64976f7580c7e88fdb147ab9e2d20b355a8dddcb6f3700589fda4aa017f092d88a7d2d9b78de161c6b90aebcad0f548909750f79847bb29e26accb23', 'www.123', '12345678', '12345678', 'test', 1, '1', '2022-08-17 06:19:19', '2022-08-17 10:19:19'),
(24, 'COMP006', 1, 'ABC', 'ASHOK', '23A, N.S.Road, Kolkata-700001', '23a, N.S.Road, Kolkata-700001', '23a, N.S.Road, Kolkata-700001', '23a, N.S.Road, Kolkata-700001', '23a, N.S.Road, Kolkata-700001', 'abc@gmail.com', 'c281728400c2e643daf2e316f6698574d780fb4a31b5b320117fd40389e5af52095b69cfa34e7695e078b14d05d1221b12ea4f8c47dc23d68d4443cfa32ed9b2', 'abc.com', '033-400510570000', '983115125000000000', 'ROC annual filing, gst monthly return, income tax etc.\r\n', 1, '1', '2022-08-22 16:35:42', '2022-08-22 16:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `company_verticals`
--

CREATE TABLE `company_verticals` (
  `id` int(11) NOT NULL,
  `name` varchar(233) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_verticals`
--

INSERT INTO `company_verticals` (`id`, `name`, `created_by`, `created_at`, `modified_at`) VALUES
(1, 'asdsd', 1, '2021-07-16 10:53:55', '2022-08-22 16:50:21'),
(2, 'Construction', 1, '2021-07-16 11:07:19', '2021-07-16 11:07:19'),
(3, 'real estate', 1, '2021-07-29 06:40:34', '2021-10-01 10:36:33'),
(4, 'demo', 1, '2022-04-01 07:47:24', '2022-04-01 07:47:24'),
(5, 'IT company', 1, '2022-06-16 14:04:44', '2022-06-16 14:04:44'),
(8, 'cs group 1', 1, '2022-07-11 14:35:36', '2022-07-11 14:35:52'),
(9, 'cs group 2', 1, '2022-07-11 14:36:11', '2022-07-11 14:36:11'),
(10, 'RRA', 1, '2022-08-17 10:03:15', '2022-08-17 10:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `sub_task` varchar(255) NOT NULL,
  `super_sub_task` varchar(255) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `completion` date NOT NULL,
  `timeby` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `company`, `task`, `sub_task`, `super_sub_task`, `project_manager`, `created_by`, `status`, `completion`, `timeby`) VALUES
(1, 8, '1', '1', '3', 2, 1, 1, '2022-05-27', '2022-05-30'),
(2, 3, '1', '4', '', 5, 1, 1, '2022-05-30', '2022-06-08'),
(3, 8, '1', '1', '3', 2, 1, 1, '2022-06-17', '2022-06-20'),
(4, 18, '4', '', '', 3, 1, 1, '2022-07-15', '2022-07-31'),
(5, 3, '', '', '', 1, 1, 1, '0000-00-00', '0000-00-00'),
(6, 18, '1', '1', '3', 1, 1, 1, '2022-07-11', '2022-07-12'),
(7, 3, '', '', '', 1, 1, 1, '0000-00-00', '0000-00-00'),
(8, 3, '', '', '', 1, 1, 1, '0000-00-00', '0000-00-00'),
(9, 3, '', '', '', 1, 1, 1, '0000-00-00', '0000-00-00'),
(10, 3, '', '', '', 1, 1, 1, '0000-00-00', '0000-00-00'),
(11, 3, '', '', '', 1, 1, 1, '0000-00-00', '0000-00-00'),
(12, 3, '', '', '', 1, 1, 1, '0000-00-00', '0000-00-00'),
(13, 3, '', '', '', 1, 1, 1, '0000-00-00', '0000-00-00'),
(14, 3, '', '', '', 1, 1, 1, '0000-00-00', '0000-00-00'),
(15, 23, '1', '1', '3', 3, 1, 1, '2022-08-15', '2022-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `sub_task_id` int(11) NOT NULL,
  `super_sub_task_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `task_id`, `sub_task_id`, `super_sub_task_id`, `created_by`, `project_id`) VALUES
(1, 0, 1, 1, 1, 1),
(2, 0, 1, 1, 1, 1),
(3, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `docfile`
--

CREATE TABLE `docfile` (
  `id` int(11) NOT NULL,
  `image_name` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `file_assign_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docfile`
--

INSERT INTO `docfile` (`id`, `image_name`, `created_by`, `modified_at`, `created_at`, `status`, `type`, `file_assign_id`) VALUES
(1, '41.png', 1, '2021-12-14 09:16:52', '2021-12-14 09:16:52', 1, 'image/png', 1),
(2, 'image3.png', 1, '2021-12-14 09:18:00', '2021-12-14 09:18:00', 1, 'image/png', 2),
(3, '131.png', 1, '2022-01-17 10:17:26', '2022-01-17 10:17:26', 1, 'image/png', 1),
(4, '212.png', 1, '2022-01-17 10:17:26', '2022-01-17 10:17:26', 1, 'image/png', 1),
(5, '20210409124357-2021-04-09service1243141.jpg', 1, '2022-01-17 10:32:12', '2022-01-17 10:32:12', 1, 'image/jpeg', 1),
(6, '132.png', 1, '2022-01-28 10:08:55', '2022-01-28 10:08:55', 1, 'image/png', 1),
(7, '213.png', 1, '2022-01-28 10:08:55', '2022-01-28 10:08:55', 1, 'image/png', 1),
(8, '36.png', 1, '2022-01-28 10:08:55', '2022-01-28 10:08:55', 1, 'image/png', 1),
(9, '42.png', 1, '2022-01-28 10:08:55', '2022-01-28 10:08:55', 1, 'image/png', 1),
(10, '51.png', 1, '2022-01-28 10:08:55', '2022-01-28 10:08:55', 1, 'image/png', 1),
(11, 'Admin_page01_(Large).jpg', 1, '2022-04-04 12:29:12', '2022-04-04 12:29:12', 1, 'image/jpeg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `employee_role`
--

CREATE TABLE `employee_role` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_role`
--

INSERT INTO `employee_role` (`id`, `name`, `created_at`) VALUES
(1, 'Super admin', '2022-09-14 12:07:13'),
(2, 'Admin', '2022-09-14 12:07:13'),
(3, 'Staff ', '2022-09-14 12:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `file_assign`
--

CREATE TABLE `file_assign` (
  `id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `task` int(11) NOT NULL,
  `sub_task` int(11) NOT NULL,
  `super_sub_task` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `folder_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_assign`
--

INSERT INTO `file_assign` (`id`, `project`, `task`, `sub_task`, `super_sub_task`, `created_by`, `created_at`, `modified_at`, `folder_name`) VALUES
(1, 0, 0, 0, 0, 1, '2021-12-14 09:16:33', '2021-12-14 09:16:33', '2020'),
(2, 0, 0, 0, 0, 1, '2021-12-14 09:17:42', '2021-12-14 09:17:42', '2019'),
(3, 0, 0, 0, 0, 1, '2022-04-04 07:11:39', '2022-04-04 07:11:39', '2022'),
(4, 0, 0, 0, 0, 1, '2022-04-04 13:08:35', '2022-04-04 13:08:35', '2021'),
(5, 0, 0, 0, 0, 1, '2022-09-02 10:31:32', '2022-09-02 10:31:32', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `return_file_type` varchar(200) DEFAULT NULL,
  `period` varchar(200) DEFAULT NULL,
  `payment` varchar(200) DEFAULT NULL,
  `date_of_file` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `roc_id` int(11) DEFAULT NULL,
  `folder_assign_id` int(11) DEFAULT NULL,
  `image_name` longtext CHARACTER SET utf8mb4 NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `project` int(11) NOT NULL,
  `super_sub_task_id` int(20) NOT NULL,
  `sub_task_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(1) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `roc_id`, `folder_assign_id`, `image_name`, `modified_at`, `created_by`, `created_at`, `project`, `super_sub_task_id`, `sub_task_id`, `date`, `remarks`, `status`, `type`) VALUES
(2, NULL, 3, 'admin-panel.png', '2022-04-05 07:56:05', 1, '2022-04-05 07:56:05', 1, 1, 1, '0000-00-00', '', 1, 'image/png'),
(3, NULL, 4, 'download.jpg', '2022-04-05 09:05:43', 1, '2022-04-05 09:05:43', 1, 1, 1, '0000-00-00', '', 1, 'image/jpeg'),
(4, NULL, 3, 'herbal-products-500x500.jpg', '2022-04-05 09:23:32', 1, '2022-04-05 09:23:32', 1, 1, 1, '0000-00-00', '', 1, 'image/jpeg'),
(5, NULL, 3, 'Salary-Register.jpg', '2022-04-06 09:04:10', 1, '2022-04-06 09:04:10', 2, 1, 1, '0000-00-00', '', 1, 'image/jpeg'),
(6, NULL, 4, 'Screenshot_(1).png', '2022-05-04 08:45:33', 1, '2022-05-04 08:45:33', 2, 0, 0, '0000-00-00', '', 1, 'image/png'),
(7, NULL, 4, 'Screenshot_(1)1.png', '2022-05-04 08:57:30', 1, '2022-05-04 08:57:30', 2, 0, 0, '0000-00-00', '', 1, 'image/png');

-- --------------------------------------------------------

--
-- Table structure for table `income_tax`
--

CREATE TABLE `income_tax` (
  `id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `date_of_filing` date DEFAULT NULL,
  `asstment_year` varchar(11) DEFAULT NULL,
  `acknowledement_no` varchar(50) DEFAULT NULL,
  `XML_file` varchar(255) DEFAULT NULL,
  `computation` varchar(255) DEFAULT NULL,
  `balance_sheet` varchar(255) DEFAULT NULL,
  `profit_and_loss` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income_tax`
--

INSERT INTO `income_tax` (`id`, `folder_id`, `company_id`, `date_of_filing`, `asstment_year`, `acknowledement_no`, `XML_file`, `computation`, `balance_sheet`, `profit_and_loss`) VALUES
(1, 3, 3, '2022-06-09', '2022', 'hjghfg ghfh', 'NEW_MGT_7A1.pdf', 'hjb', NULL, NULL),
(2, 3, 3, '2022-06-24', '2022', '123456hn', NULL, 'ghfghv ftgh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kyc_documents`
--

CREATE TABLE `kyc_documents` (
  `id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `pan_card` varchar(255) DEFAULT NULL,
  `aadhar_card` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `voter_card` varchar(255) DEFAULT NULL,
  `bank_passbook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kyc_documents`
--

INSERT INTO `kyc_documents` (`id`, `folder_id`, `company_id`, `pan_card`, `aadhar_card`, `passport`, `voter_card`, `bank_passbook`) VALUES
(1, 3, 8, 'Screenshot_(21).png', NULL, NULL, NULL, 'Screenshot_(1).png'),
(2, 3, 8, 'ABHIEERU_COMPLEX_DIRECTOR_LIST.pdf', 'ABHIEERU_COMPLEX_MGT_7_A_CHALLAN.pdf', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `professional_tax`
--

CREATE TABLE `professional_tax` (
  `id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `accounts_id` int(11) DEFAULT NULL,
  `professionalTax_challan` varchar(255) DEFAULT NULL,
  `professionalTax_date` varchar(255) DEFAULT NULL,
  `professionalTax_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professional_tax`
--

INSERT INTO `professional_tax` (`id`, `folder_id`, `company_id`, `accounts_id`, `professionalTax_challan`, `professionalTax_date`, `professionalTax_amount`) VALUES
(4, NULL, NULL, 1, 'Form_MGT_7A_ABHIEERU_COMPLEX_PRIVATE_LIMITED2.pdf', '2022-06-15', 300);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `work_id` varchar(50) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `company` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `task` int(11) NOT NULL,
  `sub_task` int(11) DEFAULT NULL,
  `super_task` int(11) DEFAULT NULL,
  `expected_delivery` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `name` int(11) NOT NULL,
  `completion_date` date DEFAULT NULL,
  `final_date` date DEFAULT NULL,
  `problems_issues` text DEFAULT NULL,
  `short_out_issues` text DEFAULT NULL,
  `date_of_bill` date DEFAULT NULL,
  `priority` tinyint(3) DEFAULT NULL,
  `Receiptsfiles` varchar(255) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `work_id`, `project_name`, `company`, `project_manager`, `task`, `sub_task`, `super_task`, `expected_delivery`, `created_by`, `created_at`, `modified_at`, `name`, `completion_date`, `final_date`, `problems_issues`, `short_out_issues`, `date_of_bill`, `priority`, `Receiptsfiles`, `status`) VALUES
(1, 'OFM_2022_0001', '', 3, 3, 1, 1, NULL, '2022-09-20', 1, '2022-09-12 07:52:08', '0000-00-00 00:00:00', 0, '2022-09-17', NULL, NULL, NULL, '2022-09-19', 2, 'Admin_page01_(Large).jpg', NULL),
(2, 'OFM_2022_0002', '', 18, 6, 1, 1, NULL, '2022-09-29', 1, '2022-09-13 12:05:52', '2022-09-15 08:07:19', 0, '2022-09-15', '2022-09-30', NULL, NULL, '2022-09-15', 1, '2.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_problems_issues`
--

CREATE TABLE `project_problems_issues` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `problems_issues` text DEFAULT NULL,
  `short_out_issues` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_problems_issues`
--

INSERT INTO `project_problems_issues` (`id`, `project_id`, `created_at`, `problems_issues`, `short_out_issues`) VALUES
(1, 1, '2022-09-12 11:22:08', 'dgd dfgdfgcfb fgfh hg g fdgdfhf', 'fhfgh ghg'),
(2, 2, '2022-09-13 15:35:52', 'fcghfgh fdgf hgg ', 'hgfhgj gjhj');

-- --------------------------------------------------------

--
-- Table structure for table `registrars_of_companies`
--

CREATE TABLE `registrars_of_companies` (
  `id` int(11) NOT NULL,
  `folder_assign_id` int(11) DEFAULT NULL,
  `form_number_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `form_name` varchar(255) DEFAULT NULL,
  `statutory_due_date` date DEFAULT NULL,
  `year_period` varchar(50) DEFAULT NULL,
  `date_of_filing` date DEFAULT NULL,
  `srn` varchar(255) DEFAULT NULL,
  `type_ofFee` tinyint(3) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `resubmission_of_form` varchar(255) DEFAULT NULL,
  `created_by` tinyint(3) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `roc_challan` varchar(255) DEFAULT NULL,
  `challan_type` varchar(255) DEFAULT NULL,
  `roc_form` varchar(255) DEFAULT NULL,
  `form_type` varchar(255) DEFAULT NULL,
  `additional_file_1` varchar(255) DEFAULT NULL,
  `additional_file1_type` varchar(255) DEFAULT NULL,
  `additional_file_2` varchar(255) DEFAULT NULL,
  `additional_file2_type` varchar(255) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrars_of_companies`
--

INSERT INTO `registrars_of_companies` (`id`, `folder_assign_id`, `form_number_id`, `company_name`, `form_name`, `statutory_due_date`, `year_period`, `date_of_filing`, `srn`, `type_ofFee`, `amount`, `resubmission_of_form`, `created_by`, `created_at`, `roc_challan`, `challan_type`, `roc_form`, `form_type`, `additional_file_1`, `additional_file1_type`, `additional_file_2`, `additional_file2_type`, `status`) VALUES
(1, 3, 2, '3', NULL, '2022-05-24', '2022-05-27', '2022-05-30', '123', 2, 500, NULL, 5, '2022-05-17 17:17:36', 'ABHIEERU_COMPLEX_MGT_7_A_CHALLAN.pdf', 'application/pdf', 'NEW_MGT_7A.pdf', 'application/pdf', NULL, NULL, NULL, NULL, NULL),
(5, 3, 4, '8', NULL, '2022-05-19', '2022-05-31', '2022-06-08', '125258795', 2, 500, NULL, 3, '2022-05-17 17:25:14', 'ABHIEERU_COMPLEX_DIRECTOR_LIST.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 6, '9', NULL, '2022-05-31', '2022-05-28', '2022-05-30', 'T37616927', 3, 500, NULL, 1, '2022-05-27 11:33:20', 'Screenshot_(1).png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 3, 6, '19', NULL, '2022-05-31', '2022-06-24', '2022-06-28', 'thh258792', 3, 500, NULL, 1, '2022-06-22 09:08:01', 'ABHIEERU_COMPLEX_MGT_7_A_CHALLAN1.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roc_form_number`
--

CREATE TABLE `roc_form_number` (
  `id` int(11) NOT NULL,
  `form_number` varchar(100) DEFAULT NULL,
  `statutory_due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roc_form_number`
--

INSERT INTO `roc_form_number` (`id`, `form_number`, `statutory_due_date`) VALUES
(5, 'rtyu', '2022-05-29'),
(6, 'mt123', '2022-05-31'),
(7, 'AOC 4', '2022-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_tasks`
--

CREATE TABLE `sub_tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_tasks`
--

INSERT INTO `sub_tasks` (`id`, `name`, `task_id`, `created_by`, `created_at`, `modified_at`) VALUES
(1, 'Statutory Audit', 1, 0, '2022-05-19 13:12:26', '2022-08-24 08:20:58'),
(3, 'INTERNAL AUDI', 1, 1, '2022-05-19 14:24:23', '2022-05-19 14:24:23'),
(4, 'CONCURRENT AUDIT ', 1, 1, '2022-05-19 14:24:23', '2022-05-19 14:24:23'),
(7, 'INCOME TAX FILING', 2, 1, '2022-09-12 09:25:53', '2022-09-12 09:25:53'),
(8, 'RECTIFICATION OF RETURN', 2, 1, '2022-09-12 09:25:53', '2022-09-12 09:25:53'),
(9, 'SCRUTINY ASSESSMENT', 2, 1, '2022-09-12 09:28:39', '2022-09-12 09:28:39'),
(10, 'test category', 13, 1, '2022-09-13 11:47:48', '2022-09-13 11:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `sub_task_assign`
--

CREATE TABLE `sub_task_assign` (
  `id` int(11) NOT NULL,
  `sub_task` int(11) NOT NULL,
  `assign_to` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_task_assign`
--

INSERT INTO `sub_task_assign` (`id`, `sub_task`, `assign_to`, `status`, `project`, `created_by`, `created_at`, `modified_at`) VALUES
(1, 4, 3, 0, 1, 1, '2021-08-20 09:48:49', '2021-08-20 09:48:49'),
(2, 1, 2, 0, 1, 1, '2021-08-20 09:48:49', '2021-08-20 09:48:49'),
(3, 4, 2, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(4, 5, 2, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(5, 1, 2, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(6, 2, 0, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(7, 3, 0, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(8, 8, 4, 0, 8, 1, '2021-10-10 17:18:58', '2021-10-10 17:18:58'),
(9, 2, 0, 0, 26, 1, '2021-12-10 12:19:37', '2021-12-10 12:19:37'),
(10, 3, 0, 0, 28, 1, '2021-12-10 14:03:55', '2021-12-10 14:03:55'),
(11, 4, 0, 0, 29, 1, '2021-12-10 14:09:13', '2021-12-10 14:09:13'),
(12, 1, 0, 0, 30, 1, '2021-12-10 14:16:19', '2021-12-10 14:16:19'),
(13, 2, 0, 0, 1, 1, '2021-12-10 14:25:51', '2021-12-10 14:25:51'),
(22, 2, 0, 0, 1, 1, '2022-04-06 09:03:03', '2022-04-06 09:03:03'),
(26, 1, 0, 0, 1, 1, '2022-04-11 09:47:21', '2022-04-11 09:47:21'),
(25, 2, 0, 0, 1, 1, '2022-04-11 09:36:42', '2022-04-11 09:36:42'),
(23, 3, 0, 0, 1, 1, '2022-04-09 07:49:25', '2022-04-09 07:49:25'),
(21, 8, 0, 0, 1, 1, '2022-04-04 15:17:23', '2022-04-04 15:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `super_sub_task`
--

CREATE TABLE `super_sub_task` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subtask_id` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_sub_task`
--

INSERT INTO `super_sub_task` (`id`, `name`, `subtask_id`, `created_by`, `created_at`, `modified_at`) VALUES
(3, 'demo 1', '1', 1, '2022-05-23 09:18:17', '2022-05-23 09:18:17'),
(4, '', '1', 1, '2022-08-24 08:17:45', '2022-08-24 08:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `super_sub_task_assign`
--

CREATE TABLE `super_sub_task_assign` (
  `id` int(11) NOT NULL,
  `super_sub_task` int(11) NOT NULL,
  `assign_to` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_sub_task_assign`
--

INSERT INTO `super_sub_task_assign` (`id`, `super_sub_task`, `assign_to`, `status`, `project`, `created_by`, `created_at`, `modified_at`) VALUES
(1, 1, 2, 0, 1, 1, '2021-08-20 09:48:49', '2021-08-20 09:48:49'),
(2, 3, 3, 0, 1, 1, '2021-08-20 09:48:49', '2021-08-20 09:48:49'),
(3, 4, 0, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(4, 5, 0, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(5, 6, 0, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(6, 7, 0, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(7, 1, 3, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(8, 2, 1, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(9, 3, 0, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(10, 8, 0, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(11, 9, 0, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(12, 14, 0, 0, 8, 1, '2021-10-10 17:18:58', '2021-10-10 17:18:58'),
(13, 6, 0, 0, 26, 1, '2021-12-10 12:19:37', '2021-12-10 12:19:37'),
(14, 12, 0, 0, 28, 1, '2021-12-10 14:03:55', '2021-12-10 14:03:55'),
(15, 14, 0, 0, 29, 1, '2021-12-10 14:09:13', '2021-12-10 14:09:13'),
(16, 2, 0, 0, 30, 1, '2021-12-10 14:16:19', '2021-12-10 14:16:19'),
(17, 3, 0, 0, 1, 1, '2021-12-10 14:25:51', '2021-12-10 14:25:51'),
(31, 1, 0, 0, 1, 1, '2022-04-11 09:47:21', '2022-04-11 09:47:21'),
(30, 6, 0, 0, 1, 1, '2022-04-11 09:36:42', '2022-04-11 09:36:42'),
(28, 3, 0, 0, 1, 1, '2022-04-09 07:49:25', '2022-04-09 07:49:25'),
(27, 1, 0, 0, 1, 1, '2022-04-06 09:03:03', '2022-04-06 09:03:03'),
(26, 4, 0, 0, 1, 1, '2022-04-04 15:17:23', '2022-04-04 15:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `created_by`, `created_at`, `modified_at`) VALUES
(1, 'AUDIT AND ASSURANCE', 0, '2022-05-19 11:28:26', '2022-05-19 11:28:26'),
(2, 'TAXATION', 0, '2022-05-19 11:28:26', '2022-05-19 11:28:26'),
(3, 'ROC', 0, '2022-05-19 11:28:26', '2022-05-19 11:28:26'),
(4, 'GST', 0, '2022-05-19 11:28:26', '2022-05-19 11:28:26'),
(5, 'CERTIFICATES', 0, '2022-05-19 11:31:12', '2022-05-19 11:31:12'),
(6, 'PROJECT FINANCING', 0, '2022-05-19 11:31:12', '2022-05-19 11:31:12'),
(7, 'CONSULTANCY WORK', 0, '2022-05-19 11:31:12', '2022-05-19 11:31:12'),
(8, 'RETAINERSHIP', 0, '2022-05-19 11:31:12', '2022-05-19 11:31:12'),
(9, 'ACCOUNTING JOB', 0, '2022-05-19 11:31:12', '2022-05-19 11:31:12'),
(10, 'DUES DATES OF COMPLIANCES AS PER LAW', 0, '2022-05-19 11:31:12', '2022-05-19 11:31:12'),
(13, 'test', 1, '2022-09-13 11:45:56', '2022-09-13 11:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `task_assign`
--

CREATE TABLE `task_assign` (
  `id` int(11) NOT NULL,
  `task` int(11) NOT NULL,
  `assign_to` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_assign`
--

INSERT INTO `task_assign` (`id`, `task`, `assign_to`, `status`, `project`, `created_by`, `created_at`, `modified_at`) VALUES
(1, 3, 2, 0, 1, 1, '2021-08-20 09:48:49', '2021-08-20 09:48:49'),
(2, 4, 3, 0, 1, 1, '2021-08-20 09:48:49', '2021-08-20 09:48:49'),
(3, 3, 1, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(4, 4, 3, 0, 2, 1, '2021-08-25 06:36:48', '2021-08-25 06:36:48'),
(16, 4, 0, 0, 7, 1, '2021-09-27 13:35:58', '2021-09-27 13:35:58'),
(15, 4, 0, 0, 6, 1, '2021-09-27 13:35:58', '2021-09-27 13:35:58'),
(14, 4, 6, 0, 5, 1, '2021-09-27 13:35:58', '2021-09-27 13:35:58'),
(13, 4, 6, 0, 4, 1, '2021-09-27 13:35:57', '2021-09-27 13:35:57'),
(12, 4, 0, 0, 3, 1, '2021-09-27 13:35:51', '2021-09-27 13:35:51'),
(17, 6, 5, 0, 8, 1, '2021-10-10 17:18:58', '2021-10-10 17:18:58'),
(18, 2, 0, 0, 9, 1, '2021-12-09 08:52:22', '2021-12-09 08:52:22'),
(19, 4, 0, 0, 10, 1, '2021-12-09 10:53:50', '2021-12-09 10:53:50'),
(20, 2, 0, 0, 11, 1, '2021-12-10 11:45:01', '2021-12-10 11:45:01'),
(21, 2, 0, 0, 12, 1, '2021-12-10 11:45:11', '2021-12-10 11:45:11'),
(22, 4, 0, 0, 13, 1, '2021-12-10 11:56:03', '2021-12-10 11:56:03'),
(23, 4, 0, 0, 14, 1, '2021-12-10 11:56:06', '2021-12-10 11:56:06'),
(24, 4, 0, 0, 15, 1, '2021-12-10 11:56:11', '2021-12-10 11:56:11'),
(25, 2, 0, 0, 16, 1, '2021-12-10 11:59:03', '2021-12-10 11:59:03'),
(26, 2, 0, 0, 17, 1, '2021-12-10 11:59:05', '2021-12-10 11:59:05'),
(27, 1, 0, 0, 18, 1, '2021-12-10 12:01:47', '2021-12-10 12:01:47'),
(28, 1, 0, 0, 19, 1, '2021-12-10 12:01:50', '2021-12-10 12:01:50'),
(29, 3, 0, 0, 20, 1, '2021-12-10 12:17:30', '2021-12-10 12:17:30'),
(30, 3, 0, 0, 21, 1, '2021-12-10 12:17:32', '2021-12-10 12:17:32'),
(31, 3, 0, 0, 22, 1, '2021-12-10 12:17:32', '2021-12-10 12:17:32'),
(32, 3, 0, 0, 23, 1, '2021-12-10 12:17:32', '2021-12-10 12:17:32'),
(33, 3, 0, 0, 24, 1, '2021-12-10 12:17:33', '2021-12-10 12:17:33'),
(34, 3, 0, 0, 25, 1, '2021-12-10 12:17:57', '2021-12-10 12:17:57'),
(35, 3, 0, 0, 26, 1, '2021-12-10 12:19:37', '2021-12-10 12:19:37'),
(36, 2, 0, 0, 27, 1, '2021-12-10 13:25:17', '2021-12-10 13:25:17'),
(37, 3, 0, 0, 28, 1, '2021-12-10 14:03:55', '2021-12-10 14:03:55'),
(38, 2, 0, 0, 29, 1, '2021-12-10 14:09:13', '2021-12-10 14:09:13'),
(39, 2, 0, 0, 30, 1, '2021-12-10 14:16:19', '2021-12-10 14:16:19'),
(40, 2, 0, 0, 1, 1, '2021-12-10 14:25:51', '2021-12-10 14:25:51'),
(53, 1, 0, 0, 1, 1, '2022-04-11 09:47:21', '2022-04-11 09:47:21'),
(52, 2, 0, 0, 1, 1, '2022-04-11 09:36:42', '2022-04-11 09:36:42'),
(50, 3, 0, 0, 1, 1, '2022-04-09 07:49:25', '2022-04-09 07:49:25'),
(49, 3, 0, 0, 1, 1, '2022-04-06 09:03:03', '2022-04-06 09:03:03'),
(48, 6, 0, 0, 1, 1, '2022-04-04 15:17:23', '2022-04-04 15:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `tds_and_tcs`
--

CREATE TABLE `tds_and_tcs` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `acknowledement_no` varchar(255) DEFAULT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `statutory_due_date` date DEFAULT NULL,
  `return_type` varchar(200) DEFAULT NULL,
  `financial_year` varchar(50) DEFAULT NULL,
  `quarter` varchar(50) DEFAULT NULL,
  `date_of_file` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tds_tcs_form_name`
--

CREATE TABLE `tds_tcs_form_name` (
  `id` int(11) NOT NULL,
  `form_name` varchar(200) NOT NULL,
  `statutory_due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trade_licence`
--

CREATE TABLE `trade_licence` (
  `id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `accounts_id` int(11) DEFAULT NULL,
  `trade_licence_challan` varchar(255) DEFAULT NULL,
  `trade_licence_date` date DEFAULT NULL,
  `trade_licence_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `reporting_manager` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `reporting_manager`, `name`, `email`, `username`, `password`, `user_status`, `created_by`, `created_at`, `modified_at`) VALUES
(1, 1, 1, 'Revan', 'abc@gm.com', 'admin', '44ce70fd9bf8c294e9c491c89fb05125eaebd16a5553fe402a040200c0c5d901fe8e93db33eef39148169a285a74be1f68d614366f06ce9d3aa6160ad98981d8', 1, 1, '2021-05-04 16:56:32', '2022-09-14 09:46:19'),
(2, 3, 1, 'Revan', 'revan@gmail.com', 'swapnajit', '44ce70fd9bf8c294e9c491c89fb05125eaebd16a5553fe402a040200c0c5d901fe8e93db33eef39148169a285a74be1f68d614366f06ce9d3aa6160ad98981d8', 1, 1, '2021-05-10 14:25:19', '2021-10-13 16:06:17'),
(5, 3, 1, 'Saurabh', 'saurabhmishra2100@gmail.com', 'saurabh_Lucifer', '50c6511f6d6ae05e663a7cf8e6cf7aaa26b4096def3fce73e02d4c1acc0bad0a2f3e821fbed21905933e70fe252b8fbc10fb8f22cbe20e73b355be348474ecdc', 1, 1, '2021-10-10 15:50:15', '2021-10-10 15:50:15'),
(6, 2, 1, 'susmita', 'ciprojectbizz@gmail.com', 'cibizz', '7fcf4ba391c48784edde599889d6e3f1e47a27db36ecc050cc92f259bfac38afad2c68a1ae804d77075e8fb722503f3eca2b2c1006ee6f6c7b7628cb45fffd1d', 1, 1, '2022-03-30 14:04:32', '2022-09-14 12:41:47'),
(8, 3, 7, 'Vijay shankar', 'vijay@gmail.com', 'vijay', '6b5f0cd3baadfa714a327b445222b4073b2cc0b0a0acba210fe19755f087f2fa5407545d2b94eab9820deae86ce6bbab60adfa99993da1c8b403d0bf5731092c', 1, 1, '2022-07-11 14:34:04', '2022-07-11 14:34:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_verticals`
--
ALTER TABLE `company_verticals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docfile`
--
ALTER TABLE `docfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_role`
--
ALTER TABLE `employee_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_assign`
--
ALTER TABLE `file_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_tax`
--
ALTER TABLE `income_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_documents`
--
ALTER TABLE `kyc_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professional_tax`
--
ALTER TABLE `professional_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_problems_issues`
--
ALTER TABLE `project_problems_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrars_of_companies`
--
ALTER TABLE `registrars_of_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roc_form_number`
--
ALTER TABLE `roc_form_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_tasks`
--
ALTER TABLE `sub_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_task_assign`
--
ALTER TABLE `sub_task_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_sub_task`
--
ALTER TABLE `super_sub_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_sub_task_assign`
--
ALTER TABLE `super_sub_task_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_assign`
--
ALTER TABLE `task_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tds_and_tcs`
--
ALTER TABLE `tds_and_tcs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tds_tcs_form_name`
--
ALTER TABLE `tds_tcs_form_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_licence`
--
ALTER TABLE `trade_licence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `company_verticals`
--
ALTER TABLE `company_verticals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `docfile`
--
ALTER TABLE `docfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee_role`
--
ALTER TABLE `employee_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `file_assign`
--
ALTER TABLE `file_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `income_tax`
--
ALTER TABLE `income_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kyc_documents`
--
ALTER TABLE `kyc_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `professional_tax`
--
ALTER TABLE `professional_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_problems_issues`
--
ALTER TABLE `project_problems_issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registrars_of_companies`
--
ALTER TABLE `registrars_of_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roc_form_number`
--
ALTER TABLE `roc_form_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_tasks`
--
ALTER TABLE `sub_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_task_assign`
--
ALTER TABLE `sub_task_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `super_sub_task`
--
ALTER TABLE `super_sub_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `super_sub_task_assign`
--
ALTER TABLE `super_sub_task_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `task_assign`
--
ALTER TABLE `task_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tds_and_tcs`
--
ALTER TABLE `tds_and_tcs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tds_tcs_form_name`
--
ALTER TABLE `tds_tcs_form_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trade_licence`
--
ALTER TABLE `trade_licence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
