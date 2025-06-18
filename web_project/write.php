<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>글쓰기</title>
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

    .container {
      background-color: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      width: 500px;
    }

    h2 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #34495e;
    }

    input[type="text"], textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    button {
      width: 100%;
      background-color: #27ae60;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #219150;
    }

    a {
      display: block;
      margin-top: 20px;
      color: #7f8c8d;
      text-align: center;
      text-decoration: none;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>✏️ 고장 글쓰기</h2>
    <form action="write_ok.php" method="post">
      <label for="title">제목</label>
      <input type="text" id="title" name="title" required>

      <label for="content">내용</label>
      <textarea id="content" name="content" rows="5" required></textarea>

      <button type="submit">등록하기</button>
    </form>
    <a href="board.php">← 게시판으로 돌아가기</a>
  </div>
</body>
</html>
