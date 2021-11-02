

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
        <div class="title">
            <h1>
                오류 메세지를 입력하세요.
            </h1>
        </div>
        <div class="inputu">
            <form action="posttest.php" class="input" name="input" method="POST">
                <input type="text" name="code" rows="10" cols="100%" placeholder="오류 코드를 입력하세요."></input>
                <button name="nextBtn" type="submit" id="nextBtn">Next</button>
            </form>
        </div>
    </div>
</body>
</html>