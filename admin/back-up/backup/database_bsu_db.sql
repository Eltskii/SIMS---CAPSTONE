# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------


#
# Delete any existing table `course`
#

DROP TABLE IF EXISTS `course`;


#
# Table structure of table `course`
#

CREATE TABLE `course` (
  `COURSE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COURSE_NAME` varchar(80) NOT NULL,
  `COURSE_LEVEL` varchar(50) NOT NULL DEFAULT '1',
  `COURSE_MAJOR` varchar(50) NOT NULL DEFAULT 'None',
  `COURSE_DESC` varchar(255) NOT NULL,
  `DEPT_ID` int(11) NOT NULL,
  `SETSEMESTER` varchar(90) NOT NULL,
  PRIMARY KEY (`COURSE_ID`),
  KEY `DEPT_ID` (`DEPT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table course (37 records)
#
 
INSERT INTO `course` VALUES ('1', 'Bachelor of Industrial Technology', '1', 'Automotive Technology', 'Bachelor of Industrial Technology', '34', '') ; 
INSERT INTO `course` VALUES ('2', 'Bachelor of Industrial Technology', '1', 'Construction Technology', 'Bachelor of Industrial Technology', '34', '') ; 
INSERT INTO `course` VALUES ('3', 'Bachelor of Industrial Technology', '1', 'Electrical Technology', 'Bachelor of Industrial Technology', '34', '') ; 
INSERT INTO `course` VALUES ('4', 'Bachelor of Industrial Technology', '1', 'Apparel and Fashion Technology', 'Bachelor of Industrial Technology', '34', '') ; 
INSERT INTO `course` VALUES ('5', 'Bachelor of Industrial Technology', '1', 'Culinary Technology', 'Bachelor of Industrial Technology', '34', '') ; 
INSERT INTO `course` VALUES ('6', 'Bachelor of Industrial Technology', '1', 'Welding and Fabrication Techno', 'Bachelor of Industrial Technology', '34', '') ; 
INSERT INTO `course` VALUES ('7', 'Bachelor of Science in Information Technology', '1', 'None', 'Bachelor of Science in Information Technology', '34', '') ; 
INSERT INTO `course` VALUES ('8', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Civil and Construction Technol', 'BTVTEd Major in Civil & Construction Technology', '36', '') ; 
INSERT INTO `course` VALUES ('10', 'Bachelor in Public Administration', '1', 'None', 'Bachelor in Public Administration', '35', '') ; 
INSERT INTO `course` VALUES ('11', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Automotive Technology', 'Bachelor of Technical-Vocational Teacher Education', '36', '') ; 
INSERT INTO `course` VALUES ('12', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Civil and Construction Technol', 'Bachelor of Technical-Vocational Teacher Education', '36', '') ; 
INSERT INTO `course` VALUES ('14', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Food and Service Management', 'Bachelor of Technical-Vocational Teacher Education', '36', '') ; 
INSERT INTO `course` VALUES ('15', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Fashion, Garments and Design', 'Bachelor of Technical-Vocational Teacher Education', '36', '') ; 
INSERT INTO `course` VALUES ('16', 'Bachelor of Technology and Livelihood Education', '1', 'Home Economics', 'Bachelor of Technology and Livelihood Education', '36', '') ; 
INSERT INTO `course` VALUES ('17', 'Bachelor of Technology and Livelihood Education', '1', 'Industrial Arts', 'Bachelor of Technology and Livelihood Education', '36', '') ; 
INSERT INTO `course` VALUES ('18', 'Bachelor of Secondary Education', '1', 'English', 'Bachelor of Secondary Education', '36', '') ; 
INSERT INTO `course` VALUES ('19', 'Bachelor of Secondary Education', '1', 'Filipino', 'Bachelor of Secondary Education', '36', '') ; 
INSERT INTO `course` VALUES ('20', 'Bachelor of Secondary Education', '1', 'Science', 'Bachelor of Secondary Education', '36', '') ; 
INSERT INTO `course` VALUES ('22', 'Bachelor of Secondary Education', '1', 'Social Studies', 'Bachelor of Secondary Education', '36', '') ; 
INSERT INTO `course` VALUES ('23', 'Bachelor of Elementary Education', '1', 'None', 'Bachelor of Elementary Education', '36', '') ; 
INSERT INTO `course` VALUES ('25', 'Bachelor of Science in Criminology', '1', 'None', 'Bachelor of Science in Criminology', '37', '') ; 
INSERT INTO `course` VALUES ('62', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Automotive Technology', 'BTVTEd Major in Automotive Technology', '36', '') ; 
INSERT INTO `course` VALUES ('63', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Civil and Construction Technol', 'BTVTEd Major in Civil & Construction Technology', '36', '') ; 
INSERT INTO `course` VALUES ('64', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Electrical Technology', 'BTVTEd Major in Electrical Technology', '36', '') ; 
INSERT INTO `course` VALUES ('67', 'Bachelor of Technology and Livelihood Education', '1', 'Home Economics', 'BTLEd Major in Home Economics', '36', '') ; 
INSERT INTO `course` VALUES ('68', 'Bachelor of Technology and Livelihood Education', '1', 'Industrial Arts', 'BTLEd Major in Industrial Arts', '36', '') ; 
INSERT INTO `course` VALUES ('73', 'Bachelor of Science in Criminology', '1', 'None', 'Bachelor of Science in Criminology', '37', '') ; 
INSERT INTO `course` VALUES ('74', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Automotive Technology', 'BTVTEd Major in Automotive Technology', '36', '') ; 
INSERT INTO `course` VALUES ('75', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Civil and Construction Technol', 'BTVTEd Major in Civil & Construction Technology', '36', '') ; 
INSERT INTO `course` VALUES ('77', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Food and Service Management', 'BTVTEd Major in Food & Service Management', '36', '') ; 
INSERT INTO `course` VALUES ('78', 'Bachelor of Technical-Vocational Teacher Education', '1', 'Fashion, Garments and Design', 'BTVTEd Major in Fashion, Garments & Design', '36', '') ; 
INSERT INTO `course` VALUES ('79', 'Bachelor of Technology and Livelihood Education', '1', 'Home Economics', 'BTLEd Major in Home Economics', '36', '') ; 
INSERT INTO `course` VALUES ('80', 'Bachelor of Technology and Livelihood Education', '1', 'Industrial Arts', 'BTLEd Major in Industrial Arts', '36', '') ; 
INSERT INTO `course` VALUES ('82', 'Bachelor of Culture and Arts Education', '1', 'None', 'Bachelor of Culture and Arts Education', '36', '') ; 
INSERT INTO `course` VALUES ('84', 'Bachelor of Industrial Technology', '1', 'Construction Technology', 'BIT Major in Construction Technology', '34', '') ; 
INSERT INTO `course` VALUES ('89', 'Bachelor of Technology and Livelihood Education', '1', 'Home Economics', 'BTLEd Major in Home Economics', '36', '') ; 
INSERT INTO `course` VALUES ('90', 'Bachelor of Science in Criminology', '1', 'None', 'Bachelor of Science in Criminology', '37', '') ;
#
# End of data contents of table course
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------


#
# Delete any existing table `department`
#

DROP TABLE IF EXISTS `department`;


#
# Table structure of table `department`
#

CREATE TABLE `department` (
  `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTMENT_NAME` varchar(30) NOT NULL,
  `DEPARTMENT_DESC` varchar(50) NOT NULL,
  PRIMARY KEY (`DEPT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table department (4 records)
#
 
INSERT INTO `department` VALUES ('34', 'CAT', 'College of Applied Technology') ; 
INSERT INTO `department` VALUES ('35', 'CBAM', 'College of Business Administration & Management') ; 
INSERT INTO `department` VALUES ('36', 'CED', 'College of Education') ; 
INSERT INTO `department` VALUES ('37', 'CCJE', 'College of Criminal Education') ;
#
# End of data contents of table department
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------


#
# Delete any existing table `grades`
#

DROP TABLE IF EXISTS `grades`;


#
# Table structure of table `grades`
#

CREATE TABLE `grades` (
  `GRADE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNO` int(11) NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `FIRST` int(11) NOT NULL,
  `SECOND` int(11) NOT NULL,
  `THIRD` int(11) NOT NULL,
  `FOURTH` int(11) NOT NULL,
  `AVE` float NOT NULL,
  `REMARKS` text NOT NULL,
  `COMMENT` text NOT NULL,
  `SEMS` varchar(90) NOT NULL,
  PRIMARY KEY (`GRADE_ID`),
  KEY `IDNO` (`IDNO`)
) ENGINE=InnoDB AUTO_INCREMENT=1680 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table grades (617 records)
#
 
INSERT INTO `grades` VALUES ('1063', '100000076', '8', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1064', '100000076', '40', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1065', '100000076', '41', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1066', '100000076', '42', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1067', '100000076', '43', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1068', '100000076', '44', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1069', '100000076', '45', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1070', '100000076', '46', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1071', '100000076', '47', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1072', '100000076', '48', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1073', '100000077', '8', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1074', '100000077', '40', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1075', '100000077', '41', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1076', '100000077', '42', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1077', '100000077', '43', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1078', '100000077', '44', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1079', '100000077', '45', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1080', '100000077', '46', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1081', '100000077', '47', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1082', '100000077', '48', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1083', '100000079', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1084', '100000079', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1085', '100000079', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1086', '100000079', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1087', '100000079', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1088', '100000079', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1089', '100000079', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1090', '100000079', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1091', '100000079', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1092', '1000000100', '176', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1093', '1000000100', '177', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1094', '1000000100', '178', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1095', '1000000100', '179', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1096', '1000000100', '180', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1097', '1000000100', '181', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1098', '1000000100', '182', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1099', '1000000100', '345', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1100', '100000092', '8', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1101', '100000092', '40', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1102', '100000092', '41', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1103', '100000092', '42', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1104', '100000092', '43', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1105', '100000092', '44', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1106', '100000092', '45', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1107', '100000092', '46', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1108', '100000092', '47', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1109', '100000092', '48', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1110', '1000000126', '8', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1111', '1000000126', '40', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1112', '1000000126', '41', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1113', '1000000126', '42', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1114', '1000000126', '43', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1115', '1000000126', '44', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1116', '1000000126', '45', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1117', '1000000126', '46', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1118', '1000000126', '47', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1119', '1000000126', '48', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1120', '1000000127', '8', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1121', '1000000127', '40', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1122', '1000000127', '41', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1123', '1000000127', '42', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1124', '1000000127', '43', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1125', '1000000127', '44', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1126', '1000000127', '45', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1127', '1000000127', '46', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1128', '1000000127', '47', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1129', '1000000127', '48', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1130', '1000000190', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1131', '1000000190', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1132', '1000000190', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1133', '1000000190', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1134', '1000000190', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1135', '1000000190', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1136', '1000000190', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1137', '1000000190', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1138', '1000000190', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1139', '1000000201', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1140', '1000000201', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1141', '1000000201', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1142', '1000000201', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1143', '1000000201', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1144', '1000000201', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1145', '1000000201', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1146', '1000000201', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1147', '1000000201', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1148', '1000000200', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1149', '1000000200', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1150', '1000000200', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1151', '1000000200', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1152', '1000000200', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1153', '1000000200', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1154', '1000000200', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1155', '1000000200', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1156', '1000000200', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1157', '1000000199', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1158', '1000000199', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1159', '1000000199', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1160', '1000000199', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1161', '1000000199', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1162', '1000000199', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1163', '1000000199', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1164', '1000000199', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1165', '1000000199', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1166', '1000000198', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1167', '1000000198', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1168', '1000000198', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1169', '1000000198', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1170', '1000000198', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1171', '1000000198', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1172', '1000000198', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1173', '1000000198', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1174', '1000000198', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1175', '1000000197', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1176', '1000000197', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1177', '1000000197', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1178', '1000000197', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1179', '1000000197', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1180', '1000000197', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1181', '1000000197', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1182', '1000000197', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1183', '1000000197', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1184', '1000000196', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1185', '1000000196', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1186', '1000000196', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1187', '1000000196', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1188', '1000000196', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1189', '1000000196', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1190', '1000000196', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1191', '1000000196', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1192', '1000000196', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1193', '1000000195', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1194', '1000000195', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1195', '1000000195', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1196', '1000000195', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1197', '1000000195', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1198', '1000000195', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1199', '1000000195', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1200', '1000000195', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1201', '1000000195', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1202', '1000000194', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1203', '1000000194', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1204', '1000000194', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1205', '1000000194', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1206', '1000000194', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1207', '1000000194', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1208', '1000000194', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1209', '1000000194', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1210', '1000000194', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1211', '1000000193', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1212', '1000000193', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1213', '1000000193', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1214', '1000000193', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1215', '1000000193', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1216', '1000000193', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1217', '1000000193', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1218', '1000000193', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1219', '1000000193', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1220', '1000000192', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1221', '1000000192', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1222', '1000000192', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1223', '1000000192', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1224', '1000000192', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1225', '1000000192', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1226', '1000000192', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1227', '1000000192', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1228', '1000000192', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1229', '1000000191', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1230', '1000000191', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1231', '1000000191', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1232', '1000000191', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1233', '1000000191', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1234', '1000000191', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1235', '1000000191', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1236', '1000000191', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1237', '1000000191', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1238', '1000000189', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1239', '1000000189', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1240', '1000000189', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1241', '1000000189', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1242', '1000000189', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1243', '1000000189', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1244', '1000000189', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1245', '1000000189', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1246', '1000000189', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1247', '1000000188', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1248', '1000000188', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1249', '1000000188', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1250', '1000000188', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1251', '1000000188', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1252', '1000000188', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1253', '1000000188', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1254', '1000000188', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1255', '1000000188', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1256', '1000000187', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1257', '1000000187', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1258', '1000000187', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1259', '1000000187', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1260', '1000000187', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1261', '1000000187', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1262', '1000000187', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1263', '1000000187', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1264', '1000000187', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1265', '1000000186', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1266', '1000000186', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1267', '1000000186', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1268', '1000000186', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1269', '1000000186', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1270', '1000000186', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1271', '1000000186', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1272', '1000000186', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1273', '1000000186', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1274', '1000000185', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1275', '1000000185', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1276', '1000000185', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1277', '1000000185', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1278', '1000000185', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1279', '1000000185', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1280', '1000000185', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1281', '1000000185', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1282', '1000000185', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1283', '1000000184', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1284', '1000000184', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1285', '1000000184', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1286', '1000000184', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1287', '1000000184', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1288', '1000000184', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1289', '1000000184', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1290', '1000000184', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1291', '1000000184', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1292', '1000000183', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1293', '1000000183', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1294', '1000000183', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1295', '1000000183', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1296', '1000000183', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1297', '1000000183', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1298', '1000000183', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1299', '1000000183', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1300', '1000000183', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1301', '1000000182', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1302', '1000000182', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1303', '1000000182', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1304', '1000000182', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1305', '1000000182', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1306', '1000000182', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1307', '1000000182', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1308', '1000000182', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1309', '1000000182', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1310', '1000000181', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1311', '1000000181', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1312', '1000000181', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1313', '1000000181', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1314', '1000000181', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1315', '1000000181', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1316', '1000000181', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1317', '1000000181', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1318', '1000000181', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1319', '1000000180', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1320', '1000000180', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1321', '1000000180', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1322', '1000000180', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1323', '1000000180', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1324', '1000000180', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1325', '1000000180', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1326', '1000000180', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1327', '1000000180', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1328', '1000000179', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1329', '1000000179', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1330', '1000000179', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1331', '1000000179', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1332', '1000000179', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1333', '1000000179', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1334', '1000000179', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1335', '1000000179', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1336', '1000000179', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1337', '1000000178', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1338', '1000000178', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1339', '1000000178', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1340', '1000000178', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1341', '1000000178', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1342', '1000000178', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1343', '1000000178', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1344', '1000000178', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1345', '1000000178', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1346', '1000000177', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1347', '1000000177', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1348', '1000000177', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1349', '1000000177', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1350', '1000000177', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1351', '1000000177', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1352', '1000000177', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1353', '1000000177', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1354', '1000000177', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1355', '1000000176', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1356', '1000000176', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1357', '1000000176', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1358', '1000000176', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1359', '1000000176', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1360', '1000000176', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1361', '1000000176', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1362', '1000000176', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1363', '1000000176', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1364', '1000000175', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1365', '1000000175', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1366', '1000000175', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1367', '1000000175', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1368', '1000000175', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1369', '1000000175', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1370', '1000000175', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1371', '1000000175', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1372', '1000000175', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1373', '1000000174', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1374', '1000000174', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1375', '1000000174', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1376', '1000000174', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1377', '1000000174', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1378', '1000000174', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1379', '1000000174', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1380', '1000000174', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1381', '1000000174', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1382', '1000000173', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1383', '1000000173', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1384', '1000000173', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1385', '1000000173', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1386', '1000000173', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1387', '1000000173', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1388', '1000000173', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1389', '1000000173', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1390', '1000000173', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1391', '1000000172', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1392', '1000000172', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1393', '1000000172', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1394', '1000000172', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1395', '1000000172', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1396', '1000000172', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1397', '1000000172', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1398', '1000000172', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1399', '1000000172', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1400', '1000000171', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1401', '1000000171', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1402', '1000000171', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1403', '1000000171', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1404', '1000000171', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1405', '1000000171', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1406', '1000000171', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1407', '1000000171', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1408', '1000000171', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1409', '1000000170', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1410', '1000000170', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1411', '1000000170', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1412', '1000000170', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1413', '1000000170', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1414', '1000000170', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1415', '1000000170', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1416', '1000000170', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1417', '1000000170', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1418', '1000000169', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1419', '1000000169', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1420', '1000000169', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1421', '1000000169', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1422', '1000000169', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1423', '1000000169', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1424', '1000000169', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1425', '1000000169', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1426', '1000000169', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1427', '1000000168', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1428', '1000000168', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1429', '1000000168', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1430', '1000000168', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1431', '1000000168', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1432', '1000000168', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1433', '1000000168', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1434', '1000000168', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1435', '1000000168', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1436', '1000000167', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1437', '1000000167', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1438', '1000000167', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1439', '1000000167', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1440', '1000000167', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1441', '1000000167', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1442', '1000000167', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1443', '1000000167', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1444', '1000000167', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1445', '1000000166', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1446', '1000000166', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1447', '1000000166', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1448', '1000000166', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1449', '1000000166', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1450', '1000000166', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1451', '1000000166', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1452', '1000000166', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1453', '1000000166', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1454', '1000000165', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1455', '1000000165', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1456', '1000000165', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1457', '1000000165', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1458', '1000000165', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1459', '1000000165', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1460', '1000000165', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1461', '1000000165', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1462', '1000000165', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1463', '1000000164', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1464', '1000000164', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1465', '1000000164', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1466', '1000000164', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1467', '1000000164', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1468', '1000000164', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1469', '1000000164', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1470', '1000000164', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1471', '1000000164', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1472', '1000000163', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1473', '1000000163', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1474', '1000000163', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1475', '1000000163', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1476', '1000000163', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1477', '1000000163', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1478', '1000000163', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1479', '1000000163', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1480', '1000000163', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1481', '1000000162', '176', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1482', '1000000162', '177', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1483', '1000000162', '178', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1484', '1000000162', '179', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1485', '1000000162', '180', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1486', '1000000162', '181', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1487', '1000000162', '182', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1488', '1000000162', '345', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1489', '100000098', '78', '96', '97', '80', '80', '86.6', 'Passed', '', '') ; 
INSERT INTO `grades` VALUES ('1490', '100000098', '79', '70', '70', '70', '70', '70', 'Failed', '', '') ; 
INSERT INTO `grades` VALUES ('1491', '100000098', '80', '90', '87', '87', '87', '87.6', 'Passed', '', '') ; 
INSERT INTO `grades` VALUES ('1492', '100000098', '81', '87', '87', '87', '87', '87', 'Passed', '', '') ; 
INSERT INTO `grades` VALUES ('1493', '100000098', '82', '76', '90', '90', '98', '90.4', 'Passed', '', '') ; 
INSERT INTO `grades` VALUES ('1494', '100000098', '83', '87', '87', '87', '87', '87', 'Passed', '', '') ; 
INSERT INTO `grades` VALUES ('1495', '100000098', '84', '87', '89', '86', '85', '86.4', 'Passed', '', '') ; 
INSERT INTO `grades` VALUES ('1496', '100000098', '85', '87', '87', '89', '86', '87', 'Passed', '', '') ; 
INSERT INTO `grades` VALUES ('1497', '100000098', '86', '85', '84', '84', '93', '87.8', 'Passed', '', '') ; 
INSERT INTO `grades` VALUES ('1498', '1000000156', '78', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1499', '1000000156', '79', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1500', '1000000156', '80', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1501', '1000000156', '81', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1502', '1000000156', '82', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1503', '1000000156', '83', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1504', '1000000156', '84', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1505', '1000000156', '85', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1506', '1000000156', '86', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1507', '1000000202', '135', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1508', '1000000202', '136', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1509', '1000000202', '137', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1510', '1000000202', '138', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1511', '1000000202', '139', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1512', '1000000202', '140', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1513', '1000000202', '141', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1514', '1000000202', '142', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1515', '1000000202', '143', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1516', '1000000203', '135', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1517', '1000000203', '136', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1518', '1000000203', '137', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1519', '1000000203', '138', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1520', '1000000203', '139', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1521', '1000000203', '140', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1522', '1000000203', '141', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1523', '1000000203', '142', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1524', '1000000203', '143', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1525', '1000000204', '135', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1526', '1000000204', '136', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1527', '1000000204', '137', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1528', '1000000204', '138', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1529', '1000000204', '139', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1530', '1000000204', '140', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1531', '1000000204', '141', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1532', '1000000204', '142', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1533', '1000000204', '143', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1534', '1000000205', '135', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1535', '1000000205', '136', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1536', '1000000205', '137', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1537', '1000000205', '138', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1538', '1000000205', '139', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1539', '1000000205', '140', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1540', '1000000205', '141', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1541', '1000000205', '142', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1542', '1000000205', '143', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1543', '1000000205', '135', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1544', '1000000205', '136', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1545', '1000000205', '137', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1546', '1000000205', '138', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1547', '1000000205', '139', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1548', '1000000205', '140', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1549', '1000000205', '141', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1550', '1000000205', '142', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1551', '1000000205', '143', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1552', '1000000207', '135', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1553', '1000000207', '136', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1554', '1000000207', '137', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1555', '1000000207', '138', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1556', '1000000207', '139', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1557', '1000000207', '140', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1558', '1000000207', '141', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1559', '1000000207', '142', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1560', '1000000207', '143', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1561', '1000000208', '135', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1562', '1000000208', '136', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1563', '1000000208', '137', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1564', '1000000208', '138', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1565', '1000000208', '139', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1566', '1000000208', '140', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1567', '1000000208', '141', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1568', '1000000208', '142', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1569', '1000000208', '143', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1570', '1000000209', '135', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1571', '1000000209', '136', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1572', '1000000209', '137', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1573', '1000000209', '138', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1574', '1000000209', '139', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1575', '1000000209', '140', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1576', '1000000209', '141', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1577', '1000000209', '142', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1578', '1000000209', '143', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1579', '1000000210', '135', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1580', '1000000210', '136', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1581', '1000000210', '137', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1582', '1000000210', '138', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1583', '1000000210', '139', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1584', '1000000210', '140', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1585', '1000000210', '141', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1586', '1000000210', '142', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1587', '1000000210', '143', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1588', '1000000211', '135', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1589', '1000000211', '136', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1590', '1000000211', '137', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1591', '1000000211', '138', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1592', '1000000211', '139', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1593', '1000000211', '140', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1594', '1000000211', '141', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1595', '1000000211', '142', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1596', '1000000211', '143', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1597', '1000000212', '135', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1598', '1000000212', '136', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1599', '1000000212', '137', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1600', '1000000212', '138', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1601', '1000000212', '139', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1602', '1000000212', '140', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1603', '1000000212', '141', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1604', '1000000212', '142', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1605', '1000000212', '143', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1606', '1000000213', '146', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1607', '1000000213', '147', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1608', '1000000213', '148', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1609', '1000000213', '149', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1610', '1000000213', '150', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1611', '1000000213', '151', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1612', '1000000213', '152', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1613', '1000000213', '153', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1614', '1000000213', '154', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1615', '100000080', '146', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1616', '100000080', '147', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1617', '100000080', '148', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1618', '100000080', '149', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1619', '100000080', '150', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1620', '100000080', '151', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1621', '100000080', '152', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1622', '100000080', '153', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1623', '100000080', '154', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1624', '1000000214', '206', '90', '90', '90', '90', '90', 'Passed', '', '') ; 
INSERT INTO `grades` VALUES ('1625', '1000000214', '207', '90', '90', '90', '90', '90', 'Passed', '', '') ; 
INSERT INTO `grades` VALUES ('1626', '1000000214', '208', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1627', '1000000214', '209', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1628', '1000000214', '210', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1629', '1000000214', '211', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1630', '1000000214', '212', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1631', '1000000214', '213', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1632', '1000000217', '286', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1633', '1000000217', '287', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1634', '1000000217', '288', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1635', '1000000217', '289', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1636', '1000000217', '290', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1637', '1000000217', '291', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1638', '1000000217', '292', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1639', '1000000217', '293', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1640', '1000000217', '294', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1641', '1000000217', '295', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1642', '1000000218', '286', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1643', '1000000218', '287', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1644', '1000000218', '288', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1645', '1000000218', '289', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1646', '1000000218', '290', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1647', '1000000218', '291', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1648', '1000000218', '292', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1649', '1000000218', '293', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1650', '1000000218', '294', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1651', '1000000218', '295', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1652', '1000000219', '286', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1653', '1000000219', '287', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1654', '1000000219', '288', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1655', '1000000219', '289', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1656', '1000000219', '290', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1657', '1000000219', '291', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1658', '1000000219', '292', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1659', '1000000219', '293', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1660', '1000000219', '294', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1661', '1000000219', '295', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1662', '1000000220', '304', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1663', '1000000220', '305', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1664', '1000000220', '306', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1665', '1000000220', '307', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1666', '1000000220', '308', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1667', '1000000220', '309', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1668', '1000000220', '310', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1669', '1000000220', '311', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1670', '1000000221', '286', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1671', '1000000221', '287', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1672', '1000000221', '288', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1673', '1000000221', '289', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1674', '1000000221', '290', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1675', '1000000221', '291', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1676', '1000000221', '292', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1677', '1000000221', '293', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1678', '1000000221', '294', '0', '0', '0', '0', '0', '', '', '') ; 
INSERT INTO `grades` VALUES ('1679', '1000000221', '295', '0', '0', '0', '0', '0', '', '', '') ;
#
# End of data contents of table grades
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------


#
# Delete any existing table `schoolyr`
#

DROP TABLE IF EXISTS `schoolyr`;


#
# Table structure of table `schoolyr`
#

CREATE TABLE `schoolyr` (
  `SYID` int(11) NOT NULL AUTO_INCREMENT,
  `AY` varchar(30) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `IDNO` int(30) NOT NULL,
  `CATEGORY` varchar(30) NOT NULL DEFAULT 'ENROLLED',
  `DATE_RESERVED` datetime NOT NULL,
  `DATE_ENROLLED` datetime NOT NULL,
  `STATUS` varchar(30) NOT NULL DEFAULT 'New',
  PRIMARY KEY (`SYID`),
  KEY `IDNO` (`IDNO`)
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table schoolyr (78 records)
#
 
INSERT INTO `schoolyr` VALUES ('150', '2016-2017', 'First', '30', '100000076', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('151', '2016-2017', 'First', '30', '100000077', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('152', '2016-2017', 'First', '42', '100000079', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('153', '2016-2017', 'First', '21', '1000000100', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('154', '2016-2017', 'First', '30', '100000092', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('155', '2016-2017', 'First', '30', '1000000126', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('156', '2016-2017', 'First', '30', '1000000127', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('157', '2016-2017', 'First', '42', '1000000190', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('158', '2016-2017', 'First', '42', '1000000201', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('159', '2016-2017', 'First', '42', '1000000200', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('160', '2016-2017', 'First', '42', '1000000199', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('161', '2016-2017', 'First', '42', '1000000198', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('162', '2016-2017', 'First', '42', '1000000197', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('163', '2016-2017', 'First', '42', '1000000196', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('164', '2016-2017', 'First', '42', '1000000195', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('165', '2016-2017', 'First', '42', '1000000194', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('166', '2016-2017', 'First', '42', '1000000193', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('167', '2016-2017', 'First', '42', '1000000192', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('168', '2016-2017', 'First', '42', '1000000191', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('169', '2016-2017', 'First', '42', '1000000189', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('170', '2016-2017', 'First', '42', '1000000188', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('171', '2016-2017', 'First', '42', '1000000187', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('172', '2016-2017', 'First', '42', '1000000186', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('173', '2016-2017', 'First', '42', '1000000185', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('174', '2016-2017', 'First', '42', '1000000184', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('175', '2016-2017', 'First', '42', '1000000183', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('176', '2016-2017', 'First', '42', '1000000182', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('177', '2016-2017', 'First', '42', '1000000181', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('178', '2016-2017', 'First', '42', '1000000180', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('179', '2016-2017', 'First', '42', '1000000179', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('180', '2016-2017', 'First', '42', '1000000178', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('181', '2016-2017', 'First', '42', '1000000177', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('182', '2016-2017', 'First', '42', '1000000176', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('183', '2016-2017', 'First', '42', '1000000175', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('184', '2016-2017', 'First', '42', '1000000174', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('185', '2016-2017', 'First', '42', '1000000173', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('186', '2016-2017', 'First', '42', '1000000172', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('187', '2016-2017', 'First', '42', '1000000171', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('188', '2016-2017', 'First', '42', '1000000170', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('189', '2016-2017', 'First', '42', '1000000169', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('190', '2016-2017', 'First', '42', '1000000168', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('191', '2016-2017', 'First', '42', '1000000167', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('192', '2016-2017', 'First', '42', '1000000166', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('193', '2016-2017', 'First', '42', '1000000165', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('194', '2016-2017', 'First', '42', '1000000164', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('195', '2016-2017', 'First', '42', '1000000163', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('196', '2016-2017', 'First', '21', '1000000162', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('197', '2016-2017', 'First', '42', '100000098', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('198', '2016-2017', 'First', '42', '1000000156', 'ENROLLED', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('199', '2025-2026', 'Second', '42', '1000000202', 'ENROLLED', '2025-10-12 00:00:00', '2025-10-12 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('200', '2025-2026', 'Second', '42', '1000000203', 'ENROLLED', '2025-10-12 00:00:00', '2025-10-12 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('201', '2025-2026', 'Second', '42', '1000000204', 'ENROLLED', '2025-10-12 00:00:00', '2025-10-12 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('202', '2025-2026', 'Second', '42', '1000000205', 'ENROLLED', '2025-10-12 00:00:00', '2025-10-12 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('203', '2025-2026', 'Second', '42', '1000000205', 'ENROLLED', '2025-10-12 00:00:00', '2025-10-12 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('204', '2025-2026', 'Second', '42', '1000000207', 'ENROLLED', '2025-10-12 00:00:00', '2025-10-12 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('205', '2025-2026', 'Second', '42', '1000000208', 'ENROLLED', '2025-10-12 00:00:00', '2025-10-12 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('206', '2025-2026', 'Second', '42', '1000000209', 'ENROLLED', '2025-10-12 00:00:00', '2025-10-12 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('207', '2025-2026', 'Second', '42', '1000000210', 'ENROLLED', '2025-10-12 00:00:00', '2025-10-12 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('208', '2025-2026', 'Second', '42', '1000000211', 'ENROLLED', '2025-10-12 00:00:00', '2025-10-12 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('209', '2025-2026', 'Second', '42', '1000000212', 'ENROLLED', '2025-10-12 00:00:00', '2025-10-12 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('210', '2025-2026', 'Second', '30', '1000000213', 'ENROLLED', '2025-10-13 00:00:00', '2025-10-13 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('211', '2025-2026', 'Second', '30', '100000080', 'ENROLLED', '2025-10-13 00:00:00', '2025-10-13 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('212', '2025-2026', 'Second', '21', '1000000214', 'ENROLLED', '2025-10-14 00:00:00', '2025-10-14 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('213', '2025-2026', 'Second', '60', '1000000217', 'ENROLLED', '2025-10-15 00:00:00', '2025-10-15 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('214', '2025-2026', 'Second', '60', '1000000218', 'ENROLLED', '2025-10-16 00:00:00', '2025-10-16 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('215', '2025-2026', 'Second', '60', '1000000219', 'ENROLLED', '2025-10-16 00:00:00', '2025-10-16 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('216', '2025-2026', 'Second', '61', '1000000220', 'ENROLLED', '2025-10-16 00:00:00', '2025-10-16 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('217', '2025-2026', 'Second', '60', '1000000221', 'ENROLLED', '2025-10-16 00:00:00', '2025-10-16 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('218', '2025-2026', 'Second', '10', '100000083', 'ENROLLED', '2025-10-19 00:00:00', '2025-10-19 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('219', '2025-2026', 'Second', '18', '100000084', 'ENROLLED', '2025-10-19 00:00:00', '2025-10-19 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('220', '2025-2026', 'Second', '5', '1000000222', 'ENROLLED', '2025-10-19 00:00:00', '2025-10-19 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('221', '2025-2026', 'First', '18', '100000085', 'ENROLLED', '2025-10-19 00:00:00', '2025-10-19 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('222', '2025-2026', 'First', '10', '100000086', 'ENROLLED', '2025-10-19 00:00:00', '2025-10-19 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('223', '2025-2026', 'First', '18', '100000087', 'ENROLLED', '2025-10-20 00:00:00', '2025-10-20 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('224', '2025-2026', 'First', '18', '100000088', 'ENROLLED', '2025-10-20 00:00:00', '2025-10-20 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('225', '2025-2026', 'First', '3', '1000000229', 'ENROLLED', '2025-11-04 00:00:00', '2025-11-04 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('226', '2025-2026', 'First', '4', '1000000230', 'ENROLLED', '2025-11-04 00:00:00', '2025-11-04 00:00:00', 'New') ; 
INSERT INTO `schoolyr` VALUES ('227', '2025-2026', 'First', '4', '1000000231', 'ENROLLED', '2025-11-05 00:00:00', '2025-11-05 00:00:00', 'New') ;
#
# End of data contents of table schoolyr
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentschedule`
# --------------------------------------------------------


#
# Delete any existing table `studentschedule`
#

DROP TABLE IF EXISTS `studentschedule`;


#
# Table structure of table `studentschedule`
#

CREATE TABLE `studentschedule` (
  `CLASS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SUBJ_ID` int(11) NOT NULL,
  `schedID` int(11) NOT NULL,
  `AY` varchar(11) NOT NULL,
  `DAY` varchar(20) NOT NULL,
  `C_TIME` varchar(30) NOT NULL,
  `IDNO` int(11) NOT NULL,
  `ROOM` text NOT NULL,
  `CSECTION` varchar(30) NOT NULL DEFAULT 'NONE',
  `COURSE_ID` int(11) NOT NULL,
  `SEMESTER` varchar(30) NOT NULL,
  PRIMARY KEY (`CLASS_ID`),
  KEY `IDNO` (`IDNO`),
  KEY `schedID` (`schedID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table studentschedule (0 records)
#

#
# End of data contents of table studentschedule
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentsubjects`
# --------------------------------------------------------


#
# Delete any existing table `studentsubjects`
#

DROP TABLE IF EXISTS `studentsubjects`;


#
# Table structure of table `studentsubjects`
#

CREATE TABLE `studentsubjects` (
  `STUDSUBJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNO` int(11) NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `LEVEL` int(11) NOT NULL,
  `SEMESTER` varchar(30) NOT NULL,
  `SY` text NOT NULL,
  `ATTEMP` int(11) NOT NULL,
  `AVERAGE` double NOT NULL,
  `OUTCOME` text NOT NULL,
  PRIMARY KEY (`STUDSUBJ_ID`),
  KEY `IDNO` (`IDNO`),
  KEY `SUBJ_ID` (`SUBJ_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1674 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table studentsubjects (617 records)
#
 
INSERT INTO `studentsubjects` VALUES ('1057', '100000076', '8', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1058', '100000076', '40', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1059', '100000076', '41', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1060', '100000076', '42', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1061', '100000076', '43', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1062', '100000076', '44', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1063', '100000076', '45', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1064', '100000076', '46', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1065', '100000076', '47', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1066', '100000076', '48', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1067', '100000077', '8', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1068', '100000077', '40', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1069', '100000077', '41', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1070', '100000077', '42', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1071', '100000077', '43', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1072', '100000077', '44', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1073', '100000077', '45', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1074', '100000077', '46', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1075', '100000077', '47', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1076', '100000077', '48', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1077', '100000079', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1078', '100000079', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1079', '100000079', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1080', '100000079', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1081', '100000079', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1082', '100000079', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1083', '100000079', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1084', '100000079', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1085', '100000079', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1086', '1000000100', '176', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1087', '1000000100', '177', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1088', '1000000100', '178', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1089', '1000000100', '179', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1090', '1000000100', '180', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1091', '1000000100', '181', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1092', '1000000100', '182', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1093', '1000000100', '345', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1094', '100000092', '8', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1095', '100000092', '40', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1096', '100000092', '41', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1097', '100000092', '42', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1098', '100000092', '43', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1099', '100000092', '44', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1100', '100000092', '45', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1101', '100000092', '46', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1102', '100000092', '47', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1103', '100000092', '48', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1104', '1000000126', '8', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1105', '1000000126', '40', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1106', '1000000126', '41', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1107', '1000000126', '42', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1108', '1000000126', '43', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1109', '1000000126', '44', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1110', '1000000126', '45', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1111', '1000000126', '46', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1112', '1000000126', '47', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1113', '1000000126', '48', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1114', '1000000127', '8', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1115', '1000000127', '40', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1116', '1000000127', '41', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1117', '1000000127', '42', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1118', '1000000127', '43', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1119', '1000000127', '44', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1120', '1000000127', '45', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1121', '1000000127', '46', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1122', '1000000127', '47', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1123', '1000000127', '48', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1124', '1000000190', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1125', '1000000190', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1126', '1000000190', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1127', '1000000190', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1128', '1000000190', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1129', '1000000190', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1130', '1000000190', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1131', '1000000190', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1132', '1000000190', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1133', '1000000201', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1134', '1000000201', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1135', '1000000201', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1136', '1000000201', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1137', '1000000201', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1138', '1000000201', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1139', '1000000201', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1140', '1000000201', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1141', '1000000201', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1142', '1000000200', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1143', '1000000200', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1144', '1000000200', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1145', '1000000200', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1146', '1000000200', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1147', '1000000200', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1148', '1000000200', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1149', '1000000200', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1150', '1000000200', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1151', '1000000199', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1152', '1000000199', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1153', '1000000199', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1154', '1000000199', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1155', '1000000199', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1156', '1000000199', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1157', '1000000199', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1158', '1000000199', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1159', '1000000199', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1160', '1000000198', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1161', '1000000198', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1162', '1000000198', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1163', '1000000198', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1164', '1000000198', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1165', '1000000198', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1166', '1000000198', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1167', '1000000198', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1168', '1000000198', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1169', '1000000197', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1170', '1000000197', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1171', '1000000197', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1172', '1000000197', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1173', '1000000197', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1174', '1000000197', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1175', '1000000197', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1176', '1000000197', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1177', '1000000197', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1178', '1000000196', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1179', '1000000196', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1180', '1000000196', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1181', '1000000196', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1182', '1000000196', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1183', '1000000196', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1184', '1000000196', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1185', '1000000196', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1186', '1000000196', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1187', '1000000195', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1188', '1000000195', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1189', '1000000195', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1190', '1000000195', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1191', '1000000195', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1192', '1000000195', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1193', '1000000195', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1194', '1000000195', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1195', '1000000195', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1196', '1000000194', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1197', '1000000194', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1198', '1000000194', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1199', '1000000194', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1200', '1000000194', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1201', '1000000194', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1202', '1000000194', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1203', '1000000194', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1204', '1000000194', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1205', '1000000193', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1206', '1000000193', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1207', '1000000193', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1208', '1000000193', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1209', '1000000193', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1210', '1000000193', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1211', '1000000193', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1212', '1000000193', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1213', '1000000193', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1214', '1000000192', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1215', '1000000192', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1216', '1000000192', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1217', '1000000192', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1218', '1000000192', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1219', '1000000192', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1220', '1000000192', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1221', '1000000192', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1222', '1000000192', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1223', '1000000191', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1224', '1000000191', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1225', '1000000191', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1226', '1000000191', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1227', '1000000191', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1228', '1000000191', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1229', '1000000191', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1230', '1000000191', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1231', '1000000191', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1232', '1000000189', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1233', '1000000189', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1234', '1000000189', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1235', '1000000189', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1236', '1000000189', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1237', '1000000189', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1238', '1000000189', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1239', '1000000189', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1240', '1000000189', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1241', '1000000188', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1242', '1000000188', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1243', '1000000188', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1244', '1000000188', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1245', '1000000188', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1246', '1000000188', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1247', '1000000188', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1248', '1000000188', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1249', '1000000188', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1250', '1000000187', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1251', '1000000187', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1252', '1000000187', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1253', '1000000187', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1254', '1000000187', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1255', '1000000187', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1256', '1000000187', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1257', '1000000187', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1258', '1000000187', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1259', '1000000186', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1260', '1000000186', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1261', '1000000186', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1262', '1000000186', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1263', '1000000186', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1264', '1000000186', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1265', '1000000186', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1266', '1000000186', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1267', '1000000186', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1268', '1000000185', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1269', '1000000185', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1270', '1000000185', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1271', '1000000185', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1272', '1000000185', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1273', '1000000185', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1274', '1000000185', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1275', '1000000185', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1276', '1000000185', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1277', '1000000184', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1278', '1000000184', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1279', '1000000184', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1280', '1000000184', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1281', '1000000184', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1282', '1000000184', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1283', '1000000184', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1284', '1000000184', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1285', '1000000184', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1286', '1000000183', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1287', '1000000183', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1288', '1000000183', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1289', '1000000183', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1290', '1000000183', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1291', '1000000183', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1292', '1000000183', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1293', '1000000183', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1294', '1000000183', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1295', '1000000182', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1296', '1000000182', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1297', '1000000182', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1298', '1000000182', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1299', '1000000182', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1300', '1000000182', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1301', '1000000182', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1302', '1000000182', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1303', '1000000182', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1304', '1000000181', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1305', '1000000181', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1306', '1000000181', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1307', '1000000181', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1308', '1000000181', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1309', '1000000181', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1310', '1000000181', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1311', '1000000181', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1312', '1000000181', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1313', '1000000180', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1314', '1000000180', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1315', '1000000180', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1316', '1000000180', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1317', '1000000180', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1318', '1000000180', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1319', '1000000180', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1320', '1000000180', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1321', '1000000180', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1322', '1000000179', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1323', '1000000179', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1324', '1000000179', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1325', '1000000179', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1326', '1000000179', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1327', '1000000179', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1328', '1000000179', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1329', '1000000179', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1330', '1000000179', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1331', '1000000178', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1332', '1000000178', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1333', '1000000178', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1334', '1000000178', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1335', '1000000178', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1336', '1000000178', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1337', '1000000178', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1338', '1000000178', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1339', '1000000178', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1340', '1000000177', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1341', '1000000177', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1342', '1000000177', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1343', '1000000177', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1344', '1000000177', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1345', '1000000177', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1346', '1000000177', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1347', '1000000177', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1348', '1000000177', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1349', '1000000176', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1350', '1000000176', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1351', '1000000176', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1352', '1000000176', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1353', '1000000176', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1354', '1000000176', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1355', '1000000176', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1356', '1000000176', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1357', '1000000176', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1358', '1000000175', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1359', '1000000175', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1360', '1000000175', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1361', '1000000175', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1362', '1000000175', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1363', '1000000175', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1364', '1000000175', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1365', '1000000175', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1366', '1000000175', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1367', '1000000174', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1368', '1000000174', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1369', '1000000174', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1370', '1000000174', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1371', '1000000174', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1372', '1000000174', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1373', '1000000174', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1374', '1000000174', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1375', '1000000174', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1376', '1000000173', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1377', '1000000173', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1378', '1000000173', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1379', '1000000173', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1380', '1000000173', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1381', '1000000173', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1382', '1000000173', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1383', '1000000173', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1384', '1000000173', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1385', '1000000172', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1386', '1000000172', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1387', '1000000172', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1388', '1000000172', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1389', '1000000172', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1390', '1000000172', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1391', '1000000172', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1392', '1000000172', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1393', '1000000172', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1394', '1000000171', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1395', '1000000171', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1396', '1000000171', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1397', '1000000171', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1398', '1000000171', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1399', '1000000171', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1400', '1000000171', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1401', '1000000171', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1402', '1000000171', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1403', '1000000170', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1404', '1000000170', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1405', '1000000170', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1406', '1000000170', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1407', '1000000170', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1408', '1000000170', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1409', '1000000170', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1410', '1000000170', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1411', '1000000170', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1412', '1000000169', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1413', '1000000169', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1414', '1000000169', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1415', '1000000169', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1416', '1000000169', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1417', '1000000169', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1418', '1000000169', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1419', '1000000169', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1420', '1000000169', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1421', '1000000168', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1422', '1000000168', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1423', '1000000168', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1424', '1000000168', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1425', '1000000168', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1426', '1000000168', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1427', '1000000168', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1428', '1000000168', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1429', '1000000168', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1430', '1000000167', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1431', '1000000167', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1432', '1000000167', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1433', '1000000167', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1434', '1000000167', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1435', '1000000167', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1436', '1000000167', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1437', '1000000167', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1438', '1000000167', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1439', '1000000166', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1440', '1000000166', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1441', '1000000166', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1442', '1000000166', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1443', '1000000166', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1444', '1000000166', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1445', '1000000166', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1446', '1000000166', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1447', '1000000166', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1448', '1000000165', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1449', '1000000165', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1450', '1000000165', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1451', '1000000165', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1452', '1000000165', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1453', '1000000165', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1454', '1000000165', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1455', '1000000165', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1456', '1000000165', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1457', '1000000164', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1458', '1000000164', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1459', '1000000164', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1460', '1000000164', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1461', '1000000164', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1462', '1000000164', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1463', '1000000164', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1464', '1000000164', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1465', '1000000164', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1466', '1000000163', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1467', '1000000163', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1468', '1000000163', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1469', '1000000163', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1470', '1000000163', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1471', '1000000163', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1472', '1000000163', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1473', '1000000163', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1474', '1000000163', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1475', '1000000162', '176', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1476', '1000000162', '177', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1477', '1000000162', '178', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1478', '1000000162', '179', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1479', '1000000162', '180', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1480', '1000000162', '181', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1481', '1000000162', '182', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1482', '1000000162', '345', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1483', '100000098', '78', '1', 'First', '2016-2017', '1', '86.6', 'Passed') ; 
INSERT INTO `studentsubjects` VALUES ('1484', '100000098', '79', '1', 'First', '2016-2017', '1', '70', 'Failed') ; 
INSERT INTO `studentsubjects` VALUES ('1485', '100000098', '80', '1', 'First', '2016-2017', '1', '87.6', 'Passed') ; 
INSERT INTO `studentsubjects` VALUES ('1486', '100000098', '81', '1', 'First', '2016-2017', '1', '87', 'Passed') ; 
INSERT INTO `studentsubjects` VALUES ('1487', '100000098', '82', '1', 'First', '2016-2017', '1', '90.4', 'Passed') ; 
INSERT INTO `studentsubjects` VALUES ('1488', '100000098', '83', '1', 'First', '2016-2017', '1', '87', 'Passed') ; 
INSERT INTO `studentsubjects` VALUES ('1489', '100000098', '84', '1', 'First', '2016-2017', '1', '86.4', 'Passed') ; 
INSERT INTO `studentsubjects` VALUES ('1490', '100000098', '85', '1', 'First', '2016-2017', '1', '87', 'Passed') ; 
INSERT INTO `studentsubjects` VALUES ('1491', '100000098', '86', '1', 'First', '2016-2017', '1', '87.8', 'Passed') ; 
INSERT INTO `studentsubjects` VALUES ('1492', '1000000156', '78', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1493', '1000000156', '79', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1494', '1000000156', '80', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1495', '1000000156', '81', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1496', '1000000156', '82', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1497', '1000000156', '83', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1498', '1000000156', '84', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1499', '1000000156', '85', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1500', '1000000156', '86', '1', 'First', '2016-2017', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1501', '1000000202', '135', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1502', '1000000202', '136', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1503', '1000000202', '137', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1504', '1000000202', '138', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1505', '1000000202', '139', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1506', '1000000202', '140', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1507', '1000000202', '141', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1508', '1000000202', '142', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1509', '1000000202', '143', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1510', '1000000203', '135', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1511', '1000000203', '136', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1512', '1000000203', '137', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1513', '1000000203', '138', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1514', '1000000203', '139', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1515', '1000000203', '140', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1516', '1000000203', '141', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1517', '1000000203', '142', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1518', '1000000203', '143', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1519', '1000000204', '135', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1520', '1000000204', '136', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1521', '1000000204', '137', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1522', '1000000204', '138', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1523', '1000000204', '139', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1524', '1000000204', '140', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1525', '1000000204', '141', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1526', '1000000204', '142', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1527', '1000000204', '143', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1528', '1000000205', '135', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1529', '1000000205', '136', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1530', '1000000205', '137', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1531', '1000000205', '138', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1532', '1000000205', '139', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1533', '1000000205', '140', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1534', '1000000205', '141', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1535', '1000000205', '142', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1536', '1000000205', '143', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1537', '1000000205', '135', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1538', '1000000205', '136', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1539', '1000000205', '137', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1540', '1000000205', '138', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1541', '1000000205', '139', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1542', '1000000205', '140', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1543', '1000000205', '141', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1544', '1000000205', '142', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1545', '1000000205', '143', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1546', '1000000207', '135', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1547', '1000000207', '136', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1548', '1000000207', '137', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1549', '1000000207', '138', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1550', '1000000207', '139', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1551', '1000000207', '140', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1552', '1000000207', '141', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1553', '1000000207', '142', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1554', '1000000207', '143', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1555', '1000000208', '135', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1556', '1000000208', '136', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1557', '1000000208', '137', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1558', '1000000208', '138', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1559', '1000000208', '139', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1560', '1000000208', '140', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1561', '1000000208', '141', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1562', '1000000208', '142', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1563', '1000000208', '143', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1564', '1000000209', '135', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1565', '1000000209', '136', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1566', '1000000209', '137', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1567', '1000000209', '138', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1568', '1000000209', '139', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1569', '1000000209', '140', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1570', '1000000209', '141', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1571', '1000000209', '142', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1572', '1000000209', '143', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1573', '1000000210', '135', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1574', '1000000210', '136', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1575', '1000000210', '137', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1576', '1000000210', '138', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1577', '1000000210', '139', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1578', '1000000210', '140', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1579', '1000000210', '141', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1580', '1000000210', '142', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1581', '1000000210', '143', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1582', '1000000211', '135', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1583', '1000000211', '136', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1584', '1000000211', '137', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1585', '1000000211', '138', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1586', '1000000211', '139', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1587', '1000000211', '140', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1588', '1000000211', '141', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1589', '1000000211', '142', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1590', '1000000211', '143', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1591', '1000000212', '135', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1592', '1000000212', '136', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1593', '1000000212', '137', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1594', '1000000212', '138', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1595', '1000000212', '139', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1596', '1000000212', '140', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1597', '1000000212', '141', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1598', '1000000212', '142', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1599', '1000000212', '143', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1600', '1000000213', '146', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1601', '1000000213', '147', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1602', '1000000213', '148', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1603', '1000000213', '149', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1604', '1000000213', '150', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1605', '1000000213', '151', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1606', '1000000213', '152', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1607', '1000000213', '153', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1608', '1000000213', '154', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1609', '100000080', '146', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1610', '100000080', '147', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1611', '100000080', '148', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1612', '100000080', '149', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1613', '100000080', '150', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1614', '100000080', '151', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1615', '100000080', '152', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1616', '100000080', '153', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1617', '100000080', '154', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1618', '1000000214', '206', '1', 'Second', '2025-2026', '1', '90', 'Passed') ; 
INSERT INTO `studentsubjects` VALUES ('1619', '1000000214', '207', '1', 'Second', '2025-2026', '1', '90', 'Passed') ; 
INSERT INTO `studentsubjects` VALUES ('1620', '1000000214', '208', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1621', '1000000214', '209', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1622', '1000000214', '210', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1623', '1000000214', '211', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1624', '1000000214', '212', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1625', '1000000214', '213', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1626', '1000000217', '286', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1627', '1000000217', '287', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1628', '1000000217', '288', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1629', '1000000217', '289', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1630', '1000000217', '290', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1631', '1000000217', '291', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1632', '1000000217', '292', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1633', '1000000217', '293', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1634', '1000000217', '294', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1635', '1000000217', '295', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1636', '1000000218', '286', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1637', '1000000218', '287', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1638', '1000000218', '288', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1639', '1000000218', '289', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1640', '1000000218', '290', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1641', '1000000218', '291', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1642', '1000000218', '292', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1643', '1000000218', '293', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1644', '1000000218', '294', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1645', '1000000218', '295', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1646', '1000000219', '286', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1647', '1000000219', '287', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1648', '1000000219', '288', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1649', '1000000219', '289', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1650', '1000000219', '290', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1651', '1000000219', '291', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1652', '1000000219', '292', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1653', '1000000219', '293', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1654', '1000000219', '294', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1655', '1000000219', '295', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1656', '1000000220', '304', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1657', '1000000220', '305', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1658', '1000000220', '306', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1659', '1000000220', '307', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1660', '1000000220', '308', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1661', '1000000220', '309', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1662', '1000000220', '310', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1663', '1000000220', '311', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1664', '1000000221', '286', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1665', '1000000221', '287', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1666', '1000000221', '288', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1667', '1000000221', '289', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1668', '1000000221', '290', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1669', '1000000221', '291', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1670', '1000000221', '292', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1671', '1000000221', '293', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1672', '1000000221', '294', '1', 'Second', '2025-2026', '1', '0', '') ; 
INSERT INTO `studentsubjects` VALUES ('1673', '1000000221', '295', '1', 'Second', '2025-2026', '1', '0', '') ;
#
# End of data contents of table studentsubjects
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `subject`
# --------------------------------------------------------


#
# Delete any existing table `subject`
#

DROP TABLE IF EXISTS `subject`;


#
# Table structure of table `subject`
#

CREATE TABLE `subject` (
  `SUBJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SUBJ_CODE` varchar(30) NOT NULL,
  `SUBJ_DESCRIPTION` varchar(255) NOT NULL,
  `UNIT` int(2) NOT NULL,
  `PRE_REQUISITE` varchar(30) NOT NULL DEFAULT 'None',
  `COURSE_ID` int(11) NOT NULL,
  `AY` varchar(30) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL,
  `PreTaken` tinyint(1) NOT NULL,
  PRIMARY KEY (`SUBJ_ID`),
  KEY `COURSE_ID` (`COURSE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=346 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table subject (287 records)
#
 
INSERT INTO `subject` VALUES ('8', 'English Plus', 'English Plus', '3', 'Nones', '30', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('14', 'NSTP1', 'National Service Training Program 1', '3', 'None', '53', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('15', 'PE1', 'Physical Education 1', '2', 'None', '53', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('16', 'HUMAN', 'Humanities', '3', 'None', '53', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('17', 'COMART2', 'Communication Arts 2', '3', 'COMART1', '53', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('18', 'COPRO-2', 'Computer Programming 2', '4', 'COPRO1', '53', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('19', 'DATSTRUC', 'Data Structures', '4', 'COPRO1', '53', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('20', 'DISTRUC', 'Discrete Structure', '3', 'ALGEBRA', '53', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('21', 'NSTP2', 'National Service Training Program 2', '3', 'None', '53', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('22', 'INTROART', 'Introduction to Arts', '3', 'None', '53', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('23', 'PE2', 'Physical Education 2', '2', 'PE1', '53', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('24', 'TRIGO', 'Trigonometry', '3', 'ALGEBRA', '53', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('25', 'COMART3', 'Communication Arts 3', '3', 'COMART2', '54', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('26', 'COPRO-3', 'Computer Programming 3', '4', 'COPRO2', '54', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('27', 'LOGIC', 'Logic Design and Switching', '3', 'DISTRUC', '54', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('28', 'PHILGOV', 'Philippine Government', '3', 'None', '54', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('29', 'PHYSICS1', 'Physics 1', '4', 'None', '54', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('30', 'STAT', 'Statistics', '3', 'ALGEBRA', '54', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('31', 'SOCSTUD', 'Social Studies', '3', 'None', '54', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('32', 'PE3', 'Physical Education 3', '2', 'PE1', '54', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('33', 'COMART4', 'Communication Arts 4', '3', 'COMART3', '54', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('34', 'ASSEM', 'Assembly Language', '4', 'LOGIC', '54', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('35', 'PHILO', 'Philosophy', '3', 'None', '54', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('36', 'SADSIGN', 'System Analysis and Design', '3', 'COPRO1', '54', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('37', 'PHYSICS2', 'Physics 2', '4', 'Physics 1', '54', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('38', 'DBSYS', 'Theory Database Systems', '3', 'DATSTRUC', '54', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('39', 'PE4', 'Physical Education 4', '2', 'PE1', '54', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('40', 'Eng 111', 'CommunicationArts 1', '3', 'none', '30', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('41', 'Fil 111', 'Kom sa Akad. Fil', '3', 'NONE', '30', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('42', 'Math 1', 'Basic math ', '3', 'NONE', '30', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('43', 'SCE 111', 'Earth Science', '3', 'NONE ', '30', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('44', 'Lit 111', 'Philippines Literature ', '3', 'NONE', '30', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('45', 'Rdg 1', 'Dev. Reading 1', '3', 'NONE', '30', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('46', 'Psych 116', 'General Psychology', '3', 'NONE', '30', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('47', 'PE 111', ' Physical Fitness', '2', 'NONE', '30', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('48', 'NSTP 111', 'National Service training program 1 ', '3', 'NONE', '30', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('49', 'Eng 211', 'speech & oral communication', '3', 'Eng 121', '31', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('50', 'Fil 211', 'Masining na pagpapahayag', '3', 'Fil 121', '31', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('51', 'Lit 121 ', 'World literature', '3', 'Lit 111', '31', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('52', 'SocSci 132', 'Rizal & other heroes ', '3', 'NONE', '31', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('53', 'Ed 211', 'Child & adolescent Psychology', '3', 'Psyh 116', '31', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('54', 'Ed 212', 'Education Technology 1', '3', 'NONE', '31', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('55', 'FS 1', 'Observation of learners Dev\'t & the school enviroment  ', '3', 'NONE', '31', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('56', 'Eng 212', 'The Teaching Of speaking ', '3', 'NONE ', '31', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('57', 'Eng 213', 'The teaching of lsting & Rdg.', '2', 'NONE', '31', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('58', 'PE 211', 'Team sports', '2', 'PE 121 ', '31', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('59', 'Stat 115', 'Intro. to Statistics ', '3', 'NONE', '32', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('60', 'Ed 311', 'The teaching profession ', '3', 'NONE', '32', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('61', 'Ed 312', 'Assessment of Teaching 2 ', '3', 'Ed 221', '32', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('62', 'Ed 313', 'Principles of teaching', '3', 'Ed 224', '32', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('63', 'FS 3', 'Micro-Teaching &the  use of technology', '1', 'FS 2', '32', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('64', 'Eng 311', 'Arfo- Asian Literature ', '3', 'NONE ', '32', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('65', 'Eng 312', 'Introduction to Stylistics ', '3', 'NONE', '32', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('66', 'Eng 313', 'Translating & Editing of  text ', '3', 'NONE', '32', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('67', 'Eng 314', 'Teaching Literature', '3', 'NONE', '32', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('68', 'Ed 314', ' Teaching Multigrade Class', '1', 'NONE', '32', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('69', 'Ed 412', 'Use of popular Media ', '1', 'NONE', '33', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('70', 'FS 5', 'Assestment of student Learning ', '1', 'FS 4', '33', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('71', 'FS 6 ', 'Becoming a Teacher', '1', 'FS 5', '33', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('72', 'Hum116', 'Art , Man & Society', '3', 'Hum 111', '33', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('73', 'Eng 411', 'language & literature assestment', '3', 'NONE', '33', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('74', 'Eng 412', 'lang. Curr. for sec. sch.', '3', 'NONE', '33', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('75', 'Eng 413', 'Literary Criticism ', '3', 'NONE', '33', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('76', 'Eng 414', 'Language Research ', '3', 'NONE', '33', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('77', 'Eng 415', 'Dramatic & Stagecrafts', '3', 'NONE ', '33', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('79', 'Eng 111', 'Communication Arts', '3', 'None', '42', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('80', 'Fil 111', 'Kom. sa Akad. Fil', '3', 'None', '42', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('81', 'Math 1', 'Basic Math', '3', 'None', '42', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('82', 'SCE 111', 'Earth Science', '3', 'None', '42', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('83', 'Read 1', 'Dev. Reading 1', '3', 'None', '42', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('84', 'Psych 116', 'General Psycology', '3', 'None', '42', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('85', 'PE 111', 'Physical Fitness', '2', 'None', '42', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('86', 'NSTP 111', 'Nat\'l Service Trng. Prog. 1', '3', 'None', '42', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('87', 'Eng 211', 'Speech and Oral Communication', '3', 'Eng 121', '43', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('88', 'Fil 211', 'Masining na Pagpapahayag', '3', 'Fil 121', '43', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('89', 'Lit 121', 'World Literature', '3', 'Lit 111', '43', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('90', 'SocSci 132', 'Rizal and Other Heroes', '3', 'None', '43', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('93', 'FS 1', 'Observation of Learning Dev\'t and the School Environment', '1', 'None', '43', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('94', 'Eng 212', 'The Teaching of Speaking', '3', 'Eng 121', '43', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('95', 'Math 3', 'Elem. Theory of Numbers', '3', 'Math 2', '43', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('96', 'PE 211', 'Team Sports', '2', 'PE 121', '43', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('97', 'JEEP Start 1', ' ', '3', 'None', '43', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('98', 'Stat 115', 'Intro. To Statistics', '3', 'None', '44', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('99', 'Ed 311', 'The Teaching Profession', '3', 'Ed 221', '44', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('100', 'Ed 312', 'Assessment of Student Lrng. 1', '3', 'Ed 221', '44', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('101', 'Ed 313', 'Priciples of Teaching 2', '3', 'Ed 224', '44', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('102', 'FS 3', 'Micro-Teaching and the use of Technology', '3', 'FS 2', '44', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('103', 'SocSci 311', 'Basic Geography', '3', 'None', '44', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('105', 'Fil 311', 'Pagpapahalagang Pampanitikan', '3', 'Fil 221', '44', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('106', 'Math 5', 'Elementary Algebra', '3', 'None', '44', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('107', 'Ed 314', 'Tchg. Multigrade Class', '1', 'Ed 221, Ed 222', '44', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('108', 'Ed 412', 'Use of Popular Media', '1', 'None', '45', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('109', 'FS 5', 'Assmt. of Study Learning', '1', 'FS 4', '45', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('110', 'FS 6', 'Becoming a Teacher', '1', 'FS 5', '45', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('111', 'Hum 116', 'Art, Man and Society', '3', 'Hum 111', '45', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('112', 'Math 6', 'Mthds and Strat in Teaching Math', '3', 'Math 5', '45', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('113', 'SocSci 411', 'Geog. and Nat Res of Phil', '3', 'SocSci311', '45', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('114', 'HELE 111', 'Home Economic and Livinhood Eductaion', '3', 'None', '45', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('115', 'FS PT', 'Practice Teaching(Whole Day)', '6', 'FS 6', '45', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('116', 'Ed 320', 'Methods of Research', '3', 'Stat 115', '44', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('117', 'Ed 321', 'Social Dimension of Educ.', '3', 'Ed 312', '44', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('118', 'Ed 322', 'Assessment of Study Lrng.', '3', 'Ed 312', '44', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('119', 'Ed 323', 'Environment Educ.', '1', 'None', '44', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('120', 'FS 4', 'Team Teaching: Exploring the Curr.', '1', 'FS 3', '44', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('121', 'Lit 321', 'Children\'s Literature', '3', 'None', '44', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('122', 'Eng 321', 'Remedial Inst\'n in Eng', '3', 'None', '44', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('123', 'Hum 111', 'Intro. to Humanities', '3', 'None', '44', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('125', 'Phys 1', 'Fundamental of Physics', '3', 'None', '44', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('126', 'Ed 221', 'Facilitating Learning', '3', 'Ed 211', '43', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('127', 'Ed 222', 'Educational Technology 2', '3', 'Ed 212', '43', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('128', 'Ed 223', 'Curriculum Development', '3', 'None', '43', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('129', 'FS 2', 'Classroom Mgt. Skill', '1', 'FS 1', '43', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('130', 'Eng 221', 'Creative Writing', '3', 'Eng 121', '43', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('131', 'Fil 221', 'Kontem Panitikang Fil', '3', 'None', '43', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('132', 'Math 4', 'Plans and Solid Geometry', '3', 'Math 3', '43', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('133', 'PE 221', 'Recreational Activities', '2', 'PE 211', '43', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('134', 'JEEP Start 1', ' ', '3', 'None', '43', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('135', 'Eng 121', 'Writing in the Disc.', '3', 'Eng 111', '42', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('136', 'Fil 121', 'Pagbasa at Pagsulat', '3', 'Fil 111', '42', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('138', 'SCE 121', 'Survey of BioSci', '3', 'None', '42', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('139', 'SCE 122', 'Astronomy', '3', 'None', '42', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('140', 'Lit 111', 'Philippine Literature', '3', 'None', '42', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('141', 'Read 2', 'Development Rdg. 2', '3', 'Read 1', '42', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('142', 'PE 121', 'Rhythmic Activities', '2', 'PE 111', '42', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('143', 'NSTP 121', 'Nat\'l Service Trang. Prog. 2', '3', 'NSTP 111', '42', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('144', 'Eng 411', 'Lang. and Lit, Assessmet', '3', 'None', '45', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('146', 'Eng 121', 'Writing in Disc.', '3', 'Eng 111', '30', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('147', 'Fil 121', 'Pagbasa at Pagsulat', '3', 'Fil 111', '30', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('148', 'Math 2', 'Contemporary Math', '3', 'Math 1', '30', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('149', 'Sce 121', 'Survey of BioSci', '3', 'None', '30', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('150', 'Econ 110', 'Prin. Econ/AgRfrm Tax Coop', '3', 'None', '30', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('151', 'CS 113', 'Basic Software Pkge. w/ Internet Application', '3', 'None', '30', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('152', 'Socio 115', 'Culture, Soc. and Fam w/ ARH', '3', 'None', '30', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('153', 'PE 121', 'Rhythmic Activities', '2', 'PE 111', '30', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('154', 'NSTP 121', 'Nat\'l. Service Trng. Prog. 2', '3', 'NSTP 111', '30', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('155', 'Ed 221', 'Facilitating Learning', '3', 'Ed 211', '31', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('156', 'Ed 222', 'Educational Technology 2', '3', 'Ed 212', '31', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('157', 'Ed 223', 'Curriculum Development', '3', 'None', '31', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('158', 'Ed 224', 'Principles of Teaching 1', '3', 'None', '31', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('159', 'FS 2', 'Classroom Mgt. Skills', '1', 'FS 1', '31', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('160', 'Eng 221', 'Intro. to Linguistics', '3', 'None', '31', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('161', 'Eng 222', 'Campus Journalism', '3', 'None', '31', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('162', 'Eng 223', 'Creative Writing', '3', 'None', '31', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('163', 'Eng 224', 'Eng and Americal Lit.', '3', 'None', '31', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('164', 'PE 221', 'Recreational Activities', '2', 'PE 211', '31', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('165', 'Ed 320', 'Methods of Research', '3', 'Stat 115', '32', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('166', 'Ed 322', 'Assessment of Stud. Lrng 2', '3', 'Ed 312', '32', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('167', 'FS 4', 'Team Tchng: Exploring the Curr.', '1', 'FS 3', '32', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('168', 'Ed 321', 'Social Dimension of Educ. ', '3', 'Ed 311', '32', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('169', 'Ed 323', 'Environment Educ.', '1', 'None', '32', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('170', 'Eng 321', 'Remedial Instr\'n in Eng', '3', 'None', '32', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('171', 'Eng 323', 'Structure of English', '3', 'None', '32', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('172', 'Eng 324', 'Mythology and Folklore', '3', '3', '32', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('173', 'Eng 325', 'Eng for Specific Purpose', '3', 'None', '32', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('174', 'Eng 322', 'Prep. and Evaluation of Instructional Materials', '3', 'None', '32', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('175', 'FS PT', 'Practice Teaching(Whole Day)', '6', 'FS 5, FS 6', '33', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('176', 'Eng 111', 'Communication Skills', '3', '', '21', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('177', 'Fil 111', 'Komunikasyon sa akademikong Pilipino', '3', 'None', '21', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('178', 'Math 111', 'College Algebra', '3', '', '21', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('179', 'CS 111', 'Basic software Package & Internet Application ', '3', 'None ', '21', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('180', 'Acctg 201', 'Fundamentals of Accounting 1', '3', 'None', '21', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('181', 'PE 111', 'physical Fitness', '2', 'None ', '21', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('182', 'NSTP 111', 'national Service trng. Prog', '3', 'None', '21', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('183', 'Hum 111', 'Art Man and Society', '3', 'None ', '57', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('184', 'Econ 111', 'Intro. To Economics w/ LRT', '3', 'None', '57', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('185', 'Psycho 111', 'General Psychology', '3', 'None', '57', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('186', 'Math 117', 'Calculus for Business', '3', 'math 111', '57', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('187', 'Acctg 211', 'Financial Acctg & Reporting ', '3', 'Acctg 202', '57', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('188', 'Hist 111', 'Phil History w/ politics and gov\'t', '3', 'None', '57', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('189', 'Eng 113', 'Speech and oral com.', '3', 'Eng 112', '57', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('190', 'PE 113', 'Team Sports ', '2', 'PE 111', '57', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('191', 'Eng 114', 'Technical writng ', '3', 'Eng 113', '58', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('192', 'Mgt 211', 'Human Behavior in Organization ', '3', 'Mgt 111', '58', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('193', 'Cost 211', 'Cost Acctg & Cost Mgt. 1', '3', 'Acctg 212', '58', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('194', 'Econ 114', 'MicroEconomic theory & Prac.', '3', 'Econ 112', '58', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('195', 'CS 212', 'Funfd. of info. sys. Dev\'t', '3', 'CS 211', '58', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('196', 'Law 211', 'law on Obiligation & contracts', '3', 'None', '58', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('197', 'Pol Sci 211', 'Good Governance & Social Resp', '3', 'Hist 111', '58', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('198', 'Math 211', 'Quantitative Techniques in Business', '3', 'Stat 113', '58', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('199', 'Econ 114', 'Management Economics ', '3', 'Econ 113', '59', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('200', 'Entrep 212', 'Phil. business enviroment', '3', 'Econ 113', '59', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('201', 'Law 213', 'Law on sales, labor & other Comi. laws', '3', 'Law 212', '59', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('202', 'Nat Sci 112', 'Physical Science ', '3', 'Nat sci 113', '59', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('203', 'Entrep 213', 'Entrepreneurial Business Mgt', '3', 'Entrep 211', '59', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('204', 'Soc Sci 111', 'Life & Works of Rizal', '3', 'None', '59', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('205', 'Bre 212', 'Business Research 11', '3', 'bre 111', '59', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('206', 'Eng 112', 'Writing in the Dicipline ', '3', 'Eng 111', '21', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('207', 'Fil 112', 'Pagbasa at Pagsulat tungo sa pananaliksik', '3', 'Fil 111', '21', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('208', 'Math 113', 'Mathematics of investment', '3', 'Math 111', '21', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('209', 'CS 211', 'fund. Programming & database theory & appli.', '3', 'CS 111', '21', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('210', 'Mgt 111', 'Principles of mgt. & Oraganization ', '3', 'None ', '21', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('211', 'Acctg 202', 'Fundimentals of Accounting  11', '3', 'Acctg 201', '21', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('212', 'PE 112', 'Rhythmic Activities ', '2', 'PE 111', '21', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('213', 'NSTP 112', 'Nat.Service trng Prog. 2', '3', 'NSTP 111', '21', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('215', 'Mktg 111', 'Principles of Marketing', '3', 'Mgt 111', '57', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('216', 'Econ 112', 'Microeconomics Theory & Practice', '3', 'Econ111', '57', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('217', 'Philos111', 'Philosophy, Values Ed. & works Ethics', '3', 'None', '57', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('218', 'Stat 113', 'Business Stat w/ Comp. App.', '3', 'Math 113', '57', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('219', 'Acctg 212', 'Financial Accounting and Report II', '6', 'Acctg 211', '57', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('220', 'Lit 111', 'Philippine Literature', '3', 'Eng 112', '57', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('221', 'Nat Sci', 'Siological Science', '3', 'none', '57', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('222', 'PE 114', 'Recreational Activities', '2', 'PE 111', '57', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('231', 'CS 213', 'Accounting Information System', '3', 'CS 212', '58', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('232', 'Bre 111', 'Business Research 1', '3', 'None', '58', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('233', 'Mgt 212', 'Mgt. Planning & Central Operation', '3', 'Mgt 111', '58', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('234', 'Entrep 211', 'Industrial Relations', '3', 'Mgt 211', '58', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('235', 'Law 212', 'Law on Business organization', '3', 'Law 211', '58', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('236', 'Tax 211', 'Income Taxation', '3', 'Acctg 212', '58', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('237', 'Mgt 213', 'Production and opreations Mgt.', '3', 'Stat 113', '58', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('238', 'Cost 212', 'Cost Acctg & Cost Mgt. II', '3', 'Cost 211', '58', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('246', 'Socio 111', 'Society and culture with family planning', '3', 'none', '59', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('247', 'Entrep 214', 'Sales management', '3', 'Entrep 213', '59', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('248', 'Mgt 215', 'Business policies and formulation', '3', 'none', '59', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('249', 'Tax 212', 'Business and Transfer Taxes', '3', 'Tax 2111', '59', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('250', 'Entrep 215', 'Strategic marketing management', '3', 'Mktg 211', '59', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('251', 'OJT 211', 'On job training (200 hours)', '3', 'None', '59', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('252', 'Eng 111', 'Communication Arts 1', '3', 'None', '60', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('253', 'Fil 111', 'Komunikasyon Sa akademikong Filipino ', '3', 'None', '60', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('254', 'Math 111', 'College Algebra', '3', 'None', '60', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('255', 'Psycho 111', 'Gen & Criminal Psychology w/ TVET', '3', 'None ', '60', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('256', 'Crim 211', 'Intro to Criminology', '3', 'None', '60', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('257', 'Hist 111', 'Phillippine History', '3', 'None', '60', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('259', 'PE 111', 'Fundamentals of Matial Arts', '2', 'None', '60', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('260', 'NSTP 111', 'Military Science 11', '3', 'None', '60', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('261', 'Eng 113', 'Technical Report Writing ', '3', 'Eng 112', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('262', 'LEA 213', 'Industrial Sec. Mgt w/ TVET', '3', 'None ', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('263', 'CLJ 211', 'Criminal Law (Book 1)', '3', 'None', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('264', 'Socio 111', 'Society & Culture w/ Pop Ed.', '3', 'None', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('265', 'Econ 111', 'Basic Economics w/ TAR', '3', 'None ', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('266', 'Crimtic 211', 'Personnel Idenfication w/ TVET ', '3', 'None', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('267', 'CS 111', 'Basic Software Pkcg Int. Application', '3', 'None', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('268', 'FIl 113', 'Masining na pagpapahayag', '3', 'Fil 112', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('269', 'PE 211', 'First Aid & water Survival ', '2', 'PE 121', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('278', 'CDI 215', 'Court Testimony', '3', 'CLJ 211', '63', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('279', 'CDI 217', 'Fire Tech & Arson Investigation ', '3', 'None', '63', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('280', 'LEA 217', 'Police Intellegence', '3', 'None', '63', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('281', 'LEA 218', 'International Policing ', '3', 'None', '63', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('282', 'PerDev 111', 'Personality Development ', '3', 'None', '63', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('283', 'Crim 215', 'Criminology  Research & Stat', '3', 'None ', '63', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('284', 'CLJ 214', 'Criminal Evidence ', '3', 'CLJ 211', '63', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('285', 'Review 211', 'Refresher Evidence 1', '3', 'None', '63', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('286', 'Eng 112', 'Speech and oral Com.', '3', 'Eng 111', '60', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('287', 'Fil 120', 'Pagbasa at pagsulat tungo sa pananaliksik', '3', 'Fil 111', '60', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('288', 'Math 121', 'Plane trigonometry', '3', 'Math 111', '60', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('289', 'LEA 211', 'PHIL Criminal justice', '3', 'Crim 211', '60', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('290', 'LEA 212', 'Police or. and administration', '2', 'none', '60', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('291', 'Ethics 111', 'Ethics and values', '3', 'none', '60', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('292', 'Pol Sci 111', 'Pol, Sci and Phil. Constitution', '3', 'none', '60', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('293', 'Hum 111', 'Logic ', '3', 'none', '60', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('294', 'PE 112', 'Disarming technique', '2', 'PE 111', '60', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('295', 'NSTP 121', 'Military Science 12', '3', 'MS 11', '60', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('296', 'Eng 113', 'Technical report wriring', '3', 'English 112', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('297', 'LEA 213', 'Industrial Sec. Mgt with TVET', '3', 'None', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('298', 'CLJ 211', 'Criminal Law (Book 1)', '3', 'none', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('300', 'Econ 111', 'Basic economics', '2', 'none', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('301', 'Crimtic 211', 'Basic Software pckg int App', '2', 'none', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('302', 'Fil 113', 'Masining na paglalayag', '3', 'Fil 112', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('303', 'PE 211', 'First Aid and water survival', '2', 'PE 211', '61', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('304', 'Eng 114', 'Technical report writing 2', '3', 'none', '61', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('305', 'Crim 213', 'Juvenile Deliquency and crime prevention', '3', 'none', '61', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('306', 'CDI 2111', 'Police patrol operation', '3', 'none', '61', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('307', 'Crimtic 212', 'Poloice photography', '3', 'none', '61', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('308', 'LEA 215', 'Fund of criminal investigation', '3', 'none', '61', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('309', 'SMGT 112', 'Security Mgt Services', '3', 'none', '61', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('310', 'PE 114', 'Marmanship and combat shooting', '2', 'none', '61', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('311', 'OJT', 'On job training', '2', 'none', '61', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('312', 'LEA 214', 'Police Comparative System', '3', 'none', '62', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('313', 'LEA 216', 'Police personnel and record mgt.', '3', 'none', '62', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('314', 'CLJ 212', 'Criminal law (Book 2)', '3', 'none', '62', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('315', 'Chem 111', 'General Chemistry', '3', 'none', '62', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('316', 'CDI 212', 'traffic Mgt. and accident investigation', '2', 'none', '62', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('317', 'Crimtic 213', 'Forensic ballistic', '2', 'none', '62', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('318', 'Crimtic 214', 'Questioned Document', '3', 'none', '62', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('319', 'CDI 211', 'Institutional Correction', '3', 'none', '62', '', 'First', '0') ; 
INSERT INTO `subject` VALUES ('320', 'Crimtic 215', 'Polgraphy ', '3', 'none', '62', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('321', 'LEA 219', 'Police Planning', '3', 'none', '62', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('322', 'CLJ 213', 'Criminal procedure', '3', 'CLJ 212', '62', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('323', 'Chem 211', 'Forensic chem and toxiclology', '3', 'Chem 111', '62', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('324', 'CDI 216', 'White collar crime', '3', 'none', '62', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('325', 'CDI 214', 'Organized crime', '3', 'none', '62', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('326', 'Crimtic 216', 'Legal medicine', '3', 'none', '62', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('327', 'CA 212', 'Non Institutional Correction', '3', 'CA  212', '62', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('328', 'Prac 1 & 2', 'ON JOB TRAINING', '6', 'none', '63', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('329', 'Review 211', 'Refreseher Course', '3', 'none', '63', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('330', 'FTS 11', 'Field trip seminar', '3', 'none', '63', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('344', 'Ed 224', 'principles of teaching 1', '3', 'None', '43', '', 'Second', '0') ; 
INSERT INTO `subject` VALUES ('345', 'Fin 111', 'Basic Finance', '3', 'None', '21', '', 'First', '0') ;
#
# End of data contents of table subject
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblauto`
# --------------------------------------------------------


#
# Delete any existing table `tblauto`
#

DROP TABLE IF EXISTS `tblauto`;


#
# Table structure of table `tblauto`
#

CREATE TABLE `tblauto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `autocode` varchar(255) DEFAULT NULL,
  `autoname` varchar(255) DEFAULT NULL,
  `appendchar` varchar(255) DEFAULT NULL,
  `autostart` int(11) DEFAULT 0,
  `autoend` int(11) DEFAULT 0,
  `incrementvalue` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `autocode` (`autocode`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ;

#
# Data contents of table tblauto (4 records)
#
 
INSERT INTO `tblauto` VALUES ('1', 'Asset', 'Asset', 'ASitem', '0', '3', '1') ; 
INSERT INTO `tblauto` VALUES ('2', 'Trans', 'Transaction', 'TrAnS', '1', '5', '1') ; 
INSERT INTO `tblauto` VALUES ('3', 'SIDNO', 'IDNO', '2015', '1000000', '232', '1') ; 
INSERT INTO `tblauto` VALUES ('4', 'EMPLOYEE', 'EMPID', '020010', '0', '2', '1') ;
#
# End of data contents of table tblauto
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblauto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblinstructor`
# --------------------------------------------------------


#
# Delete any existing table `tblinstructor`
#

DROP TABLE IF EXISTS `tblinstructor`;


#
# Table structure of table `tblinstructor`
#

CREATE TABLE `tblinstructor` (
  `INST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INST_NAME` varchar(90) NOT NULL,
  `INST_MAJOR` varchar(90) NOT NULL,
  `INST_CONTACT` varchar(30) NOT NULL,
  PRIMARY KEY (`INST_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table tblinstructor (32 records)
#
 
INSERT INTO `tblinstructor` VALUES ('1', 'Joker Villanueva', 'None', '091873648495') ; 
INSERT INTO `tblinstructor` VALUES ('2', 'Melanie M. Katigbak', 'English', '09801127665') ; 
INSERT INTO `tblinstructor` VALUES ('3', 'Kenneth John L. Mayo', 'None', '09097767654') ; 
INSERT INTO `tblinstructor` VALUES ('4', 'Cliff A. Belano', 'Science', '09347787366') ; 
INSERT INTO `tblinstructor` VALUES ('5', 'Heidi U. Ignacio', 'Home Economics', '09127767746') ; 
INSERT INTO `tblinstructor` VALUES ('6', 'Lorelie B. Bustos', 'Science', '09127738774') ; 
INSERT INTO `tblinstructor` VALUES ('7', 'Jenard G. Ticong', 'Industrial Arts', '09127786774') ; 
INSERT INTO `tblinstructor` VALUES ('8', 'Gina D. Parilla', 'English', '09887764746') ; 
INSERT INTO `tblinstructor` VALUES ('9', 'Fernando R. Reyes', 'Science', '09127787654') ; 
INSERT INTO `tblinstructor` VALUES ('10', 'Virgil K. Delatin', 'None', '09127787664') ; 
INSERT INTO `tblinstructor` VALUES ('11', 'Lovelyn A. Durano', 'Filipino', '09667877637') ; 
INSERT INTO `tblinstructor` VALUES ('12', 'Ramon Alamda', 'Science', '09275663345') ; 
INSERT INTO `tblinstructor` VALUES ('13', 'Richard Alamada', 'None', '09264566789') ; 
INSERT INTO `tblinstructor` VALUES ('14', 'Daemon Gomez', 'Home Economics', '09098756443') ; 
INSERT INTO `tblinstructor` VALUES ('15', 'Noemi Mangelen', 'Social Studies', '09265644765') ; 
INSERT INTO `tblinstructor` VALUES ('16', 'Kenneth Almazan', 'Home Economics', '09254566451') ; 
INSERT INTO `tblinstructor` VALUES ('17', 'Rene Alabra', 'None', '09256744585') ; 
INSERT INTO `tblinstructor` VALUES ('18', 'Regine Razor', 'English', '09267544673') ; 
INSERT INTO `tblinstructor` VALUES ('19', 'Shai Regardos', 'Science', '09265473223') ; 
INSERT INTO `tblinstructor` VALUES ('20', 'Hana James', 'Home Economics', '09287656778') ; 
INSERT INTO `tblinstructor` VALUES ('21', 'Amy Musali', 'Social Studies', '09098756772') ; 
INSERT INTO `tblinstructor` VALUES ('22', 'Fhai Kilosyo', 'Home Economics', '09278744678') ; 
INSERT INTO `tblinstructor` VALUES ('23', 'Kim Fajardo', 'Social Studies', '09275644563') ; 
INSERT INTO `tblinstructor` VALUES ('24', 'Hana Hugo', 'English', '09098767445') ; 
INSERT INTO `tblinstructor` VALUES ('25', 'Johari Samadalan', 'Science', '09254675334') ; 
INSERT INTO `tblinstructor` VALUES ('26', 'Kinohi Arakashi', 'Science', '09256734876') ; 
INSERT INTO `tblinstructor` VALUES ('27', 'Sharmine Hidalgo', 'Filipino', '09264734621') ; 
INSERT INTO `tblinstructor` VALUES ('28', 'Tantan Exiomo', 'English', '09253234532') ; 
INSERT INTO `tblinstructor` VALUES ('29', 'Gerald Bustos', 'English', '09284537593') ; 
INSERT INTO `tblinstructor` VALUES ('30', 'Kay Abad', 'Home Economics', '09287635452') ; 
INSERT INTO `tblinstructor` VALUES ('31', 'Recardo Piang', 'English', '09264537432') ; 
INSERT INTO `tblinstructor` VALUES ('32', 'Edgard Sumayaw', 'Industrial Arts', '09276438532') ;
#
# End of data contents of table tblinstructor
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblauto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblinstructor`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbllogs`
# --------------------------------------------------------


#
# Delete any existing table `tbllogs`
#

DROP TABLE IF EXISTS `tbllogs`;


#
# Table structure of table `tbllogs`
#

CREATE TABLE `tbllogs` (
  `LOGID` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` int(11) NOT NULL,
  `LOGDATETIME` datetime NOT NULL,
  `LOGROLE` varchar(55) NOT NULL,
  `LOGMODE` varchar(55) NOT NULL,
  PRIMARY KEY (`LOGID`)
) ENGINE=InnoDB AUTO_INCREMENT=761 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table tbllogs (725 records)
#
 
INSERT INTO `tbllogs` VALUES ('1', '1', '2016-09-22 21:46:01', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('2', '100000022', '2016-09-22 21:46:29', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('3', '100000015', '2016-09-23 05:00:38', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('4', '100000015', '2016-09-23 05:00:45', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('5', '100000025', '2016-09-23 05:02:31', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('6', '100000025', '2016-09-23 05:02:55', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('7', '100000025', '2016-09-23 05:03:53', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('8', '100000025', '2016-09-23 05:11:40', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('44', '1', '2016-09-28 15:59:30', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('45', '100000071', '2016-09-28 16:03:54', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('46', '100000071', '2016-09-28 16:08:44', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('47', '1', '2016-09-28 16:35:55', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('48', '1', '2016-09-28 16:36:01', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('49', '1', '2016-09-28 16:37:41', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('50', '2', '2016-09-28 16:37:46', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('51', '2', '2016-09-28 16:37:53', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('52', '2', '2016-09-28 16:38:00', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('53', '1', '2016-09-28 16:38:05', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('54', '1', '2016-09-28 16:38:19', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('55', '2', '2016-09-28 16:38:25', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('56', '2', '2016-09-28 16:38:34', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('57', '1', '2016-09-28 16:38:44', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('58', '1', '2016-09-28 17:11:31', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('59', '1', '2016-09-28 17:12:57', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('60', '2', '2016-09-28 17:13:03', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('61', '2', '2016-09-28 17:13:22', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('62', '1', '2016-09-28 17:16:24', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('63', '100000073', '2016-09-29 00:09:36', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('64', '100000076', '2016-09-29 02:28:04', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('65', '2', '2016-09-29 03:16:04', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('66', '2', '2016-09-29 03:59:22', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('67', '2', '2016-09-29 04:48:52', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('68', '100000079', '2016-09-29 04:49:11', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('69', '100000080', '2016-09-29 04:53:17', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('70', '100000073', '2016-09-29 04:53:53', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('71', '2', '2016-09-29 05:29:19', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('72', '2', '2016-09-29 05:29:32', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('73', '1', '2016-09-29 05:29:42', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('74', '100000073', '2016-09-29 05:30:16', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('75', '100000080', '2016-09-29 05:30:25', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('76', '1', '2016-09-29 07:19:58', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('77', '2', '2016-09-29 08:48:03', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('78', '2', '2016-09-29 08:49:03', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('79', '1', '2016-09-29 08:49:32', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('80', '100000081', '2016-09-29 08:53:32', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('81', '100000079', '2016-09-29 08:53:55', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('82', '100000079', '2016-09-29 10:15:53', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('83', '100000083', '2016-09-29 10:20:12', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('84', '100000084', '2016-09-29 10:23:29', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('85', '100000085', '2016-09-29 10:28:26', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('86', '100000086', '2016-09-29 10:31:39', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('87', '100000087', '2016-09-29 10:35:43', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('88', '100000086', '2016-09-29 10:35:51', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('89', '100000086', '2016-09-29 10:40:03', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('90', '100000073', '2016-09-29 10:40:10', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('91', '100000073', '2016-09-29 10:40:41', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('92', '100000081', '2016-09-29 10:43:26', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('93', '100000081', '2016-09-29 10:46:48', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('94', '1', '2016-09-29 10:47:56', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('95', '2', '2016-09-29 10:48:02', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('96', '2', '2016-09-29 10:48:22', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('97', '1', '2016-09-29 10:48:29', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('98', '100000088', '2016-09-29 10:50:11', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('99', '100000073', '2016-09-29 10:50:18', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('100', '100000073', '2016-09-29 11:01:04', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('101', '100000090', '2016-09-29 11:02:07', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('102', '100000091', '2016-09-29 11:06:07', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('103', '100000086', '2016-09-29 11:06:17', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('104', '100000086', '2016-09-29 11:06:53', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('105', '100000073', '2016-09-29 11:07:02', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('106', '100000073', '2016-09-29 11:07:20', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('107', '100000092', '2016-09-29 11:30:44', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('108', '100000093', '2016-09-29 11:34:39', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('109', '100000073', '2016-09-29 11:36:12', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('110', '100000073', '2016-09-29 11:36:17', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('111', '100000094', '2016-09-29 11:37:59', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('112', '100000094', '2016-09-29 11:38:09', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('113', '100000094', '2016-09-29 11:40:37', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('114', '100000095', '2016-09-29 11:42:30', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('115', '100000096', '2016-09-29 11:44:16', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('116', '100000097', '2016-09-29 11:46:46', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('117', '100000098', '2016-09-29 11:57:01', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('118', '100000099', '2016-09-29 11:58:45', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('119', '100000099', '2016-09-29 11:58:52', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('120', '100000099', '2016-09-29 11:58:58', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('121', '1000000100', '2016-09-29 12:01:01', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('122', '1000000101', '2016-09-29 12:02:54', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('123', '1000000102', '2016-09-29 12:04:18', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('124', '1000000103', '2016-09-29 12:07:27', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('125', '1000000104', '2016-09-29 12:08:50', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('126', '1000000105', '2016-09-29 12:10:44', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('127', '1000000106', '2016-09-29 12:13:13', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('128', '1000000107', '2016-09-29 12:14:57', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('129', '1000000108', '2016-09-29 12:16:53', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('130', '1', '2016-09-29 16:37:39', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('131', '1', '2016-09-29 16:38:17', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('132', '1', '2016-09-29 16:38:21', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('133', '1', '2016-09-29 16:39:19', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('134', '1', '2016-09-29 16:39:23', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('135', '1000000109', '2016-09-29 16:49:15', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('136', '100000073', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('137', '100000073', '2016-09-29 17:07:59', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('138', '100000073', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('139', '1', '2016-09-29 17:53:03', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('140', '100000073', '2016-09-29 18:09:53', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('141', '1000000110', '2016-09-29 18:15:25', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('142', '1000000111', '2016-09-29 18:19:26', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('143', '1000000112', '2016-09-29 18:22:58', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('144', '1000000113', '2016-09-29 18:25:01', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('145', '1000000114', '2016-09-29 18:26:55', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('146', '1000000115', '2016-09-29 18:28:09', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('147', '1000000116', '2016-09-29 18:29:09', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('148', '1000000117', '2016-09-29 18:31:08', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('149', '1000000118', '2016-09-29 18:32:45', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('150', '1000000119', '2016-09-29 18:34:05', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('151', '1000000120', '2016-09-29 18:43:34', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('152', '1000000121', '2016-09-29 18:44:47', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('153', '1000000122', '2016-09-29 18:45:53', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('154', '1000000123', '2016-09-29 18:50:13', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('155', '1000000124', '2016-09-29 18:51:24', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('156', '1000000125', '2016-09-29 18:52:34', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('157', '1000000126', '2016-09-29 18:53:39', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('158', '1000000120', '2016-09-29 18:53:49', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('159', '1000000120', '2016-09-29 18:54:03', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('160', '1000000127', '2016-09-29 18:55:34', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('161', '1000000128', '2016-09-29 18:56:39', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('162', '1000000129', '2016-09-29 18:57:42', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('163', '1000000130', '2016-09-29 18:59:04', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('164', '1', '2016-09-29 19:07:28', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('165', '1000000121', '2016-09-29 19:07:43', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('166', '1000000121', '2016-09-29 19:07:50', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('167', '1000000131', '2016-09-29 19:08:04', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('168', '1000000131', '2016-09-29 19:08:39', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('169', '1000000121', '2016-09-29 19:14:18', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('170', '1000000121', '2016-09-29 19:15:12', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('171', '1000000132', '2016-09-29 19:17:36', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('172', '1', '2016-09-29 23:50:06', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('173', '1', '2016-09-29 23:54:23', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('174', '1000000133', '2016-09-30 01:34:28', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('175', '1000000134', '2016-09-30 01:38:26', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('176', '1000000135', '2016-09-30 01:44:48', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('177', '1', '2016-09-30 01:46:34', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('178', '1', '2016-09-30 02:42:22', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('179', '1000000136', '2016-09-30 02:50:21', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('180', '1000000137', '2016-09-30 03:23:48', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('181', '100000073', '2016-09-30 03:23:57', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('182', '1', '2016-10-03 00:58:29', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('183', '1', '2016-10-04 09:59:35', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('184', '100000087', '2016-10-04 10:05:41', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('185', '100000087', '2016-10-04 10:09:59', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('186', '1000000139', '2016-10-04 10:43:22', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('187', '1', '2016-10-04 14:20:22', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('188', '1', '2016-10-04 23:35:32', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('189', '1000000116', '2016-10-05 01:21:09', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('190', '1', '2016-10-05 01:34:20', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('191', '1000000116', '2016-10-05 02:30:47', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('192', '1000000133', '2016-10-05 02:30:55', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('193', '1', '2016-10-05 02:59:26', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('194', '1000000133', '2016-10-05 03:36:18', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('195', '1000000133', '2016-10-05 03:49:32', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('196', '1000000140', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('197', '1000000140', '2016-10-05 06:50:22', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('198', '100000077', '2016-10-05 06:50:30', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('199', '100000077', '2016-10-05 06:51:25', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('200', '1000000140', '2016-10-05 06:51:33', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('201', '1000000140', '2016-10-05 06:52:38', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('202', '1000000140', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('203', '1000000140', '2016-10-05 06:53:27', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('204', '100000077', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('205', '100000077', '2016-10-05 06:59:20', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('206', '1000000140', '2016-10-05 06:59:49', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('207', '1000000140', '2016-10-05 07:02:13', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('208', '1', '2016-10-05 08:55:14', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('209', '1000000121', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('210', '1000000121', '2016-10-05 09:28:07', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('211', '1000000140', '2016-10-05 09:28:13', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('212', '1000000142', '2016-10-06 08:40:16', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('213', '1', '2016-10-06 08:44:09', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('214', '1000000143', '2016-10-06 08:44:29', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('215', '1000000144', '2016-10-06 08:48:51', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('216', '1000000144', '2016-10-06 08:49:01', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('217', '1000000144', '2016-10-06 08:49:10', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('218', '1000000145', '2016-10-06 08:57:58', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('219', '100000073', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('220', '100000073', '2016-10-06 09:05:17', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('221', '100000086', '2016-10-06 09:07:20', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('222', '100000086', '2016-10-06 09:08:00', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('223', '100000096', '2016-10-06 09:08:37', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('224', '100000096', '2016-10-06 09:26:06', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('225', '100000096', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('226', '100000096', '2016-10-06 09:26:27', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('227', '100000096', '2016-10-06 09:26:33', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('228', '1', '2016-10-06 14:03:43', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('229', '1000000146', '2016-10-06 14:16:14', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('230', '100000073', '2016-10-06 14:16:25', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('231', '1', '2016-10-06 14:16:41', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('232', '100000073', '2016-10-06 14:45:24', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('233', '100000073', '2016-10-06 14:49:12', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('234', '100000073', '2016-10-06 15:20:54', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('235', '100000096', '2016-10-06 15:21:07', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('236', '100000096', '2016-10-06 15:29:37', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('237', '100000096', '2016-10-06 15:29:57', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('238', '100000096', '2016-10-06 15:31:13', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('239', '100000096', '2016-10-06 15:50:34', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('240', '1', '2016-10-07 00:26:28', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('241', '1', '2016-10-07 01:09:04', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('242', '100000073', '2016-10-07 01:17:39', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('243', '100000073', '2016-10-07 01:20:53', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('244', '1000000148', '2016-10-07 01:24:45', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('245', '1000000149', '2016-10-07 01:40:59', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('246', '100000096', '2016-10-07 01:41:53', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('247', '100000096', '2016-10-07 02:24:12', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('248', '1000000149', '2016-10-07 02:24:17', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('249', '1000000149', '2016-10-07 06:27:56', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('250', '1000000152', '2016-10-07 06:32:26', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('251', '1000000153', '2016-10-07 06:34:59', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('252', '1000000154', '2016-10-07 06:37:58', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('253', '1000000155', '2016-10-07 06:39:39', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('254', '1000000156', '2016-10-07 06:41:05', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('255', '1000000157', '2016-10-07 06:44:26', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('256', '1000000158', '2016-10-07 06:46:32', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('257', '1000000159', '2016-10-07 06:48:24', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('258', '1000000160', '2016-10-07 06:50:16', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('259', '1000000161', '2016-10-07 07:14:03', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('260', '1000000162', '2016-10-07 07:16:34', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('261', '1000000140', '2016-10-07 07:16:48', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('262', '1000000140', '2016-10-07 07:30:19', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('263', '1000000140', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('264', '1000000140', '2016-10-07 07:31:20', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('265', '1000000161', '2016-10-07 07:31:28', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('266', '1000000161', '2016-10-07 07:42:46', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('267', '1000000161', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('268', '1000000163', '2016-10-07 13:17:15', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('269', '1000000164', '2016-10-07 13:20:44', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('270', '1000000165', '2016-10-07 13:26:27', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('271', '1000000166', '2016-10-07 13:30:09', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('272', '1000000167', '2016-10-07 13:34:10', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('273', '1000000168', '2016-10-07 13:37:31', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('274', '1000000169', '2016-10-07 13:40:41', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('275', '1000000170', '2016-10-07 13:42:53', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('276', '1000000171', '2016-10-07 13:48:06', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('277', '1000000172', '2016-10-07 13:50:37', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('278', '1000000173', '2016-10-07 13:55:45', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('279', '1000000174', '2016-10-07 14:01:20', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('280', '1000000175', '2016-10-07 14:04:13', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('281', '1000000176', '2016-10-07 14:06:41', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('282', '1000000177', '2016-10-07 14:12:44', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('283', '1', '2016-10-07 14:12:57', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('284', '1000000140', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('285', '1000000140', '2016-10-07 14:17:04', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('286', '1000000178', '2016-10-07 14:24:09', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('287', '1000000179', '2016-10-07 14:28:17', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('288', '1000000180', '2016-10-07 14:32:34', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('289', '1000000181', '2016-10-07 14:34:47', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('290', '1000000182', '2016-10-07 14:56:22', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('291', '1000000140', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('292', '1000000140', '2016-10-07 15:01:26', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('293', '1000000183', '2016-10-07 15:03:38', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('294', '1000000184', '2016-10-07 15:07:07', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('295', '1000000185', '2016-10-07 15:16:27', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('296', '1000000186', '2016-10-07 15:18:29', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('297', '1000000187', '2016-10-07 15:19:53', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('298', '1000000188', '2016-10-07 15:21:13', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('299', '1000000189', '2016-10-07 15:22:55', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('300', '1000000190', '2016-10-07 15:24:47', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('301', '1000000191', '2016-10-07 15:26:21', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('302', '1000000192', '2016-10-07 15:28:19', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('303', '1000000193', '2016-10-07 15:29:59', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('304', '1000000194', '2016-10-07 15:31:22', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('305', '1000000195', '2016-10-07 15:33:16', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('306', '1000000196', '2016-10-07 15:34:57', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('307', '1000000197', '2016-10-07 15:36:17', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('308', '1000000198', '2016-10-07 15:37:54', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('309', '1000000199', '2016-10-07 15:39:23', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('310', '1000000200', '2016-10-07 15:41:08', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('311', '1000000201', '2016-10-07 15:50:13', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('312', '1000000167', '2016-10-07 15:54:23', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('313', '1000000167', '2016-10-07 15:55:46', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('314', '1000000166', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('315', '1000000166', '2016-10-07 15:58:22', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('316', '1000000168', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('317', '1000000168', '2016-10-07 15:59:13', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('318', '1000000174', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('319', '1000000174', '2016-10-07 16:00:36', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('320', '1000000201', '2016-10-07 16:00:45', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('321', '1000000201', '2016-10-07 16:04:18', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('322', '1000000201', '2016-10-07 16:04:26', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('323', '1000000201', '2016-10-07 16:12:13', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('324', '100000098', '2016-10-07 16:12:21', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('325', '100000098', '2016-10-07 16:21:49', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('326', '100000077', '0000-00-00 00:00:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('327', '100000077', '2016-10-07 16:23:43', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('328', '1000000102', '2016-10-07 16:25:15', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('329', '1000000102', '2016-10-07 17:35:17', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('330', '1000000100', '2016-10-07 17:36:28', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('331', '1000000100', '2016-10-07 18:14:44', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('332', '100000098', '2016-10-07 18:14:54', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('333', '100000098', '2016-10-07 18:24:59', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('334', '1000000201', '2016-10-07 18:25:05', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('335', '1000000201', '2016-10-07 18:32:57', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('336', '1000000156', '2016-10-07 18:33:06', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('337', '1000000156', '2016-10-07 19:07:05', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('338', '100000098', '2016-10-07 19:07:23', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('339', '1', '2025-10-12 08:02:34', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('340', '1', '2025-10-12 08:25:31', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('341', '1', '2025-10-12 08:25:37', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('342', '1', '2025-10-12 08:26:17', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('343', '1000000202', '2025-10-12 08:27:39', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('344', '1', '2025-10-12 08:27:55', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('345', '1', '2025-10-12 08:28:34', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('346', '1', '2025-10-12 08:32:08', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('347', '1', '2025-10-12 08:56:44', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('348', '1000000203', '2025-10-12 09:25:07', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('349', '1000000203', '2025-10-12 09:39:08', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('350', '1000000203', '2025-10-12 10:58:09', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('351', '1000000204', '2025-10-12 11:49:57', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('352', '1000000205', '2025-10-12 12:19:52', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('353', '1000000206', '2025-10-12 12:21:14', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('354', '1', '2025-10-12 12:24:08', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('355', '1000000207', '2025-10-12 12:30:06', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('356', '1', '2025-10-12 12:30:17', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('357', '1000000208', '2025-10-12 12:33:55', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('358', '1', '2025-10-12 12:34:07', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('359', '1', '2025-10-12 12:35:17', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('360', '1000000209', '2025-10-12 12:45:53', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('361', '1', '2025-10-12 12:53:30', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('362', '1', '2025-10-12 15:02:46', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('363', '1', '2025-10-12 16:07:03', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('364', '1000000210', '2025-10-12 18:01:11', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('365', '1', '2025-10-12 18:04:06', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('366', '1', '2025-10-12 18:08:13', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('367', '1', '2025-10-12 18:17:27', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('368', '1', '2025-10-12 18:17:59', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('369', '1', '2025-10-12 18:28:18', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('370', '1', '2025-10-12 18:31:37', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('371', '1000000212', '2025-10-12 18:42:18', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('372', '1000000212', '2025-10-12 19:15:28', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('373', '1', '2025-10-12 19:22:48', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('374', '1000000212', '2025-10-12 19:22:57', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('375', '1000000212', '2025-10-12 19:46:50', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('376', '1', '2025-10-12 19:47:01', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('377', '1', '2025-10-12 20:07:29', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('378', '1', '2025-10-12 20:26:56', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('379', '1000000212', '2025-10-12 20:34:30', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('380', '1000000212', '2025-10-12 20:35:01', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('381', '1000000212', '2025-10-12 20:35:39', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('382', '1', '2025-10-13 04:10:03', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('383', '1', '2025-10-13 04:11:38', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('384', '1000000213', '2025-10-13 04:11:54', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('385', '1', '2025-10-13 04:12:59', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('386', '1', '2025-10-13 04:21:35', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('387', '1000000213', '2025-10-13 04:21:49', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('388', '1000000213', '2025-10-13 04:23:51', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('389', '1', '2025-10-13 04:24:16', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('390', '1', '2025-10-13 04:35:07', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('391', '1', '2025-10-13 04:39:20', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('392', '1000000213', '2025-10-13 05:25:41', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('393', '1000000213', '2025-10-13 05:48:18', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('394', '1', '2025-10-14 15:25:47', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('395', '1', '2025-10-14 15:26:23', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('396', '1', '2025-10-14 15:51:10', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('397', '1', '2025-10-14 16:00:33', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('398', '1', '2025-10-14 16:11:39', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('399', '1', '2025-10-14 16:24:43', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('400', '1', '2025-10-14 17:37:18', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('401', '1000000212', '2025-10-14 18:26:10', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('402', '1000000212', '2025-10-14 18:26:35', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('403', '1000000212', '2025-10-14 18:26:44', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('404', '1000000212', '2025-10-14 18:27:26', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('405', '1000000212', '2025-10-14 18:28:11', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('406', '1000000212', '2025-10-14 18:29:32', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('407', '1000000214', '2025-10-14 18:57:53', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('408', '1000000215', '2025-10-14 19:59:29', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('409', '1000000216', '2025-10-14 20:05:25', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('410', '1', '2025-10-15 07:59:55', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('411', '1', '2025-10-15 08:51:01', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('412', '1', '2025-10-15 08:51:44', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('413', '1000000217', '2025-10-15 13:28:00', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('414', '1', '2025-10-15 14:08:02', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('415', '1', '2025-10-15 14:08:50', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('416', '1', '2025-10-15 14:08:56', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('417', '1', '2025-10-15 18:13:17', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('418', '1', '2025-10-16 13:36:12', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('419', '1', '2025-10-16 13:57:47', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('420', '1', '2025-10-16 13:58:06', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('421', '1', '2025-10-16 14:12:23', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('422', '1', '2025-10-16 15:53:47', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('423', '1', '2025-10-16 15:59:21', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('424', '1', '2025-10-16 16:00:17', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('425', '1000000218', '2025-10-16 16:01:38', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('426', '1000000212', '2025-10-16 17:34:47', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('427', '1000000212', '2025-10-16 17:34:52', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('428', '1', '2025-10-16 17:36:01', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('429', '1', '2025-10-16 17:36:14', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('430', '1', '2025-10-16 17:36:23', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('431', '1', '2025-10-16 17:37:13', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('432', '1', '2025-10-16 17:56:41', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('433', '1000000219', '2025-10-16 17:57:06', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('434', '1000000212', '2025-10-16 18:17:04', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('435', '1000000212', '2025-10-16 18:17:40', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('436', '1000000212', '2025-10-16 18:18:54', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('437', '1000000212', '2025-10-16 18:19:36', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('438', '1000000212', '2025-10-16 18:19:54', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('439', '1000000212', '2025-10-16 18:20:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('440', '1000000212', '2025-10-16 18:20:08', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('441', '1000000212', '2025-10-16 18:20:12', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('442', '1000000212', '2025-10-16 18:20:19', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('443', '1000000212', '2025-10-16 18:20:24', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('444', '1', '2025-10-16 18:20:43', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('445', '1000000212', '2025-10-16 18:40:32', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('446', '1000000212', '2025-10-16 18:40:35', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('447', '1000000220', '2025-10-16 18:43:58', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('448', '1000000221', '2025-10-16 18:46:48', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('449', '1000000221', '2025-10-16 19:37:41', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('450', '1000000221', '2025-10-16 19:42:10', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('451', '1000000221', '2025-10-16 19:42:54', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('452', '1', '2025-10-16 20:20:37', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('453', '1000000221', '2025-10-16 20:23:12', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('454', '1', '2025-10-17 02:08:53', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('455', '1', '2025-10-17 02:42:22', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('456', '1', '2025-10-17 04:17:28', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('457', '1', '2025-10-17 05:20:03', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('458', '1', '2025-10-17 10:30:39', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('459', '1', '2025-10-17 10:48:42', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('460', '1', '2025-10-17 18:04:01', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('461', '1', '2025-10-17 18:04:11', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('462', '1', '2025-10-18 11:42:19', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('463', '1', '2025-10-19 12:27:34', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('464', '1', '2025-10-19 13:01:51', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('465', '1', '2025-10-19 14:05:33', '', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('466', '1', '2025-10-19 14:05:47', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('467', '1', '2025-10-19 14:05:47', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('468', '1', '2025-10-19 14:07:11', '', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('469', '2', '2025-10-19 14:08:37', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('470', '2', '2025-10-19 14:08:37', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('471', '2', '2025-10-19 14:09:09', '', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('472', '3', '2025-10-19 14:13:49', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('473', '3', '2025-10-19 14:13:49', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('474', '3', '2025-10-19 14:16:26', '', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('475', '3', '2025-10-19 14:16:36', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('476', '3', '2025-10-19 14:16:36', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('477', '3', '2025-10-19 14:19:56', '', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('478', '3', '2025-10-19 14:20:12', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('479', '3', '2025-10-19 14:20:12', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('480', '3', '2025-10-19 14:34:30', '', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('481', '3', '2025-10-19 14:34:40', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('482', '3', '2025-10-19 14:34:40', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('483', '3', '2025-10-19 14:38:17', '', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('484', '3', '2025-10-19 14:38:23', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('485', '3', '2025-10-19 14:38:23', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('486', '3', '2025-10-19 14:53:26', '', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('487', '5', '2025-10-19 14:53:31', '', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('488', '5', '2025-10-19 14:53:31', '', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('489', '5', '2025-10-19 14:57:06', '', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('490', '5', '2025-10-19 14:57:23', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('491', '5', '2025-10-19 15:38:30', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('492', '6', '2025-10-19 15:38:33', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('493', '6', '2025-10-19 16:40:08', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('494', '2', '2025-10-19 16:40:14', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('495', '2', '2025-10-19 16:40:46', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('496', '2', '2025-10-19 16:40:57', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('497', '2', '2025-10-19 16:55:03', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('498', '3', '2025-10-19 16:55:11', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('499', '3', '2025-10-19 16:55:50', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('500', '2', '2025-10-19 16:56:00', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('501', '2', '2025-10-19 17:05:12', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('502', '1', '2025-10-19 17:05:16', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('503', '1', '2025-10-19 17:05:23', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('504', '3', '2025-10-19 17:05:32', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('505', '3', '2025-10-19 17:13:05', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('506', '1', '2025-10-19 17:13:10', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('507', '1', '2025-10-19 17:13:17', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('508', '2', '2025-10-19 17:13:22', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('509', '2', '2025-10-19 17:19:36', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('510', '1', '2025-10-19 17:19:40', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('511', '1', '2025-10-19 17:19:52', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('512', '3', '2025-10-19 17:20:02', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('513', '3', '2025-10-19 17:43:50', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('514', '1', '2025-10-19 17:43:58', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('515', '1', '2025-10-19 18:10:06', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('516', '3', '2025-10-19 18:10:11', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('517', '3', '2025-10-19 18:15:05', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('518', '2', '2025-10-19 18:15:16', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('519', '2', '2025-10-19 18:16:10', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('520', '1', '2025-10-19 18:20:01', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('521', '1', '2025-10-19 18:20:10', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('522', '2', '2025-10-19 18:20:22', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('523', '2', '2025-10-19 18:26:28', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('524', '3', '2025-10-19 18:26:33', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('525', '3', '2025-10-19 18:26:38', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('526', '1', '2025-10-19 18:26:45', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('527', '1', '2025-10-19 18:44:34', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('528', '2', '2025-10-19 18:44:44', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('529', '2', '2025-10-19 18:46:53', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('530', '1', '2025-10-19 18:47:09', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('531', '1', '2025-10-19 19:02:21', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('532', '2', '2025-10-19 19:02:32', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('533', '1000000222', '2025-10-19 19:03:08', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('534', '1', '2025-10-19 19:03:27', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('535', '1', '2025-10-19 19:24:41', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('536', '3', '2025-10-19 19:24:48', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('537', '3', '2025-10-19 19:35:30', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('538', '1', '2025-10-19 19:35:37', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('539', '2', '2025-10-19 19:47:41', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('540', '1', '2025-10-19 19:48:09', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('541', '1', '2025-10-19 20:32:21', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('542', '2', '2025-10-19 20:36:44', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('543', '2', '2025-10-19 20:47:51', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('544', '1', '2025-10-19 20:48:07', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('545', '1', '2025-10-19 20:48:39', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('546', '1', '2025-10-19 20:48:46', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('547', '1', '2025-10-19 20:56:18', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('548', '3', '2025-10-19 20:56:26', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('549', '1', '2025-10-19 21:24:23', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('550', '3', '2025-10-19 21:24:32', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('551', '2', '2025-10-19 21:39:27', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('552', '3', '2025-10-19 21:42:14', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('553', '1', '2025-10-19 21:42:39', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('554', '1', '2025-10-19 21:42:44', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('555', '3', '2025-10-19 21:42:57', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('556', '3', '2025-10-19 22:09:37', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('557', '2', '2025-10-19 22:09:57', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('558', '2', '2025-10-19 22:12:02', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('559', '1', '2025-10-19 22:12:10', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('560', '1', '2025-10-19 22:19:19', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('561', '3', '2025-10-19 22:19:32', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('562', '3', '2025-10-19 22:25:09', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('563', '1', '2025-10-19 22:25:14', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('564', '1', '2025-10-19 22:36:46', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('565', '2', '2025-10-19 22:36:57', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('566', '2', '2025-10-19 22:57:01', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('567', '1', '2025-10-19 22:57:06', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('568', '2', '2025-10-19 23:49:48', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('569', '1', '2025-10-20 00:08:37', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('570', '2', '2025-10-20 00:08:52', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('571', '2', '2025-10-20 00:09:42', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('572', '1', '2025-10-20 00:09:51', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('573', '1', '2025-10-20 00:40:24', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('574', '3', '2025-10-20 00:40:31', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('575', '3', '2025-10-20 00:58:08', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('576', '1', '2025-10-20 00:58:15', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('577', '1000000222', '2025-10-20 01:10:34', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('578', '1000000222', '2025-10-20 01:11:29', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('579', '1000000222', '2025-10-20 01:18:32', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('580', '1000000222', '2025-10-20 01:18:47', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('581', '1', '2025-10-20 01:19:22', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('582', '1', '2025-10-20 01:45:12', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('583', '1000000222', '2025-10-20 01:45:19', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('584', '1000000222', '2025-10-20 01:45:35', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('585', '1', '2025-10-20 01:45:49', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('586', '1000000222', '2025-10-20 17:14:50', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('587', '1000000222', '2025-10-20 17:14:57', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('588', '1', '2025-10-20 17:15:12', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('589', '1', '2025-10-20 17:35:35', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('590', '2', '2025-10-20 17:36:00', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('591', '1', '2025-10-20 17:46:25', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('592', '2', '2025-10-20 17:49:31', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('593', '2', '2025-10-20 17:49:38', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('594', '2', '2025-10-20 17:56:08', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('595', '1', '2025-10-20 17:56:12', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('596', '1', '2025-10-20 17:58:34', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('597', '1', '2025-10-20 18:12:55', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('598', '1', '2025-10-20 18:12:59', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('599', '2', '2025-10-20 18:13:05', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('600', '2', '2025-10-20 18:47:12', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('601', '1000000222', '2025-10-20 18:52:01', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('602', '1000000222', '2025-10-20 18:52:14', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('603', '1', '2025-10-20 18:52:26', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('604', '1', '2025-10-20 19:13:50', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('605', '2', '2025-10-20 19:13:59', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('606', '2', '2025-10-20 19:17:20', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('607', '1', '2025-10-20 19:17:24', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('608', '1', '2025-10-20 19:23:54', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('609', '2', '2025-10-20 19:24:01', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('610', '2', '2025-10-20 19:24:25', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('611', '1', '2025-10-20 19:24:32', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('612', '1', '2025-10-20 19:27:43', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('613', '2', '2025-10-20 19:27:51', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('614', '2', '2025-10-20 19:30:16', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('615', '1', '2025-10-20 19:30:25', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('616', '1', '2025-10-20 19:36:30', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('617', '1', '2025-10-20 19:36:55', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('618', '1', '2025-10-20 19:37:24', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('619', '1', '2025-10-20 19:43:16', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('620', '2', '2025-10-20 19:43:26', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('621', '2', '2025-10-20 20:01:02', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('622', '2', '2025-10-20 20:13:24', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('623', '1', '2025-10-20 20:13:31', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('624', '1', '2025-10-21 09:03:20', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('625', '1', '2025-10-21 09:04:15', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('626', '1', '2025-10-21 10:30:41', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('627', '1', '2025-10-21 10:31:03', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('628', '1', '2025-10-21 10:32:16', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('629', '1', '2025-10-21 11:10:23', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('630', '2', '2025-10-21 11:10:44', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('631', '2', '2025-10-21 11:11:51', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('632', '1', '2025-10-21 11:11:58', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('633', '1', '2025-10-21 11:17:51', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('634', '1', '2025-10-21 16:23:27', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('635', '1', '2025-10-21 16:39:35', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('636', '1', '2025-10-21 16:45:42', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('637', '1', '2025-10-21 16:46:42', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('638', '2', '2025-10-21 16:46:48', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('639', '2', '2025-10-21 16:48:27', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('640', '1', '2025-10-21 16:48:36', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('641', '1', '2025-10-21 17:03:01', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('642', '1000000222', '2025-10-21 17:03:43', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('643', '1000000222', '2025-10-21 17:04:12', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('644', '1', '2025-10-21 17:14:06', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('645', '1', '2025-10-21 18:02:12', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('646', '1', '2025-10-21 18:02:31', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('647', '1', '2025-10-22 04:27:31', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('648', '1', '2025-10-22 04:28:00', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('649', '1', '2025-10-22 04:28:46', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('650', '1000000222', '2025-10-22 04:29:05', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('651', '1000000222', '2025-10-22 04:29:15', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('652', '1', '2025-10-22 04:31:30', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('653', '1', '2025-10-22 04:32:04', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('654', '2', '2025-10-22 04:32:19', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('655', '2', '2025-10-22 04:33:56', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('656', '1', '2025-10-22 04:34:05', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('657', '1', '2025-10-22 04:35:39', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('658', '3', '2025-10-22 04:35:49', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('659', '3', '2025-10-22 09:28:59', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('660', '1', '2025-10-22 09:29:04', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('661', '1', '2025-10-22 09:34:51', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('662', '1', '2025-10-22 09:36:01', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('663', '1', '2025-10-22 09:49:29', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('664', '1', '2025-10-22 09:51:33', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('665', '1', '2025-10-22 10:12:54', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('666', '2', '2025-10-22 10:13:00', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('667', '2', '2025-10-22 10:14:01', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('668', '1', '2025-10-22 10:14:06', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('669', '1', '2025-10-22 10:52:07', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('670', '1', '2025-10-24 08:15:18', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('671', '1', '2025-10-25 13:28:18', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('672', '1', '2025-10-25 14:16:10', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('673', '1', '2025-10-25 14:24:34', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('674', '1', '2025-10-25 18:19:38', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('675', '1', '2025-10-25 18:19:48', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('676', '1', '2025-10-25 18:20:10', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('677', '1', '2025-10-25 18:31:16', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('678', '1', '2025-10-25 18:31:25', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('679', '1', '2025-10-25 18:34:28', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('680', '1', '2025-10-25 18:34:36', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('681', '1', '2025-10-25 18:35:45', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('682', '1', '2025-10-25 18:36:38', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('683', '1', '2025-10-25 18:47:01', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('684', '1', '2025-10-25 18:49:30', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('685', '1', '2025-10-25 18:52:53', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('686', '1', '2025-10-25 18:57:45', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('687', '2', '2025-10-25 18:57:51', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('688', '2', '2025-10-25 19:00:03', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('689', '1', '2025-10-25 19:00:08', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('690', '1', '2025-10-25 19:01:55', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('691', '1', '2025-10-25 19:02:03', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('692', '1', '2025-10-25 19:03:40', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('693', '1', '2025-10-25 19:08:19', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('694', '1', '2025-10-25 19:08:34', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('695', '1', '2025-10-25 19:16:20', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('696', '2', '2025-10-25 19:16:29', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('697', '2', '2025-10-25 19:16:49', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('698', '3', '2025-10-25 19:16:55', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('699', '3', '2025-10-25 19:19:00', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('700', '1', '2025-10-25 19:19:05', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('701', '1', '2025-10-25 19:26:19', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('702', '2', '2025-10-25 19:26:25', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('703', '2', '2025-10-25 19:30:24', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('704', '3', '2025-10-25 19:30:30', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('705', '3', '2025-10-25 19:32:32', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('706', '2', '2025-10-25 19:32:44', 'Registrar', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('707', '2', '2025-10-25 19:33:51', 'Registrar', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('708', '3', '2025-10-25 19:34:00', 'Chairperson', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('709', '3', '2025-10-25 19:35:07', 'Chairperson', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('710', '1', '2025-10-25 19:35:12', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('711', '1', '2025-10-26 16:50:32', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('712', '1', '2025-10-26 17:47:16', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('713', '1000000223', '2025-10-26 17:54:32', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('714', '1', '2025-10-28 15:11:08', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('715', '1', '2025-11-04 02:08:39', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('716', '1', '2025-11-04 02:39:39', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('717', '1', '2025-11-04 02:57:02', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('718', '1', '2025-11-04 03:29:37', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('719', '1000000224', '2025-11-04 08:06:16', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('720', '1000000225', '2025-11-04 08:13:47', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('721', '1000000226', '2025-11-04 08:18:23', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('722', '1000000227', '2025-11-04 08:21:36', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('723', '1000000228', '2025-11-04 08:36:22', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('724', '1000000229', '2025-11-04 08:46:31', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('725', '1', '2025-11-04 08:46:50', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('726', '1', '2025-11-04 08:53:46', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('727', '1000000229', '2025-11-04 08:54:13', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('728', '1000000229', '2025-11-04 08:54:35', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('729', '1', '2025-11-04 08:54:46', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('730', '1', '2025-11-04 08:56:07', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('731', '1000000230', '2025-11-04 09:47:40', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('732', '1', '2025-11-04 09:47:55', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('733', '1', '2025-11-04 09:48:57', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('734', '1', '2025-11-04 09:49:39', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('735', '1', '2025-11-04 10:14:00', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('736', '1', '2025-11-04 15:48:22', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('737', '1000000230', '2025-11-04 15:48:38', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('738', '1000000230', '2025-11-04 15:48:49', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('739', '1000000231', '2025-11-05 04:22:37', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('740', '1', '2025-11-05 04:30:24', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('741', '1', '2025-11-05 04:31:34', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('742', '1000000230', '2025-11-05 04:32:00', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('743', '1000000230', '2025-11-05 04:42:01', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('744', '1000000230', '2025-11-05 04:48:34', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('745', '1', '2025-11-05 04:48:58', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('746', '1', '2025-11-05 04:49:29', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('747', '1000000230', '2025-11-05 04:50:03', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('748', '1000000230', '2025-11-05 04:50:47', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('749', '1', '2025-11-05 04:51:06', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('750', '1', '2025-11-05 04:54:49', 'Administrator', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('751', '1000000230', '2025-11-05 09:59:06', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('752', '1000000230', '2025-11-05 09:59:26', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('753', '1000000230', '2025-11-05 10:00:22', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('754', '1', '2025-11-05 15:46:34', 'Administrator', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('755', '1000000230', '2025-11-05 17:09:19', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('756', '1000000230', '2025-11-05 17:09:52', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('757', '1000000230', '2025-11-05 17:24:02', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('758', '1000000230', '2025-11-05 17:43:21', 'Student', 'Logged in') ; 
INSERT INTO `tbllogs` VALUES ('759', '1000000230', '2025-11-05 17:43:27', 'Student', 'Logged out') ; 
INSERT INTO `tbllogs` VALUES ('760', '1', '2025-11-06 07:32:14', 'Administrator', 'Logged in') ;
#
# End of data contents of table tbllogs
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblauto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblinstructor`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbllogs`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschedule`
# --------------------------------------------------------


#
# Delete any existing table `tblschedule`
#

DROP TABLE IF EXISTS `tblschedule`;


#
# Table structure of table `tblschedule`
#

CREATE TABLE `tblschedule` (
  `schedID` int(11) NOT NULL AUTO_INCREMENT,
  `TIME_FROM` varchar(90) NOT NULL,
  `TIME_TO` varchar(90) NOT NULL,
  `sched_time` varchar(30) NOT NULL,
  `sched_day` varchar(30) NOT NULL,
  `sched_semester` varchar(30) NOT NULL,
  `sched_sy` varchar(30) NOT NULL,
  `sched_room` varchar(30) NOT NULL,
  `SECTION` varchar(30) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `INST_ID` int(11) NOT NULL,
  PRIMARY KEY (`schedID`),
  KEY `COURSE_ID` (`COURSE_ID`),
  KEY `SUBJ_ID` (`SUBJ_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=413 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table tblschedule (144 records)
#
 
INSERT INTO `tblschedule` VALUES ('260', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'First', '2016-2017', '5', '1', '21', '176', '2') ; 
INSERT INTO `tblschedule` VALUES ('261', '09:30 am', '10:30 am', '09:30 am-10:30 am', 'MWF', 'First', '2016-2017', '1', '1', '21', '177', '11') ; 
INSERT INTO `tblschedule` VALUES ('262', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'First', '2016-2017', '19', '1', '21', '178', '6') ; 
INSERT INTO `tblschedule` VALUES ('263', '12:30 pm', '01:30 pm', '12:30 pm-01:30 pm', 'MWF', 'First', '2016-2017', '7', '1', '21', '179', '3') ; 
INSERT INTO `tblschedule` VALUES ('264', '07:30 am', '09:30 am', '07:30 am-09:30 am', 'T', 'First', '2016-2017', '4', '1', '21', '181', '1') ; 
INSERT INTO `tblschedule` VALUES ('265', '10:30 am', '12:00 pm', '10:30 am-12:00 pm', 'TTH', 'First', '2016-2017', '1', '1', '21', '182', '8') ; 
INSERT INTO `tblschedule` VALUES ('267', '03:30 pm', '04:30 pm', '03:30 pm-04:30 pm', 'MWF', 'First', '2016-2017', '20', '1', '21', '180', '5') ; 
INSERT INTO `tblschedule` VALUES ('268', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'Second', '2016-2017', '10', '1', '21', '206', '2') ; 
INSERT INTO `tblschedule` VALUES ('269', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'MWF', 'Second', '2016-2017', '5', '1', '21', '207', '11') ; 
INSERT INTO `tblschedule` VALUES ('270', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'Second', '2016-2017', '3', '1', '21', '208', '6') ; 
INSERT INTO `tblschedule` VALUES ('272', '03:30 pm', '04:30 pm', '03:30 pm-04:30 pm', 'MWF', 'Second', '2016-2017', '9', '1', '21', '209', '8') ; 
INSERT INTO `tblschedule` VALUES ('273', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'TTH', 'Second', '2016-2017', '9', '1', '21', '213', '8') ; 
INSERT INTO `tblschedule` VALUES ('274', '09:00 am', '10:30 am', '09:00 am-10:30 am', 'TTH', 'Second', '2016-2017', '10', '1', '21', '210', '5') ; 
INSERT INTO `tblschedule` VALUES ('275', '01:30 pm', '03:00 pm', '01:30 pm-03:00 pm', 'TTH', 'Second', '2016-2017', '9', '1', '21', '211', '5') ; 
INSERT INTO `tblschedule` VALUES ('276', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'First', '2016-2017', '17', '1', '57', '183', '5') ; 
INSERT INTO `tblschedule` VALUES ('277', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'MWF', 'First', '2016-2017', '9', '1', '57', '184', '14') ; 
INSERT INTO `tblschedule` VALUES ('278', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'First', '2016-2017', '4', '1', '57', '185', '13') ; 
INSERT INTO `tblschedule` VALUES ('279', '11:30 am', '12:30 pm', '11:30 am-12:30 pm', 'MWF', 'First', '2016-2017', '8', '1', '57', '186', '6') ; 
INSERT INTO `tblschedule` VALUES ('280', '01:30 pm', '02:30 pm', '01:30 pm-02:30 pm', 'MWF', 'First', '2016-2017', '14', '1', '57', '187', '5') ; 
INSERT INTO `tblschedule` VALUES ('281', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'TTH', 'First', '2016-2017', '20', '1', '57', '188', '15') ; 
INSERT INTO `tblschedule` VALUES ('282', '09:00 am', '10:30 am', '09:00 am-10:30 am', 'TTH', 'First', '2016-2017', '1', '1', '57', '189', '2') ; 
INSERT INTO `tblschedule` VALUES ('283', '01:30 pm', '03:30 pm', '01:30 pm-03:30 pm', 'T', 'First', '2016-2017', '5', '1', '57', '190', '7') ; 
INSERT INTO `tblschedule` VALUES ('284', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'Second', '2016-2017', '6', '1', '57', '215', '16') ; 
INSERT INTO `tblschedule` VALUES ('285', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'MWF', 'Second', '2016-2017', '1', '1', '57', '216', '14') ; 
INSERT INTO `tblschedule` VALUES ('286', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'Second', '2016-2017', '19', '1', '57', '217', '17') ; 
INSERT INTO `tblschedule` VALUES ('287', '11:30 am', '12:30 pm', '11:30 am-12:30 pm', 'MWF', 'Second', '2016-2017', '2', '1', '57', '218', '9') ; 
INSERT INTO `tblschedule` VALUES ('288', '01:30 pm', '02:30 pm', '01:30 pm-02:30 pm', 'MWF', 'Second', '2016-2017', '11', '1', '57', '219', '5') ; 
INSERT INTO `tblschedule` VALUES ('289', '03:30 pm', '04:30 pm', '03:30 pm-04:30 pm', 'MWF', 'Second', '2016-2017', '1', '1', '57', '220', '18') ; 
INSERT INTO `tblschedule` VALUES ('290', '09:00 am', '10:30 am', '09:00 am-10:30 am', 'TTH', 'Second', '2016-2017', '6', '1', '57', '221', '19') ; 
INSERT INTO `tblschedule` VALUES ('291', '03:00 pm', '05:00 pm', '03:00 pm-05:00 pm', 'TH', 'Second', '2016-2017', '2', '1', '57', '222', '7') ; 
INSERT INTO `tblschedule` VALUES ('292', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'First', '2016-2017', '2', '1', '58', '191', '8') ; 
INSERT INTO `tblschedule` VALUES ('293', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'MWF', 'First', '2016-2017', '12', '1', '58', '192', '6') ; 
INSERT INTO `tblschedule` VALUES ('294', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'First', '2016-2017', '6', '', '58', '193', '5') ; 
INSERT INTO `tblschedule` VALUES ('295', '11:30 am', '12:30 pm', '11:30 am-12:30 pm', 'MWF', 'First', '2016-2017', '1', '1', '58', '194', '14') ; 
INSERT INTO `tblschedule` VALUES ('296', '01:30 pm', '02:30 pm', '01:30 pm-02:30 pm', 'MWF', 'First', '2016-2017', '7', '1', '58', '195', '1') ; 
INSERT INTO `tblschedule` VALUES ('297', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'TTH', 'First', '2016-2017', '1', '1', '58', '196', '20') ; 
INSERT INTO `tblschedule` VALUES ('298', '04:30 pm', '06:00 pm', '04:30 pm-06:00 pm', 'TTH', 'First', '2016-2017', '15', '1', '58', '197', '21') ; 
INSERT INTO `tblschedule` VALUES ('299', '03:30 pm', '04:30 pm', '03:30 pm-04:30 pm', 'MWF', 'First', '2016-2017', '2', '1', '58', '198', '9') ; 
INSERT INTO `tblschedule` VALUES ('300', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'Second', '2016-2017', '15', '1', '58', '231', '1') ; 
INSERT INTO `tblschedule` VALUES ('301', '09:30 am', '10:30 am', '09:30 am-10:30 am', 'MWF', 'Second', '2016-2017', '5', '1', '58', '232', '22') ; 
INSERT INTO `tblschedule` VALUES ('302', '01:30 pm', '02:30 pm', '01:30 pm-02:30 pm', 'MWF', 'Second', '2016-2017', '10', '1', '58', '235', '20') ; 
INSERT INTO `tblschedule` VALUES ('303', '02:30 pm', '03:30 pm', '02:30 pm-03:30 pm', 'MWF', 'Second', '2016-2017', '16', '1', '58', '236', '5') ; 
INSERT INTO `tblschedule` VALUES ('304', '04:30 pm', '05:30 pm', '04:30 pm-05:30 pm', 'MWF', 'Second', '2016-2017', '11', '1', '58', '233', '5') ; 
INSERT INTO `tblschedule` VALUES ('305', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'TTH', 'Second', '2016-2017', '5', '1', '58', '234', '22') ; 
INSERT INTO `tblschedule` VALUES ('306', '09:00 am', '10:30 am', '09:00 am-10:30 am', 'TTH', 'Second', '2016-2017', '17', '1', '58', '237', '22') ; 
INSERT INTO `tblschedule` VALUES ('307', '01:30 pm', '03:00 pm', '01:30 pm-03:00 pm', 'TTH', 'Second', '2016-2017', '8', '1', '58', '238', '9') ; 
INSERT INTO `tblschedule` VALUES ('308', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'First', '2016-2017', '12', '1', '59', '199', '14') ; 
INSERT INTO `tblschedule` VALUES ('309', '09:30 am', '10:30 am', '09:30 am-10:30 am', 'MWF', 'First', '2016-2017', '9', '1', '59', '200', '22') ; 
INSERT INTO `tblschedule` VALUES ('310', '01:30 pm', '02:30 pm', '01:30 pm-02:30 pm', 'MWF', 'First', '2016-2017', '12', '1', '59', '201', '20') ; 
INSERT INTO `tblschedule` VALUES ('311', '03:30 pm', '04:30 pm', '03:30 pm-04:30 pm', 'MWF', 'First', '2016-2017', '19', '1', '59', '202', '19') ; 
INSERT INTO `tblschedule` VALUES ('312', '04:30 pm', '05:30 pm', '04:30 pm-05:30 pm', 'MWF', 'First', '2016-2017', '5', '1', '59', '203', '22') ; 
INSERT INTO `tblschedule` VALUES ('313', '09:00 am', '10:30 am', '09:00 am-10:30 am', 'TTH', 'First', '2016-2017', '9', '1', '59', '204', '23') ; 
INSERT INTO `tblschedule` VALUES ('314', '01:30 pm', '03:00 pm', '01:30 pm-03:00 pm', 'TTH', 'First', '2016-2017', '12', '1', '59', '205', '22') ; 
INSERT INTO `tblschedule` VALUES ('315', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'Second', '2016-2017', '18', '1', '59', '246', '23') ; 
INSERT INTO `tblschedule` VALUES ('316', '09:30 am', '10:30 am', '09:30 am-10:30 am', 'MWF', 'Second', '2016-2017', '7', '1', '59', '247', '22') ; 
INSERT INTO `tblschedule` VALUES ('317', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'Second', '2016-2017', '9', '1', '59', '248', '5') ; 
INSERT INTO `tblschedule` VALUES ('318', '09:00 am', '10:30 am', '09:00 am-10:30 am', 'TTH', 'Second', '2016-2017', '8', '1', '59', '249', '9') ; 
INSERT INTO `tblschedule` VALUES ('319', '10:30 am', '12:00 pm', '10:30 am-12:00 pm', 'TTH', 'Second', '2016-2017', '15', '1', '59', '250', '22') ; 
INSERT INTO `tblschedule` VALUES ('321', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'TTH', 'First', '2016-2017', '3', '1', '42', '79', '24') ; 
INSERT INTO `tblschedule` VALUES ('322', '09:00 am', '11:00 am', '09:00 am-11:00 am', 'TH', 'First', '2016-2017', '6', '1', '42', '85', '7') ; 
INSERT INTO `tblschedule` VALUES ('323', '01:30 pm', '02:30 pm', '01:30 pm-02:30 pm', 'MWF', 'First', '2016-2017', '13', '1', '42', '78', '3') ; 
INSERT INTO `tblschedule` VALUES ('324', '04:30 pm', '05:30 pm', '04:30 pm-05:30 pm', 'MWF', 'First', '2016-2017', '2', '1', '42', '86', '8') ; 
INSERT INTO `tblschedule` VALUES ('325', '01:30 pm', '03:00 pm', '01:30 pm-03:00 pm', 'TTH', 'First', '2016-2017', '1', '1', '42', '81', '6') ; 
INSERT INTO `tblschedule` VALUES ('326', '04:30 pm', '06:00 pm', '04:30 pm-06:00 pm', 'TTH', 'First', '2016-2017', '4', '1', '42', '83', '24') ; 
INSERT INTO `tblschedule` VALUES ('327', '07:30 am', '09:30 am', '07:30 am-09:30 am', 'W', 'First', '2016-2017', '2', '1', '42', '85', '7') ; 
INSERT INTO `tblschedule` VALUES ('328', '07:30 am', '09:30 am', '07:30 am-09:30 am', 'W', 'Second', '2016-2017', '2', '1', '42', '142', '7') ; 
INSERT INTO `tblschedule` VALUES ('329', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'First', '2016-2017', '9', '1', '42', '80', '11') ; 
INSERT INTO `tblschedule` VALUES ('330', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'Second', '2016-2017', '8', '1', '42', '135', '24') ; 
INSERT INTO `tblschedule` VALUES ('331', '01:30 pm', '02:30 pm', '01:30 pm-02:30 pm', 'MWF', 'Second', '2016-2017', '4', '1', '42', '136', '11') ; 
INSERT INTO `tblschedule` VALUES ('332', '02:30 pm', '03:30 pm', '02:30 pm-03:30 pm', 'MWF', 'Second', '2016-2017', '7', '1', '42', '137', '9') ; 
INSERT INTO `tblschedule` VALUES ('333', '04:30 pm', '05:30 pm', '04:30 pm-05:30 pm', 'MWF', 'Second', '2016-2017', '8', '1', '42', '138', '25') ; 
INSERT INTO `tblschedule` VALUES ('334', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'TTH', 'Second', '2016-2017', '10', '1', '42', '139', '26') ; 
INSERT INTO `tblschedule` VALUES ('335', '10:30 am', '12:00 pm', '10:30 am-12:00 pm', 'TTH', 'Second', '2016-2017', '13', '1', '42', '140', '18') ; 
INSERT INTO `tblschedule` VALUES ('336', '01:30 pm', '03:00 pm', '01:30 pm-03:00 pm', 'TTH', 'Second', '2016-2017', '13', '1', '42', '141', '8') ; 
INSERT INTO `tblschedule` VALUES ('337', '03:00 pm', '04:30 pm', '03:00 pm-04:30 pm', 'TTH', 'Second', '2016-2017', '14', '1', '42', '143', '8') ; 
INSERT INTO `tblschedule` VALUES ('338', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'First', '2016-2017', '20', '1', '43', '90', '23') ; 
INSERT INTO `tblschedule` VALUES ('339', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'MWF', 'First', '2016-2017', '2', '1', '43', '89', '18') ; 
INSERT INTO `tblschedule` VALUES ('340', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'First', '2016-2017', '2', '1', '43', '91', '2') ; 
INSERT INTO `tblschedule` VALUES ('341', '01:30 pm', '02:30 pm', '01:30 pm-02:30 pm', 'MWF', 'First', '2016-2017', '6', '1', '43', '95', '6') ; 
INSERT INTO `tblschedule` VALUES ('342', '03:30 pm', '05:30 pm', '03:30 pm-05:30 pm', 'M', 'First', '2016-2017', '1', '1', '43', '96', '7') ; 
INSERT INTO `tblschedule` VALUES ('343', '09:00 am', '10:30 am', '09:00 am-10:30 am', 'MWF', 'First', '2016-2017', '8', '1', '43', '92', '8') ; 
INSERT INTO `tblschedule` VALUES ('344', '10:30 am', '12:00 pm', '10:30 am-12:00 pm', 'TTH', 'First', '2016-2017', '5', '1', '43', '87', '24') ; 
INSERT INTO `tblschedule` VALUES ('345', '01:30 pm', '03:00 pm', '01:30 pm-03:00 pm', 'TTH', 'First', '2016-2017', '11', '1', '43', '94', '24') ; 
INSERT INTO `tblschedule` VALUES ('346', '03:00 pm', '04:00 pm', '03:00 pm-04:00 pm', 'T', 'First', '2016-2017', '13', '1', '43', '93', '2') ; 
INSERT INTO `tblschedule` VALUES ('347', '04:30 pm', '06:00 pm', '04:30 pm-06:00 pm', 'TTH', 'First', '2016-2017', '1', '1', '43', '88', '11') ; 
INSERT INTO `tblschedule` VALUES ('348', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'MWF', 'Second', '2016-2017', '17', '1', '31', '155', '24') ; 
INSERT INTO `tblschedule` VALUES ('349', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'Second', '2016-2017', '20', '1', '43', '128', '8') ; 
INSERT INTO `tblschedule` VALUES ('350', '11:30 am', '12:30 pm', '11:30 am-12:30 pm', 'MWF', 'Second', '2016-2017', '18', '1', '43', '344', '2') ; 
INSERT INTO `tblschedule` VALUES ('351', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'M', 'Second', '2016-2017', '12', '1', '43', '129', '24') ; 
INSERT INTO `tblschedule` VALUES ('352', '10:30 am', '12:00 pm', '10:30 am-12:00 pm', 'TTH', 'Second', '2016-2017', '19', '1', '43', '126', '2') ; 
INSERT INTO `tblschedule` VALUES ('353', '09:00 am', '10:30 am', '09:00 am-10:30 am', 'TTH', 'Second', '2016-2017', '2', '1', '43', '131', '11') ; 
INSERT INTO `tblschedule` VALUES ('354', '01:30 pm', '03:00 pm', '01:30 pm-03:00 pm', 'TTH', 'Second', '2016-2017', '3', '1', '43', '132', '12') ; 
INSERT INTO `tblschedule` VALUES ('355', '04:30 pm', '06:30 pm', '04:30 pm-06:30 pm', 'T', 'Second', '2016-2017', '3', '1', '43', '133', '7') ; 
INSERT INTO `tblschedule` VALUES ('356', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'First', '2016-2017', '4', '1', '44', '98', '12') ; 
INSERT INTO `tblschedule` VALUES ('357', '09:30 am', '10:30 am', '09:30 am-10:30 am', 'MWF', 'First', '2016-2017', '8', '1', '44', '105', '0') ; 
INSERT INTO `tblschedule` VALUES ('358', '09:30 am', '10:30 am', '09:30 am-10:30 am', 'MWF', 'First', '2016-2017', '8', '1', '44', '105', '0') ; 
INSERT INTO `tblschedule` VALUES ('359', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'First', '2016-2017', '1', '1', '44', '106', '12') ; 
INSERT INTO `tblschedule` VALUES ('360', '01:30 pm', '02:30 pm', '01:30 pm-02:30 pm', 'MWF', 'First', '2016-2017', '2', '1', '44', '103', '26') ; 
INSERT INTO `tblschedule` VALUES ('361', '03:30 pm', '04:30 pm', '03:30 pm-04:30 pm', 'MWF', 'First', '2016-2017', '4', '1', '44', '104', '26') ; 
INSERT INTO `tblschedule` VALUES ('362', '05:30 pm', '06:30 pm', '05:30 pm-06:30 pm', 'F', 'First', '2016-2017', '5', '1', '44', '102', '2') ; 
INSERT INTO `tblschedule` VALUES ('363', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'TTH', 'First', '2016-2017', '5', '1', '44', '99', '0') ; 
INSERT INTO `tblschedule` VALUES ('364', '09:30 am', '10:30 am', '09:30 am-10:30 am', 'MWF', 'First', '2016-2017', '17', '1', '44', '105', '27') ; 
INSERT INTO `tblschedule` VALUES ('365', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'THH', 'First', '2016-2017', '6', '1', '44', '99', '2') ; 
INSERT INTO `tblschedule` VALUES ('366', '09:00 am', '10:30 am', '09:00 am-10:30 am', 'TTH', 'First', '2016-2017', '4', '1', '44', '100', '28') ; 
INSERT INTO `tblschedule` VALUES ('367', '12:00 pm', '01:30 pm', '12:00 pm-01:30 pm', 'TTH', 'First', '2016-2017', '2', '1', '44', '101', '0') ; 
INSERT INTO `tblschedule` VALUES ('369', '03:00 pm', '04:30 pm', '03:00 pm-04:30 pm', 'TTH', 'First', '2016-2017', '19', '1', '44', '107', '28') ; 
INSERT INTO `tblschedule` VALUES ('370', '04:30 pm', '05:30 pm', '04:30 pm-05:30 pm', 'MWF', 'Second', '2016-2017', '12', '1', '44', '118', '2') ; 
INSERT INTO `tblschedule` VALUES ('371', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'TTH', 'Second', '2016-2017', '11', '1', '44', '119', '2') ; 
INSERT INTO `tblschedule` VALUES ('372', '09:00 am', '10:30 am', '09:00 am-10:30 am', 'T', 'Second', '2016-2017', '18', '1', '44', '120', '2') ; 
INSERT INTO `tblschedule` VALUES ('373', '01:30 pm', '03:00 pm', '01:30 pm-03:00 pm', 'TTH', 'Second', '2016-2017', '15', '1', '44', '116', '2') ; 
INSERT INTO `tblschedule` VALUES ('374', '03:00 pm', '04:30 pm', '03:00 pm-04:30 pm', 'TTH', 'Second', '2016-2017', '15', '1', '44', '122', '2') ; 
INSERT INTO `tblschedule` VALUES ('375', '01:30 pm', '03:00 pm', '01:30 pm-03:00 pm', 'TTH', 'Second', '2016-2017', '17', '1', '44', '123', '29') ; 
INSERT INTO `tblschedule` VALUES ('376', '04:30 pm', '06:00 pm', '04:30 pm-06:00 pm', 'TTH', 'Second', '2016-2017', '2', '1', '44', '124', '14') ; 
INSERT INTO `tblschedule` VALUES ('377', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'Second', '2016-2017', '16', '1', '44', '125', '26') ; 
INSERT INTO `tblschedule` VALUES ('378', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'MWF', 'Second', '2016-2017', '10', '1', '44', '116', '2') ; 
INSERT INTO `tblschedule` VALUES ('379', '09:30 am', '10:30 am', '09:30 am-10:30 am', 'MWF', 'Second', '2016-2017', '2', '1', '44', '121', '18') ; 
INSERT INTO `tblschedule` VALUES ('380', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'First', '2016-2017', '1', '1', '45', '114', '28') ; 
INSERT INTO `tblschedule` VALUES ('381', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'M', 'First', '2016-2017', '7', '1', '45', '109', '2') ; 
INSERT INTO `tblschedule` VALUES ('382', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'WMF', 'First', '2016-2017', '5', '1', '45', '108', '28') ; 
INSERT INTO `tblschedule` VALUES ('383', '01:30 pm', '02:30 pm', '01:30 pm-02:30 pm', 'MWF', 'First', '2016-2017', '5', '1', '45', '111', '29') ; 
INSERT INTO `tblschedule` VALUES ('384', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'TTH', 'First', '2016-2017', '4', '1', '45', '113', '23') ; 
INSERT INTO `tblschedule` VALUES ('385', '10:30 am', '12:00 am', '10:30 am-12:00 am', 'TTH', 'First', '2016-2017', '6', '1', '45', '110', '2') ; 
INSERT INTO `tblschedule` VALUES ('388', '03:00 pm', '04:30 pm', '03:00 pm-04:30 pm', 'TTH', 'First', '2016-2017', '5', '1', '21', '345', '30') ; 
INSERT INTO `tblschedule` VALUES ('390', '03:00 pm', '04:30 pm', '03:00 pm-04:30 pm', 'TTH', 'First', '2016-2017', '7', '1', '45', '144', '8') ; 
INSERT INTO `tblschedule` VALUES ('391', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'M', 'Second', '2016-2017', '8', '1', '45', '115', '8') ; 
INSERT INTO `tblschedule` VALUES ('392', '12:00 pm', '01:30 pm', '12:00 pm-01:30 pm', 'TTH', 'First', '2016-2017', '3', '1', '42', '84', '13') ; 
INSERT INTO `tblschedule` VALUES ('393', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'First', '2016-2017', '7', '2', '42', '84', '13') ; 
INSERT INTO `tblschedule` VALUES ('394', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'MWF', 'First', '2016-2017', '4', '2', '42', '79', '8') ; 
INSERT INTO `tblschedule` VALUES ('395', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'First', '2016-2017', '7', '2', '42', '78', '1') ; 
INSERT INTO `tblschedule` VALUES ('396', '02:30 pm', '03:30 pm', '02:30 pm-03:30 pm', 'MWF', 'First', '2016-2017', '1', '2', '42', '80', '11') ; 
INSERT INTO `tblschedule` VALUES ('397', '04:30 pm', '05:30 pm', '04:30 pm-05:30 pm', 'MWF', 'First', '2016-2017', '1', '2', '42', '81', '12') ; 
INSERT INTO `tblschedule` VALUES ('398', '09:00 am', '10:30 am', '09:00 am-10:30 am', 'TTH', 'First', '2016-2017', '5', '2', '42', '78', '26') ; 
INSERT INTO `tblschedule` VALUES ('399', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'TTH', 'First', '2016-2017', '7', '2', '42', '83', '28') ; 
INSERT INTO `tblschedule` VALUES ('402', '01:30 pm', '03:30 pm', '01:30 pm-03:30 pm', 'T', 'First', '2016-2017', '2', '2', '42', '85', '32') ; 
INSERT INTO `tblschedule` VALUES ('403', '04:30 pm', '06:00 pm', '04:30 pm-06:00 pm', 'TTH', 'First', '2016-2017', '5', '2', '42', '86', '8') ; 
INSERT INTO `tblschedule` VALUES ('404', '08:30 am', '09:30 am', '08:30 am-09:30 am', 'MWF', 'Second', '2016-2017', '6', '2', '42', '135', '28') ; 
INSERT INTO `tblschedule` VALUES ('405', '07:30 am', '09:00 am', '07:30 am-09:00 am', 'TTH', 'Second', '2016-2017', '8', '2', '42', '136', '11') ; 
INSERT INTO `tblschedule` VALUES ('406', '07:30 am', '08:30 am', '07:30 am-08:30 am', 'MWF', 'Second', '2016-2017', '8', '2', '42', '137', '6') ; 
INSERT INTO `tblschedule` VALUES ('407', '10:30 am', '11:30 am', '10:30 am-11:30 am', 'MWF', 'Second', '2016-2017', '10', '2', '42', '138', '25') ; 
INSERT INTO `tblschedule` VALUES ('408', '02:30 pm', '03:30 pm', '02:30 pm-03:30 pm', 'MWF', 'Second', '2016-2017', '4', '2', '42', '139', '26') ; 
INSERT INTO `tblschedule` VALUES ('409', '01:30 pm', '03:00 pm', '01:30 pm-03:00 pm', 'TTH', 'Second', '2016-2017', '6', '2', '42', '140', '18') ; 
INSERT INTO `tblschedule` VALUES ('410', '03:00 pm', '04:30 pm', '03:00 pm-04:30 pm', 'MWF', 'Second', '2016-2017', '3', '2', '42', '141', '31') ; 
INSERT INTO `tblschedule` VALUES ('411', '04:30 pm', '06:30 pm', '04:30 pm-06:30 pm', 'TH', 'Second', '2016-2017', '1', '2', '42', '142', '32') ; 
INSERT INTO `tblschedule` VALUES ('412', '09:30 am', '10:30 am', '09:30 am-10:30 am', 'MWF', 'Second', '2016-2017', '3', '2', '42', '143', '31') ;
#
# End of data contents of table tblschedule
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblauto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblinstructor`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbllogs`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsemester`
# --------------------------------------------------------


#
# Delete any existing table `tblsemester`
#

DROP TABLE IF EXISTS `tblsemester`;


#
# Table structure of table `tblsemester`
#

CREATE TABLE `tblsemester` (
  `SEMID` int(11) NOT NULL AUTO_INCREMENT,
  `SEMESTER` varchar(90) NOT NULL,
  `SETSEM` tinyint(1) NOT NULL,
  PRIMARY KEY (`SEMID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table tblsemester (2 records)
#
 
INSERT INTO `tblsemester` VALUES ('1', 'First', '1') ; 
INSERT INTO `tblsemester` VALUES ('2', 'Second', '0') ;
#
# End of data contents of table tblsemester
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblauto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblinstructor`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbllogs`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsemester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstuddetails`
# --------------------------------------------------------


#
# Delete any existing table `tblstuddetails`
#

DROP TABLE IF EXISTS `tblstuddetails`;


#
# Table structure of table `tblstuddetails`
#

CREATE TABLE `tblstuddetails` (
  `DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNO` int(30) NOT NULL,
  `LAST_SCHOOL` varchar(255) DEFAULT NULL,
  `LAST_SCHOOL_ADDR` varchar(255) DEFAULT NULL,
  `ADDR_WHILE_STUDY` varchar(255) DEFAULT NULL,
  `FATHER_NAME` varchar(150) DEFAULT NULL,
  `FATHER_CONTACT` varchar(100) DEFAULT NULL,
  `MOTHER_NAME` varchar(150) DEFAULT NULL,
  `MOTHER_CONTACT` varchar(100) DEFAULT NULL,
  `EMER_NAME` varchar(150) DEFAULT NULL,
  `EMER_REL` varchar(100) DEFAULT NULL,
  `EMER_ADDR` varchar(255) DEFAULT NULL,
  `EMER_CONTACT` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`DETAIL_ID`),
  KEY `IDNO` (`IDNO`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table tblstuddetails (149 records)
#
 
INSERT INTO `tblstuddetails` VALUES ('1', '100000056', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('2', '100000056', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('3', '100000057', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('4', '100000058', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('5', '100000061', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('6', '100000061', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('7', '100000062', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('8', '100000067', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('9', '100000068', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('10', '100000069', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('11', '100000069', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('12', '100000071', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('13', '100000073', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('14', '100000076', '', NULL, '', '', '', '', '', '', '', NULL, '', NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('15', '100000077', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('16', '100000079', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('17', '100000080', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('18', '100000081', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('19', '100000083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('20', '100000084', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('21', '100000085', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('22', '100000086', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('23', '100000087', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('24', '100000088', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('25', '100000090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('26', '100000091', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('27', '100000092', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('28', '100000093', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('29', '100000094', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('30', '100000095', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('31', '100000096', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('32', '100000097', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('33', '100000098', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('34', '100000099', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('35', '1000000100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('36', '1000000101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('37', '1000000102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('38', '1000000103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('39', '1000000104', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('40', '1000000105', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('41', '1000000106', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('42', '1000000107', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('43', '1000000108', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('44', '1000000109', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('45', '1000000110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('46', '1000000111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('47', '1000000112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('48', '1000000113', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('49', '1000000114', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('50', '1000000115', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('51', '1000000116', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('52', '1000000117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('53', '1000000118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('54', '1000000119', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('55', '1000000120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('56', '1000000121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('57', '1000000122', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('58', '1000000123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('59', '1000000124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('60', '1000000125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('61', '1000000126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('62', '1000000127', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('63', '1000000128', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('64', '1000000129', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('65', '1000000130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('66', '1000000131', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('67', '1000000132', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('68', '1000000133', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('69', '1000000134', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('70', '1000000135', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('71', '1000000136', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('72', '1000000137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('73', '1000000139', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('74', '1000000140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('75', '1000000142', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('76', '1000000143', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('77', '1000000144', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('78', '1000000145', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('79', '1000000146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('80', '1000000148', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('81', '1000000149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('82', '1000000152', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('83', '1000000153', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('84', '1000000154', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('85', '1000000155', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('86', '1000000156', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('87', '1000000157', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('88', '1000000158', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('89', '1000000159', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('90', '1000000160', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('91', '1000000161', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('92', '1000000162', '', NULL, '', '', '', '', '', '', '', NULL, '', NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('93', '1000000163', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('94', '1000000164', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('95', '1000000165', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('96', '1000000166', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('97', '1000000167', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('98', '1000000168', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('99', '1000000169', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('100', '1000000170', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('101', '1000000171', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('102', '1000000172', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('103', '1000000173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('104', '1000000174', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('105', '1000000175', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('106', '1000000176', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('107', '1000000177', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('108', '1000000178', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('109', '1000000179', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('110', '1000000180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('111', '1000000181', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('112', '1000000182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('113', '1000000183', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('114', '1000000184', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('115', '1000000185', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('116', '1000000186', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('117', '1000000187', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('118', '1000000188', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('119', '1000000189', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('120', '1000000190', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('121', '1000000191', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('122', '1000000192', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('123', '1000000193', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('124', '1000000194', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('125', '1000000195', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('126', '1000000196', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('127', '1000000197', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('128', '1000000198', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('129', '1000000199', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('130', '1000000200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL) ; 
INSERT INTO `tblstuddetails` VALUES ('142', '1000000212', 'Ambuklao National High School', 'Poblacion, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Douglas Palos', '12345678910', 'Cornelia Palos', '09197233884', 'Cornelia Palos', 'Mother', 'Poblacion, Bokod, Benguet', '09453754120', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('143', '1000000213', 'Ambuklao National High School', 'Poblacion, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Henry Kelcho', '1234567', 'Emma Kelcho', '12345678', 'Emma', 'mother', 'Poblacion, Bokod, Benguet', '12345678910', 'kurtreuelkelchs@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('144', '1000000214', 'Ambuklao National High School', 'Poblacion, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Douglas Palos', '12345678910', 'Cornelia Palos', '09197233884', 'Elton John D Palos', 'Mother', 'Poblacion, Bokod, Benguet', '09453754120', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('146', '1000000216', '', '', '', '', '', '', '', '', '', '', '', '') ; 
INSERT INTO `tblstuddetails` VALUES ('147', '1000000217', 'Ambuklao National High School', 'Poblacion, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Douglas Palos', '09453754120', 'Cornelia Palos', '09453754120', 'Elton John D Palos', 'Father', 'Poblacion, Bokod, Benguet', '09453754120', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('148', '1000000218', 'Ambuklao National High School', 'Poblacion, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Douglas Palos', '09453754120', 'Cornelia Palos', '09453754120', 'Elton John D Palos', 'Mother', 'Poblacion, Bokod, Benguet', '09453754120', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('149', '1000000219', 'Ambuklao National High School', 'Poblacion, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Douglas Palos', '09453754120', 'Cornelia Palos', '09197233884', 'Conan D Edogawa', 'Mother', 'Poblacion, Bokod, Benguet', '09453754120', 'eltonshinji6@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('150', '1000000220', 'Ambuklao National High School', 'Poblacion, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Douglas Palos', '09453754120', 'Cornelia Palos', '09197233884', 'Elton John D Palos', 'Mother', 'Poblacion, Bokod, Benguet', '09453754120', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('151', '1000000221', 'Ambuklao National High School', 'Poblacion, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Douglas Palos', '09453754120', 'Cornelia Palos', '09197233884', 'Elton John D Palos', 'Mother', 'Poblacion, Bokod, Benguet', '09453754120', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('152', '1000000222', 'Ambuklao National High School', 'Poblacion, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Douglas Palos', '12345678910', 'Cornelia Palos', '09197233884', 'Cornelia Palos', 'Mother', 'Bobok-Bisal, Bokod, Benguet', '09453754120', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('153', '1000000223', 'Ambuklao National High School', 'bokod', 'Poblacion, Bokod, Benguet', 'Elon Musk', '12345678910', 'Cornelia Palos', '12345678911', 'Elon Musk', 'Father', 'bokod', '12345678910', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('154', '1000000224', 'Ambuklao National High School', 'bokod', 'Poblacion, Bokod, Benguet', 'Elon Musk', '12345678910', 'Cornelia Palos', '12345678911', 'Elon Musk', 'Father', 'bokod', '12345678910', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('155', '1000000225', 'Ambuklao National High School', 'Ambuklao, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Elon Musk', '12345678910', 'Cornelia Palos', '09197233884', 'Elon Musk', 'Father', 'Poblacion, Bokod, Benguet', '12345678910', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('156', '1000000226', 'Ambuklao National High School', 'Ambuklao, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Elon Musk', '12345678910', 'Cornelia Palos', '09197233884', 'Elon Musk', 'Father', 'Poblacion, Bokod, Benguet', '12345678910', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('157', '1000000227', 'Ambuklao National High School', 'Ambuklao, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Elon Musk', '12345678910', 'Cornelia Palos', '09197233884', 'Elon Musk', 'Father', 'Poblacion, Bokod, Benguet', '12345678910', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('158', '1000000228', 'Ambuklao National High School', 'Ambuklao, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Elon Musk', '12345678910', 'Cornelia Palos', '09197233884', 'Elon Musk', 'Father', 'Poblacion, Bokod, Benguet', '12345678910', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('159', '1000000229', 'Ambuklao National High School', 'Ambuklao, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Elon Musk', '12345678910', 'Cornelia Palos', '09197233884', 'Elon Musk', 'Father', 'Poblacion, Bokod, Benguet', '12345678910', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('160', '1000000230', 'Ambuklao National High School', 'Ambuklao, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Elon Musk', '12345678910', 'Cornelia Palos', '09197233884', 'Elon Musk', 'Father', 'Poblacion, Bokod, Benguet', '12345678910', 'elt0npalos@gmail.com') ; 
INSERT INTO `tblstuddetails` VALUES ('161', '1000000231', 'Ambuklao National High School', 'Ambuklao, Bokod, Benguet', 'Poblacion, Bokod, Benguet', 'Elon Musk', '12345678910', 'Cornelia Palos', '09197233884', 'Elon Musk', 'Father', 'Poblacion, Bokod, Benguet', '12345678910', 'elt0npalos@gmail.com') ;
#
# End of data contents of table tblstuddetails
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblauto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblinstructor`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbllogs`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsemester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstuddetails`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudent`
# --------------------------------------------------------


#
# Delete any existing table `tblstudent`
#

DROP TABLE IF EXISTS `tblstudent`;


#
# Table structure of table `tblstudent`
#

CREATE TABLE `tblstudent` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDNO` int(20) NOT NULL,
  `FNAME` varchar(40) NOT NULL,
  `LNAME` varchar(40) NOT NULL,
  `MNAME` varchar(40) NOT NULL,
  `SUFFIX` varchar(20) DEFAULT NULL,
  `SEX` varchar(10) NOT NULL DEFAULT 'Male',
  `BDAY` date NOT NULL,
  `BPLACE` text NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  `NATIONALITY` varchar(40) NOT NULL,
  `CONTACT_NO` varchar(40) NOT NULL,
  `HOME_ADD` text NOT NULL,
  `ACC_USERNAME` varchar(255) NOT NULL,
  `ACC_PASSWORD` text NOT NULL,
  `student_status` text NOT NULL,
  `YEARLEVEL` int(11) NOT NULL,
  `STUDSECTION` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `STUDPHOTO` varchar(255) NOT NULL,
  `SEMESTER` varchar(30) NOT NULL,
  `SYEAR` varchar(30) NOT NULL,
  `NewEnrollees` tinyint(1) NOT NULL,
  `MAIDEN_NAME` varchar(150) DEFAULT NULL,
  `ETHNICITY` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`S_ID`),
  UNIQUE KEY `IDNO` (`IDNO`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table tblstudent (112 records)
#
 
INSERT INTO `tblstudent` VALUES ('13', '100000076', 'Junnel', 'Henong', 'L', NULL, 'Male', '1995-09-28', 'Bokod', 'Single', 'Filipino', '09179959869', 'Poblacion, Bokod, Benguet', 'junnel', 'c507f3285dc8f7c2ec06c8e84a5bcfdef5b75bc3', 'New', '1', '1', '18', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('14', '100000077', 'Alamada', 'Norhan', 'K', NULL, 'Male', '1995-08-10', 'Tublay', 'Single', 'Filipino', '09287466580', 'Poblacion, Tublay, Benguet', 'norhan', 'eb64988565e5d1a8eb2417a3d23781811f6316c8', 'New', '1', '1', '18', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('15', '100000079', 'Rabpani', 'Palisaman', 'p', NULL, 'Male', '1997-07-14', 'Itogon', 'Single', 'PIlipino', '09179959869', 'Poblacion, Itogon, Benguet', 'palisaman', '2e2acf50c2e443211ce148db65e456120fc9edd4', 'New', '1', '1', '23', '', 'Second', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('16', '100000080', 'Edward', 'Madriaga', 'M', NULL, 'Male', '1999-08-26', 'Bakun', 'Single', 'Filipino', '09264566776', 'Poblacion, Bakun, Benguet', 'edward', '55b5a0f748d3a82dce10b205ecb0a0d8916c66a1', 'New', '1', '1', '18', '', 'Second', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('18', '100000083', 'Josh Bernard', 'Cadelina', 'H', NULL, 'Male', '1994-11-22', 'Kapangan', 'Single', 'Filipino', '092756633785', 'Poblacion, Kapangan, Benguet', 'josh', 'c028c213ed5efcf30c3f4fc7361dbde0c893c5b7', 'New', '1', '1', '10', 'student_image/13406890_1099504936754825_2344921503074981979_n.jpg', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('19', '100000084', 'Icer Yves', 'Exiomo', 'F', NULL, 'Male', '1997-02-22', 'Kibungan', 'Single', 'Filipino', '09287466580', 'Poblacion, Kibungan, Benguet', 'icer', '8870c5997fb3dc73724d6ef9716013706bc0eb6d', 'New', '1', '1', '18', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('20', '100000085', 'Baltazar, Jr.', 'Votacion', 'B', NULL, 'Male', '1998-02-28', 'Mankayan', 'Single', 'Filipino', '09097844576', 'Poblacion, Mankayan, Benguet', 'baltazar', '97b13511481f75df46827988e27e8b925ee7c0ac', 'New', '1', '1', '18', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('21', '100000086', 'Jenny Lyn', 'Dorado', 'K', NULL, 'Male', '1996-02-29', 'Buguias', 'Single', 'Filipino', '09754990672', 'Poblacion, Buguias, Benguet', 'jenny', '6a3f4389a53c889b623e67f385f28ab8e84e5029', 'New', '1', '1', '10', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('22', '100000087', 'Ronald', 'Dela Cruz', 'K', NULL, 'Male', '1997-09-28', 'Kabayan', 'Married', 'Filipino', '09267588909', 'Poblacion, Kabayan, Benguet', 'ronald', '9d270ca213048cc46f762591f54b6a0d59390996', 'New', '1', '1', '18', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('23', '100000088', 'Ar ar', 'Catalan', 'C', NULL, 'Male', '1997-09-28', 'Sablan', 'Single', 'Filipino', '09287569403', 'Poblacion, Sablan, Benguet', 'arar', '1dface85bd933c1b72b17eec0bdb76ed95e659ba', 'New', '1', '1', '18', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('24', '100000090', 'Jenny Pearl', 'Cordero', 'K', NULL, 'Female', '1995-09-08', 'La Trinidad', 'Single', 'Filipino', '09267577888', 'Poblacion, La Trinidad, Benguet', 'pearl', '4ddc5d84096cb270103079731103f93082d8b099', 'New', '1', '0', '10', '', 'Second', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('25', '100000091', 'Bainusarah', 'Mangulamas', 'M', NULL, 'Female', '1997-02-15', 'Bokod', 'Single', 'Filipino', '09267544890', 'Poblacion, Bokod, Benguet', 'bai', '7c824f2e1c4d8e5c9445dd7ded4e96febed020f7', 'New', '1', '1', '18', '', 'Second', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('26', '100000092', 'Jerome', 'Legazpe', 'M', NULL, 'Male', '1996-02-28', 'Tublay', 'Single', 'Filipino', '09275566712', 'Poblacion, Tublay, Benguet', 'jerome', '723156650c5778d0e4df4b2fbfeefa65359302e5', 'New', '1', '1', '18', '', 'Second', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('29', '100000095', 'Johnrey', 'Betito', 'W', NULL, 'Male', '1998-09-09', 'Atok', 'Single', 'Filipino', '09878757575', 'Poblacion, Atok, Benguet', 'johnrey', '38bdca114849afd1be4000a690e233ee6ab11e25', 'New', '1', '0', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('30', '100000096', 'Jammal', 'Mangulamas', 'L', NULL, 'Male', '1996-10-09', 'Kapangan', 'Single', 'Filipino', '09129877756', 'Poblacion, Kapangan, Benguet', 'jammal', '55e95a5a5f88bbb32ea13542d428540fc4f6faea', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('31', '100000097', 'Almohadnie', 'Angeles', 'O', NULL, 'Male', '1990-01-02', 'Kibungan', 'Single', 'Filipino', '09129989876', 'Poblacion, Kibungan, Benguet', 'almohadnie', '24655db0feba3830ac7bc346ee331e94d85201ac', 'New', '1', '0', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('32', '100000098', 'Lorraine', 'Merquillo', 'S', NULL, 'Female', '1998-10-02', 'Mankayan', 'Single', 'Filipino', '09129987883', 'Poblacion, Mankayan, Benguet', 'lorraine', '007eedf694d0287b7f3609669737ee8025708336', 'Irregular', '1', '2', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('33', '100000099', 'Joseph', 'Handoc', 'M', NULL, 'Male', '1995-07-29', 'Buguias', 'Single', 'Filipino', '09087765556', 'Poblacion, Buguias, Benguet', 'joseph', '461476587780aa9fa5611ea6dc3912c146a91760', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('34', '1000000100', 'Ivy', 'Santiago', 'B', NULL, 'Female', '1997-09-09', 'Kabayan', 'Single', 'Filipino', '09998877665', 'Poblacion, Kabayan, Benguet', 'ivy', '2c66c6e3c743465602c6dcd8e9412bee5fb846ed', 'New', '1', '1', '10', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('35', '1000000101', 'Suzette', 'Cadelina', 'H', NULL, 'Female', '1987-09-15', 'Sablan', 'Married', 'Filipino', '09127875674', 'Poblacion, Sablan, Benguet', 'suzette', '754597e45a1a8d6c6c071ea892194e8f5483f782', 'New', '1', '0', '23', '', 'First', '', '1', 'Gonzales', NULL) ; 
INSERT INTO `tblstudent` VALUES ('36', '1000000102', 'Arjohn', 'Bustamante', 'G', NULL, 'Male', '1994-07-08', 'La Trinidad', 'Single', 'Filipino', '09128987657', 'Poblacion, La Trinidad, Benguet', 'arjohn', '33faf9c06d0cc880493e3c57a8fb25fb1e180610', 'New', '1', '0', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('37', '1000000103', 'Christopher', 'Basa', 'K', NULL, 'Male', '1998-12-25', 'Bokod', 'Single', 'Filipino', '09367584758', 'Poblacion, Bokod, Benguet', 'christopher', 'd6a3a4306f20dc52f478d602ba53e8d95963acac', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('38', '1000000104', 'Remvi', 'Cadet', 'M', NULL, 'Male', '1990-11-08', 'Tublay', 'Single', 'Filipino', '09128873674', 'Poblacion, Tublay, Benguet', 'remvi', 'a38966035b61798fce9e1fd0cd3df4d2edb3d417', 'New', '1', '1', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('39', '1000000105', 'Abby', 'Peralta', 'L', NULL, 'Female', '1994-10-29', 'Itogon', 'Single', 'Filipino', '09199989887', 'Poblacion, Itogon, Benguet', 'abby', 'e76ceff3c47adb10f62b1acd7109f88fbd5e9ca7', 'New', '1', '1', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('40', '1000000106', 'Mary Lee', 'Borja', 'H', NULL, 'Female', '1998-01-20', 'Bakun', 'Single', 'Filipino', '09152283774', 'Poblacion, Bakun, Benguet', 'marylee', '1c24578ca947f858d5735526cb7fd1e54dcb84e0', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('41', '1000000107', 'Jhing', 'Bawaan', 'T', NULL, 'Female', '1999-05-22', 'Atok', 'Single', 'Filipino', '09165567890', 'Poblacion, Atok, Benguet', 'jhing', 'fcf49f880f12c32bf91b172910440771279e0878', 'New', '1', '1', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('42', '1000000108', 'Edwin', 'Manda', 'G', NULL, 'Male', '1999-08-20', 'Kapangan', 'Single', 'Filipino', '09098765434', 'Poblacion, Kapangan, Benguet', 'edwin', '3c7a591985b5e780ebcc40916fdeb443b8541c2a', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('43', '1000000109', 'Danae Shaira', 'Villacruz', 'G', NULL, 'Female', '1997-03-04', 'Kibungan', 'Single', 'Filipino', '09178766776', 'Poblacion, Kibungan, Benguet', 'danae', 'eb93e232a50ba000b7a9e0779c92e9e87d804058', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('44', '1000000110', 'Gwendolyn', 'Cadelina', 'H', NULL, 'Female', '1995-10-16', 'Mankayan', 'Single', 'Filipino', '09887676546', 'Poblacion, Mankayan, Benguet', 'gwendolyn', '93b7df2fa1586cc4351e99bce3f74805c1df4790', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('45', '1000000111', 'Kiana Justine', 'Tirasol', 'C', NULL, 'Female', '1997-04-28', 'Buguias', 'Single', 'Filipino', '09127788767', 'Poblacion, Buguias, Benguet', 'kiana', '703ddbc5fe426b4973c206f758719f6009b363c3', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('46', '1000000112', 'Hannah', 'Siasico', 'C', NULL, 'Female', '1998-02-04', 'Kabayan', 'Single', 'Filipino', '09187767645', 'Poblacion, Kabayan, Benguet', 'hannah', '675dc611bafb0b7348dd3baf7e005b6916fb954d', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('47', '1000000113', 'Laraine Dee', 'Handoc', 'M', NULL, 'Female', '0000-00-00', 'Sablan', 'Single', '09356672663', '09356672663', 'Poblacion, Sablan, Benguet', 'laraine', 'c8915fcccf9088a7b8f8242d9fbed3017cc573a8', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('48', '1000000114', 'Elzevir', 'Pagayon', 'P', NULL, 'Male', '1999-05-01', 'La Trinidad', 'Single', 'Filipino', '09289937774', 'Poblacion, La Trinidad, Benguet', 'elzevir', 'be0127ba8587beced734e5a350582f3dba5e5b4b', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('49', '1000000115', 'Novelyn', 'Villaruel', 'Y', NULL, 'Female', '1998-05-22', 'Bokod', 'Single', 'Filipino', '09878874847', 'Poblacion, Bokod, Benguet', 'novelyn', '661382b240420fef499ddb3168c5182b4045113d', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('50', '1000000116', 'Jeremiah', 'Garcia', 'G', NULL, 'Male', '2011-11-11', 'Tublay', 'Single', 'Filipino', '09678837637', 'Poblacion, Tublay, Benguet', 'jeremiah', 'a9df78b4b5c00745f26b0821b2cc57336a474862', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('51', '1000000117', 'Ruby Ann', 'Pelaez', 'G', NULL, 'Female', '1997-10-04', 'Itogon', 'Single', 'Filipino', '09234646773', 'Poblacion, Itogon, Benguet', 'ruby', '18e40e1401eef67e1ae69efab09afb71f87ffb81', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('52', '1000000118', 'Pia Samantha', 'Roldan', 'C', NULL, 'Female', '1995-09-23', 'Bakun', 'Single', 'Filipino', '09127873664', 'Poblacion, Bakun, Benguet', 'pia', '5cd788f9fa28387309d0bcc2c5429570ee9fe30e', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('53', '1000000119', 'Virgil', 'Loquias', 'M', NULL, 'Male', '1993-04-05', 'Atok', 'Single', 'Filipino', '09478837288', 'Poblacion, Atok, Benguet', 'virgil', '8460e247a3dbc5da1ba0ca46c5321ac9db046fb9', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('54', '1000000120', 'Precious', 'Lanuevo', 'N', NULL, 'Female', '1997-09-04', 'Kapangan', 'Single', 'Filipino', '09238847849', 'Poblacion, Kapangan, Benguet', 'precious', '42e63a94dbeff43190f6c03f7c5885c01c87c200', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('55', '1000000121', 'Carlyne Joy', 'Tenecio', 'H', NULL, 'Female', '1997-10-26', 'Kibungan', 'Single', 'Filipino', '09127738462', 'Poblacion, Kibungan, Benguet', 'carlyne', '9dbb824721b2dbdbd89077996cdab1d940764303', 'New', '1', '0', '18', 'student_image/12909489_1257077340988202_2965799069910400828_o.jpg', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('56', '1000000122', 'Jake', 'Umpa', 'U', NULL, 'Male', '1992-08-31', 'Mankayan', 'Single', 'Filipino', '09237873662', 'Poblacion, Mankayan, Benguet', 'jake', 'c8d99c2f7cd5f432c163abcd422672b9f77550bb', 'New', '1', '0', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('57', '1000000123', 'Michael', 'Cadelina', 'T', NULL, 'Male', '1996-08-21', 'Buguias', 'Single', 'Filipino', '09148874738', 'Poblacion, Buguias, Benguet', 'michael', '17b9e1c64588c7fa6419b4d29dc1f4426279ba01', 'New', '1', '0', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('58', '1000000124', 'Kristine', 'Villaruel', 'B', NULL, 'Female', '1995-06-11', 'Kabayan', 'Single', 'Filipino', '09477463722', 'Poblacion, Kabayan, Benguet', 'kristine', 'a63a3be77fa51c8ca25c3b8be5ac5d0e93917c0b', 'New', '1', '0', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('59', '1000000125', 'Kindahl', 'Alog', 'E', NULL, 'Female', '1999-04-22', 'Sablan', 'Single', 'Filipino', '09192883737', 'Poblacion, Sablan, Benguet', 'kindahl', '4dc1091beca44e5133fe7ca443ce4116e6275006', 'New', '1', '0', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('60', '1000000126', 'Jecel', 'Eran', 'K', NULL, 'Female', '1998-03-02', 'La Trinidad', 'Single', 'Filipino', '09789938383', 'Poblacion, La Trinidad, Benguet', 'jecel', 'efa848a414acf8bd9b39c2c55b55a6901c648f89', 'New', '1', '1', '18', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('61', '1000000127', 'Earle', 'Valdez', 'Q', NULL, 'Male', '1997-11-26', 'Bokod', 'Single', 'Filipino', '09567748392', 'Poblacion, Bokod, Benguet', 'earle', 'aa2521688dc8a0d74bd77a583e928d31a5731836', 'New', '1', '1', '18', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('62', '1000000128', 'Gaudelyn', 'Eucare', 'V', NULL, 'Female', '1996-02-14', 'Tublay', 'Single', 'Filipino', '09578847384', 'Poblacion, Tublay, Benguet', 'gaudelyn', 'e03a6ee418ce3dc843a2b9c8abdbb7af253d919d', 'New', '1', '0', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('63', '1000000129', 'Ellyza', 'Doroteo', 'O', NULL, 'Female', '1996-12-12', 'Itogon', 'Single', 'Filipino', '09127736846', 'Poblacion, Itogon, Benguet', 'ellyza', '886093a9895ab643ddb92809dd62eb898a88751f', 'New', '1', '0', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('64', '1000000130', 'Cunanan', 'Pagayao', 'L', NULL, 'Male', '1990-10-14', 'Bakun', 'Single', 'Filipino', '09257748383', 'Poblacion, Bakun, Benguet', 'cunanan', '894f59cb98e073fec902cbbff0e9d143102082fd', 'New', '1', '0', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('65', '1000000131', 'Samantha', 'Romano', 'I', NULL, 'Female', '1990-12-05', 'Atok', 'Single', 'Filipino', '09238746574', 'Poblacion, Atok, Benguet', 'samantha', 'ec5a7c3e21436a8e76716710ce551356f9aa745e', 'Transferee', '3', '0', '20', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('66', '1000000132', 'Charnel', 'Manajero', 'D', NULL, 'Male', '1990-05-19', 'Kapangan', 'Single', 'Filipino', '09768859575', 'Poblacion, Kapangan, Benguet', 'charnel', 'eab5aa588a82582c0f60e4d6b304d6822efb127e', 'New', '0', '0', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('67', '1000000133', 'Timmy-babe', 'kaliga', 'k', NULL, 'Male', '1998-05-05', 'Kibungan', 'Single', 'Filipino', '09752345768', 'Poblacion, Kibungan, Benguet', 'Timmy', 'cb88945e9d64c16a44cb4cf567b2b6a211e9dce2', 'New', '1', '1', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('68', '1000000134', 'Reann', 'Alaban', 'K', NULL, 'Male', '1997-09-08', 'Mankayan', 'Single', 'Filipino', '9756787455', 'Poblacion, Mankayan, Benguet', 'Reann', 'f31445a35f65dbc7040cb5b1bd58f1a70ff4b093', 'New', '1', '1', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('69', '1000000135', 'Redd', 'Ventura', 'V', NULL, 'Male', '1996-08-07', 'Buguias', 'Single', 'Filipino', '09757867543', 'Poblacion, Buguias, Benguet', 'Redd', '0e3b14615c2c441f2215aff1fe5488866545b9c5', 'New', '1', '0', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('70', '1000000136', 'Ronald', 'Careno', 'M', NULL, 'Female', '2002-02-01', 'Kabayan', 'Single', '09257655897', '09257655897', 'Poblacion, Kabayan, Benguet', 'careno', '0160c52958109c870c01b623f7846c414bf0b0f5', 'New', '1', '0', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('71', '1000000137', 'Kyla', 'Catalan', 'C', NULL, 'Female', '1997-01-28', 'Sablan', 'Single', 'Filipino', '09287566444', 'Poblacion, Sablan, Benguet', 'kyla', 'd4e85d45106df12908f2fb2490bd303ad8a30d32', 'New', '1', '0', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('72', '1000000139', 'Rain', 'Storm', 'G', NULL, 'Female', '2001-02-01', 'La Trinidad', 'Single', '09129978666', '09129978666', 'Poblacion, La Trinidad, Benguet', 'rain', 'fbec17cb2fcbbd1c659b252230b48826fc563788', 'New', '1', '1', '18', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('73', '1000000140', 'khein', 'alamada', 'c', NULL, 'Male', '1997-10-07', 'Bokod', 'Single', 'Filipino', '09751209609', 'Poblacion, Bokod, Benguet', 'khein', '20ae5f2ba23d8ba0798e8ae1f48701d3c14db635', 'New', '1', '1', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('80', '1000000149', 'Yancy', 'Mangelen', 'M', NULL, 'Male', '1997-08-28', 'Mankayan', 'Single', 'Filipino', '09753558619', 'Poblacion, Mankayan, Benguet', 'yancy', '70a24d536eb68af18a2f5051690c3021e98b1f8e', 'New', '1', '1', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('81', '1000000152', 'Zennia Rica', 'Alog', 'M', NULL, 'Female', '1998-01-20', 'Buguias', 'Single', '09274658202', '09274658202', 'Poblacion, Buguias, Benguet', 'rica', 'e2d9832b3cefa975803be763b95d3c502c42a0dc', 'New', '1', '0', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('82', '1000000153', 'Sam', 'Tacardon Jr.', 'M', NULL, 'Male', '1998-02-28', 'Kabayan', 'Single', 'Filipino', '09274355123', 'Poblacion, Kabayan, Benguet', 'sam', 'f16bed56189e249fe4ca8ed10a1ecae60e8ceac0', 'New', '1', '1', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('83', '1000000154', 'NiÃ±a Rica ', 'Miguel', 'G', NULL, 'Female', '1999-05-28', 'Sablan', 'Single', 'Filipino', '09287535332', 'Poblacion, Sablan, Benguet', 'nina', 'b443de4b0ff48581d8743a5f5cad5321e40054c2', 'New', '1', '0', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('84', '1000000155', 'Gianna Mae', 'Gapasin', 'K', NULL, 'Female', '1999-01-29', 'La Trinidad', 'Single', 'Filipino', '09274523532', 'Poblacion, La Trinidad, Benguet', 'gianna', '72b1ddf9b91795e4bde0de7811e8e35865e1f0f7', 'New', '1', '0', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('85', '1000000156', 'Rojie Andrea', 'Alog', 'H', NULL, 'Female', '1999-09-28', 'Bokod', 'Single', 'Filipino', '09275644190', 'Poblacion, Bokod, Benguet', 'rojie', '4f07c77b1d33cce74323b28bb449979c42e9a151', 'New', '1', '2', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('86', '1000000157', 'Jerih Mae', 'Hapinat', 'H', NULL, 'Female', '1998-12-12', 'Tublay', 'Single', 'Filipino', '09274344123', 'Poblacion, Tublay, Benguet', 'jerih', '7fc63d22370ec9812fc7a94d6adf74a5511b5e6d', 'New', '1', '0', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('87', '1000000158', 'Krista Mae', 'Lazo', 'C', NULL, 'Female', '1998-08-22', 'Itogon', 'Single', 'Filipino', '09265355123', 'Poblacion, Itogon, Benguet', 'krista', 'ba770747d84d60654212d3173c719564d2f30240', 'New', '1', '0', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('88', '1000000159', 'Rossel Abasola', 'Del Pilar', 'B', NULL, 'Female', '1999-01-30', 'Bakun', 'Single', 'Filipino', '09285355102', 'Poblacion, Bakun, Benguet', 'rossel', 'd35fb797cd118a2bb7b679cee6ceada9a6bdd151', 'New', '1', '0', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('89', '1000000160', 'Allyza Joyce', 'Anajao', 'A', NULL, 'Female', '1998-02-21', 'Atok', 'Single', 'Filipino', '09251908245', 'Poblacion, Atok, Benguet', 'allyza', '5b13d27681d01db855b898f5c3ff33f592138806', 'New', '1', '0', '23', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('90', '1000000161', 'Joali', 'Plang ', 'C', NULL, 'Male', '1997-09-13', 'Kapangan', 'Single', 'Filipino', '09256171768', 'Poblacion, Kapangan, Benguet', 'joali', '87d59f4b9ca4058fa88b586ce4ef27492562873e', 'New', '1', '1', '10', '', 'First', '', '1', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('91', '1000000162', 'jahad', 'mantil', 'k', NULL, 'Male', '1998-08-23', 'Kibungan', 'Single', 'Filipino', '09753421234', 'Poblacion, Kibungan, Benguet', 'jahad', '34753f1ba315c18f3ffa134ec02c4ffbdf2bc9cb', 'New', '1', '1', '10', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('92', '1000000163', 'hamid', 'Abdul', 'G', NULL, 'Male', '1997-07-25', 'Mankayan', 'Single', 'Philippines', '09765623654', 'Poblacion, Mankayan, Benguet', 'hamid', 'e5c4f933a178cd626655c7715ac38cde59f1efe3', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('93', '1000000164', 'kamaruden', 'adapen ', 'K', NULL, 'Male', '1998-06-12', 'Buguias', 'Single', 'Filipino', '09876543143', 'Poblacion, Buguias, Benguet', 'kamaruden', '0a5c751a397ba846cdf3578da5d5107875ad1e6d', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('94', '1000000165', 'Abdulsalam', 'mamadla', 'L', NULL, 'Male', '1998-05-15', 'Kabayan', 'Single', 'Filipino', '09757645152', 'Poblacion, Kabayan, Benguet', 'mamadla', '19cb9f6c054fc862004d2e2d14356bed5c162ef7', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('95', '1000000166', 'alex', 'Uga', 'H', NULL, 'Male', '1997-08-12', 'Sablan', 'Single', 'Filipino', '09756544523', 'Poblacion, Sablan, Benguet', 'alex', '60c6d277a8bd81de7fdde19201bf9c58a3df08f4', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('96', '1000000167', 'Ron bryan ', 'Presas', 'P', NULL, 'Male', '1998-07-06', 'La Trinidad', 'Single', 'Filipino', '09751234765', 'Poblacion, La Trinidad, Benguet', 'Presas', '111ef72383af1ef97f8dfac345e2e052b72b2e9e', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('97', '1000000168', 'Anne', 'Parcon', 'S', NULL, 'Female', '1999-09-07', 'Bokod', 'Single', 'Filipino', '09265112349', 'Poblacion, Bokod, Benguet', 'anne', '96657fd33d4351fb0ec777fd7064e03b0adc3a35', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('98', '1000000169', 'Christian', 'Oranza', 'K', NULL, 'Male', '1999-07-06', 'Tublay', 'Single', 'Filipino', '09876543565', 'Poblacion, Tublay, Benguet', 'christian', '2314b2e3a4a1f7db165be2aafbf1efd78f28cc97', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('99', '1000000170', 'Ella', 'Banares', 'H', NULL, 'Female', '1998-04-04', 'Itogon', 'Single', 'Filipino', '09123445768', 'Poblacion, Itogon, Benguet', 'ella', '5edf31da3f42a518437a149eb6d70cd01c02c3cd', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('100', '1000000171', 'Dexter', 'Magoncia', 'M', NULL, 'Male', '1997-05-05', 'Bakun', 'Single', 'Filipino', '09675413276', 'Poblacion, Bakun, Benguet', 'dexter', 'efce8cd161897feeaa7979d892dc26a8a8d8eea3', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('101', '1000000172', 'Elea', 'Medrano', 'M', NULL, 'Female', '1997-04-04', 'Atok', 'Single', 'Filipino', '09876312342', 'Poblacion, Atok, Benguet', 'elea', '687bc2d923531096fac1059dfb9c606182c0958d', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('102', '1000000173', 'Joseph', 'Handoc', 'K', NULL, 'Female', '0207-01-07', 'Kapangan', 'Single', '09811326781', '09811326781', 'Poblacion, Kapangan, Benguet', 'Handoc', 'e6b38ca094163918db68452fbe5ace8732794415', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('103', '1000000174', 'Zoharto', 'Manangga', 'M', NULL, 'Male', '1998-11-23', 'Kibungan', 'Single', 'Filipino', '09123487657', 'Poblacion, Kibungan, Benguet', 'zoharto', 'eedda5500b1e2bce2cb46aaf959587429a8669cd', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('104', '1000000175', 'Bianca', 'Camelle', 'C', NULL, 'Female', '1998-12-23', 'Mankayan', 'Single', 'Filipino', '09352176898', 'Poblacion, Mankayan, Benguet', 'bianca', '2a69ed80e5dfa142aa29c01680eb65649b12b9b6', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('105', '1000000176', 'Jhon', 'Bacalso', 'B', NULL, 'Male', '1996-03-07', 'Buguias', 'Single', 'Filipino', '09756765432', 'Poblacion, Buguias, Benguet', 'jhon', 'c27224cfa8386dcd2bb90db1e1ed7f0747de8cd7', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('106', '1000000177', 'Kristina', 'claudio', 'K', NULL, 'Female', '1998-11-30', 'Kabayan', 'Single', 'Filipino', '09756478765', 'Poblacion, Kabayan, Benguet', 'kristina', '2d3b2ae69a50d2c9c76ad4e6a67c7707909d0797', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('107', '1000000178', 'Miralles', 'Dalyne', 'H', NULL, 'Female', '1999-02-04', 'Sablan', 'Single', 'Filipino', '09654367543', 'Poblacion, Sablan, Benguet', 'miralles', '08b1cf978acabd01a00322224e5c52c31ae8dbfd', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('108', '1000000179', 'Janette', 'Nillos', 'A', NULL, 'Female', '1997-02-01', 'La Trinidad', 'Single', '09876543564', '09876543564', 'Poblacion, La Trinidad, Benguet', 'janette', 'db744ba63c35ddb50f92933afaeebaef9025483a', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('109', '1000000180', 'Farsallah', 'Aliso', 'A', NULL, 'Female', '1997-06-25', 'Bokod', 'Single', 'Filipino', '09786756432', 'Poblacion, Bokod, Benguet', 'farsallah', 'f2d9114d659e229e7b58f5813daaa9d88cb841ab', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('110', '1000000181', 'Lady Lyn', 'Sullano', 'B', NULL, 'Female', '1997-08-15', 'Tublay', 'Single', 'Filipino', '09878767654', 'Poblacion, Tublay, Benguet', 'ladylyn', '470f859af53837465e3c8fc53ae4a1be800d7240', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('111', '1000000182', 'alex', 'wellms', 'W', NULL, 'Male', '1995-07-16', 'Itogon', 'Single', 'Filipino', '09756454322', 'Poblacion, Itogon, Benguet', 'wellms', '63bdc53e431e4957b62faa6cd0465a666bd6ce1e', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('112', '1000000183', 'Glyd', 'Manda', 'M', NULL, 'Male', '1997-03-24', 'Bakun', 'Single', 'Filipino', '09122366754', 'Poblacion, Bakun, Benguet', 'glyd', 'cd31ef62c1722df14cbc0bc238cbbe9cb5e970ca', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('113', '1000000184', 'wevan', 'chae', 'D', NULL, 'Male', '1997-11-12', 'Atok', 'Single', 'Filipino', '098765453', 'Poblacion, Atok, Benguet', 'wevan', 'aadad817d5f525087ca053ccce75ac5e9bafd3a0', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('114', '1000000185', 'Kitty', 'Zevlag', 'Z', NULL, 'Male', '1995-10-25', 'Kapangan', 'Single', 'Filipino', '09872354676', 'Poblacion, Kapangan, Benguet', 'kitty', '95d79f53b52da1408cc79d83f445224a58355b13', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('115', '1000000186', 'Christine', 'Parantar', 'H', NULL, 'Female', '1996-09-18', 'Kibungan', 'Single', 'Filipino', '09876754123', 'Poblacion, Kibungan, Benguet', 'christine', '70e8b6e13c18e8800ef6b67166d0409e66ab58a9', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('116', '1000000187', 'JC', 'Burgos', 'B', NULL, 'Male', '1996-09-17', 'Mankayan', 'Single', 'Filipino', '09871234981', 'Poblacion, Mankayan, Benguet', 'jc', 'f9ae8604de015e6fc12a1ebdbe72f262b981a2f6', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('117', '1000000188', 'Dedal', 'Stef', 'S', NULL, 'Male', '1996-09-15', 'Buguias', 'Single', 'Filipino', '09877656123', 'Poblacion, Buguias, Benguet', 'dedal', 'bc370f94f6cf9acc580c2c50f3d4dff756e39bac', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('118', '1000000189', 'Tessa', 'Balboa', 'T', NULL, 'Female', '2000-02-23', 'Kabayan', 'Single', 'Filipino', '-09765445321', 'Poblacion, Kabayan, Benguet', 'tessa', 'e2e18d551d92039e2ae71fc6854f0a12d2f9a730', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('119', '1000000190', 'Neoboy', 'Bumatay', 'A', NULL, 'Male', '0196-11-09', 'Sablan', 'Single', 'Filipino', '09564534198', 'Poblacion, Sablan, Benguet', 'neoboy', 'e5aa55fb947a507a6b9fddcb2885eea498b2ace9', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('120', '1000000191', 'Marian', 'Parcon', 'K', NULL, 'Female', '2000-11-17', 'La Trinidad', 'Single', 'Filipino', '09876545676', 'Poblacion, La Trinidad, Benguet', 'marian', '15985e73bfe2e61c83c1b328087be49992d25081', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('121', '1000000192', 'Jonathan', 'Watson', 'A', NULL, 'Male', '1996-10-19', 'Bokod', 'Single', 'Filipino-Canadian', '09674523897', 'Poblacion, Bokod, Benguet', 'jonathan', '3692bfa45759a67d83aedf0045f6cb635a966abf', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('122', '1000000193', 'Arliz', 'Tomboc', 'T', NULL, 'Male', '1997-12-12', 'Tublay', 'Single', 'Filipino', '09876523109', 'Poblacion, Tublay, Benguet', 'arliz', 'e9bc16a650318b1a218c3212e63af7f5c65f9295', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('123', '1000000194', 'Rhon', 'Agot', 'V', NULL, 'Male', '1997-11-22', 'Itogon', 'Single', 'Filipino', '09261789765', 'Poblacion, Itogon, Benguet', 'rhon', '473f8c82c83421d18ecb9464d158b846f611008f', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('124', '1000000195', 'Alison', 'Venus', 'S', NULL, 'Female', '1997-03-23', 'Bakun', 'Single', 'Filipino', '-09176534281', 'Poblacion, Bakun, Benguet', 'alison', '4a4f22fbabc5d6375b354538de0249eb0a80f614', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('125', '1000000196', 'Pauline ', 'Estrella', 'E', NULL, 'Female', '1996-11-30', 'Atok', 'Single', 'Filipino', '09756754121', 'Poblacion, Atok, Benguet', 'pauline', 'e4b4cd4210ee87c60da653c1b6a77d529c1a079d', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('126', '1000000197', 'Diane', 'Dina', 'D', NULL, 'Female', '2000-11-09', 'Kapangan', 'Single', 'Filipino', '09176564129', 'Poblacion, Kapangan, Benguet', 'diane', 'daf3ef29366afaf65c691b1e42f84c8621f09db6', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('127', '1000000198', 'klee', 'Nex', 'X', NULL, 'Male', '1997-11-17', 'Kibungan', 'Single', 'Filipino', '09765412098', 'Poblacion, Kibungan, Benguet', 'klee', 'e47124b77b6860396297e8649228afd93a29bc6f', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('128', '1000000199', 'Betchay', 'Yapchengco', 'Y', NULL, 'Female', '1996-09-16', 'Mankayan', 'Single', 'Filipino', '09657654192', 'Poblacion, Mankayan, Benguet', 'betchay', 'aafe76c1565aa924f2674f5c6d1c0d38cb81802b', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('129', '1000000200', 'Tito', 'Nueza ', 'A', NULL, 'Male', '1997-06-14', 'Buguias', 'Single', 'Filipino', '09876756120', 'Poblacion, Buguias, Benguet', 'tito', '1a96f9437697ef43237868412d77b15991964f6e', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('130', '1000000201', 'Randy', 'Agravante', 'A', NULL, 'Male', '1998-11-12', 'Kabayan', 'Single', 'Filipino-Canadian', '09876512812', 'Poblacion, Kabayan, Benguet', 'randy', '68507a13665ec3a31759c0d3a94804221c0a87d3', 'New', '1', '1', '23', '', 'First', '', '0', NULL, NULL) ; 
INSERT INTO `tblstudent` VALUES ('145', '1000000213', 'Kurt', 'Choyog', '', NULL, 'Male', '2001-10-23', 'Bokod', '', 'Filipino', '09605805587', 'Poblacion, Bokod, Benguet', 'kkokey', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'New', '1', '1', '18', '', '', '', '0', '', 'Ibaloi') ; 
INSERT INTO `tblstudent` VALUES ('161', '1000000230', 'Elton', 'Palos', 'D', 'Jr.', 'Male', '2000-03-06', 'Tokyo, Japan', '', 'Filipino', '09453754120', 'Bobok-Bisal, Bokod, Benguet', 'palos', '$2y$10$qKYAWG65i4VKsTzlAoKRNeJ3allkaQ5tTD5Uzs778/XY3dnZWeA0a', 'New', '1', '1', '4', 'student_image/image2.jpeg', 'First', '2025-2026', '0', '', 'Ibaloi') ; 
INSERT INTO `tblstudent` VALUES ('162', '1000000231', 'Elton', 'Palos', 'D', 'Jr.', 'Male', '2000-03-06', 'Tokyo, Japan', '', 'Filipino', '09453754120', 'Bobok-Bisal, Bokod, Benguet', 'palos', '$2y$10$3ygTww4uXquhsuyy3JJ/zemCCriQMoUOqFq5nWWgwdVwEf78E..gq', 'New', '1', '1', '4', '', 'First', '2025-2026', '0', '', 'Ibaloi') ;
#
# End of data contents of table tblstudent
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Thursday 6. November 2025 07:47 CET
# Hostname: localhost
# Database: `bsu_db`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `department`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `grades`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `schoolyr`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `studentsubjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblauto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblinstructor`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbllogs`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblschedule`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblsemester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstuddetails`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tblstudent`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `useraccounts`
# --------------------------------------------------------


#
# Delete any existing table `useraccounts`
#

DROP TABLE IF EXISTS `useraccounts`;


#
# Table structure of table `useraccounts`
#

CREATE TABLE `useraccounts` (
  `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_NAME` varchar(255) NOT NULL,
  `ACCOUNT_USERNAME` varchar(255) NOT NULL,
  `ACCOUNT_PASSWORD` text NOT NULL,
  `ACCOUNT_TYPE` enum('Administrator','Registrar','Chairperson','Other') NOT NULL,
  `EMPID` int(11) NOT NULL,
  `USERIMAGE` varchar(255) NOT NULL,
  PRIMARY KEY (`ACCOUNT_ID`),
  UNIQUE KEY `ACCOUNT_USERNAME` (`ACCOUNT_USERNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ;

#
# Data contents of table useraccounts (4 records)
#
 
INSERT INTO `useraccounts` VALUES ('1', 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', '1234', 'photos/wallpaperflare.com_wallpaper (3).jpg') ; 
INSERT INTO `useraccounts` VALUES ('2', 'Registrar', 'registrar', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Registrar', '0', 'photos/lain.jpg') ; 
INSERT INTO `useraccounts` VALUES ('3', 'Chairperson 1', 'chair', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Chairperson', '0', '') ; 
INSERT INTO `useraccounts` VALUES ('9', 'Chairperson 2', 'chair2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Chairperson', '0', '') ;
#
# End of data contents of table useraccounts
# --------------------------------------------------------

