<?php

$db = mysqli_connect('localhost', 'root', '','footballleague');


if($db->connect_errno > 0){
    echo "no";
    die('Unable to connect to database [' . $db->connect_error . ']');
}

?>
