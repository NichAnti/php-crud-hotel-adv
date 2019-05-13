<?php

  if ($_POST["id"] && $_POST["name"] && $_POST["lastname"]) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];

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

    UPDATE paganti
    SET name = '$name', lastname = '$lastname'
    WHERE id = $id

    ";

    $conn->query($sql);
    $conn->close();
  }

?>
