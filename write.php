<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>글쓰기</title>
</head>
<body>
  <h2>✏️ 고장 글쓰기</h2>
  <form action="write_ok.php" method="post">
    제목: <input type="text" name="title" required><br><br>
    내용:<br>
    <textarea name="content" rows="10" cols="50" required></textarea><br><br>
    <input type="submit" value="등록하기">
  </form>
  <a href="board.php">← 게시판으로 돌아가기</a>
</body>
</html>
