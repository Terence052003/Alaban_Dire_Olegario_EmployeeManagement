<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$conn = new mysqli('sql303.infinityfree.com', 'if0_37549380', 'terenceadmin123', 'if0_37549380_XXX');
$id = $_GET['id'];
$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $conn->query("UPDATE users SET username='$username' WHERE id=$id");
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form action="edit_user.php?id=<?= $id ?>" method="POST">
            <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
            <button type="submit">Update User</button>
        </form>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
