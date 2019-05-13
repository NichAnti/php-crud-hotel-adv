<?php

  if($_POST["id"]) {

    $id = $_POST["id"];

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

    $sql1 = "

    DELETE FROM pagamenti
    WHERE pagante_id = $id

    ";

    $sql2 = "

    DELETE FROM paganti
    WHERE id = $id

    ";

    $conn->query($sql1);
    $conn->query($sql2);

    $conn->close();
  }

?>
