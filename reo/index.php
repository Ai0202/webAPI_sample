<?php
  require('connect.php');
  $sql = 'SELECT * FROM `re`';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = [];
  while (true) {
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$rec) {
      break;
    }
    $result[] = $rec;
  }
  echo json_encode($result);
