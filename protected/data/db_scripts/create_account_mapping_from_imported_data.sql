DROP TABLE account_local;
DROP TABLE account_group;

CREATE TABLE `account_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `name_2` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO account_group (name) SELECT DISTINCT mapping FROM test;

CREATE TABLE `account_local` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_group_id` int(11) DEFAULT NULL,
  `ax_account` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `account_group_id` (`account_group_id`),
  CONSTRAINT `account_local_fk` FOREIGN KEY (`account_group_id`) REFERENCES `account_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2051 DEFAULT CHARSET=utf8;

INSERT INTO account_local (ax_account, name, account_group_id)
SELECT ax_account, accountname, (SELECT id from account_group WHERE name = mapping) FROM test t;