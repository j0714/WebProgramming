<?php

require_once("dbconfig.php");

$_POST = JSON_DECODE(file_get_contents("php://input"), true);
$teacherNameInput = $_POST["teacherNameInput"];

$sql = "SELECT * FROM teacherInfo WHERE teacherName = '$teacherNameInput'";
$res = $db->query($sql);
$row = $res->fetch_array(MYSQLI_ASSOC);

if ($teacherNameInput) {
    $sql = "DELETE FROM `teacherInfo`  WHERE `teacherName` = '$teacherNameInput'";
    $db->query($sql);
    echo true;
} else {
    echo false;
}


mysqli_close($db);