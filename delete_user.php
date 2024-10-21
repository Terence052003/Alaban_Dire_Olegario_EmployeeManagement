<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$conn = new mysqli('sql303.infinityfree.com', 'if0_37549380', 'terenceadmin123', 'if0_37549380_XXX');
$id = $_GET['id'];
$conn->query("DELETE FROM users WHERE id=$id");
header('Location: dashboard.php');
exit;
?>
