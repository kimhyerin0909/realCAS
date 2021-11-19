<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA</title>
    <link rel="icon" type="image/x-icon" href="../browser-20_icon-icons.com_62178.ico" />
    <link rel="stylesheet" href="../css/main.css">
</head>
<body style="overflow-y: hidden">
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
        <br>
        <?php
        $db = mysqli_connect("localhost", "root", "1234", "board", "3306");
        $query = "select * from board order by idx desc";
        $result = $db->query($query);
        $total = mysqli_num_rows($result);
        ?>
        <h1 style="text-align:center; margin:15px;">Board</h1>
        <div class="write" style="width:60vw; margin:auto; text-align:right;">
            <button type="button" class="btn btn-primary" style="margin-bottom:15px;" onclick="location.href='../html/write.html' ">글 작성하기</button>
        </div>
        <table class="table" style="width: 60vw; margin:auto;">
            <thead class="thead-light">
                <tr>
                    <th scope="col">번호</th>
                    <th scope="col">언어</th>
                    <th scope="col">제목</th>
                    <th scope="col">작성일</th>
                    <th scope="col">조회수</th>
                </tr>
            </thead>
            <?php
    header('Content-Type: text/html; charset=utf-8');
    $db = mysqli_connect("localhost", "root", "1234", "board", "3306");
    $db->set_charset("utf8");
    function mq($sql) {
        global $db;
        return $db->query($sql);
    }
    $sql = mq("select * from board order by idx desc limit 0,9");
    while($board = $sql->fetch_array()) {
        $title = $board["title"];
        if(strlen($title)>30) {
            $title=str_replace($board["title"], mb_substr($board["title"], 0, 30, "utf-8")."...", $board["title"]);
        }
        ?>
            <tbody>
                <tr>
                    <td><a href="../php/read.php?idx=<?php echo $board["idx"];?>"><?php echo $board['idx'];?></td>
                    <td><?php echo $board['language'];?></td>
                    <td><?php echo $board['title'];?></td>
                    <td><?php echo $board['date'];?></td>
                    <td><?php echo $board['hit'];?></td>
                </tr>
             <?php } ?>   
            </tbody>
        </table>
        <div class="btns" style="text-align:center;">
            <button type="button" class="btn btn-outline-secondary btn-sm" style="margin-top:15px;">더보기</button>
        </div>
    </body>
</html>