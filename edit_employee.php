<?php
$conn = new mysqli('sql303.infinityfree.com', 'if0_37549380', 'terenceadmin123', 'if0_37549380_XXX');
$id = $_GET['id'];
$employee = $conn->query("SELECT * FROM employees WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $conn->query("UPDATE employees SET name='$name', email='$email' WHERE id=$id");
    header('Location: employees.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Employee</h2>
        <form action="edit_employee.php?id=<?= $id ?>" method="POST">
            <input type="text" name="name" value="<?= $employee['name'] ?>" required>
            <input type="email" name="email" value="<?= $employee['email'] ?>" required>
            <button type="submit">Update Employee</button>
        </form>
        <a href="employees.php">Back to Employee Records</a>
    </div>
</body>
</html>
