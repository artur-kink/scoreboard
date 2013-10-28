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
    echo $_POST;
    header('Location: events.php');
    exit();
}

$people = $mysqli->query("select * from people");
?>
<body>
<div id="score_template" style="display:none;">
<div>
    Person:
    <select id="person" name="person">
        <?php
            while($person = $people->fetch_object()){
                echo "<option value='" . $person->id . "'>" . $person->name . "<option/>";
            }
        ?>
    </select>
    Score: <input id="score" name="score" type="text"/>
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
