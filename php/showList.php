<?php
header('Content-Type: text/html; charset=utf-8');
$db = mysqli_connect("localhost", "root", "1234", "board", "3306");
$db->set_charset("utf8");
function mq($sql) {
    global $db;
    return $db->query($sql);
}
$sql = mq("select * from board order by number desc limit 0,5");
while($board = $sql->fetch_array()) {
    $title = $board["title"];
    if(strlen($title)>30) {
        $title=str_replace($board["title"], mb_substr($board["title"], 0, 30, "utf-8")."...", $board["title"]);
    }
}
?>