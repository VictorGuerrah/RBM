<?php

error_reporting(0);

try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=rbm", "root", ""); 
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }