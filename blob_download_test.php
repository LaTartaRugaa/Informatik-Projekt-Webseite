<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bild anzeigen</title>
</head>
<body>
    <h1>Bild anzeigen</h1>
    <?php
        $user = "root";
        $password = "root";
        $host = "localhost";
        $db_name = "donations";

        $conn = new mysqli($host, $user, $password, $db_name);
        if ($conn->connect_errno) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT image FROM inpayment WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $id = 1; // Setze die ID des Datensatzes, dessen Bild du anzeigen möchtest
        $stmt->execute();
        $stmt->bind_result($image_data);
        $stmt->fetch();
        $stmt->close();

        // Konvertiere das Blob in ein Base64-codiertes Bild
        $image_base64 = base64_encode($image_data);
    ?>
    
    <img src="data:image/jpeg;base64,<?php echo $image_base64; ?>" alt="Bild">
</body>
</html>
