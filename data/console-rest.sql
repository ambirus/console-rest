/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50554
Source Host           : localhost:3306
Source Database       : console-rest

Target Server Type    : MYSQL
Target Server Version : 50554
File Encoding         : 65001

Date: 2017-01-27 10:57:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('b1dd2330-4c7c-42ec-bf0a-f4875f16b67d', 'test', '098f6bcd4621d373cade4e832627b4f6', 'info');
INSERT INTO `users` VALUES ('bb4eff72-536d-4c3d-98c8-efe93f6475b8', 'test2', '098f6bcd4621d373cade4e832627b4f6', 'info2');
