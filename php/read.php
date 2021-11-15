<?php
include $_SERVER['DOCUMENT_ROOT']."../php/db.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">ErrorTalkTalk</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link " aria-current="page" href="../html/loginState.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../html/translateLogin.html">Translate</a></li>
                        <li class="nav-item"><a class="nav-link active" href="../html/qnaLogin.html">Board</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Q&A</a></li>
                    </ul>

                    <ul class="user">
                        <li class= "user01"><a class="nav-link active" aria-current="page" href="../php/logout.php">Logout</a></li>
                    </ul>
                    
                </div>
            </div>
        </nav>
    <?php
        $bno = $_GET['number'];
        $hit = mysqli_fetch_array(mq("select * from board where number ='".$bno."'"));
        $hit = $hit['hit'] + 1;
        $fet = mq("update board set hit = '".$hit."' where number = '".$bno."'");
        $sql = mq("select * from board where number = '".$bno."'");
        $board = $sql->fetch_array();
    ?>
    <div id="board_read">
        <h2><?php echo $board['title']?></h2>
        <div id="user_info">
            <?php echo $board['name']; ?>
            <?php echo $board['date']; ?>
            조회 : <?php echo $board['hit']; ?>
            <div id="bo_line"></div>
        </div>
        <div id="bo_content">
            <?php echo nl2br("$board[content]"); ?>
        </div>
        <div id="bo_ser">
		<ul>
			<li><a href="../php/qnaLogin.php">[목록으로]</a></li>
			<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
		</ul>
	</div>
    </div>
</body>
</html>