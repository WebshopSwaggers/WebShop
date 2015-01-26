/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : webshop

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-01-26 11:17:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_cart
-- ----------------------------
DROP TABLE IF EXISTS `cms_cart`;
CREATE TABLE `cms_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cms_cart
-- ----------------------------
INSERT INTO `cms_cart` VALUES ('24', '2', '7', '1', '0');

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
INSERT INTO `cms_invoice_templates` VALUES ('1', '2', '1422267137', '1422267137');
INSERT INTO `cms_invoice_templates` VALUES ('2', '2', '1422267137', '1422267137');

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
  `leftover` int(10) NOT NULL,
  `tags` varchar(50) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cms_items
-- ----------------------------
INSERT INTO `cms_items` VALUES ('1', 'COD MW2', '50', 'Call of duty MW2', 'http://upload.wikimedia.org/wikipedia/en/d/db/Modern_Warfare_2_cover.PNG', 'games', '0', 'shooter');
INSERT INTO `cms_items` VALUES ('2', 'SMB 3', '10', 'Super Mario Bros 3', 'http://upload.wikimedia.org/wikipedia/en/a/a5/Super_Mario_Bros._3_coverart.png', 'games', '0', 'platform');
INSERT INTO `cms_items` VALUES ('3', 'Transistor OST', '10', 'This pack contains all soundtracks out of Transistor', 'http://i.imgur.com/vmSCZzU.png', 'music', '0', 'soundtrack');
INSERT INTO `cms_items` VALUES ('4', 'Bastion OST', '15', 'This pack contains all soundtracks out of Bastion.', 'http://i.imgur.com/fwLjweV.png', 'music', '1', 'soundtrack');
INSERT INTO `cms_items` VALUES ('5', 'Bit.trip OST', '15', 'Bit.trip OST', 'http://i.imgur.com/UsCfAC2.jpg', 'music', '2', 'soundtrack');
INSERT INTO `cms_items` VALUES ('6', 'Minecraft OST', '20', 'Minecraft OST', 'http://i.imgur.com/SSmuhtk.jpg', 'music', '2', 'soundtrack');
INSERT INTO `cms_items` VALUES ('7', 'Don\'t starve OST', '10', 'Don\'t starve OST', 'http://i.imgur.com/xjaOyWe.jpg', 'music', '5', 'soundtrack');
INSERT INTO `cms_items` VALUES ('8', 'SCB ninja t-shirt', '15', 'Super crate box ninja t-shirt', 'http://i.imgur.com/KVDgPE6.jpg', 'clothes', '22', 'tshirt');
INSERT INTO `cms_items` VALUES ('9', 'Karate guy t-shirt', '20', 'Karate black guy t-shirt ', 'http://i.imgur.com/NTBTPWD.jpg', 'clothes', '15', 'tshirt');
INSERT INTO `cms_items` VALUES ('10', 'Luftrausers t-shirt', '20', 'Luftrausers enginer guy t-shirt', 'http://i.imgur.com/o74immZ.jpg', 'clothes', '10', 'tshirt');
INSERT INTO `cms_items` VALUES ('11', 'Nuclear throne t-shirt', '15', 'Nuclear throne t-shirt with all monsters on it', 'http://i.imgur.com/H7zZPyL.jpg', 'clothes', '5', 'tshirt');

-- ----------------------------
-- Table structure for cms_users
-- ----------------------------
DROP TABLE IF EXISTS `cms_users`;
CREATE TABLE `cms_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `firstname` varchar(50) DEFAULT '',
  `lastname` varchar(50) DEFAULT '',
  `street` varchar(50) DEFAULT '',
  `zip` varchar(10) DEFAULT '',
  `number` int(10) DEFAULT '0',
  `city` varchar(100) DEFAULT '',
  `country` varchar(100) DEFAULT '',
  `admin` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cms_users
-- ----------------------------
INSERT INTO `cms_users` VALUES ('1', 'safhdgjfk@sfhgvdsjk.nl', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'asdasd', 'asdasd', 'sadasd', '1111 AA', '1121', 'Breda', 'NL', '0');
INSERT INTO `cms_users` VALUES ('2', 'j@v.nl', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'S', 'Pelka', 'Waterloostraat', '5555 AA', '10', 'Breda', 'NL', '1');
