<?php
$dbms="mysql";
$host="localhost";
$db="books";
$user="root";
$pass="";
$dsn="$dbms:host=$host;dbname=$db";
$con=new PDO($dsn, $user, $pass);