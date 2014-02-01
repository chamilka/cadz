-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2013 at 07:35 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ceyadz`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `adv_id` int(6) unsigned zerofill NOT NULL DEFAULT '000000',
  `adv_title` varchar(255) NOT NULL,
  `adv_price` double(10,2) NOT NULL,
  `adv_catagory` varchar(50) NOT NULL,
  `adv_img_tmp` varchar(255) NOT NULL,
  `adv_img_path` varchar(255) NOT NULL,
  `adv_img_url` varchar(255) NOT NULL,
  `adv_short_desc` varchar(255) NOT NULL,
  `adv_long_desc` varchar(255) NOT NULL,
  `adv_pub_date` datetime NOT NULL,
  `adv_exp_date` datetime NOT NULL,
  `adv_extensions` int(11) NOT NULL COMMENT 'number of extensions requested. One extension is for two weeks',
  `adv_status` set('Failed','Email Sent','Confirmed','Activated','Expired','Disabled') NOT NULL,
  `pub_name` varchar(255) NOT NULL,
  `pub_email` varchar(255) NOT NULL,
  `pub_phone` varchar(255) NOT NULL,
  `pub_phone_state` varchar(255) NOT NULL,
  `pub_district` varchar(255) NOT NULL,
  `pub_city` varchar(255) NOT NULL,
  `conf_key` varchar(255) NOT NULL,
  `del_key` varchar(255) NOT NULL,
  `upd_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--


-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE IF NOT EXISTS `catagory` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `rel_cat` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name` (`cat_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`cat_id`, `cat_name`, `rel_cat`) VALUES
(1, 'Antiques', ''),
(2, 'Art', ''),
(3, 'Baby', ''),
(4, 'Books', ''),
(5, 'Business & Industrial', ''),
(6, 'Cameras & photos', ''),
(7, 'Cell Phones & Accessories', ''),
(8, 'Clothing, Shoes & Accessories', ''),
(9, 'Computers/ Tablets & Networking', ''),
(10, 'Consumer Electronics', ''),
(11, 'Craft', ''),
(12, 'Dolls & Bears', ''),
(13, 'DVDs & Movies', ''),
(14, 'Vehicles', ''),
(15, 'Health & Beauty', ''),
(16, 'Home & Garden', ''),
(17, 'Jewelry & Watches', ''),
(18, 'Music', ''),
(19, 'Musical Instruments & Gear', ''),
(20, 'Pet Supplies', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_no` varchar(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `department` set('Accounts','Production','Sales','Transport') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_no`, `name`, `email`, `phone`, `gender`, `department`) VALUES
('em001', 'Kamal Karrnaratna', 'kamal@yahoo.coom', '0123456789', 'M', 'Accounts'),
('em002', 'Sajah', 'sajah@gmail.com', '0718110533', 'M', 'Sales'),
('em003', 'Kamla', 'kamal@yahoo.com', '0718456245', 'M', 'Transport'),
('em004', 'Leena', 'leena@yahoo.com', '0778456215', 'F', 'Accounts'),
('em909', '', '', '0777123456', '', 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `files`
--


-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `pub_id` int(11) NOT NULL AUTO_INCREMENT,
  `pub_fname` varchar(255) NOT NULL,
  `pub_lname` varchar(255) NOT NULL,
  `pub_email` varchar(255) NOT NULL,
  `pub_phone1` varchar(255) NOT NULL,
  `pub_phone2` varchar(255) NOT NULL,
  `pub_address` varchar(500) NOT NULL,
  `pub_joined` datetime NOT NULL,
  `pub_status` varchar(255) NOT NULL,
  `pub_rec_email` enum('Y','N') NOT NULL,
  `pub_rec_sms` enum('Y','N') NOT NULL,
  PRIMARY KEY (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `publisher`
--


-- --------------------------------------------------------

--
-- Table structure for table `sub_catagory`
--

CREATE TABLE IF NOT EXISTS `sub_catagory` (
  `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_cat_name` varchar(255) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=262 ;

--
-- Dumping data for table `sub_catagory`
--

INSERT INTO `sub_catagory` (`sub_cat_id`, `sub_cat_name`, `cat_id`) VALUES
(1, 'Antiquities', 1),
(2, 'Architectural & Garden', 1),
(3, 'Asian Antiques', 1),
(4, 'Books & Manuscripts', 1),
(5, 'Decorative Arts', 1),
(6, 'Ethnographic', 1),
(7, 'Furniture', 1),
(8, 'Home & Hearth', 1),
(9, 'Linens & Textiles (Pre-1930)', 1),
(10, 'Maps, Atlases & Globes', 1),
(11, 'Maritime', 1),
(12, 'Mercantile, Trades & Factories', 1),
(13, 'Musical Instruments (Pre-1930)', 1),
(14, 'Periods & Styles', 1),
(15, 'Primitives', 1),
(16, 'Restoration & Care', 1),
(17, 'Rugs & Carpets', 1),
(18, 'Science & Medicine (Pre-1930)', 1),
(19, 'Sewing (Pre-1930)', 1),
(20, 'Silver', 1),
(21, 'Reproduction Antiques', 1),
(22, 'Other', 1),
(23, 'Direct from the Artist', 2),
(24, 'Art from Dealers & Resellers', 2),
(25, 'Wholesale Lots', 2),
(26, 'Baby Gear', 3),
(27, 'Baby Safety & Health', 3),
(28, 'Bathing & Grooming', 3),
(29, 'Car Safety Seats', 3),
(30, 'Diapering', 3),
(31, 'Feeding', 3),
(32, 'Keepsakes & Baby Announcements', 3),
(33, 'Nursery Bedding', 3),
(34, 'Nursery Decor', 3),
(35, 'Nursery Furniture', 3),
(36, 'Potty Training', 3),
(37, 'Strollers', 3),
(38, 'Stroller Accessories', 3),
(39, 'Toys for Baby', 3),
(40, 'Other', 3),
(41, 'Wholesale Lots', 3),
(42, 'Accessories', 4),
(43, 'Antiquarian & Collectible', 4),
(44, 'Audiobooks', 4),
(45, 'Catalogs', 4),
(46, 'Children & Young Adults', 4),
(47, 'Cookbooks', 4),
(48, 'Fiction & Literature', 4),
(49, 'Magazine Back Issues', 4),
(50, 'Nonfiction', 4),
(51, 'Textbooks, Education', 4),
(52, 'Wholesale & Bulk Lots', 4),
(53, 'Other', 4),
(54, 'Agriculture & Forestry', 5),
(55, 'Businesses & Websites for Sale', 5),
(56, 'Construction', 5),
(57, 'Electrical & Test Equipment', 5),
(58, 'Fuel & Energy', 5),
(59, 'Healthcare, Lab & Life Science', 5),
(60, 'Industrial Supply & MRO', 5),
(61, 'Manufacturing & Metalworking', 5),
(62, 'Office', 5),
(63, 'Packing & Shipping', 5),
(64, 'Printing & Graphic Arts', 5),
(65, 'Restaurant & Catering', 5),
(66, 'Retail & Services', 5),
(67, 'Other', 5),
(68, 'Binoculars & Telescopes', 6),
(69, 'Camcorders', 6),
(70, 'Digital Cameras', 6),
(71, 'Camera & Photo Accessories', 6),
(72, 'Digital Photo Frames', 6),
(73, 'Film Photography', 6),
(74, 'Flashes & Flash Accessories', 6),
(75, 'Lenses & Filters', 6),
(76, 'Lighting & Studio', 6),
(77, 'Manuals & Guides', 6),
(78, 'Replacement Parts & Tools', 6),
(79, 'Tripods & Supports', 6),
(80, 'Video Production & Editing', 6),
(81, 'Vintage Movie & Photography', 6),
(82, 'Wholesale Lots', 6),
(83, 'Other', 6),
(84, 'Cell Phones & Smartphones', 7),
(85, 'Cell Phone Accessories', 7),
(86, 'Display Phones', 7),
(87, 'Phone Cards & SIM Cards', 7),
(88, 'Replacement Parts & Tools', 7),
(89, 'Wholesale Lots', 7),
(90, 'Other', 7),
(91, 'Baby & Toddler Clothing', 8),
(92, 'Kids'' Clothing, Shoes & Accs', 8),
(93, 'Costumes, Reenactment, Theater', 8),
(94, 'Cultural & Ethnic Clothing', 8),
(95, 'Dancewear', 8),
(96, 'Men''s Accessories', 8),
(97, 'Men''s Clothing', 8),
(98, 'Men''s Shoes', 8),
(99, 'Uniforms & Work Clothing', 8),
(100, 'Unisex Clothing, Shoes & Accs', 8),
(101, 'Wedding & Formal Occasion', 8),
(102, 'Women''s Accessories', 8),
(103, 'Women''s Clothing', 8),
(104, 'Women''s Handbags & Bags', 8),
(105, 'Women''s Shoes', 8),
(106, 'Vintage', 8),
(107, 'Wholesale, Large & Small Lots', 8),
(108, 'iPads, Tablets & eBook Readers', 9),
(109, 'iPad/Tablet/eBook Accessories', 9),
(110, 'Laptops & Netbooks', 9),
(111, 'Desktops & All-In-Ones', 9),
(112, 'Laptop & Desktop Accessories', 9),
(113, 'Cables & Connectors', 9),
(114, 'Computer Components & Parts', 9),
(115, 'Drives, Storage & Blank Media', 9),
(116, 'Enterprise Networking, Servers', 9),
(117, 'Home Networking & Connectivity', 9),
(118, 'Keyboards, Mice & Pointing', 9),
(119, 'Monitors, Projectors & Accs', 9),
(120, 'Power Protection, Distribution', 9),
(121, 'Printers, Scanners & Supplies', 9),
(122, 'Software', 9),
(123, 'Manuals & Resources', 9),
(124, 'Vintage Computing', 9),
(125, 'Wholesale Lots', 9),
(126, 'Other', 9),
(127, 'Portable Audio & Headphones', 10),
(128, 'TV, Video & Home Audio', 10),
(129, 'Vehicle Electronics & GPS', 10),
(130, 'Home Automation', 10),
(131, 'Home Surveillance', 10),
(132, 'Home Telephones', 10),
(133, 'Multipurpose Batteries & Power', 10),
(134, 'Radio Communication', 10),
(135, 'Gadgets & Other Electronics', 10),
(136, 'Vintage Electronics', 10),
(137, 'Wholesale Lots', 10),
(138, 'Art Supplies', 11),
(139, 'Beads & Jewelry Making', 11),
(140, 'Glass & Mosaics', 11),
(141, 'Handcrafted & Finished Pieces', 11),
(142, 'Home Arts & Crafts', 11),
(143, 'Kids'' Crafts', 11),
(144, 'Multi-Purpose Craft Supplies', 11),
(145, 'Needlecrafts & Yarn', 11),
(146, 'Scrapbooking & Paper Crafts', 11),
(147, 'Sewing & Fabric', 11),
(148, 'Stamping & Embossing', 11),
(149, 'Other Crafts', 11),
(150, 'Wholesale Lots', 11),
(151, 'Bear Making Supplies', 12),
(152, 'Bears', 12),
(153, 'Dolls', 12),
(154, 'Dollhouse Miniatures', 12),
(155, 'Paper Dolls', 12),
(156, 'Wholesale Lots', 12),
(157, 'DVDs & Blu-ray Discs', 13),
(158, 'Film Stock', 13),
(159, 'Laserdiscs', 13),
(160, 'UMDs', 13),
(161, 'VHS Tapes', 13),
(162, 'Other Formats', 13),
(163, 'Storage & Media Accessories', 13),
(164, 'Wholesale Lots', 13),
(165, 'Cars ', 14),
(166, 'SUVs', 14),
(167, 'Vans', 14),
(168, 'Trucks', 14),
(169, 'Buses', 14),
(170, 'Motorcycles', 14),
(171, 'Bicycles', 14),
(172, 'Other Vehicles & Trailers', 14),
(173, 'Boats', 14),
(174, 'Powersports', 14),
(175, 'Parts & Accessories', 14),
(176, 'Bath & Body', 15),
(177, 'Coupons', 15),
(178, 'Dietary Supplements, Nutrition', 15),
(179, 'Fragrances', 15),
(180, 'Hair Care & Salon', 15),
(181, 'Health Care', 15),
(182, 'Makeup', 15),
(183, 'Massage', 15),
(184, 'Medical, Mobility & Disability', 15),
(185, 'Nail Care & Polish', 15),
(186, 'Natural & Homeopathic Remedies', 15),
(187, 'Oral Care', 15),
(188, 'Over-the-Counter Medicine', 15),
(189, 'Shaving & Hair Removal', 15),
(190, 'Skin Care', 15),
(191, 'Tanning Beds & Lamps', 15),
(192, 'Tattoos & Body Art', 15),
(193, 'Vision Care', 15),
(194, 'Weight Management', 15),
(195, 'Wholesale Lots', 15),
(196, 'Other', 15),
(197, 'Bath', 16),
(198, 'Bedding', 16),
(199, 'Food & Beverages', 16),
(200, 'Furniture', 16),
(201, 'Holidays, Cards & Party Supply', 16),
(202, 'Home Decor', 16),
(203, 'Home Improvement', 16),
(204, 'Housekeeping & Organization', 16),
(205, 'Kids & Teens at Home', 16),
(206, 'Kitchen, Dining & Bar', 16),
(207, 'Lamps, Lighting & Ceiling Fans', 16),
(208, 'Major Appliances', 16),
(209, 'Rugs & Carpets', 16),
(210, 'Tools', 16),
(211, 'Window Treatments & Hardware', 16),
(212, 'Yard, Garden & Outdoor Living', 16),
(213, 'Wholesale Lots', 16),
(214, 'Other', 16),
(215, 'Children''s Jewelry', 17),
(216, 'Engagement & Wedding', 17),
(217, 'Ethnic, Regional & Tribal', 17),
(218, 'Fashion Jewelry', 17),
(219, 'Fine Jewelry', 17),
(220, 'Handcrafted, Artisan Jewelry', 17),
(221, 'Jewelry Boxes & Organizers', 17),
(222, 'Jewelry Design & Repair', 17),
(223, 'Loose Beads', 17),
(224, 'Loose Diamonds & Gemstones', 17),
(225, 'Men''s Jewelry', 17),
(226, 'Vintage & Antique Jewelry', 17),
(227, 'Watches', 17),
(228, 'Other', 17),
(229, 'Wholesale Lots', 17),
(230, 'Groups & Bands', 18),
(231, 'CDs', 18),
(232, 'Records', 18),
(233, 'Other Formats', 18),
(234, 'Storage & Media Accessories', 18),
(235, 'Wholesale Lots', 18),
(236, 'Accordion & Concertina', 19),
(237, 'Brass', 19),
(238, 'Electronic Instruments', 19),
(239, 'Equipment', 19),
(240, 'Guitar', 19),
(241, 'Harmonica', 19),
(242, 'Instruction Books, CDs & Video', 19),
(243, 'Karaoke Entertainment', 19),
(244, 'Percussion', 19),
(245, 'Piano & Organ', 19),
(246, 'Pro Audio Equipment', 19),
(247, 'Sheet Music & Song Books', 19),
(248, 'Stage Lighting & Effects', 19),
(249, 'String', 19),
(250, 'Woodwind', 19),
(251, 'Wholesale Lots', 19),
(252, 'Other', 19),
(253, 'Aquarium & Fish', 20),
(254, 'Bird Supplies', 20),
(255, 'Cat Supplies', 20),
(256, 'Dog Supplies', 20),
(257, 'Horse Supplies', 20),
(258, 'Reptile Supplies', 20),
(259, 'Small Animal Supplies', 20),
(260, 'Wholesale Lots', 20),
(261, 'Other', 20);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `cat_name` varchar(255) DEFAULT NULL,
  `sub_cat_name` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`cat_name`, `sub_cat_name`, `cat_id`) VALUES
('Antiques', 'Antiquities', 1),
('Antiques', 'Architectural & Garden', 1),
('Antiques', 'Asian Antiques', 1),
('Antiques', 'Books & Manuscripts', 1),
('Antiques', 'Decorative Arts', 1),
('Antiques', 'Ethnographic', 1),
('Antiques', 'Furniture', 1),
('Antiques', 'Home & Hearth', 1),
('Antiques', 'Linens & Textiles (Pre-1930)', 1),
('Antiques', 'Maps, Atlases & Globes', 1),
('Antiques', 'Maritime', 1),
('Antiques', 'Mercantile, Trades & Factories', 1),
('Antiques', 'Musical Instruments (Pre-1930)', 1),
('Antiques', 'Periods & Styles', 1),
('Antiques', 'Primitives', 1),
('Antiques', 'Restoration & Care', 1),
('Antiques', 'Rugs & Carpets', 1),
('Antiques', 'Science & Medicine (Pre-1930)', 1),
('Antiques', 'Sewing (Pre-1930)', 1),
('Antiques', 'Silver', 1),
('Antiques', 'Reproduction Antiques', 1),
('Antiques', 'Other', 1),
('Art', 'Direct from the Artist', 2),
('Art', 'Art from Dealers & Resellers', 2),
('Art', 'Wholesale Lots', 2),
('Baby', 'Baby Gear', 3),
('Baby', 'Baby Safety & Health', 3),
('Baby', 'Bathing & Grooming', 3),
('Baby', 'Car Safety Seats', 3),
('Baby', 'Diapering', 3),
('Baby', 'Feeding', 3),
('Baby', 'Keepsakes & Baby Announcements', 3),
('Baby', 'Nursery Bedding', 3),
('Baby', 'Nursery Decor', 3),
('Baby', 'Nursery Furniture', 3),
('Baby', 'Potty Training', 3),
('Baby', 'Strollers', 3),
('Baby', 'Stroller Accessories', 3),
('Baby', 'Toys for Baby', 3),
('Baby', 'Other', 3),
('Baby', 'Wholesale Lots', 3),
('Books', 'Accessories', 4),
('Books', 'Antiquarian & Collectible', 4),
('Books', 'Audiobooks', 4),
('Books', 'Catalogs', 4),
('Books', 'Children & Young Adults', 4),
('Books', 'Cookbooks', 4),
('Books', 'Fiction & Literature', 4),
('Books', 'Magazine Back Issues', 4),
('Books', 'Nonfiction', 4),
('Books', 'Textbooks, Education', 4),
('Books', 'Wholesale & Bulk Lots', 4),
('Books', 'Other', 4),
('Business & Industrial', 'Agriculture & Forestry', 5),
('Business & Industrial', 'Businesses & Websites for Sale', 5),
('Business & Industrial', 'Construction', 5),
('Business & Industrial', 'Electrical & Test Equipment', 5),
('Business & Industrial', 'Fuel & Energy', 5),
('Business & Industrial', 'Healthcare, Lab & Life Science', 5),
('Business & Industrial', 'Industrial Supply & MRO', 5),
('Business & Industrial', 'Manufacturing & Metalworking', 5),
('Business & Industrial', 'Office', 5),
('Business & Industrial', 'Packing & Shipping', 5),
('Business & Industrial', 'Printing & Graphic Arts', 5),
('Business & Industrial', 'Restaurant & Catering', 5),
('Business & Industrial', 'Retail & Services', 5),
('Business & Industrial', 'Other', 5),
('Cameras & photos', 'Binoculars & Telescopes', 6),
('Cameras & photos', 'Camcorders', 6),
('Cameras & photos', 'Digital Cameras', 6),
('Cameras & photos', 'Camera & Photo Accessories', 6),
('Cameras & photos', 'Digital Photo Frames', 6),
('Cameras & photos', 'Film Photography', 6),
('Cameras & photos', 'Flashes & Flash Accessories', 6),
('Cameras & photos', 'Lenses & Filters', 6),
('Cameras & photos', 'Lighting & Studio', 6),
('Cameras & photos', 'Manuals & Guides', 6),
('Cameras & photos', 'Replacement Parts & Tools', 6),
('Cameras & photos', 'Tripods & Supports', 6),
('Cameras & photos', 'Video Production & Editing', 6),
('Cameras & photos', 'Vintage Movie & Photography', 6),
('Cameras & photos', 'Wholesale Lots', 6),
('Cameras & photos', 'Other', 6),
('Cell Phones & Accessories', 'Cell Phones & Smartphones', 7),
('Cell Phones & Accessories', 'Cell Phone Accessories', 7),
('Cell Phones & Accessories', 'Display Phones', 7),
('Cell Phones & Accessories', 'Phone Cards & SIM Cards', 7),
('Cell Phones & Accessories', 'Replacement Parts & Tools', 7),
('Cell Phones & Accessories', 'Wholesale Lots', 7),
('Cell Phones & Accessories', 'Other', 7),
('Clothing, Shoes & Accessories', 'Baby & Toddler Clothing', 8),
('Clothing, Shoes & Accessories', 'Kids'' Clothing, Shoes & Accs', 8),
('Clothing, Shoes & Accessories', 'Costumes, Reenactment, Theater', 8),
('Clothing, Shoes & Accessories', 'Cultural & Ethnic Clothing', 8),
('Clothing, Shoes & Accessories', 'Dancewear', 8),
('Clothing, Shoes & Accessories', 'Men''s Accessories', 8),
('Clothing, Shoes & Accessories', 'Men''s Clothing', 8),
('Clothing, Shoes & Accessories', 'Men''s Shoes', 8),
('Clothing, Shoes & Accessories', 'Uniforms & Work Clothing', 8),
('Clothing, Shoes & Accessories', 'Unisex Clothing, Shoes & Accs', 8),
('Clothing, Shoes & Accessories', 'Wedding & Formal Occasion', 8),
('Clothing, Shoes & Accessories', 'Women''s Accessories', 8),
('Clothing, Shoes & Accessories', 'Women''s Clothing', 8),
('Clothing, Shoes & Accessories', 'Women''s Handbags & Bags', 8),
('Clothing, Shoes & Accessories', 'Women''s Shoes', 8),
('Clothing, Shoes & Accessories', 'Vintage', 8),
('Clothing, Shoes & Accessories', 'Wholesale, Large & Small Lots', 8),
('Computers/ Tablets & Networking', 'iPads, Tablets & eBook Readers', 9),
('Computers/ Tablets & Networking', 'iPad/Tablet/eBook Accessories', 9),
('Computers/ Tablets & Networking', 'Laptops & Netbooks', 9),
('Computers/ Tablets & Networking', 'Desktops & All-In-Ones', 9),
('Computers/ Tablets & Networking', 'Laptop & Desktop Accessories', 9),
('Computers/ Tablets & Networking', 'Cables & Connectors', 9),
('Computers/ Tablets & Networking', 'Computer Components & Parts', 9),
('Computers/ Tablets & Networking', 'Drives, Storage & Blank Media', 9),
('Computers/ Tablets & Networking', 'Enterprise Networking, Servers', 9),
('Computers/ Tablets & Networking', 'Home Networking & Connectivity', 9),
('Computers/ Tablets & Networking', 'Keyboards, Mice & Pointing', 9),
('Computers/ Tablets & Networking', 'Monitors, Projectors & Accs', 9),
('Computers/ Tablets & Networking', 'Power Protection, Distribution', 9),
('Computers/ Tablets & Networking', 'Printers, Scanners & Supplies', 9),
('Computers/ Tablets & Networking', 'Software', 9),
('Computers/ Tablets & Networking', 'Manuals & Resources', 9),
('Computers/ Tablets & Networking', 'Vintage Computing', 9),
('Computers/ Tablets & Networking', 'Wholesale Lots', 9),
('Computers/ Tablets & Networking', 'Other', 9),
('Consumer Electronics', 'Portable Audio & Headphones', 10),
('Consumer Electronics', 'TV, Video & Home Audio', 10),
('Consumer Electronics', 'Vehicle Electronics & GPS', 10),
('Consumer Electronics', 'Home Automation', 10),
('Consumer Electronics', 'Home Surveillance', 10),
('Consumer Electronics', 'Home Telephones', 10),
('Consumer Electronics', 'Multipurpose Batteries & Power', 10),
('Consumer Electronics', 'Radio Communication', 10),
('Consumer Electronics', 'Gadgets & Other Electronics', 10),
('Consumer Electronics', 'Vintage Electronics', 10),
('Consumer Electronics', 'Wholesale Lots', 10),
('Craft', 'Art Supplies', 11),
('Craft', 'Beads & Jewelry Making', 11),
('Craft', 'Glass & Mosaics', 11),
('Craft', 'Handcrafted & Finished Pieces', 11),
('Craft', 'Home Arts & Crafts', 11),
('Craft', 'Kids'' Crafts', 11),
('Craft', 'Multi-Purpose Craft Supplies', 11),
('Craft', 'Needlecrafts & Yarn', 11),
('Craft', 'Scrapbooking & Paper Crafts', 11),
('Craft', 'Sewing & Fabric', 11),
('Craft', 'Stamping & Embossing', 11),
('Craft', 'Other Crafts', 11),
('Craft', 'Wholesale Lots', 11),
('Dolls & Bears', 'Bear Making Supplies', 12),
('Dolls & Bears', 'Bears', 12),
('Dolls & Bears', 'Dolls', 12),
('Dolls & Bears', 'Dollhouse Miniatures', 12),
('Dolls & Bears', 'Paper Dolls', 12),
('Dolls & Bears', 'Wholesale Lots', 12),
('DVDs & Movies', 'DVDs & Blu-ray Discs', 13),
('DVDs & Movies', 'Film Stock', 13),
('DVDs & Movies', 'Laserdiscs', 13),
('DVDs & Movies', 'UMDs', 13),
('DVDs & Movies', 'VHS Tapes', 13),
('DVDs & Movies', 'Other Formats', 13),
('DVDs & Movies', 'Storage & Media Accessories', 13),
('DVDs & Movies', 'Wholesale Lots', 13),
('Vehicles', 'Cars ', 14),
('Vehicles', 'SUVs', 14),
('Vehicles', 'Vans', 14),
('Vehicles', 'Trucks', 14),
('Vehicles', 'Buses', 14),
('Vehicles', 'Motorcycles', 14),
('Vehicles', 'Bicycles', 14),
('Vehicles', 'Other Vehicles & Trailers', 14),
('Vehicles', 'Boats', 14),
('Vehicles', 'Powersports', 14),
('Vehicles', 'Parts & Accessories', 14),
('Health & Beauty', 'Bath & Body', 15),
('Health & Beauty', 'Coupons', 15),
('Health & Beauty', 'Dietary Supplements, Nutrition', 15),
('Health & Beauty', 'Fragrances', 15),
('Health & Beauty', 'Hair Care & Salon', 15),
('Health & Beauty', 'Health Care', 15),
('Health & Beauty', 'Makeup', 15),
('Health & Beauty', 'Massage', 15),
('Health & Beauty', 'Medical, Mobility & Disability', 15),
('Health & Beauty', 'Nail Care & Polish', 15),
('Health & Beauty', 'Natural & Homeopathic Remedies', 15),
('Health & Beauty', 'Oral Care', 15),
('Health & Beauty', 'Over-the-Counter Medicine', 15),
('Health & Beauty', 'Shaving & Hair Removal', 15),
('Health & Beauty', 'Skin Care', 15),
('Health & Beauty', 'Tanning Beds & Lamps', 15),
('Health & Beauty', 'Tattoos & Body Art', 15),
('Health & Beauty', 'Vision Care', 15),
('Health & Beauty', 'Weight Management', 15),
('Health & Beauty', 'Wholesale Lots', 15),
('Health & Beauty', 'Other', 15),
('Home & Garden', 'Bath', 16),
('Home & Garden', 'Bedding', 16),
('Home & Garden', 'Food & Beverages', 16),
('Home & Garden', 'Furniture', 16),
('Home & Garden', 'Holidays, Cards & Party Supply', 16),
('Home & Garden', 'Home Decor', 16),
('Home & Garden', 'Home Improvement', 16),
('Home & Garden', 'Housekeeping & Organization', 16),
('Home & Garden', 'Kids & Teens at Home', 16),
('Home & Garden', 'Kitchen, Dining & Bar', 16),
('Home & Garden', 'Lamps, Lighting & Ceiling Fans', 16),
('Home & Garden', 'Major Appliances', 16),
('Home & Garden', 'Rugs & Carpets', 16),
('Home & Garden', 'Tools', 16),
('Home & Garden', 'Window Treatments & Hardware', 16),
('Home & Garden', 'Yard, Garden & Outdoor Living', 16),
('Home & Garden', 'Wholesale Lots', 16),
('Home & Garden', 'Other', 16),
('Jewelry & Watches', 'Children''s Jewelry', 17),
('Jewelry & Watches', 'Engagement & Wedding', 17),
('Jewelry & Watches', 'Ethnic, Regional & Tribal', 17),
('Jewelry & Watches', 'Fashion Jewelry', 17),
('Jewelry & Watches', 'Fine Jewelry', 17),
('Jewelry & Watches', 'Handcrafted, Artisan Jewelry', 17),
('Jewelry & Watches', 'Jewelry Boxes & Organizers', 17),
('Jewelry & Watches', 'Jewelry Design & Repair', 17),
('Jewelry & Watches', 'Loose Beads', 17),
('Jewelry & Watches', 'Loose Diamonds & Gemstones', 17),
('Jewelry & Watches', 'Men''s Jewelry', 17),
('Jewelry & Watches', 'Vintage & Antique Jewelry', 17),
('Jewelry & Watches', 'Watches', 17),
('Jewelry & Watches', 'Other', 17),
('Jewelry & Watches', 'Wholesale Lots', 17),
('Music', 'Groups & Bands', 18),
('Music', 'CDs', 18),
('Music', 'Records', 18),
('Music', 'Other Formats', 18),
('Music', 'Storage & Media Accessories', 18),
('Music', 'Wholesale Lots', 18),
('Musical Instruments & Gear', 'Accordion & Concertina', 19),
('Musical Instruments & Gear', 'Brass', 19),
('Musical Instruments & Gear', 'Electronic Instruments', 19),
('Musical Instruments & Gear', 'Equipment', 19),
('Musical Instruments & Gear', 'Guitar', 19),
('Musical Instruments & Gear', 'Harmonica', 19),
('Musical Instruments & Gear', 'Instruction Books, CDs & Video', 19),
('Musical Instruments & Gear', 'Karaoke Entertainment', 19),
('Musical Instruments & Gear', 'Percussion', 19),
('Musical Instruments & Gear', 'Piano & Organ', 19),
('Musical Instruments & Gear', 'Pro Audio Equipment', 19),
('Musical Instruments & Gear', 'Sheet Music & Song Books', 19),
('Musical Instruments & Gear', 'Stage Lighting & Effects', 19),
('Musical Instruments & Gear', 'String', 19),
('Musical Instruments & Gear', 'Woodwind', 19),
('Musical Instruments & Gear', 'Wholesale Lots', 19),
('Musical Instruments & Gear', 'Other', 19),
('Pet Supplies', 'Aquarium & Fish', 20),
('Pet Supplies', 'Bird Supplies', 20),
('Pet Supplies', 'Cat Supplies', 20),
('Pet Supplies', 'Dog Supplies', 20),
('Pet Supplies', 'Horse Supplies', 20),
('Pet Supplies', 'Reptile Supplies', 20),
('Pet Supplies', 'Small Animal Supplies', 20),
('Pet Supplies', 'Wholesale Lots', 20),
('Pet Supplies', 'Other', 20);

-- --------------------------------------------------------

--
-- Table structure for table `temp_adv`
--

CREATE TABLE IF NOT EXISTS `temp_adv` (
  `adv_id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `adv_title` varchar(255) NOT NULL,
  `adv_price` double(10,2) NOT NULL,
  `adv_catagory` varchar(50) NOT NULL,
  `adv_img_tmp` varchar(255) NOT NULL,
  `adv_img_path` varchar(255) NOT NULL,
  `adv_img_url` varchar(255) NOT NULL,
  `adv_short_desc` varchar(255) NOT NULL,
  `adv_long_desc` varchar(255) NOT NULL,
  `adv_sub_date` datetime NOT NULL,
  `adv_exp_date` datetime NOT NULL,
  `adv_extensions` int(11) NOT NULL COMMENT 'number of extensions requested. One extension is for two weeks',
  `adv_status` set('Failed','Email Sent','Confirmed','Activated','Expired','Disabled') NOT NULL,
  `pub_name` varchar(255) NOT NULL,
  `pub_email` varchar(255) NOT NULL,
  `pub_phone` varchar(255) NOT NULL,
  `pub_phone_state` varchar(255) NOT NULL,
  `pub_district` varchar(255) NOT NULL,
  `pub_city` varchar(255) NOT NULL,
  `conf_key` varchar(255) NOT NULL,
  `del_key` varchar(255) NOT NULL,
  `upd_key` varchar(255) NOT NULL,
  PRIMARY KEY (`adv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `temp_adv`
--

INSERT INTO `temp_adv` (`adv_id`, `adv_title`, `adv_price`, `adv_catagory`, `adv_img_tmp`, `adv_img_path`, `adv_img_url`, `adv_short_desc`, `adv_long_desc`, `adv_sub_date`, `adv_exp_date`, `adv_extensions`, `adv_status`, `pub_name`, `pub_email`, `pub_phone`, `pub_phone_state`, `pub_district`, `pub_city`, `conf_key`, `del_key`, `upd_key`) VALUES
(000020, 'Title 1', 30000.00, '', '521517', '', '', ',Short Description 1', 'Full description about the advertisement', '2013-03-10 11:27:28', '2013-03-24 11:27:28', 0, 'Failed', 'chamilka', 'chamilka.jayarathna@gmail.com', '0779890166', 'n', 'Kegalle', '', 'f96bf437f44c3fd4b8a102d10f1e96d0', '20f2293dd67421fdea57bba9190d08b0', '7ed1d7cc1503745487cdaa2c2a368132'),
(000021, 'bla bla', 265000.00, '', '831826', '', '', ',sfsgfh hfhj jgjg ,sfdhgj hkhkhkh', 'sdgfvj  tugkh  yryg,n  gtjy  ', '2013-03-10 15:32:14', '2013-03-24 15:32:14', 0, 'Email Sent', 'afsgfdg ljljl', 'adsf@dgdg.com', '0112123456', 'n', 'cmb', '', '04991e1b6d307e9333902d079841e11d', '536925b0532459a5cee8bdc99f986c34', '0bee7bc3a0214c358392134f61081085'),
(000022, 'Test3', 25000.00, '0', '971655', '', '', ',New,HD display 10"', 'This is a brand new item. ', '2013-04-13 07:40:05', '0000-00-00 00:00:00', 0, 'Email Sent', 'Chamilka', 'chamilka.jayarathna@gmail.com', '0779890166', 'n', 'Kegalle', '', 'a15bc5832ad7c16e8f5e0cddfc4bfcc0', 'f36c97d189643bb276c33ed2b810e605', '633185bd4f074bfeb06f1c513b0e1ce8'),
(000023, 'Test3', 25000.00, '0', '971655', '', '', ',New,HD display 10"', 'This is a brand new item. ', '2013-04-13 07:41:02', '0000-00-00 00:00:00', 0, '', 'Chamilka', 'chamilka.jayarathna@gmail.com', '0779890166', 'n', 'Kegalle', '', '7883dcec44806bf7c83f64e4aeea5efe', '04079c08194612298d8a6e3fad5bfd2f', 'dca5ef379cf50a20ddcd147197be417e');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` set('admin','user','disabled') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `status`) VALUES
(1, 'chamilka', 'e99a18c428cb38d5f260853678922e03', 'admin');
