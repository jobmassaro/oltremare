CREATE TABLE `setting` (
  `settingID` int(11) NOT NULL AUTO_INCREMENT ,
  `sname` text(128) NOT NULL ,
  `name` VARCHAR(60) NOT NULL ,
  `phone` text(25) NOT NULL,
  `address` text(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `automation` int(11) NOT NULL,
  `currency_code` varchar(11) NOT NULL,
  `currency_symbol` text(128) NOT NULL,
  `footer` text(200) NOT NULL,
  `create_date` date NOT NULL,
  `photo` varchar(200) null,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `purchase_code` varchar(255) NOT NULL,
   PRIMARY KEY (`settingID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

----------------------------------------------------------

CREATE TABLE `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(60) NOT NULL ,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` text(25) NOT NULL,
  `address` text(25) NOT NULL,
  `jod` date not null,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
   PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
-----------------------------------------------------------

CREATE TABLE `teacher` (
  `teacherID` int(11) unsigned NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(60) NOT NULL ,
  `designation` VARCHAR(128) NOT NULL ,
  `dob` date null,
  `sex` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` text(25) NOT NULL,
  `address` text(25) NOT NULL,
  `jod` date NOT NULL,
  `photo` varchar(200) null,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
   PRIMARY KEY (`teacherID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
--------------------------------------------------------

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(60) NOT NULL ,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` text(25) NOT NULL,
  `address` text(25) NOT NULL,
  `classID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `section` varchar(60) NOT NULL,
  `roll` text(40) NOT NULL,
  `create_date` date NOT NULL,
  `totalamount` varchar(128) NOT NULL ,
  `paidamount` varchar(128) NULL ,
  `photo` varchar(200) null,
  `year` varchar(50) NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
   PRIMARY KEY (`studentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
-------------------------------------------------------------

CREATE TABLE IF NOT EXISTS  `oltremare_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
);
