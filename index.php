<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome to 빡공 A server!</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background-color: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      text-align: center;
      width: 500px;
    }

    h1 {
      color: #2c3e50;
      margin-bottom: 20px;
      white-space: nowrap;
    }

    p {
      margin-bottom: 30px;
      color: #555;
    }

    a button {
      background-color: #3498db;
      color: white;
      border: none;
      padding: 12px 24px;
      margin: 10px;
      border-radius: 10px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    a button:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome to 빡공 A server!</h1>
    <p>press the lower buttons</p>
    <a href="login.php"><button>🔐 로그인</button></a>
    <a href="board.php"><button>📋 고장 기록 보기</button></a>
  </div>
</body>
</html>
