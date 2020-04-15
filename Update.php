<p>Enter Changes</p>
<form name="form1" method = "post">
            <input type="text" placeholder='Book Name' name="bname" >
            <input type="text" placeholder='Author Name' name="aname">
            <input type="number" placeholder='Quantity' name="quantity">
            <input type="submit" value="Update" name='update'>
</form>
<?php
require "connection.php";
$sql1="DROP PROCEDURE IF EXISTS UpdateRecord";
$sql2="CREATE PROCEDURE UpdateRecord( 
 IN strBookName varchar(30), 
 IN strAuthorName varchar(30),
 IN intQuantity int,
 IN intId int
) 
BEGIN 
      UPDATE `books` 
      SET `BookName` = `strBookName`, `AuthorName` = `strAuthorName`, `Quantity` = `intQuantity`  
      WHERE `books`.`ID` = intId;
END;";
$stmt1=$con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();
$sqltrigger="CREATE TRIGGER BUTrigger BEFORE UPDATE ON `books` FOR EACH ROW
        BEGIN
        INSERT INTO `books_updates` (`ID`, `BookName`, `AuthorName`, `Status`,`EdTime`) 
        VALUES (NULL, NEW.BookName, NEW.AuthorName, 'UPDATED',NOW());
        END;";
$stmt = $con->prepare($sqltrigger);
$stmt->execute();
if(isset($_POST['update'])){
    $id = $_GET['id'];
    $book = $_POST['bname'];
    $author = $_POST['aname'];
    $quantity = $_POST['quantity'];
    
    if(!$book || !$author || !$quantity){
    
      $error .= 'All fields are required. <br />';
    }
    else{
        $sql3="CALL UpdateRecord('{$book}','{$author}','{$quantity}','{$id}')";
        $q=$con->query($sql3);
        if($q){
        header('location:index.php');
        }
        else{
            echo "Something went wrong.";
        }
    }
    
}
 ?>


