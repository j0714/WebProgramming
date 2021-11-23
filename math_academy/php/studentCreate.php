<?php

require_once("dbconfig.php");

$_POST = JSON_DECODE(file_get_contents("php://input"),true);
$studentNameInput = $_POST["studentNameInput"];
$schoolInput = $_POST["schoolInput"];
$gradeInput = $_POST["gradeInput"];
$testScoreInput = $_POST["testScoreInput"];

$sql = "SELECT * FROM studentInfo WHERE studentName = '$studentNameInput'";
$res = $db -> query($sql);
$row = $res -> fetch_array(MYSQLI_ASSOC);

if ($row === null){
    //  동일한 이름이 없을 경우
    $sql = "INSERT INTO `studentInfo`(`studentName`, `school`, `grade`, `testScore`)
    VALUES('$studentNameInput', '$schoolInput', '$gradeInput', '$testScoreInput')";
    $db ->query($sql);
    echo true; //실행 성공 시 1이 찍히기 위해
}else{
    echo false;
}
mysqli_close($db);