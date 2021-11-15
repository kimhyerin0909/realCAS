<?php
header('Content-Type: text/html; charset=utf-8');
$db = mysqli_connect("localhost", "root", "1234", "board", "3306");
$db->set_charset("utf8");
function mq($sql) {
    global $db;
    return $db->query($sql);
}
?>