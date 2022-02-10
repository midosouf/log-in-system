<?php

require_once "Access/database.php";

$query = "select * from person";

$result = $db->query($query);

while($person = $result->fetch_assoc()){
    echo "Name is " . $person["Name"] . " and position is " . $person["Position"] ."<br/>";
}

$db->close();