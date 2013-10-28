<html>
<head>
<title>Create new event.</title>
<script language="javascript" type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">

function addScore(){
    $("#scores").append($("#score_template").html());
}

</script>
</head>
<?php
require "db.php";

$name = $_POST["name"];
if($name){
    $result = $mysqli->query("insert into events(name, time)" .
        "values('" . $name . "', NOW());");

    header('Location: events.php');
    exit();
}

?>
<body>
<div id="score_template" style="display:none;">
<div>
Score: <input type="text"/>
</div>
</div>
<form method="post" action="new_event.php">
    <label for="name">Name:</label>
    <input id="name" name="name" type="text" />

    <a href="#" onclick="addScore()">+</a>
    <div id="scores">

    </div>

    <input type="submit" />
</form>
</body>
</html>
