<?php
$cas_conn = mysqli_connect("localhost", "root", "1234", "user_info", "3306");
$useremail = $_POST['useremail'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE useremail ='{$useremail}'";
$result = mysqli_query($cas_conn, $sql);
$member = $result->fetch_array();
$db_pwd = $member['password'];
//$row['useremail'];

//$passwordResult = password_verify($password, $hashedPassword);
if ($password === $db_pwd) {
    // 로그인 성공
    // 세션에 useremail 저장
    session_start();
    $_SESSION['userEmail'] = $row['useremail'];
    print_r($_SESSION);
    echo $_SESSION['userEmail'];
    echo '<script>
        alert("로그인에 성공하였습니다.")
        location.href = "loginState.html";
    </script>';
} else {
    // 로그인 실패 
    echo '
    <script>
        alert("로그인에 실패하였습니다");
        location.href = "login.html";
    </script>
    ';
    
}

?>