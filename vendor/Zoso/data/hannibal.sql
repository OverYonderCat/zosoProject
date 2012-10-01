-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2012 at 10:33 AM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `zosoProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blocktype_id` int(11) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_831B972275D13D9B` (`blocktype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `blocktype_id`, `label`) VALUES
(1, 1, 'testblocklabel');

-- --------------------------------------------------------

--
-- Table structure for table `blocks_fieldtypes`
--

CREATE TABLE IF NOT EXISTS `blocks_fieldtypes` (
  `blocktype_id` int(11) NOT NULL,
  `fieldtype_id` int(11) NOT NULL,
  PRIMARY KEY (`blocktype_id`,`fieldtype_id`),
  KEY `IDX_B3A4A34B75D13D9B` (`blocktype_id`),
  KEY `IDX_B3A4A34B163BE712` (`fieldtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blocktype`
--

CREATE TABLE IF NOT EXISTS `blocktype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `templateFile` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blocktype`
--

INSERT INTO `blocktype` (`id`, `name`, `templateFile`) VALUES
(1, 'SampleBlock', 'sampleBlock.phtml');

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE IF NOT EXISTS `field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fieldtype_id` int(11) DEFAULT NULL,
  `block_id` int(11) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `defaultValue` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5BF54558163BE712` (`fieldtype_id`),
  KEY `IDX_5BF54558E9ED820C` (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`id`, `fieldtype_id`, `block_id`, `label`, `value`, `defaultValue`, `options`) VALUES
(1, 1, 1, 'testfieldlabel', '', 'defValue4input', '');

-- --------------------------------------------------------

--
-- Table structure for table `fieldtype`
--

CREATE TABLE IF NOT EXISTS `fieldtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inputType` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fieldtype`
--

INSERT INTO `fieldtype` (`id`, `inputType`) VALUES
(1, 'text'),
(2, 'textarea'),
(3, 'select'),
(4, 'radio'),
(5, 'checkbox'),
(6, 'file');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_140AB620727ACA70` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `parent_id`, `label`, `slug`) VALUES
(1, NULL, 'testpagelabel', 'testslug');

-- --------------------------------------------------------

--
-- Table structure for table `pages_blocks`
--

CREATE TABLE IF NOT EXISTS `pages_blocks` (
  `page_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  PRIMARY KEY (`page_id`,`block_id`),
  KEY `IDX_6367EE77C4663E4` (`page_id`),
  KEY `IDX_6367EE77E9ED820C` (`block_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages_blocks`
--

INSERT INTO `pages_blocks` (`page_id`, `block_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `block`
--
ALTER TABLE `block`
  ADD CONSTRAINT `FK_831B972275D13D9B` FOREIGN KEY (`blocktype_id`) REFERENCES `blocktype` (`id`);

--
-- Constraints for table `blocks_fieldtypes`
--
ALTER TABLE `blocks_fieldtypes`
  ADD CONSTRAINT `FK_B3A4A34B163BE712` FOREIGN KEY (`fieldtype_id`) REFERENCES `fieldtype` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B3A4A34B75D13D9B` FOREIGN KEY (`blocktype_id`) REFERENCES `blocktype` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `field`
--
ALTER TABLE `field`
  ADD CONSTRAINT `FK_5BF54558E9ED820C` FOREIGN KEY (`block_id`) REFERENCES `block` (`id`),
  ADD CONSTRAINT `FK_5BF54558163BE712` FOREIGN KEY (`fieldtype_id`) REFERENCES `fieldtype` (`id`);

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `FK_140AB620727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `page` (`id`);

--
-- Constraints for table `pages_blocks`
--
ALTER TABLE `pages_blocks`
  ADD CONSTRAINT `FK_6367EE77E9ED820C` FOREIGN KEY (`block_id`) REFERENCES `block` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6367EE77C4663E4` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE;
