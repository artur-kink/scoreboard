<html>
<head><title>Create new event.</title></head>
<?php
require "db.php";

$name = $_GET["name"];
if($name){
	$result = $mysqli->query("insert into events(name, time)" .
       "values('" . $name . "', NOW());");

	header('Location: new_event.php');
	exit();
}

?>
<body>
<form action="new_event.php">
	<input id="name" name="name" type="text" />
	<input type="submit" />
</form>
</body>
</html>
