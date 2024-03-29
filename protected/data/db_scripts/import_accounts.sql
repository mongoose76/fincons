DROP TABLE test;

CREATE TABLE `test` (
  `ax_account` int(11) DEFAULT NULL,
  `accountname` varchar(500) DEFAULT NULL,
  `MAPPING` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ax_account`)
) ENGINE=InnoDB AUTO_INCREMENT=2048 DEFAULT CHARSET=utf8;

LOAD DATA INFILE 'e:/workspace_php/Tzoncu/import.csv'
INTO TABLE test
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\n' IGNORE 1 LINES;

SELECT  * FROM test WHERE ax_account BETWEEN 25370 AND 25390;