<?php
include "db.php";
session_start();
if ($_SESSION['role'] !== 'admin') die("권한 없음");
$id = $_GET['id'];
$mysqli->query("DELETE FROM fault_board WHERE id=$id");
header("Location: board.php");
?>
