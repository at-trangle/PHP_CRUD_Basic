<?php
<<<<<<< Updated upstream
  $servername = "localhost";
  $username = "root";
  $password = "trangeo22";
  $namedb = "CRUD_basic";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // return $conn;
    echo "Connect successful!";
  }
  catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
=======
  function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "trangeo22";
    $namedb = "CRUD_basic";
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
      // echo "Connect successful!";
    }
    catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
    }
>>>>>>> Stashed changes
  }
?>