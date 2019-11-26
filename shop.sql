/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50725
Source Host           : 127.0.0.1:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50725
File Encoding         : 65001

Date: 2019-11-26 17:39:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for shop_goods
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods`;
CREATE TABLE `shop_goods` (
  `id` int(10) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `imgs` varchar(200) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `info` text,
  `create_time` int(11) unsigned DEFAULT NULL,
  `del_time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_goods
-- ----------------------------
INSERT INTO `shop_goods` VALUES (null, '用户列表', '/uploads/imgs/goods/0ce8f584-7b78-45eb-9765-39fa6918115d.jpg', '1', 'ffffffffff', '1574761033', null);

-- ----------------------------
-- Table structure for shop_user
-- ----------------------------
DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE `shop_user` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `users` varchar(50) DEFAULT NULL,
  `pwd` char(32) DEFAULT NULL,
  `salt` char(10) DEFAULT NULL,
  `tokens` char(32) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `ip` char(20) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_user
-- ----------------------------
INSERT INTO `shop_user` VALUES ('0000000001', 'zhang', '9f904dccb8e46a57aec66339b85c8829', 'ubnuov', '0408e7f4647c1dd23657c1ff2ebe4f53', '1', '127.0.0.1', '1574323174');
INSERT INTO `shop_user` VALUES ('0000000002', 'abcd111', '4156edd68a3195227766806236ffc03b', 'hlkysb', '9bd44a7286e0f963e45a64b3c18dae24', '1', '127.0.0.1', '1574323563');
INSERT INTO `shop_user` VALUES ('0000000004', 'wuliao', '9132d33da48186a5094afddf926d5ae1', 'wlzdnn', 'adca963ce2ebaa3002fb894a1522be68', '-1', '127.0.0.1', '1574328336');
INSERT INTO `shop_user` VALUES ('0000000005', 'admin', '4db9be8e85854405e5254a4c50e018e8', 'bllnce', '5a6dd1e17a89cd048317bb38200d019b', '1', '127.0.0.1', '1574331006');
