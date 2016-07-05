/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : myshop

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2016-06-28 13:02:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `login_time` varchar(40) DEFAULT NULL,
  `login_ip` varchar(40) DEFAULT NULL,
  `power` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '6412121cbb2dc2cb9e460cfee7046be2', null, null, '1');

-- ----------------------------
-- Table structure for `catelist`
-- ----------------------------
DROP TABLE IF EXISTS `catelist`;
CREATE TABLE `catelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catelistname` varchar(50) DEFAULT NULL,
  `catelistdate` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `catelistname` (`catelistname`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of catelist
-- ----------------------------
INSERT INTO `catelist` VALUES ('1', '鞋子', '2016-06-28 11:03:15');
INSERT INTO `catelist` VALUES ('2', '衣服', '2016-06-28 11:03:30');

-- ----------------------------
-- Table structure for `goodslist`
-- ----------------------------
DROP TABLE IF EXISTS `goodslist`;
CREATE TABLE `goodslist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL,
  `goodsname` varchar(100) DEFAULT NULL,
  `gooodsmoney` int(11) DEFAULT NULL,
  `gcount` int(11) DEFAULT NULL,
  `ginfo` text,
  `datetime` varchar(40) DEFAULT NULL,
  `gway` int(11) DEFAULT NULL,
  `imange` varchar(255) DEFAULT NULL,
  `glicks` int(11) DEFAULT NULL,
  `gvotecoun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goodslist
-- ----------------------------
INSERT INTO `goodslist` VALUES ('1', '2', '上衣', '100', '0', '', '2016-06-28 03:03:52', '0', '0', '0', '0');
