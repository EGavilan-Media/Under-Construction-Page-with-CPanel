<?php

    require_once "../connection.php";

    session_start();

    $output = '';

    if(isset($_POST["action"])){
        // Fetch data
        if($_POST["action"] == "general_fetch"){

            $id_general = $_POST['id'];

            $sql = "SELECT id, date, hour, minute, second, title, description, facebook, twitter, youtube FROM tbl_general WHERE id = '$id_general'";

            $result = mysqli_query($conn, $sql);

            $row=mysqli_fetch_row($result);

            $output = array(
                "id"		    =>	$row[0],
                "date"		    =>	$row[1],
                "hour"		    => 	$row[2],
                "minute"	    =>	$row[3],
                "second"	    =>	$row[4],
                "title"	        =>	$row[5],
                "description"	=>	$row[6],
                "facebook"	    =>	$row[7],
                "twitter"	    =>	$row[8],
                "youtube"	    =>	$row[9]
            );
            
            echo json_encode($output);
        }
        // Update event information.
        if($_POST["action"] == "event_edit"){
            
            $id_event = $_POST['id_event'];
            $date = $_POST['date'];
            $hour = $_POST['hour'];
            $minute = $_POST['minute'];
            $second = $_POST['second'];

            $sql = "UPDATE tbl_general SET date = '$date',
                                        hour = '$hour', 
                                        minute = '$minute', 
                                        second = '$second'             
                                        WHERE id = '$id_event'";

            $result = mysqli_query($conn, $sql);

            $output = array(
                'status'        => 'success',
                );
                
            echo json_encode($output);
        }
        // Update description.
        if($_POST["action"] == "description_edit"){
            
            $id_description = $_POST['id_description'];
            $title = $_POST['title'];
            $description = $_POST['description'];

            $sql = "UPDATE tbl_general SET title = '$title',
                                        description = '$description'         
                                        WHERE id = '$id_description'";

            $result = mysqli_query($conn, $sql);

            $output = array(
                'status'        => 'success',
                );
                
            echo json_encode($output);
        }
        // Update social media links.
        if($_POST["action"] == "social_edit"){
            
            $id_social = $_POST['id_social'];
            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $youtube = $_POST['youtube'];

            $sql = "UPDATE tbl_general SET facebook = '$facebook',
                                        twitter = '$twitter',
                                        youtube = '$youtube'
                                        WHERE id = '$id_social'";

            $result = mysqli_query($conn, $sql);

            $output = array(
                'status'        => 'success'
                );
                
            echo json_encode($output);
        }

    }

    
?>