<?php
$servername = "localhost";
$username = "root";
$password = null;
$dbname = "sygehus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$cpr = $_GET['cpr'];
$id = $_GET['id'];

$sql = "
UPDATE
	user
SET
	firstname = COALESCE($firstname, firstname),
	lastname = COALESCE($lastname, 'lastname'),
	cpr = COALESCE($cpr, 'cpr')
WHERE
	id = $id
";

if ($conn->query($sql) === TRUE) {
    echo "Brugeren er rettet";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>