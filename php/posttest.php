
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/translate.css">
    <title>Translate</title>
</head>
<body>

    <div class="TopMenu">
        <nav id="menu">
            <ul>
                <div class="menu1">
                    <li><a class="menuLink" href="index.html">Home</a></li>
                    <li><a class="menuLink" href="translate.html">Error Translate</a></li>
                    <li><a class="menuLink" href="qna.html">Q&A</a></li>
                    <li><a class="menuLink" href="#">Cummunity</a></li>
                </div>
                <div class="losi1">
                    <li><a class="losi" href="login.html">로그인</a></li>
                    <li><a class="losi" href="signup.html">회원가입</a></li>
                </div>
            </ul>
        </nav>
        <br>
        <br>
        <?php
        session_start();
        $db = mysqli_connect("localhost", "root", "1234", "translate", "3306");

        $name = $_POST['code'];

        $query_result = mysqli_query($db, "select * from errors where error_code='".$name."'");
        $result = mysqli_fetch_array($query_result);

        if($result) {
            echo ("번역 : '".$result['error_tran']."'");
            echo ("해결 : '".$result['error_solve']."'");
        }
        else {
            echo '<script language=javascript> alert("데이터가 없습니다."); location.href="translate.php";</script>';

        }
        ?>
    </div>
</body>
</html>