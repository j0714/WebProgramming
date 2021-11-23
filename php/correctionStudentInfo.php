<?php

require_once("dbconfig.php");

$_POST = JSON_DECODE(file_get_contents("php://input"), true);
$studentNameInput = $_POST["studentNameInput"];
$schoolInput = $_POST["schoolInput"];
$gradeInput = $_POST["gradeInput"];
$testScoreInput = $_POST["testScoreInput"];


$sql = "SELECT * FROM studentInfo WHERE studentName = '$studentNameInput'";
$res = $db->query($sql);
$row = $res->fetch_array(MYSQLI_ASSOC);

if ($schoolInput) {
    $sql = "UPDATE `studentInfo` SET `school` = '$schoolInput' WHERE `studentName` = '$studentNameInput'";
    $db->query($sql);
    echo true;
} else if ($gradeInput) {
    $sql = "UPDATE `studentInfo` SET  `grade` = '$phoneInput' WHERE `studentName` = '$studentNameInput'";
    $db->query($sql);
    echo true;
} else if ($testScoreInput) {
    $sql = "UPDATE `studentInfo` SET  `testScore` = '$testScoreInput' WHERE `studentName` = '$studentNameInput'";
    $db->query($sql);
    echo true;
} else {
    echo false;
}


mysqli_close($db);
