CREATE TABLE IF NOT EXISTS `bugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(75) NOT NULL,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `t_member` (`id`, `nama`, `email`, `hp`) VALUES
(1, 'Matthew Bellamy', 'matt@muse.mu', '06123712311'),
(2, 'Dominic Howard', 'dom@muse.mu', '06123712322'),
(3, 'Christopher Wolstenholme ', 'chris@muse.mu', '06123712333');
