CREATE DATABASE books; USE books;

CREATE TABLE books (
id int(11) NOT NULL auto_increment, BookName varchar(30) NOT NULL, AuthorName varchar(30) NOT NULL, Quantity int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `books` (`ID`, `BookName`, `AuthorName`, `Quantity`) VALUES (NULL, "Call Of Cthulhi", "L. P. Lovecraft", 55),(NULL, "Sapiens", "Y. N. Harari", 55);


CREATE TABLE books_updates (
id int(11) NOT NULL auto_increment, BookName varchar(30) NOT NULL, AuthorName varchar(30) NOT NULL, Status varchar(30) NOT NULL, EdTime DATE) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;
