<html>
<head>
<title>Personer</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<h1 style="text-align: center;">Home<h1>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Dashboard</a></li>
      <li class="active"><a href="personer.php">Personer</a></li>
      <li><a href="lokaler.php">Lokaler</a></li> 
      <li><a href="mere.php">Mere</a></li> 
    </ul>
  </div>
</nav>
<button type="button" class="btn btn-primary"><a style="color: white;" href="/2/person/opret_person.php">Opret person</a></button>
<button type="button" class="btn btn-primary"><a style="color: white;" href="/2/person/ret_person.php">Ret person</a></button>
  <h2>Personer</h2>       

<?php
$servername = "localhost";
$username = "root";
$password = null;
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, firstname, lastname, cpr FROM user";
$result = $conn->query($sql);



  echo "<table class='table table-striped'>";
    echo "<thead>";
      echo "<tr>";
		echo "<th>ID</th>";
        echo "<th>Fornavn</th>";
        echo "<th>Efternavn</th>";
        echo "<th>CPR</th>";
      echo "</tr>";
    echo "</thead>";
	
while($row = mysqli_fetch_array($result))
{
    echo "<tbody>";
      echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['cpr'] . "</td>";
		echo "<td><a href='/2/person/ret_person.php'>RET</a></td>";
      echo "</tr>";

    echo "</tbody>";
}
  echo "</table>";

$conn->close();
?>
</body>
</html>