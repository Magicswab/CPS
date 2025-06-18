<?php
include "db.php";
session_start();
$result = $mysqli->query("SELECT * FROM fault_board ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>고장 게시판</title>
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
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 800px;
    }

    h2 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #ecf0f1;
    }

    a.button {
      display: inline-block;
      background-color: #3498db;
      color: white;
      padding: 10px 20px;
      margin-right: 10px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
    }

    a.button:hover {
      background-color: #2980b9;
    }

    .actions {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>📋 고장 게시판</h2>
    
    <table>
      <tr>
        <th>제목</th>
        <th>작성자</th>
        <th>작성일</th>
        <?php if ($_SESSION['role'] === 'admin') echo "<th>관리</th>"; ?>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td><?= htmlspecialchars($row['writer']) ?></td>
          <td><?= $row['created_at'] ?></td>
          <?php if ($_SESSION['role'] === 'admin'): ?>
            <td><a class="button" href="delete.php?id=<?= $row['id'] ?>">삭제</a></td>
          <?php endif; ?>
        </tr>
      <?php endwhile; ?>
    </table>

    <div class="actions">
      <a class="button" href="write.php">✏️ 글쓰기</a>
      <a class="button" href="control.php">🔧 제어 화면으로 이동</a>
    </div>
  </div>
</body>
</html>
