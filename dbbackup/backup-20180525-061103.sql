#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');


#
# TABLE STRUCTURE FOR: att_log
#

DROP TABLE IF EXISTS `att_log`;

CREATE TABLE `att_log` (
  `sn` varchar(30) NOT NULL,
  `scan_date` datetime NOT NULL,
  `pin` varchar(32) NOT NULL,
  `verifymode` int(11) NOT NULL,
  `inoutmode` int(11) NOT NULL DEFAULT '0',
  `reserved` int(11) NOT NULL DEFAULT '0',
  `word_code` int(11) NOT NULL DEFAULT '0',
  KEY `pin` (`pin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-19 07:30:03', '1', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-19 07:30:04', '2', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-19 07:30:05', '3', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-19 07:30:06', '4', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-19 07:30:07', '5', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-19 07:30:08', '6', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-19 07:30:09', '7', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-19 07:30:10', '8', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-19 07:30:11', '9', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-19 07:30:12', '10', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-19 07:30:13', '11', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-19 16:30:14', '1', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-19 16:30:15', '2', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-19 16:30:16', '3', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-19 16:30:17', '4', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-19 16:30:18', '5', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-19 16:30:19', '6', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-19 16:30:20', '7', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-19 16:30:21', '8', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-19 16:30:22', '9', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-19 16:30:23', '10', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-19 16:30:24', '11', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-20 16:00:11', '1', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-20 16:00:12', '2', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-20 16:00:13', '3', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-20 16:00:14', '4', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-20 16:00:15', '5', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-20 16:00:16', '6', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-20 16:00:17', '7', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-20 16:00:18', '8', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-20 16:00:19', '9', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-20 16:00:20', '10', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-20 07:00:21', '11', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-20 07:00:22', '1', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-20 07:00:23', '2', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-20 07:00:24', '3', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-20 07:00:25', '4', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-20 07:00:26', '5', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-20 07:00:27', '6', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-20 07:00:28', '7', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-20 07:00:29', '8', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-20 07:00:30', '9', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-20 07:00:31', '10', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-20 07:00:32', '11', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-21 07:00:22', '1', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-21 07:00:23', '2', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-21 07:00:24', '3', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-21 07:00:25', '4', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-21 07:00:26', '5', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-21 07:00:27', '6', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-21 07:00:28', '7', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-21 07:00:29', '8', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-21 07:00:30', '9', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-21 07:00:31', '10', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-21 07:00:32', '11', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-21 15:00:22', '1', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-21 15:00:23', '2', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-21 15:00:24', '3', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-21 15:00:25', '4', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-21 15:00:26', '5', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-21 15:00:27', '6', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-21 15:00:28', '7', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-21 15:00:29', '8', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-21 15:00:30', '9', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-21 15:00:31', '10', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-21 15:00:32', '11', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-22 15:30:22', '1', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-22 15:30:23', '2', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-22 15:30:24', '3', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-22 15:30:25', '4', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-22 15:30:26', '5', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-22 15:30:27', '6', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-22 15:30:28', '7', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-22 15:30:29', '8', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-22 15:30:30', '9', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-22 15:30:31', '10', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-22 15:30:32', '11', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-22 07:30:22', '1', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-22 07:30:23', '2', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-22 07:30:24', '3', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-22 07:30:25', '4', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-22 07:30:26', '5', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-22 07:30:27', '6', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-22 07:30:28', '7', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-22 07:30:29', '8', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-22 07:30:30', '9', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-22 07:30:31', '10', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-22 07:30:32', '11', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-23 07:30:22', '1', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-23 07:30:23', '2', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-23 07:30:24', '3', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-23 07:30:25', '4', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-23 07:30:26', '5', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-23 07:30:27', '6', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-23 07:30:28', '7', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-23 07:30:29', '8', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-23 07:30:30', '9', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-23 07:30:31', '10', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-23 07:30:32', '11', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-23 16:30:22', '1', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-23 16:30:23', '2', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-23 16:30:24', '3', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-23 16:30:25', '4', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-23 16:30:26', '5', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('1', '2018-05-23 16:30:27', '6', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-23 16:30:28', '7', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('3', '2018-05-23 16:30:29', '8', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('4', '2018-05-23 16:30:30', '9', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('5', '2018-05-23 16:30:31', '10', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('2', '2018-05-23 16:30:32', '11', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-08 08:00:00', '1', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-08 16:00:00', '1', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-31 08:00:00', '5', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-31 16:00:00', '5', '1', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-01 08:00:00', '1', '0', '0', '0', '0');
INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-01 16:00:00', '1', '1', '0', '0', '0');


#
# TABLE STRUCTURE FOR: att_log2
#

DROP TABLE IF EXISTS `att_log2`;

CREATE TABLE `att_log2` (
  `sn` varchar(30) NOT NULL,
  `scan_date` datetime NOT NULL,
  `pin` varchar(32) NOT NULL,
  `verifymode` int(11) NOT NULL,
  `inoutmode` int(11) NOT NULL DEFAULT '0',
  `reserved` int(11) NOT NULL DEFAULT '0',
  `word_code` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sn`,`scan_date`,`pin`),
  KEY `pin` (`pin`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 06:45:00', '8', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 07:00:00', '4', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 07:00:00', '6', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 07:30:00', '10', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 07:32:00', '2', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 08:00:00', '1', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 08:00:00', '11', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 08:10:00', '3', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 09:00:00', '5', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 09:21:00', '9', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 15:00:00', '2', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 16:00:00', '10', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 16:00:00', '8', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 16:02:00', '1', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 16:05:00', '6', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 16:30:00', '3', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 17:00:00', '5', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-24 18:01:00', '9', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-25 07:48:00', '2', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-25 08:43:00', '5', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-25 16:00:00', '2', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-25 16:00:00', '5', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-26 07:30:00', '1', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-27 16:00:00', '2', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-28 08:10:00', '2', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-04-28 16:16:00', '2', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-08 07:00:00', '1', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-08 07:40:00', '5', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-08 16:00:00', '1', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-08 16:00:00', '5', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-09 08:00:00', '5', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-09 15:00:00', '5', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-09 16:00:00', '1', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-10 08:00:00', '5', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-10 15:30:00', '5', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-14 08:00:00', '5', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-18 07:00:00', '5', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-18 07:30:00', '11', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-18 08:00:00', '1', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-18 16:00:00', '1', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-18 16:30:00', '3', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS1', '2018-05-18 16:30:00', '5', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS2', '2018-05-18 07:50:00', '3', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS3', '2018-04-24 08:21:00', '7', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS3', '2018-04-24 15:00:00', '4', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS3', '2018-04-27 07:54:00', '2', '0', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS4', '2018-04-24 16:34:00', '7', '1', '0', '0', '0');
INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES ('MS5', '0000-00-00 00:00:00', '9', '1', '0', '0', '0');


#
# TABLE STRUCTURE FOR: aturan
#

DROP TABLE IF EXISTS `aturan`;

CREATE TABLE `aturan` (
  `jam_masuk` varchar(11) NOT NULL,
  `toleransi` varchar(11) NOT NULL,
  `jam_masuk_set` varchar(11) NOT NULL,
  `jam_pulang` varchar(11) NOT NULL,
  `jam_pulang_jum` varchar(11) NOT NULL,
  `lama_kerja` int(11) NOT NULL,
  `um_max_masuk` time NOT NULL,
  `um_min_pulang` time NOT NULL,
  `periode` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `aturan` (`jam_masuk`, `toleransi`, `jam_masuk_set`, `jam_pulang`, `jam_pulang_jum`, `lama_kerja`, `um_max_masuk`, `um_min_pulang`, `periode`) VALUES ('07:30', '08:00', '07:30', '16:00', '16:30', '450', '00:00:00', '00:00:00', '05/01/2018 - 05/31/2018');


#
# TABLE STRUCTURE FOR: cuti
#

DROP TABLE IF EXISTS `cuti`;

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL AUTO_INCREMENT,
  `kode_cuti` varchar(11) NOT NULL,
  `pin` varchar(11) NOT NULL,
  `tgl_cuti` date NOT NULL,
  `kategori` varchar(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `cuti` (`id_cuti`, `kode_cuti`, `pin`, `tgl_cuti`, `kategori`, `keterangan`) VALUES ('1', '051420182', '2', '2018-05-14', 'negara', '-\r\n');
INSERT INTO `cuti` (`id_cuti`, `kode_cuti`, `pin`, `tgl_cuti`, `kategori`, `keterangan`) VALUES ('2', '051420182', '2', '2018-05-15', 'negara', '-\r\n');
INSERT INTO `cuti` (`id_cuti`, `kode_cuti`, `pin`, `tgl_cuti`, `kategori`, `keterangan`) VALUES ('3', '051420182', '2', '2018-05-16', 'negara', '-\r\n');
INSERT INTO `cuti` (`id_cuti`, `kode_cuti`, `pin`, `tgl_cuti`, `kategori`, `keterangan`) VALUES ('4', '042320185', '5', '2018-04-23', 'negara', 'Cuti Umum');
INSERT INTO `cuti` (`id_cuti`, `kode_cuti`, `pin`, `tgl_cuti`, `kategori`, `keterangan`) VALUES ('5', '050120181', '1', '2018-05-01', 'negara', 'Izin Sakit');
INSERT INTO `cuti` (`id_cuti`, `kode_cuti`, `pin`, `tgl_cuti`, `kategori`, `keterangan`) VALUES ('6', '050120181', '1', '2018-05-02', 'negara', 'Izin Sakit');
INSERT INTO `cuti` (`id_cuti`, `kode_cuti`, `pin`, `tgl_cuti`, `kategori`, `keterangan`) VALUES ('7', '050120181', '1', '2018-05-03', 'negara', 'Izin Sakit');
INSERT INTO `cuti` (`id_cuti`, `kode_cuti`, `pin`, `tgl_cuti`, `kategori`, `keterangan`) VALUES ('8', '050420181', '1', '2018-05-04', 'pribadi', 'Liburan Keluarga');
INSERT INTO `cuti` (`id_cuti`, `kode_cuti`, `pin`, `tgl_cuti`, `kategori`, `keterangan`) VALUES ('9', '050420181', '1', '2018-05-05', 'pribadi', 'Liburan Keluarga');


#
# TABLE STRUCTURE FOR: libur
#

DROP TABLE IF EXISTS `libur`;

CREATE TABLE `libur` (
  `id_libur` int(11) NOT NULL AUTO_INCREMENT,
  `kode_libur` varchar(11) NOT NULL,
  `keterangan_libur` text NOT NULL,
  `tgl_libur` date NOT NULL,
  PRIMARY KEY (`id_libur`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('10', '1526058000', 'Libur Umum', '2018-05-12');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('11', '1526058000', 'Libur Umum', '2018-05-13');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('12', '1526662800', 'Libur Umum', '2018-05-19');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('13', '1526662800', 'Libur Umum', '2018-05-20');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('14', '1527267600', 'Libur Umum', '2018-05-26');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('15', '1527267600', 'Libur Umum', '2018-05-27');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('16', '1527144164', 'Cuti bersama', '2018-05-31');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('17', '1527145433', 'Hari Libur Nasional', '2018-06-01');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('18', '1527145472', 'Libur Hari Merdeka', '2018-06-11');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('19', '1527145472', 'Libur Hari Merdeka', '2018-06-12');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('20', '1527145472', 'Libur Hari Merdeka', '2018-06-13');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('21', '1527145472', 'Libur Hari Merdeka', '2018-06-14');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('23', '1527149011', 'Libur Umum', '2018-05-05');
INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES ('24', '1527149011', 'Libur Umum', '2018-05-06');


#
# TABLE STRUCTURE FOR: pegawai
#

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `pin` varchar(11) NOT NULL,
  `nik` varchar(32) NOT NULL,
  `id_status` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `pin` (`pin`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES ('1', '1', '1234578765434590', '2', 'Ahmad.S.E.M.Kom');
INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES ('2', '2', '36456476476875687', '1', 'Fatimah.S.Pd');
INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES ('3', '3', '765476587352745', '1', 'Zainal Arifin');
INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES ('4', '4', '45745786989780', '3', 'Hasan Ali');
INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES ('5', '5', '76543234567843543', '2', 'Jono Wahyono');
INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES ('6', '6', '3456787654567876', '1', 'Irfan Hanafi');
INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES ('7', '7', '876543456787654', '1', 'Wiwit Handayani');
INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES ('8', '8', '34567876545678', '1', 'Fulan Hanafi');
INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES ('9', '9', '234578987654567', '3', 'Sholeh Fuat');
INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES ('10', '10', '897654678987879', '3', 'Heni Rahmawati');
INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES ('11', '11', '4375375476587686', '1', 'Eko W');


#
# TABLE STRUCTURE FOR: status
#

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(11) NOT NULL,
  `status` varchar(32) NOT NULL,
  `no_urut` int(11) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `status` (`id_status`, `kategori`, `status`, `no_urut`) VALUES ('1', 'PNS', 'Dosen', '2');
INSERT INTO `status` (`id_status`, `kategori`, `status`, `no_urut`) VALUES ('2', 'PNS', 'Pegawai', '1');
INSERT INTO `status` (`id_status`, `kategori`, `status`, `no_urut`) VALUES ('3', 'non PNS', 'Pegawai', '3');
INSERT INTO `status` (`id_status`, `kategori`, `status`, `no_urut`) VALUES ('4', 'non PNS', 'Dosen', '4');


#
# TABLE STRUCTURE FOR: tugas
#

DROP TABLE IF EXISTS `tugas`;

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tugas` varchar(11) NOT NULL,
  `pin` varchar(11) NOT NULL,
  `tgl_tugas` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kategori` varchar(11) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tugas`),
  KEY `id_lokasi` (`tempat`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

INSERT INTO `tugas` (`id_tugas`, `kode_tugas`, `pin`, `tgl_tugas`, `keterangan`, `kategori`, `tempat`) VALUES ('10', '051620186', '6', '2018-05-16', 'Kunjungan Pegawai', 'Dalam Kota', 'Kediri');
INSERT INTO `tugas` (`id_tugas`, `kode_tugas`, `pin`, `tgl_tugas`, `keterangan`, `kategori`, `tempat`) VALUES ('11', '051620186', '6', '2018-05-17', 'Kunjungan Pegawai', 'Dalam Kota', 'Kediri');
INSERT INTO `tugas` (`id_tugas`, `kode_tugas`, `pin`, `tgl_tugas`, `keterangan`, `kategori`, `tempat`) VALUES ('12', '051620186', '6', '2018-05-18', 'Kunjungan Pegawai', 'Dalam Kota', 'Kediri');
INSERT INTO `tugas` (`id_tugas`, `kode_tugas`, `pin`, `tgl_tugas`, `keterangan`, `kategori`, `tempat`) VALUES ('20', '051420185', '5', '2018-05-14', 'Pelatihan Pegawai', 'Luar Kota', 'Jakarta');
INSERT INTO `tugas` (`id_tugas`, `kode_tugas`, `pin`, `tgl_tugas`, `keterangan`, `kategori`, `tempat`) VALUES ('21', '051420185', '5', '2018-05-15', 'Pelatihan Pegawai', 'Luar Kota', 'Jakarta');
INSERT INTO `tugas` (`id_tugas`, `kode_tugas`, `pin`, `tgl_tugas`, `keterangan`, `kategori`, `tempat`) VALUES ('22', '051420185', '5', '2018-05-16', 'Pelatihan Pegawai', 'Luar Kota', 'Jakarta');
INSERT INTO `tugas` (`id_tugas`, `kode_tugas`, `pin`, `tgl_tugas`, `keterangan`, `kategori`, `tempat`) VALUES ('24', '042320185', '5', '2018-04-23', 'Pembinaan Pegawai', 'Luar Kota', 'Surabaya');
INSERT INTO `tugas` (`id_tugas`, `kode_tugas`, `pin`, `tgl_tugas`, `keterangan`, `kategori`, `tempat`) VALUES ('27', '053020181', '1', '2018-05-30', 'Kunjungan Pegawai ke-5', 'Luar Kota', 'Jakarta');
INSERT INTO `tugas` (`id_tugas`, `kode_tugas`, `pin`, `tgl_tugas`, `keterangan`, `kategori`, `tempat`) VALUES ('28', '053020181', '1', '2018-05-31', 'Kunjungan Pegawai ke-5', 'Luar Kota', 'Jakarta');


#
# TABLE STRUCTURE FOR: view_cuti
#

DROP TABLE IF EXISTS `view_cuti`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cuti` AS select `cuti`.`kode_cuti` AS `kode_cuti`,`cuti`.`pin` AS `pin`,min(`cuti`.`tgl_cuti`) AS `mulai`,max(`cuti`.`tgl_cuti`) AS `selesai`,`cuti`.`keterangan` AS `keterangan` from `cuti` group by `cuti`.`kode_cuti`;

utf8mb4_unicode_ci;

INSERT INTO `view_cuti` (`kode_cuti`, `pin`, `mulai`, `selesai`, `keterangan`) VALUES ('042320185', '5', '2018-04-23', '2018-04-23', 'Cuti Umum');
INSERT INTO `view_cuti` (`kode_cuti`, `pin`, `mulai`, `selesai`, `keterangan`) VALUES ('050120181', '1', '2018-05-01', '2018-05-03', 'Izin Sakit');
INSERT INTO `view_cuti` (`kode_cuti`, `pin`, `mulai`, `selesai`, `keterangan`) VALUES ('050420181', '1', '2018-05-04', '2018-05-05', 'Liburan Keluarga');
INSERT INTO `view_cuti` (`kode_cuti`, `pin`, `mulai`, `selesai`, `keterangan`) VALUES ('051420182', '2', '2018-05-14', '2018-05-16', '-\r\n');


#
# TABLE STRUCTURE FOR: view_libur
#

DROP TABLE IF EXISTS `view_libur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_libur` AS select `libur`.`kode_libur` AS `kode_libur`,min(`libur`.`tgl_libur`) AS `mulai`,max(`libur`.`tgl_libur`) AS `selesai`,`libur`.`keterangan_libur` AS `keterangan_libur` from `libur` group by `libur`.`kode_libur`;

utf8mb4_unicode_ci;

INSERT INTO `view_libur` (`kode_libur`, `mulai`, `selesai`, `keterangan_libur`) VALUES ('1526058000', '2018-05-12', '2018-05-13', 'Libur Umum');
INSERT INTO `view_libur` (`kode_libur`, `mulai`, `selesai`, `keterangan_libur`) VALUES ('1526662800', '2018-05-19', '2018-05-20', 'Libur Umum');
INSERT INTO `view_libur` (`kode_libur`, `mulai`, `selesai`, `keterangan_libur`) VALUES ('1527144164', '2018-05-31', '2018-05-31', 'Cuti bersama');
INSERT INTO `view_libur` (`kode_libur`, `mulai`, `selesai`, `keterangan_libur`) VALUES ('1527145433', '2018-06-01', '2018-06-01', 'Hari Libur Nasional');
INSERT INTO `view_libur` (`kode_libur`, `mulai`, `selesai`, `keterangan_libur`) VALUES ('1527145472', '2018-06-11', '2018-06-14', 'Libur Hari Merdeka');
INSERT INTO `view_libur` (`kode_libur`, `mulai`, `selesai`, `keterangan_libur`) VALUES ('1527149011', '2018-05-05', '2018-05-06', 'Libur Umum');
INSERT INTO `view_libur` (`kode_libur`, `mulai`, `selesai`, `keterangan_libur`) VALUES ('1527267600', '2018-05-26', '2018-05-27', 'Libur Umum');


#
# TABLE STRUCTURE FOR: view_tugas
#

DROP TABLE IF EXISTS `view_tugas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tugas` AS select `tugas`.`kode_tugas` AS `kode_tugas`,`tugas`.`pin` AS `pin`,min(`tugas`.`tgl_tugas`) AS `mulai`,max(`tugas`.`tgl_tugas`) AS `selesai`,`tugas`.`keterangan` AS `keterangan` from `tugas` group by `tugas`.`kode_tugas`;

utf8mb4_unicode_ci;

INSERT INTO `view_tugas` (`kode_tugas`, `pin`, `mulai`, `selesai`, `keterangan`) VALUES ('042320185', '5', '2018-04-23', '2018-04-23', 'Pembinaan Pegawai');
INSERT INTO `view_tugas` (`kode_tugas`, `pin`, `mulai`, `selesai`, `keterangan`) VALUES ('051420185', '5', '2018-05-14', '2018-05-16', 'Pelatihan Pegawai');
INSERT INTO `view_tugas` (`kode_tugas`, `pin`, `mulai`, `selesai`, `keterangan`) VALUES ('051620186', '6', '2018-05-16', '2018-05-18', 'Kunjungan Pegawai');
INSERT INTO `view_tugas` (`kode_tugas`, `pin`, `mulai`, `selesai`, `keterangan`) VALUES ('053020181', '1', '2018-05-30', '2018-05-31', 'Kunjungan Pegawai ke-5');


