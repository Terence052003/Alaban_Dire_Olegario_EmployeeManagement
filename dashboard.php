<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$conn = new mysqli('sql303.infinityfree.com', 'if0_37549380', 'terenceadmin123', 'if0_37549380_XXX');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if ($conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')")) {
        $message = "User added successfully.";
    } else {
        $error = "Error: " . $conn->error;
    }
}

$users = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>User Records</h2>
        
        <?php if (isset($message)): ?>
            <p style="color:green;"><?= $message; ?></p>
        <?php elseif (isset($error)): ?>
            <p style="color:red;"><?= $error; ?></p>
        <?php endif; ?>

        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $users->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['username'] ?></td>
                <td>
                    <a href="edit_user.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <div>
            <a href="logout.php" style="padding: 10px; background-color: #f44336; color: white; text-decoration: none;">Logout</a>
        </div>
    </div>
</body>
</html>
