<?php

    $dsn = 'mysql:dbname='. getenv('DB_NAME') .';host=' . getenv('HOST_NAME');
    $user = getenv('SQL_USER');
    $password = getenv('SQL_PASSWORD');
    $dbh = new PDO($dsn, $user, $password);
    // SQL文にエラーがあった際、画面にエラーを出力する設定
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->query('SET NAMES utf8');

    $sql = 'SELECT * FROM `321`';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $record = [];

    while (true) {
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
       
        if ($res === false) {
            break;
        }

        $record[] = $res;
    }

    echo json_encode($record);