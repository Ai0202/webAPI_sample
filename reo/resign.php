<?php
  require('connect.php');
  $sql = 'INSERT INTO `re`(`name`, `food`) VALUES (?, ?)';
  $data = [$_GET['name'],$_GET['food']];
  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);
  $dbh = null;
  echo json_encode(true);
