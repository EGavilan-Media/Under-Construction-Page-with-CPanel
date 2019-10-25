<?php

    require_once "connection.php";

    if(isset($_POST["action"])){
        // Fetch data
        if($_POST["action"] == "fetch"){

            $sql = "SELECT date, hour, minute, second, title, description, facebook, twitter, youtube FROM tbl_general";

            $result = mysqli_query($conn, $sql);

            $row=mysqli_fetch_row($result);

            $output = array(
                'date'		    =>	$row[0],
                "hour"		    => 	$row[1],
                "minute"	    =>	$row[2],
                "second"	    =>	$row[3],
                "title"	        =>	$row[4],
                "description"	=>	$row[5],
                "facebook"	    =>	$row[6],
                "twitter"	    =>	$row[7],
                "youtube"	    =>	$row[8]
            );
            
            echo json_encode($output);
        }
        // Add subscriber
        if($_POST["action"] == "add"){

            $email = $_POST['email'];

            $sql = "SELECT * FROM tbl_subscriber WHERE email = '$email'";

            $result = mysqli_query($conn, $sql);

            $checkrows = mysqli_num_rows($result);

            if($checkrows > 0) {

                echo 0;

            } else {

                $sql = "INSERT INTO tbl_subscriber(email, sent) VALUES('$email', NOW())";

                $result = mysqli_query($conn, $sql);

                echo "$result";
            }
        }

    }
?>
