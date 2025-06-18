<?php
$mysqli = new mysqli("localhost", "root", "", "jiwon_db");

if ($mysqli->connect_errno) {
    file_put_contents('log.txt', "[".date("Y-m-d H:i:s")."] DB 연결 실패: " . $mysqli->connect_error . "\n", FILE_APPEND);
    die("DB 연결 실패: " . $mysqli->connect_error);
} else {
    file_put_contents('log.txt', "[".date("Y-m-d H:i:s")."] DB 연결 성공\n", FILE_APPEND);
}
?>
