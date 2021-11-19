<?php
    include $_SERVER['DOCUMENT_ROOT']."../php/db.php";
    //$bno = $_GET['idx'];

    $dat = $_POST['text'];
    $dat2 = $_POST['text2'];
    $date2 = date('Y-m-d H:i:2');
    $add_reply = "INSERT INTO board.dat (idx, text, boardNum, date) VALUES (null,'$dat', '$dat2','$date2')";
    $result2 = mysqli_query($db, $add_reply);
    if($result2) {
        echo '<script>alert("댓글이 작성됐습니다."); location.href="../php/read.php?idx='.$dat2.'";</script>';
    } else {
        echo '<script>alert("실패"); location.href="../php/qnaLogin.php";</script>';
    }
?>