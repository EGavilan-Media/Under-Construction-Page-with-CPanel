<?php

  include "../connection.php";

  session_start();

  $output = '';

  if(isset($_POST["action"])){

    // Fetch subscribers
    if($_POST["action"] == "subscriber_fetch"){

      // Read value
      $draw = $_POST['draw'];
      $row = $_POST['start'];
      $rowperpage = $_POST['length'];
      $columnIndex = $_POST['order'][0]['column'];
      $columnName = $_POST['columns'][$columnIndex]['data'];
      $columnSortOrder = $_POST['order'][0]['dir'];
      $searchValue = $_POST['search']['value'];

      // Search
      $searchQuery = " ";
      if($searchValue != ''){
        $searchQuery = " and (id LIKE '%".$searchValue."%' OR 
              email LIKE '%".$searchValue."%' OR 
              sent LIKE '%".$searchValue."%' ) ";
      }

      // Total number of records without filtering
      $sel = mysqli_query($conn,"SELECT count(*) AS allcount FROM tbl_subscriber");
      $records = mysqli_fetch_assoc($sel);
      $totalRecords = $records['allcount'];

      // Total number of records with filtering
      $sel = mysqli_query($conn,"SELECT count(*) AS allcount FROM tbl_subscriber WHERE 1 ".$searchQuery);
      $records = mysqli_fetch_assoc($sel);
      $totalRecordwithFilter = $records['allcount'];

      // Fetch records
      $empQuery = "SELECT * FROM tbl_subscriber WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT ".$row.",".$rowperpage;
      $empRecords = mysqli_query($conn, $empQuery);
      $data = array();

      while ($row = mysqli_fetch_assoc($empRecords)) {
        $data[] = array(
          "id"           =>$row['id'],
          "email"        =>$row['email'],
          "sent"         =>$row['sent'],
          "action"       =>'<button type="button" name="delete_subscriber" class="btn red lighten-2 delete_subscriber" id="'.$row['id'].'">Delete</button>'                      
        );                  
      }

      $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
      );

      echo json_encode($response);

    }

    // Delete subcriber
    if($_POST["action"] == "delete"){

      $id = $_POST['id'];

      $sql = "DELETE FROM tbl_subscriber WHERE id='$id'";

      $result = mysqli_query($conn, $sql);

      $output = array(
          'status'        => 'success'
      );
          
      echo json_encode($output);
    
    }

  }

?>