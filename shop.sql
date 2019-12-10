/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50725
Source Host           : 127.0.0.1:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50725
File Encoding         : 65001

Date: 2019-12-06 14:31:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for shop_config
-- ----------------------------
DROP TABLE IF EXISTS `shop_config`;
CREATE TABLE `shop_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `himgs` varchar(255) DEFAULT NULL,
  `fimgs` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `wechatapp` varchar(255) DEFAULT NULL,
  `foot` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_config
-- ----------------------------
INSERT INTO `shop_config` VALUES ('1', 'Queen\'s-Box', '/uploads/imgs/himgs/lijiaqi2.png', '/uploads/imgs/fimgs/74624090-3181840135224115-7654798131510378496-o-192x192.jpeg', '4646545@qq.com', 'www.baidu.com', '© Copyright 2019 Leon', 'www.baidu.com');

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
INSERT INTO `shop_goods` VALUES ('0000000001', '童話獨角獸保鮮花禮盒', '/uploads/imgs/goods/76728927-949599425393611-4121324864894140416-o-506x506.jpg', '1', '\"\\ud83c\\udf38\\u9999\\u8abf\\uff1a\\u82f1\\u570b\\u68a8&\\u5c0f\\u84bc\\u862d <br\\/>\\n\\ud83c\\udf38\\u79cb\\u5929\\u6c23\\u606f \\u6e05\\u65b0\\u512a\\u96c5\\u4ee4\\u4eba\\u611f\\u5230\\u8212\\u670d\\uff0c\\u5f8c\\u7e8c\\u4f50\\u4ee5\\u6728\\u8cea\\u9999\\u8abf\\u7684\\u67d4\\u548c \\u4ee4\\u597d\\u611f\\u5ea6\\u5927\\u5927\\u63d0\\u5347\\uff5e <br\\/>\\n\\ud83c\\udf38\\u5feb\\u5572\\u9001\\u6bd4\\u4f60\\u5fc3\\u4e2d\\u7684\\u9999\\u9999\\u516c\\u4e3b\\u5566\\ud83e\\udd70  <br\\/>\\n\\ud83c\\udf38\\u6709\\u82b1\\u4ef2\\u6709\\u79ae\\u7269\\u6536 \\u9ede\\u6703\\u6709\\u5973\\u5514\\u51a7\\u554a\\uff1f\\ud83d\\ude0e  <br\\/>\\n\\ud83c\\udf38size:17cm\\u00d717cm\\u00d79cm  <br\\/>\\n\\ud83c\\udf38\\u5167\\u8a2dLED\\u71c8  <br\\/>\\n\\ud83c\\udf38\\u4eba\\u5de5\\u624b\\u4f5c \\u81ea\\u5bb6\\u88fd\\u7522\\u54c1  <br\\/>\"', '1574947086', null);
INSERT INTO `shop_goods` VALUES ('0000000002', '《Jo Malone》 Pallar 保鮮花禮盒', '/uploads/imgs/goods/75339422-952225305131023-5650739457456865280-o-506x506.jpg', '1', '\"\\ud83c\\udf38\\u9999\\u8abf\\uff1a\\u82f1\\u570b\\u68a8&\\u5c0f\\u84bc\\u862d <br\\/>\\n\\ud83c\\udf38\\u79cb\\u5929\\u6c23\\u606f \\u6e05\\u65b0\\u512a\\u96c5\\u4ee4\\u4eba\\u611f\\u5230\\u8212\\u670d\\uff0c\\u5f8c\\u7e8c\\u4f50\\u4ee5\\u6728\\u8cea\\u9999\\u8abf\\u7684\\u67d4\\u548c \\u4ee4\\u597d\\u611f\\u5ea6\\u5927\\u5927\\u63d0\\u5347\\uff5e <br\\/>\\n\\ud83c\\udf38\\u5feb\\u5572\\u9001\\u6bd4\\u4f60\\u5fc3\\u4e2d\\u7684\\u9999\\u9999\\u516c\\u4e3b\\u5566\\ud83e\\udd70  <br\\/>\\n\\ud83c\\udf38\\u6709\\u82b1\\u4ef2\\u6709\\u79ae\\u7269\\u6536 \\u9ede\\u6703\\u6709\\u5973\\u5514\\u51a7\\u554a\\uff1f\\ud83d\\ude0e  <br\\/>\\n\\ud83c\\udf38size:17cm\\u00d717cm\\u00d79cm  <br\\/>\\n\\ud83c\\udf38\\u5167\\u8a2dLED\\u71c8  <br\\/>\\n\\ud83c\\udf38\\u4eba\\u5de5\\u624b\\u4f5c \\u81ea\\u5bb6\\u88fd\\u7522\\u54c1  <br\\/>\"', '1574947119', null);
INSERT INTO `shop_goods` VALUES ('0000000003', '《Jo Malone》 fallry 保鮮花禮盒', '/uploads/imgs/goods/75196327-958563554497198-5372836270038843392-o-506x506.jpg', '1', '\"\\ud83d\\udd37\\u7d05\\u67da\\u3001\\u6a59\\u82b1\\u3001\\u679c\\u4ec1\\u7cd6\\u3001\\u96ea\\u677e  <br\\/>\\n\\ud83d\\udd37\\u6728\\u8cea\\u82b1\\u679c\\u9999\\u5473 <br\\/>\\n\\ud83d\\udd37\\u52a0\\u5de6\\u8fea\\u58eb\\u5c3c\\u516c\\u4e3b\\u7cfb\\u5217\\u611f\\u89ba\\u66f4\\u751f\\u52d5\\uff5e<br\\/>\\n\\ud83d\\udd37\\u5feb\\u5572\\u9001\\u6bd4\\u4f60\\u5fc3\\u4e2d\\u7684\\u9999\\u9999\\u516c\\u4e3b\\u5566\\ud83e\\udd70 <br\\/>\\n\\ud83d\\udd37\\u6709\\u82b1\\u4ef2\\u6709\\u79ae\\u7269\\u6536 \\u9ede\\u6703\\u6709\\u5973\\u5514\\u51a7\\u554a\\uff1f\\ud83d\\ude0e<br\\/>\\n\\ud83d\\udd37size:17cm\\u00d717cm\\u00d79cm <br\\/>\\n\\ud83d\\udd37\\u5167\\u8a2dLED\\u71c8 <br\\/>\"', '1574947144', null);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_user
-- ----------------------------
INSERT INTO `shop_user` VALUES ('0000000008', 'admin', '03a4e91c752f8c6ae0778fa181e97b3c', 'qctizu', '9aa8bdb3435dfa2b6e009e59d40c6ae3', '1', '127.0.0.1', '1575532602');
