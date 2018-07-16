<?php

$daysInJapanese = ["日", "月", "火", "水", "木", "金", "土"];

parse_str($_SERVER['QUERY_STRING'], $queryString);
$targetDate = strtotime($queryString['date']);
$dayInJapanese = $daysInJapanese[date("w", $targetDate)] . "曜日";
 
$response = array(
    'target_date' => $targetDate,
    'day_in_japanese' => $dayInJapanese
);
 
echo json_encode($response);


// curl -X GET "127.0.0.1:8888/index.php?date=2018%2F07%2F17";