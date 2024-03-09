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

        $sql = "SELECT amount, prename, surname, image FROM inpayment";
        $result = mysqli_query($conn, $sql);

        $sql_result_array = array();

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $sql_result_array[] = array("amount" => $row["amount"], "prename" => $row["prename"], "surname" => $row["surname"], "image" => $row["image"]);
            }
        }

        $conn->close();

        
    ?>
    
   
</body>
</html>
