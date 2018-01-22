SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `authpolicy` (
  `authlevel` int(10) UNSIGNED NOT NULL,
  `description` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `authpolicy` (`authlevel`, `description`) VALUES
(1, 'Add Member'),
(2, 'Show Members Profile'),
(3, 'Edit-Approve Members'),
(4, 'List of All Members'),
(5, 'List of Only Lobby Members'),
(6, 'Nominee Add, Edit and Delete'),
(7, 'ECS Add, Edit, View'),
(8, 'Add Edit Delete Bank details'),
(9, 'View Paid, View Defaulters and Approve Membership Fees Payments');

CREATE TABLE `auth_level` (
  `id` int(10) UNSIGNED NOT NULL,
  `position_id` int(10) UNSIGNED DEFAULT NULL,
  `authlevel` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `auth_level` (`id`, `position_id`, `authlevel`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9);

CREATE TABLE `bank_details` (
  `bank_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `acc_no` varchar(45) NOT NULL,
  `ifsc_code` varchar(45) NOT NULL,
  `bank_name` varchar(60) NOT NULL,
  `branch_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bank_details` (`bank_id`, `member_id`, `acc_no`, `ifsc_code`, `bank_name`, `branch_name`) VALUES
(1, 1, '123456', '2131', '32132', '44'),
(2, 1, 'jghk', 'jhghjg', 'jhgjg', 'jhgjhg'),
(3, 1, 'jghk', 'jhghjg', 'jhgjg', 'jhgjhg'),
(4, 1, 'jghk', 'jhghjg', 'jhgjg', 'jhgjhg'),
(5, 1, 'jghk', 'jhghjg', 'jhgjg', 'jhgjhg'),
(6, 1, '1234', '1234', 'bbb', 'bbb'),
(7, 39, '25415784596', 'BANK00058', 'Bank Of rebolia', 'Rebolia');

CREATE TABLE `cheque_details` (
  `cheque_id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `cheque_no` varchar(45) NOT NULL,
  `cleared_status` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cheque_details` (`cheque_id`, `bank_name`, `cheque_no`, `cleared_status`) VALUES
(1, 'sbi', '1204', 'r');

CREATE TABLE `committee_positions` (
  `position_id` int(10) UNSIGNED NOT NULL,
  `position_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `committee_positions` (`position_id`, `position_name`) VALUES
(1, 'Member'),
(2, 'President'),
(3, 'Lobby Head');

CREATE TABLE `ecs_details` (
  `ecs_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL,
  `payment_for` char(2) NOT NULL,
  `valid_from` datetime DEFAULT NULL,
  `valid_till` datetime DEFAULT NULL,
  `status` char(1) DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ecs_details` (`ecs_id`, `member_id`, `bank_id`, `payment_for`, `valid_from`, `valid_till`, `status`) VALUES
(1, 1, 3, 'mf', '2013-11-05 00:00:00', '2013-11-05 00:00:00', 'a'),
(2, 1, 4, 'lr', '2012-11-01 00:00:00', '2013-11-05 00:00:00', 'a'),
(3, 1, 1, 'mf', '2012-11-01 00:00:00', '2013-11-05 00:00:00', 'a'),
(4, 1, 5, 'lr', '2013-11-05 00:00:00', '2013-11-05 00:00:00', 'a'),
(5, 1, 1, 'lr', '2013-11-05 00:00:00', '2013-11-05 00:00:00', 'a');

CREATE TABLE `ecs_documents` (
  `sno` int(10) UNSIGNED NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `ecs_id` int(10) UNSIGNED NOT NULL,
  `file_name` char(37) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ecs_documents` (`sno`, `document_name`, `ecs_id`, `file_name`) VALUES
(1, 'test', 2, '23f2a00668e9b2f3c68f7e19347941f2.png'),
(2, 'ere', 3, 'f96d8a89f930bef2646785415ea2aed1.jpg'),
(3, 'bbb', 1, '68af1dbc85061ba33880aff6c262defa.jpg'),
(4, 'bnvbn', 5, '257048d937666fe811d97c23eb2af1b6.png'),
(5, '(name not given)', 5, 'cb1ec842639b49de0126758e972c472f.jpg');

CREATE TABLE `ecs_finance` (
  `sno` int(10) UNSIGNED NOT NULL,
  `ecs_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL,
  `scheduled_on` datetime DEFAULT NULL,
  `received_on` datetime NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'p',
  `approved_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `expenses` (
  `expense_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'p',
  `requested_by` int(10) UNSIGNED NOT NULL,
  `requested_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved_by` int(10) UNSIGNED NOT NULL,
  `approved_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `expense_documents` (
  `sno` int(10) UNSIGNED NOT NULL,
  `expense_id` int(10) UNSIGNED NOT NULL,
  `document_name` tinytext NOT NULL,
  `file_name` char(37) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `members` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `membership_no` varchar(10) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` char(60) DEFAULT NULL,
  `otp` char(60) DEFAULT NULL,
  `remember_token` char(60) DEFAULT NULL,
  `api_token` char(60) DEFAULT NULL,
  `positionid` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `membership_status` char(3) NOT NULL DEFAULT 'ON'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `members` (`member_id`, `membership_no`, `email`, `password`, `otp`, `remember_token`, `api_token`, `positionid`, `membership_status`) VALUES
(1, '12346', '', '$2y$10$LLbkQ2CJcPh8z/JUoM1G/eiW.DtZBQlnGqrWNcpopN7lqlwOheF3O', NULL, 'hUU8qxMQhLIzQtSr80J46BjQnHZPWvzqN8yUMexVqoxQkCRkfYrWrqhpjAC3', '$2y$10$RGXMRlK665obO7nIGJvDc.Lvy2Q/6lXW3oX3ZR3LuEAyne4b.NHme', 2, 'ON'),
(2, '123', 'kjhkjh@dg.cc', '$2y$10$dpnz0Z3aKhbcrQ7qrXIQW.WA5gQhV1UAr53.IsK0MywbXid4a.Jry', NULL, NULL, NULL, 1, 'ON');

CREATE TABLE `membership_fees` (
  `fees_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL,
  `payable` decimal(10,2) UNSIGNED NOT NULL,
  `status` char(4) DEFAULT 'pay',
  `month` char(3) NOT NULL,
  `_year` char(4) NOT NULL,
  `paid_on` datetime DEFAULT NULL,
  `verified_by` int(10) UNSIGNED DEFAULT NULL,
  `pay_method` char(3) NOT NULL,
  `ecs_id` int(10) UNSIGNED DEFAULT NULL,
  `transaction_id` int(10) UNSIGNED DEFAULT NULL,
  `cheque_id` int(10) UNSIGNED DEFAULT NULL,
  `receipt_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `membership_fees` (`fees_id`, `member_id`, `amount`, `payable`, `status`, `month`, `_year`, `paid_on`, `verified_by`, `pay_method`, `ecs_id`, `transaction_id`, `cheque_id`, `receipt_id`) VALUES
(1, 0, '0.00', '0.00', 'pay', '', '', NULL, 0, '', NULL, NULL, NULL, NULL),
(2, 1, '1000.00', '1000.00', 'done', 'Jan', '2017', NULL, 1, 'ecs', NULL, NULL, NULL, NULL),
(3, 37, '1000.00', '1000.00', 'paid', 'Jan', '2017', NULL, NULL, 'cas', NULL, NULL, NULL, NULL),
(4, 1, '1000.00', '1000.00', 'done', 'Jan', '2017', '2018-01-22 00:00:00', 1, 'trf', NULL, NULL, NULL, 2),
(5, 37, '1000.00', '1000.00', 'paid', 'Jan', '2017', NULL, 1, 'trf', NULL, NULL, NULL, NULL),
(6, 1, '1000.00', '1200.00', 'pay', 'Jan', '2018', '2018-01-22 00:00:00', 1, 'chq', NULL, NULL, 1, NULL),
(7, 37, '1000.00', '1200.00', 'paid', 'Jan', '2018', NULL, 1, 'ecs', NULL, NULL, NULL, NULL);

CREATE TABLE `member_details` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `membership_no` varchar(10) DEFAULT NULL,
  `membership_status` char(3) NOT NULL DEFAULT 'OFF',
  `id_card` char(1) DEFAULT 'n',
  `applied_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved_on` datetime DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'p',
  `referral_id` int(10) UNSIGNED DEFAULT NULL,
  `lobbyhead_id` int(10) UNSIGNED DEFAULT NULL,
  `image_name` char(37) DEFAULT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `fees_mode` char(3) DEFAULT 'cas',
  `railway_id` varchar(45) DEFAULT NULL,
  `voter_id` varchar(45) DEFAULT NULL,
  `aadhar_no` varchar(45) DEFAULT NULL,
  `pancard_no` varchar(45) DEFAULT NULL,
  `mobile_no` char(10) DEFAULT NULL,
  `altmobile_no` char(10) DEFAULT NULL,
  `pf_no` varchar(45) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `hq` varchar(50) DEFAULT NULL,
  `salutation` char(5) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `father_husband_name` varchar(65) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `doa` datetime DEFAULT NULL,
  `dor` datetime DEFAULT NULL,
  `current_address` tinytext,
  `permanent_address` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `member_details` (`member_id`, `membership_no`, `membership_status`, `id_card`, `applied_on`, `approved_on`, `status`, `referral_id`, `lobbyhead_id`, `image_name`, `added_by`, `fees_mode`, `railway_id`, `voter_id`, `aadhar_no`, `pancard_no`, `mobile_no`, `altmobile_no`, `pf_no`, `designation`, `hq`, `salutation`, `first_name`, `last_name`, `father_husband_name`, `email`, `dob`, `doa`, `dor`, `current_address`, `permanent_address`) VALUES
(1, '12346', 'ON', 'n', '2018-01-08 16:01:41', '2018-01-20 00:00:00', 'a', NULL, 1, '18ac18eb19714c4621ecf1b138b6a56f.png', 1, 'cas', NULL, NULL, NULL, NULL, 'ghfgh', 'gfh', NULL, NULL, NULL, 'Mr.', 'Mickey', 'Mouse', 'Sr Mickey Mouse', 'mm@disney.com', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'fhg', 'ghf'),
(2, '123', 'OFF', 'n', '2018-01-08 16:05:56', NULL, 'a', 1, 1, NULL, 1, '0', '321321', '32132', '32132', '3211', '32132', '3212', 'hkjhk', 'hjkh', 'jhkj', 'Mr.', 'test', 'test', 'kjhk', 'kjhkjh@dg.cc', '2017-02-11 00:00:00', '2017-12-11 00:00:00', '1990-02-02 00:00:00', '32123', '321'),
(36, NULL, 'OFF', 'n', '2018-01-10 17:26:49', NULL, 'p', NULL, 1, '0d7a1e64c010ced214ef192df32ee8d7.jpg', 1, NULL, NULL, NULL, NULL, NULL, '8954578451', NULL, '12345Abc', 'Designation', 'Test Hq', 'Mr', 'Test F Name', 'Test L Name', 'Test2Name', 'test@test.test', '1990-11-10 00:00:00', '2000-10-02 00:00:00', '2025-11-05 00:00:00', 'This is address', NULL),
(37, '2017A037', 'ON', 'n', '2018-01-10 17:29:39', '2018-01-11 00:00:00', 'a', 36, 1, '16ac43724e51f6132064f75fb446d91e.jpg', 1, '0', NULL, NULL, NULL, NULL, '8954578451', NULL, '12345Abc', 'Designation', 'Test Hq', 'Mr', 'Test F Name', 'Test L Name', 'Test2Name', 'test@test.test', '1990-11-10 00:00:00', '2000-10-02 00:00:00', '2025-11-05 00:00:00', 'This is address', NULL),
(38, NULL, 'OFF', 'n', '2018-01-21 17:12:40', NULL, 'p', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, 'OFF', 'n', '2018-01-23 00:07:42', NULL, 'p', 36, 1, '68cf4f8ed57e630723f55f61c78c949e.jpg', 1, 'cas', '745865412', '4845968521', '7412784596521548', 'Fz9951Ec0M', '8745896581', '7458965412', '7451289654', 'ceo', 'salindero', 'Mr.', 'Donal', 'Darlin', 'Moralla Delvik', 'dd@dd.com', '1980-12-18 00:00:00', '2000-12-07 00:00:00', '2018-12-12 00:00:00', 'street 4, Hong Kong rillav', 'street 4, Hong Kong rillav');

CREATE TABLE `messages` (
  `sno` int(10) UNSIGNED NOT NULL,
  `to_member_id` int(10) UNSIGNED NOT NULL,
  `from_member_id` int(10) UNSIGNED NOT NULL,
  `heading` tinytext,
  `message` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nominee` (
  `nominee_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `salutation` char(5) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `relationship` varchar(45) DEFAULT NULL,
  `mobile_no` char(10) NOT NULL,
  `altmobile_no` char(10) DEFAULT NULL,
  `image_name` char(37) DEFAULT NULL,
  `deleted` char(1) NOT NULL DEFAULT 'n',
  `address` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `nominee` (`nominee_id`, `member_id`, `salutation`, `first_name`, `last_name`, `email`, `relationship`, `mobile_no`, `altmobile_no`, `image_name`, `deleted`, `address`) VALUES
(1, 1, 'Mr.', 'this', 'is', 'here@earth.in', 'bapu', '12345678', NULL, NULL, 'n', '3213'),
(3, 1, 'Mr.', 'hellll', 'kjhkjh', 'kjhkjh@dg.cc', 'hgjkkj', 'kjhkjh', 'kjhkjh', NULL, 'y', 'jh'),
(4, 2, 'Mrs', 'FName', 'Lname2', 'test@test.cc', 'wife', '8457965412', '7458969654', NULL, 'n', 'This is address'),
(5, 39, 'Mrs.', 'Gonillke', 'Bemtolvi', 'gb@erc.xe', 'wife', '7458741254', '7896412587', 'd772d410c19212c92044e2aa2b828321.jpg', 'n', 'street 4, Hong Kong rillav');

CREATE TABLE `notifications` (
  `notify_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `heading` tinytext NOT NULL,
  `message` text NOT NULL,
  `post_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `notification_status` (
  `sno` int(10) UNSIGNED NOT NULL,
  `notify_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `password_resets` (
  `email` varchar(45) DEFAULT NULL,
  `token` varchar(60) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@test.cc', '$2y$10$1huMlA0kCEVBDjHhbsS97uuRVtgL0W5tYEMuvU6JddxMEiu/KQZya', '2018-01-19 01:08:07'),
('xmenvw@gmail.com', '$2y$10$hwFcAkzNOjGDpF9ECaq9b.bam3mHA.TPmKY6zM.dBSCI.XNqbsEMa', '2018-01-19 03:07:04');

CREATE TABLE `profile_documents` (
  `sno` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `file_name` char(37) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `profile_documents` (`sno`, `member_id`, `document_name`, `file_name`) VALUES
(8, 1, '(name not given)', '7e19064c0b8d5855078d6f5d64e9895b.jpeg'),
(9, 1, '(name not given)', 'bd0ee986290dca1a2496706772e93f58.jpg'),
(22, 36, 'Document Name', '0d817917f88fd1ddeada60abc010429c.jpg'),
(23, 37, 'Document Name', '411609e93f2f7f9d8fa2f00401e2ebb8.jpg'),
(24, 37, '(name not given)', '2cdbfcbe19116ca3b356a26ef33b1fcd.jpg'),
(25, 37, '(name not given)', '7218917a9fd8ca616b0f062e2c97a21f.jpg'),
(26, 37, '(name not given)', '531daae8d6a03e4c9d57e9ac322e1d00.jpg'),
(27, 39, 'Voter Id', 'c6d41406e7400aa6f3d8ba9f4f012f31.jpg'),
(28, 39, 'Address Proof', '840b2f939d6916aaded1dae7a164badb.jpg'),
(29, 39, '(name not given)', '7e014cdbfb07c3503542b91bf68b60ee.jpg');

CREATE TABLE `receipts_documents` (
  `receipt_id` int(10) UNSIGNED NOT NULL,
  `file_name` char(37) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `receipts_documents` (`receipt_id`, `file_name`) VALUES
(1, '592dc73f658233088678364fe6d8b2f6.png'),
(2, 'ef6ca28ebcb9ff730fe101a036cabb3e.png');


ALTER TABLE `authpolicy`
  ADD PRIMARY KEY (`authlevel`);

ALTER TABLE `auth_level`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`bank_id`);

ALTER TABLE `cheque_details`
  ADD PRIMARY KEY (`cheque_id`);

ALTER TABLE `committee_positions`
  ADD PRIMARY KEY (`position_id`);

ALTER TABLE `ecs_details`
  ADD PRIMARY KEY (`ecs_id`);

ALTER TABLE `ecs_documents`
  ADD PRIMARY KEY (`sno`);

ALTER TABLE `ecs_finance`
  ADD PRIMARY KEY (`sno`);

ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

ALTER TABLE `expense_documents`
  ADD PRIMARY KEY (`sno`);

ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

ALTER TABLE `membership_fees`
  ADD PRIMARY KEY (`fees_id`);

ALTER TABLE `member_details`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `membership_no_UNIQUE` (`membership_no`);

ALTER TABLE `messages`
  ADD PRIMARY KEY (`sno`);

ALTER TABLE `nominee`
  ADD PRIMARY KEY (`nominee_id`);

ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notify_id`);

ALTER TABLE `notification_status`
  ADD PRIMARY KEY (`sno`);

ALTER TABLE `profile_documents`
  ADD PRIMARY KEY (`sno`);

ALTER TABLE `receipts_documents`
  ADD PRIMARY KEY (`receipt_id`);


ALTER TABLE `authpolicy`
  MODIFY `authlevel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `auth_level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `bank_details`
  MODIFY `bank_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `cheque_details`
  MODIFY `cheque_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `committee_positions`
  MODIFY `position_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `ecs_details`
  MODIFY `ecs_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `ecs_documents`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `ecs_finance`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `expenses`
  MODIFY `expense_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `expense_documents`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `membership_fees`
  MODIFY `fees_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `member_details`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

ALTER TABLE `messages`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `nominee`
  MODIFY `nominee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `notifications`
  MODIFY `notify_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `notification_status`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `profile_documents`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

ALTER TABLE `receipts_documents`
  MODIFY `receipt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
