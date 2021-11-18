<?php
$db = mysqli_connect("localhost", "root", "1234", "board", "3306");
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');

$sql_add_reply = "INSERT INTO board.reply (idx,content, date) VALUES ('$idx', '$content', '$date')";
$result = mysqli_query($db, $sql_add_reply);
include $_SERVER['DOCUMENT_ROOT']."../php/db.php";
$bno = $_GET['idx'];


if($bno && $_POST['content']){
    $sql = mq("insert into board.reply(con_num,content) values('".$bno."','".$_POST['content']."')");
    echo "<script>alert('댓글이 작성되었습니다.'); 
    location.href='../php/read.php?idx=$bno';</script>";
}else {
    echo "<script>alert('댓글 작성에 실패했습니다.'); 
    history.back();</script>";
}
?>