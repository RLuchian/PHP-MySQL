<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
$dbms = 'mysql';
$host = 'localhost'; 
$db = 'books';
$user = 'root';
$pass = '';
$dsn = "$dbms:host=$host;dbname=$db";
$con=new PDO($dsn, $user, $pass);
$sql1='SELECT * FROM books';
$q1=$con->query($sql1);
$q1->setFetchMode(PDO::FETCH_ASSOC);
$sql2='SELECT * FROM books_updates';
$q2=$con->query($sql2);
$q2->setFetchMode(PDO::FETCH_ASSOC);

?>
                <table>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Quantity</th>
            </tr>
            <?php while ($res1=$q1->fetch()): ?>
            <tr>
                <td><?php echo $res1['ID']; ?></td>
                <td><?php echo $res1['BookName']; ?></td>
                <td><?php echo $res1['AuthorName']; ?></td>
                <td><?php echo $res1['Quantity']; ?></td>
                <td> <a href="update.php?id=<?php echo $res['ID'];?>">Update</a></td>
                <td> <a href="delete.php?id=<?php echo $res['ID'];?>">Delete</a></td>
            </tr>
             <?php endwhile; ?>
        </table>
        <table>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Status</th>
                <th>Edit Time</th>
            </tr>
            <?php while ($res2=$q2->fetch()): ?>
            <tr>
                <td><?php echo $res2['ID']; ?></td>
                <td><?php echo $res2['BookName']; ?></td>
                <td><?php echo $res2['AuthorName']; ?></td>
                <td><?php echo $res2['Status']; ?></td>
                <td><?php echo $res2['EdTime']; ?></td>
            </tr>
             <?php endwhile; ?>
        </table>
        <a href="insert.php">Insert New Value</a>
    </body>
</html>