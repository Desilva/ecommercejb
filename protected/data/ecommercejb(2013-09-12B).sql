-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2013 at 01:43 PM
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
  `id_article_category_pembaca` int(11) NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `post_date` datetime NOT NULL,
  `post` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `resume` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article_category` (`id_article_category`),
  KEY `id_article_category_pembaca` (`id_article_category_pembaca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `id_article_category`, `id_article_category_pembaca`, `created_by`, `post_date`, `post`, `title`, `resume`) VALUES
(2, 2, 1, 'test', '2013-06-11 00:00:00', '<p>asdfafdasf</p>\r\n', 'test', 'asdfafd'),
(4, 1, 1, 'test', '2013-06-24 00:00:00', '<p>In short, microwaves distort the molecular structure of the foods. They destroy much of the nutrients and cause many other problems with the immune system over a period of time. If you love your family read this and take the extra couple of minutes to heat the food up the right way.</p>\r\n\r\n<p>Radiation Ovens</p>\r\n\r\n<p>The Proven Dangers of Microwaves</p>\r\n\r\n<p>Is it possible that millions of people are ignorantly sacrificing their health in exchange for the convenience of microwave ovens? Why did the Soviet Union ban the use of microwave ovens in 1976? Who invented microwave ovens, and why? The answers to these questions may shock you into throwing your microwave oven in the trash.</p>\r\n\r\n<p>Over 90% of American homes have microwave ovens used for meal preparation. Because microwave ovens are so convenient and energy efficient, as compared to conventional ovens, very few homes or restaurants are without them. In general, people believe that whatever a microwave oven does to foods cooked in it doesn&#39;t have any negative effect on either the food or them. Of course, if microwave ovens were really harmful, our government would never allow them on the market, would they? Would they? Regardless of what has been &quot;officially&quot; released concerning microwave ovens, we have personally stopped using ours based on the research facts outlined in this article.</p>\r\n\r\n<p>The purpose of this report is to show proof - evidence - that microwave cooking is not natural, nor healthy, and is far more dangerous to the human body than anyone could imagine. However, the microwave oven manufacturers, Washington City politics, and plain old human nature are suppressing the facts and evidence. Because of this, people are continuing to microwave their food - in blissful ignorance - without knowing the effects and danger of doing so.</p>\r\n\r\n<p>How do microwave ovens work?</p>\r\n\r\n<p>Microwaves are a form of electromagnetic energy, like light waves or radio waves, and occupy a part of the electromagnetic spectrum of power, or energy. Microwaves are very short waves of electromagnetic energy that travel at the speed of light (186,282 miles per second). In our modern technological age, microwaves are used to relay long distance telephone signals, television programs, and computer information across the earth or to a satellite in space. But the microwave is most familiar to us as an energy source for cooking food.</p>\r\n\r\n<p>Every microwave oven contains a magnetron, a tube in which electrons are affected by magnetic and electric fields in such a way as to produce micro wavelength radiation at about 2450 Mega Hertz (MHz) or 2.45 Giga Hertz (GHz). This microwave radiation interacts with the molecules in food. All wave energy changes polarity from positive to negative with each cycle of the wave. In microwaves, these polarity changes happen millions of times every second. Food molecules - especially the molecules of water - have a positive and negative end in the same way a magnet has a north and a south polarity.</p>\r\n\r\n<p>In commercial models, the oven has a power input of about 1000 watts of alternating current. As these microwaves generated from the magnetron bombard the food, they cause the polar molecules to rotate at the same frequency millions of times a second. All this agitation creates molecular friction, which heats up the food. The friction also causes substantial damage to the surrounding molecules, often tearing them apart or forcefully deforming them. The scientific name for this deformation is &quot;structural isomerism&quot;.</p>\r\n\r\n<p>By comparison, microwaves from the sun are based on principles of pulsed direct current (DC) that don&#39;t create frictional heat; microwave ovens use alternating current (AC) creating frictional heat. A microwave oven produces a spiked wavelength of energy with all the power going into only one narrow frequency of the energy spectrum. Energy from the sun operates in a wide frequency spectrum.</p>\r\n\r\n<p>Many terms are used in describing electromagnetic waves, such as wavelength, amplitude, cycle and frequency:</p>\r\n\r\n<ul>\r\n	<li>Wavelength determines the type of radiation, i.e. radio, X-ray, ultraviolet, visible, infrared, etc.</li>\r\n	<li>Amplitude determines the extent of movement measured from the starting point.</li>\r\n	<li>Cycle determines the unit of frequency, such as cycles per second, Hertz, Hz, or cycles/second.</li>\r\n	<li>Frequency determines the number of occurrences within a given time period (usually 1 second); The number of occurrences of a recurring process per unit of time, i.e. the number of repetitions of cycles per second</li>\r\n</ul>\r\n', 'Microwave', 'none'),
(5, 1, 2, 'userx32', '2013-06-25 00:00:00', '<div><strong>Question: </strong>What Is Wireless N?</div>\r\n\r\n<div><strong>Answer: </strong><em>Wireless N</em> is a name for hardware gadgets that support <a href="http://compnetworking.about.com/od/wireless80211/g/bldef_80211n.htm">802.11n</a> <a href="http://compnetworking.about.com/cs/wireless80211/g/bldef_wifi.htm">Wi-Fi</a> wireless networking. Common types of Wireless N hardware include <a href="http://compnetworking.about.com/cs/routers/g/bldef_router.htm">network routers</a> and <a href="http://compnetworking.about.com/od/hardwarenetworkgear/g/bldef_adapter.htm">adapters</a>.\r\n\r\n<h3>Why Call It Wireless N?</h3>\r\nThe term &quot;Wireless N&quot; came into usage starting in 2006 as network equipment manufacturers began developing gear incorporating 802.11n technology. Until the 802.11n industry standard was finalized (in 2009), manufacturers could not rightly call their products as 802.11n-compliant. The alternative terms Wireless N and &quot;Draft N&quot; were both invented in an attempt to avoid product confusion. Now that the standard is complete, Draft N no longer applies, but Wireless N remains in use by some companies.</div>\r\n', 'Wireless N', 'none'),
(6, 1, 2, 'Admin', '2013-06-27 00:00:00', '<p>this is for testing image</p>\r\n\r\n<p><input alt="" src="http://www.nancybooks.info/NPBBOOK.gif" style="width: 200px; height: 130px;" type="image" /></p>\r\n', 'Image Test', 'test'),
(7, 1, 1, 'yesy', '2013-09-12 00:00:00', '<p><img alt="" src="http://localhost/ecommerceJB/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="" /></p>\r\n', 'test smiley', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE IF NOT EXISTS `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_industri` int(11) DEFAULT NULL,
  `id_sub_industri` int(11) DEFAULT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `deskripsi` text,
  `kepemilikan` int(11) NOT NULL COMMENT '0=bisnis merupakan franchise,1=100%, 2=dibawah 100%',
  `tahun_didirikan` int(11) DEFAULT NULL,
  `alamat` text,
  `jumlah_karyawan` int(11) DEFAULT NULL,
  `penjualan` bigint(20) unsigned DEFAULT NULL,
  `hpp` bigint(20) unsigned DEFAULT NULL,
  `laba_bersih_tahun` bigint(20) unsigned DEFAULT NULL,
  `total_aset` bigint(20) unsigned DEFAULT NULL,
  `marjin_laba_bersih` bigint(20) unsigned DEFAULT NULL,
  `laba_bersih_aset` bigint(20) unsigned DEFAULT NULL,
  `harga_penawaran_penjualan` bigint(20) unsigned DEFAULT NULL,
  `harga_penawaran_laba_bersih` bigint(20) unsigned DEFAULT NULL,
  `harga_penawaran_aset` bigint(20) unsigned DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `id_alasan_jual_bisnis` int(11) DEFAULT NULL,
  `alasan_jual_bisnis_lainnya` text,
  `franchise_alasan_kerjasama` text,
  `franchise_persyaratan` text,
  `franchise_menu` text,
  `franchise_dukungan_franchisor` text,
  `dokumen` text,
  `image` text,
  `status_approval` varchar(50) DEFAULT NULL,
  `tanggal_approval` datetime DEFAULT NULL,
  `id_alasan_penolakan` int(11) DEFAULT NULL,
  `jumlah_click` int(11) NOT NULL DEFAULT '0',
  `tampilkanKontak` int(11) NOT NULL DEFAULT '0' COMMENT '0= kontak tidak tampil; 1= kontak boleh ditampilkan',
  `status_rekomendasi` int(11) NOT NULL DEFAULT '0' COMMENT '0=tidak rekomendasi; 1=direkomendasikan',
  PRIMARY KEY (`id`),
  KEY `id_category` (`id_category`,`id_user`,`id_industri`,`id_sub_industri`,`id_provinsi`,`id_kota`),
  KEY `id_kepemilikan` (`id_user`,`id_industri`,`id_sub_industri`,`id_provinsi`,`id_kota`),
  KEY `id_industri` (`id_industri`),
  KEY `id_sub_industri` (`id_sub_industri`),
  KEY `id_provinsi` (`id_provinsi`),
  KEY `id_kota` (`id_kota`),
  KEY `alasan_penolakan` (`id_alasan_penolakan`),
  KEY `id_alasan_jual_bisnis` (`id_alasan_jual_bisnis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `id_category`, `id_user`, `id_industri`, `id_sub_industri`, `id_provinsi`, `id_kota`, `nama`, `deskripsi`, `kepemilikan`, `tahun_didirikan`, `alamat`, `jumlah_karyawan`, `penjualan`, `hpp`, `laba_bersih_tahun`, `total_aset`, `marjin_laba_bersih`, `laba_bersih_aset`, `harga_penawaran_penjualan`, `harga_penawaran_laba_bersih`, `harga_penawaran_aset`, `harga`, `id_alasan_jual_bisnis`, `alasan_jual_bisnis_lainnya`, `franchise_alasan_kerjasama`, `franchise_persyaratan`, `franchise_menu`, `franchise_dukungan_franchisor`, `dokumen`, `image`, `status_approval`, `tanggal_approval`, `id_alasan_penolakan`, `jumlah_click`, `tampilkanKontak`, `status_rekomendasi`) VALUES
(28, 1, 3, 1, 1, 1, 1, 'Business 1', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bf_3_130723102350_1.jpg,bf_3_130723102350_2.jpg,bf_3_130723102350_3.jpg,', 'Diterima', '2013-07-23 00:00:00', NULL, 10, 0, 1),
(29, 1, 3, 2, 4, 2, 4, 'Business 2', '', 2, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bf_3_130723102432_1.jpg,bf_3_130723102432_2.jpg,bf_3_130723102432_3.jpg,', 'Diterima', '2013-07-23 00:00:00', NULL, 72, 0, 0),
(30, 1, 3, 1, 3, 1, 1, 'Business 3', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bf_3_130723102519_1.jpg,', 'Diterima', '2013-07-23 00:00:00', NULL, 3, 0, 1),
(31, 1, 3, 1, 1, 1, 2, 'Business 4', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 89765, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bf_3_130723102557_1.jpg,', 'Diterima', '2013-07-23 00:00:00', NULL, 10, 0, 0),
(32, 1, 3, 2, 5, 2, 5, 'Business 5', '', 2, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bf_3_130723102641_1.jpg,', 'Ditolak', '2013-07-23 00:00:00', 1, 0, 0, 1),
(34, 2, 3, 1, 1, 1, 1, 'Franchise 3', NULL, 0, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, NULL, '', '', '', '', NULL, 'bf_3_130723103131_1.jpg,', 'Diterima', '2013-09-12 00:00:00', 2, 13, 0, 1),
(35, 1, 3, 1, 1, 1, 1, 'Business 6', 'T­he microwave oven could be one of the great inventions of the 20th century -- hundreds of millions of homes worldwide have one.\nJust think about how many times you use a microwave every day. You''re running late for work, so there''s no time to fix breakfast at home. On your way to the office, you stop to gas up your car. Inside the quickie-mart, you grab a frozen breakfast burrito and pop', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1234, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Diterima', '2013-07-26 00:00:00', NULL, 78, 0, 0),
(36, 1, 3, 1, 1, 1, 1, 'Business 6', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Verifikasi', NULL, NULL, 0, 0, 0),
(37, 1, 3, 2, 4, 1, 1, 'Business 7', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Verifikasi', NULL, NULL, 0, 0, 0),
(38, 1, 3, 1, 1, 1, 1, 'test', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Verifikasi', NULL, NULL, 0, 0, 0),
(39, 1, 3, 1, 1, 1, 1, 'Business 8', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Verifikasi', NULL, NULL, 0, 0, 0),
(40, 1, 3, 1, 1, 1, 2, 'Business 10c', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Verifikasi', NULL, NULL, 0, 0, 0),
(41, 1, 3, 1, 1, 1, 1, 'Business 11a', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ditolak', NULL, 1, 0, 0, 0),
(42, 1, 3, 1, 1, 1, 1, 'Docs', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'Verifikasi', NULL, NULL, 0, 0, 0),
(43, 1, 3, 1, 2, 1, 1, 'docs2', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'Verifikasi', NULL, NULL, 0, 0, 0),
(44, 1, 3, 1, 1, 1, 2, 'qweadf', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'Verifikasi', NULL, NULL, 0, 0, 0),
(45, 1, 3, 1, 1, 1, 1, 'test docs', '', 1, NULL, '', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, NULL, NULL, NULL, NULL, NULL, NULL, 'bf_3_130801121319_1.jpg,bf_3_130801121319_2.jpg,', NULL, 'Diterima', '2013-08-02 00:00:00', NULL, 7, 0, 0),
(46, 1, 3, 1, 1, 1, 1, 'docs test2', '', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, NULL, NULL, 'B 2.jpg,', NULL, 'Diterima', '2013-08-02 00:00:00', NULL, 17, 0, 0),
(47, 1, 3, 1, 1, 1, 1, 'Test upload', '', 1, NULL, '', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bf_3_130815122246_1.jpg,bf_3_130815122246_2.jpg,bf_3_130815122246_3.jpg,bf_3_130815122246_4.jpg,bf_3_130815122246_5.jpg,', 'Verifikasi', NULL, NULL, 0, 0, 0),
(52, 1, 3, 1, 1, 1, 1, 'test upload 2', '', 1, NULL, '', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, NULL, NULL, NULL, NULL, NULL, NULL, 'bf_3_130801121319_1.jpg', '1_130817031528_olecko-2006.1155510000.small_white_tiger (1).jpg,', 'Diterima', '2013-08-22 00:00:00', NULL, 81, 1, 1),
(53, 1, 3, 1, 1, 1, 1, 'test', '', 1, NULL, '', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Verifikasi', NULL, NULL, 0, 0, 0),
(54, 1, 5, 1, 1, 1, 1, 'Restaurant / Sports Bar, Money Maker', 'Rare opportunity to own a beach front, well established, very attractive, 6000sqf in size, money maker, restaurant and sports bar with full liquor(ABC-Type 47) license. \r\n\r\nPatrons for this fine establishment are pampered with a bar with full liquor license, selection beers on tap, a variety of wine selection, multiple flat screen televisions, patio dining with an ocean view for an overall upscale dining experience.\r\n\r\nAdditionally, this well reputed restaurant has a large seating capacity inside, at the bar as well as a large ocean front patio. Please note, that current ownership prides itself with a flawless record of no violations with ABC. \r\n\r\nPlease note, that seller maintains clean and verifiable books and records reflecting a net income of $256,412.00 after add back of sellers salary. \r\n\r\nDisclaimer: The aforementioned information was furnished by the Seller. Business Brokers, its agents have not and will not verify the accuracy or completeness of information provided and make no representations as to its accuracy or reliability. Purchaser''s are hereby advised to consult with their legal and financial advisors to the extend they may deem necessary.', 1, 2010, 'Los Angeles County, California', 100, 1846551, 256412, 256412, 1000000, 0, 0, 0, 4, 1, 900000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1_130912030924_patnbpizza.jpg,', 'Verifikasi', '2013-09-12 00:00:00', NULL, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_business` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `alamat_email` varchar(100) DEFAULT NULL,
  `no_telp` varchar(100) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `deskripsi` text,
  `status` varchar(50) DEFAULT NULL COMMENT '0= email dikirim melalui admin terlebih dahulu; 1=email langsung dikirim ke user',
  PRIMARY KEY (`id`),
  KEY `id_business` (`id_business`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `id_user`, `id_business`, `tanggal`, `alamat_email`, `no_telp`, `nama_pengirim`, `deskripsi`, `status`) VALUES
(4, 5, 28, '2013-07-24 00:00:00', 'test@test.com', '04532412', 'Test', 'test deskripsi', '1'),
(5, 5, 29, '2013-07-24 00:00:00', 'test@test.com', '1233445', 'Test 2', 'test 2', '1'),
(6, 4, 52, '2013-09-12 00:00:00', 'admin@jb.com', '123412', 'admin admin', '', '1'),
(7, 4, 52, '2013-09-12 00:00:00', 'admin@jb.com', '123412', 'admin admin', '', '1'),
(8, 4, 52, '2013-09-12 00:00:00', 'admin@jb.com', '1234124', 'admin admin', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `m_alasan_jual_bisnis`
--

CREATE TABLE IF NOT EXISTS `m_alasan_jual_bisnis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alasan` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `m_alasan_jual_bisnis`
--

INSERT INTO `m_alasan_jual_bisnis` (`id`, `alasan`) VALUES
(1, 'Alasan 1'),
(2, 'Alasan 2');

-- --------------------------------------------------------

--
-- Table structure for table `m_alasan_penolakan`
--

CREATE TABLE IF NOT EXISTS `m_alasan_penolakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alasan` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `m_alasan_penolakan`
--

INSERT INTO `m_alasan_penolakan` (`id`, `alasan`) VALUES
(1, 'Alasan 1'),
(2, 'Alasan test');

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
-- Table structure for table `m_article_category_pembaca`
--

CREATE TABLE IF NOT EXISTS `m_article_category_pembaca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_pembaca` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `m_article_category_pembaca`
--

INSERT INTO `m_article_category_pembaca` (`id`, `category_pembaca`) VALUES
(1, 'Franchisee'),
(2, 'Franchisor'),
(3, 'Penjual Bisnis'),
(4, 'Pembeli Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `m_business_category`
--

CREATE TABLE IF NOT EXISTS `m_business_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `m_business_category`
--

INSERT INTO `m_business_category` (`id`, `category`) VALUES
(1, 'Bisnis'),
(2, 'Franchise');

-- --------------------------------------------------------

--
-- Table structure for table `m_buyer_category`
--

CREATE TABLE IF NOT EXISTS `m_buyer_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `m_buyer_category`
--

INSERT INTO `m_buyer_category` (`id`, `category`) VALUES
(1, 'Kategori1'),
(2, 'Kategori2');

-- --------------------------------------------------------

--
-- Table structure for table `m_city`
--

CREATE TABLE IF NOT EXISTS `m_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_provinsi` (`id_provinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `m_city`
--

INSERT INTO `m_city` (`id`, `city`, `id_provinsi`) VALUES
(1, 'City 1', 1),
(2, 'City 2', 1),
(3, 'City 3', 1),
(4, 'City 4', 2),
(5, 'City 5', 2);

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
-- Table structure for table `m_industri`
--

CREATE TABLE IF NOT EXISTS `m_industri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `industri` varchar(100) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `m_industri`
--

INSERT INTO `m_industri` (`id`, `industri`, `keterangan`) VALUES
(1, 'Industri 1', 'Keterangan 1'),
(2, 'Industri 2', NULL);

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
-- Table structure for table `m_provinsi`
--

CREATE TABLE IF NOT EXISTS `m_provinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `m_provinsi`
--

INSERT INTO `m_provinsi` (`id`, `provinsi`) VALUES
(1, 'Provinsi 1'),
(2, 'Provinsi 2');

-- --------------------------------------------------------

--
-- Table structure for table `m_range_price`
--

CREATE TABLE IF NOT EXISTS `m_range_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `range_price` varchar(100) NOT NULL,
  `harga_min` bigint(20) DEFAULT NULL COMMENT 'representasi numerik range_price',
  `harga_max` bigint(20) DEFAULT NULL COMMENT 'representasi numerik range_price',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `m_range_price`
--

INSERT INTO `m_range_price` (`id`, `range_price`, `harga_min`, `harga_max`) VALUES
(1, '< 10 jt', 0, 9999999),
(2, '10 jt - 50 jt', 10000000, 49999999),
(3, '50 jt - 100 jt', 50000000, 99999999),
(4, '100 jt - 1 M', 100000000, 999999999),
(5, '> 1 M', 1000000000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_sub_industri`
--

CREATE TABLE IF NOT EXISTS `m_sub_industri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_industri` int(11) NOT NULL,
  `sub_industri` varchar(100) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_industri` (`id_industri`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `m_sub_industri`
--

INSERT INTO `m_sub_industri` (`id`, `id_industri`, `sub_industri`, `keterangan`) VALUES
(1, 1, 'Sub Industri 1', NULL),
(2, 1, 'Sub Industri 2', NULL),
(3, 1, 'Sub-industri 3', 'Keterangan 3'),
(4, 2, 'Sub-industri 4', NULL),
(5, 2, 'Sub-industri 5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(500) NOT NULL,
  `deskripsi` text,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_pembuat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pembuat` (`id_pembuat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `judul`, `deskripsi`, `isi`, `tanggal`, `id_pembuat`) VALUES
(1, 'Newsletter 1', 'Test Newsletter Pertama', '<p>If you&#39;ve noticed #iphonegold showing up all over Twitter, there&#39;s a good reason.</p>\r\n\r\n<p>The Internet on Monday lit up over reports that the next iPhone, set for unveiling on Sept. 10, could be available in black, white and gold. If Apple does indeed launch a gold iPhone, it would be the first color added to the iconic device since its debut in 2007.</p>\r\n\r\n<p>According to reports from <a href="http://techcrunch.com/2013/08/18/gold-iphone/" title="http://techcrunch.com/2013/08/18/gold-iphone/">TechCrunch</a> and <a href="http://allthingsd.com/20130819/yes-apple-will-sell-a-gold-tone-iphone/?mod=atdtweet" title="http://allthingsd.com/20130819/yes-apple-will-sell-a-gold-tone-iphone/?mod=atdtweet">All Things D</a>, gold will join black and white as options for Apple&#39;s next smartphone. Both reports claim the iPhone won&#39;t feature a gaudy gold, such as you might see on a gold bar, but more of a champagne color. The phone will have a white face with a golden tone on the backplate and edging.</p>\r\n\r\n<p>Apple declined to comment.</p>\r\n\r\n<p>The addition of gold would not be a big deal here, but &quot;huge&quot; in China, says Tim Bajarin, an analyst at Creative Strategies.</p>\r\n\r\n<p>&quot;The market is driven by colors, and gold means prosperity,&quot; says Bajarin.</p>\r\n\r\n<p>Apple is expected to introduce both a successor to the iPhone 5 and a lower-price, plastic iPhone for cost-conscious consumers at the September event.</p>\r\n\r\n<p>The new iPhone is expected to have staple upgrades including a faster processor, stronger battery and improved camera. It could also include new fingerprint technology.</p>\r\n\r\n<p>Apple purchased security firm AuthenTec in 2012, so Bajarin expects Apple to include AuthenTec&#39;s fingerprint technology in the new iPhone.</p>\r\n\r\n<p>Because so many iPhones are either lost or stolen, and so much of our personal data live inside the phone, &quot;Security is very high in consumers&#39; minds right now,&quot; says Bajarin.</p>\r\n\r\n<p>The latest version of Apple&#39;s mobile operating system, iOS 7, which will be released with the new iPhone, has a &quot;death sentence&quot; feature that lets the owner send a signal to the phone if it&#39;s lost, effectively turning it into a useless brick.</p>\r\n\r\n<p>&quot;The combo of the two is a killer,&quot; says Bajarin. Additionally, &quot;Android doesn&#39;t have anything like it &mdash; not yet anyway.&quot;</p>\r\n\r\n<p>Apple is under pressure in the smartphone market, especially from Samsung and other companies that make smartphones running Google&#39;s Android operating system. The security features could give Apple bragging rights over features Androids don&#39;t currently have.</p>\r\n\r\n<p>Not to be outdone, rival Samsung <a href="http://www.usatoday.com/story/tech/personal/2013/08/16/report-samsung-smartwatch/2663931/" title="http://www.usatoday.com/story/tech/personal/2013/08/16/report-samsung-smartwatch/2663931/">is hosting an event Sept. 4</a> where it is not only expected to unveil the next Galaxy Note smartphone, but could also unveil a new smartwatch, according to a Bloomberg report.</p>\r\n\r\n<p>Yet another new huge phone from Samsung, the &quot;Galaxy Mega,&quot; goes on sale Friday at AT&amp;T stores for $150 with a 2-year service contract. The screen is 6.3 inches diagonally, making it almost as big as a small tablet.</p>\r\n', '2013-08-21', 4);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `nama_settings` varchar(50) NOT NULL DEFAULT '',
  `durasi_slideshow` int(11) NOT NULL DEFAULT '1',
  `jumlah_rekomendasi` int(11) NOT NULL DEFAULT '1',
  `jumlah_terbaru` int(11) NOT NULL DEFAULT '1',
  `nilai_min_telpon_tampil` bigint(20) NOT NULL DEFAULT '1',
  `alamat_email` varchar(50) NOT NULL,
  `nama_email` varchar(50) NOT NULL,
  PRIMARY KEY (`nama_settings`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`nama_settings`, `durasi_slideshow`, `jumlah_rekomendasi`, `jumlah_terbaru`, `nilai_min_telpon_tampil`, `alamat_email`, `nama_email`) VALUES
('settings_admin', 1, 6, 6, 10000000000, 'donotreply@jb.com', 'JualanBisnis.com');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `image` text,
  `deskripsi` text,
  `url_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `title`, `image`, `deskripsi`, `url_link`) VALUES
(1, 'Test', '1.jpg', '<p>test1 jhghjghjghjgjgjgjgjgjghj</p>\r\n', '/ecommerceJB/index.php/faq'),
(2, '', '2.jpg', '<p>test2</p>\r\n', ''),
(3, '', '3.jpg', '<p>content 3</p>\r\n', ''),
(4, '', '', '', ''),
(5, '', '', '<p>content 5</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `status_login`
--

CREATE TABLE IF NOT EXISTS `status_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `jumlah_percobaan` int(11) DEFAULT '0',
  `waktu_gagal_login_terakhir` datetime DEFAULT NULL,
  `waktu_sukses_login_terakhir` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `status_login`
--

INSERT INTO `status_login` (`id`, `email`, `jumlah_percobaan`, `waktu_gagal_login_terakhir`, `waktu_sukses_login_terakhir`) VALUES
(4, 'user@jb.com', 0, '2013-09-12 18:17:18', '2013-09-12 18:17:18'),
(5, 'admin@jb.com', 0, NULL, '2013-09-12 18:17:42'),
(6, 'user2@jb.com', 0, NULL, '2013-09-12 14:57:47');

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
  `date_of_birth` date DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `income` bigint(20) DEFAULT NULL,
  `office_address` varchar(100) DEFAULT NULL,
  `office_phone` varchar(100) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `id_buyer_category` int(11) DEFAULT NULL,
  `id_buyer_location` int(11) DEFAULT NULL,
  `id_buyer_price` int(11) DEFAULT NULL,
  `references` varchar(100) DEFAULT NULL,
  `newsletter_status` int(11) DEFAULT NULL,
  `access_level` int(11) NOT NULL DEFAULT '0' COMMENT '0:Member, 1:Admin',
  `status_verifikasi` int(11) NOT NULL DEFAULT '0' COMMENT '0: belum verifikasi, 1: sudah verifikasi',
  `kode_verifikasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_buyer_price` (`id_buyer_price`),
  KEY `id_buyer_location` (`id_buyer_location`),
  KEY `id_buyer_category` (`id_buyer_category`),
  KEY `id_nationality` (`id_nationality`),
  KEY `id_job` (`id_job`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_nationality`, `id_job`, `password`, `email`, `first_name`, `last_name`, `gender`, `address`, `phone`, `handphone`, `birth_place`, `date_of_birth`, `instansi`, `income`, `office_address`, `office_phone`, `religion`, `marital_status`, `id_buyer_category`, `id_buyer_location`, `id_buyer_price`, `references`, `newsletter_status`, `access_level`, `status_verifikasi`, `kode_verifikasi`) VALUES
(3, 1, 1, 'ee11cbb19052e40b07aac0ca060c23ee', 'user@jb.com', 'user', 'user', 'L', 'test', '', '', '', '2013-07-31', '', 0, '', '', '', '', 1, 1, 1, NULL, 0, 0, 1, NULL),
(4, 1, 1, '21232f297a57a5a743894a0e4a801fc3', 'admin@jb.com', 'admin', 'admin', NULL, '', '', '', NULL, NULL, '', 0, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL),
(5, 1, 1, 'ee11cbb19052e40b07aac0ca060c23ee', 'user2@jb.com', 'user', 'user', '', '', '', '', '', '2013-07-23', '', 0, '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 1, NULL),
(6, 1, 2, '7e58d63b60197ceb55a1c487989a3720', 'user3@jb.com', 'user', 'user', 'L', 'user', 'user', 'user', '', '2013-07-30', 'user', 0, 'user', '', NULL, NULL, 2, 1, 1, NULL, 0, 0, 1, NULL),
(7, 1, 1, '81dc9bdb52d04dc20036dbd8313ed055', 'userzz@jb.com', '1234', '1234', 'L', '1234', '1234', '1234', 'City 1', '2013-07-09', '1234', 0, '1234', '1234', NULL, NULL, 2, 1, 2, NULL, 0, 0, 1, NULL),
(8, 1, 1, '81dc9bdb52d04dc20036dbd8313ed055', 'admin2@jb.com', '1234', '1234', 'L', '1234', '1234', '1234', 'City 1', '2013-07-03', '1234', 0, '1234', '1234', 'Kristen', 'Belum Menikah', 1, 1, 1, NULL, 0, 0, 1, NULL),
(9, 1, 1, 'ee11cbb19052e40b07aac0ca060c23ee', 'user20@jb.com', 'User20', 'user', '', '', NULL, '', '', '0000-00-00', '', 0, '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 1, NULL),
(10, 1, 1, '2e40ad879e955201df4dedbf8d479a12', 'user12@jb.com', 'USER12', 'user12', '', '', NULL, '', '', '0000-00-00', '', 0, '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 1, NULL),
(11, 1, 1, '2e40ad879e955201df4dedbf8d479a12', 'user13@jb.com', 'USER13', 'user13', '', '', NULL, '', '', '0000-00-00', '', 0, '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 1, NULL),
(12, 1, 1, 'ee11cbb19052e40b07aac0ca060c23ee', 'user7@jb.com', 'user7', 'user7', '', '', NULL, '', '', '0000-00-00', '', 0, '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 0, '09da865d0d9dacba74934028658cfb63'),
(13, 1, 1, 'ee11cbb19052e40b07aac0ca060c23ee', 'user8@jb.com', 'user8', 'user8', '', '', NULL, '', '', '0000-00-00', '', 0, '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 0, '6e54b82b41de9a6a70611066e13960f4'),
(14, 1, 1, 'ee11cbb19052e40b07aac0ca060c23ee', 'user9@jb.com', 'user9', 'user9', '', '', NULL, '', '', '0000-00-00', '', 0, '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 0, '931a4330a1d051cea91eaaa5464c9fda');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_business` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`,`id_business`),
  KEY `id_business` (`id_business`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id`, `id_user`, `id_business`) VALUES
(14, 5, 29);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_article_category`) REFERENCES `m_article_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`id_article_category_pembaca`) REFERENCES `m_article_category_pembaca` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_12` FOREIGN KEY (`id_alasan_jual_bisnis`) REFERENCES `m_alasan_jual_bisnis` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `m_business_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_ibfk_10` FOREIGN KEY (`id_industri`) REFERENCES `m_industri` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `business_ibfk_11` FOREIGN KEY (`id_sub_industri`) REFERENCES `m_sub_industri` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `business_ibfk_5` FOREIGN KEY (`id_provinsi`) REFERENCES `m_provinsi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_ibfk_6` FOREIGN KEY (`id_kota`) REFERENCES `m_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_ibfk_7` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_ibfk_9` FOREIGN KEY (`id_alasan_penolakan`) REFERENCES `m_alasan_penolakan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`id_business`) REFERENCES `business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `email_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_city`
--
ALTER TABLE `m_city`
  ADD CONSTRAINT `m_city_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `m_provinsi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_sub_industri`
--
ALTER TABLE `m_sub_industri`
  ADD CONSTRAINT `m_sub_industri_ibfk_1` FOREIGN KEY (`id_industri`) REFERENCES `m_industri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD CONSTRAINT `newsletter_ibfk_2` FOREIGN KEY (`id_pembuat`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_nationality`) REFERENCES `m_country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_job`) REFERENCES `m_job` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_5` FOREIGN KEY (`id_buyer_price`) REFERENCES `m_range_price` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_7` FOREIGN KEY (`id_buyer_category`) REFERENCES `m_industri` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_8` FOREIGN KEY (`id_buyer_location`) REFERENCES `m_provinsi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`id_business`) REFERENCES `business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
