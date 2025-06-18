<?php
include "db.php";
session_start();
$title = $_POST['title'];
$content = $_POST['content'];
$writer = $_SESSION['username'];
$mysqli->query("INSERT INTO fault_board (title, content, writer) VALUES ('$title', '$content', '$writer')");
header("Location: board.php");
?>
