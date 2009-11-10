CREATE TABLE `categories` (
  `catid` int(11) NOT NULL auto_increment,
  `category` varchar(255) NOT NULL default '',
  `orderid` smallint(6) NOT NULL default '100',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

INSERT INTO `categories` (`catid`, `category`, `orderid`) VALUES (1, 'Galleries', 5),
(2, 'Art', 1),
(3, 'Roadtrip', 6),
(4, 'Yosemite', 8),
(5, 'Animals', 2),
(6, 'Australia', 3),
(7, 'Wesleyan', 7),
(8, 'California', 4);