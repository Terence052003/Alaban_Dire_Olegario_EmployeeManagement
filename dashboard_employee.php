<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login_employee.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?= htmlspecialchars($_SESSION['user']); ?></h1> <!-- Safely output user info -->
        <a href="employees.php">Manage Employees</a> |  
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
