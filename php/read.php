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
    <link rel="icon" type="image/x-icon" href="browser-20_icon-icons.com_62178.ico" />
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
                        <li class="nav-item"><a class="nav-link active" href="../php/qnaLogin.php">Board</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">Q&A</a></li> -->
                    </ul>

                    <ul class="user">
                        <li class= "user01"><a class="nav-link active" aria-current="page" href="../php/logout.php">Logout</a></li>
                    </ul>
                    
                </div>
            </div>
        </nav>
    <?php
        $bno = $_GET['idx'];
        $hit = mysqli_fetch_array(mq("select * from board where idx ='".$bno."'"));
        $hit = $hit['hit'] + 1;
        $fet = mq("update board set hit = '".$hit."' where idx = '".$bno."'");
        $sql = mq("select * from board where idx = '".$bno."'");
        $board = $sql->fetch_array();
    ?>
    
    <div style="text-align: left; width:60vw; margin:auto;" id="board_read">
        <h2 style="margin-top: 10%;"><?php echo $board['title']?></h2>
        <div id="user_info">
            <?php echo $board['name']; ?>
            <?php echo $board['date']; ?>
            조회 <?php echo $board['hit']; ?>
            <div id="bo_line"></div>
        </div>
        <div style="margin-top:10px;" id="bo_content">
            <?php echo nl2br("$board[content]"); ?>
        </div>
        <!-- <div id="bo_ser">
		    <ul style=" list-style: none;">
			    <li><a href="../php/qnaLogin.php">[목록으로]</a></li>
		    </ul>
	    </div> -->
    </div>
    <br>    
        <hr style="width: 60vw; margin:auto;">
    <div class="datInput" style="width: 60vw; margin:auto;">
        <h5 style="margin-top:20px;">댓글 목록</h5>
        <div class="wkrtjd">
            <form action="../php/reply_ok.php" method="POST">
                <input type="hidden" name="text2" value="<?php echo $board['idx']; ?>">
                <input placeholder="댓글을 입력하세요." style="margin-bottom: 20px;" type="text" name="text">
                <!-- <button class="btn btn-secondary" style="margin-bottom: 20px;" type="submit">작성</button> -->
            </form>
        </div>
    </div>
    
    <div class="comments" style="width:60vw; margin:auto;">
            <?php 
                $sql2 = mq("select * from dat where boardNum='".$bno."' order by idx desc");
                while($comment = $sql2->fetch_array()) { ?>
                
                <p ><span style="font-size:14px"><?php echo $comment['date'];?></span><br>
                <?php echo nl2br("$comment[text]"); ?></p><hr style="width: 50%;"> <?php
                }
            ?>
    </div>
</body>
</html>