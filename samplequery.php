<?php

$dbhost = '127.0.0.1';
$dbusername = 'root';
$dbuserpass = '';
$dbname = 'mydatabase';
$tablename = 'mytable';

echo "variables set\n";



$mysqli = new mysqli($dbhost, $dbusername, $dbuserpass) or die ("can't connect to database\n");

echo "database linked\n";



$mysqli->select_db($dbname) or die ("can't select database: " . mysqli_error($mysqli)) . "\n";

echo "database selected\n";



$mysqli->query("

INSERT INTO $tablename (data) VALUES ('this is the data')

") or die ("can't insert: " . mysqli_error($mysqli)) . "\n";

echo "data added\n";



$result = $mysqli->query("

SELECT data FROM $tablename LIMIT 1

") or die ("can't select: " . mysqli_error($mysqli)) . "\n";

$row = $result->fetch_row();

echo "data selected: " . $row[0] . "\n";



$result->close();

$mysqli->close();

echo "success\n";

?>
