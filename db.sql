CREATE TABLE IF NOT EXISTS `table1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- `table1`
--

INSERT INTO `table1` (`id`, `title`) VALUES
(1, 'title1'),
(2, 'title2');


CREATE TABLE IF NOT EXISTS `table2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- `table2`
--

INSERT INTO `table2` (`id`, `name`) VALUES
(1, 'name1'),
(2, 'name2');

-- Views
CREATE VIEW v_tbl1 AS SELECT * FROM table1;
CREATE VIEW v_tbl2 AS SELECT * FROM table2;


-- Result table
CREATE TABLE IF NOT EXISTS `labels_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table` varchar(100) NOT NULL,
  `field` varchar(100) NOT NULL,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;