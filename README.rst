CREATE DATABASE books; USE books;

CREATE TABLE authors (
ID int(11) NOT NULL , Name varchar(30) NOT NULL, BooksWritten int(11) NOT NULL, Image varchar(500) NOT NULL);

INSERT INTO `books` (`ID`, `Name`, `BooksWritten`, `Quantity`) VALUES (1, "J. K. Rowlling", 23, "JKR.jpg"),(2, "G. R. R. Martin", 34, "GrrMartin.jpg");
ALTER TABLE `authors` CHANGE `ID` INT(11) NOT NULL AUTO_INCREMENT;
CREATE TABLE authors_updated (ID int(11) NOT NULL , Name varchar(30) NOT NULL, Status varchar(30) NOT NULL, EdTime datetime NOT NULL);
ALTER TABLE `authors_updated` CHANGE `ID` INT(11) NOT NULL AUTO_INCREMENT;

