<?php
session_start();

if (isset($_SESSION['id'])) {
    file_put_contents('log.txt', "[".date("Y-m-d H:i:s")."] 사용자 '{$_SESSION['id']}' 로그아웃\n", FILE_APPEND);
}

session_destroy();
header("Location: login.php");
?>
