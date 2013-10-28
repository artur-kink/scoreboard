<html>
<head><title>Event</title></head>
<?php
require "db.php"
?>
<?php
$id = $_GET["id"];
$event = $mysqli->query("select * from events where id = " . $id ."");
if(!$event){
    die("Event not found");
}
$event = $event->fetch_object();
?>
<body>
<div id="event_name">
<?php 
echo $event->name;
?>
</div>
</body>
</html>
