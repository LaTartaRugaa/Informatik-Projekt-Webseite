<?php

function check_field($tag, $required, $int) {
    $exit = FALSE;
    if ($required == TRUE and empty($_POST[$tag])) {
        $exit = "Fill in all the required fields";
    } elseif ($int == TRUE and is_numeric($_POST[$tag]) != "integer") {
        $exit .= "One field only accepts integer values";
    }
    if ($exit != FALSE) {
        die($exit);
    }
    return $_POST[$tag];
}


$user = "root";
$password = "root";
$host = "localhost";
$db_name = "donations";

$conn = new mysqli($host, $user, $password, $db_name);
if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$amount = check_field("amount", TRUE, TRUE);
$prename = check_field("prename", TRUE, FALSE);
$surname = check_field("surname", TRUE, FALSE);

// Überprüfen, ob $_FILES leer ist (Error 4: No file was uploaded)
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