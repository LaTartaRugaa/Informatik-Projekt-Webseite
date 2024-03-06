<?php
$user = "root";
$password = "root";
$host = "localhost";
$db_name = "donations";

$conn = new mysqli($host, $user, $password, $db_name);
if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$amount = $_POST["amount"];
$prename = $_POST["prename"];
$surname = $_POST["surname"];

// Überprüfen, ob $_Files leer ist (Error 4: No file was uploaded)
if ($_FILES["image"]["error"] == 4) {
    $stmt = $conn->prepare("INSERT INTO inpayment (amount, prename, surname) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $amount, $prename, $surname);
} else {
    $stmt = $conn->prepare("INSERT INTO inpayment (amount, prename, surname, image) VALUES (?, ?, ?, ?)");
    $blob_data = file_get_contents($_FILES["image"]["tmp_name"]);
    $stmt->bind_param("ssss", $amount, $prename, $surname, $blob_data);
}

if ($stmt->execute()) {
    echo "Successfully created new entry";
} else {
    echo "Error occured: " . $stmt->error;
}
$stmt->close();

$conn->close();
?>