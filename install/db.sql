CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL auto_increment,
  `project_name` varchar(128) NOT NULL default 'untitled',
  `project_archived` smallint(1) NOT NULL default '0',
  `project_sort_order` int(11) default NULL,
  PRIMARY KEY  (`project_id`)
) ENGINE=MyISAM;

INSERT INTO `projects` (`project_id`, `project_name`, `project_archived`, `project_sort_order`) VALUES (1, 'Projekt 1', 0, 1);
INSERT INTO `projects` (`project_id`, `project_name`, `project_archived`, `project_sort_order`) VALUES (2, 'Projekt 2', 0, 2);

CREATE TABLE `todos` (
  `todo_id` int(11) NOT NULL auto_increment,
  `todo_name` varchar(128) NOT NULL default 'untitled',
  `todo_text` text,
  `todo_archived` smallint(1) NOT NULL default '0',
  `project_id` int(11) NOT NULL default '0',
  `todo_sort_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`todo_id`)
) ENGINE=MyISAM;

INSERT INTO `todos` (`todo_id`, `todo_name`, `todo_text`, `todo_archived`, `project_id`, `todo_sort_order`) VALUES (1, 'todo 1', NULL, 0, 1, 1);
INSERT INTO `todos` (`todo_id`, `todo_name`, `todo_text`, `todo_archived`, `project_id`, `todo_sort_order`) VALUES (2, 'todo 2', NULL, 0, 1, 2);
INSERT INTO `todos` (`todo_id`, `todo_name`, `todo_text`, `todo_archived`, `project_id`, `todo_sort_order`) VALUES (3, 'todo 3', NULL, 0, 1, 3);
INSERT INTO `todos` (`todo_id`, `todo_name`, `todo_text`, `todo_archived`, `project_id`, `todo_sort_order`) VALUES (4, 'todo 4', NULL, 0, 1, 4);
INSERT INTO `todos` (`todo_id`, `todo_name`, `todo_text`, `todo_archived`, `project_id`, `todo_sort_order`) VALUES (5, 'todo 1', NULL, 0, 2, 2);
INSERT INTO `todos` (`todo_id`, `todo_name`, `todo_text`, `todo_archived`, `project_id`, `todo_sort_order`) VALUES (6, 'todo 2', NULL, 0, 2, 1);
