<?php

require_once("dbconfig.php");

$_POST = JSON_DECODE(file_get_contents("php://input"), true);
$studentNameInput = $_POST["studentNameInput"];

$sql = "SELECT * FROM studentInfo WHERE studentName = '$studentNameInput'";
$res = $db->query($sql);
$row = $res->fetch_array(MYSQLI_ASSOC);

if ($studentNameInput) {
    $sql = "DELETE FROM `studentInfo`  WHERE `studentName` = '$studentNameInput'";
    $db->query($sql);
    echo true;
} else {
    echo false;
}


mysqli_close($db);