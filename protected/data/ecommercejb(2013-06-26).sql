-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2013 at 09:13 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommercejb`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article_category` int(11) NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `post_date` datetime NOT NULL,
  `post` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `resume` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article_category` (`id_article_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `id_article_category`, `created_by`, `post_date`, `post`, `title`, `resume`) VALUES
(2, 2, 'test', '2013-06-11 00:00:00', '<p>asdfafdasf</p>\r\n', 'test', 'asdfafd'),
(4, 1, 'test', '2013-06-24 00:00:00', '<p>In short, microwaves distort the molecular structure of the foods. They destroy much of the nutrients and cause many other problems with the immune system over a period of time. If you love your family read this and take the extra couple of minutes to heat the food up the right way.</p>\r\n\r\n<p>Radiation Ovens</p>\r\n\r\n<p>The Proven Dangers of Microwaves</p>\r\n\r\n<p>Is it possible that millions of people are ignorantly sacrificing their health in exchange for the convenience of microwave ovens? Why did the Soviet Union ban the use of microwave ovens in 1976? Who invented microwave ovens, and why? The answers to these questions may shock you into throwing your microwave oven in the trash.</p>\r\n\r\n<p>Over 90% of American homes have microwave ovens used for meal preparation. Because microwave ovens are so convenient and energy efficient, as compared to conventional ovens, very few homes or restaurants are without them. In general, people believe that whatever a microwave oven does to foods cooked in it doesn&#39;t have any negative effect on either the food or them. Of course, if microwave ovens were really harmful, our government would never allow them on the market, would they? Would they? Regardless of what has been &quot;officially&quot; released concerning microwave ovens, we have personally stopped using ours based on the research facts outlined in this article.</p>\r\n\r\n<p>The purpose of this report is to show proof - evidence - that microwave cooking is not natural, nor healthy, and is far more dangerous to the human body than anyone could imagine. However, the microwave oven manufacturers, Washington City politics, and plain old human nature are suppressing the facts and evidence. Because of this, people are continuing to microwave their food - in blissful ignorance - without knowing the effects and danger of doing so.</p>\r\n\r\n<p>How do microwave ovens work?</p>\r\n\r\n<p>Microwaves are a form of electromagnetic energy, like light waves or radio waves, and occupy a part of the electromagnetic spectrum of power, or energy. Microwaves are very short waves of electromagnetic energy that travel at the speed of light (186,282 miles per second). In our modern technological age, microwaves are used to relay long distance telephone signals, television programs, and computer information across the earth or to a satellite in space. But the microwave is most familiar to us as an energy source for cooking food.</p>\r\n\r\n<p>Every microwave oven contains a magnetron, a tube in which electrons are affected by magnetic and electric fields in such a way as to produce micro wavelength radiation at about 2450 Mega Hertz (MHz) or 2.45 Giga Hertz (GHz). This microwave radiation interacts with the molecules in food. All wave energy changes polarity from positive to negative with each cycle of the wave. In microwaves, these polarity changes happen millions of times every second. Food molecules - especially the molecules of water - have a positive and negative end in the same way a magnet has a north and a south polarity.</p>\r\n\r\n<p>In commercial models, the oven has a power input of about 1000 watts of alternating current. As these microwaves generated from the magnetron bombard the food, they cause the polar molecules to rotate at the same frequency millions of times a second. All this agitation creates molecular friction, which heats up the food. The friction also causes substantial damage to the surrounding molecules, often tearing them apart or forcefully deforming them. The scientific name for this deformation is &quot;structural isomerism&quot;.</p>\r\n\r\n<p>By comparison, microwaves from the sun are based on principles of pulsed direct current (DC) that don&#39;t create frictional heat; microwave ovens use alternating current (AC) creating frictional heat. A microwave oven produces a spiked wavelength of energy with all the power going into only one narrow frequency of the energy spectrum. Energy from the sun operates in a wide frequency spectrum.</p>\r\n\r\n<p>Many terms are used in describing electromagnetic waves, such as wavelength, amplitude, cycle and frequency:</p>\r\n\r\n<ul>\r\n	<li>Wavelength determines the type of radiation, i.e. radio, X-ray, ultraviolet, visible, infrared, etc.</li>\r\n	<li>Amplitude determines the extent of movement measured from the starting point.</li>\r\n	<li>Cycle determines the unit of frequency, such as cycles per second, Hertz, Hz, or cycles/second.</li>\r\n	<li>Frequency determines the number of occurrences within a given time period (usually 1 second); The number of occurrences of a recurring process per unit of time, i.e. the number of repetitions of cycles per second</li>\r\n</ul>\r\n', 'Microwave', 'none'),
(5, 1, 'userx32', '2013-06-25 00:00:00', '<div><strong>Question: </strong>What Is Wireless N?</div>\r\n\r\n<div><strong>Answer: </strong><em>Wireless N</em> is a name for hardware gadgets that support <a href="http://compnetworking.about.com/od/wireless80211/g/bldef_80211n.htm">802.11n</a> <a href="http://compnetworking.about.com/cs/wireless80211/g/bldef_wifi.htm">Wi-Fi</a> wireless networking. Common types of Wireless N hardware include <a href="http://compnetworking.about.com/cs/routers/g/bldef_router.htm">network routers</a> and <a href="http://compnetworking.about.com/od/hardwarenetworkgear/g/bldef_adapter.htm">adapters</a>.\r\n\r\n<h3>Why Call It Wireless N?</h3>\r\nThe term &quot;Wireless N&quot; came into usage starting in 2006 as network equipment manufacturers began developing gear incorporating 802.11n technology. Until the 802.11n industry standard was finalized (in 2009), manufacturers could not rightly call their products as 802.11n-compliant. The alternative terms Wireless N and &quot;Draft N&quot; were both invented in an attempt to avoid product confusion. Now that the standard is complete, Draft N no longer applies, but Wireless N remains in use by some companies.</div>\r\n', 'Wireless N', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `m_article_category`
--

CREATE TABLE IF NOT EXISTS `m_article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `m_article_category`
--

INSERT INTO `m_article_category` (`id`, `category`) VALUES
(1, 'Category 1'),
(2, 'Category 2'),
(3, 'Category 3'),
(4, 'Category 4'),
(5, 'Category 5');

-- --------------------------------------------------------

--
-- Table structure for table `m_business_category`
--

CREATE TABLE IF NOT EXISTS `m_business_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `m_business_category`
--

INSERT INTO `m_business_category` (`id`, `category`) VALUES
(1, 'Kategori 1'),
(2, 'Kategori 2'),
(3, 'Kategori 3'),
(4, 'Kategori 4'),
(5, 'Kategori 5');

-- --------------------------------------------------------

--
-- Table structure for table `m_city`
--

CREATE TABLE IF NOT EXISTS `m_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `m_city`
--

INSERT INTO `m_city` (`id`, `city`) VALUES
(1, 'City 1'),
(2, 'City 2'),
(3, 'City 3'),
(4, 'City 4'),
(5, 'City 5');

-- --------------------------------------------------------

--
-- Table structure for table `m_country`
--

CREATE TABLE IF NOT EXISTS `m_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `m_country`
--

INSERT INTO `m_country` (`id`, `country`) VALUES
(1, 'Negara 1'),
(2, 'Negara 2');

-- --------------------------------------------------------

--
-- Table structure for table `m_job`
--

CREATE TABLE IF NOT EXISTS `m_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `m_job`
--

INSERT INTO `m_job` (`id`, `job`) VALUES
(1, 'Pekerjaan 1'),
(2, 'Pekerjaan 2'),
(3, 'Pekerjaan 3'),
(4, 'Pekerjaan 4'),
(5, 'Pekerjaan 5');

-- --------------------------------------------------------

--
-- Table structure for table `m_range_price`
--

CREATE TABLE IF NOT EXISTS `m_range_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `range_price` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `m_range_price`
--

INSERT INTO `m_range_price` (`id`, `range_price`) VALUES
(1, 'Range 1'),
(2, 'Range 1'),
(3, 'Range 3'),
(4, 'Range 4'),
(5, 'Range 5');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `title`, `image`, `deskripsi`) VALUES
(1, 'Slideshow 1 test', '1.jpg', '<p>test1</p>\r\n'),
(2, 'slide2test', '2.jpg', '<p>test2</p>\r\n'),
(3, 'Slide 3', '3.jpg', '<p>content 3</p>\r\n'),
(4, 'slide 4', '', ''),
(5, 'slide 5', '', '<p>content 5</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nationality` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `handphone` varchar(20) DEFAULT NULL,
  `birth_place` varchar(20) DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `income` varchar(20) DEFAULT NULL,
  `office_address` varchar(100) DEFAULT NULL,
  `office_phone` varchar(100) DEFAULT NULL,
  `religion` varchar(1) DEFAULT NULL,
  `marital_status` varchar(1) DEFAULT NULL,
  `id_buyer_category` int(11) DEFAULT NULL,
  `id_buyer_location` int(11) DEFAULT NULL,
  `id_buyer_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_buyer_price` (`id_buyer_price`),
  KEY `id_buyer_location` (`id_buyer_location`),
  KEY `id_buyer_category` (`id_buyer_category`),
  KEY `id_nationality` (`id_nationality`),
  KEY `id_job` (`id_job`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_nationality`, `id_job`, `password`, `email`, `first_name`, `last_name`, `gender`, `address`, `phone`, `handphone`, `birth_place`, `date_of_birth`, `instansi`, `income`, `office_address`, `office_phone`, `religion`, `marital_status`, `id_buyer_category`, `id_buyer_location`, `id_buyer_price`) VALUES
(3, 1, 1, 'ee11cbb19052e40b07aac0ca060c23ee', 'user@jb.com', 'user', 'user', '', '', '', '', NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_article_category`) REFERENCES `m_article_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_nationality`) REFERENCES `m_country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_job`) REFERENCES `m_job` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`id_buyer_category`) REFERENCES `m_business_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`id_buyer_location`) REFERENCES `m_city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_5` FOREIGN KEY (`id_buyer_price`) REFERENCES `m_range_price` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
