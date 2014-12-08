-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 08 dec 2014 om 14:07
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cms_invoice_items`
--

CREATE TABLE IF NOT EXISTS `cms_invoice_items` (
  `inv_item_id` int(11) NOT NULL DEFAULT '0',
  `inv_id` int(11) DEFAULT '0',
  `item_id` int(11) DEFAULT '0',
  `count` int(11) DEFAULT '0',
  PRIMARY KEY (`inv_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `cms_invoice_items`
--

INSERT INTO `cms_invoice_items` (`inv_item_id`, `inv_id`, `item_id`, `count`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 5),
(3, 2, 1, 2),
(4, 1, 3, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cms_invoice_templates`
--

CREATE TABLE IF NOT EXISTS `cms_invoice_templates` (
  `inv_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `start_date` varchar(255) DEFAULT '0',
  `end_date` varchar(255) DEFAULT '0',
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `cms_invoice_templates`
--

INSERT INTO `cms_invoice_templates` (`inv_id`, `user_id`, `start_date`, `end_date`) VALUES
(1, 1, '0', '0'),
(2, 1, '0', '0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cms_items`
--

CREATE TABLE IF NOT EXISTS `cms_items` (
  `item_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `price` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `catagory` varchar(100) DEFAULT 'games',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `cms_items`
--

INSERT INTO `cms_items` (`item_id`, `name`, `price`, `description`, `image`, `catagory`) VALUES
(1, 'COD MW2', 50, 'Call of duty MW2', 'http://upload.wikimedia.org/wikipedia/en/d/db/Modern_Warfare_2_cover.PNG', 'games'),
(2, 'SMB 3', 10, 'Super Mario Bros 3', 'http://upload.wikimedia.org/wikipedia/en/a/a5/Super_Mario_Bros._3_coverart.png', 'games'),
(3, 'Transistor OST', 10, 'This pack contains all soundtracks out of Transistor', 'http://i.imgur.com/vmSCZzU.png', 'music'),
(4, 'Bastion OST', 15, 'This pack contains all soundtracks out of Bastion.', 'http://i.imgur.com/fwLjweV.png', 'music');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cms_users`
--

CREATE TABLE IF NOT EXISTS `cms_users` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `firstname` varchar(50) DEFAULT '',
  `lastname` varchar(50) DEFAULT '',
  `street` varchar(50) DEFAULT '',
  `zip` varchar(10) DEFAULT '',
  `number` int(10) DEFAULT '0',
  `city` varchar(100) DEFAULT '',
  `country` varchar(100) DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `cms_users`
--

INSERT INTO `cms_users` (`user_id`, `email`, `password`, `firstname`, `lastname`, `street`, `zip`, `number`, `city`, `country`) VALUES
(0, 'slawor4@live.nl', '123', '', '', '', '', 0, '', ''),
(1, 'jiojio@ge.nl', 'llllll', 'jordy', 'visser', 'jiojo', '989', 89, 'jiojjio', 'jiojio');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
