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
                        <li class="nav-item"><a class="nav-link active" href="../php/qnaLogin.php">Board</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Q&A</a></li>
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
			<!-- <li><a href="modify.php?idx=<//?php echo $board['idx']; ?>">[수정]</a></li>
			<li><a href="delete.php?idx=<//?php echo $board['idx']; ?>">[삭제]</a></li> -->
		</ul>
	</div>
    </div>
    <div class="reply_view">
        <h3>댓글목록</h3>
        <?php
        $sql3 = mq("select * from reply where con_num='".$bno."' order by idx desc");
        while($reply = $sql3->fetch_array()){
        ?>
        <div class="dap_lo">
			<!-- <div><b><//?php echo $reply['name'];?></b></div> -->
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<a class="dat_edit_bt" href="#">수정</a>
				<a class="dat_delete_bt" href="#">삭제</a>
			</div>
            <!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
				<form method="post" action="rep_modify_ok.php">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
					<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
					<input type="submit" value="수정하기" class="re_mo_bt">
				</form>
			</div>
			<!-- 댓글 삭제 비밀번호 확인 -->
			<div class='dat_delete'>
				<form action="reply_delete.php" method="POST">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			 		<p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
				 </form>
			</div>
        </div>
    <?php } ?>
    <!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form action="../php/reply_ok.php?idx=<?php echo $bno; ?>" method="POST">
			<!-- <input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
			<input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호"> -->
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">댓글</button>
			</div>
		</form>
	</div>
</div><!--- 댓글 불러오기 끝 -->
</div>
</body>
</html>