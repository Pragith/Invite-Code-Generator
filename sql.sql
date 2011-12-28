DROP TABLE IF EXISTS `invitecode`;
CREATE TABLE IF NOT EXISTS `invitecode` (
  `codes` varchar(6) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`codes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;