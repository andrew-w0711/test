<?php

  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, "test");

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $color_name = $_GET['color'];

  $query = "SELECT sum(replace(votes, ',', '')) votes from votes where color='$color_name' group by color";

  $colors_con = mysqli_query($conn, $query);
  $cRow = mysqli_fetch_array($colors_con);
  if(sizeof($cRow) > 0) {
    echo json_encode($cRow);  
  } else {
    $result = array('votes',0);
    echo json_encode($result);
  }
?>