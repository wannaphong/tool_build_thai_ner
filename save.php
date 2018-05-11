<?php
include("src/Medoo.php");
$text = $_POST['edit'];
$username= $_POST['username'];
$email = $_POST['email'];
use Medoo\Medoo;
$database = new Medoo([
	'database_type' => 'sqlite',
	'database_file' => 'db.sqlite3'
]);
foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
    // do stuff with $line
    $database->insert("data", [ # ตาราง usertbl
    "text" => htmlspecialchars($line),
    "username" => htmlspecialchars($username),
    "email" => htmlspecialchars($email),
    "ip_address" => $_SERVER['REMOTE_ADDR'],
    "check" => 0,
   ]);
}
header("index.html");
?>