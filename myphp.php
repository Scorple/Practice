<?php
$dbhost = '127.0.0.1';
$dbusername = 'root';
$dbuserpass = '';
$dbname = 'mydatabase';
$tablename = 'mytable';

echo "variables set\n";



$mysqli = new mysqli($dbhost, $dbusername, $dbuserpass) or die ("can't connect to database");

echo "database linked\n";



$mysqli->query("

CREATE DATABASE IF NOT EXISTS $dbname

") or die ("can't create database: " . mysqli_error($mysqli));

echo "database created\n";



$mysqli->select_db($dbname) or die ("can't select database: " . mysqli_error($mysqli));

echo "database selected\n";



$mysqli->query("

DROP TABLE IF EXISTS $tablename

") or die ("can't drop table: " . mysqli_error($mysqli));

$mysqli->query("

CREATE TABLE $tablename (id INTEGER PRIMARY KEY, data TEXT)

") or die ("can't create table: " . mysqli_error($mysqli));

echo "table created\n";



$mysqli->query("

INSERT INTO $tablename (data) VALUES ('this is the data')

") or die ("can't insert: " . mysqli_error($mysqli));

echo "data added\n";



$result = $mysqli->query("

SELECT data FROM $tablename LIMIT 1

") or die ("can't select: " . mysqli_error($mysqli));

$row = $result->fetch_row();

echo $row[0] . "\n";

$result->close();



$mysqli->close();

echo "success\n";
?>
