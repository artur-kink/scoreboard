<?php
$mysqli = new mysqli("host", "user", "pw", "db");
if(mysqli_connect_errno()){
	die("Could not resolve mysql connection.");
}
?>
