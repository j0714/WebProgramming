<?php

//에러 처리
error_reporting(E_ALL);
ini_set("display_errors",1);


//json 통신
header("Content-Type:appplication/json");

$host = 'localhost';
$user = 'root';
$pw = 'qwer1234';
$dbName = 'Math_Academy';

$db = new mysqli($host, $user, $pw, $dbName);

mysqli_set_charset($db, "utf8");