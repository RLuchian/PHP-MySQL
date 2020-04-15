<?php
require('connection.php');
$sql1="DROP PROCEDURE IF EXISTS DeleteRecord";
$sql2="CREATE PROCEDURE DeleteRecord( 
 IN intID int
) 
BEGIN 
      DELETE FROM `books` WHERE ID= intID;
END;";
$stmt1=$con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();
$sqlt1="DROP TRIGGER IF EXISTS ADTrigger";
$sqlt2="CREATE TRIGGER BITrigger AFTER DELETE ON books FOR EACH ROW
        BEGIN
        INSERT INTO `books_updates` (`ID`, `BookName`, `AuthorName`, `Status`,`EdTime`) 
        VALUES (NULL, OLD.BookName, OLD.AuthorName, 'DELETED',GETDATE());
        END;";
$stmtt1 = $con->prepare($sqlt1);
$stmtt1->execute();
$stmtt2 = $con->prepare($sqlt2);
$stmtt2->execute();
$id = $_GET['id'];
$sql3="CALL DeleteRecord('{$id}')";
$q=$con->query($sql3);
if($q){
    header('location:index.php');
    }
else{
    echo "Something went wrong.";    
    }
?>
