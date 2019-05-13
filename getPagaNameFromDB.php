<?php

  $servername = "localhost";
  $username = "root";
  $password = "password";
  $dbname = "prova";

  // Connect
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_errno) {
    echo ("Connection failed: " . $conn->connect_error);
    return;
  }

  $sql = "

    SELECT name, lastname, id
    FROM paganti

    ";

    $res = [];

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

        $res[] = $row;
      }
    }
    else {

      echo"0 results";
    }

    $conn->close();

    echo json_encode($res);
?>
