<?php
session_start();
include "db.php";

// 로그인 안 한 경우 → 안내 UI 출력
if (!isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>로그인 필요</title>
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
      width: 400px;
    }
    h2 {
      color: #e67e22;
    }
    a.button {
      display: inline-block;
      background-color: #3498db;
      color: white;
      padding: 10px 20px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: bold;
      margin-top: 20px;
    }
    a.button:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>
  <div class="box">
    <h2>🔒 로그인 해주세요</h2>
    <p>이 페이지에 접근하려면 먼저 로그인해야 합니다.</p>
    <a href="login.php" class="button">🔐 로그인하러 가기</a>
  </div>
</body>
</html>
<?php exit; } // 로그인 안 된 경우 종료 ?>

<?php
// 로그인 된 사용자 처리
$is_admin = $_SESSION['role'] === 'admin';

// 제어 대상 장치 목록
$devices = [
  'pump' => '펌프',
  'cooling_fan' => '냉각팬',
  'exhaust' => '배기장치'
];

// 관리자일 경우 제어 상태 저장
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $is_admin) {
  foreach ($devices as $key => $label) {
    $speed = $_POST[$key . '_speed'] ?? '';
    $power = $_POST[$key . '_power'] ?? '';
    file_put_contents("{$key}_status.txt", "회전수: {$speed}, 상태: {$power}");
  }
}

// 장치별 상태 불러오기
$device_status = [];
foreach ($devices as $key => $label) {
  $device_status[$key] = file_exists("{$key}_status.txt") ? file_get_contents("{$key}_status.txt") : "상태 없음";
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>다중 장치 제어</title>
  <style>
    body {
      background-color: #f4f6f8;
      font-family: 'Segoe UI', sans-serif;
      padding: 40px;
    }
    .container {
      max-width: 900px;
      margin: auto;
      background-color: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    .device-block {
      margin-bottom: 40px;
      border-bottom: 1px solid #eee;
      padding-bottom: 20px;
    }
    label {
      font-weight: bold;
      display: block;
      margin-bottom: 8px;
    }
    input[type="range"] {
      width: 100%;
    }
    .btn {
      background-color: #3498db;
      color: white;
      border: none;
      padding: 8px 16px;
      margin-top: 10px;
      margin-right: 5px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
    }
    .btn:hover {
      background-color: #2980b9;
    }
    .status {
      margin-top: 10px;
      font-size: 14px;
      color: #2c3e50;
    }
    .nav {
      text-align: center;
      margin-top: 30px;
    }
    a {
      text-decoration: none;
      color: #7f8c8d;
    }
    .readonly-note {
      color: #c0392b;
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>🛠️ 회전기 제어 시스템 (다중 장치)</h2>
    <p>환영합니다, <strong><?= $_SESSION['username'] ?></strong>님 (<?= $_SESSION['role'] ?>)</p>
    <a href="logout.php">🔓 로그아웃</a>

    <?php if ($is_admin): ?>
      <form method="post">
        <?php foreach ($devices as $key => $label): ?>
          <div class="device-block">
            <h3>🔧 <?= $label ?> 제어</h3>
            <label>회전수 조절: <span id="<?= $key ?>_value">50</span></label>
            <input type="range" name="<?= $key ?>_speed" min="0" max="100" value="50"
            oninput="document.getElementById('<?= $key ?>_value').textContent = this.value" required>

            <br>
            <button class="btn" name="<?= $key ?>_power" value="켜짐">켜기</button>
            <button class="btn" name="<?= $key ?>_power" value="꺼짐">끄기</button>
            <p class="status">현재 상태: <?= $device_status[$key] ?></p>
          </div>
        <?php endforeach; ?>
      </form>
    <?php else: ?>
      <?php foreach ($devices as $key => $label): ?>
        <div class="device-block">
          <h3>🔧 <?= $label ?> 상태 확인</h3>
          <p class="status">현재 상태: <?= $device_status[$key] ?></p>
          <p class="readonly-note">⚠️ 게스트는 제어할 수 없습니다.</p>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <div class="nav">
      <a href="board.php">📋 고장 게시판으로 이동</a>
    </div>
  </div>
</body>
</html>
