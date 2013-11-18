<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Events</title>
</head>
<?php
require "db.php";
?>
<body>
<a href="event.php"><img src="resources/images/add.png" width="16" height="16"/> New Event</a>
<table>
<thead>
    <tr>
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
        echo "<td><a href='event.php?id=" . $row->id . "'>" . $row->name . "</a></td>";
       	echo "<td>" . $row->time . "</td>";
        echo "</tr>";
    }
}
?>
</tbody>
</table>
</body>
</html>
