<form name="form1" method = "post">
            <input type="text" placeholder='Book Name' name="bname" >
            <input type="text" placeholder='Author Name' name="aname">
            <input type="number" placeholder='Quantity' name="bquantity">
            <input type="submit" value="Add to database" name='add'>
</form>
<?php
require 'connection.php';
$sql1="DROP PROCEDURE IF EXISTS InsertRecord";
$sql2="CREATE PROCEDURE InsertRecord( 
 IN strBookName varchar(30), 
 IN strAuthorName varchar(30),
 IN intQuantity int
) 
BEGIN 
      INSERT INTO `books` (`ID`, `BookName`, `AuthorName`, `Quantity`) 
      VALUES (NULL, strBookName, strAuthorName, intQuantity);
END;";
$stmt1=$con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();
$sqlt1="DROP TRIGGER IF EXISTS BITrigger";
$sqlt2="CREATE TRIGGER BITrigger AFTER INSERT ON books FOR EACH ROW
        BEGIN
        INSERT INTO `books_updates` (`ID`, `BookName`, `AuthorName`, `Status`,`EdTime`) 
        VALUES (NULL, NEW.BookName, NEW.AuthorName, 'CREATED',GETDATE());
        END;";
$stmtt1 = $con->prepare($sqlt1);
$stmtt1->execute();
$stmtt2 = $con->prepare($sqlt2);
$stmtt2->execute();
if(isset($_POST['add'])){
    $book = $_POST['bname'];
    $author = $_POST['aname'];
    $quantity = $_POST['bquantity'];
    
    if(!$book || !$author || !$quantity){
    
      $error .= 'All fields are required.';
    }
    else{
        $sql3="CALL InsertRecord('{$book}','{$author}','{$quantity}')";
        $q=$con->query($sql3);
        header('location:index.php');
    }
}
 ?>
<br><br>
<a href="index.php">index</a>