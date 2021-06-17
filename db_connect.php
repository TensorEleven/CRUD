<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "person";

//open connection
$conn = new PDO('mysql:dbname=person;host=localhost', $username, $password);
//$conn = new mysqli($servername, $username, $password, $dbname);

//if ($conn->connect_error){
//  die("Connection failed: " . $conn->connect_error);
//} 
?>