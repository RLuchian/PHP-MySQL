<html>
    <head>
        <meta charset="UTF-8">
        <title>Authors</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
            <form class="formstyle" method = "post" enctype="multipart/form-data">
                <ul>
                    <li>
                        <input type="text" placeholder='Name' name="name" >
                    </li>
                    <li>
                        <input type="number" placeholder='Books Written' name="books">
                    </li>
                    <li>
                        <input type="file" name="myimage" placeholder="Your Image">
                    </li>
                    <li>
                        <input class="submitbtn" type="submit" value="Add new author to database" name='add'>
                    </li>
                </ul>
            </form>
        <?php
        require 'connection.php';
        $sql1="DROP PROCEDURE IF EXISTS InsertRecord";
        $sql2="CREATE PROCEDURE InsertRecord( 
         IN strName varchar(30), 
         IN intBook int,
         IN image varchar(500)
        ) 
        BEGIN 
              INSERT INTO `authors` (`ID`, `Name`, `BooksWritten`, `Image`) 
              VALUES (NULL, strName, intBook, image);
        END;";
        $stmt1=$con->prepare($sql1);
        $stmt2=$con->prepare($sql2);
        $stmt1->execute();
        $stmt2->execute();
        $sqlTrigger="CREATE TRIGGER AITrigger AFTER INSERT ON authors FOR EACH ROW
             BEGIN
             INSERT INTO authors_updated(Name,Status,EdTime) VALUES (NEW.Name,'CREATED',NOW());
             END;";
        $stmt=$con->prepare($sqlTrigger);
        $stmt->execute();
        if(isset($_POST['add'])){
            $author = $_POST['name'];
            $books = $_POST['books'];
            $image = $_FILES["myimage"]["name"];

            if(!$books || !$author || !$image){

              echo 'All fields are required!';
            }
            else{
                $sql3="CALL InsertRecord('{$author}','{$books}','{$image}')";
                $q=$con->query($sql3);
                if($q){
                    move_uploaded_file($_FILES["myimage"]["tmp_name"],'Images/'.$image) or die( "Could not copy file!");
                    header('location:index.php');
                }
                else{
                    echo "'$author','$books','$image'";
                    echo "Something went wrong!";
                }
            }
        }
         ?>
    </body>
</html>
