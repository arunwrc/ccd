-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2014 at 01:31 AM
-- Server version: 5.5.35-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grizanz_sma`
--

-- --------------------------------------------------------

--
-- Table structure for table `billers`
--

CREATE TABLE IF NOT EXISTS `billers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `postal_code` varchar(8) NOT NULL,
  `country` varchar(55) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `invoice_footer` varchar(1000) NOT NULL,
  `cf1` varchar(100) DEFAULT NULL,
  `cf2` varchar(100) DEFAULT NULL,
  `cf3` varchar(100) DEFAULT NULL,
  `cf4` varchar(100) DEFAULT NULL,
  `cf5` varchar(100) DEFAULT NULL,
  `cf6` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `billers`
--

INSERT INTO `billers` (`id`, `name`, `company`, `address`, `city`, `state`, `postal_code`, `country`, `phone`, `email`, `logo`, `invoice_footer`, `cf1`, `cf2`, `cf3`, `cf4`, `cf5`, `cf6`) VALUES
(1, 'Arun Minto', 'Grizano Labs', 'No. 1, Street 1, Black A, My Condo ', 'Kuala Lumpur', 'WP', '58100', 'Malaysia', '0123456789', 'info@grizano.com', 'logo.png', 'Thank you for your business!', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `date` date NOT NULL,
  `data` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `code`, `name`) VALUES
(1, 'C1', 'Category 1'),
(2, 'GAD001', 'Gadgets'),
(3, 'APP_01', 'Apparels');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment`) VALUES
('&lt;h3&gt;Thank you for Purchasing&lt;/h3&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `postal_code` varchar(8) NOT NULL,
  `country` varchar(55) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cf1` varchar(100) DEFAULT NULL,
  `cf2` varchar(100) DEFAULT NULL,
  `cf3` varchar(100) DEFAULT NULL,
  `cf4` varchar(100) DEFAULT NULL,
  `cf5` varchar(100) DEFAULT NULL,
  `cf6` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `company`, `address`, `city`, `state`, `postal_code`, `country`, `phone`, `email`, `cf1`, `cf2`, `cf3`, `cf4`, `cf5`, `cf6`) VALUES
(1, 'Test Customer', 'Customer Company Name', 'Customer Address', 'Petaling Jaya', 'Selangor', '46000', 'Malaysia', '0123456789', 'customer@grizano.com', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `damage_products`
--

CREATE TABLE IF NOT EXISTS `damage_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `date_format`
--

CREATE TABLE IF NOT EXISTS `date_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `js` varchar(20) NOT NULL,
  `php` varchar(20) NOT NULL,
  `sql` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `date_format`
--

INSERT INTO `date_format` (`id`, `js`, `php`, `sql`) VALUES
(1, 'mm-dd-yyyy', 'm-d-Y', '%m-%d-%Y'),
(2, 'mm/dd/yyyy', 'm/d/Y', '%m/%d/%Y'),
(3, 'dd-mm-yyyy', 'd-m-Y', '%d-%m-%Y'),
(4, 'dd/mm/yyyy', 'd/m/Y', '%d/%m/%Y');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE IF NOT EXISTS `deliveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `customer` varchar(55) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `date`, `time`, `reference_no`, `customer`, `address`, `note`, `user`, `updated_by`) VALUES
(1, '2014-02-11', '01:45 AM', 'SL-0008', 'Test Customer', 'Customer Address Petaling Jaya Selangor 46000 Malaysia. \nTel: 0123456789', '', 'Sethu Raman', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `discount` decimal(4,2) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `discount`, `type`) VALUES
(1, 'No Discount', '0.00', '2'),
(2, '2.5 Percent', '2.50', '1'),
(3, '5 Percent', '5.00', '1'),
(4, '10 Percent', '10.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'owner', 'Owner'),
(2, 'admin', 'Administrator'),
(3, 'purchaser', 'Purchasing Staff'),
(4, 'salesman', 'Sales Staff'),
(5, 'viewer', 'View Only User');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_types`
--

CREATE TABLE IF NOT EXISTS `invoice_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `type` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(11, '´×f', 'sales@grizano.com', 1392055361),
(10, '´×f', 'sales@grizano.com', 1392055328);

-- --------------------------------------------------------

--
-- Table structure for table `pos_settings`
--

CREATE TABLE IF NOT EXISTS `pos_settings` (
  `pos_id` int(1) NOT NULL,
  `cat_limit` int(11) NOT NULL,
  `pro_limit` int(11) NOT NULL,
  `default_category` int(11) NOT NULL,
  `default_customer` int(11) NOT NULL,
  `default_biller` int(11) NOT NULL,
  `display_time` varchar(3) NOT NULL DEFAULT 'yes',
  `cf_title1` varchar(255) DEFAULT NULL,
  `cf_title2` varchar(255) DEFAULT NULL,
  `cf_value1` varchar(255) DEFAULT NULL,
  `cf_value2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pos_settings`
--

INSERT INTO `pos_settings` (`pos_id`, `cat_limit`, `pro_limit`, `default_category`, `default_customer`, `default_biller`, `display_time`, `cf_title1`, `cf_title2`, `cf_value1`, `cf_value2`) VALUES
(1, 22, 30, 1, 1, 1, 'yes', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` char(255) NOT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `size` varchar(55) NOT NULL,
  `um` varchar(55) DEFAULT NULL,
  `cost` decimal(25,2) DEFAULT NULL,
  `price` decimal(25,2) NOT NULL,
  `alert_quantity` int(11) NOT NULL DEFAULT '20',
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `cf1` varchar(255) DEFAULT NULL,
  `cf2` varchar(255) DEFAULT NULL,
  `cf3` varchar(255) DEFAULT NULL,
  `cf4` varchar(255) DEFAULT NULL,
  `cf5` varchar(255) DEFAULT NULL,
  `cf6` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `unit`, `size`, `um`, `cost`, `price`, `alert_quantity`, `image`, `category_id`, `subcategory_id`, `cf1`, `cf2`, `cf3`, `cf4`, `cf5`, `cf6`) VALUES
(1, '001', 'telefono', 'pza', '1', NULL, '10.00', '60.00', 5, 'no_image.jpg', 1, 0, '', '', '', '', '', ''),
(2, 'IPOD_001', 'Ipod Touch 7th Generation', 'box', '', NULL, '12000.00', '13000.00', 10, 'ipodnano7g_0-100007990-gallery.jpg', 2, 0, '', '', '', '', '', ''),
(3, 'GAD002', 'Blacberry Q5', 'box', '', NULL, '18000.00', '19000.00', 5, 'Q5_Pink_Gen_ENG_Front.jpg', 2, 0, '', '', '', '', '', ''),
(4, 'APP_04', 'Rayban Aviator', 'box', '', NULL, '5000.00', '6500.00', 10, 'rayban.png', 3, 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(55) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(55) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(1000) NOT NULL,
  `total` decimal(25,2) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `reference_no`, `warehouse_id`, `supplier_id`, `supplier_name`, `date`, `note`, `total`, `user`, `updated_by`) VALUES
(1, 'PO-0001', 1, 1, 'Test Supplier', '2014-02-09', '', '1100.00', 'ARUN MINTO ', NULL),
(2, 'PO-0002', 1, 1, 'Test Supplier', '2014-02-09', '', '900000.00', 'ARUN MINTO ', NULL),
(3, 'PO-0003', 1, 1, 'Test Supplier', '2014-02-10', '', '1350000.00', 'Sethu Raman', NULL),
(4, 'PO-0004', 2, 1, 'Test Supplier', '2014-02-10', '', '108000.00', 'Sethu Raman', NULL),
(5, 'PO-0005', 2, 1, 'Test Supplier', '2014-02-11', '', '60000.00', 'Sethu Raman', NULL),
(6, 'PO-0006', 2, 1, 'Test Supplier', '2014-02-11', '', '225000.00', 'ARUN MINTO ', NULL),
(7, 'PO-0006', 2, 1, 'Test Supplier', '2014-02-11', '', '225000.00', 'ARUN MINTO ', NULL),
(8, 'PO-0008', 1, 1, 'Test Supplier', '2014-02-11', '', '5000.00', 'ARUN MINTO ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE IF NOT EXISTS `purchase_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `tax_amount` decimal(25,2) DEFAULT NULL,
  `gross_total` decimal(25,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_id`, `product_id`, `product_code`, `product_name`, `quantity`, `unit_price`, `tax_amount`, `gross_total`) VALUES
(1, 1, 1, '001', 'telefono', 110, '10.00', NULL, '1100.00'),
(2, 2, 2, 'IPOD_001', 'Ipod Touch 7th Generation', 75, '12000.00', NULL, '900000.00'),
(3, 3, 3, 'GAD002', 'Blacberry Q5', 75, '18000.00', NULL, '1350000.00'),
(4, 4, 2, 'IPOD_001', 'Ipod Touch 7th Generation', 9, '12000.00', NULL, '108000.00'),
(5, 5, 4, 'APP_04', 'Rayban Aviator', 12, '5000.00', NULL, '60000.00'),
(6, 6, 4, 'APP_04', 'Rayban Aviator', 45, '5000.00', NULL, '225000.00'),
(7, 7, 4, 'APP_04', 'Rayban Aviator', 45, '5000.00', NULL, '225000.00'),
(8, 8, 4, 'APP_04', 'Rayban Aviator', 1, '5000.00', NULL, '5000.00');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(55) NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `biller_id` int(11) NOT NULL,
  `biller_name` varchar(55) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(55) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `internal_note` varchar(1000) DEFAULT NULL,
  `inv_total` decimal(25,2) NOT NULL,
  `total_tax` decimal(25,2) DEFAULT NULL,
  `total` decimal(25,2) NOT NULL,
  `invoice_type` int(11) DEFAULT NULL,
  `in_type` varchar(55) DEFAULT NULL,
  `total_tax2` decimal(25,2) DEFAULT NULL,
  `tax_rate2_id` int(11) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `inv_discount` decimal(25,2) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quote_items`
--

CREATE TABLE IF NOT EXISTS `quote_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(55) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(50) NOT NULL,
  `tax_rate_id` int(11) DEFAULT NULL,
  `tax` varchar(55) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `gross_total` decimal(25,2) NOT NULL,
  `val_tax` decimal(25,2) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `discount_val` decimal(25,2) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `discount` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(55) NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `biller_id` int(11) NOT NULL,
  `biller_name` varchar(55) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(55) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `internal_note` varchar(1000) DEFAULT NULL,
  `inv_total` decimal(25,2) NOT NULL,
  `total_tax` decimal(25,2) DEFAULT NULL,
  `total` decimal(25,2) NOT NULL,
  `invoice_type` int(11) DEFAULT NULL,
  `in_type` varchar(55) DEFAULT NULL,
  `total_tax2` decimal(25,2) DEFAULT NULL,
  `tax_rate2_id` int(11) DEFAULT NULL,
  `inv_discount` decimal(25,2) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `paid_by` varchar(55) DEFAULT 'cash',
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `reference_no`, `warehouse_id`, `biller_id`, `biller_name`, `customer_id`, `customer_name`, `date`, `note`, `internal_note`, `inv_total`, `total_tax`, `total`, `invoice_type`, `in_type`, `total_tax2`, `tax_rate2_id`, `inv_discount`, `discount_id`, `user`, `updated_by`, `paid_by`, `count`) VALUES
(1, 'SL-0001', 1, 1, 'Mian Saleem', 1, 'Test Customer', '2013-08-21', NULL, NULL, '60.00', '14.40', '76.14', NULL, NULL, '3.60', 3, '1.86', 0, 'Owner Owner', NULL, 'cash', 3),
(2, 'SL-0002', 1, 1, 'Mian Saleem', 1, 'Test Customer', '2013-08-21', NULL, NULL, '40.00', '9.60', '50.76', NULL, NULL, '2.40', 3, '1.24', 0, 'Owner Owner', NULL, 'cash', 2),
(3, 'SL-0003', 1, 1, 'Mian Saleem', 1, 'Test Customer', '2013-08-21', NULL, NULL, '100.00', '24.00', '126.90', NULL, NULL, '6.00', 3, '3.10', 0, 'Owner Owner', NULL, 'cash', 5),
(4, 'SL-0004', 1, 1, 'Mian Saleem', 1, 'Test Customer', '2014-02-09', NULL, NULL, '180.00', '43.20', '228.42', NULL, NULL, '10.80', 3, '5.58', 0, 'Owner Owner', NULL, 'cash', 3),
(5, 'SL-0005', 1, 1, 'Arun Minto', 1, 'Test Customer', '2014-02-09', NULL, NULL, '360.00', '86.40', '456.84', NULL, NULL, '21.60', 3, '11.16', 0, 'ARUN MINTO ', NULL, 'cash', 6),
(6, 'SL-0006', 1, 1, 'Arun Minto', 1, 'Test Customer', '2014-02-09', NULL, NULL, '480.00', '115.20', '609.12', NULL, NULL, '28.80', 3, '14.88', 0, 'ARUN MINTO ', NULL, 'cash', 8),
(7, 'SL-0007', 1, 1, 'Arun Minto', 1, 'Test Customer', '2014-02-10', NULL, NULL, '26000.00', '6240.00', '32994.00', NULL, NULL, '1560.00', 3, '806.00', 0, 'ARUN MINTO ', NULL, 'cash', 2),
(8, 'SL-0008', 1, 1, 'Arun Minto', 1, 'Test Customer', '2014-02-11', NULL, NULL, '32000.00', '7680.00', '40608.00', NULL, NULL, '1920.00', 3, '992.00', 0, 'ARUN MINTO ', NULL, 'cash', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE IF NOT EXISTS `sale_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(55) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(50) NOT NULL,
  `tax_rate_id` int(11) DEFAULT NULL,
  `tax` varchar(55) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `gross_total` decimal(25,2) NOT NULL,
  `val_tax` decimal(25,2) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `discount_val` decimal(25,2) DEFAULT NULL,
  `discount` varchar(55) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `product_code`, `product_name`, `product_unit`, `tax_rate_id`, `tax`, `quantity`, `unit_price`, `gross_total`, `val_tax`, `serial_no`, `discount_val`, `discount`, `discount_id`) VALUES
(1, 1, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '', '0.62', '2.50%', 2),
(2, 1, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '', '0.62', '2.50%', 2),
(3, 1, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '', '0.62', '2.50%', 2),
(4, 2, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '', '0.62', '2.50%', 2),
(5, 2, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '', '0.62', '2.50%', 2),
(6, 3, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '', '0.62', '2.50%', 2),
(7, 3, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '', '0.62', '2.50%', 2),
(8, 3, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '', '0.62', '2.50%', 2),
(9, 3, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '', '0.62', '2.50%', 2),
(10, 3, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '', '0.62', '2.50%', 2),
(11, 4, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '60.00', '60.00', '14.40', '', '1.86', '2.50%', 2),
(12, 4, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '60.00', '60.00', '14.40', '', '1.86', '2.50%', 2),
(13, 4, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '60.00', '60.00', '14.40', '', '1.86', '2.50%', 2),
(14, 5, 1, '001', 'telefono', 'pza', 2, '24.00%', 6, '60.00', '360.00', '86.40', '', '11.16', '2.50%', 2),
(15, 6, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '60.00', '60.00', '14.40', '', '1.86', '2.50%', 2),
(16, 6, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '60.00', '60.00', '14.40', '', '1.86', '2.50%', 2),
(17, 6, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '60.00', '60.00', '14.40', '', '1.86', '2.50%', 2),
(18, 6, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '60.00', '60.00', '14.40', '', '1.86', '2.50%', 2),
(19, 6, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '60.00', '60.00', '14.40', '', '1.86', '2.50%', 2),
(20, 6, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '60.00', '60.00', '14.40', '', '1.86', '2.50%', 2),
(21, 6, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '60.00', '60.00', '14.40', '', '1.86', '2.50%', 2),
(22, 6, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '60.00', '60.00', '14.40', '', '1.86', '2.50%', 2),
(23, 7, 2, 'IPOD_001', 'Ipod Touch 7th Generation', 'box', 2, '24.00%', 1, '13000.00', '13000.00', '3120.00', '', '403.00', '2.50%', 2),
(24, 7, 2, 'IPOD_001', 'Ipod Touch 7th Generation', 'box', 2, '24.00%', 1, '13000.00', '13000.00', '3120.00', '', '403.00', '2.50%', 2),
(25, 8, 2, 'IPOD_001', 'Ipod Touch 7th Generation', 'box', 2, '24.00%', 1, '13000.00', '13000.00', '3120.00', '', '403.00', '2.50%', 2),
(26, 8, 3, 'GAD002', 'Blacberry Q5', 'box', 2, '24.00%', 1, '19000.00', '19000.00', '4560.00', '', '589.00', '2.50%', 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(1) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `logo2` varchar(255) NOT NULL,
  `site_name` varchar(55) NOT NULL,
  `language` varchar(20) NOT NULL,
  `default_warehouse` int(2) NOT NULL,
  `currency_prefix` varchar(3) NOT NULL,
  `default_invoice_type` int(2) NOT NULL,
  `default_tax_rate` int(2) NOT NULL,
  `rows_per_page` int(2) NOT NULL,
  `no_of_rows` int(2) NOT NULL,
  `total_rows` int(2) NOT NULL,
  `version` varchar(5) NOT NULL DEFAULT '1.2',
  `default_tax_rate2` int(11) NOT NULL DEFAULT '0',
  `dateformat` int(11) NOT NULL,
  `sales_prefix` varchar(20) NOT NULL,
  `quote_prefix` varchar(55) NOT NULL,
  `purchase_prefix` varchar(55) NOT NULL,
  `transfer_prefix` varchar(55) NOT NULL,
  `barcode_symbology` varchar(20) NOT NULL,
  `theme` varchar(20) NOT NULL,
  `product_serial` tinyint(4) NOT NULL,
  `default_discount` int(11) NOT NULL,
  `discount_option` tinyint(4) NOT NULL,
  `discount_method` tinyint(4) NOT NULL,
  `tax1` tinyint(4) NOT NULL,
  `tax2` tinyint(4) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `logo`, `logo2`, `site_name`, `language`, `default_warehouse`, `currency_prefix`, `default_invoice_type`, `default_tax_rate`, `rows_per_page`, `no_of_rows`, `total_rows`, `version`, `default_tax_rate2`, `dateformat`, `sales_prefix`, `quote_prefix`, `purchase_prefix`, `transfer_prefix`, `barcode_symbology`, `theme`, `product_serial`, `default_discount`, `discount_option`, `discount_method`, `tax1`, `tax2`) VALUES
(1, 'header_logo.png', 'login_logo.png', 'Grizano Labs | Point of Sale', 'english', 1, 'INR', 2, 2, 10, 9, 30, '2.0', 3, 3, 'SL', 'QU', 'PO', 'TR', 'code128', 'blue', 1, 2, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `code` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `code`, `name`) VALUES
(1, 2, 'Gad_01', 'mobiles'),
(2, 3, 'App_0_1', 'shades');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `postal_code` varchar(8) NOT NULL,
  `country` varchar(55) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cf1` varchar(100) DEFAULT NULL,
  `cf2` varchar(100) DEFAULT NULL,
  `cf3` varchar(100) DEFAULT NULL,
  `cf4` varchar(100) DEFAULT NULL,
  `cf5` varchar(100) DEFAULT NULL,
  `cf6` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `company`, `address`, `city`, `state`, `postal_code`, `country`, `phone`, `email`, `cf1`, `cf2`, `cf3`, `cf4`, `cf5`, `cf6`) VALUES
(1, 'Test Supplier', 'Supplier Company Name', 'Supplier Address', 'Petaling Jaya', 'Selangor', '46050', 'Malaysia', '0123456789', 'supplier@tecdiary.com', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `suspended_bills`
--

CREATE TABLE IF NOT EXISTS `suspended_bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `tax1` float(25,2) DEFAULT NULL,
  `tax2` float(25,2) DEFAULT NULL,
  `discount` decimal(25,2) DEFAULT NULL,
  `inv_total` decimal(25,2) NOT NULL,
  `total` float(25,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suspended_bills`
--

INSERT INTO `suspended_bills` (`id`, `date`, `customer_id`, `count`, `tax1`, `tax2`, `discount`, `inv_total`, `total`) VALUES
(1, '2013-08-22', 1, 8, 182.40, 45.60, '23.56', '760.00', 964.44);

-- --------------------------------------------------------

--
-- Table structure for table `suspended_items`
--

CREATE TABLE IF NOT EXISTS `suspended_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suspend_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(55) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(50) DEFAULT NULL,
  `tax_rate_id` int(11) DEFAULT NULL,
  `tax` varchar(55) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `gross_total` decimal(25,2) NOT NULL,
  `val_tax` decimal(25,2) DEFAULT NULL,
  `discount` varchar(55) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `discount_val` decimal(25,2) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `suspended_items`
--

INSERT INTO `suspended_items` (`id`, `suspend_id`, `product_id`, `product_code`, `product_name`, `product_unit`, `tax_rate_id`, `tax`, `quantity`, `unit_price`, `gross_total`, `val_tax`, `discount`, `discount_id`, `discount_val`, `serial_no`) VALUES
(1, 1, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '2.50%', 2, '0.62', ''),
(2, 1, 1, '001', 'telefono', 'pza', 2, '24.00%', 1, '20.00', '20.00', '4.80', '2.50%', 2, '0.62', ''),
(3, 1, 1, '001', 'telefono', 'pza', 2, '24.00%', 6, '120.00', '720.00', '172.80', '2.50%', 2, '22.32', '');

-- --------------------------------------------------------

--
-- Table structure for table `tax_rates`
--

CREATE TABLE IF NOT EXISTS `tax_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `rate` decimal(4,2) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tax_rates`
--

INSERT INTO `tax_rates` (`id`, `name`, `rate`, `type`) VALUES
(1, 'No Tax', '0.00', '2'),
(2, 'VAT', '24.00', '1'),
(3, 'GST', '6.00', '1'),
(4, 'PVM', '21.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE IF NOT EXISTS `transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_no` varchar(55) NOT NULL,
  `date` date NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `from_warehouse_code` varchar(55) NOT NULL,
  `from_warehouse_name` varchar(55) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `to_warehouse_code` varchar(55) NOT NULL,
  `to_warehouse_name` varchar(55) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `transfer_no`, `date`, `from_warehouse_id`, `from_warehouse_code`, `from_warehouse_name`, `to_warehouse_id`, `to_warehouse_code`, `to_warehouse_name`, `note`, `user`) VALUES
(1, 'TR-0001', '2014-02-10', 1, 'WHI', 'Warehouse 1', 2, 'WHII', 'Warehouse 2', '&lt;p&gt;\n   transfered\n&lt;/p&gt;', 'ARUN MINTO '),
(2, 'TR-0002', '2014-02-11', 1, 'WHI', 'Warehouse 1 Kadavantra', 2, 'WHII', 'Warehouse 2 Kakkanad', '', 'Sethu Raman');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_items`
--

CREATE TABLE IF NOT EXISTS `transfer_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(55) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transfer_items`
--

INSERT INTO `transfer_items` (`id`, `transfer_id`, `product_id`, `product_code`, `product_name`, `product_unit`, `quantity`) VALUES
(2, 1, 2, 'IPOD_001', 'Ipod Touch 7th Generation', 'box', 3),
(3, 2, 4, 'APP_04', 'Rayban Aviator', 'box', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '\0\0', 'owner', '54af4ba64ec0a86f4f3e1e45159df08902ab8f40', NULL, 'owner@tecdiary.com', NULL, NULL, NULL, NULL, 1351661704, 1391936688, 1, 'Owner', 'Owner', 'Stock Manager', '0105292122'),
(2, '', 'admin@grizano.com', '54af4ba64ec0a86f4f3e1e45159df08902ab8f40', NULL, 'admin@grizano.com', NULL, NULL, NULL, NULL, 0, 1392134808, 1, 'ARUN MINTO', '', 'Grizano Labs', NULL),
(3, 'tËƒL', 'sethu raman', '815fb8e310e8a991a57a510afcccca4045d93f4b', NULL, 'sales@gmail.com', NULL, NULL, NULL, NULL, 1391945873, 1392055405, 1, 'Sethu', 'Raman', 'Grizano', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `code`, `name`, `address`, `city`) VALUES
(1, 'WHI', 'Warehouse 1 Kadavantra', 'Near Panambilly Nagar', 'Kochi'),
(2, 'WHII', 'Warehouse 2 Kakkanad', 'Near Infopark', 'Kochi');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses_products`
--

CREATE TABLE IF NOT EXISTS `warehouses_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `warehouses_products`
--

INSERT INTO `warehouses_products` (`id`, `product_id`, `warehouse_id`, `quantity`) VALUES
(1, 1, 1, 75),
(2, 2, 1, 59),
(3, 2, 2, 10),
(4, 3, 2, -8),
(5, 3, 1, 74),
(6, 4, 1, -22),
(7, 4, 2, 90);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
