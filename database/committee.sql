SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `bank_details` (
  `bank_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `acc_no` varchar(45) NOT NULL,
  `ifsc_code` varchar(45) NOT NULL,
  `bank_name` varchar(60) NOT NULL,
  `branch_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `cheque_details` (
  `cheque_id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `cheque_no` varchar(45) NOT NULL,
  `cleared_status` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `committee_positions` (
  `position_id` int(10) UNSIGNED NOT NULL,
  `position_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `auth_level` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `position_id` int(10) UNSIGNED DEFAULT NULL,
  `authlevel` int(10) UNSIGNED DEFAULT NULL,
 PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `authpolicy` (
   `authlevel` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
   `description` TINYTEXT NULL ,
   PRIMARY KEY (`authlevel`)) ENGINE = InnoDB;

CREATE TABLE `ecs_details` (
  `ecs_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL,
  `payment_for` char(2) NOT NULL,
  `valid_from` datetime DEFAULT NULL,
  `valid_till` datetime DEFAULT NULL,
  `status` char(1) DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `ecs_documents` (
  `sno` int(10) UNSIGNED NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `esc_id` int(10) UNSIGNED NOT NULL,
  `file_name` char(20) NOT NULL,
  `file_extn` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `file_name` char(20) NOT NULL,
  `file_extn` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `members` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `membership_no` varchar(10) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `otp` char(60) DEFAULT NULL,
  `remember_token` char(100) DEFAULT NULL,
  `api_token` char(60) DEFAULT NULL,
  `positionid` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `membership_status` char(3) NOT NULL DEFAULT 'ON'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `membership_fees` (
  `fees_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL,
  `payable` decimal(10,2) UNSIGNED NOT NULL,
  `status` char(3) DEFAULT 'pay',
  `month` char(3) NOT NULL,
  `paid_on` datetime DEFAULT NULL,
  `verified_by` int(10) UNSIGNED NOT NULL,
  `pay_method` char(3) NOT NULL,
  `ecs_id` int(10) UNSIGNED DEFAULT NULL,
  `cheque_id` int(10) UNSIGNED DEFAULT NULL,
  `receipt_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `fees_mode` char(3) DEFAULT NULL,
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

CREATE TABLE `messages` (
  `sno` int(10) UNSIGNED NOT NULL,
  `to_member_id` int(10) UNSIGNED NOT NULL,
  `from_member_id` int(10) UNSIGNED NOT NULL,
  `heading` tinytext,
  `message` text NOT NULL,
  `status` CHAR(1) NOT NULL DEFAULT 'n'
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
  `image_name` char(20) DEFAULT NULL,
  `image_extn` char(3) DEFAULT NULL,
  `deleted` char(1) NOT NULL DEFAULT 'n',
  `address` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `profile_documents` (
  `sno` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `file_name` char(37) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `receipts_documents` (
  `receipt_id` int(10) UNSIGNED NOT NULL,
  `file_name` char(20) NOT NULL,
  `file_extn` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `password_resets` (
  `email` varchar(45) DEFAULT NULL,
  `token` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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


ALTER TABLE `bank_details`
  MODIFY `bank_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `cheque_details`
  MODIFY `cheque_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `committee_positions`
  MODIFY `position_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `ecs_details`
  MODIFY `ecs_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `ecs_documents`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `ecs_finance`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `expenses`
  MODIFY `expense_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `expense_documents`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `membership_fees`
  MODIFY `fees_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `member_details`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `messages`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `nominee`
  MODIFY `nominee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `notifications`
  MODIFY `notify_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `notification_status`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `profile_documents`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `receipts_documents`
  MODIFY `receipt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
