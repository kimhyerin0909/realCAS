<?php
session_start();
$cas_conn = mysqli_connect("localhost", "root", "1234", "user_info", "3306");
$username = $_POST['username'];
$password = $_POST['password'];
//$password_confirm = $_POST['password_confirm'];

if(!is_null($username)) {
    $cas_sql = "SELECT username FROM users WHERE username = '$username';";
    $cas_result = mysqli_query($cas_conn, $cas_sql );
    while($cas_row = mysqli_fetch_array($cas_result)) {
        $username_e = $cas_row['username'];
    }
    if($username === $username_e) {
        $wu = 1;
    } elseif ($password != $password_confirm) {
        $wp = 1;
    } else {
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        $cas_sql_add_user = "INSERT INTO users (username, password) VALUES ('$username', '$encrypted_password');";

        mysqli_query( $cas_conn, $cas_sql_add_user );
        echo '<script>location.href="signup_ok.php";</script>';
    }
}
?>

<!DOCTYPE html>
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
            <input  type="text" name="username" placeholder="이름을 입력하세요">
            <input type="email" name="useremail" placeholder="이메일을 입력하세요.">
            <input type="password" name="password" placeholder="비밀번호를 입력하세요.">
            <input type="password" name="password_confirm" placeholder="비밀번호 확인">
            <button type="submit">Signup</button>
            <?php
            if ( $wu == 1 ) {
            echo "<p>사용자이름이 중복되었습니다.</p>";
            }
            if ( $wp == 1 ) {
            echo "<p>비밀번호가 일치하지 않습니다.</p>";
            }
            ?>
        </form>
    </div>
</body>
</html>