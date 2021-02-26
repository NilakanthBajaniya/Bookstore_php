CREATE TABLE `author` (
  `authorId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `BookId` int(11) NOT NULL,
  PRIMARY KEY (`authorId`),
  KEY `BookId_idx` (`BookId`),
  CONSTRAINT `BookId` FOREIGN KEY (`BookId`) REFERENCES `bookinventory` (`BookId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
