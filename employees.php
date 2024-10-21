<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login_employee.php');
    exit;
}

$conn = new mysqli('sql303.infinityfree.com', 'if0_37549380', 'terenceadmin123', 'if0_37549380_XXX');

$employees = $conn->query("SELECT * FROM employees");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Employee Records</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $employees->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <a href="edit_employee.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete_employee.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <!-- Logout Button -->
        <div>
            <a href="logout.php" style="padding: 10px; background-color: #f44336; color: white; text-decoration: none;">Logout</a>
        </div>
    </div>
</body>
</html>
