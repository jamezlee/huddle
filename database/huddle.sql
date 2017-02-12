-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2017 at 02:44 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `huddle`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
`projectid` int(11) NOT NULL,
  `projectname` varchar(100) NOT NULL,
  `projectclassification` varchar(100) NOT NULL,
  `projectdescription` varchar(255) NOT NULL,
  `projectplanedstartdate` date NOT NULL,
  `projectplanedenddate` date NOT NULL,
  `projectactualstartdate` date NOT NULL,
  `projectactualenddate` date NOT NULL,
  `createdate` date NOT NULL,
  `userid` int(11) NOT NULL,
  `projectstatus` enum('Inprocess','Completed','Canceled') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectid`, `projectname`, `projectclassification`, `projectdescription`, `projectplanedstartdate`, `projectplanedenddate`, `projectactualstartdate`, `projectactualenddate`, `createdate`, `userid`, `projectstatus`) VALUES
(1, 'web application', 'test', '<p>create web Application for final year</p>\r\n', '2017-02-16', '2017-02-20', '2017-02-22', '2017-02-27', '0000-00-00', 1, 'Inprocess'),
(2, 'final year project', 'helo', '<ol>\r\n<li>this is about the web site for <strong>final</strong> <em>year</em></li>\r\n</ol>', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 5, 'Completed'),
(3, 'create hundle', 'high', '<p>this is a project of school</p>\r\n', '2017-02-27', '2017-02-28', '2017-03-03', '2017-03-09', '0000-00-00', 2, 'Inprocess'),
(4, 'project 2', 'prokect', '<p>this about the project</p>\r\n', '2017-02-03', '2017-02-05', '2017-02-09', '2017-02-28', '2017-02-04', 1, 'Inprocess');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
`taskid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `taskname` varchar(255) NOT NULL,
  `taskdescription` varchar(255) NOT NULL,
  `taskplanedstartdate` date NOT NULL,
  `taskplanedenddate` date NOT NULL,
  `taskactualstartdate` date NOT NULL,
  `taskactualenddate` date NOT NULL,
  `taskstatus` enum('Inprocess','Completed','Canceled') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskid`, `projectid`, `taskname`, `taskdescription`, `taskplanedstartdate`, `taskplanedenddate`, `taskactualstartdate`, `taskactualenddate`, `taskstatus`) VALUES
(1, 1, 'testing', 'creating a login page', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'Inprocess');

-- --------------------------------------------------------

--
-- Table structure for table `taskassign`
--

CREATE TABLE `taskassign` (
`assignID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
`id` int(11) NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jobtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `jobtitle`, `username`, `description`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Keng', 'lee', 'Project Manager', 'jamez', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium qu', 'qrlqZae_PvgrWzJLnLj8RrOyymWZBr-5', '$2y$13$dfJvrZYOK/oQH/WfnJ8Fk.dEAWWCjBpGFRhNrJMshtjkJ0oAwzcNK', NULL, 'jlkh82@gmail.com', 10, 10, '0000-00-00 00:00:00', '2017-02-02 21:44:56'),
(2, 'lin', 'kok', '', 'xiaoli', '', 'sQBfDnG6FW26rPdWJNS9sOpQQKM9LnX8', '$2y$13$2dFyp6aa1/eX67KK0KXY3uSaWeQD9m4BUcoK12.6bWxLJIyHPxWxq', NULL, 'james@jamezdesign.com', 10, 10, '2017-02-02 07:32:19', '0000-00-00 00:00:00'),
(3, 'jj', 'jam', '', 'xiaoxiao', '', '', '$2y$13$wOl1P13Zf1y/o90eJdmQ9OHpNshthS51T.vkfRvusIkgL92MG1IvO', NULL, 'xiaoli@gmail.com', 10, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'jj', 'jam', '', 'xiaoxiaoli', '', '', '$2y$13$e9.sgcYmgukNFF4YwvtuK.TK2SD8OVxkGrJD9O1i/C53K0Yh5rBEC', NULL, 'xiaoli@gmail.com.sg', 10, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'jj', 'jam', '', 'xiaoxiaoli82', '', '', '$2y$13$w2.HzpAQmWgRK3dZG4psi.rwm6foWFUM/qnOLyoYmECXRwnl/vTY2', NULL, 'heelp@hotmail.com', 10, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'hello', 'lim', '', 'Nanana', '', '', '$2y$13$tgUG5l4qtHhVFymMmfOl5O1hZt2IBxLLzA.EGRc76aK2q0wGoG9xi', NULL, 'jlkh66@hotmail.com', 10, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'deep', 'kind', '', 'koklin', '', 'CXKJn1elQhiavALW15hhn1_qZav0qfcp', '$2y$13$H0ShpkFR2B5YchSNvgxr4.cpImaF0Lx0CpesPKiEMuzuRGcy6KB6y', NULL, 'kind@hotmail.com', 10, 10, '2017-02-02 14:21:28', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
 ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
 ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`projectid`), ADD KEY `fk_projectuser` (`userid`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
 ADD PRIMARY KEY (`taskid`), ADD KEY `fk_projecttask` (`projectid`);

--
-- Indexes for table `taskassign`
--
ALTER TABLE `taskassign`
 ADD PRIMARY KEY (`assignID`), ADD KEY `fk_tasktouser` (`userid`), ADD KEY `taskid` (`taskid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `projectid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
MODIFY `taskid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taskassign`
--
ALTER TABLE `taskassign`
MODIFY `assignID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
ADD CONSTRAINT `fk_projectuser` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
ADD CONSTRAINT `fk_projecttask` FOREIGN KEY (`projectid`) REFERENCES `project` (`projectid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
