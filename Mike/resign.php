<?php
    $id = $_GET['id'];
    $name = $_GET['name'];
    $message = $_GET["message"]

    $dsn = 'mysql:dbname='. getenv('DB_NAME') .';host=' . getenv('HOST_NAME');
    $user = getenv('SQL_USER');
    $password = getenv('SQL_PASSWORD');
    $dbh = new PDO($dsn, $user, $password);
    // SQL文にエラーがあった際、画面にエラーを出力する設定
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->query('SET NAMES utf8');

    $sql = 'INSERT INTO `apiyou`(`name`, `animal`, 'message') VALUES (?, ?, ?)';

    $data = [$name,$animal];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);  // SQLインジェクション対策で作った

    // ３．データベースを切断する
    $dbh = null;

    echo json_encode(true);
