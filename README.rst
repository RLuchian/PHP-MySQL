CREATE DATABASE books; USE books;

CREATE TABLE authors (
ID int(11) NOT NULL AUTO_INCREMENT , Name varchar(30) NOT NULL, BooksWritten int(11) NOT NULL, Image varchar(500) NOT NULL,  PRIMARY KEY (ID));

INSERT INTO `authors` (`ID`, `Name`, `BooksWritten`, `Image`) VALUES (1, "J. K. Rowlling", 23, "JKR.jpg"),(2, "G. R. R. Martin", 34, "GrrMartin.jpg");
CREATE TABLE authors_updated (ID int(11) NOT NULL AUTO_INCREMENT , Name varchar(30) NOT NULL, Status varchar(30) NOT NULL, EdTime datetime NOT NULL, PRIMARY KEY(ID));

