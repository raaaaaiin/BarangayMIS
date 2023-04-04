/*
Navicat MySQL Data Transfer

Source Server         : db_barangay
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : barangaymis

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-04-05 03:25:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `login_acc`
-- ----------------------------
DROP TABLE IF EXISTS `login_acc`;
CREATE TABLE `login_acc` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of login_acc
-- ----------------------------
INSERT INTO `login_acc` VALUES ('1', 'admin', 'admin', 'admin', null, null);

-- ----------------------------
-- Table structure for `news_events`
-- ----------------------------
DROP TABLE IF EXISTS `news_events`;
CREATE TABLE `news_events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of news_events
-- ----------------------------
INSERT INTO `news_events` VALUES ('1', 'Barangay Fiesta Celebration', 'Join us for a fun-filled day of games, food, and entertainment as we celebrate our annual barangay fiesta!', '/images/fiesta.jpg', 'event', '2023-05-12', '09:00:00', 'Barangay Hall', '2023-04-01 09:00:00', '2023-04-01 09:00:00');
INSERT INTO `news_events` VALUES ('2', 'New Street Lights Installed', 'We are pleased to announce that new street lights have been installed throughout the barangay to improve safety and visibility at night.', null, 'news', '2023-03-20', '00:00:00', null, '2023-03-20 08:00:00', '2023-03-20 08:00:00');
INSERT INTO `news_events` VALUES ('3', 'Barangay Council Elections', 'The barangay council elections will be held on May 14th. Please exercise your right to vote and help shape the future of our barangay!', null, 'event', '2023-05-14', '08:00:00', 'Barangay Hall', '2023-03-31 10:00:00', '2023-03-31 10:00:00');
INSERT INTO `news_events` VALUES ('4', 'New Waste Management Program', 'We are launching a new waste management program to help reduce waste and improve the cleanliness of our barangay. Please stay tuned for more details!', null, 'news', '2023-04-15', '00:00:00', null, '2023-04-01 14:00:00', '2023-04-01 14:00:00');
INSERT INTO `news_events` VALUES ('5', 'Barangay Health Fair', 'Join us for a day of health and wellness at the barangay health fair. Get free health screenings, flu shots, and more!', '/images/health_fair.jpg', 'event', '2023-06-01', '10:00:00', 'Barangay Health Center', '2023-04-02 09:00:00', '2023-04-02 09:00:00');

-- ----------------------------
-- Table structure for `resident_info`
-- ----------------------------
DROP TABLE IF EXISTS `resident_info`;
CREATE TABLE `resident_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `civil_status` varchar(20) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of resident_info
-- ----------------------------
