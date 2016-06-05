<?php

$dbhost = '127.0.0.1';
$dbusername = 'root';
$dbuserpass = '';
$dbname = 'mydatabase';
$tablename = 'mytable';

echo "variables set\n";



if ($argc == 2) {

$tablename = $argv[1];

}

echo "tablename is: " . $tablename . "\n";



$mysqli = new mysqli($dbhost, $dbusername, $dbuserpass) or die ("can't connect to database\n");

echo "database linked\n";



$mysqli->query("

CREATE DATABASE IF NOT EXISTS $dbname

") or die ("can't create database: " . mysqli_error($mysqli) . "\n");

echo "database created\n";



$mysqli->select_db($dbname) or die ("can't select database: " . mysqli_error($mysqli) . "\n");

echo "database selected\n";



$mysqli->query("

CREATE TABLE $tablename (id INTEGER PRIMARY KEY, data TEXT)

") or die ("can't create table: " . mysqli_error($mysqli) . "\n");

echo "table created\n";



$mysqli->close();

echo "success\n";

?>
