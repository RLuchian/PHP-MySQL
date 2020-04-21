<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Authors</title>
        <link rel="stylesheet" type="text/css" href="style.css">
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
            $sql1='SELECT * FROM authors';
            $q1=$con->query($sql1);
            $q1->setFetchMode(PDO::FETCH_ASSOC);
            $sql2='SELECT * FROM authors_updated';
            $q2=$con->query($sql2);
            $q2->setFetchMode(PDO::FETCH_ASSOC);
        ?>
        <table>
            <thead>
                <th class="image">Author</th>
                <th>Name</th>
                <th>Books Written</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <?php while ($res1=$q1->fetch()): ?>
                <tr>
                    <td><?php echo '<img src="./Images/'. $res1['Image'].'"/>'; ?></td>
                    <td><?php echo $res1['Name']; ?></td>
                    <td><?php echo $res1['BooksWritten']; ?></td>
                    <td> <a href="update.php?id=<?php echo $res1['ID'];?>">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $res1['ID'];?>">Delete</a></td>
                </tr>
                 <?php endwhile; ?>
        </table>
        <br><br>
        <div clas="wrapper">
            <a class="insert" href="insert.php">
                Add new author
            </a>
        </div>
        <br><br>
        <table>
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Edit Time</th>
            </thead>
                <?php while ($res2=$q2->fetch()): ?>
                <tr>
                    <td><?php echo $res2['ID']; ?></td>
                    <td><?php echo $res2['Name']; ?></td>
                    <td><?php echo $res2['Status']; ?></td>
                    <td><?php echo $res2['EdTime']; ?></td>
                </tr>
                 <?php endwhile; ?>
        </table>
    </body>
</html>
