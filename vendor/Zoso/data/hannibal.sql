-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 23. Sep 2012 um 00:57
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `zosoproject`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `classname` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `block`
--

INSERT INTO `block` (`id`, `label`, `classname`) VALUES
(1, 'testBlockLabel', 'SampleBlock');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `parent_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `page`
--

INSERT INTO `page` (`id`, `label`, `slug`, `parent_id`) VALUES
(1, 'testlabel', 'testslug', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pages_blocks`
--

CREATE TABLE IF NOT EXISTS `pages_blocks` (
  `page_id` int(3) DEFAULT NULL,
  `block_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `pages_blocks`
--

INSERT INTO `pages_blocks` (`page_id`, `block_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `display_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `display_name`, `password`) VALUES
(1, NULL, 'sweber@montfortwerbung.com', NULL, '$2y$14$lRc4xoCIUVq/clZkkpg.uetPiBfzoWvr/GGj3M.8sVMFrvisV82y6');
