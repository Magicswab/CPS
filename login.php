<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
</head>
<body>
<h2>🔐 로그인</h2>
<form action="login.php" method="post">
    아이디: <input type="text" name="username" required><br>
    비밀번호: <input type="password" name="password" required><br>
    <input type="submit" value="로그인">
</form>
<a href="index.php">← 메인으로 돌아가기</a>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['username'];
    $pw = $_POST['password'];

    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($id == $row['id'] && $pw == $row['pw']) {
            $_SESSION['id'] = $id;
            file_put_contents('log.txt', "[".date("Y-m-d H:i:s")."] 사용자 '$id' 로그인 성공\n", FILE_APPEND);
            header("Location:index.php");
            exit();
        } else {
            file_put_contents('log.txt', "[".date("Y-m-d H:i:s")."] 로그인 실패 - 입력 ID: '$id' 비밀번호 불일치\n", FILE_APPEND);
            echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.'); history.back();</script>";
        }
    } else {
        file_put_contents('log.txt', "[".date("Y-m-d H:i:s")."] 로그인 실패 - 존재하지 않는 ID: '$id'\n", FILE_APPEND);
        echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.'); history.back();</script>";
    }
}
?>
</body>
</html>
