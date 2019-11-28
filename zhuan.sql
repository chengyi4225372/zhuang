/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : zhuan

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-11-28 21:53:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for shop_goods
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods`;
CREATE TABLE `shop_goods` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `imgs` varchar(200) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `infos` text,
  `create_time` int(11) unsigned DEFAULT NULL,
  `del_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_goods
-- ----------------------------
INSERT INTO `shop_goods` VALUES ('0000000001', '童話獨角獸保鮮花禮盒', '/uploads/imgs/goods/76728927-949599425393611-4121324864894140416-o-506x506.jpg', '1', '', '1574947086', null);
INSERT INTO `shop_goods` VALUES ('0000000002', '《Jo Malone》 Pallar 保鮮花禮盒', '/uploads/imgs/goods/75339422-952225305131023-5650739457456865280-o-506x506.jpg', '1', '', '1574947119', null);
INSERT INTO `shop_goods` VALUES ('0000000003', '《Jo Malone》 fallry 保鮮花禮盒', '/uploads/imgs/goods/75196327-958563554497198-5372836270038843392-o-506x506.jpg', '-1', '', '1574947144', null);
INSERT INTO `shop_goods` VALUES ('0000000004', '《Jo Malone》 Spring 保鮮花禮盒', '/uploads/imgs/goods/74666162-958584501161770-8929162245888278528-o-1-506x506.jpg', '-1', '', '1574948979', '1574949211');

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
