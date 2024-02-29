<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "donations";

$mysqli= new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    echo "Fehler bei der Verbindung: " . mysqli_connect_error();
    exit();
  }
echo "Connection was successful"

$result = $mysqli->query("SELECT id, amount, prename, surname FROM donations;");

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - amount: " . $row["amount"]. "  - prename: " . $row["prename"]. "<br>";
  }
} else {
  echo "0 results";
}

$content->close();
$mysqli->close();
?>