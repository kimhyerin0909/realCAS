
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Translate</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">ErrorTalkTalk</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="../html/loginState.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="../html/translateLogin.html">Translate</a></li>
                        <li class="nav-item"><a class="nav-link" href="../php/qnaLogin.php">Board</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Q&A</a></li>
                    </ul>

                    <ul class="user">
                        <li class= "user01"><a class="nav-link active" aria-current="page" href="../php/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <br>
        <?php
        session_start();
        $db = mysqli_connect("localhost", "root", "1234", "error", "3306");
        $lang = $_POST['language'];
        $name = $_POST['code'];
        if($lang === 'C') {
            $query_result = mysqli_query($db, "select * from error_c where error_code='".$name."'");
            $result = mysqli_fetch_array($query_result);
            
            if($result) {
                echo ("해결 방법 : ".$result['error_cause']."");
            }
            else {
            echo '<script language=javascript> alert("데이터가 없습니다."); location.href="../html/translate.html";</script>';
            }
        }
        else {
            echo '<script language=javascript> alert("C언어 이외에 데이터 추가 예정입니다. 죄송합니다."); location.href="../html/translate.html";</script>';
        }
        
        ?>
    </div>
</body>
</html>