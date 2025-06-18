<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>로그인</title>
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

    .login-box {
      background-color: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 350px;
      text-align: center;
    }

    h2 {
      color: #2c3e50;
      margin-bottom: 30px;
    }

    label {
      display: block;
      text-align: left;
      margin-bottom: 5px;
      font-weight: bold;
      color: #34495e;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    button {
      width: 100%;
      background-color: #3498db;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #2980b9;
    }

    a {
      display: block;
      margin-top: 15px;
      color: #7f8c8d;
      text-decoration: none;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>🔐 로그인</h2>
    <form action="auth.php" method="post">
      <label for="username">아이디:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">비밀번호:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">로그인</button>
    </form>
    <a href="index.php">← 메인으로 돌아가기</a>
  </div>
</body>
</html>
