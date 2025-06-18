<?php
session_start();
include "db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$result = $mysqli->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
$user = $result->fetch_assoc();

if ($user) {
  $_SESSION['username'] = $user['username'];
  $_SESSION['role'] = $user['role'];
  header("Location: control.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>로그인 실패</title>
  <style>
    body {
      background-color: #f4f6f8;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .box {
      background-color: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      text-align: center;
    }

    h2 {
      color: #e74c3c;
      margin-bottom: 20px;
    }

    a {
      display: inline-block;
      margin-top: 20px;
      color: #3498db;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="box">
    <h2>❌ 로그인 실패</h2>
    <p>아이디 또는 비밀번호가 올바르지 않습니다.</p>
    <a href="login.php">← 다시 로그인하러 가기</a>
  </div>
</body>
</html>
