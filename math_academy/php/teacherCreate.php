<?php

require_once("dbconfig.php");

$_POST = JSON_DECODE(file_get_contents("php://input"),true);
$teacherNameInput = $_POST["teacherNameInput"];
$addressInput = $_POST["addressInput"];
$phoneInput = $_POST["phoneInput"];
$genderInput = $_POST["genderInput"];
$ageInput = $_POST["ageInput"];

$sql = "SELECT * FROM teacherInfo WHERE teacherName = '$teacherNameInput'";
$res = $db -> query($sql);
$row = $res -> fetch_array(MYSQLI_ASSOC);

if ($row === null){
    //  동일한 이름이 없을 경우
    $sql = "INSERT INTO `teacherInfo`(`teacherName`, `address`, `phone`, `gender`, `age`)
    VALUES('$teacherNameInput', '$addressInput', '$phoneInput', '$genderInput', $ageInput)";
    $db ->query($sql);
    echo true; //실행 성공 시 1이 찍히기 위해
}else{
    echo false;
}
mysqli_close($db);