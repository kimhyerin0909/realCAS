<?php
session_start();
$cas_conn = mysqli_connect("localhost", "root", "1234", "user_info", "3306");
$useremail = $_POST['useremail'];
$username = $_POST['username'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if(!is_null($username)) {
    $cas_sql = "SELECT useremail FROM users WHERE useremail = '$useremail';"; //닉네임 말고 이메일이 유니크키임 
    $cas_result = mysqli_query($cas_conn, $cas_sql );
    while($cas_row = mysqli_fetch_array($cas_result)) {
        $useremail_e = $cas_row['useremail'];
    }
    if($useremail === $useremail_e) {
        $wu = 1;
    } elseif ($password != $password_confirm) {
        $wp = 1;
    } else {
        //$encrypted_password = password_hash($password, PASSWORD_DEFAULT); //특수문자 포함해서 비밀번호 암호화 -> DB에 특수문자 안 들어갈수도
        $cas_sql_add_user = "INSERT INTO user_info.users (username, useremail, password) VALUES ('$username', '$useremail', '$password')";

        mysqli_query( $cas_conn, $cas_sql_add_user );
        echo '<script>location.href="signup_ok.php";</script>';
    }
}
?>
<?php
if ( $wu == 1 ) {
    echo "<p>이미 가입된 계정입니다.</p>";
}
if ( $wp == 1 ) {
    echo "<p>비밀번호가 일치하지 않습니다.</p>";
}
?>

<!--<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="header">
        <h1 style="text-align: center; margin-top: 50%;">Sign Up</h1>
    </div>
    <div class="form">
        <form class="form-row" action="signup.php" method="POST">
            <input  type="text" name="username" placeholder="닉네임을 입력하세요">
            <input type="email" name="useremail" placeholder="이메일을 입력하세요.">
            <input type="password" name="password" placeholder="비밀번호를 입력하세요.">
            <input type="password" name="password_confirm" placeholder="비밀번호 확인">
            <button type="submit">Signup</button>
            
        </form>
    </div>
</body>
</html>