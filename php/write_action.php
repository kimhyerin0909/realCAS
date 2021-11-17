<?php
$db = mysqli_connect("localhost", "root", "1234", "board", "3306");
$title = $_POST['title'];
$language = $_POST['language'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');
$URL = '../php/qnaLogin.php';

$cas_sql_add_user = "INSERT INTO board.board (number, hit, title, content, language, date) VALUES (null, 0, '$title', '$content', '$language', '$date')";
$result = $db->query($cas_sql_add_user);
if($result) {
    echo '<script>alert("글이 작성됐습니다."); location.href="../php/qnaLogin.php";</script>';
} else {
    echo '<script>alert("실패임 ㅅㄱ링~!"); location.href="../php/qnaLogin.php";</script>';
}

mysqli_close($db);
?>