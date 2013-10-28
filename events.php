<html>
<head><title>Events</title></head>
<?php
require "db.php";
?>
<body>
<table>
<thead>
    <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Date</th>
    </tr>
</thead>
<tbody>
<?php
$events = $mysqli->query("select * from events;");
if($events){
    while($row = $events->fetch_object()){
    	echo "<tr>";
        echo "<td>" . $row->id . "</td>";
        echo "<td>" . $row->name . "</td>";
       	echo "<td>" . $row->time . "</td>";
        echo "</tr>";
    }
}
?>
</tbody>
</body>
