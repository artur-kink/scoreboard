<html>
<head><title>Create new person.</title></head>
<?php
require "db.php";

$name = $_GET["name"];
if($name){
	$result = $mysqli->query("insert into people(name)" .
       "values('" . $name . "');");

	header('Location: new_person.php');
	exit();
}

?>
<body>
<form action="new_person.php">
	<input id="name" name="name" type="text" />
	<input type="submit" />
</form>
</body>
</html>
