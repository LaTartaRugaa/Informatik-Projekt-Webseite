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

        foreach ($sql_result_array as $user) {
            echo '<div class="donation donation-image">';

            if ($user["image"] != NULL) {
                $image_base64 = base64_encode($user["image"]);
                echo '<img class="image" src="data:image/jpeg;base64,' . $image_base64 . '">';
            } else {
                echo '<img class="image" src=images/default_profile.png>';
            }

            echo '</div>';
        }

        
    ?>