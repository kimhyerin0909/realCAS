<?php
$db = mysqli_connect("localhost", "root", "1234", "error", "3306");
$title = $_GET['title'];
$language = $_GET['language'];
$content = $_GET['content'];
$date = date('Y-m-d H:i:s');
$URL = '../html/qnaLogin.html';

$query = "insert into board (number,title, content, date, hit) values (null,'$title', '$content', '$date',0)";
$result = $connect->query($query);
if($result) {
    echo '<script>alert("글이 작성됐습니다.");</script>';
}

?>