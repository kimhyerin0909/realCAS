<?php
$db = mysqli_connect("localhost", "root", "1234", "board", "3306");


$cas_sql_add_user = "INSERT INTO board.board (idx, hit, title, content, language, date) VALUES (null, 0, '$title', '$content', '$language', '$date')";
$result = mysqli_query($db, $cas_sql_add_user);
include $_SERVER['DOCUMENT_ROOT']."../php/db.php";
$bno = $_GET['idx'];


if($bno && $_POST['content']){
    $sql = mq("insert into board.reply(con_num,content) values('".$bno."','".$_POST['content']."')");
    echo "<script>alert('댓글이 작성되었습니다.'); 
    location.href='../php/read.php?idx=$bno';</script>";
}else{
    echo "<script>alert('댓글 작성에 실패했습니다.'); 
    history.back();</script>";
}
?>