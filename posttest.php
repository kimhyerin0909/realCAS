<?php
session_start();
$db = mysqli_connect("localhost", "root", "1234", "translate", "3306");

$name = $_POST['code'];

$query_result = mysqli_query($db, "select * from errors where error_code='".$name."'");
$result = mysqli_fetch_array($query_result);

echo ("번역 : '".$result['error_tran']."'");
echo ("해결 : '".$result['error_solve']."'");

?>