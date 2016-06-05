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



$query = $argv[1];

echo "grabbed query: " . $query . "\n";



if ($result = $mysqli->query($query)) {

echo "query successful\n";

while ($row = mysqli_fetch_row($result)) {

printf ("%d: %s\n", $row[0], $row[1]);

}

$result->close();

}

else {

echo "query unsuccessful: " . mysqli_error($mysqli) . "\n";

}



$mysqli->close();

echo "success\n";

?>
