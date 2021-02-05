<?php

$host = "localhost"; /* Host name */
$user = "[your sql login]"; /* User */
$password = "[your password]"; /* Password */
$dbname = "theCollector"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>