<?php
    $name = $_GET['name'];
    $profile = $_GET['profile'];

    $dsn = 'mysql:dbname='. getenv('DB_NAME') .';host=' . getenv('HOST_NAME');
    $user = getenv('SQL_USER');
    $password = getenv('SQL_PASSWORD');
    $dbh = new PDO($dsn, $user, $password);
    // SQL文にエラーがあった際、画面にエラーを出力する設定
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->query('SET NAMES utf8');

    $sql = 'INSERT INTO `re`(`name`, `food`) VALUES (?, ?)';

    $data = [$name,$profile,Date(), Date()];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);  // SQLインジェクション対策で作った

    // ３．データベースを切断する
    $dbh = null;

    echo json_encode(true);
