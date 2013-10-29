<html>
<head><title>Event</title></head>
<?php
require "db.php"
?>
<?php
$id = $_GET["id"];
$event = $mysqli->query("select * from events where id = " . $id .";");
if(!$event){
    die("Event not found");
}
$event = $event->fetch_object();
$scores = $mysqli->query("select * from scores_view where eid = " . $event->id .";");
?>

<body>
<div id="event_name">
<?php 
echo $event->name . "<br/>";
echo "Scores: <br/>";
while($score = $scores->fetch_object()){
    echo $score->name . ": " . $score->score;
}
?>
</div>
</body>
</html>
