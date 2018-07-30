<?php
  require('connect.php');
  $name = $_GET['name'];
  $food = $_GET['food'];
  $sql = 'INSERT INTO `re`(`name`, `food`) VALUES (?, ?)';
  $data = [$name, $food];
  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);
  $dbh = null;
  echo json_encode(true);
