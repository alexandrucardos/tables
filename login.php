<?php
$con = mysql_connect('localhost','test','test','baza de date');

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>