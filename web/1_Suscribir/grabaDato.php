<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
if(mysqli_connect_errno()){
	echo 'Error, no se pudo conectar a la base de datos: '.mysqli_connect_error();
} 
    // Prepare the SQL statement
	
	$sql='INSERT INTO lecturas (humedad) VALUES("'.$_GET["value"].'")';
    // Execute SQL statement

    mysqli_query($connect, $sql);

?>