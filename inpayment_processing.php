<?php
$user = "root";
$password = "root";
$host = "localhost";
$db_name = "donations";

$conn = new mysqli($host, $user, $password, $db_name);
if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$image = $_FILES["image"];
$blob_data = file_get_contents($image["tmp_name"]);

$amount = $_POST["amount"];
$prename = $_POST["prename"];
$surname = $_POST["surname"];

$sql = "INSERT INTO inpayment (amount, prename, surname, image) VALUES (?, ?, ?, ?)";
$stmt = $conn -> prepare($sql);
$stmt->bind_param("ssss", $amount, $prename, $surname, $blob_data);

if ($stmt->execute()) {
    echo "Successfully created new entry";
} else {
    echo "Error occured: " . $stmt->error;
}

$stmt->close();

$conn->close();
?>