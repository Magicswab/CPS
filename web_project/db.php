<?php
$mysqli = new mysqli("localhost", "root", "", "jiwon_db");
if ($mysqli->connect_errno) {
    die("DB 연결 실패: " . $mysqli->connect_error);
}
?>
