/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : webshop

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-01-06 16:06:06
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cms_cart
-- ----------------------------
INSERT INTO `cms_cart` VALUES ('1', '0', '4', '2');
INSERT INTO `cms_cart` VALUES ('9', '1', '1', '1');
