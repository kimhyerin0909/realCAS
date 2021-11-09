<?php 
  include '../php/inc_head.php';
?>
<?php
$cas_conn = mysqli_connect("localhost", "root", "1234", "user_info", "3306");
$useremail = $_POST['useremail'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE useremail ='{$useremail}'";
$result = mysqli_query($cas_conn, $sql);
$member = $result->fetch_array();
$db_pwd = $member['password'];
$row['useremail'];

//$passwordResult = password_verify($password, $hashedPassword);
if ($password === $db_pwd) { // 로그인 성공
    // 세션에 useremail 저장
    session_start();
    $_SESSION['useremail'] = $row['useremail'];
    print_r($_SESSION);  //Array ( [userEmail] => )
    echo ($_SESSION['useremail']);
    // echo '<script>
    //     alert("로그인에 성공하였습니다.")
    //     location.href = "../html/loginState.html";
    // </script>';
} else {
    // 로그인 실패 
    echo '
    <script>
        alert("이메일 또는 비밀번호가 잘못되었습니다.");
        location.href = "../html/login.html";
    </script>
    ';
    
}

?>