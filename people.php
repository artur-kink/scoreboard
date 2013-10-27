<html>
<head><title>People</title></head>
<?php
require "db.php";
?>
<body>
<table>
<thead>
	<tr>
	<th>Id</th>
	<th>Name</th>
	</tr>
</thead>
<tbody>
<?php
$people = $mysqli->query("select * from people;");
if($people){
	while($row = $people->fetch_object()){
		echo "<tr>";
		echo "<td>" . $row->id . "</td>";
		echo "<td>" . $row->name . "</td>";
		echo "</tr>";
	}
}
?>
</tbody>
</body>
