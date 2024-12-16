<?php
$host = 'sql1.njit.edu';
$user = 'mjf8'; 
$pass = 'Matty238209200!';
$db = 'mjf8';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>