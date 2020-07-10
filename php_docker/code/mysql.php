<?php
$conn = new mysqli("mysql", "root", "root", "demo");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
 

if(! $conn ){
   die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';
mysqli_close($conn);


$pdo = new PDO('mysql:host=mysql;dbname=demo', 'root', 'root');

$stmt = $pdo->prepare('SELECT * FROM users');
$stmt->execute();
$pdo = null;



?>