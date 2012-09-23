-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 23. Sep 2012 um 06:55
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `zosoproject`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pages_blocks`
--

CREATE TABLE IF NOT EXISTS `pages_blocks` (
  `page_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  PRIMARY KEY (`page_id`,`block_id`),
  KEY `IDX_6367EE77C4663E4` (`page_id`),
  KEY `IDX_6367EE77E9ED820C` (`block_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `pages_blocks`
--

INSERT INTO `pages_blocks` (`page_id`, `block_id`) VALUES
(1, 2);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `pages_blocks`
--
ALTER TABLE `pages_blocks`
  ADD CONSTRAINT `FK_6367EE77E9ED820C` FOREIGN KEY (`block_id`) REFERENCES `block` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6367EE77C4663E4` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE;
