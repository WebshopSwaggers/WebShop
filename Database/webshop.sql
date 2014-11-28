/*
Navicat MySQL Data Transfer

Source Server         : locall
Source Server Version : 50620
Source Host           : 127.0.0.1:3306
Source Database       : webshop

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2014-11-28 09:13:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_invoice_items
-- ----------------------------
DROP TABLE IF EXISTS `cms_invoice_items`;
CREATE TABLE `cms_invoice_items` (
  `inv_item_id` int(11) NOT NULL DEFAULT '0',
  `inv_id` int(11) DEFAULT '0',
  `item_id` int(11) DEFAULT '0',
  `count` int(11) DEFAULT '0',
  PRIMARY KEY (`inv_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cms_invoice_items
-- ----------------------------
INSERT INTO `cms_invoice_items` VALUES ('1', '1', '1', '3');
INSERT INTO `cms_invoice_items` VALUES ('2', '1', '2', '5');
INSERT INTO `cms_invoice_items` VALUES ('3', '2', '1', '2');
INSERT INTO `cms_invoice_items` VALUES ('4', '1', '3', '2');

-- ----------------------------
-- Table structure for cms_invoice_templates
-- ----------------------------
DROP TABLE IF EXISTS `cms_invoice_templates`;
CREATE TABLE `cms_invoice_templates` (
  `inv_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `start_date` varchar(255) DEFAULT '0',
  `end_date` varchar(255) DEFAULT '0',
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cms_invoice_templates
-- ----------------------------
INSERT INTO `cms_invoice_templates` VALUES ('1', '1', '0', '0');
INSERT INTO `cms_invoice_templates` VALUES ('2', '1', '0', '0');

-- ----------------------------
-- Table structure for cms_items
-- ----------------------------
DROP TABLE IF EXISTS `cms_items`;
CREATE TABLE `cms_items` (
  `item_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `price` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `catagory` varchar(100) DEFAULT 'games',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cms_items
-- ----------------------------
INSERT INTO `cms_items` VALUES ('1', 'COD MW2', '50', 'Call of duty MW2', 'http://upload.wikimedia.org/wikipedia/en/d/db/Modern_Warfare_2_cover.PNG', 'games');
INSERT INTO `cms_items` VALUES ('2', 'SMB 3', '10', 'Super Mario Bros 3', 'http://upload.wikimedia.org/wikipedia/en/a/a5/Super_Mario_Bros._3_coverart.png', 'games');
INSERT INTO `cms_items` VALUES ('3', 'BF 4', '60', 'muziekje', 'http://upload.wikimedia.org/wikipedia/en/e/ed/Battlefield_4.jpg', 'music');

-- ----------------------------
-- Table structure for cms_users
-- ----------------------------
DROP TABLE IF EXISTS `cms_users`;
CREATE TABLE `cms_users` (
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

-- ----------------------------
-- Records of cms_users
-- ----------------------------
INSERT INTO `cms_users` VALUES ('1', 'jiojio@ge.nl', 'llllll', 'jordy', 'visser', 'jiojo', '989', '89', 'jiojjio', 'jiojio');
