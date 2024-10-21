<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$conn = new mysqli('sql303.infinityfree.com', 'if0_37549380', 'terenceadmin123', 'if0_37549380_XXX');
$id = $_GET['id'];

$id = intval($id);
$conn->query("DELETE FROM employees WHERE id=$id");

header('Location: employees.php'); 
exit;
?>
