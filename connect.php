<?php
// connect to mysql database
function connection()
{
$servername = "127.0.0.1";
$username = "mm871031"; //root
$password = "gina0412"; //""
$dbname = "project"; //final
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// 編碼
mysqli_set_charset($conn,"utf8");
return $conn;
}

?>	