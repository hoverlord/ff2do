CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL auto_increment,
  `project_name` varchar(128) NOT NULL default 'untitled',
  `project_sort_order` int(11) default NULL,
  PRIMARY KEY  (`project_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `projects` (`project_id`, `project_name`, `project_sort_order`) VALUES 
(1, 'Projekt 1', 1);
(2, 'Projekt 2', 2),

CREATE TABLE `todos` (
  `todo_id` int(11) NOT NULL auto_increment,
  `todo_name` varchar(128) NOT NULL default 'untitled',
  `todo_text` text,
  `project_id` int(11) NOT NULL default '0',
  `todo_sort_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`todo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `todos` (`todo_id`, `todo_name`, `todo_text`, `project_id`, `todo_sort_order`) VALUES 
(1, 'todo 1', NULL, 1, 1),
(2, 'todo 2', NULL, 1, 2),
(3, 'todo 3', NULL, 1, 3),
(4, 'todo 4', NULL, 1, 4),
(5, 'todo 1', NULL, 2, 2),
(6, 'todo 2', NULL, 2, 1);