/*
Navicat MySQL Data Transfer

Source Server         : locall
Source Server Version : 50620
Source Host           : 127.0.0.1:3306
Source Database       : webshop

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2014-11-24 14:45:16
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
  PRIMARY KEY (`inv_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cms_invoice_items
-- ----------------------------

-- ----------------------------
-- Table structure for cms_invoice_templates
-- ----------------------------
DROP TABLE IF EXISTS `cms_invoice_templates`;
CREATE TABLE `cms_invoice_templates` (
  `inv_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cms_invoice_templates
-- ----------------------------

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
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cms_items
-- ----------------------------

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
