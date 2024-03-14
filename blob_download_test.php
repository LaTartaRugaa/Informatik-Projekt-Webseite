<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bild anzeigen</title>
</head>
<body>
    <h1>Thank You!</h1>
    <?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        

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

        foreach ($sql_result_array as $user) {
            echo '<div style="margin: 5px; text-align: center;">';

            if ($user["image"] != NULL) {
                $image_base64 = base64_encode($user["image"]);
                echo '<img src="data:image/jpeg;base64,' . $image_base64 . '" alt="Bild" style="width: 200px; height: auto; margin: 5px;">';
            } else {
                echo '<img src=images/default_profile.png alt="Bild" style="width: 200px; height: auto; margin: 5px;">';
            }

            echo '<p>' . $user["prename"] . " " . $user["surname"] . ": " . $user["amount"] . " CHF" . '</p>';
            echo '</div>';
        }

        
    ?>
</body>
</html>
