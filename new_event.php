<html>
<head>
<?php
require "db.php";

$name = $_POST["name"];
if($name){
    $result = $mysqli->query("insert into events(name, time)" .
        "values('" . $name . "', NOW());");
    $result = $mysqli->query("select max(id) as id from events;");
    $event_id = $result->fetch_object()->id;

    //Get all dynamically added scores.
    foreach($_POST as $key => $value){
        if(strpos($key, "person") === 0){
            $score = $_POST["score" . substr($key, 6)];
            if(is_numeric($score) == true){
                $result = $mysqli->query("insert into scores(eid, pid, score)" .
                    "values('" . $event_id . "', " . $value . ", " . $score . ");");
            }
        }
    }
    header('Location: events.php');
    exit();
}

$people = $mysqli->query("select * from people");
?>
<title>Create new event.</title>
<script language="javascript" type="text/javascript" src="resources/scripts/jquery.min.js"></script>
<script type="text/javascript">

var score_id = 1;
function addScore(){
    var scores_template = $("#score_template").clone();
    $(scores_template).children(0).children("#person").attr("name", "person" + score_id);
    $(scores_template).children(0).children("#score").attr("name", "score" + score_id);
    $("#scores").append($(scores_template).html());
    score_id++;
}

function removeScore(source){
    $(source).parent().remove();
}

</script>
</head>
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
    Score: <input id="score" name="score" type="text"/><a href="#" onclick="removeScore(this);">-</a>
</div>
</div>
<form method="post" action="new_event.php">
    <label for="name">Name:</label>
    <input id="name" name="name" type="text" />

    <a href="#" onclick="addScore();">+</a>
    <div id="scores">

    </div>

    <input type="submit" />
</form>
</body>
</html>