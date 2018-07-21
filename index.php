<?php

    $dsn = 'mysql:dbname='. getenv('DB_NAME') .';host=' . getenv('HOST_NAME');
    $user = getenv('SQL_USER');
    $password = getenv('SQL_PASSWORD');
    $dbh = new PDO($dsn, $user, $password);
    // SQL文にエラーがあった際、画面にエラーを出力する設定
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->query('SET NAMES utf8');

    $sql = 'SELECT * FROM `test`';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    while (true) {
        if ($record === false) break;

        $record[] = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    echo json_encode($record ?? []);

// curl -X GET "https://web-api-sample.herokuapp.com/";