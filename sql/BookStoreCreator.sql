CREATE DATABASE `bookstore` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;


CREATE TABLE `bookinventory` (
  `BookId` int(11) NOT NULL AUTO_INCREMENT,
  `BookName` varchar(45) NOT NULL,
  `NoOfPages` int(11) DEFAULT NULL,
  `PublishDate` date NOT NULL,
  `Price` decimal(5,2) NOT NULL,
  `Inventory` int(11) NOT NULL,
  PRIMARY KEY (`BookId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

