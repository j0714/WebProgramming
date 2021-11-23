<?php

require_once("dbconfig.php");

$_POST = JSON_DECODE(file_get_contents("php://input"), true);
$teacherNameInput = $_POST["teacherNameInput"];
$addressInput = $_POST["addressInput"];
$phoneInput = $_POST["phoneInput"];
$genderInput = $_POST["genderInput"];
$ageInput = $_POST["ageInput"];

$sql = "SELECT * FROM teacherInfo WHERE teacherName = '$teacherNameInput'";
$res = $db->query($sql);
$row = $res->fetch_array(MYSQLI_ASSOC);

if ($addressInput) {
    $sql = "UPDATE `teacherInfo` SET `address` = '$addressInput' WHERE `teacherName` = '$teacherNameInput'";
    $db->query($sql);
    echo true;
} else if ($phoneInput) {
    $sql = "UPDATE `teacherInfo` SET  `phone` = '$phoneInput' WHERE `teacherName` = '$teacherNameInput'";
    $db->query($sql);
    echo true;
} else if ($genderInput) {
    $sql = "UPDATE `teacherInfo` SET  `gender` = '$genderInput' WHERE `teacherName` = '$teacherNameInput'";
    $db->query($sql);
    echo true;
} else if ($ageInput) {
    $sql = "UPDATE `teacherInfo` SET  `age` =  '$ageInput' WHERE `teacherName` = '$teacherNameInput'";
    $db->query($sql);
    echo true;
} else {
    echo false;
}


mysqli_close($db);
